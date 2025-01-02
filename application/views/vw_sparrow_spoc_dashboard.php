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
									<option value="<?php echo $key; ?>" <?php echo ($key == $month) ? "selected" : ""; ?>><?php echo $value; ?></option>
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
					<div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Batches</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="facilitations" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_batches; ?></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">LSDP+SSDP Online+Offline (Current Status)</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-down text-fixed-white"></i>
											<!-- <span class="text-fixed-white op-7"> -23.09%</span> -->
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline2"></div>
						</div>
					</div>
			
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Re-Newals</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="reviews" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_renewals; ?></span>
											<span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">Current Status (LSDP+SSDP Session > 2)</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-down text-fixed-white"></i>
											<span class="text-fixed-white op-7"></span>
										</span>
									</div>
								</div>
							</div>
							<div id="compositeline4"></div>
						</div>
					</div>

				</div>


				<!-- row opened -->
				<div class="row">
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
					<!-- Facilitation  -->
					<div class="col-md-12 col-lg-6 col-xl-6">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Batch Distribution</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">LSDP | SSDP | Online | Offline</span>
							</div>
							<div class="list-group border">
							<table class="table text-nowrap" >
								<thead">
									<tr>
										<th scope="col">Session Type</th>
										<th scope="col" style="text-align: center;">Online</th>
										<th scope="col" style="text-align: center;">Offline</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$lsdp_total = 0;
									$ssdp_total = 0;
								//LSDP Online
									if(isset($batch_summary[1]['Online'])){

										$lsdp_online = $batch_summary[1]['Online'];
									}else{
										$lsdp_online = 0;
									}
								//LSDP Offline
									if(isset($batch_summary[1]['Offline'])){

										$lsdp_offline = $batch_summary[1]['Offline'];
									}else{
										$lsdp_offline = 0;
									}
								//SSDP Online
									if(isset($batch_summary[2]['Online'])){

										$ssdp_online = $batch_summary[2]['Online'];
									}else{
										$ssdp_online = 0;
									}
								//SSDP Offline
									if(isset($batch_summary[2]['Offline'])){

										$ssdp_offline = $batch_summary[2]['Offline'];
									}else{
										$ssdp_offline = 0;
									}
									?>
								
									<tr>
										<th scope="row">LSDP</th>
										<td style="text-align: center;">
											<?php echo $lsdp_online; ?>
										 </td>
										<td style="text-align: center;">
										<?php echo $lsdp_offline; ?>
										<td>
										<?php echo $lsdp_online+$lsdp_offline; ?>
										</td>
										</td>

									</tr>
									<tr>
										<th scope="row">SSDP</th>
										<td style="text-align: center;">
											<?php echo $ssdp_online; ?>
										 </td>
										<td style="text-align: center;">
										<?php echo $ssdp_offline; ?>
										<td>
										<?php echo $ssdp_online+$ssdp_offline; ?>
										</td>
									</tr>

								
									<tr>
										<td><strong>Total</strong></td>
										<td style="text-align: center;">
											<?php echo $lsdp_online+$ssdp_online; ?>
										 </td>
										<td style="text-align: center;">
										<?php echo $lsdp_offline+$ssdp_offline; ?>
										<td>
										<?php echo $ssdp_online+$ssdp_offline+$lsdp_online+$lsdp_offline; ?>
										</td>
									</tr>
									
								</tbody>
							</table>

							</div>
						</div>
					</div>
			
					<!-- NCA Conversions  -->
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Re-Newals</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">SPOC Wise Count</span>
							</div>
							<div class="list-group border">

								<?php foreach ($renewal_summary as $key => $renewal) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $key; ?></p><span><?php echo $renewal; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>

				</div>
				<!-- /row -->

				<div class="card top-countries-card" >
				<div class="card-header p-0">

								<center>
									<h6 class="card-title fs-13 mb-2">NCA Monitoring</h6>

								</center>
								
							</div>

				</div>

			

				<!-- NCA section -->

				
				<!-- row -->
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Workshops</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="hours" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_workshop_prospects; ?></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">No.Of Prospects Attended </p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-up text-fixed-white"></i>
											<span class="text-fixed-white op-7"></span>

										</span>
									</div>
								</div>
							</div>
							<div id="compositeline"></div>
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">NCA (Participants)</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="reviews" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_conversions; ?></span>
											<span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
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


				<!-- row opened -->
				<div class="row">
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Workshops</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">SPOC Wise Workshop Prospects Count</span>
							</div>
							<div class="list-group border">

								<?php foreach ($spoc_workshop_participant_list as $workshop) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $workshop->first_name; ?></p><span><?php echo $workshop->count; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				
					<!-- NCA Conversions  -->
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">NCA Conversion</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">SPOC Wise Participant Conversion</span>
							</div>
							<div class="list-group border">

								<?php foreach ($employee_nca_conversion_list as $employee_nca_conversion) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $employee_nca_conversion->first_name; ?></p><span><?php echo $employee_nca_conversion->conversion; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>

				</div>
				<!-- /row -->

				<div class="card top-countries-card" >
				<div class="card-header p-0">

								<center>
									<h6 class="card-title fs-13 mb-2">SPOC Performance</h6>

								</center>
								<!-- <span class="d-block mg-b-10 text-muted fs-12 mb-2">SPOC Wise Count</span> -->
							</div>

				</div>

				<!-- levelwise participants -->
				<!-- <div class="col-md-12 col-lg-12 col-xl-12">
					<div class="card top-countries-card">
						<div class="card-header p-0">
							<h6 class="card-title fs-13 mb-2">Participants</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">All Time</span>
						</div>
						<div class="table-responsive">
							<table class="table text-nowrap" >
								<thead class="table-success">
									<tr>
										<th scope="col">Level</th>
										<th scope="col" style="text-align: center;">Subscribed</th>
										<th scope="col" style="text-align: center;">Approved</th>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$subscribed_total = 0;
									$approved_total = 0;
									foreach ($coaching_program_list as $key => $coaching_program) {
										$coaching_program_id = $coaching_program->entity_id;
									?>
								
									<tr>
										<th scope="row"><?php echo $coaching_program->coaching_program_name; ?></th>
										<td style="text-align: center;">
											<?php 
											
											foreach ($coaching_programwise_participant_list as $key => $subscribed) {
												if($subscribed->coaching_program_id == $coaching_program_id){
													echo $subscribed->count;
													$subscribed_total += $subscribed->count;
												}
											}
										 ?>
										 </td>
										<td style="text-align: center;">
										<?php foreach ($coaching_programwise_approved_participant_list as $key => $approved) {
												if($approved->coaching_program_id == $coaching_program_id){
													echo $approved->count;
													$approved_total += $approved->count;

												}
											}
										 ?>
										 </td>
										<td>&nbsp; &nbsp;</td>
										<td>&nbsp; &nbsp;</td>

									</tr>

									<?php } ?>
									<tr class="table-success" >
										<td><strong>Total</strong></td>
										<td style="text-align: center;"><strong><?php echo $subscribed_total; ?></strong></td>
										<td style="text-align: center;"><strong><?php echo $approved_total; ?></strong></td>
										<td>&nbsp; &nbsp;</td>
										<td>&nbsp; &nbsp;</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div> -->

				<!-- NCA section -->

				
				<!-- row -->
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">Hours</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="hours" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_hours; ?></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Hrs.</span>
											<p class="mb-0 fs-12 text-fixed-white op-7">No.Of Hours Worked</p>
										</div>
										<span class="float-end my-auto ms-auto">
											<i class="fas fa-arrow-circle-up text-fixed-white"></i>
											<span class="text-fixed-white op-7">-23.09%</span>

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
									<h6 class="mb-3 fs-20 text-fixed-white">Group Sessions</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="facilitations" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_group_sessions; ?></span><span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
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
											<span id="reviews" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_reviews; ?></span>
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
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="px-3 pt-3  pb-2 pt-0">
								<div>
									<h6 class="mb-3 fs-20 text-fixed-white">NCA (Participants)</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div>
											<span id="reviews" class="fs-20 fw-bold mb-1 text-fixed-white"><?php echo $total_conversions; ?></span>
											<span class="fs-20 fw-bold mb-1 text-fixed-white"> Nos.</span>
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


				<!-- row opened -->
				<div class="row">
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Hours</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">Employee Wise Hours</span>
							</div>
							<div class="list-group border">

								<?php foreach ($employee_hours_list as $employee_hour) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $employee_hour->first_name; ?></p><span><?php echo $employee_hour->hours; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
					<!-- Facilitation  -->
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">Group Sessions</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">Facilitator Wise group Sessions</span>
							</div>
							<div class="list-group border">

								<?php foreach ($employee_group_session_list as $employee_group_session) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $employee_group_session->first_name; ?></p><span><?php echo $employee_group_session->group_session_count; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
					<!-- Reviews  -->
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">RM Reviews</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">Employee Wise Reviews</span>
							</div>
							<div class="list-group border">

								<?php foreach ($employee_review_list as $employee_review) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $employee_review->first_name; ?></p><span><?php echo $employee_review->reviews; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
					<!-- NCA Conversions  -->
					<div class="col-md-12 col-lg-3 col-xl-3">
						<div class="card top-countries-card">
							<div class="card-header p-0">
								<h6 class="card-title fs-13 mb-2">NCA Conversion</h6><span class="d-block mg-b-10 text-muted fs-12 mb-2">SPOC Wise Participant Conversion</span>
							</div>
							<div class="list-group border">

								<?php foreach ($employee_nca_conversion_list as $employee_nca_conversion) {
								?>
									<div class="list-group-item border-top-0" id="br-t-0">
										<p><?php echo $employee_nca_conversion->first_name; ?></p><span><?php echo $employee_nca_conversion->conversion; ?></span>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>

				</div>
				<!-- /row -->

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

			$('#month').on('change', function() {
				var month = $(this).val();

				window.location.href = "<?php echo base_url('dashboard/'); ?>" + month;

			});



		});
	</script>



</body>

</html>
