<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentvoucher extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Customlib');
        $this->config->load('app-config');
        $this->userdata   = $this->customlib->getUserData();
    }

    public function index() {

        if (!$this->rbac->hasPrivilege('paymentvoucher', 'can_view')) {
            access_denied();
        }
        
        $invoice_no = $this->paymentvoucher_model->isInvoiceNoExist($this->userdata['admin_id']);
        if(empty($invoice_no->invoice_no)){
            $data['invoice_no'] = 'PV'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_no'] = 'PV'.date('d').date('m').date('y').'00000'.$randno;
        }
       
        $this->session->set_userdata('menu_heading', 'ACCOUNTS');
        $this->session->set_userdata('sub_heading', 'VOUCHERS');
        $this->session->set_userdata('sub_menu', 'paymentvoucher/index');
        $data['title'] = 'Add Payment Vourcher';
        $data['title_list'] = 'Payment Vourcher';

        $class                   = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist']       = $class;

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('staff_std_id'), 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('cash_bank', $this->lang->line('cash_bank'), 'trim|required|xss_clean');
        if($this->input->post('cash_bank')==31){
            $this->form_validation->set_rules('bank_account_id', $this->lang->line('bank_acc'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('reference_number', $this->lang->line('ref_no'), 'trim|required|xss_clean');
        }if($this->input->post('cash_bank')==30){
            $this->form_validation->set_rules('deposit_cash_id', $this->lang->line('deposit_cash'), 'trim|required|xss_clean');
        }

        if ( $this->input->post('account_id')[0] == -1 ){
            $this->form_validation->set_rules('account_id', 'A/C Head', 'trim|required|xss_clean');
        }if ( $this->input->post('amount')[0] == '' ){
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');


        $data['account_id'] = array(1);
        if(count($this->input->post('account_id')) > 0){
            $data['account_id']     = $this->input->post('account_id');
            $data['account_title']  = $this->input->post('account_title');
            $data['description']    = $this->input->post('description');
            $data['amount']         = $this->input->post('amount');
        }

        if ($this->form_validation->run() == false) {

        } else {

            if($this->input->post('cash_bank')==31){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
            }else{
                $bank_account_id   = $this->input->post('deposit_cash_id');
                $reference_number  = '';
            }

            if ($this->input->post('staff_std_id')!='') {
               $staff_std_id = $this->input->post('staff_std_id');
            }else{
                $staff_std_id = $this->input->post('name');
            }

            $data = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'staff_std_id' => $staff_std_id,
                'class_id' => $this->input->post('class_id'),
                'section_id' => $this->input->post('section_id'),
                'name' => $this->input->post('name'),
                'staff_type' => $this->input->post('staff_type'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'invoice_no' => $data['invoice_no'],
                'cash_bank' => $this->input->post('cash_bank'),
                'bank_account_id' => $bank_account_id,
                'account_id' => $bank_account_id,
                'reference_number' => $this->input->post('reference_number'),
                'total_amount' => $this->input->post('total_amount'),
            );

            $insert_id = $this->paymentvoucher_model->add($data);

            if($insert_id){
                
                for ($i=0; $i < count(array_filter($this->input->post('account_id'))); $i++) { 
                    $data_list = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'paymentvoucher_id'=>$insert_id,
                        'account_id'=>$this->input->post('account_id')[$i],
                        'account_id'=>$this->input->post('account_id')[$i],
                        'description'=>$this->input->post('description')[$i],
                        'amount'=>$this->input->post('amount')[$i],
                    );

                    $this->paymentvoucher_model->addPaymentVoucherList($data_list);

                    $account_id  = $this->input->post('account_id')[$i];
                    $deposit_to  = $this->account_model->getNameFrom($account_id);
                    $credit_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'amount' => $this->input->post('amount')[$i],
                        'voucher_id'=>$insert_id,
                        'voucher_number'=>$this->input->post('invoice_no'),
                        'voucher_type'=>'PV',
                        'account_id' => $bank_account_id,
                        'user_id' => $staff_std_id,
                        'staff_type' => $this->input->post('staff_type'),
                        'fund_trans_deposit'=>$deposit_to,
                        'type' => 'credit',
                        'description'=>$this->input->post('description')[$i],
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                        'created_by' => $this->userdata['id']
                    );

                    $credit_id = $this->account_model->createAccountTransaction($credit_data);
                    $to_account = $this->account_model->getNameFrom($bank_account_id);
                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $to_account;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $account_id;
                    $debit_data['transfer_transaction_id'] = $credit_id;
                    $debit_id = $this->account_model->createAccountTransaction($debit_data);

                    $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($data);

                }
            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/paymentvoucher/index');
        }

        $paymentvoucher_result = $this->paymentvoucher_model->getPV(null, $this->userdata['admin_id']);
        $data['pvlist'] = $paymentvoucher_result;
        $accountHeads = $this->account_model->get();
        $data['accountheads'] = $accountHeads;
        $data['bankAccounts'] = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $data['deposit_cash_accounts'] = $this->account_model->getBankAccount(30, $this->userdata['admin_id']);

        $this->load->view('layout/header', $data);
        $this->load->view('admin/paymentvoucher/paymentvoucherlist', $data);
        $this->load->view('layout/footer', $data);
    }

    public function download($documents) {
        $this->load->helper('download');
        $filepath = "./uploads/school_income/" . $this->uri->segment(6);
        $data = file_get_contents($filepath);
        $name = $this->uri->segment(6);
        force_download($name, $data);
    }

    public function view($id) {
        //echo $id; die();
        if (!$this->rbac->hasPrivilege('paymentvoucher', 'can_view')) {
            access_denied();
        }
        
        $data['title']          = 'View Payment Voucher';
        $data['id']             = $id;
        $data['bankAccounts']   = $this->account_model->getBankAccount(31);

        $paymentvoucher_result  = $this->paymentvoucher_model->get($id, $this->userdata['admin_id']);
        $data['rvlist']         = $paymentvoucher_result;

        $data['title_list']     = 'Payment Voucher List';
        $data['counter']        = count($data['rvlist']);
        $data['name']           = $data['rvlist'][0]['name'];
        $account_id = array();

        foreach ($data['rvlist'] as $key => $value) {
            $data['account_id'][]       = $value['account_id'];
            $data['account_title'][]    = $value['account_title'];
            $data['description'][]      = $value['description'];
            $data['amount'][]           = $value['amount'];
            $data['rvresult']           = $value;
        }

        if($data['rvresult']['staff_type'] =='clients'){
            
            $clientLists  = $this->client_model->get($data['rvresult']['staff_std_id'], $this->userdata['admin_id']);
            $data['name']   = $clientLists['client_id'].' - '.$clientLists['firstname'].' '.$clientLists['lastname'].' S/O '.$clientLists['father_name'];

        }elseif($data['rvresult']['staff_type'] =='staff'){

            $staffLists     = $this->staff_model->get($data['rvresult']['staff_std_id'], $this->userdata['admin_id']);
            $data['name']   = $staffLists['account_no'].' - '.$staffLists['name'].' '.$staffLists['surname'].' - '.$staffLists['designation'];
        }else{
            $data['name'] = $data['rvresult']['name'];
        }

        $this->load->view('layout/header', $data);
        $this->load->view('admin/paymentvoucher/paymentvoucherView', $data);
        $this->load->view('layout/footer', $data);
    }

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('paymentvoucher', 'can_delete')) {
            access_denied();
        }
        
        $data['title'] = 'Payment Voucher List';
        $this->paymentvoucher_model->remove($id, $this->userdata['admin_id']);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/paymentvoucher/index');
    }

    public function create() {
        $data['title'] = 'Payment Voucher Master';
        $this->form_validation->set_rules('income', $this->lang->line('fees_master'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('income/incomeCreate', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'income' => $this->input->post('income'),
            );
            $this->paymentvoucher_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('paymentvoucher/index');
        }
    }

    public function handle_upload() {

        $image_validate = $this->config->item('file_validate');

        if (isset($_FILES["documents"]) && !empty($_FILES['documents']['name'])) {

            $file_type = $_FILES["documents"]['type'];
            $file_size = $_FILES["documents"]["size"];
            $file_name = $_FILES["documents"]["name"];
            $allowed_extension = $image_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $image_validate['allowed_mime_type'];
            if ($files = filesize($_FILES['documents']['tmp_name'])) {

                if (!in_array($file_type, $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', 'File Type Not Allowed');
                    return false;
                }

                if (!in_array($ext, $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', 'Extension Not Allowed');
                    return false;
                }
                if ($file_size > $image_validate['upload_size']) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($image_validate['upload_size'] / 1048576, 2) . " MB");
                    return false;
                }
            } else {
                $this->form_validation->set_message('handle_upload', "File Type / Extension Error Uploading  Image");
                return false;
            }

            return true;
        }
        return true;
    }

    public function edit($id) {
        if (!$this->rbac->hasPrivilege('paymentvoucher', 'can_edit')) {
            access_denied();
        }
        
        $data['title']          = 'Edit Payment Voucher';
        $data['id']             = $id;
        $paymentvoucher_result = $this->paymentvoucher_model->getPV(null, $this->userdata['admin_id']);
        $data['pvoucherlist'] = $paymentvoucher_result;
        $class                   = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist']       = $class;
        $data['bankAccounts']   = $this->account_model->getBankAccount(31, $this->userdata['admin_id']);
        $data['deposit_cash_accounts'] = $this->account_model->getBankAccount(30, $this->userdata['admin_id']);
        $paymentvoucher_result  = $this->paymentvoucher_model->get($id, $this->userdata['admin_id']);
        $data['pvlist']         = $paymentvoucher_result;
        $data['title_list']     = 'Payment Voucher List';
        $data['counter']        = count($data['pvlist']);
        $account_id = array();
        //print_r($paymentvoucher_result); die();
        foreach ($data['pvlist'] as $key => $value) {
            $data['account_id'][]       = $value['account_id'];
            $data['account_title'][]    = $value['account_title'];
            $data['description'][]      = $value['description'];
            $data['amount'][]           = $value['amount'];
            $data['pvresult']           = $value;
        }

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('staff_std_id'), 'trim|required|xss_clean');
        }
        $this->form_validation->set_rules('cash_bank', $this->lang->line('cash_bank'), 'trim|required|xss_clean');
        if($this->input->post('cash_bank')==31 && $this->input->post('bank_account_id')==''){
            $this->form_validation->set_rules('bank_account_id', $this->lang->line('bank_acc'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('reference_number', $this->lang->line('ref_no'), 'trim|required|xss_clean');
        }if($this->input->post('cash_bank')==30 && $this->input->post('deposit_cash_id')==''){
            $this->form_validation->set_rules('deposit_cash_id', $this->lang->line('deposit_cash'), 'trim|required|xss_clean');
        }

        if ( $this->input->post('account_id')[0] == -1 ){
            $this->form_validation->set_rules('account_id', 'A/C Head', 'trim|required|xss_clean');
        }if ( $this->input->post('amount')[0] == '' ){
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/paymentvoucher/paymentvoucherEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            if($this->input->post('cash_bank')==31){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
            }else{
                $bank_account_id   = $this->input->post('deposit_cash_id');
                $reference_number  = '';
            }

            if ($this->input->post('staff_std_id')!='') {
               $staff_std_id = $this->input->post('staff_std_id');
            }else{
                $staff_std_id = $this->input->post('name');
            }

            $data = array(
                'id' => $id,
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'staff_std_id' => $staff_std_id,
                'class_id' => $this->input->post('class_id'),
                'section_id' => $this->input->post('section_id'),
                'name' => $this->input->post('name'),
                'staff_type' => $this->input->post('staff_type'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'invoice_no' => $this->input->post('invoice_no'),
                'cash_bank' => $this->input->post('cash_bank'),
                'bank_account_id' => $bank_account_id,
                'account_id' => $bank_account_id,
                'reference_number' => $reference_number,
                'total_amount' => $this->input->post('total_amount'),
            );

            $insert_id = $this->paymentvoucher_model->add($data); 
            
            if($insert_id){
                
                //first of all delete previus records from "paymentvoucher_list" and "account_transactions" tables then insert new record.//
                $this->paymentvoucher_model->del($insert_id, $this->userdata['admin_id']);
                $pvdata = array('admin_id'=>$this->userdata['admin_id'],'voucher_id'=>$insert_id, 'voucher_type'=>'PV');
                $this->paymentvoucher_model->removeVoucher($pvdata); 
                //----end----//

                for ($i=0; $i < count(array_filter($this->input->post('account_id'))); $i++) { 
                    $data_list = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'paymentvoucher_id'=>$insert_id,
                        'account_id'=>$this->input->post('account_id')[$i],
                        'account_id'=>$this->input->post('account_id')[$i],
                        'description'=>$this->input->post('description')[$i],
                        'amount'=>$this->input->post('amount')[$i],
                    );

                    $this->paymentvoucher_model->addPaymentVoucherList($data_list);

                    $account_id  = $this->input->post('account_id')[$i];
                    $deposit_to  = $this->account_model->getNameFrom($account_id);
                    $credit_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'amount' => $this->input->post('amount')[$i],
                        'voucher_id'=>$insert_id,
                        'voucher_number'=>$this->input->post('invoice_no'),
                        'voucher_type'=>'PV',
                        'account_id' => $bank_account_id,
                        'user_id' => $staff_std_id,
                        'staff_type' => $this->input->post('staff_type'),
                        'fund_trans_deposit'=>$deposit_to,
                        'type' => 'credit',
                        'description'=>$this->input->post('description')[$i],
                        'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                        'created_by' => $this->userdata['id']
                    );

                    $credit_id = $this->account_model->createAccountTransaction($credit_data);
                    $to_account = $this->account_model->getNameFrom($bank_account_id);
                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $to_account;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $account_id;
                    $debit_data['transfer_transaction_id'] = $credit_id;
                    $debit_id = $this->account_model->createAccountTransaction($debit_data);

                    $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($data);

                }
                
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/paymentvoucher/index');
        }
    }

    public function getPVStaffStudents(){

        $staff_std_id = $this->input->post('staff_std_id'); 

        if($this->input->post('staff_type') =='clients'){

                 
            $resultlist = $this->client_model->getclients($this->userdata['admin_id']);

            $html ='';
            $html .='<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" >';
            $html.='<option value="">'.$this->lang->line('select').'</option>';
            foreach ($resultlist as $key => $List) {
                if($List['id'] == $staff_std_id){
                    $selected = 'selected';
                }else{ $selected = ''; }
                $html.='<option value="'.$List['id'].'" '.$selected.'>'.$List['firstname'].' '.$List['lastname'].'</option>';
            }
            $html.='</select>';
            $html.='<span class="text-danger">'.form_error('staff_type').'</span>';
            echo $html;
        }

        if($this->input->post('staff_type') =='staff'){

           // $staffLists = $this->staff_model->getAll_users();
            
            $resultlist = $this->staff_model->searchFullText("", 1, $this->userdata['admin_id']);

            $html ='';
            $html .='<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" >';
            $html.='<option value="">'.$this->lang->line('select').'</option>';
            foreach ($resultlist as $key => $List) {
                if($List['id'] == $staff_std_id){
                    $selected = 'selected';
                }else{ $selected = ''; }
                $html.='<option value="'.$List['id'].'" '.$selected.'>'.$List['name'].' '.$List['surname'].'</option>';
            }
            $html.='</select>';
            $html.='<span class="text-danger">'.form_error('staff_type').'</span>';

            echo $html;

        }

    } 

    public function getaddMoreList(){

        if($this->input->post('action') =='pvmorelist'){

            $accountHeads = $this->account_model->get();
            $row_id = $this->input->post('row') + 1; 
            $data = '';
            $data .='<tr id="pv'.$row_id.'">
                <td>
                    <input onkeyup="autoSuggest('.$row_id.')" id="account_title'.$row_id.'" name="account_title[]" type="text" class="form-control" value="" style="width: 240px;"/>
                    <input id="account_id'.$row_id.'" name="account_id[]" type="hidden" value="" />   
                    <div id="data-container'.$row_id.'"></div>
                </td>
                <td><input id="description'.$row_id.'" name="description[]" type="text" class="form-control"  value="" style="width: 360px;"/></td>
                <td><input id="amount'.$row_id.'" name="amount[]" type="text" class="form-control" data-amt="0" value="" onchange="sum('.$row_id.');" style="text-align: right;"/></td>
                <td><button type="button" data-id="'.$row_id.'" id="add_more'.$row_id.'" class="btn btn-danger pull-right" onclick="removeMore('.$row_id.')">x</button></td>
            </tr>';
        echo $data; 

        }
    }

    public function autocomplete(){

        $resultList = $this->account_model->autoSearch($this->userdata['admin_id'], $this->input->post('keyword'));
        $resp = [];
        foreach($resultList as $List){
            $resp[] = array('id'=>$List['id'],'account_number'=>$List['account_number'],'account_title'=>$List['account_title']);
        }
        echo json_encode($resp);
    }

}

?>