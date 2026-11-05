<?php
/**
 * Techgroww - Admin Portal: Enquiries Management
 * Enhanced with Automated Email Notification & Delivery Visibility
 */

$adminTitle = 'Project Inquiries';
$adminPage = 'enquiries';

require_once __DIR__ . '/includes/admin-header.php';
require_once __DIR__ . '/../includes/MailService.php';

$pdo = db();
$search = cleanInput($_GET['q'] ?? '');
$filterStatus = cleanInput($_GET['status'] ?? 'all');

// Helper for rendering email status badges
function renderEmailBadge(?string $status, ?string $error = null): string {
    if (!$status) {
        return '<span class="email-badge email-badge-none" title="No email record">Not Queued</span>';
    }
    $statusLower = strtolower($status);
    $escapedError = e($error ?? '');
    switch ($statusLower) {
        case 'sent':
            return '<span class="email-badge email-badge-sent" title="Delivered successfully via SMTP"><i class="fas fa-check-circle"></i> Sent</span>';
        case 'pending':
            return '<span class="email-badge email-badge-pending" title="Pending delivery or retry"><i class="fas fa-clock"></i> Pending</span>';
        case 'failed':
            return '<span class="email-badge email-badge-failed" title="' . ($escapedError ? 'Error: ' . $escapedError : 'Delivery failed') . '"><i class="fas fa-exclamation-triangle"></i> Failed</span>';
        default:
            return '<span class="email-badge email-badge-none">' . e(ucfirst($status)) . '</span>';
    }
}

// Handle Status Update, Retry Emails, or Delete POST actions
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
        } elseif ($action === 'retry_emails' && $id > 0) {
            // Find non-sent outbox notifications for this enquiry
            $notifStmt = $pdo->prepare("SELECT `id`, `email_type` FROM `email_notifications` WHERE `enquiry_id` = :eid AND `status` != 'sent'");
            $notifStmt->execute([':eid' => $id]);
            $toRetry = $notifStmt->fetchAll(PDO::FETCH_ASSOC);

            $retriedCount = 0;
            $successCount = 0;

            if (!empty($toRetry)) {
                foreach ($toRetry as $item) {
                    $retriedCount++;
                    if (MailService::deliverQueuedEmail((int) $item['id'])) {
                        $successCount++;
                    }
                }
            } else {
                // If no outbox records exist (e.g., from prior to outbox deployment), create and send them
                $enqStmt = $pdo->prepare("SELECT * FROM `contact_enquiries` WHERE `id` = :id LIMIT 1");
                $enqStmt->execute([':id' => $id]);
                $enqRow = $enqStmt->fetch(PDO::FETCH_ASSOC);

                if ($enqRow) {
                    // Queue & deliver team alert
                    $salesSubject = "New Techgroww Website Enquiry – " . $enqRow['name'];
                    $salesHtml    = MailService::buildSalesNotificationHtml($id, $enqRow);
                    $sId = MailService::queueNotification($id, SALES_NOTIFICATION_EMAIL, 'Techgroww Team', 'sales_notification', $salesSubject, $salesHtml, $enqRow['email']);
                    $retriedCount++;
                    if ($sId && MailService::deliverQueuedEmail($sId)) {
                        $successCount++;
                    }

                    // Queue & deliver customer acknowledgement
                    $custSubject  = "Thank you for contacting Techgroww";
                    $custHtml     = MailService::buildCustomerAcknowledgementHtml($id, $enqRow);
                    $cId = MailService::queueNotification($id, $enqRow['email'], $enqRow['name'], 'customer_acknowledgement', $custSubject, $custHtml, SALES_NOTIFICATION_EMAIL);
                    $retriedCount++;
                    if ($cId && MailService::deliverQueuedEmail($cId)) {
                        $successCount++;
                    }
                }
            }

            if ($successCount === $retriedCount && $retriedCount > 0) {
                setFlashMessage('success', "All notifications for Enquiry #{$id} sent successfully via SMTP.");
            } else {
                setFlashMessage('warning', "Notification delivery retried for Enquiry #{$id}: {$successCount} succeeded, " . ($retriedCount - $successCount) . " failed. (Check SMTP configuration if persistent).");
            }
        } elseif ($action === 'delete' && $id > 0) {
            // Delete associated outbox records
            $delNotifStmt = $pdo->prepare("DELETE FROM `email_notifications` WHERE `enquiry_id` = :id");
            $delNotifStmt->execute([':id' => $id]);

            $stmt = $pdo->prepare("DELETE FROM `contact_enquiries` WHERE `id` = :id");
            $stmt->execute([':id' => $id]);
            setFlashMessage('success', 'Inquiry #' . $id . ' permanently deleted.');
        }

        header('Location: ' . url('/admin/enquiries.php' . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '')));
        exit;
    }
}

// Fetch inquiries with email notification statuses
$enquiries = [];
if ($pdo) {
    try {
        $sql = "
            SELECT e.*,
                   (SELECT n1.status FROM `email_notifications` n1 WHERE n1.enquiry_id = e.id AND n1.email_type = 'sales_notification' ORDER BY n1.id DESC LIMIT 1) AS sales_email_status,
                   (SELECT n1.sent_at FROM `email_notifications` n1 WHERE n1.enquiry_id = e.id AND n1.email_type = 'sales_notification' ORDER BY n1.id DESC LIMIT 1) AS sales_email_sent_at,
                   (SELECT n1.error_message FROM `email_notifications` n1 WHERE n1.enquiry_id = e.id AND n1.email_type = 'sales_notification' ORDER BY n1.id DESC LIMIT 1) AS sales_email_error,
                   (SELECT n2.status FROM `email_notifications` n2 WHERE n2.enquiry_id = e.id AND n2.email_type = 'customer_acknowledgement' ORDER BY n2.id DESC LIMIT 1) AS customer_email_status,
                   (SELECT n2.sent_at FROM `email_notifications` n2 WHERE n2.enquiry_id = e.id AND n2.email_type = 'customer_acknowledgement' ORDER BY n2.id DESC LIMIT 1) AS customer_email_sent_at,
                   (SELECT n2.error_message FROM `email_notifications` n2 WHERE n2.enquiry_id = e.id AND n2.email_type = 'customer_acknowledgement' ORDER BY n2.id DESC LIMIT 1) AS customer_email_error
            FROM `contact_enquiries` e
            WHERE 1=1
        ";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (e.`name` LIKE :q OR e.`email` LIKE :q OR e.`company` LIKE :q OR e.`service` LIKE :q)";
            $params[':q'] = '%' . $search . '%';
        }

        if (!empty($filterStatus) && $filterStatus !== 'all') {
            $sql .= " AND e.`status` = :st";
            $params[':st'] = $filterStatus;
        }

        $sql .= " ORDER BY e.`created_at` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $enquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('[Enquiries Query Error] ' . $e->getMessage());
    }
}
?>

<style>
.email-badge {
    font-size: 0.72rem;
    font-weight: 600;
    padding: 2px 7px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
}
.email-badge-sent {
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #a7f3d0;
}
.email-badge-pending {
    background: #fffbeb;
    color: #b45309;
    border: 1px solid #fde68a;
}
.email-badge-failed {
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fecaca;
}
.email-badge-none {
    background: #f1f5f9;
    color: #64748b;
    border: 1px solid #e2e8f0;
}
</style>

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
                    <th>Email Delivery</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                <tr>
                    <td colspan="9" style="text-align: center; padding: 3rem; color: #64748b;">
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
                    <td>
                        <div style="display:flex; flex-direction:column; gap:4px;">
                            <div style="font-size:0.75rem; display:flex; align-items:center; gap:4px;">
                                <span style="color:#64748b; font-size:0.7rem;">Alert:</span>
                                <?= renderEmailBadge($enq['sales_email_status'], $enq['sales_email_error']) ?>
                            </div>
                            <div style="font-size:0.75rem; display:flex; align-items:center; gap:4px;">
                                <span style="color:#64748b; font-size:0.7rem;">Client:</span>
                                <?= renderEmailBadge($enq['customer_email_status'], $enq['customer_email_error']) ?>
                            </div>
                        </div>
                    </td>
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
                            
                            <!-- Manual Email Retry Form -->
                            <form action="<?= url('/admin/enquiries.php') ?>" method="POST" title="Retry Email Notifications">
                                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                                <input type="hidden" name="action" value="retry_emails">
                                <input type="hidden" name="id" value="<?= $enq['id'] ?>">
                                <button type="submit" class="btn btn-outline btn-sm" style="color:#2563eb; border-color:#bfdbfe;" title="Retry Email Delivery">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>

                            <!-- Delete Form -->
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
            <strong style="font-size: 1.1rem; color: #0b132b;">Inquiry Details & Delivery Logs</strong>
            <button type="button" id="enquiryModalClose" style="background:transparent; border:none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
        </div>
        <div id="enquiryModalBody"></div>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/admin-footer.php';
?>
