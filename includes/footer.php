<?php
/**
 * Techgroww - Global Footer Component
 */
?>
    </main><!-- /#main-content -->

    <!-- Call to Action Global Strip (shown when not on contact page) -->
    <?php if (($currentPage ?? '') !== 'contact'): ?>
    <section class="global-cta-section" aria-label="Ready to transform your business">
        <div class="container">
            <div class="global-cta-card">
                <div class="cta-glow-mesh" aria-hidden="true"></div>
                <div class="cta-content-left">
                    <span class="cta-eyebrow">Enterprise Tech Excellence</span>
                    <h2 class="cta-heading">Ready to Grow Your Business With Technology?</h2>
                    <p class="cta-description">
                        Partner with Techgroww to accelerate development, modernize legacy infrastructure, and automate core operational workflows. Schedule a free 30-minute architectural consultation.
                    </p>
                </div>
                <div class="cta-actions-right">
                    <a href="<?= url('/contact#contact-form') ?>" class="btn btn-primary btn-lg cta-btn">
                        <span>Get in Touch</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </a>
                    <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>" class="btn btn-outline-white btn-lg cta-phone-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span>Call Us Direct</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Site Footer -->
    <footer class="site-footer" role="contentinfo">
        <div class="container footer-top">
            <div class="footer-grid">
                <!-- Col 1: Brand & Philosophy -->
                <div class="footer-col footer-col-brand">
                    <a href="<?= url('/') ?>" class="footer-logo-link" aria-label="Techgroww Home">
                        <img src="<?= asset('images/logo-white.svg') ?>" alt="Techgroww Logo" width="190" height="44" class="footer-logo">
                    </a>
                    <p class="footer-about-text">
                        Techgroww is a forward-thinking IT solutions and technology consulting firm. We empower ambitious enterprises and startups with custom software development, high-converting digital platforms, process automation, and intelligent AI architectures.
                    </p>
                    <div class="footer-social-links" aria-label="Social media channels">
                        <a href="<?= e(SOCIAL_LINKEDIN) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Techgroww LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                        </a>
                        <a href="<?= e(SOCIAL_TWITTER) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Techgroww Twitter / X">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="<?= e(SOCIAL_GITHUB) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Techgroww GitHub">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        </a>
                        <a href="https://wa.me/<?= e(CONTACT_WHATSAPP) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Techgroww WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="footer-col">
                    <h3 class="footer-col-title">Company</h3>
                    <ul class="footer-nav-list">
                        <li><a href="<?= url('/') ?>">Home</a></li>
                        <li><a href="<?= url('/about') ?>">About Us</a></li>
                        <li><a href="<?= url('/services') ?>">All Services</a></li>
                        <li><a href="<?= url('/portfolio') ?>">Portfolio & Work</a></li>
                        <li><a href="<?= url('/contact') ?>">Contact Us</a></li>
                        <li><a href="<?= url('/privacy-policy') ?>">Privacy Policy</a></li>
                        <li><a href="<?= url('/terms') ?>">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- Col 3: Core IT Services -->
                <div class="footer-col">
                    <h3 class="footer-col-title">Our Services</h3>
                    <ul class="footer-nav-list">
                        <li><a href="<?= url('/services/web-development') ?>">Web Development</a></li>
                        <li><a href="<?= url('/services/software-development') ?>">Custom Software Development</a></li>
                        <li><a href="<?= url('/services/automation') ?>">Business Automation</a></li>
                        <li><a href="<?= url('/services/ai-solutions') ?>">AI & Intelligent Solutions</a></li>
                        <li><a href="<?= url('/services/digital-marketing') ?>">Digital Marketing & SEO</a></li>
                        <li><a href="<?= url('/services/it-consulting') ?>">IT Consulting & Strategy</a></li>
                    </ul>
                </div>

                <!-- Col 4: Newsletter & Contact Snippet -->
                <div class="footer-col footer-col-newsletter">
                    <h3 class="footer-col-title">Stay Ahead</h3>
                    <p class="footer-sub-text">
                        Subscribe to our technology briefing on software architecture, automation insights, and AI advancements.
                    </p>
                    
                    <form action="<?= url('/api/subscribe.php') ?>" method="POST" class="newsletter-form" id="newsletterForm" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                        <!-- Spam honeypot -->
                        <div style="display:none;" aria-hidden="true">
                            <input type="text" name="website_url" tabindex="-1" autocomplete="off">
                        </div>
                        
                        <div class="newsletter-input-group">
                            <input type="email" name="email" class="newsletter-input" placeholder="Your business email" required aria-label="Business Email for Newsletter">
                            <button type="submit" class="newsletter-submit-btn" aria-label="Subscribe">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                            </button>
                        </div>
                        <div class="newsletter-status" id="newsletterStatus" aria-live="polite"></div>
                    </form>

                    <div class="footer-contact-details" itemscope itemtype="https://schema.org/LocalBusiness">
                        <meta itemprop="name" content="Techgroww">
                        <div class="footer-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                <span itemprop="addressLocality">Bengaluru</span>, <span itemprop="addressRegion">Mumbai</span> & <span>Noida (Delhi NCR)</span> Tech Hubs, <span itemprop="addressCountry">India</span>
                            </span>
                        </div>
                        <div class="footer-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <a href="mailto:<?= e(CONTACT_EMAIL) ?>" itemprop="email"><?= e(CONTACT_EMAIL) ?></a>
                        </div>
                        <div class="footer-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>" itemprop="telephone"><?= e(CONTACT_PHONE) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <p class="copyright-text">
                    &copy; <?= date('Y') ?> <strong><?= e(APP_LEGAL_NAME) ?></strong>. All rights reserved. Registered Technology Consultancy in India.
                </p>
                <div class="footer-bottom-links">
                    <a href="<?= url('/privacy-policy') ?>">Privacy Policy</a>
                    <span class="sep">&bull;</span>
                    <a href="<?= url('/terms') ?>">Terms & Conditions</a>
                    <span class="sep">&bull;</span>
                    <a href="<?= url('/sitemap.xml') ?>" target="_blank">XML Sitemap</a>
                    <span class="sep">&bull;</span>
                    <a href="<?= url('/admin/login.php') ?>" class="admin-portal-link" rel="nofollow">Admin Portal</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Floating Button -->
    <button type="button" class="back-to-top" id="backToTopBtn" aria-label="Scroll back to top">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
    </button>

    <!-- Core Interactive Client Script -->
    <script src="<?= asset('js/main.js') ?>?v=1.0.0" defer></script>
</body>
</html>

