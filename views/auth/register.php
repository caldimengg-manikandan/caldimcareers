<?php
$pageTitle = 'Create Account';
include __DIR__ . '/../partials/header.php';
?>

<div class="min-vh-100 d-flex align-items-center py-5 position-relative overflow-hidden" style="background:#f4f4f4;">
  
  <div class="container position-relative z-1">
    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-5">

        <!-- Logo & Heading -->
        <div class="text-center mb-4">
          <div class="mx-auto mb-3 fw-bold" style="width:50px;height:50px;background:#000;color:#fff;border-radius:0;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">CE</div>
          <h2 class="font-serif fw-bold" style="color:var(--tcs-black); letter-spacing:1px;">Create Account</h2>
          <p class="text-muted fw-bold text-uppercase mt-2" style="font-size:0.75rem; letter-spacing:1px;">Candidate Portal</p>
        </div>

        <!-- Solid Card Form -->
        <div class="bg-white p-4 p-md-5 rounded-0 border shadow-sm" style="border-top:4px solid #3F51B5 !important;">
          <form method="POST" action="<?= BASE_URL ?>/register">
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Full Name</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-person text-muted"></i></span>
                <input type="text" name="full_name" class="form-control bg-light border-secondary border-start-0 rounded-0 ps-0 tcs-input" placeholder="John Doe" required autofocus minlength="2">
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-envelope text-muted"></i></span>
                <input type="email" name="email" class="form-control bg-light border-secondary border-start-0 rounded-0 ps-0 tcs-input" placeholder="you@domain.com" required>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Phone <span class="text-muted fw-normal text-lowercase">(optional)</span></label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-telephone text-muted"></i></span>
                <input type="tel" name="phone" class="form-control bg-light border-secondary border-start-0 rounded-0 ps-0 tcs-input" placeholder="+91 9000000000">
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Password</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-shield-lock text-muted"></i></span>
                <input type="password" name="password" id="pwd" class="form-control bg-light border-secondary border-start-0 border-end-0 rounded-0 ps-0 tcs-input" placeholder="Min 8 characters" required minlength="8">
                <button type="button" class="btn bg-light border-secondary border-start-0 text-muted rounded-0" onclick="togglePwd('pwd','eye1')">
                  <i class="bi bi-eye" id="eye1"></i>
                </button>
              </div>
            </div>

            <div class="mb-5">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 rounded-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                <input type="password" name="confirm_password" id="pwd2" class="form-control bg-light border-secondary border-start-0 border-end-0 rounded-0 ps-0 tcs-input" placeholder="Repeat password" required minlength="8">
                <button type="button" class="btn bg-light border-secondary border-start-0 text-muted rounded-0" onclick="togglePwd('pwd2','eye2')">
                  <i class="bi bi-eye" id="eye2"></i>
                </button>
              </div>
            </div>

            <button type="submit" class="btn btn-tcs-primary w-100 fw-bold py-3 text-uppercase rounded-circ" style="font-size:0.85rem; letter-spacing:1px; background:var(--tcs-black); color:#fff; border:none;">
               Create Account <i class="bi bi-person-plus ms-2 scale-hover"></i>
            </button>
          </form>
          
          <div class="mt-4 pt-4 border-top text-center" style="border-color:#eee !important;">
            <p class="text-muted mb-0 fw-medium" style="font-size:0.85rem;">
              Already have an account? <br>
              <a href="<?= BASE_URL ?>/login" class="fw-bold text-uppercase mt-2 d-inline-block tcs-hover-link" style="color:#3F51B5; font-size:0.75rem; letter-spacing:1px;">Sign In Here</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
function togglePwd(id, eyeId) {
  const inp = document.getElementById(id);
  const ico = document.getElementById(eyeId);
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
/* Utilities specifically for candidate register */
.tcs-input:focus { box-shadow: none; border-color: var(--tcs-black); }
.rounded-circ { border-radius: 50px !important; }
.scale-hover { transition: transform 0.2s; display:inline-block; }
.btn:hover .scale-hover { transform: translateX(5px); }

.tcs-hover-link { transition: color 0.3s, opacity 0.3s; text-decoration:none !important; }
.tcs-hover-link:hover { color: var(--tcs-black) !important; opacity: 1 !important; text-decoration:underline !important; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
