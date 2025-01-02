<?php
$roleId = $_SESSION['role_id'];
date_default_timezone_set('Asia/Kolkata');
$today_date = date('Y-m-d');
$month = date('Y-m-01');
?>
<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">
	<!-- Start::main-sidebar-header -->
	<div class="main-sidebar-header">
		<a href="<?php echo base_url() . 'dashboard/' . $month ?>" class="header-logo">
			<img alt="logo" class="desktop-logo" src="<?php echo base_url() . 'assets/HTML/dist/assets/images/media/pngs/logo.png' ?>">
			<img alt="logo" class="toggle-logo" src="<?php echo base_url() . 'assets/HTML/dist/assets/images/media/pngs/logo.png' ?>">
			<img alt="logo" class="desktop-white" src="<?php echo base_url() . 'assets/HTML/dist/assets/images/media/pngs/logo.png' ?>">
			<img alt="logo" class="toggle-white" src="<?php echo base_url() . 'assets/HTML/dist/assets/images/media/pngs/logo.png' ?>">
		</a>
	</div>
	<!-- End::main-sidebar-header -->

	<!-- Start::main-sidebar -->
	<div class="main-sidebar" id="sidebar-scroll">

		<!-- Start::nav -->
		<nav class="main-menu-container nav nav-pills flex-column sub-open">
			<div class="slide-left" id="slide-left">
				<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
					<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
				</svg>
			</div>
			<ul class="main-menu">
				<!-- Start::slide__category -->
				<!-- <li class="slide__category"><span class="category-name">Main</span></li> -->
				<!-- End::slide__category -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="<?php echo base_url() . 'dashboard/' . $month ?>" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
							<path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
						</svg>
						<span class="side-menu__label">Dashboard</span>
						<span class="badge bg-success ms-auto menu-badge">1</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide__category -->
				<li class="slide__category"><span class="category-name">Menu</span></li>
				<!-- End::slide__category -->

				<!-- Start::slide -->
				<?php if ($roleId == 1 || $roleId == 2 || $roleId == 3 ) { ?>

					<?php
					$array = array('vw_prospect_master', 'vw_prospect_master_all', 'create_prospect', 'edit_prospect_master', 'vw_participant_master', 'convert_prospect_to_partipant', 'create_participant_master', 'vw_participant_master_all', 'edit_participant_master', 'vw_company_master_all', 'vw_company_master', 'create_company_master', 'edit_company_master', 'view_company_master');
					?>
					<li class="slide has-sub <?php echo (in_array($this->uri->segment(1), $array)) ? "active open" : ""; ?>">
						<a href="javascript:void(0);" class="side-menu__item <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Data Reservoir</span>
							<i class="fe fe-chevron-right side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1">
							<li class="slide side-menu__label1">
								<a href="javascript:void(0);">Data Reservoir</a>
							</li>
							<li class="slide <?php echo ($this->uri->segment(1) == "vw_prospect_master" || $this->uri->segment(1) == "vw_prospect_master" || $this->uri->segment(1) == "edit_prospect_master" || $this->uri->segment(1) == "create_prospect" || $this->uri->segment(1) == "vw_prospect_master_all") ? "active" : ""; ?>">


								<a href="<?php echo base_url() . 'vw_prospect_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_prospect_master" || $this->uri->segment(1) == "vw_prospect_master" || $this->uri->segment(1) == "edit_prospect_master" || $this->uri->segment(1) == "create_prospect" || $this->uri->segment(1) == "vw_prospect_master_all") ? "active" : ""; ?>">
									<span class="side-menu__label">NCA Reservoir</span>
								</a>
							</li>

							<li class="slide <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_participant_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_participant_master" || $this->uri->segment(1) == "create_participant_master" || $this->uri->segment(1) == "vw_participant_master_all" || $this->uri->segment(1) == "edit_participant_master") ? "active" : ""; ?>">ECS Reservoir</a>
							</li>
							<li class="slide <?php echo ($this->uri->segment(1) == "vw_company_master" || $this->uri->segment(1) == "create_company_master" || $this->uri->segment(1) == "edit_company_master" || $this->uri->segment(1) == "view_company_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_company_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_company_master" || $this->uri->segment(1) == "vw_company_master_all" || $this->uri->segment(1) == "create_company_master" || $this->uri->segment(1) == "edit_company_master" || $this->uri->segment(1) == "view_company_master") ? "active" : ""; ?>">ECS Company Reservoir</a>
							</li>

						</ul>
					</li>
				<?php } ?>
				<!-- End::slide -->

				<!-- Start::slide -->
				<?php if ($roleId == 1 || $roleId == 2 || $roleId == 3 || $roleId == 4) { ?>

					<?php
					$array = array('vw_worklog_master', 'vw_worklog_master_all', 'create_worklog', 'edit_worklog', 'edit_worklog_pg2', 'vw_daily_diary_master', 'vw_daily_diary_master_all', 'create_daily_diary_master', 'edit_daily_diary', 'vw_attendance_master');
					?>
					<li class="slide has-sub <?php echo (in_array($this->uri->segment(1), $array)) ? "active open" : ""; ?>">
						<a href="javascript:void(0);" class="side-menu__item <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Worklog</span>
							<i class="fe fe-chevron-right side-menu__angle"></i>
						</a>


						<?php
						$array_worklog = array('vw_worklog_master', 'vw_worklog_master_all', 'create_worklog', 'edit_worklog', 'edit_worklog_pg2');
						?>
						<ul class="slide-menu child1">



							<li class="slide <?php echo (in_array($this->uri->segment(1), $array_worklog)) ? "active" : ""; ?>">


								<a href="<?php echo base_url() . 'vw_worklog_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_worklog_master" || $this->uri->segment(1) == "create_worklog" || $this->uri->segment(1) == "edit_worklog" || $this->uri->segment(1) == "edit_worklog_pg2") ? "active" : ""; ?>">
									<span class="side-menu__label">Worklog</span>
								</a>
							</li>

							<?php
							$array1 = array('vw_daily_diary_master', 'vw_daily_diary_master_all', 'create_daily_diary_master', 'edit_daily_diary');
							?>

							<li class="slide <?php echo (in_array($this->uri->segment(1), $array1)) ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_daily_diary_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_daily_diary_master" || $this->uri->segment(1) == "create_daily_diary_master" || $this->uri->segment(1) == "vw_daily_diary_master_all" || $this->uri->segment(1) == "edit_daily_diary") ? "active" : ""; ?>">Daily Diary Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_attendance_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_attendance_master/' . $today_date; ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_attendance_master") ? "active" : ""; ?>">Active Days Log (Attendance)</a>
							</li>
						</ul>
					</li>
				<?php } ?>
				<!-- End::slide -->



				<!-- Start::slide -->
				<?php if ($roleId == 1 || $roleId == 2 ) { ?>
					<?php
					$array = array('vw_sparrow_employee_master', 'create_sparrow_employee', 'edit_sparrow_employee_master', 'vw_spoc_master', 'edit_spoc_master','vw_facilitator_master','edit_facilitator_master');
					?>
					<li class="slide has-sub <?php echo (in_array($this->uri->segment(1), $array)) ? "active open" : ""; ?>">
						<a href="javascript:void(0);" class="side-menu__item <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Sparrow's Sprout Team</span>
							<i class="fe fe-chevron-right side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1 <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<li class="slide side-menu__label1">
								<a href="javascript:void(0);">Sparrow's Sprout Team</a>
							</li>
							<li class="slide <?php echo ($this->uri->segment(1) == "vw_sparrow_employee_master" || $this->uri->segment(1) == "create_sparrow_employee" || $this->uri->segment(1) == "edit_sparrow_employee_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_sparrow_employee_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_sparrow_employee_master" || $this->uri->segment(1) == "create_sparrow_employee" || $this->uri->segment(1) == "edit_sparrow_employee_master") ? "active" : ""; ?>">Team Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_spoc_master" || $this->uri->segment(1) == "edit_spoc_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_spoc_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_spoc_master" || $this->uri->segment(1) == "edit_spoc_master") ? "active" : ""; ?>">SPOC Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_facilitator_master" || $this->uri->segment(1) == "edit_facilitator_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_facilitator_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_facilitator_master" || $this->uri->segment(1) == "edit_facilitator_master") ? "active" : ""; ?>">Training Assistant Master</a>
							</li>

						</ul>
					</li>
				<?php } ?>
				<!-- End::slide -->

				
				<!-- Start::slide -->
				<li class="slide">
					<a href="<?php //echo base_url() . 'vw_all_business_sarthi' 
										?>" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
							<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
						</svg>
						<span class="side-menu__label">Business Sarthi</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide -->
				 
				<?php  if ($roleId == 1 || $roleId == 2 || $roleId == 3) { ?>



					<li class="slide"> <a href="<?php echo base_url() . 'create_participant_attendance' ?>" class="side-menu__item <?php echo (in_array($this->uri->segment(1), ['create_participant_attendance','generate_participant_attendance'])) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Participant Attendance</span>
						</a>
					</li>
				<?php } ?>
				<!-- End::slide -->

				<!-- Start::slide -->
				<?php if ($roleId == 1 || $roleId == 2 || $roleId == 3 ) { ?>
					<?php
					$array = array('vw_session_template_master', 'create_session_template', 'edit_session_template_master');
					?>
					<li class="slide has-sub <?php echo (in_array($this->uri->segment(1), $array)) ? "active open" : ""; ?>">
						<a href="javascript:void(0);" class="side-menu__item <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Sessions</span>
							<i class="fe fe-chevron-right side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1 <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<li class="slide side-menu__label1">
								<a href="javascript:void(0);">Sessions</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_session_template_master" || $this->uri->segment(1) == "create_session_template" || $this->uri->segment(1) == "edit_session_template_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_session_template_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_session_template_master" || $this->uri->segment(1) == "create_session_template" || $this->uri->segment(1) == "edit_session_template_master") ? "active" : ""; ?>">Session Template Master</a>
							</li>

						</ul>
					</li>
				<?php } ?>
				<!-- End::slide -->



				<!-- Start::slide -->
				<?php if ($roleId == 1 || $roleId == 2 || $roleId == 3) { ?>
					<?php
					$array = array('vw_coaching_program_master', 'edit_coaching_program_master', 'create_coaching_program_master', 'vw_coaching_program_type_master', 'edit_coaching_program_type_master', 'create_coaching_program_type_master','vw_batch_master','create_batch_master','edit_batch_master');
					?>
					<li class="slide has-sub <?php echo (in_array($this->uri->segment(1), $array)) ? "active open" : ""; ?>">
						<a href="javascript:void(0);" class="side-menu__item <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none" />
								<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
								<path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
							</svg>
							<span class="side-menu__label">Settings</span>
							<i class="fe fe-chevron-right side-menu__angle"></i>
						</a>
						<ul class="slide-menu child1 <?php echo (in_array($this->uri->segment(1), $array)) ? "active" : ""; ?>">
							<li class="slide side-menu__label1">
								<a href="javascript:void(0);">Settings</a>
							</li>
							
							<li class="slide <?php echo ($this->uri->segment(1) == "vw_coaching_program_master" || $this->uri->segment(1) == "edit_coaching_program_master" || $this->uri->segment(1) == "create_coaching_program_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_coaching_program_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_coaching_program_master" || $this->uri->segment(1) == "edit_coaching_program_master" || $this->uri->segment(1) == "create_coaching_program_master") ? "active" : ""; ?>">Level Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_coaching_program_type_master" || $this->uri->segment(1) == "edit_coaching_program_type_master" || $this->uri->segment(1) == "create_coaching_program_type_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_coaching_program_type_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_coaching_program_type_master" || $this->uri->segment(1) == "edit_coaching_program_type_master" || $this->uri->segment(1) == "create_coaching_program_type_master") ? "active" : ""; ?>">Coaching Program Type Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_batch_master" || $this->uri->segment(1) == "create_batch_master" || $this->uri->segment(1) == "edit_batch_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_batch_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_batch_master" || $this->uri->segment(1) == "create_batch_master" || $this->uri->segment(1) == "edit_batch_master") ? "active" : ""; ?>">Batch Master</a>
							</li>

							<li class="slide <?php echo ($this->uri->segment(1) == "vw_session_master" || $this->uri->segment(1) == "create_session" || $this->uri->segment(1) == "edit_session_master") ? "active" : ""; ?>">
								<a href="<?php echo base_url() . 'vw_session_master' ?>" class="side-menu__item <?php echo ($this->uri->segment(1) == "vw_session_master" || $this->uri->segment(1) == "create_session" || $this->uri->segment(1) == "edit_session_master") ? "active" : ""; ?>">Session Master</a>
							</li>

						</ul>
					</li>
				<?php } ?>
				<!-- End::slide -->

			</ul>
			<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
					<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
				</svg></div>
		</nav>
		<!-- End::nav -->

	</div>
	<!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->
