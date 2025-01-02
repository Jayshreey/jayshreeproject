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
						<h5 class="page-title fs-21 mb-1">Session Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_session_master' ?>">Session Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Session Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/edit_session_master_data'); ?>" method="post">


					<input type="hidden" id="session_id" name="session_id" value="<?php echo $session_id ?>" required>

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
													Session Information
												</div>
												<div class="prism-toggle">
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-session"><i class="fe fe-edit-2 "></i></a>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Session Name</dt>
															<dd class="col-sm-8 session_name" id="session_name"></dd>

															<dt class="col-sm-4">Session Date</dt>
															<dd class="col-sm-8 session_date"></dd>

															<dt class="col-sm-4">Medium</dt>
															<dd class="col-sm-8 medium"></dd>

															<dt class="col-sm-4">Session Type</dt>
															<dd class="col-sm-8 session_type"></dd>

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-6">Process</dt>
															<dd class="col-sm-6 process_name"></dd>

															<dt class="col-sm-6">Topic</dt>
															<dd class="col-sm-6 topic"></dd>

															<dt class="col-sm-6">Remark</dt>
															<dd class="col-sm-6 remark"></dd>

															<dt class="col-sm-6">Batch Name</dt>
															<dd class="col-sm-6 session_name"></dd>

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

									<form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/save_session'); ?>" method="post">
										<div class="row">
											<div class="col-xl-12">

												<div class="card-header">
													<div class="card-title">Session Details</div>
												</div>
												<div class="card-body">

													<div class="row gy-4">

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">

															<button type="button" class="btn btn-light label-btn label-end" data-bs-toggle="modal"
																data-bs-target="#modal-add-sparrow-employee">
																Add Sparrow Team
																<i class="si si-people label-btn-icon ms-4 mt-2"></i>
															</button>
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

																			<td><?php echo $row->first_name . " " . $row->last_name; ?>
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

														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

															<button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																Add Participant
															</button>
															<ul class="dropdown-menu dropdown-menu-light">
																<li><a class="dropdown-item" href="#" data-bs-toggle="modal"
																data-bs-target="#modal-add-participant" >Add one-by-one</a></li>
															</ul>
														</div>
													</div>


													<div class="card-body">
														<div class="table-responsive">
															<table id="example11" class="table table-bordered table-striped">
																<thead>
																	<tr>
																		<th style="display: none;">Entity Id</th>
																		<th>Sr. No.</th>
																		<th>Company Name</th>
																		<th>Participant Name</th>
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
																			<td><?php echo $row2->company_name; ?></td>

																			<td><?php echo $row2->first_name." ".$row2->last_name; ?>
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

													<input type="hidden" name="status" id="status" value="1">

													<br>
													<center>
														<a href="<?php echo base_url('vw_session_master'); ?>" class="btn btn-primary">Close</a>
													</center>
												</div>
											</div>
										</div>
								</div>
				</form>

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

					<div class="row gy-4">
						<div class="table-responsive">
							<table id="example11" class="table ">

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
	<!-- modal start -->

	<div class="modal fade" id="modal-edit-session" tabindex="-1"
		aria-labelledby="modal-edit-session" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit Session Details
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="modal-body">
						<div class="row mb-3">
                            <label for="pop_up_section_name"
                                class="col-sm-2 col-form-label"><b>Section Name</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pop_up_section_name" id="pop_up_section_name" placeholder="Enter Section Name" required>
                                </div>
                            </div>
                            <label for="pop_up_process_id"
                                class="col-sm-2 col-form-label"><b>Process</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select class="form-select" id="pop_up_process_id" name="pop_up_process_id" required>
										<option value="">No Selected</option>
										<?php foreach ($process_list as $key => $value) {
											?>
											<option value="<?php echo $value->entity_id ;?>"><?php echo $value->process_name; ?></option>
										<?php } ?>
									</select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pop_up_section_date"
                                class="col-sm-2 col-form-label"><b>Section Date</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="pop_up_section_date" id="pop_up_section_date"  value="" required>
                                </div>
                            </div>
                            <label for="pop_up_topic"
                                class="col-sm-2 col-form-label"><b>Topic</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pop_up_topic" id="pop_up_topic" placeholder="Enter Topic " value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        	<label for="pop_up_medium_id"
                                class="col-sm-2 col-form-label"><b>Medium</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select class="form-select" id="pop_up_medium_id" name="pop_up_medium_id" required>
                                    	<option value="">No Selected</option>
										<option value="Telephonic">Telephonic</option>
										<option value="Online">Online</option>
										<option value="Offline">Offiline</option>
									</select>
                                </div>
                            </div>
                            <label for="pop_up_remark"
                                class="col-sm-2 col-form-label"><b>Remark</b></label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pop_up_remark" id="pop_up_remark" placeholder="Enter Remark " value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        	<label for="pop_up_batch_id"
                                class="col-sm-2 col-form-label"><b>Batch</b></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <select class="form-select" id="pop_up_batch_id" name="pop_up_batch_id" required>
										<option value="">No Selected</option>
										<?php foreach ($batch_list as $key => $value) {
											?>
											<option value="<?php echo $value->entity_id ;?>"><?php echo $value->batch_name; ?></option>
										<?php } ?>
									</select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" type="submit" name="update_details" id="update_details" class="btn btn-primary">Save
                            Changes</button>
                    </div>
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
			get_data_edit2();

			function get_data_edit() {
				var session_id = $('[name="session_id"]').val();

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_session_details_by_id3'); ?>",
					method: "POST",
					data: {
						session_id: session_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						$('.session_name').text(data.session_name);
						$('.session_date').text(data.session_date);
						$('.medium').text(data.medium);
						$('.process_name').text(data.process_name);
						$('.topic').text(data.topic);
						$('.remark').text(data.remark);

						
						var session_type_id = data.session_type_id;
						var session_type = "";
						if(session_type_id ==1){
							session_type = "Facilitation";
						}else{
							session_type = "Practice";
						}
						$('.session_type').text(session_type);

					}
				});
			}

			function get_data_edit2() {
                var session_id = $('[name="session_id"]').val();

                //alert(entity_id);
                $.ajax({
                    url: "<?php echo site_url('worklog/session_master/get_session_details_by_id2'); ?>",
                    method: "POST",
                    data: {
                        session_id: session_id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        $.each(data, function(i, item) {
                            console.log(data);
                            $val =
                                $('[name="pop_up_section_name"]').val(data[i].session_name);
                                $('[name="pop_up_process_id"]').val(data[i].process_id).trigger('change');
                                $('[name="pop_up_section_date"]').val(data[i].session_date);
                                $('[name="pop_up_topic"]').val(data[i].topic);
                                $('[name="pop_up_medium_id"]').val(data[i].medium).trigger('change');
                                $('[name="pop_up_remark"]').val(data[i].remark);
                                $('[name="pop_up_batch_id"]').val(data[i].batch_id).trigger('change');
                        });
                    }
                });
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#update_details', function() {
            var entity_id = $("#session_id").val();
            var section_name = $("#pop_up_section_name").val();
            var process_id = $("#pop_up_process_id").val();
            var section_date = $("#pop_up_section_date").val();
            var topic = $("#pop_up_topic").val();
            var medium_id = $("#pop_up_medium_id").val();
            var remark = $("#pop_up_remark").val();
            var batch_id = $("#pop_up_batch_id").val();

            if (entity_id != "" && section_name != "" && process_id != "" && section_date != "" && topic != "" && medium_id != "" && remark != "" && batch_id != "") {

                $.ajax({
                    url: "<?php echo site_url('worklog/session_master/update_details'); ?>",
                    type: "POST",
                    data: {
                        'entity_id': entity_id,
                        'section_name': section_name,
                        'process_id': process_id,
                        'section_date': section_date,
                        'topic': topic,
                        'medium_id': medium_id,
                        'remark': remark,
                        'batch_id': batch_id
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
// Add Sparrow employee in session
$(document).on('click', '#add_sparrow_employee', function() {
	
	var session_id = $("#session_id").val();
	var sparrow_employee_checkbox = [];
	$.each($("input[name='sparrow_employee_checkbox']:checked"), function() {
		sparrow_employee_checkbox.push($(this).val());
	});
	
	console.log(sparrow_employee_checkbox);
	
	$.ajax({
		url: "<?php echo site_url('worklog/session_master/add_sparrow_employee_in_session'); ?>",
		type: "POST",
		data: {
			'session_id': session_id,
			'sparrow_employee_checkbox': sparrow_employee_checkbox
		},
		success: function(data) {
			location.reload();
		},
		error: function(data) {
			alert("Failed!!");
		}
	});
	
	
	
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
					url: "<?php echo site_url('worklog/session_master/add_participant_in_session'); ?>",
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
