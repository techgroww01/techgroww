<?php
/**
 * Techgroww - Core Application Configuration
 * Domain: https://techgroww.co.in
 * Environment: Hostinger Web Hosting / PHP 8+
 */

// Prevent multiple inclusions
if (defined('TECHGROWW_CONFIG_LOADED')) {
    return;
}
define('TECHGROWW_CONFIG_LOADED', true);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Secure session cookies
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => $secure,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Application Information
define('APP_NAME', 'Techgroww');
define('APP_TAGLINE', 'Transforming Ideas Into Digital Solutions');
define('APP_LEGAL_NAME', 'Techgroww IT Solutions');
define('APP_DOMAIN', 'techgroww.co.in');

// Canonical Site URL detection with fallback
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
$httpHost = $_SERVER['HTTP_HOST'] ?? 'techgroww.co.in';

// In production on Hostinger, force canonical https://techgroww.co.in
if (strpos($httpHost, 'techgroww.co.in') !== false) {
    define('SITE_URL', 'https://techgroww.co.in');
} else {
    // Dynamic for local testing or custom IP
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = ($scriptDir === '/' || $scriptDir === '\\') ? '' : rtrim(str_replace('\\', '/', $scriptDir), '/');
    // Remove subdirectories if deep in /services or /admin
    $basePath = preg_replace('#/(services|admin|api)(/.*)?$#', '', $basePath);
    define('SITE_URL', rtrim($protocol . $httpHost . $basePath, '/'));
}

// Business Contact Information
define('CONTACT_EMAIL', 'contact@techgroww.co.in');
define('SUPPORT_EMAIL', 'support@techgroww.co.in');
define('CAREERS_EMAIL', 'careers@techgroww.co.in');
define('CONTACT_PHONE', '+91 98765 43210');
define('CONTACT_PHONE_RAW', '+919876543210');
define('CONTACT_WHATSAPP', '+919876543210');
define('OFFICE_HOURS', 'Mon - Sat: 9:00 AM - 7:00 PM IST');
define('OFFICE_LOCATION', 'Tech Hub, Bangalore & Mumbai, India');
define('OFFICE_COUNTRY', 'India');

// Social Media Links
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/company/techgroww');
define('SOCIAL_TWITTER', 'https://x.com/techgroww');
define('SOCIAL_GITHUB', 'https://github.com/techgroww01');
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/techgroww');

// Database Credentials Default Configuration
// Overridable via environment variables or config/config.local.php
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbName = getenv('DB_NAME') ?: 'u_techgroww_db';
$dbUser = getenv('DB_USER') ?: 'u_techgroww_user';
$dbPass = getenv('DB_PASS') ?: '';
$dbPort = getenv('DB_PORT') ?: '3306';

// Check for local uncommitted config file (Hostinger production or local dev)
$localConfigFile = __DIR__ . '/config.local.php';
if (file_exists($localConfigFile)) {
    $localConfig = require $localConfigFile;
    if (is_array($localConfig)) {
        $dbHost = $localConfig['DB_HOST'] ?? $dbHost;
        $dbName = $localConfig['DB_NAME'] ?? $dbName;
        $dbUser = $localConfig['DB_USER'] ?? $dbUser;
        $dbPass = $localConfig['DB_PASS'] ?? $dbPass;
        $dbPort = $localConfig['DB_PORT'] ?? $dbPort;
    }
}

define('DB_HOST', $dbHost);
define('DB_NAME', $dbName);
define('DB_USER', $dbUser);
define('DB_PASS', $dbPass);
define('DB_PORT', $dbPort);

// Email notification settings (Optional SMTP for Hostinger)
define('MAIL_NOTIFICATIONS_ENABLED', true);
define('MAIL_NOTIFICATION_RECIPIENT', CONTACT_EMAIL);
define('MAIL_FROM_ADDRESS', 'noreply@techgroww.co.in');
define('MAIL_FROM_NAME', 'Techgroww System Notification');

// CSRF Token Management
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/**
 * Generate or retrieve CSRF token
 */
function getCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken(?string $token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Return absolute URL for any path
 */
function url(string $path = ''): string {
    $cleanPath = ltrim($path, '/');
    return rtrim(SITE_URL, '/') . ($cleanPath ? '/' . $cleanPath : '');
}

/**
 * Return asset URL with cache busting if needed
 */
function asset(string $path): string {
    return url('assets/' . ltrim($path, '/'));
}

/**
 * HTML escape helper
 */
function e(?string $string): string {
    return htmlspecialchars($string ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
