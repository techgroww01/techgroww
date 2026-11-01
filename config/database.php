<?php
/**
 * Techgroww - Secure Database Connection using PDO
 * Core PHP 8+ / MySQL / MariaDB
 */

require_once __DIR__ . '/config.php';

class Database {
    private static ?PDO $instance = null;
    private static ?string $lastError = null;

    /**
     * Singleton PDO connection
     */
    public static function getConnection(): ?PDO {
        if (self::$instance === null) {
            try {
                $dsn = sprintf(
                    'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                    DB_HOST,
                    DB_PORT,
                    DB_NAME
                );

                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
                    PDO::ATTR_TIMEOUT            => 5,
                ];

                self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                // Log error silently without exposing sensitive credentials to visitors
                self::$lastError = $e->getMessage();
                error_log('[Techgroww DB Error] ' . $e->getMessage());
                self::$instance = null;
            }
        }

        return self::$instance;
    }

    /**
     * Check if database is currently reachable
     */
    public static function isConnected(): bool {
        return self::getConnection() !== null;
    }

    /**
     * Return last error message for internal admin inspection
     */
    public static function getLastError(): ?string {
        return self::$lastError;
    }

    // Prevent direct instantiation
    private function __construct() {}
    private function __clone() {}
}

/**
 * Global helper to get PDO instance
 */
function db(): ?PDO {
    return Database::getConnection();
}

