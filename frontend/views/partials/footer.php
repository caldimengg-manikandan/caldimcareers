<?php
/**
 * Global Footer Partial - TCS Style Replica
 * Caldim Engineering Careers Portal
 */
?>
</main>

<footer class="mt-auto" style="background:#0b1120; padding:4rem 0 2rem 0; color:#fff; font-family:'Montserrat', sans-serif;">
  <div class="container-fluid px-4 px-lg-5">
    
    <!-- Top Decorative Line -->
    <div style="width:100px; height:2px; background:var(--tcs-gradient); margin-bottom:3rem;"></div>
    
    <div class="row g-4 mb-5">
      
      <!-- Brand Space -->
      <div class="col-lg-3 pe-lg-5 mb-4 mb-lg-0">
        <a href="<?= BASE_URL ?>" class="text-decoration-none d-block mb-3 text-white">
          <span class="navbar-brand-logo fw-bold fs-3">Caldim</span>
        </a>
        <p class="text-light opacity-75 mt-4" style="font-size:0.9rem; line-height:1.6; font-weight:300;">
          Building on belief. An open roadmap to engineer the future of smart infrastructure and reliable software. 
        </p>
      </div>

      <!-- Links 1 -->
      <div class="col-6 col-lg-2">
        <h6 class="text-white font-serif fw-bold mb-4" style="font-size:1.1rem;">Careers</h6>
        <ul class="list-unstyled d-flex flex-column gap-3 mb-0" style="font-size:0.85rem; font-weight:400;">
          <li><a href="<?= BASE_URL ?>/jobs" class="text-light text-decoration-none tcs-hover-link opacity-75">India Careers</a></li>
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Global Roles</a></li>
          <li><a href="<?= BASE_URL ?>/jobs?department=1" class="text-light text-decoration-none tcs-hover-link opacity-75">Technology</a></li>
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Business Operations</a></li>
          <li><a href="<?= BASE_URL ?>/jobs?type=internship" class="text-light text-decoration-none tcs-hover-link opacity-75">Entry Level & Campus</a></li>
        </ul>
      </div>

      <!-- Links 2 -->
      <div class="col-6 col-lg-2">
        <h6 class="text-white font-serif fw-bold mb-4" style="font-size:1.1rem;">Discover</h6>
        <ul class="list-unstyled d-flex flex-column gap-3 mb-0" style="font-size:0.85rem; font-weight:400;">
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Who We Are</a></li>
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Diversity & Inclusion</a></li>
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Corporate Sustainability</a></li>
          <li><a href="#" class="text-light text-decoration-none tcs-hover-link opacity-75">Innovations</a></li>
        </ul>
      </div>

      <!-- Contact & Social -->
      <div class="col-lg-5 d-flex flex-column justify-content-lg-end align-items-lg-end text-lg-end mt-5 mt-lg-0">
        <h6 class="text-white font-serif fw-bold mb-4" style="font-size:1.1rem;">Follow Us</h6>
        <div class="d-flex gap-4 justify-content-lg-end mb-4 flex-wrap">
          <a href="#" class="text-white fs-4 tcs-social-icon opacity-75"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="text-white fs-4 tcs-social-icon opacity-75"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="text-white fs-4 tcs-social-icon opacity-75"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white fs-4 tcs-social-icon opacity-75"><i class="bi bi-youtube"></i></a>
          <a href="#" class="text-white fs-4 tcs-social-icon opacity-75"><i class="bi bi-instagram"></i></a>
        </div>
      </div>

    </div>

    <!-- Copyright Bar -->
    <div class="pt-4 border-top d-flex flex-column flex-md-row justify-content-between align-items-center" style="border-color:#333 !important;">
      <p class="mb-3 mb-md-0 opacity-50 fw-light" style="font-size:0.75rem; letter-spacing:0.5px;">
        &copy; <?= date('Y') ?> Caldim Engineering Consultancy Services. All Rights Reserved.
      </p>
      <div class="d-flex flex-wrap gap-4 opacity-75 fw-medium" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">
         <a href="#" class="text-light text-decoration-none tcs-hover-link">Privacy Info</a>
         <a href="#" class="text-light text-decoration-none tcs-hover-link">Disclaimer</a>
         <a href="#" class="text-light text-decoration-none tcs-hover-link">Security Policies</a>
         <a href="#" class="text-light text-decoration-none tcs-hover-link">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>

<style>
.tcs-hover-link { transition: color 0.3s, opacity 0.3s; }
.tcs-hover-link:hover { color: #E91E63 !important; opacity: 1; }

.tcs-social-icon { transition: transform 0.3s, opacity 0.3s; display:inline-block; }
.tcs-social-icon:hover { opacity: 1 !important; transform: translateY(-3px); color:#8a8a8a !important; }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });
</script>

</body>
</html>
