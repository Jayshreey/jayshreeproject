<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Worklog_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('worklog_master_model');
        $this->load->library('session');
    }

    public function index()
	{
        $data['worklog_list'] = $this->worklog_master_model->get_worklog_list();
      
        $this->load->view('worklog/worklog_master/vw_worklog_master_index',$data);
    }
    public function index_all()
	{
        $data['batch_list'] = $this->worklog_master_model->get_batch_list();
        $data['coaching_program_list'] = $this->worklog_master_model->get_coaching_program_list();
        $data['prospect_list'] = $this->worklog_master_model->get_all_prospect_list();
      
        $this->load->view('worklog/worklog_master/vw_worklog_master_index_all',$data);
    }

    public function create_worklog()
    {
        $worklog_type = $this->uri->segment(2); // 1=internal  &  2=Externaml
        
		$data['prospect_list'] = $this->worklog_master_model->get_prospect_list();
        
		$data['actionable_list'] = $this->worklog_master_model->get_actionable_list();
        $data['session_template_list'] = $this->worklog_master_model->get_session_template_list();
        // $data['session_list'] = $this->worklog_master_model->get_session_list_by_date();
        $data['company_list'] = $this->worklog_master_model->get_company_list();
        $data['company_contact_list'] = $this->worklog_master_model->get_company_contact_list();
        $data['sparrow_employee_list'] = $this->worklog_master_model->get_sparrow_employee_list();
        $data['tracking_status_list'] = $this->worklog_master_model->get_tracking_status_list();
        $data['uom_list'] = $this->worklog_master_model->get_uom_list();
        $data['communication_type_list'] = $this->worklog_master_model->get_communication_type_list();
        $data['nca_activity_type_list'] = $this->worklog_master_model->get_nca_activity_type_list();
        $data['performance_review_parameter_list'] = $this->worklog_master_model->get_performance_review_parameter_list();
		$data['batch_list'] = $this->worklog_master_model->get_batch_list();
        $data['process_list'] = $this->worklog_master_model->get_process_list();
        $data['session_for_list'] = $this->worklog_master_model->get_session_for_list();
        $data['worklog_type'] = $worklog_type;

		// create past 12 mntsjh array
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		
		for ($i=0; $i > -12; $i--) { 
			$timestamp = strtotime ($i. "month",strtotime ($today_date));
			$nxt_month = date("M-Y",$timestamp);
			$row_month = date('Y-m-01',$timestamp);
			$month_array[$row_month]  = $nxt_month;
		}

		$data['month_array'] = $month_array;

       
       
        $this->load->view('worklog/worklog_master/vw_worklog_master_create',$data);
    }

	public function get_session_sparrow_employee_list()
	{
		$session_id = $this->input->post('session_id');
		$session_sparrow_employee_list = $this->worklog_master_model->get_session_sparrow_employee_array($session_id);
		$session_participant_list = $this->worklog_master_model->get_session_participant_array($session_id);
		$session_data['sparrow_employee'] = $session_sparrow_employee_list;
		$session_data['participant'] = $session_participant_list;

		echo json_encode($session_data);
	}

	public function get_group_session_list_by_date()
	{
		$session_date = $this->input->post('session_date');
	
		$session_list = $this->worklog_master_model->get_group_session_list_by_date($session_date);
		
		

		echo json_encode($session_list);
	}

	public function get_review_list_by_company()
	{
		
		$company_id = $this->input->post('company_id');
	
		$review_list = $this->worklog_master_model->get_review_list_by_company($company_id);

		echo json_encode($review_list);
	}

	
	public function save_worklog()
	{

		$worklog_date = $this->input->post('worklog_date');
		$sparrow_employee_id = $this->input->post('sparrow_employee_id');
		$worklog_type = $this->input->post('worklog_type');
		$worklog_medium = $this->input->post('worklog_medium');
		$actionable_id = $this->input->post('actionable_id');
		$responsibility_type = $this->input->post('responsibility_type');
		$worklog_description = $this->input->post('worklog_description');
		$hours = $this->input->post('hours');
		$minutes = $this->input->post('minutes');
      
		$session_id = $this->input->post('session_id');
		

		
		
		//actionable = NCA
		$prospect_list = $this->input->post('prospect_id');
		
		$nca_activity_type_id = $this->input->post('nca_activity_type_id');
		//$nca_activity_result_id = $this->input->post('nca_activity_result_id');
		$paid_activity = $this->input->post('paid_activity');
		$next_action = $this->input->post('next_action');
		$next_action_date = $this->input->post('next_action_date');
		$tracking_description = $this->input->post('tracking_description');
        $remark = $this->input->post('remark');

		//Save prospect tracking
		$prospect_tracking_insert_array = array(
			'tracking_date' => $worklog_date,
			'sparrow_employee_id' => $sparrow_employee_id,
			'tracking_source_type' => 1, // for worklog
			'nca_activity_type_id' => $nca_activity_type_id,
			//'nca_activity_result_id' => $nca_activity_result_id,
			'paid_activity' => $paid_activity,
			'tracking_description' => $tracking_description,
			'next_action' => $next_action,
			'next_action_date' => $next_action_date,
            'remark' => $remark,
           
		);

		$prospect_tracking_id = $this->worklog_master_model->save_prospect_tracking($prospect_tracking_insert_array);

		//save prospect in prospect relation

		foreach ($prospect_list as $key => $prospect) {

            $prospect_master_update_array = array(
				'conversion_stage' => '4',
                'remark' => $remark
			);
			$this->worklog_master_model->update_prospect_master($prospect,$prospect_master_update_array);
             
			$prospect_tracking_relation_insert_array = array(
				'prospect_tracking_id' => $prospect_tracking_id,
				'prospect_id' => $prospect,
			);
			$this->worklog_master_model->save_prospect_tracking_relation($prospect_tracking_relation_insert_array);
             
		}

		#End of Prospect Tracking Saving
		//----------x--------------------x----------//

		#actionable = facilitation Session or facilitatio assistant session

		if($actionable_id == 3 || $actionable_id ==4){

		$session_id = $this->input->post('session_id');

		if($session_id == 0) {

				$batch_id = $this->input->post('batch_id');
				$session_name = $this->input->post('session_name');
				$session_date = $this->input->post('worklog_date');
				$session_type_id = $this->input->post('session_type_id');
				$session_for = $this->input->post('session_for');
				$facilitator_id = $this->input->post('facilitator_id');
				$bh_id = $this->input->post('bh_id');
				$process_id = $this->input->post('process_id');
				$topic = $this->input->post('topic');
				$medium = $this->input->post('worklog_medium');
				$remark = $this->input->post('remark');
				$session_template_id = $this->input->post('session_template_id');

				$session_insert_array = array(
					'batch_id' => $batch_id,
					'session_date' => $session_date,
					'session_name' => $session_name,
					'session_type_id' => $session_type_id,
					'session_for' => $session_for,
					'facilitator_id' => $facilitator_id,
					'bh_id' => $bh_id,
					'process_id' => $process_id,
					'topic' => $topic,
					'medium' => $medium,
					'session_template_id' => $session_template_id,
					'remark' => $remark
				);



				$session_id = $this->worklog_master_model->save_session($session_insert_array);

				//save participants in sassion

				if ($batch_id) {
					$participant_list = $this->worklog_master_model->get_participant_list_by_batch_id($batch_id);


					foreach ($participant_list as $key => $value) {
						$session_participant_insert_array = array(
							'session_id' => $session_id,
							'company_contact_id' => $value->company_contact_id,
							'attendance' => 1
						);

						$this->worklog_master_model->save_session_participant($session_participant_insert_array);
					}
				}
				
			}else{
				$session_update_array = array(
					'medium' => $worklog_medium
				);
			
				$result = $this->worklog_master_model->update_session($session_id,$session_update_array);
			}


			// save sparrow employe in saession

			if ($sparrow_employee_id) {

				$this->db->select('*');
				$this->db->from('session_sparrow_employee_relation');
				$where = '(sparrow_employee_id = "'.$sparrow_employee_id.'" and session_id = "'.$session_id.'"  )';
				$this->db->where($where);
				$session_employee_query = $this->db->get();
				$session_employee_num_rows = $session_employee_query->num_rows();

				if($session_employee_num_rows ==0){


				$session_sparrow_employee_insert_array = array(
					'session_id' => $session_id,
					'sparrow_employee_id' => $sparrow_employee_id,
					'responsibility_type' => $responsibility_type
				);

				$this->worklog_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
			}
			}

			

	}

		#End of Facilitation Session Saving
		#----------x--------------------x----------#



		//actionable = Practice Session or assistance session
	
	if($actionable_id == 8 || $actionable_id ==10){
			// $session_name = $this->input->post('session_name');
			// $session_date = $this->input->post('session_date');
			$session_type_id = $this->input->post('practice_session_type_id');
			$topic = $this->input->post('practice_topic');
			$worklog_medium = $this->input->post('worklog_medium');
			$remark = $this->input->post('remark');

			$session_insert_array = array(
				'session_date' => $worklog_date,
				// 'session_name' => $session_name,
				'session_type_id' => $session_type_id,
				'actionable_id' => $actionable_id,
				'topic' => $topic,
				'medium' => $worklog_medium,
				'status' => 1
			);
	
			$session_id = $this->worklog_master_model->save_session($session_insert_array);

			// save soparrow enmploee in session
			
	
			if($sparrow_employee_id){
				$session_sparrow_employee_insert_array = array(
					'session_id' => $session_id,
					'sparrow_employee_id' => $sparrow_employee_id,
					'responsibility_type' => 1,
				);
	
				$this->worklog_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
			}
		}

		#End of Practice Session Saving
		//----------x----------x----------x----------//

		#actionable = Performance Review

		$performance_review_id = $this->input->post('review_id');
		$company_id = $this->input->post('company_id');
		$company_contact_id = $this->input->post('company_contact_id');
		$suggestion_array = $this->input->post('suggestion');
	

		##Part 3 save performance_review_suggestion_relation

		if(!$performance_review_id){

		$worklog_year = date('Y', strtotime($worklog_date)); 
		$worklog_month = date('m', strtotime($worklog_date)); 

			$performance_review_insert_array = array(
				'reviewed_by' => $sparrow_employee_id,
				'company_id' => $company_id,
				'review_month' => $worklog_month,
				'review_year' => $worklog_year
			);

			$performance_review_id = $this->worklog_master_model->save_performance_review($performance_review_insert_array);
		}

		foreach($suggestion_array as $suggestion){

			$suggestion_insert_array = array(
				'performance_review_id' => $performance_review_id,
				'company_contact_id' => $company_contact_id,
				'suggestion' => $suggestion,
				'status' => 1
			);

			$this->worklog_master_model->save_suggestion($suggestion_insert_array);

		}
		
		 // Format hours and minutes into time format
		 $duration = sprintf('%02d:%02d:00', $hours, $minutes); // Format as HH:MM:SS
         $current_date = date('Y-m-d');
		$worklog_insert_array = array(
			'worklog_date' => $worklog_date,
			'sparrow_employee_id' => $sparrow_employee_id,
			'worklog_type' => $worklog_type,
			'worklog_medium' => $worklog_medium,
			'actionable_id' => $actionable_id,
			'session_id' => $session_id,
			'prospect_tracking_id' => $prospect_tracking_id,
			'performance_review_id' => $performance_review_id,
			'worklog_description' => $worklog_description,
			'duration' => $duration,
            'created_date'=> $current_date
		);

		$worklog_id = $this->worklog_master_model->save_worklog($worklog_insert_array);

		
			redirect('edit_worklog/'.$worklog_id);
		
	}

	public function create_session_from_worklog()
	{
		$session_template_id = $this->input->post('session_template_id');
		$session_for = $this->input->post('session_for');
		$process_id = $this->input->post('process_id');
		$topic = $this->input->post('topic');
		$worklog_date = $this->input->post('worklog_date');
		$batch_id = $this->input->post('batch_id');
		$session_type_id = $this->input->post('session_type_id');
		$worklog_medium = $this->input->post('worklog_medium');
		$session_objective = $this->input->post('session_objective');
		

		$actionable_id = $this->input->post('actionable_id');
		$responsibility_type = $this->input->post('responsibility_type');
		$sparrow_employee_id = $this->input->post('sparrow_employee_id');


		$session_insert_array = array(
			'actionable_id' => $actionable_id,
			'session_template_id' => $session_template_id,
			'batch_id' => $batch_id,
			'session_date' => $worklog_date,
			'session_objective' => $session_objective,
			'session_type_id' => $session_type_id,
			'session_for' => $session_for,
			'process_id' => $process_id,
			'topic' => $topic,
			'medium' => $worklog_medium,
			'status' => 1
		);

		$session_id = $this->worklog_master_model->save_session($session_insert_array);

		//save participants in session

		if ($batch_id) {
			$participant_list = $this->worklog_master_model->get_participant_list_by_batch_id($batch_id);


			foreach ($participant_list as $key => $value) {
				$session_participant_insert_array = array(
					'session_id' => $session_id,
					'company_contact_id' => $value->company_contact_id,
					'attendance' => 1
				);

				$this->worklog_master_model->save_session_participant($session_participant_insert_array);
			}
		}

		// save sparrow employe in saession

		if ($sparrow_employee_id) {

			$this->db->select('*');
			$this->db->from('session_sparrow_employee_relation');
			$where = '(sparrow_employee_id = "' . $sparrow_employee_id . '" and session_id = "' . $session_id . '"  )';
			$this->db->where($where);
			$session_employee_query = $this->db->get();
			$session_employee_num_rows = $session_employee_query->num_rows();

			if ($session_employee_num_rows == 0) {

				$session_sparrow_employee_insert_array = array(
					'session_id' => $session_id,
					'sparrow_employee_id' => $sparrow_employee_id,
					'responsibility_type' => $responsibility_type
				);

				$this->worklog_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
			}
		}

		echo json_encode($session_id);
	}

	public function create_review_from_worklog()
	{
		$company_id = $this->input->post('company_id');
		$review_month = $this->input->post('review_month');
		$reviewed_by = $this->input->post('reviewed_by');

		
		

		$year = date('Y', strtotime($review_month)); 
		$month = date('m', strtotime($review_month)); 


		##Part 1 save performance_review_master
		$performance_review_insert_array = array(
			'company_id' => $company_id,
			'reviewed_by' => $reviewed_by,
			'review_month' => $month,
			'review_year' => $year
		);

		$performance_review_id = $this->worklog_master_model->save_performance_review($performance_review_insert_array);

		##Part 2 save performance_review_relation

		$parameter_list = $this->worklog_master_model->get_performance_review_parameter_list();

foreach($parameter_list as $parameter){
	$slug = $parameter->slug;
	
			$parameter_id = $parameter->entity_id;
			$performance_data = [];
			$value = $this->input->post($slug.'_parameter_value');
			$uom = $this->input->post($slug.'_uom');
			$value_for = $this->input->post($slug.'_value_for');

			$performance_review_relation_insert_array = array(
				'performance_review_id' => $performance_review_id,
				'parameter_id' => $parameter_id,
				'value' => $value,
				'uom' => $uom,
				'value_for' => $value_for
			);

			$performance_data[$parameter_id] = $performance_review_relation_insert_array;


			$this->worklog_master_model->save_performance_review_relation($performance_review_relation_insert_array);

		}

	

		echo json_encode($performance_review_id);
	}

	public function edit_worklog_bk()
    {
        $worklog_id = $this->uri->segment(2);
        $data['worklog_id'] = $worklog_id;
       
		$data['session_list'] = $this->worklog_master_model->get_session_list();
        $data['sparrow_employee_list'] = $this->worklog_master_model->get_sparrow_employee_list();
        $data['actionable_list'] = $this->worklog_master_model->get_actionable_list();
        $this->load->view('worklog/worklog_master/vw_worklog_master_edit',$data);
    }


	public function save_session_in_worklog()
    {
        
		 $worklog_id = $this->input->post('worklog_id');
		 $session_name = $this->input->post('session_name');
		 $session_date = $this->input->post('session_date');
		 $topic = $this->input->post('topic');
		 $sub_topic = $this->input->post('sub_topic');
		 $medium = $this->input->post('medium');
		 $session_type = $this->input->post('session_type');
		 $stage = $this->input->post('stage');
		 $remark = $this->input->post('remark');
		 $sparrow_employee_checkbox = $this->input->post('sparrow_employee_checkbox');

		 //save session

		 $session_insert_array = array(
			'session_name'=> $session_name,
			'session_date'=> $session_date,
			'topic'=> $topic,
			'sub_topic'=> $sub_topic,
			'medium'=> $medium,
			'session_type'=> $session_type,
			'stage'=> $stage,
			'remark'=> $remark,
			'status'=> 1
		 );

		 $session_id = $this->worklog_master_model->save_session($session_insert_array);
		 
		 //save session sparrow employee relation

		 foreach($sparrow_employee_checkbox as $sparrow_employee){
			$sparrow_employee_id = $sparrow_employee;
			
			$session_sparrow_employee_insert_array = array(
				'session_id' => $session_id,
				'sparrow_employee_id' => $sparrow_employee_id
			) ;
			$this->worklog_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
		 }

		 //update worklog with session_id

		 $worklog_update_array = array(
			'session_id' => $session_id
		 );

		 $this->worklog_master_model->update_worklog($worklog_id,$worklog_update_array);

		 echo true;
    }

	
	public function edit_worklog()
    {
        $worklog_id = $this->uri->segment(2);
        $data['worklog_id'] = $worklog_id;

		$worklog_details = $this->worklog_master_model->get_worklog_details_by_id($worklog_id);

		$session_id = $worklog_details->session_id;
		$performance_review_id = $worklog_details->performance_review_id;
		$prospect_tracking_id = $worklog_details->prospect_tracking_id;
        $data['session_id'] = $session_id;

       
        $data['sparrow_employee_list'] = $this->worklog_master_model->get_sparrow_employee_list();
        $data['session_participant_list'] = $this->worklog_master_model->get_session_participant_list($session_id);
        $data['session_sparrow_employee_list'] = $this->worklog_master_model->get_session_sparrow_employee_list($session_id);
        $data['actionable_list'] = $this->worklog_master_model->get_actionable_list();

		$data['prospect_list'] = $this->worklog_master_model->get_prospect_list();
		$data['actionable_list'] = $this->worklog_master_model->get_actionable_list();
        $data['session_list'] = $this->worklog_master_model->get_session_list();
        $data['company_contact_list'] = $this->worklog_master_model->get_company_contact_list();
        $data['sparrow_employee_list'] = $this->worklog_master_model->get_sparrow_employee_list();
        $data['tracking_status_list'] = $this->worklog_master_model->get_tracking_status_list();
        $data['uom_list'] = $this->worklog_master_model->get_uom_list();
        $data['communication_type_list'] = $this->worklog_master_model->get_communication_type_list();
        $data['performance_review_list'] = $this->worklog_master_model->get_performance_review_list_by_id($performance_review_id);
        $data['performance_review_suggestion_list'] = $this->worklog_master_model->get_performance_review_suggestion_list_by_id($performance_review_id);
        $data['performance_review_parameter_list'] = $this->worklog_master_model->get_performance_review_parameter_list();
		$data['batch_list'] = $this->worklog_master_model->get_batch_list();
        $data['process_list'] = $this->worklog_master_model->get_process_list();
        $data['prospect_tracking_list'] = $this->worklog_master_model->get_prospect_tracking_list($prospect_tracking_id);
		$data['coaching_program_list'] = $this->worklog_master_model->get_coaching_program_list();
        $data['participant_role_list'] = $this->worklog_master_model->get_participant_role_list();



        $this->load->view('worklog/worklog_master/vw_worklog_master_edit',$data);
    }

	public function update_worklog()
	{

		$worklog_id = $this->input->post('pop_up_worklog_id');
        $worklog_medium = $this->input->post('pop_up_worklog_medium');
		$worklog_description = $this->input->post('pop_up_worklog_description');
		$hours = $this->input->post('pop_up_hours');
		$minutes = $this->input->post('pop_up_minutes');
				
		// Format hours and minutes into time format
		$duration = sprintf('%02d:%02d:00', $hours, $minutes); // Format as HH:MM:SS

		$worklog_update_array = array(
			'worklog_medium' => $worklog_medium,
			'worklog_description' => $worklog_description,
			'duration' => $duration
		);

		 $this->worklog_master_model->update_worklog($worklog_id,$worklog_update_array);

		 redirect('edit_worklog/'.$worklog_id);
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
		   $this->worklog_master_model->save_session_sparrow_employee($session_sparrow_employee_insert_array);
		   }
		}
	}

	
	public function add_participant_in_session()
	{
		
		$session_id = $this->input->post('session_id');
		$company_contact_checkbox = $this->input->post('company_contact_checkbox');
		
		//save session sparrow employee relation

		foreach($company_contact_checkbox as $company_contact){
		   $company_contact_id = $company_contact;

		   //check if participant already exist in session

		   $this->db->select('*');
		   $this->db->from('session_participant_relation');
		   $where = '(company_contact_id = "'.$company_contact_id.'" and session_id = "'.$session_id.'" )';
		   $this->db->where($where);
		   $session_query = $this->db->get();
		   $session_num_rows = $session_query->num_rows();

		   if($session_num_rows == 0){
		   
		   $session_participant_insert_array = array(
			   'session_id' => $session_id,
			   'company_contact_id' => $company_contact_id,
			   'attendance' => 1,
		   ) ;
		   $this->worklog_master_model->save_session_participants($session_participant_insert_array);
		   }
		}

		return true;
	}

	public function vw_attendance_master() {

        $attendance_month = $this->uri->segment(2);

		// create past 12 mntsjh array
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		
		for ($i=0; $i > -12; $i--) { 
			$timestamp = strtotime ($i. "month",strtotime ($today_date));
			$nxt_month = date("M-Y",$timestamp);
			$row_month = date('Y-m-01',$timestamp);
			$month_array[$row_month]  = $nxt_month;
		}

		$data['month_array'] = $month_array;
		$data['attendance_month'] = $attendance_month;

        $data['sparrow_employee_list'] = $this->worklog_master_model->get_sparrow_employee_list();

        $this->load->view('worklog/attendance_master/vw_attendance_master_index',$data);


	}

	public function create_participant_attendance() {

        $batch_id = $this->input->post('batch_id');
        $months = $this->input->post('months');

        $actionable_id = $this->uri->segment(2);

		// create past 12 mntsjh array
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		

			for($i = 0; $i > -12; $i--) {
			$timestamp = strtotime($i . "month", strtotime($today_date));
			$nxt_month = date("M-Y", $timestamp);
			$row_month = date('Y-m-01', $timestamp);

			$month_array[$row_month]  = $nxt_month;
		}

		$data['month_array'] = $month_array;
		

        $data['batch_list'] = $this->worklog_master_model->get_batch_list();
        $data['external_actionable_list'] = $this->worklog_master_model->get_external_actionable_list();

        $this->load->view('worklog/attendance_master/vw_participant_attendance_master_create',$data);


	}

	public function generate_participant_attendance() {

        $batch_id = $this->input->post('batch_id');
        $months = $this->input->post('months');

		

		// create past 12 mntsjh array
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		

			for($i = 0; $i > -12; $i--) {
			$timestamp = strtotime($i . "month", strtotime($today_date));
			$nxt_month = date("M-Y", $timestamp);
			$row_month = date('Y-m-01', $timestamp);

			$month_array[$row_month]  = $nxt_month;
		}


		//get group session dates as per selected months

		$session_data = [];
		$participant_data = [];
		$selected_months = [];
		foreach ($months as $month) {
		
		$start_date = date("Y-m-01", strtotime($month) );
		$end_date = date("Y-m-t",strtotime($month) );

		$this->db->select('session_master.*');
		$this->db->from('session_master');
        $this->db->join('worklog_master', 'worklog_master.session_id = session_master.entity_id', 'inner');
		$where = '(session_master.session_date >= "'.$start_date.'" and session_master.session_date <= "'.$end_date.'" and session_master.actionable_id = 3 and session_master.batch_id = "'.$batch_id.'")';
		$this->db->where($where);

		$session_query = $this->db->get();
        
		$session_list = $session_query->result();

		foreach ($session_list as $key => $value) {
			$session_data[$value->entity_id] =$value->session_date;
			// $session_data['session_date'] =$value->session_date;
		}

		

		//get batchwise and sessionwise participant list

		$this->db->select('company_contact_master.*,concat(company_contact_master.first_name," ",company_contact_master.last_name)as participant_name,company_master.company_name');
		$this->db->from('session_master');
        //$this->db->join('worklog_master', 'worklog_master.session_id = session_master.entity_id', 'inner');
		$this->db->join('session_participant_relation','session_participant_relation.session_id = session_master.entity_id','inner');
        $this->db->join('company_contact_master', 'company_contact_master.entity_id = session_participant_relation.company_contact_id', 'inner');
        $this->db->join('company_master', 'company_master.entity_id = company_contact_master.company_id', 'INNER');
		$where = '(session_date >= "'.$start_date.'" and session_date <= "'.$end_date.'" and session_master.actionable_id = 3 and batch_id = "'.$batch_id.'")';
		$this->db->where($where);
		$session_query1 = $this->db->get();
		$participant_list = $session_query1->result();


		foreach ($participant_list as $key2 => $value2) {
			$participant_data[$value2->entity_id] = [$value2->participant_name,$value2->company_name];
			// $session_data['session_date'] =$value->session_date;
		}

		// create selecetd months array
		$selected_months[] = $start_date;


	}
		$data['session_data'] = $session_data;
		$data['batch_id'] = $batch_id;
		$data['selected_months'] = $selected_months;
		$data['month_array'] = $month_array;
        $data['batch_list'] = $this->worklog_master_model->get_batch_list();
        $data['participant_data'] = $participant_data;
        $data['external_actionable_list'] = $this->worklog_master_model->get_external_actionable_list();

        $this->load->view('worklog/attendance_master/vw_participant_attendance_master_index',$data);


	}

    public function create_participant()
    {
        $data['state_list'] = $this->worklog_master_model->get_state_list();
        $data['company_list'] = $this->worklog_master_model->get_company_list();
        $data['spoc_list'] = $this->worklog_master_model->get_spoc_list();
        $data['source_list'] = $this->worklog_master_model->get_source_list();
        $this->load->view('worklog/worklog_master/vw_worklogant_master_create',$data);
    }

    public function get_session_details_by_id()
    {
        $session_id = $this->input->post('session_id',TRUE);
        $sesion_details = $this->worklog_master_model->get_session_details_by_id($session_id);
         echo json_encode($sesion_details);
    }

    public function get_performance_review_details_by_id()
    {
        $performance_review_id = $this->input->post('performance_review_id',TRUE);
        $performance_review_details = $this->worklog_master_model->get_performance_review_details_by_id($performance_review_id);
         echo json_encode($performance_review_details);
    }

    public function get_prospect_tracking_details_by_id()
    {
        $prospect_tracking_id = $this->input->post('prospect_tracking_id',TRUE);
        $prospect_tracking_details = $this->worklog_master_model->get_prospect_tracking_details_by_id($prospect_tracking_id);
         echo json_encode($prospect_tracking_details);
    }
    public function get_city_name()
    {
        $state_id = $this->input->post('id',TRUE);
        $data = $this->worklog_master_model->get_city_model_data($state_id)->result();
         echo json_encode($data);
    }

    public function check_customer_name()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $customer_name = $this->input->post('id');
            $data = $this->worklog_master_model->check_customer_name_model($customer_name);
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

		$customer_id = $this->worklog_master_model->save_company($customer_array);

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
        $data['company_details'] = $this->worklog_master_model->get_company_details($company_id);
        $data['participant_list'] = $this->worklog_master_model->get_participant_list_by_company_id($company_id);

        
          
        $data['spoc_list'] = $this->worklog_master_model->get_spoc_list();
        $data['source_list'] = $this->worklog_master_model->get_source_list();
        $data['state_list'] = $this->worklog_master_model->get_state_list();
        $data['city_list'] = $this->worklog_master_model->get_city_list();
        $this->load->view('worklog/worklog_master/vw_worklogmaster_edit',$data);
    }

    public function get_worklog_details_by_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $worklog_id = $this->input->post('worklog_id');
            $worklog_details = $this->worklog_master_model->get_worklog_details_by_id($worklog_id);
            echo json_encode($worklog_details);
        }
    }

    public function get_session_template_details_by_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $session_template_id = $this->input->post('session_template_id');
            $session_template_details = $this->worklog_master_model->get_session_template_details_by_id($session_template_id);
            echo json_encode($session_template_details);
        }
    }

    public function get_actionable_list_by_worklog_type()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $worklog_type = $this->input->post('worklog_type');
            $actionable_list = $this->worklog_master_model->get_actionable_list_by_worklog_type($worklog_type);

            echo json_encode($actionable_list);
        }
    }

    public function get_company_contact_person_list_by_company_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $company_id = $this->input->post('company_id');
            $company_contact_list = $this->worklog_master_model->get_company_contact_person_list_by_company_id($company_id);

            echo json_encode($company_contact_list);
        }
    }

    public function get_nca_activity_result_list_by_activity_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $nca_activity_type_id = $this->input->post('nca_activity_type_id');
            $nca_activity_result_list = $this->worklog_master_model->get_nca_activity_result_list_by_activity_id($nca_activity_type_id);

            echo json_encode($nca_activity_result_list);
        }
    }

    public function get_batch_list_by_coaching_program_type()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $coaching_program_type_id = $this->input->post('coaching_program_type_id');
            $batch_list = $this->worklog_master_model->get_batch_list_by_coaching_program_type($coaching_program_type_id);

            echo json_encode($batch_list);
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


		$participant_id = $this->worklog_master_model->save_participant($participant_insert_array);

		
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
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_city()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $city_id = $this->input->post('city_id');

        $update_array = array('entity_id' => $entity_id,'city_id' => $city_id);
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_address()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $address = $this->input->post('address');

        $update_array = array('entity_id' => $entity_id,'address' => $address);
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_pincode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $pin_code = $this->input->post('pin_code');

        $update_array = array('entity_id' => $entity_id,'pin_code' => $pin_code);
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_statecode()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $state_code = $this->input->post('state_code');

        $update_array = array('entity_id' => $entity_id,'state_code' => $state_code);
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

    public function update_gstnumber()
    {
        $entity_id = $this->input->post('cust_entity_id');
        $gst_no = $this->input->post('gst_no');

        $update_array = array('entity_id' => $entity_id,'gst_no' => $gst_no);
        $data = $this->worklog_master_model->update_address_relation($update_array);

        echo json_encode($data);
    }

   
    public function update_contactperson()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_person = $this->input->post('contact_person');

        $update_array = array('entity_id' => $entity_id,'contact_person' => $contact_person);
        $data = $this->worklog_master_model->update_contact_relation($update_array);

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
        $data = $this->worklog_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_emailid()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $email_id = $this->input->post('email_id');

        $update_array = array('entity_id' => $entity_id,'email_id' => $email_id);
        $data = $this->worklog_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_contactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $contact_no = $this->input->post('contact_no');

        $update_array = array('entity_id' => $entity_id,'first_contact_no' => $contact_no);
        $data = $this->worklog_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_alternatecontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $alternate_contact_no = $this->input->post('alternate_contact_no');

        $update_array = array('entity_id' => $entity_id,'second_contact_no' => $alternate_contact_no);
        $data = $this->worklog_master_model->update_contact_relation($update_array);

        echo json_encode($data);
    }

    public function update_whatsupcontactnumber()
    {
        $entity_id = $this->input->post('contact_entity_id');
        $whatsup_contact_no = $this->input->post('whatsup_contact_no');

        $update_array = array('entity_id' => $entity_id,'whatsup_no' => $whatsup_contact_no);
        $data = $this->worklog_master_model->update_contact_relation($update_array);

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
        // $data = $this->worklog_master_model->update_customer_master($update_array);

        $this->db->where('entity_id', $entity_id);
        $this->db->update('customer_master', $update_array);

        redirect('vw_customer_master');
    }

    public function update_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_contact_details'] = $this->worklog_master_model->get_customer_only_contact_details($entity_id);
        $data['state_list'] = $this->worklog_master_model->get_state_list();
        $data['city_list'] = $this->worklog_master_model->get_city_list();

        $this->load->view('worklog/worklog_master/vw_worklog_master_update',$data);
    }

    public function view_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data['entity_id'] = $entity_id;
        $data['customer_details'] = $this->worklog_master_model->get_customer_address_details($entity_id);

                $this->db->select('*');
                $this->db->from('customer_contact_master');
                //$this->db->join('','','');
                // $where = '(customer_id = "'.$entity_id);
                $this->db->where('customer_id',$entity_id);
                $this->db->limit(1);
                $address_query = $this->db->get();
                //$query_num_rows = $query->num_rows();
                $address_details = $address_query->row();
        
        $data['source_list'] = $this->worklog_master_model->get_source_list();
        $data['address_details'] = $address_details;
        $data['customer_type_list'] = $this->worklog_master_model->get_customer_types();
        $data['state_list'] = $this->worklog_master_model->get_state_list();
        $data['city_list'] = $this->worklog_master_model->get_city_list();
        $data['spoc_list'] = $this->worklog_master_model->get_spoc_list();
        $this->load->view('worklog/worklog_master/vw_worklog_master_view',$data);
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
            $data = $this->worklog_master_model->get_state_code_by_state_id($state_id);
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
            $data = $this->worklog_master_model->get_state_id_data($entity_id)->result();
            echo json_encode($data);
        }
    }

    public function soft_delete_customer_master()
    {
        $entity_id = $this->uri->segment(2);
        $data = $this->worklog_master_model->soft_delete_worklog_master_model($entity_id);
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
