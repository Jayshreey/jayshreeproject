<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Worklog_master_model extends CI_Model{

  public function get_worklog_list()
  {

	$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];
		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

	$this->db->select('*,worklog_master.entity_id as worklog_id');
	$this->db->from('worklog_master');
	$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = worklog_master.sparrow_employee_id','inner');
	$this->db->join('actionable_master','actionable_master.entity_id = worklog_master.actionable_id','inner');
	$this->db->join('session_master','session_master.entity_id = worklog_master.session_id','left');
	//$where = '(entity_id = '.1.')';
	if($role_id !=2){
	$this->db->where('worklog_master.sparrow_employee_id',$sparrow_employee_id);
	}
	$this->db->order_by('worklog_master.entity_id','desc');
	$worklog_query = $this->db->get();
	$worklog_list = $worklog_query->result();

	return $worklog_list;

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

    public function get_session_list()
    {
        $this->db->select('*');
        $this->db->from('session_master');
        $session_query = $this->db->get();
        $session_list = $session_query->result();
        return $session_list;  
    }

    public function get_session_list_by_date($session_date)
    {


		$this->db->select('*,session_master.entity_id as session_id');
        $this->db->from('session_master');
        $this->db->join('batch_master','batch_master.entity_id = session_master.batch_id','left');
        $this->db->join('process_master','process_master.entity_id = session_master.process_id','left');
        $this->db->join('status_master_relation','status_master_relation.entity_id = session_master.session_for','left');
		$this->db->where('session_date',$session_date);
        $session_query = $this->db->get();
        $session_list = $session_query->result();
        return $session_list;
    }

    public function get_group_session_list_by_date($session_date)
    {


		$this->db->select('*,session_master.entity_id as session_id');
        $this->db->from('session_master');
        $this->db->join('batch_master','batch_master.entity_id = session_master.batch_id','left');
        $this->db->join('process_master','process_master.entity_id = session_master.process_id','left');
        $this->db->join('status_master_relation','status_master_relation.entity_id = session_master.session_for','left');
		$this->db->where('session_date',$session_date);
		$this->db->where('session_master.actionable_id', 3);
        $session_query = $this->db->get();
        $session_list = $session_query->result();
        return $session_list;
    }

    public function get_review_list_by_company($company_id)
    {


		$this->db->select('performance_review_master.*,concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as reviewed_by,performance_review_master.entity_id as review_id,company_master.company_name');
        $this->db->from('performance_review_master');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = performance_review_master.reviewed_by','left');
        $this->db->join('company_master','company_master.entity_id = performance_review_master.company_id','left');
		$this->db->where('performance_review_master.company_id',$company_id);
		$this->db->order_by('performance_review_master.entity_id','desc');
        $review_query = $this->db->get();
        $review_list = $review_query->result();
        return $review_list;
    }

    public function get_session_template_list()
    {
        $this->db->select('*');
        $this->db->from('session_template_master');
        $session_template_query = $this->db->get();
        $session_template_list = $session_template_query->result();
        return $session_template_list;  
    }

    public function get_performance_review_parameter_list()
    {
        $this->db->select('*');
        $this->db->from('performance_review_parameter_master');
        $parameter_query = $this->db->get();
        $parameter_list = $parameter_query->result();
        return $parameter_list;  
    }

    public function get_performance_review_list_by_id($performance_review_id)
    {
        $this->db->select('*');
        $this->db->from('performance_review_parameter_relation');
        $this->db->join('performance_review_parameter_master','performance_review_parameter_master.entity_id = performance_review_parameter_relation.parameter_id','inner');
        $this->db->join('uom_master','uom_master.entity_id = performance_review_parameter_relation.uom','inner');
        $this->db->where('performance_review_parameter_relation.performance_review_id',$performance_review_id);
        $performance_query = $this->db->get();
        $performance_list = $performance_query->result();
        return $performance_list;  
    }

    public function get_performance_review_suggestion_list_by_id($performance_review_id)
    {
        $this->db->select('performance_review_suggestion_relation.*,sparrow_employee_master.first_name as spoc_name,performance_review_master.*,concat(company_contact_master.first_name," ",company_contact_master.last_name) as company_contact_name,company_master.*,participant_master.*,role_master.role_name,batch_master.*');
        $this->db->from('performance_review_suggestion_relation');
        $this->db->join('performance_review_master','performance_review_master.entity_id = performance_review_suggestion_relation.performance_review_id','inner');
        $this->db->join('company_contact_master','company_contact_master.entity_id = performance_review_suggestion_relation.company_contact_id','inner');
        $this->db->join('role_master','role_master.entity_id = company_contact_master.privilege_id','left');
        $this->db->join('company_master','company_master.entity_id = company_contact_master.company_id','left');
        $this->db->join('participant_master','participant_master.company_contact_id = company_contact_master.entity_id','left');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id','left');
        $this->db->join('batch_master','batch_master.entity_id = participant_master.batch_id','left');
        $this->db->where('performance_review_suggestion_relation.performance_review_id',$performance_review_id);
        $suggestion_query = $this->db->get();
        $suggestion_list = $suggestion_query->result();
        return $suggestion_list;  
    }

    public function get_prospect_tracking_details_by_id($prospect_tracking_id)
    {
        $this->db->select('*');
        $this->db->from('prospect_tracking_master');
        $this->db->join('status_master_relation','status_master_relation.entity_id = prospect_tracking_master.communication_type_id','inner');
        $this->db->where('prospect_tracking_master.entity_id',$prospect_tracking_id);
        $tracking_query = $this->db->get();
        $tracking_details = $tracking_query->row();
        return $tracking_details;  
    }

    public function get_actionable_list()
    {
        $this->db->select('*');
        $this->db->from('actionable_master');
        $actionable_query = $this->db->get();
        $actionable_list = $actionable_query->result();
        return $actionable_list;  
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

    public function get_prospect_tracking_list($prospect_tracking_id)
    {
        $this->db->select('prospect_tracking_master.*,concat(prospect_master.company_name,"-",prospect_master.first_name," ",prospect_master.last_name) as prospect_name,prospect_master.assigned_to,nca_activity_type_master.nca_activity_type,nca_activity_result_relation.nca_activity_result,status_master_relation.status_name,prospect_master.entity_id as prospect_id,prospect_master.designation,prospect_master.company_name,prospect_master.programs_interested_in,source_master.source_name,prospect_master.conversion_stage');
        $this->db->from('prospect_tracking_master');
        $this->db->join('prospect_tracking_prospect_relation','prospect_tracking_prospect_relation.prospect_tracking_id = prospect_tracking_master.entity_id','inner');
        $this->db->join('prospect_master','prospect_master.entity_id = prospect_tracking_prospect_relation.prospect_id','inner');
        $this->db->join('source_master','source_master.entity_id = prospect_master.source_id','inner');
        $this->db->join('nca_activity_type_master','nca_activity_type_master.entity_id = prospect_tracking_master.nca_activity_type_id','left');
        $this->db->join('nca_activity_result_relation','nca_activity_result_relation.entity_id = prospect_tracking_master.nca_activity_result_id','left');
        $this->db->join('status_master_relation','status_master_relation.entity_id = prospect_tracking_master.tracking_status','left');
		$this->db->where('prospect_tracking_id',$prospect_tracking_id);
        $prospect_tracking_query = $this->db->get();
        $prospect_tracking_list = $prospect_tracking_query->result();

        return $prospect_tracking_list;  
    }

	
	public function save_worklog($worklog_insert_array)
	{
		
		$this->db->insert('worklog_master',$worklog_insert_array);
		$worklog_id = $this->db->insert_id();

		return $worklog_id;
	}
	
	public function update_worklog($worklog_id,$worklog_update_array)
	{
		$this->db->where('entity_id',$worklog_id);
		$result = $this->db->update('worklog_master',$worklog_update_array);

		return $result;
	}
	public function update_session($session_id,$session_update_array)
	{
		
		$this->db->where('entity_id',$session_id);
		$result = $this->db->update('session_master',$session_update_array);

		return $result;
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
	
	public function save_session($session_insert_array)
	{
		$this->db->insert('session_master',$session_insert_array);
		$session_id = $this->db->insert_id();

		return $session_id;
	}
	
	public function save_session_sparrow_employee($session_sparrow_employee_insert_array)
	{
		$this->db->insert('session_sparrow_employee_relation',$session_sparrow_employee_insert_array);
		$result = $this->db->insert_id();

		return $result;
	}
	
	public function save_session_participants($session_participant_insert_array)
	{
		$this->db->insert('session_participant_relation',$session_participant_insert_array);
		$result = $this->db->insert_id();

		return $result;
	}

	public function save_performance_review($performance_review_insert_array)
	{
		$this->db->insert('performance_review_master',$performance_review_insert_array);
		$performance_review_id = $this->db->insert_id();

		return $performance_review_id;
	}

	public function save_performance_review_relation($performance_review_relation_insert_array)
	{
		$this->db->insert('performance_review_parameter_relation',$performance_review_relation_insert_array);
	}

	public function save_suggestion($suggestion_insert_array)
	{
		$this->db->insert('performance_review_suggestion_relation',$suggestion_insert_array);
	}
	
	public function save_participant_master($participant_insert_array)
	{
		$this->db->insert('participant_master',$participant_insert_array);
		$participant_id = $this->db->insert_id();

		return $participant_id;
	}
	
	public function save_prospect_tracking($prospect_tracking_insert_array)
	{
		$this->db->insert('prospect_tracking_master',$prospect_tracking_insert_array);
		$prospection_tracking_id = $this->db->insert_id();

		return $prospection_tracking_id;
	}
	
	public function save_prospect_tracking_relation($prospect_tracking_relation_insert_array)
	{
		$this->db->insert('prospect_tracking_prospect_relation',$prospect_tracking_relation_insert_array);
	}
	public function update_prospect_master($prospect_id,$prospect_update_array)
	{
		$this->db->where('entity_id',$prospect_id);
		$result = $this->db->update('prospect_master',$prospect_update_array);
		
		return $result;
	}

	public function get_session_details_by_id($session_id)
	{
		$this->db->select('session_master.*,session_template_master.session_template_name,session_template_master.session_template_code,coaching_program_type_master.coaching_program_type,batch_master.batch_name,process_master.process_name,status_master_relation.status_name');
        $this->db->from('session_master');
        $this->db->join('batch_master','batch_master.entity_id = session_master.batch_id','left');
        $this->db->join('coaching_program_type_master','coaching_program_type_master.entity_id = batch_master.coaching_program_type_id','left');
        $this->db->join('actionable_master','actionable_master.entity_id = session_master.actionable_id','left');
        $this->db->join('status_master_relation','status_master_relation.entity_id = session_master.session_for','left');
        $this->db->join('process_master','process_master.entity_id = session_master.process_id','left');
        $this->db->join('session_template_master','session_template_master.entity_id = session_master.session_template_id','left');
        $where = '(session_master.entity_id = "'.$session_id.'")';
        $this->db->where($where);
        $session_query = $this->db->get();
        //$session_query_num_rows = $session_query->num_rows();
        $session_details = $session_query->row();

        return $session_details;
	}

	public function get_performance_review_details_by_id($session_id)
	{
		$this->db->select('performance_review_master.review_month,performance_review_master.review_year,company_master.company_name');
		$this->db->from('performance_review_master');
		$this->db->join('company_master','company_master.entity_id = performance_review_master.company_id','inner');
		$where = '(performance_review_master.entity_id = "'.$session_id.'")';
		$this->db->where($where);
		$session_query = $this->db->get();
		$session_details = $session_query->row();

		return $session_details;
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

	
    public function get_participant_role_list()
    {
        $this->db->select('*');
        $this->db->from('role_master');
        $this->db->where('role_type',3);
        $participant_role_query = $this->db->get();
        $participant_role_list = $participant_role_query->result();
        return $participant_role_list;  
    }
	
    public function get_sparrow_employee_list()
    {
        $this->db->select('*');
        $this->db->from('sparrow_employee_master');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_tracking_status_list()
    {
        $this->db->select('*');
        $this->db->from('status_master_relation');
		$this->db->where('status_master_id', 1); // 1 for tracking status
        $tracking_status_query = $this->db->get();
        $tracking_status_list = $tracking_status_query->result();
        return $tracking_status_list;  
    }

    public function get_uom_list()
    {
        $this->db->select('*');
        $this->db->from('uom_master');
        $uom_query = $this->db->get();
        $uom_list = $uom_query->result();
        return $uom_list;  
    }

    public function get_communication_type_list()
    {
        $this->db->select('*');
        $this->db->from('status_master_relation');
		$this->db->where('status_master_id', 2); // 1 for Communication Type
        $tracking_status_query = $this->db->get();
        $tracking_status_list = $tracking_status_query->result();
        return $tracking_status_list;  
    }

    public function get_nca_activity_type_list()
    {
        $this->db->select('*');
        $this->db->from('nca_activity_type_master');
		$nca_activity_type_query = $this->db->get();
        $nca_activity_type_list = $nca_activity_type_query->result();
        return $nca_activity_type_list;  
    }

    public function get_company_contact_list()
    {
        $this->db->select('company_contact_master.*,company_master.company_name');
        $this->db->from('company_contact_master');
        $this->db->join('company_master','company_master.entity_id = company_contact_master.company_id', 'inner');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_session_sparrow_employee_array($session_id)
    {
        $this->db->select('concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as sparrow_employee_name,session_sparrow_employee_relation.entity_id as session_sparrow_employee_id ');
        $this->db->from('session_sparrow_employee_relation');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = session_sparrow_employee_relation.sparrow_employee_id','inner');
		$this->db->where('session_id',$session_id);
        $session_sparrow_employee_query = $this->db->get();
        $session_sparrow_employee_array = $session_sparrow_employee_query->result_array();
        return $session_sparrow_employee_array;  
    }
    public function get_session_sparrow_employee_list($session_id)
    {
        $this->db->select('concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as sparrow_employee_name,session_sparrow_employee_relation.entity_id as session_sparrow_employee_id ,session_sparrow_employee_relation.responsibility_type');
        $this->db->from('session_sparrow_employee_relation');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = session_sparrow_employee_relation.sparrow_employee_id','inner');
		$this->db->where('session_id',$session_id);
        $session_sparrow_employee_query = $this->db->get();
        $session_sparrow_employee_list = $session_sparrow_employee_query->result();
        return $session_sparrow_employee_list;  
    }

    public function get_session_participant_array($session_id)
    {
        $this->db->select('concat(company_contact_master.first_name," ",company_contact_master.last_name) as participant_name,session_participant_relation.entity_id as session_participant_id');
        $this->db->from('session_participant_relation');
		$this->db->join('company_contact_master','company_contact_master.entity_id = session_participant_relation.company_contact_id','inner');
		$this->db->where('session_id',$session_id);
        $session_participant_query = $this->db->get();
        $session_participant_array = $session_participant_query->result_array();
        return $session_participant_array;  
    }
    
    public function get_session_participant_list($session_id)
    {
        $this->db->select('concat(company_contact_master.first_name," ",company_contact_master.last_name) as participant_name,company_master.company_name,session_participant_relation.entity_id as session_participant_id,session_participant_relation.attendance,role_master.role_name,batch_master.*,sparrow_employee_master.first_name as spoc_name,participant_master.*');
        $this->db->from('session_participant_relation');
		$this->db->join('company_contact_master','company_contact_master.entity_id = session_participant_relation.company_contact_id','inner');
		$this->db->join('role_master','role_master.entity_id = company_contact_master.privilege_id','left');
        $this->db->join('company_master','company_master.entity_id = company_contact_master.company_id','inner');
        $this->db->join('participant_master','participant_master.company_contact_id = company_contact_master.entity_id','left');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id','left');
        $this->db->join('batch_master','batch_master.entity_id = participant_master.batch_id','left');    
		$this->db->where('session_id',$session_id);
        $session_participant_query = $this->db->get();
        $session_participant_list = $session_participant_query->result();
        return $session_participant_list;  
    }

    public function get_spoc_list()
    {
        $this->db->select('spoc_master.*,sparrow_employee_master.first_name');
        $this->db->from('spoc_master');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = spoc_master.sparrow_employee_id','inner');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_batch_list()
    {
        $this->db->select('*');
        $this->db->from('batch_master');
        $batch_query = $this->db->get();
        $batch_list = $batch_query->result();
        return $batch_list;  
    }

    public function get_process_list()
    {
        $this->db->select('*');
        $this->db->from('process_master');
        $process_query = $this->db->get();
        $process_list = $process_query->result();
        return $process_list;  
    }
	
	public function get_session_for_list()
	{
		$this->db->select('*');
		$this->db->from('status_master_relation');
		//$this->db->join('','','');
		//$where = '(entity_id = '.1.')';
		$this->db->where('status_master_id',3); //3 for status for
		$status_for_query = $this->db->get();
		$status_for_list = $status_for_query->result();

		return $status_for_list;
	}

    public function get_actionable_list_by_worklog_type($worklog_type)
    {
        $this->db->select('*');
        $this->db->from('actionable_master');
        $where = '(actionable_master.worklog_type = "'.$worklog_type.'" )';
        $this->db->where($where);
        $actionable_query = $this->db->get();
		$actionable_list = $actionable_query->result();

        return $actionable_list;
    }

    public function get_company_contact_person_list_by_company_id($company_id)
    {
        $this->db->select('*,concat(company_contact_master.first_name," ",company_contact_master.last_name) as company_contact_name');
        $this->db->from('company_contact_master');
        $where = '(company_contact_master.company_id = "'.$company_id.'" )';
        $this->db->where($where);
        $company_contact_query = $this->db->get();
		$company_contact_list = $company_contact_query->result();

        return $company_contact_list;
    }

    public function get_nca_activity_result_list_by_activity_id($nca_activity_type_id)
    {
        $this->db->select('*');
        $this->db->from('nca_activity_result_relation');
        $where = '(nca_activity_result_relation.nca_activity_type_id = "'.$nca_activity_type_id.'" )';
        $this->db->where($where);
        $nca_activity_result_query = $this->db->get();
		$nca_activity_result_list = $nca_activity_result_query->result();

        return $nca_activity_result_list;
    }

    public function get_batch_list_by_coaching_program_type($coaching_program_type_id)
    {
        $this->db->select('*');
        $this->db->from('batch_master');
        $where = '(batch_master.coaching_program_type_id = "'.$coaching_program_type_id.'" )';
        $this->db->where($where);
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

    public function get_worklog_details_by_id($worklog_id)
    {
        $this->db->select('*,worklog_master.actionable_id,concat(sparrow_employee_master.first_name," ",sparrow_employee_master.last_name) as sparrow_employee_name');
        $this->db->from('worklog_master');
        $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = worklog_master.sparrow_employee_id', 'inner');
        $this->db->join('actionable_master','actionable_master.entity_id = worklog_master.actionable_id', 'inner');
        $this->db->join('session_master','session_master.entity_id = worklog_master.session_id', 'left');
        $this->db->where('worklog_master.entity_id',$worklog_id);
        $company_query = $this->db->get();
		$company_details = $company_query->row();
        //echo $this->db->last_query();
        return $company_details;
    }

	public function get_session_template_details_by_id($session_template_id)
	{
		$this->db->select('*');
		$this->db->from('session_template_master');
		//$this->db->join('','','');
		//$where = '(entity_id = '.1.')';
		$this->db->where('entity_id', $session_template_id);
		$session_template_query = $this->db->get();
		//$session_template_query_num_rows = $session_template_query->num_rows();
		$session_template_details = $session_template_query->row();

		return $session_template_details;
	}

    public function get_prospect_list()
    {
        $this->db->select('prospect_master.*,sparrow_employee_master.first_name as sparrow_first_name,sparrow_employee_master.last_name as sparrow_last_name,source_master.source_name');
        $this->db->from('prospect_master');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = prospect_master.assigned_to','left');
		$this->db->join('source_master','source_master.entity_id = prospect_master.source_id','inner');
		$this->db->where('conversion_stage !=', 3);
        $nca_query = $this->db->get();
		$nca_list = $nca_query->result();

        return $nca_list;
    }

    public function get_all_prospect_list()
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

	public function save_session_participant($session_participant_insert_array)
	{
		$this->db->insert('session_participant_relation',$session_participant_insert_array);
	}

    public function get_participant_list_by_batch_id($batch_id)
    {
        $this->db->select('*');
        $this->db->from('participant_master');
        $this->db->where('batch_id',$batch_id);
        $participant_query = $this->db->get();
		$participant_list = $participant_query->result();

        return $participant_list;
    }

    public function get_external_actionable_list()
    {
        $this->db->select('*');
        $this->db->from('actionable_master');
        $this->db->where('worklog_type',2);
        $actionable_query = $this->db->get();
		$actionable_list = $actionable_query->result();

        return $actionable_list;
    }

    public function get_participant_list()
    {
        $this->db->select('company_contact_master.*,concat(company_contact_master.first_name," ",company_contact_master.last_name)as participant_name,company_master.company_name');
        $this->db->from('company_contact_master');
        $this->db->join('company_master', 'company_master.entity_id = company_contact_master.company_id', 'INNER');
        $this->db->order_by('company_master.company_name','asc');
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
