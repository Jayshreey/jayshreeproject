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
						<h5 class="page-title fs-21 mb-1">Company Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Master</li>
								<li class="breadcrumb-item"><a href="vw_company_master">Company Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Company Master</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('participants/company_master/save_company_details'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">Company Master Form</div>
								</div>
								<div class="card-body">
								<div class="row gy-4">
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Company Name <span style="color: #FF0000;">*</span></label>
											<input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?php echo $company_details->company_name; ?>" required>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Source<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" id="source_id" name="source_id" required>
												<option value="">Select Source</option>
												<?php foreach ($source_list as $source) : ?>
													<option value="<?php echo $source->entity_id; ?>"><?php echo $source->source_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">NCA/ECS<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" data-trigger id="nca_ecs" name="nca_ecs" required>
												<option value="">Select Company Type</option>
													<option value="1">NCA</option>
													<option value="2">ECS</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="text-area" class="fw-semibold mb-2">Address <span style="color: #FF0000;">*</span></label>
											<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Customer Address" value="<?php echo $company_details->address; ?>"  required></textarea>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">State<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" data-trigger id="state_id" name="state_id" required>
												<option value="">Select State</option>
												<?php foreach ($state_list as $state) : ?>
													<option value="<?php echo $state->entity_id; ?>"><?php echo $state->state_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">City<span style="color: #FF0000;">*</span></p>
											<select class="form-control" id="city_id" name="city_id" required>
												<option value="">Select City</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-number" class="fw-semibold mb-2">Locality <span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control" name="locality" id="locality" placeholder="Enter Locality"  value="<?php echo $company_details->locality; ?>" >
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-number" class="fw-semibold mb-2">Pin Code <span style="color: #FF0000;">*</span></label>
											<input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Pin Code"  value="<?php echo $company_details->pincode; ?>" required>
										</div>

									</div>
								</div>
								<div class="card-body">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal"
										data-bs-target="#exampleModalScrollable2">
										Add Contact Details
									</button>
									<div class="modal fade" id="exampleModalScrollable2" tabindex="-1"
										aria-labelledby="exampleModalScrollable2" data-bs-keyboard="false"
										aria-hidden="true">
										<!-- Scrollable modal -->
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h6 class="modal-title">Contact Details
													</h6>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="row gy-4">
														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-placeholder" class="fw-semibold mb-2">Salutation <span style="color: #FF0000;">* Mandatory Field</span></label>
															<input type="text" class="form-control" name="salutation" id="salutation" placeholder="Enter Salutation" required>
														</div>

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-placeholder" class="fw-semibold mb-2">Contact Person <span style="color: #FF0000;">* Mandatory Field</span></label>
															<input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person" required>
														</div>

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-email" class="fw-semibold mb-2">Email <span style="color: #FF0000;">* Mandatory Field</span></label>
															<input type="email" class="form-control" name="contact_person_email_id" id="contact_person_email_id" placeholder="Enter Email Address" required>
														</div>

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-number" class="fw-semibold mb-2">Contact Number <span style="color: #FF0000;">* Mandatory Field</span></label>
															<input type="number" class="form-control" name="first_contact_no" id="first_contact_no" placeholder="Enter Contact Number" required>
														</div>

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-number" class="fw-semibold mb-2">Alternate Contact Number </label>
															<input type="number" class="form-control" name="second_contact_no" id="second_contact_no" placeholder="Enter Alternate Contact Number">
														</div>

														<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
															<label for="input-number" class="fw-semibold mb-2">What'up Number </label>
															<input type="number" class="form-control" name="whatsup_no" id="whatsup_no" placeholder="Enter What'up Number">
														</div>

													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-bs-dismiss="modal">Close</button>
													<button type="button" type="submit" name="add_address" id="add_address" class="btn btn-primary">Save
														Changes</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			</form>

		</div>
	</div>
	<!-- End::app-content -->

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

	<script type="text/javascript">
		$(document).ready(function() {
			$('#state_id').change(function() {
				var id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('master/customer_master/get_city_name'); ?>",
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

		$(document).on('click', '#add_address', function() {

			var address = $("#address").val();
			var state_id = $("#state_id").val();
			var city_id = $("#city_id").val();
			var customer_pin_code = $("#customer_pin_code").val();
			var customer_state_code = $("#customer_state_code").val();
			var customer_short_name = $("#customer_short_name").val();
			var customer_gst_number = $("#customer_gst_number").val();
			var customer_email = $("#email").val();
			var contact_person = $("#contact_person").val();
			var contact_person_email_id = $("#contact_person_email_id").val();
			var first_contact_no = $("#first_contact_no").val();
			var second_contact_no = $("#second_contact_no").val();
			var salutation = $("#salutation").val();
			var whatsup_no = $("#whatsup_no").val();
			var customer_name = $("#customer_name").val();
			var customer_type = $("#customer_type").val();
			var foundation_date = $("#foundation_date").val();
			var source = $("#source").val();

			if (customer_name != "" && source != "" && customer_type != "" && address != "" && state_id != "" && city_id != "" && customer_pin_code != "" && customer_email != "") {

				$.ajax({
					url: "<?php echo site_url('master/customer_master/save_customer_details'); ?>",
					type: "POST",
					data: {
						'address': address,
						'state_id': state_id,
						'city_id': city_id,
						'customer_email': customer_email,
						'customer_pin_code': customer_pin_code,
						'foundation_date': foundation_date,
						'customer_gst_number': customer_gst_number,
						'customer_short_name': customer_short_name,
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
						data = data.trim();
						window.location.href = "edit_customer_master/" + data;
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


</body>

</html>
