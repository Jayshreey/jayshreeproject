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
						<h5 class="page-title fs-21 mb-1">Level Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_coaching_program_master' ?>">Level Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Level Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('participants/coaching_program_master/update_coaching_program'); ?>" method="post">


					<input type="hidden" id="coaching_program_id" name="coaching_program_id" value="<?php echo $coaching_program_id ?>" required>
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
													Level Information
												</div>
												<div class="prism-toggle">
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-coaching-program"><i class="fe fe-edit-2 "></i></a>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Level</dt>
															<dd class="col-sm-8 coaching_program_name"></dd>

															<dt class="col-sm-4">Status</dt>
															<dd class="col-sm-8 status"></dd>


														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Remark</dt>
															<dd class="col-sm-6 remark"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>

									<hr>
									<!-- End:: row-6 -->

									<!-- //deliverables -->

									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Level Deliverables
												</div>
												<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#"  ><i class="fas fa-plus"></i>
															</div>

											</div>
											<div class="card-body">
											<div class="table-responsive">
										<table id="example11" class="table table-bordered text-nowrap w-100">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th style="display: none;">Assignment Relation Id</th>
													<th>Deliverable</th>
													<th>Included</th>
													<th>Details </th>
													<th>Remark</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 0;
												// echo '<pre>'; print_r($coaching_program_deliverable_list);
												foreach ($coaching_program_deliverable_list as $row) :
													$no++;
													$coaching_program_deliverable_relation_id = $row->entity_id;
													$value_type = $row->value_type;
													$value = $row->value;
													$uom_name = $row->uom_name;

													//details
													if ($value_type == 1){
														$details =  ($value ==1)?"Inculded":"";
													} else{
														$details =  $value;

													}

													//uom decode

													if($value >0){
														$uom_name = $row->uom_name;
														
													} else{
														
														$uom_name = "";
													}
													


													if($value_type ==1 && $value==1	){
														$html = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
													}elseif($value_type ==1 && $value != 1){
														$html = "";		
													}elseif ($value_type ==2 && $value >0) {
															$html = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
													}elseif ($value_type ==2 && $value ==0) {
														$html ="";
													}


												?>
													<tr>
														<td><?php echo $no; ?></td>
														<td style="display: none;" class="coaching_program_deliverable_relation_id" id="coaching_program_deliverable_relation_id"><?php echo $coaching_program_deliverable_relation_id; ?></td>
														<td><?php echo $row->deliverable_name; ?></td>
														
														<td class="text-success" style="text-align: center;">
														<?php echo $html;?>
														</td>
														
														<td> 
															<?php echo $details." ".$uom_name; ?>
														</td>

														<td>
															<?php echo $row->remark; ?>
														</td>

														<td>
															<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#modal-edit-deliverable" onclick="update_deliverable_details(<?php echo $coaching_program_deliverable_relation_id;?>)"><i class="fe fe-edit-2 "></i></a></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									</div>

										</div>
									</div>

									<hr>

									<!-- //Assignmens -->

									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Level Assignments
												</div>
												<div id="add_suggestion" class="col-xl-1 col-lg-1 col-md-1 col-sm-12 btn btn-sm btn-light" data-bs-toggle="modal"
																data-bs-target="#modal-add-assignment"><i class="fas fa-plus"></i>
															</div>

											</div>
											<div class="card-body">
											<div class="table-responsive">
										<table id="example11" class="table table-bordered text-nowrap w-100">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th style="display: none;">Participant Id</th>
													<th>Assignment</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 0;
												// echo '<pre>'; print_r($participant_list);die;
												foreach ($coaching_program_assignment_list as $row) :
													$no++;
													$coaching_program_assignment_relation_id = $row->entity_id;




												?>
													<tr>
														<td><?php echo $no; ?></td>
														<td style="display: none;" class="coaching_program_assignment_relation_id" id="coaching_program_assignment_relation_id"><?php echo $coaching_program_assignment_relation_id; ?></td>
														<td><?php echo $row->assignment_name; ?></td>

														<td><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
																data-bs-target="#modal-quick-edit-participant" onclick="update_participant_id(<?php //echo $coaching_program_assignment_relation_id; 
																																																							?>)"><i class="fe fe-trash"></a></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									</div>

										</div>
									</div>

								</div>




								<div class="card-body">
									<center>
										<button type="submit" class="btn btn-primary">Update</button>
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

	<!--Coaching Program Edit modal start -->

	<div class="modal fade" id="modal-edit-coaching-program" tabindex="-1"
		aria-labelledby="modal-edit-coaching-program" data-bs-keyboard="false"
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
				<form role="form" name="customer_master" action="<?php echo site_url('participants/coaching_program_master/update_coaching_program'); ?>" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-xl-12">
								<!-- <div class="card custom-card"> -->
								<div class="card-header justify-content-between">
									<div class="card-title">
										Level Information
									</div>

								</div>
							</div>
						</div>

						<div class="card-body">


							<input type="hidden" class="pop_up_coaching_program_id" name="pop_up_coaching_program_id" value="<?php echo $coaching_program_id; ?>">

							<div class="card-body">
								<div class="row gy-4">

									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
										<label for="input-placeholder" class="fw-semibold mb-2">Coaching Program Name<span style="color: #FF0000;">*</span></label>
										<input type="text" class="form-control" name="pop_up_coaching_program_name" id="pop_up_coaching_program_name" placeholder="Enter Coaching Program Name" value="<?php echo $coaching_program_details->coaching_program_name; ?>" required>
									</div>


									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
										<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;">*</span></label>
										<input type="text" class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Remark" value="<?php echo $coaching_program_details->remark; ?>">
									</div>

									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
										<p class="fw-semibold mb-2">Status<span style="color: #FF0000;"></span></p>
										<select class="form-select" id="pop_up_status" name="pop_up_status" required>
											<option value="">Select Status</option>
											<option value="1" <?php echo ($coaching_program_details->status == 1) ? "selected" : ""; ?>>Active</option>
											<option value="2" <?php echo ($coaching_program_details->status == 2) ? "selected" : ""; ?>>In-Active</option>
										</select>
									</div>


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

	<!--Deliverable Edit modal start -->

	<div class="modal fade" id="modal-edit-deliverable" tabindex="-1"
		aria-labelledby="modal-edit-deliverable" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Coaching Program Deliverable
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<form role="form" name="customer_master" action="<?php echo site_url('participants/coaching_program_master/update_coaching_program_deliverable'); ?>" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-xl-12">
								<!-- <div class="card custom-card"> -->
								<div class="card-header justify-content-between">
									<div class="card-title">
										Deliverable Information
									</div>

								</div>
							</div>
						</div>

						<div class="card-body">


							<input type="hidden" id="pop_up_coaching_program_deliverable_relation_id" name="pop_up_coaching_program_deliverable_relation_id" value="">

							<input type="hidden" class="pop_up_coaching_program_id" name="pop_up_coaching_program_id" value="">
							
							<input type="hidden" id="pop_up_deliverable_id" name="pop_up_deliverable_id" value="">
							<input type="hidden" id="pop_up_value_type" name="pop_up_value_type" value="">

							<div class="card-body">
								<div class="row gy-4">

									<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
										<label for="input-placeholder" class="fw-semibold mb-2">Deliverable Name<span style="color: #FF0000;">*</span></label>
										<p class="pop_up_deliverable_name" name="pop_up_deliverable_name" ></p>
									</div>


									<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 value_type1" style="display: none;">
										<label for="input-placeholder" class="fw-semibold mb-2">Included/Not-Included<span style="color: #FF0000;">*</span></label>
										<select class="form-select pop_up_value1" name="pop_up_value1" required>
											<option value="0">Not Included</option>
											<option value="1">Included</option>
											</select>
									</div>

									<div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 value_type2" style="display: none;">
										<label for="input-placeholder" class="fw-semibold mb-2">Value<span style="color: #FF0000;">*</span></label>
										<input type="text" class="form-control pop_up_value2" name="pop_up_value2" placeholder="Enter value" value="">
									</div>

									<div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 value_type2" style="display: none;">
										<label for="input-placeholder" class="fw-semibold mb-2">UOM<span style="color: #FF0000;"></span></label>
										<p class="pop_up_uom_name" name="pop_up_uom_name" ></p>
									</div>


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

	<!-- assignment modal start -->


	<div class="modal fade" id="modal-add-assignment" tabindex="-1"
		aria-labelledby="modal-add-assignment" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Select Assignments
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form" name="customer_master" action="<?php //echo site_url('master/company_master/add_new_contact_person'); 
																														?>" method="post">

						<input type="hidden" name="pop_up_coaching_program_id" value="<?php echo $coaching_program_id; ?>">

						<div class="row gy-4">
							<div class="table-responsive">
								<table id="example2" class="table table-bordered text-nowrap w-100">
									<thead>
										<tr>
											<th></th>
											<th>Assignment</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 0;
										//echo '<pre>'; print_r($customer_details);die;
										foreach ($assignment_list as $row) :
											$no++;
											$assignment_id = $row->entity_id;


										?>
											<tr>
												<td><input type="checkbox" class="checkboxes" id="assignment_checkbox" name="assignment_checkbox" value="<?php echo $assignment_id ?>"></td>
												<td>
													<?php echo $row->assignment_name; ?>
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
					<button type="button" class="btn btn-primary" id="add_assignment">Add Assignment</button>
				</div>
			</div>
		</div>
	</div>


	<!-- assignment modal end -->




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
				var coaching_program_id = $('[name="coaching_program_id"]').val();

				// alert(coaching_program_id);

				//alert(coaching_program_id);
				$.ajax({
					url: "<?php echo site_url('participants/coaching_program_master/get_coaching_program_details_by_id'); ?>",
					method: "POST",
					data: {
						coaching_program_id: coaching_program_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.coaching_program_name').text(data[0].coaching_program_name);
						$('.remark').text(data[0].remark);
						var status = data[0].status;
						if (status == 1) {
							$('.status').text("Active");
						} else {
							$('.status').text("In-Active");
						}

					}
				});

			}


		});
	</script>



	<script type="text/javascript">
		$(document).on('click', '#add_assignment', function() {
			var coaching_program_id = $("#coaching_program_id").val();


			var assignment_checkbox = [];
			$.each($("input[name='assignment_checkbox']:checked"), function() {
				assignment_checkbox.push($(this).val());
			});
			if (coaching_program_id != "") {

				$.ajax({
					url: "<?php echo site_url('participants/coaching_program_master/add_assignment_in_coaching_program'); ?>",
					type: "POST",
					data: {
						'coaching_program_id': coaching_program_id,
						'assignment_checkbox': assignment_checkbox
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

		function update_deliverable_details(deliverable_relation_id) {
			
			$.ajax({
				url: "<?php echo site_url('participants/coaching_program_master/get_coaching_program_deliverable_details_by_relation_id'); ?>",
				method: "POST",
				data: {
					'deliverable_relation_id': deliverable_relation_id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					$(".pop_up_coaching_program_id").val(data[0].coaching_program_id)
					$(".pop_up_deliverable_name").text(data[0].deliverable_name)
					$("#pop_up_coaching_program_deliverable_relation_id").val(data[0].entity_id)
					$("#pop_up_value_type").val(data[0].value_type)
					var value_type = data[0].value_type;
					if(value_type==1){
						$(".value_type1").show();
						$(".value_type2").hide();
						$(".pop_up_value1").val(data[0].value).trigger('change');
					}else{
						$(".value_type2").show();
						$(".value_type1").hide();
						$(".pop_up_value2").val(data[0].value);
						$(".pop_up_uom_name").text(data[0].uom_name);

					}

				}
			});

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
