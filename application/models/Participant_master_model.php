<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Participant_master_model extends CI_Model{

    public function check_customer_name_model($customer_name)
    {
        $this->db->select('*');
        $this->db->from('customer_master');
        $where = '(customer_master.customer_name = "'.$customer_name.'" )';
        $this->db->where($where);
        $query = $this->db->get();
        $query_result = $query->num_rows();
        if($query_result == 0)
        {
            return true;
        }else
        {
            return false;
        }   
    }

	public function get_company_list()
	{
		$this->db->select('*,company_master.entity_id as company_id');
		$this->db->from('company_master');
		$this->db->join('state_master','state_master.entity_id = company_master.state_id','inner');
		$this->db->join('city_master','city_master.entity_id = company_master.city_id','inner');
		$this->db->join('source_master','source_master.entity_id = company_master.source_id','inner');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$company_query = $this->db->get();
		$company_list = $company_query->result();

		return $company_list;
	}

    public function get_state_list()
    {
        $this->db->select('entity_id , state_name , CONCAT(state_name,'.'" - "'.', state_code) AS State_name');
        $this->db->from('state_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_source_list()
    {
        $this->db->select('*');
        $this->db->from('source_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_city_list()
    {
        $this->db->select('*');
        $this->db->from('city_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_parameter_list()
    {
        $this->db->select('*');
        $this->db->from('performance_review_parameter_master');
        $parameter_query = $this->db->get();
        $parameter_list = $parameter_query->result();
        return $parameter_list;  
    }

	public function save_company($company_array)
	{
		$this->db->insert('company_master',$company_array);
		$customer_id = $this->db->insert_id();

		return $customer_id;
	}

	public function save_company_contact($company_contact_array)
	{
		$this->db->insert('company_contact_master',$company_contact_array);
		$company_contact_id = $this->db->insert_id();

		return $company_contact_id;
	}

	public function save_subscription($subscription_array)
	{
		$this->db->insert('subscription_master',$subscription_array);
		$subscription_id = $this->db->insert_id();

		return $subscription_id;
	}

	public function get_company_details($company_id)
	{
		$this->db->select('*');
		$this->db->from('company_master');
		//$this->db->join('','','');
		$where = '(entity_id = "'.$company_id.'")';
		$this->db->where($where);
		$company_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$company_details = $company_query->row();

		return $company_details;
	}

    public function get_spoc_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
        $this->db->where('privilege_id',1);
        $spoc_query = $this->db->get();
        $spoc_list = $spoc_query->result();
        return $spoc_list;  
    }

    public function get_state_id_data($entity_id)
    {
        $this->db->select('*');
        $this->db->from('state_master');
        $where = '(state_master.entity_id = "'.$entity_id.'" )';
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_city_model_data($state_id)
    {
        $query = $this->db->get_where('city_master', array('state_id' => $state_id));
        return $query;
    }

    public function get_company_details_by_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('company_master');
        $this->db->join('source_master','source_master.entity_id = company_master.source_id', 'inner');
        $this->db->join('state_master','state_master.entity_id = company_master.state_id', 'inner');
        $this->db->join('city_master','city_master.entity_id = company_master.city_id', 'inner');
        $this->db->where('company_master.entity_id',$company_id);
       // $this->db->limit(1);
        $company_query = $this->db->get();
		$company_details = $company_query->row();

        return $company_details;
    }

    public function get_company_contact_details_by_id($company_contact_id)
    {
        $this->db->select('company_contact_master.*,company_master.*,source_master.*,state_master.*,city_master.*,concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as spoc_name,concat(company_contact_master.first_name," ",company_contact_master.middle_name," ",company_contact_master.last_name) as company_contact_name,company_contact_master.designation as designation,company_contact_master.remark as remark,role_master.role_name');
        $this->db->from('company_contact_master');
        $this->db->join('company_master','company_master.entity_id = company_contact_master.company_id', 'inner');
        $this->db->join('source_master','source_master.entity_id = company_master.source_id', 'inner');
        $this->db->join('state_master','state_master.entity_id = company_master.state_id', 'inner');
        $this->db->join('city_master','city_master.entity_id = company_master.city_id', 'inner');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id', 'left');
        $this->db->join('role_master','role_master.entity_id = company_contact_master.privilege_id', 'inner');
        $this->db->where('company_contact_master.entity_id',$company_contact_id);
       // $this->db->limit(1);
        $company_query = $this->db->get();
		$company_details = $company_query->row();

        return $company_details;
    }

	public function get_valid_participant_details_by_company_contact_id($company_contact_id)
	{
		$this->db->select('*');
		$this->db->from('participant_master');
		$this->db->join('batch_master','batch_master.entity_id = participant_master.batch_id','inner');
		$where = '(participant_master.company_contact_id = "'.$company_contact_id.'")';
		$this->db->where($where);
		$this->db->limit(1);
		$participant_query = $this->db->get();
		$participant_details = $participant_query->row();

		return $participant_details;
	}

	public function get_subscription_list_by_company_id($company_id)
	{
		$this->db->select('*');
		$this->db->from('subscription_master');
		$this->db->join('coaching_program_master','coaching_program_master.entity_id = subscription_master.coaching_program_id','inner');
		$this->db->join('company_master','company_master.entity_id = subscription_master.company_id','inner');
		$where = '(subscription_master.company_id = "'.$company_id.'")';
		$this->db->where($where);
		$subscription_query = $this->db->get();
		$subscription_list = $subscription_query->result();

		return $subscription_list;
	}

	public function get_performance_list_by_company_contact_id($company_contact_id)
	{
		$this->db->select('*');
		$this->db->from('performance_review_parameter_relation');
		$this->db->join('performance_review_master','performance_review_master.entity_id = performance_review_parameter_relation.performance_review_id','inner');
		$where = '(performance_review_master.company_contact_id = "'.$company_contact_id.'" )';
		$this->db->where($where);
		$participant_query = $this->db->get();
		$performance_list = $participant_query->result();

		return $performance_list;
	}

	public function get_suggestion_list_by_company_contact_id($company_contact_id)
	{
		$this->db->select('*');
		$this->db->from('performance_review_suggestion_relation');
		$this->db->join('performance_review_master','performance_review_master.entity_id = performance_review_suggestion_relation.performance_review_id','inner');
		$where = '(performance_review_suggestion_relation.company_contact_id = "'.$company_contact_id.'" )';
		$this->db->where($where);
		$suggestion_query = $this->db->get();
		$suggestion_list = $suggestion_query->result();

		return $suggestion_list;
	}

	public function get_session_summary_list_by_company_contact_id($company_contact_id)
	{
		$this->db->select('*,count(*) as invited_count');
		$this->db->from('session_master');
		$this->db->join('session_participant_relation','session_participant_relation.session_id = session_master.entity_id','inner');
		$this->db->join('actionable_master','actionable_master.entity_id = session_master.actionable_id','inner');
		$where = '(session_participant_relation.company_contact_id = "'.$company_contact_id.'")';
		$this->db->group_by('session_master.actionable_id');
		$this->db->where($where);
		$session_summary_query = $this->db->get();
		//$session_summary_query_num_rows = $session_summary_query->num_rows();
		$session_summary_list = $session_summary_query->result();

		return $session_summary_list;
	}

    public function get_current_participant_list()
    {

		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$today_date = new DateTime($date);

		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];
	
		// Modify the date to subtract 1 month
		$today_date->modify('-2 month');

		// Output the new date in Y-m-d format
		$end_date = $today_date->format('Y-m-01');

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if ($role_id == 2) {
			$where2 = "(participant_master.entity_id > 0)";
		} elseif ($role_id == 3 || $role_id ==4) {
			$where2 = "(company_master.spoc_id = " . $sparrow_employee_id . ")";
		} else {
			$where2 = "(participant_master.entity_id < 0)";
		}

		

        $this->db->select('company_contact_master.*,sparrow_employee_master.first_name as spoc_name,participant_master.entity_id as participant_id,company_master.*,batch_master.*,participant_master.*,role_master.role_name');
        $this->db->from('participant_master');
		$this->db->join('company_master','company_master.entity_id = participant_master.company_id','left');
		$this->db->join('company_contact_master','company_contact_master.entity_id = participant_master.company_contact_id','left');
		$this->db->join('batch_master','batch_master.entity_id = participant_master.batch_id','left');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id','left');
		$this->db->join('role_master','role_master.entity_id = company_contact_master.privilege_id','left');
		$this->db->where($where2);
		$this->db->where('participant_master.status',1);
		$this->db->group_start();
		$this->db->where('participant_master.validity',1);
		$this->db->or_where('participant_master.validity is NULL');
        $where1 = '(participant_master.leaving_date >= "'.$end_date.'" or participant_master.leaving_date = "")';
		$this->db->where($where1);
	
		$this->db->group_end();
		$this->db->order_by('participant_master.entity_id','desc');
        $participant_query = $this->db->get();
		$participant_list = $participant_query->result();

        return $participant_list;
    }

    public function get_participant_list()
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];
	
		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if ($role_id == 2) {
			$where2 = "(participant_master.entity_id > 0)";
		} elseif ($role_id == 3 || $role_id ==4) {
			$where2 = "(company_master.spoc_id = " . $sparrow_employee_id . ")";
		} else {
			$where2 = "(participant_master.entity_id < 0)";
		}

        $this->db->select('company_contact_master.*,sparrow_employee_master.first_name as spoc_name,participant_master.entity_id as participant_id,company_master.*,batch_master.*,participant_master.*,role_master.role_name');
        $this->db->from('participant_master');
		$this->db->join('company_master','company_master.entity_id = participant_master.company_id','left');
		$this->db->join('company_contact_master','company_contact_master.entity_id = participant_master.company_contact_id','left');
		$this->db->join('batch_master','batch_master.entity_id = participant_master.batch_id','left');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id','left');
		$this->db->join('role_master','role_master.entity_id = company_contact_master.privilege_id','left');
		$this->db->where($where2);
		$this->db->order_by('participant_master.entity_id','desc');
        $participant_query = $this->db->get();
		$participant_list = $participant_query->result();

        return $participant_list;
    }

    public function get_contact_person_list_by_company_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('company_contact_master');
        $this->db->where('company_id',$company_id);
        $contact_person_query = $this->db->get();
		$contact_person_list = $contact_person_query->result();

        return $contact_person_list;
    }

    public function get_participant_list_by_company_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('participant_master');
        $this->db->where('company_id',$company_id);
        $participant_query = $this->db->get();
		$participant_list = $participant_query->result();

        return $participant_list;
    }

    public function get_participant_details_by_id($participant_id)
    {
        $this->db->select('participant_master.*,subscription_master.approval_status,coaching_program_master.coaching_program_name');
        $this->db->from('participant_master');
		$this->db->join('subscription_master','subscription_master.entity_id = participant_master.subscription_id','left');
		$this->db->join('coaching_program_master','coaching_program_master.entity_id = subscription_master.coaching_program_id','left');
        $this->db->where('participant_master.entity_id',$participant_id);
        $participant_query = $this->db->get();
		$participant_details = $participant_query->row();

        return $participant_details;
    }
	
	public function get_external_actionable_list()
	{
		$this->db->select('*');
		$this->db->from('actionable_master');
		//$this->db->join('','','');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$this->db->where('worklog_type',2);
		$actionable_query = $this->db->get();
		$actinable_list = $actionable_query->result();

		return $actinable_list;
	}

	public function save_contact_person($contact_person_insert_array)
	{
		$this->db->insert('company_contact_master',$contact_person_insert_array);
		$contact_person_id = $this->db->insert_id();

		return $contact_person_id;
	}

	public function save_participant($participant_insert_array)
	{
		$this->db->insert('participant_master',$participant_insert_array);
		$participant_id = $this->db->insert_id();

		return $participant_id;
	}
	public function update_participant($participant_id,$participant_update_array)
	{
		$this->db->where('entity_id',$participant_id);
		$result = $this->db->update('participant_master',$participant_update_array);
	
		return $result;
	}
	public function update_company_contact($company_contact_id,$company_contact_update_array)
	{
		$this->db->where('entity_id',$company_contact_id);
		$result = $this->db->update('company_contact_master',$company_contact_update_array);
	
		return $result;
	}

	public function update_subscription($subscription_id,$subscription_update_array)
	{
		$this->db->where('entity_id',$subscription_id);
		$result = $this->db->update('subscription_master',$subscription_update_array);
	
		return $result;
	}

    public function get_customer_address_details($entity_id)
    {
        $this->db->select('customer_master.entity_id AS Cust_id,
            customer_master.address,
            customer_master.state_id,
            customer_master.city_id,
            customer_master.pin_code,
            customer_master.source,
            customer_master.gst_no,
            customer_contact_master.entity_id AS Cust_contact_id,
            customer_contact_master.contact_person,
            customer_contact_master.spoc_id,
            customer_contact_master.salutation,
            customer_contact_master.email_id,
            customer_contact_master.first_contact_no,
            customer_contact_master.second_contact_no,
            customer_contact_master.whatsup_no');
        $this->db->from('customer_master');
        $this->db->join('customer_contact_master', 'customer_contact_master.customer_id = customer_master.entity_id', 'INNER');
        // $this->db->join('customer_type_master', 'customer_type_master.entity_id = customer_master.customer_type_id', 'INNER');
        $this->db->where('customer_contact_master.customer_id',$entity_id);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_customer_only_address_details($entity_id)
    {
        $this->db->select('customer_address_master.entity_id AS Cust_address_id,
            customer_address_master.party_name,
            customer_address_master.address_type,
            customer_address_master.address,
            customer_address_master.state_id,
            customer_address_master.city_id,
            customer_address_master.pin_code,
            customer_address_master.state_code,
            customer_address_master.gst_no,
            customer_address_master.pan_no');
        $this->db->from('customer_address_master');
        $where = '(customer_address_master.customer_id = "'.$entity_id.'")';
        $this->db->where($where);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_customer_only_contact_details($entity_id)
    {
        $this->db->select('
            customer_contact_master.entity_id AS Cust_contact_id,
            customer_contact_master.contact_person,
            customer_contact_master.email_id,
            customer_contact_master.first_contact_no,
            customer_contact_master.second_contact_no,
            customer_contact_master.salutation,
            customer_contact_master.whatsup_no');
        $this->db->from('customer_contact_master');
        $this->db->where('customer_contact_master.customer_id',$entity_id);
        $this->db->join('customer_master', 'customer_master.entity_id = customer_contact_master.customer_id', 'INNER');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function update_address_relation($update_array)
    {
        $this->db->where('entity_id', $update_array['entity_id']);
        return $this->db->update('customer_master', $update_array);
    }

    public function update_contact_relation($update_array)
    {
        $this->db->where('entity_id', $update_array['entity_id']);
        return $this->db->update('customer_contact_master', $update_array);
    }

    public function update_customer_master($update_array)
    {
        $this->db->where('entity_id', $update_array['entity_id']);
        return $this->db->update('customer_master', $update_array);
    }

    public function update_customer_address_master($update_address_array)
    {
        $this->db->where('entity_id', $update_address_array['entity_id']);
        return $this->db->update('customer_master', $update_address_array);
    }

    public function get_all_customers()
    {
        $this->db->select('customer_master.*,state_master.state_name,city_master.city_name,customer_contact_master.contact_person,customer_contact_master.first_contact_no');
        $this->db->from('customer_master');
        $this->db->join('customer_contact_master','customer_contact_master.customer_id = customer_master.entity_id','inner');
        $this->db->join('state_master','state_master.entity_id = customer_master.state_id','inner');
        $this->db->join('city_master','city_master.entity_id = customer_master.city_id','inner');
        $where = "(customer_master.status != '3')";
        $this->db->where($where);
        $this->db->order_by('customer_master.customer_name','asc');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_all_customer_contacts()
    {
        $this->db->select('customer_contact_master.*,batch_master.batch_name,customer_master.customer_name');
        $this->db->from('customer_contact_master');
        $this->db->join('customer_master','customer_contact_master.customer_id = customer_master.entity_id','inner');
        $this->db->join('batch_master','batch_master.entity_id = customer_contact_master.batch_id','inner');
        $this->db->order_by('customer_contact_master.contact_person','asc');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_customer_types()
    {
        $this->db->select('*');
        $this->db->from('customer_type_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }
    public function get_state_code_by_state_id($state_id)
    {
        $this->db->select('state_master.state_code');
        $this->db->from('state_master');
        $where = '(state_master.entity_id = "'.$state_id.'" )';
        $this->db->where($where);
        $state_master = $this->db->get();
        $state_master_query_result = $state_master->row_array();

        $data_result['data'] = json_encode($state_master_query_result);
        return $state_master_query_result;
    }

    public function soft_delete_customer_master_model($entity_id)
    {

        $data = array('status' => 3);

        $this->db->where('entity_id', $entity_id);
        return $this->db->update('customer_master', $data);
    }

	public function get_batch_list()
	{
		$this->db->select('*');
		$this->db->from('batch_master');
		//$this->db->join('','','');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$batch_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$batch_list = $batch_query->result();


		return $batch_list;

	}

	public function get_role_list()
	{
		$this->db->select('*');
		$this->db->from('role_master');
		//$this->db->join('','','');
		$where = '(role_type = 3)';
		$this->db->where($where);
		$role_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$role_list = $role_query->result();


		return $role_list;

	}

	public function get_coaching_program_list()
	{
		$this->db->select('coaching_program_master.*');
		$this->db->from('coaching_program_master');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$coaching_program_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$coaching_program_list = $coaching_program_query->result();


		return $coaching_program_list;

	}
	public function get_sparrow_employee_list()
	{
		$this->db->select('*');
		$this->db->from('sparrow_employee_master');
		//$this->db->join('','','');
		//$where = '(entity_id = '.1.')';
		//$this->db->where($where);
		$sparrow_employee_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$sparrow_employee_list = $sparrow_employee_query->result();


		return $sparrow_employee_list;

	}


}
?>
