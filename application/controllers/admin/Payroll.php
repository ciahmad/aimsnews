<?php

class Payroll extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->config->load("mailsms");
        $this->config->load("payroll");
        $this->load->library('mailsmsconf');
        $this->config_attendance = $this->config->item('attendence');
        $this->staff_attendance = $this->config->item('staffattendance');
        $this->payment_mode = $this->config->item('payment_mode');
        $this->load->model("payroll_model");
        $this->load->model("staff_model");
        $this->load->model('staffattendancemodel');
        $this->payroll_status = $this->config->item('payroll_status');
        $this->userdata = $this->customlib->getUserData();
        $this->sch_setting_detail = $this->setting_model->getSetting($this->userdata['admin_id']);
    }

    function index() {

        if (!$this->rbac->hasPrivilege('staff_payroll', 'can_view')) {
            access_denied();
        }
        
        $this->session->set_userdata('menu_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/payroll');

        $data["staff_id"] = "";
        $data["name"] = "";
        $data["month"] = date("F", strtotime("-1 month"));
        $data["year"] = date("Y");
        $data["present"] = 0;
        $data["absent"] = 0;
        $data["late"] = 0;
        $data["half_day"] = 0;
        $data["holiday"] = 0;
        $data["leave_count"] = 0;
        $data["alloted_leave"] = 0;
        $data["basic"] = 0;
        $data["payment_mode"] = $this->payment_mode;
        $user_type = $this->staff_model->getStaffRole();
        $data['bankAccounts']   = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $data['deposit_cash_accounts']   = $this->account_model->getBankAccount(30, $this->userdata['admin_id']);
        //print_r($data['bankAccounts']); die();
        $data['classlist'] = $user_type;
        $data['monthlist'] = $this->customlib->getMonthDropdown();
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $submit = $this->input->post("search");
        if (isset($submit) && $submit == "search") {

            $month = $this->input->post("month");
            $year = $this->input->post("year");
            $emp_name = $this->input->post("name");
            $role = $this->input->post("role");

            $searchEmployee = $this->payroll_model->searchEmployee($month, $year, $emp_name, $role, $this->userdata['admin_id']);

            $data["resultlist"] = $searchEmployee;
            //print_r($data["resultlist"]); die();
            $data["name"] = $emp_name;
            $data["month"] = $month;
            $data["year"] = $year;
        }

        $data["payroll_status"] = $this->payroll_status;
        $this->load->view("layout/header", $data);
        $this->load->view("admin/payroll/stafflist", $data);
        $this->load->view("layout/footer", $data);
    }

    function create($month, $year, $id) {

        $data["staff_id"] = "";
        $data["basic"] = "";
        $data["name"] = "";
        $data["month"] = "";
        $data["year"] = "";
        $data["present"] = 0;
        $data["absent"] = 0;
        $data["late"] = 0;
        $data["half_day"] = 0;
        $data["holiday"] = 0;
        $data["leave_count"] = 0;
        $data["alloted_leave"] = 0;
        $data['sch_setting'] = $this->sch_setting_detail;
        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        $user_type = $this->staff_model->getStaffRole();
        $data['classlist'] = $user_type;

        $date = $year . "-" . $month;


        $searchEmployee = $this->payroll_model->searchEmployeeById($id);

        $data['result'] = $searchEmployee;
        $data["month"] = $month;
        $data["year"] = $year;



        $alloted_leave = $this->staff_model->alloted_leave($id);

        $newdate = date('Y-m-d', strtotime($date . " +1 month"));

        $data['monthAttendance'] = $this->monthAttendance($newdate, 3, $id);
        $data['monthLeaves'] = $this->monthLeaves($newdate, 3, $id);

        $data["attendanceType"] = $this->staffattendancemodel->getStaffAttendanceType();

        $data["alloted_leave"] = $alloted_leave[0]["alloted_leave"];

        $this->load->view("layout/header", $data);
        $this->load->view("admin/payroll/create", $data);
        $this->load->view("layout/footer", $data);
    }

    public function autocomplete(){
        
        $account_type_id = $this->input->post('account_type_id');
        $parent_id = $this->input->post('parent_id');
        $resultList = $this->account_model->autoSearch($this->userdata['admin_id'], $this->input->post('keyword'), $account_type_id, $parent_id);
        $resp = [];
        foreach($resultList as $List){
            $resp[] = array('id'=>$List['id'],'account_number'=>$List['account_number'],'account_title'=>$List['account_title']);
        }
        echo json_encode($resp);
    }

    function monthAttendance($st_month, $no_of_months, $emp) {
        $record = array();
        for ($i = 1; $i <= $no_of_months; $i++) {

            $r = array();
            $month = date('m', strtotime($st_month . " -$i month"));
            $year = date('Y', strtotime($st_month . " -$i month"));


            foreach ($this->staff_attendance as $att_key => $att_value) {

                $s = $this->payroll_model->count_attendance_obj($month, $year, $emp, $att_value);


                $r[$att_key] = $s;
            }

            $record['01-' . $month . '-' . $year] = $r;
        }
        return $record;
    }

    function monthLeaves($st_month, $no_of_months, $emp) {
        $record = array();
        for ($i = 1; $i <= $no_of_months; $i++) {

            $r = array();
            $month = date('m', strtotime($st_month . " -$i month"));
            $year = date('Y', strtotime($st_month . " -$i month"));
            $leave_count = $this->staff_model->count_leave($month, $year, $emp);
            if (!empty($leave_count["tl"])) {
                $l = $leave_count["tl"];
            } else {
                $l = "0";
            }

            $record[$month] = $l;
        }

        return $record;
    }

    function payslip() {
        if (!$this->rbac->hasPrivilege('staff_payroll', 'can_add')) {
            access_denied();
        }

        $invoice_no = $this->payroll_model->isInvoiceNoExist($this->userdata['admin_id']);
        if(empty($invoice_no->invoice_no)){
            $data['invoice_no'] = 'PS'.date('d').date('m').date('y').'0001'; 
        }else{
            $exp = explode('000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_no'] = 'PS'.date('d').date('m').date('y').'000'.$randno;
        }

        $basic = $this->input->post("basic");
        $total_allowance = $this->input->post("total_allowance");
        $total_deduction = $this->input->post("total_deduction");
        $net_salary = $this->input->post("net_salary");
        $status = $this->input->post("status");
        $staff_id = $this->input->post("staff_id");
        $month = $this->input->post("month");
        $name = $this->input->post("name");
        $year = $this->input->post("year");
        $tax = $this->input->post("tax");
        $leave_deduction = $this->input->post("leave_deduction");
        $this->form_validation->set_rules('net_salary', 'Net Salary', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->create($month, $year, $staff_id);
        } else {

            $data = array(
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'staff_id' => $staff_id,
                'invoice_no' => $data['invoice_no'],
                'basic' => $basic,
                'total_allowance' => $total_allowance,
                'total_deduction' => $total_deduction,
                'net_salary' => $net_salary,
                'payment_date' => date("Y-m-d"),
                'status' => $status,
                'month' => $month,
                'year' => $year,
                'tax' => $tax,
                'leave_deduction' => '0'
            );

            $checkForUpdate = $this->payroll_model->checkPayslip($month, $year, $staff_id);

            if ($checkForUpdate == true) {
                // print_r($data);die;
                $insert_id = $this->payroll_model->createPayslip($data);
                $payslipid = $insert_id;
                $allowance_type = $this->input->post("allowance_type");
                $deduction_type = $this->input->post("deduction_type");
                $allowance_amount = $this->input->post("allowance_amount");
                $deduction_amount = $this->input->post("deduction_amount");

                if (!empty($allowance_type)) {

                    $i = 0;
                    foreach ($allowance_type as $key => $all) {
                        $all_data = array(
                            'admin_id' => $this->userdata['admin_id'],
                            'created_by' => $this->userdata['id'],
                            'payslip_id' => $payslipid,
                            'account_head_id' => $this->input->post("earning_account_id")[$i],
                            'allowance_type' => $allowance_type[$i],
                            'amount' => $allowance_amount[$i],
                            'staff_id' => $staff_id,
                            'cal_type' => "positive",
                        );

                        $insert_payslip_allowance = $this->payroll_model->add_allowance($all_data);

                        $i++;
                    }
                }

                if (!empty($deduction_type)) {
                    $j = 0;
                    foreach ($deduction_type as $key => $type) {
                        $type_data = array(
                            'admin_id' => $this->userdata['admin_id'],
                            'created_by' => $this->userdata['id'],
                            'payslip_id' => $payslipid,
                            'account_head_id' => $this->input->post("deduction_account_id")[$j],
                            'allowance_type' => $deduction_type[$j],
                            'amount' => $deduction_amount[$j],
                            'staff_id' => $staff_id,
                            'cal_type' => "negative",
                        );
                       
                        $insert_payslip_allowance = $this->payroll_model->add_allowance($type_data);

                        $j++;
                    }
                }

                redirect('admin/payroll');
            } else {

                $this->session->set_flashdata("msg", $this->lang->line('payslip_already_generated'));

                redirect('admin/payroll');
            }
        }
    }

    function search($month, $year, $role = '') {

        $user_type = $this->staff_model->getStaffRole();
        $data['classlist'] = $user_type;
        $data['monthlist'] = $this->customlib->getMonthDropdown();

        $searchEmployee = $this->payroll_model->searchEmployee($month, $year, $emp_name = '', $role);

        $data["resultlist"] = $searchEmployee;
        $data["name"] = $emp_name;
        $data["month"] = $month;
        $data["year"] = $year;
        $data['sch_setting'] = $this->sch_setting_detail;

        $data["payroll_status"] = $this->payroll_status;
        $data["resultlist"] = $searchEmployee;
        $data["payment_mode"] = $this->payment_mode;

        $this->load->view("layout/header", $data);
        $this->load->view("admin/payroll/stafflist", $data);
        $this->load->view("layout/footer", $data);
    }

    function paymentRecord() {

        $month = $this->input->get_post("month");
        $year = $this->input->get_post("year");
        $id = $this->input->get_post("staffid");

        $searchEmployee = $this->payroll_model->searchPayment($id, $month, $year);
        $Allowance = $this->payroll_model->getAllowance($searchEmployee['id'], null, $searchEmployee['staff_id'], $this->userdata['admin_id']);
        
        $data['allowances'] = $Allowance;
        $data['result'] = $searchEmployee;
        $data["month"] = $month;
        $data["year"] = $year;

        //print_r(json_encode($data)); die();

        echo json_encode($data);
    }

    function paymentStatus($status) {

        $id = $this->input->get('id');

        $updateStaus = $this->payroll_model->updatePaymentStatus($status, $id);

        redirect("admin/payroll");
    }

    function paymentSuccess() {

        $payment_mode = $this->input->post("payment_mode");
        $date = $this->input->post("payment_date");
        $payment_date = date('Y-m-d', strtotime($date));
        $remark = $this->input->post("remarks");
        $status = 'paid';
        $payslipid = $this->input->post("paymentid");

        $this->form_validation->set_rules('payment_mode', $this->lang->line('payment') . " " . $this->lang->line('mode'), 'trim|required|xss_clean');
        
        if($this->input->post('payment_mode')==31){
            $this->form_validation->set_rules('bank_account_id', $this->lang->line('bank_acc'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('reference_number', $this->lang->line('ref_no'), 'trim|required|xss_clean');
        }if($this->input->post('payment_mode')==30){
            $this->form_validation->set_rules('deposit_cash_id', $this->lang->line('deposit_cash'), 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('account_title', $this->lang->line('account_head'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $msg = array(
                'payment_mode' => form_error('payment_mode'),
                'account_title' => form_error('account_title'),
                'deposit_cash_id' => form_error('deposit_cash_id'),
                'bank_account_id' => form_error('bank_account_id'),
                'reference_number' => form_error('reference_number'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            $data = array('payment_mode' => $payment_mode, 'payment_date' => $payment_date, 'remark' => $remark, 'status' => $status);

            $last_updated_id = $this->payroll_model->paymentSuccess($data, $payslipid);

            if($last_updated_id){

                if($this->input->post('payment_mode')==31){
                    $bank_account_id   = $this->input->post('bank_account_id');
                    $reference_number  = $this->input->post('reference_number');
                }else{
                    $bank_account_id   = $this->input->post('deposit_cash_id');
                    $reference_number  = '';
                }

                $sum_allowances     = array_sum($this->input->post("allowances"));
                $sum_tax_deduction  = array_sum($this->input->post("tax_deduction"));
                $account_id         = $this->input->post('account_id');
                $total_wages        = $this->input->post('total_wages');
                $invoice_no         = $this->input->post('invoice_no');
                $bank_account_id    = $bank_account_id;
                $payment_date       = $this->input->post('payment_date');
                $staff_std_id       = $this->input->post('staff_std_id');
                if($sum_allowances > 0){
                    $total_cashhand_allowanc  = $total_wages+$sum_allowances;
                }else{
                    $total_cashhand_allowanc  = $total_wages;
                }
                
                $total_cashhand_tax_deduction   = $sum_tax_deduction;
                $deposit_to  = $this->account_model->getNameFrom($account_id);

                if($this->input->post('total_wages')!=''){

                    $debit_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'amount' => $this->input->post('total_wages'),
                        'voucher_id'=>$last_updated_id,
                        'voucher_number'=>$invoice_no,
                        'voucher_type'=>'PS',
                        'account_id' => $account_id,
                        'user_id' => $staff_std_id,
                        'staff_type' => 'staff',
                        'fund_trans_deposit'=>$deposit_to,
                        'type' => 'debit',
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($payment_date)),
                        'created_by' => $this->userdata['id']
                    );

                    $this->account_model->createAccountTransaction($debit_data);
                    
                    $to_account = $this->account_model->getNameFrom($bank_account_id);
                    $credit_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'amount' => $total_cashhand_allowanc,
                        'voucher_id'=>$last_updated_id,
                        'voucher_number'=>$invoice_no,
                        'voucher_type'=>'PS',
                        'account_id' => $bank_account_id,
                        'user_id' => $staff_std_id,
                        'staff_type' => 'staff',
                        'fund_trans_deposit'=>$to_account,
                        'type' => 'credit',
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($payment_date)),
                        'created_by' => $this->userdata['id']
                    );

                    $this->account_model->createAccountTransaction($credit_data);

                    //====================================================
                    if($sum_tax_deduction > 0){

                        $debit_data2 = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'amount' => $sum_tax_deduction,
                            'voucher_id'=>$last_updated_id,
                            'voucher_number'=>$invoice_no,
                            'voucher_type'=>'PS',
                            'account_id' => $bank_account_id,
                            'user_id' => $staff_std_id,
                            'staff_type' => 'staff',
                            'fund_trans_deposit'=>$to_account,
                            'type' => 'debit',
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($payment_date)),
                            'created_by' => $this->userdata['id']
                        );

                        $this->account_model->createAccountTransaction($debit_data2);
                    }


                    for ($i=0; $i < count(array_filter($this->input->post('allowance_id'))); $i++) { 
                        $account_id  = $this->input->post('allowance_id')[$i];
                        $deposit_to  = $this->account_model->getNameFrom($account_id);
                        $debit_data3 = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'amount' => $this->input->post('allowances')[$i],
                            'voucher_id'=>$last_updated_id,
                            'voucher_number'=>$invoice_no,
                            'voucher_type'=>'PS',
                            'account_id' => $account_id,
                            'user_id' => $staff_std_id,
                            'staff_type' => 'staff',
                            'fund_trans_deposit'=>$deposit_to,
                            'type' => 'debit',
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($payment_date)),
                            'created_by' => $this->userdata['id']
                        );
                            $this->account_model->createAccountTransaction($debit_data3);
                    }

                    for ($i=0; $i < count(array_filter($this->input->post('tax_deduction_id'))); $i++) { 
                        $account_id  = $this->input->post('tax_deduction_id')[$i];
                        $to_account = $this->account_model->getNameFrom($account_id);
                        $credit_data4 = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'amount' => $this->input->post('tax_deduction')[$i],
                            'voucher_id'=>$last_updated_id,
                            'voucher_number'=>$invoice_no,
                            'voucher_type'=>'PS',
                            'account_id' => $account_id,
                            'user_id' => $staff_std_id,
                            'staff_type' => 'staff',
                            'fund_trans_deposit'=>$to_account,
                            'type' => 'credit',
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($payment_date)),
                            'created_by' => $this->userdata['id']
                        );

                        $this->account_model->createAccountTransaction($credit_data4);
                    }
                }
            }

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        }
        echo json_encode($array);
    }

    function payslipView() {
        if (!$this->rbac->hasPrivilege('staff', 'can_view')) {
            access_denied();
        }
        $data["payment_mode"] = $this->payment_mode;
        $this->load->model("setting_model");
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result[0];
        $id = $this->input->post("payslipid");
        $result = $this->payroll_model->getPayslip($id);
        $data['sch_setting'] = $this->sch_setting_detail;

        $data['staffid_auto_insert'] = $this->sch_setting_detail->staffid_auto_insert;
        if (!empty($result)) {
            $allowance = $this->payroll_model->getAllowance($result["id"]);
            $data["allowance"] = $allowance;
            $positive_allowance = $this->payroll_model->getAllowance($result["id"], "positive");
            $data["positive_allowance"] = $positive_allowance;
            $negative_allowance = $this->payroll_model->getAllowance($result["id"], "negative");
            $data["negative_allowance"] = $negative_allowance;
            $data["result"] = $result;
            $this->load->view("admin/payroll/payslipview", $data);
        } else {
            echo "<div class='alert alert-info'>No Record Found.</div>";
        }
    }

    function payslippdf() {

        $this->load->model("setting_model");
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result[0];
        // $id = $this->input->post("payslipid");
        $id = 15;
        $result = $this->payroll_model->getPayslip($id);
        $allowance = $this->payroll_model->getAllowance($result["id"]);
        $data["allowance"] = $allowance;
        $positive_allowance = $this->payroll_model->getAllowance($result["id"], "positive");
        $data["positive_allowance"] = $positive_allowance;
        $negative_allowance = $this->payroll_model->getAllowance($result["id"], "negative");
        $data["negative_allowance"] = $negative_allowance;
        $data["result"] = $result;
        $this->load->view("admin/payroll/payslippdf", $data);
    }

    function payrollreport() {
        if (!$this->rbac->hasPrivilege('payroll_report', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Reports');
        $this->session->set_userdata('sub_menu', 'Reports/human_resource');
        $this->session->set_userdata('subsub_menu', 'Reports/attendance/attendance_report');
        $month = $this->input->post("month");
        $year = $this->input->post("year");
        $role = $this->input->post("role");
        $data["month"] = $month;
        $data["year"] = $year;
        $data["role_select"] = $role;
        $data['monthlist'] = $this->customlib->getMonthDropdown();
        $data['yearlist'] = $this->payroll_model->payrollYearCount();
        $staffRole = $this->staff_model->getStaffRole();
        $data["role"] = $staffRole;
        $data["payment_mode"] = $this->payment_mode;

        $this->form_validation->set_rules('year', $this->lang->line('year'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view("layout/header", $data);
            $this->load->view("admin/payroll/payrollreport", $data);
            $this->load->view("layout/footer", $data);
        } else {

            $result = $this->payroll_model->getpayrollReport($month, $year, $role);
            $data["result"] = $result;



            $this->load->view("layout/header", $data);
            $this->load->view("admin/payroll/payrollreport", $data);
            $this->load->view("layout/footer", $data);
        }
    }

    function deletepayroll($payslipid, $month, $year, $role = '') {
        if (!$this->rbac->hasPrivilege('staff_payroll', 'can_delete')) {
            access_denied();
        }
        if (!empty($payslipid)) {

            $this->payroll_model->deletePayslip($payslipid);
        }
        //redirect("admin/payroll");
        redirect('admin/payroll/search/' . $month . "/" . $year . "/" . $role);
    }

    function revertpayroll($payslipid, $month, $year, $role = '') {


        if (!$this->rbac->hasPrivilege('staff_payroll', 'can_delete')) {
            access_denied();
        }
        if (!empty($payslipid)) {

            $psdata = array('admin_id'=>$this->userdata['admin_id'], 'voucher_id'=>$payslipid, 'voucher_type'=>'PS');

            $this->receiptvoucher_model->removeVoucher($psdata);
            $this->payroll_model->revertPayslipStatus($payslipid);
        }
        redirect('admin/payroll/search/' . $month . "/" . $year . "/" . $role);
        //$this->search($month,$year,$role);
        //redirect("admin/payroll");
    }

}

?>