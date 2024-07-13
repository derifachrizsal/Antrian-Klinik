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


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Jadwal Dokter</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_kandung1.png" src="<?= base_url('template/img/dr_kandung1.png')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr. Hoo Yumilia,SP.OG</h5>
                            <p class="text-primary">Poli Kebidanan & Kandungan</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Senin-Kamis</p>
                            <div class="team-social text-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_kandung2.webp" src="<?= base_url('template/img/dr_kandung2.webp')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr. Elise Johana Knoch, Sp.OG</h5>
                            <p class="text-primary">Poli Kebidanan & Kandungan</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Jumat-Sabtu</p>
                            <div class="team-social text-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_umum1.webp" src="<?= base_url('template/img/dr_umum1.webp')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr. Tono Djuwantono, Sp.PD</h5>
                            <p class="text-primary">Poli Umum</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Senin-Rabu</p>
                            <div class="team-social text-center">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_umum2.webp" src="<?= base_url('template/img/dr_umum2.webp')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr. Djonggi P Panggabean, Sp.PD</h5>
                            <p class="text-primary">Poli Umum</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Kamis-Sabtu</p>
                            <div class="team-social text-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_anak.webp" src="<?= base_url('template/img/dr_anak.webp')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr. Maximus Mudjur, Sp.A,M.Kes</h5>
                            <p class="text-primary">Poli Anak</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Senin-Sabtu</p>
                            <div class="team-social text-center">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="dr_gigi.jpg" src="<?= base_url('template/img/dr_gigi.jpg')?>" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>dr.Nana Agustina,Sp.KG</h5>
                            <p class="text-primary">Poli Gigi</p>
                            <p class="d-inline-block border rounded-pill py-1 px-4">Senin-Jumat</p>
                            <div class="team-social text-center">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->