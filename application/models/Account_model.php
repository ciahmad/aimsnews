<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function get($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        if ($id != null) {
            $this->db->where('accounts.id', $id);
            $this->db->where('accounts.is_deleted', 'No');
        } else {
            $this->db->where('accounts.is_deleted', 'No');
            $this->db->order_by('accounts.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    // public function get2($id, $number) {
    //     $this->db->select('account_number')->from('accounts');
    //     $this->db->where('accounts.account_type_id', $id);
    //     $query = $this->db->get();
    //     $no = 1;
    //     foreach ($query->result_array() as $key => $num_rows) {
    //         $number = $number+$no; 
    //         $this->db->where('account_type_id', $id);
    //         $this->db->where('account_number', $num_rows['account_number']);
    //         $this->db->update('accounts', array('account_number' => $number));
    //     }

    // }

    public function checkIsAccAdded($admin_id, $is_acc_added = null){

        $this->db->select()->from('accounts');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('is_acc_added', $is_acc_added);
        $this->db->order_by('id', 'DESC');  //actual field name of id
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
        //echo $this->db->last_query();die;
    }

    public function getBankAccount($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        if ($admin_id != null) {
            $this->db->where('accounts.admin_id', $admin_id);
        }
        if ($id != null) {
            $this->db->where('accounts.account_type_id', $id);
        } else {
            $this->db->order_by('accounts.account_type_id');
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();

        // if ($id != null) {
        //     return $query->row_array();
        // } else {
        //     return $query->result_array();
        // }
    }

    public function getAccountHead($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('parent_account_type_id', $id);
        if($admin_id!=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result_array();
        
        // if ($id != null) {
        //     return $query->row_array();
        // } else {
        //     return $query->result_array();
        // }
    }

    public function getAccountsById($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('parent_account_type_id', $id);
        if($admin_id!=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        $incomeReportList = array();
        foreach ($query->result_array() as $key => $account) {

            $incomeReports = $this->getAccountTransetionsByAccountId($account['id'], $this->userdata['admin_id']);

            if(!empty($incomeReports)){

                foreach ($incomeReports as $key => $report) {
                
                    if($report['amount'] > 0){
                        
                        $incomeReportList[] = array(
                            'id' => $report['id'],
                            'admin_id' => $report['admin_id'],
                            'account_id' => $report['account_id'],
                            'user_id' => $report['user_id'],
                            'staff_type' => $report['staff_type'],
                            'voucher_number' => $report['voucher_number'],
                            'account_title' => $this->account_model->getNameFrom($report['account_id']),
                            'amount' => $report['amount'],
                            'operation_date' => date($this->customlib->getSchoolDateFormat(), $this->customlib->datetostrtotime($report['operation_date'])),
                            'created_at' => $report['created_at'],
                        );
                    }
                }
            }

        }

        return $incomeReportList;
        
    }

    public function getAccountTransetionsByAccountId($id = null, $admin_id = null, $trans_type=null, $date_from=null, $date_to=null){

        $condition = 0;
        if (!empty($trans_type)) {
            if ($trans_type != 'all') {
                $condition = 1;
                $this->db->where("type", $trans_type);
            } else {
                $condition = 1;
            }
        }

        if ((!empty($date_from)) && (!empty($date_to))) {
            $condition = 1;
            $this->db->where("operation_date >= ", $date_from);
            $this->db->where("operation_date <= ", $date_to);
        }

        $this->db->select('*');    
        $this->db->from('account_transactions as ft');
        if($id!=null){
        $this->db->where('ft.account_id', $id);
        }
        if($admin_id!=null){
        $this->db->where('ft.admin_id', $admin_id);
        }
        $this->db->where('ft.is_deleted', 'No');
        $this->db->order_by("ft.account_id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ( !empty($query->result_array()) ){ 
            
            foreach ($query->result_array() as $result){
                 $transecion[] = $result;
            }
            return $transecion;
        }
        
    }

    public function fetchRecords($id){

        $this->db->select()->from('accounts');
        $this->db->where_not_in('id', $id);
        $this->db->order_by('id', 'DESC');  //actual field name of id
        $query=$this->db->get();
        return $query->result_array();
        //echo $this->db->last_query();die;
    }

    public function createAccountTransaction($data){

        $this->db->insert('account_transactions', $data);
        $insert_id = $this->db->insert_id();
        ///echo $this->db->last_query();die;
        $message = INSERT_RECORD_CONSTANT . " On Fund Transfer id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /* Optional */
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            //return $return_value;
        }
        return $insert_id;

    }

    public function checkIsParentExist($parent_id){

        $this->db->select('id, name');    
        $this->db->from('account_types');
        $this->db->where('id',$parent_id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['name'];

    }

    public function getaccountLists($admin_id = null) {

        $this->db->select('a.id, a.is_closed, a.user_id, a.account_title, a.account_type_id, a.account_number, a.account_details, a.opening_balance, a.closing_balance, at.name, at.parent_account_type_id');    
        $this->db->from('accounts as a');
        $this->db->join('account_types as at', 'a.account_type_id = at.id','left');
        if($admin_id!=null){
            $this->db->where('a.admin_id', $admin_id);
        }
        $this->db->where('a.is_deleted', 'No');
        $this->db->order_by("a.id", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

   
    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($data) {

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->delete('account_transactions', $data); 
        //$this->db->where('voucher_id', $data['voucher_id']);
        //$this->db->where('voucher_type', $data['voucher_type']);
        //$this->db->delete('account_transactions');
        //echo $this->db->last_query();die;
        $message = DELETE_RECORD_CONSTANT . " On account_transactions voucher_id " . $data['voucher_id'];
        $action = "Delete";
        $record_id = $id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /* Optional */
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            //return $return_value;
        }
    }

    function activeDeactive($data){
        extract($data);
        $this->db->where('id', $id);
        $this->db->update('accounts', array('is_closed' => $is_closed));
        //echo $this->db->last_query();die;
    }

    public function updateAccountTransaction($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('account_transactions', $data);
    }

    public function updateBalance($data)
    {   
        extract($data);
        $this->db->where('id', $data['id']);
        $this->db->update('accounts', array('closing_balance' => $closing_balance));
        //echo $this->db->last_query();die;
    }

    public function getAccountById($id){

        $this->db->select('a.id, a.user_id, a.account_title, a.account_type_id, a.account_number, a.account_details, a.opening_balance, a.closing_balance, at.name, at.parent_account_type_id');    
        $this->db->from('accounts as a');
        $this->db->join('account_types as at', 'a.account_type_id = at.id','left');
        $this->db->where('a.id', $id);
        $this->db->order_by("a.id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
             return $query->row_array();
        }
        return false;

    }

    public function searchTrans($id, $trans_type, $date_from, $date_to) {

        $condition = 0;

        if (!empty($trans_type)) {

            if ($trans_type != 'all') {
                $condition = 1;
                $this->db->where("type", $trans_type);
            } else {

                $condition = 1;
            }
        }

        if ((!empty($date_from)) && (!empty($date_to))) {
            $condition = 1;
            $this->db->where("operation_date >= ", $date_from);
            $this->db->where("operation_date <= ", $date_to);
        }

        $this->db->select();
        $this->db->from('account_transactions');
        $this->db->where('account_id', $id);
        $this->db->where('deleted_at', null);
        $this->db->order_by("account_id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();
    }

    public function getAccountTransetions($id, $admin_id = null, $trans_type=null, $date_from=null, $date_to=null){

        $condition = 0;

        if (!empty($trans_type)) {

            if ($trans_type != 'all') {
                $condition = 1;
                $this->db->where("type", $trans_type);
            } else {

                $condition = 1;
            }
        }

        if ((!empty($date_from)) && (!empty($date_to))) {
            $condition = 1;
            $this->db->where("operation_date >= ", $date_from);
            $this->db->where("operation_date <= ", $date_to);
        }

        $this->db->select('a.parent_account_type_id, a.account_type_id, ft.voucher_number, ft.account_id,ft.description,ft.id as trans_id, ft.account_id, ft.type, ft.sub_type, ft.amount, ft.opening_balance as o_balance, ft.closing_balance c_balance, ft.operation_date, ft.created_by, ft.transaction_id, ft.transfer_transaction_id, ft.fund_trans_deposit');    
        $this->db->from('account_transactions as ft');
        //$this->db->join('account_transactions as ft', 'a.id = ft.account_id','left');
        $this->db->join('accounts as a', 'a.id = ft.account_id','left');
        $this->db->where('ft.account_id', $id);
        if($admin_id!=null){
        $this->db->where('ft.admin_id', $admin_id);
        }
        $this->db->where('ft.is_deleted', 'No');
        $this->db->order_by("ft.account_id", "desc");
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();
    }




    public function getClosingBalance($id, $admin_id){

        $this->db->select('a.parent_account_type_id,a.account_type_id, ft.account_id, ft.id as trans_id,  ft.type, ft.sub_type, ft.amount, ft.opening_balance as o_balance, ft.closing_balance c_balance, ft.operation_date, ft.created_by, ft.transaction_id, ft.transfer_transaction_id, ft.fund_trans_deposit');    
        $this->db->from('account_transactions as ft');
        //$this->db->join('account_transactions as ft', 'a.id = ft.account_id','left');
        $this->db->join('accounts as a', 'a.id = ft.account_id','left');
        $this->db->where('ft.account_id', $id);
        $this->db->where('ft.admin_id', $admin_id);
        $this->db->where('ft.is_deleted', "No");
        $this->db->order_by("ft.account_id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ( !empty($query->result_array()) ){ 
            $closing_balance = 0;
            
            foreach ($query->result_array() as $transecion){
                
                if( $transecion['parent_account_type_id'] == 2 || $transecion['parent_account_type_id'] == 4 || $transecion['parent_account_type_id'] == 3 ){

                    if($transecion['account_type_id'] == 43){

                        if ($transecion['type']=='credit' && $transecion['type']!='debit') {
                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }

                    }else{

                        if ($transecion['type']=='debit' && $transecion['type']!='credit') {

                            $closing_balance  = $closing_balance + $transecion['amount'] ;

                        }if ($transecion['type']=='credit' && $transecion['type']!='debit') {

                            $closing_balance  = $closing_balance - $transecion['amount'] ;
                        }
                    }

                }if($transecion['parent_account_type_id'] == 1 || $transecion['parent_account_type_id'] == 6 || $transecion['parent_account_type_id'] == 5 || $transecion['parent_account_type_id'] == 7){

                    if($transecion['account_type_id'] == 41 || $transecion['account_type_id'] == 42){

                        if ($transecion['type']=='debit' && $transecion['type']!='credit'){

                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }

                    }else{
                    
                        if ($transecion['type']=='debit' && $transecion['type']!='credit') {

                            $closing_balance  = $closing_balance - $transecion['amount'] ;
                            
                        }if ($transecion['type']=='credit' && $transecion['type']!='debit') {

                            $closing_balance  = $closing_balance + $transecion['amount'] ;
                        }
                    }

                }

            }
            //print_r($closing_balance);
            //die();
            return $closing_balance;
        }

    }

    public function getAccountsReports($account_id, $user_id, $admin_id = null){

        $this->db->select('SUM(IF(type = "credit", amount, 0)) AS CreditTotal, SUM(IF(type = "debit", amount, 0)) AS DebitTotal');    
        $this->db->from('account_transactions as ft');
        $this->db->where('ft.account_id', $account_id);
        $this->db->where('ft.created_by', $user_id);
        if ($admin_id!=null) {
            $this->db->where('ft.admin_id', $admin_id);
        }
        $this->db->where('ft.is_deleted', 'No');
        $this->db->where('ft.deleted_at', null);
        $this->db->order_by("ft.account_id", "desc");
        $query = $this->db->get();
        return $query->row_array();

    }

    // public function getIncomeStatement($account_id, $user_id){

    //     $this->db->select('SUM(IF(type = "credit", amount, 0)) AS CreditTotal, SUM(IF(type = "debit", amount, 0)) AS DebitTotal');    
    //     $this->db->from('account_transactions as ft');
    //     //$this->db->join('accounts as a', 'a.id = ft.account_id','left');
    //     $this->db->where('ft.account_id', $account_id);
    //     $this->db->where('ft.created_by', $user_id);
    //     $this->db->where('ft.is_deleted', 'No');
    //     $this->db->where('ft.deleted_at', null);
    //     $this->db->order_by("ft.account_id", "desc");
    //     $query = $this->db->get();
    //     return $query->row_array();

    // }


    public function getNameFrom($id){
        $this->db->select('id, account_title');    
        $this->db->from('accounts');
        $this->db->where('id',$id);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $row = $query->row_array();
        return $row['account_title'];
    }


    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('accounts', $data);
            $message = UPDATE_RECORD_CONSTANT . " On books id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /* Optional */

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;
            } else {
                //return $return_value;
            }
        } else {
            $this->db->insert('accounts', $data);
            $insert_id = $this->db->insert_id();
            //echo $this->db->last_query();die;
            $message = INSERT_RECORD_CONSTANT . " On Accounts id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            $this->log($message, $record_id, $action);
            //echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /* Optional */
            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;
            } else {
                //return $return_value;
            }
            return $insert_id;
        }
    }
    
    public function insertHead($data)
    {
        if($data['account_type_id']==1){
            $table ='income_head';
        } 
        if($data['account_type_id']==2){
            $table ='expense_head';
        }    
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /* Optional */
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            //return $return_value;
        }
        return $insert_id;
    }
        
    public function listaccount() {
        $this->db->select()->from('accounts');
        $this->db->limit(10);
        $this->db->order_by("id", "desc");
        $listaccount = $this->db->get();
        return $listaccount->result_array();
    }

    public function autoSearch($admin_id = null, $key, $account_type_id = null, $parent_id = null){

        $this->db->select()->from('accounts');
        if($account_type_id!=null && $parent_id!=null){
            $this->db->where('parent_account_type_id', $parent_id);
            $this->db->where('account_type_id', $account_type_id);
            $this->db->where('admin_id', $admin_id);
        }else{
            if($admin_id != null){
                $this->db->where('admin_id', $admin_id);
            }
            if(is_numeric($key)){
                $this->db->like('account_number', $key , 'both');
            }else{
                $this->db->like('account_title', $key , 'both');
            }
            //$this->db->or_like('account_number',$key, 'both'); 
            $this->db->order_by('account_title', 'ASC');
            $this->db->limit(16);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die();
        return $query->result_array();
    }

    public function isAccNoExist($account_type_id = null, $admin_id = null){
        $this->db->select('id,account_number');
        $this->db->from('accounts')->limit(1);
        if($admin_id != null){
            $this->db->where('admin_id', $admin_id);
        }if($account_type_id != null){
            $this->db->where('account_type_id', $account_type_id);
        }
        $this->db->order_by('id', 'DESC'); 
        return $this->db->get()->row();
    }


}
