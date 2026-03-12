<?php
$pageTitle = 'My Applications';
include __DIR__ . '/../partials/header.php';
$statusLabels = STATUS_LABELS;
?>

<div class="container py-5">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
      <h1 class="fw-700 text-navy mb-1">My Applications</h1>
      <p class="text-muted mb-0">Hello, <?= e($_SESSION['user_name'] ?? 'Candidate') ?>! Track all your job applications here.</p>
    </div>
    <a href="<?= BASE_URL ?>/jobs" class="btn btn-gold px-4">
      <i class="bi bi-briefcase me-2"></i>Browse Jobs
    </a>
  </div>

  <?php if (empty($applications)): ?>
  <!-- Empty State -->
  <div class="card text-center py-5 px-4">
    <i class="bi bi-file-earmark-x text-muted mb-3" style="font-size:4rem;"></i>
    <h4 class="fw-700 text-navy mb-2">No Applications Yet</h4>
    <p class="text-muted mb-4">You haven't applied to any positions yet. Browse our open roles and start applying.</p>
    <a href="<?= BASE_URL ?>/jobs" class="btn btn-gold btn-lg px-5">
      <i class="bi bi-search me-2"></i>Explore Open Jobs
    </a>
  </div>

  <?php else: ?>
  <!-- Stats Row -->
  <?php
  $counts = ['applied'=>0,'shortlisted'=>0,'interview'=>0,'offered'=>0,'hired'=>0,'rejected'=>0];
  foreach ($applications as $a) { $counts[$a['status']] = ($counts[$a['status']] ?? 0) + 1; }
  $statCards = [
    ['label'=>'Total','val'=>count($applications),'icon'=>'bi-files','color'=>'#0d1b2a'],
    ['label'=>'Shortlisted','val'=>$counts['shortlisted'],'icon'=>'bi-star-fill','color'=>'#e67e22'],
    ['label'=>'Interview','val'=>$counts['interview'],'icon'=>'bi-camera-video-fill','color'=>'#2980b9'],
    ['label'=>'Offered/Hired','val'=>$counts['offered']+$counts['hired'],'icon'=>'bi-trophy-fill','color'=>'#27ae60'],
  ];
  ?>
  <div class="row g-3 mb-4">
    <?php foreach ($statCards as $sc): ?>
    <div class="col-6 col-md-3">
      <div class="card p-3 text-center">
        <i class="bi <?= $sc['icon'] ?> mb-2" style="font-size:1.5rem;color:<?= $sc['color'] ?>;"></i>
        <div class="fw-700 fs-4 text-navy"><?= $sc['val'] ?></div>
        <div class="text-muted small"><?= $sc['label'] ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Applications Table -->
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead style="background:#f8f9fb;">
            <tr>
              <th class="px-4 py-3 text-navy small fw-700">Job Title</th>
              <th class="py-3 text-navy small fw-700">Department</th>
              <th class="py-3 text-navy small fw-700">Applied On</th>
              <th class="py-3 text-navy small fw-700">Status</th>
              <th class="py-3 text-navy small fw-700">Notes</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($applications as $app): ?>
            <?php $sl = $statusLabels[$app['status']] ?? ['label'=>ucfirst($app['status']),'badge'=>'bg-secondary']; ?>
            <tr>
              <td class="px-4 py-3">
                <a href="<?= BASE_URL ?>/jobs/<?= $app['job_id'] ?>" class="fw-600 text-navy text-decoration-none">
                  <?= e($app['job_title']) ?>
                </a>
              </td>
              <td class="py-3 text-muted small"><?= e($app['department_name'] ?? '–') ?></td>
              <td class="py-3 text-muted small"><?= date('d M Y', strtotime($app['applied_at'])) ?></td>
              <td class="py-3">
                <span class="badge <?= $sl['badge'] ?> px-3 py-2"><?= $sl['label'] ?></span>
              </td>
              <td class="py-3 text-muted small">
                <?= !empty($app['admin_notes']) ? e(substr($app['admin_notes'],0,60)) . (strlen($app['admin_notes'])>60?'…':'') : '–' ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>

<style>.fw-700{font-weight:700;}</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
