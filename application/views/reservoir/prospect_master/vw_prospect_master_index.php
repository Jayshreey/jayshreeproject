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
		<?php $this->load->view('side_bar'); ?>
		<!-- End::app-sidebar -->

		<!-- Start::app-content -->
		<div class="main-content app-content">
			<div class="container-fluid">

				<!-- Page Header -->
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
					<div class="my-auto">
						<h5 class="page-title fs-21 mb-1">NCA Reservoir</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">NCA Reservoir</li>
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
								<div class="card-title">NCA Reservoir</div>
							</div>
							<div class="card-body">
								<div class="btn-list">

									<a href="create_prospect" class="btn btn-primary btn-wave">
										Add New
									</a>
									<a href="vw_prospect_master_all" class="btn btn-outline-secondary btn-wave ">
										View All
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered text-nowrap w-100 display" style="width:100%">
										<thead>
											
											<!-- <tr>
												<th></th>
												<th></th>
												<th></th>
												<th><input type="text" placeholder="Search Role" /></th>
												<th><input type="text" placeholder="Search Company Name" /></th>
												<th></th>
												<th></th>
												<th><input type="text" placeholder="Search Program Interested In" /></th>
												<th><input type="text" placeholder="Search Source" /></th>
												<th></th>
												<th></th>
												<th><input type="text" placeholder="Search Status" /></th>
												<th></th>
												<th></th>
											</tr> -->
											<tr>
												<th>Sr. No.</th>
												<th>Created Date</th>
												<th>Prospect Name</th>
												<th>Role</th>
												<th>Company name</th>
												<th>Email Id</th>
												<th>Contact Number</th>
												<th>Programs Interested In</th>
												<th>Source</th>
												<th>Source Description</th>
												<th>SPOC</th>
												<th>Status</th>
												<th>Remark</th>
												<th>Action</th>
											</tr>
											<tr>
												<th>Sr. No.</th>
												<th>Created Date</th>
												<th>Prospect Name</th>
												<th>Role</th>
												<th>Company name</th>
												<th>Email Id</th>
												<th>Contact Number</th>
												<th><input type="text" class="form-control" placeholder="Search Program Interested In" /></th>
												<th>Source</th>
												<th>Source Description</th>
												<th>SPOC</th>
												<th>Status</th>
												<th>Remark</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($prospect_list as $row) :
												$no++;
												$prospect_id = $row->entity_id;

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
														<?php echo $row->created_date; ?>
													</td>
													<td>
														<?php echo $row->salutation . " " . $row->first_name . " " . $row->last_name; ?>
													</td>
													<td>
														<?php echo $row->designation; ?>
													</td>
													<td>
														<?php echo $row->company_name; ?>
													</td>
													<td>
														<?php echo $row->email_id; ?>
													</td>
													<td>
														<?php echo $row->mobile1; ?>
													</td>
													<td>
														<?php echo $row->programs_interested_in; ?>
													</td>
													<td>
														<?php echo $row->source_name; ?>
													</td>
													<td>
														<?php echo $row->source_description; ?>
													</td>
													<td>
														<?php echo $row->sparrow_first_name; ?>
													</td>
													<td>
														<?php echo $conversion_stage; ?>
													</td>
													<td>
														<?php echo $remark; ?>
													</td>
													<td>
														<a href="<?php echo base_url('edit_prospect_master/' . $prospect_id); ?>" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-edit"></i></a>

														<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
															data-bs-target="#modal-convert-to-participant" onclick="update_prospect_id(<?php echo $prospect_id . ',' . $row->assigned_to; ?>)" title="Convert"><i class="mdi mdi-account-convert"></i></a>
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
								
								<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
									<label for="input-placeholder" class="fw-semibold mb-2">Conversion Reason <span style="color: #FF0000;">Optional</span></label>
									<select class="form-select" id="pop_up_conversion_reason" name="pop_up_conversion_reason">
										<option value="">No Selected</option>
										<option value="1">Workshop</option>
									</select>
								</div> -->

								
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
									<label for="input-placeholder" class="fw-semibold mb-2">Joining date<span style="color: #FF0000;">*</span></label>
									<input type="date" class="form-control" id="pop_up_joining_date" name="pop_up_joining_date" required>
									
								</div>
							</div>
							
							<div class="row gy-4">


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
		// 	$(document).ready(function() {
        //     var table = $('#example').DataTable();

        //     // Apply the search functionality for each column
        //     $('#example thead input').on('keyup', function() {
        //         var index = $(this).parent().index();  // Get the index of the column
        //         table
        //             .column(index)  // Target the respective column
        //             .search(this.value)  // Apply the search term entered by the user
        //             .draw();  // Redraw the table with the applied filter
        //     });
        // });
	var table=new DataTable('#example1', {
    initComplete: function () {
        this.api()
            .columns([3, 4, 8, 11 ])
            .every(function (d) {
                let column = this;
			
                // Create select element
                let select = document.createElement('select');
				var theadname = $("#example1 th").eq([d]).text(); 
				
                select.add(new Option('Select ' + theadname + '',''));
				//$("#example1 th select").addClass('form-select selected-option');
			//	select.append( '<option value="" selected="selected">Search</option>' );
                column.header().replaceChildren(select);
 
                // Apply listener for user change in value
                select.addEventListener('change', function () {
					
                    column
                        .search(select.value, {exact: true})
                        .draw();
                });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
						
                        //select.add(new Option(d));
						var val = $.fn.dataTable.util.escapeRegex(d);
						
						if (val !== '') {
							select.add(new Option(d));
						}
                    });
				
            });
    }
});
$("#example1 th select").addClass('form-select selected-option');
$('#example1 thead input').on('keyup', function() {
                var index = $(this).parent().index();  // Get the index of the column
                table
                    .column(index)  // Target the respective column
                    .search(this.value)  // Apply the search term entered by the user
                    .draw();  // Redraw the table with the applied filter
            });
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});

} );
		
	</script>

	<script>
		function update_prospect_id(prospect_id, assigned_to) {
			$('#pop_up_prospect_id').val(prospect_id);
			$('#pop_up_spoc_id').val(assigned_to).trigger('change');
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
