<?php
$pageTitle = 'Guided Search - Caldim iBegin';
include __DIR__ . '/../partials/header.php';

// Prepare a list of nice Bootstrap icons mapping to standard departments
$fallbackIcons = [
    'bi-bank', 'bi-clipboard-check', 'bi-gear-fill', 'bi-briefcase-fill',
    'bi-laptop', 'bi-person-badge', 'bi-graph-up', 'bi-shield-check'
];
?>
<style>
/* Hide the global black navbar for this exact replica page */
.navbar-main { display: none !important; }

/* Corporate Elite - Select Function Redesign */
body {
    background-color: #020617; /* Deep Navy Background for Elite feel */
}

.select-function-title {
    font-family: 'Playfair Display', serif;
    color: #ffffff !important;
    font-size: 2.5rem;
    letter-spacing: -1px;
}

.function-card {
    background: rgba(2, 6, 23, 0.6); /* Dark Navy Glass base */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(201, 168, 76, 0.2); /* Subtle Gold border */
    border-radius: 16px;
    padding: 3rem 2rem;
    text-align: left;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
}

.function-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at top right, rgba(201, 168, 76, 0.1), transparent 50%);
    pointer-events: none;
}

.function-card:hover {
    transform: translateY(-10px);
    border-color: rgba(201, 168, 76, 0.8); /* Brighten to Solid Gold */
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 20px rgba(201, 168, 76, 0.1);
}

.job-count-badge {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: rgba(201, 168, 76, 0.1);
    color: #C9A84C;
    border: 1px solid rgba(201, 168, 76, 0.3);
    padding: 0.4rem 0.8rem;
    border-radius: 50px;
    font-size: 0.65rem;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    z-index: 5;
}

.function-icon-wrapper {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin: 0 0 1.5rem 0;
}

.function-icon-wrapper i {
    font-size: 2.2rem;
    color: #C9A84C; /* Caldim Gold */
    opacity: 0.9;
    transition: transform 0.3s ease;
}

.function-card:hover .function-icon-wrapper i {
    transform: scale(1.1);
}

.function-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 0.5px;
    margin-bottom: 0.75rem;
    text-transform: none;
}

.function-desc {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 1.5rem;
    line-height: 1.6;
    flex-grow: 1;
}

.card-action-link {
    color: #C9A84C;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: gap 0.2s;
}

.function-card:hover .card-action-link {
    gap: 12px;
}

/* Entrance Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-card {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
</style>

<!-- Very Top Thin Blue Bar -->
<div class="w-100 px-4 py-1 d-flex align-items-center text-white" style="background:#00b0f0; font-size:0.75rem; position:relative; z-index:30;">
    <a href="<?= BASE_URL ?>/" class="text-white text-decoration-none"><i class="bi bi-house-door-fill me-2"></i> Caldim Careers</a>
</div>

<!-- Top Bar style (TCS iBegin Header strip mock) -->
<div class="w-100 bg-white shadow-sm px-4 py-3 d-flex justify-content-between align-items-center position-relative" style="z-index:20;">
    <a href="<?= BASE_URL ?>/ibegin" class="text-decoration-none">
        <div class="fw-bold" style="font-size:1.5rem; letter-spacing:-1px; color:#555;">Caldim<span style="color:#00b0f0; font-weight:300;">iBegin</span></div>
    </a>
    <div class="d-flex align-items-center gap-4 text-muted fw-bold" style="font-size:0.8rem;">
        <a href="<?= BASE_URL ?>/my-applications" class="text-muted text-decoration-none cursor-pointer"><i class="bi bi-briefcase-fill me-1"></i> My Saved Jobs <i class="bi bi-caret-down-fill ms-1"></i></a>
        <?php if (isLoggedIn()): ?>
            <a href="<?= BASE_URL ?>/logout" class="text-muted text-decoration-none cursor-pointer"><i class="bi bi-person-dash-fill me-1"></i> Logout</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/login" class="text-muted text-decoration-none cursor-pointer"><i class="bi bi-person-fill me-1"></i> Login <i class="bi bi-caret-down-fill ms-1"></i></a>
        <?php endif; ?>
        <div class="dropdown">
            <a href="#" class="text-muted text-decoration-none dropdown-toggle d-flex align-items-center fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_India.png" width="16" class="me-1" alt="EN"> EN
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3" style="font-size:0.85rem; border-radius:4px; min-width:180px; z-index:1050;">
                <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_India.png" width="18" alt="IN"> India</a></li>
                <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg" width="18" alt="US"> United States</a></li>
                <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="#"><img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" width="18" alt="UK"> United Kingdom</a></li>
                <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Germany.svg" width="18" alt="DE"> Germany</a></li>
                <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" width="18" alt="FR"> France</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item py-2" href="#">Global / Other</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- New Banner matching iBegin Premium Style -->
<div style="background: radial-gradient(circle at center, rgba(201, 168, 76, 0.05) 0%, transparent 70%), #020617; min-height: 350px; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; position:relative; overflow:hidden; border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="position-absolute" style="top:0; left:0; width:100%; height:100%; background: url('<?= BASE_URL ?>/public/images/hero-businessman.jpg'); background-size:cover; background-position:center; opacity:0.1; mix-blend-mode:luminosity;"></div>
    
    <div class="position-relative z-3 text-white px-3">
        <h6 class="fw-bold text-uppercase mb-3" style="color:#C9A84C; letter-spacing:4px; font-size:0.8rem;">Career Path Discovery</h6>
        <h1 class="font-serif fw-bold" style="font-size: 3.2rem; letter-spacing: -1px; line-height:1;">
            Find your <span style="color:#C9A84C;">Specialization</span>
        </h1>
        <p class="mt-4 mb-0 opacity-75 fw-light mx-auto" style="max-width: 650px; font-size: 1.05rem; line-height:1.7;">
            Guided search will enable you to find job opportunities across functions and experience levels. 
            Select a domain to begin your customized selection journey.
        </p>
    </div>
</div>

<!-- Select Function Area -->
<div class="container py-5 my-5">
    <div class="text-center mb-5 pb-4">
        <h2 class="select-function-title mb-3">Select Function</h2>
        <div style="width: 60px; height: 3px; background-color: #C9A84C; margin: 0 auto; opacity:0.6;"></div>
    </div>

    <div class="row g-4 justify-content-center">
        <?php 
        $idx = 0;
        if (!empty($departments)): 
            foreach ($departments as $dept): 
                $icon = $fallbackIcons[$idx % count($fallbackIcons)];
                $delay = $idx * 0.1; // Stagger effect
                $idx++;
        ?>
        <div class="col-12 col-md-6 col-lg-3 animate-card" style="animation-delay: <?= $delay ?>s;">
            <div class="function-card">
                <span class="job-count-badge"><?= $dept['job_count'] ?> Roles</span>
                
                <div class="function-icon-wrapper">
                    <i class="bi <?= $icon ?>"></i>
                </div>
                
                <h4 class="function-title"><?= e($dept['name']) ?></h4>
                <p class="function-desc">
                    Find high-impact roles and growth opportunities in <?= e($dept['name']) ?>.
                </p>
                
                <a href="<?= BASE_URL ?>/jobs?department=<?= $dept['id'] ?>" class="card-action-link">
                    Explore Career <i class="bi bi-arrow-right-short fs-4"></i>
                </a>
            </div>
        </div>
        <?php 
            endforeach; 
        else:
        ?>
            <div class="col-12 text-center text-white opacity-50 fw-bold py-5">
                <i class="bi bi-info-circle me-2"></i> No active openings found in this region.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
