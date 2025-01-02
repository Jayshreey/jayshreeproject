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

	<!-- Jsvector Maps -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/jsvectormap/css/jsvectormap.min.css' ?>">

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
						<h5 class="page-title fs-21 mb-1">Attendance</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Worklog</a></li>
								<li class="breadcrumb-item active" aria-current="page">Attendance</li>
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

									<div class="card-header justify-content-between">
										<div class="card-title col-xl-4 col-lg-6 col-md-8 col-sm-12">Attendance</div>
										<div id="add_suggestion" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 btn btn-sm ">
											<select class="form-select" style="background-color: transparent;" data-trigger id="attendance_month" name="attendance_month" required>
												<?php

												foreach ($month_array as $key => $value) {
												?>
													<option value="<?php echo $key; ?>" <?php echo($attendance_month ==$key)? "selected" : ""; ?>><?php echo $value; ?></option>
												<?php } ?>

											</select>
										</div>
									</div>

								</div>
<br>
								<div class="table-responsive">
									<table id="example11" class="table table-bordered text-nowrap w-100">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Employee Name</th>
												<?php for ($i = 1; $i <= 31; $i++) {
												?>
													<th><?php echo $i; ?></th>
												<?php 	} ?>
												<th>Total</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
										
											//echo '<pre>'; print_r($customer_details);die;
											foreach ($sparrow_employee_list as $row) :
												$no++;
												$sparrow_employee_id = $row->entity_id;

												$Status = $row->status;

												switch ($Status) {
													case null:

													case 1:
														$status = "Active";
														break;

													case 2:
														$status = "In-Active";
														break;

													default:
														$status = $Status;
														break;
												}




											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td>
														<?php echo $row->first_name . " " . $row->last_name; ?>
													</td>
												
													<?php 
														$monthly_attendance = 0;
													for ($i = 1; $i <= 31; $i++) {

														$i_date = str_pad($i,2,"0",STR_PAD_LEFT);
														$attendance_date = date('Y-m-' . $i_date, strtotime($attendance_month));


														$this->db->select('*');
														$this->db->from('worklog_master');
														//$this->db->join('','','');
														$where = '(sparrow_employee_id = "' . $sparrow_employee_id . '" and worklog_date = "' . $attendance_date . '")';
														$this->db->where($where);
														$worklog_query = $this->db->get();
														$worklog_num_rows = $worklog_query->num_rows();

														if($worklog_num_rows >0){
															$monthly_attendance ++;
														}



													?>
														<td>
															<?php echo ($worklog_num_rows) ? "P" : ""; ?>
														</td>
													<?php 	} ?>
													<td><?php echo $monthly_attendance; ?></td>


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

							<input type="hidden" name="pop_up_prospect_id">

							<div class="row gy-6">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Select Batch <span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_batch" name="pop_up_batch" required>
										<option value="">No Selected</option>
										<?php foreach ($batch_list as $key => $value) {
										?>
											<option value="<?php echo $value->entity_id; ?>"><?php echo $value->batch_name; ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Select Coaching Program <span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_coaching_program_id" name="pop_up_coaching_program_id" required>
										<option value="">No Selected</option>
										<?php foreach ($coaching_program_list as $key => $value) {
										?>
											<option value="<?php echo $value->entity_id; ?>"><?php echo $value->coaching_program_name; ?></option>
										<?php } ?>
									</select>
								</div>

							</div>

							<div class="row gy-4">

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Select SPOC <span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_spoc_id" name="pop_up_spoc_id" required>
										<option value="">No Selected</option>
										<?php foreach ($spoc_list as $key => $value) {
										?>
											<option value="<?php echo $value->entity_id; ?>"><?php echo $value->spoc_name; ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Joining date<span style="color: #FF0000;">*</span></label>
									<input type="date" class="form-control" id="pop_up_joining_date" name="pop_up_joining_date" required>

								</div>



								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-bs-dismiss="modal">Close</button>
									<button type="submit" name="add_address" id="add_address" class="btn btn-primary">Convert to Participant</button>
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


	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>













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
	$(document).ready(function(){
		$('#attendance_month').change(function(){
			var attendance_month = $(this).val();
			if (attendance_month) {
            window.location.href = "<?php base_url('vw_attendance_master/');?>"+attendance_month;
        }
		});
	});
	</script>

</body>

</html>
