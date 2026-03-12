<?php
$pageTitle = 'ATS Dashboard - Kanban';
include __DIR__ . '/../../partials/header.php';
$statusLabels = STATUS_LABELS;

// Group applications by status for the Kanban board
$kanban = [];
$boardStatuses = ['applied', 'shortlisted', 'interview', 'offered', 'hired', 'rejected'];

foreach ($boardStatuses as $s) {
    $kanban[$s] = [];
}

foreach ($applications as $app) {
    $status = $app['status'];
    if (!isset($kanban[$status])) {
        $kanban[$status] = []; 
    }
    $kanban[$status][] = $app;
}
?>

<div class="container-fluid py-0 px-0" style="background:#f4f4f4; height:calc(100vh - 70px); overflow:hidden;">
  <div class="d-flex h-100">
    
    <!-- ── Sidebar ── -->
    <?php include __DIR__ . '/../sidebar_partial.php'; ?>

    <!-- ── Main Content ── -->
    <div class="flex-grow-1 d-flex flex-column h-100">
      
      <!-- Top Bar/Cockpit Header -->
      <div class="bg-dark text-white p-4 d-flex justify-content-between align-items-center flex-wrap gap-3 shadow-sm" style="border-bottom:3px solid #E91E63;">
        <div>
          <h2 class="font-serif fw-bold text-white mb-1" style="font-size:1.8rem;">Recruiter ATS Cockpit</h2>
          <p class="text-white opacity-50 fw-bold text-uppercase mb-0" style="font-size:0.65rem; letter-spacing:1px;">Visualized Pipeline & Candidate Management</p>
        </div>
        
        <div class="d-flex gap-3 align-items-end flex-wrap">
          <form method="GET" action="<?= BASE_URL ?>/admin/applications" class="d-flex gap-3 align-items-end">
            <div>
              <label class="form-label text-white opacity-75 mb-1 d-block fw-bold" style="font-size:0.6rem; text-transform:uppercase; letter-spacing:1px;">Filter by Role</label>
              <select name="job_id" class="form-select form-select-sm border-0 rounded-0 bg-white text-dark py-2 px-3 shadow-sm" onchange="this.form.submit()" style="min-width:200px;">
                <option value="">All Job Postings</option>
                <?php foreach ($jobs as $j): ?>
                <option value="<?= $j['id'] ?>" <?= ($filters['job_id'] ?? '') == $j['id'] ? 'selected' : '' ?>><?= e($j['title']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </form>
          <div class="d-flex align-items-center gap-3 border-start ps-3 ms-2">
              <a href="<?= BASE_URL ?>/admin/export/applications" class="btn btn-sm btn-tcs-primary rounded-circ px-3 shadow-sm fw-bold text-uppercase me-2" style="height:35px; font-size:0.7rem;">
                <i class="bi bi-download me-1"></i> Export Data
              </a>

              <!-- Profile Dropdown (Light variant for dark header) -->
              <div class="dropdown">
                <div class="d-flex align-items-center gap-3" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" id="kanbanProfile">
                  <div class="text-end d-none d-lg-block">
                    <div class="fw-bold text-white" style="font-size:0.8rem; line-height:1.2;"><?= e($_SESSION['admin_name']) ?></div>
                    <div class="text-white opacity-50 fw-bold text-uppercase" style="font-size:0.6rem; letter-spacing:1px;">System Admin</div>
                  </div>
                  <div class="rounded-circle bg-white text-dark d-flex justify-content-center align-items-center fw-bold shadow-sm" style="width:38px; height:38px; font-size:0.9rem; border:2px solid #E91E63;">
                    <?= strtoupper(substr(e($_SESSION['admin_name']), 0, 1)) ?>
                  </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-0 mt-3 p-0 overflow-hidden" aria-labelledby="kanbanProfile" style="min-width: 200px; z-index: 2100;">
                  <li class="bg-light p-3 border-bottom">
                      <div class="fw-bold text-dark small"><?= e($_SESSION['admin_name']) ?></div>
                      <div class="text-muted fw-bold text-uppercase" style="font-size: 0.6rem; letter-spacing: 1px;">Admin Control</div>
                  </li>
                  <li>
                      <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-uppercase" href="<?= BASE_URL ?>/admin/dashboard" style="font-size: 0.7rem; letter-spacing: 1px;">
                          <i class="bi bi-grid-1x2 me-2 text-primary"></i> Main Dashboard
                      </a>
                  </li>
                  <li><hr class="dropdown-divider m-0 opacity-10"></li>
                  <li>
                      <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-danger text-uppercase" href="<?= BASE_URL ?>/admin/logout" style="font-size: 0.7rem; letter-spacing: 1px;">
                          <i class="bi bi-power me-2"></i> Logout
                      </a>
                  </li>
                </ul>
              </div>
          </div>
        </div>
      </div>

      <!-- Kanban Area -->
      <div class="flex-grow-1 p-4 overflow-hidden">
        <div class="d-flex gap-4 h-100 overflow-x-auto pb-3 custom-scrollbar">
          
          <?php foreach ($boardStatuses as $colStatus): 
            $colApps = $kanban[$colStatus];
            $colLabel = $statusLabels[$colStatus]['label'] ?? ucfirst($colStatus);
            
            $lineColor = '#999';
            if($colStatus==='applied') $lineColor = '#FF8C00';
            if($colStatus==='shortlisted') $lineColor = '#E91E63';
            if($colStatus==='interview') $lineColor = '#3F51B5';
            if($colStatus==='offered') $lineColor = '#00bcd4';
            if($colStatus==='hired') $lineColor = '#4caf50';
            if($colStatus==='rejected') $lineColor = '#f44336';
          ?>
          
          <!-- Kanban Column -->
          <div class="d-flex flex-column rounded-0 bg-white border-0 shadow-sm" style="min-width: 320px; width: 320px; border-top: 4px solid <?= $lineColor ?> !important;">
            
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="background:#fafafa;">
              <h6 class="fw-bold text-uppercase mb-0" style="color:var(--tcs-black); font-size:0.8rem; letter-spacing:1px;"><?= $colLabel ?></h6>
              <span class="badge border border-dark text-dark fw-bold rounded-0 px-2 py-1" style="font-size:0.7rem;"><?= count($colApps) ?></span>
            </div>

            <div class="p-3 flex-grow-1 overflow-y-auto custom-scrollbar bg-light bg-opacity-50">
              <?php if (empty($colApps)): ?>
                <div class="text-center p-4 border border-dashed text-muted fw-bold text-uppercase mt-2" style="font-size:0.75rem; border-color:#ccc !important;">Queue Empty</div>
              <?php else: foreach ($colApps as $app): ?>
                
                <div class="card rounded-0 border-0 shadow-sm mb-3 candidate-card-tcs" onclick="location.href='<?= BASE_URL ?>/admin/applications/<?= $app['id'] ?>'" style="cursor:pointer; border:1px solid #e5e5e5 !important;">
                  <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold text-dark mb-0 tcs-name" style="font-size:1rem;"><?= e($app['user_name']) ?></h6>
                        <span class="badge rounded-circ text-success fw-bold border" style="font-size:0.6rem; background:#e8f5e9; border-color:#81c784 !important;">AI Optm.</span>
                      </div>
                      
                      <p class="text-muted fw-bold text-uppercase mb-3 text-truncate" style="font-size:0.65rem; letter-spacing:1px;" title="<?= e($app['job_title']) ?>">
                        <?= e($app['job_title']) ?>
                      </p>
                      
                      <div class="d-flex justify-content-between align-items-center pt-2 border-top" style="border-color:#eee !important;">
                        <span class="text-muted" style="font-size:0.65rem;">
                          <i class="bi bi-calendar-event me-1"></i><?= date('M d', strtotime($app['applied_at'])) ?>
                        </span>
                        <span class="text-pink fw-bold text-uppercase" style="font-size:0.65rem; letter-spacing:1px;">Review <i class="bi bi-arrow-right"></i></span>
                      </div>
                  </div>
                </div>
              <?php endforeach; endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
          
        </div>
      </div>

    </div>
  </div>
</div>

<style>
.candidate-card-tcs { transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s; }
.candidate-card-tcs:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; border-color: #E91E63 !important; }
.tcs-name { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
