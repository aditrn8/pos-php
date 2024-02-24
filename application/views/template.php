<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/animate/animate.min.css" rel="stylesheet" />

	<link href="<?php echo base_url(); ?>new_assets/css/default/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url(); ?>new_assets/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print' />
	<link href="<?php echo base_url(); ?>new_assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url(); ?>new_assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>new_assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />

	<link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>new_assets/css/transaction-style.css" rel="stylesheet">

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url(); ?>new_assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
		var baseurl = "<?php echo base_url("kandidat / list_kandidat / "); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
	</script>
	<!-- <script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> -->
	<!-- <script src="<?php echo base_url("js/config.js"); ?>"></script> -->
	<script src="<?php echo base_url("new_assets/highchart/highcharts.js"); ?>"></script>
	<script src="<?php echo base_url("new_assets/highchart/modules/exporting.js"); ?>"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/jquery/jquery-3.3.1.min.js"></script>
	<!-- Load file process.js -->

</head>

<body>

	<?php $this->load->view('template/header'); ?>

	<!-- begin #sidebar -->
	<div id="sidebar" class="sidebar">
		<!-- begin sidebar scrollbar -->
		<div data-scrollbar="true" data-height="100%">
			<!-- begin sidebar user -->
			<!-- end sidebar user -->

			<?php $this->load->view('template/menu'); ?>

		</div>
		<!-- end sidebar scrollbar -->
	</div>
	<div class="sidebar-bg"></div>
	<!-- end #sidebar -->

	<!-- begin #content -->
	<div id="content" class="content">
		<?php echo $contents; ?>
	</div>
	<!-- end #content -->

	<!-- begin scroll to top btn -->
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url(); ?>new_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
        <script src="../assets/crossbrowserjs/html5shiv.js"></script>
        <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
		<![endif]-->
	<script src="<?php echo base_url(); ?>new_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/js/theme/default.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url(); ?>new_assets/plugins/fullcalendar/lib/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/fullcalendar/fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/js/demo/calendar.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url(); ?>new_assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-daterangepicker/moment.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

	<script src="<?php echo base_url(); ?>new_assets/js/demo/table-manage-default.demo.min.js"></script>

	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS FORM PLUGIN ================== -->
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
	<script src="<?php echo base_url(); ?>new_assets/plugins/clipboard/clipboard.min.js"></script>

	<script src="<?php echo base_url(); ?>new_assets/js/cuti-index.js"></script>

	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

	<!--<script src="<?php echo base_url(); ?>new_assets/js/demo/form-plugins.demo.min.js"></script>-->
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			Calendar.init();
			TableManageDefault.init();

		});

		$("#datepicker-autoClose").datepicker({
			todayHighlight: !0,
			autoclose: !0,
			format: 'yyyy-mm-dd',
		})
		$("#datepicker-autoClose2").datepicker({
			todayHighlight: !0,
			autoclose: !0,
			format: 'yyyy-mm-dd',
		})

		var handleDataTableDefault = function() {
			"use strict";

			if ($('#data-table-default').length !== 0) {
				$('#data-table-default').DataTable({
					responsive: true
				});
			}

			if ($('#data-table-default2').length !== 0) {
				$('#data-table-default2').DataTable({
					responsive: true
				});
			}

			if ($('#data-table-default1').length !== 0) {
				$('#data-table-default1').DataTable({
					responsive: true,
					searching: false,
					paging: false,
					ordering: false
				});
			}
		};



		var TableManageDefault = function() {
			"use strict";
			return {
				//main function
				init: function() {
					handleDataTableDefault();
				}
			};
		}();
	</script>

	<script>
		$(function() {
			$("#datepicker").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
	</script>
	<script>
		$(function() {
			$("#datepicker2").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
		$(function() {
			$("#datepicker3").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
		$(function() {
			$("#datepicker4").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});

		$(function() {
			var dateLembur =
				$("#dpLembur").datepicker({
					format: 'yyyy-mm-dd',
					autoclose: true,
					todayHighlight: true,
					startDate: '-7d',
					// endDate: 'today',
					setDate: 'today'
				});
		});

		$(function() {
			var dateShifting =
				$("#dpShifting").datepicker({
					format: 'yyyy-mm-dd',
					autoclose: true,
					todayHighlight: true,
					// endDate: 'today',
					setDate: 'today'
				});
		});

		$(function() {
			$("#leave_periode").daterangepicker({
				minDate: new Date(),
				format: 'yyyy-mm-dd',
				autoclose: true
			});

			$("#leave_periode_update").daterangepicker({
				startDate: $('#lvStart').val(),
				endDate: $('#lvEnd').val(),
				minDate: new Date(),
				autoclose: true
			});
		});
	</script>







</body>

</html>