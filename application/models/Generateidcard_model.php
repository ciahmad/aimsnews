<?php

/**
 * 
 */
class Generateidcard_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function getstudentidcard() {
        $this->db->select('*');
        $this->db->from('id_card');
        $query = $this->db->get();
        return $query->result();
    }

    public function getidcardbyid($idcard, $admin_id=null) {
        $this->db->select('*');
        $this->db->from('id_card');
        $this->db->where('id', $idcard);
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

}

?>