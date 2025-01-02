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
						<h5 class="page-title fs-21 mb-1">NCA Reservoir</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Reservoir</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('vw_prospect_master'); ?>">NCA Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update Prospect</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('reservoir/prospect_master/update_prospect'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">NCA Reservoir Form</div>
								</div>
								<div class="card-body">


									<input type="hidden" id="prospect_id" name="prospect_id" value="<?php echo $prospect_id; ?>">


									<!-- Start:: row-6 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Prospect Information
												</div>
												<div class="prism-toggle">
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-prospect"><i class="fe fe-edit-2 "></i></a>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Contact Person Name</dt>
															<dd class="col-sm-8 prospect_name" id="prospect_name"></dd>

															<dt class="col-sm-4">Company Name</dt>
															<dd class="col-sm-8 company_name"></dd>

															<dt class="col-sm-4">Role</dt>
															<dd class="col-sm-8 designation"></dd>

															<dt class="col-sm-4">Gender</dt>
															<dd class="col-sm-8 gender"></dd>

															<dt class="col-sm-4">Email id</dt>
															<dd class="col-sm-8 email_id"></dd>

															<dt class="col-sm-4">Contact No</dt>
															<dd class="col-sm-8 mobile1"></dd>

															<dt class="col-sm-4">Remark</dt>
															<dd class="col-sm-8 remark"></dd>

															<dt class="col-sm-4">Programs Interested In</dt>
															<dd class="col-sm-8 programs_interested_in"></dd>



														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Address</dt>
															<dd class="col-sm-8 address"></dd>

															<dt class="col-sm-4">State</dt>
															<dd class="col-sm-8 state_name"></dd>

															<dt class="col-sm-4">City</dt>
															<dd class="col-sm-8 city_name"></dd>

															<dt class="col-sm-4">Locality</dt>
															<dd class="col-sm-8 mobile1"></dd>

															<dt class="col-sm-4">Pin Code</dt>
															<dd class="col-sm-8 pincode"></dd>


															<dt class="col-sm-4">SPOC</dt>
															<dd class="col-sm-8 sparrow_employee_name"></dd>

															<dt class="col-sm-4">Status</dt>
															<dd class="col-sm-8 stage"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-6 -->





								</div>

								<center>
									<a href="<?php echo base_url('vw_prospect_master');?>"  class="btn btn-primary mb-4">
										Back
									</a>
								</center>

								<div class="card-header">
									<div class="card-title">NCA Tracking</div>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table id="example1" class="table table-bordered text-nowrap w-100">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th>Tracking Date</th>
													<th>Sparrow Employee</th>
													<th>Activity Type</th>
													<th>Activity Result</th>
													<th>Tracking Description</th>
													<th>Next Action</th>
													<th>Next Action Date</th>
													<th>Tracking Status</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 0;
												foreach ($prospect_tracking_list as $row) :
													$no++;
													$prospect_id = $row->entity_id;

												


												?>
													<tr>
														<td><?php echo $no; ?></td>
														<td>
															<?php echo $row->tracking_date; ?>
														</td>
														<td>
															<?php echo $row->first_name; ?>
														</td>
														<td>
															<?php echo $row->nca_activity_type; ?>
														</td>
														<td>
															<?php echo $row->nca_activity_result; ?>
														</td>
														<td>
															<?php echo $row->tracking_description; ?>
														</td>
														<td>
															<?php echo $row->next_action; ?>
														</td>
														<td>
															<?php echo $row->next_action_date; ?>
														</td>
														<td>
															<?php echo ""; ?>
														</td>

													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>
			</div>
			</form>

		</div>
	</div>
	<!-- End::app-content -->

	<!-- modal start -->

	<div class="modal fade" id="modal-edit-prospect" tabindex="-1"
		aria-labelledby="modal-edit-prospect" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit NCA Reservoir
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<form role="form" name="customer_master" action="<?php echo site_url('reservoir/prospect_master/update_prospect'); ?>" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-xl-12">
								<!-- <div class="card custom-card"> -->
								<div class="card-header justify-content-between">
									<div class="card-title">
										Prospect Information
									</div>

								</div>
							</div>
						</div>

						<div class="card-body">


							<input type="hidden" id="pop_up_prospect_id" name="pop_up_prospect_id" value="<?php echo $prospect_id; ?>">


							<div class="row gy-4">

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-email" class="fw-semibold mb-2">Email </label>
									<input type="email" class="form-control pop_up_email_id" name="pop_up_email_id" id="pop_up_email_id" placeholder="Enter Email Address" >
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-number" class="fw-semibold mb-2">Contact Number <span style="color: #FF0000;">*</span></label>
									<input type="text" class="form-control pop_up_mobile1" name="pop_up_mobile1" id="pop_up_mobile1" placeholder="Enter Contact Number" required>
								</div>
							</div>
							<br>

							<div class="row gy-4">

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Salutation<span style="color: #FF0000;">*</span></p>
									<select class="js-example-basic-single pop_up_salutation" data-trigger id="pop_up_salutation" name="pop_up_salutation" required>
										<option value="">Select Salutation</option>
										<option value="Mr.">Mr.</option>
										<option value="Ms.">Ms.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Dr.">Dr.</option>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">First Name<span style="color: #FF0000;">*</span></label>
									<input type="text" class="form-control pop_up_first_name" name="pop_up_first_name" id="pop_up_first_name" placeholder="Enter First Name" required>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Middle Name</label>
									<input type="text" class="form-control pop_up_middle_name" name="pop_up_middle_name" id="pop_up_middle_name" placeholder="Enter Middle Name">
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Last Name<span style="color: #FF0000;">*</span></label>
									<input type="text" class="form-control pop_up_last_name" name="pop_up_last_name" id="pop_up_last_name" placeholder="Enter Last Name" required>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Gender<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_gender" id="pop_up_gender" name="pop_up_gender" required>
										<option value="">No Selected</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Source<span style="color: #FF0000;">*</span></p>
									<select class="form-select company_element pop_up_source_id" id="pop_up_source_id" name="pop_up_source_id" required>
										<option value="">Select Source</option>
										<?php foreach ($source_list as $source) : ?>
											<option value="<?php echo $source->entity_id; ?>"><?php echo $source->source_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Source Description<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control pop_up_source_description" name="pop_up_source_description" id="pop_up_source_description" placeholder="Enter Source Description">
								</div>

							</div>

							<br>

							<div class="row gy-4">

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Company Name<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control pop_up_company_name" name="pop_up_company_name" id="pop_up_company_name" placeholder="Enter Company_name">
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Role<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control pop_up_designation" name="pop_up_designation" id="pop_up_designation" placeholder="Enter Designation">
								</div>

							</div>

							<br>


							<div class="row gy-4">


								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<label for="text-area" class="fw-semibold mb-2">Address </label>
									<textarea class="form-control company_element pop_up_address" id="pop_up_address" name="pop_up_address" rows="3" placeholder="Enter Address"></textarea>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<p class="fw-semibold mb-2">State<span style="color: #FF0000;">*</span></p>
									<select class="form-select company_element pop_up_state_id" data-trigger id="pop_up_state_id" name="pop_up_state_id" required>
										<option value="">Select State</option>
										<?php foreach ($state_list as $state) : ?>
											<option value="<?php echo $state->entity_id; ?>"><?php echo $state->state_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<p class="fw-semibold mb-2">City<span style="color: #FF0000;">*</span></p>
									<select class="form-select company_element pop_up_city_id" id="pop_up_city_id" name="pop_up_city_id" required>
										<option value="">Select City</option>
										<?php foreach ($city_list as $city) : ?>
											<option value="<?php echo $city->entity_id; ?>"><?php echo $city->city_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<label for="input-number" class="fw-semibold mb-2">Locality <span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control company_element pop_up_locality" name="pop_up_locality" id="pop_up_locality" placeholder="Enter Locality">
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<label for="input-number" class="fw-semibold mb-2">Pin Code </label>
									<input type="number" class="form-control company_element pop_up_pincode" name="pop_up_pincode" id="pop_up_pincode" placeholder="Enter Pin Code">
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">SPOC<span style="color: #FF0000;">*</span></p>
									<select class="js-example-basic-single company_element pop_up_assigned_to" data-trigger id="pop_up_assigned_to" name="pop_up_assigned_to" required>
										<option value="">Select SPOC</option>
										<?php foreach ($spoc_list as $spoc) : ?>
											<option value="<?php echo $spoc->entity_id; ?>"><?php echo $spoc->spoc_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>


								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-number" class="fw-semibold mb-2">Remark <span style="color: #FF0000;"></span></label>
									<textarea class="form-control pop_up_remark" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Remark"></textarea>
								</div> -->


								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
									<label for="text-area" class="fw-semibold mb-2">Programs Interested In <span style="color: #FF0000;">*</span></label>
									<textarea class="form-control company_element pop_up_programs_interested_in" id="pop_up_programs_interested_in" name="pop_up_programs_interested_in" rows="3" placeholder="Enter Programs Interested In" required></textarea>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Status<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_conversion_stage" id="pop_up_conversion_stage" name="pop_up_conversion_stage" required>
										<option value="">No Selected</option>
										<option value="1">Not Started</option>
										<option value="2">Contacted</option>
										<option value="3">Converted to Customer</option>
										<option value="4">Not Contacted</option>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Activation Status<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_status" id="pop_up_status" name="pop_up_status" required>
										<option value="">No Selected</option>
										<option value="1">Active</option>
										<option value="2">In-Active</option>
									</select>
								</div>

							</div>


						</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-bs-dismiss="modal">Close</button>
						<button type="submit" name="update_details" id="update_details" class="btn btn-primary">Update</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	<!-- modal end -->


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

	<script type="text/javascript">
		$(document).ready(function() {

			get_data_edit();

			//load data for edit
			function get_data_edit() {
				var prospect_id = $('[name="prospect_id"]').val();

				$.ajax({
					url: "<?php echo site_url('reservoir/prospect_master/get_prospect_details_by_id'); ?>",
					method: "POST",
					data: {
						prospect_id: prospect_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.email_id').text(data.email_id);
						$('.mobile1').text(data.mobile1);
						$('.salutation').text(data.salutation);
						$('.prospect_name').text(data.prospect_name);
						$('.company_contact_name').text(data.company_contact_name);
						$('.sparrow_employee_name').text(data.sparrow_employee_name);
						$('.state_name').text(data.state_name);
						$('.city_name').text(data.city_name);
						$('.last_name').text(data.last_name);
						$('.gender').text(data.gender).trigger('change');
						$('.source_id').text(data.source_id).trigger('change');
						$('.address').text(data.address);
						$('.state_id').text(data.state_id).trigger('change');
						$('.city_id').text(data.city_id);
						$('.locality').text(data.locality);
						$('.pincode').text(data.pincode);
						$('.company_name').text(data.company_name);
						$('.designation').text(data.designation);
						$('.assigned_to').text(data.assigned_to).trigger('change');
						$('.programs_interested_in').text(data.programs_interested_in);
						var remark='';
						if(data.remark == 1)
						{
							remark='Followup';
						}
						else if(data.remark == 2)
						{
							remark='Not interested';
						}else if(data.remark == 3)
						{
							remark='Joined Coaching';
						}
						else{
							remark='';
						}
						$('.remark').text(remark);
						$('.conversion_stage').text(data.conversion_stage).trigger('change');
						$('.status').text(data.status).trigger('change');
						//$('.remark').text(remark);

						var conversion_stage = data.conversion_stage;
						var stage = "";
						if (conversion_stage == 1) {
							stage = "Not Started";
						} else if (conversion_stage == 2) {
							stage = "Not Contacted";
						} else if (conversion_stage == 3) {
							stage = " Converted to Customer";
						}else if (conversion_stage == 4) {
							stage = " Contacted";
						} else {
							stage = "Not Started";
						}
						
													
						$('.stage').text(stage);

						//render data to modal

						$('.pop_up_email_id').val(data.email_id);
						$('.pop_up_mobile1').val(data.mobile1);
						$('.pop_up_salutation').val(data.salutation).trigger('change');
						$('.pop_up_first_name').val(data.first_name);
						$('.pop_up_middle_name').val(data.middle_name);
						$('.pop_up_last_name').val(data.last_name);
						$('.pop_up_gender').val(data.gender).trigger('change');
						$('.pop_up_source_id').val(data.source_id).trigger('change');
						$('.pop_up_source_description').val(data.source_description);
						$('.pop_up_address').val(data.address);
						$('.pop_up_state_id').val(data.state_id).trigger('change');
						$('.pop_up_city_id').val(data.city_id).trigger('change');
						$('.pop_up_locality').val(data.locality);
						$('.pop_up_pincode').val(data.pincode);
						$('.pop_up_company_name').val(data.company_name);
						$('.pop_up_designation').val(data.designation);
						$('.pop_up_assigned_to').val(data.assigned_to).trigger('change');
						//$('.pop_up_remark').val(data.remark);
						$('.pop_up_conversion_stage').val(data.conversion_stage).trigger('change');
						$('.pop_up_status').val(data.status).trigger('change');
						//$('.pop_up_remark').val(data.remark);
						$('.pop_up_programs_interested_in').text(data.programs_interested_in);





					}
				});
			}



			//state city relation
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

			//state city relation
			$('#pop_up_state_id').change(function() {
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
						// $('#pop_up_city_id').html(html);
					}
				});
				return false;
			});
		});

		$(document).on('click', '#add_address', function() {

			var address = $("#address").val();
			var state_id = $("#state_id").val();
			var city_id = $("#city_id").val();
			var customer_pin_code = $("#customer_pin_code").val();
			var customer_state_code = $("#customer_state_code").val();
			var customer_short_name = $("#customer_short_name").val();
			var customer_gst_number = $("#customer_gst_number").val();
			var customer_email = $("#email").val();
			var contact_person = $("#contact_person").val();
			var contact_person_email_id = $("#contact_person_email_id").val();
			var first_contact_no = $("#first_contact_no").val();
			var second_contact_no = $("#second_contact_no").val();
			var salutation = $("#salutation").val();
			var whatsup_no = $("#whatsup_no").val();
			var customer_name = $("#customer_name").val();
			var customer_type = $("#customer_type").val();
			var foundation_date = $("#foundation_date").val();
			var source = $("#source").val();

			if (customer_name != "" && source != "" && customer_type != "" && address != "" && state_id != "" && city_id != "" && customer_pin_code != "" && customer_email != "") {

				$.ajax({
					url: "<?php echo site_url('master/customer_master/save_customer_details'); ?>",
					type: "POST",
					data: {
						'address': address,
						'state_id': state_id,
						'city_id': city_id,
						'customer_email': customer_email,
						'customer_pin_code': customer_pin_code,
						'foundation_date': foundation_date,
						'customer_gst_number': customer_gst_number,
						'customer_short_name': customer_short_name,
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
						data = data.trim();
						window.location.href = "edit_customer_master/" + data;
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



</body>

</html>
