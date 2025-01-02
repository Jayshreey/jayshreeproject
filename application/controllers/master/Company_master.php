<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('company_master_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['company_list'] = $this->company_master_model->get_active_company_list();
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('master/company_master/vw_company_master_index',$data);
    }

    public function index_all()
    {
        $data['company_list'] = $this->company_master_model->get_company_list();
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('master/company_master/vw_company_master_index_all',$data);
    }

    public function participant_index()
    {
        $data['participant_list'] = $this->company_master_model->get_participant_list();
        $data['customer_list'] = $this->company_master_model->get_all_customers();
        $this->load->view('participants/participant_master/vw_participant_master_index',$data);
    }

    public function create()
    {
        $data['state_list'] = $this->company_master_model->get_state_list();
        // $data['customer_type_list'] = $this->company_master_model->get_customer_types();
        $data['source_list'] = $this->company_master_model->get_source_list();
        $this->load->view('master/company_master/vw_company_master_create',$data);
    }

    public function create_participant()
    {
        $data['state_list'] = $this->company_master_model->get_state_list();
        $data['company_list'] = $this->company_master_model->get_company_list();
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $data['source_list'] = $this->company_master_model->get_source_list();
        $this->load->view('participants/participant_master/vw_participant_master_create',$data);
    }

    public function get_city_name()
    {
        $state_id = $this->input->post('id',TRUE);
        $data = $this->company_master_model->get_city_model_data($state_id)->result();
         echo json_encode($data);
    }

    public function check_customer_name()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $customer_name = $this->input->post('id');
            $data = $this->company_master_model->check_customer_name_model($customer_name);
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
        $account_type = $this->input->post('account_type');
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
            'account_type' => $account_type, 
            'address' => $address,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'locality' => $locality,
            'pincode' => $pincode,
            'created_date' => $created_date,
            'source_id' =>$source_id,
            'status' => 1
        );

		$company_id = $this->company_master_model->save_company($customer_array);

		redirect('edit_company_master/'.$company_id);

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
        $data['company_details'] = $this->company_master_model->get_company_details($company_id);
        $data['contact_person_list'] = $this->company_master_model->get_contact_person_list_by_company_id($company_id);
        $data['participant_role_list'] = $this->company_master_model->get_participant_role_list();
        $data['subscription_list'] = $this->company_master_model->get_subscription_list_by_company_id($company_id);
        $data['parameter_list'] = $this->company_master_model->get_parameter_list();
        $data['performance_list'] = $this->company_master_model->get_performance_list_by_company_id($company_id);
        $data['suggestion_list'] = $this->company_master_model->get_suggestion_list_by_company_id($company_id);
        $data['session_summary_list'] = $this->company_master_model->get_session_summary_list_by_company_id($company_id);
        $data['external_actionable_list'] = $this->company_master_model->get_external_actionable_list($company_id);
		
        $data['source_list'] = $this->company_master_model->get_source_list();
        $data['state_list'] = $this->company_master_model->get_state_list();
        $data['city_list'] = $this->company_master_model->get_city_list();
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $data['batch_list'] = $this->company_master_model->get_batch_list();
        $data['sparrow_employee_name'] = $this->session->userdata('user_name');
        $this->load->view('master/company_master/vw_company_master_edit',$data);
    }

	
    public function update_company_details()
    {
        $company_id = $this->input->post('pop_up_company_id');
        $company_name = $this->input->post('pop_up_company_name');
        $account_type = $this->input->post('pop_up_account_type');
        $address = $this->input->post('pop_up_address');
        $state_id = $this->input->post('pop_up_state_id');
        $city_id = $this->input->post('pop_up_city_id');
        $pincode = $this->input->post('pop_up_pincode');
        $locality = $this->input->post('pop_up_locality');
        $source_id = $this->input->post('pop_up_source_id');
        $source_description = $this->input->post('pop_up_source_description');
        //$spoc_id = $this->input->post('pop_up_spoc_id');
        // $conversion_reason = $this->input->post('pop_up_conversion_reason');
        
        $company_update_array = array(
            'company_name' => $company_name , 
            'account_type' => $account_type, 
            'address' => $address,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'locality' => $locality,
            'pincode' => $pincode,
            'source_id' =>$source_id,
            'source_description' =>$source_description,
            // 'spoc_id' =>$spoc_id,
            // 'conversion_reason' =>$conversion_reason,
            'status' => 1
        );

		$this->company_master_model->update_company($company_id,$company_update_array);

		//update participant validity if in-active

		if($account_type == "Archived"){

			$participant_update_array = array(
				'validity' => 2
			);

			$this->db->where('company_id',$company_id);
			$this->db->update('participant_master',$participant_update_array);
		}

		redirect('edit_company_master/'.$company_id);

    }

    public function update_company_spoc()
    {
        
        $company_id = $this->input->post('pop_up_company_id');
        $spoc_id = $this->input->post('pop_up_spoc_id');
        
        $company_update_array = array(
             'spoc_id' =>$spoc_id
        );

		$this->company_master_model->update_company($company_id,$company_update_array);
      //  echo $this->db->last_query();die();
		redirect('vw_company_master');

    }

    public function get_company_details_by_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $company_id = $this->input->post('company_id');
            $data = $this->company_master_model->get_company_details_by_id($company_id);
            echo json_encode($data);
        }
    }

	public function save_participant_details()
	{
        $has_company = $this->input->post('has_company');
		
		if($has_company ==1 ){
			$company_id = $this->input->post('company_id');

		}else{

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
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
				'company_name' => $first_name." ".$last_name , 
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
	
			$company_id = $this->company_master_model->save_company($customer_array);
	

		}

        $salutation = $this->input->post('salutation');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $gender = $this->input->post('gender');
        $designation = $this->input->post('designation');
        $email_id = $this->input->post('email_id');
        $mobile1 = $this->input->post('mobile1');
        $spoc_id = $this->input->post('spoc_id');
        $joining_date = $this->input->post('joining_date');
        $remark = $this->input->post('remark');
       
		$participant_insert_array = array(
			'company_id' => $company_id,
			'salutation' => $salutation,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'gender' => $gender,
			'designation' => $designation,
			'email_id' => $email_id,
			'mobile1' => $mobile1,
			'joining_date' => $joining_date,
			'spoc_id' => $spoc_id,
			'remark' => $remark
		);


		$participant_id = $this->company_master_model->save_participant($participant_insert_array);

		
		redirect('edit_participant_master/'.$participant_id);
		
	}

	
    public function edit_participant_master()
    {
        $company_id = $this->uri->segment(2);
        $data['company_id'] = $company_id;
        $data['company_details'] = $this->company_master_model->get_company_details($company_id);
        $data['participant_list'] = $this->company_master_model->get_participant_list_by_company_id($company_id);

        
          
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $data['source_list'] = $this->company_master_model->get_source_list();
        $data['state_list'] = $this->company_master_model->get_state_list();
        $data['city_list'] = $this->company_master_model->get_city_list();
        $this->load->view('participants/participant_master/vw_participant_master_edit',$data);
    }

	public function add_new_contact_person()
	{
        $pop_up_company_id = $this->input->post('pop_up_company_id');
        $pop_up_salutation = $this->input->post('pop_up_salutation');
        $pop_up_first_name = $this->input->post('pop_up_first_name');
        $pop_up_middle_name = $this->input->post('pop_up_middle_name');
        $pop_up_last_name = $this->input->post('pop_up_last_name');
        $pop_up_gender = $this->input->post('pop_up_gender');
        $pop_up_privilege_id = $this->input->post('pop_up_privilege_id');
        $pop_up_designation = $this->input->post('pop_up_designation');
        $pop_up_email_id = $this->input->post('pop_up_email_id');
        $pop_up_mobile1 = $this->input->post('pop_up_mobile1');
        $pop_up_dob = $this->input->post('pop_up_dob');
       	$pop_up_remark = $this->input->post('pop_up_remark');
       	$pop_up_batch_id = $this->input->post('pop_up_batch_id');

		// get subscription & validity info

		// $this->db->get_where('subscription_master', ['company_id' => $pop_up_company_id])->row()->entity_id;
       
		$contact_person_insert_array = array(
			'company_id' => $pop_up_company_id,
			'salutation' => $pop_up_salutation,
			'first_name' => $pop_up_first_name,
            'middle_name' => $pop_up_middle_name,
			'last_name' => $pop_up_last_name,
			'gender' => $pop_up_gender,
			'privilege_id' => $pop_up_privilege_id,
			'designation' => $pop_up_designation,
			'email_id' => $pop_up_email_id,
			'mobile1' => $pop_up_mobile1,
			'dob' => $pop_up_dob,
			'remark' => $pop_up_remark
		);


		$company_contact_id = $this->company_master_model->save_contact_person($contact_person_insert_array);

		//add company contact in participant master

		
		$participant_insert_array = array(
			'company_id' => $pop_up_company_id,
			'company_contact_id' => $company_contact_id,
			'batch_id' => $pop_up_batch_id,
			'status' => 1
		);


		$participant_id = $this->company_master_model->save_participant($participant_insert_array);

		
		redirect('edit_company_master/'.$pop_up_company_id);
		
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


		$participant_id = $this->company_master_model->save_participant($participant_insert_array);

		
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
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_city()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $city_id = $this->input->post('city_id');

        $update_array = array('entity_id' => $entity_id,'city_id' => $city_id);
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_address()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $address = $this->input->post('address');

        $update_array = array('entity_id' => $entity_id,'address' => $address);
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_pincode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $pin_code = $this->input->post('pin_code');

        $update_array = array('entity_id' => $entity_id,'pin_code' => $pin_code);
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_statecode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $state_code = $this->input->post('state_code');

        $update_array = array('entity_id' => $entity_id,'state_code' => $state_code);
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_gstnumber()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $gst_no = $this->input->post('gst_no');

        $update_array = array('entity_id' => $entity_id,'gst_no' => $gst_no);
        $data = $this->company_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

   
    public function update_contactperson()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_person = $this->input->post('contact_person');

        $update_array = array('entity_id' => $entity_id,'contact_person' => $contact_person);
        $data = $this->company_master_model->update_contact_relation($update_array);

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
        $data = $this->company_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_emailid()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $email_id = $this->input->post('email_id');

        $update_array = array('entity_id' => $entity_id,'email_id' => $email_id);
        $data = $this->company_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_contactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_no = $this->input->post('contact_no');

        $update_array = array('entity_id' => $entity_id,'first_contact_no' => $contact_no);
        $data = $this->company_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_alternatecontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $alternate_contact_no = $this->input->post('alternate_contact_no');

        $update_array = array('entity_id' => $entity_id,'second_contact_no' => $alternate_contact_no);
        $data = $this->company_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_whatsupcontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $whatsup_contact_no = $this->input->post('whatsup_contact_no');

        $update_array = array('entity_id' => $entity_id,'whatsup_no' => $whatsup_contact_no);
        $data = $this->company_master_model->update_contact_relation($update_array);

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
        // $data = $this->company_master_model->update_customer_master($update_array);

        $this->db->where('entity_id', $entity_id);
        $this->db->update('customer_master', $update_array);

        redirect('vw_customer_master');
    }

    public function update_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_contact_details'] = $this->company_master_model->get_customer_only_contact_details($entity_id);
        $data['state_list'] = $this->company_master_model->get_state_list();
        $data['city_list'] = $this->company_master_model->get_city_list();

        $this->load->view('master/company_master/vw_customer_master_update',$data);
    }

    public function view_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_details'] = $this->company_master_model->get_customer_address_details($entity_id);

                $this->db->select('*');
                $this->db->from('customer_contact_master');
                //$this->db->join('','','');
                // $where = '(customer_id = "'.$entity_id);
                $this->db->where('customer_id',$entity_id);
                $this->db->limit(1);
                $address_query = $this->db->get();
                //$query_num_rows = $query->num_rows();
                $address_details = $address_query->row();
        
        $data['source_list'] = $this->company_master_model->get_source_list();
        $data['address_details'] = $address_details;
        $data['customer_type_list'] = $this->company_master_model->get_customer_types();
        $data['state_list'] = $this->company_master_model->get_state_list();
        $data['city_list'] = $this->company_master_model->get_city_list();
        $data['spoc_list'] = $this->company_master_model->get_spoc_list();
        $this->load->view('master/company_master/vw_customer_master_view',$data);
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
            $data = $this->company_master_model->get_state_code_by_state_id($state_id);
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
            $data = $this->company_master_model->get_state_id_data($entity_id)->result();
            echo json_encode($data);
        }
    }

    public function soft_delete_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data = $this->company_master_model->soft_delete_company_master_model($entity_id);
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
}
?>
