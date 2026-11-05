<?php
/**
 * Techgroww - Automated Email Outbox Retry Daemon / Cron Job
 * 
 * Execution Modes:
 * 1. CLI / Hostinger Cron Task:
 *    php -f /home/u215281564/domains/techgroww.co.in/public_html/cron/retry-pending-emails.php
 * 2. Secure HTTPS Webhook / Healthcheck:
 *    curl -s "https://techgroww.co.in/cron/retry-pending-emails.php?token=techgroww_cron_e891b2c4d9"
 * 
 * Security:
 * Strictly blocks unauthorized browser requests.
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/MailService.php';

$isCli = (php_sapi_name() === 'cli' || empty($_SERVER['REMOTE_ADDR']));
$token = $_GET['token'] ?? ($_POST['token'] ?? '');

// Verify authorization
if (!$isCli) {
    if (empty($token) || !hash_equals(CRON_SECRET_TOKEN, $token)) {
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => false,
            'error'   => 'Unauthorized. Valid cron secret token required.',
        ]);
        exit;
    }
}

// Ensure database connection is active
$pdo = db();
if (!$pdo) {
    $errorMsg = 'Database connection failed during email retry cron execution.';
    error_log('[Techgroww Cron Error] ' . $errorMsg);
    if ($isCli) {
        fwrite(STDERR, "[CRON ERROR] {$errorMsg}\n");
    } else {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'error' => $errorMsg]);
    }
    exit(1);
}

$startTime = microtime(true);
$maxExecutionSeconds = 45;
$batchLimit = 25;
$maxAttempts = 5;

// Select pending or failed notifications that have not exceeded max retry attempts
// Order by created_at ASC to maintain FIFO order
$stmt = $pdo->prepare("
    SELECT `id`, `enquiry_id`, `email_type`, `recipient_email`, `attempts`, `status`
    FROM `email_notifications`
    WHERE `status` IN ('pending', 'failed')
      AND `attempts` < :max_attempts
    ORDER BY `created_at` ASC
    LIMIT :limit
");
$stmt->bindValue(':max_attempts', $maxAttempts, PDO::PARAM_INT);
$stmt->bindValue(':limit', $batchLimit, PDO::PARAM_INT);
$stmt->execute();
$queue = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalFound = count($queue);
$succeeded  = 0;
$failed     = 0;
$details    = [];

foreach ($queue as $item) {
    // Avoid PHP timeout on web execution
    if ((microtime(true) - $startTime) > $maxExecutionSeconds) {
        break;
    }

    $id = (int) $item['id'];

    // Deliver queued email
    $delivered = MailService::deliverQueuedEmail($id);

    if ($delivered) {
        $succeeded++;
        $details[] = [
            'id'        => $id,
            'enquiry_id'=> $item['enquiry_id'],
            'type'      => $item['email_type'],
            'recipient' => $item['recipient_email'],
            'status'    => 'sent',
        ];
    } else {
        $failed++;
        $details[] = [
            'id'        => $id,
            'enquiry_id'=> $item['enquiry_id'],
            'type'      => $item['email_type'],
            'recipient' => $item['recipient_email'],
            'status'    => 'retry_failed',
        ];
    }

    // Small delay between SMTP sends to prevent provider rate-limits
    usleep(150000); // 150ms
}

$executionTime = round(microtime(true) - $startTime, 3);
$response = [
    'success'        => true,
    'timestamp'      => date('Y-m-d H:i:s T'),
    'found_in_queue' => $totalFound,
    'processed'      => $succeeded + $failed,
    'succeeded'      => $succeeded,
    'failed'         => $failed,
    'duration_sec'   => $executionTime,
    'details'        => $details,
];

if ($isCli) {
    echo "=== Techgroww Email Notification Retry Cron ===\n";
    echo "Processed: " . ($succeeded + $failed) . " / {$totalFound}\n";
    echo "Succeeded: {$succeeded}\n";
    echo "Failed:    {$failed}\n";
    echo "Duration:  {$executionTime}s\n";
    echo "Done.\n";
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

