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
						<h5 class="page-title fs-21 mb-1">Worklog Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_worklog_master' ?>">Worklog Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Worklog Master Form</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<input type="hidden" id="worklog_id" name="worklog_id" value="<?php echo $worklog_id ?>" required>
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
												<button class="btn btn-sm btn-primary-light"><i class="fe fe-edit-2 "></i></button>
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
														<dt class="col-sm-6">Session Name</dt>
														<dd class="col-sm-6 session_name"></dd>

													</dl>
												</dl>
											</dl>


											<!-- </div> -->


											<!-- End:: row-6 -->




											<!-- </div> -->
											<hr>
											<br>
											<div class="card-title">Session Master Form</div>


											<form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/save_session'); ?>" method="post">




												<br>
												<div class="row gy-4">

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
														<input type="text" class="form-control" name="session_name" id="session_name" placeholder="Enter Session Name">
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
														<input type="date" class="form-control" name="session_date" id="session_date" placeholder="Select Session date">
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
														<input type="text" class="form-control" name="topic" id="topic" placeholder="Enter Topic">
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Sub Topic<span style="color: #FF0000;"></span></label>
														<input type="text" class="form-control" name="sub_topic" id="sub_topic" placeholder="Enter Sub Topic">
													</div>


													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<p class="fw-semibold mb-2">Medium<span style="color: #FF0000;">*</span></p>
														<select class="js-example-basic-single" data-trigger id="medium" name="medium" required>
															<option value="">Select Medium</option>
															<option value="Telephonic">Telephonic</option>
															<option value="Online">Online</option>
															<option value="Offline">Offiline</option>
														</select>
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
														<select class="js-example-basic-single" data-trigger id="session_type" name="session_type" required>
															<option value="">Select Type</option>
															<option value="Group">Group</option>
															<option value="Individual">Individual</option>
														</select>
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<p class="fw-semibold mb-2">Session Stage<span style="color: #FF0000;">*</span></p>
														<select class="js-example-basic-single" data-trigger id="stage" name="stage" required>
															<option value="">Select Stage</option>
															<option value="1">Planned</option>
															<option value="2">Completed</option>
															<option value="3">Cancelled</option>
														</select>
													</div>

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
														<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
														<input type="text" class="form-control" name="remark" id="remark" placeholder="Enter Remark">
													</div>

												</div>

												<br>
												<br>

												<div class="row gy-4">

													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">

														<button type="button" class="btn btn-light label-btn label-end" data-bs-toggle="modal"
															data-bs-target="#modal-add-sparrow-employee">
															Add Sparrow Team
															<i class="si si-people label-btn-icon ms-4 mt-2"></i>
														</button>
												

														<button type="button" class="btn btn-light label-btn label-end" data-bs-toggle="modal"
															data-bs-target="#modal-add-company-contact-person">
															Add Participant
															<i class="si si-people label-btn-icon ms-4 mt-2 text-danger"></i>
														</button>
													</div>
												</div>

												<div class="row gy-4">

													<br>
													<br>
													<center>
														<button type="submit" id="btn_save" class="btn btn-warning mb-4">
															Skip
														</button>
													</center>
												</div>

											</form>
										</div>
									</div>
								</div>

							</div>
						</div>


					</div>

				</div>
			</div>
		</div>
	</div>

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
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- end modal -->

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
						var worklog_type = data.worklog_type;
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
		$(document).on('click', '#add_sparrow_employee', function() {
			var worklog_id = $("#worklog_id").val();
			var session_name = $("#session_name").val();
			var session_date = $("#session_date").val();
			var topic = $("#topic").val();
			var sub_topic = $("#sub_topic").val();
			var medium = $("#medium").val();
			var session_type = $("#session_type").val();
			var stage = $("#stage").val();
			var remark = $("#remark").val();

			var sparrow_employee_checkbox = [];
			$.each($("input[name='sparrow_employee_checkbox']:checked"), function() {
				sparrow_employee_checkbox.push($(this).val());
			});


			if (worklog_id != "" && session_date != "" && session_name != "" && stage != "" && session_type != "" && topic != "" && sub_topic != "" && medium != "" && remark != "") {

				$.ajax({
					url: "<?php echo site_url('worklog/worklog_master/save_session_in_worklog'); ?>",
					type: "POST",
					data: {
						'worklog_id': worklog_id,
						'session_name': session_name,
						'session_date': session_date,
						'topic': topic,
						'sub_topic': sub_topic,
						'medium': medium,
						'session_type': session_type,
						'stage': stage,
						'remark': remark,
						'sparrow_employee_checkbox': sparrow_employee_checkbox
					},
					success: function(data) {
						window.location.href = "<?php echo site_url('edit_worklog_pg2/' . $worklog_id); ?>";
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
