<?php
/**
 * Techgroww - Global Header Component
 */

require_once __DIR__ . '/functions.php';

// Fallback metadata defaults
$pageTitle = $pageTitle ?? APP_NAME . ' | ' . APP_TAGLINE;
$pageDescription = $pageDescription ?? 'Techgroww is a premier IT solutions & technology consulting firm in India. We build high-performance websites, custom software, business automation pipelines, and enterprise AI solutions.';
$pageKeywords = $pageKeywords ?? 'Techgroww, Tech Groww, Techgroww IT Solutions, techgroww.co.in, IT services India, web development company, custom software development, business automation, AI solutions, IT consulting Bangalore, software company Mumbai';
$canonicalUrl = $canonicalUrl ?? url(ltrim($_SERVER['REQUEST_URI'] ?? '', '/'));
$ogImage = $ogImage ?? asset('images/og-banner.jpg');
$currentPage = $currentPage ?? '';
$flashMessages = getFlashMessages();
?>
<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Primary SEO Metadata -->
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="keywords" content="<?= e($pageKeywords) ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta name="author" content="Techgroww IT Solutions">
    <meta name="publisher" content="Techgroww">
    <meta name="theme-color" content="#0B132B">

    <!-- Geographic & Regional Targeting (Local & National SEO) -->
    <meta name="geo.region" content="IN-KA">
    <meta name="geo.placename" content="Bangalore, Karnataka, India">
    <meta name="geo.position" content="12.9716;77.5946">
    <meta name="ICBM" content="12.9716, 77.5946">

    <!-- Dublin Core Metadata for Authoritative Indexing -->
    <meta name="DC.title" content="<?= e($pageTitle) ?>">
    <meta name="DC.creator" content="Techgroww IT Solutions">
    <meta name="DC.subject" content="IT Services, Software Development, Web Development, Business Automation, AI Solutions, India">
    <meta name="DC.description" content="<?= e($pageDescription) ?>">
    <meta name="DC.publisher" content="Techgroww">
    <meta name="DC.language" content="en-IN">
    <meta name="DC.coverage" content="India, Bangalore, Mumbai, Delhi-NCR, Hyderabad, Worldwide">

    <?php if (!empty(GOOGLE_SITE_VERIFICATION)): ?>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="<?= e(GOOGLE_SITE_VERIFICATION) ?>">
    <?php endif; ?>
    <?php if (!empty(BING_SITE_VERIFICATION)): ?>
    <!-- Bing Webmaster Verification -->
    <meta name="msvalidate.01" content="<?= e(BING_SITE_VERIFICATION) ?>">
    <?php endif; ?>

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta property="og:image:secure_url" content="<?= e($ogImage) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="Techgroww - Transforming Ideas Into Digital Solutions">
    <meta property="og:site_name" content="Techgroww">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter / X Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@techgroww">
    <meta name="twitter:creator" content="@techgroww">
    <meta name="twitter:url" content="<?= e($canonicalUrl) ?>">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:image:alt" content="Techgroww IT Solutions">

    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/svg+xml" href="<?= asset('images/favicon.svg') ?>">
    <link rel="apple-touch-icon" href="<?= asset('images/logo-official.jpg') ?>">

    <!-- Typography: Google Fonts Preconnect & Display Swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>?v=1.1.0">

    <!-- JSON-LD Structured Data: WebSite (Sitelinks Searchbox & Brand Variations) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "@id": "https://techgroww.co.in/#website",
      "name": "Techgroww",
      "alternateName": ["Tech Groww", "Techgroww IT Solutions", "techgroww.co.in", "Techgroww Technologies"],
      "url": "https://techgroww.co.in/",
      "inLanguage": "en-IN",
      "publisher": {
        "@id": "https://techgroww.co.in/#organization"
      }
    }
    </script>

    <!-- JSON-LD Structured Data: Organization & ProfessionalService -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": ["Organization", "ProfessionalService"],
      "@id": "https://techgroww.co.in/#organization",
      "name": "Techgroww",
      "alternateName": ["Tech Groww", "Techgroww IT Solutions", "techgroww.co.in"],
      "legalName": "<?= e(APP_LEGAL_NAME) ?>",
      "url": "https://techgroww.co.in",
      "logo": {
        "@type": "ImageObject",
        "@id": "https://techgroww.co.in/#logo",
        "url": "<?= e(asset('images/logo-official.jpg')) ?>",
        "caption": "Techgroww Logo",
        "width": 400,
        "height": 400
      },
      "image": "<?= e(asset('images/og-banner.jpg')) ?>",
      "description": "<?= e($pageDescription) ?>",
      "email": "<?= e(CONTACT_EMAIL) ?>",
      "telephone": "<?= e(CONTACT_PHONE) ?>",
      "priceRange": "$$",
      "currenciesAccepted": "INR, USD, EUR, GBP",
      "paymentAccepted": "Bank Transfer, UPI, Credit Card",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Tech Hub, Electronic City & HSR Layout",
        "addressLocality": "Bangalore",
        "addressRegion": "Karnataka",
        "postalCode": "560102",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 12.9716,
        "longitude": 77.5946
      },
      "location": [
        {
          "@type": "Place",
          "name": "Techgroww Bangalore Headquarters",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Outer Ring Road & HSR Layout Tech Hub",
            "addressLocality": "Bangalore",
            "addressRegion": "Karnataka",
            "postalCode": "560102",
            "addressCountry": "IN"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 12.9121,
            "longitude": 77.6446
          }
        },
        {
          "@type": "Place",
          "name": "Techgroww Mumbai Technology Center",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Bandra Kurla Complex (BKC) & Andheri East",
            "addressLocality": "Mumbai",
            "addressRegion": "Maharashtra",
            "postalCode": "400051",
            "addressCountry": "IN"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 19.0657,
            "longitude": 72.8687
          }
        }
      ],
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          "opens": "09:00",
          "closes": "19:00"
        }
      ],
      "areaServed": [
        {
          "@type": "City",
          "name": "Bangalore"
        },
        {
          "@type": "City",
          "name": "Mumbai"
        },
        {
          "@type": "City",
          "name": "Hyderabad"
        },
        {
          "@type": "City",
          "name": "Pune"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Delhi NCR"
        },
        {
          "@type": "Country",
          "name": "India"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Worldwide"
        }
      ],
      "knowsAbout": [
        "Website Development",
        "Custom Software Engineering",
        "Business Process Automation",
        "Artificial Intelligence & Machine Learning",
        "Digital Marketing & Technical SEO",
        "IT Architecture & Cloud Strategy"
      ],
      "sameAs": [
        "<?= e(SOCIAL_LINKEDIN) ?>",
        "<?= e(SOCIAL_TWITTER) ?>",
        "<?= e(SOCIAL_GITHUB) ?>",
        "<?= e(SOCIAL_INSTAGRAM) ?>"
      ],
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "telephone": "<?= e(CONTACT_PHONE) ?>",
          "contactType": "sales",
          "email": "<?= e(CONTACT_EMAIL) ?>",
          "areaServed": "IN",
          "availableLanguage": ["English", "Hindi"]
        },
        {
          "@type": "ContactPoint",
          "telephone": "<?= e(CONTACT_PHONE) ?>",
          "contactType": "customer service",
          "email": "<?= e(CONTACT_EMAIL) ?>",
          "areaServed": "IN",
          "availableLanguage": ["English", "Hindi"]
        }
      ]
    }
    </script>
    
    <?php if (!empty($serviceSchema)): ?>
    <!-- JSON-LD Service Schema -->
    <script type="application/ld+json">
    <?= json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
    </script>
    <?php endif; ?>

    <?php if (!empty($extraSchema)): ?>
    <?= $extraSchema ?>
    <?php endif; ?>
</head>
<body class="site-body">
    <!-- Accessible Skip Link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Top Notification & Contact Bar -->
    <div class="top-bar" aria-label="Top Contact Bar">
        <div class="container top-bar-inner">
            <div class="top-bar-left">
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>"><?= e(CONTACT_PHONE) ?></a>
                </span>
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>
                </span>
            </div>
            <div class="top-bar-right">
                <span class="top-bar-badge"><span class="pulse-dot"></span> Next-Gen IT Consulting</span>
                <a href="https://wa.me/<?= e(CONTACT_WHATSAPP) ?>?text=Hello%20Techgroww,%20I%20am%20interested%20in%20your%20IT%20services" target="_blank" rel="noopener noreferrer" class="top-bar-whatsapp">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
                    WhatsApp Chat
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="site-header" id="siteHeader">
        <div class="container header-container">
            <!-- Brand Logo -->
            <a href="<?= url('/') ?>" class="brand-logo" aria-label="Techgroww Home">
                <img src="<?= asset('images/logo.svg') ?>" alt="Techgroww Logo" width="180" height="42" class="header-logo">
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="desktop-nav" aria-label="Main Navigation">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="<?= url('/') ?>" class="nav-link <?= ($currentPage === 'home') ? 'active' : '' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('/about') ?>" class="nav-link <?= ($currentPage === 'about') ? 'active' : '' ?>">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= url('/services') ?>" class="nav-link dropdown-toggle <?= (str_starts_with($currentPage, 'service')) ? 'active' : '' ?>" aria-haspopup="true" aria-expanded="false">
                            Services
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="chevron-icon"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div class="dropdown-menu mega-services-menu" role="menu">
                            <div class="dropdown-inner">
                                <a href="<?= url('/services/web-development') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-blue">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>Web Development</strong>
                                        <span>Corporate websites, web apps, portals & eCommerce</span>
                                    </div>
                                </a>
                                <a href="<?= url('/services/software-development') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-indigo">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>Custom Software Development</strong>
                                        <span>Tailor-made SaaS, enterprise portals & APIs</span>
                                    </div>
                                </a>
                                <a href="<?= url('/services/automation') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-purple">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>Business Process Automation</strong>
                                        <span>RPA, workflow pipelines & system integrations</span>
                                    </div>
                                </a>
                                <a href="<?= url('/services/ai-solutions') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-cyan">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>AI & Intelligent Solutions</strong>
                                        <span>LLM integrations, AI assistants & predictive analytics</span>
                                    </div>
                                </a>
                                <a href="<?= url('/services/digital-marketing') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-emerald">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 6l-9.5 9.5-5-5L1 18"></path><polyline points="17 6 23 6 23 12"></polyline></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>Digital Marketing & SEO</strong>
                                        <span>Organic rankings, technical SEO & high-ROI PPC</span>
                                    </div>
                                </a>
                                <a href="<?= url('/services/it-consulting') ?>" class="dropdown-link-item" role="menuitem">
                                    <div class="dropdown-item-icon icon-amber">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <strong>IT Consulting & Strategy</strong>
                                        <span>Digital transformation roadmaps & cloud audit</span>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a href="<?= url('/services') ?>" class="view-all-services-link">
                                    View All 6 Core IT Capabilities <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('/portfolio') ?>" class="nav-link <?= ($currentPage === 'portfolio') ? 'active' : '' ?>">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('/contact') ?>" class="nav-link <?= ($currentPage === 'contact') ? 'active' : '' ?>">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Header Action Button & Mobile Toggle -->
            <div class="header-actions">
                <a href="<?= url('/contact#contact-form') ?>" class="btn btn-primary btn-sm header-cta">
                    <span>Get a Quote</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                
                <button type="button" class="mobile-toggle" id="mobileMenuBtn" aria-label="Open Navigation Menu" aria-expanded="false" aria-controls="mobileNavDrawer">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Drawer -->
    <div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
    <div class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <a href="<?= url('/') ?>" class="mobile-logo-link">
                <img src="<?= asset('images/logo.svg') ?>" alt="Techgroww" width="160" height="38">
            </a>
            <button type="button" class="mobile-drawer-close" id="mobileCloseBtn" aria-label="Close Navigation">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="mobile-drawer-body">
            <ul class="mobile-menu-list">
                <li><a href="<?= url('/') ?>" class="mobile-menu-link <?= ($currentPage === 'home') ? 'active' : '' ?>">Home</a></li>
                <li><a href="<?= url('/about') ?>" class="mobile-menu-link <?= ($currentPage === 'about') ? 'active' : '' ?>">About Us</a></li>
                <li class="mobile-accordion">
                    <button type="button" class="mobile-accordion-toggle" id="mobileServicesToggle" aria-expanded="false">
                        <span>Services</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <ul class="mobile-sub-menu" id="mobileServicesList">
                        <li><a href="<?= url('/services') ?>" class="mobile-sub-link"><strong>Overview of All Services</strong></a></li>
                        <li><a href="<?= url('/services/web-development') ?>" class="mobile-sub-link">Web Development</a></li>
                        <li><a href="<?= url('/services/software-development') ?>" class="mobile-sub-link">Custom Software Development</a></li>
                        <li><a href="<?= url('/services/automation') ?>" class="mobile-sub-link">Business Automation</a></li>
                        <li><a href="<?= url('/services/ai-solutions') ?>" class="mobile-sub-link">AI & Intelligent Solutions</a></li>
                        <li><a href="<?= url('/services/digital-marketing') ?>" class="mobile-sub-link">Digital Marketing & SEO</a></li>
                        <li><a href="<?= url('/services/it-consulting') ?>" class="mobile-sub-link">IT Consulting & Strategy</a></li>
                    </ul>
                </li>
                <li><a href="<?= url('/portfolio') ?>" class="mobile-menu-link <?= ($currentPage === 'portfolio') ? 'active' : '' ?>">Portfolio & Case Studies</a></li>
                <li><a href="<?= url('/contact') ?>" class="mobile-menu-link <?= ($currentPage === 'contact') ? 'active' : '' ?>">Contact Us</a></li>
            </ul>

            <div class="mobile-drawer-footer">
                <a href="<?= url('/contact#contact-form') ?>" class="btn btn-primary btn-block">
                    <span>Discuss Your Project</span>
                </a>
                <div class="mobile-contact-snippet">
                    <p><a href="tel:<?= e(CONTACT_PHONE_RAW) ?>"><?= e(CONTACT_PHONE) ?></a></p>
                    <p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages Container -->
    <?php if (!empty($flashMessages)): ?>
    <div class="container flash-notifications-container" aria-live="polite">
        <?php foreach ($flashMessages as $flash): ?>
        <div class="alert alert-<?= e($flash['type']) ?> alert-dismissible" role="alert">
            <div class="alert-icon">
                <?php if ($flash['type'] === 'success'): ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <?php else: ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <?php endif; ?>
            </div>
            <div class="alert-text"><?= e($flash['message']) ?></div>
            <button type="button" class="alert-close" aria-label="Close Alert" onclick="this.parentElement.remove();">&times;</button>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Main Content Injection Anchor -->
    <main id="main-content">

