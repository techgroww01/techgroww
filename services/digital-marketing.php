<?php
/**
 * Techgroww - Digital Marketing & SEO Service Page
 * Domain: https://techgroww.co.in/services/digital-marketing
 */

$pageTitle = 'Digital Marketing Services | SEO Company in India | Techgroww';
$pageDescription = 'Accelerate inbound pipeline growth with Techgroww digital marketing services in India. We specialize in technical SEO, Google Search Console optimization, conversion rate optimization (CRO), and high-ROI PPC campaigns.';
$canonicalUrl = 'https://techgroww.co.in/services/digital-marketing';
$currentPage = 'service-digital-marketing';

$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Digital Marketing & SEO Services',
    'serviceType' => 'Digital Marketing',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'url' => 'https://techgroww.co.in'
    ],
    'description' => 'Comprehensive technical SEO, search engine marketing, conversion optimization, and analytics for technology companies.',
    'areaServed' => 'IN',
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Digital Marketing Capabilities',
        'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Technical & On-Page SEO Audits']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'High-Intent Search Engine Marketing (SEM / PPC)']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Conversion Rate Optimization (CRO)']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Analytics Tracking & Attribution Modeling']]
        ]
    ]
];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Digital Marketing Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Digital Marketing Services</div>
            <h1 class="page-hero-title">Technical SEO & Revenue-Driven Performance Marketing</h1>
            <p class="page-hero-sub">
                Traffic without revenue is vanity. Techgroww builds data-backed organic SEO foundations and high-intent customer acquisition funnels that consistently generate qualified B2B and enterprise inbound inquiries.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '/services', 'Digital Marketing' => '']) ?>

<!-- Problem vs Solution Section -->
<section class="section-padding bg-white" aria-label="Why Scientific Marketing Matters">
    <div class="container">
        <div class="intro-grid">
            <div>
                <div class="section-eyebrow">The Search Engine Landscape</div>
                <h2 class="section-title">Why Most SEO Campaigns Fail to Deliver Commercial Results</h2>
                <p class="intro-lead-text">
                    Ranking for random low-intent keywords or pumping out generic AI articles won't bring paying corporate clients to your door.
                </p>
                <p class="intro-body-text">
                    Google rewards websites that deliver technical excellence: fast load times, semantic schema graphs, accessible mobile layouts, and high-value architectural content that directly answers what decision-makers are searching for.
                </p>
                <p class="intro-body-text">
                    Techgroww takes an engineer's approach to digital marketing. We repair broken site architecture, optimize crawl budgets, implement comprehensive JSON-LD structured data, and run high-intent paid campaigns that deliver quantifiable returns on investment.
                </p>
            </div>

            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#ecfdf5; color:#059669;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>High-Intent Commercial Keywords</h4>
                        <p>We target buyers actively searching for solutions, not passive information-gatherers who never convert.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="12 8 8 12 12 16 16 12 12 8"></polygon></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Deep Technical SEO Auditing</h4>
                        <p>Resolving crawl errors, canonical duplicates, redirect chains, indexation bloat, and robots.txt restrictions.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background:#eef2ff; color:#4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Full Attribution Tracking</h4>
                        <p>Transparent analytics connecting organic search queries and paid clicks directly to closed contract values.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Marketing Capabilities -->
<section class="section-padding bg-light" aria-label="Marketing Offerings">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Marketing Capabilities</div>
            <h2 class="section-title">Comprehensive Growth Engineering</h2>
            <p class="section-subtitle">
                Systematic methodologies to drive sustainable inbound sales pipelines.
            </p>
        </div>

        <div class="grid-3">
            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3>Technical SEO & Indexing Audits</h3>
                <p>Comprehensive inspection of URL structures, XML sitemaps, canonical tags, server headers, and mobile responsiveness to maximize Google indexation.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <h3>High-Converting Copywriting</h3>
                <p>Engaging technical value propositions, landing page copy, and case studies written specifically to persuade executive buyers and CTOs.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                </div>
                <h3>Conversion Rate Optimization (CRO)</h3>
                <p>Streamline form funnels, optimize CTA placements, eliminate mobile friction points, and boost website visitor-to-lead conversion rates.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                </div>
                <h3>Search Engine Advertising (PPC)</h3>
                <p>Highly targeted Google Search and LinkedIn campaigns directed at decision-makers, optimizing negative keyword lists to minimize wasted ad spend.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <h3>Structured Data & Schema Graph</h3>
                <p>Implementation of Organization, Service, BreadcrumbList, and FAQPage schemas to win rich snippets in Google search result pages.</p>
            </div>

            <div class="service-feature-card">
                <div class="service-feature-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"></path></svg>
                </div>
                <h3>Analytics & Funnel Reporting</h3>
                <p>Google Analytics 4 setup, server-side event tracking, form submission telemetry, and executive monthly performance dashboards.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Service Bottom CTA -->
<?php
$serviceName = 'Digital Marketing & SEO';
$serviceSlug = 'digital-marketing';
$serviceHighlight = 'Stop guessing. Build an organic search engine and customer acquisition engine that fuels scalable business growth.';
require __DIR__ . '/../includes/service-cta.php';
?>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>

