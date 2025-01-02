<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if (!$_SESSION['user_name']) {
	header("location:welcome");
}
$session_data = $this->session->userdata();
$role_type = $session_data['userType'];
$role_id = $session_data['role_id'];
$user_id = $session_data['user_id'];


$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

date_default_timezone_set('Asia/Kolkata');
$today_date = date('Y-m-d');


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
	<!-- START OF CSS for time duration -->

	<style>
		.time-input {
			display: inline-flex;
			align-items: center;
		}

		.time-input input {
			width: 100px;
			/* Adjust width as needed */
			text-align: center;
			margin: 0 5px;
			/* Small spacing */
		}

		.time-input span {
			font-size: 20px;
		}
	</style>
	<!-- END OF CSS for time duration -->

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
						<h5 class="page-title fs-21 mb-1">Worklog Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('vw_worklog_master'); ?>">Worklog Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Worklog</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('worklog/worklog_master/save_worklog'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">Worklog Master Form</div>
								</div>
								<div class="card-body">

									<input type="hidden" name="worklog_type" id="worklog_type" value="<?php echo $worklog_type; ?>">

									<div class="row gy-4">

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Worklog Date<span style="color: #FF0000;">*</span></label>
											<input type="date" class="form-control" name="worklog_date" id="worklog_date" placeholder="Select Date" value="<?php echo $today_date; ?>" required>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Sparrow Employee<span style="color: #FF0000;">*</span></p>
											<select class="form-select" id="sparrow_employee_id" name="sparrow_employee_id" required>
												<option value="">Select Employee</option>
												<?php foreach ($sparrow_employee_list as $sparrow_employee) : ?>
													<option value="<?php echo $sparrow_employee->entity_id; ?>" <?php echo ($sparrow_employee->entity_id == $sparrow_employee_id) ? "selected" : ""; ?>><?php echo $sparrow_employee->first_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<br>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Actionable<span style="color: #FF0000;"> *</span></p>
											<select class="form-select" id="actionable_id" name="actionable_id" required>

											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 actionable_more_info" style="display: none;">
											<p class="fw-semibold mb-2">Facilitation Type<span style="color: #FF0000;">*</span></p>
											<select class="form-select" id="actionable_more_info" name="actionable_more_info">
												<option value="">Select Actionable More Info</option>
												<option value="1">Main Facilitator</option>
												<option value="2">Assistant Facilitator</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></label>
											<select class="form-select" id="worklog_medium" name="worklog_medium" required>
												<option value="">No Selected</option>
												<option value="Telephonic">Telephonic</option>
												<option value="Online">Online</option>
												<option value="Offline">Offline</option>
											</select>
										</div>



										<!-- prospect tracking section Start -->
										<!-- =============================== -->


										<div class="row gy-4 nca" style="display: none;">
											<hr>

											<div class="card-header">
												<div class="card-title">New Client Acquisition</div>
											</div>



											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Prospect Name<span style="color: #FF0000;">*</span></p>
												<select class="form-select nca_field" id="prospect_id" name="prospect_id" required>
													<option value="">Select Prospect</option>
													<?php foreach ($prospect_list as $prospect) : ?>
														<option value="<?php echo $prospect->entity_id; ?>"><?php echo $prospect->company_name . " " . $prospect->first_name . " " . $prospect->last_name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Communication Type<span style="color: #FF0000;">*</span></p>
												<select class="form-select nca_field" id="communication_type_id" name="communication_type_id" required>
													<option value="">Select Communication Type</option>
													<?php foreach ($communication_type_list as $communication_type) : ?>
														<option value="<?php echo $communication_type->entity_id; ?>"><?php echo $communication_type->status_name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Tracking Status<span style="color: #FF0000;">*</span></p>
												<select class="form-select nca_field" id="tracking_status" name="tracking_status" required>
													<option value="">Select Status</option>
													<?php foreach ($tracking_status_list as $tracking_status) : ?>
														<option value="<?php echo $tracking_status->entity_id; ?>"><?php echo $tracking_status->status_name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Next Action<span style="color: #FF0000;"></span></label>
												<textarea class="form-control" name="next_action" id="next_action" placeholder="Enter Next Action"></textarea>
											</div>

											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Next Action Date<span style="color: #FF0000;">*</span></label>
												<input type="date" class="form-control" name="next_action_date" id="next_action_date" placeholder="Select Date">
											</div>





										</div>

										<!-- prospect tracking section end -->

										<!-- ================================ -->
										<!-- Performance review section Start -->


										<!-- <div class="row gy-4 review"> -->
										<div class="row gy-4 review" style="display: none;">

											<div class="card-header">
												<div class="card-title">Performance Review</div>
											</div>

											<div class="row gy-4">

												<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
													<p class="fw-semibold mb-2">Company Contact<span style="color: #FF0000;">*</span></p>
													<select class="form-select review_field" id="company_contact_id" name="company_contact_id" required>
														<option value="">Select Company Contact</option>
														<?php foreach ($company_list as $company) : ?>
															<option value="<?php echo $company->entity_id; ?>"><?php echo $company->company_name; ?></option>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
													<label for="input-placeholder" class="fw-semibold mb-2">Performance For<span style="color: #FF0000;">*</span></label>
													<select class="form-select" style="background-color: transparent;" data-trigger id="month" name="month" required>
														<?php

														foreach ($month_array as $key => $value) {
														?>
															<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
														<?php } ?>

													</select>
												</div>

											</div>

											<div class="table-responsive">
												<table id="example11" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th style="display: none;">Entity Id</th>
															<th>Sr. No.</th>
															<th>Name</th>
															<th>Value</th>
															<th>Unit</th>
															<th>Value For</th>

														</tr>
													</thead>
													<tbody>
														<?php
														$no = 0;

														foreach ($performance_review_parameter_list as $row):
															$no++;

															$parameter_name = $row->parameter_name;
															$parameter_slug = $row->slug;

															##Default values

															$default_unit = $row->uom;
															$default_value_for = $row->value_for;


														?>
															<tr>
																<td style="display: none;" class="offer_relation_entity_id" id="offer_relation_entity_id"><?php echo $row->session_sparrow_employee_id; ?></td>
																<td><?php echo $no; ?></td>

																<td><?php echo $parameter_name; ?>
																</td>

																<td>
																	<input type="number" class="form-control review_field" name="<?php echo $parameter_slug . '_parameter_value'; ?>" id="<?php echo $parameter_slug . '_parameter_value'; ?>" placeholder="Enter Value">
																</td>
																<td>
																	<select class="form-select review_field" id="<?php echo $parameter_slug . '_uom'; ?>" name="<?php echo $parameter_slug . '_uom'; ?>" required>
																		<option value="">Select Unit</option>
																		<?php foreach ($uom_list as $uom) : ?>
																			<option value="<?php echo $uom->entity_id; ?>" <?php echo ($uom->entity_id == $default_unit) ? 'selected' : ''; ?>><?php echo $uom->uom_name; ?></option>
																		<?php endforeach; ?>
																	</select>
																</td>
																<td>
																	<select class="form-select review_field" id="<?php echo $parameter_slug . '_value_for'; ?>" name="<?php echo $parameter_slug . '_value_for'; ?>" required>
																		<option value="">No Selected</option>
																		<option value="1" <?php echo ($default_value_for == 1) ? 'selected' : ''; ?>>As Of</option>
																		<option value="2" <?php echo ($default_value_for == 2) ? 'selected' : ''; ?>>For Month</option>
																	</select>
																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>

											<hr>

											<div class="row gy-4 ">
												<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Suggestions & Actionables</div>
												<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light"><i class="fas fa-plus"></i></div>
											</div>

											<div id="suggestion_div" class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Suggestios & Actionables<span style="color: #FF0000;"></span></label>
												<textarea class="form-control review_field suggestion_field" name="suggestion[]" placeholder="Enter Suggestion Or Actionable"></textarea>

											</div>






										</div>

										<!-- Performant monitoring section end -->
										<!-- ================================= -->



										<!--     Session Secion   --> <!--   Session Secion    -->
										<!-- ========================   ======================= -->

										<div class="row gy-4 session" style="display: none;">


											<div class="col-xl-12">
												<div class="card custom-card">
													<div class="card-header justify-content-between">
														<div class="card-title">
															List Of Sessions
														</div>


													</div>
													<div id="running_sessions" class="card-body">
														<!-- content will be loaded from jquery here -->
													</div>
													<div class="card-body">

														<div class="row gy-4 create_session" style="display: none;">

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Session Template<span style="color: #FF0000;">*</span></label>
																<select class="form-select create_session_field" id="session_template_id" name="session_template_id">
																	<option value="">Select Session Template</option>
																	<?php foreach ($session_template_list as $session_template) : ?>
																		<option value="<?php echo $session_template->entity_id; ?>"><?php echo $session_template->session_template_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>



															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<p class="fw-semibold mb-2">Session For<span style="color: #FF0000;">*</span></p>
																<select class="js-example-basic-single create_session_field" data-trigger id="session_for" name="session_for">
																	<option value="">Select Session For</option>
																	<option value="1">BH</option>
																	<option value="2">RM</option>
																	<option value="3">Company Staff</option>
																</select>
															</div>


															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Process<span style="color: #FF0000;">*</span></label>
																<select class="form-select create_session_field" id="process_id" name="process_id">
																	<option value="">Select Process</option>
																	<?php foreach ($process_list as $process) : ?>
																		<option value="<?php echo $process->entity_id; ?>"><?php echo $process->process_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
																<input type="text" class="form-control create_session_field" name="topic" id="topic" placeholder="Enter Topic">
															</div>

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<p class="fw-semibold mb-2">Facilitator<span style="color: #FF0000;">*</span></p>
																<select class="form-select create_session_field" id="facilitator_id" name="facilitator_id" required>
																	<option value="">Select Facilitator</option>
																	<?php foreach ($sparrow_employee_list as $sparrow_employee) : ?>
																		<option value="<?php echo $sparrow_employee->entity_id; ?>" <?php echo ($sparrow_employee->entity_id == $sparrow_employee_id) ? "selected" : ""; ?>><?php echo $sparrow_employee->first_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<p class="fw-semibold mb-2">Business Head<span style="color: #FF0000;"> (if Applicable)</span></p>
																<select class="form-select create_session_field" id="bh_id" name="bh_id">
																	<option value="">Select Business Head</option>
																	<?php foreach ($company_contact_list as $company_contact) : ?>
																		<option value="<?php echo $company_contact->entity_id; ?>"><?php echo $company_contact->company_name . "-" . $company_contact->first_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
																<select class="form-select create_session_field" id="batch_id" name="batch_id">
																	<option value="">Select Batch</option>
																	<?php foreach ($batch_list as $batch) : ?>
																		<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>


															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
																<input type="text" class="form-control create_session_field" name="remark" id="remark" placeholder="Enter Remark">
															</div>

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
																<select class="form-select create_session_field" data-trigger id="session_type_id" name="session_type_id">
																	<option value="1">Facilitaion</option>
																</select>
															</div>

														</div>

													</div>








												</div>

											</div>
										</div>


									</div>

									<br>


									<!-- ####################### -->
									<!-- ####################### -->
									<!-- ####################### -->
									<!-- Practice Session Start  -->

									<div class="row gy-4 practice_session" style="display: none;">
										<hr>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
											<input type="date" class="form-control create_practice_session_field" name="session_date" id="session_date" placeholder="Select Session date">
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="practice_topic" id="practice_topic" placeholder="Enter Topic">
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="session_name" id="session_name" placeholder="Enter Session Name">
										</div>

										<!-- 
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="remark" id="remark" placeholder="Enter Remark">
										</div> -->

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
											<select class="form-select create_practice_session_field" data-trigger id="practice_session_type_id" name="practice_session_type_id">
												<option value="2">Practice</option>
											</select>
										</div>

										<br>

									</div>

									<!-- Practice Session End -->


									<!-- ##################### -->
									<!-- Worklog Common Fields -->


									<hr>
									<div>
										<!-- <div class="row gy-4"> -->

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Worklog Description<span style="color: #FF0000;"></span></label>
											<textarea class="form-control" name="worklog_description" id="worklog_description" rows="5" placeholder="Enter Worklog Description" required></textarea>
										</div>
									</div>

									<br>

									<div>
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">

											<label for="input-placeholder" class="fw-semibold mb-2">Duration<span style="color: #FF0000;">*</span></label><br>

											<div class="time-input">

												<input type="number" class="form-control numInput flatpickr-hour" name="hours" id="hours" min="0" max="24" placeholder="HH" required>
												<span>:</span>
												<input type="number" class="form-control" name="minutes" id="minutes" min="00" max="59" placeholder="MM" value="00" required>

											</div>
										</div>

									</div>

									<center>

										<br>

										<button type="submit" id="btn_save" class="btn btn-primary mb-4">
											Save & Next
										</button>
										<p><small>You Can Add/Delete Participant on next page</small></p>
										</>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
		<!-- End::app-content -->


		<!-- Modal Start -->

		<div class="modal fade" id="modal-add-session" tabindex="-1"
			aria-labelledby="modal-add-session" data-bs-keyboard="false"
			aria-hidden="true">
			<!-- Scrollable modal -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Create Session
						</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form role="form" name="customer_master" action="<?php echo site_url('add_session_from_template'); ?>" method="post">

							<div class="row gy-4">

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Template<span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_session_template_id" name="pop_up_session_template_id" required>
										<option value="">Select Session Template</option>
										<?php foreach ($session_template_list as $session_template) : ?>
											<option value="<?php echo $session_template->entity_id; ?>"><?php echo $session_template->session_template_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>



								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Session For<span style="color: #FF0000;">*</span></p>
									<select class="form-select create_session_field" data-trigger id="pop_up_session_for" name="pop_up_session_for">
										<option value="">Select Session For</option>
										<?php foreach ($session_for_list as $session_for) : ?>
											<option value="<?php echo $session_for->entity_id; ?>"><?php echo $session_for->status_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>


								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Process<span style="color: #FF0000;">*</span></label>
									<select class="form-select create_session_field" id="pop_up_process_id" name="pop_up_process_id">
										<option value="">Select Process</option>
										<?php foreach ($process_list as $process) : ?>
											<option value="<?php echo $process->entity_id; ?>"><?php echo $process->process_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control create_session_field" name="pop_up_topic" id="pop_up_topic" placeholder="Enter Topic">
								</div>



								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" style="display: none;">
									<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
									<select class="js-example-basic-single" data-trigger id="pop_up_actionable_id" name="pop_up_actionable_id" required>
										<option value="3">Facilitation</option>
									</select>
								</div>



								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
									<input type="date" class="form-control" name="pop_up_session_date" id="pop_up_session_date" placeholder="Select Session date">
								</div>

								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Facilitator<span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_facilitator_id" name="pop_up_facilitator_id" required>
										<option value="">Select Facilitator</option>
										<?php foreach ($sparrow_employee_list as $sparrow_employee) : ?>
											<option value="<?php echo $sparrow_employee->entity_id; ?>"><?php echo $sparrow_employee->sparrow_employee_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div> -->

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
										<option value="">Select Batch</option>
										<?php foreach ($batch_list as $batch) : ?>
											<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Group / Individual<span style="color: #FF0000;">*</span></p>
									<select class="form-select" data-trigger id="pop_up_session_type_id" name="pop_up_session_type_id" required>
										<option value="">Select Session Type</option>
										<option value="1">Group</option>
										<option value="2">Individual</option>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></p>
									<select class="form-select" data-trigger id="pop_up_medium" name="pop_up_medium" required>
										<option value="">Select Medium</option>
										<option value="Telephonic">Telephonic</option>
										<option value="Online">Online</option>
										<option value="Offline">Offiline</option>
									</select>
								</div>

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control" name="pop_up_session_name" id="pop_up_session_name" placeholder="Enter Session Name">
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
									<textarea class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Session Objective" rows="5"></textarea>
								</div>
							</div>
							<br>

							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" id="add_session">Save Session</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<!-- Modal End -->



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
		//get sessionlist by date

		function get_session_list_by_date(session_date) {
			$('#running_sessions').html('');

			$.ajax({
				url: "<?php echo site_url('worklog/worklog_master/get_session_list_by_date'); ?>",
				method: "POST",
				data: {
					session_date: session_date
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					console.log(data);


					var create_session_button = '<div class="mb-4">' +
						'<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-session">' +
						'Create New Session</button>' +
						'</div>';


					var html = create_session_button + '<div class="table-responsive">' +
						'<table  class="table bg-light">' +
						'<thead><tr>' +
						'<th>Session ID</th>' +
						'<th>Session Date</th>' +
						'<th>Batch</th>' +
						'<th>Session Type</th>' +
						'<th>Session For</th>' +
						'<th>Process</th>' +
						'<th>Topic</th>' +
						'</tr></thead><tbody>';

					var i;
					var radio_html = "";

					//render session employee list 
					if (data.length > 0) {
						for (i = 0; i < data.length; i++) {

							var radio_id = 'radio_' + i;
							radio_html = '<div class="form-check" ><input class="form-check-input session_id create_session_field" type="radio" id="' + radio_id + '" name="session_id" value=' + data[i].session_id + ' required ><label class="form-check-label" for="' + radio_id + '"></label></div>';
							var session_type_id = data[i].session_type_id;
							var session_type = "";
							if (session_type_id == 1) {
								session_type = "Group";
							} else {
								session_type = "Individual";
							}

							html += '<tr><td>' + radio_html + '</td>';
							html += '<td>' + data[i].session_date + '</td>';
							html += '<td>' + data[i].batch_name + '</td>';
							html += '<td>' + session_type + '</td>';
							html += '<td>' + data[i].status_name + '</td>';
							html += '<td>' + data[i].process_name + '</td>';
							html += '<td>' + data[i].topic + '</td>';
							html += '</tr>';

						}
						// html += '<tr><td colspan="6" style="text-align: center; color: red;">If you do not find your Sessions in the list above or if there are no Session <br> Make sure you have selected correct Date <br>Or you may Create New Session<br><button type="button"  class="btn btn-sm btn-warning mt-2 btn_create_session">Create New Session</button>&nbsp;<button type="button" class="btn btn-sm btn-primary mt-2 create_session btn_close_session_form" style="display:none;" >Close Session Form</button></td></tr>';

					} else {
						// If no data, show a single row with a message
						// html += '<tr><td colspan="6" style="text-align: center; color: red;">If you do not find your Sessions in the list above or if there are no Session <br> Make sure you have selected correct Date <br>Or you may Create New Session<br><button type="button"  class="btn btn-sm btn-warning mt-2 btn_create_session">Create New Session</button>&nbsp;<button type="button" class="btn btn-sm btn-primary mt-2 create_session btn_close_session_form" style="display:none;" >Close Session Form</button></td></tr>';
					}

					html += '</tbody></table></div>';

					$('#running_sessions').html(html);
				}
			});

		}

		$(document).ready(function() {


			//read selected session id

			$('#running_sessions').on('click', '.btn_create_session', function() {

				$('.create_session').show();
				$('.create_session_field').prop('required', true);
				$('.session_id').prop('required', false);

			})

			//Close create session form

			$('#running_sessions').on('click', '.btn_close_session_form', function() {

				$('.create_session').hide();
				$('.session_id').prop('required', true);
				$('.create_session_field').prop('required', false);

			})

			//hide show external fields

			// function show_hide_create_session_fields(session_id, worklog_type) {


			// 	if (session_id == 0 && worklog_type == 2) {
			// 		$('.create_session').show();
			// 		$('.existing_session').hide();
			// 		$('.create_session_field').prop('required', true);

			// 	} else {
			// 		$('.create_session').hide();
			// 		$('.existing_session').show();
			// 		$('.create_session_field').prop('required', false);

			// 	}

			// }





			//hide show external fields

			function get_actionable_list_by_worklog_type(worklog_type) {
				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_actionable_list_by_worklog_type'); ?>",
					method: "POST",
					data: {
						worklog_type: worklog_type
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '<option value="">Select Actionable</option>';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].entity_id + '>' + data[i].actionable_name + '</option>';
						}
						//console.log(html);
						$('#actionable_id').html(html);
					}
				});
			}

			var worklog_type = $('#worklog_type').val();

			if (worklog_type == 1) {
				$('.external').hide();
				$('.create_session_field').prop('required', false);
				$('.review_field').prop('required', false);

				get_actionable_list_by_worklog_type(worklog_type)

			} else {
				$('.external').show();
				get_actionable_list_by_worklog_type(worklog_type)

			}

			//actionable field hiode/show

			$('#actionable_id').change(function() {

				var actionable_id = $(this).val();

				// Actionale = NCA

				if (actionable_id == 7) {
					$('.nca').show();
					$('.nca_field').prop('required', true);

				} else {
					$('.nca').hide();
					$('.nca_field').prop('required', false);

				}

				// Actionale = Review


				if (actionable_id == 9) {
					$('.review').show();
					$('.review_field').prop('required', true);

				} else {
					$('.review').hide();
					$('.review_field').prop('required', false);

				}

				// Actionale = Facilitation || Facilitatiopn Assistance


				if (actionable_id == 3 || actionable_id == 4) {
					$('.session').show();
					var session_date = $('#worklog_date').val();
					$('.actionable_more_info').show();
					$('#actionable_more_info').prop('required', true);

					// $('.create_session_field').prop('required', true);
					get_session_list_by_date(session_date);

				} else {
					$('.session').hide();
					$('.actionable_more_info').hide();
					$('#actionable_more_info').prop('required', false);
					// $('.create_session_field').prop('required', false);

				}




				// Actionale = Practice Session  || Assistance Session


				if (actionable_id == 8 || actionable_id == 10) {
					$('.practice_session').show();
					$('.create_practice_session_field').prop('required', true);

				} else {
					$('.practice_session').hide();
					$('.create_practice_session_field').prop('required', false);

				}


			});


			// performance for month automation

			$('#review_month').change(function() {
				var review_month = $(this).val();
				$('.month').val(review_month).trigger('change');
			});




		});
	</script>

	<script>
		$(document).ready(function() {

			$('#session_template_id').change(function() {
				var session_template_id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_session_template_details_by_id'); ?>",
					method: "POST",
					data: {
						session_template_id: session_template_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						$('#process_id').val(data.process_id).trigger('change');
						$('#topic').val(data.topic);
						$('#session_name').val(data.session_name);
						$('#session_for').val(data.session_for).trigger('change');

					}
				});
				return false;
			});

		});
	</script>

	<script>
		$(document).ready(function() {

			$('#pop_up_session_template_id').change(function() {
				var session_template_id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_session_template_details_by_id'); ?>",
					method: "POST",
					data: {
						session_template_id: session_template_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						$('#pop_up_process_id').val(data.process_id).trigger('change');
						$('#pop_up_topic').val(data.topic);
						$('#pop_up_session_name').val(data.session_name);
						$('#pop_up_session_for').val(data.session_for).trigger('change');

					}
				});
				return false;
			});

		});
	</script>

	<script>
		$(document).ready(function() {
			$('#add_suggestion').click(function() {
				var html = '<br><textarea class="form-control review_field suggestion_field" name="suggestion[]" placeholder="Enter Suggestion Or Actionable"></textarea>';

				$('#suggestion_div').append(html);
			});

		});
	</script>

	<script>
		$(document).ready(function() {

			$(document).on('click', '#add_session', function() {
				// Common worklog data
				var actionable_id = $('#actionable_id').val();
				var actionable_more_info = $('#actionable_more_info').val();
				var worklog_date = $('#worklog_date').val();
				var sparrow_employee_id = $('#sparrow_employee_id').val();

				// Session Specific data

				var session_template_id = $("#pop_up_session_template_id").val();
				var session_for = $("#pop_up_session_for").val();
				var process_id = $("#pop_up_process_id").val();
				var topic = $("#pop_up_topic").val();
				var session_date = $("#pop_up_session_date").val();
				var batch_id = $("#pop_up_batch_id").val();
				var session_type_id = $("#pop_up_session_type_id").val();
				// var actionable_id = $("#pop_up_actionable_id").val();
				var medium = $("#pop_up_medium").val();
				var session_name = $("#pop_up_session_name").val();
				var remark = $("#pop_up_remark").val();



				if (actionable_id != "" && actionable_more_info != "" && worklog_date != "" && session_template_id != "" && session_for != "" && process_id != "" && topic != "" && session_date != "" && batch_id != "" && session_type_id != "" && medium != "" && session_name != "" && remark != "" && sparrow_employee_id != "") {

					$.ajax({
						url: "<?php echo site_url('worklog/worklog_master/create_session_from_worklog'); ?>",
						method: "POST",
						async: true,
						dataType: 'json',
						data: {
							'actionable_id': actionable_id,
							'actionable_more_info': actionable_more_info,
							'worklog_date': worklog_date,
							'session_template_id': session_template_id,
							'session_for': session_for,
							'process_id': process_id,
							'topic': topic,
							'session_date': session_date,
							'batch_id': batch_id,
							'session_type_id': session_type_id,
							'medium': medium,
							'sparrow_employee_id': sparrow_employee_id,
							'remark': remark

						},
						success: function(data) {
							$('#modal-add-session').modal('hide');
							get_session_list_by_date(worklog_date);
						},
						error: function(data) {
							alert("Failed!!");
						}
					});
				} else {
					alert('Please fill all Mandatory Fields');
				}
			});
		});
	</script>



</body>

</html>
