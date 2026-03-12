<?php
$pageTitle = 'Caldim iBegin';
include __DIR__ . '/../partials/header.php';
?>
<style>
/* Hide the global black navbar for this exact replica page */
.navbar-main { display: none !important; }
</style>


<!-- Main Header Strip (Fused with Dark Theme) -->
<div class="w-100 px-4 py-3 d-flex justify-content-between align-items-center position-relative" style="z-index:20; background:rgba(2, 6, 23, 0.95); backdrop-filter:blur(10px); border-bottom:1px solid rgba(255,255,255,0.05);">
    <div class="d-flex align-items-center gap-3">
        <img src="<?= BASE_URL ?>/public/images/caldim-logo-new.png" alt="Caldim Symbol" style="height: 35px; object-fit: contain; filter: brightness(0) invert(1);">
        <div class="fw-bold" style="font-size:1.4rem; letter-spacing:-1px; color:#fff;">Caldim<span style="color:#C9A84C; font-weight:300;">iBegin</span></div>
    </div>
    <div class="d-flex align-items-center gap-4 text-white fw-bold" style="font-size:0.75rem; letter-spacing:1px;">
        <a href="<?= BASE_URL ?>/my-applications" class="text-white text-decoration-none opacity-75 hover-gold d-none d-md-block"><i class="bi bi-bookmark-fill me-1 text-pink"></i> Saved Roles</a>
        <?php if (isLoggedIn()): ?>
            <a href="<?= BASE_URL ?>/logout" class="text-white text-decoration-none opacity-75 hover-gold"><i class="bi bi-power me-1"></i> Logout</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/login" class="text-white text-decoration-none opacity-75 hover-gold"><i class="bi bi-person-lock me-1"></i> Personnel Login</a>
        <?php endif; ?>
        <div class="dropdown">
            <a href="#" class="text-white text-decoration-none dropdown-toggle d-flex align-items-center fw-bold opacity-75 hover-gold" data-bs-toggle="dropdown">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_India.png" width="16" class="me-2 rounded-1"> EN
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 bg-dark" style="font-size:0.8rem; border-radius:4px; min-width:180px;">
                <li><a class="dropdown-item py-2 text-white opacity-75" href="#">India</a></li>
                <li><a class="dropdown-item py-2 text-white opacity-75" href="#">United States</a></li>
                <li><hr class="dropdown-divider opacity-10"></li>
                <li><a class="dropdown-item py-2 text-white opacity-75" href="#">Global Network</a></li>
            </ul>
        </div>
    </div>
</div>

<style>
.hover-gold:hover { color: #C9A84C !important; opacity: 1 !important; transition: 0.3s; }
.text-pink { color: #E91E63 !important; }
</style>

<!-- ── Premium Hero Section: Dark Navy Deep Fusion ── -->
<div class="hero-wrapper" style="position:relative; width:100%; min-height:85vh; background: radial-gradient(circle at 30% 50%, rgba(201, 168, 76, 0.08) 0%, transparent 40%), linear-gradient(135deg, #020617 0%, #0d1b2a 100%); overflow:hidden;">
    
    <!-- Background Radial Glow -->
    <div class="position-absolute" style="top: 20%; left: 10%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(201, 168, 76, 0.1) 0%, transparent 70%); z-index: 1; filter: blur(60px); pointer-events: none;"></div>

    <!-- Silhouette Image with Gradient Mask -->
    <div class="hero-image-container" style="position:absolute; inset:0; z-index:2; display:flex; justify-content:flex-end; align-items:center; padding-right:5%;">
        <div style="position:relative; height:100%; width:50%; display:flex; align-items:center;">
             <img src="<?= BASE_URL ?>/public/images/hero-businessman.jpg" alt="Hero Image" 
                  style="height: 75vh; object-fit: contain; mix-blend-mode: luminosity; opacity: 0.6; -webkit-mask-image: linear-gradient(to right, transparent 0%, black 40%, black 80%, transparent 100%); mask-image: linear-gradient(to right, transparent 0%, black 40%, black 80%, transparent 100%);">
        </div>
    </div>


    <!-- Content Center -->
    <div class="container h-100 position-relative z-3" style="padding-top: 15vh; padding-bottom: 5vh;">
        <div class="row align-items-center h-100">
            <div class="col-lg-7">
                <h6 class="fw-bold text-uppercase mb-3" style="color:#C9A84C; letter-spacing:4px; font-size:0.9rem;">Engineering the Future</h6>
                <h1 class="fw-bold mb-4" style="color:#fff; font-size: 4.2rem; line-height:1.1; letter-spacing:-2px; font-family:'Playfair Display', serif;">
                    Your journey toward <br><span style="background: linear-gradient(to right, #fff, #C9A84C); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Global Excellence</span> <br>starts here
                </h1>
                <p class="text-white opacity-75 mb-5 fs-5 fw-light" style="max-width:550px; line-height:1.8;">
                    Join a world-class team of innovators and engineers building smart infrastructure for the next generation.
                </p>

                <!-- Glassmorphism Search Bar -->
                <div class="search-glass-container p-2 mb-4" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
                    <form method="GET" action="<?= BASE_URL ?>/jobs" class="row g-2 m-0">
                        <div class="col-md-4">
                            <div class="input-group input-group-lg h-100">
                                <span class="input-group-text bg-transparent border-0 text-white opacity-50 pe-0"><i class="bi bi-search"></i></span>
                                <input type="text" name="keyword" class="form-control bg-transparent border-0 text-white py-3 fs-6" placeholder="Job Title or Skill" style="color:#fff !important;">
                            </div>
                        </div>
                        <div class="col-md-4 border-start border-white border-opacity-10">
                            <div class="input-group input-group-lg h-100">
                                <span class="input-group-text bg-transparent border-0 text-white opacity-50 pe-0"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" name="location" class="form-control bg-transparent border-0 text-white py-3 fs-6" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn h-100 w-100 text-uppercase fw-bold text-white shadow-sm" style="background: #C9A84C; border:none; border-radius:8px; padding:1rem; letter-spacing:1px; transition: 0.3s ease;">
                                Search Opportunities
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Quick Categories -->
                <div class="d-flex align-items-center gap-4 mt-5 flex-wrap">
                    <span class="text-white opacity-50 fw-bold text-uppercase" style="font-size:0.7rem; letter-spacing:2px;">Quick Categories:</span>
                    <div class="d-flex gap-2">
                        <?php 
                        $cats = [
                            ['icon' => 'bi-code-slash', 'label' => 'Software'],
                            ['icon' => 'bi-building-gear', 'label' => 'Civil'],
                            ['icon' => 'bi-nut-fill', 'label' => 'Mechanical'],
                            ['icon' => 'bi-people-fill', 'label' => 'HR Operations'],
                        ];
                        foreach($cats as $cat): ?>
                        <a href="<?= BASE_URL ?>/jobs?keyword=<?= urlencode($cat['label']) ?>" class="cat-pill d-flex align-items-center gap-2 text-decoration-none px-3 py-2" 
                           style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.05); border-radius:50px; color:#fff; font-size:0.8rem; transition:0.3s ease;">
                            <i class="<?= $cat['icon'] ?> opacity-75" style="color:#C9A84C;"></i>
                            <span><?= $cat['label'] ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ── Why Caldim Section (Themed Replica) ── -->
<div class="why-caldim-section" style="background: #020617; padding: 100px 0; color: #fff; border-bottom: 1px solid rgba(255,255,255,0.03);">
    <div class="container">
        <h2 class="display-5 fw-bold mb-5" style="letter-spacing: -1px; font-family: 'Playfair Display', serif;">Why Caldim</h2>
        
        <!-- Tabs Navigation -->
        <div class="row mb-0 g-0 border-bottom" style="border-color: rgba(255,255,255,0.1) !important;">
            <div class="col-3">
                <button class="why-tab-btn active" onclick="switchWhyTab(event, 'impact')">Impact</button>
            </div>
            <div class="col-3">
                <button class="why-tab-btn" onclick="switchWhyTab(event, 'development')">Development</button>
            </div>
            <div class="col-3">
                <button class="why-tab-btn" onclick="switchWhyTab(event, 'support')">Support</button>
            </div>
            <div class="col-3">
                <button class="why-tab-btn" onclick="switchWhyTab(event, 'progress')">Progress</button>
            </div>
        </div>

        <div class="why-content-wrapper mt-5 pt-4">
            <!-- Impact Content -->
            <div id="why-impact" class="why-tab-content active">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800" alt="Impact" class="img-fluid rounded-3 shadow-lg">
                            <div style="position:absolute; top:-15px; left:-15px; width:60px; height:60px; border-top:3px solid #C9A84C; border-left:3px solid #C9A84C; opacity:0.3;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="display-6 mb-4 fw-bold" style="font-family: 'Playfair Display', serif;">Leading with purpose</h3>
                        <p class="lead opacity-75" style="font-size: 1.1rem; line-height: 1.9; font-weight:300;">
                            Through the application of innovation and our contextual knowledge, we give associates the opportunity to deliver transformative outcomes that benefit society at large and prove that anything is possible.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Development Content -->
            <div id="why-development" class="why-tab-content">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&q=80&w=800" alt="Development" class="img-fluid rounded-3 shadow-lg">
                            <div style="position:absolute; top:-15px; left:-15px; width:60px; height:60px; border-top:3px solid #C9A84C; border-left:3px solid #C9A84C; opacity:0.3;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="display-6 mb-4 fw-bold" style="font-family: 'Playfair Display', serif;">Continuous learning</h3>
                        <p class="lead opacity-75" style="font-size: 1.1rem; line-height: 1.9; font-weight:300;">
                            We equip our associates to deliver innovative solutions, by providing them with opportunities to access and learn from the vast collective experience that exists within Caldim. We ensure they remain at the cutting edge of change.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Support Content -->
            <div id="why-support" class="why-tab-content">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&q=80&w=800" alt="Support" class="img-fluid rounded-3 shadow-lg">
                            <div style="position:absolute; top:-15px; left:-15px; width:60px; height:60px; border-top:3px solid #C9A84C; border-left:3px solid #C9A84C; opacity:0.3;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="display-6 mb-4 fw-bold" style="font-family: 'Playfair Display', serif;">Empowered Support</h3>
                        <p class="lead opacity-75" style="font-size: 1.1rem; line-height: 1.9; font-weight:300;">
                            Through upskilling and reskilling, and with opportunities to move across the business, our people, regardless of age or stage of their career, are supported to discover and become the professionals they were meant to be.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Progress Content -->
            <div id="why-progress" class="why-tab-content">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800" alt="Progress" class="img-fluid rounded-3 shadow-lg">
                            <div style="position:absolute; top:-15px; left:-15px; width:60px; height:60px; border-top:3px solid #C9A84C; border-left:3px solid #C9A84C; opacity:0.3;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="display-6 mb-4 fw-bold" style="font-family: 'Playfair Display', serif;">Perpetual Progress</h3>
                        <p class="lead opacity-75" style="font-size: 1.1rem; line-height: 1.9; font-weight:300;">
                            We see our people as long-term relationships that we build together and from which we all grow. We invest in them across the duration of their career and encourage them to strive for perpetual progress.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.why-tab-btn {
    background: transparent;
    border: none;
    color: rgba(255,255,255,0.4);
    padding: 20px 0;
    width: 100%;
    font-size: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    position: relative;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    text-align: center;
}

.why-tab-btn:hover {
    color: #fff;
}

.why-tab-btn.active {
    color: #C9A84C;
}

.why-tab-btn.active::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 3px;
    background: #C9A84C; /* Gold active line */
    box-shadow: 0 0 15px rgba(201, 168, 76, 0.4);
}

.why-tab-content {
    display: none;
    animation: fadeInWhy 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.why-tab-content.active {
    display: block;
}

@keyframes fadeInWhy {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}

.why-content-wrapper img {
    max-height: 420px;
    object-fit: cover;
    width: 100%;
    transition: filter 0.5s ease;
}
</style>

<script>
function switchWhyTab(evt, tabId) {
    // Hide all tab contents
    const contents = document.getElementsByClassName("why-tab-content");
    for (let i = 0; i < contents.length; i++) {
        contents[i].classList.remove("active");
    }

    // Deactivate all buttons
    const btns = document.getElementsByClassName("why-tab-btn");
    for (let i = 0; i < btns.length; i++) {
        btns[i].classList.remove("active");
    }

    // Show the current tab and add active class to the button
    document.getElementById("why-" + tabId).classList.add("active");
    evt.currentTarget.classList.add("active");
}
</script>



<!-- ── Life at Caldim Section (Navy Blue Background Replica) ── -->
<div class="life-at-caldim-section" style="background-color: #0b1120; padding: 100px 0 80px 0; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="container">
        
        <!-- Section Header -->
        <div class="text-center mb-5 pb-3">
            <div style="color: #fff; opacity: 0.8; letter-spacing: 4px; font-weight: 900; font-size: 0.8rem; margin-bottom: 5px;">I I I I I I I I</div>
            <h2 class="text-white" style="font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 500;">
                Life At Caldim
            </h2>
        </div>

        <!-- 3-Column Image Cards Grid -->
        <div class="row justify-content-center g-4">
            
            <!-- Card 1: RestartWithCaldim -->
            <div class="col-md-4">
                <a href="<?= BASE_URL ?>/restart-with-caldim" class="life-card text-decoration-none">
                    <div class="life-card-img" style="background-image: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=800');"></div>
                    <div class="life-card-bar" style="background-color: #008469;"> <!-- Teal/Green Bar -->
                        <span>RestartWithCaldim</span>
                    </div>
                </a>
            </div>

            <!-- Card 2: Learning Experience (LEX) -->
            <div class="col-md-4">
                <div class="life-card">
                    <div class="life-card-img" style="background-image: url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=800');"></div>
                    <div class="life-card-bar" style="background-color: #b6771a;"> <!-- Amber/Gold Bar -->
                        <span>Learning Experience (LEX)</span>
                    </div>
                </div>
            </div>

            <!-- Card 3: Culture -->
            <div class="col-md-4">
                <div class="life-card">
                    <div class="life-card-img" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=800');"></div>
                    <div class="life-card-bar" style="background-color: #0076b6;"> <!-- Sapphire Blue Bar -->
                        <span>Culture</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* ── Life at Caldim Styles ── */
.life-card {
    position: relative;
    width: 100%;
    /* Create a square-ish proportion overall */
    height: 320px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    background: #1a1a1a; /* Just in case image is loading */
}

.life-card-img {
    flex-grow: 1;
    background-size: cover;
    background-position: center;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.life-card-bar {
    height: 60px; /* Fixed height for the colored bottom bar */
    display: flex;
    align-items: center;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.life-card-bar span {
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
}

/* Micro-interaction */
.life-card:hover .life-card-img {
    transform: scale(1.08); /* Zoom effect on hover */
}
</style>

<!-- ── Unified Guided Search Transition ── -->
<div style="background:#020617; padding: 100px 0; position:relative; overflow:hidden;">
    <div class="container text-center position-relative z-3">
        <div class="mx-auto bg-dark p-4 rounded-circle mb-5 shadow-lg d-flex align-items-center justify-content-center" 
             style="width:100px; height:100px; border: 2px solid rgba(201, 168, 76, 0.3); background: radial-gradient(circle, #1e293b 0%, #020617 100%) !important;">
            <i class="bi bi-compass-fill" style="font-size:2.5rem; color:#C9A84C;"></i>
        </div>
        
        <h2 class="fw-bold mb-3 text-white" style="letter-spacing:1px; font-size:3rem; font-family:'Playfair Display', serif;">Guided Discovery</h2>
        <div style="width:80px; height:3px; background:#C9A84C; margin:0 auto 30px auto;"></div>
        
        <p class="text-white opacity-75 mb-5 mx-auto fs-5" style="max-width:700px; font-weight:300;">
            Not sure where you fit? Our AI-powered guided search maps your engineering skills to our global active openings instantly.
        </p>

        <a href="<?= BASE_URL ?>/guided-search" class="btn btn-lg px-5 py-3 text-white text-uppercase fw-bold" 
           style="border:2px solid #C9A84C; border-radius:50px; font-size:0.9rem; letter-spacing:2px; transition:0.3s; background: transparent; color: #C9A84C !important;">
            Start Selection Journey
        </a>
    </div>

    <!-- Geometric Decorative Elements -->
    <div style="position:absolute; bottom: -50px; right: -50px; width:300px; height:300px; border: 1px solid rgba(201,168,76,0.1); border-radius:50%;"></div>
    <div style="position:absolute; top: -100px; left: -100px; width:400px; height:400px; border: 1px solid rgba(255,255,255,0.03); border-radius:50%;"></div>
</div>

<style>
/* Reset body to ensure flush fitting */
body { background:#020617 !important; margin:0; padding:0; overflow-x:hidden; }

/* Interactive Hover Effects */
.cat-pill:hover {
    background: rgba(201, 168, 76, 0.15) !important;
    border-color: #C9A84C !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(201, 168, 76, 0.1);
}

.search-glass-container input::placeholder {
    color: rgba(255,255,255,0.6) !important;
}

.search-glass-container .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(201, 168, 76, 0.4);
    background: #e0bb55 !important;
}

.btn-outline-light:hover {
    background: #C9A84C !important;
    border-color: #C9A84C !important;
    color: #fff !important;
}
</style>

<style>
/* Reset body to ensure flush fitting */
body { background:#0b1120 !important; margin:0; padding:0; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
