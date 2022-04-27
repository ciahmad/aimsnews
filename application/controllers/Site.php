<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_installation();
        if ($this->config->item('installed') == true) {
            $this->db->reconnect();
        }

        $this->load->library('Auth');
        $this->load->library('Enc_lib');
        $this->load->library('customlib');
        $this->load->library('mailsmsconf');
        $this->load->library('mailer');
        $this->load->config('ci-blog');
        $this->mailer;
    }

    private function check_installation() {
        if ($this->uri->segment(1) !== 'install') {
            $this->load->config('migration');
            if ($this->config->item('installed') == false && $this->config->item('migration_enabled') == false) {
                redirect(base_url() . 'install/start');
            } else {
                if (is_dir(APPPATH . 'controllers/install')) {
                    echo '<h3>Delete the install folder from application/controllers/install</h3>';
                    die;
                }
            }
        }
    }

    function login() {

        $app_name = $this->setting_model->get();
        $app_name = $app_name[0]['name'];
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }

        $data = array();
        $data['title'] = 'Login';
        $chamber = $this->setting_model->get();
        $data['name'] = $app_name;

        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5), null);
        //$data['notice'] = $notices;
        $data['notice'] = '';
        $data['chamber'] = $chamber[0];
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['name'] = $app_name;
            $this->load->view('admin/login', $data);
        } else {
            $login_post = array(
                'email' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            //$setting_result = $this->setting_model->get();
            $result = $this->staff_model->checkLogin($login_post);
            
            if($result->admin_id ==0){
                $staff_id = $result->id;
            }else{
                $staff_id = $result->admin_id;
            }

            if ($result) {
                if ($result->is_active) {
                    if ($result->surname != "") {
                        $logusername = $result->name . " " . $result->surname;
                    } else {
                        $logusername = $result->name;
                    }
                    $setting_result = $this->setting_model->get2(null, $staff_id);
                    if (!empty($result->language_id)) {
                        $lang_array = array('lang_id' => $result->language_id, 'language' => $result->language);
                    } else {
                        $lang_array = array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']);
                    }
                    
                    $session_data = array(
                        'id' => $result->id,
                        'username' => $logusername,
                        'email' => $result->email,
                        'roles' => $result->roles,
                        'date_format' => $setting_result[0]['date_format'],
                        'currency_symbol' => $setting_result[0]['currency_symbol'],
                        'currency_place' => $setting_result[0]['currency_place'],
                        'start_month' => $setting_result[0]['start_month'],
                        'school_name' => $setting_result[0]['name'],
                        'slug' => $setting_result[0]['slug'],
                        'timezone' => $setting_result[0]['timezone'],
                        'sch_name' => $setting_result[0]['name'],
                        'language' => $lang_array,
                        'is_rtl' => $setting_result[0]['is_rtl'],
                        'theme' => $setting_result[0]['theme'],
                        'gender' => $result->gender,
                    );
                    $language_result1 = $this->language_model->get($lang_array['lang_id']);
                    if ($this->customlib->get_rtl_languages($language_result1['short_code'])) {
                        $session_data['is_rtl'] = 'enabled';
                    }
                    
                    $this->session->set_userdata('admin', $session_data);

                    $role = $this->customlib->getStaffRole();
                    $role_name = json_decode($role)->name;
                    $this->customlib->setUserLog($this->input->post('username'), $role_name);

                    if (isset($_SESSION['redirect_to']))
                        redirect($_SESSION['redirect_to']);
                    else
                        $array = array('status' => 'success', 'redirect' => base_url('admin/adminprofile/edit/'.$result->id), 'message' => '');
                        //redirect('admin/admin/dashboard');
                }else {
                    $data['name'] = $app_name;
                    $data['error_message'] = $this->lang->line('your_account_is_disabled_please_contact_to_administrator');
                    $array = array('status' => 'fail', 'error' => $data['error_message'], 'message' => '');
                    //echo json_encode($array);
                    //$this->load->view('admin/login', $data);
                }
            } else {
                $data['name'] = $app_name;
                $data['error_message'] = $this->lang->line('invalid_username_or_password');
                $array = array('status' => 'fail', 'error' => $data['error_message'], 'message' => '');
                //$this->load->view('admin/login', $data);
            }
            echo json_encode($array);
        }
    }

    public function register() {
        $app_name = $this->setting_model->get();
        $app_name = $app_name[0]['name'];
        $data['title'] = 'Create Account';
        $school = $this->setting_model->get();
        $data['name'] = $app_name;
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }
        $this->load->view('admin/register', $data);
    }

    function create_account() {
       
        $app_name = $this->setting_model->get();
        $app_name = $app_name[0]['name'];
        //$this->session->set_userdata("checkverify",false);
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }
        $array = array();
        $data = array();
        if($this->input->get('package') ==0 || $this->input->get('package')==''){
            $package_id = 1;
        }else{
            $package_id =  $this->input->get('package');
        }

        $data['title'] = 'Create Account';
        $school = $this->setting_model->get();
        $data['name'] = $app_name;

        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5), null);
        ///$data['notice'] = $notices;
        $data['notice'] = '';
        $data['school'] = $school[0];

        $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('last_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('contactno', $this->lang->line('contactno'), 'trim|required|xss_clean');
        $this->form_validation->set_rules(
            'school_name', $this->lang->line('school_name'), array( 'required', array('check_exists', array($this->setting_model, 'valid_check_exists')) )
        );

        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|valid_email|xss_clean');
        
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['name'] = $app_name;
            //$this->load->view('admin/register', $data);

            $msg = array(                
                'first_name' => form_error('first_name'),
                'last_name' => form_error('last_name'),
                'school_name' => form_error('school_name'),
                'contactno' => form_error('contactno'),
                'email' => form_error('email'),
                'password' => form_error('password'),
                'confirm_password' => form_error('confirm_password')
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            echo json_encode($array);

        } else {

            $isEmailExist = $this->adminprofile_model->is_email_exists($this->input->post('email'));
            
            if($isEmailExist){
                //$this->session->set_flashdata('message', '<div class="alert alert-success">' . $this->lang->line('email_already_register') . '</div>');
                $msg = array( 'email' => $this->lang->line('email_already_register'));
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
                echo json_encode($array);
                //redirect('site/register');
            }else{
                $data_insert = array(
                    'package_id'=>$package_id,
                    'name' => $this->input->post('first_name'),
                    'surname' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'contact_no' => $this->input->post('contactno'),
                    'school_name' => $this->input->post('school_name'),
                    'password' => $this->enc_lib->passHashEnc($this->input->post('password')),
                    'staff_type'=>'admin',
                    'lang_id' =>4,
                    'is_active' => 0
                );

                $role_array = array('role_id' => 1, 'staff_id' => 0);
                $insert_id = $this->adminprofile_model->batchInsert($data_insert, $role_array, $leave_array, $data_setting);
                $onetime_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
                $data_admin_login = array(
                    'id'  => $insert_id,
                    'verification_code'=>$onetime_password,
                );
                $this->adminprofile_model->add($data_admin_login);

                $admin_login_detail = array('id' => $insert_id, 'credential_for' => 'admin', 'email' => $this->input->post('email'), 'password' => $onetime_password, 'contact_no' => $this->input->post('contactno'));
                //$this->mailsmsconf->mailsms('login_credential', $admin_login_detail);
                //redirect('site/verifyotp');
                $this->session->set_userdata('user_email', $this->input->post('email'));
                $array = array('status' => 'success', 'redirect' => base_url('site/verifyotp'), 'message' => '');
                echo json_encode($array);
            }
        }
    }

    function verifyotp() {
        $app_name = $this->setting_model->get();
        $app_name = $app_name[0]['name'];
        $data['title'] = 'OTP Number';
        $data['name'] = $app_name;
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }

        $this->load->view('admin/verifyotp', $data);
    }

    function verifyOneTimePassword() {
       
        $app_name = $this->setting_model->get();
        $app_name = $app_name[0]['name'];
        
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }

        $data = array();
        $data['title'] = 'OTP Number';
        $data['name'] = $app_name;

        $this->form_validation->set_rules('otp_password', $this->lang->line('otp_password'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['name'] = $app_name;

            $msg = array(                
                'otp_password' => form_error('otp_password'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            echo json_encode($array);

            
        } else {

            $total_row = $this->adminprofile_model->verifyOtpCode($this->input->post('otp_password'));

            if($total_row->id > 0){

                $user_id   = $total_row->id;

                $account_no = $this->adminprofile_model->isInvoiceNoExist();
                if(empty($account_no->account_no)){
                    $account_inv = 'LP'.date('d').date('m').date('y').'000001'; 
                }else{
                    $exp = explode('00000', $account_no->account_no);
                    if(isset($exp[1])){ $randno = $exp[1]+1;}
                    $account_inv = 'LP'.date('d').date('m').date('y').'00000'.$randno;
                }

                $result  = $this->adminprofile_model->getAdminData2($user_id);
                
                if($result->id > 0){
                   
                    $update_status = array('id' => $user_id, 'created_by' => $result->id, 'account_no' => $account_inv, 'employee_id'=>$account_inv, 'is_active'=>1);
                    $this->adminprofile_model->add($update_status); 

                    $current_session_array = array(
                        'admin_id' => $result->id,
                        'created_by' => $result->id,
                        'session' => date('Y'),
                    );
                    $session_inserted_id = $this->session_model->add($current_session_array);

                    $setting_data = array(
                        'admin_id' => $result->id,
                        'created_by' => $result->id,
                        'name'      => $result->school_name,
                        'lang_id' => $result->lang_id,
                        'languages' => '["4","79"]',
                        'session_id'=>$session_inserted_id,
                        'is_rtl' => 'disabled',
                        'date_format' => 'd-M-Y',
                        'time_format' => '12-hour',
                        'currency' => 'PKR',
                        'start_month' => 4,
                    );

                    $this->setting_model->add($setting_data); 

                    $insertdata = array(
                        'admin_id' => $result->id,
                        'created_by' => $result->id,
                        'id'=>28,
                        'name'=>'Admin Settings',
                        'short_code'=>'schsettings',
                        'is_active'=>1
                    );
                    $this->adminprofile_model->addAssignModules($insertdata);

                    if ($result->package_id > 0 ) {

                        $package  = $this->packages_model->getActivePackage($result->package_id);

                        $subscription = array(
                            'business_id' => $result->id,
                            'package_id'=>$result->package_id,
                        );
                       
                        $dates = $this->get_package_dates($result->id, $package);
                        $subscription['start_date'] = $dates['start'];
                        $subscription['end_date'] = $dates['end'];
                        $subscription['trial_end_date'] = $dates['trial'];
                        $subscription['status'] = 'waiting';
                        $subscription['package_price'] = $package['price'];
                        $subscription['package_details'] = [
                                'location_count' => $package['number_of_location'],
                                'user_count' => $package['number_of_users'],
                                'product_count' => $package['number_of_files'],
                                'invoice_count' => $package['number_of_cases'],
                                'name' => $package['name'],
                                'payment_transaction_id' => $account_inv,
                            ];
                        $subscription['package_details'] = json_encode($subscription['package_details']); 
                        $subscription['created_id'] = $result->id;
                        
                        $subscription_id = $this->packages_model->subscribe($subscription);

                        if($subscription_id){

                        $admin_packages_array = $this->packagesubscription_model->getAdminSubscriptions($result->id, $subscription_id);
                        $superAdmin_setting_detail = $this->setting_model->getSetting(1);
                        //print_r($superAdmin_setting_detail); die();
                        $userName = $admin_packages_array['name'].' '.$admin_packages_array['surname'];

                        $package_subscription_details = array('super_admin_email' => $superAdmin_setting_detail->email, 'username' => $userName, 'contact_no' => $admin_packages_array['contact_no'], 'email' => $admin_packages_array['email'], 'package_name' => $admin_packages_array['package_name'],'package_price' => $admin_packages_array['price'], 'start_date' => $admin_packages_array['start_date'], 'trial_end_date' => $admin_packages_array['trial_end_date'], 'end_date' => $admin_packages_array['end_date']);

                        //$this->mailsmsconf->mailsms('student_admission', $package_subscription_details);
                            
                        }
                    }
                

                    if (!empty($result->language_id)) {
                        $lang_array = array('lang_id' => $result->language_id, 'language' => $result->language);
                    } else {
                        $lang_array = array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']);
                    }

                    if ($result->name != "") {
                        $logusername = $result->name . " " . $result->surname;
                    } else {
                        $logusername = $result->name;
                    }
                    $setting_result = $this->setting_model->get2(null, $result->id);
                    //$setting_result = $this->setting_model->get();

                    if (!empty($result->language_id)) {
                        $lang_array = array('lang_id' => $result->language_id, 'language' => $result->language);
                    } else {
                        $lang_array = array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']);
                    }

                    $roles = $this->staffroles_model->getStaffRoles($user_id);
                    $getroles = array($roles[0]->name => $roles[0]->role_id);
                    
                    $session_data = array(
                        'id' => $result->id,
                        'username' => $logusername,
                        'email' => $result->email,
                        'roles' => $getroles,
                        'firstname' => $result->name,
                        'lastname' => $result->surname,
                        'date_format' => $setting_result[0]['date_format'],
                        'currency_symbol' => $setting_result[0]['currency_symbol'],
                        'currency_place' => $setting_result[0]['currency_place'],
                        'start_month' => $setting_result[0]['start_month'],
                        'school_name' => $setting_result[0]['name'],
                        'sch_name' => $setting_result[0]['name'],
                        'timezone' => $setting_result[0]['timezone'],
                        'sch_name' => $setting_result[0]['name'],
                        'language' => $lang_array,
                        'is_rtl' => $setting_result[0]['is_rtl'],
                        'theme' => $setting_result[0]['theme'],
                    );
                    
                    $language_result1 = $this->language_model->get($lang_array['lang_id']);
                    if ($this->customlib->get_rtl_languages($language_result1['short_code'])) {
                        $session_data['is_rtl'] = 'enabled';
                    }
                    
                    $this->session->set_userdata('admin', $session_data);
                    $role = $this->customlib->getStaffRole();
                    $role_name = json_decode($role)->name; 
                    $this->customlib->setUserLog($result->email, $role_name);

                    if (isset($_SESSION['redirect_to']))
                        redirect($_SESSION['redirect_to']);
                    else
                        //redirect('admin/adminprofile/edit/'.$user_id);
                        $array = array('status' => 'success', 'redirect' => base_url('admin/adminprofile/edit/'.$user_id), 'message' => '');
                        echo json_encode($array); 
                }else{
                    $data['error_message'] = $this->lang->line('your_account_is_disabled_please_contact_to_administrator');
                    $array = array('status' => 'fail', 'error' => $data['error_message'], 'message' => '');
                    echo json_encode($array);
                }
            }else{

                //$data['error_message'] = $this->lang->line('invalid_otpnumber');
                $data['name'] = $app_name;
                $msg = array( 'otp_password' => $this->lang->line('invalid_otpnumber'));
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
                echo json_encode($array);    
                //$this->load->view('admin/verifyotp', $data);

            }   
            
            

        }
        
        
    }

    protected function get_package_dates($business_id, $package){

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

    function logout() {
        $admin_session = $this->session->userdata('admin');
        $student_session = $this->session->userdata('student');
        $this->auth->logout();
        if ($admin_session) {
            redirect('site/login');
        } else if ($student_session) {
            redirect('site/userlogin');
        } else {
            redirect('site/userlogin');
        }
    }

    function forgotpassword() {

        $app_name = $this->setting_model->get();
        $data['name'] = $app_name[0]['name'];
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|valid_email|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/forgotpassword', $data);
        } else {
            $email = $this->input->post('email');

            $result = $this->staff_model->getByEmail($email);

            if ($result && $result->email != "") {
                if ($result->is_active == '1') {
                    $verification_code = $this->enc_lib->encrypt(uniqid(mt_rand()));
                    $update_record = array('id' => $result->id, 'verification_code' => $verification_code);
                    $this->staff_model->add($update_record);
                    $name = $result->name;
                    $resetPassLink = site_url('admin/resetpassword') . "/" . $verification_code;
                    $sender_details = array('resetPassLink' => $resetPassLink, 'name' => $name, 'email' => $email);
                    $this->mailsmsconf->mailsms('forgot_password', $sender_details);
                    $this->session->set_flashdata('message', $this->lang->line('please_check_your_email_to_recover_your_password'));
                } else {
                    $this->session->set_flashdata('disable_message', $this->lang->line('your_account_is_disabled_please_contact_to_administrator'));
                }

                redirect('site/login', 'refresh');
            } else {

                $data = array(
                    'error_message' => $this->lang->line('incorrect') . " " . $this->lang->line('email')
                );
            }
            $this->load->view('admin/forgotpassword', $data);
        }
    }

    //reset password - final step for forgotten password
    public function admin_resetpassword($verification_code = null) {
        $app_name = $this->setting_model->get();
        $data['name'] = $app_name[0]['name'];
        if (!$verification_code) {
            show_404();
        }

        $user = $this->staff_model->getByVerificationCode($verification_code);

        if ($user) {
            //if the code is valid then display the password reset form
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
            $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), 'required|matches[password]');
            if ($this->form_validation->run() == false) {


                $data['verification_code'] = $verification_code;
                //render
                $this->load->view('admin/admin_resetpassword', $data);
            } else {

                // finally change the password
                $password = $this->input->post('password');
                $update_record = array(
                    'id' => $user->id,
                    'password' => $this->enc_lib->passHashEnc($password),
                    'verification_code' => ""
                );

                $change = $this->staff_model->update($update_record);
                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->lang->line("password_reset_successfully"));
                    redirect('site/login', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->lang->line("something_went_wrong"));
                    redirect('admin_resetpassword/' . $verification_code, 'refresh');
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->lang->line('invalid_link'));
            redirect("site/forgotpassword", 'refresh');
        }
    }

    //reset password - final step for forgotten password
    public function resetpassword($role = null, $verification_code = null) {
        $app_name = $this->setting_model->get();
        $data['name'] = $app_name[0]['name'];
        if (!$role || !$verification_code) {
            show_404();
        }

        $user = $this->user_model->getUserByCodeUsertype($role, $verification_code);

        if ($user) {
            //if the code is valid then display the password reset form
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
            $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), 'required|matches[password]');
            if ($this->form_validation->run() == false) {

                $data['role'] = $role;
                $data['verification_code'] = $verification_code;
                //render
                $this->load->view('resetpassword', $data);
            } else {

                // finally change the password

                $update_record = array(
                    'id' => $user->user_tbl_id,
                    'password' => $this->input->post('password'),
                    'verification_code' => ""
                );

                $change = $this->user_model->saveNewPass($update_record);
                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->lang->line('password_reset_successfully'));
                    redirect('site/userlogin', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->lang->line("something_went_wrong"));
                    redirect('user/resetpassword/' . $role . '/' . $verification_code, 'refresh');
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->lang->line('invalid_link'));
            redirect("site/ufpassword", 'refresh');
        }
    }

    function ufpassword() {

        $app_name = $this->setting_model->get();
        $data['name'] = $app_name[0]['name'];
        $this->form_validation->set_rules('username', $this->lang->line('email'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('user[]', $this->lang->line('user_type'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('ufpassword', $data);
        } else {
            $email = $this->input->post('username');
            $usertype = $this->input->post('user[]');

            $result = $this->user_model->forgotPassword($usertype[0], $email);

            if ($result && $result->email != "") {

                $verification_code = $this->enc_lib->encrypt(uniqid(mt_rand()));
                $update_record = array('id' => $result->user_tbl_id, 'verification_code' => $verification_code);
                $this->user_model->updateVerCode($update_record);
                if ($usertype[0] == "student") {
                    $name = $result->firstname . " " . $result->lastname;
                } else {
                    $name = $result->guardian_name;
                }
                $resetPassLink = site_url('user/resetpassword') . '/' . $usertype[0] . "/" . $verification_code;

                $sender_details = array('resetPassLink' => $resetPassLink, 'name' => $name, 'email' => $email);
                $this->mailsmsconf->mailsms('forgot_password', $sender_details);

                $this->session->set_flashdata('message', $this->lang->line("please_check_your_email_to_recover_your_password"));
                redirect('site/userlogin', 'refresh');
            } else {
                $data = array(
                    'name' => $app_name[0]['name'],
                    'error_message' => $this->lang->line('invalid_email_or_user_type')
                );
            }

            $this->load->view('ufpassword', $data);
        }
    }

    function userlogin() {
        if ($this->auth->user_logged_in()) {
            $this->auth->user_redirect();
        }
        $data = array();
        $data['title'] = 'Login';
        $school = $this->setting_model->get();
        $data['name'] = $school[0]['name'];
        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5));
        $data['notice'] = $notices;
        $data['school'] = $school[0];
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userlogin', $data);
        } else {
            $login_post = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $login_details = $this->user_model->checkLogin($login_post);

            if (isset($login_details) && !empty($login_details)) {
                $user = $login_details[0];
                if ($user->is_active == "yes") {
                    if ($user->role == "student") {
                        $result = $this->user_model->read_user_information($user->id);
                    } else if ($user->role == "parent") {
                        $result = $this->user_model->checkLoginParent($login_post);
                    }
                    
                    if ($result != false) {
                        $setting_result = $this->setting_model->get(null, $result[0]->admin_id);
                        if ($result[0]->lang_id == 0) {
                            $language = array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']);
                        } else {
                            $language = array('lang_id' => $result[0]->lang_id, 'language' => $result[0]->language);
                        }
                        if ($result[0]->role == "parent") {
                            $username = $result[0]->guardian_name;
                            if ($result[0]->guardian_relation == "Father") {
                                $image = $result[0]->father_pic;
                            } else if ($result[0]->guardian_relation == "Mother") {
                                $image = $result[0]->mother_pic;
                            } else if ($result[0]->guardian_relation == "Other") {
                                $image = $result[0]->guardian_pic;
                            }
                        } elseif ($result[0]->role == "student") {
                            $image = $result[0]->image;
                            $username = ($result[0]->lastname != "") ? $result[0]->firstname . " " . $result[0]->lastname : $result[0]->firstname;
                        }
                        $session_data = array(
                            'id' => $result[0]->id,
                            'admin_id' => $result[0]->admin_id,
                            'login_username' => $result[0]->username,
                            'student_id' => $result[0]->user_id,
                            'role' => $result[0]->role,
                            'username' => $username,
                            'date_format' => $setting_result[0]['date_format'],
                            'currency_symbol' => $setting_result[0]['currency_symbol'],
                            'timezone' => $setting_result[0]['timezone'],
                            'school_name' => $setting_result[0]['name'],
                            'language' => $language,
                            'is_rtl' => $setting_result[0]['is_rtl'],
                            'theme' => $setting_result[0]['theme'],
                            'image' => $result[0]->image,
                            'gender' => $result[0]->gender,
                        );
                        $language_result1 = $this->language_model->get($language['lang_id']);
                        if ($this->customlib->get_rtl_languages($language_result1['short_code'])) {
                            $session_data['is_rtl'] = 'enabled';
                        }
                        $this->session->set_userdata('student', $session_data);
                        if ($result[0]->role == "parent") {
                            $this->customlib->setUserLog($result[0]->username, $result[0]->role);
                        }
                        
                        redirect('user/user/choose');
                    } else {
                        $data['error_message'] = 'Account Suspended';
                        $this->load->view('userlogin', $data);
                    }
                } else {
                    $data['error_message'] = $this->lang->line('your_account_is_disabled_please_contact_to_administrator');
                    $this->load->view('userlogin', $data);
                }
            } else {
                $data['error_message'] = $this->lang->line('invalid_username_or_password');
                $this->load->view('userlogin', $data);
            }
        }
    }

    public function savemulticlass() {

        $student_id = '';
        $this->form_validation->set_rules('student_id', $this->lang->line('student'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $msg = array(
                'student_id' => form_error('student_id')
            );

            $array = array('status' => '0', 'error' => $msg, 'message' => '');
        } else {

            $data = array(
                'student_id' => date('Y-m-d', strtotime($this->input->post('student_id'))),
            );


            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        }
        echo json_encode($array);
    }

}

?>