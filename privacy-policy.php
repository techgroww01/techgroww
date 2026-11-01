<?php
/**
 * Techgroww - Privacy Policy
 * Domain: https://techgroww.co.in/privacy-policy
 */

$pageTitle = 'Privacy Policy | Techgroww IT Solutions';
$pageDescription = 'Learn how Techgroww collects, uses, and safeguards your business and personal information in accordance with Indian IT laws and international data protection standards.';
$canonicalUrl = 'https://techgroww.co.in/privacy-policy';
$currentPage = 'privacy-policy';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Privacy Policy Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Data Governance</div>
            <h1 class="page-hero-title">Privacy Policy</h1>
            <p class="page-hero-sub">
                Effective Date: January 1, 2026 &bull; Last Updated: November 1, 2026
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Privacy Policy' => '']) ?>

<!-- Legal Content Section -->
<section class="section-padding bg-light" aria-label="Privacy Policy Terms">
    <div class="container">
        <div class="legal-content-card">
            <p>
                <strong>Techgroww</strong> ("we", "us", or "our"), operating the website <strong>https://techgroww.co.in</strong>, is dedicated to protecting your privacy and handling personal and commercial data with the highest standards of security, transparency, and legal compliance.
            </p>
            <p>
                This Privacy Policy outlines how we collect, store, process, and protect your information when you interact with our website, request project consultations, subscribe to our technical newsletter, or engage our IT consulting and software engineering services.
            </p>

            <h2>1. Information We Collect</h2>
            <p>We only collect data that is strictly necessary to fulfill your technical inquiries and provide our services:</p>
            <ul>
                <li><strong>Contact Information:</strong> Full name, professional email address, phone number, company name, and job title when you voluntarily submit a project inquiry or schedule a consultation.</li>
                <li><strong>Project Requirements:</strong> Scope documents, technical specifications, budget brackets, and operational notes submitted via our contact forms.</li>
                <li><strong>Technical & Usage Telemetry:</strong> Anonymized IP address, browser user-agent, operating system, referring URL, and page interaction timestamps to secure our forms and detect automated bot traffic.</li>
                <li><strong>Newsletter Subscriptions:</strong> Your business email address when subscribing to Techgroww technology insights.</li>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <p>Your data is processed strictly for legitimate business purposes:</p>
            <ul>
                <li>To assess project requirements and deliver tailored architectural proposals.</li>
                <li>To communicate regarding discovery calls, project milestones, and contractual deliverables.</li>
                <li>To defend our web application infrastructure against brute-force spam, automated DDoS attacks, and CSRF attempts.</li>
                <li>To send requested newsletters and technical briefings (which you can unsubscribe from at any time via a single click).</li>
                <li>To fulfill statutory compliance obligations under Indian and international commercial laws.</li>
            </ul>

            <h2>3. Absolute Prohibition on Selling Data</h2>
            <p>
                <strong>Techgroww does NOT sell, rent, trade, or monetize your personal or commercial data to third-party data brokers, marketing networks, or advertisers under any circumstances.</strong>
            </p>

            <h2>4. Data Storage & Security Standards</h2>
            <p>
                We implement robust technical and organizational security controls designed to prevent unauthorized access, loss, alteration, or disclosure:
            </p>
            <ul>
                <li><strong>Database Encryption & Parameterization:</strong> All database queries utilize PDO prepared statements with strict parameter binding, preventing SQL injection.</li>
                <li><strong>Transport Layer Security (TLS/SSL):</strong> All traffic between your browser and our servers is encrypted using 256-bit SSL certificates.</li>
                <li><strong>File Isolation:</strong> Server configuration directories, database credentials, and internal schemas are blocked from public HTTP access via Apache server rules.</li>
                <li><strong>Access Control:</strong> Administrative access is protected by salted bcrypt password hashes, CSRF validation tokens, and rate-limited authentication barriers.</li>
            </ul>

            <h2>5. Cookies and Web Storage</h2>
            <p>
                Techgroww uses strictly necessary session cookies required for fundamental website security (e.g. CSRF tokens to verify that form submissions originate from authentic human users). We do not deploy invasive third-party tracking cookies or cross-site tracking pixels.
            </p>

            <h2>6. Non-Disclosure & Intellectual Property</h2>
            <p>
                All proprietary concepts, business models, database schemas, and codebase blueprints shared with Techgroww during technical discovery or active engagements are protected under mutual Non-Disclosure confidentiality standards.
            </p>

            <h2>7. Your Data Rights</h2>
            <p>Under applicable data protection laws, you retain the right to:</p>
            <ul>
                <li>Request access to the personal records we hold about you.</li>
                <li>Request rectification of incorrect or outdated contact details.</li>
                <li>Request complete erasure (deletion) of your contact records from our database.</li>
                <li>Opt-out of any marketing or newsletter communications at any time.</li>
            </ul>

            <h2>8. Contact Our Data Governance Team</h2>
            <p>
                If you have questions regarding this Privacy Policy or wish to request data erasure, please contact our Data Protection Officer:
            </p>
            <p>
                <strong>Techgroww IT Solutions</strong><br>
                Email: <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a><br>
                Phone: <a href="tel:<?= e(CONTACT_PHONE_RAW) ?>"><?= e(CONTACT_PHONE) ?></a><br>
                Address: Tech Hub, Bangalore & Mumbai, India
            </p>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

