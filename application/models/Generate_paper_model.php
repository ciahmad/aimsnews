<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_paper_model extends CI_Model {


 public function get($id = null, $admin_id=null) {
       // echo 1; die();
        $this->db->select('generate_paper.*,subjects.name as subject_name, staff.name as teacher_name, sections.section as section_name, exam_groups.name as exam_group, exam_groups.id as exam_group_id, classes.class as class_name,classes.id as class_id_edit, ')->from('generate_paper');

        $this->db->join('subjects', 'subjects.id = generate_paper.subject_id');
        $this->db->join('staff', 'staff.id = generate_paper.teacher_id');
        $this->db->join('sections', 'sections.id = generate_paper.section_id');
        $this->db->join('exam_groups', 'exam_groups.id = generate_paper.exam_group');
        $this->db->join('classes', 'classes.id = generate_paper.class_id');
        if ($id != null) {
            $this->db->where('generate_paper.id', $id);
        } else {
            $this->db->order_by('generate_paper.id');
        }
        if($admin_id !=null){
            $this->db->where('generate_paper.admin_id', $admin_id);
        }
        $query = $this->db->get();
        if ($id != null) {
           return  $query->row();
        } else {
           return  $query->result(); 
        }
    }


	public function addValue($data){
		$this->db->insert('generate_paper',$data);
	}

	 public function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update('generate_paper', $data); 
      
    }

	public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']); 
            $this->db->update('generate_paper', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  generate paper id " . $data['id'];

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

            $this->db->insert('generate_paper', $data);
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On  generate paper id " . $id;

            $action = "Insert";
            $record_id = $id;
            $this->log($message, $record_id, $action);
             echo $this->db->last_query(); die();
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

    public function get_subject($admin_id=null){

    	    $this->db->select('*');
		    $this->db->from('subjects');
		    $this->db->order_by('id','asc');
            if($admin_id !=null){
                $this->db->where('admin_id', $admin_id);
            }
		    $query = $this->db->get();
		    return $query->result();
    }

    public function get_exam_group($admin_id=null){
    		$this->db->select('*');
		    $this->db->from('exam_groups');
		    $this->db->order_by('id','asc');
            if($admin_id !=null){
                $this->db->where('admin_id', $admin_id);
            }
		    $query = $this->db->get();
		    return $query->result();
    }

    public function get_classes($admin_id=null){
    	$this->db->select('*');
    	$this->db->from('classes');
		$this->db->order_by('id','asc');
        if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
		$query = $this->db->get();
		return $query->result();
    }

     public function delete($id) {

     	$this->db->where('id', $id);
      	$this->db->delete('generate_paper'); 
    }

    public function view($id, $admin_id=null){

    	$this->db->select('generate_paper.*,subjects.name as subject_name, staff.name as teacher_name, sections.section as section_name, exam_groups.name as exam_group, exam_groups.id as exam_group_id, classes.class as class_name,classes.id as class_id_edit, ')->from('generate_paper');
        $this->db->join('subjects', 'subjects.id = generate_paper.subject_id');
        $this->db->join('staff', 'staff.id = generate_paper.teacher_id');
        $this->db->join('sections', 'sections.id = generate_paper.section_id');
        $this->db->join('exam_groups', 'exam_groups.id = generate_paper.exam_group');
        $this->db->join('classes', 'classes.id = generate_paper.class_id');
         $this->db->where('generate_paper.id', $id);
         if($admin_id !=null){
            $this->db->where('generate_paper.admin_id', $admin_id);
        }

		$query = $this->db->get();
		return  $query->row();
	
    }


    // get section for class
   public function get_class_section_id($id, $admin_id=null) {

            $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_sections','classes.id=class_sections.class_id');
            $this->db->join('sections','sections.id=class_sections.section_id');
            $this->db->where('class_sections.class_id',$id);
            if($admin_id !=null){
                $this->db->where('classes.admin_id', $admin_id);
            }

            $query = $this->db->get();    
            return $query->result();
    }

    public function  get_class_teacher_id($id,$admin_id=null){

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

   public function objective_questions($id, $admin_id=null){
   		  $this->db->order_by('rand()');
		  $this->db->limit($id);
          if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
		  $query = $this->db->get('questions');
          
		  return $query->result_array();
   }


   public function get_subjective_questions($id, $admin_id=null){
   		$this->db->order_by('rand()');
		  $this->db->limit($id);
          if($admin_id !=null){
            $this->db->where('admin_id', $admin_id);
        }
		  $query = $this->db->get('subjective_questions');
		  return $query->result_array();
   }
	

}

/* End of file Generate_paper_model.php */
/* Location: ./application/models/Generate_paper_model.php */