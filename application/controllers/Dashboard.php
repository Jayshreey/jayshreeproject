<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('dashboard_model');
		$this->load->library('upload');
		$this->load->library('email');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('sparrow_login');
	}

	public function dashboard()
	{
		$month = $this->uri->segment(2);

		if(isset($_SESSION) && !empty($_SESSION)){
			if($_SESSION['role_id'] == 1 )
	        {
						$this->load->view('vw_sparrow_dashboard/'.$month);
			}elseif($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3){
				$this->sparrow_spoc_dashboard($month);
			}elseif($_SESSION['role_id'] == 4){
				$this->sparrow_facilitator_dashboard($month);
			}elseif($_SESSION['role_id'] == 5){
				$this->load->view('vw_sparrow_company_bh_dashboard');
			}elseif($_SESSION['role_id'] == 6 || $_SESSION['role_id'] == 7 ||  $_SESSION['role_id'] == 8){
				$this->load->view('vw_sparrow_company_dashboard');
			}
		} else {
			//$this->session->set_flashdata('error', 'Enter Username And Password');
			redirect(base_url() . 'welcome');
		}
	}

	public function process()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$user_name = $this->input->post('user_name');
			$password = $this->input->post('password');
			$encrypted_password = sha1($password);

			if ($this->welcome_model->validate($user_name, $encrypted_password)) {

				$this->db->select('user_login.*');
				$this->db->from('user_login');
				$where = '(user_name = "' . $user_name . '" AND password = "' . $encrypted_password . '" AND activation_status = "'.'1'.'")';
				$this->db->where($where);
				$user_master = $this->db->get();
				$row = $user_master->row();

				$session_data = array(
					'user_name' => $user_name,
					'userType' => $row->type,
					'user_id' => $row->entity_id,
					'role_id' => $row->role_id
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'sparrow_dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid Username And Password');
				redirect(base_url() . 'welcome');
			}
		} else {
			$this->session->set_flashdata('error', 'Enter Username And Password');
			redirect(base_url() . 'welcome');
		}
	}


	public function sparrow_dashboard()
	{
		
		$this->load->view('vw_sparrow_dashboard',$data);
		
	}
	public function sparrow_spoc_dashboard($month)
	{

		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');

		for ($i = 0; $i > -12; $i--) {
			$timestamp = strtotime($i . "month", strtotime($today_date));
			$nxt_month = date("M-Y", $timestamp);
			$row_month = date('Y-m-01', $timestamp);
			$month_array[$row_month]  = $nxt_month;
		}

		$data['month_array'] = $month_array;

		//get batch count

		$this->db->select('count(*) as count,batch_master.coaching_program_type_id,batch_master.mode');
		$this->db->from('batch_master');
		$this->db->join('coaching_program_type_master', 'coaching_program_type_master.entity_id = batch_master.coaching_program_type_id', 'inner');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$this->db->group_by(array('coaching_program_type_id', 'mode'));
		$batch_query = $this->db->get();
		$batch_list = $batch_query->result();

		$batch_summary = array();
		foreach ($batch_list as $key => $value) {
			$batch_summary[$value->coaching_program_type_id][$value->mode] = $value->count;
		}

		//get coaching_program count

		$coaching_program_list = $this->dashboard_model->get_coaching_program_list();

		//get coaching_program count

		$coaching_programwise_participant_list = $this->dashboard_model->get_coaching_programwise_participant_list();

		$coaching_programwise_approved_participant_list = $this->dashboard_model->get_coaching_programwise_approved_participant_list();

		//lists
		$coaching_program_wise_participant_list = $this->dashboard_model->get_coaching_program_wise_participant_list_till_month($month);
		$renewal_summary = $this->dashboard_model->get_spoc_wise_renewal_list();
		$spoc_workshop_participant_list = $this->dashboard_model->get_spoc_wise_workshop_participant_list($month);

		$employee_hours_list = $this->dashboard_model->get_employee_hours_list_for_month($month);
		$employee_group_session_list = $this->dashboard_model->get_employee_group_session_list_for_month($month);
		$employee_review_list = $this->dashboard_model->get_employee_review_list_for_month($month);
		$employee_nca_conversion_list = $this->dashboard_model->get_employee_nca_conversion_list_for_month($month);


		//Totals
		$total_participants = $this->dashboard_model->get_participants($month);
		$total_batches = $this->dashboard_model->get_batches($month);
		$total_renewals = $this->dashboard_model->get_renewals($month);
		       #nca related
		$total_workshop_prospects = $this->dashboard_model->get_workshop_prospects($month);


		$total_hours = $this->dashboard_model->get_monthly_hours($month);
		$total_group_sessions = $this->dashboard_model->get_monthly_group_sessions($month);
		$total_reviews = $this->dashboard_model->get_monthly_reviews($month);
		$total_conversions = $this->dashboard_model->get_monthly_nca_conversion($month);



		//Totals
		$data['total_participants'] = $total_participants;
		$data['total_batches'] = $total_batches;
		$data['total_renewals'] = $total_renewals;

		#nca related

		$data['total_workshop_prospects'] = $total_workshop_prospects;

		$data['total_conversions'] = $total_conversions;
		$data['total_reviews'] = $total_reviews;
		$data['total_group_sessions'] = $total_group_sessions;
		$data['total_hours'] = $total_hours;

		//Lists
		$data['coaching_program_wise_participant_list'] = $coaching_program_wise_participant_list;
		$data['renewal_summary'] = $renewal_summary;
		$data['spoc_workshop_participant_list'] = $spoc_workshop_participant_list;

		$data['employee_hours_list'] = $employee_hours_list;
		$data['employee_group_session_list'] = $employee_group_session_list;
		$data['employee_review_list'] = $employee_review_list;
		$data['employee_nca_conversion_list'] = $employee_nca_conversion_list;

		$data['batch_summary'] = $batch_summary;
		$data['coaching_program_list'] = $coaching_program_list;
		$data['coaching_programwise_participant_list'] = $coaching_programwise_participant_list;
		$data['coaching_programwise_approved_participant_list'] = $coaching_programwise_approved_participant_list;

		$data['month'] = $month;

		$this->load->view('vw_sparrow_spoc_dashboard', $data);
	}

	public function sparrow_facilitator_dashboard($month)
	{
	
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		
		for ($i=0; $i > -12; $i--) { 
			$timestamp = strtotime ($i. "month",strtotime ($today_date));
			$nxt_month = date("M-Y",$timestamp);
			$row_month = date('Y-m-01',$timestamp);
			$month_array[$row_month]  = $nxt_month;
		}

			$data['month_array'] = $month_array;
			//echo $total_participants = $this->dashboard_model->get_participants($month);die();
			$total_participants = $this->dashboard_model->get_participants($month);
			$coaching_program_wise_participant_list = $this->dashboard_model->get_coaching_program_wise_participant_list_till_month($month);
		     
			$data['total_participants'] = $total_participants;
			$data['coaching_program_wise_participant_list'] = $coaching_program_wise_participant_list;
			$this->load->view('vw_sparrow_facilitator_dashboard',$data);
		
	}

	// public function get_monthly_hours($month)
	// {
		
	// 	$hours = $this->dashboard_model->get_hours($month);
	
	// 	echo json_encode($hours);


	// }

	public function get_monthly_facilitations()
	{
		$month = $this->input->post('month');

		$facilitations = $this->dashboard_model->get_monthly_facilitations($month);

		echo json_encode($facilitations);


	}

	public function get_monthly_reviews()
	{
		$month = $this->input->post('month');

		$reviews = $this->dashboard_model->get_monthly_reviews($month);

		echo json_encode($reviews);


	}

	public function get_monthly_nca_conversion()
	{
		$month = $this->input->post('month');

		$nca_conversion = $this->dashboard_model->get_monthly_nca_conversion($month);

		echo json_encode($nca_conversion);


	}
}
