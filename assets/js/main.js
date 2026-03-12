/**
 * Caldim Engineering Careers Portal
 * Main JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {

    // ── Navbar Scroll Effect ────────────────────────────────────────
    const nav = document.getElementById('mainNav');
    if (nav) {
        const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 50);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // ── Admin Sidebar Toggle ────────────────────────────────────────
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('adminSidebar');
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', () => sidebar.classList.toggle('open'));
        // Close on outside click (mobile)
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('open');
            }
        });
    }

    // ── Password Toggle ─────────────────────────────────────────────
    window.togglePassword = (inputId, btn) => {
        const input = document.getElementById(inputId);
        if (!input) return;
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        btn.querySelector('i').className = isText ? 'fas fa-eye' : 'fas fa-eye-slash';
    };

    // ── Password Strength Meter ─────────────────────────────────────
    const pwInput = document.getElementById('password');
    const strBar = document.getElementById('strengthBar');
    if (pwInput && strBar) {
        pwInput.addEventListener('input', () => {
            const v = pwInput.value;
            let score = 0;
            if (v.length >= 8) score++;
            if (/[A-Z]/.test(v)) score++;
            if (/[0-9]/.test(v)) score++;
            if (/[^A-Za-z0-9]/.test(v)) score++;

            const colors = ['', '#ef4444', '#f59e0b', '#10b981', '#059669'];
            const labels = ['', 'Weak', 'Fair', 'Good', 'Strong'];
            const widths = ['0%', '25%', '50%', '75%', '100%'];

            strBar.innerHTML = score
                ? `<div style="width:${widths[score]};background:${colors[score]};height:4px;border-radius:4px;transition:.3s"></div><small style="color:${colors[score]};font-size:.72rem;margin-top:3px;display:block">${labels[score]}</small>`
                : '';
        });
    }

    // ── Confirm Password Match ──────────────────────────────────────
    const confirmPw = document.getElementById('confirm_password');
    const confirmFb = document.getElementById('confirmFeedback');
    const submitBtn = document.getElementById('registerBtn');
    if (confirmPw && pwInput) {
        const check = () => {
            if (confirmPw.value && confirmPw.value !== pwInput.value) {
                confirmPw.classList.add('is-invalid');
                if (confirmFb) confirmFb.textContent = 'Passwords do not match.';
                if (submitBtn) submitBtn.disabled = true;
            } else {
                confirmPw.classList.remove('is-invalid');
                if (submitBtn) submitBtn.disabled = false;
            }
        };
        confirmPw.addEventListener('input', check);
        pwInput.addEventListener('input', check);
    }

    // ── Resume Upload Drag & Drop ────────────────────────────────────
    const uploadZone = document.getElementById('uploadZone');
    const resumeInput = document.getElementById('resumeInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');

    if (uploadZone && resumeInput) {
        ['dragenter', 'dragover'].forEach(evt => {
            uploadZone.addEventListener(evt, (e) => {
                e.preventDefault();
                uploadZone.classList.add('drag-over');
            });
        });
        ['dragleave', 'drop'].forEach(evt => {
            uploadZone.addEventListener(evt, (e) => {
                e.preventDefault();
                uploadZone.classList.remove('drag-over');
            });
        });
        uploadZone.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            if (files.length) {
                resumeInput.files = files;
                showFilePreview(files[0]);
            }
        });
        resumeInput.addEventListener('change', () => {
            if (resumeInput.files.length) showFilePreview(resumeInput.files[0]);
        });
    }

    function showFilePreview(file) {
        if (!filePreview || !fileName || !fileSize) return;
        const maxSize = 5 * 1024 * 1024;
        const allowed = ['pdf', 'doc', 'docx'];
        const ext = file.name.split('.').pop().toLowerCase();

        if (!allowed.includes(ext)) {
            showToast('error', 'Only PDF, DOC, DOCX files are allowed.');
            clearFile();
            return;
        }
        if (file.size > maxSize) {
            showToast('error', 'File must be smaller than 5 MB.');
            clearFile();
            return;
        }
        fileName.textContent = file.name;
        fileSize.textContent = '(' + (file.size / 1024).toFixed(0) + ' KB)';
        filePreview.classList.remove('d-none');
        uploadZone.style.display = 'none';
    }

    window.clearFile = () => {
        if (!resumeInput || !filePreview || !uploadZone) return;
        resumeInput.value = '';
        filePreview.classList.add('d-none');
        uploadZone.style.display = '';
    };

    // ── Apply Form Validation ───────────────────────────────────────
    const applyForm = document.getElementById('applyForm');
    const applyBtn = document.querySelector('#applyForm button[type="submit"]');
    if (applyForm) {
        applyForm.addEventListener('submit', (e) => {
            const resume = document.getElementById('resumeInput');
            const declaration = document.getElementById('declaration');

            if (resume && !resume.files.length) {
                e.preventDefault();
                showToast('error', 'Please upload your resume.');
                return;
            }
            if (declaration && !declaration.checked) {
                e.preventDefault();
                showToast('error', 'Please accept the terms before applying.');
                return;
            }
            if (applyBtn) {
                applyBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
                applyBtn.disabled = true;
            }
        });
    }

    // ── Toast Notifications ─────────────────────────────────────────
    window.showToast = (type, message) => {
        let container = document.getElementById('toastContainer');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toastContainer';
            container.style.cssText = 'position:fixed;bottom:1.5rem;right:1.5rem;z-index:10000;display:flex;flex-direction:column;gap:8px;';
            document.body.appendChild(container);
        }
        const color = type === 'error' ? '#ef4444' : type === 'success' ? '#10b981' : '#3b82f6';
        const icon = type === 'error' ? 'fa-exclamation-circle' : type === 'success' ? 'fa-check-circle' : 'fa-info-circle';
        const toast = document.createElement('div');
        toast.style.cssText = `background:#fff;border-left:4px solid ${color};padding:12px 16px;border-radius:8px;box-shadow:0 4px 20px rgba(0,0,0,.12);display:flex;align-items:center;gap:10px;font-size:.88rem;min-width:260px;animation:slideIn .3s ease;`;
        toast.innerHTML = `<i class="fas ${icon}" style="color:${color}"></i><span>${message}</span>`;
        container.appendChild(toast);
        setTimeout(() => { toast.style.opacity = '0'; toast.style.transform = 'translateX(100%)'; toast.style.transition = '.3s'; setTimeout(() => toast.remove(), 300); }, 4000);
    };

    // ── AJAX Status Update (Admin Applications List) ────────────────
    document.querySelectorAll('.status-form .status-select').forEach(select => {
        select.addEventListener('change', function () {
            const form = this.closest('form');
            const data = new FormData(form);
            fetch(form.action, {
                method: 'POST', body: data,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(r => r.json())
                .then(json => {
                    if (json.success) showToast('success', 'Status updated.');
                    else showToast('error', 'Update failed.');
                }).catch(() => showToast('error', 'Network error.'));
        });
    });

    // ── Job Share ───────────────────────────────────────────────────
    window.shareJob = () => {
        if (navigator.share) {
            navigator.share({ title: document.title, url: window.location.href });
        } else {
            navigator.clipboard.writeText(window.location.href)
                .then(() => showToast('success', 'Link copied to clipboard!'));
        }
    };

    // ── Bookmark ────────────────────────────────────────────────────
    window.bookmarkJob = (btn) => {
        const icon = btn.querySelector('i');
        const isBookmarked = icon.classList.contains('fas');
        icon.className = isBookmarked ? 'far fa-bookmark' : 'fas fa-bookmark';
        icon.style.color = isBookmarked ? '' : 'var(--gold)';
        showToast(isBookmarked ? 'info' : 'success', isBookmarked ? 'Bookmark removed.' : 'Job bookmarked!');
    };

    // ── Auto-dismiss Alerts ─────────────────────────────────────────
    document.querySelectorAll('.alert:not(.alert-danger)').forEach(alert => {
        setTimeout(() => {
            if (alert.classList.contains('show')) {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 5000);
    });

    // ── Inject CSS animation ────────────────────────────────────────
    const style = document.createElement('style');
    style.textContent = '@keyframes slideIn{from{opacity:0;transform:translateX(100%)}to{opacity:1;transform:translateX(0)}}';
    document.head.appendChild(style);

});
