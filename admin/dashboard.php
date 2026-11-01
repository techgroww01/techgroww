<?php
/**
 * Techgroww - Admin Portal Dashboard
 */

$adminTitle = 'Executive Dashboard';
$adminPage = 'dashboard';

require_once __DIR__ . '/includes/admin-header.php';

$pdo = db();
$totalEnquiries = 0;
$newEnquiries = 0;
$inProgressEnquiries = 0;
$totalSubscribers = 0;
$recentEnquiries = [];

if ($pdo) {
    try {
        $totalEnquiries = (int) $pdo->query("SELECT COUNT(*) FROM `contact_enquiries`")->fetchColumn();
        $newEnquiries = (int) $pdo->query("SELECT COUNT(*) FROM `contact_enquiries` WHERE `status` = 'new'")->fetchColumn();
        $inProgressEnquiries = (int) $pdo->query("SELECT COUNT(*) FROM `contact_enquiries` WHERE `status` IN ('contacted', 'in_progress')")->fetchColumn();
        $totalSubscribers = (int) $pdo->query("SELECT COUNT(*) FROM `newsletter_subscribers` WHERE `status` = 'active'")->fetchColumn();

        $stmt = $pdo->query("SELECT * FROM `contact_enquiries` ORDER BY `created_at` DESC LIMIT 6");
        $recentEnquiries = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log('[Dashboard Query Error] ' . $e->getMessage());
    }
}
?>

<!-- Database Connection Status Warning if not yet connected -->
<?php if (!$pdo): ?>
<div style="background: #fffbeb; border: 1px solid #fde68a; color: #92400e; padding: 1.25rem; border-radius: var(--admin-radius); margin-bottom: 2rem;">
    <div style="display: flex; align-items: flex-start; gap: 0.85rem;">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0; margin-top:2px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <div>
            <strong style="display:block; font-size: 1rem; margin-bottom: 0.25rem;">Database Not Connected</strong>
            <span>Hostinger database credentials are not configured or the MySQL database is pending import. Please create a database in Hostinger hPanel, import <code>database/schema.sql</code> via phpMyAdmin, and update <code>config/config.local.php</code>.</span>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- High-Level Metrics Grid -->
<div class="admin-metrics-grid">
    <div class="metric-card">
        <div class="metric-card-title">Total Inquiries</div>
        <div class="metric-card-value"><?= number_format($totalEnquiries) ?></div>
        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.5rem;">All time submissions</div>
    </div>

    <div class="metric-card" style="border-left: 4px solid #2563eb;">
        <div class="metric-card-title">New Inquiries</div>
        <div class="metric-card-value" style="color: #2563eb;"><?= number_format($newEnquiries) ?></div>
        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.5rem;">Requires follow-up</div>
    </div>

    <div class="metric-card" style="border-left: 4px solid #7c3aed;">
        <div class="metric-card-title">In Progress</div>
        <div class="metric-card-value" style="color: #7c3aed;"><?= number_format($inProgressEnquiries) ?></div>
        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.5rem;">Under proposal review</div>
    </div>

    <div class="metric-card" style="border-left: 4px solid #059669;">
        <div class="metric-card-title">Subscribers</div>
        <div class="metric-card-value" style="color: #059669;"><?= number_format($totalSubscribers) ?></div>
        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.5rem;">Active email list</div>
    </div>
</div>

<!-- Recent Inquiries Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Recent Project Inquiries</h2>
        <a href="<?= url('/admin/enquiries.php') ?>" style="font-size: 0.875rem; font-weight: 700; color: #2563eb;">
            View All Inquiries &rarr;
        </a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Service Required</th>
                    <th>Budget</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recentEnquiries)): ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 2.5rem; color: #64748b;">
                        No project inquiries recorded yet. When prospects submit the contact form, submissions will appear here in real time.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($recentEnquiries as $enq): ?>
                <tr>
                    <td>
                        <strong><?= e($enq['name']) ?></strong>
                        <?php if (!empty($enq['company'])): ?>
                        <div style="font-size: 0.75rem; color: #64748b;"><?= e($enq['company']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td><a href="mailto:<?= e($enq['email']) ?>"><?= e($enq['email']) ?></a></td>
                    <td><?= e($enq['service']) ?></td>
                    <td><span style="font-weight: 600; color: #059669;"><?= e($enq['budget'] ?: 'Not Specified') ?></span></td>
                    <td><?= date('M d, Y H:i', strtotime($enq['created_at'])) ?></td>
                    <td>
                        <span class="status-badge status-<?= e($enq['status']) ?>">
                            <?= e(str_replace('_', ' ', $enq['status'])) ?>
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline btn-sm js-view-enquiry" data-enquiry="<?= e(json_encode($enq)) ?>">
                            View Details
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Reusable Modal Backdrop -->
<div class="admin-modal-backdrop" id="enquiryModalBackdrop">
    <div class="admin-modal">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <strong style="font-size: 1.1rem; color: #0b132b;">Inquiry Details</strong>
            <button type="button" id="enquiryModalClose" style="background:transparent; border:none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
        </div>
        <div id="enquiryModalBody"></div>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/admin-footer.php';
?>

