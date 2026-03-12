<?php
/**
 * Shared Admin Sidebar Partial
 */
$currentUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$base = basename(dirname($_SERVER['SCRIPT_NAME'])); 
$seg = preg_replace('#^' . preg_quote($base, '#') . '/?#', '', $currentUri);
$seg = trim($seg, '/');

function isNavActive(string $path, string $seg): bool {
    return ($seg === $path || str_starts_with($seg, rtrim($path, '/') . '/'));
}
?>

<div class="bg-dark text-white p-0 d-none d-lg-block sticky-top shadow-lg" style="width:280px; top:0; height:100vh; overflow-y:auto; border-right:1px solid #333; z-index:1000;">
  <div class="p-4 border-bottom d-flex align-items-center justify-content-between" style="border-color:#333 !important;">
    <h6 class="fw-bold mb-0 text-uppercase" style="font-size:0.75rem; letter-spacing:1px; color:#E91E63;">
      <i class="bi bi-shield-lock me-2"></i>Recruiter Panel
    </h6>
  </div>
  
  <div class="list-group list-group-flush border-0 mt-3">
    <a href="<?= BASE_URL ?>/admin/dashboard" class="list-group-item list-group-item-action text-white bg-dark border-0 rounded-0 py-3 ps-4 d-flex align-items-center <?= isNavActive('admin/dashboard', $seg) || $seg === 'admin' ? 'active-tcs' : 'tcs-nav-hover fw-medium opacity-75' ?>">
      <i class="bi bi-grid-1x2-fill me-3 <?= isNavActive('admin/dashboard', $seg) || $seg === 'admin' ? 'text-pink' : 'text-muted' ?>"></i>Overview
    </a>
    
    <a href="<?= BASE_URL ?>/admin/jobs" class="list-group-item list-group-item-action text-white bg-dark border-0 rounded-0 py-3 ps-4 d-flex align-items-center <?= isNavActive('admin/jobs', $seg) && !str_contains($seg, 'create') ? 'active-tcs' : 'tcs-nav-hover fw-medium opacity-75' ?>">
       <i class="bi bi-briefcase me-3 <?= isNavActive('admin/jobs', $seg) && !str_contains($seg, 'create') ? 'text-pink' : 'text-muted' ?>"></i>Job Postings
    </a>
    
    <a href="<?= BASE_URL ?>/admin/applications" class="list-group-item list-group-item-action text-white bg-dark border-0 rounded-0 py-3 ps-4 d-flex align-items-center <?= isNavActive('admin/applications', $seg) ? 'active-tcs' : 'tcs-nav-hover fw-medium opacity-75' ?>">
       <i class="bi bi-kanban me-3 <?= isNavActive('admin/applications', $seg) ? 'text-pink' : 'text-muted' ?>"></i>ATS Kanban
    </a>
    
    <a href="<?= BASE_URL ?>/admin/jobs/create" class="list-group-item list-group-item-action text-white bg-dark border-0 rounded-0 py-3 ps-4 d-flex align-items-center <?= isNavActive('admin/jobs/create', $seg) ? 'active-tcs' : 'tcs-nav-hover fw-medium opacity-75' ?>">
       <i class="bi bi-plus-square-dotted me-3 <?= isNavActive('admin/jobs/create', $seg) ? 'text-pink' : 'text-muted' ?>"></i>Create Job
    </a>
  </div>

  <div class="mt-auto p-4 border-top" style="border-color:#333 !important; position:absolute; bottom:0; width:100%;">
      <a href="<?= BASE_URL ?>/admin/logout" class="text-white text-decoration-none opacity-50 fw-bold text-uppercase d-flex align-items-center" style="font-size:0.75rem; letter-spacing:1px;">
          <i class="bi bi-box-arrow-left me-2"></i>Sign Out
      </a>
  </div>
</div>

<style>
.active-tcs {
    border-left: 4px solid #E91E63 !important;
    background: #1a1a1a !important;
    font-weight: 700 !important;
    opacity: 1 !important;
}
.text-pink { color: #E91E63 !important; }
.tcs-nav-hover:hover {
    background: #1a1a1a !important;
    opacity: 1 !important;
    color: #fff !important;
}
</style>
