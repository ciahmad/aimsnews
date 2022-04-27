<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Packages extends Admin_Controller {

    public $sch_setting_detail = array();

    public function __construct() {
        parent::__construct();

        $this->config->load("payroll");
        $this->config->load("app-config");
        $this->load->library('Enc_lib');
        $this->load->library('mailsmsconf');
        $this->load->model("packages_model");
        $this->load->library('encoding_lib');
        $this->load->model("leaverequest_model");
        $this->load->model("setting_model");
        $this->contract_type = $this->config->item('contracttype');
        $this->marital_status = $this->config->item('marital_status');
        $this->staff_attendance = $this->config->item('staffattendance');
        $this->payroll_status = $this->config->item('payroll_status');
        $this->payment_mode = $this->config->item('payment_mode');
        $this->status = $this->config->item('status');
        $userdata = $this->customlib->getUserData();
        $this->sch_setting_detail = $this->setting_model->getSetting($userdata['admin_id']);
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('packages', 'can_view')) {
            access_denied();
        }

        $data['title'] = 'Packages List';
        //$data['fields'] = $this->customfield_model->get_custom_fields('packages', 1);
        $this->session->set_userdata('menu_heading', 'SUPERADMIN');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/packages');
        $search = $this->input->post("search");
        $packages = $this->packages_model->getPackages("", 1);
        $data['packageslist'] = $packages;
        //print_r($data['packageslist']); die();
        $staffRole = $this->packages_model->getStaffRole();
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
                    $resultlist = $this->packages_model->getEmployee($role, 1);
                    $data['resultlist'] = $resultlist;
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $resultlist = $this->packages_model->searchAdminList($search_text, 1);

                $data['resultlist'] = $resultlist;
                $data['title'] = 'Search Details: ' . $data['search_text'];
            }
        }

        $this->load->view('layout/header');
        $this->load->view('admin/packages/packageslist', $data);
        $this->load->view('layout/footer');
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
        $this->session->set_userdata('sub_menu', 'HR/packages/disablestafflist');
        $data['title'] = 'Staff Search';
        $staffRole = $this->packages_model->getStaffRole();
        $data["role"] = $staffRole;
        $search = $this->input->post("search");
        $search_text = $this->input->post('search_text');
        $resultlist = $this->packages_model->searchFullText($search_text, 0);
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
                    $resultlist = $this->packages_model->getEmployee($role, 0);
                    $data['resultlist'] = $resultlist;
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $resultlist = $this->packages_model->searchFullText($search_text, 0);
                $data['resultlist'] = $resultlist;
                $data['title'] = 'Search Details: ' . $data['search_text'];
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('admin/packages/disablestaff', $data);
        $this->load->view('layout/footer', $data);
    }

    public function profile($id) {
        //print_r($this->customlib->getStaffID()); die();
        $data['enable_disable'] = 1;
        if ($this->customlib->getStaffID() == $id) {
            $data['enable_disable'] = 0;
        } else if (!$this->rbac->hasPrivilege('packages', 'can_view')) {
            access_denied();
        }

        $this->load->model("staffattendancemodel");
        $this->load->model("setting_model");
        $data["id"] = $id;
        $data['title'] = 'Staff Details';
        $staff_info = $this->packages_model->getAdminProfile($id);

        $userdata = $this->customlib->getUserData();

        $userid = $userdata['id'];
        $timeline_status = '';

        if ($userid == $id) {
            $timeline_status = 'yes';
        }
        
        $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status);
        $data["timeline_list"] = $timeline_list;
        $staff_payroll = $this->packages_model->getStaffPayroll($id);
        $admin_clients = $this->client_model->getclients($id);
        $data['adminuserlist'] = $admin_clients;
        $admin_staffs = $this->staff_model->getstaffs($id);
        $data['adminstafflist'] = $admin_staffs;
        //print_r($data['adminstafflist']); die();
        //$staff_leaves = $this->leaverequest_model->staff_leave_request($id);
        //$alloted_leavetype = $this->packages_model->allotedLeaveType($id);
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $this->load->model("payroll_model");
        $salary = $this->payroll_model->getSalaryDetails($id);

        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
        $data['attendencetypeslist'] = $attendencetypes;

        // $i = 0;
        // $leaveDetail = array();
        // foreach ($alloted_leavetype as $key => $value) {
        //     $count_leaves[] = $this->leaverequest_model->countLeavesData($id, $value["leave_type_id"]);
        //     $leaveDetail[$i]['type'] = $value["type"];
        //     $leaveDetail[$i]['alloted_leave'] = $value["alloted_leave"];
        //     $leaveDetail[$i]['approve_leave'] = $count_leaves[$i]['approve_leave'];
        //     $i++;
        // }
        //$data["leavedetails"] = $leaveDetail;
        $data["staff_leaves"] = $staff_leaves;
        $data['staff_doc_id'] = $id;
        $data['staff'] = $staff_info;
        $data['staff_payroll'] = $staff_payroll;
        $data['salary'] = $salary;

        $monthlist = $this->customlib->getMonthDropdown();

        $startMonth = $this->setting_model->getStartMonth();
        $data["monthlist"] = $monthlist;
        $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
        $session_current = $this->setting_model->getCurrentSessionName();
        $startMonth = $this->setting_model->getStartMonth();
        $centenary = substr($session_current, 0, 2); //2017-18 to 2017
        $year_first_substring = substr($session_current, 2, 2); //2017-18 to 2017
        $year_second_substring = substr($session_current, 5, 2); //2017-18 to 18
        $month_number = date("m", strtotime($startMonth));
        $data['rate_canview'] = 0;

        if ($id != '1') {
            $staff_rating = $this->packages_model->staff_ratingById($id);

            if ($staff_rating['total'] >= 3) {
                $data['rate'] = ($staff_rating['rate'] / $staff_rating['total']);

                $data['rate_canview'] = 1;
            }
            $data['reviews'] = $staff_rating['total'];
        }

        $data['reviews_comment'] = $this->packages_model->staff_ratingById($id);

        $year = date("Y");
        
        //$staff_list = $this->packages_model->user_reviewlist($id);
        //$data['user_reviewlist'] = $staff_list;

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


        $session = $this->setting_model->getCurrentSessionName();
        
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
        $stafflist = $this->packages_model->get();
        $data['stafflist'] = $stafflist;
        //print_r($data); die();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/packages/packageslist', $data); 
        $this->load->view('layout/footer', $data);
    }

    public function countAttendance($st_month, $no_of_months, $emp) {

        $record = array();
        for ($i = 1; $i <= 1; $i++) {

            $r = array();
            $month = date('m', strtotime($st_month . " -$i month"));
            $year = date('Y', strtotime($st_month . " -$i month"));

            foreach ($this->staff_attendance as $att_key => $att_value) {

                $s = $this->packages_model->count_attendance($year, $emp, $att_value);

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
        $startMonth = $this->setting_model->getStartMonth();
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
        $this->packages_model->doc_delete($id, $doc, $file);
        $this->session->set_flashdata('msg', '<i class="fa fa-check-square-o" aria-hidden="true"></i>' . $this->lang->line('delete_message') . '');
        redirect('admin/packages/profile/' . $id);
    }

    public function ajax_attendance($id) {
        $this->load->model("staffattendancemodel");
        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
        $data['attendencetypeslist'] = $attendencetypes;
        $year = $this->input->post("year");
        $data["year"] = $year;
        if (!empty($year)) {

            $monthlist = $this->customlib->getMonthDropdown();
            $startMonth = $this->setting_model->getStartMonth();
            $data["monthlist"] = $monthlist;
            $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
            $session_current = $this->setting_model->getCurrentSessionName();
            $startMonth = $this->setting_model->getStartMonth();

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

            $this->load->view("admin/packages/ajaxattendance", $data);
        } else {

            echo "No Record Found";
        }
    }

    public function create() {
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/packages');

        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        $priceintervals = $this->customlib->getintervals();
        $data['intervals'] = $priceintervals;
        $data['title'] = 'Add Admin Profile';
        
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('role', $this->lang->line('role'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('dob', $this->lang->line('date_of_birth'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
        // $this->form_validation->set_rules('first_doc', $this->lang->line('image'), 'callback_handle_first_upload');
        // $this->form_validation->set_rules('second_doc', $this->lang->line('image'), 'callback_handle_second_upload');
        // $this->form_validation->set_rules('third_doc', $this->lang->line('image'), 'callback_handle_third_upload');
        // $this->form_validation->set_rules('fourth_doc', $this->lang->line('image'), 'callback_handle_fourth_upload');
        // $this->form_validation->set_rules(
        //         'email', $this->lang->line('email'), array('required', 'valid_email',
        //     array('check_exists', array($this->packages_model, 'valid_email_id')),
        //         )
        // );

        // if (!$this->sch_setting_detail->staffid_auto_insert) {

        //     $this->form_validation->set_rules('employee_id', $this->lang->line('staff_id'), 'callback_username_check');
        // }

        //$this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');

        if ($this->form_validation->run() == true) {

            //$account_no = $this->input->post("account_no");
            //$department = $this->input->post("department");
            //$designation = $this->input->post("designation");
            //$percentage_of_shares = $this->input->post("percentage_of_shares");
            $role = 1;
            if($this->input->post("is_active")!=''){
                $is_active =  $this->input->post("is_active"); 
            }else{
                $is_active =  0; 
            }
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $number_of_location = $this->input->post("number_of_location");
            $number_of_users = $this->input->post("number_of_users");
            $number_of_files = $this->input->post("number_of_files");
            $number_of_cases = $this->input->post("number_of_cases");
            $price_interval = $this->input->post("price_interval");
            $interval_count = $this->input->post("interval_count");
            $trial_days = $this->input->post("trial_days");
            $price = $this->input->post("price");
            $sort_order = $this->input->post("sort_order");

            $data_insert = array(
                'name' => $name,
                'description' => $description,
                'number_of_location' => $number_of_location,
                'number_of_users' => $number_of_users,
                'number_of_files' => $number_of_files,
                'number_of_cases' => $number_of_cases,
                'price_interval' => $price_interval,
                'interval_count' => $interval_count,
                'trial_days' => $trial_days,
                'price' => $price,
                'sort_order' => $sort_order,
                'created_at' => date('Y-m-d'),
                'is_active' => $is_active,
            );

            if (isset($name)) {
                $data_insert['name'] = $name;
            }if (isset($description)) {
                $data_insert['description'] = $description;
            }
            if (isset($number_of_location)) {
                $data_insert['number_of_location'] = $number_of_location;
            }
            if (isset($$number_of_users)) {
                $data_insert['number_of_users'] = $number_of_users;
            }
            if (isset($number_of_files)) {
                $data_insert['number_of_files'] = $number_of_files;
            }
            if (isset($number_of_cases)) {
                $data_insert['number_of_cases'] = $number_of_cases;
            }
            if (isset($price_interval)) {
                $data_insert['price_interval'] = $price_interval;
            }
            if (isset($interval_count)) {
                $data_insert['interval_count'] = $interval_count;
            }
            if (isset($trial_days)) {
                $data_insert['trial_days'] = $trial_days;
            }
            if (isset($price)) {
                $data_insert['price'] = $price;
            }
            if (isset($sort_order)) {
                $data_insert['sort_order'] = $sort_order;
            }

            //==========================
            $insert = true;
            // $employee_id_exists = $this->packages_model->check_adminid_exists($account_no);
            // if ($employee_id_exists) {
            //     $insert = false;
            // }
            
            //==========================
            if ($insert) {
                
                $insert_id = $this->packages_model->insertPackage($data_insert);
                //==========================
                $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
                redirect('admin/packages');
            } else {
                $this->load->view('layout/header', $data);
                $this->load->view('admin/packages/packagecreate', $data);
                $this->load->view('layout/footer', $data);
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('admin/packages/packagecreate', $data);
        $this->load->view('layout/footer', $data);
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
        $staff_info = $this->packages_model->getProfile($id);
        $userdata = $this->customlib->getUserData();

        $userid = $userdata['id'];
        $timeline_status = '';

        if ($userid == $id) {
            $timeline_status = 'yes';
        }

        $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status);
        $data["timeline_list"] = $timeline_list;
        $staff_payroll = $this->packages_model->getStaffPayroll($id);
        $staff_leaves = $this->leaverequest_model->staff_leave_request($id);
        $alloted_leavetype = $this->packages_model->allotedLeaveType($id);
       
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
        $startMonth = $this->setting_model->getStartMonth();
        $data["monthlist"] = $monthlist;
        $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
        $session_current = $this->setting_model->getCurrentSessionName();
        $startMonth = $this->setting_model->getStartMonth();
        $centenary = substr($session_current, 0, 2); //2017-18 to 2017
        $year_first_substring = substr($session_current, 2, 2); //2017-18 to 2017
        $year_second_substring = substr($session_current, 5, 2); //2017-18 to 18
        $month_number = date("m", strtotime($startMonth));
        $data['rate_canview'] = 0;

        if ($id != '1') {
            $staff_rating = $this->packages_model->staff_ratingById($id);

            if ($staff_rating['total'] >= 3) {
                $data['rate'] = ($staff_rating['rate'] / $staff_rating['total']);

                $data['rate_canview'] = 1;
            }
            $data['reviews'] = $staff_rating['total'];
        }

        $data['reviews_comment'] = $this->packages_model->staff_ratingById($id);

        $year = date("Y");

        $staff_list = $this->packages_model->user_reviewlist($id);
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


        $session = $this->setting_model->getCurrentSessionName();

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
        $stafflist = $this->packages_model->get();
        $data['stafflist'] = $stafflist;

          $this->load->view('layout/header', $data);
          $this->load->view('admin/packages/staffreport', $data);
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

            $result = $this->packages_model->valid_employee_id($str);
            if ($result == false) {

                return false;
            }
            return true;
        }
    }

    public function edit($id) {
        if (!$this->rbac->hasPrivilege('packages', 'can_edit')) {
            access_denied();
        }
        // $account_no = $this->packages_model->isInvoiceNoExist();
        // if(empty($account_no->account_no)){
        //     $data['account_no'] = 'LP'.date('d').date('m').date('y').'000001'; 
        // }else{
        //     $exp = explode('00000', $account_no->account_no);
        //     if(isset($exp[1])){ $randno = $exp[1]+1;}
        //     $data['account_no'] = 'LP'.date('d').date('m').date('y').'00000'.$randno;
        // }
        //print_r($data['account_no']); die();
        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $userdata = $this->customlib->getUserData();

        $data['title'] = 'Edit Admin';
        $data['id'] = $id;
        $priceintervals = $this->customlib->getintervals();
        $data['intervals'] = $priceintervals;
        $country_results = $this->court_model->getCountries();
        $data['countries'] = $country_results;
        $payscaleList = $this->packages_model->getPayroll();
        $leavetypeList = $this->packages_model->getLeaveType();
        $data["leavetypeList"] = $leavetypeList;
        $data["payscaleList"] = $payscaleList;
        $staffRole = $this->packages_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        //$designation = $this->packages_model->getStaffDesignation();
        //$data['shares'] = $this->packages_model->getPercentageOfShares();
        // if($data['shares']){
        //     $data['shares_id'] = $data['shares'][0]['id'];
        // }else{
        //     $data['shares_id'] ='';
        // }
        
        //$data["designation"] = $designation;
       // print_r($data["designation"]); die();
        //$department = $this->packages_model->getDepartment();
        //$data["department"] = $department;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        $data['title'] = 'Edit Staff';
        $package = $this->packages_model->get($id);
        $data['editpackage'] = $package;
        //print_r($data['packages']); die();
        $data["contract_type"] = $this->contract_type;
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }

        $staffLeaveDetails = $this->packages_model->getLeaveDetails($id);
        $data['staffLeaveDetails'] = $staffLeaveDetails;
        $resume = $this->input->post("resume");
        $joining_letter = $this->input->post("joining_letter");
        $resignation_letter = $this->input->post("resignation_letter");
        $other_document_name = $this->input->post("other_document_name");
        $other_document_file = $this->input->post("other_document_file");
        

        $this->form_validation->set_rules('name', 'First name', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('role', 'Role', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
        // $this->form_validation->set_rules('first_doc', $this->lang->line('image'), 'callback_handle_first_upload');
        // $this->form_validation->set_rules('second_doc', $this->lang->line('image'), 'callback_handle_second_upload');
        // $this->form_validation->set_rules('third_doc', $this->lang->line('image'), 'callback_handle_third_upload');
        // $this->form_validation->set_rules('fourth_doc', $this->lang->line('image'), 'callback_handle_fourth_upload');

        // if (!$this->sch_setting_detail->staffid_auto_insert) {

        //     $this->form_validation->set_rules('employee_id', $this->lang->line('staff_id'), 'callback_username_check');
        // }

        // $this->form_validation->set_rules(
        //         'email', $this->lang->line('email'), array('required', 'valid_email',
        //     array('check_exists', array($this->packages_model, 'valid_email_id')),
        //         )
        // );

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/header', $data);
            $this->load->view('admin/packages/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            
            if($this->input->post("is_active")!=''){
                $is_active =  $this->input->post("is_active"); 
            }else{
                $is_active =  0; 
            }
            
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $number_of_location = $this->input->post("number_of_location");
            $number_of_users = $this->input->post("number_of_users");
            $number_of_files = $this->input->post("number_of_files");
            $number_of_cases = $this->input->post("number_of_cases");
            $price_interval = $this->input->post("price_interval");
            $interval_count = $this->input->post("interval_count");
            $trial_days = $this->input->post("trial_days");
            $price = $this->input->post("price");
            $sort_order = $this->input->post("sort_order");

            $data_insert = array(
                'id'=>$id,
                'name' => $name,
                'description' => $description,
                'number_of_location' => $number_of_location,
                'number_of_users' => $number_of_users,
                'number_of_files' => $number_of_files,
                'number_of_cases' => $number_of_cases,
                'price_interval' => $price_interval,
                'interval_count' => $interval_count,
                'trial_days' => $trial_days,
                'price' => $price,
                'is_active'=>$is_active,
                'sort_order' => $sort_order
            );

            //print_r($data_insert); die();

            if (isset($name)) {
                $data_insert['name'] = $name;
            }if (isset($description)) {
                $data_insert['description'] = $description;
            }
            if (isset($number_of_location)) {
                $data_insert['number_of_location'] = $number_of_location;
            }
            if (isset($$number_of_users)) {
                $data_insert['number_of_users'] = $number_of_users;
            }
            if (isset($number_of_files)) {
                $data_insert['number_of_files'] = $number_of_files;
            }
            if (isset($number_of_cases)) {
                $data_insert['number_of_cases'] = $number_of_cases;
            }
            if (isset($price_interval)) {
                $data_insert['price_interval'] = $price_interval;
            }
            if (isset($interval_count)) {
                $data_insert['interval_count'] = $interval_count;
            }
            if (isset($trial_days)) {
                $data_insert['trial_days'] = $trial_days;
            }
            if (isset($price)) {
                $data_insert['price'] = $price;
            }
            if (isset($sort_order)) {
                $data_insert['sort_order'] = $sort_order;
            }

            $insert_id = $this->packages_model->add($data_insert);

            //$role_id = $this->input->post("role");
            // if($staff["role_id"]!=7){
            //     $role_data = array('staff_id' => $id, 'role_id' => 1);
            //     $this->packages_model->update_role($role_data);
            // }
            
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/packages');
        }
    }

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('packages', 'can_delete')) {
            access_denied();
        }

        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $userdata = $this->customlib->getUserData();
        $staff = $this->packages_model->get($id);

        if ($staff['id'] == $userdata['id']) {
            $a = 1;
        } else if ($staff["role_id"] == 7) {
            $a = 1;
        }

        if ($a == 1) {
            access_denied();
        }
        $data['title'] = 'Packages List';
        $this->packages_model->remove($id);
        redirect('admin/packages');
    }

    public function disablestaff($id) {
        if (!$this->rbac->hasPrivilege('disable_staff', 'can_view')) {

            access_denied();
        }


        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $userdata = $this->customlib->getUserData();
        $staff = $this->packages_model->get($id);
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }
        $data = array('id' => $id, 'disable_at' => date('Y-m-d', $this->customlib->datetostrtotime($_POST['date'])), 'is_active' => 0);
        $this->packages_model->disablestaff($data);
        $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        echo json_encode($array);
    }

    public function enablestaff($id) {

        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $userdata = $this->customlib->getUserData();
        $staff = $this->packages_model->get($id);
        if ($staff["role_id"] == 7) {
            $a = 0;
            if ($userdata["email"] == $staff["email"]) {
                $a = 1;
            }
        } else {
            $a = 1;
        }

        if ($a != 1) {
            access_denied();
        }
        $this->packages_model->enablestaff($id);
        redirect('admin/packages/profile/' . $id);
    }

    public function staffLeaveSummary() {

        $resultdata = $this->packages_model->getLeaveSummary();
        $data["resultdata"] = $resultdata;

        $this->load->view("layout/header");
        $this->load->view("admin/packages/staff_leave_summary", $data);
        $this->load->view("layout/footer");
    }

    public function getEmployeeByRole() {

        $role = $this->input->post("role");

        $data = $this->packages_model->getEmployee($role);

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
        $staff = $this->packages_model->get($id);
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
            redirect('admin/packages');
        }

        $this->load->view('layout/header');
        $this->load->view('admin/packages/permission', $data);
        $this->load->view('layout/footer');
    }

    public function leaverequest() {

        if (!$this->rbac->hasPrivilege('apply_leave', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/packages/leaverequest');
        $userdata = $this->customlib->getUserData();
        $leave_request = $this->leaverequest_model->user_leave_request($userdata["id"]);
        $data["leave_request"] = $leave_request;
        $LeaveTypes = $this->leaverequest_model->allotedLeaveType($userdata["id"]);
        $data["staff_id"] = $userdata["id"];
        $data["leavetype"] = $LeaveTypes;
        $staffRole = $this->packages_model->getStaffRole();
        $data["staffrole"] = $staffRole;
        $data["status"] = $this->status;

        $this->load->view("layout/header", $data);
        $this->load->view("admin/packages/leaverequest", $data);
        $this->load->view("layout/footer", $data);
    }

    public function change_password($id) {

        $sessionData = $this->session->userdata('admin');
        $userdata = $this->customlib->getUserData();

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
        $designation = $this->packages_model->getStaffDesignation();
        $data["designation"] = $designation;
        $department = $this->packages_model->getDepartment();
        $data["department"] = $department;

        $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_csv_upload');
        $this->form_validation->set_rules('role', $this->lang->line('role'), 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("admin/packages/import/import", $data);
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

                            $check_exists = $this->packages_model->import_check_data_exists($result[$r_key]['name'], $result[$r_key]['employee_id']);
                            $check_emailexists = $this->packages_model->import_check_email_exists($result[$r_key]['name'], $result[$r_key]['employee_id']);

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

                                $insert_id = $this->packages_model->batchInsert($result[$r_key], $role_array);
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
            redirect('admin/packages/import');
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
        $staff_list = $this->packages_model->getrat();

        $data['resultlist'] = $staff_list;

        $this->load->view('admin/packages/rating', $data);
        $this->load->view('layout/footer');
    }

    public function ratingapr($id) {
        $approve['status'] = '1';
        $this->packages_model->ratingapr($id, $approve);
        redirect('admin/packages/rating');
    }

    public function delete_rateing($id) {
        $this->packages_model->rating_remove($id);
        redirect('admin/packages/rating');
    }

}
