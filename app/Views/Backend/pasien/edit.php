<?= $this->extend('Backend/part/layout') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">Pasien</h3>
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
					<a href="#">Pasien</a>
				</li>
        <li class="separator">
					<i class="icon-arrow-right"></i>
				</li>
				<li class="nav-item">
					<a href="#">Ubah Pasien</a>
				</li>
			</ul>
		</div>
		<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Ubah Data Pasien</div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <input type="hidden" name="id" value="<?= $pasien['id_pasien'] ?>" />
                  <div class="form-group form-inline">
                    <label for="nama" class="col-md-3 col-form-label" >Nama Pasien</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="nama" placeholder="Masukan Nama" name="nama" value="<?= $pasien['nama'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-select" id="jk" name="jeniskelamin" required>
                      <option value="">-- Pilih Jenis Kelamin --</option>
                      <option value="L" <?php if ($pasien['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki - Laki</option>
                      <option value="P" <?php if ($pasien['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group form-inline">
                    <label for="tempatlahir" class="col-md-3 col-form-label" >Tempat Lahir</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="tempatlahir" placeholder="Masukan Tempat Lahir" name="Tempatlahir" value="<?= $pasien['tempat_lahir'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="tanggallahir" class="col-md-3 col-form-label" >Tanggal Lahir</label>
                    <div class="col-md-12 p-0">
                      <input type="date" class="form-control input-full" id="tanggallahir" placeholder="Masukan tanggal Lahir" name="tanggallahir" value="<?= $pasien['tanggal_lahir'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="goldar">Golongan Darah</label>
                    <select class="form-select" id="goldar" name="goldar" required>
                      <option value="">-- Pilih Golongan Darah --</option>
                      <option value="A" <?php if ($pasien['gol_darah'] == 'A') echo 'selected'; ?>>A</option>
                      <option value="B" <?php if ($pasien['gol_darah'] == 'B') echo 'selected'; ?>>B</option>
                      <option value="AB" <?php if ($pasien['gol_darah'] == 'AB') echo 'selected'; ?>>AB</option>
                      <option value="O" <?php if ($pasien['gol_darah'] == 'O') echo 'selected'; ?>>O</option>
                      <option value="Tidak Tahu" <?php if ($pasien['gol_darah'] == 'Tidak Tahu') echo 'selected'; ?>>Tidak Tahu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamatlengkap" rows="5" required><?= $pasien['alamat_lengkap'] ?></textarea>
                  </div>
                  <div class="form-group form-inline">
                    <label for="kelurahan" class="col-md-3 col-form-label" >Kelurahan</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="kelurahan" placeholder="Masukan kelurahan" name="kelurahan" value="<?= $pasien['kelurahan'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="kecamatan" class="col-md-3 col-form-label" >Kecamatan</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="kecamatan" placeholder="Masukan kecamatan" name="kecamatan" value="<?= $pasien['kecamatan'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="kodepos" class="col-md-3 col-form-label" >Kode Pos</label>
                    <div class="col-md-12 p-0">
                      <input type="number" class="form-control input-full" id="kodepos" placeholder="Masukan Kode Pos" name="kodepos" value="<?= $pasien['kode_pos'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="notelp" class="col-md-3 col-form-label" >No Telp</label>
                    <div class="col-md-12 p-0">
                      <input type="number" class="form-control input-full" id="notelp" placeholder="Masukan No Telp" name="notelp" value="<?= $pasien['no_telp'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="email" class="col-md-3 col-form-label" >Email</label>
                    <div class="col-md-12 p-0">
                      <input type="email" class="form-control input-full" id="email" placeholder="Masukan Email" name="email" value="<?= $pasien['email'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pendidikanterakhir">Pendidikan Terakhir</label>
                    <select class="form-select" id="pendidikanterakhir" name="pendidikanterakhir" required>
                      <option value="">-- Pilih Pendidikan Terakhir --</option>
                      <option value="Tidak/Belum Sekolah" <?php if ($pasien['pendidikan_terakhir'] == 'Tidak/Belum Sekolah') echo 'selected'; ?>>Tidak/Belum Sekolah</option>
                      <option value="SD" <?php if ($pasien['pendidikan_terakhir'] == 'SD') echo 'selected'; ?>>SD</option>
                      <option value="SMP" <?php if ($pasien['pendidikan_terakhir'] == 'SMP') echo 'selected'; ?>>SMP</option>
                      <option value="SMA" <?php if ($pasien['pendidikan_terakhir'] == 'SMA') echo 'selected'; ?>>SMA</option>
                      <option value="Diploma I/III" <?php if ($pasien['pendidikan_terakhir'] == 'Diploma I/III') echo 'selected'; ?>>Diploma I/III</option>
                      <option value="S-1" <?php if ($pasien['pendidikan_terakhir'] == 'S-1') echo 'selected'; ?>>S-1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                      <option value="">-- Pilih Pekerjaan --</option>
                      <option value="Karyawan Swasta" <?php if ($pasien['pekerjaan'] == 'Karyawan Swasta') echo 'selected'; ?>>Karyawan Swasta</option>
                      <option value="Wirausaha" <?php if ($pasien['pekerjaan'] == 'Wirausaha') echo 'selected'; ?>>Wirausaha</option>
                      <option value="Mahasiswa/Siswa" <?php if ($pasien['pekerjaan'] == 'Mahasiswa/Siswa') echo 'selected'; ?>>Mahasiswa/Siswa</option>
                    </select>
                  </div>
                  <div class="form-group form-inline">
                    <label for="NIK" class="col-md-3 col-form-label" >NIK</label>
                    <div class="col-md-12 p-0">
                      <input type="number" class="form-control input-full" id="NIK" placeholder="Masukan NIK" name="NIK" value="<?= $pasien['nik'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="nobpjs" class="col-md-3 col-form-label" >Nomor BPJS</label>
                    <div class="col-md-12 p-0">
                      <input type="number" class="form-control input-full" id="nobpjs" placeholder="Masukan Nomor BPJS" name="nobpjs" value="<?= $pasien['no_bpjs'] ?>" required />
                    </div>
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