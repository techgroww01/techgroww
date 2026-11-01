<?php
/**
 * Techgroww - IT Consulting & Strategy Service Page
 * Domain: https://techgroww.co.in/services/it-consulting
 */

$pageTitle = 'IT Consulting Services | Technology Strategy & Cloud Advisory | Techgroww';
$pageDescription = 'Make confident technology decisions with Techgroww IT consulting services in India. We advise business leaders on software architecture, cloud migration, cybersecurity audits, and digital transformation roadmaps.';
$canonicalUrl = 'https://techgroww.co.in/services/it-consulting';
$currentPage = 'service-it-consulting';

$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'IT Consulting & Strategy Services',
    'serviceType' => 'IT Consulting',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'url' => 'https://techgroww.co.in'
    ],
    'description' => 'Strategic technology advisory, software architecture reviews, cloud cost rationalization, and digital transformation consulting.',
    'areaServed' => 'IN',
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Consulting Advisory Services',
        'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Software Architecture & Codebase Audits']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Cloud Migration & Hosting Cost Rationalization']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Cybersecurity & Disaster Recovery Planning']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Fractional CTO & Technology Roadmapping']]
        ]
    ]
];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="IT Consulting Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">IT Consulting Services</div>
            <h1 class="page-hero-title">Strategic Technology Leadership & Architecture Advisory</h1>
            <p class="page-hero-sub">
                Technology choices have lasting commercial consequences. Techgroww helps founders, CEOs, and IT managers make confident architectural decisions, reduce hosting costs, eliminate technical debt, and ensure rock-solid system stability.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '/services', 'IT Consulting' => '']) ?>

<!-- Problem vs Solution Section -->
<section class="section-padding bg-white" aria-label="Why Technology Advisory Matters">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">Navigating Complexity</div>
                <h2 class="section-title">Avoid Costly Architectural Mistakes Before Writing Code</h2>
                <p class="intro-lead-text">
                    Choosing the wrong cloud provider, picking an over-engineered framework, or poorly structuring your database can waste quarters of engineering payroll.
                </p>
                <p class="intro-body-text">
                    Too many businesses get pushed into expensive cloud lock-ins or bloated enterprise software by vendors with conflicting sales incentives. When systems buckle under traffic, refactoring code costs three times more than architecting it correctly the first time.
                </p>
                <p class="intro-body-text">
                    Techgroww delivers objective, commercially grounded technology consulting. We audit your infrastructure, analyze security vulnerabilities, benchmark performance bottlenecks, and design practical roadmaps that optimize both capital expenditure and operational reliability.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#fffbeb; color:#d97706;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Eliminate Unnecessary Cloud Spend</h4>
                        <p>We audit servers, database instances, and SaaS licenses to cut recurring infrastructure waste by up to 40%.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Security & Vulnerability Auditing</h4>
                        <p>Comprehensive reviews covering injection risks, credential exposure, session fixation, and unauthorized access vectors.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Scalability & Load Readiness</h4>
                        <p>Database indexing, query profiling, caching layers, and throughput testing to ensure your stack withstands massive traffic spikes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Consulting Capabilities -->
<section class="section-padding bg-light" aria-label="IT Consulting Capabilities">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Advisory Offerings</div>
            <h2 class="section-title">Senior Technology Consulting Capabilities</h2>
            <p class="section-subtitle">
                Clear, actionable architectural recommendations to guide your digital investments.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3>Software Architecture Auditing</h3>
                <p>Objective code reviews examining modularity, technical debt, database query efficiency, and maintainability across your internal engineering projects.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                </div>
                <h3>Cloud Migration & Hostinger Advisory</h3>
                <p>Seamless migration strategies moving legacy systems into high-performance Hostinger VPS or cloud instances with zero operational downtime.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>Cybersecurity & Access Governance</h3>
                <p>Hardening servers, locking down administrative portals, implementing secure session policies, and enforcing strict least-privilege role boundaries.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3>Fractional CTO & Advisory Retainers</h3>
                <p>Access high-level technology leadership for sprint planning, hiring interviews, vendor contract vetting, and investor technical due diligence.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                </div>
                <h3>Disaster Recovery & Business Continuity</h3>
                <p>Automated database backup pipelines, offsite cold storage, failover testing, and documented step-by-step restoration protocols.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <h3>Technology Stack Selection & Scoping</h3>
                <p>Pragmatic evaluation of languages, frameworks, and databases for your upcoming project to minimize total cost of ownership (TCO).</p>
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Service Bottom CTA -->
<?php
$serviceName = 'IT Consulting & Strategy';
$serviceSlug = 'it-consulting';
$serviceHighlight = 'Make the right technology moves today to build a resilient, scalable digital enterprise for tomorrow.';
require __DIR__ . '/../includes/service-cta.php';
?>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
