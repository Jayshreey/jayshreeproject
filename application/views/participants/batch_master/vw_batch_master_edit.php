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
						<h5 class="page-title fs-21 mb-1">Batch Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<!-- <li class="breadcrumb-item" aria-current="page"> Master</li> -->
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_batch_master' ?>">Batch Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Batch Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('master/company_master/edit_customer_master_data'); ?>" method="post">

					<input type="hidden" id="batch_id" name="batch_id" value="<?php echo $batch_id ?>" required>

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
													Batch Information
												</div>
												<div class="prism-toggle">
													<button type="button" class="btn btn-sm btn-primary-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-batch"><i class="fe fe-edit-2 "></i></button>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Batch Name</dt>
															<dd class="col-sm-8 batch_name"></dd>

															<dt class="col-sm-4">Batch SPOC</dt>
															<dd class="col-sm-8 spoc_name"></dd>

															<dt class="col-sm-4">Type</dt>
															<dd class="col-sm-8 coaching_program_type"></dd>

															<dt class="col-sm-4">Medium</dt>
															<dd class="col-sm-8 mode"></dd>


														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Location</dt>
															<dd class="col-sm-6 locality"></dd>

															<dt class="col-sm-6">Day</dt>
															<dd class="col-sm-6 day"></dd>

															<dt class="col-sm-6">Timing</dt>
															<dd class="col-sm-6 timing"></dd>

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
											data-bs-target="#modal-add-participant">
											Add Participant
										</button>
									</div>

									<div class="table-responsive">
										<table id="example1" class="table table-bordered text-nowrap w-100">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th style="display: none;">Participant Id</th>
													<th>Participant Name</th>
													<th>Company Name</th>
													<th>Responsibility / Role</th>
													<th>Joining Date</th>
													<th>Leaving Date</th>
													<th>Validity</th>
													<th>Subscription ID</th>
													<th>Remark</th>
													<?php foreach ($external_actionable_list as $row) : ?>
														<th><?php echo $row->actionable_name; ?></th>
													<?php endforeach; ?>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 0;
												// echo '<pre>'; print_r($participant_list);die;
												foreach ($participant_list as $row) :
													$no++;
													$participant_id = $row->entity_id;

													$privilege_id =  $row->privilege_id;
													$Validity =  $row->validity;

													switch ($Validity) {
														case null:
															$validity = "Pending";
															break;

														case "0":
															$validity = "Pending";
															break;

														case 1:
															$validity = "Valid";
															break;

														case 2:
															$validity = "In-Valid";
															break;

														default:
															$validity = $Validity;

															break;
													}




												?>
													<tr>
														<td><?php echo $no; ?></td>
														<td style="display: none;" class="participant_id" id="participant_id"><?php echo $participant_id; ?></td>
														<td><?php echo $row->first_name . " " . $row->last_name; ?></td>
														<td><?php echo $row->company_name; ?></td>
														<td><?php echo $row->role_name; ?></td>
														<td><?php echo $row->joining_date; ?></td>
														<td><?php echo $row->leaving_date; ?></td>
														<td><?php echo $validity; ?></td>
														<td><?php echo $row->subscription_id; ?></td>
														<td><?php echo $row->remark; ?></td>
														<?php  foreach ($external_actionable_list as $row) :
																$actionable_id = $row->entity_id;
																$this->db->select('*');
																$this->db->from('session_master');
																$this->db->join('session_participant_relation', 'session_participant_relation.session_id = session_master.entity_id', '');
																$where = '(session_master.actionable_id = "' . $actionable_id . '" and session_participant_relation.attendance = 1  and session_participant_relation.company_contact_id = "' . $participant_id . '")';
																$this->db->where($where);
																$session_attendance_query = $this->db->get();
																$session_attendance_num_rows = $session_attendance_query->num_rows(); ?>
														<td><?php echo $session_attendance_num_rows; ?></td>
													<?php endforeach;
													?>
														<td><a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#modal-quick-edit-participant" onclick="update_participant_id(<?php echo $participant_id; ?>)">Quick Edit</a></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>

								<div class="card-body">
									<center>
										<a href="<?php echo base_url('vw_batch_master'); ?>" class="btn btn-primary">Close</a>
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

	<div class="modal fade" id="modal-add-participant" tabindex="-1"
		aria-labelledby="modal-add-participant" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Select Participants
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php //echo site_url('master/company_master/add_new_contact_person'); 
																														?>" method="post">

						<input type="hidden" name="pop_up_batch_id" value="<?php echo $batch_id; ?>">

						<div class="row gy-4">
							<div class="table-responsive">
								<table id="example2" class="table table-bordered text-nowrap w-100">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Entity_id</th>
											<th>Company name</th>
											<th>Company Contact Name</th>
											<th>Responsibility</th>
										</tr>
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
												<td><?php echo $no; ?></td>
												<td><input type="checkbox" class="checkboxes" id="company_contact_checkbox" name="company_contact_checkbox" value="<?php echo $company_contact_id ?>"></td>
												<td>
													<?php echo $row->company_name; ?>
												</td>
												<td>
													<?php echo $row->first_name . " " . $row->last_name; ?>
												</td>
												<td>
													<?php echo $row->role_name; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

						</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="add_participant">Add Participants</button>
				</div>
			</div>
		</div>
	</div>

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
									<option value="">No Selected</option>
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


	<!-- modal start -->

	<div class="modal fade" id="modal-edit-batch" tabindex="-1"
		aria-labelledby="modal-edit-batch" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Batch
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php echo site_url('participants/batch_master/update_batch_details'); ?>" method="post">

						<input type="hidden" id="pop_up_batch_id" name="pop_up_batch_id" value="<?php echo $batch_id ?>" required>


						<div class="row gy-4">


							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;"> ( LSDP / SSDP)</span></p>
								<select class="form-select batch_fields" id="pop_up_coaching_program_type_id" name="pop_up_coaching_program_type_id" required>
									<option value="">Select Session Type</option>
									<?php foreach ($coaching_program_type_list as $coaching_program_type) : ?>
										<option value="<?php echo $coaching_program_type->entity_id; ?>"><?php echo $coaching_program_type->coaching_program_type; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Medium<span style="color: #FF0000;"></span></p>
								<select class="form-select batch_fields" id="pop_up_mode" name="pop_up_mode" required>
									<option value="">Select Mode</option>
									<option value="Online">Online</option>
									<option value="Offline">Offline</option>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Location<span style="color: #FF0000;"> ( If Offline )</span></label>
								<input type="text" class="form-control batch_fields" name="pop_up_locality" id="pop_up_locality" placeholder="Enter Locality" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Day<span style="color: #FF0000;">*</span></label>
								<select class="form-select batch_fields" id="pop_up_day" name="pop_up_day" required>
									<option value="">Select Day</option>
									<option value="MON">Monday</option>
									<option value="TUE">Tuesday</option>
									<option value="WED">Wednesday</option>
									<option value="THU">Thursday</option>
									<option value="FRI">Friday</option>
									<option value="SAT">Saturday</option>
									<option value="SUN">Sunday</option>
								</select>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Timing<span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control batch_fields" name="pop_up_timing" id="pop_up_timing" placeholder="Enter Timing" required>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">Batch SPOC<span style="color: #FF0000;">*</span></p>
								<select class="form-select batch_fields" id="pop_up_spoc_id" name="pop_up_spoc_id">
									<option value="">Select SPOC</option>
									<?php foreach ($spoc_list as $spoc) : ?>
										<option value="<?php echo $spoc->entity_id; ?>"><?php echo $spoc->spoc_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label for="input-placeholder" class="fw-semibold mb-2">Batch Name<span style="color: #FF0000;">*</span></label>
								<input type="text" class="form-control" name="pop_up_batch_name" id="pop_up_batch_name" placeholder="Enter Batch Name" required>
							</div>

							<input type="hidden" name="status" value="1">






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
				var batch_id = $('[name="batch_id"]').val();

				$.ajax({
					url: "<?php echo site_url('participants/batch_master/get_batch_details_by_id'); ?>",
					method: "POST",
					data: {
						batch_id: batch_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.batch_name').text(data.batch_name);
						$('.spoc_name').text(data.spoc_name);
						$('.mode').text(data.mode);
						$('.locality').text(data.locality);
						$('.day').text(data.day);
						$('.timing').text(data.timing);
						$('.coaching_program_type').text(data.coaching_program_type);


						// render data to edit modal

						$('[name=pop_up_batch_name]').val(data.batch_name);
						$('[name=pop_up_spoc_id]').val(data.spoc_id).trigger('change');
						$('[name=pop_up_mode]').val(data.mode).trigger('change');
						$('[name=pop_up_locality]').val(data.locality);
						$('[name=pop_up_day]').val(data.day).trigger('change');
						$('[name=pop_up_timing]').val(data.timing);
						$('[name=pop_up_coaching_program_type_id]').val(data.coaching_program_type_id).trigger('change');

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
					$('#pop_up_validity').val(data.validity).trigger('change');
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
	</script>

</body>

</html>
