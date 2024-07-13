<?= $this->extend('Backend/part/layout') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">Dokter</h3>
			<ul class="breadcrumbs mb-3">
				<li class="nav-home">
					<a href="#">
						<i class="icon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="icon-arrow-right"></i>
				</li>
				<li class="nav-item">
					<a href="#">Dokter</a>
				</li>
        <li class="separator">
					<i class="icon-arrow-right"></i>
				</li>
				<li class="nav-item">
					<a href="#">Ubah Dokter</a>
				</li>
			</ul>
		</div>
		<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Ubah Data Dokter</div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <input type="hidden" name="id" value="<?= $dokter['id_dokter'] ?>" />
                  <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label" >Nama Dokter</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="inlineinput" placeholder="Masukan Nama" name="nama_dokter" value="<?= $dokter['nama'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-select" id="jk" name="jk_dokter" required>
                      <option value="">-- Pilih Jenis Kelamin --</option>
                      <option value="L" <?php if ($dokter['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki - Laki</option>
                      <option value="P" <?php if ($dokter['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="5" required><?= $dokter['alamat'] ?></textarea>
                  </div>
                  <div class="form-group form-inline">
                    <label for="no_telp" class="col-md-3 col-form-label" >Nomor Telepon</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="no_telp" placeholder="Masukan Nomor Telepon" name="np_dokter" value="<?= $dokter['no_telp'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="poli">Poli</label>
                    <select class="form-select" id="poli" name="poli_dokter" required>
                      <option value="">-- Pilih Poli --</option>
                      <?php foreach ($list_poli as $key => $value) { ?>
                        <option value="<?= $value['value'] ?>" <?php if ($value['value'] == $dokter['poli']) echo 'selected'; ?>><?= $value['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button type="submit"class="btn btn-success">Submit</button>
              <a href="<?= base_url('adm/dokter') ?>" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script>
    $(document).ready(function() {
      $('#poli, #jk').select2();
    });
  </script>
<?= $this->endSection() ?>