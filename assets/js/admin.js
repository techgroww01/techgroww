/**
 * Techgroww - Admin Portal Client Scripts
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // Modal view for enquiry details
    const viewButtons = document.querySelectorAll('.js-view-enquiry');
    const modalBackdrop = document.getElementById('enquiryModalBackdrop');
    const modalCloseBtn = document.getElementById('enquiryModalClose');
    const modalBody = document.getElementById('enquiryModalBody');

    if (viewButtons.length > 0 && modalBackdrop && modalBody) {
        viewButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const data = JSON.parse(btn.getAttribute('data-enquiry') || '{}');

                modalBody.innerHTML = `
                    <div style="margin-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem;">
                        <h3 style="margin: 0 0 0.5rem; font-size: 1.35rem; color: #0b132b;">${data.name || ''}</h3>
                        <div style="font-size: 0.85rem; color: #64748b;">
                            Company: <strong>${data.company || 'Not Specified'}</strong> &bull; 
                            Date: ${data.created_at || ''}
                        </div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem; font-size: 0.9rem;">
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Email</span>
                            <a href="mailto:${data.email || ''}" style="color: #2563eb; font-weight: 600;">${data.email || ''}</a>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Phone</span>
                            <a href="tel:${data.phone || ''}" style="color: #0f172a; font-weight: 600;">${data.phone || 'N/A'}</a>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Service Required</span>
                            <strong style="color: #0f172a;">${data.service || ''}</strong>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase;">Budget Bracket</span>
                            <strong style="color: #059669;">${data.budget || 'Not specified'}</strong>
                        </div>
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <span style="color: #64748b; display: block; font-size: 0.75rem; text-transform: uppercase; margin-bottom: 0.5rem;">Project Scope & Description</span>
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; font-size: 0.925rem; line-height: 1.6; white-space: pre-wrap; color: #1e293b;">
                            ${data.message || ''}
                        </div>
                    </div>
                    <div style="font-size: 0.75rem; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 0.75rem;">
                        IP Address: ${data.ip_address || 'Unknown'} &bull; Status: <span class="status-badge status-${data.status}">${data.status}</span>
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
