<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Packagesubscription extends Admin_Controller {

    public $sch_setting_detail = array();

    public function __construct() {
        parent::__construct();

        $this->config->load("payroll");
        $this->config->load("app-config");
        $this->load->library('Enc_lib');
        $this->load->library('mailsmsconf');
        $this->load->model("packagesubscription_model");
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
        if (!$this->rbac->hasPrivilege('packagesubscription', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'Package Subscription List';
        //$data['fields'] = $this->customfield_model->get_custom_fields('packages', 1);
        $this->session->set_userdata('menu_heading', 'SUPERADMIN');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/packagesubscription');
        $search = $this->input->post("search");

        $subscriptions = $this->packagesubscription_model->get();

        $data['results'] = $subscriptions;
        $staffRole = $this->packagesubscription_model->getStaffRole();
        $data["role"] = $staffRole;
        $data["role_id"] = "";

        $this->load->view('layout/header');
        $this->load->view('admin/subscriptions/subscriptionslist', $data);
        $this->load->view('layout/footer');
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
        
        if ($this->form_validation->run() == true) {

            $role = 1;
            if($this->input->post("is_active")!=''){
                $is_active =  $this->input->post("is_active"); 
            }else{
                $is_active =  0; 
            }
            $name               = $this->input->post("name");
            $description        = $this->input->post("description");
            $number_of_location = $this->input->post("number_of_location");
            $number_of_users    = $this->input->post("number_of_users");
            $number_of_files    = $this->input->post("number_of_files");
            $number_of_cases    = $this->input->post("number_of_cases");
            $price_interval     = $this->input->post("price_interval");
            $interval_count     = $this->input->post("interval_count");
            $trial_days         = $this->input->post("trial_days");
            $price              = $this->input->post("price");
            $sort_order         = $this->input->post("sort_order");

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
            // $employee_id_exists = $this->packagesubscription_model->check_adminid_exists($account_no);
            // if ($employee_id_exists) {
            //     $insert = false;
            // }
            
            //==========================
            if ($insert) {
                
                $insert_id = $this->packagesubscription_model->insertPackage($data_insert);
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

    public function edit($id) {
        if (!$this->rbac->hasPrivilege('packages', 'can_edit')) {
            access_denied();
        }
        // $account_no = $this->packagesubscription_model->isInvoiceNoExist();
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
        
        $data['title'] = 'Edit Admin';
        $data['id'] = $id;
        $priceintervals = $this->customlib->getintervals();
        $data['intervals'] = $priceintervals;
        $country_results = $this->court_model->getCountries();
        $data['countries'] = $country_results;
        $payscaleList = $this->packagesubscription_model->getPayroll();
        $leavetypeList = $this->packagesubscription_model->getLeaveType();
        $data["leavetypeList"] = $leavetypeList;
        $data["payscaleList"] = $payscaleList;
        $staffRole = $this->packagesubscription_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        //$designation = $this->packagesubscription_model->getStaffDesignation();
        //$data['shares'] = $this->packagesubscription_model->getPercentageOfShares();
        // if($data['shares']){
        //     $data['shares_id'] = $data['shares'][0]['id'];
        // }else{
        //     $data['shares_id'] ='';
        // }
        
        //$data["designation"] = $designation;
       // print_r($data["designation"]); die();
        //$department = $this->packagesubscription_model->getDepartment();
        //$data["department"] = $department;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        $data['title'] = 'Edit Staff';
        $package = $this->packagesubscription_model->get($id);
        $data['editpackage'] = $package;
        //print_r($data['packages']); die();
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

        $staffLeaveDetails = $this->packagesubscription_model->getLeaveDetails($id);
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
        //     array('check_exists', array($this->packagesubscription_model, 'valid_email_id')),
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

            $insert_id = $this->packagesubscription_model->add($data_insert);

            //$role_id = $this->input->post("role");
            // if($staff["role_id"]!=7){
            //     $role_data = array('staff_id' => $id, 'role_id' => 1);
            //     $this->packagesubscription_model->update_role($role_data);
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
        $staff = $this->packagesubscription_model->get($id);

        if ($staff['id'] == $this->userdata['id']) {
            $a = 1;
        } else if ($staff["role_id"] == 7) {
            $a = 1;
        }

        if ($a == 1) {
            access_denied();
        }
        $data['title'] = 'Packages List';
        $this->packagesubscription_model->remove($id);
        redirect('admin/packages');
    }

    public function disablestaff($id) {
        if (!$this->rbac->hasPrivilege('disable_staff', 'can_view')) {

            access_denied();
        }


        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $staff = $this->packagesubscription_model->get($id);
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
        $this->packagesubscription_model->disablestaff($data);
        $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        echo json_encode($array);
    }

    public function enablestaff($id) {

        $a = 0;
        $sessionData = $this->session->userdata('admin');
        $staff = $this->packagesubscription_model->get($id);
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
        $this->packagesubscription_model->enablestaff($id);
        redirect('admin/packages/profile/' . $id);
    }

    public function dateDifference($date_1, $date_2, $differenceFormat = '%a') {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat) + 1;
    }

    /**
     * Transfers fund from one account to another.
     * @return Response
     */
    public function postEditSubscription(){

        if (!$this->rbac->hasPrivilege('adminprofile', 'can_edit')) {
            access_denied();
        }
       
            $subscripton_id     = $this->input->post('subscripton_id');
            $business_id        = $this->input->post('business_id');
            $package_id         = $this->input->post('package_id');
            $pack_amount        = $this->input->post('pack_amount');
            $paid_via           = $this->input->post('paid_via');
            $bank_account_id    = $this->input->post('bank_account_id');
            $reference_number   = $this->input->post('reference_number');
            $payment_transaction_id = $this->input->post('payment_transaction_id');
            
            
            if (!empty($pack_amount)) {

                $package  = $this->packages_model->getActivePackage($package_id);
                
                $subscription = array(
                    'id' => $subscripton_id,
                    'business_id'=>$business_id,
                    'package_id'=>$package_id,
                    'package_price'=>$pack_amount,
                    'paid_via' => $paid_via,
                    'bank_account_id' => $bank_account_id,
                    'reference_number' => $reference_number,
                    'payment_transaction_id' => $payment_transaction_id,
                );
               
                if (in_array($paid_via, ['offline', 'pesapal'])) {
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
                   
                //Custom permissions.
                // if (!empty($package->custom_permissions)) {
                //     foreach ($package->custom_permissions as $name => $value) {
                //         $subscription['package_details'][$name] = $value;
                //     }
                // }
               
                $subscription = $this->packages_model->subscribe($subscription);

                $errorMsg   = array('errorMsg'=>'Subscription created successfully');
                $array      = array('status' => 'success', 'error' => $errorMsg);
                echo json_encode($array);
            }

    }

    protected function get_package_dates($business_id, $package)
    {
        $output = ['start' => '', 'end' => '', 'trial' => ''];
        //calculate start date
        // $date = new DateTime();
        // $date->modify('+1 day');
        // $date->format('Y-m-d');
        $start_date  = $this->packages_model->getEndDate($business_id);
        $output['start'] = $start_date;
        //Calculate end date
        if ($package['price_interval'] == 'Days') {
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' day') ); 
        }elseif ($package['price_interval'] == 'Months') {
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' month') ); 
        } elseif ($package['price_interval'] == 'Years') {
            $output['end'] = date( "Y-m-d", strtotime($start_date . '+ ' . $package['interval_count'] . ' year') );
        }
        if($start_date){
            $output['trial'] = '';    
        }else{
            $output['trial'] = date( "Y-m-d", strtotime($start_date.'+ '.$package['trial_days'].' day'));
        }
        
        return $output;
    }

    /**
     * Shows form to add subscription.
     * @param  int $id
     * @return Response
     */
    public function edit_subscription(){

        $subscripton_id = $this->input->post('subscripton_id'); 
        $bankAccounts   = $this->account_model->getBankAccount(31);
        $packages       = $this->packages_model->getActivePackage();
        $subscription   = $this->packagesubscription_model->get($subscripton_id);
        //print_r($subscription['package_id']); die();

        $modalData = '';
        $modalData .= '<div id="editSubscription" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog2 modal-md">
                    <div class="modal-content">
                        <div class="modal-header themecolor">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Edit Subscription</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="POST" id="editsubscription_form" action="packagesubscription/postEditSubscription" accept-charset="UTF-8" id="fund_transfer_form" enctype="multipart/form-data">
                                    
                                    <div class="modal-body">';
                                    $modalData.='<input name="subscripton_id" type="hidden" value="'.$subscripton_id.'">';
                                    $modalData.='<input name="business_id" type="hidden" value="'.$subscription['business_id'].'">';

                                    $modalData.='<div class="form-group">
                                        <label for="package_id">Packages:*</label>
                                        <select class="form-control" required="" id="package_id" name="package_id" onchange="getAmount()">';
                                    $modalData.='<option value="">'.$this->lang->line('select').'</option>';
                                    foreach($packages as $package){
                                        if ($subscription['package_id']==$package['id']) {
                                            $selected = 'selected';
                                        }else{
                                            $selected = '';
                                        }
                                        $modalData.='<option value="'.$package['id'].'" '.$selected.' >'.$package['name'].'</option>';
                                    }
                                    $modalData.='</select>
                                                </div>';
                                    $modalData.='<div style="display: none;" id="package_amount">
                                                    <div class="form-group">
                                                    <label for="pack_amount">Amount:</label>
                                                    <input class="form-control" required="" name="pack_amount" type="text" value="" id="pack_amount" readonly >
                                                </div></div>';
                                    $modalData.='<div class="form-group">
                                                <label for="paid_via">Paid Via Cash/Bank:*</label>
                                                <select class="form-control" required="" id="paid_via" name="paid_via" onchange="gettype()">';
                                    $modalData.='<option value="">'.$this->lang->line('select').' </option>';
                                    if ($subscription['paid_via']==107) {
                                        $modalData.='<option value="107" selected>Cash</option>';
                                    }else{
                                        $modalData.='<option value="107">Cash</option>';
                                    }if ($subscription['paid_via']==104) {
                                        $modalData.='<option value="104" selected>Bank</option>';
                                    }else{
                                        $modalData.='<option value="104">Bank</option>';
                                    }
                                    $modalData.='</select>
                                                </div>';
                                    $modalData.='<div style="display: none;" id="bank_accounts_div">
                                                <div class="form-group">
                                                <label for="bank_account_id">Bank Acc:*</label>
                                                <select class="form-control" id="bank_account_id" name="bank_account_id" onchange="getref()">';
                                    $modalData.='<option value="">'.$this->lang->line('select').'</option>';
                                        foreach ($bankAccounts as $bankAccount) {
                                            if ($subscription['bank_account_id']==$bankAccount['id']) {
                                                $selected = 'selected';
                                            }else{
                                                $selected = '';
                                            }
                                    $modalData.='<option value="'.$bankAccount['id'].'" '.$selected.' >'.$bankAccount['account_title'].'</option>';
                                        }
                                    
                                    $modalData.='</select>
                                                </div></div>';
                                    $modalData.='<div style="display: none;" id="reference_number_div">
                                                    <div class="form-group">
                                                    <label for="amount">Reference Number:*</label>
                                                    <input class="form-control" name="reference_number" type="text" value="'.$subscription['reference_number'].'" id="reference_number" >
                                                </div></div>';

                                    $modalData.='<div class="form-group">
                                                    <label for="amount">Transaction Id:*</label>
                                                    <input class="form-control" required="" placeholder="Transaction Id" name="payment_transaction_id" type="text" value="'.$subscription['payment_transaction_id'].'" id="payment_transaction_id" readonly style="background-color:#ccc">
                                                </div>';

                                    $modalData.='</div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary themecolor">Submit</button>
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

    /**
     * Shows form to add subscription.
     * @param  int $id
     * @return Response
     */
    public function changeStatus(){

        $subscribe_id =  $this->input->post('subscribe_id');
        $status       =  $this->input->post('status');
        $data         = array('id' => $subscribe_id, 'status' => $status);
        $this->packagesubscription_model->changeSubsStatus($data);
        $errorMsg   = array('errorMsg'=>'Subscription created successfully');
        $array      = array('status' => 'success', 'error' => $errorMsg);
        echo json_encode($array);


    }

    public function getStatusModel(){

        $trans_id     =  $this->input->post('trans_id');
        $subscribe_id =  $this->input->post('subscribe_id');
        $status       =  $this->input->post('status'); 
        $model='';
        $model.='<div id="statusModal" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog2 modal-md">
                    <div class="modal-content">
                        <div class="modal-header themecolor">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Subscription Status</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="POST" id="status_change_form" action="packagesubscription/changeStatus" accept-charset="UTF-8" enctype="multipart/form-data">';
                                $model.='<input name="subscribe_id" type="hidden" value="'.$subscribe_id.'">';
                                    $model.='<div class="modal-body">
                                        <div class="form-group">
                                            <label for="paid_via">Status:*</label>
                                            <select class="form-control" required="" id="status" name="status" >';
                                            if ($status=='approved') {
                                                $model.='<option value="approved" selected>Approved</option>';
                                            }else{
                                                $model.='<option value="approved">Approved</option>';
                                            }
                                            if ($status=='declined') {
                                                $model.='<option value="declined" selected>Declined</option>';
                                            }else{
                                                $model.='<option value="declined">Declined</option>';
                                            }if ($status=='waiting') {
                                                $model.='<option value="waiting" selected>Waiting</option>';
                                            }else{
                                                $model.='<option value="waiting">Waiting</option>';
                                            }
                                            $model.='</select>
                                        </div>';
                                        $model.='<div class="form-group">
                                            <label for="amount">Transaction Id:*</label>
                                            <input class="form-control" required=""  name="payment_transaction_id" type="text" value="'.$trans_id.'" id="payment_transaction_id" readonly>
                                        </div>';
                                    $model.='</div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary themecolor">Submit</button>
                                        <button type="button" class="btn btn-default themecolor" data-dismiss="modal">Close</button>
                                    </div>
                                </form>                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

            echo $model;

    }

}
