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
						<h5 class="page-title fs-21 mb-1">Session Template Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<!-- <li class="breadcrumb-item" aria-current="page"> Master</li> -->
								<li class="breadcrumb-item"><a href="vw_session_template_master">Session Template Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Session Template Master</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/save_session_template'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">Session Template Master Form</div>
								</div>
								<div class="card-body">

									<div class="row gy-4">


										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></label>
											<select class="form-select template_field" id="coaching_program_type_id" name="coaching_program_type_id" required>
												<option value="">Select Coaching Program Type</option>
												<?php foreach ($coaching_program_type_list as $coaching_program_type) : ?>
													<option value="<?php echo $coaching_program_type->entity_id; ?>"><?php echo $coaching_program_type->coaching_program_type; ?></option>
												<?php endforeach; ?>
											</select>
										</div>


										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Participant Type<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single  template_field" data-trigger id="session_for" name="session_for" required>
												<option value="">Select Session For</option>
												<?php foreach ($session_for_list as $session_for) : ?>
													<option value="<?php echo $session_for->entity_id; ?>"><?php echo $session_for->status_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Group/Individual<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single  template_field" data-trigger id="session_type_id" name="session_type_id" required>
												<option value="">Select Session For</option>
												<option value="1">Group</option>
												<option value="2">Individual</option>
											</select>
										</div> -->

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Process<span style="color: #FF0000;">*</span></label>
											<select class="form-select template_field" id="process_id" name="process_id" required>
												<option value="">Select Process</option>
												<!-- <?php foreach ($process_list as $process) : ?>
													<option value="<?php echo $process->entity_id; ?>"><?php echo $process->process_name; ?></option>
												<?php endforeach; ?> -->
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control template_field" name="topic" id="topic" placeholder="Enter Topic" required>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Objective<span style="color: #FF0000;"></span></label>
											<textarea class="form-control" name="session_objective" id="session_objective" placeholder="Enter Session Objective" required></textarea>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Template Name<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control" name="session_template_name" id="session_template_name" placeholder="Enter Session Template Name" required>
										</div>

									</div>
								</div>

								<input type="hidden" name="status" id="status" value="1">

								<center>
									<button type="submit" id="btn_save" class="btn btn-primary mb-4">
										Save & Next
									</button>
									<p><small style="color: #FF0000;">Session Template is By Default for Group Session & for Group Only</small></p>
									<p><small style="color: #FF0000;">Medium will be decided while creating worklog</small></p>
									<br>
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
			$('#coaching_program_type_id').change(function() {
				var coaching_program_type_id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_process_list_by_coaching_program_type'); ?>",
					method: "POST",
					data: {
						coaching_program_type_id: coaching_program_type_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						var process_options = '<option value="">Select Process</option>';

						for (i = 0; i < data.length; i++) {
							process_options += '<option value=' + data[i].entity_id + '>' + data[i].process_name + '</option>';
						}
						console.log(process_options);
						$('#process_id').html(process_options);

					}
				});
				return false;
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.template_field').change(function() {
				var coaching_program_type = $('#coaching_program_type_id option:selected').text();
				var session_for = $('#session_for option:selected').val();
				var process_id = $('#process_id option:selected').val();
				var topic = $('#topic').val();

				var session_for_slug ="";

				// Call the async function
				generate_template_name(coaching_program_type,session_for,process_id,topic);

			});

		});

		

		async function generate_template_name(coaching_program_type,session_for,process_id,topic) {
				
				if (session_for && process_id) {
					try {
						// Wait for the promise to resolve and store the result
						session_for_slug = await get_session_for_slug(session_for);
						process_slug = await get_process_slug(process_id);
					
						$('#session_template_name').val(coaching_program_type + " " + session_for_slug + " " + process_slug + " " + topic);
					} catch (error) {
						// Handle any errors from the promise
						session_for_slug = "";
						process_slug = "";
						$('#session_template_name').val(coaching_program_type + " " + session_for_slug + " " + process_slug + " - " + topic);
					}
				}

			}


		function get_session_for_slug(session_for) {

			return new Promise(function(resolve, reject) {

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_session_for_slug'); ?>",
					method: "POST",
					data: {
						session_for: session_for
					},
					async: false,
					dataType: 'json',
					success: function(data) {
						resolve(data);
					},
					error: function(error) {
						reject(error);
					}

				});
			});

		}

		function get_process_slug(process_id) {

			return new Promise(function(resolve, reject) {

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_process_slug'); ?>",
					method: "POST",
					data: {
						process_id: process_id
					},
					async: false,
					dataType: 'json',
					success: function(data) {
						resolve(data);
					},
					error: function(error) {
						reject(error);
					}

				});
			});

		}
				
	</script>


</body>

</html>
