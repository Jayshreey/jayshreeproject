<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_master_model extends CI_Model{ 
    function __construct() { 
        // Set table name 
    } 

    public function display_regestration_data_records()
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $where = '(user_login.type != "'.'1'.'" )';
        $this->db->where($where);
        $registrationQuery = $this->db->get();
        $registrationData = $registrationQuery->result_array();

        return $registrationData;
    }

    public function getEmployeeList()
    {
        $this->db->select('entity_id, CONCAT(salutation,first_name,'."' '".',last_name) AS Name');
        $this->db->from('sparrow_employee_master');
        $this->db->order_by('entity_id', 'DESC');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function getContactList()
    {
        $this->db->select('company_contact_master.entity_id, CONCAT(company_master.company_name,'."' - '".',company_contact_master.salutation,company_contact_master.first_name,company_contact_master.last_name) AS Name');
        $this->db->from('company_contact_master');
        $this->db->join('company_master', 'company_master.entity_id = company_contact_master.company_id', 'INNER');
        $contactDetails = $this->db->get();
        $contactDetailsData = $contactDetails->result();
        return $contactDetailsData;  
    }

    public function getEmployeeUserId($empId)
    {
        $this->db->select('email_id');
        $this->db->from('sparrow_employee_master');
        $this->db->where('entity_id', $empId);
        $this->db->order_by('entity_id', 'DESC');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }
    
    public function getContactUserId($contactId)
    {
        $this->db->select('email_id');
        $this->db->from('company_contact_master');
        $this->db->where('entity_id', $contactId);
        $contactDetails = $this->db->get();
        $contactDetailsData = $contactDetails->result_array();
        return $contactDetailsData;  
    }






    public function get_role()
    {
		$company_id = $this->session->userdata('company_id');
		$role_id = $this->session->userdata('role_id');

        $this->db->select('*');
        $this->db->from('role_master');
		if($company_id !=1){
			$this->db->where('role_type',2);
		}
        $this->db->order_by('entity_id', 'DESC');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function save_info_model($data)
    {
        $this->db->insert('user_login',$data);
    }



    public function display_records_by_id($entity_id)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('entity_id', $entity_id);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    public function get_role_edit_model($hidden_role_id)
    {
        $query = $this->db->get_where('role_master', array('entity_id' => $hidden_role_id));
        return $query;
    }

    public function get_company_edit_model($hidden_company_id)
    {
        $query = $this->db->get_where('company_master', array('entity_id' => $hidden_company_id));
        return $query;
    }

    public function update_info_model($data)
    {
        // print_r($data);
        // die();
        // $this->db->where('entity_id', $data['entity_id']);
        // $this->db->update('user_login', $data); 

        $this->db->where('entity_id', $data['entity_id']);
        return $this->db->update('user_login', $data);
    }

    public function deleterecords($entity_id)
    {
        $this->db->where('entity_id', $entity_id);
        $this->db->delete('user_login'); 
    }

    public function get_user_details_by_id_model($entity_id)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $where = '(user_login.entity_id = "'.$entity_id.'" )';
        $this->db->where($where);
        $query = $this->db->get();
        // $data = $query->row_array();
        // print_r($data);
        // die();
        return $query;
    }

	
    public function get_contact_person_list($customer_id)
    {
        $result = $this->db->get_where('customer_contact_master', array('customer_id' => $customer_id))->result();
        return $result;
    }

}
?>
