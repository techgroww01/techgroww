<?php
/**
 * Techgroww - Homepage
 * Domain: https://techgroww.co.in
 */

$pageTitle = 'Techgroww | Transforming Ideas Into Digital Solutions | IT Services India';
$pageDescription = 'Techgroww is a premier IT solutions & technology consulting firm in India. We specialize in custom website development, enterprise software engineering, business process automation, and practical AI solutions.';
$pageKeywords = 'Techgroww, Tech Groww, Techgroww IT Solutions, techgroww.co.in, IT services India, web development company Bangalore, custom software development Mumbai, business automation, AI consulting, technology company';
$canonicalUrl = 'https://techgroww.co.in/';
$currentPage = 'home';

// Home WebSite & FAQ Schema
$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What IT services does Techgroww offer?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Techgroww provides end-to-end digital engineering services including custom website development, enterprise software engineering, business process automation (RPA), generative AI & intelligent assistant integration, digital marketing & SEO, and IT architecture consulting.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'How does Techgroww approach custom software development?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We follow a structured 5-stage agile lifecycle: Requirements Understanding, Architectural Planning & Strategy, Modern Design & Development, Testing & Quality Assurance, followed by Continuous Deployment and Support with guaranteed SLAs.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Can Techgroww integrate AI into our existing business workflows?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. We specialize in practical enterprise AI integration, including custom LLM agents, automated document extraction, intelligent customer support assistants, and predictive analytics that connect directly with your existing CRM and ERP systems.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'How does pricing work for development projects?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We offer flexible engagement models tailored to your scope: Milestone-Based Fixed Price for well-defined deliverables, or Dedicated Engineering Retainers for evolving agile products. All proposals include transparent, line-item pricing with no hidden fees.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'What ongoing support and maintenance do you provide post-launch?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Every deployment includes post-launch monitoring, security patch management, automated backups, performance tuning, and guaranteed SLA response windows to ensure zero downtime.'
            ]
        ]
    ]
];

$extraSchema = '<script type="application/ld+json">' . json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

require_once __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     Section B: Hero Section
     ========================================================================= -->
<section class="hero-section" aria-label="Hero Introduction">
    <div class="hero-bg-effects" aria-hidden="true">
        <div class="hero-glow-1"></div>
        <div class="hero-glow-2"></div>
        <div class="hero-grid-lines"></div>
    </div>
    <div class="container hero-inner">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="pulse-dot"></span>
                <span>Next-Generation IT Services & Consulting</span>
            </div>
            <h1 class="hero-title">
                <span class="hero-brand-highlight" style="display:block; font-size: clamp(1rem, 2.5vw, 1.35rem); font-weight: 700; color: #60a5fa; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 0.5rem;">Techgroww IT Solutions</span>
                Transforming Ideas Into <span class="gradient-text">Digital Solutions.</span>
            </h1>
            <p class="hero-subtext">
                Techgroww helps businesses grow through intelligent technology, custom software, automation and digital innovation. We architect scalable, secure, and revenue-driving digital platforms.
            </p>
            <div class="hero-buttons">
                <a href="#contact-section" class="btn btn-primary btn-lg">
                    <span>Let's Discuss Your Project</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                <a href="<?= url('/services') ?>" class="btn btn-outline-white btn-lg">
                    <span>Explore Our Services</span>
                </a>
            </div>
            
            <div class="hero-metrics-strip">
                <div class="hero-metric-item">
                    <strong>99.9%</strong>
                    <span>Uptime Architecture</span>
                </div>
                <div class="hero-metric-item">
                    <strong>Enterprise</strong>
                    <span>Security Standards</span>
                </div>
                <div class="hero-metric-item">
                    <strong>End-to-End</strong>
                    <span>Lifecycle Support</span>
                </div>
            </div>
        </div>

        <!-- Tech Visual Glassmorphism Terminal Card -->
        <div class="hero-visual-wrapper">
            <div class="floating-tech-badge badge-top-right">
                <div class="pulse-dot"></div>
                <div>
                    <strong style="color: #fff; font-size: 0.8rem; display:block;">Production Ready</strong>
                    <span style="color: #94a3b8; font-size: 0.72rem;">Microservices & Cloud</span>
                </div>
            </div>

            <div class="tech-glass-card">
                <div class="glass-card-header">
                    <div class="card-status-pill">
                        <span class="pulse-dot"></span> Systems Operational
                    </div>
                    <div class="card-window-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>

                <div class="tech-nodes-display">
                    <div class="node-row">
                        <div class="node-icon-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <div class="node-details">
                            <strong>Custom Software Engineering</strong>
                            <span>High-concurrency APIs & Web Apps</span>
                        </div>
                        <div class="node-metric">PHP 8 / Cloud</div>
                    </div>

                    <div class="node-row">
                        <div class="node-icon-wrap" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                        <div class="node-details">
                            <strong>Intelligent Workflow Automation</strong>
                            <span>Eliminating repetitive business friction</span>
                        </div>
                        <div class="node-metric">94% Efficiency</div>
                    </div>

                    <div class="node-row">
                        <div class="node-icon-wrap" style="background: linear-gradient(135deg, #06b6d4, #3b82f6);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                        </div>
                        <div class="node-details">
                            <strong>AI & Agentic Architectures</strong>
                            <span>Context-aware enterprise intelligence</span>
                        </div>
                        <div class="node-metric">Active</div>
                    </div>
                </div>
            </div>

            <div class="floating-tech-badge badge-bottom-left">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <div>
                    <strong style="color: #fff; font-size: 0.8rem; display:block;">Zero Technical Debt</strong>
                    <span style="color: #94a3b8; font-size: 0.72rem;">Clean, Maintainable Code</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section C: Company Introduction
     ========================================================================= -->
<section class="section-padding bg-light" id="about-intro" aria-label="About Techgroww">
    <div class="container">
        <div class="intro-grid">
            <div class="intro-content">
                <div class="section-eyebrow">Who We Are</div>
                <h2 class="section-title">Your Strategic Digital Innovation & Technology Partner</h2>
                <p class="intro-lead-text">
                    In today's fast-moving business climate, off-the-shelf templates and disconnected systems hold ambitious companies back.
                </p>
                <p class="intro-body-text">
                    Techgroww (also recognized as Tech Groww IT Solutions) bridges the gap between vision and execution. As an agile technology consulting and digital engineering firm headquartered in India, we architect custom software platforms, build frictionless workflow automation pipelines, integrate state-of-the-art AI intelligence, and drive sustainable business revenue through precision digital strategy.
                </p>

                <div class="intro-check-list">
                    <div class="check-item">
                        <div class="check-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div><strong>Purpose-Built Architecture:</strong> No bloated frameworks or generic templates. Every line of code serves your operational goals.</div>
                    </div>
                    <div class="check-item">
                        <div class="check-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div><strong>Enterprise Security & Data Isolation:</strong> Prepared SQL statements, CSRF protection, RBAC, and secure session management.</div>
                    </div>
                    <div class="check-item">
                        <div class="check-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div><strong>Measurable Business ROI:</strong> Technology that directly lowers operational overhead, elevates user experience, and drives measurable conversions.</div>
                    </div>
                </div>

                <a href="<?= url('/about') ?>" class="btn btn-secondary">
                    <span>Learn More About Our Story</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
            </div>

            <!-- Intro Visual Pillars -->
            <div class="intro-visual-card">
                <div class="card-pillar">
                    <div class="pillar-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Eliminating Operational Friction</h4>
                        <p>We replace slow, error-prone manual tasks with reliable, automated synchronization across your data ecosystems.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background: #eef2ff; color: #4f46e5;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Accelerating Scalable Growth</h4>
                        <p>Architecting modular databases, decoupled APIs, and cloud infrastructure designed to grow effortlessly as your user base multiplies.</p>
                    </div>
                </div>

                <div class="card-pillar">
                    <div class="pillar-icon" style="background: #f5f3ff; color: #7c3aed;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="pillar-content">
                        <h4>Bulletproof Code Standards</h4>
                        <p>Strict PHP 8+ adherence, robust input sanitization, and automated error prevention built into every client deployment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section D: Services Section (6 Premium Cards)
     ========================================================================= -->
<section class="section-padding" id="services-section" aria-label="Our Core IT Services">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Capabilities & Offerings</div>
            <h2 class="section-title">Comprehensive Technology Services</h2>
            <p class="section-subtitle">
                From high-conversion web development to advanced automation pipelines and enterprise AI integrations, we deliver robust digital solutions built for modern business demands.
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
                    Ultra-fast, mobile-first corporate websites, custom eCommerce platforms, and responsive web portals engineered for high conversion and Google Core Web Vitals excellence.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Core PHP 8+ & Headless Frameworks</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Speed Optimization & 95+ PageSpeed</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Custom CMS & API Integrations</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/web-development') ?>" class="learn-more-link">
                        <span>Explore Web Development</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- 2. Custom Software Development -->
            <div class="service-card">
                <div class="service-icon-box icon-indigo">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="service-card-title">Custom Software Development</h3>
                <p class="service-card-desc">
                    Bespoke SaaS applications, internal management portals, and scalable backend architectures designed specifically around your proprietary business workflows.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Enterprise ERP & CRM Development</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>RESTful & GraphQL API Architecture</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>MySQL/MariaDB Performance Tuning</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/software-development') ?>" class="learn-more-link">
                        <span>Explore Software Engineering</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- 3. Business Process Automation -->
            <div class="service-card">
                <div class="service-icon-box icon-purple">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <h3 class="service-card-title">Business Process Automation</h3>
                <p class="service-card-desc">
                    Connect fragmented applications, automate lead capture, sync inventories, and eliminate repetitive clerical bottlenecks through intelligent, automated data pipelines.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Cross-Platform Webhook & API Sync</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Automated Billing & Reporting Jobs</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Error-Free Workflow Pipelines</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/automation') ?>" class="learn-more-link">
                        <span>Explore Business Automation</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- 4. AI & Intelligent Solutions -->
            <div class="service-card">
                <div class="service-icon-box icon-cyan">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                </div>
                <h3 class="service-card-title">AI & Intelligent Solutions</h3>
                <p class="service-card-desc">
                    Harness generative AI, intelligent assistant agents, automated document intelligence, and predictive machine learning models customized to your company data.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Contextual LLM & Chatbot Integration</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Intelligent Document Extraction</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Predictive Data & Business Insights</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/ai-solutions') ?>" class="learn-more-link">
                        <span>Explore AI Solutions</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- 5. Digital Marketing & SEO -->
            <div class="service-card">
                <div class="service-icon-box icon-emerald">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 6l-9.5 9.5-5-5L1 18"></path><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <h3 class="service-card-title">Digital Marketing & SEO</h3>
                <p class="service-card-desc">
                    Comprehensive technical SEO audits, schema optimization, high-converting copy, and data-backed performance advertising designed to drive organic inbound inquiries.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>On-Page, Off-Page & Technical SEO</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Conversion Rate Optimization (CRO)</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Search Analytics & Lead Tracking</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/digital-marketing') ?>" class="learn-more-link">
                        <span>Explore Digital Marketing</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- 6. IT Consulting & Advisory -->
            <div class="service-card">
                <div class="service-icon-box icon-amber">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <h3 class="service-card-title">IT Consulting & Strategy</h3>
                <p class="service-card-desc">
                    Senior technology guidance for founders and enterprise leaders: architectural reviews, cloud migration roadmaps, security compliance, and vendor selection.
                </p>
                <div class="service-card-features">
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Digital Transformation Roadmaps</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Cloud Architecture & Cost Optimization</span>
                    </div>
                    <div class="service-feature-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Security & Compliance Auditing</span>
                    </div>
                </div>
                <div class="service-card-footer">
                    <a href="<?= url('/services/it-consulting') ?>" class="learn-more-link">
                        <span>Explore IT Consulting</span> &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section E: Why Choose Techgroww?
     ========================================================================= -->
<section class="section-padding bg-light" aria-label="Why Choose Techgroww">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">The Techgroww Advantage</div>
            <h2 class="section-title">Why Industry Leaders Trust Techgroww</h2>
            <p class="section-subtitle">
                We combine deep technical rigor with commercial pragmatism to build software that scales reliably and returns tangible business value.
            </p>
        </div>

        <div class="grid-3">
            <div class="why-choose-card">
                <div class="why-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <h3>Business-Focused Solutions</h3>
                <p>We do not write code for code's sake. Every feature, database schema, and automation pipeline is aligned directly with your revenue and operational KPIs.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#eef2ff; color:#4f46e5;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                </div>
                <h3>Tailor-Made Development</h3>
                <p>No cookie-cutter templates or bloated page builders. We engineer lightweight, bespoke solutions designed around your specific enterprise requirements.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#f5f3ff; color:#7c3aed;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <h3>Transparent Communication</h3>
                <p>Direct communication with lead engineers. Weekly sprint reviews, staging previews, clear documentation, and absolutely no technical jargon smoke-and-mirrors.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#ecfeff; color:#0891b2;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                </div>
                <h3>Scalable Technology Stacks</h3>
                <p>Built with enterprise standards: clean PHP 8+ architecture, normalized relational schemas, and asynchronous job queuing capable of growing seamlessly.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#ecfdf5; color:#059669;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>Security-First Engineering</h3>
                <p>Full SQL injection prevention with PDO prepared statements, XSS defense, CSRF verification tokens, and strict file isolation for guaranteed peace of mind.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#fffbeb; color:#d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                </div>
                <h3>Continuous Post-Launch Support</h3>
                <p>Our commitment extends far past deployment. We provide proactive monitoring, system patching, security backups, and guaranteed SLA support contracts.</p>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section F: Technologies We Master
     ========================================================================= -->
<section class="section-padding" aria-label="Technologies and Frameworks">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Enterprise Tech Stack</div>
            <h2 class="section-title">Technologies Powering Your Growth</h2>
            <p class="section-subtitle">
                We select industry-proven, high-velocity technologies known for exceptional speed, military-grade security, and vast community ecosystems.
            </p>
        </div>

        <div class="tech-tabs-nav" role="tablist">
            <button type="button" class="tech-tab-btn active" data-tab="tab-backend" role="tab" aria-selected="true">Backend & APIs</button>
            <button type="button" class="tech-tab-btn" data-tab="tab-frontend" role="tab" aria-selected="false">Frontend & Web</button>
            <button type="button" class="tech-tab-btn" data-tab="tab-database" role="tab" aria-selected="false">Databases & Storage</button>
            <button type="button" class="tech-tab-btn" data-tab="tab-cloud" role="tab" aria-selected="false">Cloud & DevOps</button>
            <button type="button" class="tech-tab-btn" data-tab="tab-ai" role="tab" aria-selected="false">AI & Automation</button>
        </div>

        <div class="tech-tabs-content">
            <!-- Backend Pane -->
            <div class="tech-tab-pane active" id="tab-backend" role="tabpanel">
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M16 18l6-6-6-6"></path><path d="M8 6l-6 6 6 6"></path></svg>
                    <span class="tech-name">PHP 8+ (Core / OOP)</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    <span class="tech-name">Laravel Framework</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path><path d="M2 12l10 5 10-5"></path></svg>
                    <span class="tech-name">Node.js / Express</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    <span class="tech-name">Python 3.11+</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    <span class="tech-name">RESTful & Webhooks</span>
                </div>
            </div>

            <!-- Frontend Pane -->
            <div class="tech-tab-pane" id="tab-frontend" role="tabpanel">
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(30 12 12)"></ellipse><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(90 12 12)"></ellipse><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(150 12 12)"></ellipse></svg>
                    <span class="tech-name">React / Next.js</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M2 3h20L12 21 2 3z"></path></svg>
                    <span class="tech-name">Vue.js 3</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path d="M4 3h16l-1.5 16L12 22l-6.5-3L4 3z"></path></svg>
                    <span class="tech-name">HTML5 & Semantic SEO</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M4 3h16l-1.5 16L12 22l-6.5-3L4 3z"></path><path d="M8 8h8M8 12h7M9 16h6"></path></svg>
                    <span class="tech-name">Modern CSS3 & Flexbox</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    <span class="tech-name">Vanilla ES6+ JS</span>
                </div>
            </div>

            <!-- Database Pane -->
            <div class="tech-tab-pane" id="tab-database" role="tabpanel">
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                    <span class="tech-name">MySQL / MariaDB</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M3 12c0 1.66 4 3 9 3s9-1.34 9-3"></path><path d="M3 19c0 1.66 4 3 9 3s9-1.34 9-3"></path><path d="M3 5v14"></path><path d="M21 5v14"></path></svg>
                    <span class="tech-name">PostgreSQL</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                    <span class="tech-name">Redis In-Memory Cache</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="12 6 16 14 8 14 12 6"></polygon></svg>
                    <span class="tech-name">PDO Prepared Architecture</span>
                </div>
            </div>

            <!-- Cloud & DevOps Pane -->
            <div class="tech-tab-pane" id="tab-cloud" role="tabpanel">
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                    <span class="tech-name">AWS Infrastructure</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path><path d="M12 12v9"></path><path d="m8 17 4 4 4-4"></path></svg>
                    <span class="tech-name">Hostinger Cloud & Apache</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    <span class="tech-name">Docker Containerization</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    <span class="tech-name">Cloudflare CDN & SSL</span>
                </div>
            </div>

            <!-- AI & Automation Pane -->
            <div class="tech-tab-pane" id="tab-ai" role="tabpanel">
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8M8 12h8"></path></svg>
                    <span class="tech-name">OpenAI & Gemini APIs</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                    <span class="tech-name">LangChain / Agent Systems</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span class="tech-name">n8n & Zapier Pipelines</span>
                </div>
                <div class="tech-item-badge">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                    <span class="tech-name">OCR & Document Extraction</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section G: Our 5-Stage Working Process
     ========================================================================= -->
<section class="section-padding bg-light" aria-label="Our Working Process">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Agile Delivery Lifecycle</div>
            <h2 class="section-title">How We Bring Projects to Life</h2>
            <p class="section-subtitle">
                A disciplined, predictable 5-step engineering methodology that eliminates budget surprises, protects launch timelines, and guarantees technical excellence.
            </p>
        </div>

        <div class="process-grid">
            <div class="process-step-card">
                <div class="step-num-badge">1</div>
                <h3 class="step-title">Understanding Requirements</h3>
                <p class="step-desc">
                    In-depth discovery session to map your business objectives, target audience, technical dependencies, and non-functional scalability metrics.
                </p>
            </div>

            <div class="process-step-card">
                <div class="step-num-badge" style="background:#4f46e5;">2</div>
                <h3 class="step-title">Planning & Strategy</h3>
                <p class="step-desc">
                    Architectural blueprinting, database normalization, technology selection, API specifications, and milestone-based project roadmaps.
                </p>
            </div>

            <div class="process-step-card">
                <div class="step-num-badge" style="background:#7c3aed;">3</div>
                <h3 class="step-title">Design & Development</h3>
                <p class="step-desc">
                    Iterative sprint execution with clean, documented code, modular component architecture, and weekly staging environment progress reviews.
                </p>
            </div>

            <div class="process-step-card">
                <div class="step-num-badge" style="background:#0891b2;">4</div>
                <h3 class="step-title">Testing & QA</h3>
                <p class="step-desc">
                    Comprehensive cross-browser testing, mobile responsiveness audits, security vulnerability scans, and load/stress testing under peak conditions.
                </p>
            </div>

            <div class="process-step-card">
                <div class="step-num-badge" style="background:#059669;">5</div>
                <h3 class="step-title">Deployment & Support</h3>
                <p class="step-desc">
                    Zero-downtime production deployment, DNS & SSL configuration, automated backup routines, and continuous SLA-backed maintenance monitoring.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section H: Portfolio & Architectural Showcase
     ========================================================================= -->
<section class="section-padding" id="portfolio-showcase" aria-label="Portfolio Showcase">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Architecture In Action</div>
            <h2 class="section-title">Demonstration Projects & Case Studies</h2>
            <p class="section-subtitle">
                Explore real architectural examples and demonstration case studies illustrating how Techgroww solves complex business and technology challenges.
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
                        <span class="project-demo-pill">Case Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Cloud ERP & Supply Chain Portal</h3>
                    <p class="portfolio-card-summary">
                        Architected a high-concurrency inventory and multi-warehouse tracking platform handling automated stock alerts, supplier PO generation, and real-time ledger accounting.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">PHP 8+</span>
                        <span class="tech-pill">MySQL PDO</span>
                        <span class="tech-pill">REST APIs</span>
                        <span class="tech-pill">Redis</span>
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
                        <span class="project-demo-pill">Case Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Omnichannel Lead Sync Engine</h3>
                    <p class="portfolio-card-summary">
                        Automated multi-channel customer intake from web forms, WhatsApp Business, and Meta Ads directly into an enterprise CRM, cutting response lead-time from 4 hours to under 60 seconds.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">Webhooks</span>
                        <span class="tech-pill">PHP Cron</span>
                        <span class="tech-pill">CRM API</span>
                        <span class="tech-pill">Queue Worker</span>
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
                        <span class="project-demo-pill">Case Demonstration</span>
                    </div>
                    <h3 class="portfolio-card-title">Intelligent Document Extraction Agent</h3>
                    <p class="portfolio-card-summary">
                        Implemented a secure, OCR-powered LLM processing agent that parses unstructured invoices, extracts 24 key metadata fields with 99.4% precision, and automatically writes verified vouchers to MySQL.
                    </p>
                    <div class="portfolio-tech-tags">
                        <span class="tech-pill">Python</span>
                        <span class="tech-pill">LLM API</span>
                        <span class="tech-pill">PDF Parser</span>
                        <span class="tech-pill">Hostinger</span>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?= url('/portfolio') ?>" class="btn btn-outline btn-lg">
                <span>View Full Portfolio & Case Studies</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section J: Frequently Asked Questions
     ========================================================================= -->
<section class="section-padding bg-light" id="faq-section" aria-label="Frequently Asked Questions">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Clear Answers</div>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">
                Everything you need to know about our technology services, delivery timelines, contracts, and operational standards.
            </p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>What IT and software services does Techgroww offer?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Techgroww provides comprehensive end-to-end technology solutions: custom website development, enterprise software engineering, business process automation (RPA), generative AI integration, digital marketing & SEO, and IT architectural consulting. Every service is custom tailored to your business model.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>What is your typical project delivery timeline?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Timeline depends on complexity: high-performance corporate websites and landing pages typically launch in 2 to 3 weeks. Custom web applications, ERP modules, and complex automation workflows generally range between 4 to 10 weeks, delivered in transparent weekly milestones.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>How do you handle security and database integrity?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Security is central to our architectural standard. We utilize PHP PDO with strict prepared statements to prevent SQL injection, CSRF verification tokens on all form submissions, input sanitization, rate limiting against brute-force attacks, and server-level .htaccess directory protections keeping private configuration inaccessible to public web crawlers.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>Can you integrate AI or automate our existing software without rebuilding it?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        Absolutely. We build modular micro-services and API middleware that connect directly into your existing databases, CRM, or legacy software. This enables you to add AI customer assistants, automated reporting, or multi-platform data syncing without disrupting existing operations.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question-btn" aria-expanded="false">
                    <span>What happens after our project is deployed?</span>
                    <div class="faq-icon-indicator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                </button>
                <div class="faq-answer-panel">
                    <div class="faq-answer-content">
                        We provide a complimentary 30-day post-launch warranty with every project covering bug fixes and performance tuning. Following launch, clients can choose our managed SLA maintenance retainer for continuous server monitoring, security updates, regular database backups, and feature enhancements.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Section K: Contact Section & Interactive Lead Capture
     ========================================================================= -->
<section class="section-padding" id="contact-section" aria-label="Contact Techgroww">
    <div class="container">
        <div class="contact-section-inner">
            <!-- Contact Information Card -->
            <div class="contact-info-card">
                <div class="contact-info-glow" aria-hidden="true"></div>
                <div class="section-eyebrow section-eyebrow-dark">Start The Conversation</div>
                <h2 class="contact-info-title">Let's Discuss Your Project Requirements</h2>
                <p class="contact-info-desc">
                    Whether you are architecting a new software platform, seeking to automate existing operations, or exploring an enterprise AI solution, our senior engineers are here to help.
                </p>

                <div class="contact-channels">
                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Direct Email</strong>
                            <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Direct Phone / WhatsApp</strong>
                            <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>"><?= e(CONTACT_PHONE) ?></a>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Working Hours</strong>
                            <span><?= e(OFFICE_HOURS) ?></span>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Headquarters</strong>
                            <span><?= e(OFFICE_LOCATION) ?></span>
                        </div>
                    </div>
                </div>

                <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; font-size: 0.85rem; color: #94a3b8;">
                    🔒 Strict NDA Protection & Confidentiality Guaranteed on All Client Inquiries.
                </div>
            </div>

            <!-- Lead Capture Form -->
            <div class="lead-form-wrapper" id="contact-form">
                <div class="form-status-msg" id="contactFormStatus" role="status"></div>

                <form action="<?= url('/api/contact.php') ?>" method="POST" id="leadContactForm" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                    <input type="hidden" name="form_rendered_at" value="<?= time() ?>">
                    
                    <!-- Bot Honeypot Field -->
                    <div style="display:none;" aria-hidden="true">
                        <input type="text" name="website_url" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-grid">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="form-label" for="contact_name">Full Name <span style="color:#ef4444;">*</span></label>
                            <input type="text" id="contact_name" name="name" class="form-control" placeholder="e.g. Rahul Sharma" required>
                            <div class="form-error-feedback"></div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="form-label" for="contact_email">Business Email <span style="color:#ef4444;">*</span></label>
                            <input type="email" id="contact_email" name="email" class="form-control" placeholder="e.g. rahul@company.com" required>
                            <div class="form-error-feedback"></div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label class="form-label" for="contact_phone">Phone Number</label>
                            <input type="tel" id="contact_phone" name="phone" class="form-control" placeholder="e.g. +91 98765 43210">
                            <div class="form-error-feedback"></div>
                        </div>

                        <!-- Company -->
                        <div class="form-group">
                            <label class="form-label" for="contact_company">Company / Organization</label>
                            <input type="text" id="contact_company" name="company" class="form-control" placeholder="e.g. Acme Technologies">
                            <div class="form-error-feedback"></div>
                        </div>

                        <!-- Service Required -->
                        <div class="form-group">
                            <label class="form-label" for="contact_service">Service Required <span style="color:#ef4444;">*</span></label>
                            <select id="contact_service" name="service" class="form-control" required>
                                <option value="">Select a Service</option>
                                <option value="Web Development">Website Development</option>
                                <option value="Custom Software Development">Custom Software Development</option>
                                <option value="Business Process Automation">Business Process Automation</option>
                                <option value="AI & Intelligent Solutions">AI & Intelligent Solutions</option>
                                <option value="Digital Marketing & SEO">Digital Marketing & SEO</option>
                                <option value="IT Consulting & Advisory">IT Consulting & Strategy</option>
                                <option value="General Technology Enquiry">General Technology Enquiry</option>
                            </select>
                            <div class="form-error-feedback"></div>
                        </div>

                        <!-- Project Budget -->
                        <div class="form-group">
                            <label class="form-label" for="contact_budget">Estimated Budget</label>
                            <select id="contact_budget" name="budget" class="form-control">
                                <option value="Not Specified">Select Budget Range</option>
                                <option value="< ₹50,000">&lt; ₹50,000 / Starter</option>
                                <option value="₹50,000 - ₹1,50,000">₹50,000 - ₹1,50,000 / Growth</option>
                                <option value="₹1,50,000 - ₹5,00,000">₹1,50,000 - ₹5,00,000 / Business</option>
                                <option value="₹5,00,000+">₹5,00,000+ / Enterprise Scale</option>
                            </select>
                        </div>

                        <!-- Project Description -->
                        <div class="form-group col-full">
                            <label class="form-label" for="contact_message">Project Scope & Requirements <span style="color:#ef4444;">*</span></label>
                            <textarea id="contact_message" name="message" class="form-control" placeholder="Tell us about your project goals, desired timeline, or key technical challenges..." required></textarea>
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group col-full" style="margin-top: 0.5rem;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <span>Submit Your Project Enquiry</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </button>
                            <p style="font-size: 0.775rem; color: #94a3b8; text-align: center; margin-top: 0.75rem;">
                                By submitting, you agree to our <a href="<?= url('/privacy-policy') ?>" target="_blank" style="color: #64748b; text-decoration: underline;">Privacy Policy</a>. We never spam.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

