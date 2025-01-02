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

	<!-- Jsvector Maps -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/HTML/dist/assets/libs/jsvectormap/css/jsvectormap.min.css' ?>">

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
                        <h5 class="page-title fs-21 mb-1">View Profile</h5>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Page</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <?php if($this->session->flashdata('msg') != ''){ ?>
                	<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php

                            echo $this->session->flashdata('msg');        
                        ?>
                    </div>
                <?php } ?>
                <!-- Start::row-1 -->
					<div class="row">
						<div class="col-xl-4 col-lg-5">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="ps-0">
                                        <div class="main-profile-overview">
											<form class="form-horizontal" role="form" name="client_info" id="uploadForm" action="<?php echo site_url('master/profile_master/update_profile_photo'); ?>" enctype="multipart/form-data" method="post">
                                            <span class="avatar avatar-xxl avatar-rounded main-img-user profile-user user-profile">
											<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
                                                <?php if(isset($profileData['profile image']))
												{ ?>
												<img src="<?php echo base_url().'assets/HTML/dist/assets/images/profile_photo/'.$profileData['profile image']; ?>" alt="" class="profile-img">
												<?php } else { ?>
												<img src="<?php echo base_url().'assets/HTML/dist/assets/images/faces/user.jpg'?>" alt="" class="profile-img">
												<?php } ?>
												<a href="javascript:void(0);" class="badge rounded-pill bg-primary avatar-badge profile-edit">
													<input type="file" name="photo" class="position-absolute profile-change w-100 h-100 op-0" id="" onchange="autoSubmit()">
													<i class="fe fe-camera"></i>
												</a>
												<button type="submit" style="display:none;">Upload</button>
												<!-- <img src="<?php //echo base_url('uploads/' . $upload_data['file_name']); ?>" alt="Uploaded Image" class="profile-img" onchange="autoSubmit()"/>
												</form> -->
											</span>
				
											<div class="d-flex justify-content-between mb-4">
												<div>
													<h5 class="main-profile-name"><?php echo $profileData['First Name'].' '.$profileData['Last Name'];?></h5>
													<p class="main-profile-name-text text-muted"><?php echo $profileData['Company Name'];?></p>
													<p class="main-profile-name-text text-muted"><?php echo $profileData['Role'];?></p>
												</div>
											</div>
                                            <!-- <h6 class="fs-14">Bio</h6>
                                            <div class="main-profile-bio">
                                                pleasure rationally encounter but because pursue consequences that are
                                                extremely painful.occur in which toil and pain can procure him some great
                                                pleasure.. <a href="javascript:void(0);">More</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col mb20">
                                                    <h5 class="fs-17">947</h5>
                                                    <h6 class="text-small text-muted fs-14 mb-0">Followers</h6>
                                                </div>
                                                <div class="col-md-4 col mb20">
                                                    <h5 class="fs-17">583</h5>
                                                    <h6 class="text-small text-muted fs-14 mb-0">Tweets</h6>
                                                </div>
                                                <div class="col-md-4 col mb20">
                                                    <h5 class="fs-17">48</h5>
                                                    <h6 class="text-small text-muted fs-14 mb-0">Posts</h6>
                                                </div>
                                            </div>
                                            <hr class="border-0">
                                            <label class="main-content-label fs-13 mb-4">Social</label>
                                            <div class="main-profile-social-list">
                                                <div class="media">
                                                    <div class="media-icon bg-primary-transparent text-primary">
                                                        <i class="icon ion-logo-github"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span>Github</span> <a href="javascript:void(0);" class="text-primary">github.com/spruko</a>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-icon bg-success-transparent text-success">
                                                        <i class="ri-twitter-x-fill"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span>Twitter</span> <a href="javascript:void(0);" class="text-primary">twitter.com/spruko.me</a>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-icon bg-info-transparent text-info">
                                                        <i class="icon ion-logo-linkedin"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span>Linkedin</span> <a href="javascript:void(0);" class="text-primary">linkedin.com/in/spruko</a>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-icon bg-danger-transparent text-danger">
                                                        <i class="icon ion-md-link"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span>My Portfolio</span> <a href="javascript:void(0);" class="text-primary">spruko.com/</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-0">
                                            <h6 class="fs-14">Skills</h6>
                                            <div class="skill-bar mb-4 clearfix mt-3">
                                                <span>HTML5 / CSS3</span>
                                                <div class="progress progress-sm mt-2">
                                                    <div class="progress-bar bg-primary-gradient" role="progressbar"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 85%"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="skill-bar mb-4 clearfix">
                                                <span>Javascript</span>
                                                <div class="progress progress-sm mt-2">
                                                    <div class="progress-bar bg-danger-gradient" role="progressbar"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 89%"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="skill-bar mb-4 clearfix">
                                                <span>Bootstrap</span>
                                                <div class="progress progress-sm mt-2">
                                                    <div class="progress-bar bg-success-gradient" role="progressbar"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="skill-bar clearfix">
                                                <span>Coffee</span>
                                                <div class="progress progress-sm mt-2">
                                                    <div class="progress-bar bg-info-gradient" role="progressbar"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 95%"></div>
                                                </div>
                                            </div> -->
                                            <!--skill bar-->
                                        </div><!-- main-profile-overview -->
                                    </div>
                                </div>
                            </div>
							<div class="card">
								<div class="card-body">
									<div class="main-content-label tx-13 mg-b-25">
										contact
									</div>
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-primary-transparent text-primary">
												<i class="icon ion-md-phone-portrait"></i>
											</div>
											<div class="media-body">
												<span>Mobile</span>
												<div>
													<?php echo $profileData['Contact Number'];?>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-icon bg-success-transparent text-success">
												<i class="icon ion-logo-slack"></i>
											</div>
											<div class="media-body">
												<span>Email</span>
												<div>
													<?php echo $profileData['Email'];?>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-icon bg-info-transparent text-info">
												<i class="icon ion-md-locate"></i>
											</div>
											<div class="media-body">
												<span>Current Address</span>
												<div>
													Pune
												</div>
											</div>
										</div>
									</div><!-- main-profile-contact-list -->
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-7">
							<div class="card">
								<div class="card-body">
									<div class="mb-4 main-content-label">Personal Information</div>
									<form class="form-horizontal" role="form" name="client_info" action="<?php echo site_url('master/profile_master/update_password'); ?>" method="post">
										
										<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">

										<div class="mb-4 main-content-label">Name</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">User Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="User Name" value="<?php echo $profileData['User Name'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">First Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="First Name" value="<?php echo $profileData['First Name'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">last Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="Last Name" value="<?php echo $profileData['Last Name'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Designation</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="Designation" value="<?php echo $profileData['Designation'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Password</label>
												</div>
												<div class="col-md-5">
													<input type="password" name="password" id="password" required class="form-control"  placeholder="Enter Password" value="<?php echo $profileData['Password'];?>">
												</div>
												<div class="col-md-2">
													<span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
												</div>
											</div>
										</div>
										<div class="mb-4 main-content-label">Contact Info</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Email<i>(required)</i></label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="Email" value="<?php echo $profileData['Email'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Phone</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="phone number" value="<?php echo $profileData['Contact Number'];?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Address</label>
												</div>
												<div class="col-md-9">
													<textarea disabled class="form-control" name="example-textarea-input" rows="2"  placeholder="Address">Pune, Maharashtra </textarea>
												</div>
											</div>
										</div>
										<!-- <div class="mb-4 main-content-label">Social Info</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Twitter</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control"  placeholder="twitter" value="twitter.com/spruko.me">
												</div>
											</div>
										</div> 
										<div class="mb-4 main-content-label">About Yourself</div>
										<div class="form-group mb-3">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label">Biographical Info</label>
												</div>
												<div class="col-md-9">
													<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
												</div>
											</div>
										</div> -->
										<div class="card-footer">
											<button type="submit" class="btn btn-primary waves-effect waves-light">Update Password</button>
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

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
		const passwordField = document.getElementById("password");
		const togglePassword = document.querySelector(".password-toggle-icon i");
		function autoSubmit() {
            document.getElementById("uploadForm").submit();
        }
		togglePassword.addEventListener("click", function () {
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
</body>

</html>
