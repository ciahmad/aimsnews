
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generatepaper extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->config->load('app-config');

        $this->sch_setting_detail = $this->setting_model->getSetting();
        $this->userdata = $this->customlib->getuserdata();
    }


    public function index(){


       if (!$this->rbac->hasPrivilege('generate_paper', 'can_view')) {
            access_denied();
        }
          
        $this->session->set_userdata('menu_heading', 'EXAMINATIONS');
        $this->session->set_userdata('sub_heading', 'Question Bank');
        $this->session->set_userdata('top_menu', 'question');
        $this->session->set_userdata('sub_menu', 'question/generatepaper');
        $data['title'] = 'Generate Paper';

        $generatedpaperslist = $this->generate_paper_model->get(null,$this->userdata['admin_id']);
         $data["generatedpaperslist"] = $generatedpaperslist;


         $subjectlist = $this->generate_paper_model->get_subject($this->userdata['admin_id']);
          $data["subjectlist"] = $subjectlist;

          $exam_groups = $this->generate_paper_model->get_exam_group($this->userdata['admin_id']);
          $data["exam_groups"] = $exam_groups;

          $classes = $this->generate_paper_model->get_classes();
          $data["classes"] = $classes;


        $this->load->view('layout/header', $data);

        $this->load->view('admin/question/genpaper');
        $this->load->view('layout/footer', $data);
    }




    function create() {
        if (!$this->rbac->hasPrivilege('generate_paper', 'can_add')) {
            access_denied();
        }


        $data['title'] = 'Generate Paper';

        $subjectlist = $this->generate_paper_model->get_subject();
          $data["subjectlist"] = $subjectlist;

          $exam_groups = $this->generate_paper_model->get_exam_group();
          $data["exam_groups"] = $exam_groups;

          $classes = $this->generate_paper_model->get_classes();
          $data["classes"] = $classes;
        $this->form_validation->set_rules('subject_id', $this->lang->line('subject'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('exam_group', 'Exam Group', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paper', 'Paper', 'trim|required|xss_clean');
        $this->form_validation->set_rules('time_duration', 'Time Duration', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paper_date', 'Paper Data', 'trim|required|xss_clean');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required|xss_clean');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required|xss_clean');
        $this->form_validation->set_rules('teacher_id', 'Teacher', 'trim|required|xss_clean');
        $this->form_validation->set_rules('start_time', 'Start Time', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end_time', 'End Time', 'trim|required|xss_clean');
        $this->form_validation->set_rules('question_form_objective', 'No of Question From Objective', 'trim|xss_clean');
        $this->form_validation->set_rules('question_from_subjective', 'No of Question From Subjective', 'trim|xss_clean');

        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $data);
            $this->load->view('admin/question/genpaper', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $data = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'subject_id' => $this->input->post('subject_id'),
                'exam_group' => $this->input->post('exam_group'),
                'paper' => $this->input->post('paper'),
                'time_duration' => $this->input->post('time_duration'),
                'paper_date' => $this->input->post('paper_date'),
                 'class_id' => $this->input->post('class_id'),
                'section_id' => $this->input->post('section_id'),
                'teacher_id' => $this->input->post('teacher_id'),
                'question_form_objective' => $this->input->post('question_form_objective'),
                'question_from_subjective' => $this->input->post('question_from_subjective'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time'),
                'insert_img' => $this->input->post('insert_img'),
                'description' => $this->input->post('description'),
            );
          
            $this->generate_paper_model->addValue($data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/generatepaper/index');
        }
    }


        public function getSection(){
         $id = $this->input->post('class_id');
         $section['section'] = $this->generate_paper_model->get_class_section_id($id, $this->userdata['admin_id']);
         
         $section['teacher'] = $this->generate_paper_model->get_class_teacher_id($id, $this->userdata['admin_id']);
        echo json_encode($section);

    }

    function edit($id) {

        if (!$this->rbac->hasPrivilege('generate_paper', 'can_edit')) {
            access_denied();
        }

       // $data['title'] = 'Edit Generate Paper';
        $data['id'] = $id;
      //  print_r($data['id']); die();
        $gpaper = $this->generate_paper_model->get($id, $this->userdata['admin_id']);
        $data["generate_papers"] = $gpaper;
         $subjectlist = $this->generate_paper_model->get_subject($this->userdata['admin_id']);
          $data["subjectlist"] = $subjectlist;

          $exam_groups = $this->generate_paper_model->get_exam_group($this->userdata['admin_id']);
          $data["exam_groups"] = $exam_groups;

          $classes = $this->generate_paper_model->get_classes($this->userdata['admin_id']);
          $data["classes"] = $classes;
        $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/question/genpaper', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
               // 'id' => $id,
                'created_by'=>$this->userdata['id'],
                'exam_group' => $this->input->post('exam_group'),
                'paper' => $this->input->post('paper'),
                'time_duration' => $this->input->post('time_duration'),
                'paper_date' => $this->input->post('paper_date'),
                'class_id' => $this->input->post('class_id'),
                'section_id' => $this->input->post('section_id'),
                'teacher_id' => $this->input->post('teacher_id'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time'),
                'question_form_objective' => $this->input->post('question_form_objective'),
                'question_from_subjective' => $this->input->post('question_from_subjective'),
                'description' => $this->input->post('description'),
            );
            $this->generate_paper_model->update($data,$id);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
           
            redirect('admin/generatepaper');
        }
    }


    function delete($id) {

        if (!$this->rbac->hasPrivilege('generate_paper', 'can_delete')) {
            access_denied();
        }
        if (!empty($id)) {

            $this->generate_paper_model->delete($id);
            $this->session->set_flashdata('msgdelete', '<div class="alert alert-success text-left">' . $this->lang->line('delete_message') . '</div>');
        }
        redirect('admin/generatepaper/');
    }


    public function view($id){
         if (!$this->rbac->hasPrivilege('generate_paper', 'can_view')) {
            access_denied();
        }
        $viewpaper = $this->generate_paper_model->view($id, $this->userdata['admin_id']);
        $data['viewpaper'] = $viewpaper;

        $question_from_obj = $viewpaper->question_form_objective;
        $question_from_subj = $viewpaper->question_from_subjective;
        
        $obj_questions = $this->generate_paper_model->objective_questions($question_from_obj, $this->userdata['admin_id']);
       // print_r($obj_questions); die();
        $data['obj_questions'] = $obj_questions;

         $subjective_questions = $this->generate_paper_model->get_subjective_questions($question_from_subj, $this->userdata['admin_id']);
        //print_r($subjective_questions); die();
        $data['subjective_questions'] = $subjective_questions;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/question/viewpaper', $data);
        $this->load->view('layout/footer', $data);

    }

}


 

/* End of file Generatepaper.php */
/* Location: ./application/controllers/admin/Generatepaper.php */


