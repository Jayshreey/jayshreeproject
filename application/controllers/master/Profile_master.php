<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('profile_master_model');
        $this->load->library('session');
        $this->load->library('upload');
        error_reporting(0);
    }

    public function index()
    {
        if(isset($_SESSION['user_id']) && !empty($_SESSION))
        {
            $user_id = $_SESSION['user_id'];
            $data['profileData'] = $this->profile_master_model->get_profile_details($user_id);
            $this->load->view('master/profile_management/vw_profile',$data);
        }else{
            $this->session->set_flashdata('error', 'Un authorize activity');
            redirect(base_url() . 'welcome');
        }
        
        //$this->load->view('master/profile_management/vw_profile');
    }

    public function update_password()
    {
        $entity_id = $this->input->post('user_id');
        $password = $this->input->post('password');
        $shapassword = sha1($password);

        $data = array('simple_password' => $password, 'password' => $shapassword);

        $where = '(entity_id ="'.$entity_id.'")';
        $this->db->where($where);
        $data = $this->db->update('user_login',$data);

        $this->session->set_flashdata('msg', 'Password Updated Succesfully !!');

        redirect(base_url() . 'profile_management');
    }
    // Function to handle the image upload
    public function update_profile_photo() {
        //print_r($_FILES);die();
        // Set upload configuration
        $config['upload_path'] = './assets/HTML/dist/assets/images/profile_photo'; // Directory to store images
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
        //$config['max_size'] = 2048; // Maximum file size in KB (2MB)
        $config['file_name'] = uniqid(); // Generate a unique file name for each upload

        // Initialize the upload library with the configuration
        $this->upload->initialize($config);

        // Check if the file is uploaded successfully
        if (!$this->upload->do_upload('photo')) {
           
            // If upload fails, show error message
            $data['error'] = $this->upload->display_errors();
           
            $this->load->view('upload_form', $data);
        } else {
            // If upload is successful, show the uploaded file data
            $upload_data = $this->upload->data();
            $data['profile_image']=$upload_data['file_name'];
          
            $entity_id = $this->input->post('user_id');
            $where = '(entity_id ="'.$entity_id.'")';
            $this->db->where($where);
            $data = $this->db->update('user_login',$data);
            
            redirect(base_url() . 'profile_management');
        }
    }
}
?>
