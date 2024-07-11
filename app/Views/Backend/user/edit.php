<?= $this->extend('Backend/part/layout') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">User</h3>
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
					<a href="#">User</a>
				</li>
        <li class="separator">
					<i class="icon-arrow-right"></i>
				</li>
				<li class="nav-item">
					<a href="#">Ubah User</a>
				</li>
			</ul>
		</div>
		<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Ubah Data User</div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <input type="hidden" name="id" value="<?= $user['id_user'] ?>" />
                  <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label" >Nama user</label>
                    <div class="col-md-12 p-0">
                      <input type="text" class="form-control input-full" id="inlineinput" placeholder="Masukan Nama" name="username" value="<?= $user['username'] ?>" required />
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label" >Password</label>
                    <div class="col-md-12 p-0">
                      <input type="password" class="form-control input-full" id="inlineinput" placeholder="Masukan Password" name="password" value="<?= $user['password'] ?>" required />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button type="submit"class="btn btn-success">Submit</button>
              <a href="<?= base_url('adm/user') ?>" class="btn btn-danger">Cancel</a>
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