<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?= base_url('/') ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url('/') ?>" class="nav-item nav-link active">Home</a>
            </div>
            <?php if (session()->get('logged_in') != 1) { ?>
                <a href="<?= base_url('/login') ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
            <?php } else { ?>
                <a href="<?= base_url('/login/logout') ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
            <?php } ?>
        </div>
    </nav>
    <!-- Navbar End -->
<!-- Service Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
                <h1>Pilih Poli</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-hospital text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Poli Umum</h4>
                        <a class="btn" href="<?= base_url('/antrian/umum') ?>"><i class="fa fa-plus text-primary me-3"></i>Lihat</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Poli Gigi</h4>
                        <a class="btn" href="<?= base_url('/antrian/gigi') ?>"><i class="fa fa-plus text-primary me-3"></i>Lihat</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heart text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Poli Anak</h4>
                        <a class="btn" href="<?= base_url('/antrian/anak') ?>"><i class="fa fa-plus text-primary me-3"></i>Lihat</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-dna text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Poli Kandungan</h4>
                        <a class="btn" href="<?= base_url('/antrian/kandungan') ?>"><i class="fa fa-plus text-primary me-3"></i>Lihat</a>
                    </div>
                </div>
            </div>
            <div class="text-left mt-2">
                <a class="btn btn-primary" href="<?= base_url('/') ?>"><i class="fa fa-arrow-left text-white me-3"></i>Kembali</a>
            </div>
        </div>
    </div>
    <!-- Service End -->