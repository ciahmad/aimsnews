<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feetype_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null, $admin_id = null) {
        $this->db->select()->from('feetype');
        if ($admin_id != null) {
            $this->db->where('admin_id', $admin_id);
        }
        if ($id != null) {
            $this->db->where('id', $id);
        } 
        $this->db->order_by('id');
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    
    
     public function get_accounts_head($id = null, $admin_id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('parent_account_type_id', 1);
        if ($admin_id != null) {
            $this->db->where('admin_id', $admin_id);
        }
        if ($id != null) {
            $this->db->where('id', $id);
        } 
        $this->db->order_by('id');
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
   
    public function getIncomAccountHead($id = null) {
        $this->db->select()->from('accounts');
        $this->db->where('parent_account_type_id', 1);
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function getIncomAccountHeadByFeeType($id = null) {
        $this->db->select()->from('feetype');
        $this->db->where('is_system', 0);
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
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
    public function remove($id, $admin_id = null) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        if($admin_id != null){
            $this->db->where('admin_id', $admin_id);
        }
        $this->db->where('is_system', 0);
        $this->db->delete('feetype');
        $message = DELETE_RECORD_CONSTANT . " On  fee type id " . $id;
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
            $this->db->update('feetype', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  fee type id " . $data['id'];
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
            //echo "<pre>"; print_r($data); exit;
            $this->db->insert('feetype', $data);
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On  fee type id " . $id;
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
            ;
        }
    }

    public function check_exists($str) {
        $name = $this->security->xss_clean($str);
        $id = $this->input->post('id');
        $admin_id = $this->input->post('admin_id');
        if (!isset($id)) {
            $id = 0;
        }

        if ($this->check_data_exists($name, $id, $admin_id)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_data_exists($name, $id, $admin_id) {
        $this->db->where('code', $name);
        $this->db->where('admin_id', $admin_id);
        $this->db->where('id !=', $id);
        $query = $this->db->get('feetype');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkFeetypeByName($name) {
        $this->db->where('type', $name);


        $query = $this->db->get('feetype');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    
    function FeetypeByName($id) {
        $this->db->where('id', $id);


        $query = $this->db->get('feetype');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

}
