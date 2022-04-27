<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense_model extends MY_Model {

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
    public function search($text = null, $start_date = null, $end_date = null, $admin_id = null) {
        if (!empty($text)) {
            $this->db->select('expenses.id,expenses.date,expenses.name,expenses.invoice_no,expenses.staff_std_id,expenses.staff_type,expenses.cash_bank,expenses.reference_number,expenses.bank_account_id,expenses.amount,expenses.documents,expenses.note,accounts.account_title,expenses.exp_head_id')->from('expenses');
            $this->db->join('accounts', 'expenses.exp_head_id = accounts.id');
            if ($admin_id != null) {
                $this->db->where('expenses.admin_id', $admin_id);
            }
            $this->db->like('expenses.name', $text);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('expenses.id,expenses.date,expenses.name,expenses.invoice_no,expenses.staff_std_id,expenses.staff_type,expenses.cash_bank,expenses.reference_number,expenses.bank_account_id,expenses.amount,expenses.documents,expenses.note,accounts.account_title,expenses.exp_head_id')->from('expenses');
            $this->db->join('accounts', 'expenses.exp_head_id = accounts.id');
            $this->db->where('expenses.date >=', $start_date);
            $this->db->where('expenses.date <=', $end_date);
            if ($admin_id != null) {
                $this->db->where('expenses.admin_id', $admin_id);
            }
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function isInvoiceNoExist($admin_id){
        $this->db->select('id,invoice_no');
        $this->db->from('expenses')->limit(1);
        $this->db->where('admin_id', $admin_id);
        $this->db->order_by('id', 'DESC'); 
        return $this->db->get()->row();
    }

    public function get($id = null, $admin_id = null) {
        $this->db->select('expenses.id,expenses.date,expenses.name,expenses.invoice_no,expenses.staff_std_id,expenses.class_id,expenses.section_id,expenses.staff_type,expenses.cash_bank,expenses.reference_number,expenses.bank_account_id,expenses.amount,expenses.documents,expenses.note,accounts.account_title,expenses.exp_head_id')->from('expenses');
        $this->db->join('accounts', 'expenses.exp_head_id = accounts.id');
        if ($id != null) {
            $this->db->where('expenses.id', $id);
        } else {
            $this->db->order_by('expenses.id', 'DESC');
        }
        if($admin_id!=null){
            $this->db->where('expenses.admin_id', $admin_id);
        }
        
        $this->db->where('expenses.is_deleted', 'No');
        $this->db->where('expenses.is_active', 'Yes');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
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
        //$this->db->where('id', $id);
        //$this->db->delete('expenses');
        $data = array('is_deleted'=>'Yes');
        $this->db->where('id', $id);
        $this->db->where('admin_id', $admin_id);
        $this->db->update('expenses', $data);

        if($this->db->affected_rows()>0){
            $this->db->where('voucher_id', $id);
            $this->db->where('admin_id', $admin_id);
            $this->db->where('voucher_type', 'EXP');
            $this->db->update('account_transactions', $data);
        }

        //$return_value = $this->db->insert_id();
        $message = DELETE_RECORD_CONSTANT . " On  expenses   id " . $id;
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


        if (isset($data['id']) && $data['id'] != '') {

            $this->db->where('id', $data['id']);
            $this->db->update('expenses', $data);

            $message = UPDATE_RECORD_CONSTANT . " On  expenses   id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
        } else {
            $this->db->insert('expenses', $data);
            $record_id = $this->db->insert_id();
            //echo $this->db->last_query(); die();
            $message = INSERT_RECORD_CONSTANT . " On  expenses   id " . $record_id;
            $action = "Insert";
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
        $this->db->from('expenses');
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
        $this->db->select('expenses.id,expenses.session_id,expenses.invoice_no,expenses.amount,expenses.documents,expenses.note,expense_head.class,feetype.type')->from('expenses');
        $this->db->join('expense_head', 'expenses.class_id = expense_head.id');
        $this->db->join('feetype', 'expenses.feetype_id = feetype.id');
        $this->db->where('expenses.class_id', $class_id);
        $this->db->where('expenses.feetype_id', $type);
        $this->db->where('expenses.session_id', $this->current_session);
        $this->db->order_by('expenses.id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getTotalExpenseBydate($date) {
        $query = 'SELECT sum(amount) as `amount` FROM `expenses` where date=' . $this->db->escape($date);
        $query = $this->db->query($query);
        return $query->row();
    }

    public function getTotalExpenseBwdate($date_from, $date_to, $admin_id=null) {
        $query = 'SELECT sum(amount) as `amount` FROM `expenses` where expenses.admin_id=".$admin_id." AND  date between ' . $this->db->escape($date_from) . ' and ' . $this->db->escape($date_to);

        //print_r($query); die();

        $query = $this->db->query($query);
        return $query->row();
    }

    public function getExpenseHeadData($start_date, $end_date, $admin_id=null) {
        $condition = "date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";

        $recorddata = $this->db->select('sum(amount) as total,exp_category')->from('expenses');
        $this->db->join('expense_head', 'expenses.exp_head_id = expense_head.id');
        $this->db->where($condition)->group_by('expense_head.id');
        if($admin_id !=null){
            $this->db->where('expenses.admin_id', $admin_id);
        }
        $r = $this->db->get()->result_array();
        //print_r($recorddata);die;
        return $r;
    }

}
