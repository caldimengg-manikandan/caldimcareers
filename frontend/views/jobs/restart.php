<?php
$pageTitle = 'ReStart With Caldim';
include __DIR__ . '/../partials/header.php';
?>

<style>
    :root {
        --midnight-navy: #020617;
        --accent-gold: #C9A84C;
        --silver-divider: rgba(192, 192, 192, 0.2);
        --silver-glow: rgba(192, 192, 192, 0.4);
    }

    .restart-split-hero {
        height: 80vh;
        display: flex;
        overflow: hidden;
        background: var(--midnight-navy);
    }

    .hero-left {
        flex: 1;
        display: flex;
        align-items: center;
        padding-left: 10%;
        background: var(--midnight-navy);
        position: relative;
        z-index: 5;
    }

    .hero-right {
        flex: 1.2;
        background-image: url('https://images.unsplash.com/photo-1522071823991-b19c77663c17?auto=format&fit=crop&q=80&w=1200');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .hero-right::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(2, 6, 23, 0.6); /* Soft Navy Overlay */
    }

    .hero-title {
        font-family: 'Oswald', sans-serif;
        font-size: 5rem;
        font-weight: 700;
        line-height: 1.1;
        text-transform: uppercase;
        color: #fff;
        margin-bottom: 1rem;
    }

    .hero-headline {
        color: #fff;
        opacity: 0.85;
        font-size: 1.25rem;
        font-weight: 300;
        max-width: 500px;
        margin-bottom: 2rem;
    }

    .btn-restart {
        background: var(--accent-gold);
        color: #fff;
        padding: 1rem 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        border-radius: 4px;
        letter-spacing: 1.5px;
        transition: all 0.4s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-restart:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(201, 168, 76, 0.4);
        filter: brightness(1.1);
        color: #fff;
    }

    /* Process Section */
    .process-section {
        background: #fff;
        padding: 5rem 0;
        border-top: 1px solid var(--silver-divider);
        border-bottom: 1px solid var(--silver-divider);
    }

    .process-step {
        text-align: center;
        padding: 2rem;
        position: relative;
    }

    .process-step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 30%;
        right: -10%;
        width: 20%;
        height: 1px;
        background: var(--silver-divider);
    }

    .step-icon {
        width: 80px;
        height: 80px;
        background: var(--midnight-navy);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: var(--accent-gold);
        font-size: 2rem;
        box-shadow: 0 0 15px var(--silver-glow);
    }

    .step-title {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        color: var(--midnight-navy);
    }

    .step-desc {
        color: #666;
        font-size: 0.95rem;
    }

    .divider-silver {
        height: 1px;
        background: var(--silver-divider);
        width: 100%;
        margin: 4rem 0;
    }
</style>

<div class="restart-page">
    <!-- Split Hero Section -->
    <header class="restart-split-hero">
        <div class="hero-left">
            <div>
                <h1 class="hero-title">Reskill.<br>Restart.<br>Reclaim</h1>
                <p class="hero-headline">Empowering professionals to return with confidence and new-age skills.</p>
                <div class="mb-4">
                    <span style="color: var(--accent-gold); font-weight: 800; font-size: 1.5rem;">#ReStartWithCaldim</span>
                </div>
                <a href="<?= BASE_URL ?>/jobs" class="btn-restart">Apply Now</a>
            </div>
        </div>
        <div class="hero-right"></div>
    </header>

    <!-- Main Content -->
    <main class="py-5" style="background: #fff;">
        <div class="container py-4 text-center">
            <h2 class="display-5 fw-bold mb-4" style="color: var(--midnight-navy); font-family: 'Playfair Display', serif;">Move Forward. Resume Your Career.</h2>
            <div class="mx-auto" style="max-width: 800px; color: #555; line-height: 1.8;">
                <p>Careers can take a break for many reasons. ReStart with Caldim is an exclusive program for professionals who have taken a break and are now ready to jumpstart their journey in a high-impact engineering environment.</p>
            </div>

            <!-- Process Section -->
            <div class="row mt-5 g-0">
                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4 class="step-title">Step 1: Connect</h4>
                        <p class="step-desc">Apply and share your journey with our talent team.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h4 class="step-title">Step 2: Upskill</h4>
                        <p class="step-desc">Get trained on the latest tech stacks and agile methodologies.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <h4 class="step-title">Step 3: Deploy</h4>
                        <p class="step-desc">Join a high-impact engineering team on live global projects.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="divider-silver"></div>
        </div>

        <!-- Details Grid -->
        <div class="container mb-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-4" style="color: var(--midnight-navy);">Program Eligibility</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-check-circle-fill me-3" style="color: var(--accent-gold);"></i>
                            <span>Minimum 24 months of total work experience.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-check-circle-fill me-3" style="color: var(--accent-gold);"></i>
                            <span>Minimum 6 months of continuous break as on the date of application.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="p-5 rounded-3" style="background: var(--midnight-navy); color: #fff;">
                        <h4 class="fw-bold mb-3">Launchpad for Success</h4>
                        <p class="opacity-75">The 16-week program focuses on providing you with an opportunity to learn new skills, build digital capabilities, and find your rhythm again in a collaborative workspace.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
