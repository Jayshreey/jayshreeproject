<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily_diary_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('company_daily_diary_master_model');
        $this->load->library('session');
		$this->load->library('upload');
    }

    public function index()
    {
        $data['daily_diary_list'] = $this->company_daily_diary_master_model->get_daily_diary_list();
        $this->load->view('company/worklog/daily_diary_master/vw_daily_diary_master_index',$data);
    }

   public function create()
    {
        $data['sparrow_employee_list'] = $this->company_daily_diary_master_model->get_sparrow_employee_list();
       
        $this->load->view('company/worklog/daily_diary_master/vw_daily_diary_master_create',$data);
    }

	
	public function save_daily_diary_details()
	{
        $session_data = $this->session->userdata();
        $company_id = $session_data['company_id'];
        $diary_date = $this->input->post('diary_date');
        $sparrow_employee_id = $this->input->post('sparrow_employee_id');

		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('Y-m-d');
		

       
		$daily_diary_insert_array = array(
			'company_id'=>$company_id,
			'diary_date' => $diary_date,
			'sparrow_employee_id' => $sparrow_employee_id,
			'created_date' => $today_date
		);


		$daily_diary_id = $this->company_daily_diary_master_model->save_daily_diary($daily_diary_insert_array);
        
		// save uploaded file

		$data = array();
        $files = $_FILES;
        $count = count($_FILES['attachments']['name']); // Number of files uploaded
		

        // Loop through each file
        for($i = 0; $i < $count; $i++) {
            // Set $_FILES to be just this one file
            $_FILES['attachment']['name']     = $files['attachments']['name'][$i];
            $_FILES['attachment']['type']     = $files['attachments']['type'][$i];
            $_FILES['attachment']['tmp_name'] = $files['attachments']['tmp_name'][$i];
            $_FILES['attachment']['error']    = $files['attachments']['error'][$i];
            $_FILES['attachment']['size']     = $files['attachments']['size'][$i];

            // Configure upload settings
            $config['upload_path']   = './assets/daily_diary/';  // Folder where files will be uploaded
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx';  // Set allowed file types
            $config['max_size']      = 5000;  // Maximum file size (in kilobytes)
            $config['file_name']     = time() . '_' . $_FILES['attachment']['name'];  // Rename file to avoid conflicts

		
            // Initialize the upload library with the config
            $this->upload->initialize($config);

            // Upload the file
            if ($this->upload->do_upload('attachment')) {
                // File successfully uploaded
				$uploadData = $this->upload->data();
				$processedFileName = $uploadData['file_name'];
                $data['uploads'][$i] = $this->upload->data();  // Store file data
            } else {
                // Upload failed, collect the error message
                $data['errors'][$i] = $this->upload->display_errors();
            }
			
			// end of upload file
			// echo'<pre>';
			// print_r($data);
			// die();
			
			
			//save attachement
			
			
			
			$daily_diary_attachment_insert_array = array(
				
				'daily_diary_id' => $daily_diary_id,
				'attachment' => $processedFileName
			);

			$this->company_daily_diary_master_model->save_daily_diary_attachment($daily_diary_attachment_insert_array);
        
			
			
		}

		// echo'<pre>';
		// print_r($data);
		// die();
		redirect('vw_company_daily_diary_master');
		
	}

	
	
}