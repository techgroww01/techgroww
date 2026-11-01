<?php
/**
 * Techgroww - Admin Portal: Newsletter Subscribers
 */

require_once __DIR__ . '/includes/auth.php';
requireAdminAuth();

$pdo = db();

// Handle CSV Export
if (isset($_GET['export']) && $_GET['export'] === 'csv' && $pdo) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=techgroww_subscribers_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Email Address', 'Subscribed At', 'Status', 'IP Address']);

    try {
        $stmt = $pdo->query("SELECT `id`, `email`, `subscribed_at`, `status`, `ip_address` FROM `newsletter_subscribers` ORDER BY `subscribed_at` DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
    } catch (Exception $e) {}

    fclose($output);
    exit;
}

$adminTitle = 'Newsletter Subscribers';
$adminPage = 'subscribers';

require_once __DIR__ . '/includes/admin-header.php';

$subscribers = [];
if ($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM `newsletter_subscribers` ORDER BY `subscribed_at` DESC");
        $subscribers = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log('[Subscribers Query Error] ' . $e->getMessage());
    }
}
?>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Audience List (<?= count($subscribers) ?> Subscribers)</h2>
        <div>
            <a href="<?= url('/admin/subscribers.php?export=csv') ?>" class="btn btn-primary btn-sm">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                <span>Export to CSV</span>
            </a>
        </div>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email Address</th>
                    <th>Subscribed On</th>
                    <th>IP Origin</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($subscribers)): ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 2.5rem; color: #64748b;">
                        No newsletter subscribers recorded yet.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($subscribers as $sub): ?>
                <tr>
                    <td>#<?= $sub['id'] ?></td>
                    <td>
                        <strong style="color: #0b132b;"><?= e($sub['email']) ?></strong>
                    </td>
                    <td><?= date('M d, Y H:i', strtotime($sub['subscribed_at'])) ?></td>
                    <td><span style="font-size: 0.8rem; color: #64748b;"><?= e($sub['ip_address'] ?: 'N/A') ?></span></td>
                    <td>
                        <span class="status-badge status-<?= e($sub['status']) ?>">
                            <?= e($sub['status']) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/admin-footer.php';
?>

