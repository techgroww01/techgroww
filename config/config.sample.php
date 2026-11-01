<?php
/**
 * Techgroww - Local Configuration Sample
 * 
 * Instructions:
 * 1. Copy this file to `config/config.local.php`
 * 2. Fill in your Hostinger MySQL database details
 * 3. Enter your Google Workspace App Password for sales@techgroww.co.in
 * 4. Never commit `config.local.php` to Git (it is in .gitignore)
 */

return [
    // Database Configuration
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'u215281564_techgroww',
    'DB_USER' => 'u215281564_user',
    'DB_PASS' => 'YOUR_DATABASE_PASSWORD',
    'DB_PORT' => '3306',

    // Authenticated SMTP Configuration (Google Workspace)
    'SMTP_HOST'       => 'smtp.gmail.com',
    'SMTP_PORT'       => 587,
    'SMTP_ENCRYPTION' => 'tls', // STARTTLS
    'SMTP_USER'       => 'sales@techgroww.co.in',
    'SMTP_PASS'       => 'YOUR_16_DIGIT_GOOGLE_APP_PASSWORD', // Google Workspace App Password (e.g. xxxx xxxx xxxx xxxx)
    
    // Sender & Recipient Details
    'MAIL_FROM_NAME'           => 'Techgroww Website',
    'MAIL_FROM_ADDRESS'        => 'sales@techgroww.co.in',
    'SALES_NOTIFICATION_EMAIL' => 'sales@techgroww.co.in',

    // Secret Token for Automated Cron Retry Script
    'CRON_SECRET_TOKEN' => 'techgroww_cron_e891b2c4d9',
];
