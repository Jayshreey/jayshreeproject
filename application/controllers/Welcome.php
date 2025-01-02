<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('welcome_model');
		$this->load->library('upload');
		$this->load->library('email');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('sparrow_login');
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

				$this->db->select('user_login.*,company_contact_master.company_id');
				$this->db->from('user_login');
				$this->db->join('company_contact_master','company_contact_master.entity_id = user_login.company_contact_id','left');
				$where = '(user_name = "' . $user_name . '" AND password = "' . $encrypted_password . '" AND activation_status = "'.'1'.'")';
				$this->db->where($where);
				$user_master = $this->db->get();
				$row = $user_master->row();

				$session_data = array(
					'user_name' => $user_name,
					'userType' => $row->type,
					'user_id' => $row->entity_id,
					'role_id' => $row->role_id,
					'company_id' => $row->company_id
				);
				$this->session->set_userdata($session_data);
				date_default_timezone_set('Asia/Kolkata');
				$month = date('Y-m-01');
				
				redirect(base_url() . 'dashboard/'.$month);
			} else {
				$this->session->set_flashdata('error', 'Invalid Username And Password');
				redirect(base_url() . 'welcome');
			}
		} else {
			$this->session->set_flashdata('error', 'Enter Username And Password');
			redirect(base_url() . 'welcome');
		}
	}

	

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
