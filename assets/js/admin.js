/**
 * Techgroww - Admin Portal Client Scripts
 * Enhanced with Automated Email Notification Log Visibility
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // Modal view for enquiry details & email logs
    const viewButtons = document.querySelectorAll('.js-view-enquiry');
    const modalBackdrop = document.getElementById('enquiryModalBackdrop');
    const modalCloseBtn = document.getElementById('enquiryModalClose');
    const modalBody = document.getElementById('enquiryModalBody');

    function formatBadge(status, err) {
        if (!status) return '<span style="color:#64748b; font-weight:600;">Not Queued</span>';
        const s = status.toLowerCase();
        if (s === 'sent') return '<span style="color:#059669; font-weight:700;"><i class="fas fa-check-circle"></i> Sent Successfully</span>';
        if (s === 'pending') return '<span style="color:#d97706; font-weight:700;"><i class="fas fa-clock"></i> Pending Delivery</span>';
        if (s === 'failed') return `<span style="color:#dc2626; font-weight:700;"><i class="fas fa-exclamation-triangle"></i> Delivery Failed</span>${err ? `<div style="color:#b91c1c; font-size:0.75rem; margin-top:2px;">Reason: ${escapeHtml(err)}</div>` : ''}`;
        return `<span>${escapeHtml(status)}</span>`;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    if (viewButtons.length > 0 && modalBackdrop && modalBody) {
        viewButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const data = JSON.parse(btn.getAttribute('data-enquiry') || '{}');

                modalBody.innerHTML = `
                    <div style="margin-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem;">
                        <h3 style="margin: 0 0 0.5rem; font-size: 1.35rem; color: #0b132b;">${escapeHtml(data.name || '')}</h3>
                        <div style="font-size: 0.85rem; color: #64748b;">
                            Company: <strong>${escapeHtml(data.company || 'Not Specified')}</strong> &bull; 
                            Date: ${escapeHtml(data.created_at || '')}
                        </div>
                    </div>

                    <!-- Email Delivery Logs Panel -->
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; margin-bottom: 1.5rem;">
                        <div style="font-size: 0.8rem; font-weight: 700; color: #0b132b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.75rem;">
                            <i class="fas fa-envelope-open-text" style="color: #2563eb; margin-right: 4px;"></i> Automated Email Notifications
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; font-size: 0.85rem;">
                            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 0.75rem;">
                                <div style="font-size: 0.75rem; color: #64748b; text-transform: uppercase; font-weight: 600;">Internal Sales Alert</div>
                                <div style="margin-top: 4px;">${formatBadge(data.sales_email_status, data.sales_email_error)}</div>
                                ${data.sales_email_sent_at ? `<div style="font-size: 0.75rem; color: #64748b; margin-top: 4px;">Sent at: ${escapeHtml(data.sales_email_sent_at)}</div>` : ''}
                            </div>
                            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 0.75rem;">
                                <div style="font-size: 0.75rem; color: #64748b; text-transform: uppercase; font-weight: 600;">Customer Acknowledgement</div>
                                <div style="margin-top: 4px;">${formatBadge(data.customer_email_status, data.customer_email_error)}</div>
                                ${data.customer_email_sent_at ? `<div style="font-size: 0.75rem; color: #64748b; margin-top: 4px;">Sent at: ${escapeHtml(data.customer_email_sent_at)}</div>` : ''}
                            </div>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem; font-size: 0.9rem;">
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Email</span>
                            <a href="mailto:${escapeHtml(data.email || '')}" style="color: #2563eb; font-weight: 600;">${escapeHtml(data.email || '')}</a>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Phone</span>
                            <a href="tel:${escapeHtml(data.phone || '')}" style="color: #0f172a; font-weight: 600;">${escapeHtml(data.phone || 'N/A')}</a>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Service Required</span>
                            <strong style="color: #0f172a;">${escapeHtml(data.service || '')}</strong>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Budget Bracket</span>
                            <strong style="color: #059669;">${escapeHtml(data.budget || 'Not specified')}</strong>
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase; margin-bottom: 0.5rem;">Project Scope & Description</span>
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; font-size: 0.925rem; line-height: 1.6; white-space: pre-wrap; color: #1e293b;">
                            ${escapeHtml(data.message || '')}
                        </div>
                    </div>

                    <div style="font-size: 0.75rem; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 0.75rem;">
                        IP Address: ${escapeHtml(data.ip_address || 'Unknown')} &bull; Status: <span class="status-badge status-${escapeHtml(data.status)}">${escapeHtml(data.status)}</span>
                    </div>
                `;

                modalBackdrop.classList.add('is-open');
            });
        });

        const closeModal = () => modalBackdrop.classList.remove('is-open');
        if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
        modalBackdrop.addEventListener('click', (e) => {
            if (e.target === modalBackdrop) closeModal();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    }
});
