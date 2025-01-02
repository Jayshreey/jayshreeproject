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
						<h5 class="page-title fs-21 mb-1">NCA Reservoir</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item" aria-current="page"> Reservoir</li>
								<li class="breadcrumb-item"><a href="vw_nca_reserviour_master">NCA Reservoir</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add New</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('company/reserviour/nca_reserviour/save_nca_reserviour'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">NCA Reservoir Form</div>
								</div>
								<div class="card-body">
									
									<div class="row gy-4">

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Salutation<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" data-trigger id="salutation" name="salutation" required>
												<option value="">Select Salutation</option>
												<option value="Mr.">Mr.</option>
												<option value="Ms.">Ms.</option>
												<option value="Mrs.">Mrs.</option>
												<option value="Dr.">Dr.</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">First Name<span style="color: #FF0000;">*</span></label>
											<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Middle Name<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name">
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Last Name<span style="color: #FF0000;">*</span></label>
											<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required>
										</div>
									

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-email" class="fw-semibold mb-2">Email </label>
											<input type="email" class="form-control" name="email_id" id="email_id" placeholder="Enter Email Address" >
										</div>
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-number" class="fw-semibold mb-2">Contact Number <span style="color: #FF0000;">*</span></label>
											<input type="text" class="form-control" name="mobile1" id="mobile1" placeholder="Enter Contact Number" required>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Gender</label>
											<select class="form-select" id="gender" name="gender" >
												<option value="">No Selected</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-" class="fw-semibold mb-2">Dependants </label>
											<input type="text" class="form-control" name="dependants" id="dependants" placeholder="Enter Dependants" >
										</div>
										
									
									
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Source<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single company_element" id="source_id" name="source_id" required>
												<option value="">Select Source</option>
												<?php foreach ($source_list as $source) : ?>
													<option value="<?php echo $source->entity_id; ?>"><?php echo $source->source_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 source_description">
											<label for="input-number" class="fw-semibold mb-2">Source Description </label>
											<input type="text" class="form-control" name="source_description" id="source_description" placeholder="Enter Source Description" >
										</div>
											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Merital Status</label>
												<select class="form-select" id="merital_status" name="merital_status" >
													<option value="">No Selected</option>
													<option value="Married">Married</option>
													<option value="Single">Single</option>
													<option value="Divorcee">Divorcee</option>
													<option value="Widower">Widower</option>
													<option value="Separated">Separated</option>
												</select>
											</div> 
											<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
												<label for="input-placeholder" class="fw-semibold mb-2">Occupation</label>
												<select class="form-select" id="occupation" name="occupation">
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

										</div>

										<br>
									
									<div class="row gy-4">
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Assign To</p>
											<select class="js-example-basic-single company_element" id="assigned_to" name="assigned_to" >
												<option value="">Select employee</option>
												<?php foreach ($sparrow_employee_list as $emp) : ?>
													<option value="<?php echo $emp->entity_id; ?>"><?php echo $emp->first_name.' '.$emp->last_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Income Group</label>
											<select class="form-select" id="income_group" name="income_group" >
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
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
											<label for="text-area" class="fw-semibold mb-2">Area </label>
											<textarea class="form-control company_element" id="area" name="area" rows="3" placeholder="Enter Address" ></textarea>
										</div>

									</div>
									<br>
								</div>

								<center>
									<button type="submit" id="btn_save" class="btn btn-primary mb-4">
										Save
									</button>
								</center>

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



</body>

</html>
