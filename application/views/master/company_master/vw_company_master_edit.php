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
						<h5 class="page-title fs-21 mb-1">Company Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_company_master' ?>">Company Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Company Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/edit_customer_master_data'); ?>" method="post">

					<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_id ?>" required>

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
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-company"><i class="fe fe-edit-2 "></i></a>
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

															<dt class="col-sm-6">Account Type</dt>
															<dd class="col-sm-6 account_type"></dd>

															<dt class="col-sm-6">Source</dt>
															<dd class="col-sm-6 source_name"></dd>

															<dt class="col-sm-6">Source Description</dt>
															<dd class="col-sm-6 source_description"></dd>

															<!-- <dt class="col-sm-6">Conversion Reason</dt>
															<dd class="col-sm-6 conversion_reason"></dd> -->

															<dt class="col-sm-6">Created Date</dt>
															<dd class="col-sm-6 created_date">.</dd>

															<dt class="col-sm-6">SPOC</dt>
															<dd class="col-sm-6 spoc_name">.</dd>

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
													Company Contact Persons &nbsp;&nbsp;&nbsp;
													<a href="#" class="btn btn-sm btn-primary-light" data-bs-toggle="modal"
														data-bs-target="#modal-add-contact-person">
														<i class="fe fe-plus "></i>
													</a>
												</div>

											
											</div>
											<div class="card-body">

												<div class="table-responsive">
													<table id="example11" class="table table-bordered text-nowrap w-100">
														<thead>
															<tr>
																<th>Sr. No.</th>
																<th style="display: none;">Participant Id</th>
																<th>Responsibility</th>
																<th>Contact Person Name</th>
																<th>Gender</th>
																<th>Email Id</th>
																<th>Contact Number</th>
																<th>DOB</th>
																<th>Designation</th>
																<th>Status</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 0;
															//echo '<pre>'; print_r($customer_details);die;
															foreach ($contact_person_list as $row) :
																$no++;
																$contact_person_id = $row->entity_id;

																$contact_person_name = $row->salutation . " " . $row->first_name . " " . $row->last_name;

																$privilege_id = $row->privilege_id;



															?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td style="display: none;" class="contact_person_id" id="contact_person_id"><?php echo $contact_person_id; ?></td>
																	<td><?php echo $row->role_name; ?>
																	</td>
																	<td><?php echo $contact_person_name; ?>
																	</td>
																	<td><?php echo $row->gender; ?>
																	</td>
																	<td><?php echo $row->email_id; ?>
																	</td>
																	<td><?php echo $row->mobile1; ?>
																	</td>
																	<td><?php echo $row->dob; ?>
																	</td>
																	<td><?php echo $row->designation; ?>
																	</td>
																	<td><?php echo ($row->status == 1) ? "Active" : "In-Active"; ?>
																	</td>

																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>

											</div>

										</div>
									</div>
									<!-- End:: row-2 -->
									<hr>

									<!-- Start:: row-5 -->
									<div class="row">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Subscription Information
												</div>
												<div class="prism-toggle">
													<button type="button" class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
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



									</div>

									<!-- End:: row-5 -->

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
															foreach ($performance_list as $key => $performance) {

																$no++;
																$review_id = $performance->entity_id;
																$Review_month = $performance->review_month;
																$review_year = $performance->review_year;

																switch ($Review_month) {
																	case '1':
																		$review_month = "Jan-" . $review_year;
																		break;

																	case '2':
																		$review_month = "Feb-" . $review_year;
																		break;

																	case '3':
																		$review_month = "Mar-" . $review_year;
																		break;

																	case '4':
																		$review_month = "Apr-" . $review_year;
																		break;

																	case '5':
																		$review_month = "May-" . $review_year;
																		break;

																	case '6':
																		$review_month = "Jun-" . $review_year;
																		break;

																	case '7':
																		$review_month = "Jul-" . $review_year;
																		break;

																	case '8':
																		$review_month = "Aug-" . $review_year;
																		break;

																	case '9':
																		$review_month = "Sept-" . $review_year;
																		break;

																	case '10':
																		$review_month = "Oct-" . $review_year;
																		break;

																	case '11':
																		$review_month = "Nov-" . $review_year;
																		break;

																	case '12':
																		$review_month = "Dec-" . $review_year;
																		break;

																	default:
																		$review_month = $Review_month . "-" . $review_year;
																		break;
																}


																$performance_parameter_value = [];
																foreach ($parameter_list as $parameter) {

																	$this->db->select('performance_review_parameter_relation.*,uom_master.uom_name');
																	$this->db->from('performance_review_parameter_relation');
																	$this->db->join('uom_master', 'uom_master.entity_id = performance_review_parameter_relation.uom', 'inner');
																	$where = '(performance_review_id = "' . $review_id . '" and parameter_id = "' . $parameter->entity_id . '")';
																	$this->db->where($where);
																	$performance_query = $this->db->get();
																	$performance_details = $performance_query->row();
																	$performance_parameter_value[$parameter->entity_id] = $performance_details->value . " " . $performance_details->uom_name;;
																}


															?>

																<tr>

																	<td><?php echo $no; ?></td>

																	<td><?php echo $review_month; ?></td>

																	<?php foreach ($parameter_list as $parameter) {
																	?>
																		<td>

																			<?php echo $performance_parameter_value[$parameter->entity_id]; ?>

																		</td>
																	<?php } ?>


																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>

									</div>

									<!-- End:: row-4 -->


									<hr>

									<!-- Start:: row-5 -->
									<div class="row">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Performance Review - Suggestions & Actionables
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
																<th>Participant Name</th>
																<th>Status</th>

															</tr>
														</thead>
														<tbody>
															<?php

															$no = 0;
															foreach ($suggestion_list as $value) {
																$no++;
																$Review_month = $value->review_month;
																$review_year = $value->review_year;

																switch ($Review_month) {
																	case '1':
																		$review_month = "Jan-" . $review_year;
																		break;

																	case '2':
																		$review_month = "Feb-" . $review_year;
																		break;

																	case '3':
																		$review_month = "Mar-" . $review_year;
																		break;

																	case '4':
																		$review_month = "Apr-" . $review_year;
																		break;

																	case '5':
																		$review_month = "May-" . $review_year;
																		break;

																	case '6':
																		$review_month = "Jun-" . $review_year;
																		break;

																	case '7':
																		$review_month = "Jul-" . $review_year;
																		break;

																	case '8':
																		$review_month = "Aug-" . $review_year;
																		break;

																	case '9':
																		$review_month = "Sept-" . $review_year;
																		break;

																	case '10':
																		$review_month = "Oct-" . $review_year;
																		break;

																	case '11':
																		$review_month = "Nov-" . $review_year;
																		break;

																	case '12':
																		$review_month = "Dec-" . $review_year;
																		break;

																	default:
																		$review_month = $Review_month . "-" . $review_year;
																		break;
																}
															?>

																<tr>

																	<td><?php echo $no; ?></td>

																	<td><?php echo $review_month; ?></td>

																	<td><?php echo $value->suggestion; ?></td>

																	<td><?php echo $value->company_contact_name; ?></td>

																	<td><?php echo $value->status; ?></td>

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
													TouchPoints
												</div>
											</div>


										</div>

										<div class="col-xl-12">
											<div class="card-body">
												<div class="table-responsive">
													<table id="example11" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Sr.No</th>
																<th>Session Type</th>
																<th>Planned</th>
																<th>Delivered</th>
																<th>Attended</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 0;

															foreach ($external_actionable_list as $row):
																$no++;
																$actionable_id = $row->entity_id;
																//invited count

																$this->db->select('*');
																$this->db->from('session_master');
																$this->db->join('session_participant_relation', 'session_participant_relation.session_id = session_master.entity_id', 'left');
																$this->db->join('company_contact_master', 'company_contact_master.entity_id = session_participant_relation.company_contact_id', 'inner');
																$where = '(session_master.actionable_id = "' . $actionable_id . '" and company_contact_master.company_id = "'.$company_id.'")';
																$this->db->where($where);
																$this->db->group_by('session_id');
																$session_query = $this->db->get();
																$session_num_rows = $session_query->num_rows();
																//$data = $query->result();


																//Attended count

																$this->db->select('*');
																$this->db->from('session_master');
																$this->db->join('session_participant_relation', 'session_participant_relation.session_id = session_master.entity_id', 'left');
																$this->db->join('company_contact_master', 'company_contact_master.entity_id = session_participant_relation.company_contact_id', 'inner');
																$where = '(session_master.actionable_id = "' . $actionable_id . '" and session_participant_relation.attendance = 1  and company_contact_master.company_id = "'.$company_id.'" )';
																$this->db->where($where);
																$this->db->group_by('session_id');
																$session_attendance_query = $this->db->get();
																$session_attendance_num_rows = $session_attendance_query->num_rows();
																//$data = $query->result();

																//review Count

																$this->db->select('*');
																$this->db->from('performance_review_master');
																$where = '(performance_review_master.company_id = "'.$company_id.'" )';
																$this->db->where($where);
																$review_query = $this->db->get();
																$review_num_rows = $review_query->num_rows();

																if($actionable_id ==9){
																	$session_num_rows = $review_num_rows;
																	$session_attendance_num_rows = $review_num_rows;
																}

															?>
																<tr>

																	<td><?php echo $no; ?></td>
																	<td><?php echo $row->actionable_name; ?></td>
																	<td><?php //echo $row->planned_count; 
																			?></td>
																	<td><?php echo $session_num_rows; ?></td>
																	<td><?php echo $session_attendance_num_rows; ?></td>
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
										<a href="<?php echo base_url('vw_company_master'); ?>" class="btn btn-primary">Close</a>
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

	<!-- Modal Start -->

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
					<form role="form" name="company_contact_master" action="<?php echo site_url('master/company_master/add_new_contact_person'); ?>" method="post">

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
								<label for="input-placeholder" class="fw-semibold mb-2">Middle Name</label>
								<input type="text" class="form-control" name="pop_up_middle_name" id="pop_up_middle_name" placeholder="Enter Middle Name" >
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
								<label for="input-placeholder" class="fw-semibold mb-2">Responsibility<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_privilege_id" name="pop_up_privilege_id" required>
									<option value="">Select Responsibility</option>
									<?php foreach ($participant_role_list as $participant_role) {
									?>
										<option value="<?php echo $participant_role->entity_id; ?>"><?php echo $participant_role->role_name; ?></option>

									<?php } ?>

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
								<label for="input-placeholder" class="fw-semibold mb-2">DOB<span style="color: #FF0000;"></span></label>
								<input type="date" class="form-control" name="pop_up_dob" id="pop_up_dob" placeholder="Select DOB">
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-number" class="fw-semibold mb-2">Remark <span style="color: #FF0000;"></span></label>
								<textarea class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Remark"></textarea>
							</div>

							
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Batch Name<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
									<option value="">Select Batch</option>
									<?php foreach ($batch_list as $batch) {
									?>
										<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>

									<?php } ?>

								</select>
							</div>


							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="add_contact_person" id="add_contact_person" class="btn btn-primary">Add Contact Person</button>
							</div>


						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- modal end -->

	<!-- Modal Start -->

	<div class="modal fade" id="modal-edit-company" tabindex="-1"
		aria-labelledby="modal-edit-company" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Update Company Details
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="company_contact_master" action="<?php echo site_url('master/company_master/update_company_details'); ?>" method="post">

						<input type="hidden" name="pop_up_company_id" value="<?php echo $company_id; ?>">

						<div class="row gy-4">
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Company Name <span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_company_name" id="pop_up_company_name" placeholder="Enter Company Name" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Source<span style="color: #FF0000;">*</span></p>
								<select class="form-select" id="pop_up_source_id" name="pop_up_source_id" required>
									<option value="">Select Source</option>
									<?php foreach ($source_list as $source) : ?>
										<option value="<?php echo $source->entity_id; ?>"><?php echo $source->source_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="text-area" class="fw-semibold mb-2">Source Description <span style="color: #FF0000;"></span></label>
								<input type="text" class="form-control" name="pop_up_source_description" id="pop_up_source_description" placeholder="Enter Source Description">
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Account Type<span style="color: #FF0000;">*</span></p>
								<select class="form-select" data-trigger id="pop_up_account_type" name="pop_up_account_type" required>
									<option value="">Select Company Type</option>
									<option value="Active">Active</option>
									<option value="Archived">Archived</option>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="text-area" class="fw-semibold mb-2">Address <span style="color: #FF0000;">*</span></label>
								<textarea class="form-control" id="pop_up_address" name="pop_up_address" rows="3" placeholder="Enter Customer Address"></textarea>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">State<span style="color: #FF0000;">*</span></p>
								<select class="form-select" data-trigger id="pop_up_state_id" name="pop_up_state_id" required>
									<option value="">Select State</option>
									<?php foreach ($state_list as $state) : ?>
										<option value="<?php echo $state->entity_id; ?>"><?php echo $state->state_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">City<span style="color: #FF0000;">*</span></p>
								<select class="form-select" id="pop_up_city_id" name="pop_up_city_id" required>
									<option value="">Select City</option>
									<?php foreach ($city_list as $city) : ?>
										<option value="<?php echo $city->entity_id; ?>"><?php echo $city->city_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-number" class="fw-semibold mb-2">Locality <span style="color: #FF0000;"></span></label>
								<input type="text" class="form-control" name="pop_up_locality" id="pop_up_locality" placeholder="Enter Locality">
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-number" class="fw-semibold mb-2">Pin Code <span style="color: #FF0000;">*</span></label>
								<input type="number" class="form-control" name="pop_up_pincode" id="pop_up_pincode" placeholder="Enter Pin Code">
							</div>

							<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Conversion Reason<span style="color: #FF0000;">*</span></p>
								<select class="form-select" data-trigger id="pop_up_conversion_reason" name="pop_up_conversion_reason">
									<option value="">Select Reason</option>
									<option value="1">Workshop</option>
								</select>
							</div> -->

							<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">SPOC<span style="color: #FF0000;">*</span></p>
								<select class="form-select" data-trigger id="pop_up_spoc_id" name="pop_up_spoc_id" required>
									<option value="">Select SPOC</option>
									<?php foreach ($spoc_list as $spoc) : ?>
										<option value="<?php echo $spoc->entity_id; ?>"><?php echo $spoc->first_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div> -->

						</div>

						<br>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"
								data-bs-dismiss="modal">Close</button>
							<button type="submit" name="update_details" id="update_details" class="btn btn-primary">Update</button>
						</div>

					</form>
				</div>

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
				var company_id = $('[name="company_id"]').val();

				//alert(company_id);
				$.ajax({
					url: "<?php echo site_url('master/company_master/get_company_details_by_id'); ?>",
					method: "POST",
					data: {
						company_id: company_id
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
						$('.locality').text(data.locality);
						$('.pincode').text(data.pincode);
						$('.state_name').text(data.state_name);
						$('.city_name').text(data.city_name);
						$('.created_date').text(data.created_date);
						$('.spoc_name').text(data.sparrow_employee_name);

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

						// var conversion_reason_id = data.conversion_reason;
						// var conversion_reason = "";
						// switch (conversion_reason_id) {
						// 	case "1":
						// 		conversion_reason = "Workshop";
						// 		break;

						// 	default:
						// 		conversion_reason = conversion_reason_id;
						// 		break;
						// }
						// $('.conversion_reason').text(conversion_reason);

						//render data in edit modal

						$('[name="pop_up_company_name"]').val(data.company_name);
						$('[name="pop_up_source_id"]').val(data.source_id).trigger('change');
						$('[name="pop_up_account_type"]').val(data.account_type).trigger('change');
						$('[name="pop_up_source_description"]').val(data.source_description);
						$('[name="pop_up_address"]').val(data.address);
						$('[name="pop_up_state_id"]').val(data.state_id).trigger('change');
						$('[name="pop_up_city_id"]').val(data.city_id).trigger('change');
						$('[name="pop_up_locality"]').val(data.locality);
						$('[name="pop_up_pincode"]').val(data.pincode);
						// $('[name="pop_up_conversion_reason"]').val(data.conversion_reason).trigger('change');
						//$('[name="pop_up_spoc_id"]').val(data.spoc_id).trigger('change');
						//$('[name="pop_up_spoc_id"]').val(data.spoc_id);

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


	
	</script>

</body>

</html>
