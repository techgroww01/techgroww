-- ==========================================================
-- Techgroww IT Services - Email Notifications & Outbox Schema
-- Migration 01: Create email_notifications table
-- Idempotent and safe for production execution
-- ==========================================================

CREATE TABLE IF NOT EXISTS `email_notifications` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `enquiry_id` INT UNSIGNED NOT NULL,
  `recipient_email` VARCHAR(255) NOT NULL,
  `recipient_name` VARCHAR(150) DEFAULT NULL,
  `email_type` ENUM('sales_notification', 'customer_acknowledgement') NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `body_html` MEDIUMTEXT NOT NULL,
  `reply_to` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('pending', 'sent', 'failed') NOT NULL DEFAULT 'pending',
  `attempts` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `last_attempt_at` DATETIME DEFAULT NULL,
  `sent_at` DATETIME DEFAULT NULL,
  `error_message` TEXT DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_enquiry_id` (`enquiry_id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_type_status` (`email_type`, `status`),
  INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

