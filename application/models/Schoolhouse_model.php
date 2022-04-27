<?php

class Schoolhouse_model extends MY_model {

    public function get($id = null, $admin_id=null) {

            if($admin_id !=null){
                $this->db->where('admin_id',$admin_id);
            }
            if($id !=null){
                $this->db->where('id',$id);
            }
            $query = $this->db->get("school_houses");
            
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getHouseById($id) {
        $this->db->select('id, house_name, description')->from('school_houses');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data["id"])) {
            $this->db->where("id", $data["id"])->update("school_houses", $data);
            $message = UPDATE_RECORD_CONSTANT . " On  school houses id " . $data["id"];
            $action = "Update";
            $record_id = $data["id"];
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
            $this->db->insert("school_houses", $data);
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On school houses id " . $id;
            $action = "Insert";
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
    }

    public function delete($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("school_houses");
        $message = DELETE_RECORD_CONSTANT . " On school houses id " . $id;
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

}

?>