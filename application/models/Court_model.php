<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Court_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function getCountries() {
        $this->db->select()->from('countries');
        $this->db->order_by("id", "asc");
        $listcountry = $this->db->get();
        return $listcountry->result_array();
    }
    public function getStates($id){

        $this->db->select('id,name')
             ->from('states')
             ->where('country_id', $id);
              $query = $this->db->get();  
            //echo $this->db->last_query(); die();
         return $query->result();

    }public function getCities($id){

        $this->db->select('id,name')
             ->from('cities')
             ->where('state_id', $id);
              $query = $this->db->get();  
            //echo $this->db->last_query(); die();
         return $query->result();

    }

    public function get($id = null) {

        $userdata = $this->customlib->getuserdata();
        $this->db->select('courts.id as court_id, courts.court_name,courts.court_room_number,courts.court_category,courts.court_location,courts.court_police_station,courts.country_id,courts.state_id,courts.city_id,courts.court_description,court_category.courtcategory_name, court_category.id as court_category_id, countries.name as country_name, states.name as state_name, cities.name as city_name');
        $this->db->from('courts'); 
        $this->db->join('court_category', 'court_category.id=courts.court_category');
        $this->db->join('countries', 'countries.id=courts.country_id');
        $this->db->join('states', 'states.id=courts.state_id', 'left');
        $this->db->join('cities', 'cities.id=courts.city_id', 'left');
        if ($id != null) {
            $this->db->where('courts.id', $id);
        } else {
            $this->db->where('courts.admin_id', $userdata['admin_id']);
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function getcourts($id = null, $admin_id = null) {

        $this->db->select('*');
        $this->db->from('courts'); 
        if($id = null){
            $this->db->order_by('id');

        }
        if($admin_id != null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getcourtsbycaseid($id = null, $admin_id=null) {
        $this->db->select('*');
        $this->db->from('courts'); 
        if($id != null){
            $this->db->where('id', $id);
        }

        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }

    }

    public function getupdatedcourts($id, $admin_id){
        $this->db->select()->from('update_court');
        if($id !=null){
            $this->db->where('case_id', $id);
        }else{
            $this->db->order_by('id');
        }
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query=$this->db->get();

        if($id != null){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function adddocumentreq($data){
      //  print_r($data); die();
        $this->db->insert('documents_required', $data);
     //  echo $this->db->last_query(); die();

    }

    public function getcourt($id=null , $admin_id=null){
      // print_r($id);die();
        $this->db->select('courts.*,court_category.courtcategory_name');
        $this->db->from('courts');
        $this->db->join('court_category', 'court_category.id= courts.court_category');
        //$this->db->where('id', $id);
        $this->db->where('courts.id', $id);
       if($admin_id !=null){
           $this->db->where('admin_id', $admin_id);
       }
        $query= $this->db->get();
        // $this->db->last_query(); die();
        return $query->row_array();
    }

    public function getdocument(){
      
        $this->db->select('documents_required.id as id, case_categories.category_name, case_subcategories.subcategory_name, documents_required.document, documents_required.forms_req as form, documents_required.notes   ');
        $this->db->from('documents_required'); 
        $this->db->join('case_categories', 'case_categories.id=documents_required.case_category_id');
        $this->db->join('case_subcategories', 'case_subcategories.id=documents_required.case_sub_category_id');  
            $query = $this->db->get(); 
           
//echo $this->db->last_query(); die();
            if($query->num_rows() != 0)
            {
                return $query->result_array();
            }
            else
            {
                return false;
            }

    }

    // public function bookgetall() {
    //     echo 1; die();

    //      $this->db->select('*');
    //         $this->db->from('documents_required'); 
    //         $this->db->join('classes', 'classes.id=documents_required.case_category', 'left');
    //         //$this->db->join('Soundtrack', 'c.album_id=a.album_id', 'left');
    //        // $this->db->where('c.album_id',$id);
    //         $this->db->order_by('id','asc');         
    //         $query = $this->db->get(); 
    //         echo $this->db->last_query(); die();
    //         if($query->num_rows() != 0)
    //         {
    //             return $query->result_array();
    //         }
    //         else
    //         {
    //             return false;
    //         }

    //     // $sql = "SELECT books.*,IFNULL(total_issue, '0') as `total_issue` FROM books LEFT JOIN (SELECT COUNT(*) as `total_issue`, book_id from book_issues  where is_returned= 0  GROUP by book_id) as `book_count` on books.id=book_count.book_id where 0=0  ";

    //     // $query = $this->db->query($sql);

    //     // if ($query->num_rows() > 0) {
    //     //     return $query->result_array();
    //     // }
    //     return false;
    // }

    public function getBookwithQty() {

        $sql = "SELECT books.*,IFNULL(total_issue, '0') as `total_issue` FROM books LEFT JOIN (SELECT COUNT(*) as `total_issue`, book_id from book_issues  where is_returned= 0 GROUP by book_id) as `book_count` on books.id=book_count.book_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
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
        $this->db->delete('courts');
        //$this->db->where('book_id', $id);
      //  $this->db->delete('book_issues');
        $message = DELETE_RECORD_CONSTANT . " On courts id " . $id;
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
            $this->db->update('courts', $data);
            $message = UPDATE_RECORD_CONSTANT . " On courts id " . $data['id'];
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
            $this->db->insert('courts', $data);
            $insert_id = $this->db->insert_id();
            //echo $this->db->last_query();die;
            $message = INSERT_RECORD_CONSTANT . " On courts id " . $insert_id;
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

    public function updatequery($data){
           $this->db->set('case_category_id', 'case_sub_category_id','document','forms_req','notes');
            $this->db->where('id', $data['id']);
            $this->db->update('documents_required', $data); 
       
    }

    public function listbook() {
        $this->db->select()->from('books');
        $this->db->limit(10);
        $this->db->order_by("id", "desc");
        $listbook = $this->db->get();
        return $listbook->result_array();
    }

    public function check_Exits_group($data) {
        $this->db->select('*');
        $this->db->from('feemasters');
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
        $this->db->select('feemasters.id,feemasters.session_id,feemasters.amount,feemasters.description,classes.class,feetype.type')->from('feemasters');
        $this->db->join('classes', 'feemasters.class_id = classes.id');
        $this->db->join('feetype', 'feemasters.feetype_id = feetype.id');
        $this->db->where('feemasters.class_id', $class_id);
        $this->db->where('feemasters.feetype_id', $type);
        $this->db->where('feemasters.session_id', $this->current_session);
        $this->db->order_by('feemasters.id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function bookinventory($start_date, $end_date) {
        $condition = " and date_format(`books`.`postdate`,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";
        $sql = "SELECT books.*,IFNULL(total_issue, '0') as `total_issue` FROM books LEFT JOIN (SELECT COUNT(*) as `total_issue`, book_id from book_issues  where is_returned= 0  GROUP by book_id) as `book_count` on books.id=book_count.book_id where 0=0 " . $condition . " ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function bookoverview($start_date, $end_date) {
        $condition = " and date_format(`books`.`postdate`,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";
        $sql = "SELECT sum(books.qty) as qty,sum(IFNULL(total_issue, '0')) as `total_issue` FROM books LEFT JOIN (SELECT COUNT(*) as `total_issue`, book_id from book_issues  where is_returned= 0  GROUP by book_id) as `book_count` on books.id=book_count.book_id where 0=0 " . $condition . " ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

}
