<div class="dropdown">
  <div class="d-flex align-items-center gap-3" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="text-end d-none d-md-block">
      <div class="fw-bold" style="font-size:0.9rem; color:var(--tcs-black);"><?= e($_SESSION['admin_name']) ?></div>
      <div class="text-muted fw-bold text-uppercase" style="font-size:0.65rem; letter-spacing:1px;">System Administrator</div>
    </div>
    <div class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center fw-bold shadow-sm" style="width:45px; height:45px; font-size:1.2rem; border:2px solid #E91E63;">
      <?= strtoupper(substr(e($_SESSION['admin_name']), 0, 1)) ?>
    </div>
  </div>
  <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-0 mt-2 py-0 overflow-hidden" style="min-width: 200px; z-index: 2000;">
    <li class="bg-light p-3 border-bottom">
        <div class="fw-bold text-dark" style="font-size: 0.85rem;"><?= e($_SESSION['admin_name']) ?></div>
        <div class="text-muted fw-bold text-uppercase" style="font-size: 0.6rem; letter-spacing: 1px;">Admin ID: #<?= $_SESSION['admin_id'] ?? 'S1' ?></div>
    </li>
    <li>
        <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-uppercase" href="<?= BASE_URL ?>/" target="_blank" style="font-size: 0.7rem; letter-spacing: 1px;">
            <i class="bi bi-globe me-2 text-primary"></i> View Public Site
        </a>
    </li>
    <li>
        <a class="dropdown-item py-3 d-flex align-items-center fw-bold text-danger text-uppercase" href="<?= BASE_URL ?>/admin/logout" style="font-size: 0.7rem; letter-spacing: 1px;">
            <i class="bi bi-box-arrow-right me-2"></i> Sign Out System
        </a>
    </li>
  </ul>
</div>
