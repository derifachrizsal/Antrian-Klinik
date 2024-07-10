<?= $this->include('Backend/part/header') ?>
<?= $this->include('Backend/part/top_menu') ?>
<?= $this->include('Backend/part/side_menu') ?>
<?= $this->renderSection('content') ?>


      <footer class="footer">
				<div class="container-fluid d-flex justify-content-between">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"> Help </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"> Licenses </a>
							</li>
						</ul>
					</nav>
					<div class="copyright">
						2024, made with <i class="fa fa-heart heart text-danger"></i> by
						<a href="http://www.themekita.com">ThemeKita</a>
					</div>
					<div>
						Distributed by
						<a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
					</div>
				</div>
			</footer>
		</div>

    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url('template/admin/js/core/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('template/admin/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('template/admin/js/core/bootstrap.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url('template/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- Chart JS -->
    <script src="<?= base_url('template/admin/js/plugin/chart.js/chart.min.js') ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url('template/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url('template/admin/js/plugin/chart-circle/circles.min.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('template/admin/js/plugin/datatables/datatables.min.js') ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url('template/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url('template/admin/js/plugin/jsvectormap/jsvectormap.min.js') ?>"></script>
    <script src="<?= base_url('template/admin/js/plugin/jsvectormap/world.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('template/admin/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('template/admin/js/plugin/select2/select2.full.min.js') ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?= base_url('template/admin/js/kaiadmin.min.js') ?>"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('template/admin/js/setting-demo.js') ?>"></script>
    <script src="<?= base_url('template/admin/js/demo.js') ?>"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
    <?= $this->renderSection('script') ?>
  </body>
</html>
