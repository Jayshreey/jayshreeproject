<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coaching_program_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('coaching_program_master_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['coaching_program_list'] = $this->coaching_program_master_model->get_coaching_program_list();
        $this->load->view('participants/coaching_program_master/vw_coaching_program_master_index',$data);
    }

   public function create()
    {
        $data['coaching_program_type_list'] = $this->coaching_program_master_model->get_coaching_program_type_list();


       
        $this->load->view('participants/coaching_program_master/vw_coaching_program_master_create',$data);
    }

	
	public function save_coaching_program_details()
	{
        $coaching_program_name = $this->input->post('coaching_program_name');
        $remark = $this->input->post('remark');
       
		$coaching_program_insert_array = array(
			
			'coaching_program_name' => $coaching_program_name,
			'remark' => $remark,
			'status' => 1
		);


		$coaching_program_id = $this->coaching_program_master_model->save_coaching_program($coaching_program_insert_array);

		//pre-fill coaching program deliverable relations

		$deliverable_list = $this->coaching_program_master_model->get_deliverable_list();

		foreach($deliverable_list as $deliverable){

			$coaching_program_deliverable_insert_array = array(
				'coaching_program_id' => $coaching_program_id,
				'deliverable_id' => $deliverable->entity_id,
				'value_type' => $deliverable->value_type,
				'uom_id' => $deliverable->uom_id
			);

		$this->coaching_program_master_model->save_coaching_program_deliverable($coaching_program_deliverable_insert_array);
			

		}

		
		redirect('edit_coaching_program_master/'.$coaching_program_id);
		
	}

	
    public function edit_coaching_program_master()
    {
        $coaching_program_id = $this->uri->segment(2);
        $data['coaching_program_id'] = $coaching_program_id;
        $data['coaching_program_details'] = $this->coaching_program_master_model->get_coaching_program_details($coaching_program_id);
        $data['coaching_program_type_list'] = $this->coaching_program_master_model->get_coaching_program_type_list();
        $data['assignment_list'] = $this->coaching_program_master_model->get_assignment_list();
        $data['coaching_program_assignment_list'] = $this->coaching_program_master_model->get_coaching_program_assignment_list($coaching_program_id);
        $data['coaching_program_deliverable_list'] = $this->coaching_program_master_model->get_coaching_program_deliverable_list($coaching_program_id);
        
        $this->load->view('participants/coaching_program_master/vw_coaching_program_master_edit',$data);
    }
	

    public function update_coaching_program()
    {
		$coaching_program_id = $this->input->post('pop_up_coaching_program_id');
        $coaching_program_name = $this->input->post('pop_up_coaching_program_name');
        $remark = $this->input->post('pop_up_remark');
        $status = $this->input->post('pop_up_status');

        $coaching_program_update_array = array(
			'coaching_program_name' => $coaching_program_name,
			'remark' => $remark,
			'status' => $status
		);

        $data = $this->coaching_program_master_model->update_coaching_program($coaching_program_id,$coaching_program_update_array);

		redirect('vw_coaching_program_master');


    }


    public function update_coaching_program_deliverable()
    {
		$coaching_program_deliverable_relation_id = $this->input->post('pop_up_coaching_program_deliverable_relation_id');
		$coaching_program_id = $this->input->post('pop_up_coaching_program_id');
        $value_type = $this->input->post('pop_up_value_type');
        $value1 = $this->input->post('pop_up_value1');
        $value2 = $this->input->post('pop_up_value2');

		if($value_type ==1){
			$value = $value1;
		}else{
		$value = $value2;
		}

        $deliverable_update_array = array(
			'value' => $value
		);

        $data = $this->coaching_program_master_model->update_coaching_program_deliverable($coaching_program_deliverable_relation_id,$deliverable_update_array);

		redirect('edit_coaching_program_master/'.$coaching_program_id);


    }

   

    public function get_coaching_program_details_by_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $coaching_program_id = $this->input->post('coaching_program_id');
            $coaching_program_details = $this->coaching_program_master_model->get_coaching_program_details_by_id($coaching_program_id);
            echo json_encode([$coaching_program_details]);
        }
    }

    public function get_coaching_program_deliverable_details_by_relation_id()
    {
        $data = $this->input->post();
        if(!empty($data))
        {
            $deliverable_relation_id = $this->input->post('deliverable_relation_id');
            $coaching_program_deliverable_details = $this->coaching_program_master_model->get_coaching_program_deliverable_details_by_relation_id($deliverable_relation_id);
            echo json_encode([$coaching_program_deliverable_details]);
        }
    }

	public function add_assignment_in_coaching_program()
	{
		$coaching_program_id = $this->input->post('coaching_program_id');
		$assignment_checkbox = $this->input->post('assignment_checkbox');

		foreach($assignment_checkbox as $assignment){
			$assignement_insert_array = array(
				'coaching_program_id' => $coaching_program_id,
				'assignment_id' => $assignment,
			);

			$this->coaching_program_master_model->save_coaching_program_assignement_relation($assignement_insert_array);

		}
		
	}
}
?>
