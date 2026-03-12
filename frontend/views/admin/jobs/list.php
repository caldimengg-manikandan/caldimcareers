<?php
$pageTitle = 'Manage Job Postings';
include __DIR__ . '/../../partials/header.php';
?>

<div class="container-fluid py-0 px-0" style="background:#f4f4f4; min-height:calc(100vh - 70px);">
  <div class="d-flex h-100">
    
    <!-- ── Sidebar ── -->
    <?php include __DIR__ . '/../sidebar_partial.php'; ?>

    <!-- ── Main Content ── -->
    <div class="flex-grow-1 p-4 p-lg-5 w-100">
      
      <!-- Top Bar -->
      <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4" style="border-color:#ddd !important;">
        <div>
          <h2 class="font-serif fw-bold mb-1" style="color:var(--tcs-black); font-size:2rem;">Manage Jobs</h2>
          <p class="text-muted fw-bold text-uppercase mb-0" style="font-size:0.7rem; letter-spacing:1px;">Create, edit, and deactivate job postings.</p>
        </div>
        
        <div class="d-flex align-items-center gap-4">
            <a href="<?= BASE_URL ?>/admin/jobs/create" class="btn btn-tcs-gradient rounded-circ px-4 py-2 shadow-sm text-uppercase fw-bold d-none d-md-block" style="font-size:0.8rem; letter-spacing:1px;">
              <i class="bi bi-plus-lg me-2"></i>Post New Job
            </a>
            
            <!-- Admin Profile Dropdown -->
            <div class="dropdown border-start ps-4 ms-2">
              <div class="d-flex align-items-center gap-3" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" id="adminProfileMenu">
                <div class="text-end d-none d-lg-block">
                  <div class="fw-bold" style="font-size:0.85rem; color:var(--tcs-black); line-height:1.2;"><?= e($_SESSION['admin_name']) ?></div>
                  <div class="text-muted fw-bold text-uppercase" style="font-size:0.6rem; letter-spacing:1px;">System Admin</div>
                </div>
                <div class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center fw-bold shadow-sm" style="width:40px; height:40px; font-size:1rem; border:2px solid #E91E63;">
                  <?= strtoupper(substr(e($_SESSION['admin_name']), 0, 1)) ?>
                </div>
              </div>
              <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-0 mt-3 p-0 overflow-hidden" aria-labelledby="adminProfileMenu" style="min-width: 200px; z-index: 1050;">
                <li class="bg-light p-3 border-bottom">
                    <div class="fw-bold text-dark small"><?= e($_SESSION['admin_name']) ?></div>
                    <div class="text-muted fw-bold text-uppercase" style="font-size: 0.6rem; letter-spacing: 1px;">Admin Console</div>
                </li>
                <li>
                    <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-uppercase" href="<?= BASE_URL ?>/" target="_blank" style="font-size: 0.7rem; letter-spacing: 1px;">
                        <i class="bi bi-globe me-2 text-primary"></i> Preview Portal
                    </a>
                </li>
                <li><hr class="dropdown-divider m-0 opacity-10"></li>
                <li>
                    <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-danger text-uppercase" href="<?= BASE_URL ?>/admin/logout" style="font-size: 0.7rem; letter-spacing: 1px;">
                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                    </a>
                </li>
              </ul>
            </div>
        </div>
      </div>

      <!-- Jobs Table Card -->
      <div class="card bg-white border-0 shadow-sm rounded-0 overflow-hidden">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="bg-dark text-white">
                <tr>
                  <th class="py-3 px-4 fw-bold text-uppercase small" style="letter-spacing:1px;">Job Title</th>
                  <th class="py-3 fw-bold text-uppercase small" style="letter-spacing:1px;">Department</th>
                  <th class="py-3 fw-bold text-uppercase small" style="letter-spacing:1px;">Status</th>
                  <th class="py-3 fw-bold text-uppercase small text-center" style="letter-spacing:1px;">Applications</th>
                  <th class="py-3 px-4 fw-bold text-uppercase small text-end" style="letter-spacing:1px;">Actions</th>
                </tr>
              </thead>
              <tbody class="border-top-0">
                <?php if (empty($jobs)): ?>
                <tr>
                  <td colspan="5" class="text-center py-5 text-muted fw-bold text-uppercase" style="font-size:0.8rem; letter-spacing:1px;">
                    No jobs found. <a href="<?= BASE_URL ?>/admin/jobs/create" class="text-pink">Create one now</a>
                  </td>
                </tr>
                <?php else: foreach ($jobs as $job): ?>
                <tr class="tcs-table-row">
                  <td class="px-4 py-4">
                    <div class="fw-bold text-dark mb-1" style="font-size:1.05rem;"><?= e($job['title']) ?></div>
                    <div class="text-muted fw-medium d-flex align-items-center gap-2" style="font-size:.75rem;">
                      <span class="d-flex align-items-center"><i class="bi bi-geo-alt me-1 text-pink"></i><?= e($job['location']) ?></span>
                      <span class="opacity-50">|</span>
                      <span class="d-flex align-items-center"><i class="bi bi-calendar me-1"></i><?= date('M d, Y', strtotime($job['created_at'])) ?></span>
                    </div>
                  </td>
                  <td class="py-4">
                     <span class="text-dark fw-bold text-uppercase" style="font-size:0.75rem; letter-spacing:0.5px;"><?= e($job['department_name'] ?? '–') ?></span>
                  </td>
                  <td class="py-4">
                    <div class="d-flex gap-2">
                        <?php if ($job['is_active']): ?>
                          <span class="badge bg-success bg-opacity-10 text-success border border-success rounded-0 px-2 py-1 fw-bold text-uppercase" style="font-size:0.65rem;"><i class="bi bi-check-circle me-1"></i>Active</span>
                        <?php else: ?>
                          <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary rounded-0 px-2 py-1 fw-bold text-uppercase" style="font-size:0.65rem;"><i class="bi bi-x-circle me-1"></i>Inactive</span>
                        <?php endif; ?>
                        
                        <?php if ($job['is_featured']): ?>
                          <span class="badge bg-warning bg-opacity-10 text-dark border border-warning rounded-0 px-2 py-1 fw-bold text-uppercase" style="font-size:0.65rem;"><i class="bi bi-star-fill me-1"></i>Featured</span>
                        <?php endif; ?>
                    </div>
                  </td>
                  <td class="py-4 text-center">
                    <a href="<?= BASE_URL ?>/admin/applications?job_id=<?= $job['id'] ?>" class="btn btn-dark btn-sm rounded-circle fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; font-size:0.85rem;">
                      <?= $job['application_count'] ?? 0 ?>
                    </a>
                  </td>
                  <td class="px-4 py-4 text-end">
                    <div class="btn-group shadow-sm">
                      <a href="<?= BASE_URL ?>/jobs/<?= $job['id'] ?>" target="_blank" class="btn btn-sm btn-white border px-3" title="View Public Page">
                        <i class="bi bi-eye text-dark"></i>
                      </a>
                      <a href="<?= BASE_URL ?>/admin/jobs/<?= $job['id'] ?>/edit" class="btn btn-sm btn-white border px-3" title="Edit Job">
                        <i class="bi bi-pencil text-primary"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <?php if (($pages ?? 1) > 1): ?>
      <nav class="mt-5">
        <ul class="pagination justify-content-center gap-2 border-0">
          <?php for ($p = 1; $p <= $pages; $p++): ?>
          <li class="page-item <?= $p === $page ? 'active' : '' ?>">
            <a class="page-link rounded-0 border fw-bold px-3 py-2 <?= $p === $page ? 'bg-dark border-dark text-white' : 'bg-white text-dark border-light' ?>" href="<?= BASE_URL ?>/admin/jobs?page=<?= $p ?>"><?= $p ?></a>
          </li>
          <?php endfor; ?>
        </ul>
      </nav>
      <?php endif; ?>

    </div>
  </div>
</div>

<style>
.tcs-table-row { transition: background 0.2s; }
.tcs-table-row:hover { background: #fafafa !important; }
.text-pink { color: #E91E63 !important; }
.rounded-circ { border-radius: 50px !important; }
</style>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
