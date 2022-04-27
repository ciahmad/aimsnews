<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Journalvoucher extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->config->load('app-config');
        $this->userdata  = $this->customlib->getUserData();
    }

   public function index() {

        if (!$this->rbac->hasPrivilege('journalvoucher', 'can_view')) {
            access_denied();
        }
        
        $invoice_no = $this->journalvoucher_model->isInvoiceNoExist($this->userdata['admin_id']);
        if(empty($invoice_no->invoice_no)){
            $data['invoice_no'] = 'JV'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_no'] = 'JV'.date('d').date('m').date('y').'00000'.$randno;
        }
       
        $this->session->set_userdata('menu_heading', 'ACCOUNTS');
        $this->session->set_userdata('sub_heading', 'VOUCHERS');
        $this->session->set_userdata('sub_menu', 'journalvoucher/index');
        $data['title'] = 'Add Journal Vouture';
        $data['title_list'] = 'Journal Vouture';
        $class                   = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist']       = $class;

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('income_head'), 'trim|required|xss_clean');
        }

        if ( $this->input->post('account_id')[0] == '' ){
            $this->form_validation->set_rules('account_id', 'A/C Head', 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');

        $data['account_id'] = array(1,2);
        if(count($this->input->post('account_id')) > 0){
            $data['account_id']     = $this->input->post('account_id');
            $data['account_title']  = $this->input->post('account_title');
            $data['description']    = $this->input->post('description');
            $data['debit']          = $this->input->post('debit');
            $data['credit']         = $this->input->post('credit');
        }

        if ($this->form_validation->run() == false) {

        } else {

            if( $this->input->post('debit_total')!= $this->input->post('credit_total') ){
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-left">' . $this->lang->line('total_message') . '</div>');
                redirect('admin/journalvoucher/index');
            }else{

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
                    'cash_bank' => 0,
                    'bank_account_id' => 0,
                    'account_id' => 0,
                    'reference_number' => '',
                    'debit_total' => $this->input->post('debit_total'),
                    'credit_total' => $this->input->post('credit_total'),
                );

                $insert_id = $this->journalvoucher_model->add($data);
                
                if($insert_id){

                    for ($i=0; $i < count(array_filter($this->input->post('account_id'))); $i++) { 

                        $data_list = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'journalvoucher_id'=>$insert_id,
                            'account_id'=>$this->input->post('account_id')[$i],
                            'description'=>$this->input->post('description')[$i],
                            'debit_amount'=>$this->input->post('debit')[$i],
                            'credit_amount'=>$this->input->post('credit')[$i],
                        );

                        $this->journalvoucher_model->addJournalVoucherList($data_list);

                        if($this->input->post('debit')[$i] > 0){
                            $amount         = $this->input->post('debit')[$i];
                            $type           = 'debit';
                            $account_id     = $this->input->post('account_id')[$i];
                            $to_account_id  = $this->input->post('account_id')[$i];
                            $description    = $this->input->post('description')[$i];
                            //$fund_trans_deposit = $this->account_model->getNameFrom($this->input->post('account_id')[$i]);

                        }if($this->input->post('credit')[$i] > 0){
                            $amount         = $this->input->post('credit')[$i];
                            $type           = 'credit';
                            $account_id     = $this->input->post('account_id')[$i];
                            $to_account_id  = $this->input->post('account_id')[$i];
                            $description    = $this->input->post('description')[$i];
                            //$fund_trans_deposit = $this->account_model->getNameFrom($this->input->post('account_id')[$i]);
                        }
                        $chartAccData = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'voucher_id'=>$insert_id,
                            'voucher_number'=>$data['invoice_no'],
                            'voucher_type'=>'JV',
                            'amount' => $amount,
                            'account_id'=>$account_id,
                            'user_id' => $staff_std_id,
                            'staff_type' => $this->input->post('staff_type'),
                            'type' => $type,
                            'fund_trans_deposit'=>$to_account_id,
                            'description'=>$description,
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date')))
                        );
                        $trans_id = $this->account_model->createAccountTransaction($chartAccData);
                    }
                }

                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
                redirect('admin/journalvoucher/index');
            }
        }

        $journalvoucher_result = $this->journalvoucher_model->getJV(null, $this->userdata['admin_id']);
        $data['jvlist'] = $journalvoucher_result;
        //print_r($data['jvlist']); die();
        $accountHeads = $this->account_model->get();
        $data['accountheads'] = $accountHeads;
        
        //$data['bankAccounts'] = $this->account_model->getBankAccount(31);

        $this->load->view('layout/header', $data);
        $this->load->view('admin/journalvoucher/journalvoucherlist', $data);
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
        if (!$this->rbac->hasPrivilege('income', 'can_view')) {
            access_denied();
        }
        
        $data['title']      = 'View General Journal';
        $data['title_list'] = 'General Journal View';
        $data['id'] = $id;
        $journalvoucher_result  = $this->journalvoucher_model->get($id, $this->userdata['admin_id']);
        $data['jvlist']         = $journalvoucher_result;
        $data['counter']        = count($data['jvlist']);
        $account_id = array();
        foreach ($data['jvlist'] as $key => $value) {
            $data['account_id'][]       = $value['account_id'];
            $data['account_title'][]    = $value['account_title'];
            $data['description'][]      = $value['description'];
            $data['debit'][]            = $value['debit_amount'];
            $data['credit'][]           = $value['credit_amount'];
            $data['jvresult']           = $value;
        }

        if($data['jvresult']['staff_type'] =='student'){
            
            $clientsLists  = $this->client_model->get($data['jvresult']['staff_std_id']);
            $data['name']   = $clientsLists['client_id'].' - '.$clientsLists['firstname'].' '.$clientsLists['lastname'].' S/O '.$clientsLists['father_name'];

        }elseif($data['jvresult']['staff_type'] =='staff'){

            $staffLists     = $this->staff_model->get($data['jvresult']['staff_std_id']);
            $data['name']   = $staffLists['account_no'].' - '.$staffLists['name'].' '.$staffLists['surname'].' - '.$staffLists['designation'];
        }else{
            $data['name'] = $data['jvresult']['name'];
        }

        
        $this->load->view('layout/header', $data);
        $this->load->view('admin/journalvoucher/journalvoucherView', $data);
        $this->load->view('layout/footer', $data);
    }

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('journalvoucher', 'can_delete')) {
            access_denied();
        }
        
        $data['title'] = 'Journal Voucher List';
        $this->journalvoucher_model->remove($id, $this->userdata['admin_id']);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/journalvoucher/index');
    }

    public function create() {
        $data['title'] = 'Journal Voucher Master';
        $this->form_validation->set_rules('income', $this->lang->line('fees_master'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('income/incomeCreate', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'income' => $this->input->post('income'),
            );
            $this->income_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('journalvoucher/index');
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
        if (!$this->rbac->hasPrivilege('journalvoucher', 'can_edit')) {
            access_denied();
        }
        
        $data['title']      = 'Edit General Journal';
        $data['title_list'] = 'General Journal List';
        $data['id'] = $id;
        $journalvoucher_result = $this->journalvoucher_model->getJV(null, $this->userdata['admin_id']);
        $data['jvoucherlist'] = $journalvoucher_result;
        $class                   = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist']       = $class;
        $journalvoucher_result  = $this->journalvoucher_model->get($id, $this->userdata['admin_id']);
        $data['jvlist']         = $journalvoucher_result;
        $data['counter']        = count($data['jvlist']);
        $account_id = array();
        foreach ($data['jvlist'] as $key => $value) {
            $data['account_id'][]       = $value['account_id'];
            $data['account_title'][]    = $value['account_title'];
            $data['description'][]      = $value['description'];
            $data['debit'][]            = $value['debit_amount'];
            $data['credit'][]           = $value['credit_amount'];
            $data['jvresult']           = $value;
        }

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('income_head'), 'trim|required|xss_clean');
        }


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/journalvoucher/journalvoucherEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
                
            if ($this->input->post('staff_std_id')!='') {
                    $staff_std_id = $this->input->post('staff_std_id');
                    $name = '';
                }else{
                    $name = $this->input->post('name');
                    $staff_std_id = $this->input->post('name');
                }
                
                $data = array(
                    'id' => $id,
                    'admin_id'=>$this->userdata['admin_id'],
                    'created_by'=>$this->userdata['id'],
                    'staff_std_id' => $staff_std_id,
                    'class_id' => $this->input->post('class_id'),
                    'section_id' => $this->input->post('section_id'),
                    'name' => $name,
                    'staff_type' => $this->input->post('staff_type'),
                    'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                    'invoice_no' => $this->input->post('invoice_no'),
                    'cash_bank' => 0,
                    'bank_account_id' => 0,
                    'account_id' => 0,
                    'reference_number' => '',
                    'debit_total' => $this->input->post('debit_total'),
                    'credit_total' => $this->input->post('credit_total'),
                );

                $insert_id = $this->journalvoucher_model->add($data);
                   
                if($insert_id){

                    //first of all delete previus records from "journalvoucher_list" and "account_transactions" tables then insert new record.//
                    $this->journalvoucher_model->del($insert_id, $this->userdata['admin_id']);
                    $jvdata = array('admin_id'=>$this->userdata['admin_id'], 'voucher_id'=>$insert_id, 'voucher_type'=>'JV');
                    $this->journalvoucher_model->removeVoucher($jvdata); 
                    //----end----//

                    for ($i=0; $i < count(array_filter($this->input->post('account_id'))); $i++) { 

                        $data_list = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'created_by'=>$this->userdata['id'],
                            'journalvoucher_id'=>$insert_id,
                            'account_id'=>$this->input->post('account_id')[$i],
                            'description'=>$this->input->post('description')[$i],
                            'debit_amount'=>$this->input->post('debit')[$i],
                            'credit_amount'=>$this->input->post('credit')[$i],
                        );

                        $this->journalvoucher_model->addJournalVoucherList($data_list);

                        if($this->input->post('debit')[$i]> 0){
                            $amount         = $this->input->post('debit')[$i];
                            $type           = 'debit';
                            $account_id     = $this->input->post('account_id')[$i];
                            $to_account_id  = $this->input->post('account_id')[$i];
                            $description    = $this->input->post('description')[$i];

                        }if($this->input->post('credit')[$i] > 0){
                            $amount         = $this->input->post('credit')[$i];
                            $type           = 'credit';
                            $account_id     = $this->input->post('account_id')[$i];
                            $to_account_id  = $this->input->post('account_id')[$i];
                            $description    = $this->input->post('description')[$i];
                        }

                        $chartAccData = array(
                            'admin_id'=>$this->userdata['admin_id'],
                            'voucher_id'=>$insert_id,
                            'voucher_number'=>$data['invoice_no'],
                            'voucher_type'=>'JV',
                            'amount' => $amount,
                            'account_id'=>$account_id,
                            'user_id' => $staff_std_id,
                            'staff_type' => $this->input->post('staff_type'),
                            'type' => $type,
                            'fund_trans_deposit'=>$to_account_id,
                            'description' => $description,
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                            'created_by' => $this->userdata['id'],
                        );
                        //print_r($chartAccData);
                        $trans_id = $this->account_model->createAccountTransaction($chartAccData);
                    }
                    
                }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/journalvoucher/edit/'.$id);
        }
    }
   
    public function getStaffStudents(){

        $staff_std_id = $this->input->post('staff_std_id');

        if($this->input->post('staff_type') =='student'){
           
            
            $resultlist = $this->client_model->getclients($this->userdata['admin_id']);

            $html ='';
            $html .='<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" >';
            $html.='<option value="">'.$this->lang->line('select').'</option>';
            foreach ($resultlist as $key => $List) {
                if($List['id'] == $staff_std_id){
                    $selected = 'selected';
                }else{ $selected = ''; }
                $html.='<option value="'.$List['id'].'" '.$selected.' >'.$List['firstname'].' '.$List['lastname'].'</option>';
            }
            $html.='</select>';
            $html.='<span class="text-danger">'.form_error('staff_type').'</span>';
            echo $html;
        }

        if($this->input->post('staff_type') =='staff'){

            
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

        if($this->input->post('action') =='jvmorelist'){

            $accountHeads = $this->account_model->get();
            $row_id = $this->input->post('id');
            $data = '';
            for ($i=1; $i <= 2; $i++) { 

                  $row_id = $row_id + 1; 

               $data .='<tr id="jv'.$row_id.'">
                    <td>
                        <input onkeyup="autoSuggest('.$row_id.')" id="account_title'.$row_id.'" name="account_title[]" type="text" class="form-control" value="" style="width: 200px;"/>
                        <input id="account_id'.$row_id.'" name="account_id[]" type="hidden" value="" />   
                        <div id="data-container'.$row_id.'"></div>
                    </td>
                    <td><input id="description'.$row_id.'" name="description[]" type="text" class="form-control"  value="" style="width: 400px;"/></td>
                    <td><input onchange="sumDebit('.$row_id.')" id="debit'.$row_id.'" name="debit[]" type="text" class="form-control" data-debit="0" value="" style="text-align: right; width: 120px;"/></td>
                    <td><input onchange="sumCredit('.$row_id.')" id="credit'.$row_id.'" name="credit[]" type="text" class="form-control" data-credit="0" value="" style="text-align: right; width: 120px;"/></td>
                </tr>';
            }

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
