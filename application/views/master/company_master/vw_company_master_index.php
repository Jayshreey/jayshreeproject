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
						<h5 class="page-title fs-21 mb-1">ECS Company Reservoir</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">ECS Company Reservoir</li>
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
								<div class="card-title">ECS Company Reservoir [ Active ]</div>
							</div>
							<div class="card-body">
								<div class="btn-list">

									<!-- <a href="create_company_master" class="btn btn-primary btn-wave">
										Create Company
									</a> -->
									<a href="vw_company_master_all" class="btn btn-outline-secondary btn-wave ">
										Active + Archived Companies
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered text-nowrap w-100">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>BH Name</th>
												<th>Company Name</th>
												<th>State</th>
												<th>City</th>
												<th>Locality</th>
												<th>Source</th>
												<th>Source Description</th>
												<!-- <th>Conversion Reason</th> -->
												<th>Created date</th>
												<th>SPOC</th>
												<th>Level</th>
												<th>LSDP Sessions</th>
												<th>SSDP Sessions</th>
												<th>Account Type</th>
												<th>Action</th>
											</tr>
											<tr>
												<th>Sr. No.</th>
												<th>BH Name</th>
												<th>Company Name</th>
												<th>State</th>
												<th>City</th>
												<th>Locality</th>
												<th>Source</th>
												<th>Source Description</th>
												<!-- <th>Conversion Reason</th> -->
												<th>Created date</th>
												<th>SPOC</th>
												<th>Level</th>
												<th>LSDP Sessions</th>
												<th>SSDP Sessions</th>
												<th>Account Type</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($company_list as $row) :
												$no++;
												$company_id = $row->entity_id;
												$Status = $row->status;

												if ($Status == 1) {
													$status = "Active";
												} elseif ($Status == 2) {
													$status = "In-Active";
												}

												$this->db->select('coaching_program_master.*');
												$this->db->from('subscription_master');
												$this->db->join('coaching_program_master','coaching_program_master.entity_id = subscription_master.coaching_program_id','left');
												$where = '(subscription_master.company_id = "'.$company_id.'")';
												$this->db->where($where);
												$this->db->order_by('subscription_master.entity_id','desc');
												$this->db->limit(1);
												$subscription_query = $this->db->get();
												$subscription_num_rows = $subscription_query->num_rows();
												if($subscription_num_rows > 0){
												$coaching_program_name = $subscription_query->row()->coaching_program_name;
												$coaching_program_id = $subscription_query->row()->entity_id;
												$coaching_program_name = $subscription_query->row()->coaching_program_name;
												}else{
												$coaching_program_name = "";
												$coaching_program_id = 0;
												}

												switch ($coaching_program_id) {
													case 0:
														$level_colour = "bg-outline-gray mt-1";
														break;
													
													case 1:
														$level_colour = "bg-outline-danger mt-1";
														break;
													
													case 2:
														$level_colour = "bg-outline-success mt-1";
														break;
													
													case 3:
														$level_colour = "bg-outline-primary mt-1";
														break;
													
													case 4:
														$level_colour = "bg-outline-warning mt-1";
														break;
													
													default:
													$level_colour = "bg-outline-secondary mt-1";
														break;
												}

												// get lsdp session count

												$this->db->select('*');
												$this->db->from('session_master');
												$this->db->join('batch_master','batch_master.entity_id = session_master.batch_id','inner');
												$where = '(session_master.actionable_id = 3 and batch_master.coaching_program_type_id = 1)';
												$this->db->where($where);
												$query = $this->db->get();
												$lsdp_session_count = $query->num_rows();
												//$details = $query->row();


												// get ssdp session count

												$this->db->select('*');
												$this->db->from('session_master');
												$this->db->join('batch_master','batch_master.entity_id = session_master.batch_id','inner');
												$where = '(session_master.actionable_id = 3 and batch_master.coaching_program_type_id = 2)';
												$this->db->where($where);
												$query = $this->db->get();
												$ssdp_session_count = $query->num_rows();
												//$details = $query->row();
                                                
												$this->db->select('first_name,last_name');
												$this->db->from('company_contact_master');
												$where = '(company_contact_master.company_id ="'.$company_id.'" and company_contact_master.privilege_id = 5)';
												$this->db->where($where);
												$this->db->limit(1);
												$query = $this->db->get();
												//echo $this->db->last_query();
												$bh_row = $query->row();
												//echo $bh_row[0]['first_name'];
												if(isset($bh_row))
												{
													$bh_name=$bh_row->first_name.' '.$bh_row->last_name;
												}
												else{
													$bh_name='';
												}
												
											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $bh_name; ?></td>
													<td><?php echo $row->company_name; ?></td>
													<td><?php echo $row->state_name; ?></td>
													<td><?php echo $row->city_name; ?></td>
													<td><?php echo $row->locality; ?></td>
													<td><?php echo $row->source_name; ?></td>
													<td><?php echo $row->source_description; ?></td>
													<!-- <td><?php //echo ($row->conversion_reason ==1)? "Workshop": ""; ?></td> -->
													<td><?php echo $row->conversion_date; ?></td>
													<td><?php echo $row->sparrow_employee_name; ?></td>
													<td class="text-center" ><span class="<?php echo $level_colour; ?>" >&nbsp;&nbsp;<?php echo $coaching_program_name; ?>&nbsp;&nbsp;</span></td>
													<td><?php echo $lsdp_session_count; ?></td>
													<td><?php echo $ssdp_session_count; ?></td>
													<td><?php echo $row->account_type; ?></td>
													<td>
														
															<a href="<?php echo site_url('edit_company_master/' . $company_id); ?>" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-edit"></i></a> 
															<?php if($role_id == 1 || $role_id == 2)
															{ ?>
															<button class="btn btn-sm btn-info edit-btn" data-id="<?php echo $company_id; ?>"><i class="fas fa-user"></i></button>
															<?php } ?>
															
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
        <!-- Modal Start -->

	<div class="modal fade" id="modal-edit-spoc" tabindex="-1"
		aria-labelledby="modal-edit-spoc" data-bs-keyboard="false"
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
					<form role="form" name="company_contact_master" action="<?php echo site_url('master/company_master/update_company_spoc'); ?>" method="post">

						<input type="hidden" name="pop_up_company_id" value="<?php echo $company_id; ?>">

							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<p class="fw-semibold mb-2">SPOC<span style="color: #FF0000;">*</span></p>
								<select class="form-select" data-trigger id="pop_up_spoc_id" name="pop_up_spoc_id" required>
									<option value="">Select SPOC</option>
									<?php foreach ($spoc_list as $spoc) : ?>
										<option value="<?php echo $spoc->entity_id; ?>"><?php echo $spoc->first_name.' '.$spoc->last_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div> 

						</div>

						<br>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"
								data-bs-dismiss="modal">Close</button>
							<button type="submit" name="update_spoc" id="update_spoc" class="btn btn-primary">Update</button>
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
			//$("#example1").DataTable();
			var table=new DataTable('#example1', {
    		initComplete: function () {
        	this.api()
            .columns([3, 4, 6, 8, 9, 10 ])
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
						var val1 = $('<span/>').html(d).text();
			
						if (val !== '') {
							select.add(new Option(val1));
						}
                    });
				
            });
    }
});
$("#example1 th select").addClass('form-select selected-option');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
		
		$(document).ready(function() {
			// On click of the edit button
			$('.edit-btn').on('click', function() {
				var company_id =  $(this).data('id');

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
			
								$('[name="pop_up_spoc_id"]').val(data.spoc_id).trigger('change');
								$('[name="pop_up_spoc_id"]').val(data.spoc_id);
								$('[name="pop_up_company_id"]').val(company_id);
								$('#modal-edit-spoc').modal('show');
							}
						});
			});
		});
	</script>
</body>

</html>
