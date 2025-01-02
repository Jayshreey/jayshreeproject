<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if (!$_SESSION['user_name']) {
	header("location:welcome");
}
$role_id = $_SESSION['role_id'];
$user_name = $_SESSION['user_name'];
// $customer_name = $_SESSION['customer_name'];
// $contact_person_name = $_SESSION['contact_person_name'];
?>

<header class="app-header">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
        <!-- Start::header-content-left -->
        <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img alt="logo" class="desktop-logo" src="<?php echo base_url().'assets/HTML/dist/assets/images/brand-logos/desktop-logo.png'?>">
                        <img alt="logo" class="toggle-logo" src="<?php echo base_url().'assets/HTML/dist/assets/images/brand-logos/toggle-logo.png'?>">
                        <img alt="logo" class="desktop-white" src="<?php echo base_url().'assets/HTML/dist/assets/images/brand-logos/desktop-white.png'?>">
                        <img alt="logo" class="toggle-white" src="<?php echo base_url().'assets/HTML/dist/assets/images/brand-logos/toggle-white.png'?>">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);">
                    <i class="header-icon fe fe-align-left"></i>
                </a>
                <div class="main-header-center d-none d-lg-block">
                    <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fa fa-search d-none d-md-block"></i></button>
                </div>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <div class="header-element Search-element d-block d-lg-none">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"  class="header-link-icon"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end Search-element-dropdown" data-popper-placement="none">
                    <li>
                        <div class="input-group w-100 p-2"> 
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="btn btn-primary"> 
                                <i class="fa fa-search" aria-hidden="true"></i> 
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Start::header-element -->
            <div class="header-element headerProfile-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <!-- <img alt="img" width="37" height="37" class="rounded-circle" src="<?php echo base_url().'assets/HTML/dist/assets/images/faces/user.jpg'?>"> -->
                    <?php if(isset($profileData['profile image']))
                    { ?>
                    <img alt="img" width="37" height="37" src="<?php echo base_url().'assets/HTML/dist/assets/images/profile_photo/'.$profileData['profile image']; ?>" alt="" class="rounded-circle">
                    <?php } else { ?>
                    <img alt="img" width="37" height="37" src="<?php echo base_url().'assets/HTML/dist/assets/images/faces/user.jpg'?>" alt=""class="rounded-circle">
                    <?php } ?>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end main-profile-menu" aria-labelledby="mainHeaderProfile">
                    <li>
                        <div class="main-header-profile bg-primary menu-header-content text-fixed-white">
                            <div class="my-auto">
                                <h6 class="mb-0 lh-1 text-fixed-white"><?php echo $user_name; ?></h6><!-- <span class="fs-11 op-7 lh-1">Premium Member</span> -->
                            </div>
                        </div>
                    </li>
                    <!-- <li><a class="dropdown-item d-flex" href="profile.html"><i class="bx bx-user-circle fs-18 me-2 op-7"></i>Profile</a></li> -->
                    <li><a class="dropdown-item d-flex" href="<?php echo base_url().'profile_management'?>"><i class="bx bx-cog fs-18 me-2 op-7"></i>View Profile </a></li>
                    <?php if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2)){?>
                        <li><a class="dropdown-item d-flex" href="<?php echo base_url().'vw_regestration_data'?>"><i class="bx bx-slider-alt fs-18 me-2 op-7"></i>Manage Profile </a></li>
                    <?php } ?>
                    <!-- <li><a class="dropdown-item d-flex border-block-end" href="mail.html"><i class="bx bxs-inbox fs-18 me-2 op-7"></i>Inbox</a></li>
                    <li><a class="dropdown-item d-flex" href="chat.html"><i class="bx bx-envelope fs-18 me-2 op-7"></i>Messages</a></li>
                    <li><a class="dropdown-item d-flex border-block-end" href="editprofile.html"><i class="bx bx-slider-alt fs-18 me-2 op-7"></i>Account Settings</a></li> -->
                    <li><a class="dropdown-item d-flex" href="<?php echo base_url() . 'welcome/logout' ?>"><i class="bx bx-log-out fs-18 me-2 op-7"></i>Sign Out</a></li>
                </ul>
            </div>  
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->

</header>
