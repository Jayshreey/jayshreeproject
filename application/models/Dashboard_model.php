<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Dashboard_model extends CI_Model{ 
    function __construct() { 
        // Set table name 
    } 

    public function validate($user_name,$encrypted_password)
    {
        
        $this->db->where('user_name',$user_name);
        $this->db->where('password',$encrypted_password);
        $query = $this->db->get('user_login');

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return true;
        }else
        {
            return false;
        }
    }

    public function get_renewals($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		// if($role_id ==2){
		// 	$where = ['participant_master.entity_id >' => 0];
			
		// }elseif ($role_id ==3) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }elseif ($role_id ==4) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }


		$this->db->select('*');
		$this->db->from('session_master');
		$this->db->join('session_participant_relation','session_participant_relation.session_id = session_master.entity_id','inner');
		// $this->db->where($where);
		$where1 = '(session_master.actionable_id = 3)';
		$this->db->where($where1);
		$this->db->group_by('session_participant_relation.company_contact_id', 4);
		$this->db->having('count(attendance) >', 2);
		$session_query = $this->db->get();
		$total_renewals = $session_query->num_rows();

		return $total_renewals;

    }

    public function get_workshop_prospects($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		// if($role_id ==2){
		// 	$where = ['participant_master.entity_id >' => 0];
			
		// }elseif ($role_id ==3) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }elseif ($role_id ==4) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }


		$this->db->select('*');
		$this->db->from('prospect_tracking_master');
		$this->db->join('prospect_tracking_prospect_relation','prospect_tracking_prospect_relation.prospect_tracking_id = prospect_tracking_master.entity_id','inner');
		// $this->db->where($where);
		$where1 = '(prospect_tracking_master.nca_activity_type_id = 7 and prospect_tracking_master.tracking_date >= "'.$start_date.'" and prospect_tracking_master.tracking_date <= "'.$end_date.'")';
		$this->db->where($where1);
		// $this->db->group_by('prospect_tracking_prospect_relation.company_contact_id', 4);
		// $this->db->having('count(attendance) >', 2);
		$workshop_query = $this->db->get();
		$total_workshop_prospects = $workshop_query->num_rows();

		return $total_workshop_prospects;

    }

    public function get_spoc_wise_workshop_participant_list($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		// if($role_id ==2){
		// 	$where = ['participant_master.entity_id >' => 0];
			
		// }elseif ($role_id ==3) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }elseif ($role_id ==4) {
			
		// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }


		$this->db->select('sparrow_employee_master.first_name,count(*) as count');
		$this->db->from('prospect_tracking_master');
		$this->db->join('prospect_tracking_prospect_relation','prospect_tracking_prospect_relation.prospect_tracking_id = prospect_tracking_master.entity_id','inner');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = prospect_tracking_master.sparrow_employee_id','inner');
		// $this->db->where($where);
		$where1 = '(prospect_tracking_master.nca_activity_type_id = 7 and prospect_tracking_master.tracking_date >= "'.$start_date.'" and prospect_tracking_master.tracking_date <= "'.$end_date.'")';
		$this->db->where($where1);
		$this->db->group_by('prospect_tracking_master.sparrow_employee_id');
		// $this->db->having('count(attendance) >', 2);
		$spoc_workshop_query = $this->db->get();
		$spoc_workshop_list = $spoc_workshop_query->result();

		return $spoc_workshop_list;

    }

    public function get_participants($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		 $sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2 || $role_id ==4){
			$where = ['participant_master.entity_id >' => 0];
			
		}elseif ($role_id ==3) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		 }
		//elseif ($role_id ==4) {
			
		//     $where = ['company_master.spoc_id' => $sparrow_employee_id];
		// }


		$this->db->select('*');
		$this->db->from('participant_master');
		$this->db->join('company_master','company_master.entity_id = participant_master.company_id','inner');
		$this->db->where($where);
		$where1 = '(participant_master.leaving_date >= "'.$end_date.'" or participant_master.leaving_date = "")';
		$this->db->where($where1);
	
		$participant_query = $this->db->get();
		$total_participants = $participant_query->num_rows();
		//echo $this->db->last_query();die();
		return $total_participants;

    }

    public function get_batches($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['participant_master.entity_id >' => 0];
			
		}elseif ($role_id ==3) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}elseif ($role_id ==4) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}


		$this->db->select('*');
		$this->db->from('batch_master');
		$this->db->where('status',1);
		$batch_query = $this->db->get();
		$total_batches = $batch_query->num_rows();

		return $total_batches;

    }

    public function get_monthly_hours($month)
    {
		$session_data = $this->session->userdata();
		
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['entity_id >' => 0 , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
			
		}elseif ($role_id ==3) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
		}elseif ($role_id ==4) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
		}


        $this->db->select('SEC_TO_TIME( SUM( TIME_TO_SEC( `duration` ) ) ) AS hours'); 
		$this->db->from('worklog_master');
		$this->db->where($where);
		$hours_query = $this->db->get();
		$hours = $hours_query->row()->hours;

		return $hours;

    }

		public function get_coaching_program_list()
		{
			$this->db->select('*');
			$this->db->from('coaching_program_master');
			//$this->db->join('','','');
			//$where = '(entity_id = '.1.')';
			//$this->db->where($where);
			$coaching_program_query = $this->db->get();
			//$query_num_rows = $coaching_program_query->num_rows();
			$coaching_program_list = $coaching_program_query->result();

			return $coaching_program_list;
		}

		public function get_participant_list()
		{
			$this->db->select('*');
			$this->db->from('participant_master');
			$this->db->join('subscription_master','subscription_master.entity_id = participant_master.subscription_id','left');
			//$where = '(entity_id = '.1.')';
			//$this->db->where($where);
			$participant_query = $this->db->get();
			//$query_num_rows = $participant_query->num_rows();
			$participant_list = $participant_query->result();

			return $participant_list;
		}

		public function get_coaching_program_wise_participant_list_till_month($month)
		{
			$session_data = $this->session->userdata();

			$role_type = $session_data['userType'];
			$role_id = $session_data['role_id'];
			$user_id = $session_data['user_id'];
	
			$start_date = date("Y-m-01", strtotime($month) );
			$end_date = date("Y-m-t",strtotime($month) );
	
			
	
			$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;
	
			if($role_id ==2 || $role_id ==4){
				$where = ['participant_master.entity_id >' => 0];
				
			}elseif ($role_id ==3) {
				
				$where = ['company_master.spoc_id' => $sparrow_employee_id];
			}
			// elseif ($role_id ==4) {
				
			// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
			// }

			
			$this->db->select('subscription_master.coaching_program_id,count(*) as count,coaching_program_master.coaching_program_name');
			$this->db->from('participant_master');
			$this->db->join('subscription_master','subscription_master.entity_id = participant_master.subscription_id','inner');
		$this->db->join('company_master','company_master.entity_id = participant_master.company_id','inner');
		$this->db->join('coaching_program_master','coaching_program_master.entity_id = subscription_master.coaching_program_id','inner');
			$this->db->where($where);
			$where1 = '(participant_master.leaving_date >= "'.$end_date.'" or participant_master.leaving_date = "")';//$where = '(entity_id = '.1.')';
			$this->db->where($where1);
			$this->db->group_by('subscription_master.coaching_program_id');
			$participant_query = $this->db->get();
			//$query_num_rows = $participant_query->num_rows();
			$coaching_program_wise_participant_list = $participant_query->result();

			return $coaching_program_wise_participant_list;
		}

		public function get_spoc_wise_renewal_list()
		{
			$session_data = $this->session->userdata();

			$role_type = $session_data['userType'];
			$role_id = $session_data['role_id'];
			$user_id = $session_data['user_id'];
	
			// $start_date = date("Y-m-01", strtotime($month) );
			// $end_date = date("Y-m-t",strtotime($month) );
	
			
	
			// $sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;
	
			// if($role_id ==2){
			// 	$where = ['participant_master.entity_id >' => 0];
				
			// }elseif ($role_id ==3) {
				
			// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
			// }elseif ($role_id ==4) {
				
			// 	$where = ['company_master.spoc_id' => $sparrow_employee_id];
			// }

			$this->db->select('*');
			$this->db->from('sparrow_employee_master');
			$sparrow_employee_query = $this->db->get();
			$sparrow_employee_list = $sparrow_employee_query->result();

			$renewal_summary = [];
			foreach ($sparrow_employee_list as $sparrow_employee) {
			
				$sparrow_employee_id = $sparrow_employee->entity_id;
				$sparrow_employee_name = $sparrow_employee->first_name;

			
			
		$this->db->select('*');
		$this->db->from('session_master');
		$this->db->join('session_participant_relation','session_participant_relation.session_id = session_master.entity_id','inner');
		$this->db->join('company_contact_master','company_contact_master.entity_id = session_participant_relation.company_contact_id','inner');
		$this->db->join('company_master','company_master.entity_id = company_contact_master.company_id','inner');
		// $this->db->where($where);
		$where1 = '(session_master.actionable_id = 3 and company_master.spoc_id = "'.$sparrow_employee_id.'")';
		$this->db->where($where1);
		$this->db->group_by('session_participant_relation.company_contact_id', 4);
		$this->db->having('count(attendance) >', 2);
		$session_query = $this->db->get();
		$total_renewals = $session_query->num_rows();

		if($total_renewals >0){
				$renewal_summary[$sparrow_employee_name] = $total_renewals;
		}
		}

		return $renewal_summary;
	}

		public function get_coaching_programwise_participant_list()
		{
			$this->db->select('subscription_master.coaching_program_id,count(*) as count');
			$this->db->from('participant_master');
			$this->db->join('subscription_master','subscription_master.entity_id = participant_master.subscription_id','inner');
			//$where = '(entity_id = '.1.')';
			$this->db->group_by('subscription_master.coaching_program_id');
			$participant_query = $this->db->get();
			//$query_num_rows = $participant_query->num_rows();
			$participant_list = $participant_query->result();

			return $participant_list;
		}

		public function get_employee_hours_list_for_month($month)
		{
		
			$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['worklog_master.entity_id >' => 0 , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
			
		}elseif ($role_id ==3) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
		}elseif ($role_id ==4) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id , 'worklog_date >=' => $start_date, 'worklog_date <=' => $end_date];
		}


		$this->db->select('sparrow_employee_master.first_name,SEC_TO_TIME( SUM( TIME_TO_SEC( `duration` ) ) ) AS hours');
		$this->db->from('worklog_master');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = worklog_master.sparrow_employee_id','inner');
		$this->db->where($where);
		$this->db->group_by('sparrow_employee_id');
		$employee_hours_query = $this->db->get();
		$employee_hours_list = $employee_hours_query->result();

		return $employee_hours_list;

		}

		public function get_coaching_programwise_approved_participant_list()
		{
			$this->db->select('subscription_master.coaching_program_id,count(*) as count');
			$this->db->from('participant_master');
			$this->db->join('subscription_master','subscription_master.entity_id = participant_master.subscription_id','inner');
			//$where = '(entity_id = '.1.')';
			$this->db->where('participant_master.validity',1);
			$this->db->group_by('subscription_master.coaching_program_id');
			$approved_participant_query = $this->db->get();
			//$query_num_rows = $approved_participant_query->num_rows();
			$approved_participant_list = $approved_participant_query->result();

			return $approved_participant_list;
		}

    public function get_monthly_group_sessions($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['session_date >=' => $start_date, 'session_date <=' => $end_date];
			
		}elseif ($role_id ==3) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id ];
		}elseif ($role_id ==4) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id ];
		}


    $this->db->select('count(distinct session_id) AS group_session_count'); 
		$this->db->from('session_master');
		$this->db->join('session_sparrow_employee_relation','session_sparrow_employee_relation.session_id = session_master.entity_id','inner');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = session_sparrow_employee_relation.sparrow_employee_id','inner');
		$this->db->where($where);
		$where1 = '(session_master.session_date >= "'.$start_date.'" and  session_master.session_date <= "'.$end_date.'" and session_master.actionable_id = 3)';
		$this->db->where($where1);
		$group_session_query = $this->db->get();
		$group_session_count = $group_session_query->row()->group_session_count;

		return $group_session_count;

    // $this->db->select('count(*) AS group_session_count'); 
		// $this->db->from('session_master');
		// $this->db->join('session_sparrow_employee_relation','session_sparrow_employee_relation.session_id = session_master.entity_id','inner');
		// $this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = session_sparrow_employee_relation.sparrow_employee_id','inner');
		// $this->db->where($where);
		// $where1 = '(session_master.session_date >= "'.$start_date.'" and  session_master.session_date <= "'.$end_date.'" and session_master.actionable_id = 3 and session_sparrow_employee_relation.responsibility_type = 1)';
		// $this->db->where($where1);
		// $this->db->group_by('session_sparrow_employee_relation.sparrow_employee_id');
		// $group_session_query = $this->db->get();
		// $employee_group_session_list = $group_session_query->result()->group_session_count;

		// return $employee_group_session_list;

    }

    public function get_employee_group_session_list_for_month($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['session_date >=' => $start_date, 'session_date <=' => $end_date];
			
		}elseif ($role_id ==3) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id ];
		}elseif ($role_id ==4) {
			
			$where = ['sparrow_employee_id' => $sparrow_employee_id ];
		}


    $this->db->select('sparrow_employee_master.first_name,count(*) AS group_session_count'); 
		$this->db->from('session_master');
		$this->db->join('session_sparrow_employee_relation','session_sparrow_employee_relation.session_id = session_master.entity_id','inner');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = session_sparrow_employee_relation.sparrow_employee_id','inner');
		$this->db->where($where);
		$where1 = '(session_master.session_date >= "'.$start_date.'" and  session_master.session_date <= "'.$end_date.'" and session_master.actionable_id = 3 and session_sparrow_employee_relation.responsibility_type = 1)';
		$this->db->where($where1);
		$this->db->group_by('session_sparrow_employee_relation.sparrow_employee_id');
		$group_session_query = $this->db->get();
		$employee_group_session_list = $group_session_query->result();

		return $employee_group_session_list;

    }

    public function get_employee_review_list_for_month($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$review_month = date("m", strtotime($month) );
		$review_year = date("Y",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['review_month' => $review_month, 'review_year' => $review_year];
			
		}elseif ($role_id ==3) {
			
			$where = ['reviewed_by' => $sparrow_employee_id , 'review_month' => $review_month, 'review_year' => $review_year];
		}elseif ($role_id ==4) {
			
			$where = ['reviewed_by' => $sparrow_employee_id , 'review_month' => $review_month, 'review_year' => $review_year];
		}


    $this->db->select('sparrow_employee_master.first_name,count(*) AS reviews'); 
		$this->db->from('performance_review_master');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = performance_review_master.reviewed_by','inner');
		$this->db->where($where);
		$this->db->group_by('performance_review_master.reviewed_by');
		$employee_review_query = $this->db->get();
		$employee_review_list = $employee_review_query->result();

		return $employee_review_list;

    }

    public function get_monthly_reviews($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$review_month = date("m", strtotime($month) );
		$review_year = date("Y",strtotime($month) );

		

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['entity_id >' => 0 , 'review_month' => $review_month, 'review_year' => $review_year];
			
		}elseif ($role_id ==3) {
			
			$where = ['reviewed_by' => $sparrow_employee_id , 'review_month' => $review_month, 'review_year' => $review_year];
		}elseif ($role_id ==4) {
			
			$where = ['reviewed_by' => $sparrow_employee_id , 'review_month' => $review_month, 'review_year' => $review_year];
		}


    $this->db->select('count(*) AS reviews'); 
		$this->db->from('performance_review_master');
		$this->db->where($where);
		$reviews_query = $this->db->get();
		$reviews = $reviews_query->row()->reviews;

		return $reviews;

    }

    public function get_employee_nca_conversion_list_for_month($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

	

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['company_master.entity_id >' => 0 ];
			
		}elseif ($role_id ==3) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}elseif ($role_id ==4) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}


    $this->db->select('sparrow_employee_master.first_name,count(*) AS conversion'); 
		$this->db->from('company_master');
		$this->db->join('participant_master','participant_master.company_id = company_master.entity_id','inner');
		$this->db->join('sparrow_employee_master','sparrow_employee_master.entity_id = company_master.spoc_id','inner');
		$this->db->where($where);
		$where1 = '(company_master.conversion_date >= "'.$start_date.'" and  company_master.conversion_date <= "'.$end_date.'" )';
		$this->db->where($where1);
		$this->db->group_by('company_master.spoc_id');
		$employee_nca_conversion_query = $this->db->get();
		$employee_nca_conversion_list = $employee_nca_conversion_query->result();

		return $employee_nca_conversion_list;

    }

    public function get_monthly_nca_conversion($month)
    {
		$session_data = $this->session->userdata();
		$role_type = $session_data['userType'];
		$role_id = $session_data['role_id'];
		$user_id = $session_data['user_id'];

		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

	

		$sparrow_employee_id = $this->db->get_where('user_login', ['entity_id' => $user_id])->row()->emp_id;

		if($role_id ==2){
			$where = ['company_master.entity_id >' => 0 ];
			
		}elseif ($role_id ==3) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}elseif ($role_id ==4) {
			
			$where = ['company_master.spoc_id' => $sparrow_employee_id];
		}


    $this->db->select('count(*) AS conversion'); 
		$this->db->from('company_master');
		$this->db->join('participant_master','participant_master.company_id = company_master.entity_id','inner');
		$this->db->where($where);
		$where1 = '(company_master.conversion_date >= "'.$start_date.'" and  company_master.conversion_date <= "'.$end_date.'" )';
		$this->db->where($where1);
		$nca_conversion_query = $this->db->get();
		$nca_conversion = $nca_conversion_query->row()->conversion;

		return $nca_conversion;

    }
}
?>
