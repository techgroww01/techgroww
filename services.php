<?php
/**
 * Techgroww - All Services Overview Directory
 * Domain: https://techgroww.co.in/services
 */

$pageTitle = 'IT Services & Technology Solutions | Techgroww';
$pageDescription = 'Explore Techgroww full suite of digital engineering services: Website development, custom software, business process automation, enterprise AI solutions, digital marketing & SEO, and IT consulting.';
$canonicalUrl = 'https://techgroww.co.in/services';
$currentPage = 'services';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Services Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Engineered For Growth</div>
            <h1 class="page-hero-title">Full-Lifecycle Technology & Digital Solutions</h1>
            <p class="page-hero-sub">
                From high-performing web platforms to custom enterprise software, workflow automation, and intelligent AI models — we deliver scalable, robust systems that turn business visions into market leaders.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Services' => '']) ?>

<!-- Services Directory Grid -->
<section class="section-padding bg-white" aria-label="Services Directory">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Core Capabilities</div>
            <h2 class="section-title">Our Six Pillars of Digital Excellence</h2>
            <p class="section-subtitle">
                Each service is delivered by specialized engineers following disciplined agile methodologies, rigorous code reviews, and enterprise security standards.
            </p>
        </div>

        <div class="grid-3">
            <!-- 1. Web Development -->
            <div class="service-card">
                <div class="service-icon-box icon-blue">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
                <h3 class="service-card-title">Website Development</h3>
                <p class="service-card-desc">
                    High-performance corporate websites, customer portals, and custom eCommerce platforms crafted for maximum search visibility, flawless responsive usability, and sub-second loading speeds.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Core PHP 8+ & Fast Frontend Rendering</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>SEO-First HTML5 & Schema Structured Data</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Hostinger & Apache Optimized</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/web-development') ?>" class="btn btn-outline btn-block">Explore Web Development</a>
                </div>
            </div>

            <!-- 2. Custom Software Development -->
            <div class="service-card">
                <div class="service-icon-box icon-indigo">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="service-card-title">Custom Software Development</h3>
                <p class="service-card-desc">
                    Tailor-made SaaS platforms, internal ERP/CRM tools, secure payment gateways, and scalable backend microservices engineered to support high user concurrency without slowdowns.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Proprietary Business Logic Automation</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>MySQL/MariaDB Normalized Architecture</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Strict PDO Security & Role-Based Access</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/software-development') ?>" class="btn btn-outline btn-block">Explore Software Engineering</a>
                </div>
            </div>

            <!-- 3. Business Process Automation -->
            <div class="service-card">
                <div class="service-icon-box icon-purple">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <h3 class="service-card-title">Business Process Automation</h3>
                <p class="service-card-desc">
                    Connect disconnected enterprise software, eliminate manual copy-pasting, automate invoice generation, and bridge siloed departmental databases via intelligent webhook listeners.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Cross-System Data Synchronization</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Automated Notifications & WhatsApp Triggers</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Human-Error Elimination</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/automation') ?>" class="btn btn-outline btn-block">Explore Automation</a>
                </div>
            </div>

            <!-- 4. AI & Intelligent Solutions -->
            <div class="service-card">
                <div class="service-icon-box icon-cyan">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                </div>
                <h3 class="service-card-title">AI & Intelligent Solutions</h3>
                <p class="service-card-desc">
                    Custom generative AI solutions, autonomous agent pipelines, intelligent customer service bots, and predictive analytics tuned specifically to your proprietary organizational data.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Private Knowledge Retrieval (RAG)</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Automated Document Parsing & OCR</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Custom LLM Fine-Tuning & Integration</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/ai-solutions') ?>" class="btn btn-outline btn-block">Explore AI Solutions</a>
                </div>
            </div>

            <!-- 5. Digital Marketing & SEO -->
            <div class="service-card">
                <div class="service-icon-box icon-emerald">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 6l-9.5 9.5-5-5L1 18"></path><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <h3 class="service-card-title">Digital Marketing & SEO</h3>
                <p class="service-card-desc">
                    Full-funnel digital acquisition: technical Google SEO audits, search intent content architecture, conversion rate optimization, and high-ROI pay-per-click campaign management.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Google Search Console & Sitemap Architecture</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>High-Intent Commercial Keyword Targeting</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Analytics Attribution & Conversion Funnels</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/digital-marketing') ?>" class="btn btn-outline btn-block">Explore Digital Marketing</a>
                </div>
            </div>

            <!-- 6. IT Consulting & Strategy -->
            <div class="service-card">
                <div class="service-icon-box icon-amber">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <h3 class="service-card-title">IT Consulting & Strategy</h3>
                <p class="service-card-desc">
                    Strategic technology advisory for executive decision makers: software architecture auditing, cloud cost rationalization, legacy modernization roadmaps, and cybersecurity reviews.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Independent Architecture Due Diligence</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Cloud Migration (AWS, GCP, Hostinger)</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Security Auditing & SLA Definition</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/it-consulting') ?>" class="btn btn-outline btn-block">Explore IT Consulting</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Architecture Comparison Matrix -->
<section class="section-padding bg-light" aria-label="Service Scope Matrix">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Service Scope Comparison</div>
            <h2 class="section-title">Choosing The Right Engagement Level</h2>
            <p class="section-subtitle">
                Compare our capabilities across project types to find the ideal match for your current growth milestone.
            </p>
        </div>

        <div style="background: var(--white); border: 1px solid var(--slate-200); border-radius: var(--radius-xl); overflow-x: auto; box-shadow: var(--shadow-sm);">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.925rem;">
                <thead>
                    <tr style="background: var(--navy-900); color: var(--white); font-family: var(--font-heading);">
                        <th style="padding: 1.25rem 1.5rem; font-weight: 700;">Service Capability</th>
                        <th style="padding: 1.25rem 1rem; font-weight: 700;">Web Development</th>
                        <th style="padding: 1.25rem 1rem; font-weight: 700;">Custom Software</th>
                        <th style="padding: 1.25rem 1rem; font-weight: 700;">Automation & AI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--slate-100);">
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: var(--navy-900);">Primary Objective</td>
                        <td style="padding: 1rem;">Brand presence, inbound leads & customer conversion</td>
                        <td style="padding: 1rem;">Complex business logic, internal portals & SaaS</td>
                        <td style="padding: 1rem;">Operational efficiency, data sync & predictive insights</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--slate-100); background: var(--slate-50);">
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: var(--navy-900);">Typical Timeline</td>
                        <td style="padding: 1rem;">2 - 4 Weeks</td>
                        <td style="padding: 1rem;">6 - 12 Weeks</td>
                        <td style="padding: 1rem;">3 - 8 Weeks</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--slate-100);">
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: var(--navy-900);">Database Architecture</td>
                        <td style="padding: 1rem;">Optimized MySQL / Content Store</td>
                        <td style="padding: 1rem;">Normalized relational schemas, indexed joins</td>
                        <td style="padding: 1rem;">Vector stores, Redis queues & MySQL logs</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--slate-100); background: var(--slate-50);">
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: var(--navy-900);">Security Standard</td>
                        <td style="padding: 1rem;">SSL, CSRF protection, sanitized input forms</td>
                        <td style="padding: 1rem;">RBAC, salted hashes, encrypted session tokens</td>
                        <td style="padding: 1rem;">API token rotation, rate limits & secret isolation</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: var(--navy-900);">Post-Launch Warranty</td>
                        <td style="padding: 1rem;">30-Day SLA & support</td>
                        <td style="padding: 1rem;">60-Day SLA & extended support</td>
                        <td style="padding: 1rem;">30-Day monitoring & pipeline review</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
