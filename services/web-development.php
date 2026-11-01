<?php
/**
 * Techgroww - Web Development Service Page
 * Domain: https://techgroww.co.in/services/web-development
 */

$pageTitle = 'Website Development Company | High-Performance Web Solutions | Techgroww';
$pageDescription = 'Techgroww is a premier website development company in India. We engineer ultra-fast, responsive corporate websites, web applications, and eCommerce portals with Core PHP 8+ and modern frontend technologies.';
$canonicalUrl = 'https://techgroww.co.in/services/web-development';
$currentPage = 'service-web-development';

// Structured Data: Service Schema
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Website Development Services',
    'serviceType' => 'Web Development',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'url' => 'https://techgroww.co.in'
    ],
    'description' => 'Custom corporate websites, enterprise web applications, and eCommerce portals engineered for speed, mobile responsiveness, and high conversion.',
    'areaServed' => 'IN',
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Web Development Capabilities',
        'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Corporate Website Engineering']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Custom Web Applications']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'eCommerce & Portal Architecture']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Core Web Vitals Speed Optimization']]
        ]
    ]
];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Web Development Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Website Development Company</div>
            <h1 class="page-hero-title">High-Performance, Conversion-Focused Website Development</h1>
            <p class="page-hero-sub">
                We engineer lightning-fast corporate websites, responsive customer portals, and tailored web applications built on Core PHP 8+ and clean modern code — designed to turn casual visitors into loyal enterprise clients.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '/services', 'Web Development' => '']) ?>

<!-- Problem vs Solution Section -->
<section class="section-padding bg-white" aria-label="The Challenge & Our Solution">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">The Competitive Reality</div>
                <h2 class="section-title">Why Generic Website Templates Hurt Your Brand</h2>
                <p class="intro-lead-text">
                    Slow page loads, bloated WordPress plugins, and fragile site builders dilute your brand credibility and destroy search engine rankings.
                </p>
                <p class="intro-body-text">
                    Modern enterprise buyers judge your engineering capability within 3 seconds of landing on your site. If your website is slow, disorganized, or breaks on mobile screens, you lose qualified leads to faster competitors.
                </p>
                <p class="intro-body-text">
                    Techgroww builds custom, lightweight websites without bloated third-party dependencies. Our websites achieve 95+ Google PageSpeed scores, implement semantic schema markup, and provide intuitive content management without risking site stability.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Sub-Second Page Load Speeds</h4>
                        <p>Streamlined CSS, responsive WebP images, and efficient server execution ensure instantaneous page rendering on 4G and 5G mobile networks.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Hardened Server-Level Security</h4>
                        <p>CSRF verification, strict input validation, prepared database statements, and comprehensive HTTP security headers.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#f5f3ff; color:#7c3aed;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="12 8 8 12 12 16 16 12 12 8"></polygon></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>SEO-First Semantic Markup</h4>
                        <p>Structured H1-H3 hierarchies, schema JSON-LD, clean URL rewriting, and auto-generated XML sitemaps to maximize search indexing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Capabilities Grid -->
<section class="section-padding bg-light" aria-label="Web Development Capabilities">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Our Web Capabilities</div>
            <h2 class="section-title">What We Engineer For Your Brand</h2>
            <p class="section-subtitle">
                Tailor-made web solutions designed to match your exact industry requirements and technological infrastructure.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-feature-card">
                <div class="service-feature-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                </div>
                <h3>Corporate Business Websites</h3>
                <p>Sophisticated multi-page digital headquarters engineered to reflect authority, engage enterprise prospects, and capture high-value inbound sales inquiries.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <h3>Custom eCommerce & Checkout</h3>
                <p>High-conversion storefronts featuring frictionless checkout funnels, secure payment gateway integrations (Razorpay, Stripe), and automated order notifications.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </div>
                <h3>Client Portals & Intranets</h3>
                <p>Authenticated customer and partner areas with role-based dashboard access, file sharing, ticket tracking, and secure document management.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                </div>
                <h3>API-Driven Web Applications</h3>
                <p>Modern interactive frontend experiences seamlessly integrated with backend microservices, real-time webhooks, and third-party SaaS APIs.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                </div>
                <h3>Core Web Vitals Optimization</h3>
                <p>Refactoring existing slow websites to achieve green LCP, INP, and CLS scores, improving organic search rankings and decreasing user bounce rates.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                <h3>Landing Pages for Paid Campaigns</h3>
                <p>High-velocity, hyper-focused landing pages optimized for Google Ads and Meta paid media, maximizing return on advertising spend (ROAS).</p>
            </div>
        </div>
    </div>
</section>

<!-- Web Technologies Utilized -->
<section class="section-padding bg-white" aria-label="Web Development Tech Stack">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Our Web Stack</div>
            <h2 class="section-title">Tested, Stable & High-Speed Technologies</h2>
            <p class="section-subtitle">
                We write clean, lightweight code fully compatible with Hostinger shared and cloud hosting environments.
            </p>
        </div>

        <div class="grid-4">
            <div class="why-choose-card" style="text-align: center;">
                <h4 style="margin-bottom: 0.5rem; color: var(--primary);">PHP 8+ (Core / OOP)</h4>
                <p style="font-size: 0.85rem;">Lightning-fast server-side rendering, strict typing, and zero plugin bloat.</p>
            </div>
            <div class="why-choose-card" style="text-align: center;">
                <h4 style="margin-bottom: 0.5rem; color: #4f46e5;">MySQL 8 / MariaDB</h4>
                <p style="font-size: 0.85rem;">Indexed relational tables, prepared PDO statements, and data integrity.</p>
            </div>
            <div class="why-choose-card" style="text-align: center;">
                <h4 style="margin-bottom: 0.5rem; color: #0891b2;">Semantic HTML5 & CSS3</h4>
                <p style="font-size: 0.85rem;">Accessible, responsive styling with clean variables and zero bulky frameworks.</p>
            </div>
            <div class="why-choose-card" style="text-align: center;">
                <h4 style="margin-bottom: 0.5rem; color: #059669;">Hostinger & Apache</h4>
                <p style="font-size: 0.85rem;">Gzip compression, browser caching, and fine-tuned .htaccess rewrite rules.</p>
            </div>
        </div>
    </div>
</section>

<!-- Web Development FAQ -->
<section class="section-padding bg-light" aria-label="Web Development FAQ">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Common Questions</div>
            <h2 class="section-title">Web Development FAQs</h2>
            <p class="section-subtitle">Key insights into our web development process and deliverables.</p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>How long does it take to build a custom corporate website?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        A typical 10 to 15 page custom corporate website with responsive design, SEO optimization, and contact form database integration takes approximately 2 to 4 weeks from initial architecture sign-off to live production deployment.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>Will my website be compatible with Hostinger Web Hosting?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Yes! We specifically architect our applications for 100% compatibility with Hostinger Web Hosting and phpMyAdmin, requiring zero Node.js daemon dependencies in production. It deploys cleanly via standard FTP or Git.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>Do you provide SEO optimization with new websites?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Yes. Every website we build includes complete technical SEO foundations: unique meta titles, descriptions, canonical URLs, Open Graph tags, BreadcrumbList schema, Organization schema, clean URL rewriting, and an automated XML sitemap.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Service Bottom CTA -->
<?php
$serviceName = 'Website Development';
$serviceSlug = 'web-development';
$serviceHighlight = 'Launch a fast, elegant, and conversion-optimized website engineered to outperform your competitors.';
require __DIR__ . '/../includes/service-cta.php';
?>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>

