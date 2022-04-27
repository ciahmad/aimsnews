<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Adminprofile extends Admin_Controller {

    public $sch_setting_detail = array();

    public function __construct() {
        parent::__construct();

        $this->config->load("payroll");
        $this->config->load("app-config");
        $this->load->library('Enc_lib');
        $this->load->library('mailsmsconf');
        $this->load->model("adminprofile_model");
        $this->load->library('encoding_lib');
        $this->load->model("leaverequest_model");
        $this->load->model("setting_model");
        $this->contract_type = $this->config->item('contracttype');
        $this->marital_status = $this->config->item('marital_status');
        $this->staff_attendance = $this->config->item('staffattendance');
        $this->payroll_status = $this->config->item('payroll_status');
        $this->payment_mode = $this->config->item('payment_mode');
        $this->status = $this->config->item('status');
        $this->userdata = $this->customlib->getUserData();
        $this->sch_setting_detail = $this->setting_model->getSetting($this->userdata['admin_id']);
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('adminprofile', 'can_view')) {
            access_denied();
        }

        $data['title'] = 'Admin List';
        $data['fields'] = $this->customfield_model->get_custom_fields('adminprofile', 1);
        $this->session->set_userdata('menu_heading', 'SUPERADMIN');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/adminprofile');
        $search = $this->input->post("search");
        
        if($this->userdata['id'] ==1){
            $resultlist = $this->adminprofile_model->searchAdminList("", $this->userdata['id']);
            $data['resultlist'] = $resultlist;
        }else{
            $data['resultlist'] = array();
        }
        
        $staffRole = $this->adminprofile_model->getStaffRole();
        $data["role"] = $staffRole;
        $data["role_id"] = "";

        $search_text = $this->input->post('search_text');
        if (isset($search)) {
            if ($search == 'search_filter') {
                $this->form_validation->set_rules('role', $this->lang->line('role'), 'trim|required|xss_clean');
                if ($this->form_validation->run() == false) {

                    $data["resultlist"] = array();
                } else {
                    $data['searchby'] = "filter";
                    $role = $this->input->post('role');
                    $data['employee_id'] = $this->input->post('empid');
                    $data["role_id"] = $role;
                    $data['search_text'] = $this->input->post('search_text');
                    $resultlist = $this->adminprofile_model->getEmployee($role, 1);
                    $data['resultlist'] = $resultlist;
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $resultlist = $this->adminprofile_model->searchAdminList($search_text, 1);

                $data['resultlist'] = $resultlist;
                $data['title'] = 'Search Details: ' . $data['search_text'];
            }
        }

        $this->load->view('layout/header');
        $this->load->view('admin/adminprofile/adminlist', $data);
        $this->load->view('layout/footer');
    }

    public function setting(){
        $this->load->view('layout/header');
        $this->load->view('admin/adminprofile/setting');
        $this->load->view('layout/footer');
    }

    public function security(){
        $this->load->view('layout/header');
        $this->load->view('admin/adminprofile/security');
        $this->load->view('layout/footer');
    }
    public function create() {
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/adminprofile');

        $account_no = $this->adminprofile_model->isInvoiceNoExist();

        if(empty($account_no->account_no)){
            $data['account_no'] = 'LP'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $account_no->account_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['account_no'] = 'LP'.date('d').date('m').date('y').'00000'.$randno;
        }
        
        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        $genderList = $this->customlib->getGender();

        $data['genderList'] = $genderList;
        $country_results = $this->court_model->getCountries();
        $data['countries'] = $country_results;
        
        $payscaleList = $this->adminprofile_model->getPayroll();
        $leavetypeList = $this->adminprofile_model->getLeaveType();
        $data["leavetypeList"] = $leavetypeList;
        $data["payscaleList"] = $payscaleList;

        //$data['shares'] = $this->adminprofile_model->getPercentageOfShares();
        // if($data['shares']){
        //     $data['shares_id'] = $data['shares'][0]['id'];
        // }else{
        //     $data['shares_id'] ='';
        // }
        $designation = $this->adminprofile_model->getStaffDesignation($this->userdata['admin_id']);
        $data["designation"] = $designation;
        $department = $this->adminprofile_model->getDepartment($this->userdata['admin_id']);
        $data["department"] = $department;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;

        $data['title'] = 'Add Admin Profile';
        $data["contract_type"] = $this->contract_type;
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $custom_fields = $this->customfield_model->getByBelong('staff');
        foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
            if ($custom_fields_value['validation']) {
                $custom_fields_id = $custom_fields_value['id'];
                $custom_fields_name = $custom_fields_value['name'];
                $this->form_validation->set_rules("custom_fields[staff][" . $custom_fields_id . "]", $custom_fields_name, 'trim|required');
            }
        }

        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('role', $this->lang->line('role'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line('date_of_birth'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
        $this->form_validation->set_rules('first_doc', $this->lang->line('image'), 'callback_handle_first_upload');
        $this->form_validation->set_rules('second_doc', $this->lang->line('image'), 'callback_handle_second_upload');
        $this->form_validation->set_rules('third_doc', $this->lang->line('image'), 'callback_handle_third_upload');
        $this->form_validation->set_rules('fourth_doc', $this->lang->line('image'), 'callback_handle_fourth_upload');
        $this->form_validation->set_rules(
                'email', $this->lang->line('email'), array('required', 'valid_email',
            array('check_exists', array($this->adminprofile_model, 'valid_email_id')),
                )
        );

        // if (!$this->sch_setting_detail->staffid_auto_insert) {

        //     $this->form_validation->set_rules('employee_id', $this->lang->line('staff_id'), 'callback_username_check');
        // }

        $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');

        if ($this->form_validation->run() == true) {

            $custom_field_post = $this->input->post("custom_fields[staff]");
            $custom_value_array = array();
            if (!empty($custom_fields_value)) {

                foreach ($custom_field_post as $key => $value) {
                    $check_field_type = $this->input->post("custom_fields[staff][" . $key . "]");
                    $field_value = is_array($check_field_type) ? implode(",", $check_field_type) : $check_field_type;
                    $array_custom = array(
                        'belong_table_id' => 0,
                        'custom_field_id' => $key,
                        'field_value' => $field_value,
                    );
                    $custom_value_array[] = $array_custom;
                }
            }

            $account_no = $this->input->post("account_no");
            //$department = $this->input->post("department");
            //$designation = $this->input->post("designation");
            //$percentage_of_shares = $this->input->post("percentage_of_shares");
            $role = 1;
            $name = $this->input->post("name");
            $surname = $this->input->post("surname");
            $gender = $this->input->post("gender");
            $marital_status = $this->input->post("marital_status");
            $dob = $this->input->post("dob");
            $contact_no = $this->input->post("contactno");
            $emergency_no = $this->input->post("emergency_no");
            $email = $this->input->post("email");
            $date_of_joining = $this->input->post("date_of_joining");
            $date_of_leaving = $this->input->post("date_of_leaving");
            $current_address = $this->input->post("current_address");
            $country_id      = $this->input->post('country_id');
            $state_id        = $this->input->post('state_id');
            $city_id         = $this->input->post('city_id');
            $qualification = $this->input->post("qualification");
            $work_exp = $this->input->post("work_exp");
            
            $account_title = $this->input->post("account_title");
            $bank_account_no = $this->input->post("bank_account_no");
            $bank_name = $this->input->post("bank_name");
            $ifsc_code = $this->input->post("ifsc_code");
            $bank_branch = $this->input->post("bank_branch");

            // $chamber_name = $this->input->post('chamber_name');
            // $chamber_code = $this->input->post("chamber_code");
            // $chamber_address = $this->input->post("chamber_address");
            // $chamber_office_address = $this->input->post("chamber_office_address");
            // $chamber_contact = $this->input->post("chamber_contact");
            // $chamber_email = $this->input->post("chamber_email");

            $leave = $this->input->post("leave");
            $facebook = $this->input->post("facebook");
            $twitter = $this->input->post("twitter");
            $linkedin = $this->input->post("linkedin");
            $instagram = $this->input->post("instagram");
            $permanent_address = $this->input->post("permanent_address");
            $father_name = $this->input->post("father_name");
            $surname = $this->input->post("surname");
            $mother_name = $this->input->post("mother_name");
            $note = $this->input->post("note");
            $cnic_no = $this->input->post('cnic_no');
            $ntn_number = $this->input->post('ntn_number');

            $password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);

            $data_insert = array(
                'created_by' => $this->userdata['id'],
                'password' => $this->enc_lib->passHashEnc($password),
                'verification_code' => $password,
                'account_no' => $account_no,
                'package_id' => 1,
                'name' => $name,
                'email' => $email,
                'staff_type'=>'admin',
                'dob' => date('Y-m-d', $this->customlib->datetostrtotime($dob)),
                'date_of_leaving' => '',
                'gender' => $gender,
                'payscale' => '',
                'lang_id' =>4,
                'is_active' => 1,
            );

            if (isset($surname)) {
                $data_insert['surname'] = $surname;
            }if (isset($department)) {
                $data_insert['department'] = $department;
            }if (isset($cnic_no)) {
                $data_insert['cnic_no'] = $cnic_no;
            }if (isset($ntn_number)) {
                $data_insert['ntn_number'] = $ntn_number;
            }if (isset($chamber_name)) {
                $data_insert['chamber_name'] = $chamber_name;
            }if (isset($chamber_code)) {
                $data_insert['chamber_code'] = $chamber_code;
            }if (isset($chamber_address)) {
                $data_insert['chamber_address'] = $chamber_address;
            }if (isset($chamber_office_address)) {
                $data_insert['chamber_office_address'] = $chamber_office_address;
            }if (isset($chamber_contact)) {
                $data_insert['chamber_contact'] = $chamber_contact;
            }if (isset($chamber_email)) {
                $data_insert['chamber_email'] = $chamber_email;
            }
            if (isset($designation)) {
                $data_insert['designation'] = $designation;
            }
            if (isset($$percentage_of_shares)) {
                $data_insert['percentage_of_shares'] = $percentage_of_shares;
            }
            if (isset($mother_name)) {
                $data_insert['mother_name'] = $mother_name;
            }
            if (isset($father_name)) {
                $data_insert['father_name'] = $father_name;
            }
            if (isset($contact_no)) {
                $data_insert['contact_no'] = $contact_no;
            }
            if (isset($emergency_no)) {
                $data_insert['emergency_contact_no'] = $emergency_no;
            }
            if (isset($marital_status)) {
                $data_insert['marital_status'] = $marital_status;
            }
            if (isset($current_address)) {
                $data_insert['current_address'] = $current_address;
            }
            if (isset($permanent_address)) {
                $data_insert['permanent_address'] = $permanent_address;
            }
            if (isset($qualification)) {
                $data_insert['qualification'] = $qualification;
            }
            if (isset($work_exp)) {
                $data_insert['work_exp'] = $work_exp;
            }
            if (isset($note)) {
                $data_insert['note'] = $note;
            }
            if (isset($epf_no)) {
                $data_insert['epf_no'] = $epf_no;
            }
            if (isset($basic_salary)) {
                $data_insert['basic_salary'] = $basic_salary;
            }
            if (isset($contract_type)) {
                $data_insert['contract_type'] = $contract_type;
            }
            if (isset($shift)) {
                $data_insert['shift'] = $shift;
            }
            if (isset($location)) {
                $data_insert['location'] = $location;
            }
            if (isset($bank_account_no)) {
                $data_insert['bank_account_no'] = $bank_account_no;
            }
            if (isset($bank_name)) {
                $data_insert['bank_name'] = $bank_name;
            }
            if (isset($account_title)) {
                $data_insert['account_title'] = $account_title;
            }
            if (isset($ifsc_code)) {
                $data_insert['ifsc_code'] = $ifsc_code;
            }
            if (isset($bank_branch)) {
                $data_insert['bank_branch'] = $bank_branch;
            }
            if (isset($facebook)) {
                $data_insert['facebook'] = $facebook;
            }
            if (isset($twitter)) {
                $data_insert['twitter'] = $twitter;
            }
            if (isset($linkedin)) {
                $data_insert['linkedin'] = $linkedin;
            }
            if (isset($instagram)) {
                $data_insert['instagram'] = $instagram;
            }
            if (isset($country_id)) {
                $data_insert['country_id'] = $country_id;
            }if (isset($state_id)) {
                $data_insert['state_id'] = $state_id;
            }if (isset($city_id)) {
                $data_insert['city_id'] = $city_id;
            }

            if ($date_of_joining != "") {
                $data_insert['date_of_joining'] = date('Y-m-d', $this->customlib->datetostrtotime($date_of_joining));
            }

            $leave_type = $this->input->post('leave_type');
            $leave_array = array();
            if (!empty($leave_array)) {
                foreach ($leave_type as $leave_key => $leave_value) {
                    $leave_array[] = array(
                        'staff_id' => 0,
                        'leave_type_id' => $leave_value,
                        'alloted_leave' => $this->input->post('alloted_leave_' . $leave_value),
                    );
                }
            }
            $role_array = array('role_id' => 1, 'staff_id' => 0);
            //==========================
            $insert = true;
            $data_setting = array();
            $data_setting['id'] = $this->sch_setting_detail->id;
            $data_setting['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
            $data_setting['staffid_update_status'] = $this->sch_setting_detail->staffid_update_status;

            if($account_no!=''){
                $data_insert['employee_id'] = $this->input->post('account_no');
                $employee_id_exists = $this->adminprofile_model->check_adminid_exists($account_no);
                if ($employee_id_exists) {
                    $insert = false;
                }
            }
            
            //==========================
            //print_r($data_setting); die();

            if ($insert) {

                $insert_id = $this->adminprofile_model->batchInsert($data_insert, $role_array, $leave_array, $data_setting);
                $staff_id = $insert_id;

                $current_session_array = array(
                    'admin_id' => $insert_id,
                    'created_by' => $this->userdata['id'],
                    'session' => date('Y'),
                );
                $session_inserted_id = $this->session_model->add($current_session_array);

                $setting_data = array(
                    'admin_id' => $insert_id,
                    'created_by' => $this->userdata['id'],
                    'lang_id' => 4,
                    'languages' => '["4","79"]',
                    'session_id'=>$session_inserted_id,
                    'is_rtl' => 'disabled',
                    'date_format' => 'd-M-Y',
                    'time_format' => '12-hour',
                    'currency' => 'PKR',
                    'start_month' => 4,
                );

                $this->setting_model->add($setting_data);   

                if (!empty($custom_value_array)) {
                    $this->customfield_model->insertRecord($custom_value_array, $insert_id);
                }
                if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                    $fileInfo = pathinfo($_FILES["file"]["name"]);
                    $img_name = $insert_id . '.' . $fileInfo['extension'];
                    move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/staff_images/" . $img_name);
                    $data_img = array('id' => $staff_id, 'image' => $img_name);
                    $this->adminprofile_model->add($data_img);
                }

                if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
                    $uploaddir = './uploads/staff_documents/' . $staff_id . '/';
                    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                        die("Error creating folder $uploaddir");
                    }
                    $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
                    $first_title = 'resume';
                    $filename = "resume" . $staff_id . '.' . $fileInfo['extension'];
                    $img_name = $uploaddir . $filename;
                    $resume = $filename;
                    move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
                } else {

                    $resume = "";
                }

                if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {
                    $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                        die("Error creating folder $uploaddir");
                    }
                    $fileInfo = pathinfo($_FILES["second_doc"]["name"]);
                    $first_title = 'joining_letter';
                    $filename = "joining_letter" . $staff_id . '.' . $fileInfo['extension'];
                    $img_name = $uploaddir . $filename;
                    $joining_letter = $filename;
                    move_uploaded_file($_FILES["second_doc"]["tmp_name"], $img_name);
                } else {

                    $joining_letter = "";
                }

                if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {
                    $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                        die("Error creating folder $uploaddir");
                    }
                    $fileInfo = pathinfo($_FILES["third_doc"]["name"]);
                    $first_title = 'resignation_letter';
                    $filename = "resignation_letter" . $staff_id . '.' . $fileInfo['extension'];
                    $img_name = $uploaddir . $filename;
                    $resignation_letter = $filename;
                    move_uploaded_file($_FILES["third_doc"]["tmp_name"], $img_name);
                } else {

                    $resignation_letter = "";
                }
                if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {
                    $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                        die("Error creating folder $uploaddir");
                    }
                    $fileInfo = pathinfo($_FILES["fourth_doc"]["name"]);
                    $fourth_title = 'uploads/staff_images/' . 'Other Doucment';
                    $fourth_doc = "otherdocument" . $staff_id . '.' . $fileInfo['extension'];
                    $img_name = $uploaddir . $fourth_doc;
                    move_uploaded_file($_FILES["fourth_doc"]["tmp_name"], $img_name);
                } else {
                    $fourth_title = "";
                    $fourth_doc = "";
                }

                $data_doc = array('id' => $staff_id, 'resume' => $resume, 'joining_letter' => $joining_letter, 'resignation_letter' => $resignation_letter, 'other_document_name' => $fourth_title, 'other_document_file' => $fourth_doc);
                $this->adminprofile_model->add($data_doc);

                //===================
                if ($staff_id) {
                    $admin_login_detail = array('id' => $staff_id, 'credential_for' => 'admin', 'username' => $email, 'password' => $password, 'contact_no' => $contact_no, 'email' => $email);
                    $this->mailsmsconf->mailsms('login_credential', $admin_login_detail);
                }
                //==========================
                $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');

                redirect('admin/adminprofile');
            } else {
                $data['error_message'] = 'Admission No ' . $admission_no . ' already exists';
                $this->load->view('layout/header', $data);
                $this->load->view('admin/adminprofile/createadmin', $data);
                $this->load->view('layout/footer', $data);
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('admin/adminprofile/createadmin', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit($id) {
        if (!$this->rbac->hasPrivilege('admin_profile', 'can_edit')) {
            access_denied();
        }
        
        $a = 0;
        $sessionData = $this->session->userdata('admin');
        
        $data['title'] = 'Edit Admin';
        $data['id'] = $id;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $country_results = $this->court_model->getCountries();
        $data['countries'] = $country_results;
        $payscaleList = $this->adminprofile_model->getPayroll(null, $this->userdata['admin_id']);
        $leavetypeList = $this->adminprofile_model->getLeaveType(null, $this->userdata['admin_id']);
        $data["leavetypeList"] = $leavetypeList;
        $data["payscaleList"] = $payscaleList;
        $staffRole = $this->adminprofile_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        //$designation = $this->adminprofile_model->getStaffDesignation();
        //$data['shares'] = $this->adminprofile_model->getPercentageOfShares();
        // if($data['shares']){
        //     $data['shares_id'] = $data['shares'][0]['id'];
        // }else{
        //     $data['shares_id'] ='';
        // }
        
        //$data["designation"] = $designation;
       // print_r($data["designation"]); die();
        //$department = $this->adminprofile_model->getDepartment();
        //$data["department"] = $department;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        $data['title'] = 'Edit Staff';
        $staff = $this->adminprofile_model->get($id);
        $data['staff'] = $staff;
        //print_r($data['staff']); die();
        $data["contract_type"] = $this->contract_type;
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($this->userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }

        $staffLeaveDetails = $this->adminprofile_model->getLeaveDetails($id);
        $data['staffLeaveDetails'] = $staffLeaveDetails;
        $resume = $this->input->post("resume");
        $joining_letter = $this->input->post("joining_letter");
        $resignation_letter = $this->input->post("resignation_letter");
        $other_document_name = $this->input->post("other_document_name");
        $other_document_file = $this->input->post("other_document_file");
        $custom_fields = $this->customfield_model->getByBelong('staff');

        foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {

            if ($custom_fields_value['validation']) {
                $custom_fields_id = $custom_fields_value['id'];
                $custom_fields_name = $custom_fields_value['name'];
                $this->form_validation->set_rules("custom_fields[staff][" . $custom_fields_id . "]", $custom_fields_name, 'trim|required');
            }
        }

        $this->form_validation->set_rules('name', 'First name', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('role', 'Role', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
        $this->form_validation->set_rules('first_doc', $this->lang->line('image'), 'callback_handle_first_upload');
        $this->form_validation->set_rules('second_doc', $this->lang->line('image'), 'callback_handle_second_upload');
        $this->form_validation->set_rules('third_doc', $this->lang->line('image'), 'callback_handle_third_upload');
        $this->form_validation->set_rules('fourth_doc', $this->lang->line('image'), 'callback_handle_fourth_upload');

        // if (!$this->sch_setting_detail->staffid_auto_insert) {

        //     $this->form_validation->set_rules('employee_id', $this->lang->line('staff_id'), 'callback_username_check');
        // }

        // $this->form_validation->set_rules(
        //         'email', $this->lang->line('email'), array('required', 'valid_email',
        //     array('check_exists', array($this->adminprofile_model, 'valid_email_id')),
        //         )
        // );

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/header', $data);
            $this->load->view('admin/adminprofile/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            //$employee_id = $this->input->post("employee_id");
            //$department = $this->input->post("department");
            //$designation = $this->input->post("designation");
            //$percentage_of_shares = $this->input->post("percentage_of_shares");
            //$role = $this->input->post("role");

            $account_no = $this->input->post("account_no");
            $name = $this->input->post("name");
            $surname = $this->input->post("surname");
            $gender = $this->input->post("gender");
            $marital_status = $this->input->post("marital_status");
            $dob = $this->input->post("dob");
            $contact_no = $this->input->post("contactno");
            $emergency_no = $this->input->post("emergency_no");
            $email = $this->input->post("email");
            $date_of_joining = $this->input->post("date_of_joining");
            $date_of_leaving = $this->input->post("date_of_leaving");
            $current_address = $this->input->post("current_address");
            $qualification = $this->input->post("qualification");
            $work_exp = $this->input->post("work_exp");
            $account_title = $this->input->post("account_title");
            $bank_account_no = $this->input->post("bank_account_no");
            $bank_name = $this->input->post("bank_name");
            $ifsc_code = $this->input->post("ifsc_code");
            $bank_branch = $this->input->post("bank_branch");
            $epf_no = $this->input->post('epf_no');
            $contract_type = $this->input->post("contract_type");
            $basic_salary = $this->input->post("basic_salary");
            $shift = $this->input->post("shift");
            $location = $this->input->post("location");
            $date_of_leaving = $this->input->post("date_of_leaving");
            $leave = $this->input->post("leave");
            $facebook = $this->input->post("facebook");
            $twitter = $this->input->post("twitter");
            $linkedin = $this->input->post("linkedin");
            $instagram = $this->input->post("instagram");
            $permanent_address = $this->input->post("permanent_address");
            $father_name = $this->input->post("father_name");
            $mother_name = $this->input->post("mother_name");
            $note = $this->input->post("note");
            $country_id = $this->input->post('country_id');
            $state_id   = $this->input->post('state_id');
            $city_id    = $this->input->post('city_id');
            $cnic_no = $this->input->post('cnic_no');
            $ntn_number = $this->input->post('ntn_number');
            

            $custom_field_post = $this->input->post("custom_fields[staff]");

            $custom_value_array = array();
            foreach ($custom_field_post as $key => $value) {
                $check_field_type = $this->input->post("custom_fields[staff][" . $key . "]");
                $field_value = is_array($check_field_type) ? implode(",", $check_field_type) : $check_field_type;
                $array_custom = array(
                    'belong_table_id' => $id,
                    'custom_field_id' => $key,
                    'field_value' => $field_value,
                );
                $custom_value_array[] = $array_custom;
            }

            $this->customfield_model->updateRecord($custom_value_array, $id, 'staff');

            $data1 = array(
                'id' => $id,
                'account_no' => $account_no,
                'employee_id' => $account_no,
                'qualification' => $qualification,
                'work_exp' => $work_exp,
                'name' => $name,
                'surname' => $surname,
                'contact_no' => $contact_no,
                'emergency_contact_no' => $emergency_no,
                'email' => $email,
                'dob' => date('Y-m-d', $this->customlib->datetostrtotime($dob)),
                'marital_status' => $marital_status,
                'current_address' => $current_address,
                'country_id' => $country_id,
                'state_id' => $state_id,
                'city_id' => $city_id,
                'permanent_address' => $permanent_address,
                'note' => $note,
                'epf_no' => $epf_no,
                'contract_type' => $contract_type,
                'basic_salary' => $basic_salary,
                'shift' => $shift,
                'location' => $location,
                'mother_name' => $mother_name,
                'father_name' => $father_name,
                'gender' => $gender,
                'account_title' => $account_title,
                'bank_account_no' => $bank_account_no,
                'bank_name' => $bank_name,
                'ifsc_code' => $ifsc_code,
                'bank_branch' => $bank_branch,
                'payscale' => '',
                'facebook' => $facebook,
                'twitter' => $twitter,
                'linkedin' => $linkedin,
                'instagram' => $instagram,
                'cnic_no'=>$cnic_no,
                'ntn_number'=>$ntn_number
            );

            if ($date_of_joining != "") {
                $data1['date_of_joining'] = date('Y-m-d', $this->customlib->datetostrtotime($date_of_joining));
            } else {
                $data1['date_of_joining'] = "";
            }

            if ($date_of_leaving != "") {
                $data1['date_of_leaving'] = date('Y-m-d', $this->customlib->datetostrtotime($date_of_leaving));
            } else {
                $data1['date_of_leaving'] = "";
            }

            // if (!$this->sch_setting_detail->staffid_auto_insert) {
            //     $data1['employee_id'] = $employee_id;
            // }
            //print_r($data1); die();
            $insert_id = $this->adminprofile_model->add($data1);

            //$role_id = $this->input->post("role");
            // if($staff["role_id"]!=7){
            //     $role_data = array('staff_id' => $id, 'role_id' => 1);
            //     $this->adminprofile_model->update_role($role_data);
            // }
            
            $leave_type = $this->input->post("leave_type_id");

            $alloted_leave = $this->input->post("alloted_leave");
            $altid = $this->input->post("altid");

            if (!empty($leave_type)) {
                $i = 0;
                foreach ($leave_type as $key => $value) {

                    if (!empty($altid[$i])) {

                        $data2 = array('staff_id' => $id,
                            'leave_type_id' => $leave_type[$i],
                            'id' => $altid[$i],
                            'alloted_leave' => $alloted_leave[$i],
                        );
                    } else {

                        $data2 = array('staff_id' => $id,
                            'leave_type_id' => $leave_type[$i],
                            'alloted_leave' => $alloted_leave[$i],
                        );
                    }

                    $this->adminprofile_model->add_staff_leave_details($data2);
                    $i++;
                }
            }

            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/staff_images/" . $img_name);
                $data_img = array('id' => $id, 'image' => $img_name);
                $this->adminprofile_model->add($data_img);
            }

            if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
                $first_title = 'resume';
                $resume_doc = "resume" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $resume_doc;
                move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
            } else {

                $resume_doc = $resume;
            }

            if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["second_doc"]["name"]);
                $first_title = 'joining_letter';
                $joining_letter_doc = "joining_letter" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $joining_letter_doc;
                move_uploaded_file($_FILES["second_doc"]["tmp_name"], $img_name);
            } else {

                $joining_letter_doc = $joining_letter;
            }

            if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["third_doc"]["name"]);
                $first_title = 'resignation_letter';
                $resignation_letter_doc = "resignation_letter" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $resignation_letter_doc;
                move_uploaded_file($_FILES["third_doc"]["tmp_name"], $img_name);
            } else {

                $resignation_letter_doc = $resignation_letter;
            }

            if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["fourth_doc"]["name"]);
                $fourth_title = 'Other Doucment';
                $fourth_doc = "otherdocument" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $fourth_doc;
                move_uploaded_file($_FILES["fourth_doc"]["tmp_name"], $img_name);
            } else {
                $fourth_title = 'Other Document';
                $fourth_doc = $other_document_file;
            }

            $data_doc = array('id' => $id, 'resume' => $resume_doc, 'joining_letter' => $joining_letter_doc, 'resignation_letter' => $resignation_letter_doc, 'other_document_name' => $fourth_title, 'other_document_file' => $fourth_doc);

            $this->adminprofile_model->add($data_doc);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/adminprofile/edit/'.$id);
        }
    }
    public function disablestafflist() {

        if (!$this->rbac->hasPrivilege('disable_staff', 'can_view')) {
            access_denied();
        }

        if (isset($_POST['role']) && $_POST['role'] != '') {
            $data['search_role'] = $_POST['role'];
        } else {
            $data['search_role'] = "";
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'HR/adminprofile/disablestafflist');
        $data['title'] = 'Staff Search';
        $staffRole = $this->adminprofile_model->getStaffRole();
        $data["role"] = $staffRole;
        $search = $this->input->post("search");
        $search_text = $this->input->post('search_text');
        $resultlist = $this->adminprofile_model->searchFullText($search_text, 0);
        $data['resultlist'] = $resultlist;

        if (isset($search)) {
            if ($search == 'search_filter') {
                $this->form_validation->set_rules('role', $this->lang->line('role'), 'trim|required|xss_clean');
                if ($this->form_validation->run() == false) {
                    $resultlist = array();
                    $data['resultlist'] = $resultlist;
                } else {
                    $data['searchby'] = "filter";
                    $role = $this->input->post('role');
                    $data['employee_id'] = $this->input->post('empid');

                    $data['search_text'] = $this->input->post('search_text');
                    $resultlist = $this->adminprofile_model->getEmployee($role, 0);
                    $data['resultlist'] = $resultlist;
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $resultlist = $this->adminprofile_model->searchFullText($search_text, 0);
                $data['resultlist'] = $resultlist;
                $data['title'] = 'Search Details: ' . $data['search_text'];
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('admin/adminprofile/disablestaff', $data);
        $this->load->view('layout/footer', $data);
    }

    public function profile($id) {
        
        $data['enable_disable'] = 1;
        if ($this->customlib->getStaffID() == $id) {
            $data['enable_disable'] = 0;
        } else if (!$this->rbac->hasPrivilege('admin_profile', 'can_view')) {
            access_denied();
        }

        $this->load->model("staffattendancemodel");
        $this->load->model("setting_model");
        $data["id"] = $id;
        $data['title'] = 'Staff Details';

        $packages = $this->packagesubscription_model->getAdminSubscriptions($id);
        
        
        if(!empty($packages)){
            $data['subscriptionlist'] = $packages;
            foreach ($packages as $key => $package) {
                if($package['status'] =='approved'){
                    $data['activepackages'] = $package;
                }
            }
        }
 
        
        $timeline_status = '';

        if ($this->userdata['id'] == $id) {
            $timeline_status = 'yes';
        }
        
        $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status, $this->userdata['admin_id']);
        
        $data["timeline_list"] = $timeline_list;
        $staff_payroll = $this->adminprofile_model->getStaffPayroll($id, $this->userdata['admin_id']);
       
        //$admin_clients = $this->client_model->getclients($id);
        //$data['adminuserlist'] = $admin_clients;

        $admin_staffs = $this->staff_model->getstaffs($id, $this->userdata['admin_id']);
        $data['adminstafflist'] = $admin_staffs;
        
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $this->load->model("payroll_model");
        $salary = $this->payroll_model->getSalaryDetails($id);

        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType($this->userdata['admin_id']);
        $data['attendencetypeslist'] = $attendencetypes;

        $permissions = $this->adminprofile_model->getModules(null, $this->userdata['admin_id']);
        $data['permissions'] = $permissions;

        $data["staff_leaves"] = $staff_leaves;
        $data['staff_doc_id'] = $id;
        $staff_info = $this->adminprofile_model->getAdminProfile($id, $this->userdata['admin_id']);
        $data['staff'] = $staff_info;
        $data['staff_payroll'] = $staff_payroll;
        $data['salary'] = $salary;

        $monthlist = $this->customlib->getMonthDropdown();

        $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        
        $data["monthlist"] = $monthlist;
        $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount($this->userdata['admin_id']);
        $session_current = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        $centenary = substr($session_current, 0, 2); //2017-18 to 2017
        $year_first_substring = substr($session_current, 2, 2); //2017-18 to 2017
        $year_second_substring = substr($session_current, 5, 2); //2017-18 to 18
        $month_number = date("m", strtotime($startMonth));
        $data['rate_canview'] = 0;

        if ($id != '1') {
            $staff_rating = $this->adminprofile_model->staff_ratingById($id, $this->userdata['admin_id']);

            if ($staff_rating['total'] >= 3) {
                $data['rate'] = ($staff_rating['rate'] / $staff_rating['total']);

                $data['rate_canview'] = 1;
            }
            $data['reviews'] = $staff_rating['total'];
        }

        $data['reviews_comment'] = $this->adminprofile_model->staff_ratingById($id);

        $year = date("Y");
        
        //$staff_list = $this->adminprofile_model->user_reviewlist($id);
        //$data['user_reviewlist'] = $staff_list;

        $attendence_count = array();
        $attendencetypes = $this->attendencetype_model->getStaffAttendanceType(null, $this->userdata['admin_id']);
        foreach ($attendencetypes as $att_key => $att_value) {
            $attendence_count[$att_value['type']] = array();
        }
        
        foreach ($monthlist as $key => $value) {
            $datemonth = date("m", strtotime($value));
            $date_each_month = date('Y-' . $datemonth . '-01');


            $date_start = date('01', strtotime($date_each_month));
            $date_end = date('t', strtotime($date_each_month));
            for ($n = $date_start; $n <= $date_end; $n++) {
                $att_dates = $year . "-" . $datemonth . "-" . sprintf("%02d", $n);
                $date_array[] = $att_dates;
                $staff_attendence = $this->staffattendancemodel->searchStaffattendance($id, $att_dates, false);

                if ($staff_attendence['att_type'] != "") {
                    $attendence_count[$staff_attendence['att_type']][] = 1;
                }
                $res[$att_dates] = $staff_attendence;
            }
        }


        $session = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        
        $session_start = explode("-", $session);
        $start_year = $session_start[0];

        $date = $start_year . "-" . $startMonth;
        $newdate = date("Y-m-d", strtotime($date . "+1 month"));

        //$countAttendance = $this->countAttendance($start_year, $startMonth, $id);
        $data["countAttendance"] = $attendence_count;

        $data["resultlist"] = $res;
        $data["attendence_array"] = range(01, 31);
        $data["date_array"] = $date_array;
        $data["payroll_status"] = $this->payroll_status;
        $data["payment_mode"] = $this->payment_mode;
        $data["contract_type"] = $this->contract_type;
        $data["status"] = $this->status;
        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        $stafflist = $this->adminprofile_model->get();
        $data['stafflist'] = $stafflist;
        
        $this->load->view('layout/header', $data);
        $this->load->view('admin/adminprofile/adminprofile', $data); 
        $this->load->view('layout/footer', $data);
    }

    public function assignemodule($id){

        if(!empty(array_filter($this->input->post('module_name'))) ) {
            // First of all remove existing modules and then insert new one//
            $this->adminprofile_model->delAssignModules($id);
            for ($i=0; $i < count(array_filter($this->input->post('module_name'))); $i++) { 
                $exp = explode(',', $this->input->post('module_name')[$i]);
                $insertdata = array(
                    'admin_id'=>$id,
                    'created_by'=>$this->userdata['id'],
                    'id'=>$exp[0],
                    'name'=>$exp[1],
                    'short_code'=>$exp[2],
                    'is_active'=>1
                );
                $this->adminprofile_model->addAssignModules($insertdata);
            }
        }else{
            $this->adminprofile_model->delAssignModules($id);
        }

        $this->session->set_flashdata('msg', '<i class="fa fa-check-square-o" aria-hidden="true"></i>' . $this->lang->line('success_message') . '');    
        redirect('admin/adminprofile/profile/' . $id);

    }

    public function countAttendance($st_month, $no_of_months, $emp) {

        $record = array();
        for ($i = 1; $i <= 1; $i++) {

            $r = array();
            $month = date('m', strtotime($st_month . " -$i month"));
            $year = date('Y', strtotime($st_month . " -$i month"));

            foreach ($this->staff_attendance as $att_key => $att_value) {

                $s = $this->adminprofile_model->count_attendance($year, $emp, $att_value);

                $r[$att_key] = $s;
            }

            $record[$year] = $r;
        }

        return $record;
    }

    public function getSession() {
        $session = $this->session_model->getAllSession();
        $data = array();
        $session_array = $this->session->has_userdata('session_array');
        $data['sessionData'] = array('session_id' => 0);
        if ($session_array) {
            $data['sessionData'] = $this->session->userdata('session_array');
        } else {
            $setting = $this->setting_model->get();

            $data['sessionData'] = array('session_id' => $setting[0]['session_id']);
        }
        $data['sessionList'] = $session;

        return $data;
    }

    public function getSessionMonthDropdown() {
        $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        $array = array();
        for ($m = $startMonth; $m <= $startMonth + 11; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $array[$month] = $month;
        }
        return $array;
    }

    public function download($staff_id, $doc) {
        $this->load->helper('download');
        $filepath = "./uploads/staff_documents/$staff_id/" . $this->uri->segment(5);
        $data = file_get_contents($filepath);
        $name = $this->uri->segment(5);
        force_download($name, $data);
    }

    public function doc_delete($id, $doc, $file) {
        $this->adminprofile_model->doc_delete($id, $doc, $file);
        $this->session->set_flashdata('msg', '<i class="fa fa-check-square-o" aria-hidden="true"></i>' . $this->lang->line('delete_message') . '');
        redirect('admin/adminprofile/profile/' . $id);
    }

    public function ajax_attendance($id) {
        $this->load->model("staffattendancemodel");
        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
        $data['attendencetypeslist'] = $attendencetypes;
        $year = $this->input->post("year");
        $data["year"] = $year;
        if (!empty($year)) {

            $monthlist = $this->customlib->getMonthDropdown();
            $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
            $data["monthlist"] = $monthlist;
            $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
            $session_current = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
            $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);

            $j = 0;
            for ($n = 1; $n <= 31; $n++) {

                $att_date = sprintf("%02d", $n);

                $attendence_array[] = $att_date;

                foreach ($monthlist as $key => $value) {

                    $datemonth = date("m", strtotime($value));
                    $att_dates = $year . "-" . $datemonth . "-" . sprintf("%02d", $n);
                    $date_array[] = $att_dates;
                    $res[$att_dates] = $this->staffattendancemodel->searchStaffattendance($id, $att_dates);
                }

                $j++;
            }

            $date = $year . "-" . $startMonth;
            $newdate = date("Y-m-d", strtotime($date . "+1 month"));

            $countAttendance = $this->countAttendance($year, $startMonth, $id);
            $data["countAttendance"] = $countAttendance;
            $data["id"] = $id;
            $data["resultlist"] = $res;
            $data["attendence_array"] = $attendence_array;
            $data["date_array"] = $date_array;

            $this->load->view("admin/adminprofile/ajaxattendance", $data);
        } else {

            echo "No Record Found";
        }
    }

    public function handle_upload() {
        $image_validate = $this->config->item('image_validate');
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {

            $file_type = $_FILES["file"]['type'];
            $file_size = $_FILES["file"]["size"];
            $file_name = $_FILES["file"]["name"];
            $allowed_extension = $image_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $image_validate['allowed_mime_type'];
            if ($files = @getimagesize($_FILES['file']['tmp_name'])) {

                if (!in_array($files['mime'], $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                    return false;
                }
                if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                    return false;
                }
                if ($file_size > $image_validate['upload_size']) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($image_validate['upload_size'] / 1048576, 2) . " MB");
                    return false;
                }
            } else {
                $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            return true;
        }
        return true;
    }

    public function report($id){
         $stting = $this->setting_model->get();      
         $data['sch_sett'] = $stting;


         $data['enable_disable'] = 1;
        if ($this->customlib->getStaffID() == $id) {
            $data['enable_disable'] = 0;
        } else if (!$this->rbac->hasPrivilege('staff', 'can_view')) {
            access_denied();
        }

        $this->load->model("staffattendancemodel");
        $this->load->model("setting_model");
        $data["id"] = $id;
        $data['title'] = 'Staff Details';
        $staff_info = $this->adminprofile_model->getProfile($id);
        //$userdata = $this->customlib->getUserData();

        $userid = $this->userdata['id'];
        $timeline_status = '';

        if ($userid == $id) {
            $timeline_status = 'yes';
        }

        $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status);
        $data["timeline_list"] = $timeline_list;
        $staff_payroll = $this->adminprofile_model->getStaffPayroll($id);
        $staff_leaves = $this->leaverequest_model->staff_leave_request($id);
        $alloted_leavetype = $this->adminprofile_model->allotedLeaveType($id);
       
        $data['sch_setting'] = $this->sch_setting_detail;

        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $this->load->model("payroll_model");
        $salary = $this->payroll_model->getSalaryDetails($id);
        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
        $data['attendencetypeslist'] = $attendencetypes;
        $i = 0;
        $leaveDetail = array();
        foreach ($alloted_leavetype as $key => $value) {
            $count_leaves[] = $this->leaverequest_model->countLeavesData($id, $value["leave_type_id"]);
            $leaveDetail[$i]['type'] = $value["type"];
            $leaveDetail[$i]['alloted_leave'] = $value["alloted_leave"];
            $leaveDetail[$i]['approve_leave'] = $count_leaves[$i]['approve_leave'];
            $i++;
        }
        // echo "<pre>";
        // print_r($leaveDetail);
        // echo "<pre>"; die();
        $data["leavedetails"] = $leaveDetail;
        $data["staff_leaves"] = $staff_leaves;
        $data['staff_doc_id'] = $id;
        $data['staff'] = $staff_info;
        $data['staff_payroll'] = $staff_payroll;
        $data['salary'] = $salary;

        $monthlist = $this->customlib->getMonthDropdown();
        $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        $data["monthlist"] = $monthlist;
        $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
        $session_current = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        $startMonth = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        $centenary = substr($session_current, 0, 2); //2017-18 to 2017
        $year_first_substring = substr($session_current, 2, 2); //2017-18 to 2017
        $year_second_substring = substr($session_current, 5, 2); //2017-18 to 18
        $month_number = date("m", strtotime($startMonth));
        $data['rate_canview'] = 0;

        if ($id != '1') {
            $staff_rating = $this->adminprofile_model->staff_ratingById($id);

            if ($staff_rating['total'] >= 3) {
                $data['rate'] = ($staff_rating['rate'] / $staff_rating['total']);

                $data['rate_canview'] = 1;
            }
            $data['reviews'] = $staff_rating['total'];
        }

        $data['reviews_comment'] = $this->adminprofile_model->staff_ratingById($id);

        $year = date("Y");

        $staff_list = $this->adminprofile_model->user_reviewlist($id);
        $data['user_reviewlist'] = $staff_list;

        $attendence_count = array();
        $attendencetypes = $this->attendencetype_model->getStaffAttendanceType();
        foreach ($attendencetypes as $att_key => $att_value) {
            $attendence_count[$att_value['type']] = array();
        }

        foreach ($monthlist as $key => $value) {
            $datemonth = date("m", strtotime($value));
            $date_each_month = date('Y-' . $datemonth . '-01');


            $date_start = date('01', strtotime($date_each_month));
            $date_end = date('t', strtotime($date_each_month));
            for ($n = $date_start; $n <= $date_end; $n++) {
                $att_dates = $year . "-" . $datemonth . "-" . sprintf("%02d", $n);
                $date_array[] = $att_dates;
                $staff_attendence = $this->staffattendancemodel->searchStaffattendance($id, $att_dates, false);

                if ($staff_attendence['att_type'] != "") {
                    $attendence_count[$staff_attendence['att_type']][] = 1;
                }
                $res[$att_dates] = $staff_attendence;
            }
        }


        $session = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);

        $session_start = explode("-", $session);
        $start_year = $session_start[0];

        $date = $start_year . "-" . $startMonth;
        $newdate = date("Y-m-d", strtotime($date . "+1 month"));

        $data["countAttendance"] = $attendence_count;

        $data["resultlist"] = $res;
        $data["attendence_array"] = range(01, 31);
        $data["date_array"] = $date_array;
        $data["payroll_status"] = $this->payroll_status;
        $data["payment_mode"] = $this->payment_mode;
        $data["contract_type"] = $this->contract_type;
        $data["status"] = $this->status;
        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        $stafflist = $this->adminprofile_model->get();
        $data['stafflist'] = $stafflist;

          $this->load->view('layout/header', $data);
          $this->load->view('admin/adminprofile/staffreport', $data);
          $this->load->view('layout/footer', $data);

       // $this->load->view('print/printFeesByGroup', $data);
        //$this->load->view('print/printStaffById', $data);
    }

    public function handle_first_upload() {
        $file_validate = $this->config->item('file_validate');

        if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {

            $file_type = $_FILES["first_doc"]['type'];
            $file_size = $_FILES["first_doc"]["size"];
            $file_name = $_FILES["first_doc"]["name"];
            $allowed_extension = $file_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $file_validate['allowed_mime_type'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mtype = finfo_file($finfo, $_FILES['first_doc']['tmp_name']);
            finfo_close($finfo);


            if (!in_array($mtype, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_first_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_first_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($file_size > $file_validate['upload_size']) {
                $this->form_validation->set_message('handle_first_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($file_validate['upload_size'] / 1048576, 2) . " MB");
                return false;
            }


            return true;
        }
        return true;
    }

    public function handle_second_upload() {
        $file_validate = $this->config->item('file_validate');

        if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {

            $file_type = $_FILES["second_doc"]['type'];
            $file_size = $_FILES["second_doc"]["size"];
            $file_name = $_FILES["second_doc"]["name"];
            $allowed_extension = $file_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $file_validate['allowed_mime_type'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mtype = finfo_file($finfo, $_FILES['second_doc']['tmp_name']);
            finfo_close($finfo);


            if (!in_array($mtype, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_second_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_second_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($file_size > $file_validate['upload_size']) {
                $this->form_validation->set_message('handle_second_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($file_validate['upload_size'] / 1048576, 2) . " MB");
                return false;
            }


            return true;
        }
        return true;
    }

    public function handle_third_upload() {
        $file_validate = $this->config->item('file_validate');

        if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {

            $file_type = $_FILES["third_doc"]['type'];
            $file_size = $_FILES["third_doc"]["size"];
            $file_name = $_FILES["third_doc"]["name"];
            $allowed_extension = $file_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $file_validate['allowed_mime_type'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mtype = finfo_file($finfo, $_FILES['third_doc']['tmp_name']);
            finfo_close($finfo);


            if (!in_array($mtype, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_third_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_third_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($file_size > $file_validate['upload_size']) {
                $this->form_validation->set_message('handle_third_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($file_validate['upload_size'] / 1048576, 2) . " MB");
                return false;
            }


            return true;
        }
        return true;
    }

    public function handle_fourth_upload() {
        $file_validate = $this->config->item('file_validate');

        if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {

            $file_type = $_FILES["fourth_doc"]['type'];
            $file_size = $_FILES["fourth_doc"]["size"];
            $file_name = $_FILES["fourth_doc"]["name"];
            $allowed_extension = $file_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $file_validate['allowed_mime_type'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mtype = finfo_file($finfo, $_FILES['fourth_doc']['tmp_name']);
            finfo_close($finfo);


            if (!in_array($mtype, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_fourth_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                $this->form_validation->set_message('handle_fourth_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($file_size > $file_validate['upload_size']) {
                $this->form_validation->set_message('handle_fourth_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($file_validate['upload_size'] / 1048576, 2) . " MB");
                return false;
            }


            return true;
        }
        return true;
    }

    public function username_check($str) {
        if (empty($str)) {
            $this->form_validation->set_message('username_check', $this->lang->line('staff_ID_field_is_required'));
            return false;
        } else {

            $result = $this->adminprofile_model->valid_employee_id($str);
            if ($result == false) {

                return false;
            }
            return true;
        }
    }    

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('staff', 'can_delete')) {
            access_denied();
        }

        $a = 0;
        $sessionData = $this->session->userdata('admin');
        //$userdata = $this->customlib->getUserData();
        $staff = $this->adminprofile_model->get($id);

        if ($staff['id'] == $this->userdata['id']) {
            $a = 1;
        } else if ($staff["role_id"] == 7) {
            $a = 1;
        }

        if ($a == 1) {
            access_denied();
        }
        $data['title'] = 'Staff List';
        $this->adminprofile_model->remove($id);
        redirect('admin/adminprofile');
    }

    public function disablestaff($id) {
        if (!$this->rbac->hasPrivilege('disable_staff', 'can_view')) {

            access_denied();
        }


        $a = 0;
        $sessionData = $this->session->userdata('admin');
        //$userdata = $this->customlib->getUserData();
        $staff = $this->adminprofile_model->get($id);
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($this->userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }
        $data = array('id' => $id, 'disable_at' => date('Y-m-d', $this->customlib->datetostrtotime($_POST['date'])), 'is_active' => 0);
        $this->adminprofile_model->disablestaff($data);
        $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        echo json_encode($array);
    }

    public function enablestaff($id) {

        $a = 0;
        $sessionData = $this->session->userdata('admin');
        //$userdata = $this->customlib->getUserData();
        $staff = $this->adminprofile_model->get($id);
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($this->userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }
        $this->adminprofile_model->enablestaff($id);
        redirect('admin/adminprofile/profile/' . $id);
    }

    public function staffLeaveSummary() {

        $resultdata = $this->adminprofile_model->getLeaveSummary();
        $data["resultdata"] = $resultdata;

        $this->load->view("layout/header");
        $this->load->view("admin/adminprofile/staff_leave_summary", $data);
        $this->load->view("layout/footer");
    }

    public function getEmployeeByRole() {

        $role = $this->input->post("role");

        $data = $this->adminprofile_model->getEmployee($role);

        echo json_encode($data);
    }

    public function dateDifference($date_1, $date_2, $differenceFormat = '%a') {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat) + 1;
    }

    public function permission($id) {
        $data['title'] = 'Add Role';
        $data['id'] = $id;
        $staff = $this->adminprofile_model->get($id);
        $data['staff'] = $staff;
        $userpermission = $this->userpermission_model->getUserPermission($id);
        $data['userpermission'] = $userpermission;

        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $staff_id = $this->input->post('staff_id');
            $prev_array = $this->input->post('prev_array');
            if (!isset($prev_array)) {
                $prev_array = array();
            }
            $module_perm = $this->input->post('module_perm');
            $delete_array = array_diff($prev_array, $module_perm);
            $insert_diff = array_diff($module_perm, $prev_array);
            $insert_array = array();
            if (!empty($insert_diff)) {

                foreach ($insert_diff as $key => $value) {
                    $insert_array[] = array(
                        'staff_id' => $staff_id,
                        'permission_id' => $value,
                    );
                }
            }

            $this->userpermission_model->getInsertBatch($insert_array, $staff_id, $delete_array);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/adminprofile');
        }

        $this->load->view('layout/header');
        $this->load->view('admin/adminprofile/permission', $data);
        $this->load->view('layout/footer');
    }

    public function leaverequest() {

        if (!$this->rbac->hasPrivilege('apply_leave', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/adminprofile/leaverequest');
        //$userdata = $this->customlib->getUserData();
        $leave_request = $this->leaverequest_model->user_leave_request($this->userdata["id"]);
        $data["leave_request"] = $leave_request;
        $LeaveTypes = $this->leaverequest_model->allotedLeaveType($this->userdata["id"]);
        $data["staff_id"] = $this->userdata["id"];
        $data["leavetype"] = $LeaveTypes;
        $staffRole = $this->adminprofile_model->getStaffRole();
        $data["staffrole"] = $staffRole;
        $data["status"] = $this->status;

        $this->load->view("layout/header", $data);
        $this->load->view("admin/adminprofile/leaverequest", $data);
        $this->load->view("layout/footer", $data);
    }

    public function change_password($id) {

        $sessionData = $this->session->userdata('admin');
        //$userdata = $this->customlib->getUserData();

        $this->form_validation->set_rules('new_pass', $this->lang->line('new_password'), 'trim|required|xss_clean|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {

            $msg = array(
                'new_pass' => form_error('new_pass'),
                'confirm_pass' => form_error('confirm_pass'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            if (!empty($id)) {
                $newdata = array(
                    'id' => $id,
                    'password' => $this->enc_lib->passHashEnc($this->input->post('new_pass')),
                );

                $query2 = $this->admin_model->saveNewPass($newdata);
                if ($query2) {
                    $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('password_changed_successfully'));
                } else {

                    $array = array('status' => 'fail', 'error' => '', 'message' => $this->lang->line('password_not_changed'));
                }
            } else {
                $array = array('status' => 'fail', 'error' => '', 'message' => $this->lang->line('password_not_changed'));
            }
        }

        echo json_encode($array);
    }

    public function import() {
        $data['field'] = array(
            "staff_id" => "staff_id",
            "first_name" => "first_name",
            "last_name" => "last_name",
            "father_name" => "father_name",
            "mother_name" => "mother_name",
            "email_login_username" => "email",
            "gender" => "gender",
            "date_of_birth" => "date_of_birth",
            "date_of_joining" => "date_of_joining",
            "phone" => "phone",
            "emergency_contact_number" => "emergency_contact_number",
            "marital_status" => "marital_status",
            "current_address" => "current_address",
            "permanent_address" => "permanent_address",
            "qualification" => "qualification",
            "work_experience" => "work_experience",
            "note" => "note",
        );
        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        $designation = $this->adminprofile_model->getStaffDesignation();
        $data["designation"] = $designation;
        $department = $this->adminprofile_model->getDepartment();
        $data["department"] = $department;

        $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_csv_upload');
        $this->form_validation->set_rules('role', $this->lang->line('role'), 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("admin/adminprofile/import/import", $data);
            $this->load->view("layout/footer", $data);
        } else {

            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {

                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if ($ext == 'csv') {

                    $file = $_FILES['file']['tmp_name'];
                    $this->load->library('CSVReader');
                    $result = $this->csvreader->parse_file($file);

                    $rowcount = 0;

                    if (!empty($result)) {

                        foreach ($result as $r_key => $r_value) {

                            $check_exists = $this->adminprofile_model->import_check_data_exists($result[$r_key]['name'], $result[$r_key]['employee_id']);
                            $check_emailexists = $this->adminprofile_model->import_check_email_exists($result[$r_key]['name'], $result[$r_key]['employee_id']);

                            if ($check_exists == 0 && $check_emailexists == 0) {

                                $result[$r_key]['employee_id'] = $this->encoding_lib->toUTF8($result[$r_key]['employee_id']);
                                $result[$r_key]['qualification'] = $this->encoding_lib->toUTF8($result[$r_key]['qualification']);
                                $result[$r_key]['work_exp'] = $this->encoding_lib->toUTF8($result[$r_key]['work_exp']);
                                $result[$r_key]['name'] = $this->encoding_lib->toUTF8($result[$r_key]['name']);
                                $result[$r_key]['surname'] = $this->encoding_lib->toUTF8($result[$r_key]['surname']);
                                $result[$r_key]['father_name'] = $this->encoding_lib->toUTF8($result[$r_key]['father_name']);
                                $result[$r_key]['mother_name'] = $this->encoding_lib->toUTF8($result[$r_key]['mother_name']);
                                $result[$r_key]['contact_no'] = $this->encoding_lib->toUTF8($result[$r_key]['contact_no']);
                                $result[$r_key]['emergency_contact_no'] = $this->encoding_lib->toUTF8($result[$r_key]['emergency_contact_no']);
                                $result[$r_key]['email'] = $this->encoding_lib->toUTF8($result[$r_key]['email']);
                                $result[$r_key]['dob'] = $this->encoding_lib->toUTF8($result[$r_key]['dob']);
                                $result[$r_key]['marital_status'] = $this->encoding_lib->toUTF8($result[$r_key]['marital_status']);
                                $result[$r_key]['date_of_joining'] = $this->encoding_lib->toUTF8($result[$r_key]['date_of_joining']);
                                $result[$r_key]['date_of_leaving'] = $this->encoding_lib->toUTF8($result[$r_key]['date_of_leaving']);
                                $result[$r_key]['local_address'] = $this->encoding_lib->toUTF8($result[$r_key]['local_address']);
                                $result[$r_key]['permanent_address'] = $this->encoding_lib->toUTF8($result[$r_key]['permanent_address']);
                                $result[$r_key]['note'] = $this->encoding_lib->toUTF8($result[$r_key]['note']);
                                $result[$r_key]['gender'] = $this->encoding_lib->toUTF8($result[$r_key]['gender']);
                                $result[$r_key]['account_title'] = $this->encoding_lib->toUTF8($result[$r_key]['account_title']);
                                $result[$r_key]['bank_account_no'] = $this->encoding_lib->toUTF8($result[$r_key]['bank_account_no']);
                                $result[$r_key]['bank_name'] = $this->encoding_lib->toUTF8($result[$r_key]['bank_name']);
                                $result[$r_key]['ifsc_code'] = $this->encoding_lib->toUTF8($result[$r_key]['ifsc_code']);
                                $result[$r_key]['payscale'] = $this->encoding_lib->toUTF8($result[$r_key]['payscale']);
                                $result[$r_key]['basic_salary'] = $this->encoding_lib->toUTF8($result[$r_key]['basic_salary']);
                                $result[$r_key]['epf_no'] = $this->encoding_lib->toUTF8($result[$r_key]['epf_no']);
                                $result[$r_key]['contract_type'] = $this->encoding_lib->toUTF8($result[$r_key]['contract_type']);
                                $result[$r_key]['shift'] = $this->encoding_lib->toUTF8($result[$r_key]['shift']);
                                $result[$r_key]['location'] = $this->encoding_lib->toUTF8($result[$r_key]['location']);
                                $result[$r_key]['facebook'] = $this->encoding_lib->toUTF8($result[$r_key]['facebook']);
                                $result[$r_key]['twitter'] = $this->encoding_lib->toUTF8($result[$r_key]['twitter']);
                                $result[$r_key]['linkedin'] = $this->encoding_lib->toUTF8($result[$r_key]['linkedin']);
                                $result[$r_key]['instagram'] = $this->encoding_lib->toUTF8($result[$r_key]['instagram']);
                                $result[$r_key]['resume'] = $this->encoding_lib->toUTF8($result[$r_key]['resume']);
                                $result[$r_key]['joining_letter'] = $this->encoding_lib->toUTF8($result[$r_key]['joining_letter']);
                                $result[$r_key]['resignation_letter'] = $this->encoding_lib->toUTF8($result[$r_key]['resignation_letter']);
                                $result[$r_key]['user_id'] = $this->input->post('role');
                                $result[$r_key]['designation'] = $this->input->post('designation');
                                $result[$r_key]['department'] = $this->input->post('department');
                                $result[$r_key]['is_active'] = 1;

                                $password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);

                                $result[$r_key]['password'] = $this->enc_lib->passHashEnc($password);

                                $role_array = array('role_id' => $this->input->post('role'), 'staff_id' => 0);

                                $insert_id = $this->adminprofile_model->batchInsert($result[$r_key], $role_array);
                                $staff_id = $insert_id;
                                if ($staff_id) {

                                    $teacher_login_detail = array('id' => $staff_id, 'credential_for' => 'staff', 'username' => $result[$r_key]['email'], 'password' => $password, 'contact_no' => $result[$r_key]['contact_no'], 'email' => $result[$r_key]['email']);

                                    $this->mailsmsconf->mailsms('login_credential', $teacher_login_detail);
                                }
                                $rowcount++;
                            }
                        } ///Result loop
                    } //Not emprty l

                    $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('records_found_in_CSV_file_total') . $rowcount . $this->lang->line('records_imported_successfully'));
                }
            } else {
                $msg = array(
                    'e' => $this->lang->line('the_file_field_is_required'),
                );
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('total') . ' ' . count($result) . " " . $this->lang->line('records_found_in_CSV_file_total') . ' ' . $rowcount . ' ' . $this->lang->line('records_imported_successfully') . '</div>');
            redirect('admin/adminprofile/import');
        }
    }

    public function handle_csv_upload() {
        $error = "";
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('csv');
            $mimes = array('text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt');
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if (!in_array($_FILES['file']['type'], $mimes)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($error == "") {
                return true;
            }
        } else {
            $this->form_validation->set_message('handle_csv_upload', $this->lang->line('please_select_file'));
            return false;
        }
    }

    public function exportformat() {
        $this->load->helper('download');
        $filepath = "./backend/import/staff_csvfile.csv";
        $data = file_get_contents($filepath);
        $name = 'staff_csvfile.csv';

        force_download($name, $data);
    }

    public function rating() {

        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'HR/rating');
        $this->load->view('layout/header');
        $staff_list = $this->adminprofile_model->getrat();

        $data['resultlist'] = $staff_list;

        $this->load->view('admin/adminprofile/rating', $data);
        $this->load->view('layout/footer');
    }

    public function ratingapr($id) {
        $approve['status'] = '1';
        $this->adminprofile_model->ratingapr($id, $approve);
        redirect('admin/adminprofile/rating');
    }

    public function delete_rateing($id) {
        $this->adminprofile_model->rating_remove($id);
        redirect('admin/adminprofile/rating');
    }

    /**
     * Transfers fund from one account to another.
     * @return Response
     */
    public function postAddSubscription(){

        if (!$this->rbac->hasPrivilege('adminprofile', 'can_edit')) {
            access_denied();
        }
       
        $this->form_validation->set_rules('package_id', $this->lang->line('package_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('paid_via', $this->lang->line('paid_via'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            
            $msg = array(
                'package_id' => form_error('package_id'),
                'account_title' => form_error('account_title'),
                'paid_via' => form_error('paid_via'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');

        }else{
            
            $business_id        = $this->input->post('business_id');
            $package_id         = $this->input->post('package_id');
            $pack_amount        = $this->input->post('pack_amount');
            $paid_via           = $this->input->post('paid_via');
            $bank_account_id    = $this->input->post('paid_via');
            $reference_number   = $this->input->post('reference_number');
            $payment_transaction_id = $this->input->post('payment_transaction_id');
            $account_id         = $this->input->post('account_title');
            
            if (!empty($pack_amount)) {

                $package  = $this->packages_model->getActivePackage($package_id);
                
                $subscription = array(
                    'business_id' => $business_id,
                    'package_id'=>$package_id,
                    'package_price'=>$pack_amount,
                    'paid_via' => $paid_via,
                    'bank_account_id' => $bank_account_id,
                    'reference_number' => $reference_number,
                    'payment_transaction_id' => $payment_transaction_id,
                );
               
                if (in_array($paid_via, ['offline', 'easypaisa'])) {
                    //If offline then dates will be decided when approved by superadmin
                    $subscription['start_date'] = null;
                    $subscription['end_date'] = null;
                    $subscription['trial_end_date'] = null;
                    $subscription['status'] = 'waiting';
                } else {
                    $dates = $this->get_package_dates($business_id, $package);
                    $subscription['start_date'] = $dates['start'];
                    $subscription['end_date'] = $dates['end'];
                    $subscription['trial_end_date'] = $dates['trial'];
                    $subscription['status'] = 'waiting';
                }
                 
                $subscription['package_price'] = $package['price'];
                $subscription['package_details'] = [
                        'location_count' => $package['number_of_location'],
                        'user_count' => $package['number_of_users'],
                        'product_count' => $package['number_of_files'],
                        'invoice_count' => $package['number_of_cases'],
                        'name' => $package['name']
                    ];
                $subscription['package_details'] = json_encode($subscription['package_details']); 
                $subscription['created_id'] = $this->userdata['id'];
                
                $subscription_id = $this->packages_model->subscribe($subscription);

                if($subscription_id){

                    if($this->input->post('paid_via')==104){
                        $bank_account_id   = $this->input->post('paid_via');
                        $reference_number  = $this->input->post('reference_number');
                    }else{
                        $bank_account_id   = $this->input->post('paid_via');
                        $reference_number  = '';
                    }

                    $deposit_to  = $this->account_model->getNameFrom($account_id);
                    $credit_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'voucher_id'=>$subscription_id,
                        'voucher_number'=>$payment_transaction_id,
                        'voucher_type'=>'SUB',
                        'amount' => $package['price'],
                        'account_id' => $account_id,
                        'user_id' => $this->userdata['admin_id'],
                        'staff_type' => 'staff',
                        'fund_trans_deposit'=>$deposit_to,
                        'type' => 'credit',
                        'sub_type' => 'deposit',
                        'description'=>'Packages Subscription',
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($dates['start'])),
                        'created_by' => $this->userdata['id']
                    );
                    
                    $credit_id = $this->account_model->createAccountTransaction($credit_data);
                    $to_account = $this->account_model->getNameFrom($bank_account_id);

                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $to_account;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $bank_account_id;
                    $debit_data['transfer_transaction_id'] = $credit_id;
                    
                    $debit_id = $this->account_model->createAccountTransaction($debit_data);
                    $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($data);

                    $admin_packages_array = $this->packagesubscription_model->getAdminSubscriptions($business_id, $subscription_id);
                    $superAdmin_setting_detail = $this->setting_model->getSetting(1);
                    $userName = $admin_packages_array['name'].' '.$admin_packages_array['surname'];

                    $package_subscription_details = array('super_admin_email' => $superAdmin_setting_detail->email, 'username' => $userName, 'contact_no' => $admin_packages_array['contact_no'], 'email' => $admin_packages_array['email'], 'package_name' => $admin_packages_array['package_name'],'package_price' => $admin_packages_array['price'], 'start_date' => $admin_packages_array['start_date'], 'trial_end_date' => $admin_packages_array['trial_end_date'], 'end_date' => $admin_packages_array['end_date']);

                    $this->mailsmsconf->mailsms('student_admission', $package_subscription_details);

                }

                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            }

        }

        echo json_encode($array);

    }

    protected function get_package_dates($business_id, $package)
    {
        $output = ['start' => '', 'end' => '', 'trial' => ''];
        //calculate start date
        $start_date  = $this->packages_model->getEndDate($business_id);
        $output['start'] = $start_date;
        //Calculate end date
        if ($package['price_interval'] == 'Days') {
            
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' day') ); 
        }elseif ($package['price_interval'] == 'Months') {
            
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' month') ); 
        }elseif ($package['price_interval'] == 'Years') {
            
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' year') );
        }
        
        if($start_date){
            $output['trial'] = date( "Y-m-d", strtotime($start_date.'+ '.$package['trial_days'].' day'));
        }else{
            $output['trial'] = date( "Y-m-d", strtotime($start_date.'+ '.$package['trial_days'].' day'));
        }

        return $output;
    }

    public function getPackageAmount(){
        $package_id = $this->input->post('package_id');
        $package_amount  = $this->packages_model->getActivePackage($package_id);
        echo $package_amount['price'];
    }

    /**
     * Shows form to add subscription.
     * @param  int $id
     * @return Response
     */
    public function add_subscription(){

        $business_id     =  $this->input->post('business_id'); 
        $invoice_number  = $this->packages_model->isInvoiceNoExist();
        if(empty($invoice_number->payment_transaction_id)){
            $payment_transaction_id = 'SUB'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_number->payment_transaction_id);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $payment_transaction_id = 'SUB'.date('d').date('m').date('y').'00000'.$randno;
        }
        $bankAccounts = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $subsAccounts = $this->account_model->getBankAccount(46, $this->userdata['admin_id']);
        $packages     = $this->packages_model->getActivePackage();

        $modalData = '';
        $modalData .= '<div id="addSubscription" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog2 modal-md">
                    <div class="modal-content">
                        <div class="modal-header themecolor">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Add Subscription</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="POST" id="subscription_form" action="adminprofile/postAddSubscription" accept-charset="UTF-8" enctype="multipart/form-data">
                                    
                                    <div class="modal-body">
                                        <input name="business_id" type="hidden" value="'.$business_id.'">';
                                    $modalData.='<div class="form-group">
                                        <label for="package_id">Packages:*</label>
                                        <select class="form-control" id="package_id" name="package_id" onchange="getAmount()">';
                                        $modalData.='<option value="">'.$this->lang->line('select').'</option>';
                                    foreach($packages as $package){
                                            $modalData.='<option value="'.$package['id'].'">'.$package['name'].'</option>';
                                    }
                                    $modalData.='</select>
                                                </div>';
                                    
                                    $modalData.='<div style="display: none;" id="package_amount">
                                                    <div class="form-group col-md-6">
                                                        <label for="account_title">Account Title:</label>
                                                         <select class="form-control" id="account_title" name="account_title">';
                                                            $modalData.='<option value="">'.$this->lang->line('select').'</option>';
                                                                foreach ($subsAccounts as $subsAccount) {
                                                                    $modalData.='<option value="'.$subsAccount['id'].'">'.$subsAccount['account_title'].'</option>';
                                                                }
                                                            
                                                            $modalData.='</select>   
                                                        
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="pack_amount">Amount:</label>
                                                        <input class="form-control" name="pack_amount" type="text" value="" id="pack_amount" readonly >
                                                    </div>
                                                
                                                </div>';
                                    
                                    $modalData.='<div class="form-group">
                                                <label for="paid_via">Paid Via Cash/Bank:*</label>
                                                <select class="form-control" id="paid_via" name="paid_via" onchange="gettype()">';
                                    $modalData.='<option value="">'.$this->lang->line('select').' </option>';
                                    $modalData.='<option value="107">Cash</option>';
                                    $modalData.='<option value="104">Bank</option>';
                                    $modalData.='</select>
                                                </div>';

                                    $modalData.='<div style="display: none;" id="bank_accounts_div">
                                                <div class="form-group">
                                                <label for="bank_account_id">Bank Acc:*</label>
                                                <select class="form-control" id="bank_account_id" name="bank_account_id" onchange="getref()">';
                                    $modalData.='<option value="">'.$this->lang->line('select').'</option>';
                                        foreach ($bankAccounts as $bankAccount) {
                                            $modalData.='<option value="'.$bankAccount['id'].'">'.$bankAccount['account_title'].'</option>';
                                        }
                                    
                                    $modalData.='</select>
                                                </div></div>';
                                    $modalData.='<div style="display: none;" id="reference_number_div">
                                                    <div class="form-group">
                                                    <label for="amount">Reference Number:*</label>
                                                    <input class="form-control" name="reference_number" type="text" value="" id="reference_number" >
                                                </div></div>';

                                    $modalData.='<div class="form-group">
                                                    <label for="amount">Transaction Id:*</label>
                                                    <input class="form-control" required="" placeholder="Transaction Id" name="payment_transaction_id" type="text" value="'.$payment_transaction_id.'" id="payment_transaction_id" readonly>
                                                </div>';

                                    $modalData.='</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn_subscription themecolor">Submit</button>
                                        <button type="button" class="btn btn-default themecolor" data-dismiss="modal">Close</button>
                                    </div>
                                </form>                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        echo $modalData;

    }

    public function getStateByCountryID(){
        $id = $this->input->post('country_id'); 
        $states = $this->court_model->getStates($id);
        echo json_encode(array('status' => 1, 'result' => $states));
    }
    public function getCityByStateID(){
        $id = $this->input->post('state_id'); 
        $cities = $this->court_model->getCities($id);
        echo json_encode(array('status' => 1, 'result' => $cities));
    }



}
