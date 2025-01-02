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
						<h5 class="page-title fs-21 mb-1">Session Master</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<!-- <li class="breadcrumb-item" aria-current="page"> Master</li> -->
								<li class="breadcrumb-item"><a href="vw_session_master">Session Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Session Master</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->

				<form role="form" name="customer_master" action="<?php echo site_url('worklog/session_master/save_session'); ?>" method="post">
					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">Session Master Form</div>
								</div>
								<div class="card-body">

									<div class="row gy-4">


									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Template<span style="color: #FF0000;">*</span></label>
											<select class="form-select" id="session_template_id" name="session_template_id" required>
												<option value="">Select Session Template</option>
												<?php foreach ($session_template_list as $session_template) : ?>
													<option value="<?php echo $session_template->entity_id; ?>"><?php echo $session_template->session_template_name; ?></option>
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

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Group/Individual<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single  template_field" data-trigger id="session_type_id" name="session_type_id" required>
												<option value="">Select Session For</option>
												<option value="1">Group</option>
												<option value="2">Individual</option>
											</select>
										</div>


										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Process<span style="color: #FF0000;">*</span></label>
											<select class="form-select" id="process_id" name="process_id" required>
												<option value="">Select Process</option>
												<?php foreach ($process_list as $process) : ?>
													<option value="<?php echo $process->entity_id; ?>"><?php echo $process->process_name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Topic<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control" name="topic" id="topic" placeholder="Enter Topic">
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Session Date<span style="color: #FF0000;"></span></label>
											<input type="date" class="form-control" name="session_date" id="session_date" placeholder="Select Session date">
										</div>

										
										<hr class="mt-4" >
										

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Session Type<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" data-trigger id="actionable_id" name="actionable_id" required>
												<option value="1">Facilitation</option>
											</select>
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-placeholder" class="fw-semibold mb-2">Batch<span style="color: #FF0000;">*</span></label>
											<select class="form-select" id="batch_id" name="batch_id" required>
												<option value="">Select Batch</option>
												<?php foreach ($batch_list as $batch) : ?>
													<option value="<?php echo $batch->entity_id; ?>"><?php echo $batch->batch_name; ?></option>
												<?php endforeach; ?>
											</select>
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
											<label for="input-placeholder" class="fw-semibold mb-2">Session Name<span style="color: #FF0000;"></span></label>
											<input type="text" class="form-control" name="session_name" id="session_name" placeholder="Enter Session Name">
										</div>

									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
										<label for="input-placeholder" class="fw-semibold mb-2">Remark<span style="color: #FF0000;"></span></label>
										<input type="text" class="form-control" name="remark" id="remark" placeholder="Enter Remark">
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<label for="input-placeholder" class="fw-semibold mb-2">Session Objective<span style="color: #FF0000;"></span></label>
										<textarea class="form-control" name="session_objective" id="session_objective" placeholder="Enter Session Objective" rows="5" ></textarea>
									</div>
									</div>
								</div>

								<input type="hidden" name="status" id="status" value="1">
							
								<center>
									<button type="submit" id="btn_save" class="btn btn-primary mb-4">
										Save & Next
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

	<!-- <script type="text/javascript">
		$(document).ready(function() {
			$('#batch_id').change(function() {
				var batch_id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_batch_details'); ?>",
					method: "POST",
					data: {
						batch_id: batch_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						var process_list = data.process_list;
						var batch_details = data.batch_details;
						var process_options = '<option value="">Select Process</option>';
						var i;
						for (i = 0; i < process_list.length; i++) {
							process_options += '<option value=' + process_list[i].entity_id + '>' + process_list[i].process_name + '</option>';
						}
						console.log(process_options);
						$('#process_id').html(process_options);

						// render session name 

						$('#session_name').val(batch_details.batch_name);
						$('#medium').val(batch_details.mode).trigger('change');

					}
				});
				return false;
			});
		});

	</script> -->

	<script>
		$(document).ready(function() {
			$('#session_template_id').change(function() {
				var session_template_id = $(this).val();

				$.ajax({
					url: "<?php echo site_url('worklog/session_master/get_session_template_details_by_id'); ?>",
					method: "POST",
					data: {
						session_template_id: session_template_id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						$('#session_for').val(data.session_for).trigger('change');
						$('#process_id').val(data.process_id).trigger('change');
						$('#session_type_id').val(data.session_type_id).trigger('change');
						$('#topic').val(data.topic);

					}
				});

			
			});

		






		});
	</script>


</body>

</html>
