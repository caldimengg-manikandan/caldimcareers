<?php
$pageTitle = 'Current Openings | iBegin';
include __DIR__ . '/../partials/header.php';
?>

<!-- ── Premium Search Hub: Corporate Navy ── -->
<div class="search-top-module py-5" style="background: #0d1b2a; border-bottom: 4px solid #C9A84C;">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h2 class="text-white fw-bold mb-1" style="font-family: 'Playfair Display', serif; font-size: 2.5rem;">Caldim openings</h2>
                <p class="text-white opacity-50 text-uppercase letter-spacing-2" style="font-size: 0.75rem; letter-spacing: 2px;">Search active engineering openings globally</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="<?= BASE_URL ?>/ibegin" class="text-white opacity-75 text-decoration-none small"><i class="bi bi-arrow-left me-1"></i> Return to iBegin Home</a>
            </div>
        </div>

        <div class="search-glass-panel p-1" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px;">
            <form method="GET" action="<?= BASE_URL ?>/jobs" class="row g-0 m-0 align-items-stretch">
                <?php if (!empty($_GET['department'])): ?>
                    <input type="hidden" name="department" value="<?= e($_GET['department']) ?>">
                <?php endif; ?>
                <!-- Keyword -->
                <div class="col-lg-4 border-end border-white border-opacity-10">
                    <div class="input-group input-group-lg h-100 bg-transparent">
                        <span class="input-group-text bg-transparent border-0 text-white opacity-75"><i class="bi bi-search"></i></span>
                        <input type="text" name="keyword" class="form-control bg-transparent border-0 text-white fs-6 py-4" placeholder="Job Title or Skill" value="<?= e($_GET['keyword']??'') ?>">
                    </div>
                </div>
                <!-- Location -->
                <div class="col-lg-3 border-end border-white border-opacity-10">
                    <div class="input-group input-group-lg h-100 bg-transparent">
                        <span class="input-group-text bg-transparent border-0 text-white opacity-75"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" name="location" class="form-control bg-transparent border-0 text-white fs-6" placeholder="Location" value="<?= e($_GET['location']??'') ?>">
                    </div>
                </div>
                <!-- Experience -->
                <div class="col-lg-3">
                    <div class="input-group input-group-lg h-100 bg-transparent">
                        <span class="input-group-text bg-transparent border-0 text-white opacity-75"><i class="bi bi-briefcase"></i></span>
                        <select class="form-select bg-transparent border-0 text-white fs-6" name="experience" style="cursor:pointer;">
                            <option value="" class="bg-dark">Experience Range</option>
                            <option value="0-3" class="bg-dark" <?= (($_GET['experience']??'') == '0-3')?'selected':'' ?>>Graduate (0-3 yrs)</option>
                            <option value="4-10" class="bg-dark" <?= (($_GET['experience']??'') == '4-10')?'selected':'' ?>>Mid-Senior (4-10 yrs)</option>
                            <option value="10+" class="bg-dark" <?= (($_GET['experience']??'') == '10+')?'selected':'' ?>>Executive (10+ yrs)</option>
                        </select>
                    </div>
                </div>
                <!-- Action -->
                <div class="col-lg-2">
                    <button type="submit" class="btn h-100 w-100 text-uppercase fw-bold m-0" style="background:#fff; color:#0d1b2a; border:none; border-radius:0 10px 10px 0; letter-spacing:1px; white-space:nowrap;">
                        Filter Jobs
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ── Main Results Content ── -->
<div class="container py-5" style="min-height: 60vh;">
    
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h5 class="fw-bold text-navy m-0"><?= count($jobs) ?> Active openings found</h5>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="d-inline-flex gap-2">
                <span class="text-muted small">Sort By:</span>
                <a href="#" class="text-navy text-decoration-none fw-bold small">Latest <i class="bi bi-chevron-down"></i></a>
            </div>
        </div>
    </div>

    <!-- Skeleton Loader (Hidden by default, shown during filtering simulation) -->
    <div id="skeleton-container" class="d-none">
        <?php for($i=0;$i<3;$i++): ?>
        <div class="skeleton-card mb-4 p-4 bg-white border border-light" style="border-radius:12px;">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="skeleton-line mb-3" style="width:70%; height:24px;"></div>
                    <div class="d-flex gap-2">
                        <div class="skeleton-line" style="width:60px; height:20px; border-radius:20px;"></div>
                        <div class="skeleton-line" style="width:80px; height:20px; border-radius:20px;"></div>
                    </div>
                </div>
                <div class="col-md-4"><div class="skeleton-line" style="width:100px; height:18px;"></div></div>
                <div class="col-md-3"><div class="skeleton-line ms-auto" style="width:120px; height:45px;"></div></div>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <!-- Real Job Cards List -->
    <div id="jobs-container" class="job-results-list">
        <?php if (empty($jobs)): ?>
            <div class="text-center py-5">
                <i class="bi bi-search text-muted opacity-25" style="font-size: 5rem;"></i>
                <h4 class="mt-4 fw-bold text-navy">No openings matching your criteria</h4>
                <p class="text-muted">Try adjusting your filters or keyword search.</p>
                <a href="<?= BASE_URL ?>/jobs" class="btn btn-outline-navy mt-3">View All Jobs</a>
            </div>
        <?php else: foreach ($jobs as $job): 
            $tags = array_filter(array_map('trim', explode(',', $job['skills_required'] ?? '')));
            if (empty($tags)) $tags = [e($job['department_name'] ?? 'Engineering')];
        ?>
            <div class="job-row-card bg-white p-4 mb-4" style="border: 1px solid #e2e8f0; border-radius: 12px; transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer;" onclick="window.location='<?= BASE_URL ?>/jobs/<?= $job['id'] ?>'">
                <div class="row align-items-center">
                    
                    <!-- Left: Title & Tags -->
                    <div class="col-md-5">
                        <div class="d-flex align-items-center gap-3 mb-2">
                             <h4 class="fw-bold m-0" style="color: #0d1b2a; font-size: 1.25rem;">
                                <?= e($job['title']) ?>
                            </h4>
                            <span class="badge bg-light text-navy border border-navy border-opacity-10 fw-normal px-2 py-1" style="font-size:0.65rem;">NEW</span>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach(array_slice($tags, 0, 3) as $tag): ?>
                                <span class="skill-tag px-3 py-1 text-navy" style="background: rgba(13, 27, 42, 0.05); border-radius: 50px; font-size: 0.75rem; font-weight: 600;">
                                    <?= e($tag) ?>
                                </span>
                            <?php endforeach; ?>
                            <?php if(count($tags) > 3): ?>
                                <span class="text-muted small align-self-center ps-1">+<?= count($tags)-3 ?> more</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Middle: Meta Data -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-4 text-muted">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-geo-alt text-navy opacity-50"></i>
                                <span class="small font-sans fw-bold"><?= e($job['location']) ?></span>
                            </div>
                            <div class="d-flex align-items-center gap-2 border-start ps-4">
                                <i class="bi bi-suitcase-lg text-navy opacity-50"></i>
                                <span class="small font-sans fw-bold"><?= $job['experience_min'] ?>-<?= $job['experience_max'] ?> Yrs Exp</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Action & Deadline -->
                    <div class="col-md-3 text-md-end">
                        <div class="mb-2">
                            <span class="text-muted small">Apply By: </span>
                            <span class="fw-bold text-navy small"><?= !empty($job['deadline']) ? date('d M, Y', strtotime($job['deadline'])) : 'Open Opportunity' ?></span>
                        </div>
                        <a href="<?= BASE_URL ?>/jobs/<?= $job['id'] ?>" class="text-navy fw-bold text-decoration-none d-inline-flex align-items-center gap-2 hover-pull">
                            View Details <i class="bi bi-arrow-right-short fs-4"></i>
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>

    <!-- Pagination: Corporate Style -->
    <?php if (($pages ?? 1) > 1): ?>
    <div class="d-flex justify-content-center mt-5">
        <nav>
            <ul class="pagination pagination-md gap-2 border-0">
                <?php if($page > 1): ?>
                    <li class="page-item"><a class="page-link rounded-circle border-0 text-navy" href="<?= BASE_URL ?>/jobs?<?= http_build_query(array_merge($_GET, ['page'=>$page-1])) ?>"><i class="bi bi-chevron-left"></i></a></li>
                <?php endif; ?>

                <?php for ($p = 1; $p <= $pages; $p++): ?>
                    <li class="page-item">
                        <a class="page-link rounded-circle border-0 fw-bold <?= $p === $page ? 'bg-navy text-white shadow' : 'bg-light text-navy' ?>" 
                           href="<?= BASE_URL ?>/jobs?<?= http_build_query(array_merge($_GET, ['page'=>$p])) ?>" 
                           style="width:40px; height:40px; display:flex; align-items:center; justify-content:center;">
                           <?= $p ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if($page < $pages): ?>
                    <li class="page-item"><a class="page-link rounded-circle border-0 text-navy" href="<?= BASE_URL ?>/jobs?<?= http_build_query(array_merge($_GET, ['page'=>$page+1])) ?>"><i class="bi bi-chevron-right"></i></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php endif; ?>

</div>

<style>
/* Reset Body for Unified Feel */
body { background-color: #f8fafc !important; }

/* Custom Utilities */
.text-navy { color: #0d1b2a !important; }
.bg-navy { background-color: #0d1b2a !important; }
.btn-outline-navy { color: #0d1b2a; border: 2px solid #0d1b2a; font-weight: 700; border-radius: 8px; transition: 0.3s; }
.btn-outline-navy:hover { background: #0d1b2a; color: #fff; }

.job-row-card:hover {
    border-color: #0d1b2a !important;
    border-left: 4px solid #0d1b2a !important;
    box-shadow: 0 12px 30px rgba(13, 27, 42, 0.15);
    background: #fff;
    transform: translateX(4px);
}

.hover-pull { transition: transform 0.2s; }
.job-row-card:hover .hover-pull { transform: translateX(5px); }

/* Skeleton Loader Style */
.skeleton-line {
    background: linear-gradient(90deg, #f1f5f9 25%, #e2e8f0 50%, #f1f5f9 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.letter-spacing-2 { letter-spacing: 2px; }

/* Placeholder Visibility */
.search-glass-panel input::placeholder {
    color: rgba(255, 255, 255, 0.5) !important;
    font-weight: 400;
}
.search-glass-panel select {
    color: rgba(255, 255, 255, 0.5) !important;
}
.search-glass-panel select option {
    color: #fff;
    background: #0d1b2a;
}

/* Responsive Search Bar */
@media (max-width: 991px) {
    .search-glass-panel form { flex-direction: column; }
    .search-glass-panel .border-end { border-bottom: 1px solid rgba(255,255,255,0.1); border-right: none !important; }
    .search-glass-panel button { border-radius: 0 0 10px 10px !important; padding: 1.5rem !important; }
}
</style>

<script>
// Simulate Skeleton Loading on Filter Submit
document.querySelector('form').addEventListener('submit', function(e) {
    // Only for visual effect if user stays on page; typically this would be for AJAX
    // We'll let the native POST continue, but for SPA feel:
    document.getElementById('jobs-container').className = 'd-none';
    document.getElementById('skeleton-container').className = 'd-block';
});
</script>

<style>
/* Utilities for iBegin Table Styling */
.custom-check:checked { background-color: #00b0f0; border-color: #00b0f0; }
.job-row { transition: background 0.2s; position:relative; }
.job-row:after {
    content:''; position:absolute; bottom:0; left:0; width:100%; height:2px; background:#00b0f0; transform:scaleX(0); transform-origin:left; transition:transform 0.3s;
}
.job-row:hover { background-color: #fafafa; }
.job-row:hover:after { transform:scaleX(1); }

.tcs-active-page { background: #00b0f0 !important; color: #fff !important; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
