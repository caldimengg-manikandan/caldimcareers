<?php
$pageTitle = 'Edit Job: ' . e($job['title']);
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
          <h2 class="font-serif fw-bold mb-1" style="color:var(--tcs-black); font-size:2rem;">Edit Job Posting</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 fw-bold text-uppercase" style="font-size:0.65rem; letter-spacing:1px;">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/jobs" class="text-pink text-decoration-none">Job Postings</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page"><?= e($job['title']) ?></li>
            </ol>
          </nav>
        </div>
        
        <div class="ms-auto d-flex gap-2">
            <a href="<?= BASE_URL ?>/jobs/<?= $job['id'] ?>" target="_blank" class="btn btn-dark rounded-circ px-3 py-2 fw-bold text-uppercase shadow-sm" style="font-size:0.75rem; letter-spacing:1px;">
                <i class="bi bi-eye me-2"></i>Live Preview
            </a>
            <?php if($job['is_active']): ?>
            <form method="POST" action="<?= BASE_URL ?>/admin/jobs/<?= $job['id'] ?>/delete" onsubmit="return confirm('Deactivate this job?');">
                <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">
                <button type="submit" class="btn btn-outline-danger rounded-circ px-3 py-2 fw-bold text-uppercase shadow-sm" style="font-size:0.75rem; letter-spacing:1px;">
                    <i class="bi bi-power me-2"></i>Deactivate
                </button>
            </form>
            <?php endif; ?>
        </div>
      </div>

      <!-- Audit info -->
      <div class="alert alert-secondary border-0 rounded-0 mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3 py-3 px-4 shadow-sm" style="background:#e9ecef;">
          <small class="fw-bold text-uppercase text-muted" style="font-size:0.7rem; letter-spacing:1px;"><i class="bi bi-clock-history me-2"></i>Last Updated: <?= date('M d, Y h:i A', strtotime($job['updated_at'])) ?></small>
          <small class="fw-bold text-uppercase text-muted" style="font-size:0.7rem; letter-spacing:1px;"><i class="bi bi-pencil-square me-2"></i>Admin ID: <?= $job['created_by'] ?></small>
      </div>

      <div class="card bg-white border-0 shadow-sm rounded-0">
        <div class="card-body p-4 p-md-5">
          <form method="POST" action="<?= BASE_URL ?>/admin/jobs/<?= $job['id'] ?>/edit">
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

            <div class="row g-4">
              <!-- Primary Info -->
              <div class="col-md-8">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Job Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg border-light bg-light rounded-0" value="<?= e($job['title']) ?>" style="font-size:1rem;" required>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Department <span class="text-danger">*</span></label>
                <select name="department_id" class="form-select form-select-lg border-light bg-light rounded-0" style="font-size:1rem;" required>
                  <?php foreach ($departments as $d): ?>
                  <option value="<?= $d['id'] ?>" <?= $job['department_id'] == $d['id'] ? 'selected' : '' ?>><?= e($d['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <!-- Metadata -->
              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Primary Location</label>
                <div class="input-group">
                    <span class="input-group-text border-light bg-white rounded-0"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="location" class="form-control border-light bg-light rounded-0" value="<?= e($job['location']) ?>" required>
                </div>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Contract Type</label>
                <select name="job_type" class="form-select border-light bg-light rounded-0">
                  <?php $types = ['full-time','part-time','contract','internship','remote']; 
                  foreach($types as $t): ?>
                  <option value="<?= $t ?>" <?= $job['job_type'] === $t ? 'selected' : '' ?>><?= ucfirst(str_replace('-',' ',$t)) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Positions Available</label>
                <input type="number" name="openings" class="form-control border-light bg-light rounded-0" value="<?= $job['openings'] ?>" min="1">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Min Experience (Years)</label>
                <input type="number" name="experience_min" class="form-control border-light bg-light rounded-0" value="<?= $job['experience_min'] ?>" min="0">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Max Experience (Years)</label>
                <input type="number" name="experience_max" class="form-control border-light bg-light rounded-0" value="<?= $job['experience_max'] ?>" min="0">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Salary Range</label>
                <div class="input-group">
                    <span class="input-group-text border-light bg-white rounded-0"><i class="bi bi-cash-stack"></i></span>
                    <input type="text" name="salary_range" class="form-control border-light bg-light rounded-0" value="<?= e($job['salary_range'] ?? '') ?>">
                </div>
              </div>
            </div>

            <hr class="my-5 opacity-10">

            <!-- Deep Content -->
            <div class="row g-4">
               <div class="col-12">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Detailed Role Description <span class="text-danger">*</span></label>
                  <textarea name="description" class="form-control border-light bg-light rounded-0" rows="6" required><?= e($job['description']) ?></textarea>
               </div>

               <div class="col-12">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Candidate Requirements <span class="text-danger">*</span></label>
                  <textarea name="requirements" class="form-control border-light bg-light rounded-0" rows="4" required><?= e($job['requirements']) ?></textarea>
               </div>

               <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Key Responsibilities</label>
                  <textarea name="responsibilities" class="form-control border-light bg-light rounded-0" rows="3"><?= e($job['responsibilities'] ?? '') ?></textarea>
               </div>

               <div class="col-md-6">
                  <label class="form-label fw-bold text-uppercase text-muted small" style="letter-spacing:1px;">Required Hard Skills</label>
                  <textarea name="skills_required" class="form-control border-light bg-light rounded-0" rows="3"><?= e($job['skills_required'] ?? '') ?></textarea>
               </div>
            </div>

            <!-- Configuration Footer -->
            <div class="row mt-5 p-4 border rounded-0 bg-dark text-white align-items-center g-4">
               <div class="col-md-4">
                  <label class="form-label fw-bold text-uppercase opacity-75 small" style="letter-spacing:1px;">Application Deadline</label>
                  <input type="date" name="deadline" class="form-control border-0 bg-secondary bg-opacity-25 text-white rounded-0" value="<?= $job['deadline'] ? date('Y-m-d', strtotime($job['deadline'])) : '' ?>">
               </div>
               
               <div class="col-md-8">
                  <div class="d-flex flex-wrap gap-4 justify-content-md-end">
                      <div class="form-check form-switch custom-switch">
                          <input class="form-check-input" type="checkbox" name="is_featured" id="featSwitch" <?= $job['is_featured'] ? 'checked' : '' ?>>
                          <label class="form-check-label fw-bold text-uppercase ms-2" for="featSwitch" style="font-size:0.75rem; letter-spacing:1px; cursor:pointer;">Highlight as Featured</label>
                      </div>
                      <div class="form-check form-switch custom-switch">
                          <input class="form-check-input bg-success border-success" type="checkbox" name="is_active" id="activeSwitch" <?= $job['is_active'] ? 'checked' : '' ?>>
                          <label class="form-check-label fw-bold text-uppercase ms-2" for="activeSwitch" style="font-size:0.75rem; letter-spacing:1px; cursor:pointer;">Public Visibility</label>
                      </div>
                  </div>
               </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-5">
              <a href="<?= BASE_URL ?>/admin/jobs" class="btn btn-light px-5 py-3 rounded-circ fw-bold text-uppercase border-light shadow-sm" style="font-size:0.85rem; letter-spacing:1px;">Discard Changes</a>
              <button type="submit" class="btn btn-tcs-gradient px-5 py-3 rounded-circ fw-bold text-uppercase shadow-lg" style="font-size:0.85rem; letter-spacing:2px;">
                <i class="bi bi-save2-fill me-2"></i> Update Posting
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
