<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if (!$_SESSION['user_name']) {
	header("location:welcome");
}
$role_id = $_SESSION['role_id'];
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Sparrow's Sprout </title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/HTML/dist/assets/images/brand-logos/logo.png' ?>">

	<!-- Choices JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/choices.js/public/assets/scripts/choices.min.js' ?>"></script>

	<!-- Main Theme Js -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/main.js' ?>"></script>

	<!-- Bootstrap Css -->
	<link id="style" rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/bootstrap/css/bootstrap.min.css' ?>">

	<!-- Style Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/css/styles.min.css' ?>">

	<!-- Icons Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/css/icons.css' ?>">

	<!-- Node Waves Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/node-waves/waves.min.css' ?>">

	<!-- Simplebar Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/simplebar/simplebar.min.css' ?>">

	<!-- Color Picker Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/flatpickr/flatpickr.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/@simonwep/pickr/themes/nano.min.css' ?>">

	<!-- Choices Css -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/choices.js/public/assets/styles/choices.min.css' ?>">

	<!-- Jsvector Maps -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/jsvectormap/css/jsvectormap.min.css' ?>">

</head>

<body>

	<!-- Loader -->
	<div id="loader">
		<img alt="" src="<?php echo base_url() . 'assets/HTML/dist/assets/images/media/loader.svg' ?>">
	</div>
	<!-- Loader -->

	<div class="page">
		<!-- app-header -->
		<?php $this->load->view('header'); ?>
		<!-- /app-header -->

		<!-- Start::app-sidebar -->
		<?php $this->load->view('side_bar'); ?>
		<!-- End::app-sidebar -->

		<!-- Start::app-content -->
		<div class="main-content app-content">
			<div class="container-fluid">
				<!-- Page Header -->
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
					<div>
						<h4 class="mb-0">Hi, welcome back!<br> <?php echo $user_name; ?></h4>
						<p class="mb-0 text-muted">Performance at a Glance.</p>
					</div>
					<div class="main-dashboard-header-right">

						<div>
						<?php 
								// echo'<pre>';
								// foreach ($month_array as $key => $value) {
								// 	# code...
								// 	print_r($value);
								// 	echo "<br>";
								// 	echo $key;
								// 	echo "<br> X2";
								// 	// die();
								// 	// foreach ($month_array as $key => $value) {
								// 	}
										?>
					
						</div>
						<div class="mb-xl-0">

							<p class="mb-0 text-muted">Select Month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
							<select class="form-select" style="background-color: transparent;" data-trigger id="month" name="month" required>
								<?php 
								
								foreach ($month_array as $key => $value) {
								?>
								 	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
								 <?php } ?>
							
							</select>
						</div>
					</div>
				</div>
				<!-- End Page Header -->
				<div class="row">
                	<div class="card top-countries-card">
						<div class="card-header p-0">
							<center>
								<h6 class="card-title fs-13 mb-2">ECS Dashboard</h6>
							</center>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
				<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Participants</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="hours" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_participants; ?></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">Active Participants</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-up text-fixed-white"></i>
											<!-- <span class="text-fixed-white op-7">-23.09%</span> -->

										</span>
									</div>
								</div>
							</div>
							<div id="compositeline"></div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Hours</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="hours" class="fs-20 fw-bold mb-1 text-fixed-white"></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Hrs.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">No.Of Hours Worked</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-up text-fixed-white"></i>
											<span  class="text-fixed-white op-7">-23.09%</span>
											
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline"></div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Facilitations</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="facilitations" class="fs-20 fw-bold mb-1 text-fixed-white"></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">Individual Training Facilitated</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-down text-fixed-white"></i>
											<span class="text-fixed-white op-7"> -23.09%</span>
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline2"></div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">RM Reviews</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="reviews" class="fs-20 fw-bold mb-1 text-fixed-white"></span>
											<span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">RM Review Meetings Conducted</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-up text-fixed-white"></i>
											<span class="text-fixed-white op-7"> 52.09%</span>
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline3"></div>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Participants</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">Active Count till this Month</span>
							</div>
							<div class="list-group border">

								<?php foreach ($coaching_program_wise_participant_list as $level_participant) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $level_participant->coaching_program_name; ?></p><span><?php echo $level_participant->count; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">NCA</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<h4 class="fs-20 fw-bold mb-1 text-fixed-white">?? Nos</h4>
											<p class="mb-0 fs-12 text-fixed-white op-7">New Clients Participation</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-down text-fixed-white"></i>
											<span class="text-fixed-white op-7"> -152.3</span>
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline4"></div>
						</div>
					</div>

				</div>

				<?php

				// echo'<pre>';
				// print_r($month_array['10-2024']);
				// // die();

				?>
				<!-- row closed -->

			</div>
		</div>
		<!-- End::app-content -->

		<!-- Footer Start -->
		<?php $this->load->view('footer'); ?>
		<!-- Footer End -->
	</div>


	<!-- Scroll To Top -->
	<div class="scrollToTop">
		<span class="arrow"><i class="las la-angle-double-up"></i></span>
	</div>
	<div id="responsive-overlay"></div>
	<!-- Scroll To Top -->

	<!-- Popper JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/@popperjs/core/umd/popper.min.js' ?>"></script>

	<!-- Bootstrap JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

	<!-- Defaultmenu JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/defaultmenu.min.js' ?>"></script>

	<!-- Node Waves JS-->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/node-waves/waves.min.js' ?>"></script>

	<!-- Sticky JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/sticky.js' ?>"></script>

	<!-- Simplebar JS -->
	<!-- <script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/simplebar/simplebar.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/simplebar.js' ?>"></script> -->

	<!-- Color Picker JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/@simonwep/pickr/pickr.es5.min.js' ?>"></script>


	<!-- Apex Charts JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/apexcharts/apexcharts.min.js' ?>"></script>

	<!-- JSVector Maps JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/jsvectormap/js/jsvectormap.min.js' ?>"></script>

	<!-- JSVector Maps MapsJS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/jsvectormap/maps/world-merc.js' ?>"></script>
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/us-merc-en.js' ?>"></script>

	<!-- Chartjs Chart JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/index.js' ?>"></script>


	<!-- Custom-Switcher JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/custom-switcher.min.js' ?>"></script>
	<!-- Custom JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/custom.js' ?>"></script>


	<!-- Jquery Cdn -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

	<!-- Select2 Cdn -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- Internal Select-2.js -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/select2.js' ?>"></script>

	<!-- Datatables Cdn -->
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function() {
			var month = $('#month').val();
			
			get_hours(month);
				get_facilitations(month);
				get_reviews(month);

			
			$('#month').on('change',function() {
				var month = $(this).val();

				get_hours(month);
				get_facilitations(month);
				get_reviews(month);
			});

			//get monthly hours 
			function get_hours(month) {

				$.ajax({
					url: "<?php echo site_url('dashboard/get_monthly_hours'); ?>",
					method: "POST",
					data: {
						month: month
					},
					async: true,
					dataType: 'json',
					success: function(data) {
												
						$('#hours').text(data);
					}
				});
				return false;

			}

			//get monthly facilitations 
			function get_facilitations(month) {

				$.ajax({
					url: "<?php echo site_url('dashboard/get_monthly_facilitations'); ?>",
					method: "POST",
					data: {
						month: month
					},
					async: true,
					dataType: 'json',
					success: function(data) {
												
						$('#facilitations').text(data);
					}
				});
				return false;

			}

			//get monthly reviews 
			function get_reviews(month) {

				$.ajax({
					url: "<?php echo site_url('dashboard/get_monthly_reviews'); ?>",
					method: "POST",
					data: {
						month: month
					},
					async: true,
					dataType: 'json',
					success: function(data) {
												
						$('#reviews').text(data);
					}
				});
				return false;

			}


			});

	
	</script>



</body>

</html>
