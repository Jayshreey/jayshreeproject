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
						<h5 class="page-title fs-21 mb-1">Worklog</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<!-- <li class="breadcrumb-item" aria-current="page"> Master</li> -->
								<li class="breadcrumb-item"><a href="<?php echo base_url('vw_worklog_master'); ?>">Worklog</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Worklog</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" id="customer_master_form" name="customer_master" action="<?php echo site_url('worklog/worklog_master/save_worklog'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">Worklog Form <span id="worklog_type_name" class="badge rounded-pill bg-outline-warning text-dark"></span></div>
								</div>
								<div class="card-body">

									<input type="hidden" name="worklog_type" id="worklog_type" value="<?php echo $worklog_type; ?>">

									<div class="row gy-4">

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Worklog Date<span style="color: #FF0000;">*</span></label>
											<input type="date" class="form-control" name="worklog_date" id="worklog_date" placeholder="Select Date" value="<?php //echo $today_date; ?>" required>
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
											<label for="input-placeholder" class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></label>
											<select class="form-select" id="worklog_medium" name="worklog_medium" required>
												<option value="">No Selected</option>
												<option value="Telephonic">Telephonic</option>
												<option value="Online">Online</option>
												<option value="Offline">Offline</option>
											</select>
										</div>

										<br>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Actionable<span style="color: #FF0000;"> *</span></p>
											<select class="form-select" id="actionable_id" name="actionable_id" required>

											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 responsibility_type" style="display: none;">
											<p class="fw-semibold mb-2">Facilitation Type<span style="color: #FF0000;">*</span></p>
											<select class="form-select" id="responsibility_type" name="responsibility_type">
												<option value="">Select Responsibility Type</option>
												<option value="1">Main Facilitator</option>
												<option value="2">Assistant Facilitator</option>
											</select>
										</div>

										<!-- prospect tracking section Start -->
										<!-- =============================== -->
										<div class="row gy-4 nca_prospect" style="display: none;">
											<hr>
											<div class="card-header">
												<div class="card-title">New Client Acquisition</div>
											</div>


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Prospect Name</p>
												<select class="js-example-placeholder-multiple" multiple="multiple" id="prospect_id" name="prospect_id[]" required>
													<?php foreach ($prospect_list as $prospect) : ?>
														<option value="<?php echo $prospect->entity_id; ?>"><?php echo $prospect->first_name.' '.$prospect->middle_name.' '.$prospect->last_name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>


										</div>

										<div class="row gy-4 nca" style="display: none;">


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
												<p class="fw-semibold mb-2">Activity Type<span style="color: #FF0000;">*</span></p>
												<select class="form-select nca_field" id="nca_activity_type_id" name="nca_activity_type_id">
													<option value="">Select Activity Type</option>
													<?php foreach ($nca_activity_type_list as $nca_activity_type) : ?>
														<option value="<?php echo $nca_activity_type->entity_id; ?>"><?php echo $nca_activity_type->nca_activity_type; ?></option>
													<?php endforeach; ?>
												</select>
											</div>

											<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Activity Result<span style="color: #FF0000;">*</span></p>
												<select class="form-select nca_field" id="nca_activity_result_id" name="nca_activity_result_id" required>
													<option value="">Select Activity Result</option>
												</select>
											</div> -->


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 paid_activity_div">
												<p class="fw-semibold mb-2">Paid Activity<span style="color: #FF0000;"></span></p>
												<select class="form-select nca_field" id="paid_activity" name="paid_activity">
													<option value="0">Free</option>
													<option value="2">Mark if Paid</option>
													<option value="1">Paid</option>
												</select>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<p class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></p>
												<select class="form-select nca_field" id="remark" name="remark">
												    <option value=" ">Select Remark</option>
													<option value="1">Followup</option>
													<option value="2">Not interested</option>
													<option value="3">Joined Coaching</option>
												</select>
											</div>

											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Description<span style="color: #FF0000;"></span></label>
												<textarea class="form-control" name="tracking_description" id="tracking_description" placeholder="Enter Tracking Description"></textarea>
											</div>


											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Next Action<span style="color: #FF0000;"></span></label>
												<textarea class="form-control" name="next_action" id="next_action" placeholder="Enter Next Action"></textarea>
											</div>

											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Next Action Date<span style="color: #FF0000;">*</span></label>
												<input type="date" class="form-control" name="next_action_date" id="next_action_date" placeholder="Select Date">
											</div>

											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<br>
												<p class="text-danger">If this activity has resulted into Sale of Coaching Program - The same needs to be updated individualy for each prospect - This can be done on next page</p>
											</div>





										</div>

										<!-- prospect tracking section end -->

										<!-- ================================ -->
										<!-- Performance review section Start -->


										<div class="row gy-4 review" style="display: none;">
											<hr>


											<div class="col-xl-12">
												<!-- <div class="card custom-card"> -->
												<div class="card-header justify-content-between">
													<div class="card-title">Performance Review</div>

												</div>

												<br>
												<div class="row gy-4 card-body">

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Company<span style="color: #FF0000;">*</span></label>
														<select class="js-example-basic-single form-select review_field" data-trigger id="company_id" name="company_id" required>
															<option value="">Select Company</option>
															<?php foreach ($company_list as $company) : 
																$this->db->select('first_name,last_name');
																$this->db->from('company_contact_master');
																$where = '(company_contact_master.company_id ="'.$company->company_id.'" and company_contact_master.privilege_id = 5)';
																$this->db->where($where);
																$this->db->limit(1);
																$query = $this->db->get();
																//echo $this->db->last_query();
																$bh_row = $query->row();
																//echo $bh_row[0]['first_name'];
																if(isset($bh_row))
																{
																	$bh_name=' - '.$bh_row->first_name.' '.$bh_row->last_name;
																}
																else{
																	$bh_name='';
																}
																
																?>
																<option value="<?php echo $company->company_id; ?>"><?php echo $company->company_name.''.$bh_name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>

													<div id="running_reviews">
														<!-- content will be loaded from jquery here -->


													</div>
													<div id="suggesion_parent_div" style="display: none;">
														<hr>

														<div class="card-header justify-content-between">
															<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Suggestions & Actionables</div>
															<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light"><i class="fas fa-plus"></i></div>

														</div>

														<div class="row gy-4 card-body">

															<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Company Contact Person<span style="color: #FF0000;">*</span></label>
																<select class="form-select review_field" id="company_contact_id" name="company_contact_id" required>
																	<option value="">Select Company</option>
																	<!-- <?php foreach ($company_contact_list as $company_contact) : ?>
																		<option value="<?php echo $company_contact->entity_id; ?>"><?php echo $company_contact->company_name . " " . $company_contact->first_name . " " . $company_contact->last_name; ?></option>
																	<?php endforeach; ?> -->
																</select>
															</div>

														</div>

														<div class="row gy-4 card-body">

															<div id="suggestion_div" class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
																<label for="input-placeholder" class="fw-semibold mb-2">Suggestios & Actionables<span style="color: #FF0000;"></span></label>
																<textarea class="form-control review_field suggestion_field" name="suggestion[]" placeholder="Enter Suggestion Or Actionable"></textarea>

															</div>
														</div>
													</div>
												</div>


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
															Select Or Create Group Session
														</div>


													</div>
													<div id="running_sessions" class="card-body">
														<!-- content will be loaded from jquery here -->
													</div>
													<div class="card-body">

														<!-- <div class="row gy-4 create_session" style="display: none;">

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

														</div> -->

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

										<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
											<input type="date" class="form-control create_practice_session_field" name="session_date" id="session_date" placeholder="Select Session date">
										</div> -->

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="practice_topic" id="practice_topic" placeholder="Enter Topic">
										</div>

										<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="session_name" id="session_name" placeholder="Enter Session Name">
										</div> -->

										<!-- 
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control create_practice_session_field" name="remark" id="remark" placeholder="Enter Remark">
										</div> -->

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Group/Individual<span style="color: #FF0000;">*</span></p>
											<select class="form-select create_practice_session_field" data-trigger id="practice_session_type_id" name="practice_session_type_id">
												<option value="">Select Session Type</option>
												<option value="1">Group</option>
												<option value="2">Individual</option>
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
									</center>
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



								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" style="display: none;">
									<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
									<select class="js-example-basic-single" data-trigger id="pop_up_actionable_id" name="pop_up_actionable_id" required>
										<option value="3">Facilitation</option>
									</select>
								</div> -->



								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
									<input type="date" class="form-control" name="pop_up_session_date" id="pop_up_session_date" placeholder="Select Session date">
								</div> -->

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
									<p class="fw-semibold mb-2">Group / Individual<span style="color: #FF0000;">*</span></p>
									<select class="form-select" data-trigger id="pop_up_session_type_id" name="pop_up_session_type_id" required>
										<option value="">Select Session Type</option>
										<option value="1">Group</option>
										<option value="2">Individual</option>
									</select>
								</div>

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
										<option value="">Select Batch</option>
										<!-- <?php foreach ($batch_list as $batch) : ?>
											<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
										<?php endforeach; ?> -->
									</select>
								</div>

								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<p class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></p>
									<select class="form-select" data-trigger id="pop_up_medium" name="pop_up_medium" required>
										<option value="">Select Medium</option>
										<option value="Telephonic">Telephonic</option>
										<option value="Online">Online</option>
										<option value="Offline">Offiline</option>
									</select>
								</div> -->

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Objective<span style="color: #FF0000;"></span></label>
									<textarea class="form-control" name="pop_up_session_objective" id="pop_up_session_objective" placeholder="Enter Session Objective" rows="5"></textarea>
								</div>

								<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
									<input type="text" class="form-control" name="pop_up_session_name" id="pop_up_session_name" placeholder="Enter Session Name">
								</div> -->

								<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
									<textarea class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Session Objective" rows="5"></textarea>
								</div> -->
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

		<!-- Modal Start -->

		<div class="modal fade" id="modal-add-session-template" tabindex="-1"
			aria-labelledby="modal-add-session-template" data-bs-keyboard="false"
			aria-hidden="true">
			<!-- Scrollable modal -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Create Session Template
						</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form role="form" name="customer_master" action="<?php echo site_url('save_session_template'); ?>" method="post">

							<br>

							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" id="save_session_template">Save Session Template</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<!-- Modal End -->


		<!-- Modal Start : Review-->

		<div class="modal fade" id="modal-add-review" tabindex="-1"
			aria-labelledby="modal-add-review" data-bs-keyboard="false"
			aria-hidden="true">
			<!-- Scrollable modal -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Create Review
						</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form role="form" id="review_form" name="review_form" action="<?php //echo site_url('add_session_from_template'); 
																																					?>" method="post">


							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Review Month<span style="color: #FF0000;"></span></label>
								<select class="form-select" style="background-color: transparent;" data-trigger id="pop_up_review_month" name="pop_up_review_month" required>
									<?php

									foreach ($month_array as $key => $value) {
									?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>

								</select>
							</div>

							<br>

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


							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="add_review">Save Session</button>
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
				url: "<?php echo site_url('worklog/worklog_master/get_group_session_list_by_date'); ?>",
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
						'Create New Session</button>&nbsp;<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-add-session-template">' +
						'Create Session Template</button>' +
						'</div>';


					var html = create_session_button + '<div class="table-responsive">' +
						'<table  class="table bg-light">' +
						'<thead><tr>' +
						'<th>Session ID</th>' +
						'<th>Session Date</th>' +
						'<th>Batch</th>' +
						'<th>Process</th>' +
						'<th>Topic</th>' +
						'<th>Session Type</th>' +
						'<th>Session For</th>' +
						'</tr></thead><tbody>';

					var i;
					var radio_html = "";
					var dummy_radio_html = '<div class="form-check" ><input class="form-check-input session_id create_session_field" type="radio" id="" name="session_id" value="" required ><label class="form-check-label" for=""></label></div>';

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
							html += '<td>' + data[i].process_name + '</td>';
							html += '<td>' + data[i].topic + '</td>';
							html += '<td>' + session_type + '</td>';
							html += '<td>' + data[i].status_name + '</td>';
							html += '</tr>';

						}


					} else {
						html += '<tr><td>' + dummy_radio_html + '</td>';
						html += '<td>There are no facilitation session for selected date - Please Create session and select</td>';
						html += '</tr>';
					}
					html += '</tbody></table></div>';

					$('#running_sessions').html(html);
				}
			});

		}

		function reset_session_list() {
			$('#running_sessions').html("")
		}
		//get Review list by Month

		function get_reviews_list_by_company_id(company_id) {
			$('#running_reviews').html('');

			$.ajax({
				url: "<?php echo site_url('worklog/worklog_master/get_review_list_by_company'); ?>",
				method: "POST",
				data: {
					company_id: company_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					console.log(data);


					var create_review_button = '<div class="mb-4">' +
						'<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-review">' +
						'Create New Review</button>' +
						'</div>';


					var html = create_review_button + '<div class="table-responsive">' +
						'<table  class="table bg-light">' +
						'<thead><tr>' +
						'<th></th>' +
						'<th>Review ID</th>' +
						'<th>Review Month</th>' +
						'<th>Company Name</th>' +
						'</tr></thead><tbody>';

					var i;
					var radio_html = "";

					//render session employee list 
					if (data.length > 0) {
						for (i = 0; i < data.length; i++) {

							var radio_id = 'review_radio_' + i;
							radio_html = '<div class="form-check" ><input class="form-check-input review_id create_review_field" type="radio" id="' + radio_id + '" name="review_id" value=' + data[i].review_id + ' required ><label class="form-check-label" for="' + radio_id + '"></label></div>';



							html += '<tr><td>' + radio_html + '</td>';
							html += '<td>' + data[i].review_id + '</td>';
							html += '<td>' + data[i].review_month + "-" + data[i].review_year + '</td>';
							html += '<td>' + data[i].company_name + '</td>';
							html += '</tr>';

						}


					}

					html += '</tbody></table></div>';

					$('#running_reviews').html(html);
				}
			});

		}

		function get_company_contact_person_list_by_company_id(company_id) {
			var html = "";
			$.ajax({
				url: "<?php echo site_url('worklog/worklog_master/get_company_contact_person_list_by_company_id'); ?>",
				method: "POST",
				data: {
					company_id: company_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					var html = '<option value="">Select Participant</option>';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].entity_id + '>' + data[i].company_contact_name + '</option>';
					}
					//console.log(html);
					$('#company_contact_id').html(html);
				}
			});
		}

		$(document).ready(function() {

			// Reset form if the date is selected a second time
			var dateSelectedFirstTime = false;
			$('#worklog_date').on('change', function() {
				var worklog_date_val=$('#worklog_date').val();
				if (dateSelectedFirstTime) {
					
					$('#customer_master_form')[0].reset();  // Reset the form
					$('#worklog_date').val(worklog_date_val);
				
					//alert('Form reset due to selecting date again');
					$('.session').hide();
					$('.responsibility_type').hide();
					$('#responsibility_type').prop('required', false);
					// $('.create_session_field').prop('required', false);
					reset_session_list();
				}
				dateSelectedFirstTime = true;
			});



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
				$('#worklog_type_name').html('&nbsp; &nbsp; &nbsp; ' + 'Internal' + '&nbsp;&nbsp; &nbsp; ');

				get_actionable_list_by_worklog_type(worklog_type)

			} else {
				$('.external').show();
				get_actionable_list_by_worklog_type(worklog_type)
				$('#worklog_type_name').html('&nbsp; &nbsp; &nbsp; ' + 'External' + '&nbsp;&nbsp; &nbsp; ');


			}

			//actionable field hiode/show

			$('#actionable_id').change(function() {

				var actionable_id = $(this).val();

				// Actionale = NCA

				if (actionable_id == 7) {
					$('.nca_prospect').show();
					$('#prospect_id').prop('required', true);

				} else {
					$('.nca_prospect').hide();
					$('#prospect_id').prop('required', false);
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
					$('.responsibility_type').show();
					$('#responsibility_type').prop('required', true);

					// $('.create_session_field').prop('required', true);
					get_session_list_by_date(session_date);

				} else {
					$('.session').hide();
					$('.responsibility_type').hide();
					$('#responsibility_type').prop('required', false);
					// $('.create_session_field').prop('required', false);
					reset_session_list();

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




		});
	</script>

	<script>
		//nca activity result manupulation

		function get_nca_activity_result_list_by_activity_id(nca_activity_type_id) {
			$.ajax({
				url: "<?php echo site_url('worklog/worklog_master/get_nca_activity_result_list_by_activity_id'); ?>",
				method: "POST",
				data: {
					nca_activity_type_id: nca_activity_type_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					var html = '<option value="">Select Activity Result</option>';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].entity_id + '>' + data[i].nca_activity_result + '</option>';
					}
					//console.log(html);
					$('#nca_activity_result_id').html(html);
				}
			});
		}
	</script>

	<script>
		$(document).ready(function() {
			$('.paid_activity_div').hide();
			$('#company_id').change(function() {
				var company_id = $(this).val();
				$('#suggesion_parent_div').show();

				get_company_contact_person_list_by_company_id(company_id);

				get_reviews_list_by_company_id(company_id);
			});

			//NCA form automation


			$('#prospect_id').change(function() {

				$('.nca').show();
				$('.nca_field').prop('required', true);

			});



			$('#nca_activity_type_id').change(function() {
				var nca_activity_type_id = $(this).val();
				if(nca_activity_type_id == '4')
				{
					$('.paid_activity_div').show();
				}
				else
				{
					$('.paid_activity_div').hide();
				}

			//	get_nca_activity_result_list_by_activity_id(nca_activity_type_id);
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
						console.log('popup template details');
						console.log(data);

						$('#pop_up_process_id').val(data.process_id).trigger('change');
						$('#pop_up_topic').val(data.topic);
						$('#pop_up_session_name').val(data.session_name);
						$('#pop_up_session_objective').val(data.session_objective);
						$('#pop_up_session_for').val(data.session_for).trigger('change');
						$('#pop_up_session_type_id').val(data.session_type_id).trigger('change');

						var coaching_program_type_id = data.coaching_program_type_id;

						render_batch_list(coaching_program_type_id);

					}
				});
				return false;
			});

			function render_batch_list(coaching_program_type_id) {
				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_batch_list_by_coaching_program_type'); ?>",
					method: "POST",
					data: {
						coaching_program_type_id: coaching_program_type_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '<option value="">Select Batch</option>';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].entity_id + '>' + data[i].batch_name + '</option>';
						}
						//console.log(html);
						$('#pop_up_batch_id').html(html);
					}
				});
			}

		});
	</script>

	<script>
		$(document).ready(function() {
			$('#add_suggestion').click(function() {
				var company_contact_id = $('#company_contact_id').val();
				var html = '<br><textarea class="form-control review_field suggestion_field" name="suggestion[]" placeholder="Enter Suggestion Or Actionable"></textarea>';

				if (company_contact_id) {
					$('#suggestion_div').append(html);
				} else {
					alert("Please select Company Contact to add more suggesstions");
				}

			});

		});
	</script>

	<script>
		$(document).ready(function() {

			$(document).on('click', '#add_session', function() {
				// Common worklog data
				var actionable_id = $('#actionable_id').val();
				var responsibility_type = $('#responsibility_type').val();
				var worklog_date = $('#worklog_date').val();
				var worklog_medium = $('#worklog_medium').val();
				var sparrow_employee_id = $('#sparrow_employee_id').val();

				// Session Specific data

				var session_template_id = $("#pop_up_session_template_id").val();
				var session_for = $("#pop_up_session_for").val();
				var process_id = $("#pop_up_process_id").val();
				var topic = $("#pop_up_topic").val();
				// var session_date = $("#pop_up_session_date").val();
				var batch_id = $("#pop_up_batch_id").val();
				var session_type_id = $("#pop_up_session_type_id").val();
				// var actionable_id = $("#pop_up_actionable_id").val();
				// var medium = $("#pop_up_medium").val();
				// var session_name = $("#pop_up_session_name").val();
				var session_objective = $("#pop_up_session_objective").val();
				// var remark = $("#pop_up_remark").val();



				if (responsibility_type != "" && worklog_date != "" && worklog_medium != "" && session_template_id != "" && session_for != "" && process_id != "" && topic != "" && batch_id != "" && session_type_id != "" && session_objective != "" && sparrow_employee_id != "") {

					$.ajax({
						url: "<?php echo site_url('worklog/worklog_master/create_session_from_worklog'); ?>",
						method: "POST",
						async: true,
						dataType: 'json',
						data: {
							'actionable_id': actionable_id,
							'responsibility_type': responsibility_type,
							'worklog_date': worklog_date,
							'worklog_medium': worklog_medium,
							'session_template_id': session_template_id,
							'session_for': session_for,
							'process_id': process_id,
							'topic': topic,
							'batch_id': batch_id,
							'session_type_id': session_type_id,
							'sparrow_employee_id': sparrow_employee_id,
							'session_objective': session_objective

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


	<script>
		$(document).ready(function() {

			$('#review_form').on('submit', function(event) {
				event.preventDefault(); // Prevent form from submitting the traditional way
				company_id = $('#company_id').val();
				reviewed_by = $('#sparrow_employee_id').val();
				review_month = $('#pop_up_review_month').val();

				// Serialize form data
				var formData = new FormData(this);

				formData.append('company_id', company_id);
				formData.append('reviewed_by', reviewed_by);
				formData.append('review_month', review_month);


				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/create_review_from_worklog'); ?>",
					method: "POST",
					async: true,
					dataType: 'json',
					data: formData,
					processData: false, // Prevent jQuery from processing data
					contentType: false,
					success: function(data) {
						$('#modal-add-review').modal('hide');
						get_reviews_list_by_company_id(company_id);
					},
					error: function(data) {
						alert("Failed!!");
					}
				});

			});
		});
	</script>



</body>

</html>
