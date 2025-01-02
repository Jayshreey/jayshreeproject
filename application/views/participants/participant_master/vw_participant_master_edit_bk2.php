<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if (!$_SESSION['user_name']) {
	header("location:welcome");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Sparrow's Sprout </title>
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard template,admin panel html,bootstrap dashboard,admin dashboard,html template,template dashboard html,html css,bootstrap 5 admin template,bootstrap admin template,bootstrap 5 dashboard,admin panel html template,dashboard template bootstrap,admin dashboard html template,bootstrap admin panel,simple html template,admin dashboard bootstrap">

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

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

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
					<div class="my-auto">
						<h5 class="page-title fs-21 mb-1">Participant Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_participant_master' ?>">Participant Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Participant Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/edit_customer_master_data'); ?>" method="post">
					<input type="hidden" id="company_contact_id" name="company_contact_id" value="<?php echo $company_contact_id ?>" required>
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">

								<div class="card-body">


									<!-- Start:: row-1 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Company Information
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Company Name</dt>
															<dd class="col-sm-8 company_name" id="company_name"></dd>

															<dt class="col-sm-4">Address</dt>
															<dd class="col-sm-8 address"></dd>

															<dt class="col-sm-4">Locality</dt>
															<dd class="col-sm-8 locality"></dd>

															<dt class="col-sm-4">Pincode</dt>
															<dd class="col-sm-8 pincode"></dd>

															<dt class="col-sm-4">State</dt>
															<dd class="col-sm-8 state_name"></dd>

															<dt class="col-sm-4">City</dt>
															<dd class="col-sm-8 city_name"></dd>

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Customer Type</dt>
															<dd class="col-sm-6 account_type"></dd>

															<dt class="col-sm-6">Source</dt>
															<dd class="col-sm-6 source_name"></dd>

															<dt class="col-sm-6">Source Description</dt>
															<dd class="col-sm-6 source_description"></dd>

															<dt class="col-sm-6">Created Date</dt>
															<dd class="col-sm-6 created_date"></dd>

															<dt class="col-sm-6">SPOC</dt>
															<dd class="col-sm-6 spoc_name"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-1 -->

									<hr>

									<!-- Start:: row-2 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Company Contact Information
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Company Contact Name</dt>
															<dd class="col-sm-8 company_contact_name"></dd>

															<dt class="col-sm-4">Gender</dt>
															<dd class="col-sm-8 gender"></dd>

															<dt class="col-sm-4">Date of Birth</dt>
															<dd class="col-sm-8 dob"></dd>


														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Designation</dt>
															<dd class="col-sm-8 designation"></dd>

															<dt class="col-sm-4">Responsibility</dt>
															<dd class="col-sm-8 privilege"></dd>

															<dt class="col-sm-4">Remark</dt>
															<dd class="col-sm-8 remark"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-2 -->
									<hr>

									<!-- Start:: row-3 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Batch Information
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Batch Name</dt>
															<dd class="col-sm-8 batch_name"></dd>

															<dt class="col-sm-4">Type</dt>
															<dd class="col-sm-8 coaching_program_type"></dd>

															<dt class="col-sm-4">Mode</dt>
															<dd class="col-sm-8 mode"></dd>

															<dt class="col-sm-4">Locality</dt>
															<dd class="col-sm-8 locality"></dd>

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Day</dt>
															<dd class="col-sm-6 day"></dd>

															<dt class="col-sm-6">Timing</dt>
															<dd class="col-sm-6 timing"></dd>

															<dt class="col-sm-6">Joining date</dt>
															<dd class="col-sm-6 joining_date"></dd>

															<dt class="col-sm-6">Leaving Date</dt>
															<dd class="col-sm-6 leaving_date"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-3 -->




									<hr>

									<!-- Start:: row-4 -->
									<div class="row">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Performance Review Information
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>


										</div>

										<div class="col-xl-12">

											<div class="card-body">
												<div class="table-responsive">
													<table id="example11" class="table table-bordered table-striped">
														<thead>
															<tr>

																<th>Sr. No.</th>
																<th>Month</th>
																<?php foreach ($parameter_list as $parameter) {
																?>
																	<th><?php echo $parameter->parameter_name; ?></th>
																<?php } ?>
															</tr>
														</thead>
														<tbody>
															<?php

															$no = 0;
															$i = -2;
															date_default_timezone_set('Asia/Kolkata');
															$today_date = date('Y-m-d');


															for ($i = 0; $i > -12; $i--) {
																$timestamp = strtotime($i . "month", strtotime($today_date));
																$nxt_month = date("M-Y", $timestamp);
																$row_month = date('m-Y', $timestamp);
																$no++;
															?>


																<tr>

																	<td><?php echo $no; ?></td>

																	<td><?php echo $nxt_month; ?></td>
																	<?php foreach ($parameter_list as $parameter) {
																	?>
																		<td><?php foreach ($performance_list as $key => $value) {
																					if ($value->parameter_id == $parameter->entity_id && ($row_month == date('m-Y', strtotime($value->month)))) {
																						echo $value->value;
																					}
																				} ?></td>
																	<?php } ?>
																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>


										<hr>
									</div>

									<!-- End:: row-4 -->


									<!-- Start:: row-5 -->
									<div class="row">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Performance Review - Suggestions & Actionables
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>


										</div>

										<div class="col-xl-12">

											<div class="card-body">
												<div class="table-responsive">
													<table id="example11" class="table table-bordered table-striped">
														<thead>
															<tr>

																<th>Sr. No.</th>
																<th>Month</th>
																<th>Suggesions & Actionables</th>
																<th>Status</th>

															</tr>
														</thead>
														<tbody>
															<?php

															$no = 0;
															$i = -2;
															date_default_timezone_set('Asia/Kolkata');
															$today_date = date('Y-m-d');


															for ($i = 0; $i > -12; $i--) {
																$timestamp = strtotime($i . "month", strtotime($today_date));
																$nxt_month = date("M-Y", $timestamp);
																$row_month = date('m-Y', $timestamp);
																$no++;
															?>


																<tr>

																	<td><?php echo $no; ?></td>

																	<td><?php echo $nxt_month; ?></td>

																	<td><?php foreach ($suggestion_list as $key => $value) {
																				if (($row_month == date('m-Y', strtotime($value->month)))) {
																					echo $value->suggestion;
																					echo "<br>";
																				}
																			} ?></td>
																	<td><?php foreach ($suggestion_list as $key => $value) {
																				if (($row_month == date('m-Y', strtotime($value->month)))) {
																					echo ($value->status == 1) ? "Sahred with Participant" : "";
																					echo "<br>";
																				}
																			} ?></td>

																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>


										<hr>
									</div>

									<!-- End:: row-4 -->


									<!-- Start:: row-5 -->
									<div class="row">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Subscription Information
												</div>
												<div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>


										</div>

										<div class="col-xl-12">
											<div class="card-body">
												<div class="table-responsive">
													<table id="example11" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Subscription ID</th>
																<th>Start Date</th>
																<th>End Date</th>
																<th>Coaching Program Name</th>
																<th>Company Name</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 0;

															foreach ($subscription_list as $row):
																$no++;

															?>
																<tr>

																	<td><?php echo $row->entity_id; ?></td>
																	<td><?php echo $row->start_date; ?></td>
																	<td><?php echo $row->end_date; ?></td>
																	<td><?php echo $row->coaching_program_name; ?></td>
																	<td><?php echo $row->company_name; ?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>


										<hr>
									</div>

									<!-- End:: row-5 -->


								</div>

								<div class="card-body">
									<center>
										<a href="<?php echo base_url('vw_participant_master'); ?>" class="btn btn-primary">Close</a>
									</center>
								</div>

							</div>
						</div>
					</div>
			</div>
			</form>

		</div>
	</div>
	<!-- End::app-content -->

	<div class="modal fade" id="modal-add-contact-person" tabindex="-1"
		aria-labelledby="modal-add-contact-person" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Contact Person Details
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/add_new_contact_person'); ?>" method="post">

						<input type="hidden" name="pop_up_company_id" value="<?php echo $company_id; ?>">

						<div class="row gy-4">
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Salutation <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_salutation" name="pop_up_salutation" required>
									<option value="">No Selected</option>
									<option value="Mr.">Mr.</option>
									<option value="Ms.">Ms.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Dr.">Dr.</option>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">First Name<span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_first_name" id="pop_up_first_name" placeholder="Enter First Name" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Last Name<span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_last_name" id="pop_up_last_name" placeholder="Enter Last Name" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Gender<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_gender" name="pop_up_gender" required>
									<option value="">No Selected</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Designation<span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_designation" id="pop_up_designation" placeholder="Enter Designation" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-email" class="fw-semibold mb-2">Email <span style="color: #FF0000;">*</span></label>
								<input type="email" class="form-control" name="pop_up_email_id" id="pop_up_email_id" placeholder="Enter Email Address" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-number" class="fw-semibold mb-2">Contact Number <span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_mobile1" id="pop_up_mobile1" placeholder="Enter Contact Number" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-number" class="fw-semibold mb-2">Remark <span style="color: #FF0000;"></span></label>
								<textarea class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Remark"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="add_address" id="add_address" class="btn btn-primary">Add Contact Person</button>
							</div>


						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

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
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/simplebar/simplebar.min.js' ?>"></script>
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/simplebar.js' ?>"></script>

	<!-- Color Picker JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/libs/@simonwep/pickr/pickr.es5.min.js' ?>"></script>

	<!-- Custom-Switcher JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/custom-switcher.min.js' ?>"></script>

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
			get_data_edit();
			//get_city_data_edit();

			//load data for edit
			function get_data_edit() {
				var company_contact_id = $('[name="company_contact_id"]').val();

				//alert(company_id);
				$.ajax({
					url: "<?php echo site_url('participants/participant_master/get_company_contact_details_by_company_contact_id'); ?>",
					method: "POST",
					data: {
						company_contact_id: company_contact_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.company_name').text(data.company_name);
						$('.address').text(data.address);
						$('.account_type').text(data.account_type);
						$('.source_name').text(data.source_name);
						$('.source_description').text(data.source_description);
						$('.spoc_name').text(data.spoc_name);
						$('.created_date').text(data.created_date);
						$('.locality').text(data.locality);
						$('.pincode').text(data.pincode);
						$('.state_name').text(data.state_name);
						$('.city_name').text(data.city_name);
						$('.company_contact_name').text(data.company_contact_name);
						$('.gender').text(data.gender);
						$('.dob').text(data.dob);
						$('.designation').text(data.designation);
						var privilege_id = data.privilege_id;
						var privilege = "";
						switch (privilege_id) {
							case "1":
								privilege = "BH";
								break;
							case "2":
								privilege = "RM";
								break;
							case "3":
								privilege = "Company Staff";
								break;

							default:
								privilege = privilege_id;
								break;
						}
						$('.privilege').text(privilege);
						$('.remark').text(data.remark);

						get_batch_details_by_company_contact_id(company_contact_id);

					}
				});
			}

			function get_batch_details_by_company_contact_id(company_contact_id) {
				$.ajax({
					url: "<?php echo site_url('participants/participant_master/get_batch_details_by_company_contact_id'); ?>",
					method: "POST",
					data: {
						company_contact_id: company_contact_id
					},
					async: true,
					dataType: 'json',
					success: function(data2) {
						console.log(data2);
						$('.batch_name').text(data2.batch_name);
						var coaching_program_type_id = data2.coaching_program_type_id;
						if (coaching_program_type_id == 1) {

							$('.coaching_program_type').text("LSDP");
						} else {

							$('.coaching_program_type').text("SSDP");
						}
						$('.mode').text(data2.mode);
						$('.day').text(data2.day);
						$('.timing').text(data2.timing);
						$('.locality').text(data2.locality);
						$('.joining_date').text(data2.joining_date);
						$('.leaving_date').text(data2.leaving_date);


					}
				});
			}

			//Get Performance Review data

			function render_performance_review_common_data(performance_review_id) {

				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_performance_review_details_by_id'); ?>",
					method: "POST",
					data: {
						performance_review_id: performance_review_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.participant_name').text(data.participant_name);
						$('.recorded_date').text(data.recorded_date);
					}
				});
				return false;
			}

			$('#state_id').change(function() {
				var id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('master/company_master/get_city_name'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '<option value="">Select City</option>';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].entity_id + '>' + data[i].city_name + '</option>';
						}
						//console.log(html);
						$('#city_id').html(html);
					}
				});
				return false;
			});

		});
	</script>

	<script type="text/javascript">
		$(document).on('click', '#add_address', function() {
			var entity_id = $("#entity_id").val();
			var customer_name = $("#customer_name").val();
			var customer_type = $("#customer_type").val();
			var foundation_date = $("#foundation_date").val();
			var source = $("#source").val();
			var address = $("#address").val();
			var state_id = $("#state_id").val();
			var city_id = $("#city_id").val();
			var customer_pin_code = $("#customer_pin_code").val();
			var customer_gst_number = $("#customer_gst_number").val();
			var customer_email = $("#email").val();
			var contact_person = $("#pop_up_contact_person").val();
			var contact_person_email_id = $("#pop_up_contact_person_email_id").val();
			var first_contact_no = $("#pop_up_first_contact_no").val();
			var second_contact_no = $("#pop_up_second_contact_no").val();
			var salutation = $("#pop_up_salutation").val();
			var whatsup_no = $("#pop_up_whatsup_no").val();

			if (customer_name != "" && source != "" && customer_type != "" && address != "" && state_id != "" && customer_pin_code != "" && contact_person != "" && contact_person_email_id != "" && first_contact_no != "" && salutation != "") {

				$.ajax({
					url: "<?php echo site_url('master/company_master/update_customer_contact_details'); ?>",
					type: "POST",
					data: {
						'entity_id': entity_id,
						'address': address,
						'state_id': state_id,
						'city_id': city_id,
						'customer_email': customer_email,
						'customer_pin_code': customer_pin_code,
						'foundation_date': foundation_date,
						'customer_gst_number': customer_gst_number,
						'salutation': salutation,
						'contact_person': contact_person,
						'contact_person_email_id': contact_person_email_id,
						'first_contact_no': first_contact_no,
						'second_contact_no': second_contact_no,
						'whatsup_no': whatsup_no,
						'customer_name': customer_name,
						'customer_type': customer_type,
						'source': source,

					},
					success: function(data) {
						location.reload();
					},
					error: function(data) {
						alert("Failed!!");
					}
				});
			} else {
				alert('Please fill all Mandatory Fields');
			}
		});
	</script>

	<script type="text/javascript">
		function save_participant_line(item) {
			var address_relation_entity_id = $(item).closest('tr').find('.address_relation_entity_id ').text();
			var party_name = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_party_name'); ?>",
				method: "POST",
				data: {
					'party_name': party_name,
					'address_relation_entity_id': address_relation_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_state(item) {
			var address_relation_entity_id = $(item).closest('tr').find('.address_relation_entity_id ').text();
			var state_id = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_state'); ?>",
				method: "POST",
				data: {
					'state_id': state_id,
					'address_relation_entity_id': address_relation_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_city(item) {
			var address_relation_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var city_id = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_city'); ?>",
				method: "POST",
				data: {
					'city_id': city_id,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_address(item) {
			var cust_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var address = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_address'); ?>",
				method: "POST",
				data: {
					'address': address,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_pincode(item) {
			var cust_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var pin_code = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_pincode'); ?>",
				method: "POST",
				data: {
					'pin_code': pin_code,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_statecode(item) {
			var cust_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var state_code = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_statecode'); ?>",
				method: "POST",
				data: {
					'state_code': state_code,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_gstnumber(item) {
			var cust_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var gst_no = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_gstnumber'); ?>",
				method: "POST",
				data: {
					'gst_no': gst_no,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_pannumber(item) {
			var cust_entity_id = $(item).closest('tr').find('.cust_entity_id ').text();
			var pan_no = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_pannumber'); ?>",
				method: "POST",
				data: {
					'pan_no': pan_no,
					'cust_entity_id': cust_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_contactperson(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var contact_person = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_contactperson'); ?>",
				method: "POST",
				data: {
					'contact_person': contact_person,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_spoc(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var spoc_id = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_spoc_id'); ?>",
				method: "POST",
				data: {
					'spoc_id': spoc_id,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_emailid(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var email_id = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_emailid'); ?>",
				method: "POST",
				data: {
					'email_id': email_id,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_contactnumber(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var contact_no = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_contactnumber'); ?>",
				method: "POST",
				data: {
					'contact_no': contact_no,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_alternatecontactnumber(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var alternate_contact_no = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_alternatecontactnumber'); ?>",
				method: "POST",
				data: {
					'alternate_contact_no': alternate_contact_no,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}

		function change_whatsupcontactnumber(item) {
			var contact_entity_id = $(item).closest('tr').find('.contact_entity_id ').text();
			var whatsup_contact_no = item.value;

			$.ajax({
				url: "<?php echo site_url('master/company_master/update_whatsupcontactnumber'); ?>",
				method: "POST",
				data: {
					'whatsup_contact_no': whatsup_contact_no,
					'contact_entity_id': contact_entity_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					// location.reload();
				}
			});
			return false;
		}
	</script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

</body>

</html>