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
						<h5 class="page-title fs-21 mb-1">Participant Attendance</h5>
						<nav>

							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Worklog</a></li>
								<li class="breadcrumb-item active" aria-current="page">Session Attendance</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<!-- Start:: row-4 -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card custom-card">
							<div class="card-body">
								<div class="row gy-6">

									<div class="row gy-6">

										<div class="card-header justify-content-between">
											<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Participant Group Session Attendance</div>
										</div>

										<form role="form" name="customer_master" action="<?php echo site_url('worklog/worklog_master/generate_participant_attendance'); ?>" method="post">
											
										<div class="card-header justify-content-between">

											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
												<select class="js-example-placeholder-multiple" placeholder="hello" multiple="multiple" id="months" name="months[]" required>
													<?php foreach ($month_array as $key => $month) : ?>
														<option value="<?php echo $key; ?>" <?php echo (in_array($key,$selected_months))?"selected" : ""; ?>><?php echo $month; ?></option>
													<?php endforeach; ?>
												</select>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
												<select class="form-select" id="batch_id" name="batch_id" required>
													<option value="">Select Batch</option>
													<?php foreach ($batch_list as $batch) : ?>
														<option value="<?php echo $batch->entity_id; ?>" <?php echo($batch->entity_id ==$batch_id)? "selected" : "";?> ><?php echo $batch->batch_name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>




											<!-- <div id="add_suggestion" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 btn btn-sm btn-light" > -->
												<button type="submit" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 btn btn-light" >Re-Calculate</button>
											<!-- </div> -->
										</div>
										
										</form>
									</div>

								</div>

								<!-- </div> -->
								<br>
								<div class="table-responsive">
									<table id="example11" class="table table-bordered text-nowrap w-100">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Company Name</th>
												<th>Participant Name</th>
												<?php foreach ($session_data as $key => $value) {
												?>
													<th><?php echo $value; ?></th>
												<?php }	 ?>
												<th>Total</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;

											//echo '<pre>'; print_r($customer_details);die;
											foreach ($participant_data as $key1 => $row1) :
												$no++;
												$company_contact_id = $key1;

											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td>
														<?php echo $row1[1]; ?>
													</td>
													<td>
														<?php echo $row1[0]; ?>
													</td>
													<?php

													$cumulative_delivery = 0;
													$cumulative_attendance = 0;
													foreach ($session_data as $key2 => $value2) {



														//cumulative delivery
														$this->db->select('*');
														$this->db->from('session_participant_relation');
														$this->db->join('session_master', 'session_master.entity_id = session_participant_relation.session_id', 'inner');
														$this->db->join('worklog_master', 'worklog_master.session_id = session_participant_relation.session_id', 'inner');
														$where = '(session_participant_relation.company_contact_id = "' . $company_contact_id . '" and session_master.actionable_id = 3 and session_participant_relation.session_id = "' . $key2 . '" )';
														$this->db->where($where);
														$session_query = $this->db->get();
														$session_num_rows = $session_query->num_rows();

														if ($session_num_rows > 0) {
															$cumulative_delivery ++;
														}

														//cumulative Attendance
														$this->db->select('*');
														$this->db->from('session_participant_relation');
														$this->db->join('session_master', 'session_master.entity_id = session_participant_relation.session_id', 'inner');
														//$this->db->join('worklog_master', 'worklog_master.session_id = session_participant_relation.session_id', 'inner');
														$where = '(session_participant_relation.company_contact_id = "' . $company_contact_id . '" and session_master.actionable_id = 3 and session_participant_relation.attendance = 1 and session_participant_relation.session_id = "' . $key2 . '" )';
														$this->db->where($where);
														$session_attendance_query = $this->db->get();
														$session_attendance_num_rows = $session_attendance_query->num_rows();

														if ($session_attendance_num_rows > 0) {
															$cumulative_attendance += 1;
														}



													?>
														<td>
															<?php echo ($session_attendance_num_rows) ? "P" : ""; ?>
														</td>
													<?php }	?>
													<td><?php echo $cumulative_attendance . " / " . $cumulative_delivery; ?></td>


												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End:: row-4 -->

			</div>
		</div>
		<!-- End::app-content -->

		<!-- modal start -->

		<div class="modal fade" id="modal-generate-participant-attendance" tabindex="-1"
			aria-labelledby="modal-generate-participant-attendance" data-bs-keyboard="false"
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

							<div class="row gy-8">


								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<p class="fw-semibold mb-2">Batch<span style="color: #FF0000;"></span></p>
									<select class="form-select" id="batch_id" name="batch_id" required>
										<option value="">Select Batch</option>
										<?php foreach ($batch_list as $batch) : ?>
											<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

							</div>




							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<button type="submit" name="add_address" id="add_address" class="btn btn-primary">Convert to Participant</button>
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


	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>













	<!-- Scroll To Top -->
	<div class="scrollToTop">
		<span class="arrow"><i class="las la-angle-double-up"></i></span>
	</div>
	<div id="responsive-overlay"></div>

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

	<!-- Internal Datatables JS -->
	<script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/datatables.js' ?>"></script>

	<!-- Custom JS -->
	<!-- <script src="<?php echo base_url() . 'assets/HTML/dist/assets/js/custom.js' ?>"></script> -->

	<!-- Page script -->
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

	<script>
		$(document).ready(function() {
			$('#actionable_id').change(function() {
				var actionable_id = $(this).val();
				if (actionable_id) {
					window.location.href = "<?php base_url('vw_participant_attendance_master/'); ?>" + actionable_id;
				}
			});
		});
	</script>

</body>

</html>
