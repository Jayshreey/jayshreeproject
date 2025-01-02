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
						<h5 class="page-title fs-21 mb-1">Session Template Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<!-- <li class="breadcrumb-item" aria-current="page"> Master</li> -->
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_session_template_master' ?>">Session Template Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Session Template Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/edit_customer_master_data'); ?>" method="post">

					<input type="hidden" id="session_template_id" name="session_template_id" value="<?php echo $session_template_id ?>" required>

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
													Session Template Information
												</div>
												<div class="prism-toggle">
												<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
												data-bs-target="#modal-edit-session-template"><i class="fe fe-edit-2 "></i></a>
													<!-- <button type="button" class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button> -->
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Session Template Name</dt>
															<dd id="session_template_name" class="col-sm-8 session_template_name" ></dd>

															<dt class="col-sm-4">Template Code</dt>
															<dd class="col-sm-8 session_template_code"></dd>

															<dt class="col-sm-4">Participant Type</dt>
															<dd class="col-sm-8 participant_type"></dd>

															<dt class="col-sm-4">Group/Individual</dt>
															<dd class="col-sm-8 session_type"></dd>

															<dt class="col-sm-4">Session Type</dt>
															<dd class="col-sm-8 actionable_name"></dd>

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
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-6 -->




									<!-- </div> -->
									<hr>
									<!-- <div class="card-body"> -->
									<div class="mb-4">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal"
											data-bs-target="#modal-add-session">
											Add Session
										</button>
									</div>

									<div class="card-body">
										<div class="table-responsive">
											<table id="example1" class="table table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th>Sr. No.</th>
														<th>Session Date</th>
														<th>Batch Name</th>
														<!-- <th>Session Type</th>
														<th>Remark</th> -->
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 0;
													//echo '<pre>'; print_r($customer_details);die;
													foreach ($session_list as $row) :
														$no++;
														$session_id = $row->session_id;
													


													?>
														<tr>
															<td><?php echo $no. $row->session_id; ?></td>
															<td>
																<?php echo $row->session_date; ?>
															</td>
															<td>
																<?php echo $row->batch_name; ?>
															</td>
															<!-- <td>
																<?php echo ($row->session_type_id ==1)?"Group": "Individual"; ?>
															</td>
															<td>
																<?php echo $row->remark; ?>
															</td> -->
															<td>
																<!-- <a href="<?php echo site_url('edit_session/' . $session_id); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> -->
																<button type="button" class="btn btn-primary" data-bs-toggle="modal"  class="btn btn-sm btn-info"
																	data-bs-target="#modal-edit-session-batch" onclick="update_session_batch(<?php echo $session_id; ?>)">
																	<i class="fas fa-edit"></i>
																</button>
															</td>

														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card-body">
									<center>
										<a href="<?php echo base_url('vw_session_template_master'); ?>" class="btn btn-primary">Close</a>
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

						<input type="hidden" id="pop_up_session_template_id"  name="pop_up_session_template_id" value="<?php echo $session_template_id; ?>">

						
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" style="display: none;" >
								<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
								<select class="js-example-basic-single" data-trigger id="pop_up_actionable_id" name="pop_up_actionable_id" required>
									<option value="3">Facilitation</option>
								</select>
							</div>

						<div class="row gy-4">

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
								<input type="date" class="form-control" name="pop_up_session_date" id="pop_up_session_date" placeholder="Select Session date">
							</div>

							<div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
									<option value="">Select Batch</option>
									<?php foreach ($batch_list as $batch) : ?>
										<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
									<?php endforeach; ?>
								</select>
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
									<center>
									<p><small style="color: #FF0000;">Session Template is By Default for Group Session & for Group Only</small></p>
									<p><small style="color: #FF0000;">Medium will be decided while creating worklog</small></p>
									</center>
									<br>

						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="add_session">Save Session</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal End -->

	<!-- Modal Start -->

	<div class="modal fade" id="modal-edit-session-batch" tabindex="-1"
		aria-labelledby="modal-edit-session-batch" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Session 
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="session_batch_edit" id="session_batch_edit" action="<?php echo site_url('worklog/session_master/update_session_batch'); ?>" method="post">

						<input type="hidden" id="pop_up_session_id" name="pop_up_session_id" value="<?php //echo $session_id; ?>">
                        <input type="hidden" id="batch_session_template_id" name="batch_session_template_id" value="<?php echo $session_template_id; ?>">
						<input type="hidden" id="current_session_batch_id" name="current_session_batch_id" value="">

						<div class="row gy-4">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_session_batch_id" name="pop_up_session_batch_id" required>
									<option value="">Select Batch</option>
									<?php foreach ($batch_list as $batch) : ?>
										<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							

						</div>
						<!-- <br>
						<center>
						<p><small style="color: #FF0000;">Session Template is By Default for Group Session & for Group Only</small></p>
						<p><small style="color: #FF0000;">Medium will be decided while creating worklog</small></p>
						</center>
						<br> -->

						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="update_session">Update Batch Session</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal End -->

	<!-- modal start -->

	<div class="modal fade" id="modal-quick-edit-participant" tabindex="-1"
		aria-labelledby="modal-quick-edit-participant" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Quick Edit Participant
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php echo site_url('participants/batch_master/quick_update_participant'); ?>" method="post">

						<input type="hidden" id="pop_up_company_id" name="pop_up_company_id">
						<input type="hidden" id="pop_up_company_contact_id" name="pop_up_company_contact_id">
						<input type="hidden" id="pop_up_participant_id" name="pop_up_participant_id">
						<input type="hidden" id="pop_up_subscription_id" name="pop_up_subscription_id">

						<div class="row gy-6">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Select Batch <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
									<option value="">No Selected</option>
									<?php foreach ($batch_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->batch_name; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Validity<span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_validity" name="pop_up_validity">
									<option value=null>No Selected</option>
									<option value=null>Pending</option>
									<option value="1">Valid</option>
									<option value="2">In-Valid</option>
								</select>
							</div>

						</div>

						<div class="row gy-4">


							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Joining date<span style="color: #FF0000;">*</span></label>
								<input type="date" class="form-control" id="pop_up_joining_date" name="pop_up_joining_date" required>

							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Leaving date<span style="color: #FF0000;">*</span></label>
								<input type="date" class="form-control" id="pop_up_leaving_date" name="pop_up_leaving_date" required>

							</div>
							<!-- 
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Select SPOC <span style="color: #FF0000;">*</span></label>
								<select class="form-select" id="pop_up_spoc_id" name="pop_up_spoc_id" required>
									<option value="">No Selected</option>
									<?php foreach ($spoc_list as $key => $value) {
									?>
										<option value="<?php echo $value->entity_id; ?>"><?php echo $value->first_name; ?></option>
									<?php } ?>
								</select>
							</div> -->


							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="add_address" id="add_address" class="btn btn-primary">Save</button>
							</div>


						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- modal end -->

<!-- modal session Template start -->

<div class="modal fade" id="modal-edit-session-template" tabindex="-1"
		aria-labelledby="modal-edit-session-template" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Session Template
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="session_master" action="<?php echo site_url('worklog/session_master/update_session_template_master'); ?>" method="post">

						 <input type="hidden" id="pop_up_session_temp_id" name="pop_up_session_temp_id">
						
						<div class="row gy-6">
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></label>
								<select class="form-select template_field pop_up_coaching_program_type_id" id="coaching_program_type_id" name="coaching_program_type_id" required>
									<option value="">Select Coaching Program Type</option>
									<?php foreach ($coaching_program_type_list as $coaching_program_type) : ?>
										<option value="<?php echo $coaching_program_type->entity_id; ?>"><?php echo $coaching_program_type->coaching_program_type; ?></option>
									<?php endforeach; ?>
								</select>
							</div>


							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Participant Type<span style="color: #FF0000;">*</span></p>
								<select class="form-select template_field pop_up_session_for" data-trigger id="session_for" name="session_for" required>
									<option value="">Select Session For</option>
									<?php foreach ($session_for_list as $session_for) : ?>
										<option value="<?php echo $session_for->entity_id; ?>"><?php echo $session_for->status_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

									

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Process<span style="color: #FF0000;">*</span></label>
								<select class="form-select template_field pop_up_process_id" id="process_id" name="process_id" required>
									<option value="">Select Process</option>
									<!-- <?php foreach ($process_list as $process) : ?>
										<option value="<?php echo $process->entity_id; ?>"><?php echo $process->process_name; ?></option>
									<?php endforeach; ?> -->
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
								<input type="text" class="form-control template_field pop_up_topic" name="topic" id="topic" placeholder="Enter Topic" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Session Objective<span style="color: #FF0000;"></span></label>
								<textarea class="form-control pop_up_session_objective" name="session_objective" id="session_objective" placeholder="Enter Session Objective" required></textarea>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Session Template Name<span style="color: #FF0000;"></span></label>
								<input type="text" class="form-control pop_up_session_template_name" name="session_template_name" id="session_template_name" placeholder="Enter Session Template Name" required>
							</div>

						
								<input type="hidden" name="status" id="status" value="1">

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="add_address" id="add_address" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
</div>
	<!-- modal Session Template end -->

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
				var session_template_id = $('[name="session_template_id"]').val();

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_session_template_details_by_id'); ?>",
					method: "POST",
					data: {
						session_template_id: session_template_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.session_template_name').text(data.session_template_name);
						$('.session_template_code').text(data.session_template_code);
						$('.participant_type').text(data.status_name);
						$('.coaching_program_type').text(data.coaching_program_type);
						$('.process_name').text(data.process_name);
						$('.topic').text(data.topic);
						$('.session_objective').text(data.session_objective);
						$('.actionable_name').text(data.actionable_name);

						var session_type_id = data.session_type_id;
						var session_type = "";
						if(session_type_id ==1){
							session_type = "Group";
						}else if(session_type_id ==2){
							session_type = "Individual";
						}else{
							session_type = session_type_id;
						}

						$('.session_type').text(session_type);
						$('#pop_up_session_temp_id').val(session_template_id);
                        $('.pop_up_coaching_program_type_id').val(data.coaching_program_type_id).trigger('change');
						$('.pop_up_session_for').val(data.session_for).trigger('change');
						$('.pop_up_process_id').val(data.process_id).trigger('change');
						$('.pop_up_topic').val(data.topic);
						$('.pop_up_session_objective').val(data.session_objective);
						$('.pop_up_session_template_name').val(data.session_template_name);
		
					}
				});
			}

			// $('#pop_up_batch_id').change(function() {
			// 	var batch_name = $(this).find("option:selected").text();
			// 	var session_template_name = $('#session_template_name').text();

			// 	$('#pop_up_session_name').val(session_template_name+" Batch("+batch_name+")")
		
			// });

		});

		 // Get form element
		 const form = document.getElementById('session_batch_edit');

		// Add submit event listener
		form.addEventListener('submit', function(event) {
			// Show confirmation dialog before submitting
			const isConfirmed = confirm('Please check the Worklog entries for the participants in this batch. Do you really want to update the batch?');
			if (!isConfirmed) {
				event.preventDefault(); // Prevent form submission if not confirmed
			}
		});
		function update_session_batch(session_id) {
			$.ajax({
				url: "<?php echo site_url('worklog/session_master/get_session_details_by_id'); ?>",
				method: "POST",
				data: {
					session_id: session_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					$('#pop_up_session_batch_id').val(data.batch_id).trigger('change');
					$('#current_session_batch_id').val(data.batch_id);
					$('#pop_up_session_id').val(data.entity_id);
				}
			});
		}
	</script>


	<script type="text/javascript">
		$(document).on('click', '#add_participant', function() {
			var batch_id = $("#batch_id").val();


			var company_contact_checkbox = [];
			$.each($("input[name='company_contact_checkbox']:checked"), function() {
				company_contact_checkbox.push($(this).val());
			});
			if (batch_id != "") {

				$.ajax({
					url: "<?php echo site_url('participants/batch_master/add_participant_in_batch'); ?>",
					type: "POST",
					data: {
						'batch_id': batch_id,
						'company_contact_checkbox': company_contact_checkbox
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


	<script>
		function update_participant_id(participant_id) {

			$.ajax({
				url: "<?php echo site_url('participants/participant_master/get_participant_details_by_id'); ?>",
				method: "POST",
				data: {
					participant_id: participant_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					$('#pop_up_participant_id').val(data.entity_id);
					$('#pop_up_company_id').val(data.company_id);
					$('#pop_up_company_contact_id').val(data.company_contact_id);
					$('#pop_up_subscription_id').val(data.subscription_id);
					$('#pop_up_batch_id').val(data.batch_id).trigger('change');
					$('#pop_up_coaching_program_id').val(data.coaching_program_id).trigger('change');
					$('#pop_up_joining_date').val(data.joining_date).trigger('change');
					$('#pop_up_leaving_date').val(data.leaving_date).trigger('change');
					$('#pop_up_spoc_id').val(data.spoc_id).trigger('change');
				}
			});



		}
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

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	
		$(document).ready(function() {
			$('#coaching_program_type_id').change(function() {
				var coaching_program_type_id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_process_list_by_coaching_program_type'); ?>",
					method: "POST",
					data: {
						coaching_program_type_id: coaching_program_type_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						var process_options = '<option value="">Select Process</option>';

						for (i = 0; i < data.length; i++) {
							process_options += '<option value=' + data[i].entity_id + '>' + data[i].process_name + '</option>';
						}
						console.log(process_options);
						$('#process_id').html(process_options);

					}
				});
				return false;
			});
		});
	
		$(document).ready(function() {
			$('.template_field').change(function() {
				var coaching_program_type = $('#coaching_program_type_id option:selected').text();
				var session_for = $('#session_for option:selected').val();
				var process_id = $('#process_id option:selected').val();
				var topic = $('#topic').val();

				var session_for_slug ="";

				// Call the async function
				generate_template_name(coaching_program_type,session_for,process_id,topic);

			});

		});

		

		async function generate_template_name(coaching_program_type,session_for,process_id,topic) {
				
				if (session_for && process_id) {
					try {
						// Wait for the promise to resolve and store the result
						session_for_slug = await get_session_for_slug(session_for);
						process_slug = await get_process_slug(process_id);
					
						$('#session_template_name').val(coaching_program_type + " " + session_for_slug + " " + process_slug + " " + topic);
					} catch (error) {
						// Handle any errors from the promise
						session_for_slug = "";
						process_slug = "";
						$('#session_template_name').val(coaching_program_type + " " + session_for_slug + " " + process_slug + " - " + topic);
					}
				}

			}


		function get_session_for_slug(session_for) {

			return new Promise(function(resolve, reject) {

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_session_for_slug'); ?>",
					method: "POST",
					data: {
						session_for: session_for
					},
					async: false,
					dataType: 'json',
					success: function(data) {
						resolve(data);
					},
					error: function(error) {
						reject(error);
					}

				});
			});

		}

		function get_process_slug(process_id) {

			return new Promise(function(resolve, reject) {

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_process_slug'); ?>",
					method: "POST",
					data: {
						process_id: process_id
					},
					async: false,
					dataType: 'json',
					success: function(data) {
						resolve(data);
					},
					error: function(error) {
						reject(error);
					}

				});
			});

		}
				
	</script>
</body>

</html>
