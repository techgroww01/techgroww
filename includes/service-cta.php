<?php
/**
 * Techgroww - Reusable Dedicated Service Page Bottom CTA
 * Variables expected:
 * - $serviceName (e.g. 'Web Development')
 * - $serviceSlug (e.g. 'web-development')
 * - $serviceHighlight (short punchy sentence)
 */

$serviceName = $serviceName ?? 'Technology Solutions';
$serviceHighlight = $serviceHighlight ?? 'Take the first step toward scalable digital infrastructure today.';
?>
<section class="service-dedicated-cta" aria-label="Engage Techgroww for <?= e($serviceName) ?>">
    <div class="container">
        <div class="service-cta-box">
            <div class="service-cta-badge">Let's Build Together</div>
            <h2 class="service-cta-title">Scale Your Business With High-Performance <?= e($serviceName) ?></h2>
            <p class="service-cta-sub"><?= e($serviceHighlight) ?></p>
            <div class="service-cta-buttons">
                <a href="<?= url('/contact?service=' . urlencode($serviceName) . '#contact-form') ?>" class="btn btn-primary btn-lg">
                    <span>Request a Detailed Quote</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                <a href="<?= url('/portfolio') ?>" class="btn btn-outline-white btn-lg">
                    <span>Explore Our Work</span>
                </a>
            </div>
            <div class="service-cta-guarantees">
                <div class="guarantee-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>NDA Protected Consultation</span>
                </div>
                <div class="guarantee-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>Free Architectural Review</span>
                </div>
                <div class="guarantee-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>24-Hour Proposal Turnaround</span>
                </div>
            </div>
        </div>
    </div>
</section>

