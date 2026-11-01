<?php
/**
 * Techgroww - Admin Portal: Enquiries Management
 */

$adminTitle = 'Project Inquiries';
$adminPage = 'enquiries';

require_once __DIR__ . '/includes/admin-header.php';

$pdo = db();
$search = cleanInput($_GET['q'] ?? '');
$filterStatus = cleanInput($_GET['status'] ?? 'all');

// Handle Status Update or Delete POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    $token = $_POST['csrf_token'] ?? '';
    if (verifyCsrfToken($token)) {
        $action = $_POST['action'] ?? '';
        $id = (int) ($_POST['id'] ?? 0);

        if ($action === 'update_status' && $id > 0) {
            $newStatus = cleanInput($_POST['status'] ?? 'new');
            $allowed = ['new', 'contacted', 'in_progress', 'completed', 'archived'];
            if (in_array($newStatus, $allowed, true)) {
                $stmt = $pdo->prepare("UPDATE `contact_enquiries` SET `status` = :st WHERE `id` = :id");
                $stmt->execute([':st' => $newStatus, ':id' => $id]);
                setFlashMessage('success', 'Inquiry #' . $id . ' status updated to ' . ucfirst(str_replace('_', ' ', $newStatus)));
            }
        } elseif ($action === 'delete' && $id > 0) {
            $stmt = $pdo->prepare("DELETE FROM `contact_enquiries` WHERE `id` = :id");
            $stmt->execute([':id' => $id]);
            setFlashMessage('success', 'Inquiry #' . $id . ' permanently deleted.');
        }

        header('Location: ' . url('/admin/enquiries.php' . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '')));
        exit;
    }
}

// Fetch inquiries with filters
$enquiries = [];
if ($pdo) {
    try {
        $sql = "SELECT * FROM `contact_enquiries` WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (`name` LIKE :q OR `email` LIKE :q OR `company` LIKE :q OR `service` LIKE :q)";
            $params[':q'] = '%' . $search . '%';
        }

        if (!empty($filterStatus) && $filterStatus !== 'all') {
            $sql .= " AND `status` = :st";
            $params[':st'] = $filterStatus;
        }

        $sql .= " ORDER BY `created_at` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $enquiries = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log('[Enquiries Query Error] ' . $e->getMessage());
    }
}
?>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Manage Client Inquiries (<?= count($enquiries) ?>)</h2>

        <!-- Filters Form -->
        <form action="<?= url('/admin/enquiries.php') ?>" method="GET" class="admin-filters-bar">
            <input type="text" name="q" value="<?= e($search) ?>" class="admin-search-input" placeholder="Search name, email, service...">
            
            <select name="status" class="admin-filter-select" onchange="this.form.submit()">
                <option value="all" <?= ($filterStatus === 'all') ? 'selected' : '' ?>>All Statuses</option>
                <option value="new" <?= ($filterStatus === 'new') ? 'selected' : '' ?>>New</option>
                <option value="contacted" <?= ($filterStatus === 'contacted') ? 'selected' : '' ?>>Contacted</option>
                <option value="in_progress" <?= ($filterStatus === 'in_progress') ? 'selected' : '' ?>>In Progress</option>
                <option value="completed" <?= ($filterStatus === 'completed') ? 'selected' : '' ?>>Completed</option>
                <option value="archived" <?= ($filterStatus === 'archived') ? 'selected' : '' ?>>Archived</option>
            </select>

            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <?php if (!empty($search) || $filterStatus !== 'all'): ?>
            <a href="<?= url('/admin/enquiries.php') ?>" class="btn btn-outline btn-sm">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prospect</th>
                    <th>Service & Scope</th>
                    <th>Budget</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                <tr>
                    <td colspan="8" style="text-align: center; padding: 3rem; color: #64748b;">
                        No inquiries matched your criteria.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($enquiries as $enq): ?>
                <tr>
                    <td>#<?= $enq['id'] ?></td>
                    <td>
                        <strong><?= e($enq['name']) ?></strong>
                        <div><a href="mailto:<?= e($enq['email']) ?>" style="font-size: 0.8rem;"><?= e($enq['email']) ?></a></div>
                        <?php if (!empty($enq['phone'])): ?>
                        <div style="font-size: 0.75rem; color: #64748b;"><a href="tel:<?= e($enq['phone']) ?>"><?= e($enq['phone']) ?></a></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong style="color: #0b132b;"><?= e($enq['service']) ?></strong>
                        <?php if (!empty($enq['company'])): ?>
                        <div style="font-size: 0.75rem; color: #64748b;">Org: <?= e($enq['company']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td><span style="font-weight: 600; color: #059669;"><?= e($enq['budget'] ?: 'N/A') ?></span></td>
                    <td><?= date('M d, Y H:i', strtotime($enq['created_at'])) ?></td>
                    <td>
                        <span class="status-badge status-<?= e($enq['status']) ?>">
                            <?= e(str_replace('_', ' ', $enq['status'])) ?>
                        </span>
                    </td>
                    <td>
                        <!-- Quick status updater form -->
                        <form action="<?= url('/admin/enquiries.php') ?>" method="POST" style="display:inline-flex; align-items:center; gap:0.25rem;">
                            <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                            <input type="hidden" name="action" value="update_status">
                            <input type="hidden" name="id" value="<?= $enq['id'] ?>">
                            <select name="status" class="admin-filter-select" style="font-size: 0.75rem; padding: 0.35rem 0.5rem;" onchange="this.form.submit()">
                                <option value="new" <?= ($enq['status'] === 'new') ? 'selected' : '' ?>>New</option>
                                <option value="contacted" <?= ($enq['status'] === 'contacted') ? 'selected' : '' ?>>Contacted</option>
                                <option value="in_progress" <?= ($enq['status'] === 'in_progress') ? 'selected' : '' ?>>In Progress</option>
                                <option value="completed" <?= ($enq['status'] === 'completed') ? 'selected' : '' ?>>Completed</option>
                                <option value="archived" <?= ($enq['status'] === 'archived') ? 'selected' : '' ?>>Archived</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <div style="display:flex; gap:0.35rem; align-items:center;">
                            <button type="button" class="btn btn-outline btn-sm js-view-enquiry" data-enquiry="<?= e(json_encode($enq)) ?>">
                                View
                            </button>
                            <form action="<?= url('/admin/enquiries.php') ?>" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this enquiry?');">
                                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $enq['id'] ?>">
                                <button type="submit" class="btn btn-outline btn-sm" style="color:#ef4444; border-color:#fecaca;" title="Delete">
                                    &times;
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Backdrop -->
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
