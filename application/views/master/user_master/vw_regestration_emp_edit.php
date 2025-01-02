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
						<h5 class="page-title fs-21 mb-1">User Management</h5>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="<?php echo base_url() . 'vw_regestration_data' ?>">User Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit User</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Page Header Close -->
				<?php if ($this->session->flashdata('msg') != '') { ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<?php

						echo $this->session->flashdata('msg');
						?>
					</div>
				<?php } ?>
				<form role="form" name="customer_master" action="<?php echo site_url('master/user_master/update_user'); ?>" method="post">

					<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $userId; ?>" required="required">

					<div class="row">
						<div class="col-xl-12">
							<div class="card custom-card">
								<div class="card-header">
									<div class="card-title">User Edit Detail Form</div>
								</div>
								<div class="card-body">
								<div class="row gy-4">
								
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Person Name<span style="color: #FF0000;">*</span></p>
											<input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter Email Address" disabled value="<?php echo $userProfileData['Company Name'] . ' - ' . $userProfileData['First Name'] . ' ' . $userProfileData['Last Name']; ?>">
										</div>

										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<p class="fw-semibold mb-2">Role<span style="color: #FF0000;">*</span></p>
											<select class="js-example-basic-single" data-trigger id="role_id" name="role_id" required>
												<!-- <option value="">Select Role</option> -->
												<option value="2" <?php if ($userProfileData['Role ID'] == "2") echo 'selected="selected"'; ?>>Admin</option>
												<option value="3" <?php if ($userProfileData['Role ID'] == "3") echo 'selected="selected"'; ?>>SPOC</option>
												<option value="4" <?php if ($userProfileData['Role ID'] == "4") echo 'selected="selected"'; ?>>Facilitator</option>
											</select>
										</div>


										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
											<label for="input-email" class="fw-semibold mb-2">Username <span style="color: #FF0000;">*</span></label>
											<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?php echo $userProfileData['User Name']; ?>" required>
										</div>
									</div>
									<br>
									<div class="row mb-3">
										<label for="password"
											class="col-sm-2 col-form-label"><b>Password <span style="color: #FF0000;">*</span></b></label>
										<div class="col-sm-4">
											<div class="input-group">
												<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo $userProfileData['Password']; ?>" required>
												<div class="input-group-text">
													<i class="fas fa-eye"></i>
												</div>
											</div>
										</div>

										<label for="status"
											class="col-sm-2 col-form-label"><b>Activation Status <span style="color: #FF0000;">*</span></b></label>
										<div class="col-sm-4">
											<div class="input-group">
												<select class="js-example-basic-single" data-trigger id="status" name="status" required>
													<!-- <option value="">Select Status</option> -->
													<option value="1" <?php if ($userProfileData['Status'] == "1") echo 'selected="selected"'; ?>>Active</option>
													<option value="2" <?php if ($userProfileData['Status'] == "2") echo 'selected="selected"'; ?>>In Active</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<center>
									<button type="submit" id="btn_save" class="btn btn-primary mb-4">
										Save
									</button>
								</center>

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

	<script>
		const passwordField = document.getElementById("password");
		const togglePassword = document.querySelector(".input-group-text i");

		togglePassword.addEventListener("click", function() {
			if (passwordField.type === "password") {
				passwordField.type = "text";
				togglePassword.classList.remove("fa-eye");
				togglePassword.classList.add("fa-eye-slash");
			} else {
				passwordField.type = "password";
				togglePassword.classList.remove("fa-eye-slash");
				togglePassword.classList.add("fa-eye");
			}
		});
	</script>

	<script>
		$(document).ready(function(){
			
			//check username duplication
			
			$('#username').change(function() {

var username = $(this).val();
$.ajax({
	url: "<?php echo site_url('master/user_master/username_duplication_check'); ?>",
	method: "POST",
	data: {
		username: username
	},
	async: true,
	dataType: 'json',
	success: function(data) {

		if(data){
			alert('username is duplicate');
			$('#btn_save').attr('disabled',true);
		}else{
			
			$('#btn_save').attr('disabled',false);
		}
	
	}
});
return false;
});
		});
	</script>


</body>

</html>
