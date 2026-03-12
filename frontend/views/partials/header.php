<?php
/**
 * Global Header Partial - TCS Style Replica
 * Caldim Engineering Careers Portal
 */
$currentUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$base       = basename(dirname($_SERVER['SCRIPT_NAME']));
$seg = preg_replace('#^' . preg_quote($base, '#') . '/?#', '', $currentUri);
$seg = trim($seg, '/');

function isActive(string $path, string $seg): string {
    return ($seg === $path || str_starts_with($seg, rtrim($path, '/') . '/')) ? 'active' : '';
}

// Fetch active application for progress tracker
$activeApp = null;
if (isLoggedIn()) {
    require_once __DIR__ . '/../../../backend/models/ApplicationModel.php';
    if (class_exists('ApplicationModel')) {
        $headerAppModel = new ApplicationModel();
        $apps = $headerAppModel->getByUser($_SESSION['user_id']);
        if (!empty($apps)) {
            $activeIter = array_filter($apps, fn($a) => in_array($a['status'], ['applied', 'shortlisted', 'interview', 'offered']));
            $activeApp = !empty($activeIter) ? current($activeIter) : $apps[0];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? e($pageTitle) . ' – ' : '' ?><?= APP_NAME ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            /* TCS Theming */
            --tcs-black: #0b1120;
            --tcs-black-hover: #161f30;
            --tcs-gray: #333333;
            --tcs-light-gray: #f4f4f4;
            --tcs-white: #ffffff;
            
            /* The iconic Building on Belief gradient */
            --tcs-gradient: linear-gradient(135deg, #FF1493 0%, #da291c 50%, #FF8C00 100%);
            --tcs-gradient-blue: linear-gradient(135deg, #E91E63 0%, #3F51B5 100%);
            
            /* Preserving structural tokens */
            --slate-800: #1a1a1a;
            --slate-700: #333333;
        }

        body { 
            font-family: 'Montserrat', sans-serif; 
            color: var(--tcs-gray); 
            background: var(--tcs-white);
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* ── TCS Navbar ─────────────────────────── */
        .navbar-main {
            background: var(--tcs-black);
            padding: 0; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            border-bottom: 2px solid #333;
        }
        
        /* The colorful bottom border line removed as per user request */

        .navbar-brand-logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: var(--tcs-white);
            font-size: 1.8rem;
            letter-spacing: 1px;
            margin-right: 2rem;
        }

        .navbar-main .nav-link {
            color: var(--tcs-white) !important;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1.8rem 1.2rem !important;
            transition: 0.3s;
            position: relative;
        }
        
        .navbar-main .nav-link:hover, .navbar-main .nav-link.active {
            color: #ffb6c1 !important; /* light pink hover */
        }
        
        /* Underline effect on hover */
        .navbar-main .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--tcs-gradient);
            transition: width 0.3s ease;
        }
        .navbar-main .nav-link:hover::before, .navbar-main .nav-link.active::before {
            width: 100%;
        }

        /* ── TCS Buttons ──────────────────── */
        .btn-tcs-primary {
            background: var(--tcs-white);
            color: var(--tcs-black);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            border: none;
            transition: 0.3s ease;
        }
        .btn-tcs-primary:hover {
            background: var(--tcs-light-gray);
            box-shadow: 0 4px 15px rgba(255,255,255,0.2);
        }

        .btn-tcs-gradient {
            background: var(--tcs-gradient-blue);
            color: var(--tcs-white);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            border: none;
            transition: 0.3s ease;
        }
        .btn-tcs-gradient:hover {
            opacity: 0.9;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.4);
        }

        /* Tracker override for TCS */
        .progress-tracker {
            background: rgba(255,255,255, 0.1); 
            padding: 0.5rem 1.2rem; 
            border-radius: 50px; 
            display: flex; align-items: center; gap: 1rem;
        }
        .tracker-step { width: 15px; height: 15px; border-radius: 50%; background: #333; border: 2px solid #555; }
        .tracker-step.active { background: #E91E63; border-color: #E91E63; }
        .tracker-step.done { background: #3F51B5; border-color: #3F51B5; }

        /* Form Controls */
        .form-control:focus, .form-select:focus {
            box-shadow: none !important;
            border-color: #E91E63 !important;
        }

    </style>
</head>
<body>

<!-- ── Navigation ── -->
<nav class="navbar navbar-expand-xl navbar-main z-3 position-relative">
  <div class="container-fluid px-4 px-lg-5">

    <a href="<?= BASE_URL ?>" class="text-decoration-none d-flex align-items-center">
        <span class="navbar-brand-logo">Caldim</span>
    </a>

    <!-- Active Application Tracker (Desktop and Candidates only) -->
    <?php if ($activeApp && !isAdmin()): ?>
    <div class="d-none d-lg-flex progress-tracker me-4">
      <span class="text-white fw-bold" style="font-size:0.75rem;">APP-<?= $activeApp['id'] ?></span>
      <div class="d-flex align-items-center gap-2">
        <?php
          $idx = array_search($activeApp['status'], ['applied','shortlisted','interview','offered','hired']);
          if ($idx === false) $idx = 0;
          for($i=0; $i<4; $i++) {
              $class = 'tracker-step';
              if ($i < $idx) $class .= ' done';
              else if ($i == $idx) $class .= ' active';
              echo "<div class='$class'></div>";
          }
        ?>
      </div>
      <span class="text-white fw-bold ms-1 text-uppercase" style="font-size:0.7rem; letter-spacing:1px;"><?= $activeApp['status'] ?></span>
    </div>
    <?php endif; ?>

    <!-- Collapse and links removed to strictly show only Caldim logo -->

  </div>
</nav>

<!-- Flash Message -->
<?php $flash = getFlash(); if ($flash): ?>
<div class="alert alert-<?= $flash['type'] === 'error' ? 'danger' : e($flash['type']) ?> alert-dismissible fade show rounded-0 border-0 m-0 text-center fw-bold" style="font-family:'Montserrat';" role="alert">
  <div class="container">
    <?= $flash['message'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
</div>
<?php endif; ?>
