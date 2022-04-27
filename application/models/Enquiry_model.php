<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class enquiry_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_session_name = $this->setting_model->getCurrentSessionName();
        $this->start_month = $this->setting_model->getStartMonth();
    }

    public function getclasses($id = null) {
        $this->db->select()->from('classes');
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

    function get_enquiry_type() {
        $this->db->select('*');
        $this->db->from('enquiry_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getComplaintSource($admin_id=null) {

        $this->db->select('*');
        $this->db->from('source');
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getComplaintType($admin_id =null) {
        $this->db->select('*');
        $this->db->from('complaint_type');
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_reference($admin_id =null) {
        $this->db->select('*');
        $this->db->from('reference');
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert('enquiry', $data);
     //   echo $this->db->last_query(); die();
        $id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On  enquiry id " . $id;
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
    }

    public function getenquiry_list($id = null, $admin_id=null, $status = 'active') {

        if (!empty($id) and ! empty($status)) {

            $this->db->where("enquiry.id", $id);
        }

         $this->db->select('enquiry.*,classes.class as classname')->
                join("classes", "enquiry.class = classes.id", "left")->
                where('enquiry.status', $status)->order_by("enquiry.id", "desc");
                
                if($admin_id !=null){
                    $this->db->where('enquiry.admin_id', $admin_id);
                }
                
                $query =  $this->db->get("enquiry");
              //  echo $this->db->last_query(); die();

        if (!empty($id) and ! empty($status)) {

            return $query->row_array();
        } else {

            return $query->result_array();
        }
    }

    public function getFollowByEnquiry($id, $admin_id=null) {

         $this->db->select("*")->where("enquiry_id", $id)->order_by("id", "desc");
         if($admin_id !=null){
             $this->db->where('admin_id', $admin_id);
         }
         $query =$this->db->get("follow_up");

        return $query->row_array();
    }

    public function getfollow_up_list($enquiry_id, $follow_up = null, $admin_id=null) {
        $this->db->select()->from('follow_up');
        if ($follow_up != null) {
            $this->db->where('follow_up.id', $follow_up);
            $this->db->where('follow_up.enquiry_id', $enquiry_id);
            $this->db->order_by('follow_up.id desc');
        } else {
            $this->db->where('follow_up.enquiry_id', $enquiry_id);
            $this->db->order_by('follow_up.id desc');
        }
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        if ($follow_up != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function add_follow_up($data) {
        $this->db->insert('follow_up', $data);
    }

    public function follow_up_update($enquiry_id, $follow_up_id, $data) {
        $this->db->where('id', $follow_up_id);
        $this->db->where('enquiry_id', $enquiry_id);
        $this->db->update('follow_up', $data);
        redirect('admin/enquiry/follow_up_edit/' . $enquiry_id . '/' . $follow_up_id . '');
    }

    public function enquiry_update($id, $data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->update('enquiry', $data);
        $message = UPDATE_RECORD_CONSTANT . " On  enquiry id " . $id;
        $action = "Update";
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

    public function enquiry_delete($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('enquiry');
        $message = DELETE_RECORD_CONSTANT . " On  enquiry id " . $id;
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

    public function delete_follow_up($id) {
        $this->db->where('id', $id);
        $this->db->delete('follow_up');
    }

    public function next_follow_up_date($enquiry_id, $admin_id=null) {
        $this->db->select('max(`id`) as id');
        $this->db->from('follow_up');
        $this->db->where('enquiry_id', $enquiry_id);
        $query = $this->db->get();
        $data = $query->row_array();
        $id = $data['id'];
        $this->db->select('*');
        $this->db->from('follow_up');
        $this->db->where('id', $id);
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function changeStatus($data) {

        $this->db->where("id", $data["id"])->update("enquiry", $data);
    }

    public function searchEnquiry($source, $status = 'active', $date_from, $date_to, $admin_id=null) {

        $condition = 0;

        if (!empty($source)) {

            $condition = 1;
            $this->db->where("source", $source);
        }
        if (!empty($status)) {

            if ($status != 'all') {
                $condition = 1;
                $this->db->where("status", $status);
            } else {

                $condition = 1;
            }
        }

        if ((!empty($date_from)) && (!empty($date_to))) {
            $condition = 1;
            $this->db->where("date >= ", $date_from);
            $this->db->where("date <= ", $date_to);
        }

        if ($condition == 0) {

            $this->db->where("enquiry.status", "active");
        }        

         $this->db->select('enquiry.*,classes.class as classname')->join("classes", "classes.id = enquiry.class", "left");
        if($admin_id !=null){
            $this->db->where('enquiry.admin_id', $admin_id);
        }
        $query =$this->db_>get("enquiry");
       // echo $this->last_query(); die;
        return $query->result_array();
    }

}
