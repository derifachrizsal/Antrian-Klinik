<?= $this->extend('Frontend/part/layout') ?>

<?= $this->section('content') ?>
    
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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">ANTREAN ANDA BERHASIL</p>
            </div>
            <div class="text-center mx-auto mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">POLI UMUM</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-9 col-md-9 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <h4 class="mb-3 text-center">Nomor Antrian Anda</h4>
                        <h1 class="mb-3 text-center" style="font-size: 6rem"><?= $nomor ?></h1>
                        <table class="col-12 text-center">
                            <tr style="border-bottom: 1px solid black;">
                                <td style="border-right: 1px solid black;"><p>Nama Pasien</p></td>
                                <td><p>Nama Dokter</p></td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid black;"><p class="mt-4"><?= $pasien_terdaftar['nama'] ?></p></td>
                                <td><p class="mt-4"><?= $dokter_terdaftar['nama'] ?></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5" style="align-items: center;">
                        <h4 class="mb-3 text-center">Total Antrian</h4>
                        <h2 class="mb-3 text-center" style="font-size: 3rem"><?= $nomor_saat_ini ?> / <?= $nomor ?> Antrean</h2>
                    </div>
                </div>
            </div>
            <div class="text-left mt-2">
                <a class="btn btn-primary" href="<?= base_url('/poli') ?>"><i class="fa fa-arrow-left text-white me-3"></i>Kembali</a>
            </div>
        </div>
    </div>
 
 <?= $this->endSection() ?>

 <?= $this->section('script') ?>

    <script>
        $(document).ready(function() {
            $('#tanggal').datetimepicker();
        })

        $('#poli').on("change", function() {
            if (this.value == ""){
                this.value = "umum"
            }

            $.ajax({
                type: "GET",
                url: "<?= base_url('/daftar/getDokter/') ?>" + this.value,
                dataType: "json",
                success: function(response) {
                    if (response.status == "success")
                    {
                        html = "<option value=\"\">-- Pilih Dokter --</option>";
                        response.data.forEach(dokter => {
                            html += "<option value=\""+dokter.id_dokter+"\">"+dokter.nama+"</option>"
                        });
                        $('#dokter').html(html);   
                    }
                    else
                    {
                        swal({
                            title: "Gagal",
                            text: response.message,
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: "btn btn-danger",
                                },
                            },
                        });
                    }
                }
            });
        })
    </script>

 <?= $this->endSection() ?>