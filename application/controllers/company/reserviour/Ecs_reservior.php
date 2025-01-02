<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecs_reservior extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ecs_reservior_master_model');
        $this->load->library('session');
    }

    public function index()
    {
       
         $data['ecs_reservior_list'] = $this->ecs_reservior_master_model->get_current_ecs_reservior_list();
         $data['sparrow_employee_list'] = $this->ecs_reservior_master_model->get_sparrow_employee_list();
         $this->load->view('company/ecs_reservior/vw_ecs_reservior_index',$data);
    }
   
    public function create_ecs_reservior()
    {
         $data['sparrow_employee_list'] = $this->ecs_reservior_master_model->get_sparrow_employee_list();
         $data['rm_list'] = $this->ecs_reservior_master_model->get_rm_list();
        // print_r($data['rm_list']);die();
        $this->load->view('company/ecs_reservior/vw_ecs_reservior_create',$data);
    }
    public function save_ecs_reservior_details()
	{

        $client_name        = $this->input->post('client_name');
        $rm_name            = $this->input->post('rm_name');
        $client_create_date = $this->input->post('client_create_date');
        $dob                = $this->input->post('dob');
        $gender             = $this->input->post('gender');
        $merital_status     = $this->input->post('merital_status');
        $occupation         = $this->input->post('occupation');
        $income_group       = $this->input->post('income_group');
		$session_data = $this->session->userdata();
		$company_id = $session_data['company_id'];
		
		//save company_participant
		$company_ecs_reservior_insert_array = array(
			'company_id'            => $company_id,
			'client_name'           => $client_name,
            'rm_id'               => $rm_name,
			'client_create_date'    => $client_create_date,
			'dob'                   => $dob,
			'gender'                => $gender,
			'merital_status'        => $merital_status,
			'occupation'            => $occupation,
			'income_group'          => $income_group,
            'created_date'          => date('Y-m-d'),
            'last_connected_datetime'=>date('Y-m-d H:i:s')
		);

		$company_ecs_reservior_id = $this->ecs_reservior_master_model->save_ecs_reservior_details($company_ecs_reservior_insert_array);
		
		redirect('vw_ecs_reservior_master');
		
	}
    public function edit_ecs_reservior()
    {
        $data['ecs_reservior_id'] = $this->uri->segment(2);
        $data['rm_list'] = $this->ecs_reservior_master_model->get_rm_list();
        $this->load->view('company/ecs_reservior/vw_ecs_reservior_edit',$data);
    }
    public function get_ecs_reservior_details_by_id()
	{
		$ecs_reserviour_id = $this->input->post('ecs_reserviour_id');

		$ecs_reserviour_details = $this->ecs_reservior_master_model->get_ecs_reserviour_details_by_id($ecs_reserviour_id);
        //print_r($Company_nca_reserviour_details);
		echo json_encode($ecs_reserviour_details);
	}
    public function update_ecs_reserviour()
    {
        $ecs_reservior_id      = $this->input->post('pop_up_ecs_reservior_id');
        $client_name        = $this->input->post('pop_up_client_name');
        $rm_name            = $this->input->post('pop_up_rm_name');
        $dob                = $this->input->post('pop_up_dob');
        $gender             = $this->input->post('pop_up_gender');
        $merital_status     = $this->input->post('pop_up_merital_status');
        $occupation         = $this->input->post('pop_up_occupation');
        $income_group       = $this->input->post('pop_up_income_group');
		//update company_participant
		$ecs_reservior_update_array = array(
			
			'client_name'           => $client_name,
            'rm_id'                 => $rm_name,
			'dob'                   => $dob,
			'gender'                => $gender,
			'merital_status'        => $merital_status,
			'occupation'            => $occupation,
			'income_group'          => $income_group
		);

		$ecs_reservior_id = $this->ecs_reservior_master_model->update_ecs_reservior_details($ecs_reservior_id,$ecs_reservior_update_array);
		
		redirect('edit_ecs_reservior/'.$ecs_reservior_id);
		
    }	

}
?>
