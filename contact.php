<?php
/**
 * Techgroww - Contact Us
 * Domain: https://techgroww.co.in/contact
 */

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Contact Us | Let\'s Discuss Your Project | Techgroww IT Solutions';
$pageDescription = 'Contact Techgroww technology consulting in India. Schedule a free architectural consultation, request a project quote, or discuss custom software development, business automation, and AI solutions.';
$canonicalUrl = 'https://techgroww.co.in/contact';
$currentPage = 'contact';

// Support pre-selecting a service from query string (e.g. ?service=Web%20Development)
$preselectedService = cleanInput($_GET['service'] ?? '');

// ContactPage Structured Data Schema with Location Details
$contactPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'name' => 'Contact Techgroww - Office Locations & Consultation',
    'url' => 'https://techgroww.co.in/contact',
    'description' => 'Contact Techgroww technology consulting in Bengaluru and Mumbai. Schedule an architectural consultation or request custom software development and business automation quotes.',
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'Techgroww',
        'alternateName' => ['Tech Groww', 'Techgroww IT Solutions'],
        'telephone' => CONTACT_PHONE,
        'email' => CONTACT_EMAIL,
        'url' => 'https://techgroww.co.in',
        'location' => [
            [
                '@type' => 'Place',
                'name' => 'Techgroww Bengaluru Headquarters',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Tech Corridor, Outer Ring Road, HSR Layout & Electronic City',
                    'addressLocality' => 'Bengaluru',
                    'addressRegion' => 'Karnataka',
                    'postalCode' => '560102',
                    'addressCountry' => 'IN'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 12.9121,
                    'longitude' => 77.6446
                ],
                'hasMap' => 'https://www.google.com/maps/search/?api=1&query=HSR+Layout+Bengaluru+Karnataka'
            ],
            [
                '@type' => 'Place',
                'name' => 'Techgroww Mumbai Technology Center',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Bandra Kurla Complex (BKC) & Andheri Tech Zone',
                    'addressLocality' => 'Mumbai',
                    'addressRegion' => 'Maharashtra',
                    'postalCode' => '400051',
                    'addressCountry' => 'IN'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 19.0657,
                    'longitude' => 72.8687
                ],
                'hasMap' => 'https://www.google.com/maps/search/?api=1&query=Bandra+Kurla+Complex+Mumbai'
            ],
            [
                '@type' => 'Place',
                'name' => 'Techgroww Noida & Delhi NCR Tech Hub',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Sector 62 & Electronic City Tech Zone',
                    'addressLocality' => 'Noida',
                    'addressRegion' => 'Uttar Pradesh',
                    'postalCode' => '201309',
                    'addressCountry' => 'IN'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 28.6280,
                    'longitude' => 77.3649
                ],
                'hasMap' => 'https://www.google.com/maps/search/?api=1&query=Sector+62+Noida+Uttar+Pradesh'
            ]
        ],
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'telephone' => CONTACT_PHONE,
                'contactType' => 'sales',
                'email' => CONTACT_EMAIL,
                'areaServed' => ['IN', 'US', 'GB', 'AE'],
                'availableLanguage' => ['English', 'Hindi']
            ],
            [
                '@type' => 'ContactPoint',
                'telephone' => CONTACT_PHONE,
                'contactType' => 'customer service',
                'email' => CONTACT_EMAIL,
                'areaServed' => ['IN', 'US', 'GB', 'AE'],
                'availableLanguage' => ['English', 'Hindi']
            ]
        ]
    ]
];

$extraSchema = '<script type="application/ld+json">' . json_encode($contactPageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Contact Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Let's Connect</div>
            <h1 class="page-hero-title">Start Your Digital Transformation Conversation</h1>
            <p class="page-hero-sub">
                Have a new project in mind or looking to modernize existing systems? Fill out the form below or contact us directly. Our lead engineers review every inquiry and respond within 24 business hours.
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Contact Us' => '']) ?>

<!-- Main Contact Section with Form -->
<section class="section-padding bg-light" id="contact-form" aria-label="Project Inquiry Form">
    <div class="container">
        <div class="contact-section-inner">
            <!-- Contact Channels Sidebar -->
            <div class="contact-info-card">
                <div class="contact-info-glow" aria-hidden="true"></div>
                <div class="section-eyebrow section-eyebrow-dark">Direct Channels</div>
                <h2 class="contact-info-title">Reach Out Directly</h2>
                <p class="contact-info-desc">
                    We welcome conversations with ambitious founders, engineering heads, and business owners looking to scale their technology capabilities.
                </p>

                <div class="contact-channels">
                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Project Inquiries</strong>
                            <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Direct Phone</strong>
                            <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>"><?= e(CONTACT_PHONE) ?></a>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle" style="color: #25d366;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Instant WhatsApp</strong>
                            <a href="https://wa.me/<?= e(CONTACT_WHATSAPP) ?>?text=Hello%20Techgroww,%20I%20would%20like%20to%20discuss%20a%20project" target="_blank" rel="noopener noreferrer">Chat on WhatsApp</a>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Business Hours</strong>
                            <span><?= e(OFFICE_HOURS) ?></span>
                        </div>
                    </div>

                    <div class="contact-channel-row">
                        <div class="channel-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="channel-content">
                            <strong>Registered Hubs</strong>
                            <span>Bengaluru, Mumbai & Noida (Delhi NCR), India</span>
                        </div>
                    </div>
                </div>

                <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; font-size: 0.85rem; color: #94a3b8;">
                    🔒 <strong>Strict NDA:</strong> We are glad to sign a mutual Non-Disclosure Agreement before discussing any proprietary technical specifications.
                </div>
            </div>

            <!-- Form Card -->
            <div class="lead-form-wrapper">
                <h3 style="font-size: 1.6rem; margin-bottom: 0.5rem; color: var(--navy-900);">Project Consultation Request</h3>
                <p style="font-size: 0.95rem; color: var(--slate-500); margin-bottom: 2rem;">
                    Tell us about your requirements, technical scope, or business timeline.
                </p>

                <div class="form-status-msg" id="contactFormStatus" role="status"></div>

                <form action="<?= url('/api/contact.php') ?>" method="POST" id="leadContactForm" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                    <input type="hidden" name="form_rendered_at" value="<?= time() ?>">
                    
                    <!-- Bot Honeypot -->
                    <div style="display:none;" aria-hidden="true">
                        <input type="text" name="website_url" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="c_name">Full Name <span style="color:#ef4444;">*</span></label>
                            <input type="text" id="c_name" name="name" class="form-control" placeholder="e.g. Anand Verma" required>
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="c_email">Business Email <span style="color:#ef4444;">*</span></label>
                            <input type="email" id="c_email" name="email" class="form-control" placeholder="e.g. anand@company.com" required>
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="c_phone">Phone / WhatsApp Number</label>
                            <input type="tel" id="c_phone" name="phone" class="form-control" placeholder="e.g. +91 98765 43210">
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="c_company">Company / Startup Name</label>
                            <input type="text" id="c_company" name="company" class="form-control" placeholder="e.g. NextGen Logistics">
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="c_service">Service Required <span style="color:#ef4444;">*</span></label>
                            <select id="c_service" name="service" class="form-control" required>
                                <option value="">Select Service Area</option>
                                <option value="Web Development" <?= ($preselectedService === 'Web Development' || $preselectedService === 'Website Development') ? 'selected' : '' ?>>Website Development</option>
                                <option value="Custom Software Development" <?= ($preselectedService === 'Custom Software Development') ? 'selected' : '' ?>>Custom Software Development</option>
                                <option value="Business Process Automation" <?= ($preselectedService === 'Business Process Automation') ? 'selected' : '' ?>>Business Process Automation</option>
                                <option value="AI & Intelligent Solutions" <?= ($preselectedService === 'AI & Intelligent Solutions') ? 'selected' : '' ?>>AI & Intelligent Solutions</option>
                                <option value="Digital Marketing & SEO" <?= ($preselectedService === 'Digital Marketing & SEO') ? 'selected' : '' ?>>Digital Marketing & SEO</option>
                                <option value="IT Consulting & Advisory" <?= ($preselectedService === 'IT Consulting & Strategy' || $preselectedService === 'IT Consulting & Advisory') ? 'selected' : '' ?>>IT Consulting & Strategy</option>
                                <option value="General Technology Enquiry">General Technology Consultation</option>
                            </select>
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="c_budget">Estimated Project Budget</label>
                            <select id="c_budget" name="budget" class="form-control">
                                <option value="Not Specified">Select Budget Bracket</option>
                                <option value="< ₹50,000">&lt; ₹50,000 / Starter Scope</option>
                                <option value="₹50,000 - ₹1,50,000">₹50,000 - ₹1,50,000 / Standard</option>
                                <option value="₹1,50,000 - ₹5,00,000">₹1,50,000 - ₹5,00,000 / Growth</option>
                                <option value="₹5,00,000+">₹5,00,000+ / Enterprise Scale</option>
                            </select>
                        </div>

                        <div class="form-group col-full">
                            <label class="form-label" for="c_message">Project Scope & Key Requirements <span style="color:#ef4444;">*</span></label>
                            <textarea id="c_message" name="message" class="form-control" placeholder="Please describe your key objectives, required features, or the specific business problem you are looking to solve..." required></textarea>
                            <div class="form-error-feedback"></div>
                        </div>

                        <div class="form-group col-full" style="margin-top: 0.5rem;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <span>Send Consultation Request</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </button>
                            <p style="font-size: 0.775rem; color: #94a3b8; text-align: center; margin-top: 0.75rem;">
                                We respect your privacy. Inquiries are stored securely and never shared with third parties.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     Location Optimization: Office Hubs & Regional Service Centers
     ========================================================================= -->
<section class="section-padding bg-white" id="office-locations" aria-label="Techgroww Office Locations in India">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Operating Presence</div>
            <h2 class="section-title">Our Technology Hubs in India</h2>
            <p class="section-subtitle">
                Strategically positioned in India's leading technology and financial corridors to deliver agile engineering and on-ground collaboration.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
            <!-- Hub 1: Bengaluru -->
            <div class="why-choose-card" style="display:flex; flex-direction:column; justify-content:space-between; border-top: 4px solid #2563eb;">
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
                        <span style="display:inline-block; padding: 4px 10px; background:#eff6ff; color:#2563eb; font-size:0.75rem; font-weight:700; border-radius:20px; text-transform:uppercase; letter-spacing:0.5px;">Headquarters</span>
                        <span style="font-size:0.85rem; color:#64748b;">Karnataka, India</span>
                    </div>
                    <h3 style="font-size:1.35rem; color:#0b132b; margin-bottom:0.75rem;">Bengaluru Engineering Lab</h3>
                    <p style="color:#475569; font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                        Our core research, software development, and AI engineering hub located in India's Silicon Valley.
                    </p>
                    <div style="font-size:0.85rem; color:#334155; line-height:1.7; margin-bottom:1.25rem;">
                        <div style="margin-bottom:6px;"><strong>📍 Address:</strong> Tech Corridor, Outer Ring Road, HSR Layout & Electronic City, Bengaluru, Karnataka 560102</div>
                        <div style="margin-bottom:6px;"><strong>📞 Phone:</strong> <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_PHONE) ?></a></div>
                        <div style="margin-bottom:6px;"><strong>✉️ Email:</strong> <a href="mailto:<?= e(CONTACT_EMAIL) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_EMAIL) ?></a></div>
                        <div><strong>🕒 Hours:</strong> Mon - Sat: 9:00 AM - 7:00 PM IST</div>
                    </div>
                </div>
                <div style="border-top:1px solid #e2e8f0; padding-top:1rem; margin-top:0.5rem;">
                    <a href="https://www.google.com/maps/search/?api=1&query=HSR+Layout+Bengaluru+Karnataka" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm btn-block" style="text-align:center;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>View on Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- Hub 2: Mumbai -->
            <div class="why-choose-card" style="display:flex; flex-direction:column; justify-content:space-between; border-top: 4px solid #7c3aed;">
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
                        <span style="display:inline-block; padding: 4px 10px; background:#f5f3ff; color:#7c3aed; font-size:0.75rem; font-weight:700; border-radius:20px; text-transform:uppercase; letter-spacing:0.5px;">Technology Center</span>
                        <span style="font-size:0.85rem; color:#64748b;">Maharashtra, India</span>
                    </div>
                    <h3 style="font-size:1.35rem; color:#0b132b; margin-bottom:0.75rem;">Mumbai Enterprise Center</h3>
                    <p style="color:#475569; font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                        Our consulting, enterprise automation, and commercial partnerships center in India's financial capital.
                    </p>
                    <div style="font-size:0.85rem; color:#334155; line-height:1.7; margin-bottom:1.25rem;">
                        <div style="margin-bottom:6px;"><strong>📍 Address:</strong> Bandra Kurla Complex (BKC) & Andheri Tech Zone, Mumbai, Maharashtra 400051</div>
                        <div style="margin-bottom:6px;"><strong>📞 Phone:</strong> <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_PHONE) ?></a></div>
                        <div style="margin-bottom:6px;"><strong>✉️ Email:</strong> <a href="mailto:<?= e(CONTACT_EMAIL) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_EMAIL) ?></a></div>
                        <div><strong>🕒 Hours:</strong> Mon - Sat: 9:00 AM - 7:00 PM IST</div>
                    </div>
                </div>
                <div style="border-top:1px solid #e2e8f0; padding-top:1rem; margin-top:0.5rem;">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bandra+Kurla+Complex+Mumbai" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm btn-block" style="text-align:center;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>View on Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- Hub 3: Noida & Delhi NCR -->
            <div class="why-choose-card" style="display:flex; flex-direction:column; justify-content:space-between; border-top: 4px solid #ea580c;">
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
                        <span style="display:inline-block; padding: 4px 10px; background:#fff7ed; color:#ea580c; font-size:0.75rem; font-weight:700; border-radius:20px; text-transform:uppercase; letter-spacing:0.5px;">Innovation Hub</span>
                        <span style="font-size:0.85rem; color:#64748b;">Delhi NCR / UP, India</span>
                    </div>
                    <h3 style="font-size:1.35rem; color:#0b132b; margin-bottom:0.75rem;">Noida & Delhi NCR Hub</h3>
                    <p style="color:#475569; font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                        Our Northern India engineering facility serving high-growth startups, corporate clients, and industrial leaders across the NCR region.
                    </p>
                    <div style="font-size:0.85rem; color:#334155; line-height:1.7; margin-bottom:1.25rem;">
                        <div style="margin-bottom:6px;"><strong>📍 Address:</strong> Sector 62 & Noida Electronic City Tech Zone, Noida, Uttar Pradesh 201309</div>
                        <div style="margin-bottom:6px;"><strong>📞 Phone:</strong> <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_PHONE) ?></a></div>
                        <div style="margin-bottom:6px;"><strong>✉️ Email:</strong> <a href="mailto:<?= e(CONTACT_EMAIL) ?>" style="color:#2563eb; font-weight:600;"><?= e(CONTACT_EMAIL) ?></a></div>
                        <div><strong>🕒 Hours:</strong> Mon - Sat: 9:00 AM - 7:00 PM IST</div>
                    </div>
                </div>
                <div style="border-top:1px solid #e2e8f0; padding-top:1rem; margin-top:0.5rem;">
                    <a href="https://www.google.com/maps/search/?api=1&query=Sector+62+Noida+Uttar+Pradesh" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm btn-block" style="text-align:center;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>View on Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- Hub 4: Pan-India & Global Delivery -->
            <div class="why-choose-card" style="display:flex; flex-direction:column; justify-content:space-between; border-top: 4px solid #059669;">
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
                        <span style="display:inline-block; padding: 4px 10px; background:#ecfdf5; color:#059669; font-size:0.75rem; font-weight:700; border-radius:20px; text-transform:uppercase; letter-spacing:0.5px;">Nationwide & Global</span>
                        <span style="font-size:0.85rem; color:#64748b;">Remote Agile Squads</span>
                    </div>
                    <h3 style="font-size:1.35rem; color:#0b132b; margin-bottom:0.75rem;">Pan-India & Global Delivery</h3>
                    <p style="color:#475569; font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                        Dedicated remote engineering pods serving high-growth clients across all major metropolitan regions.
                    </p>
                    <div style="font-size:0.85rem; color:#334155; line-height:1.7; margin-bottom:1.25rem;">
                        <div style="margin-bottom:6px;"><strong>🇮🇳 India Tech Hubs:</strong> Delhi NCR, Hyderabad, Pune, Chennai, Kolkata, Ahmedabad</div>
                        <div style="margin-bottom:6px;"><strong>🌍 Global Delivery:</strong> United States, United Kingdom, UAE, Singapore, Australia</div>
                        <div style="margin-bottom:6px;"><strong>💬 Virtual Consultations:</strong> Google Meet & Zoom Video Rooms</div>
                        <div><strong>⚡ Response SLA:</strong> Under 24 Business Hours Guaranteed</div>
                    </div>
                </div>
                <div style="border-top:1px solid #e2e8f0; padding-top:1rem; margin-top:0.5rem;">
                    <a href="https://wa.me/<?= e(CONTACT_WHATSAPP) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm btn-block" style="text-align:center; color:#059669; border-color:#059669;">
                        <span>Connect on WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Onboarding FAQ Section -->
<section class="section-padding bg-white" aria-label="Onboarding Process FAQ">
    <div class="container">
        <div class="section-header">
            <div class="section-eyebrow">Next Steps</div>
            <h2 class="section-title">What Happens After You Contact Us?</h2>
            <p class="section-subtitle">A transparent overview of our onboarding journey.</p>
        </div>

        <div class="grid-3">
            <div class="why-choose-card">
                <div class="why-icon">1</div>
                <h3>1. Initial Review (Within 24 Hours)</h3>
                <p>A senior engineering lead examines your project requirements, technical dependencies, and estimated scope.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#eef2ff; color:#4f46e5;">2</div>
                <h3>2. 30-Min Discovery Video Call</h3>
                <p>We schedule a focused call to clarify business logic, user flows, integration points, and delivery expectations.</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon" style="background:#f5f3ff; color:#7c3aed;">3</div>
                <h3>3. Detailed Architectural Proposal</h3>
                <p>You receive an itemized proposal with clear milestone breakdowns, fixed pricing, and an exact development schedule.</p>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

