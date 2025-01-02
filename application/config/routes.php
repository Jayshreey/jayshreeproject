<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

$route['company_dashboard'] = "welcome/dashboard/company_dashboard";

//Dashboard
$route['dashboard/:any'] = "dashboard/dashboard";
$route['sparrow_dashboard'] = "dashboard/sparrow_dashboard";
$route['sparrow_spoc_dashboard'] = "dashboard/sparrow_spoc_dashboard";
$route['company_dashboard'] = "welcome/dashboard/company_dashboard";

//Edit Profile
$route['profile_management'] = "master/profile_master";

//Profile management
$route['vw_regestration_data'] = "master/user_master";
$route['vw_regestration_create'] = "master/user_master/vw_regestration_create";
$route['edit_user_info/:any'] = "master/user_master/edit_user_info";
$route['delete_user_info/:any'] = "master/user_master/delete_user_info";
$route['vw_view_regestration/:any'] = "master/user_master/vw_view_regestration";

//Sparrow Employee master
$route['vw_sparrow_employee_master'] = "master/sparrow_employee_master";
$route['vw_spoc_master'] = "master/sparrow_employee_master/spoc_index";
$route['vw_facilitator_master'] = "master/sparrow_employee_master/facilitator_index";
$route['create_sparrow_employee'] = "master/sparrow_employee_master/create_sparrow_employee";
$route['edit_sparrow_employee/:any'] = "master/sparrow_employee_master/edit_sparrow_employee";
$route['edit_spoc_master/:any'] = "master/sparrow_employee_master/edit_spoc";



//Prospect master
$route['vw_prospect_master'] = "reservoir/prospect_master";
$route['vw_prospect_master_all'] = "reservoir/prospect_master/index_all";
$route['create_prospect'] = "reservoir/prospect_master/create_prospect";
$route['edit_prospect_master/:any'] = "reservoir/prospect_master/edit_prospect_master";
$route['convert_prospect_to_partipant/:any'] = "reservoir/prospect_master/convert_prospect_to_partipant";



//Session  master
$route['vw_session_master'] = "worklog/session_master";
$route['create_session'] = "worklog/session_master/create_session";
$route['edit_session_master/:any'] = "worklog/session_master/edit_session_master";
$route['delete_session_master/:any'] = "worklog/session_master/delete_session_master";
$route['fetch_batch_participants_in_session/:any'] = "worklog/session_master/fetch_batch_participants_in_session";

$route['vw_session_template_master'] = "worklog/session_master/template_index";
$route['create_session_template'] = "worklog/session_master/create_session_template";
$route['edit_session_template_master/:any'] = "worklog/session_master/edit_session_template_master";
$route['edit_session_template_master_pg2/:any'] = "worklog/session_master/edit_session_template_master_pg2";
$route['add_session_from_template'] = "worklog/session_master/add_session_from_template";

//Worklog master
$route['vw_worklog_master'] = "worklog/worklog_master";
$route['vw_worklog_master_all'] = "worklog/worklog_master/index_all";
$route['create_worklog/:any'] = "worklog/worklog_master/create_worklog";
$route['edit_worklog/:any'] = "worklog/worklog_master/edit_worklog";
$route['edit_worklog_pg2/:any'] = "worklog/worklog_master/edit_worklog_pg2";
$route['vw_attendance_master/:any'] = "worklog/worklog_master/vw_attendance_master";
$route['create_participant_attendance'] = "worklog/worklog_master/create_participant_attendance";
$route['generate_participant_attendance'] = "worklog/worklog_master/generate_participant_attendance";

// Daily Diary Master
$route['vw_daily_diary_master'] = "worklog/daily_diary_master";
$route['edit_daily_diary_master/:any'] = "worklog/daily_diary_master/edit_daily_diary_master";
$route['create_daily_diary_master'] = "worklog/daily_diary_master/create";

// Customer Master
$route['vw_customer_master'] = "master/customer_master";
$route['create_customer_master'] = "master/customer_master/create";
$route['edit_customer_master/:any'] = "master/customer_master/edit_customer_master";
$route['update_customer_master/:any'] = "master/customer_master/edit_customer_master";
$route['view_customer_master/:any'] = "master/customer_master/view_customer_master";
$route['delete_customer_master/:any'] = "master/customer_master/soft_delete_customer_master";

// Company Master
$route['vw_company_master'] = "master/company_master";
$route['vw_company_master_all'] = "master/company_master/index_all";
$route['create_company_master'] = "master/company_master/create";
$route['edit_company_master/:any'] = "master/company_master/edit_company_master";
$route['view_company_master/:any'] = "master/company_master/edit_company_master";

// Batch Master
$route['vw_batch_master'] = "participants/batch_master";
$route['edit_batch_master/:any'] = "participants/batch_master/edit_batch_master";
$route['create_batch_master'] = "participants/batch_master/create";

// Coaching Program Master
$route['vw_coaching_program_master'] = "participants/coaching_program_master";
$route['edit_coaching_program_master/:any'] = "participants/coaching_program_master/edit_coaching_program_master";
$route['create_coaching_program_master'] = "participants/coaching_program_master/create";

// Coaching Program Type Master
$route['vw_coaching_program_type_master'] = "participants/coaching_program_type_master";
$route['edit_coaching_program_type_master/:any'] = "participants/coaching_program_type_master/edit_coaching_program_type_master";
$route['create_coaching_program_type_master'] = "participants/coaching_program_type_master/create";

//participant master
$route['vw_participant_master'] = "participants/participant_master";
$route['vw_participant_master_all'] = "participants/participant_master/index_all";
$route['create_participant_master/:any'] = "participants/participant_master/create_participant";
$route['edit_participant_master/:any'] = "participants/participant_master/edit_participant_master";

//Company prospect master
$route['vw_nca_reserviour_master'] = "company/reserviour/nca_reserviour";
$route['vw_nca_reserviour_master_all'] = "company/reserviour/nca_reserviour/index_all";
$route['create_nca_reserviour'] = "company/reserviour/nca_reserviour/create_nca_reserviour";
$route['edit_nca_reserviour/:any'] = "company/reserviour/nca_reserviour/edit_nca_reserviour";

//Company participant master
$route['vw_ecs_reservior_master'] = "company/reserviour/ecs_reservior";
$route['create_ecs_reservior'] = "company/reserviour/ecs_reservior/create_ecs_reservior";
$route['edit_ecs_reservior/:any'] ="company/reserviour/ecs_reservior/edit_ecs_reservior";

//Company Daily Diary Master
$route['vw_company_daily_diary_master'] = "company/worklog/daily_diary_master";
$route['edit_company_daily_diary_master/:any'] = "company/worklog/daily_diary_master/edit_daily_diary_master";
$route['create_company_daily_diary_master'] = "company/worklog/daily_diary_master/create";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
