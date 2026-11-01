<?php
/**
 * Techgroww - Contact Form Submission Endpoint
 * Supports AJAX JSON responses and standard form POST redirects
 */

require_once __DIR__ . '/../includes/functions.php';

$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

function respond(bool $success, string $message, array $errors = [], int $statusCode = 200) {
    global $isAjax;
    http_response_code($statusCode);

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => $success,
            'message' => $message,
            'errors'  => $errors,
        ]);
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

// 4. Save to Database
$pdo = db();
$dbSuccess = false;

if ($pdo) {
    try {
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

        $dbSuccess = true;
    } catch (PDOException $e) {
        error_log('[Techgroww Contact Form DB Error] ' . $e->getMessage());
        // Do not expose database error to client
    }
} else {
    error_log('[Techgroww Contact Form] Database connection unavailable during contact submission.');
}

// 5. Send Email Notification
$emailSubject = "New Project Enquiry from " . $name . " [" . $service . "]";
$emailContent = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f8fafc; color: #1e293b; padding: 20px; }
        .card { background: #ffffff; border-radius: 8px; border: 1px solid #e2e8f0; max-width: 600px; margin: 0 auto; overflow: hidden; }
        .header { background: #0b132b; color: #ffffff; padding: 24px; text-align: center; }
        .header h2 { margin: 0; font-size: 20px; font-weight: 600; }
        .body { padding: 24px; }
        .field { margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; }
        .field strong { color: #0f172a; display: block; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .field span { font-size: 15px; color: #334155; }
        .footer { background: #f8fafc; padding: 16px 24px; font-size: 12px; color: #64748b; text-align: center; }
    </style>
</head>
<body>
    <div class='card'>
        <div class='header'>
            <h2>New Client Project Enquiry</h2>
            <p style='margin: 4px 0 0; font-size: 14px; opacity: 0.8;'>Techgroww Website Lead Capture</p>
        </div>
        <div class='body'>
            <div class='field'><strong>Client Name:</strong> <span>" . e($name) . "</span></div>
            <div class='field'><strong>Email:</strong> <span><a href='mailto:" . e($email) . "'>" . e($email) . "</a></span></div>
            <div class='field'><strong>Phone:</strong> <span>" . e($phone ?: 'Not provided') . "</span></div>
            <div class='field'><strong>Company:</strong> <span>" . e($company ?: 'Not provided') . "</span></div>
            <div class='field'><strong>Selected Service:</strong> <span>" . e($service) . "</span></div>
            <div class='field'><strong>Estimated Budget:</strong> <span>" . e($budget ?: 'Not specified') . "</span></div>
            <div class='field'><strong>Project Description:</strong><br><p style='white-space: pre-wrap; font-size: 14px; color: #1e293b; line-height: 1.6;'>" . nl2br(e($message)) . "</p></div>
        </div>
        <div class='footer'>
            Sent from " . e(SITE_URL) . " at " . date('Y-m-d H:i:s T') . " (IP: " . e(getClientIp()) . ")
        </div>
    </div>
</body>
</html>
";

@sendNotificationEmail($emailSubject, $emailContent, $email);

// Regenerate CSRF token after successful submission
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

respond(true, 'Thank you! Your project enquiry has been submitted successfully. A Techgroww technology consultant will review your requirements and reach out within 24 business hours.');
