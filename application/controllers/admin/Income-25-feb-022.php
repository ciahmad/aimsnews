<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Income extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->config->load('app-config');
    }

    public function index() {

        if (!$this->rbac->hasPrivilege('income', 'can_view')) {
            access_denied();
        }
        
        $invoice_no = $this->income_model->isInvoiceNoExist();
        if(empty($invoice_no->invoice_no)){
            $data['invoice_no'] = 'INC'.date('d').date('m').date('y').'000001'; 
        }else{
            $exp = explode('00000', $invoice_no->invoice_no);
            if(isset($exp[1])){ $randno = $exp[1]+1;}
            $data['invoice_no'] = 'INC'.date('d').date('m').date('y').'00000'.$randno;
        }

        $this->session->set_userdata('menu_heading', 'ACCOUNTS');
        $this->session->set_userdata('sub_heading', 'INCOME');
        $this->session->set_userdata('top_menu', 'Income');
        $this->session->set_userdata('sub_menu', 'income/index');
        $data['title'] = 'Add Income';
        $data['title_list'] = 'Recent Incomes';

        $this->form_validation->set_rules('inc_head_id', $this->lang->line('income_head'), 'trim|required|xss_clean');

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('staff_std_id'), 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('documents', $this->lang->line('documents'), 'callback_handle_upload');
        if ($this->form_validation->run() == false) {
            
        } else {

            if($this->input->post('cash_bank')==104){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
            }else{
                $bank_account_id   = $this->input->post('cash_bank');
                $reference_number  = '';
            }

            if ($this->input->post('staff_std_id')!='') {
               $staff_std_id = $this->input->post('staff_std_id');
            }else{
                $staff_std_id = 0;
            }

            $data = array(
                'inc_head_id' => $this->input->post('inc_head_id'),
                'staff_std_id' => $staff_std_id,
                'name' => $this->input->post('name'),
                'staff_type' => $this->input->post('staff_type'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'amount' => $this->input->post('amount'),
                'bank_account_id' => $bank_account_id,
                'cash_bank' => $this->input->post('cash_bank'),
                'invoice_no' => $data['invoice_no'],
                'reference_number' => $this->input->post('reference_number'),
                'note' => $this->input->post('description'),
                'documents' => $this->input->post('documents'),
            );

            $insert_id = $this->income_model->add($data);
            if($insert_id){
                
                $userdata    = $this->customlib->getUserData();
                $deposit_to  = $this->account_model->getNameFrom($bank_account_id);
                $credit_data = array(
                    'voucher_id'=>$insert_id,
                    'voucher_number'=>$this->input->post('invoice_no'),
                    'voucher_type'=>'INC',
                    'amount' => $this->input->post('amount'),
                    'account_id' => $this->input->post('inc_head_id'),
                    'fund_trans_deposit'=>$deposit_to,
                    'type' => 'credit',
                    'sub_type' => 'deposit',
                    'description'=>$this->input->post('description'),
                    'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                    'created_by' => $userdata['id']
                );

                $credit_id = $this->account_model->createAccountTransaction($credit_data);
                $to_account = $this->account_model->getNameFrom($this->input->post('inc_head_id'));

                $debit_data = $credit_data;
                $debit_data['fund_trans_deposit'] = $to_account;
                $debit_data['type'] = 'debit';
                $debit_data['account_id'] = $bank_account_id;
                $debit_data['transfer_transaction_id'] = $credit_id;
                
                $debit_id = $this->account_model->createAccountTransaction($debit_data);
                $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                $this->account_model->updateAccountTransaction($data);

            }
            
            if (isset($_FILES["documents"]) && !empty($_FILES['documents']['name'])) {
                $fileInfo = pathinfo($_FILES["documents"]["name"]);
                $img_name = $insert_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["documents"]["tmp_name"], "./uploads/school_income/" . $img_name);
                $data_img = array('id' => $insert_id, 'documents' => 'uploads/school_income/' . $img_name);
                $this->income_model->add($data_img);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/income/index');
        }

        $income_result = $this->income_model->get();
        $data['incomelist'] = $income_result;
        // get incom head from chart of accounts//
        $data['accountheads'] = $this->account_model->getAccountHead(1);
        $data['bankAccounts'] = $this->account_model->getBankAccount(31);
        
        $this->load->view('layout/header', $data);
        $this->load->view('admin/income/incomeList', $data);
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
        $data['title'] = 'Fees Master List';
        $income = $this->income_model->get($id);
        $data['income'] = $income;
        $this->load->view('layout/header', $data);
        $this->load->view('income/incomeShow', $data);
        $this->load->view('layout/footer', $data);
    }

    public function getByFeecategory() {
        $feecategory_id = $this->input->get('feecategory_id');
        $data = $this->feetype_model->getTypeByFeecategory($feecategory_id);
        echo json_encode($data);
    }

    public function getStudentCategoryFee() {
        $type = $this->input->post('type');
        $class_id = $this->input->post('class_id');
        $data = $this->income_model->getTypeByFeecategory($type, $class_id);
        if (empty($data)) {
            $status = 'fail';
        } else {
            $status = 'success';
        }
        $array = array('status' => $status, 'data' => $data);
        echo json_encode($array);
    }

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('income', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Income List';
        $this->income_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/income/index');
    }

    public function create() {
        $data['title'] = 'Add Fees Master';
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
            redirect('income/index');
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
        if (!$this->rbac->hasPrivilege('income', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Income';
        $data['title_list'] = 'Income List';
        $data['id'] = $id;
        // get incom edit data//
        $income = $this->income_model->get($id);
        $data['income_result'] = $income;
        // get incom list data//
        $income_result = $this->income_model->get();
        $data['incomelist'] = $income_result;
        // get incom head from chart of accounts//
        $data['accountheads'] = $this->account_model->getAccountHead(1);
        $data['bankAccounts'] = $this->account_model->getBankAccount(31);

        $this->form_validation->set_rules('inc_head_id', $this->lang->line('income_head'), 'trim|required|xss_clean');

        if($this->input->post('staff_std_id')==''){
            $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        }
        if($this->input->post('name')==''){
            $this->form_validation->set_rules('staff_std_id', $this->lang->line('staff_std_id'), 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('documents', $this->lang->line('documents'), 'callback_handle_upload');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/income/incomeEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            if($this->input->post('cash_bank')==104){
                $bank_account_id   = $this->input->post('bank_account_id');
                $reference_number  = $this->input->post('reference_number');
            }else{
                $bank_account_id   = $this->input->post('cash_bank');
                $reference_number  = '';
            }

            if ($this->input->post('staff_std_id')!='') {
               $staff_std_id = $this->input->post('staff_std_id');
            }else{
                $staff_std_id = 0;
            }

            $data = array(
                'id' => $id,
                'inc_head_id' => $this->input->post('inc_head_id'),
                'staff_std_id' => $staff_std_id,
                'name' => $this->input->post('name'),
                'staff_type' => $this->input->post('staff_type'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'amount' => $this->input->post('amount'),
                'bank_account_id' => $bank_account_id,
                'cash_bank' => $this->input->post('cash_bank'),
                'invoice_no' => $this->input->post('invoice_no'),
                'reference_number' => $this->input->post('reference_number'),
                'note' => $this->input->post('description'),
                'documents' => $this->input->post('documents'),
            );

            $insert_id = $this->income_model->add($data);
            
            if($insert_id){

                $incData = array('voucher_id'=>$insert_id, 'voucher_type'=>'INC');
                $this->receiptvoucher_model->removeVoucher($incData); 
                
                $userdata    = $this->customlib->getUserData();
                $deposit_to  = $this->account_model->getNameFrom($bank_account_id);
                $credit_data = array(
                    'voucher_id'=>$insert_id,
                    'voucher_number'=>$this->input->post('invoice_no'),
                    'voucher_type'=>'INC',
                    'amount' => $this->input->post('amount'),
                    'account_id' => $this->input->post('inc_head_id'),
                    'fund_trans_deposit'=>$deposit_to,
                    'type' => 'credit',
                    'sub_type' => 'deposit',
                    'description'=>$this->input->post('description'),
                    'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                    'created_by' => $userdata['id']
                );

                $credit_id = $this->account_model->createAccountTransaction($credit_data);
                $to_account = $this->account_model->getNameFrom($this->input->post('inc_head_id'));

                $debit_data = $credit_data;
                $debit_data['fund_trans_deposit'] = $to_account;
                $debit_data['type'] = 'debit';
                $debit_data['account_id'] = $bank_account_id;
                $debit_data['transfer_transaction_id'] = $credit_id;
                
                $debit_id = $this->account_model->createAccountTransaction($debit_data);
                $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                $this->account_model->updateAccountTransaction($data);

            }

            if (isset($_FILES["documents"]) && !empty($_FILES['documents']['name'])) {
                $fileInfo = pathinfo($_FILES["documents"]["name"]);
                $img_name = $id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["documents"]["tmp_name"], "./uploads/school_income/" . $img_name);
                $data_img = array('id' => $id, 'documents' => 'uploads/school_income/' . $img_name);
                $this->income_model->add($data_img);
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/income/index');
        }
    }

    public function incomeSearch() {
        if (!$this->rbac->hasPrivilege('search_due_fees', 'can_view')) {
            access_denied();
        }
        $data['searchlist'] = $this->customlib->get_searchtype();

        $this->session->set_userdata('top_menu', 'Income');
        $this->session->set_userdata('sub_menu', 'income/incomesearch');
        $data['search_type'] = '';
        $data['title'] = 'Search Income';
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $search = $_POST['search'];

            if ($search == "search_filter") {

                $data['search_type'] = $_POST['search_type'];
                if (isset($_POST['search_type']) && $_POST['search_type'] != '') {
                    if ($_POST['search_type'] == 'all') {
                        $dates = $this->customlib->get_betweendate('this_year');
                    } else {
                        $dates = $this->customlib->get_betweendate($_POST['search_type']);
                    }

                    $data['search_type'] = $_POST['search_type'];
                } else {

                    $dates = $this->customlib->get_betweendate('this_year');
                    $data['search_type'] = '';
                }

                $dateformat = $this->customlib->getSchoolDateFormat();
                $this->customlib->dateFormatToYYYYMMDD($dates['from_date']);
                $date_from = date('Y-m-d', strtotime($dates['from_date']));
                $date_to = date('Y-m-d', strtotime($dates['to_date']));
                $search = $this->input->post('search');
                $data['inc_title'] = 'Income Result From ' . date($dateformat, strtotime($date_from)) . " To " . date($dateformat, strtotime($date_to));

                $date_from = date('Y-m-d', $this->customlib->dateYYYYMMDDtoStrtotime($date_from));
                $date_to = date('Y-m-d', $this->customlib->dateYYYYMMDDtoStrtotime($date_to));
                $resultList = $this->income_model->search("", $date_from, $date_to);
                $data['resultList'] = $resultList;
            } else {

                $data['inc_title'] = 'Income Result';
                $this->form_validation->set_rules('search_text', $this->lang->line('search_text'), 'trim|required|xss_clean');
                if ($this->form_validation->run() == false) {
                    
                } else {

                    $search_text = $this->input->post('search_text');
                    $resultList = $this->income_model->search($search_text, "", "");
                    $data['resultList'] = $resultList;
                }
            }

            $this->load->view('layout/header', $data);
            $this->load->view('admin/income/incomeSearch', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/income/incomeSearch', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    public function getIncomeStaffStudents(){

        $staff_std_id = $this->input->post('staff_std_id');

        if($this->input->post('staff_type') =='students'){

            $studentsLists = $this->student_model->getStudents();

            $html ='';
            $html .='<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" >';
            $html.='<option value="">'.$this->lang->line('select').'</option>';
            foreach ($studentsLists as $key => $List) {
                if($List['id'] == $staff_std_id){
                    $selected = 'selected';
                }else{ $selected = ''; }
                $html.='<option value="'.$List['id'].'" '.$selected.'>'.$List['admission_no'].' - '.$List['firstname'].' '.$List['lastname'].' S/O '.$List['father_name'].' - '.$List['class'].'</option>';
            }
            $html.='</select>';
            $html.='<span class="text-danger">'.form_error('staff_type').'</span>';
            echo $html;
        }

        if($this->input->post('staff_type') =='staff'){

            $staffLists = $this->staff_model->getAll_users();

            $html ='';
            $html .='<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" >';
            $html.='<option value="">'.$this->lang->line('select').'</option>';
            foreach ($staffLists as $key => $List) {
                if($List['id'] == $staff_std_id){
                    $selected = 'selected';
                }else{ $selected = ''; }
                $html.='<option value="'.$List['id'].'" '.$selected.'>'.$List['employee_id'].' - '.$List['name'].' '.$List['surname'].' - '.$List['designation'].'</option>';
            }
            $html.='</select>';
            $html.='<span class="text-danger">'.form_error('staff_type').'</span>';

            echo $html;

        }

    } 

}
