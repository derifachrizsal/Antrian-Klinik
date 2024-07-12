<?= $this->include('Frontend/part/header') ?>
<?= $this->renderSection('content') ?>

      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
        </div> 
      </div>
      <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/lib/wow/wow.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/counterup/counterup.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/tempusdominus/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
    <script src="<?= base_url('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/js/main.js') ?>"></script>
    <?= $this->renderSection('script') ?>
</body>

</html>