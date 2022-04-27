<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Studentfee extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('smsgateway');
        $this->load->library('mailsmsconf');
        $this->userdata = $this->customlib->getUserData();
        $this->search_type = $this->config->item('search_type');
        $this->sch_setting_detail = $this->setting_model->getSetting($this->userdata['admin_id']);
    }

    public function index() {
       
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'ACCOUNTS');
        $this->session->set_userdata('sub_heading', 'FEE');
        $this->session->set_userdata('top_menu', $this->lang->line('fees_collection'));
        $this->session->set_userdata('sub_menu', 'studentfee/index');
        $data['title'] = 'student fees';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;
        
        $feegroup = $this->feegroup_model->get_classes(null, $this->userdata['admin_id']);
        
        $data['feegroupList'] = $feegroup;
        
        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/studentfeeSearch', $data);
        $this->load->view('layout/footer', $data);
    }

    public function collection_report() {
            
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }

        $data['collect_by'] = $this->studentfeemaster_model->get_feesreceived_by($this->userdata['admin_id'], $this->userdata['created_by']);

        $data['searchlist'] = $this->customlib->get_searchtype();
        $data['group_by'] = $this->customlib->get_groupby();

        $this->session->set_userdata('top_menu', 'Reports');
        $this->session->set_userdata('sub_menu', 'Reports/finance');
        $this->session->set_userdata('subsub_menu', 'Reports/finance/collection_report');

        if (isset($_POST['search_type']) && $_POST['search_type'] != '') {

            $dates = $this->customlib->get_betweendate($_POST['search_type']);
            $data['search_type'] = $_POST['search_type'];
        } else {

            $dates = $this->customlib->get_betweendate('this_year');
            $data['search_type'] = '';
        }

        if (isset($_POST['collect_by']) && $_POST['collect_by'] != '') {

            $data['received_by'] = $received_by = $_POST['collect_by'];
        } else {

            $data['received_by'] = $received_by = '';
        }

        if (isset($_POST['group']) && $_POST['group'] != '') {

            $data['group_byid'] = $group = $_POST['group'];
        } else {

            $data['group_byid'] = $group = '';
        }

        $collect_by = array();
        $collection = array();
        $start_date = date('Y-m-d', strtotime($dates['from_date']));
        $end_date = date('Y-m-d', strtotime($dates['to_date']));
        //echo $start_date." ".$end_date;die;//2019-01-01 2019-12-31
        $data['collectlist'] = $this->studentfeemaster_model->getFeeCollectionReport($start_date, $end_date, null, null, $this->userdata['admin_id']);
        // echo $this->db->last_query();die;
        $this->form_validation->set_rules('search_type', $this->lang->line('search') . " " . $this->lang->line('type'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('collect_by', $this->lang->line('collect') . " " . $this->lang->line('by'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('group', $this->lang->line('group') . " " . $this->lang->line('by'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {

            $data['results'] = array();
        } else {

            $data['results'] = $this->studentfeemaster_model->getFeeCollectionReport($start_date, $end_date, $received_by, $group,$this->userdata['admin_id']);

            if ($group != '') {

                if ($group == 'class') {

                    $group_by = 'class_id';
                } elseif ($group == 'collection') {

                    $group_by = 'received_by';
                } elseif ($group == 'mode') {

                    $group_by = 'payment_mode';
                }

                foreach ($data['results'] as $key => $value) {

                    $collection[$value[$group_by]][] = $value;
                }
            } else {

                $s = 0;
                foreach ($data['results'] as $key => $value) {

                    $collection[$s++] = array($value);
                }
            }

            $data['results'] = $collection;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/collection_report', $data);
        $this->load->view('layout/footer', $data);
    }

    public function pdf() {
        $this->load->helper('pdf_helper');
    }

    public function search() {                 
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Student Search';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;
        
        $feegroup = $this->feegroup_model->get_classes(null, $this->userdata['admin_id']);
        $data['feegroupList'] = $feegroup;
        
        $button = $this->input->post('search');
        $data['adm_auto_insert'] = $this->sch_setting_detail->adm_auto_insert;
        $data['sch_setting'] = $this->sch_setting_detail;
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/studentfeeSearch', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $class = $this->input->post('class_id');
            $section = $this->input->post('section_id');
            $search = $this->input->post('search');
            $search_text = $this->input->post('search_text');
            $newdata = array( 
               'class_id'  => $class, 
               'section_id'     => $section, 
               'search_text' => $search_text
            );  
            $this->session->set_userdata($newdata);

            if (isset($search)) {
                if ($search == 'search_filter') {
                    $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required|xss_clean');
                    if ($this->form_validation->run() == false) {
                        
                    } else {
                        $resultlist = $this->student_model->searchByClassSection($class, $section, $this->userdata['admin_id']);
                        $data['resultlist'] = $resultlist;
                    }
                } else if ($search == 'search_full') {
                    $resultlist = $this->student_model->searchFullText($search_text, null, $this->userdata['admin_id']);
                    $data['resultlist'] = $resultlist;
                }
                $this->load->view('layout/header', $data);
                $this->load->view('studentfee/studentfeeSearch', $data);
                $this->load->view('layout/footer', $data);
            }
        }
    }

    public function feesearch() {
        
         
        if (!$this->rbac->hasPrivilege('search_due_fees', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'studentfee/feesearch');
        $data['title'] = 'student fees';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;
        $feesessiongroup = $this->feesessiongroup_model->getFeesByGroup(null, $this->userdata['admin_id']);

        $data['feesessiongrouplist'] = $feesessiongroup;
        $data['fees_group'] = "";
        if (isset($_POST['feegroup_id']) && $_POST['feegroup_id'] != '') {
            $data['fees_group'] = $_POST['feegroup_id'];
        }

        $this->form_validation->set_rules('feegroup_id', $this->lang->line('fee_group'), 'trim|required|xss_clean');

        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('section_id', $this->lang->line('section'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/studentSearchFee', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data['student_due_fee'] = array();
            $feegroup_id = $this->input->post('feegroup_id');
            $feegroup = explode("-", $feegroup_id);
            $feegroup_id = $feegroup[0];
            $fee_groups_feetype_id = $feegroup[1];
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $student_due_fee = $this->studentfee_model->getDueStudentFees($feegroup_id, $fee_groups_feetype_id, $class_id, $section_id, $this->userdata['admin_id']);
            if (!empty($student_due_fee)) {
                foreach ($student_due_fee as $student_due_fee_key => $student_due_fee_value) {
                    $amt_due = $student_due_fee_value['amount'];
                    $student_due_fee[$student_due_fee_key]['amount_discount'] = 0;
                    $student_due_fee[$student_due_fee_key]['amount_fine'] = 0;
                    $a = json_decode($student_due_fee_value['amount_detail']);
                    if (!empty($a)) {
                        $amount = 0;
                        $amount_discount = 0;
                        $amount_fine = 0;

                        foreach ($a as $a_key => $a_value) {
                            $amount = $amount + $a_value->amount;
                            $amount_discount = $amount_discount + $a_value->amount_discount;
                            $amount_fine = $amount_fine + $a_value->amount_fine;
                        }
                        if ($amt_due <= $amount) {
                            unset($student_due_fee[$student_due_fee_key]);
                        } else {

                            $student_due_fee[$student_due_fee_key]['amount_detail'] = $amount;
                            $student_due_fee[$student_due_fee_key]['amount_discount'] = $amount_discount;
                            $student_due_fee[$student_due_fee_key]['amount_fine'] = $amount_fine;
                        }
                    }
                }
            }

            $data['student_due_fee'] = $student_due_fee;
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/studentSearchFee', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    public function reportbyname() {
        if (!$this->rbac->hasPrivilege('fees_statement', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Reports');
        $this->session->set_userdata('sub_menu', 'Reports/finance');
        $this->session->set_userdata('subsub_menu', 'Reports/finance/reportbyname');
        $data['title'] = 'student fees';
        $data['title'] = 'student fees';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;

        if ($this->input->server('REQUEST_METHOD') == "GET") {

            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/reportByName', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $this->form_validation->set_rules('section_id', $this->lang->line('section'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('student_id', $this->lang->line('student'), 'trim|required|xss_clean');

            if ($this->form_validation->run() == false) {

                $this->load->view('layout/header', $data);
                $this->load->view('studentfee/reportByName', $data);
                $this->load->view('layout/footer', $data);
            } else {

                $data['student_due_fee'] = array();
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $student_id = $this->input->post('student_id');
                $student = $this->student_model->get($student_id, $this->userdata['admin_id']);
                $data['student'] = $student;
                $student_due_fee = $this->studentfeemaster_model->getStudentFees($student['student_session_id']);
                $student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($student['student_session_id']);
                $data['student_discount_fee'] = $student_discount_fee;
                $data['student_due_fee'] = $student_due_fee;
                $data['class_id'] = $class_id;
                $data['section_id'] = $section_id;
                $data['student_id'] = $student_id;
                $category = $this->category_model->get(null, $this->userdata['admin_id']);
                $data['categorylist'] = $category;
                $this->load->view('layout/header', $data);
                $this->load->view('studentfee/reportByName', $data);
                $this->load->view('layout/footer', $data);
            }
        }
    }

    public function reportbyclass() {
        $data['title'] = 'student fees';
        $data['title'] = 'student fees';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/reportByClass', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $student_fees_array = array();
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $student_result = $this->student_model->searchByClassSection($class_id, $section_id);
            $data['student_due_fee'] = array();
            if (!empty($student_result)) {
                foreach ($student_result as $key => $student) {
                    $student_array = array();
                    $student_array['student_detail'] = $student;
                    $student_session_id = $student['student_session_id'];
                    $student_id = $student['id'];
                    $student_due_fee = $this->studentfee_model->getDueFeeBystudentSection($class_id, $section_id, $student_session_id);
                    $student_array['fee_detail'] = $student_due_fee;
                    $student_fees_array[$student['id']] = $student_array;
                }
            }
            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            $data['student_fees_array'] = $student_fees_array;
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/reportByClass', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    public function view($id) {
        
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'studentfee List';
        $studentfee = $this->studentfee_model->get($id, 'desc', $this->userdata['admin_id']);
        $data['studentfee'] = $studentfee;
        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/studentfeeShow', $data);
        $this->load->view('layout/footer', $data);
    }

    public function deleteFee() {

        if (!$this->rbac->hasPrivilege('collect_fees', 'can_delete')) {
            access_denied();
        }
        $invoice_id = $this->input->post('main_invoice');
        $sub_invoice = $this->input->post('sub_invoice');
        if (!empty($invoice_id)) {
            $this->studentfee_model->remove($invoice_id, $sub_invoice);
        }
        $array = array('status' => 'success', 'result' => 'success');
        echo json_encode($array);
    }

    public function deleteStudentDiscount() {

        $discount_id = $this->input->post('discount_id');
        if (!empty($discount_id)) {
            $data = array('id' => $discount_id, 'status' => 'assigned', 'payment_id' => "");
            $this->feediscount_model->updateStudentDiscount($data);
        }
        $array = array('status' => 'success', 'result' => 'success');
        echo json_encode($array);
    }

    public function getcollectfee() {

        $invoice_no = $this->studentfeemaster_model->isInvoiceNoExist($this->userdata['admin_id']);
        if(empty($invoice_no->invoice_no)){
            $data['invoice_no'] = 'FRV'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_no'] = 'FRV'.date('d').date('m').date('y').'00000'.$randno;
        }

        $data['std_id']         = $this->input->post('std_id');
        $data['bankAccounts']   = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $data['deposit_cash_accounts'] = $this->account_model->getBankAccount(30, $this->userdata['admin_id']);
        //$data['fines']          = $this->account_model->getBankAccount(44, $this->userdata['admin_id']);
        $data['fines']          = $this->fine_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['discounts']      = $this->feediscount_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['student']        = $this->student_model->getByStudentSession($data['std_id'], $this->userdata['admin_id']);
        $data['discount_not_applied']   = $this->getNotAppliedDiscount($data['std_id'], $this->userdata['admin_id']);

        $setting_result = $this->setting_model->get(null, $this->userdata['admin_id']);
        $data['settinglist'] = $setting_result;
        $record = $this->input->post('data');
        $record_array = json_decode($record);

        $fees_array = array();
        foreach ($record_array as $key => $value) {
            $fee_groups_feetype_id = $value->fee_groups_feetype_id;
            $fee_master_id = $value->fee_master_id;
            $fee_session_group_id = $value->fee_session_group_id;
            $feeList = $this->studentfeemaster_model->getDueFeeByFeeSessionGroupFeetype($fee_session_group_id, $fee_master_id, $fee_groups_feetype_id);
            $fees_array[] = $feeList;
        }
        $data['feearray'] = $fees_array;
        $result = array(
            'view' => $this->load->view('studentfee/getfeereceiptvoucher', $data, true),
        );

        $this->output->set_output(json_encode($result));
    }

    public function addfee($id) {
 
         
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_add')) {
            access_denied();
        }

        $data['referer_url'] = $_SERVER['HTTP_REFERER'];
        $data['sch_setting'] = $this->sch_setting_detail;

        $data['title'] = 'Fee Receipt Voucher';

        $invoice_no = $this->studentfeemaster_model->isInvoiceNoExist($this->userdata['admin_id']);
        if(empty($invoice_no->invoice_no)){
            $data['invoice_number'] = 'FRV'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_number'] = 'FRV'.date('d').date('m').date('y').'00000'.$randno;
        }

        $data['std_id'] = $id;
        $student = $this->student_model->getByStudentSession($id, $this->userdata['admin_id']);
       // print_r($student);die();
        $data['student'] = $student;
        $data['bankAccounts']   = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $data['deposit_cash_accounts'] = $this->account_model->getBankAccount(30, $this->userdata['admin_id']);
        $data['fines']          = $this->fine_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['discounts']      = $this->feediscount_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['discount_not_applied']   = $this->getNotAppliedDiscount($data['std_id'], $this->userdata['admin_id']);
        $student_due_fee = $this->studentfeemaster_model->getStudentFees($id);
        //print_r($student_due_fee); die();
        //$student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($id);
        //$data['student_discount_fee'] = $student_discount_fee;
        $data['student_due_fee'] = $student_due_fee;
        //print_r($data['student_due_fee'][0]->fees); die();
        
        $category = $this->category_model->get(null, $this->userdata['admin_id']);
        $data['categorylist'] = $category;
        $class_section = $this->student_model->getClassSection($student["class_id"]);
        $data["class_section"] = $class_section;
        $session = $this->setting_model->getCurrentSession($this->userdata['admin_id']);
        $studentlistbysection = $this->student_model->getStudentClassSection($student["class_id"], $session, $this->userdata['admin_id']);
        $data["studentlistbysection"] = $studentlistbysection;

        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/studentAddfee', $data);
        $this->load->view('layout/footer', $data);
    }

    public function deleteTransportFee() {
        $id = $this->input->post('feeid');
        $this->studenttransportfee_model->remove($id);
        $array = array('status' => 'success', 'result' => 'success');
        echo json_encode($array);
    }

    public function delete($id) {
        $data['title'] = 'studentfee List';
        $this->studentfee_model->remove($id);
        redirect('studentfee/index');
    }

    public function create() {
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add studentfee';
        $this->form_validation->set_rules('category', $this->lang->line('category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/studentfeeCreate', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'category' => $this->input->post('category'),
            );
            $this->studentfee_model->add($data);
            $this->session->set_flashdata('msg', '<div studentfee="alert alert-success text-center">' . $this->lang->line('success_message') . '</div>');
            redirect('studentfee/index');
        }
    }

    public function edit($id) {
        if (!$this->rbac->hasPrivilege('collect_fees', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit studentfees';
        $data['id'] = $id;
        $studentfee = $this->studentfee_model->get($id, 'desc', $this->userdata['admin_id']);
        $data['studentfee'] = $studentfee;
        $this->form_validation->set_rules('category', $this->lang->line('category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('studentfee/studentfeeEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'category' => $this->input->post('category'),
            );
            $this->studentfee_model->add($data);
            $this->session->set_flashdata('msg', '<div studentfee="alert alert-success text-center">' . $this->lang->line('update_message') . '</div>');
            redirect('studentfee/index');
        }
    }

    public function addstudentfee() {

        $this->form_validation->set_rules('student_fees_master_id', $this->lang->line('fee_master'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('fee_groups_feetype_id', $this->lang->line('student'), 'required|trim|xss_clean');

        $this->form_validation->set_rules('cash_bank', $this->lang->line('cash_bank'), 'required|trim|xss_clean');
        //$this->form_validation->set_rules('amount_discount', $this->lang->line('discount'), 'required|trim|xss_clean');
        //$this->form_validation->set_rules('amount_fine', $this->lang->line('fine'), 'required|trim|xss_clean');
        //$this->form_validation->set_rules('payment_mode', $this->lang->line('payment_mode'), 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'amount' => form_error('amount'),
                'cash_bank' => form_error('cash_bank'),
                'student_fees_master_id' => form_error('student_fees_master_id'),
                'fee_groups_feetype_id' => form_error('fee_groups_feetype_id'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {

            if($this->input->post('cash_bank')==31){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
                $payment_mode      = 'Bank';
            }else{
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = '';
                $payment_mode      = 'Cash';
            }
            
            $staff_record = $this->staff_model->get($this->customlib->getStaffID());

            $collected_by = " Collected By: " . $this->customlib->getAdminSessionUserName() . "(" . $staff_record['employee_id'] . ")";
            $student_fees_discount_id = $this->input->post('student_fees_discount_id');
            $std_id      = $this->input->post('student_session_id');

            $json_array = array(
                'amount' => $this->input->post('amount'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'amount_discount' => $this->input->post('amount_discount'),
                'amount_fine' => $this->input->post('amount_fine'),
                'description' => $this->input->post('description') . $collected_by,
                'payment_mode' => $payment_mode,
                'reference_number'=>$reference_number,
                'bank_account_id'=>$bank_account_id,
                'invoice_no'=>$this->input->post('invoice_no'),
                'received_by' => $staff_record['id'],
                'std_id'=>$std_id
            );

            $data = array(
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'student_fees_master_id' => $this->input->post('student_fees_master_id'),
                'fee_groups_feetype_id' => $this->input->post('fee_groups_feetype_id'),
                'std_id'=>$std_id,
                'account_type_id'=>$this->input->post('account_id'),
                'invoice_no' => $this->input->post('invoice_no'),
                'reference_number'=>$reference_number,
                'month_name'=>$this->input->post('month_name'),
                'fee_due_date'=>$this->input->post('fee_due_date'),
                'amount_detail' => $json_array,
            );

            $action = $this->input->post('action');
            $send_to = $this->input->post('guardian_phone');
            $email = $this->input->post('guardian_email');
            $parent_app_key = $this->input->post('parent_app_key');
            $student_session_id = $this->input->post('student_session_id');
            
            $inserted_id = $this->studentfeemaster_model->fee_deposit($data, $send_to, $student_fees_discount_id);
            $last_inserted_id = json_decode($inserted_id);
            
            if($last_inserted_id->invoice_id){

                    $student     = $this->student_model->getByStudentSession($std_id);
                    //$bank_account_id  = $this->input->post('bank_account_id');
                    $reference_number = $this->input->post('reference_number');

                    if($this->input->post('amount_fine') > 0 && $this->input->post('sel_fine_id') > 0){

                        $selected_fine_id   = $this->input->post('sel_fine_id');
                        $fine_acc_head = $this->account_model->getNameFrom($selected_fine_id);

                        $credit_data = array(
                            'admin_id' => $this->userdata['admin_id'],
                            'created_by' => $this->userdata['id'],
                            'amount' => $this->input->post('amount_fine'),
                            'voucher_id'=>$last_inserted_id->invoice_id,
                            'voucher_number'=>$this->input->post('invoice_no'),
                            'inv_id' => $last_inserted_id->sub_invoice_id,
                            'voucher_type'=>'FRV',
                            'account_id' => $selected_fine_id,
                            'fund_trans_deposit'=>$fine_acc_head,
                            'type' => 'credit',
                            'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $fine_acc_head.")",
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date')))
                            
                        );

                        $credit_id = $this->account_model->createAccountTransaction($credit_data);

                        $to_account = $this->account_model->getNameFrom($bank_account_id);
                        $debit_data = $credit_data;
                        $debit_data['fund_trans_deposit'] = $to_account;
                        $debit_data['type'] = 'debit';
                        $debit_data['account_id'] = $bank_account_id;
                        $debit_data['transfer_transaction_id'] = $credit_id;
                        $debit_id = $this->account_model->createAccountTransaction($debit_data);

                        $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                        $this->account_model->updateAccountTransaction($newData);
                    }

                        if($this->input->post('amount_discount') > 0 && $this->input->post('sel_discount_id') > 0){
                            
                            $selected_discount_id   = $this->input->post('sel_discount_id');
                            $disc_account_head = $this->account_model->getNameFrom($selected_discount_id);

                            $credit_data = array(
                                'admin_id' => $this->userdata['admin_id'],
                                'created_by' => $this->userdata['id'],
                                'amount' => $this->input->post('amount_discount'),
                                'voucher_id'=>$last_inserted_id->invoice_id,
                                'voucher_number'=>$this->input->post('invoice_no'),
                                'inv_id' => $last_inserted_id->sub_invoice_id,
                                'voucher_type'=>'FRV',
                                'account_id' => $selected_discount_id,
                                'fund_trans_deposit'=>$disc_account_head,
                                'type' => 'debit',
                                'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $disc_account_head.")",
                                'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date')))
                            );

                        $credit_id = $this->account_model->createAccountTransaction($credit_data);

                        $to_account = $this->account_model->getNameFrom($bank_account_id);
                        $debit_data = $credit_data;
                        $debit_data['fund_trans_deposit'] = $to_account;
                        $debit_data['type'] = 'credit';
                        $debit_data['account_id'] = $bank_account_id;
                        $debit_data['transfer_transaction_id'] = $credit_id;
                        $debit_id = $this->account_model->createAccountTransaction($debit_data);

                        $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                        $this->account_model->updateAccountTransaction($newData);
                    }

                    $account_id   = $this->input->post('account_id');
                    $account_head = $this->account_model->getNameFrom($account_id);
                    
                    $credit_data = array(
                        'admin_id' => $this->userdata['admin_id'],
                        'created_by' => $this->userdata['id'],
                        'amount' => $this->input->post('amount'),
                        'voucher_id'=>$last_inserted_id->invoice_id,
                        'voucher_number'=>$this->input->post('invoice_no'),
                        'inv_id' => $last_inserted_id->sub_invoice_id,
                        'voucher_type'=>'FRV',
                        'account_id' => $account_id,
                        'fund_trans_deposit'=>$account_head,
                        'type' => 'credit',
                        'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $account_head.")",
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date')))
                    );

                    $credit_id = $this->account_model->createAccountTransaction($credit_data);

                    $to_account = $this->account_model->getNameFrom($bank_account_id);
                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $to_account;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $bank_account_id;
                    $debit_data['transfer_transaction_id'] = $credit_id;
                    $debit_id = $this->account_model->createAccountTransaction($debit_data);

                    $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($newData);
            }

            //send email to user/parent
            $mailsms_array = $this->feegrouptype_model->getFeeGroupByID($this->input->post('fee_groups_feetype_id'));
            $print_record = array();
            if ($action == "print") {
                $receipt_data = json_decode($inserted_id);
                $setting_result = $this->setting_model->get(null, $this->userdata['admin_id']);
                $data['settinglist'] = $setting_result;
                $fee_record = $this->studentfeemaster_model->getFeeByInvoice($receipt_data->invoice_id, $receipt_data->sub_invoice_id);
                $student = $this->studentsession_model->searchStudentsBySession($student_session_id);
                $data['student'] = $student;
                $data['sub_invoice_id'] = $receipt_data->sub_invoice_id;
                $data['feeList'] = $fee_record;
                $print_record = $this->load->view('print/printFeesByName', $data, true);
            }
            $mailsms_array->invoice = $inserted_id;
            $mailsms_array->contact_no = $send_to;
            $mailsms_array->email = $email;
            $mailsms_array->parent_app_key = $parent_app_key;

            $this->mailsmsconf->mailsms('fee_submission', $mailsms_array);

            $array = array('status' => 'success', 'error' => '', 'print' => $print_record);
            echo json_encode($array);
        }
    }

    public function addfeegrp() {

        $staff_record = $this->session->userdata('admin');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('cash_bank', 'Payment Mode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('row_counter[]', 'Fees List', 'required|trim|xss_clean');
        $this->form_validation->set_rules('collected_date', 'Date', 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'cash_bank' => form_error('cash_bank'),
                'row_counter' => form_error('row_counter'),
                'collected_date' => form_error('collected_date'),
            );
            $array = array('status' => 0, 'error' => $data);
            echo json_encode($array);
        } else {
            $collected_array    = array();
            $collected_by       = " Collected By: " . $this->customlib->getAdminSessionUserName();
            
            // if($this->input->post('cash_bank')==31){
            //     $bank_account_id   = $this->input->post('bank_account_id');
            //     $reference_number  = $this->input->post('reference_number');
            //     $payment_mode      = 'Bank';
            // }else{
            //     $bank_account_id   = $this->input->post('cash_bank');
            //     $reference_number  = '';
            //     $payment_mode      = 'Cash';
            // }

            if($this->input->post('cash_bank')==31){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
                $payment_mode      = 'Bank';
            }else{
                $bank_account_id   = $this->input->post('deposit_cash_id');
                $reference_number  = '';
                $payment_mode      = 'Cash';
            }

            $fine_amount     = $this->input->post('fine_amount');
            $discount_amount = $this->input->post('discount_amount');
            $std_id          = $this->input->post('std_id');
            $total_row = $this->input->post('row_counter');
            
            $count = 1;
            foreach ($total_row as $total_row_key => $total_row_value) {
                //echo $this->input->post('fee_acc_id_' . $total_row_value);
                $this->input->post('student_fees_master_id_' . $total_row_value);
                $this->input->post('fee_groups_feetype_id_' . $total_row_value);

                $json_array = array(
                    'amount' => $this->input->post('fee_amount_' . $total_row_value),
                    'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('collected_date'))),
                    'amount_fine' => $fine_amount,
                    'amount_discount' => $discount_amount,
                    'description' => $collected_by,
                    'payment_mode' => $payment_mode,
                    'bank_account_id'=>$bank_account_id,
                    'invoice_no'=>$this->input->post('invoice_no'),
                    'reference_number'=>$reference_number,
                    'month_name' => $this->input->post('month_name_' . $total_row_value),
                    'fee_due_date' => $this->input->post('fee_due_date_' . $total_row_value),
                    'received_by' => $staff_record['id'],
                    'std_id'=>$std_id
                );
                $collected_array = array(
                    'admin_id' => $this->userdata['admin_id'],
                    'created_by' => $this->userdata['id'],
                    'student_fees_master_id' => $this->input->post('student_fees_master_id_' . $total_row_value),
                    'fee_groups_feetype_id' => $this->input->post('fee_groups_feetype_id_' . $total_row_value),
                    'std_id'=>$std_id,
                    'account_type_id'=>$this->input->post('fee_acc_id_' . $total_row_value),
                    'invoice_no' => $this->input->post('invoice_no'),
                    'reference_number'=>$reference_number,
                    'month_name' => $this->input->post('month_name_' . $total_row_value),
                    'fee_due_date' => $this->input->post('fee_due_date_' . $total_row_value),
                    'amount_detail' => $json_array
                );

                $last_inserted_array = $this->studentfeemaster_model->fee_deposit_collections($collected_array);
                $inserted_id = json_decode($last_inserted_array);

                if($inserted_id->invoice_id){
                        
                    $student     = $this->student_model->getByStudentSession($std_id);
                    $account_id  = $this->input->post('fee_acc_id_' . $total_row_value);
                    $account_head  = $this->account_model->getNameFrom($account_id);

                    if($count==1){
                        if($fine_amount > 0 && $this->input->post('selfine') > 0){

                            $selected_fine_id   = $this->input->post('selfine');
                            $fine_acc_head = $this->account_model->getNameFrom($selected_fine_id);

                            $credit_data = array(
                                'admin_id' => $this->userdata['admin_id'],
                                'created_by' => $this->userdata['id'],
                                'amount' => $fine_amount,
                                'voucher_id'=>$inserted_id->invoice_id,
                                'voucher_number'=>$this->input->post('invoice_no'),
                                'inv_id' => $inserted_id->sub_invoice_id,
                                'voucher_type'=>'FRV',
                                'account_id' => $selected_fine_id,
                                'fund_trans_deposit'=>$fine_acc_head,
                                'type' => 'credit',
                                'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $fine_acc_head.")",
                                'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('collected_date')))
                            );

                            $credit_id = $this->account_model->createAccountTransaction($credit_data);
                            $to_account = $this->account_model->getNameFrom($bank_account_id);
                            $debit_data = $credit_data;
                            $debit_data['fund_trans_deposit'] = $to_account;
                            $debit_data['type'] = 'debit';
                            $debit_data['account_id'] = $bank_account_id;
                            $debit_data['transfer_transaction_id'] = $credit_id;
                            $debit_id = $this->account_model->createAccountTransaction($debit_data);

                            $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                            $this->account_model->updateAccountTransaction($newData);
                        }

                        if($discount_amount > 0 && $this->input->post('sel_discount') > 0){
                                
                                $selected_discount_id   = $this->input->post('sel_discount');
                                $disc_account_head = $this->account_model->getNameFrom($selected_discount_id);

                                $credit_data = array(
                                'admin_id' => $this->userdata['admin_id'],
                                'created_by' => $this->userdata['id'],
                                'amount' => $discount_amount,
                                'voucher_id'=>$inserted_id->invoice_id,
                                'voucher_number'=>$this->input->post('invoice_no'),
                                'inv_id' => $inserted_id->sub_invoice_id,
                                'voucher_type'=>'FRV',
                                'account_id' => $selected_discount_id,
                                'fund_trans_deposit'=>$disc_account_head,
                                'type' => 'debit',
                                'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $disc_account_head.")",
                                'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('collected_date'))),
                            );

                            $credit_id = $this->account_model->createAccountTransaction($credit_data);

                            $to_account = $this->account_model->getNameFrom($bank_account_id);
                            $debit_data = $credit_data;
                            $debit_data['fund_trans_deposit'] = $to_account;
                            $debit_data['type'] = 'credit';
                            $debit_data['account_id'] = $bank_account_id;
                            $debit_data['transfer_transaction_id'] = $credit_id;
                            $debit_id = $this->account_model->createAccountTransaction($debit_data);

                            $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                            $this->account_model->updateAccountTransaction($newData);
                        }
                    }
                        
                    $credit_data = array(
                        'admin_id' => $this->userdata['admin_id'],
                        'created_by' => $this->userdata['id'],
                        'amount' => $this->input->post('fee_amount_' . $total_row_value),
                        'voucher_id'=>$inserted_id->invoice_id,
                        'voucher_number'=>$this->input->post('invoice_no'),
                        'voucher_type'=>'FRV',
                        'inv_id' => $inserted_id->sub_invoice_id,
                        'account_id' => $account_id,
                        'fund_trans_deposit'=>$account_head,
                        'type' => 'credit',
                        'description'=>$student['admission_no'].' '.$student['firstname'].' '.$student['lastname'].' '. " (" . $student['section'] . ' '. $account_head.")",
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('collected_date')))
                        
                    );

                    $credit_id = $this->account_model->createAccountTransaction($credit_data);

                    $to_account = $this->account_model->getNameFrom($bank_account_id);
                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $to_account;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $bank_account_id;
                    $debit_data['transfer_transaction_id'] = $credit_id;
                    $debit_id = $this->account_model->createAccountTransaction($debit_data);

                    $newData = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($newData);
                }
                $count++;
            }

            $array = array('status' => 1, 'error' => '');
            echo json_encode($array);
        }
    }

    public function printFeesByName() {
        $data = array('payment' => "0");
        $record = $this->input->post('data');
        $invoice_id = $this->input->post('main_invoice');
        $sub_invoice_id = $this->input->post('sub_invoice');
        $student_session_id = $this->input->post('student_session_id');
        $setting_result = $this->setting_model->get(null, $this->userdata['admin_id']);
        $data['settinglist'] = $setting_result;
        $student = $this->studentsession_model->searchStudentsBySession($student_session_id);

        $fee_record = $this->studentfeemaster_model->getFeeByInvoice($invoice_id, $sub_invoice_id);
        $data['student'] = $student;
        $data['sub_invoice_id'] = $sub_invoice_id;
        $data['feeList'] = $fee_record;
        $this->load->view('print/printFeesByName', $data);
    }

    public function printFeesByGroup() {
        $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
        $fee_master_id = $this->input->post('fee_master_id');
        $fee_session_group_id = $this->input->post('fee_session_group_id');
        $setting_result = $this->setting_model->get(null, $this->userdata['admin_id']);
        $data['settinglist'] = $setting_result;
        $data['feeList'] = $this->studentfeemaster_model->getDueFeeByFeeSessionGroupFeetype($fee_session_group_id, $fee_master_id, $fee_groups_feetype_id);

        $this->load->view('print/printFeesByGroup', $data);
    }

    public function printFeesByGroupArray() {
        $setting_result = $this->setting_model->get(null, $this->userdata['admin_id']);

        $data['settinglist'] = $setting_result;
        $record = $this->input->post('data');
        $record_array = json_decode($record);
        $fees_array = array();
        foreach ($record_array as $key => $value) {
            $fee_groups_feetype_id = $value->fee_groups_feetype_id;
            $fee_master_id = $value->fee_master_id;
            $fee_session_group_id = $value->fee_session_group_id;
            $feeList = $this->studentfeemaster_model->getDueFeeByFeeSessionGroupFeetype($fee_session_group_id, $fee_master_id, $fee_groups_feetype_id);
            $fees_array[] = $feeList;
        }
        $data['feearray'] = $fees_array;
        $this->load->view('print/printFeesByGroupArray', $data);
    }

    public function searchpayment() {
        if (!$this->rbac->hasPrivilege('search_fees_payment', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'studentfee/searchpayment');
        $data['title'] = 'Edit studentfees';

        $this->form_validation->set_rules('paymentid', $this->lang->line('payment_id'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            
        } else {
            $paymentid = $this->input->post('paymentid');
            $invoice = explode("/", $paymentid);

            if (array_key_exists(0, $invoice) && array_key_exists(1, $invoice)) {
                $invoice_id = $invoice[0];
                $sub_invoice_id = $invoice[1];
                $feeList = $this->studentfeemaster_model->getFeeByInvoice($invoice_id, $sub_invoice_id);
                $data['feeList'] = $feeList;
                $data['sub_invoice_id'] = $sub_invoice_id;
            } else {
                $data['feeList'] = array();
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/searchpayment', $data);
        $this->load->view('layout/footer', $data);
    }

    public function addfeegroup() {
        $this->form_validation->set_rules('fee_session_groups', $this->lang->line('fee_group'), 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'fee_session_groups' => form_error('fee_session_groups'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {

            $month_name = $this->input->post('fee_month');
            $due_date   = date('Y-m-d', strtotime($this->input->post('due_date')));
            $selected_feetype = $this->input->post('selected_feetype');
            $selected_feetype_array = isset($selected_feetype) ? $selected_feetype : array();
            $student_session_id = $this->input->post('student_session_id');
            $fee_session_groups = $this->input->post('fee_session_groups');
            $student_sesssion_array = isset($student_session_id) ? $student_session_id : array();
            $student_ids = $this->input->post('student_ids');
            $delete_student = array_diff($student_ids, $student_sesssion_array);

            $preserve_record = array();
            if (!empty($student_sesssion_array)) {
                foreach ($student_sesssion_array as $key => $value) {
                    $insert_array = array(
                        'admin_id' => $this->userdata['admin_id'],
                        'created_by' => $this->userdata['id'],
                        'student_session_id' => $value,
                        'fee_session_group_id' => $fee_session_groups,
                        'fee_session_group_id' => $fee_session_groups,
                        'month_name' => $month_name,
                        'fee_due_date' => $due_date,
                    );
                    $inserted_id = $this->studentfeemaster_model->add($insert_array);

                    $preserve_record[] = $inserted_id;
                }
            }
            // if (!empty($delete_student)) {
            //     $this->studentfeemaster_model->delete($fee_session_groups, $delete_student);
            // }

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            echo json_encode($array);
        }
    }

    public function geBalanceFee() {

        $this->form_validation->set_rules('fee_groups_feetype_id', $this->lang->line('fee_groups_feetype_id'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('student_fees_master_id', 'student_fees_master_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('student_session_id', 'student_session_id', 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'fee_groups_feetype_id' => form_error('fee_groups_feetype_id'),
                'student_fees_master_id' => form_error('student_fees_master_id'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            $data = array();
            $student_session_id = $this->input->post('student_session_id');
            $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
            $student_fees_master_id = $this->input->post('student_fees_master_id');
            $remain_amount_object = $this->getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id);
            $discount_not_applied = $this->getNotAppliedDiscount($student_session_id, $this->userdata['admin_id']);
            $remain_amount = json_decode($remain_amount_object)->balance;
            $remain_amount_fine = json_decode($remain_amount_object)->fine_amount;

            $array = array('status' => 'success', 'error' => '', 'balance' => $remain_amount, 'discount_not_applied' => $discount_not_applied, 'remain_amount_fine' => $remain_amount_fine);
            echo json_encode($array);
        }
    }

    public function getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id) {
        $data = array();
        $data['fee_groups_feetype_id'] = $fee_groups_feetype_id;
        $data['student_fees_master_id'] = $student_fees_master_id;
        $result = $this->studentfeemaster_model->studentDeposit($data);
        $amount_balance = 0;
        $amount = 0;
        $amount_fine = 0;
        $amount_discount = 0;
        $fine_amount = 0;
        $fee_fine_amount = 0;
        $due_amt = $result->amount;
        if (strtotime($result->due_date) < strtotime(date('Y-m-d'))) {
            $fee_fine_amount = $result->fine_amount;
        }

        if ($result->is_system) {
            $due_amt = $result->student_fees_master_amount;
        }

        $amount_detail = json_decode($result->amount_detail);
        if (is_object($amount_detail)) {

            foreach ($amount_detail as $amount_detail_key => $amount_detail_value) {
                $amount = $amount + $amount_detail_value->amount;
                $amount_discount = $amount_discount + $amount_detail_value->amount_discount;
                $amount_fine = $amount_fine + $amount_detail_value->amount_fine;
            }
        }

        $amount_balance = $due_amt - ($amount + $amount_discount);
        $fine_amount = abs($amount_fine - $fee_fine_amount);
        $array = array('status' => 'success', 'error' => '', 'balance' => $amount_balance, 'fine_amount' => $fine_amount);
        return json_encode($array);
    }

    public function check_deposit($amount) {
        if ($this->input->post('amount') != "" && $this->input->post('amount_discount') != "") {
            if ($this->input->post('amount') < 0) {
                $this->form_validation->set_message('check_deposit', $this->lang->line('deposit_amount_can_not_be_less_than_zero'));
                return false;
            } else {
                $student_fees_master_id = $this->input->post('student_fees_master_id');
                $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
                $deposit_amount = $this->input->post('amount') + $this->input->post('amount_discount');
                $remain_amount = $this->getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id);
                $remain_amount = json_decode($remain_amount)->balance;
                if ($remain_amount < $deposit_amount) {
                    $this->form_validation->set_message('check_deposit', $this->lang->line('deposit_amount_can_not_be_greater_than_remaining'));
                    return false;
                } else {
                    return true;
                }
            }
            return true;
        }
        return true;
    }

    public function getNotAppliedDiscount($student_session_id, $admin_id) {

        return $this->feediscount_model->getDiscountNotApplied($student_session_id, $admin_id);
    }

    public function collectedfeelist() {

        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'ACCOUNTS');
        $this->session->set_userdata('sub_heading', 'FEE');
        $this->session->set_userdata('top_menu', $this->lang->line('fees_collection'));
        $this->session->set_userdata('sub_menu', 'studentfee/collectedfeelist');
        
        //$data['bankAccounts']   = $this->account_model->getBankAccount(31);
        //$data['fines']          = $this->account_model->getBankAccount(44);
        $data['studentsLists']  = $this->student_model->getStudents($this->userdata['admin_id']);
        $data['feegroupList']   = $this->feegroup_model->get_classes(null, $this->userdata['admin_id']);

        $studentrows  = $this->studentfee_model->getStudentIds(null, 'desc', $this->userdata['admin_id']);
        //print_r($studentrows); die();
        foreach ($studentrows as $key => $studentrow) {

            $student_name = $this->student_model->getstudentNameById($studentrow['std_id'], $this->userdata['admin_id']);
            $amount_detail = (array)json_decode(($studentrow['amount_detail']));
            
            $studentfeerows  = $this->studentfee_model->get(null, $studentrow['std_id'], 'desc', $this->userdata['admin_id']);

            $collectedfeelist       = array();
            foreach ($studentfeerows as $key => $fee_value) {

               $fee_deposits = json_decode(($fee_value['amount_detail']));

                if (!empty($fee_value['amount_detail'])) {

                    //$student_name[] = $this->student_model->getByStudentSession($fee_value['std_id'], $this->userdata['admin_id']);
                    //print_r($student_name); 
                    //$student_name   = $student['name'];
                    $account_title  = $this->account_model->getNameFrom($fee_value['account_type_id'], $this->userdata['admin_id']);

                    foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                        //'FRV'.date('d').date('m').date('y').'000001';
                        $exp    = explode('00000', $fee_value['invoice_no']);
                        $invoice_no = $exp[0].'00000'.$fee_deposits_value->inv_no;

                        $collectedfeelist[] = array(
                            'id'=>$fee_value['id'],
                            'student_fees_master_id'=>$fee_value['student_fees_master_id'],
                            'fee_groups_feetype_id'=>$fee_value['fee_groups_feetype_id'],
                            'std_id'=>$fee_value['std_id'],
                            'account_type_id'=>$fee_value['account_type_id'],
                            'inv_id'=>$fee_deposits_value->inv_no,
                            'payment_mode'=>$fee_deposits_value->payment_mode,
                            'bank_account_id'=>$fee_deposits_value->bank_account_id,
                            'account_title'=>$account_title,
                            'amount_discount'=>$fee_deposits_value->amount_discount,
                            'amount_fine'=>$fee_deposits_value->amount_fine,
                            'amount'=>$fee_deposits_value->amount,
                        );
                    }
                }
     
            }

            $data['datalist'][] = array(
                'id'=>$studentrow['id'],
                'student_id'=>$studentrow['std_id'],
                'student_name'=>$student_name,
                'invoice_no'=>$studentrow['invoice_no'],
                'reference_number'=>$studentrow['reference_number'],
                'date'=>$amount_detail[1]->date,
                'payment_mode'=>$amount_detail[1]->payment_mode,
                'bank_account_id'=>$amount_detail[1]->bank_account_id,
                'amount_detail'=>$amount_detail,
                'collectedfeelist'=>$collectedfeelist
            );
            

        }

        // print_r($data['datalist']);
        // die();
        
        $this->session->set_userdata('previous_url', current_url());
        $this->load->view('layout/header', $data);
        $this->load->view('studentfee/feeReceiptVoucherList', $data);
        $this->load->view('layout/footer', $data);


    }

    public function getCollectFeeView() {
        $student_id     = $this->input->post('student_id');
        // $data['amount']     = $this->input->post('amount');
        $data['fee_date']   = $this->input->post('fee_date');
        $data['invoice_no'] = $this->input->post('invoice_no');
        // $data['amount_fine']        = $this->input->post('amount_fine');
        // $data['account_title']      = $this->input->post('account_title');
        // $data['amount_discount']    = $this->input->post('amount_discount');
        $data['payment_mode']       = $this->input->post('payment_mode');
        $data['reference_number']   = $this->input->post('reference_number');
        $data['bank_account_id']    = $this->input->post('bank_account_id');


        //$data['net_amount']         = $data['amount']+$data['amount_fine']-$data['amount_discount'];






        //$fee_value                  = $this->studentfee_model->get(null, $student_id, 'desc', $this->userdata['admin_id']);
        $data['student']            = $this->student_model->getByStudentSession($student_id);
        
        if($data['bank_account_id']){
            $bankAccount       = $this->account_model->get($data['bank_account_id']);
            $data['bankAccount'] =$bankAccount['account_title'];
        }

        $studentfeerows  = $this->studentfee_model->get(null, $student_id, 'desc', $this->userdata['admin_id']);

            $collectedfeelist       = array();
            
            foreach ($studentfeerows as $key => $fee_value) {

               $fee_deposits = json_decode(($fee_value['amount_detail']));


                if (!empty($fee_value['amount_detail'])) {

                    //$student_name[] = $this->student_model->getByStudentSession($fee_value['std_id'], $this->userdata['admin_id']);
                    //print_r($student_name); 
                    //$student_name   = $student['name'];
                    $account_title  = $this->account_model->getNameFrom($fee_value['account_type_id'], $this->userdata['admin_id']);
                    $total_amount = 0;
                    $net_amount = 0;
                    $fine_balance = 0;
                    $discount_balance = 0;
                    foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                        
                        $exp    = explode('00000', $fee_value['invoice_no']);
                        $invoice_no = $exp[0].'00000'.$fee_deposits_value->inv_no;

                        $data['amount']   = $total_amount+$fee_deposits_value->amount;
                        //$data['net_amount']     = $net_amount+$fee_deposits_value->amount;
                        $data['amount_fine']    = $fine_balance+$fee_deposits_value->amount_fine;
                        $data['amount_discount'] = $discount_balance+$fee_deposits_value->amount_discount;
                        $data['net_amount']         = $data['amount']+$data['amount_fine']-$data['amount_discount'];
                        if($fee_deposits_value->amount_fine > 0){
                            $data['fines'][] = array(
                                'amount_fine'=>$fee_deposits_value->amount_fine
                            );
                        }
                        
                        if($fee_deposits_value->amount_discount > 0){
                            $data['discounts'][] = array(
                                'amount_discount'=>$fee_deposits_value->amount_discount
                            );
                        }
                        
                        $data['collectedfeelist'][] = array(
                            'id'=>$fee_value['id'],
                            'student_fees_master_id'=>$fee_value['student_fees_master_id'],
                            'fee_groups_feetype_id'=>$fee_value['fee_groups_feetype_id'],
                            'std_id'=>$fee_value['std_id'],
                            'account_type_id'=>$fee_value['account_type_id'],
                            'inv_id'=>$fee_deposits_value->inv_no,
                            'payment_mode'=>$fee_deposits_value->payment_mode,
                            'bank_account_id'=>$fee_deposits_value->bank_account_id,
                            'account_title'=>$account_title,
                            'amount'=>$fee_deposits_value->amount,
                            
                        );
                    }
                }
     
            }

            // print_r($data['collectedfeelist']); 
            //die();


        
        //print_r($bankAccount['account_title']); die();
        // 
        // $fee_deposits = json_decode(($fee_value['amount_detail']));
        //     if (!empty($fee_value['amount_detail'])) {
        //         $data['bankAccounts']   = $this->account_model->get(108);
        //         $data['fines']          = $this->account_model->getBankAccount(44);
        //         $accountinfo  = $this->account_model->get($fee_value['account_type_id']);
        //         foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
        //             //'FRV'.date('d').date('m').date('y').'000001';
        //             $exp    = explode('00000', $fee_value['invoice_no']);
        //             $invoice_no = $exp[0].'00000'.$fee_deposits_value->inv_no;
        //             $data['collectedfee'] = array(
        //                 'id'=>$fee_value['id'],
        //                 'date'=>$fee_deposits_value->date,
        //                 'invoice_no'=>$fee_value['invoice_no'],
        //                 'bank_account_id'=>$fee_value['bank_account_id'],
        //                 'inv_id'=>$fee_deposits_value->inv_no,
        //                 'account_title'=>$accountinfo['account_number'].' - ' .$accountinfo['account_title'],
        //                 'amount_discount'=>$fee_deposits_value->amount_discount,
        //                 'amount_fine'=>$fee_deposits_value->amount_fine,
        //                 'amount'=>$fee_deposits_value->amount,
        //             );
        //         }

        //     }

        //die();

            $this->load->view('studentfee/collectedFeeView', $data);

    }

    function getStudentsBySectionAndByClass(){

        $class_id   = $this->input->get('class_id');
        $section_id = $this->input->get('section_id');
        $data = $this->student_model->searchByClassSection($class_id, $section_id);
        echo json_encode($data);

    }
    

}
