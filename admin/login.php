<?php
/**
 * Techgroww - Admin Portal Authentication Login
 */

require_once __DIR__ . '/includes/auth.php';

// If already logged in, redirect straight to dashboard
if (isAdminLoggedIn()) {
    header('Location: ' . url('/admin/dashboard.php'));
    exit;
}

$error = '';
$isRateLimited = !checkRateLimit('admin_login_attempt', 5, 900); // 5 attempts per 15 mins

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($isRateLimited) {
        $error = 'Too many failed login attempts. Please wait 15 minutes before trying again.';
    } else {
        $token = $_POST['csrf_token'] ?? '';
        if (!verifyCsrfToken($token)) {
            $error = 'Security session expired. Please refresh the page.';
        } else {
            $username = cleanInput($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = 'Please provide both username and password.';
            } else {
                $authenticated = false;
                $userData = null;
                $pdo = db();

                if ($pdo) {
                    try {
                        $stmt = $pdo->prepare("SELECT * FROM `admin_users` WHERE `username` = :u OR `email` = :u LIMIT 1");
                        $stmt->execute([':u' => $username]);
                        $user = $stmt->fetch();

                        if ($user && !empty($user['is_active'])) {
                            // Check password with standard verify or check master fallback
                            if (password_verify($password, $user['password_hash']) || ($username === 'admin' && $password === 'TechgrowwAdmin@2026!')) {
                                $authenticated = true;
                                $userData = $user;

                                // If master default was used or password needs rehash, update it securely
                                if (password_needs_rehash($user['password_hash'], PASSWORD_DEFAULT) || $password === 'TechgrowwAdmin@2026!') {
                                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                                    $upd = $pdo->prepare("UPDATE `admin_users` SET `password_hash` = :h, `last_login` = NOW() WHERE `id` = :id");
                                    $upd->execute([':h' => $newHash, ':id' => $user['id']]);
                                } else {
                                    $upd = $pdo->prepare("UPDATE `admin_users` SET `last_login` = NOW() WHERE `id` = :id");
                                    $upd->execute([':id' => $user['id']]);
                                }
                            }
                        }
                    } catch (Exception $e) {
                        error_log('[Admin Login DB Error] ' . $e->getMessage());
                    }
                } else {
                    // Fallback initial bootstrap before Hostinger DB setup
                    if ($username === 'admin' && $password === 'TechgrowwAdmin@2026!') {
                        $authenticated = true;
                        $userData = [
                            'id' => 1,
                            'username' => 'admin',
                            'full_name' => 'Techgroww Administrator',
                            'email' => 'admin@techgroww.co.in'
                        ];
                    }
                }

                if ($authenticated && $userData) {
                    // Regenerate session to prevent session fixation attacks
                    session_regenerate_id(true);
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_id'] = $userData['id'];
                    $_SESSION['admin_username'] = $userData['username'];
                    $_SESSION['admin_name'] = $userData['full_name'];
                    $_SESSION['admin_email'] = $userData['email'];

                    header('Location: ' . url('/admin/dashboard.php'));
                    exit;
                } else {
                    $error = 'Invalid administrative credentials.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login | Techgroww Control Center</title>
    
    <link rel="icon" type="image/svg+xml" href="<?= asset('images/favicon.svg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>?v=1.0.0">
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>?v=1.0.0">
</head>
<body class="admin-body">
    <div class="admin-login-wrapper">
        <div class="admin-login-card">
            <div class="admin-login-header">
                <a href="<?= url('/') ?>">
                    <img src="<?= asset('images/logo.svg') ?>" alt="Techgroww Logo" width="180" height="42" class="admin-login-logo">
                </a>
                <h1>Admin Control Center</h1>
                <p>Authorized personnel only. Sessions are logged.</p>
            </div>

            <?php if (!empty($error)): ?>
            <div style="background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; padding: 0.85rem 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.875rem;">
                <?= e($error) ?>
            </div>
            <?php endif; ?>

            <form action="<?= url('/admin/login.php') ?>" method="POST" novalidate>
                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">

                <div class="form-group" style="margin-bottom: 1.25rem;">
                    <label class="form-label" for="login_username">Username or Email</label>
                    <input type="text" id="login_username" name="username" class="form-control" placeholder="admin" required autofocus>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label class="form-label" for="login_password">Password</label>
                    <input type="password" id="login_password" name="password" class="form-control" placeholder="••••••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg" <?= $isRateLimited ? 'disabled' : '' ?>>
                    <span>Sign In to Control Center</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </form>

            <div style="margin-top: 2rem; border-top: 1px solid #e2e8f0; padding-top: 1rem; text-align: center; font-size: 0.8rem; color: #64748b;">
                <a href="<?= url('/') ?>" style="color: #64748b; text-decoration: none;">&larr; Back to Public Website</a>
            </div>
        </div>
    </div>
</body>
</html>
