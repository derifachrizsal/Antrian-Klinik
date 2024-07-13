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

    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <form action="<?= base_url('/daftar/daftarpasien') ?>" method="post">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>
                    <h1 class="mb-4">Mohon Pilih Pasien yang akan Mendaftar</h1>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-id-card text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <div class="col-12 col-sm-12">
                                <select name="id_pasien" class="form-select border-0" style="height: 55px;">
                                    <option value="">Pilih Pasien</option>
                                    <?php foreach ($pasien as $key => $pasienlist) { ?>
                                        <option value="<?= $pasienlist['id_pasien'] ?>"><?= $pasienlist['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <select id="poli" name="poli" class="form-select border-0" style="height: 55px;">
                                    <option value="">-- Pilih Poli --</option>
                                    <?php foreach ($list_poli as $key => $value) { ?>
                                        <option value='<?= $value['value'] ?>'><?= $value['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12">
                                <select id="dokter" name="id_dokter" class="form-select border-0" style="height: 55px;">
                                    <option selected>-- Pilih Dokter --</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" id="tanggal" name="tanggal" class="form-control border-0 datetimepicker-input" placeholder="Pilih Tanggal" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <textarea class="form-control border-0" rows="5" placeholder="Describe your problem"></textarea>
                            </div> -->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Appointment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Appointment End -->
 
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