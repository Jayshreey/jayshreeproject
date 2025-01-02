<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class nca_reserviour_master_model extends CI_Model{

    public function get_nca_reserviour_list()
    {
        $session_data = $this->session->userdata();
		$user_id = $session_data['user_id'];
        $role_id = $session_data['role_id'];
        $company_id = $session_data['company_id'];
	    $sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if ($role_id == 3 || $role_id ==4) {
			$where2 = "(nca_reservoir.assigned_to = " . $sparrow_employee_id . ")";
		} else {
			$where2 = "(nca_reservoir.entity_id > 0)";
		}
        $this->db->select('nca_reservoir.*,sparrow_employee_master.first_name as sparrow_first_name,sparrow_employee_master.last_name as sparrow_last_name,source_master.source_name');
        $this->db->from('nca_reservoir');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = nca_reservoir.assigned_to','left');
		$this->db->join('source_master','source_master.entity_id = nca_reservoir.source_id','left');
		$this->db->where($where2);
		$this->db->where('nca_reservoir.status', 1);
        $this->db->where('nca_reservoir.company_id', $company_id);
		$this->db->order_by('entity_id', 'desc');
       
        $nca_query = $this->db->get();
		$nca_list = $nca_query->result();
       
        return $nca_list;
    }

    public function get_sparrow_employee_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_source_list()
    {
        $this->db->select('*');
        $this->db->from('company_source_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function save_nca_reserviour($nca_reserviour_insert_array)
	{
		$this->db->insert('nca_reservoir',$nca_reserviour_insert_array);
		$nca_id = $this->db->insert_id();

		return $nca_id;
	}
   
    public function get_nca_reserviour_details_by_id($nca_reserviour_id)
    {
        $this->db->select('nca_reservoir.*,concat(nca_reservoir.first_name," ",nca_reservoir.middle_name," ",nca_reservoir.last_name) as nca_reserviour_name,concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as sparrow_employee_name');
        $this->db->from('nca_reservoir');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = nca_reservoir.assigned_to','left');
        $this->db->where('nca_reservoir.entity_id',$nca_reserviour_id);
        $nca_reserviour_query = $this->db->get();
		$nca_reserviour_details = $nca_reserviour_query->row();

        return $nca_reserviour_details;
    }

    public function update_nca_reserviour_master($nca_reserviour_id,$nca_reserviour_update_array)
	{
		$this->db->where('entity_id',$nca_reserviour_id);
		$result = $this->db->update('nca_reservoir',$nca_reserviour_update_array);
		
		return $result;
	}
   
}
?>
