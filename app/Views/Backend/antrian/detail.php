<?= $this->extend('Backend/part/layout') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">Antrean</h3>
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
					<a href="#">Antrean</a>
				</li>
        <li class="separator">
					<i class="icon-arrow-right"></i>
				</li>
				<li class="nav-item">
					<a href="#">Detail Antrean</a>
				</li>
			</ul>
		</div>
		<div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Detail Antrean</div>
          </div>
          <div class="card-body">
            <table class="table table-typo">
              <tbody>
                <tr>
                  <td width="30%">
                    <p>Poli</p>
                  </td>
                  <td>
                    <p>: <?= ucfirst($antrian['poli']) ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Nomor Antrean</p>
                  </td>
                  <td>
                    <p>: <?= $antrian['no_antrian'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Tanggal Pendaftaran</p>
                  </td>
                  <td>
                    <p>: <?= $antrian['tanggal_pendaftaran'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Status Antrean</p>
                  </td>
                  <td>
                    <p>: <?= $antrian['status_antrian'] == 0 ? "<span class='badge bg-secondary'>Telah Ditangani" : "<span class='badge bg-danger'>Belum Ditangani" ?></span></p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
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
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Detail Pasien</div>
          </div>
          <div class="card-body">
            <table class="table table-typo">
              <tbody>
              <tr>
                  <td width="30%">
                    <p>Nama Pasien</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['nama'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Jenis Kelamin</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan" ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Tempat Lahir</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['tempat_lahir'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Tanggal Lahir</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['tanggal_lahir'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Golongan Darah</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['gol_darah'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Alamat Lengkap</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['alamat_lengkap'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Kelurahan</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['kelurahan'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Kecamatan</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['kecamatan'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Kode Pos</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['kode_pos'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Email</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['email'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Pendidikan Terakhir</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['pendidikan_terakhir'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Pekerjaan</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['pekerjaan'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>NIK</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['nik'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Nomor BPJS</p>
                  </td>
                  <td>
                    <p>: <?= $pasien['no_bpjs'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Pasien dari User</p>
                  </td>
                  <td>
                    <p>: <?= !empty($user) ? $user['username'] : "-" ?></p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-action">
            <a href="<?= base_url('adm/antrian') ?>" class="btn btn-danger">Kembali</a>
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