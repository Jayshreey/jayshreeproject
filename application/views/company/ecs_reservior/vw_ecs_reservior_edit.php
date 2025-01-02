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
	<title> VB Digitech </title>
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
								<li class="breadcrumb-item" aria-current="page"> Reservoir</li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('vw_ecs_reservior_master'); ?>">ECS Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update ECS Reservior</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('company/ecs_reserviour/update_ecs_reserviour'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">ECS Reservoir Form</div>
								</div>
								<div class="card-body">


									<input type="hidden" id="ecs_reservior_id" name="ecs_reservior_id" value="<?php echo $ecs_reservior_id; ?>">


									<!-- Start:: row-6 -->
									<div class="row">
										<div class="col-xl-12">
											<!-- <div class="card custom-card"> -->
											<div class="card-header justify-content-between">
												<div class="card-title">
													Client Information
												</div>
												<div class="prism-toggle">
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
														data-bs-target="#modal-edit-prospect"><i class="fe fe-edit-2 "></i></a>
												</div>
											</div>
											<div class="card-body">
												<dl class="row mb-0">
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">client_name</dt>
															<dd class="col-sm-8 client_name" id="client_name"></dd>

															<dt class="col-sm-4">RM Name</dt>
															<dd class="col-sm-8 rm_name"></dd>

															<dt class="col-sm-4">client create date</dt>
															<dd class="col-sm-8 client_create_date"></dd>

															<dt class="col-sm-4">Date of Birth</dt>
															<dd class="col-sm-8 dob"></dd>
															
															<dt class="col-sm-4">Age Group</dt>
															<dd class="col-sm-8 age_group"></dd>

														</dl>
													</dl>
													<dl class="col-sm-6">
														<dl class="row mb-0">

															<dt class="col-sm-4">Marital Status</dt>
															<dd class="col-sm-8 marital_status"></dd>

															<dt class="col-sm-4">Income Group</dt>
															<dd class="col-sm-8 income_group"></dd>

															<dt class="col-sm-4">Occupation</dt>
															<dd class="col-sm-8 occupation"></dd>

															<dt class="col-sm-4">gender</dt>
															<dd class="col-sm-8 gender"></dd>

														</dl>
													</dl>
												</dl>
											</div>

											<!-- </div> -->
										</div>
									</div>
									<!-- End:: row-6 -->

								</div>

								<center>
									<a href="<?php echo base_url('vw_ecs_reservior_master');?>"  class="btn btn-primary mb-4">
										Back
									</a>
								</center>

							</div>
						</div>
					</div>
			</div>
			</form>

		</div>
	</div>
	<!-- End::app-content -->

	<!-- modal start -->

	<div class="modal fade" id="modal-edit-prospect" tabindex="-1"
		aria-labelledby="modal-edit-prospect" data-bs-keyboard="false"
		aria-hidden="true">
		<!-- Scrollable modal -->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Edit ECS Reservoir
					</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<form role="form" name="customer_master" action="<?php echo site_url('company/reserviour/ecs_reservior/update_ecs_reserviour'); ?>" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-xl-12">
								<!-- <div class="card custom-card"> -->
								<div class="card-header justify-content-between">
									<div class="card-title">
										Client Information
									</div>

								</div>
							</div>
						</div>

						<div class="card-body">


							<input type="hidden" id="pop_up_ecs_reservior_id" name="pop_up_ecs_reservior_id" value="<?php echo $ecs_reservior_id; ?>">


							<div class="row gy-4">

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Client Name</label>
									<input type="text" class="form-control pop_up_client_name" name="pop_up_client_name" id="pop_up_client_name" placeholder="Enter Client Name">
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">RM Name</label>
									<select class="form-select pop_up_rm_name" id="pop_up_rm_name" name="pop_up_rm_name">
										<option value="">Select RM Name</option>
										<?php foreach ($rm_list as $rm) : ?>
											<option value="<?php echo $rm->entity_id; ?>"><?php echo $rm->rm_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Date Of Birth<span style="color: #FF0000;">*</span></label>
									<input type="date" class="form-control pop_up_dob" name="pop_up_dob" id="pop_up_dob" placeholder="Enter Date of Birth" required>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Gender<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_gender" id="pop_up_gender" name="pop_up_gender" required>
										<option value="">No Selected</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Income Group<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_income_group" id="pop_up_income_group" name="pop_up_income_group" required>
										<option value="">No Selected</option>
										<option value="0">0</option>
										<option value="1">1 - 2.5 lakhs p.a.</option>
										<option value="2">2.6 - 8 lakhs p.a.</option>
										<option value="3">8.1 - 12 lakhs p.a.</option>
										<option value="4">12.1 - 24 lakhs p.a.</option>
										<option value="5">24.1-48 lakhs p.a.</option>
										<option value="6">48+ lakhs</option>
									</select>
								</div> 
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Marital Status<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_merital_status" id="pop_up_merital_status" name="pop_up_merital_status" required>
										<option value="">No Selected</option>
										<option value="Married">Married</option>
										<option value="Single">Single</option>
										<option value="Divorcee">Divorcee</option>
										<option value="Widower">Widower</option>
										<option value="Separated">Separated</option>
									</select>
								</div> 

							</div>
							<br/>

							<div class="row gy-4">
								
								
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Occupation<span style="color: #FF0000;">*</span></label>
									<select class="form-select pop_up_occupation" id="pop_up_occupation" name="pop_up_occupation" required>
										<option value="">No Selected</option>
										<option value="Service">Service</option>
										<option value="Business">Business</option>
										<option value="Retired">Retired</option>
										<option value="Student">Student</option>
										<option value="Homemaker">Homemaker</option>
										<option value="Professional">Professional</option>
										<option value="Self Employed">Self Employed</option>
									</select>
								</div> 

								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
									<label for="input-placeholder" class="fw-semibold mb-2">Activation Status</label>
									<select class="form-select pop_up_status" id="pop_up_status" name="pop_up_status" >
										<option value="">No Selected</option>
										<option value="1">Active</option>
										<option value="2">In-Active</option>
									</select>
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

			get_data_edit();

			//load data for edit
			function get_data_edit() {
				var ecs_reserviour_id = $('[name="ecs_reservior_id"]').val();

				$.ajax({
					url: "<?php echo site_url('company/reserviour/ecs_reservior/get_ecs_reservior_details_by_id'); ?>",
					method: "POST",
					data: {
						ecs_reserviour_id: ecs_reserviour_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('.client_name').text(data.client_name);
						$('.rm_name').text(data.rm_name);
						$('.client_create_date').text(data.client_create_date);
						$('.occupation').text(data.occupation);
						$('.marital_status').text(data.merital_status);
						var income_group='';
						if (data.income_group == 1) {
							income_group = "1 - 2.5 lakhs p.a.";
						} else if (data.income_group == 2) {
							income_group = "2.6 - 8 lakhs p.a.";
						} else if (data.income_group == 3) {
							income_group = "8.1 - 12 lakhs p.a.";
						} else if (data.income_group == 4) {
							income_group = "12.1 - 24 lakhs p.a.";
						} else if (data.income_group == 5) {
							income_group = "24.1-48 lakhs p.a.";
						} else if (data.income_group == 6) {
							income_group = "48+ lakhs";
						} else {
							income_group = 0;
						}
						
						$('.income_group').text(income_group);
						$('.dob').text(data.dob);
						var agegroup= getAgeGroup(data.dob);
						$('.age_group').text(agegroup);
						$('.gender').text(data.gender);
						
						var conversion_status = data.conversion_status;
						var status = "";
						if (conversion_status == 1) {
							status = "Contacted";
						} else {
							status = "Not Contacted";
						} 

						$('.status').text(status);

						//render data to modal

					
						$('.pop_up_gender').val(data.gender);
						$('.pop_up_client_name').val(data.client_name);
						$('.pop_up_rm_name').val(data.rm_id).trigger('change');
						$('.pop_up_dob').val(data.dob);
						$('.pop_up_income_group').val(data.income_group).trigger('change');
						$('.pop_up_merital_status').val(data.merital_status).trigger('change');
						$('.pop_up_occupation').val(data.occupation).trigger('change');
						$('.pop_up_status').val(data.status).trigger('change');
						
					}
				});
			}
		});
		function getAgeGroup(birthdate) {
			const currentDate = new Date();
			const birthDate = new Date(birthdate);

			// Calculate the age
			let age = currentDate.getFullYear() - birthDate.getFullYear();
			const month = currentDate.getMonth();
			const day = currentDate.getDate();

			// Adjust age if birthday hasn't occurred yet this year
			if (month < birthDate.getMonth() || (month === birthDate.getMonth() && day < birthDate.getDate())) {
				age--;
			}

			// Determine the age group
			let ageGroup;
			if (age <= 17) {
				ageGroup = '0-17';
			} else if (age >= 18 && age <= 24) {
				ageGroup = '18-24';
			} else if (age >= 25 && age <= 35) {
				ageGroup = '25-35';
			} else if (age >= 36 && age <= 45) {
				ageGroup = '36-45';
			} else if (age >= 46 && age <= 55) {
				ageGroup = '46-55';
			} else {
				ageGroup = '56+';
			}

			return ageGroup;
			}



	</script>



</body>

</html>
