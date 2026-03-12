<?php
$pageTitle = e($job['title']);
include __DIR__ . '/../partials/header.php';
?>

<!-- ── Job Title Hero (TCS Minimal Dark Style) ── -->
<div class="py-5 bg-dark position-relative overflow-hidden" style="min-height:40vh; display:flex; align-items:center;">
    <!-- Minimalist Line Accent -->
    <div style="position:absolute; bottom:0; left:0; width:100%; height:4px; background:var(--tcs-gradient);"></div>
    
    <!-- Abstract dark noise or grid typical in enterprise headers -->
    <div style="position:absolute; inset:0; opacity:0.1; background-image:url('data:image/svg+xml,%3Csvg width=\'50\' height=\'50\' viewBox=\'0 0 50 50\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M50 0v50H0V0h50zM1 49h48V1H1v48z\' fill=\'%23ffffff\' fill-rule=\'evenodd\'/%3E%3C/svg%3E'); z-index:0;"></div>

    <div class="container py-4 position-relative z-3">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb m-0 font-sans fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/jobs" class="text-white text-decoration-none opacity-75 tcs-hover-link">Careers</a></li>
                <li class="breadcrumb-item"><span class="text-white opacity-75"><?= e($job['department_name'] ?? 'Engineering') ?></span></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?= e($job['title']) ?></li>
            </ol>
        </nav>

        <div class="row align-items-end">
            <div class="col-lg-8">
                <?php if($job['is_featured']): ?>
                <span class="badge border border-white text-white d-inline-block rounded-0 px-3 py-2 mb-4" style="font-size:0.7rem; letter-spacing:2px; text-transform:uppercase; background:transparent;">
                    Premium Opportunity
                </span>
                <?php endif; ?>
                
                <h1 class="font-serif fw-bold text-white mb-4" style="font-size:clamp(2.5rem, 5vw, 4rem); line-height:1.1;">
                    <?= e($job['title']) ?>
                </h1>
                
                <div class="d-flex flex-wrap gap-4 text-white opacity-75 fw-medium mt-2" style="font-size:0.9rem; letter-spacing:0.5px;">
                    <div class="d-flex align-items-center"><i class="bi bi-geo-alt fs-5 me-2" style="color:#E91E63;"></i><?= e($job['location']) ?></div>
                    <div class="d-flex align-items-center"><i class="bi bi-person-gear fs-5 me-2" style="color:#3F51B5;"></i><?= ucfirst(str_replace('-',' ',$job['job_type'])) ?></div>
                    <div class="d-flex align-items-center"><i class="bi bi-clock-history fs-5 me-2 text-white"></i>Posted <?= timeAgo($job['created_at']) ?></div>
                </div>
            </div>
            
            <div class="col-lg-4 text-lg-end mt-5 mt-lg-0">
                <?php if (!$job['is_active']): ?>
                    <button class="btn btn-secondary btn-lg fw-bold rounded-circ text-uppercase disabled w-100" style="padding:1rem 2rem; font-size:0.9rem; letter-spacing:1px;">Position Closed</button>
                <?php else: ?>
                    <?php if (!isLoggedIn()): ?>
                        <a href="<?= BASE_URL ?>/login?redirect=<?= urlencode('/jobs/' . $job['id']) ?>" class="btn btn-tcs-primary btn-lg fw-bold rounded-circ text-uppercase w-100" style="padding:1rem 2rem; font-size:0.9rem; letter-spacing:1px;">
                           Login to Apply <i class="bi bi-arrow-right ms-2 scale-hover"></i>
                        </a>
                    <?php elseif (isset($hasApplied) && $hasApplied): ?>
                        <button class="btn btn-success btn-lg fw-bold rounded-circ text-uppercase disabled w-100" style="padding:1rem 2rem; font-size:0.9rem; letter-spacing:1px;">
                           <i class="bi bi-check-circle me-1"></i> Applied
                        </button>
                        <div class="mt-3 text-center text-white opacity-75 fw-bold text-uppercase" style="font-size:0.7rem; letter-spacing:1px;">
                            Status: <?= ucfirst($hasAppliedStatus ?? 'Under Review') ?>
                        </div>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/apply/<?= $job['id'] ?>" class="btn btn-tcs-primary btn-lg fw-bold rounded-circ text-uppercase w-100 shadow" style="padding:1rem 2rem; font-size:0.9rem; letter-spacing:1px;">
                           Apply Now <i class="bi bi-arrow-right ms-2 scale-hover"></i>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mt-3">
  <div class="row g-5">
    
    <!-- ── Main Left Column (Description) ── -->
    <div class="col-lg-8">
      
      <!-- Content Section (Black/Gray Text on White background) -->
      <div class="job-content pe-lg-5" style="line-height:1.8; font-size:1.1rem; color:#444;">
        
        <h3 class="font-serif fw-bold mb-4" style="color:var(--tcs-black); border-left:4px solid #E91E63; padding-left:1rem;">About the Role</h3>
        <div class="mb-5 text-dark" style="font-weight:400;"><?= nl2br(e($job['description'])) ?></div>

        <h3 class="font-serif fw-bold mb-4" style="color:var(--tcs-black); border-left:4px solid #3F51B5; padding-left:1rem;">Requirements & Qualifications</h3>
        <div class="mb-5 text-dark">
          <?php 
          // Format requirements as bullet points
          $reqLines = explode("\n", $job['requirements']);
          echo "<ul class='tcs-list p-0'>";
          foreach ($reqLines as $line) {
            $line = trim($line);
            if (!empty($line)) echo "<li><span class='tcs-bullet bg-dark'></span> $line</li>";
          }
          echo "</ul>";
          ?>
        </div>

        <?php if (!empty($job['responsibilities'])): ?>
        <h3 class="font-serif fw-bold mb-4" style="color:var(--tcs-black); border-left:4px solid #FF8C00; padding-left:1rem;">Key Responsibilities</h3>
        <div class="mb-5 text-dark">
          <?php 
          $resLines = explode("\n", $job['responsibilities']);
          echo "<ul class='tcs-list p-0'>";
          foreach ($resLines as $line) {
            $line = trim($line);
            if (!empty($line)) echo "<li><span class='tcs-bullet bg-dark'></span> $line</li>";
          }
          echo "</ul>";
          ?>
        </div>
        <?php endif; ?>
      </div>
      
      <!-- Inclusion Block -->
      <div class="p-5 bg-light mt-5 border" style="border-color:#eee !important;">
        <h4 class="font-serif fw-bold mb-3 d-flex align-items-center" style="color:var(--tcs-black);">
           <i class="bi bi-suit-heart-fill me-3" style="color:#E91E63;"></i> Equal Opportunity
        </h4>
        <p class="text-muted m-0 fw-medium" style="font-size:0.95rem;">
          Caldim is an equal opportunity employer. We celebrate diversity and are committed to creating an inclusive environment for all employees. Engineering the future requires all voices.
        </p>
      </div>

    </div>

    <!-- ── Sidebar Specs (Right Column) ── -->
    <div class="col-lg-4">
      <div class="sticky-top" style="top:120px;">
        
        <!-- Job Meta Outline Card -->
        <div class="card rounded-0 border mb-4 shadow-sm" style="border-color:#e0e0e0 !important;">
          <div class="card-header bg-white border-bottom border-light p-4">
              <h5 class="fw-bold mb-0 text-uppercase" style="font-size:1rem; letter-spacing:1px; color:var(--tcs-black);">Role Specifications</h5>
          </div>
          <div class="card-body p-4 bg-light">
            
            <div class="d-flex flex-column gap-4">
              <div class="d-flex align-items-start gap-3 pb-3 border-bottom" style="border-color:#e0e0e0 !important;">
                <i class="bi bi-cash-stack fs-4 mt-1" style="color:#3F51B5;"></i>
                <div>
                  <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;">Compensation</span>
                  <strong class="text-dark fs-6"><?= !empty($job['salary_range']) ? e($job['salary_range']) : 'Competitive Package' ?></strong>
                </div>
              </div>

              <div class="d-flex align-items-start gap-3 pb-3 border-bottom" style="border-color:#e0e0e0 !important;">
                <i class="bi bi-person-badge fs-4 mt-1" style="color:#E91E63;"></i>
                <div>
                  <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;">Experience Needed</span>
                  <strong class="text-dark fs-6"><?= $job['experience_min'].' - '.$job['experience_max'] ?> Years Required</strong>
                </div>
              </div>

              <div class="d-flex align-items-start gap-3 pb-3 border-bottom" style="border-color:#e0e0e0 !important;">
                <i class="bi bi-building-add fs-4 mt-1" style="color:#000;"></i>
                <div>
                  <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;">Total Openings</span>
                  <strong class="text-dark fs-6"><?= $job['openings'] ?> Position(s)</strong>
                </div>
              </div>

              <?php if(!empty($job['deadline'])): ?>
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-stopwatch fs-4 mt-1" style="color:#da291c;"></i>
                <div>
                  <span class="d-block text-muted text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;">Application Deadline</span>
                  <strong class="text-dark fs-6"><?= date('F j, Y', strtotime($job['deadline'])) ?></strong>
                </div>
              </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <!-- Tech Stack / Skills Card -->
        <?php if(!empty($job['skills_required'])): ?>
        <div class="card rounded-0 border mb-4 shadow-sm" style="border-color:#e0e0e0 !important;">
          <div class="card-body p-4">
            <h6 class="fw-bold mb-4 text-uppercase border-bottom pb-2" style="font-size:0.85rem; letter-spacing:1px; color:var(--tcs-black); border-color:#eee !important;">Required Skills</h6>
            <div class="d-flex flex-wrap gap-2">
              <?php 
              $skills = array_map('trim', explode(',', $job['skills_required']));
              foreach ($skills as $sk): 
                if(empty($sk)) continue;
              ?>
                <span class="badge border border-dark rounded-0 text-dark p-2 text-uppercase" style="font-size:0.7rem; letter-spacing:1px;">
                  <?= e($sk) ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Share Actions -->
        <h6 class="fw-bold mb-3 text-uppercase mt-4" style="font-size:0.75rem; letter-spacing:1px; color:#999;">Share this opportunity</h6>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-dark rounded-circ w-100 text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;" onclick="copyLink()">
            <i class="bi bi-link-45deg me-1 fs-5 align-middle"></i> Copy
          </button>
          <a href="mailto:?subject=<?= urlencode('Interesting Role: '.$job['title']) ?>&body=<?= urlencode(BASE_URL.'/jobs/'.$job['id']) ?>" class="btn btn-dark rounded-circ w-100 text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:1px;">
            <i class="bi bi-envelope me-1 fs-5 align-middle"></i> Email
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
function copyLink() {
  navigator.clipboard.writeText(window.location.href).then(() => {
    alert('Link copied to clipboard!');
  });
}
</script>

<style>
/* Utilities specifically for Job Detail */
.rounded-circ { border-radius: 50px; }
.scale-hover { transition: transform 0.2s; display:inline-block; }
.btn:hover .scale-hover { transform: translateX(5px); }
.tcs-hover-link { transition: color 0.3s, opacity 0.3s; }
.tcs-hover-link:hover { color: #E91E63 !important; opacity: 1; }

/* Custom Bullet List */
.tcs-list { list-style: none; margin: 0; padding: 0; }
.tcs-list li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.8rem;
}
.tcs-bullet {
    position: absolute;
    left: 0;
    top: 10px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
}
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
