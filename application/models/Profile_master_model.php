<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile_master_model extends CI_Model{

    public function get_profile_details($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $where = '(user_login.entity_id = "'.$user_id.'" )';
        $this->db->where($where);
        $profile_query = $this->db->get();
        $profileData = $profile_query->row();

        $userType = $profileData->type;
        $userRole = $profileData->role_id;
        $userName = $profileData->user_name;
        $password = $profileData->simple_password;
        $status = $profileData->activation_status;
        $profile_image = $profileData->profile_image;
        $userProfileData = array();
        $userProfileData['Status'] = $status;
        if($userType == 1)
        {
            $userProfileData['Company Name'] = "VB Digitech";
            $userProfileData['Role'] = "Super Admin";
            $userProfileData['Role ID'] = 1;
            $userProfileData['Type'] = 1;
            $userProfileData['User Name'] = $userName;
            $userProfileData['First Name'] = "Amol";
            $userProfileData['Last Name'] = "Pandit";
            $userProfileData['Designation'] = "Admin";
            $userProfileData['Email'] = "";
            $userProfileData['Contact Number'] = "";
            $userProfileData['profile image'] = $profile_image;
            $userProfileData['Password'] = $password;
        }elseif($userType == 2)
        {
            $empId = $profileData->emp_id;

            $this->db->select('*');
            $this->db->from('sparrow_employee_master');
            $where = '(sparrow_employee_master.entity_id = "'.$empId.'" )';
            $this->db->where($where);
            $profile_query = $this->db->get();
            $profileData = $profile_query->row_array();

            if($userRole == 2)
            {
                $userProfileData['Role ID'] = 2;
                $userProfileData['Role'] = "Admin";
            }elseif($userRole == 3){
                $userProfileData['Role ID'] = 3;
                $userProfileData['Role'] = "SPOC";
            }elseif($userRole == 4){
                $userProfileData['Role ID'] = 4;
                $userProfileData['Role'] = "Facilitator";
            }
            //$userProfileData['Role ID'] = 2;
            $userProfileData['Type'] = 2;
            $userProfileData['Company Name'] = "Sparrow's Sprout ";
            $userProfileData['User Name'] = $userName;
            $userProfileData['First Name'] = $profileData['first_name'];
            $userProfileData['Last Name'] = $profileData['last_name'];
            $userProfileData['Designation'] = $profileData['designation'];
            $userProfileData['Email'] = $profileData['email_id'];
            $userProfileData['Contact Number'] = $profileData['mobile1'];
            $userProfileData['Password'] = $password;
            $userProfileData['profile image'] = $profile_image;
        }elseif($userType == 3)
        {
            $companyContactId = $profileData->company_contact_id;

            if($userRole == 5)
            {
                $userProfileData['Role ID'] = 5;
                $userProfileData['Role'] = "Company BH";
            }elseif($userRole == 6){
                $userProfileData['Role ID'] = 6;
                $userProfileData['Role'] = "Company RM";
            }elseif($userRole == 7){
                $userProfileData['Role ID'] = 7;
                $userProfileData['Role'] = "Company Staff";
            }
            $userProfileData['Type'] = 3;
            $this->db->select('company_contact_master.*, company_master.company_name');
            $this->db->from('company_contact_master');
            $this->db->join('company_master', 'company_master.entity_id = company_contact_master.company_id', 'INNER');
            $where = '(company_contact_master.entity_id = "'.$companyContactId.'" )';
            $this->db->where($where);
            $profile_query = $this->db->get();
            $profileData = $profile_query->row_array();

            $userProfileData['Company Name'] = $profileData['company_name'];
            $userProfileData['User Name'] = $userName;
            $userProfileData['First Name'] = $profileData['first_name'];
            $userProfileData['Last Name'] = $profileData['last_name'];
            $userProfileData['Designation'] = $profileData['designation'];
            $userProfileData['Email'] = $profileData['email_id'];
            $userProfileData['Contact Number'] = $profileData['mobile1'];
            $userProfileData['profile image'] = $profile_image;
            $userProfileData['Password'] = $password;
        }

        return $userProfileData;
    }
}
?>