<?php
/**
 * Techgroww - Authenticated SMTP Mail Service
 * Powered by PHPMailer & Google Workspace SMTP
 * 
 * Provides:
 * - Internal Sales Notification with Customer Reply-To
 * - Customer Acknowledgement Autoresponder
 * - Email Outbox Queuing & Delivery Logging
 * - Secure Error Handling without Exposing Credentials
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailService {
    
    /**
     * Check if SMTP credentials (specifically the password) are properly configured
     */
    public static function isConfigured(): bool {
        return !empty(SMTP_PASS);
    }

    /**
     * Create and configure a PHPMailer instance
     */
    protected static function createMailer(): PHPMailer {
        $mail = new PHPMailer(true); // Enable exceptions

        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        
        if (strtolower(SMTP_ENCRYPTION) === 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } elseif (strtolower(SMTP_ENCRYPTION) === 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';
        $mail->Encoding   = 'base64';
        $mail->Timeout    = 15; // 15-second network timeout

        // Authenticated Sender
        $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);

        return $mail;
    }

    /**
     * Send an HTML email via SMTP
     * 
     * @return array ['success' => bool, 'error' => ?string]
     */
    public static function sendHtmlEmail(
        string $toEmail,
        string $toName,
        string $subject,
        string $htmlBody,
        ?string $replyToEmail = null,
        ?string $replyToName = null
    ): array {
        if (!self::isConfigured()) {
            return [
                'success' => false,
                'error'   => 'SMTP password is not configured in config/config.local.php or environment.',
            ];
        }

        try {
            $mail = self::createMailer();

            // Recipient
            $mail->addAddress($toEmail, $toName);

            // Reply-To header (Crucial for customer replies)
            if (!empty($replyToEmail) && filter_var($replyToEmail, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($replyToEmail, $replyToName ?: $replyToEmail);
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $htmlBody;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<p>', '</p>'], ["\n", "\n", "\n", "\n\n"], $htmlBody));

            $mail->send();

            return [
                'success' => true,
                'error'   => null,
            ];
        } catch (Exception $e) {
            $safeError = self::sanitizeErrorMessage($e->getMessage());
            error_log('[Techgroww MailService Error] ' . $safeError);
            return [
                'success' => false,
                'error'   => $safeError,
            ];
        } catch (\Throwable $e) {
            $safeError = self::sanitizeErrorMessage($e->getMessage());
            error_log('[Techgroww MailService System Error] ' . $safeError);
            return [
                'success' => false,
                'error'   => $safeError,
            ];
        }
    }

    /**
     * Create durable pending email record in the outbox table
     */
    public static function queueNotification(
        int $enquiryId,
        string $recipientEmail,
        ?string $recipientName,
        string $emailType,
        string $subject,
        string $bodyHtml,
        ?string $replyTo = null
    ): ?int {
        $pdo = db();
        if (!$pdo) {
            error_log('[Techgroww MailService Outbox] Database connection unavailable.');
            return null;
        }

        try {
            $stmt = $pdo->prepare("
                INSERT INTO `email_notifications`
                (`enquiry_id`, `recipient_email`, `recipient_name`, `email_type`, `subject`, `body_html`, `reply_to`, `status`, `attempts`, `created_at`)
                VALUES
                (:enquiry_id, :recipient_email, :recipient_name, :email_type, :subject, :body_html, :reply_to, 'pending', 0, NOW())
            ");

            $stmt->execute([
                ':enquiry_id'       => $enquiryId,
                ':recipient_email'  => $recipientEmail,
                ':recipient_name'   => $recipientName,
                ':email_type'       => $emailType,
                ':subject'          => $subject,
                ':body_html'        => $bodyHtml,
                ':reply_to'         => $replyTo,
            ]);

            return (int) $pdo->lastInsertId();
        } catch (\PDOException $e) {
            error_log('[Techgroww MailService Queue Error] ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Attempt delivery of a queued outbox email notification record
     */
    public static function deliverQueuedEmail(int $notificationId): bool {
        $pdo = db();
        if (!$pdo) {
            return false;
        }

        try {
            $stmt = $pdo->prepare("SELECT * FROM `email_notifications` WHERE `id` = :id LIMIT 1");
            $stmt->execute([':id' => $notificationId]);
            $record = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$record) {
                return false;
            }

            // Increment attempt counter & set last_attempt_at
            $updateAttemptStmt = $pdo->prepare("
                UPDATE `email_notifications` 
                SET `attempts` = `attempts` + 1, `last_attempt_at` = NOW() 
                WHERE `id` = :id
            ");
            $updateAttemptStmt->execute([':id' => $notificationId]);

            // Attempt SMTP send
            $result = self::sendHtmlEmail(
                $record['recipient_email'],
                $record['recipient_name'] ?? '',
                $record['subject'],
                $record['body_html'],
                $record['reply_to'],
                $record['recipient_name']
            );

            if ($result['success']) {
                $statusStmt = $pdo->prepare("
                    UPDATE `email_notifications`
                    SET `status` = 'sent', `sent_at` = NOW(), `error_message` = NULL
                    WHERE `id` = :id
                ");
                $statusStmt->execute([':id' => $notificationId]);
                return true;
            } else {
                $statusStmt = $pdo->prepare("
                    UPDATE `email_notifications`
                    SET `status` = 'failed', `error_message` = :err
                    WHERE `id` = :id
                ");
                $statusStmt->execute([
                    ':id'  => $notificationId,
                    ':err' => mb_substr($result['error'] ?? 'Unknown delivery failure', 0, 1000),
                ]);
                return false;
            }
        } catch (\Throwable $e) {
            error_log('[Techgroww DeliverQueuedEmail Error] ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Generate HTML template for Internal Sales Notification
     */
    public static function buildSalesNotificationHtml(int $enquiryId, array $data): string {
        $name        = htmlspecialchars($data['name'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
        $email       = htmlspecialchars($data['email'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
        $phone       = htmlspecialchars($data['phone'] ?? 'Not provided', ENT_QUOTES, 'UTF-8');
        $company     = htmlspecialchars($data['company'] ?? 'Not provided', ENT_QUOTES, 'UTF-8');
        $service     = htmlspecialchars($data['service'] ?? 'General Enquiry', ENT_QUOTES, 'UTF-8');
        $budget      = htmlspecialchars($data['budget'] ?? 'Not Specified', ENT_QUOTES, 'UTF-8');
        $messageRaw  = $data['message'] ?? '';
        $messageHtml = nl2br(htmlspecialchars($messageRaw, ENT_QUOTES, 'UTF-8'));
        $submittedAt = date('d M Y, h:i A T');
        $siteUrl     = rtrim(SITE_URL, '/');

        return "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>New Website Enquiry #{$enquiryId}</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #0f172a; margin: 0; padding: 24px 12px; }
        .container { max-width: 620px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #0b132b 0%, #1c2541 100%); padding: 32px 24px; text-align: center; color: #ffffff; }
        .logo-text { font-size: 24px; font-weight: 800; letter-spacing: 0.5px; color: #ffffff; margin: 0 0 6px 0; }
        .logo-tag { font-size: 13px; color: #94a3b8; text-transform: uppercase; letter-spacing: 1.5px; margin: 0; }
        .badge { display: inline-block; background: #2563eb; color: #ffffff; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 20px; margin-top: 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        .content { padding: 32px 28px; }
        .intro { font-size: 15px; color: #334155; line-height: 1.6; margin-bottom: 24px; border-bottom: 1px solid #e2e8f0; padding-bottom: 16px; }
        .field-group { margin-bottom: 18px; }
        .field-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.75px; margin-bottom: 4px; }
        .field-value { font-size: 15px; color: #0f172a; font-weight: 600; word-break: break-word; }
        .field-value a { color: #2563eb; text-decoration: none; }
        .project-scope { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #2563eb; border-radius: 8px; padding: 18px; margin-top: 20px; }
        .project-scope-label { font-size: 12px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .project-scope-text { font-size: 14px; color: #334155; line-height: 1.65; margin: 0; white-space: pre-wrap; }
        .actions { margin-top: 28px; text-align: center; }
        .btn-reply { display: inline-block; background: #2563eb; color: #ffffff !important; font-weight: 600; font-size: 14px; padding: 12px 28px; border-radius: 8px; text-decoration: none; box-shadow: 0 2px 4px rgba(37,99,235,0.25); }
        .footer { background: #f8fafc; padding: 20px 24px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <div class='logo-text'>TECHGROWW</div>
            <p class='logo-tag'>Enterprise Lead Management</p>
            <span class='badge'>Enquiry #{$enquiryId}</span>
        </div>
        <div class='content'>
            <div class='intro'>
                A new project enquiry has been submitted on <strong><a href='{$siteUrl}' style='color:#2563eb; text-decoration:none;'>techgroww.co.in</a></strong>. Please review the details below and respond promptly.
            </div>

            <table style='width:100%; border-collapse:collapse;'>
                <tr>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Customer Name</div>
                        <div class='field-value'>{$name}</div>
                    </td>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Business Email</div>
                        <div class='field-value'><a href='mailto:{$email}'>{$email}</a></div>
                    </td>
                </tr>
                <tr>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Phone Number</div>
                        <div class='field-value'>{$phone}</div>
                    </td>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Company / Organization</div>
                        <div class='field-value'>{$company}</div>
                    </td>
                </tr>
                <tr>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Service Required</div>
                        <div class='field-value' style='color:#2563eb;'>{$service}</div>
                    </td>
                    <td style='width:50%; vertical-align:top; padding-bottom:16px;'>
                        <div class='field-label'>Estimated Budget</div>
                        <div class='field-value' style='color:#059669;'>{$budget}</div>
                    </td>
                </tr>
            </table>

            <div class='project-scope'>
                <div class='project-scope-label'>Project Scope & Requirements</div>
                <div class='project-scope-text'>{$messageHtml}</div>
            </div>

            <div class='actions'>
                <a href='mailto:{$email}?subject=" . rawurlencode("Re: Techgroww Project Enquiry #{$enquiryId} – {$service}") . "' class='btn-reply'>Reply Directly to {$name}</a>
            </div>
        </div>
        <div class='footer'>
            Submitted on {$submittedAt}<br>
            Techgroww IT Solutions &bull; https://techgroww.co.in &bull; contact@techgroww.co.in
        </div>
    </div>
</body>
</html>
";
    }

    /**
     * Generate HTML template for Customer Acknowledgement Autoresponder
     */
    public static function buildCustomerAcknowledgementHtml(int $enquiryId, array $data): string {
        $name        = htmlspecialchars($data['name'] ?? 'Valued Client', ENT_QUOTES, 'UTF-8');
        $service     = htmlspecialchars($data['service'] ?? 'Technology Services', ENT_QUOTES, 'UTF-8');
        $siteUrl     = rtrim(SITE_URL, '/');

        return "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Thank you for contacting Techgroww</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #0f172a; margin: 0; padding: 24px 12px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #0b132b 0%, #1c2541 100%); padding: 36px 24px; text-align: center; color: #ffffff; }
        .logo-text { font-size: 26px; font-weight: 800; letter-spacing: 1px; color: #ffffff; margin: 0 0 6px 0; }
        .logo-tag { font-size: 13px; color: #94a3b8; text-transform: uppercase; letter-spacing: 1.5px; margin: 0; }
        .content { padding: 36px 28px; line-height: 1.7; font-size: 15px; color: #334155; }
        .greeting { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 16px; }
        .highlight-box { background: #eff6ff; border-left: 4px solid #2563eb; padding: 20px; border-radius: 6px; margin: 24px 0; color: #1e3a8a; }
        .highlight-box p { margin: 0; font-size: 15px; font-weight: 500; }
        .ref-tag { font-size: 13px; color: #64748b; margin-top: 8px; }
        .next-steps { margin-top: 24px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; }
        .next-steps h4 { margin: 0 0 12px 0; color: #0f172a; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        .next-steps ul { margin: 0; padding-left: 20px; color: #475569; font-size: 14px; }
        .next-steps li { margin-bottom: 8px; }
        .footer { background: #f8fafc; padding: 24px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0; }
        .footer a { color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <div class='logo-text'>TECHGROWW</div>
            <p class='logo-tag'>Transforming Ideas Into Digital Solutions</p>
        </div>
        <div class='content'>
            <div class='greeting'>Dear {$name},</div>
            
            <p>Thank you for contacting <strong>Techgroww</strong>. We have successfully received your project enquiry regarding <strong>{$service}</strong>.</p>

            <div class='highlight-box'>
                <p>\"Thank you for contacting Techgroww. We have successfully received your project enquiry. Our team will review your requirements and contact you within 24 business hours.\"</p>
                <div class='ref-tag'>Reference: Enquiry #{$enquiryId}</div>
            </div>

            <div class='next-steps'>
                <h4>What happens next?</h4>
                <ul>
                    <li><strong>Requirements Analysis:</strong> Our technology consultants assess your technical scope and objectives.</li>
                    <li><strong>Consultation:</strong> We will reach out via email or phone to schedule an exploratory discussion.</li>
                    <li><strong>Tailored Proposal:</strong> We provide an actionable roadmap, architecture outline, and clear project estimation.</li>
                </ul>
            </div>

            <p style='margin-top: 24px;'>If you have any urgent details or supplementary documents to share, feel free to reply directly to this email or reach us at <a href='mailto:contact@techgroww.co.in' style='color:#2563eb; font-weight:600;'>contact@techgroww.co.in</a>.</p>

            <p style='margin-bottom: 0;'>Warm regards,<br><strong>Techgroww Consulting Team</strong><br><a href='{$siteUrl}' style='color:#2563eb; text-decoration:none;'>https://techgroww.co.in</a></p>
        </div>
        <div class='footer'>
            &copy; " . date('Y') . " Techgroww IT Solutions. All rights reserved.<br>
            Bengaluru & Mumbai, India &bull; <a href='{$siteUrl}/privacy-policy'>Privacy Policy</a> &bull; <a href='{$siteUrl}/terms'>Terms of Service</a>
        </div>
    </div>
</body>
</html>
";
    }

    /**
     * Sanitize sensitive data from error messages before logging
     */
    private static function sanitizeErrorMessage(string $message): string {
        // Strip out any passwords, keys, or auth hashes
        $message = preg_replace('/password\s*=\s*[^\s;]+/i', 'password=***', $message);
        $message = preg_replace('/pass\s*=\s*[^\s;]+/i', 'pass=***', $message);
        return $message;
    }
}

