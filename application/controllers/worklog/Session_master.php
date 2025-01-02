<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Session_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('session_master_model');
        $this->load->library('session');
    }

    public function index()
	{
		
        $data['session_list'] = $this->session_master_model->get_session_list();
      
        $this->load->view('worklog/session_master/vw_session_master_index',$data);
    }

    public function create_session()
    {
        $data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
        $data['session_template_list'] = $this->session_master_model->get_session_template_list();
        $data['batch_list'] = $this->session_master_model->get_batch_list();
        $data['process_list'] = $this->session_master_model->get_process_list();
        $data['bh_list'] = $this->session_master_model->get_bh_list();
        $data['session_for_list'] = $this->session_master_model->get_session_for_list();

       
        $this->load->view('worklog/session_master/vw_session_master_create',$data);
    }

	
	public function save_session()
	{
		$session_insert_array = $this->input->post();
		$batch_id = $this->input->post('batch_id');

		$session_id = $this->session_master_model->save_session($session_insert_array);

		//save session participants from batch
		$batch_participant_list = $this->session_master_model->get_batch_participant_list_by_batch_id($batch_id);
		foreach ($batch_participant_list as $key => $value) {
			$company_contact_id = $value->company_contact_id;

			$session_participant_insert_array = array(
				'session_id' => $session_id,
				'company_contact_id' => $company_contact_id
			);

			$this->session_master_model->save_session_participants($session_participant_insert_array);

		}

		//save session Sparrow Employee from batch
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$sparrow_employe_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($sparrow_employe_id){
			$session_sparrow_employee_insert_array = array(
				'session_id' => $session_id,
				'sparrow_employee_id' => $sparrow_employe_id
			);

			$this->session_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
		}


	
		redirect('edit_session_master/'.$session_id);
		
	}
        
    public function update_session_batch()
    {
        $session_id = $this->input->post('pop_up_session_id');
        $batch_id = $this->input->post('pop_up_session_batch_id');
        $previous_batch_id = $this->input->post('current_session_batch_id');

         //Delete session participants from Previous batch
		$batch_participant_list = $this->session_master_model->get_batch_participant_list_by_batch_id($previous_batch_id);
		foreach ($batch_participant_list as $key => $value) {
			$company_contact_id = $value->company_contact_id;
			$this->session_master_model->delete_session_participants($session_id,$company_contact_id);

		}

        $session_template_id=$this->input->post('batch_session_template_id');
        $session_update_array=array('batch_id'=>$batch_id);
        //update batchId in session
        $this->session_master_model->update_session_master($session_id,$session_update_array);
        
        //save session participants from batch
		$batch_participant_list = $this->session_master_model->get_batch_participant_list_by_batch_id($batch_id);
		foreach ($batch_participant_list as $key => $value) {
			$company_contact_id = $value->company_contact_id;

			$session_participant_insert_array = array(
				'session_id' => $session_id,
				'company_contact_id' => $company_contact_id
			);

			$this->session_master_model->save_session_participants($session_participant_insert_array);

		}

		//save session Sparrow Employee from batch
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$sparrow_employe_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($sparrow_employe_id){
			$session_sparrow_employee_insert_array = array(
				'session_id' => $session_id,
				'sparrow_employee_id' => $sparrow_employe_id
			);

			$this->session_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
		}
        redirect('edit_session_template_master/'.$session_template_id);

    }
	public function edit_session_master()
    {
        $session_id = $this->uri->segment(2);

		$data['session_id'] = $session_id;
	    $data['process_list'] = $this->session_master_model->get_process_list();
        $data['batch_list'] = $this->session_master_model->get_batch_list();
		$data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
	
		$data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
		$data['session_sparrow_employee_list'] = $this->session_master_model->get_session_sparrow_employee_list_by_id($session_id);
		$data['session_participant_list'] = $this->session_master_model->get_session_participant_list_by_id($session_id);
        
		$data['company_contact_list'] = $this->session_master_model->get_company_contact_list();
      
        $this->load->view('worklog/session_master/vw_session_master_edit',$data);
    }

	
	public function add_sparrow_employee_in_session()
	{
		
		$session_id = $this->input->post('session_id');
		$sparrow_employee_checkbox = $this->input->post('sparrow_employee_checkbox');
		 
		//save session sparrow employee relation

		foreach($sparrow_employee_checkbox as $sparrow_employee){
		   $sparrow_employee_id = $sparrow_employee;

		   //check if sparrow employee already exist in session

		   $this->db->select('*');
		   $this->db->from('session_sparrow_employee_relation');
		   $where = '(sparrow_employee_id = "'.$sparrow_employee_id.'" and session_id = "'.$session_id.'" )';
		   $this->db->where($where);
		   $session_query = $this->db->get();
		   $session_num_rows = $session_query->num_rows();

		   if($session_num_rows == 0){
		   
		   $session_sparrow_employee_insert_array = array(
			   'session_id' => $session_id,
			   'sparrow_employee_id' => $sparrow_employee_id
		   ) ;
		   $this->session_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
		   }
		}

		return true;
	}
	
	public function add_participant_in_session()
	{
		
		$session_id = $this->input->post('session_id');
		$company_contact_checkbox = $this->input->post('company_contact_checkbox');
		
		//save session sparrow employee relation

		foreach($company_contact_checkbox as $company_contact){
		   $company_contact_id = $company_contact;

		   //check if sparrow employee already exist in session

		   $this->db->select('*');
		   $this->db->from('session_participant_relation');
		   $where = '(company_contact_id = "'.$company_contact_id.'" and session_id = "'.$session_id.'" )';
		   $this->db->where($where);
		   $session_query = $this->db->get();
		   $session_num_rows = $session_query->num_rows();

		   if($session_num_rows == 0){
		   
		   $session_participant_insert_array = array(
			   'session_id' => $session_id,
			   'company_contact_id' => $company_contact_id
		   ) ;
		   $this->session_master_model->save_session_participants($session_participant_insert_array);
		   }
		}

		return true;
	}


	public function fetch_batch_participants_in_session()
    {
		$session_id = $this->uri->segment(2);
		$session_details = $this->session_master_model->get_session_details_by_id($session_id);

		$batch_id = $session_details->batch_id;
		
		$batch_participant_list = $this->session_master_model->get_batch_participant_list_by_batch_id($batch_id);

		// Add batch participants in session

		foreach($batch_participant_list as $participant){
			$participant_id = $participant->company_contact_id;

			// check if participant already exist
			$this->db->select('*');
			$this->db->from('session_participant_relation');
			$where = '(session_id = "'.$session_id.'" and company_contact_id = "'.$participant_id.'" )';
			$this->db->where($where);
			$session_participant_query = $this->db->get();
			$session_participant_num_rows = $session_participant_query->num_rows();

			if($session_participant_num_rows == 0){
				$session_participant_insert_array = array(
					'session_id' => $session_id,
					'company_contact_id' => $participant_id
				);

				$this->session_master_model->save_session_participants($session_participant_insert_array);
			}
		}

		redirect('edit_session_master/'.$session_id);
    }

	
    public function template_index()
	{
		
        $data['session_template_list'] = $this->session_master_model->get_session_template_list();
      
        $this->load->view('worklog/session_master/vw_session_template_master_index',$data);
    }
	
	public function create_session_template()
    {
       
        $data['coaching_program_type_list'] = $this->session_master_model->get_coaching_program_type_list();
        $data['process_list'] = $this->session_master_model->get_process_list();
        $data['session_for_list'] = $this->session_master_model->get_session_for_list();
      
       
        $this->load->view('worklog/session_master/vw_session_template_master_create',$data);
    }

	public function save_session_template()
	{
		$session_insert_array = $this->input->post();
		$session_insert_array['actionable_id'] = 3;
		$session_insert_array['session_type_id'] = 1;

		$session_template_id = $this->session_master_model->save_session_template($session_insert_array);

		$template_code = "ST-".str_pad($session_template_id,4,"0",STR_PAD_LEFT);

		//update session template code
		$session_template_update_array = array(
			'session_template_code' => $template_code);

		$this->session_master_model->update_session_template($session_template_id,$session_template_update_array);
		
		redirect('edit_session_template_master/'.$session_template_id);
		
	}

	public function edit_session_template_master()
	{
        $session_template_id = $this->uri->segment(2);
		$data['session_template_id'] = $session_template_id;
	    $data['process_list'] = $this->session_master_model->get_process_list();
        $data['batch_list'] = $this->session_master_model->get_batch_list();
		$data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
		$data['session_list'] = $this->session_master_model->get_session_list_by_session_template_id($session_template_id);
        $data['coaching_program_type_list'] = $this->session_master_model->get_coaching_program_type_list();
        $data['process_list'] = $this->session_master_model->get_process_list();
        $data['session_for_list'] = $this->session_master_model->get_session_for_list();
        
		// $data['session_sparrow_employee_list'] = $this->session_master_model->get_session_sparrow_employee_list_by_id($session_id);
		// $data['session_participant_list'] = $this->session_master_model->get_session_participant_list_by_id($session_id);

		$data['company_contact_list'] = $this->session_master_model->get_company_contact_list();
      
        $this->load->view('worklog/session_master/vw_session_template_master_edit',$data);

		
	}
    
	public function edit_session_template_master_pg2()
	{
        $session_id = $this->uri->segment(2);

		$session_template_id = $this->db->get_where('session_master', ['entity_id' => $session_id])->row()->session_template_id;


		$data['session_template_id'] = $session_template_id;
		$data['session_id'] = $session_id;
	    $data['process_list'] = $this->session_master_model->get_process_list();
        $data['batch_list'] = $this->session_master_model->get_batch_list();
		$data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
		$data['session_list'] = $this->session_master_model->get_session_list_by_session_template_id($session_template_id);
		$data['sparrow_employee_list'] = $this->session_master_model->get_sparrow_employee_list();
		$data['session_sparrow_employee_list'] = $this->session_master_model->get_session_sparrow_employee_list_by_id($session_id);
		$data['session_participant_list'] = $this->session_master_model->get_session_participant_list_by_id($session_id);
  
		$data['company_contact_list'] = $this->session_master_model->get_company_contact_list();
        $data['coaching_program_type_list'] = $this->session_master_model->get_coaching_program_type_list();
        $data['process_list'] = $this->session_master_model->get_process_list();
        $data['session_for_list'] = $this->session_master_model->get_session_for_list();
        $this->load->view('worklog/session_master/vw_session_template_master_edit_pg2',$data);

		
	}

	
	public function add_session_from_template()
	{
		$session_template_id = $this->input->post('pop_up_session_template_id');
		$session_date = $this->input->post('pop_up_session_date');
		$batch_id = $this->input->post('pop_up_batch_id');
		// $session_name = $this->input->post('pop_up_session_name');
		// $actionable_id = $this->input->post('pop_up_actionable_id');
		// $medium = $this->input->post('pop_up_medium');
		// $remark = $this->input->post('pop_up_remark');
		$responsibility_type = "Facilitation Assistance";
		
		$session_template_details = $this->session_master_model->get_session_template_details_by_id($session_template_id);

		$session_insert_array = array(
            'session_template_id' => $session_template_id , 
            'session_for' => $session_template_details->session_for, 
            'actionable_id' => $session_template_details->actionable_id, 
            'process_id' =>  $session_template_details->process_id,
            'topic' =>  $session_template_details->topic,
            'session_date' =>  $session_date,
            'session_type_id' =>  $session_template_details->session_type_id,
            'batch_id' =>  $batch_id,
            'session_objective' => $session_template_details->session_objective,
            'status' => 1
        );

		$session_id = $this->session_master_model->save_session($session_insert_array);

		//save session participants from batch
		$batch_participant_list = $this->session_master_model->get_batch_participant_list_by_batch_id($batch_id);
		foreach ($batch_participant_list as $key => $value) {
			$company_contact_id = $value->company_contact_id;

			$session_participant_insert_array = array(
				'session_id' => $session_id,
				'company_contact_id' => $company_contact_id,
				'attendance' => 1
			);

			$this->session_master_model->save_session_participants($session_participant_insert_array);

		}
	
		redirect('edit_session_template_master/'.$session_template_id);
		
	}
    public function update_session_template_master()
    {
        $session_template_id = $this->input->post('pop_up_session_temp_id');
    
        $session_update_array = array(
            'coaching_program_type_id' =>  $this->input->post('coaching_program_type_id'),
            'session_for' =>$this->input->post('session_for'),
            'process_id' => $this->input->post('process_id'),
            'topic' =>  $this->input->post('topic'),
            'session_template_name' => $this->input->post('session_template_name'),
            'session_objective' =>$this->input->post('session_objective')
        );
    
         $result = $this->session_master_model->update_session_template($session_template_id,$session_update_array);
        redirect('edit_session_template_master/'.$session_template_id);
    }
	public function update_participant_attendance()
	{
        $session_participant_id = $this->input->post('session_participant_id');
        $attendance = $this->input->post('attendance');

		$session_participant_update_array = array(
			'attendance' => $attendance
		);

		$result = $this->session_master_model->update_session_participant($session_participant_id,$session_participant_update_array);
		

		return $result;

	}

	public function update_sparrow_employee_responsibility_type()
	{
        $session_sparrow_employee_id = $this->input->post('session_sparrow_employee_id');
        $responsibility_type = $this->input->post('responsibility_type');

		$session_sparrow_employee_update_array = array(
			'responsibility_type' => $responsibility_type
		);

		$result = $this->session_master_model->update_session_sparrow_employee($session_sparrow_employee_id,$session_sparrow_employee_update_array);
		
		return $result;

	}


	public function get_session_details_by_id()
	{
        $session_id = $this->input->post('session_id');

		$session_details = $this->session_master_model->get_session_details_by_id_for_batch($session_id);

		echo json_encode($session_details);
		
	}

	public function get_session_details_by_id3()
	{
        $session_id = $this->input->post('session_id');

		$session_details = $this->session_master_model->get_session_details_by_id3($session_id);

		echo json_encode($session_details);
		
	}

	public function get_session_template_details_by_id()
	{
        $session_template_id = $this->input->post('session_template_id');

		$session_template_details = $this->session_master_model->get_session_template_details_by_id($session_template_id);

		echo json_encode($session_template_details);
		
	}

    public function get_session_details_by_id2()
    {
        $session_id = $this->input->post('session_id');

        $session_details = $this->session_master_model->get_session_details_by_id2($session_id)->result();

        echo json_encode($session_details);
        
    }

    public function create_participant()
    {
        $data['state_list'] = $this->session_master_model->get_state_list();
        $data['company_list'] = $this->session_master_model->get_company_list();
        $data['spoc_list'] = $this->session_master_model->get_spoc_list();
        $data['source_list'] = $this->session_master_model->get_source_list();
        $this->load->view('reservoir/prospect_master/vw_participant_master_create',$data);
    }

    public function get_city_name()
    {
        $state_id = $this->input->post('id',TRUE);
        $data = $this->session_master_model->get_city_model_data($state_id)->result();
         echo json_encode($data);
    }

    public function get_batch_details()
    {
        $batch_id = $this->input->post('batch_id');

		$batch_details = $this->session_master_model->get_batch_details_by_id($batch_id);
		$coaching_program_type_id = $batch_details->coaching_program_type_id;

        $process_list = $this->session_master_model->get_process_list_for_coaching_program_type($coaching_program_type_id);

		$data['process_list'] = $process_list;
		$data['batch_details'] = $batch_details;

         echo json_encode($data);
    }

    public function get_process_list_by_coaching_program_type()
    {
        $coaching_program_type_id = $this->input->post('coaching_program_type_id');

        $process_list = $this->session_master_model->get_process_list_for_coaching_program_type($coaching_program_type_id);


         echo json_encode($process_list);
    }

    public function check_customer_name()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $customer_name = $this->input->post('id');
            $data = $this->session_master_model->check_customer_name_model($customer_name);
            if($data == 'true')
            {
                print_r($data);

                die();
            }
        }
    }


    public function save_company_details()
    {
        $company_name = $this->input->post('company_name');
        $nca_ecs = $this->input->post('nca_ecs');
        $address = $this->input->post('address');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $pincode = $this->input->post('pincode');
        $locality = $this->input->post('locality');
        $source_id = $this->input->post('source_id');
       

        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d');
        
        $customer_array = array(
            'company_name' => $company_name , 
            'nca_ecs' => $nca_ecs, 
            'address' => $address,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'locality' => $locality,
            'pincode' => $pincode,
            'created_date' => $created_date,
            'source_id' =>$source_id,
            'status' => 1
        );

		$customer_id = $this->session_master_model->save_company($customer_array);

		redirect('edit_company_master/'.$customer_id);

    }

    public function update_customer_contact_details()
    {
        $entity_id = $this->input->post('entity_id');
        $customer_name = $this->input->post('customer_name');
        $customer_short_name = $this->input->post('customer_short_name');
        $customer_type = $this->input->post('customer_type');
        $address = $this->input->post('address');
        $customer_email = $this->input->post('customer_email');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $customer_pin_code = $this->input->post('customer_pin_code');
        $foundation_date = $this->input->post('foundation_date');
        $customer_gst_number = $this->input->post('customer_gst_number');
        $contact_person = $this->input->post('contact_person');
        $contact_person_email_id = $this->input->post('contact_person_email_id');
        $first_contact_no = $this->input->post('first_contact_no');
        $second_contact_no = $this->input->post('second_contact_no');
        $salutation = $this->input->post('salutation');
        $whatsup_no = $this->input->post('whatsup_no');
        $source = $this->input->post('source');
        $customer_status = 1;

        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d');
        
        $update_customer_master_array = array(
            'customer_name' => $customer_name , 
            'customer_short_name' => $customer_short_name , 
            'customer_type_id' => $customer_type, 
            'address' => $address,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'email' => $customer_email,
            'pin_code' => $customer_pin_code,
            'foundation_date' => $foundation_date,
            'gst_no' => $customer_gst_number,
            'foundation_date' => $foundation_date,
            'created_date' => $created_date,
            'source' =>$source,
            'status' => $customer_status
        );
                
        $this->db->where('entity_id',$entity_id);
                $this->db->update('customer_master', $update_customer_master_array);

        $customer_contact_details_array = array(
            'customer_id' => $entity_id,
            'contact_person' => $contact_person,
            'salutation' => $salutation,
            'email_id' => $contact_person_email_id,
            'first_contact_no' => $first_contact_no,
            'second_contact_no' => $second_contact_no,
            'whatsup_no' => $whatsup_no
        );

        $data = $this->db->insert('customer_contact_master', $customer_contact_details_array);
        echo $data;
    }

    public function add_participant()
    {
        $customer_id = $this->input->post('customer_id');

        redirect('edit_customer_master/'.$customer_id);

    
    }

    public function edit_company_master()
    {
        $company_id = $this->uri->segment(2);
        $data['company_id'] = $company_id;
        $data['company_details'] = $this->session_master_model->get_company_details($company_id);
        $data['participant_list'] = $this->session_master_model->get_participant_list_by_company_id($company_id);

        
          
        $data['spoc_list'] = $this->session_master_model->get_spoc_list();
        $data['source_list'] = $this->session_master_model->get_source_list();
        $data['state_list'] = $this->session_master_model->get_state_list();
        $data['city_list'] = $this->session_master_model->get_city_list();
        $this->load->view('reservoir/prospect_master/vw_company_master_edit',$data);
    }

    public function get_company_details_by_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $company_id = $this->input->post('company_id');
            $data = $this->session_master_model->get_company_details_by_id($company_id);
            echo json_encode($data);
        }
    }

	public function get_session_for_slug()
	{
		$data = $this->input->post();
        if(!empty($data))
        {
            $session_for = $this->input->post('session_for');
           
			$session_for_slug = $this->db->get_where('status_master_relation', ['entity_id' => $session_for])->row()->slug;

			
            echo json_encode($session_for_slug);
        }
	}

	public function get_process_slug()
	{
		$data = $this->input->post();
        if(!empty($data))
        {
            $process_id = $this->input->post('process_id');
           
			$process_slug = $this->db->get_where('process_master', ['entity_id' => $process_id])->row()->slug;

			
            echo json_encode($process_slug);
        }
	}
  

	public function add_new_participant()
	{
        $pop_up_company_id = $this->input->post('pop_up_company_id');
        $pop_up_salutation = $this->input->post('pop_up_salutation');
        $pop_up_first_name = $this->input->post('pop_up_first_name');
        $pop_up_last_name = $this->input->post('pop_up_last_name');
        $pop_up_gender = $this->input->post('pop_up_gender');
        $pop_up_designation = $this->input->post('pop_up_designation');
        $pop_up_email_id = $this->input->post('pop_up_email_id');
        $pop_up_mobile1 = $this->input->post('pop_up_mobile1');
        $pop_up_spoc_id = $this->input->post('pop_up_spoc_id');
        $pop_up_joining_date = $this->input->post('pop_up_joining_date');
        $pop_up_remark = $this->input->post('pop_up_remark');
       
		$participant_insert_array = array(
			'company_id' => $pop_up_company_id,
			'salutation' => $pop_up_salutation,
			'first_name' => $pop_up_first_name,
			'last_name' => $pop_up_last_name,
			'gender' => $pop_up_gender,
			'designation' => $pop_up_designation,
			'email_id' => $pop_up_email_id,
			'mobile1' => $pop_up_mobile1,
			'joining_date' => $pop_up_joining_date,
			'spoc_id' => $pop_up_spoc_id,
			'remark' => $pop_up_remark
		);


		$participant_id = $this->session_master_model->save_participant($participant_insert_array);

		
		redirect('edit_company_master/'.$pop_up_company_id);
		
	}

    public function participant_perfomance_monitoring()
    {
        
    }

    public function update_state()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $state_id = $this->input->post('state_id');

        $update_array = array('entity_id' => $entity_id,'state_id' => $state_id);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_city()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $city_id = $this->input->post('city_id');

        $update_array = array('entity_id' => $entity_id,'city_id' => $city_id);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_address()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $address = $this->input->post('address');

        $update_array = array('entity_id' => $entity_id,'address' => $address);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_pincode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $pin_code = $this->input->post('pin_code');

        $update_array = array('entity_id' => $entity_id,'pin_code' => $pin_code);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_statecode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $state_code = $this->input->post('state_code');

        $update_array = array('entity_id' => $entity_id,'state_code' => $state_code);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_gstnumber()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $gst_no = $this->input->post('gst_no');

        $update_array = array('entity_id' => $entity_id,'gst_no' => $gst_no);
        $data = $this->session_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

   
    public function update_contactperson()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_person = $this->input->post('contact_person');

        $update_array = array('entity_id' => $entity_id,'contact_person' => $contact_person);
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }
   
    public function update_spoc_id()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $spoc_id = $this->input->post('spoc_id');

        $update_array = array(
            'entity_id' => $entity_id,
            'spoc_id' => $spoc_id
        );
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_emailid()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $email_id = $this->input->post('email_id');

        $update_array = array('entity_id' => $entity_id,'email_id' => $email_id);
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_contactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_no = $this->input->post('contact_no');

        $update_array = array('entity_id' => $entity_id,'first_contact_no' => $contact_no);
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_alternatecontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $alternate_contact_no = $this->input->post('alternate_contact_no');

        $update_array = array('entity_id' => $entity_id,'second_contact_no' => $alternate_contact_no);
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_whatsupcontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $whatsup_contact_no = $this->input->post('whatsup_contact_no');

        $update_array = array('entity_id' => $entity_id,'whatsup_no' => $whatsup_contact_no);
        $data = $this->session_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function edit_customer_master_data()
    {
        $entity_id = $this->input->post('entity_id');
        $customer_name = $this->input->post('customer_name');
        $customer_short_name = $this->input->post('customer_short_name');
        $customer_type = $this->input->post('customer_type');
        $foundation_date = $this->input->post('foundation_date');
        $source = $this->input->post('source');
        $customer_status = $this->input->post('customer_status');
        $address = $this->input->post('address');
        $state_id =  $this->input->post('state_id');
        $city_id =  $this->input->post('city_id');
        $pin_code =  $this->input->post('customer_pin_code');
        $gst_no =  $this->input->post('customer_gst_number');
        $email =  $this->input->post('email');
        $seo_project_status =  $this->input->post('seo_project_status');



        $update_array = array(
            'customer_name' => $customer_name,
            'customer_short_name' => $customer_short_name,
            'address' => $address,
            'foundation_date' => $foundation_date,
            'customer_type_id' => $customer_type,
            'source' => $source,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'pin_code' => $pin_code,
            'gst_no' => $gst_no,
            'email' => $email,
            'seo_project' => $seo_project_status,
            'status' => $customer_status
        );
        // $data = $this->session_master_model->update_customer_master($update_array);

        $this->db->where('entity_id', $entity_id);
        $this->db->update('customer_master', $update_array);

        redirect('vw_customer_master');
    }

    public function update_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_contact_details'] = $this->session_master_model->get_customer_only_contact_details($entity_id);
        $data['state_list'] = $this->session_master_model->get_state_list();
        $data['city_list'] = $this->session_master_model->get_city_list();

        $this->load->view('reservoir/prospect_master/vw_customer_master_update',$data);
    }

    public function view_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_details'] = $this->session_master_model->get_customer_address_details($entity_id);

                $this->db->select('*');
                $this->db->from('customer_contact_master');
                //$this->db->join('','','');
                // $where = '(customer_id = "'.$entity_id);
                $this->db->where('customer_id',$entity_id);
                $this->db->limit(1);
                $address_query = $this->db->get();
                //$query_num_rows = $query->num_rows();
                $address_details = $address_query->row();
        
        $data['source_list'] = $this->session_master_model->get_source_list();
        $data['address_details'] = $address_details;
        $data['customer_type_list'] = $this->session_master_model->get_customer_types();
        $data['state_list'] = $this->session_master_model->get_state_list();
        $data['city_list'] = $this->session_master_model->get_city_list();
        $data['spoc_list'] = $this->session_master_model->get_spoc_list();
        $this->load->view('reservoir/prospect_master/vw_customer_master_view',$data);
    }

    /*public function delete_product_category()
    {
        $entity_id = $this->uri->segment(2);
        $data = $this->product_category_master_model->delete_product_category($entity_id);
        redirect('product_category');
    }*/

    // public function save_address_contact_details()
    // {
    //     $entity_id = $this->input->post('entity_id');
    //     $customer_name = $this->input->post('customer_name');
    //     // $customer_type = $this->input->post('customer_type');
    //     $address = $this->input->post('address');
    //     $state_id = $this->input->post('state_id');
    //     $city_id = $this->input->post('city_id');
    //     $customer_pin_code = $this->input->post('customer_pin_code');
    //     $customer_state_code = $this->input->post('customer_state_code');
    //     $customer_gst_number = $this->input->post('customer_gst_number');
    //     $customer_pan_number = $this->input->post('customer_pan_number');
    //     $address_type = $this->input->post('address_type');
    //     $contact_person = $this->input->post('contact_person');
    //     $contact_person_email_id = $this->input->post('contact_person_email_id');
    //     $first_contact_no = $this->input->post('first_contact_no');
    //     $second_contact_no = $this->input->post('second_contact_no');
    //     $whatsup_no = $this->input->post('whatsup_no');

    //     $this->db->select('*');
    //     $this->db->from('customer_address_master');
    //     $where = '(customer_address_master.customer_id = "'.$entity_id.'" And customer_address_master.address_type = "'.$address_type.'")';
    //     $this->db->where($where);
    //     $query = $this->db->get();
    //     $query_result = $query->row();

    //     $customer_address_id = $query_result->entity_id;

    //     $customer_address_details_array = array('customer_id' => $entity_id , 'party_name' => $contact_person , 'address_type' => $address_type , 'address' => $first_contact_no , 'state_id' => $state_id , 'city_id' => $city_id, 'pin_code' => $customer_pin_code, 'state_code' => $customer_state_code, 'gst_no' => $customer_gst_number, 'pan_no' => $customer_pan_number);

    //     $this->db->insert('customer_address_master', $customer_address_details_array);
    //     $customer_address_lastid = $this->db->insert_id();




    //     $customer_contact_details_array = array('customer_id' => $entity_id , 'customer_address_id' => $customer_address_id , 'contact_person' => $contact_person , 'email_id' => $contact_person_email_id , 'first_contact_no' => $first_contact_no , 'second_contact_no' => $second_contact_no , 'whatsup_no' => $whatsup_no);

    //     $this->db->insert('customer_contact_master', $customer_contact_details_array);
    //     $customer_contact_lastid = $this->db->insert_id();

    //     echo $customer_contact_lastid;
    // }

    public function get_state_code()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $state_id = $this->input->post('id');
            $data = $this->session_master_model->get_state_code_by_state_id($state_id);
            echo json_encode([$data]);
        }
    }

    // public function save_address_at_edit_page()
    // {
    //     $entity_id = $this->input->post('entity_id');
    //     $customer_address_id = $this->input->post('customer_address_id');
    //     $party_name = $this->input->post('party_name');
    //     // $address_type = $this->input->post('address_type');
    //     $address = $this->input->post('address');
    //     $state_id = $this->input->post('state_id');
    //     $city_id = $this->input->post('city_id');
    //     $customer_pin_code = $this->input->post('customer_pin_code');
    //     $customer_state_code = $this->input->post('customer_state_code');
    //     $customer_gst_number = $this->input->post('customer_gst_number');
    //     $customer_pan_number = $this->input->post('customer_pan_number');
    //     $contact_person = $this->input->post('contact_person');
    //     $contact_person_email_id = $this->input->post('contact_person_email_id');
    //     $first_contact_no = $this->input->post('first_contact_no');
    //     $second_contact_no = $this->input->post('second_contact_no');
    //     $whatsup_no = $this->input->post('whatsup_no');
        
       
    //         $customer_address_details_array = array(
    //                      'customer_id' => $entity_id , 
    //                      'party_name' => $party_name , 
    //                      'address_type' => 1,
    //                      'address' => $address , 
    //                      'state_id' => $state_id , 
    //                      'city_id' => $city_id , 
    //                      'pin_code' => $customer_pin_code , 
    //                      'state_code' => $customer_state_code , 
    //                      'gst_no' => $customer_gst_number , 
    //                      'pan_no' => $customer_pan_number);

    //         $this->db->insert('customer_address_master', $customer_address_details_array);
    //         $customer_address_lastid = $this->db->insert_id();

    //         $customer_contact_details_array = array(
    //                      'customer_id' => $entity_id , 
    //                      'customer_address_id' => $customer_address_lastid , 
    //                      'contact_person' => $contact_person , 
    //                      'email_id' => $contact_person_email_id , 
    //                      'first_contact_no' => $first_contact_no , 
    //                      'second_contact_no' => $second_contact_no , 
    //                      'whatsup_no' => $whatsup_no);

    //         $this->db->insert('customer_contact_master', $customer_contact_details_array);
    //         $customer_contact_lastid = $this->db->insert_id();
        
    // }

    public function get_state_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $entity_id = $this->input->post('id');
            $data = $this->session_master_model->get_state_id_data($entity_id)->result();
            echo json_encode($data);
        }
    }

    public function soft_delete_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data = $this->session_master_model->soft_delete_prospect_master_model($entity_id);
        redirect('vw_customer_master');
    }
    
    public function save_pop_up_address()
    {
        $customer_name = $this->input->post('customer_name');
        // $customer_type = $this->input->post('customer_type');
        $address_type = 3;
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $customer_state_code = $this->input->post('customer_state_code');
        $customer_gst_number = $this->input->post('customer_gst_number');
        $contact_person = $this->input->post('contact_person');
        $contact_person_email_id = $this->input->post('contact_person_email_id');
        $first_contact_no = $this->input->post('first_contact_no');
        $whatsup_no = $this->input->post('whatsup_no');

        $customer_status = 1;
        $customer_name_array = array('customer_name' => $customer_name , 
        // 'customer_type' => $customer_type , 
        'status' => $customer_status);

        $this->db->insert('customer_master', $customer_name_array);
        $customer_lastid = $this->db->insert_id();

        if($address_type == 3)
        {
            $address_type_array = array('1' => 1 , '2' => 2);
            foreach ($address_type_array as $key => $value) {
               $add_type = $value;
               $customer_address_details_array = array('customer_id' => $customer_lastid ,'party_name' => $customer_name , 'address_type' => $add_type , 'state_id' => $state_id , 'city_id' => $city_id , 'state_code' => $customer_state_code , 'gst_no' => $customer_gst_number);

                $this->db->insert('customer_address_master', $customer_address_details_array);
                $customer_address_lastid = $this->db->insert_id();

                $customer_contact_details_array = array('customer_id' => $customer_lastid , 'customer_address_id' => $customer_address_lastid , 'contact_person' => $contact_person , 'email_id' => $contact_person_email_id , 'first_contact_no' => $first_contact_no , 'whatsup_no' => $whatsup_no);

                $this->db->insert('customer_contact_master', $customer_contact_details_array);
                $customer_contact_lastid = $this->db->insert_id();
            }
        }
        echo $customer_lastid;
    }

    public function update_details()
    {
        $entity_id = $this->input->post('entity_id');

        $section_name = $this->input->post('section_name');
        $process_id = $this->input->post('process_id');
        $section_date = $this->input->post('section_date');
        $topic = $this->input->post('topic');
        $medium_id = $this->input->post('medium_id');
        $remark = $this->input->post('remark');
        $batch_id = $this->input->post('batch_id');

        $session_update = array(
            'session_name' => $section_name, 
            'batch_id' => $batch_id, 
            'session_date' => $section_date, 
            'topic' => $topic,
            'process_id' => $process_id,
            'medium' => $medium_id,
            'remark' => $remark
        );  
        $this->db->where('entity_id',$entity_id);
        $this->db->update('session_master', $session_update);

        echo $entity_id;
    }
    public function delete_session_master()
    {
       $session_id = $this->uri->segment(2);
       $data = $this->session_master_model->delete_session_master($session_id);//delete from session_master Table
       redirect('vw_session_master');   
    }

}
?>
