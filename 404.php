<?php
/**
 * Techgroww - 404 Not Found Page
 */

http_response_code(404);

$pageTitle = 'Page Not Found (404) | Techgroww';
$pageDescription = 'The requested page could not be found on Techgroww. Explore our IT services, custom software engineering, and business automation capabilities.';
$canonicalUrl = 'https://techgroww.co.in/404';
$currentPage = '404';

require_once __DIR__ . '/includes/header.php';
?>

<section class="section-padding bg-light" style="min-height: 65vh; display: flex; align-items: center;" aria-label="404 Error Content">
    <div class="container" style="text-align: center; max-width: 680px;">
        <div style="font-size: 5.5rem; font-family: var(--font-heading); font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 1rem;">
            404
        </div>
        <h1 style="font-size: 2.25rem; margin-bottom: 1rem; color: var(--navy-900);">
            Page Not Found
        </h1>
        <p style="font-size: 1.05rem; color: var(--slate-600); margin-bottom: 2.5rem; line-height: 1.7;">
            The page you are looking for may have been moved, renamed, or is temporarily unavailable. Let us help you find what you need.
        </p>

        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 3rem;">
            <a href="<?= url('/') ?>" class="btn btn-primary btn-lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                <span>Return to Homepage</span>
            </a>
            <a href="<?= url('/services') ?>" class="btn btn-outline btn-lg">
                <span>Browse Our IT Services</span>
            </a>
        </div>

        <div style="background: var(--white); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 1.5rem; text-align: left;">
            <strong style="color: var(--navy-900); display: block; margin-bottom: 0.75rem;">Quick Navigation:</strong>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.5rem; font-size: 0.9rem;">
                <div>&bull; <a href="<?= url('/services/web-development') ?>">Web Development</a></div>
                <div>&bull; <a href="<?= url('/services/software-development') ?>">Software Engineering</a></div>
                <div>&bull; <a href="<?= url('/services/automation') ?>">Business Automation</a></div>
                <div>&bull; <a href="<?= url('/services/ai-solutions') ?>">AI Solutions</a></div>
                <div>&bull; <a href="<?= url('/portfolio') ?>">Portfolio & Case Studies</a></div>
                <div>&bull; <a href="<?= url('/contact') ?>">Contact & Support</a></div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
