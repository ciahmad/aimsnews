<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('encoding_lib');
        $this->load->library('customlib');
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }
        
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');
        $userdata = $this->customlib->getUserData();
        $data['addedby'] = $userdata['name'];
        $data['title'] = 'Add account type';
        $data['title_list'] = 'Add Account Details';
        $data['posturl'] ='admin/account/create/';
        $data['listaccounts'] = array();
        $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
        $data['opening_balance'] = 0;
        $data['closing_balance'] = 0;
        $data['accounttypes'] = $categories;
        foreach ($categories as $category) {
            if ($category['parent_account_type_id']==0) {
                // Level 2
                $children_data = array();
                $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                foreach ($children as $child) {

                    $children_data[] = array(
                        
                        'id'  => $child['id'],
                        'parent_id'  => $child['parent_account_type_id'],
                        'name'  => $child['name']
                    );
                }
                // Level 1
                $data['listaccounts'][] = array(
                    'id'        => $category['id'],
                    'parent_id' => $category['parent_account_type_id'],
                    'name'      => $category['name'],
                    'children'  => $children_data
                );
            }
        }
        
        $this->load->view('layout/header');
        $this->load->view('admin/account/createaccount', $data);
        $this->load->view('layout/footer');
    }

    public function getall() {

        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');
        $userdata = $this->customlib->getUserData();
        $accountslist = $this->account_model->getaccountLists();
        $closing_balance = 0;

        foreach ($accountslist as $key => $listaccount) {

            if($listaccount['account_type_id'] > 0){
                if($listaccount['parent_account_type_id'] == 0){
                    $parent_account_type  = $listaccount['name'];
                    $sub_account_type  = '';
                }else {
                    $sub_account_type  = $listaccount['name'];
                    $parent_account_type = $this->account_model->checkIsParentExist($listaccount['parent_account_type_id']) ;
                }
            }

            $closing_balance = $this->account_model->getClosingBalance($listaccount['id'], $listaccount['user_id']);

            if($closing_balance){
                $tData = array('id' => $listaccount['id'],'closing_balance' => $closing_balance);
                $this->account_model->updateBalance($tData);
            }
        
            $data['accountslist'][] = array(
                'id'=>$listaccount['id'], 
                'account_title'=>$listaccount['account_title'], 
                'parent_account_type'=>$parent_account_type,
                'sub_account_type'=>$sub_account_type,
                'account_number'=>$listaccount['account_number'], 
                'opening_balance'=>$listaccount['opening_balance'],
                'closing_balance'=>$closing_balance,
                'addedby'=>$userdata['name'],
                'is_closed'=>$listaccount['is_closed']
            );

            
        }

      

        $this->load->view('layout/header');
        $this->load->view('admin/account/getall', $data);
        $this->load->view('layout/footer');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_add')) {
            access_denied();
        }
        
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Add Account'; 
        $data['title_list'] = 'Account Details';
        $data['posturl'] ='admin/account/create/';
        $data['opening_balance'] = 0;
        $data['closing_balance'] = 0;
        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            
            $data['listaccounts'] = array();
            $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
            if($categories){
                $data['accounttypes'] = $categories;
                foreach ($categories as $category) {
                    if ($category['parent_account_type_id']==0) {
                        // Level 2
                        $children_data = array();
                        $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                        foreach ($children as $child) {

                            $children_data[] = array(
                                'name'  => $child['name'],
                                'id'  => $child['id']
                            );
                        }
                        // Level 1
                        $data['listaccounts'][] = array(
                            'name'     => $category['name'],
                            'id'     => $category['id'],
                            'children' => $children_data
                        );
                    }
                }
            }
            $this->load->view('layout/header');
            $this->load->view('admin/account/createaccount', $data);
            $this->load->view('layout/footer');
        } else {
            
            $parent_id = $this->accounttype_model->get_parent_account_type_byid($this->input->post('account_type_id'));

            if($parent_id){
                $parent_account_type_id = $parent_id['parent_account_type_id'];
            }else{
                $parent_account_type_id = 0;
            }

            $data = array(
                'user_id' => $userdata['id'],
                'account_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type_id' => $this->input->post('account_type_id'),
                'parent_account_type_id' => $parent_account_type_id,
                'opening_balance' => $this->input->post('opening_balance'),
                'closing_balance' => $this->input->post('closing_balance'),
                'created_by' => $userdata['id']
                
            );

            $insert_id = $this->account_model->add($data);
            
            // if($insert_id){
            //     if($this->input->post('account_type_id')==1){
            //         $data = array(
            //             'income_category' => $this->input->post('account_title'),
            //             'account_id' => $this->input->post('account_type_id'),
            //         );
            //     }
            //     if($this->input->post('account_type_id')==2){
            //         $data = array(
            //             'expense_head' => $this->input->post('account_title'),
            //             'account_id' => $this->input->post('account_type_id'),
            //         );
            //     }
            //     $this->account_model->insertHead($data);
            // }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/account/index');
        }
    }

    function edit($id) {

        if (!$this->rbac->hasPrivilege('accounts', 'can_edit')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Edit Account Type';
        $data['title_list'] = 'Account Type Details';
        $data['id'] = $id;
        $data['posturl'] ='admin/account/edit/' . $id;
        $editaccount = $this->account_model->get($id);
        $data['editaccount'] = $editaccount;
        //$accountsData['balance'] = $this->account_model->getAccBalance($id, $userdata['id']);
        //print_r($accountsData['balance']); die();
        $data['account_type_id'] = $editaccount['account_type_id'];
        $data['listaccounts'] = array();
        $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
        $data['accounttypes'] = $categories;
        foreach ($categories as $category) {
            if ($category['parent_account_type_id']==0) {
                // Level 2
                $children_data = array();
                $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                foreach ($children as $child) {
                    $children_data[] = array(
                        'name'  => $child['name'],
                        'id'  => $child['id']
                    );
                }
                // Level 1
                $data['listaccounts'][] = array(
                    'name'     => $category['name'],
                    'id'     => $category['id'],
                    'children' => $children_data
                );
            }
        }

        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$getaccount = $this->account_model->getaccount();
            //$data['getaccounts'] = $getaccount;
            $this->load->view('layout/header');
            $this->load->view('admin/account/createaccount', $data);
            $this->load->view('layout/footer');
        } else {

            $parent_id = $this->accounttype_model->get_parent_account_type_byid($this->input->post('account_type_id'));

            if($parent_id){
                $parent_account_type_id = $parent_id['parent_account_type_id'];
            }else{
                $parent_account_type_id = 0;
            }

            $data = array(
                'id' => $id,
                'user_id' => $userdata['id'],
                'account_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type_id' => $this->input->post('account_type_id'),
                'parent_account_type_id' => $parent_account_type_id,
                'opening_balance' => $this->input->post('opening_balance'),
                'closing_balance' => $this->input->post('closing_balance'),
                'created_by' => $userdata['id']
                
            );
            
            $this->account_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/account/getall');
        }

    }

    /**
     * Closes the specified account.
     * @return Response
     */
    public function close(){

        if (!$this->rbac->hasPrivilege('accounts', 'can_delete')) {
            access_denied();
        }

        if($this->input->post('action') =='close' && $this->input->post('action')!='activate'){
            $val = 0;
            $errorMsg   = array('msg'=>'Account closed successfully');
        }if($this->input->post('action') =='activate' && $this->input->post('action')!='close'){
            $val = 1;
            $errorMsg   = array('msg'=>'Account actived successfully');
        }
        $accid = $this->input->post('accid');
        $data = array('id'=>$accid,'is_closed'=>$val);
        $this->account_model->activeDeactive($data);
        $array   = array('status' => 'success', 'message' => $msg);
        echo json_encode($array);
        
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Accounts List';
        $this->accounttype_model->remove($id);
        redirect('admin/account/index');
    }

    /**
     * Shows form to transfer fund.
     * @param  int $id
     * @return Response
     */
    public function getFundTransferModel(){

        $account_id     =  $this->input->post('id'); 
        $account_title  =  $this->input->post('title'); 
        $accounts       =  $this->account_model->fetchRecords($account_id);
        $modalData = '';
        $modalData .= '<div id="transferFund" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog2 modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Fund Transfer</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="POST" id="fundtransfer_form" action="postFundTransfer" accept-charset="UTF-8" id="fund_transfer_form" enctype="multipart/form-data">
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <strong>Selected Account</strong>:  '.$account_title.'
                                            <input name="from_account" type="hidden" value="'.$account_id.'">
                                        </div>';

                                        $modalData.='<div class="form-group">
                                            <label for="to_account">Transfer To:*</label>
                                            <select class="form-control" required="" id="to_account" name="to_account">';
                                            $modalData.='<option value="">select account</option>';
                                        foreach($accounts as $account){
                                                $modalData.='<option value="'.$account['id'].'">'.$account['account_title'].'</option>';
                                        }
                                        $modalData.='</select>
                                        </div>

                                        <div class="form-group">
                                            <label for="amount">Amount:*</label>
                                            <input class="form-control input_number" required="" placeholder="Amount" name="amount" type="text" value="0" id="amount">
                                        </div>


                                        <div class="form-group">
                                            <label for="operation_date">Date:*</label>
                                            <input id="date" name="operation_date" placeholder="" type="text" class="form-control date" value="" readonly="readonly" required="" placeholder="Date"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <textarea class="form-control" placeholder="Note" rows="4" name="note" cols="50" id="note"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="document">Attach Document:</label>
                                            <input type="File" name="file">
                                            <p class="help-block"> Max File size: 5MB <br>Allowed File: .pdf, .csv, .zip, .doc, .docx, .jpeg, .jpg, .png</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
     * Transfers fund from one account to another.
     * @return Response
     */
    public function postFundTransfer(){

        if (!$this->rbac->hasPrivilege('accounts', 'can_edit')) {
            access_denied();
        }
       
            $userdata           = $this->customlib->getUserData();
            $amount             = $this->input->post('amount');
            $opening_balance    = $this->input->post('opening_balance');
            $closing_balance    = $this->input->post('closing_balance');
            $from               = $this->input->post('from_account');
            $to                 = $this->input->post('to_account');
            $operation_date     = $this->input->post('operation_date');
            
            if (!empty($amount)) {
                $transfer_to  = $this->account_model->getNameFrom($to);
                $debit_data = array(
                    'amount' => $amount,
                    'fund_trans_deposit'=>$transfer_to,
                    'account_id' => $from,
                    'type' => 'debit',
                    'sub_type' => 'fund_transfer',
                    'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($operation_date)),
                    'created_by' => $userdata['id'],
                    
                );

                $debit_id       = $this->account_model->createAccountTransaction($debit_data);
                
                $transfer_from  = $this->account_model->getNameFrom($from);
                $credit_data = array(
                            'amount' => $amount,
                            'fund_trans_deposit'=>$transfer_from,
                            'account_id' => $to,
                            'type' => 'credit',
                            'sub_type' => 'fund_transfer',
                            'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($operation_date)),
                            'created_by' => $userdata['id'],
                            'transfer_transaction_id' => $debit_id
                        );

                $credit_id = $this->account_model->createAccountTransaction($credit_data);

                $data = array(
                            'id' => $debit_id,
                            'transfer_transaction_id' => $credit_id
                        );

                $this->account_model->updateAccountTransaction($data);

                $errorMsg   = array('errorMsg'=>'Fund transfer successfully');
                $array      = array('status' => 'success', 'error' => $errorMsg);
                echo json_encode($array);
            }

    }

    /**
     * Shows form to transfer fund.
     * @param  int $id
     * @return Response
     */
    public function getDepositModel(){

        $account_id     =  $this->input->post('id'); 
        $account_title  =  $this->input->post('title'); 
        $accounts       =  $this->account_model->fetchRecords($account_id);
        $modalHtml = '';
        $modalHtml .= '<div id="depositmodal" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog2 modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Deposit</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="POST" id="deposit_form" action="postDeposit" accept-charset="UTF-8" id="fund_transfer_form" enctype="multipart/form-data">
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <strong>Selected Account</strong>:  '.$account_title.'
                                            <input name="account_id" type="hidden" value="'.$account_id.'">
                                        </div>';

                                        $modalHtml.='<div class="form-group">
                                            <label for="amount">Amount:*</label>
                                            <input class="form-control input_number" required="" placeholder="Amount" name="amount" type="text" value="0" id="amount">
                                        </div>';
                                        $modalHtml.='<div class="form-group">
                                            <label for="to_account">Deposit From:*</label>
                                            <select class="form-control" required="" id="from_account" name="from_account">';
                                            $modalHtml.='<option value="">select account</option>';
                                        foreach($accounts as $account){
                                                $modalHtml.='<option value="'.$account['id'].'">'.$account['account_title'].'</option>';
                                        }
                                        $modalHtml.='</select>
                                        </div>';

                                        $modalHtml.='<div class="form-group">
                                            <label for="operation_date">Date:*</label>
                                            <input id="date" name="operation_date" placeholder="" type="text" class="form-control date"  value="" readonly="readonly" required="" placeholder="Date"/>
                                        </div>';

                                    $modalHtml.='<div class="form-group">
                                            <label for="note">Note</label>
                                            <textarea class="form-control" placeholder="Note" rows="4" name="note" cols="50" id="note"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        echo $modalHtml;

    }

    /**
     * Transfers fund from one account to another.
     * @return Response
     */
    public function postDeposit(){

        if (!$this->rbac->hasPrivilege('accounts', 'can_edit')) {
            access_denied();
        }
       
            $userdata   = $this->customlib->getUserData();
            $amount = $this->input->post('amount');
            ///$opening_balance = $this->input->post('opening_balance');
            //$closing_balance = $this->input->post('closing_balance');
            //$from = $this->input->post('from_account');
            $account_id = $this->input->post('account_id');
            //$note = $this->input->post('note');
            $operation_date = $this->input->post('operation_date');
            $from_account = $this->input->post('from_account');

            if (!empty($amount)) {

                $deposit_to  = $this->account_model->getNameFrom($from_account);
                $credit_data = array(
                    'amount' => $amount,
                    'fund_trans_deposit'=>$deposit_to,
                    'account_id' => $account_id,
                    'type' => 'credit',
                    'sub_type' => 'deposit',
                    'operation_date'=>date('Y-m-d', $this->customlib->datetostrtotime($operation_date)),
                    'created_by' => $userdata['id'],
                );
                
                $credit_id = $this->account_model->createAccountTransaction($credit_data);
               
                if (!empty($from_account)) {
                    $deposit_from   = $this->account_model->getNameFrom($account_id);
                    $debit_data = $credit_data;
                    $debit_data['fund_trans_deposit'] = $deposit_from;
                    $debit_data['type'] = 'debit';
                    $debit_data['account_id'] = $from_account;
                    $debit_data['transfer_transaction_id'] = $credit_id;

                    $debit_id = $this->account_model->createAccountTransaction($debit_data);

                    $data = array('id' => $credit_id,'transfer_transaction_id' => $debit_id);
                    $this->account_model->updateAccountTransaction($data);
                    
                }
                
            }

            $errorMsg   = array('errorMsg'=>'Deposit successfully');
            $array      = array('status' => 'success', 'error' => $errorMsg);
            echo json_encode($array);


    }

    public function accountbook($id){

        $account         = $this->account_model->getAccountById($id);
        $data['account'] = $account;
        //$opening_balance = round($account['opening_balance'], 2);
        //$closing_balance = round($account['closing_balance'], 2);
        $userdata        = $this->customlib->getUserData(); 
        $userName        = $userdata['name'];
        $data['id']      = $id;
        $data['referer_url']        = $_SERVER['HTTP_REFERER'];   
        if($account['account_type_id'] > 0){

            if($account['parent_account_type_id'] == 0){
                $data['parent_account_type']    = $account['name'];
                $data['sub_account_type']       = '';
            }else {
                $data['sub_account_type']       = $account['name'];
                $data['parent_account_type']    = $this->account_model->checkIsParentExist($account['parent_account_type_id']) ;
            }
        }

        if (isset($_POST["search"]) && $_POST["search"]=='search_filter') {

            $trans_date = $this->input->post("transaction_date_range");
            $trans_type = $this->input->post("transaction_type");
            if (!empty($trans_date)) {
                $exp = explode(" - ", $trans_date);
                $date_from = date("Y-m-d", strtotime($exp[0]));
                $date_to = date("Y-m-d", strtotime($exp[1]));
            } else {
                $date_from = "";
                $date_to = "";
            }
            
            $data["trans_type"]  = $trans_type;
            $accountTransections = $this->account_model->getAccountTransetions($id, $trans_type, $date_from, $date_to);
            
        }else{
            $accountTransections = $this->account_model->getAccountTransetions($id);
        }
        
        if (empty($accountTransections)) {
            $data['closing_balance'] = 0;
        }else{

            //print_r($accountTransections); die();

            $closing_balance = 0;             
            foreach ($accountTransections as $key => $transecion) {

                if( $transecion['parent_account_type_id'] == 2 || $transecion['parent_account_type_id'] == 4 || $transecion['parent_account_type_id'] == 3 ){

                    if($transecion['account_type_id'] == 43 ){

                        if ($transecion['type']=='credit' && $transecion['type']!='debit') {

                            $debit_amount     = '';
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $credit_amount    = $transecion['amount'];
                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }


                    }else{
                    
                        if ($transecion['type']=='debit' && $transecion['type']!='credit') {

                            $credit_amount    = '';
                            $debit_amount     = $transecion['amount'];
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $closing_balance  = $closing_balance + $transecion['amount'] ;

                        }if ($transecion['type']=='credit' && $transecion['type']!='debit') {

                            $debit_amount     = '';
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $credit_amount    = $transecion['amount'];
                            $closing_balance  = $closing_balance - $transecion['amount'] ;

                        }
                    } 


                }

                if($transecion['parent_account_type_id'] == 1 || $transecion['parent_account_type_id'] == 6 || $transecion['parent_account_type_id'] == 5 || $transecion['parent_account_type_id'] == 7){

                    if($transecion['account_type_id'] == 41 || $transecion['account_type_id'] == 42){

                        if ($transecion['type']=='debit' && $transecion['type']!='credit') {

                            $credit_amount    = '';
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $debit_amount     = $transecion['amount'];
                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }


                    }else{
                    
                        if ($transecion['type']=='debit' && $transecion['type']!='credit') {
                            $credit_amount    = '';
                            $debit_amount     = $transecion['amount'];
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $closing_balance  = $closing_balance - $transecion['amount'] ;
                             
                        }if ($transecion['type']=='credit' && $transecion['type']!='debit') {

                            $debit_amount     = '';
                            $description      = $transecion['description'];
                            $voucher_number   = $transecion['voucher_number'];
                            $credit_amount    = $transecion['amount'];
                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }
                    }

                }

                $data['closing_balance'] = $closing_balance;

                $data['transectionlists'][]  =  array(
                        'operation_date'=>date('Y-m-d', strtotime($transecion['operation_date'])),
                        'description'=>$description,
                        'voucher_number'=>$voucher_number,
                        'addedby'=>$userName,
                        'debit'=>$debit_amount,
                        'credit'=>$credit_amount,
                        'balance'=>$closing_balance
                    );
            }

            //print_r($data['transectionlists']); die();
           
        }
        
        $this->load->view('layout/header');
        $this->load->view('admin/account/accountbook', $data);
        $this->load->view('layout/footer');


    }
    

}

?>