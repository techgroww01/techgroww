<?php
/**
 * Techgroww - Core Helper Functions & Utilities
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

/**
 * Clean & sanitize user input string
 */
function cleanInput(?string $data): string {
    if ($data === null) {
        return '';
    }
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Validate an email address with RFC compliance & filter
 */
function isValidEmail(string $email): bool {
    $email = trim($email);
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number format (international/Indian standard)
 */
function isValidPhone(string $phone): bool {
    $phone = preg_replace('/[\s\-\(\)\+]/', '', $phone);
    return strlen($phone) >= 7 && strlen($phone) <= 15 && ctype_digit($phone);
}

/**
 * Simple session-based rate limiter to protect forms against spam/bots
 */
function checkRateLimit(string $action = 'contact', int $maxAttempts = 5, int $decaySeconds = 300): bool {
    if (!isset($_SESSION['rate_limits'])) {
        $_SESSION['rate_limits'] = [];
    }

    $now = time();
    $attempts = $_SESSION['rate_limits'][$action] ?? [];

    // Filter out attempts older than decay window
    $attempts = array_filter($attempts, fn($timestamp) => ($now - $timestamp) < $decaySeconds);

    if (count($attempts) >= $maxAttempts) {
        return false; // Rate limit exceeded
    }

    $attempts[] = $now;
    $_SESSION['rate_limits'][$action] = $attempts;
    return true;
}

/**
 * Check for spam indicators (honeypot field, timestamp bot speed)
 */
function isSpamSubmission(array $data): bool {
    // 1. Honeypot check: website_url should always be empty for real users
    if (!empty($data['website_url'])) {
        return true;
    }

    // 2. Submission speed check: forms filled in less than 2 seconds are almost always automated bots
    if (isset($data['form_rendered_at'])) {
        $renderedTime = (int) $data['form_rendered_at'];
        $elapsed = time() - $renderedTime;
        if ($elapsed < 2) {
            return true;
        }
    }

    return false;
}

/**
 * Set a session flash message
 */
function setFlashMessage(string $type, string $message): void {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][] = [
        'type' => $type, // 'success', 'danger', 'warning', 'info'
        'message' => $message,
    ];
}

/**
 * Retrieve and clear flash messages
 */
function getFlashMessages(): array {
    $messages = $_SESSION['flash_messages'] ?? [];
    unset($_SESSION['flash_messages']);
    return $messages;
}

/**
 * Check if the current page or path is active for navigation styling
 */
function isActiveNav(string $page): bool {
    $currentUri = $_SERVER['REQUEST_URI'] ?? '';
    $currentScript = basename($_SERVER['SCRIPT_NAME'] ?? '');

    if ($page === 'home') {
        return ($currentScript === 'index.php' && empty($_SERVER['QUERY_STRING']) && (rtrim($currentUri, '/') === '' || rtrim($currentUri, '/') === url()));
    }

    if ($page === 'services') {
        return strpos($currentUri, '/services') !== false;
    }

    return strpos($currentUri, $page) !== false || $currentScript === ($page . '.php');
}

/**
 * Send an email notification using MailService (PHPMailer SMTP) with fallback
 */
function sendNotificationEmail(string $subject, string $htmlBody, ?string $replyTo = null): bool {
    if (!MAIL_NOTIFICATIONS_ENABLED) {
        return false;
    }

    require_once __DIR__ . '/MailService.php';

    if (MailService::isConfigured()) {
        $result = MailService::sendHtmlEmail(
            SALES_NOTIFICATION_EMAIL,
            'Techgroww Team',
            $subject,
            $htmlBody,
            $replyTo,
            $replyTo
        );
        return $result['success'];
    }

    // Fallback to PHP native mail() if SMTP credentials are not yet configured
    $to = SALES_NOTIFICATION_EMAIL;
    $headers = [];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=UTF-8';
    $headers[] = 'From: ' . MAIL_FROM_NAME . ' <' . MAIL_FROM_ADDRESS . '>';
    if ($replyTo) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }
    $headers[] = 'X-Mailer: PHP/' . phpversion();

    return @mail($to, $subject, $htmlBody, implode("\r\n", $headers));
}

/**
 * Get client IP address reliably
 */
function getClientIp(): string {
    $ipKeys = ['HTTP_CF_CONNECTING_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
    foreach ($ipKeys as $key) {
        if (!empty($_SERVER[$key])) {
            $ips = explode(',', $_SERVER[$key]);
            $ip = trim($ips[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
    return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
}

/**
 * Render Breadcrumbs HTML and JSON-LD schema
 */
function renderBreadcrumbs(array $items): string {
    if (empty($items)) {
        return '';
    }

    $html = '<nav class="breadcrumbs" aria-label="Breadcrumb"><div class="container"><ol class="breadcrumb-list">';
    $schemaList = [];
    $position = 1;

    // Home item always first
    $homeUrl = url('/');
    $html .= '<li class="breadcrumb-item"><a href="' . $homeUrl . '">Home</a></li>';
    $schemaList[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'name' => 'Home',
        'item' => $homeUrl
    ];

    $total = count($items);
    $idx = 0;
    foreach ($items as $name => $link) {
        $idx++;
        $isLast = ($idx === $total);
        if ($isLast || empty($link)) {
            $html .= '<li class="breadcrumb-item active" aria-current="page">' . e($name) . '</li>';
            $schemaList[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $name,
            ];
        } else {
            $fullLink = str_starts_with($link, 'http') ? $link : url($link);
            $html .= '<li class="breadcrumb-item"><a href="' . $fullLink . '">' . e($name) . '</a></li>';
            $schemaList[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $name,
                'item' => $fullLink
            ];
        }
    }
    $html .= '</ol></div></nav>';

    // JSON-LD BreadcrumbList Schema
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $schemaList
    ];
    $html .= '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

    return $html;
}

