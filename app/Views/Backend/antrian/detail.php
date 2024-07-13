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
					<a href="#">Detail Dokter</a>
				</li>
			</ul>
		</div>
		<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Detail Dokter</div>
          </div>
          <div class="card-body">
            <table class="table table-typo">
              <tbody>
                <tr>
                  <td width="30%">
                    <p>Nama Dokter</p>
                  </td>
                  <td>
                    <p>: <?= $dokter['nama'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Jenis Kelamin</p>
                  </td>
                  <td>
                    <p>: <?= $dokter['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan" ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Alamat</p>
                  </td>
                  <td>
                    <p>: <?= $dokter['alamat']  ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Nomor Telepon</p>
                  </td>
                  <td>
                    <p>: <?= $dokter['no_telp']  ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Poli</p>
                  </td>
                  <td>
                    <p>: <?= $dokter['poli']  ?></p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-action">
            <a href="<?= base_url('adm/dokter') ?>" class="btn btn-danger">Kembali</a>
          </div>
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