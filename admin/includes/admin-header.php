<?php
/**
 * Techgroww - Admin Portal Header
 */

require_once __DIR__ . '/auth.php';
requireAdminAuth();

$adminUser = getAdminUser();
$adminPage = $adminPage ?? 'dashboard';

// Count new enquiries for sidebar badge
$newEnquiriesCount = 0;
$pdo = db();
if ($pdo) {
    try {
        $stmt = $pdo->query("SELECT COUNT(*) FROM `contact_enquiries` WHERE `status` = 'new'");
        $newEnquiriesCount = (int) $stmt->fetchColumn();
    } catch (Exception $e) {}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?= e($adminTitle ?? 'Admin Portal') ?> | Techgroww Control Center</title>
    
    <link rel="icon" type="image/svg+xml" href="<?= asset('images/favicon.svg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>?v=1.0.0">
</head>
<body class="admin-body">
    <!-- Admin Sidebar Navigation -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <a href="<?= url('/admin/dashboard.php') ?>">
                <img src="<?= asset('images/logo-white.svg') ?>" alt="Techgroww Admin" width="150" height="34">
            </a>
        </div>

        <nav class="admin-sidebar-menu">
            <a href="<?= url('/admin/dashboard.php') ?>" class="admin-nav-item <?= ($adminPage === 'dashboard') ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Dashboard</span>
            </a>

            <a href="<?= url('/admin/enquiries.php') ?>" class="admin-nav-item <?= ($adminPage === 'enquiries') ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                <span>Inquiries</span>
                <?php if ($newEnquiriesCount > 0): ?>
                <span class="admin-nav-badge"><?= $newEnquiriesCount ?></span>
                <?php endif; ?>
            </a>

            <a href="<?= url('/admin/subscribers.php') ?>" class="admin-nav-item <?= ($adminPage === 'subscribers') ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Subscribers</span>
            </a>

            <a href="<?= url('/') ?>" target="_blank" class="admin-nav-item" style="margin-top: 1.5rem; color: #38bdf8;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                <span>Live Website &nearr;</span>
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <div style="margin-bottom: 0.5rem; color: #fff; font-weight: 600;"><?= e($adminUser['name']) ?></div>
            <a href="<?= url('/admin/logout.php') ?>" style="color: #f87171; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; font-weight: 600;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Sign Out
            </a>
        </div>
    </aside>

    <!-- Main Admin Workspace -->
    <main class="admin-main">
        <header class="admin-top-nav">
            <div class="admin-top-nav-title"><?= e($adminTitle ?? 'Overview') ?></div>
            <div class="admin-user-profile">
                <span>Signed in as: <strong><?= e($adminUser['username']) ?></strong></span>
            </div>
        </header>

        <div class="admin-content-container">
            <?php
            $flashMessages = getFlashMessages();
            if (!empty($flashMessages)):
                foreach ($flashMessages as $flash):
            ?>
            <div style="background: <?= ($flash['type'] === 'success') ? '#ecfdf5' : '#fef2f2' ?>; color: <?= ($flash['type'] === 'success') ? '#065f46' : '#991b1b' ?>; border: 1px solid <?= ($flash['type'] === 'success') ? '#a7f3d0' : '#fecaca' ?>; padding: 0.85rem 1.25rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                <?= e($flash['message']) ?>
            </div>
            <?php
                endforeach;
            endif;
            ?>
