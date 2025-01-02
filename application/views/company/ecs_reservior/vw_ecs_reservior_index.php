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
	<style>
	.selected-option
	{
		width: auto;
   
	}
	</style>
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
		<?php $this->load->view('side_bar_company'); ?>
		<!-- End::app-sidebar -->

		<!-- Start::app-content -->
		<div class="main-content app-content">
			<div class="container-fluid">

				<!-- Page Header -->
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
					<div class="my-auto">
						<h5 class="page-title fs-21 mb-1">ECS Reservoir</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">ECS Reservoir</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<!-- Start:: row-4 -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card custom-card">
							<div class="card-header">
								<div class="card-title">ECS Reservoir</div>
							</div>
							<div class="card-body">
								<div class="btn-list">

									<div class="btn-group">
										<!-- <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										Add Participant
										</button>
										<ul class="dropdown-menu dropdown-menu-primary">
											<li><a class="dropdown-item" href="vw_prospect_master">Convert From NCA</a></li>
											<li><a class="dropdown-item" href="<?php echo base_url('create_participant_master/1'); ?>">Create New</a></li>
											<li><a class="dropdown-item" href="<?php echo base_url('vw_company_master'); ?>" >Add in Existing Company</a></li>
										</ul> -->


										<a href="<?php echo base_url('create_ecs_reservior'); ?>" class="btn btn-primary btn-wave ">
											Add Participant
										</a>

									</div>


								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered text-nowrap w-100">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Client Name</th>
												<th>RM Name</th>
												
												<th>Date of Birth</th>
												
												<th>Gender</th>
												<th>Marital Status</th>
												<th>Occupation</th>
												<th>Action</th>
											</tr>
											
										</thead>
										<tbody>
											<?php
											$no = 0;
											//echo '<pre>'; print_r($customer_details);die;
											foreach ($ecs_reservior_list as $row) :
												$no++;
												$client_id=$row->entity_id;
											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $row->client_name; ?></td>
													<td><?php echo $row->rm_name; ?></td>
													<td><?php echo $row->dob; ?></td>
													<td><?php echo $row->gender; ?></td>
													<td><?php echo $row->merital_status; ?></td>
													<td><?php echo $row->occupation; ?></td>
													<!-- <td><?php echo $row->income_group; ?></td>
													 -->
													<td>
														<a href="<?php echo site_url('edit_ecs_reservior/' . $client_id); ?>" data-bs-toggle="tooltip" title="Edit Participant" data-bs-custom-class="tooltip-info" data-bs-placement="top">
															<button type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
														</a>
														<!-- <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
															data-bs-target="#modal-quick-update-company" onclick="update_company_id(<?php echo $participant_id; ?>)">Quick Edit</a>

														<a href="<?php echo site_url('edit_participant_master/' . $company_contact_id); ?>" data-bs-toggle="tooltip" title="Edit Participant" data-bs-custom-class="tooltip-info" data-bs-placement="top">
															<button type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
														</a> -->

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
				<!-- End:: row-4 -->

			</div>
		</div>
		<!-- End::app-content -->

		<!-- modal start -->

		<div class="modal fade" id="modal-quick-update-company" tabindex="-1"
			aria-labelledby="modal-quick-update-company" data-bs-keyboard="false"
			aria-hidden="true">
			<!-- Scrollable modal -->
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Quick Update Participant
						</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form role="form" name="customer_master" action="<?php echo site_url('participants/participant_master/quick_update_company'); ?>" method="post">

							<input type="hidden" id="pop_up_company_id" name="pop_up_company_id">
							<input type="hidden" id="pop_up_company_contact_id" name="pop_up_company_contact_id">
							<input type="hidden" id="pop_up_participant_id" name="pop_up_participant_id">
							<input type="hidden" id="pop_up_subscription_id" name="pop_up_subscription_id">

							<div class="card-body bg-light">

								<!-- <h6>Subscription Information</h6>
												<br> -->
								<div class="row">
									<div class="col-6">
										<strong>Subscription No: 
											<br>Coaching Program: 
											<br>Approval Status: </strong>
									</div>
									<div class="col-4">
										<p> <span class="pop_up_subscription_id"></span>
											<br><span class="pop_up_coaching_program_name"></span>
											<br><span class="pop_up_approval_status"></span>
										</p>
								</div>
								</div>
								
							



							</div>
							<br>


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
									<label for="input-placeholder" class="fw-semibold mb-2">Validity <span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_validity" name="pop_up_validity" required>
										<option value="">No Validity</option>
										<option value=null>Pending</option>
										<option value=1>Valid</option>
										<option value=2>In-Valid</option>
									</select>
								</div>
								<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Select Coaching Program <span style="color: #FF0000;">*</span></label>
									<select class="form-select" id="pop_up_coaching_program_id" name="pop_up_coaching_program_id" required>
										<option value="">No Selected</option>
										<?php foreach ($coaching_program_list as $key => $value) {
										?>
											<option value="<?php echo $value->entity_id; ?>"><?php echo $value->coaching_program_name; ?></option>
										<?php } ?>
									</select>
								</div> -->

							</div>

							<div class="row gy-4">


								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Joining date<span style="color: #FF0000;">*</span></label>
									<input type="date" class="form-control" id="pop_up_joining_date" name="pop_up_joining_date" required>

								</div>

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Renewal date<span style="color: #FF0000;">*</span></label>
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
			// function checkTableVisibility() {
			// 	// Check the window width
			// 	if ($(window).width() <= 768) {
			// 		$("#example1").DataTable();
			// 		$(".example1_th").hide();
			// 	} else {
			// 	// If the screen size is 768px or smaller (mobile view), hide the table
			// 	var table=new DataTable('#example1', {
			// 	initComplete: function () {
			// 		this.api()
			// 			.columns([2, 3, 6, 7, 8, 9, 10 ])
			// 			.every(function (d) {
			// 				let column = this;
						
			// 				// Create select element
			// 				let select = document.createElement('select');
			// 				var theadname = $("#example1 th").eq([d]).text(); 
							
			// 				select.add(new Option('Select ' + theadname + '',''));
			// 				//$("#example1 th select").addClass('form-select selected-option');
			// 			//	select.append( '<option value="" selected="selected">Search</option>' );
			// 				column.header().replaceChildren(select);
			
			// 				// Apply listener for user change in value
			// 				select.addEventListener('change', function () {
								
			// 					column
			// 						.search(select.value, {exact: true})
			// 						.draw();
			// 				});
			
			// 				// Add list of options
			// 				column
			// 					.data()
			// 					.unique()
			// 					.sort()
			// 					.each(function (d, j) {
									
			// 						//select.add(new Option(d));
			// 						var val = $.fn.dataTable.util.escapeRegex(d);
			// 						var val1 = $('<span/>').html(d).text();
						
			// 						if (val !== '') {
			// 							select.add(new Option(val1));
			// 						}
			// 					});
							
			// 			});
			// 		}
			// 	});
			// 	$("#example1 th select").addClass('form-select selected-option');
			// 	}
			// }

			// // Run on document load
			// checkTableVisibility();

			// // Run when the window is resized
			// $(window).resize(function() {
			// 	checkTableVisibility();
			// });

		
		});
	</script>


	<script>
		function update_company_id(participant_id) {

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
					$('.pop_up_subscription_id').text(data.subscription_id);
					$('#pop_up_batch_id').val(data.batch_id).trigger('change');
					$('#pop_up_validity').val(data.validity).trigger('change');
					$('.pop_up_coaching_program_name').text(data.coaching_program_name);
					$('#pop_up_coaching_program_id').val(data.coaching_program_id).trigger('change');
					$('#pop_up_joining_date').val(data.joining_date).trigger('change');
					$('#pop_up_leaving_date').val(data.leaving_date).trigger('change');
					$('#pop_up_spoc_id').val(data.spoc_id).trigger('change');

					var approval_status = data.approval_status;
					if (approval_status == 1) {
						$('.pop_up_approval_status').text("Approved");
					} else if (approval_status == 2) {
						$('.pop_up_approval_status').text("Rejected");

					} else {
						$('.pop_up_approval_status').text("Pending");

					}
				}
			});



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


</body>

</html>
