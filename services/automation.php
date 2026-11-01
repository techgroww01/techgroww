<?php
/**
 * Techgroww - Business Process Automation Service Page
 * Domain: https://techgroww.co.in/services/automation
 */

$pageTitle = 'Business Automation Solutions | Workflow Automation Company | Techgroww';
$pageDescription = 'Streamline operations with Techgroww business automation solutions in India. We automate repetitive clerical tasks, sync multi-channel CRM & ERP platforms, and engineer resilient webhook workflows.';
$canonicalUrl = 'https://techgroww.co.in/services/automation';
$currentPage = 'service-automation';

$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Business Process Automation Solutions',
    'serviceType' => 'Process Automation',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'url' => 'https://techgroww.co.in'
    ],
    'description' => 'End-to-end business process automation, CRM integration, automated billing, and API webhook pipelines.',
    'areaServed' => 'IN',
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Automation Capabilities',
        'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Cross-Platform Data Synchronization']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Automated Customer Communication (WhatsApp / Email)']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Scheduled Batch Processing & Reporting']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'ERP & Inventory Sync Pipelines']]
        ]
    ]
];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Business Automation Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Business Automation Solutions</div>
            <h1 class="page-hero-title">Eliminate Manual Friction With Intelligent Automation</h1>
            <p class="page-hero-sub">
                Repetitive data entry and disconnected software slow your business down. Techgroww builds reliable, automated workflow pipelines that connect your tools, sync records instantaneously, and let your team focus on high-value strategy.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '/services', 'Business Automation' => '']) ?>

<!-- Problem vs Solution Section -->
<section class="section-padding bg-white" aria-label="Why Automation is Crucial">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">The Hidden Cost of Manual Work</div>
                <h2 class="section-title">Manual Data Entry Kills Growth & Introduces Costly Mistakes</h2>
                <p class="intro-lead-text">
                    When customer inquiries, invoices, or inventory records are keyed in by hand across multiple systems, delays and errors are inevitable.
                </p>
                <p class="intro-body-text">
                    Valuable employees spend hours every week copying numbers from Excel sheets into accounting software, manually chasing overdue payments, or forwarding lead emails. A single missed typo can cost thousands in lost revenue.
                </p>
                <p class="intro-body-text">
                    Techgroww engineers automated backend pipelines that run 24/7/365 in the background. Inquiries trigger instant WhatsApp notifications, sales automatically generate verified tax invoices, and databases sync in real-time with zero human intervention.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#f5f3ff; color:#7c3aed;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>90% Reduction in Processing Time</h4>
                        <p>Workflows that previously took hours are completed automatically in milliseconds, dramatically accelerating turnaround times.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Zero Human Typing Errors</h4>
                        <p>Direct API-to-API validation guarantees data consistency across accounting, warehouse inventory, and sales pipelines.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Predictable Operational Scaling</h4>
                        <p>Handle a 10x surge in order or inquiry volume without being forced to hire additional clerical data-entry staff.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Automation Capabilities -->
<section class="section-padding bg-light" aria-label="Automation Capabilities">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Automation Pipelines</div>
            <h2 class="section-title">What Techgroww Automates For You</h2>
            <p class="section-subtitle">
                Reliable automated workflows built on resilient asynchronous queues and webhooks.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                </div>
                <h3>Lead Capture & Instant CRM Sync</h3>
                <p>Website inquiries immediately validate, trigger email alerts to sales reps, log into CRM platforms, and dispatch welcome WhatsApp messages in real time.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                </div>
                <h3>Automated Invoicing & Collections</h3>
                <p>Generate compliant PDF invoices upon payment confirmation, sync tax ledgers, and trigger automated polite reminder sequences for outstanding receivables.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <h3>Multi-Channel Inventory Synchronization</h3>
                <p>Keep inventory quantities synchronized across your website, Amazon, Flipkart, and physical retail POS in real time to avoid overselling.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                </div>
                <h3>Automated PDF & Document Processing</h3>
                <p>Extract order data, vendor receipts, or scanned bills automatically and parse clean structured rows directly into MySQL database tables.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                </div>
                <h3>Automated WhatsApp & Email Notifications</h3>
                <p>Keep customers informed at every stage of their order, service ticket, or delivery status with automated transactional messaging.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                </div>
                <h3>Scheduled Daily & Weekly Business Reports</h3>
                <p>Automate aggregation cron jobs that calculate daily sales, active users, and inventory shortages, compiling clean summary reports delivered to leadership.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Service Bottom CTA -->
<?php
$serviceName = 'Business Process Automation';
$serviceSlug = 'automation';
$serviceHighlight = 'Reclaim hundreds of lost productive hours every month with resilient, error-free automated pipelines.';
require __DIR__ . '/../includes/service-cta.php';
?>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
