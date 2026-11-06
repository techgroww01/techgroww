<?php
/**
 * Techgroww - About Us
 * Domain: https://techgroww.co.in/about
 */

$pageTitle = 'About Us | Techgroww IT Solutions & Technology Consulting';
$pageDescription = 'Learn about Techgroww - a forward-thinking IT services company in India. We engineer custom software, scalable cloud architectures, intelligent automation, and AI platforms for modern enterprises.';
$canonicalUrl = 'https://techgroww.co.in/about';
$currentPage = 'about';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="About Techgroww Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Our Identity & Mission</div>
            <h1 class="page-hero-title">About Techgroww &mdash; Empowering Businesses Through Engineering Excellence</h1>
            <p class="page-hero-sub">
                Techgroww (registered as Techgroww IT Solutions, also known as Tech Groww) was established with a singular focus: to help modern enterprises navigate digital complexity through robust software architecture, automated workflows, and practical artificial intelligence.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['About Us' => '']) ?>

<!-- Mission & Vision Section -->
<section class="section-padding bg-white" aria-label="Mission and Vision">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">Our Purpose</div>
                <h2 class="section-title">Built on the Belief That Technology Should Drive Measurable Growth</h2>
                <p class="intro-lead-text">
                    In an industry flooded with off-the-shelf templates and superficial promises, Techgroww takes a disciplined, engineering-first approach.
                </p>
                <p class="intro-body-text">
                    We partner with startups, growing mid-market enterprises, and established organizations that require more than just basic digital presence. We build dependable software foundations, integrate fragmented enterprise data, and engineer automated systems that free up your team to focus on high-leverage business expansion.
                </p>
                <p class="intro-body-text">
                    Headquartered in India's leading technology hubs, our distributed engineering culture combines technical rigor, continuous learning, and absolute accountability across every line of code we ship.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Our Mission</h4>
                        <p>To deliver scalable, resilient, and high-performance digital solutions that eliminate operational friction and accelerate sustainable business profitability.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Our Vision</h4>
                        <p>To be recognized as a premier technology consulting partner globally, renowned for architectural clarity, unwavering integrity, and transformative digital impact.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#f5f3ff; color:#7c3aed;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Engineering Ethics</h4>
                        <p>Zero fabricated claims, transparent development sprints, robust security audits, and complete client ownership of all intellectual property.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="section-padding bg-light" aria-label="Techgroww Core Values">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Guiding Principles</div>
            <h2 class="section-title">The Values That Shape Every Deployment</h2>
            <p class="section-subtitle">
                How we think, communicate, and write software every single day.
            </p>
        </div>

        <div class="grid-4">
            <div class="why-choose-card">
                <div class="why-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </div>
                <h3>Architectural Rigor</h3>
                <p>We build with clean design patterns, relational normalization, and strict type safety to prevent technical debt from slowing your growth.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <h3>Radical Transparency</h3>
                <p>No unexpected costs or mysterious delays. You receive weekly progress builds, source repository visibility, and direct developer communication.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                <h3>Commercial Realism</h3>
                <p>We advise on the most cost-effective path to launch, selecting technology stacks that minimize ongoing hosting overhead and maintenance costs.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>Security & Privacy</h3>
                <p>Your business logic and customer records are protected with industry best practices, encrypted communication, and strict access governance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Engagement Models -->
<section class="section-padding" aria-label="Flexible Engagement Models">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Collaboration Framework</div>
            <h2 class="section-title">Flexible Engagement Models</h2>
            <p class="section-subtitle">
                Tailored engagement formats designed to match your budget, project scope, and release deadlines.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-card">
                <div class="service-icon-box icon-blue">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </div>
                <h3 class="service-card-title">Milestone Fixed-Price</h3>
                <p class="service-card-desc">
                    Ideal for projects with well-defined scopes and deliverables, such as corporate websites, e-commerce platforms, or discrete MVP software releases.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Guaranteed Fixed Budget & Timeline</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Phase-by-Phase Acceptance Testing</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>30-Day Post-Launch Warranty</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/contact?model=fixed-price#contact-form') ?>" class="btn btn-outline btn-block">Inquire Fixed-Price</a>
                </div>
            </div>

            <div class="service-card" style="border-color: var(--primary);">
                <div style="position: absolute; top: 12px; right: 16px; background: var(--grad-primary); color: #fff; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; padding: 0.2rem 0.6rem; border-radius: var(--radius-full);">Most Popular</div>
                <div class="service-icon-box icon-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3 class="service-card-title">Dedicated Engineering Squad</h3>
                <p class="service-card-desc">
                    A dedicated full-stack team embedded directly with your product leadership for rapid agile iterations, ongoing feature development, and CI/CD pipelines.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Full Agile Sprint Integration</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Scalable Capacity On-Demand</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Daily Standups & Direct Git Access</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/contact?model=dedicated-squad#contact-form') ?>" class="btn btn-primary btn-block">Book Dedicated Squad</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon-box icon-amber">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <h3 class="service-card-title">Technology Advisory Retainer</h3>
                <p class="service-card-desc">
                    Fractional CTO advisory, architectural auditing, security compliance reviews, and high-level infrastructure optimization for business owners.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Architecture & Security Audits</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Cloud Cost Rationalization</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Vendor & Tech Stack Evaluation</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/contact?model=advisory#contact-form') ?>" class="btn btn-outline btn-block">Inquire Advisory</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

