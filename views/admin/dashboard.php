<?php
$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../partials/header.php';
$statusLabels = STATUS_LABELS;
?>

<div class="container-fluid py-0 px-0" style="background:#f4f4f4; min-height:calc(100vh - 70px);">
  <div class="d-flex h-100">
    
    <!-- ── Sidebar ── -->
    <?php include __DIR__ . '/sidebar_partial.php'; ?>

    <!-- ── Main Content ── -->
    <div class="flex-grow-1 p-4 p-lg-5 w-100">
      
      <!-- Top Bar -->
      <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4" style="border-color:#ddd !important;">
        <div>
          <h2 class="font-serif fw-bold mb-1" style="color:var(--tcs-black); font-size:2rem;">Intelligence Dashboard</h2>
          <p class="text-muted fw-bold text-uppercase mb-0" style="font-size:0.7rem; letter-spacing:1px;">Real-time analytics and active pipeline</p>
        </div>
        
        <?php include __DIR__ . '/profile_dropdown.php'; ?>
      </div>

      <!-- KPI Metrics (Solid Flat Cards) -->
      <div class="row g-4 mb-4">
        <?php $cards = [
          ['label'=>'Total Active Jobs', 'val'=>($jobStats['active_jobs'] ?? $jobStats['total'] ?? 0), 'icon'=>'bi-hdd-network', 'color'=>'#3F51B5'],
          ['label'=>'Total Applications', 'val'=>($appStats['total'] ?? 0), 'icon'=>'bi-people', 'color'=>'#00bcd4'],
          ['label'=>'Pending Review', 'val'=>($appStats['applied'] ?? 0), 'icon'=>'bi-hourglass-split', 'color'=>'#FF8C00'],
          ['label'=>'Hired Candidates', 'val'=>($appStats['hired'] ?? 0), 'icon'=>'bi-shield-check', 'color'=>'#4caf50']
        ]; foreach($cards as $c): ?>
        
        <div class="col-sm-6 col-xl-3">
          <div class="card bg-white border-0 shadow-sm rounded-0 h-100 tcs-stat-card" style="border-top:3px solid <?= $c['color'] ?> !important;">
            <div class="card-body p-4 position-relative">
              <i class="bi <?= $c['icon'] ?> position-absolute top-0 end-0 mt-3 me-3 opacity-25" style="font-size:3rem; color:<?= $c['color'] ?>;"></i>
              <h3 class="font-serif fw-bold m-0" style="font-size:2.5rem; color:var(--tcs-black);"><?= number_format($c['val']) ?></h3>
              <p class="text-muted mt-2 mb-0 fw-bold text-uppercase" style="font-size:0.7rem; letter-spacing:1px;"><?= $c['label'] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Main Action Modules -->
      <div class="row g-4">
        
        <!-- Quick Actions Panel -->
        <div class="col-lg-5 d-flex flex-column gap-4">
          
          <div class="card bg-white border rounded-0 shadow-sm" style="border-color:#eee !important;">
            <div class="card-header bg-white border-bottom p-4">
                <h6 class="fw-bold mb-0 text-uppercase d-flex align-items-center" style="color:var(--tcs-black); font-size:0.85rem; letter-spacing:1px;">
                   <i class="bi bi-lightning-charge me-2 fs-5" style="color:#E91E63;"></i> Quick Actions
                </h6>
            </div>
            
            <div class="card-body p-0">
              <div class="list-group list-group-flush rounded-0 m-0">
                  <a href="<?= BASE_URL ?>/admin/jobs/create" class="list-group-item list-group-item-action border-0 border-bottom p-4 d-flex align-items-center tcs-action-link">
                    <div class="bg-light text-dark rounded-circ d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;"><i class="bi bi-file-earmark-plus"></i></div>
                    <div>
                      <div class="fw-bold text-dark" style="font-size:0.9rem;">Create Job Posting</div>
                      <div class="text-muted fw-medium" style="font-size:0.75rem;">Draft a new opportunity</div>
                    </div>
                  </a>

                  <a href="<?= BASE_URL ?>/admin/applications" class="list-group-item list-group-item-action border-0 border-bottom p-4 d-flex align-items-center tcs-action-link">
                    <div class="bg-light text-dark rounded-circ d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;"><i class="bi bi-kanban"></i></div>
                    <div>
                      <div class="fw-bold text-dark" style="font-size:0.9rem;">Review Kanban Board</div>
                      <div class="text-muted fw-medium" style="font-size:0.75rem;">Manage candidate pipeline</div>
                    </div>
                  </a>

                  <a href="<?= BASE_URL ?>/admin/export/applications" class="list-group-item list-group-item-action border-0 p-4 d-flex align-items-center tcs-action-link">
                    <div class="bg-light text-success rounded-circ d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;"><i class="bi bi-filetype-csv"></i></div>
                    <div>
                      <div class="fw-bold text-dark" style="font-size:0.9rem;">Export Data (CSV)</div>
                      <div class="text-muted fw-medium" style="font-size:0.75rem;">Download all application data</div>
                    </div>
                  </a>
              </div>
            </div>
          </div>

        </div>

        <!-- Recent Activity Feed -->
        <div class="col-lg-7">
          <div class="card bg-white border rounded-0 shadow-sm h-100" style="border-color:#eee !important;">
            
            <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center">
              <h6 class="fw-bold mb-0 text-uppercase d-flex align-items-center" style="color:var(--tcs-black); font-size:0.85rem; letter-spacing:1px;">
                 <i class="bi bi-activity me-2 fs-5" style="color:#3F51B5;"></i> Recent Applications
              </h6>
              <a href="<?= BASE_URL ?>/admin/applications" class="text-muted text-decoration-none fw-bold text-uppercase tcs-hover-link" style="font-size:0.7rem; letter-spacing:1px;">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            
            <div class="card-body p-0 custom-scrollbar" style="max-height:450px; overflow-y:auto;">
              <?php if(empty($recent)): ?>
                <div class="text-center py-5 my-5">
                  <i class="bi bi-inbox fs-1 text-muted mb-3 d-block"></i>
                  <div class="text-muted fw-bold text-uppercase" style="font-size:0.8rem; letter-spacing:1px;">No recent activity</div>
                </div>
              <?php else: ?>
                <div class="list-group list-group-flush rounded-0 m-0">
                  <?php foreach($recent as $app): 
                    $sl = $statusLabels[$app['status']] ?? ['label'=>ucfirst($app['status']),'badge'=>'bg-secondary'];
                  ?>
                  <a href="<?= BASE_URL ?>/admin/applications/<?= $app['id'] ?>" class="list-group-item list-group-item-action p-4 border-bottom tcs-feed-item">
                      
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3 align-items-center">
                          <div class="rounded-circ bg-dark text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width:45px;height:45px;font-size:1.1rem; border:2px solid transparent;">
                            <?= strtoupper(substr(e($app['full_name'] ?? $app['user_name']), 0, 1)) ?>
                          </div>
                          <div>
                            <div class="fw-bold text-dark mb-1" style="font-size:0.95rem;"><?= e($app['full_name'] ?? $app['user_name']) ?></div>
                            <div class="text-muted fw-medium" style="font-size:0.75rem;">
                              Role: <span class="text-dark fw-bold"><?= e($app['job_title']) ?></span> <span class="mx-1 text-light">|</span> <?= timeAgo($app['applied_at']) ?>
                            </div>
                          </div>
                        </div>
                        <span class="badge <?= $sl['badge'] ?> px-3 py-2 fw-bold rounded-0 text-uppercase" style="font-size:0.65rem; letter-spacing:1px;"><?= $sl['label'] ?></span>
                      </div>

                  </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<style>
/* Dashboard Specific Interactions */
.rounded-circ { border-radius: 50px !important; }

/* Sidebar */
.tcs-nav-hover { transition: background 0.2s, padding-left 0.2s; }
.tcs-nav-hover:hover { background: #1a1a1a !important; color: #fff !important; padding-left: 1.8rem !important; border-left: 2px solid #555 !important; }

/* Stat Cards */
.tcs-stat-card { transition: transform 0.3s; }
.tcs-stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important; }

/* Quick Actions */
.tcs-action-link { transition: background 0.2s, color 0.2s; border-color:#eee !important; }
.tcs-action-link:hover { background: #fafafa !important; }
.tcs-action-link:hover .bg-light { background: var(--tcs-black) !important; color: #fff !important; }

/* Feed items */
.tcs-feed-item { transition: background 0.2s; border-color:#eee !important; }
.tcs-feed-item:hover { background: #fafafa !important; }
.tcs-feed-item:hover .rounded-circ { border-color: #E91E63 !important; }

/* Scrollbar */
.custom-scrollbar::-webkit-scrollbar { width: 6px; }
.custom-scrollbar::-webkit-scrollbar-track { background: #f9f9f9; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
.custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #aaa; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
