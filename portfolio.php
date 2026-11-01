<?php
/**
 * Techgroww - Portfolio & Architectural Case Studies
 * Domain: https://techgroww.co.in/portfolio
 */

$pageTitle = 'Portfolio & Case Studies | Architectural Showcase | Techgroww';
$pageDescription = 'Explore Techgroww demonstration case studies and software engineering portfolio. View our architectures across custom web development, business automation, enterprise SaaS, and AI integrations.';
$canonicalUrl = 'https://techgroww.co.in/portfolio';
$currentPage = 'portfolio';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Portfolio Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Engineered Proof of Concept</div>
            <h1 class="page-hero-title">Architectural Showcase & Case Demonstrations</h1>
            <p class="page-hero-sub">
                Explore representative architectural case studies and demonstration projects showcasing how Techgroww builds scalable, secure, and maintainable technology solutions across multiple industries.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Portfolio' => '']) ?>

<!-- Portfolio Filterable Showcase -->
<section class="section-padding bg-light" aria-label="Project Showcase Grid">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Real Engineering Demonstrations</div>
            <h2 class="section-title">Solving Complex Technology Challenges</h2>
            <p class="section-subtitle">
                Clear, transparent breakdowns of architectural challenges, technical implementations, and scalable outcomes.
            </p>
        </div>

        <div class="grid-3">
            <!-- Project 1 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #0b132b 0%, #1e293b 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">Enterprise SaaS</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Cloud ERP & Supply Chain Management</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> A growing multi-branch distributor suffered frequent stock discrepancies and slow billing due to manual spreadsheet tracking across 4 warehouses.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Built a centralized Core PHP 8+ ERP portal with normalized MySQL tables, ACID transactions, automated low-stock webhook alerts, and instant PO generation.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">PHP 8+</span>
                        <span class="tech-pill">MySQL PDO</span>
                        <span class="tech-pill">REST APIs</span>
                        <span class="tech-pill">Hostinger</span>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #0f172a 0%, #312e81 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="1.5"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">Workflow Automation</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Omnichannel Lead Routing Pipeline</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> High-ticket inquiries from digital ads were taking over 5 hours to reach sales agents, causing prospects to buy from faster responders.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Built an asynchronous webhook receiver that parses inquiries, runs spam validation, enriches lead data, and broadcasts instant WhatsApp alerts directly to assigned agents in under 45 seconds.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">Webhooks</span>
                        <span class="tech-pill">WhatsApp API</span>
                        <span class="tech-pill">Cron Queue</span>
                        <span class="tech-pill">Security Hash</span>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #0b132b 0%, #064e3b 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="1.5"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">AI Integration</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Document Intelligence & Invoice OCR Agent</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> Accounts payable teams spent 25+ hours weekly keying vendor invoices and tax rates into accounting databases manually.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Engineered a secure pipeline utilizing optical character recognition paired with LLM structured parsing to automatically extract line items and record verified vouchers into MySQL.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">Python OCR</span>
                        <span class="tech-pill">LLM API</span>
                        <span class="tech-pill">JSON Schema</span>
                        <span class="tech-pill">Audit Trail</span>
                    </div>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #1e1b4b 0%, #1e293b 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="1.5"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">Web Development</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Corporate B2B Digital Experience Platform</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> An industrial technology consultancy was suffering from a bloated 7-second page load time and declining organic search rankings.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Rebuilt the site from the ground up using Core PHP 8+, modern CSS variables, semantic schema markup, and optimized Apache caching, slashing load time to 650ms and boosting lead conversion.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">PHP 8+</span>
                        <span class="tech-pill">Core Web Vitals</span>
                        <span class="tech-pill">Schema JSON-LD</span>
                        <span class="tech-pill">Vanilla JS</span>
                    </div>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #172554 0%, #042f2e 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2dd4bf" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">eCommerce</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">High-Concurrency eCommerce & Checkout</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> Flash sale traffic spikes regularly caused database connection deadlocks and cart abandonment on a standard CMS setup.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Re-architected checkout workflows with optimistic locking, Redis session caching, and decoupled order queuing to support 1,500+ simultaneous checkout sessions with zero timeouts.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">MySQL Lock Optimization</span>
                        <span class="tech-pill">Redis Cache</span>
                        <span class="tech-pill">Payment Gateways</span>
                        <span class="tech-pill">PHP 8</span>
                    </div>
                </div>
            </div>

            <!-- Project 6 -->
            <div class="portfolio-card">
                <div class="portfolio-card-header" style="background: linear-gradient(135deg, #311042 0%, #0b132b 100%);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <div class="portfolio-card-body">
                    <div>
                        <span class="project-category-tag">IT Consulting</span>
                        <span class="project-demo-pill">Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Cloud Hardening & Database Disaster Recovery</h3>
                    <p class="portfolio-card-summary">
                        <strong>The Challenge:</strong> A SaaS company had no automated backup verification and was running unpatched database software vulnerable to intrusion.
                    </p>
                    <p class="portfolio-card-summary" style="margin-top:-0.5rem;">
                        <strong>The Architecture:</strong> Performed a comprehensive security audit, enforced parameterized SQL queries, implemented automated encrypted offsite backup cron routines, and established a 15-minute RPO/RTO disaster protocol.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">Security Audit</span>
                        <span class="tech-pill">Disaster Recovery</span>
                        <span class="tech-pill">Cron Automation</span>
                        <span class="tech-pill">SSL / Encryption</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

