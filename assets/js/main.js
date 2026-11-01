/**
 * Techgroww - Client Interactive Scripts
 * Lightweight Vanilla JavaScript (Zero Dependencies)
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // -------------------------------------------------------------
    // 1. Sticky Navigation Header
    // -------------------------------------------------------------
    const siteHeader = document.getElementById('siteHeader');
    const handleScrollHeader = () => {
        if (!siteHeader) return;
        if (window.scrollY > 20) {
            siteHeader.classList.add('is-scrolled');
        } else {
            siteHeader.classList.remove('is-scrolled');
        }
    };
    window.addEventListener('scroll', handleScrollHeader, { passive: true });
    handleScrollHeader();

    // -------------------------------------------------------------
    // 2. Mobile Navigation Drawer
    // -------------------------------------------------------------
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileCloseBtn = document.getElementById('mobileCloseBtn');
    const mobileNavDrawer = document.getElementById('mobileNavDrawer');
    const mobileNavBackdrop = document.getElementById('mobileNavBackdrop');
    const mobileServicesToggle = document.getElementById('mobileServicesToggle');
    const mobileServicesList = document.getElementById('mobileServicesList');

    const openMobileMenu = () => {
        if (!mobileNavDrawer || !mobileNavBackdrop) return;
        mobileNavDrawer.classList.add('is-active');
        mobileNavBackdrop.classList.add('is-active');
        mobileNavDrawer.setAttribute('aria-hidden', 'false');
        if (mobileMenuBtn) mobileMenuBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };

    const closeMobileMenu = () => {
        if (!mobileNavDrawer || !mobileNavBackdrop) return;
        mobileNavDrawer.classList.remove('is-active');
        mobileNavBackdrop.classList.remove('is-active');
        mobileNavDrawer.setAttribute('aria-hidden', 'true');
        if (mobileMenuBtn) mobileMenuBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openMobileMenu);
    if (mobileCloseBtn) mobileCloseBtn.addEventListener('click', closeMobileMenu);
    if (mobileNavBackdrop) mobileNavBackdrop.addEventListener('click', closeMobileMenu);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileNavDrawer && mobileNavDrawer.classList.contains('is-active')) {
            closeMobileMenu();
        }
    });

    if (mobileServicesToggle && mobileServicesList) {
        mobileServicesToggle.addEventListener('click', () => {
            const isOpen = mobileServicesList.classList.toggle('is-open');
            mobileServicesToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            const chevron = mobileServicesToggle.querySelector('svg');
            if (chevron) {
                chevron.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0deg)';
                chevron.style.transition = 'transform 0.2s ease';
            }
        });
    }

    // -------------------------------------------------------------
    // 3. Technologies Tabs Switching
    // -------------------------------------------------------------
    const techTabButtons = document.querySelectorAll('.tech-tab-btn');
    const techTabPanes = document.querySelectorAll('.tech-tab-pane');

    if (techTabButtons.length > 0 && techTabPanes.length > 0) {
        techTabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetTab = btn.getAttribute('data-tab');

                techTabButtons.forEach(b => b.classList.remove('active'));
                techTabPanes.forEach(p => p.classList.remove('active'));

                btn.classList.add('active');
                const targetPane = document.getElementById(targetTab);
                if (targetPane) targetPane.classList.add('active');
            });
        });
    }

    // -------------------------------------------------------------
    // 4. Interactive Accessible FAQ Accordion
    // -------------------------------------------------------------
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.faq-question-btn');
        const answerPanel = item.querySelector('.faq-answer-panel');

        if (questionBtn && answerPanel) {
            questionBtn.addEventListener('click', () => {
                const isCurrentlyOpen = item.classList.contains('is-open');

                // Optional: close other open items for cleaner single-card reading
                faqItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('is-open')) {
                        otherItem.classList.remove('is-open');
                        const otherBtn = otherItem.querySelector('.faq-question-btn');
                        const otherPanel = otherItem.querySelector('.faq-answer-panel');
                        if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                        if (otherPanel) otherPanel.style.maxHeight = null;
                    }
                });

                if (isCurrentlyOpen) {
                    item.classList.remove('is-open');
                    questionBtn.setAttribute('aria-expanded', 'false');
                    answerPanel.style.maxHeight = null;
                } else {
                    item.classList.add('is-open');
                    questionBtn.setAttribute('aria-expanded', 'true');
                    answerPanel.style.maxHeight = answerPanel.scrollHeight + 'px';
                }
            });
        }
    });

    // -------------------------------------------------------------
    // 5. Back to Top Floating Button
    // -------------------------------------------------------------
    const backToTopBtn = document.getElementById('backToTopBtn');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 350) {
                backToTopBtn.classList.add('is-visible');
            } else {
                backToTopBtn.classList.remove('is-visible');
            }
        }, { passive: true });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // -------------------------------------------------------------
    // 6. Lead Contact Form AJAX Handling
    // -------------------------------------------------------------
    const leadContactForm = document.getElementById('leadContactForm');
    if (leadContactForm) {
        // Set client render timestamp for bot prevention
        const renderedAtInput = leadContactForm.querySelector('input[name="form_rendered_at"]');
        if (renderedAtInput) {
            renderedAtInput.value = Math.floor(Date.now() / 1000);
        }

        leadContactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Clear previous errors
            const formGroups = leadContactForm.querySelectorAll('.form-group');
            formGroups.forEach(fg => {
                fg.classList.remove('has-error');
                const err = fg.querySelector('.form-error-feedback');
                if (err) err.textContent = '';
            });

            const statusMsg = document.getElementById('contactFormStatus');
            if (statusMsg) {
                statusMsg.className = 'form-status-msg';
                statusMsg.textContent = '';
                statusMsg.style.display = 'none';
            }

            // Basic client-side validation
            let hasClientError = false;
            const nameInput = leadContactForm.querySelector('[name="name"]');
            const emailInput = leadContactForm.querySelector('[name="email"]');
            const serviceInput = leadContactForm.querySelector('[name="service"]');
            const messageInput = leadContactForm.querySelector('[name="message"]');

            const markError = (input, message) => {
                hasClientError = true;
                const parent = input.closest('.form-group');
                if (parent) {
                    parent.classList.add('has-error');
                    const err = parent.querySelector('.form-error-feedback');
                    if (err) err.textContent = message;
                }
            };

            if (nameInput && nameInput.value.trim().length < 2) {
                markError(nameInput, 'Please enter your full name (at least 2 characters).');
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailInput && !emailRegex.test(emailInput.value.trim())) {
                markError(emailInput, 'Please provide a valid email address.');
            }

            if (serviceInput && !serviceInput.value) {
                markError(serviceInput, 'Please select the service you are interested in.');
            }

            if (messageInput && messageInput.value.trim().length < 10) {
                markError(messageInput, 'Please share at least a few details (minimum 10 characters).');
            }

            if (hasClientError) {
                return;
            }

            // Prepare button loading state
            const submitBtn = leadContactForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Sending Enquiry...</span>';
            }

            try {
                const formData = new FormData(leadContactForm);
                const response = await fetch(leadContactForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    leadContactForm.reset();
                    if (statusMsg) {
                        statusMsg.className = 'form-status-msg success';
                        statusMsg.textContent = result.message;
                        statusMsg.style.display = 'block';
                    }
                } else {
                    if (statusMsg) {
                        statusMsg.className = 'form-status-msg error';
                        statusMsg.textContent = result.message || 'An error occurred while submitting your enquiry.';
                        statusMsg.style.display = 'block';
                    }

                    if (result.errors) {
                        Object.keys(result.errors).forEach(fieldName => {
                            const field = leadContactForm.querySelector(`[name="${fieldName}"]`);
                            if (field) {
                                markError(field, result.errors[fieldName]);
                            }
                        });
                    }
                }
            } catch (err) {
                if (statusMsg) {
                    statusMsg.className = 'form-status-msg error';
                    statusMsg.textContent = 'Network or server error. Please try again or email us directly at contact@techgroww.co.in.';
                    statusMsg.style.display = 'block';
                }
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                }
            }
        });
    }

    // -------------------------------------------------------------
    // 7. Newsletter Subscription AJAX Handling
    // -------------------------------------------------------------
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const statusEl = document.getElementById('newsletterStatus');
            const emailInput = newsletterForm.querySelector('input[name="email"]');
            const submitBtn = newsletterForm.querySelector('button[type="submit"]');

            if (!emailInput || !emailInput.value.trim()) return;

            if (submitBtn) submitBtn.disabled = true;
            if (statusEl) {
                statusEl.className = 'newsletter-status';
                statusEl.textContent = 'Subscribing...';
            }

            try {
                const formData = new FormData(newsletterForm);
                const response = await fetch(newsletterForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();
                if (statusEl) {
                    statusEl.className = 'newsletter-status ' + (data.success ? 'success' : 'error');
                    statusEl.textContent = data.message;
                }
                if (data.success) {
                    newsletterForm.reset();
                }
            } catch (err) {
                if (statusEl) {
                    statusEl.className = 'newsletter-status error';
                    statusEl.textContent = 'Unable to subscribe. Please try again.';
                }
            } finally {
                if (submitBtn) submitBtn.disabled = false;
            }
        });
    }
});
