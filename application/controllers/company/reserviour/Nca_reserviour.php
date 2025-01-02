<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nca_reserviour extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('nca_reserviour_master_model');
        $this->load->library('session');
    }

    public function index()
	{
       
        $data['nca_reserviour_list'] = $this->nca_reserviour_master_model->get_nca_reserviour_list();
        $this->load->view('company/nca_reservior/vw_nca_reservior_index',$data);
      
    }
    public function create_nca_reserviour()
    {
        $data['sparrow_employee_list'] = $this->nca_reserviour_master_model->get_sparrow_employee_list();
        $data['source_list'] = $this->nca_reserviour_master_model->get_source_list();
         $this->load->view('company/nca_reservior/vw_nca_reservior_create',$data);
    }
    public function save_nca_reserviour()
	{
        $session_data = $this->session->userdata();
		
        $company_id = $session_data['company_id'];
		$salutation = $this->input->post('salutation');
		$first_name = $this->input->post('first_name');
		$middle_name = $this->input->post('middle_name');
		$last_name = $this->input->post('last_name');
        $source_id = $this->input->post('source_id');
		$source_description = $this->input->post('source_description');
		$marital_status = $this->input->post('merital_status');
		$occupation = $this->input->post('occupation');
		$income_group = $this->input->post('income_group');
		$area = $this->input->post('area');
		$email_id = $this->input->post('email_id');
		$mobile1 = $this->input->post('mobile1');
		$assigned_to = $this->input->post('assigned_to');
        $gender = $this->input->post('gender');
        $dependants = $this->input->post('dependants');
	
		date_default_timezone_set('Asia/Kolkata');
		$created_date = date('Y-m-d');

		$nca_reserviour_insert_array = array(
            'company_id' => $company_id,
			'salutation' => $salutation,
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'last_name' => $last_name,
			'marital_status' => $marital_status,
			'occupation' => $occupation,
			'source_id' => $source_id,
			'source_description' => $source_description,
			'income_group' => $income_group,
			'gender' => $gender,
            'dependants' => $dependants,
			'area' => $area,
			'email_id' => $email_id,
			'contact_number' => $mobile1,
			'created_date' => $created_date,
			'assigned_to' => $assigned_to,
			'status' => 1
		);
	
			$nca_id = $this->nca_reserviour_master_model->save_nca_reserviour($nca_reserviour_insert_array);
	
		redirect('vw_nca_reserviour_master');
		
	}

    
	
	
	public function edit_nca_reserviour()
    {
        $nca_reserviour_id = $this->uri->segment(2);
        $data['nca_reserviour_id'] = $nca_reserviour_id;
        $data['sparrow_employee_list'] = $this->nca_reserviour_master_model->get_sparrow_employee_list();
        $data['source_list'] = $this->nca_reserviour_master_model->get_source_list();
        
        $this->load->view('company/nca_reservior/vw_nca_reservior_edit',$data);
    }

	
	public function update_nca_reserviour()
	{
        $nca_reserviour_id = $this->input->post('pop_up_nca_reserviour_id');
		$salutation = $this->input->post('pop_up_salutation');
		$first_name = $this->input->post('pop_up_first_name');
		$middle_name = $this->input->post('pop_up_middle_name');
		$last_name = $this->input->post('pop_up_last_name');
        $source_id = $this->input->post('pop_up_source_id');
		$source_description = $this->input->post('pop_up_source_description');
		$marital_status = $this->input->post('pop_up_merital_status');
		$occupation = $this->input->post('pop_up_occupation');
		$income_group = $this->input->post('pop_up_income_group');
		$area = $this->input->post('pop_up_area');
		$email_id = $this->input->post('pop_up_email_id');
		$mobile1 = $this->input->post('pop_up_mobile1');
		$assigned_to = $this->input->post('pop_up_assigned_to');
        $gender = $this->input->post('pop_up_gender');
        $dependants = $this->input->post('pop_up_dependants');
	
		date_default_timezone_set('Asia/Kolkata');
		$created_date = date('Y-m-d');

		$nca_reserviour_update_array = array(
			'salutation' => $salutation,
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'last_name' => $last_name,
			'marital_status' => $marital_status,
			'occupation' => $occupation,
			'source_id' => $source_id,
			'source_description' => $source_description,
			'income_group' => $income_group,
			'gender' => $gender,
            'dependants' => $dependants,
			'area' => $area,
			'email_id' => $email_id,
			'contact_number' => $mobile1,
			'assigned_to' => $assigned_to,
			
		);
			$nca_id = $this->nca_reserviour_master_model->update_nca_reserviour_master($nca_reserviour_id,$nca_reserviour_update_array);
	
		redirect('edit_nca_reserviour/'.$nca_reserviour_id);
		
	}

	public function get_nca_reserviour_details_by_id()
	{
		$nca_reserviour_id = $this->input->post('nca_reserviour_id');

		$Company_nca_reserviour_details = $this->nca_reserviour_master_model->get_nca_reserviour_details_by_id($nca_reserviour_id);
        //print_r($Company_nca_reserviour_details);
		echo json_encode($Company_nca_reserviour_details);
	}

	
}
?>
