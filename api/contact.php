<?php
/**
 * Techgroww - Contact Form Submission Endpoint
 * Supports AJAX JSON responses and standard form POST redirects
 * 
 * Reliability Guarantees:
 * 1. Strict validation, spam protection, and rate limiting
 * 2. Atomic database transaction for contact enquiry and email outbox
 * 3. Never sends emails or returns false success if database insertion fails
 * 4. Durable email outbox queueing with immediate delivery attempt and automatic retry
 * 5. Returns new enquiry ID to prospect and admin
 */

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/MailService.php';

$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

function respond(bool $success, string $message, array $errors = [], int $statusCode = 200, array $extra = []) {
    global $isAjax;
    http_response_code($statusCode);

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array_merge([
            'success' => $success,
            'message' => $message,
            'errors'  => $errors,
        ], $extra));
        exit;
    } else {
        // Fallback for non-JS standard form submissions
        if ($success) {
            setFlashMessage('success', $message);
        } else {
            setFlashMessage('danger', $message . (!empty($errors) ? ' ' . implode(', ', $errors) : ''));
        }
        $redirectUrl = $_SERVER['HTTP_REFERER'] ?? url('/contact');
        header('Location: ' . $redirectUrl);
        exit;
    }
}

// Ensure POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method. Only POST submissions are allowed.', [], 405);
}

// 1. Spam protection & rate limiting
if (isSpamSubmission($_POST)) {
    // Silently reject spam without alerting bot
    respond(true, 'Thank you! Your enquiry has been received. Our team will contact you shortly.');
}

if (!checkRateLimit('contact_submission', 5, 300)) {
    respond(false, 'Too many requests. Please wait a few minutes before submitting again.', [], 429);
}

// 2. CSRF Token Verification
$submittedToken = $_POST['csrf_token'] ?? '';
if (!verifyCsrfToken($submittedToken)) {
    respond(false, 'Security token validation failed. Please refresh the page and try again.', ['csrf' => 'Invalid or expired CSRF token'], 403);
}

// 3. Collect & validate inputs
$name    = cleanInput($_POST['name'] ?? '');
$email   = cleanInput($_POST['email'] ?? '');
$phone   = cleanInput($_POST['phone'] ?? '');
$company = cleanInput($_POST['company'] ?? '');
$service = cleanInput($_POST['service'] ?? '');
$budget  = cleanInput($_POST['budget'] ?? '');
$message = cleanInput($_POST['message'] ?? '');

$errors = [];

if (empty($name) || mb_strlen($name) < 2) {
    $errors['name'] = 'Please enter your full name (minimum 2 characters).';
}

if (empty($email) || !isValidEmail($email)) {
    $errors['email'] = 'Please provide a valid business email address.';
}

if (!empty($phone) && !isValidPhone($phone)) {
    $errors['phone'] = 'Please enter a valid phone number (digits only, 7-15 digits).';
}

$allowedServices = [
    'Web Development',
    'Custom Software Development',
    'Business Process Automation',
    'AI & Intelligent Solutions',
    'Digital Marketing & SEO',
    'IT Consulting & Advisory',
    'Cloud & Infrastructure',
    'General Technology Enquiry'
];

if (empty($service)) {
    $errors['service'] = 'Please select a service required.';
}

if (empty($message) || mb_strlen($message) < 10) {
    $errors['message'] = 'Please provide a brief description of your project (minimum 10 characters).';
}

if (!empty($errors)) {
    respond(false, 'Please correct the highlighted errors in the form.', $errors, 422);
}

// 4. Save to Database with Transaction Reliability
$pdo = db();
if (!$pdo) {
    error_log('[Techgroww Contact Form] Database connection unavailable during contact submission.');
    respond(
        false,
        'Our database service is temporarily unavailable. Please email us directly at ' . SALES_NOTIFICATION_EMAIL . ' or call ' . CONTACT_PHONE . '.',
        ['database' => 'Database connection failed'],
        503
    );
}

$enquiryId = null;
$salesNotifId = null;
$custAckId = null;

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("
        INSERT INTO `contact_enquiries` 
        (`name`, `email`, `phone`, `company`, `service`, `budget`, `message`, `ip_address`, `user_agent`, `status`, `created_at`) 
        VALUES 
        (:name, :email, :phone, :company, :service, :budget, :message, :ip, :ua, 'new', NOW())
    ");

    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':phone'   => $phone ?: null,
        ':company' => $company ?: null,
        ':service' => $service,
        ':budget'  => $budget ?: 'Not Specified',
        ':message' => $message,
        ':ip'      => getClientIp(),
        ':ua'      => mb_substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255),
    ]);

    $enquiryId = (int) $pdo->lastInsertId();
    if ($enquiryId <= 0) {
        throw new \Exception('Failed to obtain auto-increment enquiry ID from database.');
    }

    $enquiryData = [
        'id'         => $enquiryId,
        'name'       => $name,
        'email'      => $email,
        'phone'      => $phone,
        'company'    => $company,
        'service'    => $service,
        'budget'     => $budget,
        'message'    => $message,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Build Email Templates
    $salesSubject  = "New Techgroww Website Enquiry – " . $name;
    $salesHtml     = MailService::buildSalesNotificationHtml($enquiryId, $enquiryData);

    $custSubject   = "Thank you for contacting Techgroww";
    $custHtml      = MailService::buildCustomerAcknowledgementHtml($enquiryId, $enquiryData);

    // Queue in Outbox table (Durable record)
    $salesNotifId = MailService::queueNotification(
        $enquiryId,
        SALES_NOTIFICATION_EMAIL,
        'Techgroww Team',
        'sales_notification',
        $salesSubject,
        $salesHtml,
        $email // Customer email set as Reply-To
    );

    $custAckId = MailService::queueNotification(
        $enquiryId,
        $email,
        $name,
        'customer_acknowledgement',
        $custSubject,
        $custHtml,
        SALES_NOTIFICATION_EMAIL
    );

    $pdo->commit();
} catch (\Throwable $e) {
    if ($pdo && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('[Techgroww Contact Form DB Error] ' . $e->getMessage());
    respond(
        false,
        'We encountered an error saving your enquiry. Please try submitting again or contact us directly at ' . SALES_NOTIFICATION_EMAIL . '.',
        ['database' => 'Failed to save enquiry'],
        500
    );
}

// 5. Attempt Immediate Email Delivery via MailService
// If delivery fails, it remains safely in the outbox for the automatic cron retry mechanism
if ($salesNotifId) {
    MailService::deliverQueuedEmail($salesNotifId);
}

if ($custAckId) {
    MailService::deliverQueuedEmail($custAckId);
}

// 6. Regenerate CSRF token after successful submission to prevent duplicate submissions
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

respond(
    true,
    'Thank you! Your project enquiry (Ref #' . $enquiryId . ') has been submitted successfully. A Techgroww technology consultant will review your requirements and reach out within 24 business hours.',
    [],
    200,
    ['enquiry_id' => $enquiryId]
);
