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
	<title> VB Digitech </title>
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
	
		.selected-option
		{
			width: auto;
	
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
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_worklog_master' ?>">Worklog</a></li>
								<li class="breadcrumb-item active" aria-current="page">Worklog Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/edit_customer_master_data'); ?>" method="post">

					<input type="hidden" id="worklog_id" name="worklog_id" value="<?php echo $worklog_id ?>" required>

					<input type="hidden" id="worklog_type" name="worklog_type">

					<input type="hidden" id="prodpect_tracking_id" name="prodpect_tracking_id">

					<input type="hidden" id="performance_review_id" name="performance_review_id">

					<input type="hidden" id="session_id" name="session_id">

					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">

								<div class="card-body">


									<!-- Start:: row-6 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Worklog Information
												</div>
												<div class="prism-toggle">
													<button type="button" class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2" data-bs-toggle="modal"
															data-bs-target="#modal-edit-worklog"></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Sparrow Employee</dt>
															<dd class="col-sm-8 sparrow_employee_name" id="sparrow_employee_name"></dd>

															<dt class="col-sm-4">Worklog Date</dt>
															<dd class="col-sm-8 worklog_date"></dd>

															<dt class="col-sm-4">Worklog Type</dt>
															<dd class="col-sm-8 worklog_type"></dd>

															<dt class="col-sm-4">Medium</dt>
															<dd class="col-sm-8 worklog_medium"></dd>

															

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Actionable</dt>
															<dd class="col-sm-6 actionable_name"></dd>

															<dt class="col-sm-6">Duration</dt>
															<dd class="col-sm-6 duration"></dd>

															<dt class="col-sm-6">Worklog Description</dt>
															<dd class="col-sm-6 worklog_description"></dd>

															<!-- <dt class="col-sm-6">....</dt>
															<dd class="col-sm-6 "></dd> -->
															<dt class="col-sm-6">Created Date</dt>
															<dd class="col-sm-6 worklog_created_date"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-6 -->
									<hr>
									<!-- Start:: row-7 -->
									<div class="row" id="session_info" style="display: none;">
										<div class="col-xl-12">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Session Information
												</div>
												<div class="prism-toggle">
													<button type="button" class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Session Type</dt>
															<dd class="col-sm-8 actionable_name"></dd>

															<dt class="col-sm-4">Group/Individual</dt>
															<dd class="col-sm-8 session_type"></dd>

															<dt class="col-sm-4">Participant Type</dt>
															<dd class="col-sm-8 participant_type"></dd>

															<dt class="col-sm-4">Session Template Name</dt>
															<dd id="session_template_name" class="col-sm-8 session_template_name"></dd>

															<dt class="col-sm-4">Template Code</dt>
															<dd class="col-sm-8 session_template_code"></dd>


														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Coaching Program Type</dt>
															<dd class="col-sm-6 coaching_program_type"></dd>

															<dt class="col-sm-6">Process</dt>
															<dd class="col-sm-6 process_name"></dd>

															<dt class="col-sm-6">Topic</dt>
															<dd class="col-sm-6 topic"></dd>

															<dt class="col-sm-6">Session Objective</dt>
															<dd class="col-sm-6 session_objective"></dd>


														</dl>
													</dl>
												</dl>
												<hr>
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Session Date</dt>
															<dd class="col-sm-8 session_date"></dd>

															<dt class="col-sm-4">Batch</dt>
															<dd class="col-sm-8 batch_name"></dd>

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Medium</dt>
															<dd class="col-sm-6 medium"></dd>

														</dl>
													</dl>
												</dl>
											</div>

										</div>

										<!-- <form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/save_session'); ?>" method="post"> -->
										<div class="row">
											<div class="col-xl-12">

												<div class="card-header">
													<div class="card-title">Session Details</div>
												</div>
												<div class="card-body">

													<div class="row gy-6">

														<div class="card-header justify-content-between">
															<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Add Sparrow Team</div>
															<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#modal-add-sparrow-employee"><i class="fas fa-plus"></i>
															</div>
														</div>

													</div>


													<div class="card-body">
														<div class="table-responsive">
															<table id="example11" class="table table-bordered table-striped">
																<thead>
																	<tr>
																		<th style="display: none;">Entity Id</th>
																		<th>Sr. No.</th>
																		<th>Sparrow Employee Name</th>
																		<th>Responsibilty</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$no = 0;
																	foreach ($session_sparrow_employee_list as $row):
																		$no++;



																	?>
																		<tr>
																			<td style="display: none;" class="offer_relation_entity_id" id="offer_relation_entity_id"><?php echo $row->session_sparrow_employee_id; ?></td>
																			<td><?php echo $no; ?></td>

																			<td><?php echo $row->sparrow_employee_name; ?>
																			</td>

																			<td>
																				<select class="form-select  responsibility_type" data-trigger id="responsibility_type" name="responsibility_type" onchange="save_responsibility_type(this);" required>
																					<option value="" <?php echo (is_null($row->responsibility_type)) ? "selected" : ""; ?>>Un-Assigned</option>
																					<option value="1" <?php echo ($row->responsibility_type == '1') ? "selected" : ""; ?>>Facilitator</option>
																					<option value="2" <?php echo ($row->responsibility_type == '2') ? "selected" : ""; ?>>Facilitator Assistant</option>
																				</select>
																			</td>

																			<td>
																				<a class="btn btn-sm btn-danger" onclick="remove_sparrow_employee_from_session(<?php echo $row->session_sparrow_employee_id; ?>)"><i class="fas fa-trash"></i> </a>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>

													<!-- start of participant details -->


													<div class="row gy-6">

														<div class="card-header justify-content-between">
															<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Add Participants</div>
															<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#modal-add-participant"><i class="fas fa-plus"></i>
															</div>
														</div>

													</div>


													<div class="card-body">
														<div class="table-responsive">
														<table id="example11" class="table table-bordered table-striped">
																<thead>
																	<tr>
																		<th style="display: none;">Entity Id</th>
																		<th>Sr. No.</th>
																		<th>Participant Name</th>
																		<th>Company Name</th>
																		<th>Attendance</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$no = 0;
																	foreach ($session_participant_list as $row2):
																		$no++;

																		$session_participant_id = $row2->session_participant_id;
																	?>
																		<tr>
																			<td style="display: none;" class="session_participant_id" id="session_participant_id"><?php echo $row2->session_participant_id; ?></td>
																			<td><?php echo $no; ?></td>

																			<td><?php echo $row2->participant_name; ?>
																			</td>
																			<td><?php echo $row2->company_name; ?></td>

																			<td>
																				<select class="form-select  attendance" data-trigger id="attendance" name="attendance" onchange="save_attenadance(this);" required>
																					<option value="" <?php echo (is_null($row2->attendance)) ? "selected" : ""; ?>>Invited</option>
																					<option value="1" <?php echo ($row2->attendance == '1') ? "selected" : ""; ?>>Present</option>
																					<option value="2" <?php echo ($row2->attendance == '2') ? "selected" : ""; ?>>Absent</option>
																				</select>

																			</td>

																			<td>
																				<a class="btn btn-sm btn-danger" onclick="remove_sparrow_employee_from_session(<?php echo $row2->session_participant_id; ?>)"><i class="fas fa-trash"></i> </a>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>

													<!-- <input type="hidden" name="status" id="status" value="1"> -->

													<br>
													<!-- <center>
														<a href="<?php echo base_url('vw_session_master'); ?>" class="btn btn-primary">Back</a>
													</center> -->
												</div>
											</div>
										</div>
									</div>
									<!-- </form> -->


									<!-- <hr> -->
								</div>
								<!-- End:: row-7 -->




								<!-- Start:: PErformance Review Section -->
								<!-- Start:: row-8 -->
								<div class="row" id="review_info" style="display: none;">
									<div class="col-xl-12">
										<div class="card-header justify-content-between">
											<div class="card-title">
												Performance Review Information
											</div>
											<div class="prism-toggle">
												<button type="button" class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
											</div>
										</div>
										<div class="card-body">
											<dl class="row mb-0">
												<dl class="col-sm-6">
													<dl class="row mb-0">

														<dt class="col-sm-4">Company Name</dt>
														<dd class="col-sm-8 company_name"></dd>


													</dl>
												</dl>
												<dl class="col-sm-6">
													<dl class="row mb-0">

														<dt class="col-sm-6">Review Month</dt>
														<dd class="col-sm-6 review_month"></dd>

													</dl>
												</dl>
											</dl>
										</div>

									</div>

									<div class="col-xl-12">

										<div class="card-body">
											<div class="table-responsive">
												<table id="example11" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th style="display: none;">Entity Id</th>
															<th>Sr. No.</th>
															<th>Parameter</th>
															<th>Value</th>
															<th>UOM</th>
															<th>Value For</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 0;

														foreach ($performance_review_list as $row):
															$no++;

														?>
															<tr>
																<td style="display: none;" class="offer_relation_entity_id" id="offer_relation_entity_id"><?php echo $row->session_sparrow_employee_id; ?></td>
																<td><?php echo $no; ?></td>
																<td><?php echo $row->parameter_name; ?></td>
																<td><?php echo $row->value; ?></td>
																<td><?php echo $row->uom_name; ?></td>
																<td><?php echo ($row->value_for == 1) ? " As Of" : " For Month"; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<br>
											<hr>
										</div>
									</div>


									<div class="col-xl-12">
										<div class="card-header justify-content-between">
											<div class="card-title">
												Performance Review Suggestions & Actionables
											</div>
										</div>


										<div class="card-body">
											<div class="table-responsive">
											<table id="example12" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>Sr. No.</th>
															<th>Suggestion / Actionable</th>
															<th>Company Contact Name</th>
															<th>Month</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 0;

														foreach ($performance_review_suggestion_list as $row):
															$no++;

														?>
															<tr>
																<td><?php echo $no; ?></td>

																<td><?php echo $row->suggestion; ?></td>
																<td><?php echo $row->company_contact_name; ?></td>
																<td><?php echo $row->review_month . "-" . $row->review_year; ?></td>
																<td><?php echo ($row->status == 1) ? "Shared with Participant" : ""; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<br>
											<hr>
										</div>
									</div>


								</div>

								<!-- End:: row-8 -->

								<!-- Start:: row-9 -->
								<!-- Start of NCA Section -->
								<div class="row" id="tracking_info" style="display: none;">
									<div class="col-xl-12">
										<div class="card-header justify-content-between">
											<div class="card-title">
												NCA Tracking Information
											</div>
											<!-- <div class="prism-toggle">
													<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
												</div> -->
										</div>
										<div class="card-body">

											<div class="table-responsive">
												<table id="example13" class="table table-bordered text-nowrap w-100">
													<thead>
														<tr>
															<th>Sr. No.</th>
															<th>Prospect Name</th>
															<th>Tracking Date</th>
															<th>Activity</th>
															<th>Paid Activity</th>
															<th>Tracking Description</th>
															<th>Next Action</th>
															<th>Next Action Date</th>
															<!-- <th>Status</th> -->
															<th>Remark</th>
															<th>Action</th>
														</tr>
														
													</thead>
													<tbody>
														<?php
														$no = 0;
														foreach ($prospect_tracking_list as $row) :
															$no++;
															$prospect_id = $row->prospect_id;
															$Conversion_stage = $row->conversion_stage;

															switch ($Conversion_stage) {
																case null:
																	$conversion_stage = "Not Started";
																	break;
			
																case 1:
																	$conversion_stage = "Not Started";
																	break;
			
																case 2:
																	$conversion_stage = "Not Contacted";
																	break;
			
																case 3:
																	$conversion_stage = "Converted to Customer";
																	break;
			
																case 4:
																	$conversion_stage = "Contacted";
																	break;
			
																default:
																	$conversion_stage = $Conversion_stage;
																	break;
															}
                                                            if($row->remark == 1)
															{
																$remark='Followup';
															}
															else if($row->remark == 2)
															{
																$remark='Not interested';
															}else if($row->remark == 3)
															{
																$remark='Joined Coaching';
															}
															else{
																$remark='';
															}

														?>
															<tr>
																<td><?php echo $no; ?></td>
																<td>
																	<?php echo $row->prospect_name; ?>
																</td>
																
																<td>
																	<?php echo $row->tracking_date; ?>
																</td>
																<td>
																	<?php echo $row->nca_activity_type; ?>
																</td>
																
																<td>
																	<?php echo ($row->paid_activity == 1) ? "PAID" : "FREE"; ?>
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
																<!-- <td>
																	<?php //echo $conversion_stage; ?>
																</td> -->
																<td>
																	<?php echo $remark; ?>
																</td>
																<td>
																	<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
																		data-bs-target="#modal-convert-to-participant" onclick="update_prospect_id(<?php echo $prospect_id . ',' . $row->assigned_to; ?>)"><i class="mdi mdi-account-convert"></i></a>
																</td>

															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<hr>
										</div>

									</div>




								</div>
								<!-- End:: row-9 --------->
								<!-- End of NCA Section -->




								<center>
									<a href="<?php echo base_url('vw_worklog_master'); ?>" class="btn btn-primary mb-4">Close</a>
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

	<!-- Start Modal -->

	<div class="modal fade" id="modal-add-sparrow-employee" tabindex="-1"
		aria-labelledby="modal-add-sparrow-employee" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Add Sparrow Team
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php //echo site_url('master/company_master/add_new_contact_person'); 
																														?>" method="post">

						<div class="row gy-4">
							<div class="table-responsive">
								<table id="example15" class="table ">

									<tbody>
										<?php
										$no = 0;
										//echo '<pre>'; print_r($customer_details);die;
										foreach ($sparrow_employee_list as $row) :
											$no++;
											$sparrow_employee_id = $row->entity_id;
										?>
											<tr>
												<td><input type="checkbox" class="checkboxes" id="sparrow_employee_checkbox" name="sparrow_employee_checkbox" value="<?php echo $row->entity_id ?>"></td>
												<td>
													<?php echo $row->first_name . " " . $row->last_name; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="button" name="add_sparrow_employee" id="add_sparrow_employee" class="btn btn-primary">Add Sparrow Employee</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- end modal -->

	<!-- Start participant  Modal -->

	<div class="modal fade" id="modal-add-participant" tabindex="-1"
		aria-labelledby="modal-add-participant" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Add Participant
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php //echo site_url('master/company_master/add_new_contact_person'); 
																														?>" method="post">

						<div class="row gy-4">
							<div class="table table-responsive table-striped">
								<table id="example2" class="table ">
									<thead>
										<th></th>
										<th>Company Name</th>
										<th>Participant Name</th>
									</thead>

									<tbody>
										<?php
										$no = 0;
										//echo '<pre>'; print_r($customer_details);die;
										foreach ($company_contact_list as $row) :
											$no++;
											$company_contact_id = $row->entity_id;
										?>
											<tr>
												<td><input type="checkbox" class="checkboxes" id="company_contact_checkbox" name="company_contact_checkbox" value="<?php echo $row->entity_id ?>"></td>
												<td>
													<?php echo $row->company_name; ?>
												</td>
												<td>
													<?php echo $row->first_name . " " . $row->last_name; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="button" name="add_participant" id="add_participant" class="btn btn-primary">Add Participant</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- end modal -->


	<!-- modal start : NCA Tracking -->

	<div class="modal fade" id="modal-convert-to-participant" tabindex="-1"
		aria-labelledby="modal-convert-to-participant" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Convert to Participant
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php echo site_url('reservoir/prospect_master/convert_prospect_to_partipant'); ?>" method="post">

						<input type="hidden" id="pop_up_prospect_id" name="pop_up_prospect_id">

						<div class="row gy-6">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Select Batch <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
									<option value="">No Selected</option>
									<?php foreach ($batch_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->batch_name; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2"> Coaching Program <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_coaching_program_id" name="pop_up_coaching_program_id" required>
									<option value="">Select Coaching Program</option>
									<?php foreach ($coaching_program_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->coaching_program_name; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Role-Responsibility <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_privilege_id" name="pop_up_privilege_id" required>
									<option value="">Select Role-Responsibility</option>
									<?php foreach ($participant_role_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->role_name; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Select SPOC <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_spoc_id" name="pop_up_spoc_id" required>
									<option value="">No Selected</option>
									<?php foreach ($sparrow_employee_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->first_name; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Conversion Reason <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_conversion_reason" name="pop_up_conversion_reason">
									<option value="">No Selected</option>
									<option value="1">Workshop</option>
								</select>
							</div>

						</div>

						<br>
						<div class="row gy-4">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Joining date<span style="color: #FF0000;">*</span></label>
								<input type="date" class="form-control" id="pop_up_joining_date" name="pop_up_joining_date" required>

							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
								<label for="input-placeholder" class="fw-semibold mb-2">Renewal date<span style="color: #FF0000;"> (Optional) </span></label>
								<input type="date" class="form-control" id="pop_up_leaving_date" name="pop_up_leaving_date">

							</div>



							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="convert_participant" id="convert_participant" class="btn btn-primary">Save</button>
							</div>


						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- modal end -->


	<!-- modal start : Worklog Edit -->

	<div class="modal fade" id="modal-edit-worklog" tabindex="-1"
		aria-labelledby="modal-edit-worklog" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Worklog
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php echo site_url('worklog/worklog_master/update_worklog'); ?>" method="post">

						<input type="hidden" id="pop_up_worklog_id" name="pop_up_worklog_id" value="<?php echo $worklog_id; ?>">

						<div class="card-body">
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_worklog_medium" name="pop_up_worklog_medium" required>
										<option value="">No Selected</option>
										<option value="Telephonic">Telephonic</option>
										<option value="Online">Online</option>
										<option value="Offline">Offline</option>
									</select>
								</div>

								<br>
								<div>
									<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"> -->
										<label for="input-placeholder" class="fw-semibold mb-2">Worklog Description<span style="color: #FF0000;"></span></label>
										<textarea class="form-control" name="pop_up_worklog_description" id="pop_up_worklog_description" rows="5" placeholder="Enter Worklog Description" required></textarea>
									<!-- </div> -->
								</div>
							<br>
							<div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">

									<label for="input-placeholder" class="fw-semibold mb-2">Duration<span style="color: #FF0000;">*</span></label><br>

									<div class="time-input">

										<input type="number" class="form-control numInput flatpickr-hour" name="pop_up_hours" id="pop_up_hours" min="0" max="24" placeholder="HH" required>
										<span>:</span>
										<input type="number" class="form-control" name="pop_up_minutes" id="pop_up_minutes" min="00" max="59" placeholder="MM" value="00" required>

									</div>
								</div>
							</div>
							<br>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="convert_participant" id="convert_participant" class="btn btn-primary">Save</button>
							</div>


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
				var worklog_id = $('[name="worklog_id"]').val();

				//alert(worklog_id);
				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_worklog_details_by_id'); ?>",
					method: "POST",
					data: {
						worklog_id: worklog_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.sparrow_employee_name').text(data.sparrow_employee_name);
						$('.worklog_date').text(data.worklog_date);
						var session_id = data.session_id;
						var prospect_tracking_id = data.prospect_tracking_id;
						var performance_review_id = data.performance_review_id;
						var worklog_type = data.worklog_type;
						var actionable_id = data.actionable_id;
						if (worklog_type == 1) {
							worklog_type_name = "Internal";
						} else {
							worklog_type_name = "External";
						}
						$('.worklog_type').text(worklog_type_name);

						$('.worklog_medium').text(data.worklog_medium);
						$('.actionable_name').text(data.actionable_name);
						$('.duration').text(data.duration);
						$('.worklog_description').text(data.worklog_description);
						$('.session_name').text(data.session_name);
						$('#worklog_type').val(data.worklog_type);
						$('#prospect_tracking_id').val(data.prospect_tracking_id);
						$('#performance_review_id').val(data.performance_review_id);
						$('#session_id').val(data.session_id);
						$('.worklog_created_date').text(data.created_date);

						//render data to worklog edit modal
                        $('#pop_up_worklog_medium').val(data.worklog_medium).trigger('change');
						$('[name="pop_up_worklog_description"]').val(data.worklog_description);
						var duration = data.duration;
						var duration_array = duration.split(':');
						
						var hours =parseInt(duration_array[0]);
						
						$('[name="pop_up_hours"]').val(hours);
						$('[name="pop_up_minutes"]').val((duration_array[1]));


						// Depending on type of worklog and actionable show/hide sections

						// Actionale = NCA


						if (actionable_id == 7) {
							$('#tracking_info').show();
							$('.nca_field').prop('required', true);

						} else {
							$('#tracking_info').hide();
							$('.nca_field').prop('required', false);

						}

						// Actionale = Review


						if (actionable_id == 9) {
							$('#review_info').show();


							render_performance_review_common_data(performance_review_id);
							$('.review_field').prop('required', true);

						} else {
							$('#review_info').hide();
							$('.review_field').prop('required', false);

						}

						// Actionale = Facilitation || Facilitatiopn Assistance
						// Actionale = Practice Session  || Assistance Session


						if (actionable_id == 3 || actionable_id == 4 || actionable_id == 8 || actionable_id == 10) {

							$('#session_info').css('display', '');
							$('.create_session_field').prop('required', true);

						} else {
							$('#session_info').css('display', 'none');
							$('.create_session_field').prop('required', false);

						}

						render_common_session_data(session_id);
						// render_prospect_tracking_data(prospect_tracking_id);



						//render data in session tables
						var session_id = data.session_id;

						render_session_data(session_id);
					}
				});
			}

			//Get common session data

			function render_common_session_data(session_id) {

				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_session_details_by_id'); ?>",
					method: "POST",
					data: {
						session_id: session_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log("session details");

						console.log(data);
						if(data){
						$('.batch_name').text(data.batch_name);
						$('.actionable_name').text(data.actionable_name);
						$('.session_name').text(data.session_name);
						$('.session_date').text(data.session_date);
						$('.medium').text(data.medium);
						$('.facilitator_name').text(data.facilitator_name);
						$('.remark').text(data.remark);

						$('.session_template_name').text(data.session_template_name);
						$('.session_template_code').text(data.session_template_code);
						$('.participant_type').text(data.status_name);
						$('.coaching_program_type').text(data.coaching_program_type);
						$('.process_name').text(data.process_name);
						$('.topic').text(data.topic);
						$('.session_objective').text(data.session_objective);

						var session_type_id = data.session_type_id;

						var session_type = "";
						if (session_type_id == 1) {
							session_type = "Group";
						} else if (session_type_id == 2) {
							session_type = "Individual";

						} else {
							session_type = session_type_id;
						}

						$('.session_type').text(session_type);
					}
					}
				});
				return false;
			}


			//render session data

			function render_session_data(session_id) {

				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/get_session_sparrow_employee_list'); ?>",
					method: "POST",
					data: {
						session_id: session_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '<thead><th>Session Sparrow Team</th></thead><tbody><tr><td>';
						var html2 = '<thead><th>Session Participants</th></thead><tbody><tr><td>';
						var i;
						var j;
						var sparrow_employee_list = data.sparrow_employee;
						var participant_list = data.participant;


						//render session employee list 
						for (i = 0; i < sparrow_employee_list.length; i++) {
							html += sparrow_employee_list[i].sparrow_employee_name + '<br>';
						}
						html += '</td></tr></tbody>';
						$('#session_sparrow_employee_table').html(html);

						//render session participant list 
						for (j = 0; j < participant_list.length; j++) {
							html2 += participant_list[j].participant_name + '<br>';
						}
						html2 += '</td></tr></tbody>';
						$('#session_participant_table').html(html2);

						console.log(html2);

						//enable disable create session button
						$('#btn_create_session').prop('disabled', true);
						if (data.length == 0) {
							$('#btn_create_session').prop('disabled', false);
						}

					}
				});
				return false;
			}

			//function end

			//Get Prospect Tracking data

			// function render_prospect_tracking_data(prospect_tracking_id) {

			// 	$.ajax({
			// 		url: "<?php //echo site_url('worklog/worklog_master/get_prospect_tracking_details_by_id'); 
										?>",
			// 		method: "POST",
			// 		data: {
			// 			prospect_tracking_id: prospect_tracking_id
			// 		},
			// 		async: true,
			// 		dataType: 'json',
			// 		success: function(data) {
			// 			console.log(data);
			// 			$('.tracking_date').text(data.tracking_date);
			// 			$('.communication_type').text(data.status_name);
			// 			$('.tracking_description').text(data.tracking_description);
			// 			$('.tracking_status').text(data.tracking_status);
			// 			$('.next_action').text(data.next_action);
			// 			$('.next_action_date').text(data.next_action_date);

			// 			// var session_type_id = data.session_type_id;
			// 			// var session_for = data.session_for;
			// 			// if (session_type_id == 1) {
			// 			// 	$('.session_type').text("Facilitation");
			// 			// } else if (session_type_id == 2) {

			// 			// 	$('.session_type').text("Practice");
			// 			// } else {

			// 			// 	$('.session_type').text("NA");
			// 			// }
			// 			// //Session For
			// 			// if (session_for == 1) {
			// 			// 	$('.session_for').text("BH");
			// 			// } else if (session_for == 2) {

			// 			// 	$('.session_for').text("RM");
			// 			// } else if (session_for == 3) {

			// 			// 	$('.session_for').text("Staff");
			// 			// } else {

			// 			// 	$('.session_for').text("NA");
			// 			// }

			// 		}
			// 	});
			// 	return false;
			// }


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
						$('.company_name').text(data.company_name);
						$('.review_month').text(data.review_month + "-" + data.review_year);
					}
				});
				return false;
			}




		});
	</script>

	<script>
		function update_prospect_id(prospect_id, assigned_to) {
			$('#pop_up_prospect_id').val(prospect_id);
			$('#pop_up_spoc_id').val(assigned_to).trigger('change');
		}
	</script>

	<script type="text/javascript">
		$(document).on('click', '#add_sparrow_employee', function() {
			var session_id = $("#session_id").val();


			var sparrow_employee_checkbox = [];
			$.each($("input[name='sparrow_employee_checkbox']:checked"), function() {
				sparrow_employee_checkbox.push($(this).val());
			});

			if (session_id != "") {

				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/add_sparrow_employee_in_session'); ?>",
					type: "POST",
					data: {
						'session_id': session_id,
						'sparrow_employee_checkbox': sparrow_employee_checkbox
					},
					success: function(data) {
						// window.location.href = "<?php echo site_url('edit_worklog_pg2/' . $worklog_id); ?>";
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

		// Add Participants in session

		$(document).on('click', '#add_participant', function() {

			var session_id = $("#session_id").val();
			var company_contact_checkbox = [];
			$.each($("input[name='company_contact_checkbox']:checked"), function() {
				company_contact_checkbox.push($(this).val());
			});

			console.log(company_contact_checkbox);

			$.ajax({
				url: "<?php echo site_url('worklog/worklog_master/add_participant_in_session'); ?>",
				type: "POST",
				data: {
					'session_id': session_id,
					'company_contact_checkbox': company_contact_checkbox
				},
				success: function(data) {
					location.reload();
				},
				error: function(data) {
					alert("Failed!!");
				}
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
		$(document).ready(function() {

			$('#pop_up_joining_date').change(function() {

				var joining_date = $(this).val();

				var joining_date_formatted = new Date(joining_date);

				// Add 1 year to the selected date
				joining_date_formatted.setFullYear(joining_date_formatted.getFullYear() + 1);

				// Format the new date as YYYY-MM-DD
				var yearLater = joining_date_formatted.toISOString().split('T')[0];

				$('#pop_up_leaving_date').val(yearLater).trigger('change');


			});

		});
	</script>

	<script>
		$(document).ready(function() {

		});

		function save_attenadance(item) {
			var row = $(item).closest('tr');
			var attendance = $(item).val();

			var session_participant_id = row.find('td:first').text();

			$.ajax({
				url: "<?php echo site_url('worklog/session_master/update_participant_attendance'); ?>",
				type: "POST",
				data: {
					'session_participant_id': session_participant_id,
					'attendance': attendance
				},
				success: function(data) {
					// location.reload();
				},
				error: function(data) {
					alert("Failed!!");
				}
			});

		}


		function save_responsibility_type(item) {
			var row = $(item).closest('tr');
			var responsibility_type = $(item).val();

			var session_sparrow_employee_id = row.find('td:first').text();

			$.ajax({
				url: "<?php echo site_url('worklog/session_master/update_sparrow_employee_responsibility_type'); ?>",
				type: "POST",
				data: {
					'session_sparrow_employee_id': session_sparrow_employee_id,
					'responsibility_type': responsibility_type
				},
				success: function(data) {
					// location.reload();
				},
				error: function(data) {
					alert("Failed!!");
				}
			});

		}
	</script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$("#example12").DataTable();
			$("#example13").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

</body>

</html>
