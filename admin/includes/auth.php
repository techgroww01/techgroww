<?php
/**
 * Techgroww - Admin Authentication & Session Guard
 */

require_once __DIR__ . '/../../includes/functions.php';

/**
 * Check if administrator is logged in
 */
function isAdminLoggedIn(): bool {
    return !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Require admin authentication for protected pages
 */
function requireAdminAuth(): void {
    if (!isAdminLoggedIn()) {
        header('Location: ' . url('/admin/login.php'));
        exit;
    }
}

/**
 * Get current admin user details
 */
function getAdminUser(): array {
    return [
        'id'       => $_SESSION['admin_id'] ?? 1,
        'username' => $_SESSION['admin_username'] ?? 'admin',
        'name'     => $_SESSION['admin_name'] ?? 'Administrator',
        'email'    => $_SESSION['admin_email'] ?? 'admin@techgroww.co.in',
    ];
}

