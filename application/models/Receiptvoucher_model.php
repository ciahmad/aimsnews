<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receiptvoucher_model extends My_Model {

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
    public function search($text = null, $start_date = null, $end_date = null) {
        if (!empty($text)) {
            $this->db->select('income.id,income.date,income.name,income.invoice_no,income.amount,income.documents,income.note,income_head.income_category,income.inc_head_id')->from('income');
            $this->db->join('income_head', 'income.inc_head_id = income_head.id');

            $this->db->like('income.name', $text);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('income.id,income.date,income.name,income.invoice_no,income.amount,income.documents,income.note,income_head.income_category,income.inc_head_id')->from('income');
            $this->db->join('income_head', 'income.inc_head_id = income_head.id');
            $this->db->where('income.date >=', $start_date);
            $this->db->where('income.date <=', $end_date);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function searchincomegroup($start_date = null, $end_date = null, $head_id = null) {
        $this->db->select('GROUP_CONCAT(income.id,"@",income.name,"@",income.invoice_no,"@",income.date,"@",income.amount) as income, income_head.income_category,sum(income.amount) as total_amount')->from('income');
        $this->db->join('income_head', 'income.inc_head_id = income_head.id');

        $this->db->where('income.date >=', $start_date);
        $this->db->where('income.date <=', $end_date);
        if ($head_id != null) {
            $this->db->where('income.inc_head_id', $head_id);
        }
        $this->db->group_by('income.inc_head_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getIncomeHeadsData($start_date, $end_date) {

        $condition = "date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";

        $this->db->select('sum(amount) as total,income_category')->from('income');
        $this->db->join('income_head', 'income.inc_head_id = income_head.id');
        $this->db->where($condition)->group_by('income_head.id');
        $r = $this->db->get()->result_array();
        //print_r($recorddata);die;
        return $r;
    }

    public function isInvoiceNoExist($admin_id){
        $this->db->select('id,invoice_no');
        $this->db->from('receiptvoucher')->limit(1);
        $this->db->where('admin_id', $admin_id);
        $this->db->order_by('id', 'DESC'); 
        return $this->db->get()->row();
    }

    public function get($id = null, $admin_id = null) {
        $this->db->select('rv.id,rv.account_id as rv_account_id,rv.staff_std_id,rv.class_id,rv.section_id,rv.date,rv.name,rv.staff_type,rv.cash_bank,rv.bank_account_id,rv.total_amount,rv.reference_number,rv.invoice_no,rv.note,rvl.receiptvoucher_id,rvl.account_id,rvl.description,rvl.amount, a.account_title')->from('receiptvoucher as rv');
        $this->db->join('receiptvoucher_list as rvl', 'rv.id = rvl.receiptvoucher_id');
        $this->db->join('accounts as a', 'rvl.account_id = a.id');
        if ($id != null) {
            $this->db->where('rv.id', $id);
            //$this->db->where('rv.is_active', 'Yes');
        } else {
            $this->db->order_by('rv.id', 'DESC');
        }
        if($admin_id!=null){
            $this->db->where('rv.admin_id', $admin_id);
        }
        $this->db->where('rv.is_deleted', 'No');
        $this->db->where('rv.is_active', 'Yes');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ($id != null) {
            return $query->result_array();
        } else {
            return $query->result_array();
        }
    }

    public function getRV($id = null, $admin_id = null) {
        $this->db->select('*')->from('receiptvoucher');
        //$this->db->join('receiptvoucher_list as rvl', 'rv.id = rvl.receiptvoucher_id');
        //$this->db->join('accounts as a', 'rvl.account_id = a.id');
        if ($id != null) {
            $this->db->where('id', $id);
            //$this->db->where('rv.is_active', 'Yes');
        } else {
            $this->db->order_by('id', 'DESC');
        }
        if($admin_id!=null){
            $this->db->where('admin_id', $admin_id);
        }
        $this->db->where('is_deleted', 'No');
        $this->db->where('is_active', 'Yes');
        $query = $this->db->get();
        $rv_results = array();
        foreach ($query->result_array() as $key => $rv) {
             $rvlist_array = $this->getReceiptVoucherListById($rv['id']);
             $rv_results[] = array('rvdata'=>$rv, 'rvlistdata'=>$rvlist_array);
        }
        if(!empty($rv_results)){
            return $rv_results;
        }
        
        
        //echo $this->db->last_query();die;
        // if ($id != null) {
        //     return $query->result_array();
        // } else {
        //     return $query->result_array();
        // }

        
    }
    public function getReceiptVoucherListById($id = null){

        $this->db->select('rvlist.admin_id, rvlist.receiptvoucher_id, rvlist.account_id, rvlist.description, rvlist.amount, a.account_title')->from('receiptvoucher_list as rvlist');
        $this->db->join('accounts as a', 'rvlist.account_id = a.id');
        if ($id != null) {
            $this->db->where('rvlist.receiptvoucher_id', $id);
            //$this->db->where('rv.is_active', 'Yes');
        } else {
            $this->db->order_by('rvlist.id', 'DESC');
        }
        if($admin_id!=null){
            $this->db->where('rvlist.admin_id', $admin_id);
        }
        $this->db->where('rvlist.is_deleted', 'No');
        $this->db->where('rvlist.is_active', 'Yes');
        $query = $this->db->get();
        //echo $this->db->last_query();die();
        if ($id != null) {
            return $query->result_array();
        } else {
            return $query->result_array();
        }

    }


    public function getstudentById($id) {
        $this->db->select('CONCAT(firstname , " ", lastname) AS name')->from('students');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['name'];
      //  echo $this->db->last_query();die;
        //return $query->result_array();
    }
    public function getstaffById($id) {
        $this->db->select('CONCAT(name , " ", surname) AS name')->from('staff');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['name'];
        //echo $this->db->last_query();die;
        //return $query->result_array();
    }

    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function del($id, $admin_id) {

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('receiptvoucher_id', $id);
        $this->db->where('admin_id', $admin_id);
        $this->db->delete('receiptvoucher_list');

        //$return_value = $this->db->insert_id();
        $message = DELETE_RECORD_CONSTANT . " On  receiptvoucher_list   id " . $id;
        $action = "Delete";
        $record_id = $id;
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

            return $record_id;
        }
    }

    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id, $admin_id) {

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        //$this->db->where('receiptvoucher_id', $id);
        $data = array('is_deleted'=>'Yes');
        $this->db->where('id', $id);
        $this->db->where('admin_id', $admin_id);
        $this->db->update('receiptvoucher', $data);
        if($this->db->affected_rows()>0){
            
            $this->db->where('receiptvoucher_id', $id);
            $this->db->where('admin_id', $admin_id);
            $this->db->update('receiptvoucher_list', $data);

            $this->db->where('voucher_id', $id);
            $this->db->where('admin_id', $admin_id);
            $this->db->where('voucher_type', 'RV');
            $this->db->update('account_transactions', $data);
        }
        //echo $this->db->last_query();die;
        //$this->db->delete('receiptvoucher_list');

        //$return_value = $this->db->insert_id();
        $message = DELETE_RECORD_CONSTANT . " On  receiptvoucher_list   id " . $id;
        $action = "Delete";
        $record_id = $id;
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

            return $record_id;
        }
    }

    public function removeVoucher($data) {

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->delete('account_transactions', $data);     
        //$this->db->where('journalvoucher_id', $id);
        //$this->db->delete('journalvoucher_list');
        //echo $this->db->last_query(); die();
        $message = DELETE_RECORD_CONSTANT . " On account_transactions voucher_id " . $data['voucher_id'];
        $action = "Delete";
        $record_id = $data['voucher_id'];
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
            return $return_value;
        }
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
            $this->db->update('receiptvoucher', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  Receipt Voucher   id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
        } else {
            $this->db->insert('receiptvoucher', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Add Receipt Voucher id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            //echo $this->db->last_query();die;
        }
            $this->log($message, $record_id, $action);
            //======================Code End==============================
            $this->db->trans_complete(); # Completing transaction
            /* Optional */
            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;
            } else {
                return $record_id;
            }
        
    }

    public function addReceiptVoucherList($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('receiptvoucher_list', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Receipt voucher list id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
        } else {
            $this->db->insert('receiptvoucher_list', $data);
            //echo $this->db->last_query();die();
            //echo $this->db->insert_id();
            $return_value = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Add Receipt Voucher id " . $return_value;
            $action = "Insert";
            $record_id = $return_value;
        }
        $this->log($message, $record_id, $action);
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /* Optional */
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            return $record_id;
        }
    }

    public function check_Exits_group($data) {
        $this->db->select('*');
        $this->db->from('income');
        $this->db->where('session_id', $this->current_session);
        $this->db->where('feetype_id', $data['feetype_id']);
        $this->db->where('class_id', $data['class_id']);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return false;
        } else {
            return true;
        }
    }

    public function getTypeByFeecategory($type, $class_id) {
        $this->db->select('income.id,income.session_id,income.amount,income.invoice_no,income.documents,income.note,income_head.class,feetype.type')->from('income');
        $this->db->join('income_head', 'income.class_id = income_head.id');
        $this->db->join('feetype', 'income.feetype_id = feetype.id');
        $this->db->where('income.class_id', $class_id);
        $this->db->where('income.feetype_id', $type);
        $this->db->where('income.session_id', $this->current_session);
        $this->db->order_by('income.id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getTotalExpenseBydate($date) {
        $query = 'SELECT sum(amount) as `amount` FROM `income` where date=' . $this->db->escape($date);
        $query = $this->db->query($query);
        return $query->row();
    }

    public function getTotalExpenseBwdate($date_from, $date_to) {
        $query = 'SELECT sum(amount) as `amount` FROM `income` where date between ' . $this->db->escape($date_from) . ' and ' . $this->db->escape($date_to);

        $query = $this->db->query($query);
        return $query->row();
    }

}
