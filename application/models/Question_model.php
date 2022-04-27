<?php

class Question_model extends MY_model {

    public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('questions', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  questions id " . $data['id'];
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
           // echo count($data); die();
            $this->db->insert('questions', $data);

            $id = $this->db->insert_id();
           //  echo $this->db->last_query(); die();
            $message = INSERT_RECORD_CONSTANT . " On  questions id " . $id;
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

    public function get($id = null, $admin_id=null) {
        $this->db->select('questions.*,subjects.name')->from('questions');
        $this->db->join('subjects', 'subjects.id = questions.subject_id');
        if ($id != null) {
            $this->db->where('questions.id', $id);
        } else {
            $this->db->order_by('questions.id');                    
        }
        if($admin_id !=null){
            $this->db->where('questions.admin_id', $admin_id);
        }
        $query = $this->db->get();
       // echo $this->db->last_query(); die;

        if ($id != null) {
            return $query->row(); 

        } else {
            return $query->result();   
        }
    }
    // index data table

    public function get_index($admin_id=null){
         $this->db->select('questions.id as id, questions.question as question, questions.paper as paper, questions.question_marks as question_marks, questions.correct as correct, subjects.id as subject_id, subjects.name as subject_name, classes.class as class_name, sections.section as section_name, sections.id as section_id, CONCAT( staff.name, " ", staff.surname ) as teacher_name'); 
            $this->db->from('questions');
            $this->db->join('subjects','subjects.id=questions.subject_id');
            $this->db->join('classes','classes.id=questions.class_id');
            $this->db->join('sections','sections.id=questions.section_id');
            $this->db->join('staff','staff.id=questions.teacher_id'); 
            if($admin_id !=null){
                $this->db->where('questions.admin_id', $admin_id);
            }          
            $query = $this->db->get();               
            return $query->result();
    }

    public function remove($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('questions');
        $message = DELETE_RECORD_CONSTANT . " On questions id " . $id;
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

    public function image_add($id, $image) {

        $this->db->where('id', $id);
        $this->db->update('questions', $image);
    }

    public function add_option($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('question_options', $data);
        } else {
            $this->db->insert('question_options', $data);
            return $this->db->insert_id();
        }
    }

    public function add_question_answers($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('question_answers', $data);
        } else {
            $this->db->insert('question_answers', $data);
            return $this->db->insert_id();
        }
    }

    public function get_result($id, $admin_id=null) {
        $this->db->select('*')->from('questions')->join('question_answers', 'question.id=question_answers.question_id');
        if($admin_id !=null){
            $this->db->where('questions.admin_id', $admin_id);
        }
        $query =$this->db->get();
        return $query->row_array();
    }

    public function get_option($id) {
        return $this->db->select('id,option')->from('question_options')->where('question_id', $id)->get()->result_array();
    }

    public function get_answer($id) {
        return $this->db->select('option_id as answer_id')->from('question_answers')->where('question_id', $id)->get()->row_array();
    }
    
    public function get_classes($admin_id=null) {
        $this->db->order_by('id', 'DESC');  //actual field name of id
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
        $query=$this->db->get('classes');

        return $query->result();
    }



      public function get_class_section_id($id, $admin_id=null) {
        //echo $id; die();

            $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_sections','classes.id=class_sections.class_id');
            $this->db->join('sections','sections.id=class_sections.section_id');
            $this->db->where('class_sections.class_id',$id);
            if($admin_id !=null){
                $this->db->where('classes.admin_id', $admin_id);
            }
            $query = $this->db->get();    
          //  echo $this->db->last_query(); die();      
            return $query->result();
    }

        public function get_class_section() {
            $this->db->select('*'); 
            $this->db->from('classes');
            $query = $this->db->get();     
             // echo  $this->db->last_query(); die();     
            return $query->result();
    }

   public function  get_class_teacher_id($id, $admin_id=null){

     $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_teacher','classes.id=class_teacher.staff_id');
            $this->db->join('staff','staff.id=class_teacher.staff_id');
            $this->db->where('class_teacher.staff_id',$id);
            if($admin_id !=null){
                $this->db->where('classes.admin_id', $admin_id);
            }
            $query = $this->db->get(); 
            //echo $this->db->last_query(); die();         
            return $query->row();

   }

    public function get_subject_teacher($admin_id=null) { 

        $this->db->select("*");
        $this->db->from('classes');
        $this->db->join('sections', 'classes.id = sections.id');
        if($admin_id =null){
            $this->db->where('classes.admin_id', $admin_id);
        }
        $query = $this->db->get();
      return $query->result();
    }


    public function getById($id, $admin_id=null){
//echo 1; die();
        $this->db->select('subjects.id as subject_id, subjects.name as subject_name, classes.class as class_name, sections.section as section_name, sections.id as section_id, CONCAT( staff.name, " ", staff.surname ) as teacher_name'); 
            $this->db->from('questions');
            $this->db->join('subjects','subjects.id=questions.subject_id');
            $this->db->join('classes','classes.id=questions.class_id');
            $this->db->join('sections','sections.id=questions.section_id');
            $this->db->join('staff','staff.id=questions.teacher_id');
            //$this->db->join('sections','sections.id=class_sections.section_id');
            $this->db->where('questions.id',$id);
            if($admin_id !=null){
                $this->db->where('questions.admin_id', $admin_id);
            }
            $query = $this->db->get();    
          // echo $this->db->last_query(); die();      
            return $query->row();

    
    }
    

}
