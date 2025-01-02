<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_master extends CI_Controller {
        public function __construct() {
		    parent::__construct();
	        $this->load->helper('form');
		    $this->load->library('form_validation');
		    $this->load->library('session');
            $this->load->model('user_master_model');
            $this->load->model('profile_master_model');
            $this->load->library('upload');
        }

        public function index()
    	{
    		$roleID = $_SESSION['role_id'];
    		if(isset($roleID) && ($roleID == 1 || $roleID == 2))
        	{
		        $result['data']=$this->user_master_model->display_regestration_data_records();
		        $this->load->view('master/user_master/vw_regestration_index',$result);
		    }else{
		    	redirect(base_url().'sparrow_dashboard');
		    }
    	}

		public function vw_regestration_create()
		{
			$this->load->view('master/user_master/vw_regestration_create');
		}

		public function getUserData()
	    {
	        $roleId = $this->input->post('id',TRUE);
	        if($roleId == 2 || $roleId == 3 || $roleId == 4)
	        {
	        	$result = $this->user_master_model->getEmployeeList();
	        }elseif($roleId == 5 || $roleId == 6 || $roleId == 7 || $roleId == 8)
	        {
	        	$result = $this->user_master_model->getContactList();
	        }
	        
	        echo json_encode($result);
	    }

	    public function getUserUserID()
	    {
	        $userId = $this->input->post('id',TRUE);
	        $roleId = $this->input->post('roleId',TRUE);
	        if($roleId == 2 || $roleId == 3 || $roleId == 4)
	        {
	        	$result = $this->user_master_model->getEmployeeUserId($userId);
	        }elseif($roleId == 5 || $roleId == 6 || $roleId == 7)
	        {
	        	$result = $this->user_master_model->getContactUserId($userId);
	        }
	        
	        echo json_encode($result);
	    }


	    public function save_user()
	    {
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('username','Username','required');
	        $this->form_validation->set_rules('password','Password','required');
	      	
	        if($this->form_validation->run())
	        {
	            $username = $this->input->post('username');
	            $password = $this->input->post('password');
	            $roleId = $this->input->post('role_id');
	            $userId = $this->input->post('user_id');

	          $this->db->select('*');
		        $this->db->from('user_login');
		        $this->db->where('user_name', $username);
		        $userData = $this->db->get();
		        $userDataCount = $userData->num_rows();

	            if($userDataCount ==  0)
	            {
	            	if($roleId == 2 || $roleId == 3 || $roleId == 4)
	            	{
	            		$type = 2;
	            		$empId = $userId;
	            		$companyContactId = NULL;
	            	}elseif($roleId == 5 || $roleId == 6 || $roleId == 7){
	            		$type = 3;
	            		$empId = NULL;
	            		$companyContactId = $userId;
	            	}
	            	$shapassword = sha1($password);
		            $activation_status = 1;

		            $data = array('user_name ' => $username , 
									'simple_password' => $password, 
									'password' => $shapassword , 
									'type' => $type,
									'role_id' => $roleId , 
									'activation_status' => $activation_status,
									'company_contact_id' => $companyContactId,
									'emp_id' => $empId);

		            $this->user_master_model->save_info_model($data);
		            $this->session->set_flashdata('msg','<b>User Created Succesfully !!</b>');
		            redirect('vw_regestration_data');
	            }else{
		            $this->session->set_flashdata('msg','User Already Exist.');
		            redirect(base_url().'vw_regestration_create');
		        }     
	        }else{
	            $this->session->set_flashdata('msg','Enter Username And Password');
	            redirect(base_url().'vw_regestration_create');
	        }
	    }

			public function username_duplication_check()
			{
				$username = $this->input->post('username');
				
				$this->db->select('*');
				$this->db->from('user_login');
				$this->db->where('user_name', $username);
				$userData = $this->db->get();
				$userDataCount = $userData->num_rows();

				echo json_encode($userDataCount);
			}

	    public function edit_user_info()
	    {
	        $roleID = $_SESSION['role_id'];

    		if(isset($roleID) && ($roleID == 1 || $roleID == 2))
        	{
        		$userId = $this->uri->segment(2);

	        	$userProfileData = $this->profile_master_model->get_profile_details($userId);
	        	$userType = $userProfileData['Type'];
	        	$result['userProfileData'] = $userProfileData;
	        	$result['userId'] = $userId;
        		if($userType == 2)
        		{
        			$this->load->view('master/user_master/vw_regestration_emp_edit',$result);
        		}elseif($userType == 3){
        			$this->load->view('master/user_master/vw_regestration_company_edit',$result);
        		}	
		    }else{
		    	redirect(base_url().'sparrow_dashboard');
		    }
	    }

	    public function update_user()
	    {
	    	$userId = $this->input->post('user_id');
            $password = $this->input->post('password');
            $roleId = $this->input->post('role_id');
            $status = $this->input->post('status');
            $username = $this->input->post('username');

        	$shapassword = sha1($password);
            $activation_status = 1;

            $data = array(
							'simple_password' => $password, 
							'password' => $shapassword , 
							'role_id' => $roleId , 
							'user_name' => $username , 
							'activation_status' => $status);

	    	$where = '(entity_id ="'.$userId.'")';
	        $this->db->where($where);
	        $data = $this->db->update('user_login',$data);

	        $this->session->set_flashdata('msg','<b>Details Updated Succesfully !!</b>');

	        redirect('vw_regestration_data');   
	    }









	    

	    /*public function get_role_edit()
	    {
	        $hidden_role_id = $this->input->post('hidden_role_id',TRUE);
	        $data = $this->user_master_model->get_role_edit_model($hidden_role_id)->result();
	        echo json_encode($data);
	    }

	    public function get_company_edit()
	    {
	        $hidden_company_id = $this->input->post('hidden_company_id',TRUE);
	        $data = $this->user_master_model->get_company_edit_model($hidden_company_id)->result();
	        echo json_encode($data);
	    }

	    public function update_info()
	    {
	    			$entity_id = $this->input->post('entity_id');

	        	$username = $this->input->post('user_name');
            $password = $this->input->post('simple_password');
            $role_id = $this->input->post('role_id');
            $shapassword = sha1($password);
            $activation_status = $this->input->post('status');
            // $emp_id = $this->input->post('emp_id');

	        $data = array( 'user_name ' => $username , 'simple_password' => $password, 'password' => $shapassword , 'role_id' => $role_id , 'activation_status' => $activation_status);

	    		$where = '(entity_id ="'.$entity_id.'")';
	        $this->db->where($where);
	        $data = $this->db->update('user_login',$data);

	        redirect('vw_regestration_data');
	    }

	    public function vw_view_regestration()
	    {
	        $data['role'] = $this->user_master_model->get_role();
	        $data['company'] = $this->user_master_model->get_company();

	        $entity_id = $this->uri->segment(2);
	        $data['sata'] = $this->user_master_model->display_records_by_id($entity_id);
	        $this->load->view('master/user_master/vw_regestration_view',$data);
	    }

	    public function delete_user_info()
	    {
	        $entity_id = $this->uri->segment(2);
	        $data = $this->user_master_model->deleterecords($entity_id);
	        redirect('vw_regestration_data');
	    }

	    public function get_user_details_by_id()
			{
        $entity_id = $this->input->post('entity_id',TRUE);
        $data = $this->user_master_model->get_user_details_by_id_model($entity_id)->result();
        echo json_encode($data);
			}

			
			public function get_contact_person_list()
			{
					$customer_id = $this->input->post('id',TRUE);
					$data = $this->user_master_model->get_contact_person_list($customer_id);
					 echo json_encode($data);
			}*/
	}
?>
