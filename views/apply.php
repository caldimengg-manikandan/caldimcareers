<?php
$pageTitle = 'Smart Apply - ' . e($job['title']);
include __DIR__ . '/partials/header.php';
?>

<div class="apply-page-wrapper py-5" style="background: #f8fafc; min-height: 100vh;">
    <div class="container py-4">
        
        <!-- Premium Back Navigation -->
        <div class="mb-5">
            <a href="<?= BASE_URL ?>/jobs/<?= $job['id'] ?>" class="text-decoration-none d-inline-flex align-items-center gap-2" style="color: #0d1b2a; font-weight: 700; font-size: 0.9rem;">
                <i class="bi bi-arrow-left-circle-fill fs-5"></i> Back to Job Details
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                
                <!-- ── Multi-Step Form Container ── -->
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 24px; background: #fff;">
                    
                    <!-- Header Section -->
                    <div class="p-4 p-md-5 text-center" style="background: #0d1b2a;">
                        <h2 class="font-serif text-white fw-bold mb-2">Smart Application</h2>
                        <p class="text-white opacity-50 small text-uppercase letter-spacing-2 mb-4">Applying for: <?= e($job['title']) ?></p>
                        
                        <!-- ── Combined Stepper ── -->
                        <div class="stepper-container position-relative mx-auto mt-4" style="max-width: 400px;">
                            <!-- Progress Line -->
                            <div class="position-absolute top-50 start-0 translate-middle-y w-100" style="height: 2px; background: rgba(255,255,255,0.1); z-index: 1;">
                                <div id="progress-line" class="h-100" style="width: 0%; background: #fff; transition: 0.4s ease;"></div>
                            </div>
                            
                            <!-- Steps Icons -->
                            <div class="d-flex justify-content-between position-relative z-2">
                                <div class="step-node active" id="node-1" data-step="1">
                                    <div class="node-icon bg-white border-navy"><i class="bi bi-person"></i></div>
                                    <span class="node-label">Personal</span>
                                </div>
                                <div class="step-node" id="node-2" data-step="2">
                                    <div class="node-icon"><i class="bi bi-briefcase"></i></div>
                                    <span class="node-label">Professional</span>
                                </div>
                                <div class="step-node" id="node-3" data-step="3">
                                    <div class="node-icon"><i class="bi bi-file-earmark-arrow-up"></i></div>
                                    <span class="node-label">Documents</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content Area -->
                    <div class="card-body p-4 p-md-5" style="background: #f8fafc;">
                        <form id="smart-apply-form" method="POST" action="<?= BASE_URL ?>/apply/<?= $job['id'] ?>" enctype="multipart/form-data">
                            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

                            <!-- ── Step 1: Personal Info ── -->
                            <div class="form-section active" id="step-1">
                                <div class="row g-4">
                                    <div class="col-md-6 text-navy">
                                        <label class="form-label d-block fw-bold mb-2">Full Name</label>
                                        <input type="text" name="full_name" class="form-control premium-input" value="<?= e($_SESSION['user_name'] ?? '') ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Email Address</label>
                                        <input type="email" name="email" class="form-control premium-input" value="<?= e($_SESSION['user_email'] ?? '') ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control premium-input" placeholder="+91 ..." required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Current Location</label>
                                        <input type="text" name="current_location" class="form-control premium-input" placeholder="City, Country" required>
                                    </div>
                                </div>
                            </div>

                            <!-- ── Step 2: Professional Details ── -->
                            <div class="form-section" id="step-2">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Current CTC (LPA)</label>
                                        <input type="text" name="current_ctc" class="form-control premium-input" placeholder="e.g. 5.5">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Expected CTC (LPA)</label>
                                        <input type="text" name="expected_ctc" class="form-control premium-input" placeholder="e.g. 8.5">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Notice Period</label>
                                        <select name="notice_period" class="form-select premium-input">
                                            <option value="Immediate">Immediate</option>
                                            <option value="15 Days">15 Days</option>
                                            <option value="30 Days">30 Days</option>
                                            <option value="60 Days">60 Days</option>
                                            <option value="90 Days">90 Days</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label d-block fw-bold mb-2">Total Experience (Years)</label>
                                        <input type="number" step="0.5" name="total_experience" class="form-control premium-input" placeholder="e.g. 3.5">
                                    </div>
                                </div>
                            </div>

                            <!-- ── Step 3: Document Upload ── -->
                            <div class="form-section" id="step-3">
                                <div class="mb-4">
                                    <label class="form-label d-block fw-bold mb-3">Resume / CV (PDF Preferred)</label>
                                    <div id="drop-zone" class="upload-zone text-center p-5">
                                        <div class="mb-3">
                                            <i class="bi bi-cloud-upload" style="font-size: 3.5rem; color: #a0aec0;"></i>
                                        </div>
                                        <h5 class="fw-bold text-navy mb-1">Drag & Drop Resume here</h5>
                                        <p class="text-muted small">or click to browse from your device</p>
                                        <input type="file" name="resume" id="resume-file" class="d-none" accept=".pdf,.doc,.docx" required>
                                        <div id="file-info" class="mt-3 d-none">
                                            <div class="alert alert-success py-2 px-3 d-inline-block small">
                                                <i class="bi bi-file-earmark-check me-2"></i><span id="file-name">filename.pdf</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label d-block fw-bold mb-2">Portfolio / LinkedIn Link <span class="text-muted fw-normal">(Optional)</span></label>
                                    <input type="url" name="portfolio_link" class="form-control premium-input" placeholder="https://...">
                                </div>
                            </div>

                            <!-- ── Form Actions ── -->
                            <div class="d-flex justify-content-between mt-5 pt-4 border-top">
                                <button type="button" id="prev-btn" class="btn btn-outline-navy px-4 py-2 fw-bold d-none">
                                    <i class="bi bi-arrow-left me-2"></i> Previous
                                </button>
                                <button type="button" id="next-btn" class="btn btn-navy ms-auto px-5 py-2 fw-bold">
                                    Next <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                                <button type="submit" id="submit-btn" class="btn btn-navy ms-auto px-5 py-2 fw-bold d-none">
                                    Submit Application <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
/* Stepper Styles */
.step-node {
    text-align: center;
    width: 60px;
}
.node-icon {
    width: 32px;
    height: 32px;
    background: rgba(255,255,255,0.05);
    border: 2px solid rgba(255,255,255,0.1);
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.2);
    font-size: 0.9rem;
    transition: 0.3s;
}
.node-label {
    display: block;
    font-size: 0.65rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255,255,255,0.2);
    margin-top: 8px;
    transition: 0.3s;
}

.step-node.active .node-icon {
    background: #fff;
    border-color: #fff;
    color: #0d1b2a;
    box-shadow: 0 0 15px rgba(255,255,255,0.3);
}
.step-node.active .node-label { color: #fff; opacity: 1; }

.step-node.completed .node-icon {
    background: #C9A84C;
    border-color: #C9A84C;
    color: white;
}
.step-node.completed .node-label { color: #C9A84C; }

/* Form Field Styles */
.text-navy { color: #0d1b2a; }
.btn-navy { background: #0d1b2a; color: #f8fafc; border: none; border-radius: 8px; transition: 0.3s; }
.btn-navy:hover { background: #1a2e44; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(13, 27, 42, 0.2); color: #fff; }

.btn-outline-navy { border: 2px solid #0d1b2a; color: #0d1b2a; border-radius: 8px; transition: 0.3s; background: transparent; }
.btn-outline-navy:hover { background: #0d1b2a; color: #fff; }

.premium-input {
    background: #fff;
    border: 1px solid rgba(13, 27, 42, 0.2);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    color: #0d1b2a;
    font-weight: 500;
    transition: all 0.3s;
}
.premium-input:focus {
    background: #fff;
    border-color: #00b0f0; /* Ice Blue */
    box-shadow: 0 0 0 4px rgba(0, 176, 240, 0.1);
    outline: none;
}

/* Form Sections */
.form-section { display: none; }
.form-section.active { display: block; animation: fadeIn 0.4s ease; }

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Upload Zone */
.upload-zone {
    border: 2px dashed #cbd5e0;
    background: #fff;
    border-radius: 16px;
    cursor: pointer;
    transition: 0.3s;
}
.upload-zone:hover {
    border-color: #0d1b2a;
    background: #f1f5f9;
}

.letter-spacing-2 { letter-spacing: 2px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;
    
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    const submitBtn = document.getElementById('submit-btn');
    const progressLine = document.getElementById('progress-line');
    
    function showStep(step) {
        document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));
        document.getElementById('step-' + step).classList.add('active');
        
        // Update Nodes
        document.querySelectorAll('.step-node').forEach((node, idx) => {
            const nodeStep = idx + 1;
            node.classList.remove('active', 'completed');
            if(nodeStep < step) node.classList.add('completed');
            if(nodeStep === step) node.classList.add('active');
        });
        
        // Update Line
        progressLine.style.width = ((step - 1) / (totalSteps - 1)) * 100 + '%';
        
        // Buttons
        if(step === 1) prevBtn.classList.add('d-none');
        else prevBtn.classList.remove('d-none');
        
        if(step === totalSteps) {
            nextBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        } else {
            nextBtn.classList.remove('d-none');
            submitBtn.classList.add('d-none');
        }
    }
    
    nextBtn.addEventListener('click', () => {
        if(currentStep < totalSteps) {
            // Basic validation for current step
            const inputs = document.getElementById('step-' + currentStep).querySelectorAll('input[required], select[required]');
            let valid = true;
            inputs.forEach(i => {
                if(!i.value) {
                    i.classList.add('is-invalid');
                    valid = false;
                } else {
                    i.classList.remove('is-invalid');
                }
            });
            
            if(valid) {
                currentStep++;
                showStep(currentStep);
            }
        }
    });
    
    prevBtn.addEventListener('click', () => {
        if(currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Upload Zone Logic
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('resume-file');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');

    dropZone.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', (e) => {
        if(e.target.files.length > 0) {
            fileName.textContent = e.target.files[0].name;
            fileInfo.classList.remove('d-none');
        }
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = '#0d1b2a';
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.style.borderColor = '#cbd5e0';
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        if(e.dataTransfer.files.length > 0) {
            fileInput.files = e.dataTransfer.files;
            fileName.textContent = e.dataTransfer.files[0].name;
            fileInfo.classList.remove('d-none');
        }
    });
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
