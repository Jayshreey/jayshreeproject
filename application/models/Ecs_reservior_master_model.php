<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ecs_reservior_master_model extends CI_Model{
    public function get_current_ecs_reservior_list()
    {

		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$today_date = new DateTime($date);

		$session_data = $this->session->userdata();
		$user_id = $session_data['user_id'];
	    $company_id = $session_data['company_id'];
		// Modify the date to subtract 1 month
		$today_date->modify('-2 month');

		// Output the new date in Y-m-d format
		$end_date = $today_date->format('Y-m-01');

	    $this->db->select('ecs_reservior.*,CONCAT(company_contact_master.first_name,'.'" "'.',company_contact_master.last_name) AS rm_name');
        $this->db->from('ecs_reservior');
        $this->db->join('company_contact_master','company_contact_master.entity_id = ecs_reservior.rm_id','left');
		$this->db->where('ecs_reservior.status',1);
		$this->db->where('ecs_reservior.company_id',$company_id);
		$this->db->order_by('ecs_reservior.entity_id','desc');
        $participant_query = $this->db->get();
		$participant_list = $participant_query->result();

        return $participant_list;
    }
    public function get_rm_list()
    {
        date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$today_date = new DateTime($date);

		$session_data = $this->session->userdata();
		$company_id = $session_data['company_id'];
        $this->db->select('entity_id,CONCAT(first_name,'.'" "'.',last_name) AS rm_name');
        $this->db->from('company_contact_master');
		//$this->db->where('privilege_id',2);
		$this->db->where('company_id',$company_id);
	
        $rm_query = $this->db->get();
       // echo $this->db->last_query();
		$rm_list = $rm_query->result();

        return $rm_list;
    }
    public function save_ecs_reservior_details($ecs_insert_array)
	{
		$this->db->insert('ecs_reservior',$ecs_insert_array);
		$contact_person_id = $this->db->insert_id();

		return $contact_person_id;
	}
    public function get_ecs_reserviour_details_by_id($ecs_reserviour_id)
    {
        $this->db->select('ecs_reservior.*,CONCAT(company_contact_master.first_name,'.'" "'.',company_contact_master.last_name) AS rm_name');
        $this->db->from('ecs_reservior');
        $this->db->join('company_contact_master','company_contact_master.entity_id = ecs_reservior.rm_id','left');
        $this->db->where('ecs_reservior.entity_id',$ecs_reserviour_id);
		$this->db->order_by('ecs_reservior.entity_id','desc');
        $ecs_query = $this->db->get();
       // echo $this->db->last_query();
		$ecs_list = $ecs_query->row();

        return $ecs_list;
    }
    public function update_ecs_reservior_details($ecs_reservior_id,$ecs_reservior_update_array)
	{
		$this->db->where('entity_id',$ecs_reservior_id);
		$result = $this->db->update('ecs_reservior',$ecs_reservior_update_array);
	
		return $result;
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
