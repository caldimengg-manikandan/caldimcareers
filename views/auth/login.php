<?php
$pageTitle = 'Login';
include __DIR__ . '/../partials/header.php';
?>

<div class="min-vh-100 d-flex align-items-center py-5 position-relative overflow-hidden" style="background:#f4f4f4;">
  
  <div class="container position-relative z-1">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">

        <!-- Logo & Heading -->
        <div class="text-center mb-4">
          <div class="mx-auto mb-3 fw-bold" style="width:50px;height:50px;background:#000;color:#fff;border-radius:0;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">CE</div>
          <h2 class="font-serif fw-bold" style="color:var(--tcs-black); letter-spacing:1px;">Welcome Back</h2>
          <p class="text-muted fw-bold text-uppercase mt-2" style="font-size:0.75rem; letter-spacing:1px;">Candidate Portal</p>
        </div>

        <!-- Solid Card Form -->
        <div class="bg-white p-4 p-md-5 rounded-0 border shadow-sm" style="border-top:4px solid #E91E63 !important;">
          <form method="POST" action="<?= BASE_URL ?>/login">
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-envelope text-muted"></i></span>
                <input type="email" name="email" class="form-control bg-light border-secondary border-start-0 rounded-0 ps-0 tcs-input" placeholder="you@domain.com" required autofocus>
              </div>
            </div>

            <div class="mb-5">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Password</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-lock text-muted"></i></span>
                <input type="password" name="password" id="passwordInput" class="form-control bg-light border-secondary border-start-0 border-end-0 rounded-0 ps-0 tcs-input" placeholder="••••••••" required>
                <button type="button" class="btn bg-light border-secondary border-start-0 text-muted rounded-0" onclick="togglePwd()">
                  <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
              </div>
            </div>

            <button type="submit" class="btn btn-tcs-primary w-100 fw-bold py-3 text-uppercase rounded-circ" style="font-size:0.85rem; letter-spacing:1px; background:var(--tcs-black); color:#fff; border:none;">
               Sign In <i class="bi bi-arrow-right ms-2 scale-hover"></i>
            </button>
          </form>
          
          <div class="mt-4 pt-4 border-top text-center" style="border-color:#eee !important;">
            <p class="text-muted mb-0 fw-medium" style="font-size:0.85rem; letter-spacing:0.5px;">
              Don't have an account? <br>
              <a href="<?= BASE_URL ?>/register" class="fw-bold text-uppercase mt-2 d-inline-block tcs-hover-link" style="color:#E91E63; font-size:0.75rem; letter-spacing:1px;">Register Here</a>
            </p>
          </div>
        </div>
        
        <!-- Hidden Admin Entry Point can be accessed directly via /admin/login -->

      </div>
    </div>
  </div>
</div>

<script>
function togglePwd() {
  const inp = document.getElementById('passwordInput');
  const ico = document.getElementById('eyeIcon');
  if(inp.type === 'password') {
    inp.type = 'text';
    ico.className = 'bi bi-eye-slash text-danger';
  } else {
    inp.type = 'password';
    ico.className = 'bi bi-eye text-muted';
  }
}
</script>

<style>
/* Utilities specifically for candidate login */
.tcs-input:focus { box-shadow: none; border-color: var(--tcs-black); }
.rounded-circ { border-radius: 50px !important; }
.scale-hover { transition: transform 0.2s; display:inline-block; }
.btn:hover .scale-hover { transform: translateX(5px); }

.tcs-hover-link { transition: color 0.3s, opacity 0.3s; text-decoration:none !important; }
.tcs-hover-link:hover { color: var(--tcs-black) !important; opacity: 1 !important; text-decoration:underline !important; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
