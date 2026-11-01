<?php
/**
 * Techgroww - Admin Sign Out Endpoint
 */

require_once __DIR__ . '/includes/auth.php';

// Unset admin session variables
unset(
    $_SESSION['admin_logged_in'],
    $_SESSION['admin_id'],
    $_SESSION['admin_username'],
    $_SESSION['admin_name'],
    $_SESSION['admin_email']
);

setFlashMessage('success', 'You have been signed out successfully.');
header('Location: ' . url('/admin/login.php'));
exit;

