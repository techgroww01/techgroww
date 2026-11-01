# Techgroww – Enterprise IT Services & Technology Consulting Website

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL%20%2F%20MariaDB-orange.svg)](https://www.mysql.com/)
[![Hosting](https://img.shields.io/badge/Hosting-Hostinger%20Ready-purple.svg)](https://www.hostinger.in/)
[![License](https://img.shields.io/badge/License-Proprietary-navy.svg)](#)

A complete, production-ready, high-performance corporate website and lead capture system for **Techgroww** (`https://techgroww.co.in`). Built with Core PHP 8+, modern semantic HTML5, CSS3, vanilla JavaScript, and MySQL/MariaDB with PDO prepared statements.

---

## Table of Contents
1. [Overview & Architectural Highlights](#1-overview--architectural-highlights)
2. [Project Folder Structure](#2-project-folder-structure)
3. [System Requirements](#3-system-requirements)
4. [Local Setup & Configuration](#4-local-setup--configuration)
5. [Hostinger MySQL Database Setup](#5-hostinger-mysql-database-setup)
6. [Importing Database via phpMyAdmin](#6-importing-database-via-phpmyadmin)
7. [Configuring Database Credentials](#7-configuring-database-credentials)
8. [Deploying to Hostinger Web Hosting](#8-deploying-to-hostinger-web-hosting)
9. [Connecting Domain (techgroww.co.in) & SSL](#9-connecting-domain-techgrowwcoin--ssl)
10. [Google Search Console & SEO Deployment](#10-google-search-console--seo-deployment)
11. [Email Notifications Configuration](#11-email-notifications-configuration)
12. [Administrative Control Center](#12-administrative-control-center)
13. [Security Best Practices](#13-security-best-practices)

---

## 1. Overview & Architectural Highlights

- **Visual Direction:** Deep navy blue (`#0B132B`) and crisp white primary foundation, paired with royal blue (`#2563EB`) and subtle violet gradients (`#7C3AED`).
- **Zero Third-Party Bloat:** 100% vanilla JavaScript, clean modular CSS variables, and native SVGs. Zero dependency on bloated frontend frameworks or external font libraries.
- **Strict Security Architecture:**
  - Full SQL injection immunity through PDO parameterized prepared statements.
  - CSRF verification tokens on every form submission.
  - Session-based rate limiting against bot spam and brute-force login attempts.
  - Honeypot spam trap fields and submission timing checks.
  - Comprehensive `.htaccess` protection preventing public HTTP inspection of sensitive folders (`config/`, `database/`, `includes/`).
- **Complete SEO Readiness:**
  - Unique titles and meta descriptions for every page.
  - Canonical URLs (`https://techgroww.co.in/...`).
  - Open Graph & Twitter Cards.
  - JSON-LD Structured Data: `Organization`, `WebSite`, `Service`, `BreadcrumbList`, `FAQPage`, and `ContactPage`.
  - XML Sitemap at `/sitemap.xml` and `robots.txt`.
  - Rewrite rules for extensionless, clean URLs (e.g. `/services/web-development`).

---

## 2. Project Folder Structure

```text
website/
├── index.php                          # Homepage with Hero, Services, Why Us, Tech, Process, FAQ, Contact
├── about.php                          # Company Story, Mission, Vision, Engagement Models
├── services.php                       # All Services Directory & Capability Matrix
├── portfolio.php                      # Demonstrations & Architectural Case Studies
├── contact.php                        # Direct Inquiries, Map Details, Onboarding FAQ
├── privacy-policy.php                 # Indian IT Act & GDPR Compliant Privacy Policy
├── terms.php                          # Comprehensive Terms and Conditions
├── 404.php                            # Custom Branded 404 Not Found Page
│
├── services/                          # Dedicated SEO-Optimized Service Landing Pages
│   ├── web-development.php            # Website Development & High-Speed Portals
│   ├── software-development.php       # Bespoke SaaS, ERP/CRM & RESTful APIs
│   ├── automation.php                 # Business Process Automation & RPA
│   ├── ai-solutions.php               # Enterprise AI, Custom LLMs & Document Intelligence
│   ├── digital-marketing.php          # Technical SEO, CRO & High-Intent PPC
│   └── it-consulting.php              # Technology Advisory & Cloud Architecture
│
├── includes/                          # Modular Reusable PHP Components
│   ├── header.php                     # Global Topbar, Nav, Mega-Services Menu, Schema
│   ├── footer.php                     # Footer Grid, Social Links, Newsletter, Copyright
│   ├── functions.php                  # Sanitization, Rate Limiter, CSRF, Breadcrumbs
│   └── service-cta.php                # Reusable Dedicated Service Bottom CTA
│
├── config/                            # Application Configuration Layer
│   ├── config.php                     # Core App Constants, Canonical URLs, Security
│   ├── database.php                   # Singleton PDO Database Wrapper
│   └── config.sample.php              # Template for Local Credentials (Git-Ignored)
│
├── api/                               # AJAX & REST Backend Endpoints
│   ├── contact.php                    # Lead Inquiries Validation & MySQL Storage
│   └── subscribe.php                  # Newsletter Subscription Endpoint
│
├── admin/                             # Lightweight Administrative Control Center
│   ├── index.php                      # Auth Router
│   ├── login.php                      # Secure Authentication with Brute-Force Defense
│   ├── dashboard.php                  # Inquiries Metrics, Recent Leads, System Status
│   ├── enquiries.php                  # Inquiries Table, Search, Status Updater, Delete
│   ├── subscribers.php                # Audience List & One-Click CSV Export
│   ├── logout.php                     # Secure Session Destruction
│   └── includes/
│       ├── auth.php                   # Session Guard & Role Protection
│       ├── admin-header.php           # Admin Navigation & Dynamic Unread Badges
│       └── admin-footer.php           # Admin Scripts & Modals
│
├── assets/                            # Static Client Assets
│   ├── css/
│   │   ├── style.css                  # Main Responsive Stylesheet (Variables & Components)
│   │   └── admin.css                  # Admin Control Center Layout & Modal Styles
│   ├── js/
│   │   ├── main.js                    # Mobile Drawer, Sticky Nav, FAQ Accordion, AJAX Forms
│   │   └── admin.js                   # Inquiry Modal Previews & Admin Interactions
│   └── images/
│       ├── logo.svg                   # Brand Identity (Navy & Gradient)
│       ├── logo-white.svg             # Footer & Dark Surface Logo
│       └── favicon.svg                # Modern Browser Favicon
│
├── database/
│   └── schema.sql                     # Complete Database Schema & Seed Data
│
├── .htaccess                          # Apache Rewrite, Security Headers, HTTPS, Compression
├── robots.txt                         # Search Engine Crawling Rules
├── sitemap.xml                        # Search Engine XML Index
├── .gitignore                         # Secret & Temporary File Exclusions
└── README.md                          # Full Production & Deployment Guide
```

---

## 3. System Requirements

- **PHP Version:** PHP 8.0, 8.1, 8.2, or 8.3+
- **PHP Extensions:** `pdo_mysql`, `mbstring`, `json`, `filter`, `session`, `openssl`
- **Web Server:** Apache 2.4+ (with `mod_rewrite`, `mod_headers`, `mod_deflate`, `mod_expires` enabled)
- **Database:** MySQL 5.7+ or MariaDB 10.3+
- **Host:** Fully compatible with Hostinger Shared Web Hosting, Cloud Hosting, and VPS.

---

## 4. Local Setup & Configuration

To test or develop locally using XAMPP, WampServer, Laragon, or PHP's built-in server:

1. Clone or copy the project files to your web root:
   ```bash
   cd c:/xampp/htdocs/techgroww
   ```
2. Create your local config file:
   ```bash
   cp config/config.sample.php config/config.local.php
   ```
3. Edit `config/config.local.php` with your local database credentials:
   ```php
   return [
       'DB_HOST' => 'localhost',
       'DB_NAME' => 'techgroww_db',
       'DB_USER' => 'root',
       'DB_PASS' => '',
       'DB_PORT' => '3306',
   ];
   ```
4. Start the local server:
   ```bash
   php -S localhost:8000
   ```
5. Open your browser at `http://localhost:8000`.

---

## 5. Hostinger MySQL Database Setup

1. Log into your **Hostinger hPanel** (`https://hpanel.hostinger.com`).
2. Navigate to **Databases** &rarr; **Management**.
3. Under **Create a New MySQL Database and Database User**:
   - **MySQL Database Name:** e.g. `u123456789_techgroww`
   - **MySQL Username:** e.g. `u123456789_admin`
   - **Password:** Generate a strong random password (save this securely).
4. Click **Create**.
5. Note down the **Database Name**, **Username**, **Password**, and **MySQL Host** (usually `localhost`).

---

## 6. Importing Database via phpMyAdmin

1. In Hostinger hPanel under **Databases**, find your newly created database.
2. Click **Enter phpMyAdmin**.
3. Select your database name in the left sidebar.
4. Click the **Import** tab on the top navigation bar.
5. Under **File to import**, click **Choose File** and select `database/schema.sql` from your project folder.
6. Ensure the character set is set to **utf-8**.
7. Scroll down and click **Import** (or **Go**).
8. Verify that the three tables are created:
   - `contact_enquiries`
   - `newsletter_subscribers`
   - `admin_users`

---

## 7. Configuring Database Credentials

On Hostinger, create a file named `config/config.local.php` via the Hostinger File Manager (or upload it via FTP):

```php
<?php
/**
 * Techgroww - Live Hostinger Database Configuration
 * Note: Never commit this file to Git.
 */

return [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'u123456789_techgroww',      // Your Hostinger DB Name
    'DB_USER' => 'u123456789_admin',          // Your Hostinger DB User
    'DB_PASS' => 'YourHostingerDatabasePassword!', // Your Hostinger DB Password
    'DB_PORT' => '3306',
];
```

*Note: The website gracefully renders all public pages even before database configuration is in place.*

---

## 8. Deploying to Hostinger Web Hosting

### Option A: Via Hostinger Git Deployment (Recommended)
1. In Hostinger hPanel, go to **Advanced** &rarr; **GIT**.
2. Under **Repository**:
   - **Repository URL:** `https://github.com/techgroww01/techgroww.git`
   - **Branch:** `main`
   - **Install Path:** `public_html`
3. Click **Create** &rarr; **Deploy**.
4. Create `config/config.local.php` inside `public_html/config/` with your database credentials.

### Option B: Via Hostinger File Manager
1. In Hostinger hPanel, open **File Manager**.
2. Navigate to `public_html`.
3. Upload all project files directly into `public_html`.
4. Ensure `.htaccess` is present (make sure hidden files are enabled in File Manager settings).

---

## 9. Connecting Domain (techgroww.co.in) & SSL

1. In Hostinger hPanel, navigate to **Domains** &rarr; verify `techgroww.co.in` points to your hosting account.
2. If using external nameservers, ensure your DNS A-Record points to your Hostinger server IP.
3. Go to **Security** &rarr; **SSL**.
4. Select `techgroww.co.in` and click **Install SSL** (Hostinger provides free Let's Encrypt lifetime SSL).
5. Ensure **Force HTTPS** is toggled ON (the included `.htaccess` also enforces HTTPS automatically).

---

## 10. Google Search Console & SEO Deployment

1. Go to [Google Search Console](https://search.google.com/search-console).
2. Add your domain property: `https://techgroww.co.in`.
3. Verify ownership using the HTML tag or DNS TXT record method.
4. Navigate to **Sitemaps** in the left sidebar.
5. In the **Add a new sitemap** input field, enter:
   ```text
   sitemap.xml
   ```
6. Click **Submit**. Google will crawl all 13 canonical URLs.

---

## 11. Email Notifications Configuration

When a prospect submits the contact form, an instant HTML notification is dispatched.

To customize notification recipients:
1. Open `config/config.php`.
2. Locate the email constants:
   ```php
   define('CONTACT_EMAIL', 'contact@techgroww.co.in');
   define('MAIL_NOTIFICATION_RECIPIENT', 'contact@techgroww.co.in');
   define('MAIL_FROM_ADDRESS', 'noreply@techgroww.co.in');
   ```
3. In Hostinger hPanel, ensure you have created the email account `contact@techgroww.co.in` under **Emails** &rarr; **Email Accounts** so that server-dispatched mail passes SPF/DKIM verification.

---

## 12. Administrative Control Center

Authorized administrators can manage client leads, update workflow statuses, and export newsletter subscribers.

- **Admin Login URL:** `https://techgroww.co.in/admin/login.php`
- **Default Username:** `admin`
- **Default Password:** `TechgrowwAdmin@2026!`

> **Important:** Immediately upon initial login, navigate to your admin profile or update your password hash in `admin_users` using `password_hash('NewPassword', PASSWORD_DEFAULT);`.

### Admin Capabilities:
- **Dashboard (`/admin/dashboard.php`):** High-level KPI metrics, real-time unread lead badges, and system status.
- **Inquiries (`/admin/enquiries.php`):** Full-text search, status filters (New, Contacted, In Progress, Completed, Archived), quick status dropdown updates, and lead modal inspection.
- **Subscribers (`/admin/subscribers.php`):** View all active subscribers and export to CSV for email marketing campaigns.

---

## 13. Security Best Practices

- **Zero Credentials in Git:** The `.gitignore` file strictly excludes `config/config.local.php` and `.env` files.
- **Directory Access Control:** Apache `.htaccess` returns `403 Forbidden` for any direct HTTP request targeting `config/`, `database/`, or `includes/`.
- **Brute-Force Protection:** The login system enforces a 5-attempt rate limit per 15-minute window.
- **CSRF Tokens:** All state-changing POST requests (contact form, newsletter, admin status updates, delete actions) require valid cryptographic session tokens.
- **Sanitized Outputs:** All user inputs are sanitized with `cleanInput()` and escaped via `htmlspecialchars()` (`e()`) prior to rendering.

---

&copy; 2026 **Techgroww IT Solutions**. All rights reserved.
Developed for production deployment on Hostinger Web Hosting.
