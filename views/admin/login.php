<?php
$pageTitle = 'Admin Login';
include __DIR__ . '/../partials/header.php';
?>

<div class="min-vh-100 d-flex align-items-center py-5 position-relative overflow-hidden" style="background:#000;">
  
  <!-- Subtle High-tech or Enterprise Pattern -->
  <div class="position-absolute bottom-0 start-50 translate-middle-x rounded-circle" style="width:800px; height:800px; background:radial-gradient(circle, rgba(63, 81, 181, 0.1) 0%, transparent 60%); pointer-events:none;"></div>
  
  <div class="container position-relative z-1">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">

        <!-- Logo & Heading -->
        <div class="text-center mb-5">
          <div class="mx-auto mb-3" style="width:60px;height:60px;background:#fff;display:flex;align-items:center;justify-content:center;font-size:1.8rem;color:var(--tcs-black);box-shadow:0 10px 25px rgba(0,0,0,0.5);"><i class="bi bi-shield-lock-fill"></i></div>
          <h2 class="font-serif fw-bolder text-white" style="font-size:2.2rem; letter-spacing:1px;">System Access</h2>
          <p class="text-white opacity-75 text-uppercase fw-bold" style="font-size:0.75rem; letter-spacing:2px;">HR Intelligence Portal</p>
        </div>

        <!-- Solid Flat Card Form (TCS aesthetic) -->
        <div class="bg-white p-4 p-md-5 rounded-0 shadow" style="border-top:4px solid #3F51B5;">
          <form method="POST" action="<?= BASE_URL ?>/admin/login">
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= e($csrf) ?>">

            <div class="mb-4">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Identifier</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 text-dark rounded-0"><i class="bi bi-person-badge"></i></span>
                <input type="text" name="username" class="form-control bg-light border-secondary border-start-0 text-dark rounded-0 ps-0 tcs-input" placeholder="Username or ID" required autofocus>
              </div>
            </div>

            <div class="mb-5">
              <label class="form-label text-muted fw-bold" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Security Key</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-secondary border-end-0 text-dark rounded-0"><i class="bi bi-key"></i></span>
                <input type="password" name="password" id="passwordInput" class="form-control bg-light border-secondary border-start-0 border-end-0 text-dark rounded-0 ps-0 tcs-input" placeholder="••••••••" required>
                <button type="button" class="btn bg-light border-secondary border-start-0 text-muted rounded-0" onclick="togglePwd()">
                  <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
              </div>
            </div>

            <button type="submit" class="btn btn-tcs-gradient w-100 fw-bold py-3 text-uppercase rounded-circ" style="font-size:0.9rem; letter-spacing:1px;">
               Authenticate <i class="bi bi-fingerprint ms-2 fs-5 align-middle"></i>
            </button>
          </form>
          
        </div>
        
        <div class="text-center mt-5 border-top border-dark pt-4">
          <a href="<?= BASE_URL ?>/" class="text-light opacity-50 text-decoration-none fw-bold text-uppercase tcs-hover-link" style="font-size:0.75rem; letter-spacing:1px;">
            <i class="bi bi-arrow-left me-1"></i> Return to Candidate Portal
          </a>
        </div>

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
/* Reset outlines */
.tcs-input:focus { box-shadow: none; border-color: inherit; }
.rounded-circ { border-radius: 50px !important; }
.tcs-hover-link { transition: color 0.3s, opacity 0.3s; }
.tcs-hover-link:hover { color: #fff !important; opacity: 1 !important; }
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>
