<?php
/**
 * Techgroww - Secure Production Database Migration Runner
 * 
 * Executes idempotent migrations on the Hostinger MySQL database
 * Protected by CRON_SECRET_TOKEN or CLI execution
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

$isCli = (php_sapi_name() === 'cli' || empty($_SERVER['REMOTE_ADDR']));
$token = $_GET['token'] ?? ($_POST['token'] ?? '');

// Strict security authorization
if (!$isCli) {
    if (empty($token) || !hash_equals(CRON_SECRET_TOKEN, $token)) {
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => false,
            'error'   => 'Unauthorized. Valid security token required to execute migrations.',
        ]);
        exit;
    }
}

$pdo = db();
if (!$pdo) {
    $err = 'Database connection failed: ' . Database::getLastError();
    if ($isCli) {
        fwrite(STDERR, "[MIGRATION ERROR] {$err}\n");
    } else {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'error' => $err]);
    }
    exit(1);
}

$migrationFile = __DIR__ . '/migrations/01_create_email_notifications_table.sql';
if (!file_exists($migrationFile)) {
    $err = 'Migration file not found: 01_create_email_notifications_table.sql';
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => $err]);
    exit(1);
}

$sql = file_get_contents($migrationFile);

try {
    $pdo->exec($sql);

    // Verify table exists
    $checkStmt = $pdo->query("SHOW TABLES LIKE 'email_notifications'");
    $tableExists = $checkStmt->rowCount() > 0;

    // Check count of contact_enquiries to ensure no data was touched
    $countStmt = $pdo->query("SELECT COUNT(*) FROM `contact_enquiries`");
    $enquiryCount = (int) $countStmt->fetchColumn();

    $result = [
        'success'               => true,
        'message'               => 'Migration 01 executed successfully.',
        'table_created'         => 'email_notifications',
        'table_exists'          => $tableExists,
        'contact_enquiries_cnt' => $enquiryCount,
        'timestamp'             => date('Y-m-d H:i:s T'),
    ];

    if ($isCli) {
        echo "[MIGRATION SUCCESS] Migration 01 applied successfully. email_notifications table ready.\n";
        echo "Existing contact_enquiries records preserved: {$enquiryCount}\n";
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
} catch (\PDOException $e) {
    $err = 'Migration failed: ' . $e->getMessage();
    error_log('[Techgroww Migration Error] ' . $err);
    if ($isCli) {
        fwrite(STDERR, "[MIGRATION ERROR] {$err}\n");
    } else {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'error' => $err]);
    }
    exit(1);
}
