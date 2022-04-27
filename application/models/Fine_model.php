<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fine_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getUserData();
        $this->current_session = $this->setting_model->getCurrentSession($this->userdata['admin_id']);
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function get($id = null, $order = "desc", $admin_id = null) {
        $this->db->select()->from('fine');
        if ($admin_id != null) {
            $this->db->where('admin_id', $admin_id);
        }
        if ($id != null) {
            $this->db->where('id', $id);
        } 
        $this->db->order_by('id ' . $order);
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    
    public function get_accounts_title($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('id', $id);
        if ($id != null) {
            $this->db->where('id', $id);
        } 
        if ($admin_id != null) {
            $this->db->where('admin_id', $admin_id);
        }
        $this->db->order_by('id');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function get_fine_accounts_head($id = null, $order = "desc", $admin_id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('account_type_id', 44);
        
        if ($id != null) {
            $this->db->where('id', $id);
        }
        if ($admin_id != null) {
            $this->db->where('admin_id', $admin_id);
        }
        $this->db->order_by('id ' . $order);
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
    public function remove($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('fine');
        $message = DELETE_RECORD_CONSTANT . " On fine id " . $id;
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
            $this->db->update('fine', $data);
            $message = UPDATE_RECORD_CONSTANT . " On fine id " . $data['id'];
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
            $data['session_id'] = $this->current_session;
            $this->db->insert('fine', $data);
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On fine id " . $id;
            $action = "Insert";
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
                //return $return_value;
            }
            return $id;
        }
    }

}
