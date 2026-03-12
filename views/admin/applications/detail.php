<?php
$pageTitle = 'Application Detail';
include __DIR__ . '/../../partials/header.php';
$statusLabels = STATUS_LABELS;
$currentStatus = $application['status'];
$sl = $statusLabels[$currentStatus] ?? ['label'=>ucfirst($currentStatus),'badge'=>'bg-secondary'];
?>

<div class="container-fluid py-0 px-0" style="background:#f4f4f4; min-height:calc(100vh - 70px);">
  <div class="d-flex h-100">
    
    <!-- ── Sidebar ── -->
    <?php include __DIR__ . '/../sidebar_partial.php'; ?>

    <!-- ── Main Content ── -->
    <div class="flex-grow-1 p-4 p-lg-5 w-100">
      
      <!-- Top Bar -->
      <div class="d-flex align-items-center mb-4 pb-3 border-bottom flex-wrap gap-3" style="border-color:#ddd !important;">
        <a href="<?= BASE_URL ?>/admin/applications" class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm" style="width:40px;height:40px;"><i class="bi bi-arrow-left"></i></a>
        <div>
          <h2 class="font-serif fw-bold mb-1" style="color:var(--tcs-black); font-size:2rem;">Review Application</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 fw-bold text-uppercase" style="font-size:0.65rem; letter-spacing:1px;">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/applications" class="text-pink text-decoration-none">ATS Kanban</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page"><?= e($application['user_name']) ?></li>
            </ol>
          </nav>
        </div>
        
        <div class="ms-auto">
            <span class="badge border py-3 px-4 rounded-0 text-uppercase fw-bold shadow-sm <?= $sl['badge'] ?>" style="font-size:0.75rem; letter-spacing:1px;"><?= $sl['label'] ?></span>
        </div>
      </div>

      <div class="row g-5">
        
        <!-- Left Column: Talent Profile & Message -->
        <div class="col-lg-8">
          
          <div class="card bg-white border-0 shadow-sm rounded-0 mb-4 p-4 p-md-5">
              <div class="d-flex gap-4 align-items-center flex-wrap">
                <div class="rounded-circ bg-dark text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width:90px;height:90px;font-size:2.5rem; border:3px solid #E91E63; border-radius:50%;">
                  <?= strtoupper(substr($application['user_name'],0,1)) ?>
                </div>
                <div>
                  <h4 class="font-serif fw-bold mb-2 shadow-text" style="color:var(--tcs-black); font-size:1.8rem;"><?= e($application['user_name']) ?></h4>
                  <div class="d-flex gap-4 flex-wrap text-muted fw-bold text-uppercase mt-2" style="font-size:0.7rem; letter-spacing:1px;">
                    <span><i class="bi bi-envelope-at me-2 text-primary"></i><?= e($application['user_email']) ?></span>
                    <?php if(!empty($application['user_phone'])): ?>
                    <span><i class="bi bi-telephone me-2 text-success"></i><?= e($application['user_phone']) ?></span>
                    <?php endif; ?>
                    <span><i class="bi bi-calendar-event me-2 text-dark"></i>Applied <?= date('M d, Y', strtotime($application['applied_at'])) ?></span>
                  </div>
                </div>
              </div>
          </div>

          <!-- Application Metadata -->
          <div class="card bg-white border-0 shadow-sm rounded-0 mb-4" style="border-left:5px solid #00b0f0 !important;">
            <div class="card-body p-4 p-md-5">
              <h6 class="fw-bold mb-4 text-uppercase text-muted border-bottom pb-3" style="font-size:0.75rem; letter-spacing:1px;">Application Meta</h6>
              <div class="row g-4">
                <div class="col-md-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Current CTC</span>
                    <strong class="text-dark fs-6"><?= e($application['current_ctc'] ?: 'N/A') ?></strong>
                </div>
                <div class="col-md-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Expected CTC</span>
                    <strong class="text-dark fs-6"><?= e($application['expected_ctc'] ?: 'N/A') ?></strong>
                </div>
                <div class="col-md-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Notice Period</span>
                    <strong class="text-dark fs-6"><?= e($application['notice_period'] ?: 'N/A') ?></strong>
                </div>
                <div class="col-md-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Total Experience</span>
                    <strong class="text-dark fs-6"><?= e($application['total_experience'] ?: 'N/A') ?> Yrs</strong>
                </div>
                <div class="col-md-6 border-top pt-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Candidate Location</span>
                    <strong class="text-dark fs-6"><i class="bi bi-geo-alt me-1"></i><?= e($application['current_location'] ?: 'N/A') ?></strong>
                </div>
                <div class="col-md-6 border-top pt-3">
                    <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.65rem; letter-spacing:1px;">Portfolio / Profile URL</span>
                    <strong class="text-dark fs-6">
                        <?php if(!empty($application['portfolio_link'])): ?>
                            <a href="<?= e($application['portfolio_link']) ?>" target="_blank" class="text-decoration-none text-primary"><?= e($application['portfolio_link']) ?> <i class="bi bi-link-45deg"></i></a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </strong>
                </div>
              </div>
            </div>
          </div>

          <!-- Position Details -->
          <div class="card bg-white border-0 shadow-sm rounded-0 mb-4" style="border-left:5px solid #3F51B5 !important;">
            <div class="card-body p-4 p-md-5">
              <h6 class="fw-bold mb-3 text-uppercase text-muted" style="font-size:0.75rem; letter-spacing:1px;">Target Position</h6>
              <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2 border-top">
                <div>
                  <div class="fw-bold fs-4 mt-2">
                    <a href="<?= BASE_URL ?>/jobs/<?= $application['job_id'] ?>" target="_blank" class="text-decoration-none text-dark tcs-hover-link">
                      <?= e($application['job_title']) ?> <i class="bi bi-box-arrow-up-right ms-2 fs-6 opacity-50"></i>
                    </a>
                  </div>
                  <div class="text-muted fw-bold text-uppercase mt-2 d-flex align-items-center gap-3" style="font-size:0.7rem; letter-spacing:1px;">
                    <span class="d-flex align-items-center"><i class="bi bi-building me-1 text-primary"></i><?= e($application['department_name'] ?? '–') ?></span>
                    <span class="opacity-25">|</span>
                    <span class="d-flex align-items-center"><i class="bi bi-geo-alt me-1 text-pink"></i><?= e($application['job_location']) ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Message -->
          <div class="card bg-white border-0 shadow-sm rounded-0 mb-4" style="border-left:5px solid #FF8C00 !important;">
            <div class="card-body p-4 p-md-5">
              <h6 class="fw-bold mb-4 text-uppercase border-bottom pb-3 text-muted" style="font-size:0.75rem; letter-spacing:1px;">Cover Letter / Message</h6>
              <div class="text-dark" style="line-height:1.8; font-size:1.05rem;">
                <?php if(!empty($application['cover_letter'])): ?>
                  <?= nl2br(e($application['cover_letter'])) ?>
                <?php else: ?>
                  <p class="text-muted fw-bold text-uppercase m-0 opacity-50" style="font-size:0.8rem; letter-spacing:1px;">No cover letter provided.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Command Center -->
        <div class="col-lg-4">
          
          <div class="card bg-dark text-white rounded-0 border-0 mb-4 sticky-top shadow-lg" style="top:120px;">
            <div class="card-body p-4 p-md-5">
              <h6 class="fw-bold text-uppercase mb-4 pb-3 border-bottom d-flex align-items-center" style="font-size:0.8rem; letter-spacing:2px; border-color:#333 !important;">
                <i class="bi bi-gear-fill me-2" style="color:#E91E63;"></i> Action Matrix
              </h6>
              
              <form method="POST" action="<?= BASE_URL ?>/admin/applications/update-status">
                <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">
                <input type="hidden" name="application_id" value="<?= $application['id'] ?>">

                <div class="mb-4">
                  <label class="form-label text-white opacity-50 fw-bold text-uppercase mb-2" style="font-size:0.65rem; letter-spacing:1px;">Current Status Update</label>
                  <select name="status" class="form-select rounded-0 bg-white text-dark border-0 p-3 fw-bold shadow-sm">
                    <?php foreach ($statusLabels as $k => $v): ?>
                    <option value="<?= $k ?>" <?= $currentStatus === $k ? 'selected' : '' ?>><?= $v['label'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-4">
                  <label class="form-label text-white opacity-50 fw-bold text-uppercase mb-2" style="font-size:0.65rem; letter-spacing:1px;">Decision Notes (Confidential)</label>
                  <textarea name="notes" class="form-control rounded-0 bg-white text-dark border-0 p-3 shadow-sm" rows="4" placeholder="Technical feedback..."><?= e($application['admin_notes'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn btn-tcs-gradient w-100 fw-bold py-3 text-uppercase rounded-circ shadow-lg mt-2" style="font-size:0.85rem; letter-spacing:2px;">Commit Changes</button>
              </form>

              <hr class="my-5 opacity-10">

              <h6 class="fw-bold text-uppercase mb-4 text-muted" style="font-size:0.75rem; letter-spacing:1px;">Attached Assets</h6>
              <div class="card bg-secondary bg-opacity-10 border-0 rounded-0 text-center mb-0 p-4">
                <i class="bi bi-file-earmark-pdf text-pink mb-2 d-block" style="font-size:2.5rem;"></i>
                <div class="text-truncate fw-bold text-white small px-2 mb-3" title="<?= e($application['resume_name']) ?>">
                  <?= e($application['resume_name']) ?>
                </div>
                <a href="<?= BASE_URL ?>/admin/applications/<?= $application['id'] ?>/resume" class="btn btn-outline-light rounded-circ fw-bold w-100 py-2 text-uppercase shadow-sm" style="font-size:0.7rem; letter-spacing:1px;">
                    <i class="bi bi-download me-2"></i>Download Resume
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<style>
.text-pink { color: #E91E63 !important; }
.rounded-circ { border-radius: 50px !important; }
.tcs-hover-link:hover { color: #E91E63 !important; }
</style>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
