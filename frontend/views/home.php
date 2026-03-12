<?php
$pageTitle = 'Careers | Caldim';
$pageDesc  = 'Engineer the Future with Caldim Engineering.';
include __DIR__ . '/partials/header.php';
?>

<!-- ── TCS Style Hero Section (CodeVita Clone - Screenshot 1) ── -->
<section style="position:relative; width:100%; min-height:85vh; background-color:#0b1120; overflow:hidden; display:flex; align-items:center;">
    
    <!-- Hero Image Background -->
    <div style="position:absolute; inset:0; z-index:1;">
        <div style="position:absolute; inset:0; background:radial-gradient(circle at 80% 50%, rgba(63, 81, 181, 0.4) 0%, transparent 60%);"></div>
        <div style="position:absolute; inset:0; background:linear-gradient(to right, #0b1120 40%, transparent 100%);"></div>
        <!-- Placeholder Abstract Image using SVGs -->
        <div style="position:absolute; right:0; top:0; bottom:0; width:60%; background-image:url('data:image/svg+xml,%3Csvg width=\'200\' height=\'200\' viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M50 0 Q150 100 200 200\' stroke=\'rgba(255,255,255,0.05)\' stroke-width=\'4\' fill=\'none\'/%3E%3Cpath d=\'M0 50 Q100 150 200 100\' stroke=\'rgba(255,255,255,0.05)\' stroke-width=\'2\' fill=\'none\'/%3E%3C/svg%3E'); background-size:cover; opacity:0.6;"></div>
    </div>

    <div class="container-fluid px-4 px-lg-5 position-relative z-3 py-5">
        <div class="row">
            <div class="col-xl-9 col-lg-10 pe-lg-5">
                
                <p class="text-uppercase fw-bold mb-4" style="color:#fff; letter-spacing:3px; font-size:0.85rem; border-bottom:1px solid rgba(255,255,255,0.2); padding-bottom:15px; display:inline-block;">CALDIM CAREERS</p>
                
                <h1 class="text-white mb-5" style="font-size: clamp(3.5rem, 6vw, 5rem); line-height: 1.1; font-weight:400; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    Caldim Innovation 2026 Grand Finale:<br>
                    Watch as the world's biggest engineering championship unfolds
                </h1>
                
                <!-- Watch LIVE link exactly like Screenshot 1 -->
                <a href="#join-us" class="text-white text-decoration-none fw-bold d-inline-flex align-items-center" style="font-size:1.1rem; letter-spacing:0.5px;">
                    Watch LIVE 
                    <span class="ms-3 bg-white text-dark rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-size:1.3rem;">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </a>

            </div>
        </div>
    </div>
</section>

<!-- ── Join Us Section (Screenshot 2 Replica) ── -->
<section id="join-us" style="background-color:#161f30; padding:8rem 0; border-top:1px solid #1e283c;">
    <div class="container-fluid px-4 px-lg-5">
        <h2 class="text-white mb-4" style="font-size:4.5rem; font-weight:400; font-family:'Segoe UI', sans-serif;">Join us</h2>
        <p class="text-white mb-5" style="font-size:1.5rem; font-weight:300;">Explore career opportunities at Caldim India</p>
        
        <a href="<?= BASE_URL ?>/ibegin" class="btn btn-outline-light rounded-pill px-5 py-3" style="font-size:1.2rem; border-color:rgba(255,255,255,0.5);">
            Click here
        </a>
    </div>
</section>

<style>
/* Reset basic styles to ensure cleanliness */
body {
    background: #0b1120;
}
</style>

<?php include __DIR__ . '/partials/footer.php'; ?>
