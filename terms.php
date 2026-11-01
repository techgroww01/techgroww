<?php
/**
 * Techgroww - Terms & Conditions
 * Domain: https://techgroww.co.in/terms
 */

$pageTitle = 'Terms and Conditions | Techgroww IT Solutions';
$pageDescription = 'Read the terms of service and commercial conditions governing software development, IT consulting, and digital engineering engagements with Techgroww.';
$canonicalUrl = 'https://techgroww.co.in/terms';
$currentPage = 'terms';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero Header -->
<section class="page-hero" aria-label="Terms Hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="page-hero-inner">
            <div class="section-eyebrow section-eyebrow-dark">Commercial Agreement</div>
            <h1 class="page-hero-title">Terms & Conditions</h1>
            <p class="page-hero-sub">
                Effective Date: January 1, 2026 &bull; Last Updated: November 1, 2026
            </p>
        </div>
    </div>
</section>

<!-- Breadcrumbs Bar -->
<?= renderBreadcrumbs(['Terms and Conditions' => '']) ?>

<!-- Legal Terms Section -->
<section class="section-padding bg-light" aria-label="Terms of Service Document">
    <div class="container">
        <div class="legal-content-card">
            <p>
                Welcome to <strong>Techgroww</strong>. These Terms and Conditions ("Terms") govern your access to and use of the website <strong>https://techgroww.co.in</strong> and any professional software development, business automation, AI integration, or technology consulting services provided by Techgroww ("the Company", "we", "us").
            </p>
            <p>
                By accessing this website, requesting a project estimate, or executing a Statement of Work (SOW) with Techgroww, you acknowledge that you have read, understood, and agreed to be bound by these Terms.
            </p>

            <h2>1. Services & Statements of Work</h2>
            <p>
                Techgroww provides bespoke software development, website engineering, process automation, artificial intelligence integration, technical SEO, and IT consulting services. Detailed specifications, milestones, deliverables, pricing, and deadlines for custom engineering engagements are documented in formal Statements of Work (SOW) mutually signed by both parties.
            </p>

            <h2>2. Intellectual Property & Code Ownership</h2>
            <ul>
                <li><strong>Client Deliverables:</strong> Upon receipt of full and final payment for agreed project milestones, all custom software code, database schemas, graphic assets, and documentation specifically engineered for the client become the exclusive intellectual property of the client.</li>
                <li><strong>Pre-Existing Frameworks & Open Source:</strong> Any pre-existing reusable utilities, open-source PHP libraries, or third-party packages incorporated into the project remain licensed under their respective open-source licenses (e.g. MIT, Apache 2.0).</li>
                <li><strong>Techgroww Brand Assets:</strong> The Techgroww name, logo, website design, and proprietary marketing collateral remain the sole intellectual property of Techgroww.</li>
            </ul>

            <h2>3. Client Responsibilities & Approvals</h2>
            <p>To ensure predictable delivery schedules, the client agrees to:</p>
            <ul>
                <li>Provide necessary third-party API credentials, domain access, and hosting credentials in a timely manner.</li>
                <li>Review and provide written sign-off on staging builds within 5 business days of milestone completion.</li>
                <li>Designate a primary project stakeholder authorized to make architectural and commercial decisions.</li>
            </ul>

            <h2>4. Payments, Invoicing & Taxes</h2>
            <ul>
                <li>All fees are quoted in Indian Rupees (INR) or agreed foreign currency, exclusive of applicable statutory taxes (such as GST), which will be invoiced in accordance with prevailing laws.</li>
                <li>Milestone-based projects require milestone deposit payments prior to commencement of subsequent development sprints.</li>
                <li>Invoices must be settled within the timeframe stated in the respective Statement of Work (typically net 7 to 14 days).</li>
            </ul>

            <h2>5. Warranty & Post-Launch Support</h2>
            <p>
                Every custom project deployed by Techgroww includes a standard <strong>30-day post-launch warranty period</strong>. During this window, Techgroww will resolve any reproducible defects, bugs, or deviations from the signed Statement of Work at no additional charge. Following the warranty period, ongoing maintenance and feature development are covered under an optional SLA maintenance agreement.
            </p>

            <h2>6. Limitation of Liability</h2>
            <p>
                To the maximum extent permitted by applicable law, Techgroww shall not be liable for any indirect, incidental, consequential, special, or punitive damages, including loss of profits, data corruption, or business interruption resulting from third-party server outages (e.g. host outages, external API disruptions) beyond Techgroww's direct operational control. The Company's total aggregate liability for any claim arising under an engagement shall be limited to the total fees paid by the client under the specific Statement of Work giving rise to liability.
            </p>

            <h2>7. Confidentiality & Non-Disclosure</h2>
            <p>
                Both parties agree to treat all commercial details, client customer records, proprietary source algorithms, and technical credentials exchanged during the course of the engagement as strictly confidential, maintaining non-disclosure obligations indefinitely.
            </p>

            <h2>8. Governing Law & Dispute Resolution</h2>
            <p>
                These Terms shall be governed by and construed in accordance with the laws of the Republic of India. In the event of any dispute, claim, or controversy arising out of or relating to these Terms, the parties shall first attempt to resolve the matter through amicable negotiation. If unresolved, the dispute shall be subject to the exclusive jurisdiction of the competent courts in Bangalore or Mumbai, India.
            </p>

            <h2>9. Amendments to Terms</h2>
            <p>
                Techgroww reserves the right to update or modify these Terms from time to time. Any changes will be posted on this page with an updated effective date.
            </p>

            <h2>10. Contact Information</h2>
            <p>
                For any inquiries regarding these Terms and Conditions, please contact us at:
            </p>
            <p>
                <strong>Techgroww Legal Team</strong><br>
                Email: <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a><br>
                Website: <a href="https://techgroww.co.in">https://techgroww.co.in</a>
            </p>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
