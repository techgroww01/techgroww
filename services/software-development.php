<?php
/**
 * Techgroww - Custom Software Development Service Page
 * Domain: https://techgroww.co.in/services/software-development
 */

$pageTitle = 'Custom Software Development Company | Enterprise Solutions | Techgroww';
$pageDescription = 'Techgroww is a premier custom software development company in India. We architect tailor-made SaaS platforms, enterprise ERP & CRM systems, scalable APIs, and secure cloud applications built on Core PHP 8+ and modern databases.';
$canonicalUrl = 'https://techgroww.co.in/services/software-development';
$currentPage = 'service-software-development';

$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Custom Software Development Services',
    'serviceType' => 'Software Development',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'url' => 'https://techgroww.co.in'
    ],
    'description' => 'Custom software engineering for SaaS platforms, enterprise business applications, relational databases, and RESTful APIs.',
    'areaServed' => 'IN',
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Software Engineering Offerings',
        'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Bespoke SaaS Platforms']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Enterprise ERP & CRM Portals']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Secure RESTful & Webhook APIs']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Legacy System Refactoring']]
        ]
    ]
];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Software Development Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Custom Software Development</div>
            <h1 class="page-hero-title">Scalable, Mission-Critical Custom Software Engineering</h1>
            <p class="page-hero-sub">
                Off-the-shelf software forces your operations to compromise. Techgroww builds bespoke SaaS applications, enterprise operations platforms, and high-concurrency database architectures tailored precisely to your company's unique workflows.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '/services', 'Custom Software Development' => '']) ?>

<!-- Problem vs Solution Section -->
<section class="section-padding bg-white" aria-label="Why Custom Software Matters">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">Operational Bottlenecks</div>
                <h2 class="section-title">Escape The Limitations of Generic Software</h2>
                <p class="intro-lead-text">
                    Paying recurring monthly subscription fees for bulky software that only covers 60% of your business needs wastes capital and restricts growth.
                </p>
                <p class="intro-body-text">
                    As your enterprise expands, standard software packages become rigid barriers: your data remains trapped in proprietary silos, your developers cannot modify the core logic, and per-seat licensing fees skyrocket exponentially.
                </p>
                <p class="intro-body-text">
                    Custom software engineering gives you 100% intellectual property ownership, zero recurring per-user fees, and complete flexibility to automate workflows exactly as your business evolves.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>100% IP Ownership & Zero Per-Seat Fees</h4>
                        <p>You own the complete codebase, database schemas, and intellectual property without ongoing third-party vendor lock-in.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Optimized Relational Database Design</h4>
                        <p>Fully normalized MySQL/MariaDB structures with indexed foreign keys, transaction rollbacks, and fast complex queries.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#f5f3ff; color:#7c3aed;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Enterprise Role-Based Access Control</h4>
                        <p>Granular user permission matrices, audit logging, encrypted credentials, and session management security.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Software Capabilities -->
<section class="section-padding bg-light" aria-label="Custom Software Offerings">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Engineered Solutions</div>
            <h2 class="section-title">What We Build For Growing Enterprises</h2>
            <p class="section-subtitle">
                Robust, clean-code applications developed with PHP 8+ and modern databases.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <h3>Custom SaaS Applications</h3>
                <p>Multi-tenant software platforms with billing subscriptions, usage metering, automated onboarding, and enterprise tenant data separation.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <h3>Enterprise ERP & Operations Portals</h3>
                <p>Centralized business management hubs uniting inventory, payroll, order fulfillment, multi-branch tracking, and automated financial reporting.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <h3>API Microservices & Webhooks</h3>
                <p>High-throughput RESTful and webhook endpoints with strict rate limiting, JWT token authorization, and detailed request telemetry.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                </div>
                <h3>Legacy Refactoring & Migration</h3>
                <p>Modernizing legacy PHP 5.x/7.x applications to PHP 8.2+, removing deprecated functions, eliminating memory leaks, and speeding up response times.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                </div>
                <h3>Financial & Payment Systems</h3>
                <p>PCI-compliant checkout pipelines, recurring direct debits, tax invoice calculation, ledger reconciliation, and payment gateway webhooks.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>Custom Security & Admin Panels</h3>
                <p>Tailored administrative backends with search, status filters, bulk data export, and secure role-based permissions without third-party plugin vulnerabilities.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Service Bottom CTA -->
<?php
$serviceName = 'Custom Software Development';
$serviceSlug = 'software-development';
$serviceHighlight = 'Stop relying on generic software. Build proprietary technology that becomes your lasting competitive moat.';
require __DIR__ . '/../includes/service-cta.php';
?>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
