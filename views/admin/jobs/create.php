<?php
$pageTitle = 'Post a New Job';
include __DIR__ . '/../../partials/header.php';
?>

<div class="container-fluid py-0 px-0" style="background:#f4f4f4; min-height:calc(100vh - 70px);">
  <div class="d-flex h-100">
    
    <!-- ── Sidebar ── -->
    <?php include __DIR__ . '/../sidebar_partial.php'; ?>

    <!-- ── Main Content ── -->
    <div class="flex-grow-1 p-4 p-lg-5 w-100">
      
      <!-- Top Bar -->
      <div class="d-flex align-items-center mb-4 pb-3 border-bottom flex-wrap gap-3" style="border-color:#ddd !important;">
        <a href="<?= BASE_URL ?>/admin/jobs" class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm" style="width:40px;height:40px;"><i class="bi bi-arrow-left"></i></a>
        <div>
          <h2 class="font-serif fw-bold mb-1" style="color:var(--tcs-black); font-size:2rem;">Create Job Posting</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 fw-bold text-uppercase" style="font-size:0.65rem; letter-spacing:1px;">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/jobs" class="text-pink text-decoration-none">Job Postings</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">New Opportunity</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card bg-white border-0 shadow-sm rounded-0">
        <div class="card-body p-4 p-md-5">
          <form method="POST" action="<?= BASE_URL ?>/admin/jobs/create">
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

            <div class="row g-4">
              <!-- Primary Info -->
              <div class="col-md-8">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Job Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg border-light bg-light rounded-0" placeholder="e.g. Senior Civil Engineer" style="font-size:1rem;" required autofocus>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Department <span class="text-danger">*</span></label>
                <select name="department_id" class="form-select form-select-lg border-light bg-light rounded-0" style="font-size:1rem;" required>
                  <option value="">Select Department...</option>
                  <?php foreach ($departments as $d): ?>
                  <option value="<?= $d['id'] ?>"><?= e($d['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <!-- Metadata -->
              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Primary Location <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text border-light bg-white rounded-0"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="location" class="form-control border-light bg-light rounded-0" placeholder="e.g. Mumbai, India" required>
                </div>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Contract Type</label>
                <select name="job_type" class="form-select border-light bg-light rounded-0">
                  <option value="full-time">Full-time</option>
                  <option value="part-time">Part-time</option>
                  <option value="contract">Contract</option>
                  <option value="internship">Internship</option>
                  <option value="remote">Remote</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Positions Available</label>
                <input type="number" name="openings" class="form-control border-light bg-light rounded-0" value="1" min="1">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Min Experience (Years)</label>
                <input type="number" name="experience_min" class="form-control border-light bg-light rounded-0" value="0" min="0">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Max Experience (Years)</label>
                <input type="number" name="experience_max" class="form-control border-light bg-light rounded-0" value="0" min="0">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Salary Range (Optional)</label>
                <div class="input-group">
                    <span class="input-group-text border-light bg-white rounded-0"><i class="bi bi-cash-stack"></i></span>
                    <input type="text" name="salary_range" class="form-control border-light bg-light rounded-0" placeholder="e.g. 6-12 LPA">
                </div>
              </div>
            </div>

            <hr class="my-5 opacity-10">

            <!-- Deep Content -->
            <div class="row g-4">
               <div class="col-12">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Detailed Role Description <span class="text-danger">*</span></label>
                  <textarea name="description" class="form-control border-light bg-light rounded-0" rows="6" placeholder="Breakdown of the role, team, and company vision..." required></textarea>
               </div>

               <div class="col-12">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Candidate Requirements <span class="text-danger">*</span></label>
                  <textarea name="requirements" class="form-control border-light bg-light rounded-0" rows="4" placeholder="Educational background, technical skills, certifications..." required></textarea>
               </div>

               <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Key Responsibilities</label>
                  <textarea name="responsibilities" class="form-control border-light bg-light rounded-0" rows="3" placeholder="Day-to-day tasks and goals..."></textarea>
               </div>

               <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Required Hard Skills (Comma separated)</label>
                  <textarea name="skills_required" class="form-control border-light bg-light rounded-0" rows="3" placeholder="e.g. Tekla, AutoCAD, Structural Analysis"></textarea>
               </div>
            </div>

            <!-- Configuration Footer -->
            <div class="row mt-5 p-4 border rounded-0 bg-dark text-white align-items-center g-4">
               <div class="col-md-4">
                  <label class="form-label fw-bold text-uppercase opacity-75 small" style="letter-spacing:1px;">Application Deadline</label>
                  <input type="date" name="deadline" class="form-control border-0 bg-secondary bg-opacity-25 text-white rounded-0">
               </div>
               
               <div class="col-md-8">
                  <div class="d-flex flex-wrap gap-4 justify-content-md-end">
                      <div class="form-check form-switch custom-switch">
                          <input class="form-check-input" type="checkbox" name="is_featured" id="featSwitch">
                          <label class="form-check-label fw-bold text-uppercase ms-2" for="featSwitch" style="font-size:0.75rem; letter-spacing:1px; cursor:pointer;">Highlight as Featured</label>
                      </div>
                      <div class="form-check form-switch custom-switch">
                          <input class="form-check-input bg-success border-success" type="checkbox" name="is_active" id="activeSwitch" checked>
                          <label class="form-check-label fw-bold text-uppercase ms-2" for="activeSwitch" style="font-size:0.75rem; letter-spacing:1px; cursor:pointer;">Public Visibility</label>
                      </div>
                  </div>
               </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-5">
              <a href="<?= BASE_URL ?>/admin/jobs" class="btn btn-light px-5 py-3 rounded-circ fw-bold text-uppercase border-light shadow-sm" style="font-size:0.85rem; letter-spacing:1px;">Cancel</a>
              <button type="submit" class="btn btn-tcs-gradient px-5 py-3 rounded-circ fw-bold text-uppercase shadow-lg" style="font-size:0.85rem; letter-spacing:2px;">
                <i class="bi bi-send-check-fill me-2"></i> Deploy Posting
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
.text-pink { color: #E91E63 !important; }
.btn-white { background:#fff; color:#333; }
.rounded-circ { border-radius: 50px !important; }
.custom-switch .form-check-input { width: 3.5rem; height: 1.7rem; cursor: pointer; }
.custom-switch .form-check-label { margin-top: 0.25rem; }
.form-control:focus, .form-select:focus { background:#fff !important; border-color:#E91E63 !important; box-shadow: none !important; }
</style>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
