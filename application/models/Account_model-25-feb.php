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
    public function get($id = null) {
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

    public function getBankAccount($id = null) {
        $this->db->select()->from('accounts');
        if ($id != null) {
            $this->db->where('accounts.account_type_id', $id);
        } else {
            $this->db->order_by('accounts.account_type_id');
        }
        $query = $this->db->get();
        return $query->result_array();

        // if ($id != null) {
        //     return $query->row_array();
        // } else {
        //     return $query->result_array();
        // }
    }

    public function getAccountHead($id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('accounts.parent_account_type_id', $id);
        $query = $this->db->get();
        return $query->result_array();
        
        // if ($id != null) {
        //     return $query->row_array();
        // } else {
        //     return $query->result_array();
        // }
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

    public function getaccountLists() {

        $this->db->select('a.id, a.is_closed, a.user_id, a.account_title, a.account_type_id, a.account_number, a.account_details, a.opening_balance, a.closing_balance, at.name, at.parent_account_type_id');    
        $this->db->from('accounts as a');
        $this->db->join('account_types as at', 'a.account_type_id = at.id','left');
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

    public function getAccountTransetions($id, $trans_type=null, $date_from=null, $date_to=null){

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
        $this->db->where('ft.is_deleted', 'No');
        $this->db->order_by("ft.account_id", "desc");
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();
    }


    public function getClosingBalance($id, $user_id){

        $this->db->select('a.parent_account_type_id,a.account_type_id, ft.account_id, ft.id as trans_id, ft.account_id, ft.type, ft.sub_type, ft.amount, ft.opening_balance as o_balance, ft.closing_balance c_balance, ft.operation_date, ft.created_by, ft.transaction_id, ft.transfer_transaction_id, ft.fund_trans_deposit');    
        $this->db->from('account_transactions as ft');
        //$this->db->join('account_transactions as ft', 'a.id = ft.account_id','left');
        $this->db->join('accounts as a', 'a.id = ft.account_id','left');
        $this->db->where('ft.account_id', $id);
        $this->db->where('ft.created_by', $user_id);
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
            return $closing_balance;
        }

    }

    public function getAccountsReports($account_id, $user_id){

        $this->db->select('SUM(IF(type = "credit", amount, 0)) AS CreditTotal, SUM(IF(type = "debit", amount, 0)) AS DebitTotal');    
        $this->db->from('account_transactions as ft');
        //$this->db->join('accounts as a', 'a.id = ft.account_id','left');
        $this->db->where('ft.account_id', $account_id);
        $this->db->where('ft.created_by', $user_id);
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

    public function autoSearch($key){
        $this->db->select()->from('accounts');
        $this->db->like('account_title', $key , 'both');
        $this->db->or_like('account_number',$key, 'both'); 
        $this->db->order_by('account_title', 'ASC');
        $this->db->limit(15);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();
    }


}
