<?= $this->extend('Backend/part/layout') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">Antrian</h3>
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
					<a href="#">Antrian</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">List Antrian</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>No </th>
										<th>Nama Pasien</th>
										<th>Nama Dokter</th>
										<th>Nomor Antrian</th>
										<th style="width: 10%">Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No </th>
										<th>Nama Pasien</th>
										<th>Nama Dokter</th>
										<th>Nomor Antrian</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
								<tbody>
								<?php foreach($antrian as $index => $antrianlist): ?>
									<tr>
										<td><?= $index += 1 ?>.</td>
										<td><?= $antrianlist['nama_pasien'] ?></td>
										<td><?= $antrianlist['nama_dokter'] ?></td>
										<td><?= $antrianlist['no_antrian'] ?></td>
										<td>
											<div class="form-button-action">
												<a href="<?= base_url('adm/antrian/'.$antrianlist['id_antrian'].'/approve') ?>" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Approve antrian">
													<i class="fa fa-check"></i>
												</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>

    $(document).ready(function () {
		// SweetAlert2Demo.init();
		$("#basic-datatables").DataTable({});

		$("#multi-filter-select").DataTable({
			pageLength: 5,
			initComplete: function () {
			this.api()
				.columns()
				.every(function () {
				var column = this;
				var select = $(
					'<select class="form-select"><option value=""></option></select>'
				)
					.appendTo($(column.footer()).empty())
					.on("change", function () {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());

					column
						.search(val ? "^" + val + "$" : "", true, false)
						.draw();
					});

				column
					.data()
					.unique()
					.sort()
					.each(function (d, j) {
					select.append(
						'<option value="' + d + '">' + d + "</option>"
					);
					});
				});
			},
		});

		// Add Row
		$("#add-row").DataTable({
			pageLength: 5,
		});

		var action =
			'<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$(".delete_button").click(function (e) {
			var href = $(this).attr("data-href")
			swal({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				type: "warning",
				buttons: {
					confirm: {
						text: "Yes, delete it!",
						className: "btn btn-success",
					},
					cancel: {
						visible: true,
						className: "btn btn-danger",
					},
				},
			}).then((Delete) => {
				if (Delete) {
					$.ajax({
						type: "GET",
						url: href,
						dataType: "json",
						success: function(response) {
							if (response.status == "success")
							{
								swal({
									title: "Berhasil",
									text: response.message,
									type: "success",
									icon: "success",
									buttons: {
										confirm: {
											className: "btn btn-success",
										},
									},
								}).then(function () {
									window.location.reload();
								});
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
				} else {
					swal.close();
				}
			});
		});
    });
</script>
<?= $this->endSection() ?>