<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sparrow_employee_master_model extends CI_Model{

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

	public function get_batch_list_by_spoc_id($spoc_id)
	{
		$this->db->select('*');
		$this->db->from('batch_master');
		// $this->db->join('state_master','state_master.entity_id = company_master.state_id','inner');
		// $this->db->join('city_master','city_master.entity_id = company_master.city_id','inner');
		// $this->db->join('source_master','source_master.entity_id = company_master.source_id','inner');
		$where = '(batch_master.spoc_id = "'.$spoc_id.'")';
		$this->db->where($where);
		$batch_query = $this->db->get();
		$batch_list = $batch_query->result();

		return $batch_list;
	}

	public function get_active_company_list_by_spoc_id($spoc_id)
	{
		$this->db->select('*,company_master.entity_id as company_id');
		$this->db->from('company_master');
		$this->db->join('state_master','state_master.entity_id = company_master.state_id','inner');
		$this->db->join('city_master','city_master.entity_id = company_master.city_id','inner');
		$this->db->join('source_master','source_master.entity_id = company_master.source_id','inner');
		$where = '(company_master.spoc_id = "'.$spoc_id.'" and company_master.status = 1)';
		$this->db->where($where);
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

	
	public function save_sparrow_employee($sparrow_employee_insert_array)
	{
		$this->db->insert('sparrow_employee_master',$sparrow_employee_insert_array);
		$sparrow_employee_id = $this->db->insert_id();

		return $sparrow_employee_id;
	}

	public function save_company($company_array)
	{
		$this->db->insert('company_master',$company_array);
		$company_id = $this->db->insert_id();

		return $company_id;
	}

	
	public function save_contact_person($contact_person_insert_array)
	{
		$this->db->insert('company_contact_master',$contact_person_insert_array);
		$contact_person_id = $this->db->insert_id();

		return $contact_person_id;
	}
	
	public function save_participant_master($participant_insert_array)
	{
		$this->db->insert('participant_master',$participant_insert_array);
		$participant_id = $this->db->insert_id();

		return $participant_id;
	}
	
	public function update_prospect_master($prospect_id,$prospect_update_array)
	{
		$this->db->where('entity_id',$prospect_id);
		$result = $this->db->update('prospect_master',$prospect_update_array);
		
		return $result;
	}

	public function update_sparrow_employee($sparrow_employee_id,$sparrow_employee_update_array)
	{
		$this->db->where('entity_id',$sparrow_employee_id);
		$result = $this->db->update('sparrow_employee_master',$sparrow_employee_update_array);
		
		return $result;
	}

	public function get_prosect_details_by_id($prospect_id)
	{
		$this->db->select('*');
		$this->db->from('prospect_master');
		//$this->db->join('','','');
		$where = '(entity_id = "'.$prospect_id.'")';
		$this->db->where($where);
		$prospect_query = $this->db->get();
		//$query_num_rows = $query->num_rows();
		$prospect_details = $prospect_query->row();

		return $prospect_details;
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

    public function get_coaching_program_list()
    {
        $this->db->select('*');
        $this->db->from('coaching_program_master');
        $coaching_program_query = $this->db->get();
        $coaching_program_list = $coaching_program_query->result();
        return $coaching_program_list;  
    }
    public function get_sparrow_employee_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
        $sparrow_employee_query = $this->db->get();
        $sparrow_employee_list = $sparrow_employee_query->result();
        return $sparrow_employee_list;  
    }

    public function get_spoc_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
		$this->db->where('privilege_id',1); // 1 for SPOC
        $spoc_query = $this->db->get();
        $spoc_list = $spoc_query->result();
        return $spoc_list;  
    }

    public function get_facilitator_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
		$this->db->where('privilege_id',2); // 2 for Training Assistance(facilitator)
        $spoc_query = $this->db->get();
        $spoc_list = $spoc_query->result();
        return $spoc_list;  
    }
    public function get_batch_list()
    {
        $this->db->select('*');
        $this->db->from('batch_master');
        $batch_query = $this->db->get();
        $batch_list = $batch_query->result();
        return $batch_list;  
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
        //$this->db->join('customer_contact_master','customer_contact_master.customer_id = customer_master.entity_id', 'inner');
        $this->db->where('entity_id',$company_id);
       // $this->db->limit(1);
        $company_query = $this->db->get();
		$company_details = $company_query->row();

        return $company_details;
    }

    public function get_sparrow_employee_details_by_id($sparrow_employee_id)
    {
        $this->db->select('*,concat(salutation," ",first_name," ",last_name) as sparrow_employee_name');
        $this->db->from('sparrow_employee_master');
        //$this->db->join('customer_contact_master','customer_contact_master.customer_id = customer_master.entity_id', 'inner');
        $this->db->where('entity_id',$sparrow_employee_id);
       // $this->db->limit(1);
        $sparrow_employee_query = $this->db->get();
		$sparrow_employee_details = $sparrow_employee_query->row();

        return $sparrow_employee_details;
    }

    public function get_nca_list()
    {
        $this->db->select('prospect_master.*,sparrow_employee_master.first_name as sparrow_first_name,sparrow_employee_master.last_name as sparrow_last_name,source_master.source_name');
        $this->db->from('prospect_master');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = prospect_master.assigned_to','left');
		$this->db->join('source_master','source_master.entity_id = prospect_master.source_id','inner');
        $nca_query = $this->db->get();
		$nca_list = $nca_query->result();

        return $nca_list;
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
}
?>
