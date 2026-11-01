<?php
/**
 * Techgroww - Newsletter Subscription Endpoint
 */

require_once __DIR__ . '/../includes/functions.php';

$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

function respondSubscribe(bool $success, string $message, int $statusCode = 200) {
    global $isAjax;
    http_response_code($statusCode);

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => $success,
            'message' => $message,
        ]);
        exit;
    } else {
        if ($success) {
            setFlashMessage('success', $message);
        } else {
            setFlashMessage('danger', $message);
        }
        $redirectUrl = $_SERVER['HTTP_REFERER'] ?? url('/');
        header('Location: ' . $redirectUrl);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respondSubscribe(false, 'Method not allowed', 405);
}

// Bot trap
if (!empty($_POST['website_url'])) {
    respondSubscribe(true, 'Thank you for subscribing to Techgroww insights!');
}

if (!checkRateLimit('newsletter_subscribe', 5, 300)) {
    respondSubscribe(false, 'Too many subscription attempts. Please try again later.', 429);
}

// CSRF check
$submittedToken = $_POST['csrf_token'] ?? '';
if (!verifyCsrfToken($submittedToken)) {
    respondSubscribe(false, 'Security token validation failed. Please refresh the page.', 403);
}

$email = cleanInput($_POST['email'] ?? '');

if (empty($email) || !isValidEmail($email)) {
    respondSubscribe(false, 'Please provide a valid email address.', 422);
}

$pdo = db();
if ($pdo) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO `newsletter_subscribers` (`email`, `ip_address`, `status`, `subscribed_at`) 
            VALUES (:email, :ip, 'active', NOW())
            ON DUPLICATE KEY UPDATE `status` = 'active'
        ");
        $stmt->execute([
            ':email' => $email,
            ':ip'    => getClientIp()
        ]);
    } catch (PDOException $e) {
        error_log('[Techgroww Newsletter DB Error] ' . $e->getMessage());
    }
}

respondSubscribe(true, 'Thank you for subscribing! You will receive our latest technology insights and architecture updates.');

