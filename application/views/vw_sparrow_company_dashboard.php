<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if (!$_SESSION['user_name']) {
    header("location:welcome");
}
$role_id = $_SESSION['role_id'];
$user_name = $_SESSION['user_name'];
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
    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/HTML/dist/assets/images/brand-logos/logo.png'?>">
    
    <!-- Choices JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/choices.js/public/assets/scripts/choices.min.js'?>"></script>

    <!-- Main Theme Js -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/js/main.js'?>"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/bootstrap/css/bootstrap.min.css'?>">

    <!-- Style Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/css/styles.min.css'?>">

    <!-- Icons Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/css/icons.css'?>">

    <!-- Node Waves Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/node-waves/waves.min.css'?>">

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/simplebar/simplebar.min.css'?>">
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/flatpickr/flatpickr.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/@simonwep/pickr/themes/nano.min.css'?>">

    <!-- Choices Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/choices.js/public/assets/styles/choices.min.css'?>">

<!-- Jsvector Maps -->
<link rel="stylesheet" href="<?php echo base_url().'assets/HTML/dist/assets/libs/jsvectormap/css/jsvectormap.min.css'?>">

</head>

<body>



    <!-- Loader -->
    <div id="loader" >
        <img alt="" src="<?php echo base_url().'assets/HTML/dist/assets/images/media/loader.svg'?>">
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
                    <div>
                        <h4 class="mb-0">Hi, welcome back!<br> <?php echo $user_name; ?></h4>
                        <p class="mb-0 text-muted">Sales monitoring dashboard template.</p>
                    </div>
                    <div class="main-dashboard-header-right">
                        <div>
                            <label class="fs-13 text-muted">Customer Ratings</label>
                            <div class="main-star">
                                <i class="bi bi-star-fill fs-13 text-warning"></i> 
                                <i class="bi bi-star-fill fs-13 text-warning"></i> 
                                <i class="bi bi-star-fill fs-13 text-warning"></i> 
                                <i class="bi bi-star-fill fs-13 text-warning"></i> 
                                <i class="bi bi-star-fill fs-13 text-muted op-8"></i> <span>(14,873)</span>
                            </div>
                        </div>
                        <div>
                            <label class="fs-13 text-muted">Online Sales</label>
                            <h5 class="mb-0 fw-semibold">563,275</h5>
                        </div>
                        <div>
                            <label class="fs-13 text-muted">Offline Sales</label>
                            <h5 class="mb-0 fw-semibold">783,675</h5>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- row -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden sales-card bg-primary-gradient">
                            <div class="px-3 pt-3  pb-2 pt-0">
                                <div >
                                    <h6 class="mb-3 fs-12 text-fixed-white">TODAY ORDERS</h6>
                                </div>
                                <div class="pb-0 mt-0">
                                    <div class="d-flex">
                                        <div >
                                            <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$5,74.12</h4>
                                            <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                        </div>
                                        <span class="float-end my-auto ms-auto">
                                            <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                                            <span class="text-fixed-white op-7"> +427</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="compositeline"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden sales-card bg-danger-gradient">
                            <div class="px-3 pt-3  pb-2 pt-0">
                                <div >
                                    <h6 class="mb-3 fs-12 text-fixed-white">TODAY EARNINGS</h6>
                                </div>
                                <div class="pb-0 mt-0">
                                    <div class="d-flex">
                                        <div >
                                            <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$1,230.17</h4>
                                            <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                        </div>
                                        <span class="float-end my-auto ms-auto">
                                            <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                                            <span class="text-fixed-white op-7"> -23.09%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="compositeline2"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden sales-card bg-success-gradient">
                            <div class="px-3 pt-3  pb-2 pt-0">
                                <div >
                                    <h6 class="mb-3 fs-12 text-fixed-white">TOTAL EARNINGS</h6>
                                </div>
                                <div class="pb-0 mt-0">
                                    <div class="d-flex">
                                        <div >
                                            <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$7,125.70</h4>
                                            <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                        </div>
                                        <span class="float-end my-auto ms-auto">
                                            <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                                            <span class="text-fixed-white op-7"> 52.09%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="compositeline3"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden sales-card bg-warning-gradient">
                            <div class="px-3 pt-3  pb-2 pt-0">
                                <div >
                                    <h6 class="mb-3 fs-12 text-fixed-white">PRODUCT SOLD</h6>
                                </div>
                                <div class="pb-0 mt-0">
                                    <div class="d-flex">
                                        <div >
                                            <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$4,820.50</h4>
                                            <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                        </div>
                                        <span class="float-end my-auto ms-auto">
                                            <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                                            <span class="text-fixed-white op-7"> -152.3</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="compositeline4"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden sales-card bg-purple-gradient">
                            <div class="px-3 pt-3  pb-2 pt-0">
                                <div >
                                    <h6 class="mb-3 fs-12 text-fixed-white">PRODUCT SOLD</h6>
                                </div>
                                <div class="pb-0 mt-0">
                                    <div class="d-flex">
                                        <div >
                                            <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$4,820.50</h4>
                                            <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                        </div>
                                        <span class="float-end my-auto ms-auto">
                                            <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                                            <span class="text-fixed-white op-7"> -152.3</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="compositeline4"></div>
                        </div>
                    </div>
                </div>
                <!-- row closed -->

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
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/@popperjs/core/umd/popper.min.js'?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js'?>"></script>

    <!-- Defaultmenu JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/js/defaultmenu.min.js'?>"></script>

    <!-- Node Waves JS-->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/node-waves/waves.min.js'?>"></script>

    <!-- Sticky JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/js/sticky.js'?>"></script>

    <!-- Simplebar JS -->
    <!-- <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/simplebar/simplebar.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/HTML/dist/assets/js/simplebar.js'?>"></script> -->

    <!-- Color Picker JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/@simonwep/pickr/pickr.es5.min.js'?>"></script>

    
    <!-- Apex Charts JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/apexcharts/apexcharts.min.js'?>"></script>
    
    <!-- JSVector Maps JS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/jsvectormap/js/jsvectormap.min.js'?>"></script>
    
    <!-- JSVector Maps MapsJS -->
    <script src="<?php echo base_url().'assets/HTML/dist/assets/libs/jsvectormap/maps/world-merc.js'?>"></script>
    <script src="<?php echo base_url().'assets/HTML/dist/assets/js/us-merc-en.js'?>"></script>

    <!-- Chartjs Chart JS -->
    <!-- <script src="<?php echo base_url().'assets/HTML/dist/assets/js/index.js'?>"></script> -->
    
    
    <!-- Custom-Switcher JS -->
    <!-- <script src="<?php echo base_url().'assets/HTML/dist/assets/js/custom-switcher.min.js'?>"></script> -->
    <!-- Custom JS -->
    <!-- <script src="<?php echo base_url().'assets/HTML/dist/assets/js/custom.js'?>"></script> -->

</body>

</html>