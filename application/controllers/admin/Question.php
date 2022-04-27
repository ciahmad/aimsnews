<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Question extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->config->load('app-config');

        $this->sch_setting_detail = $this->setting_model->getSetting();
        $this->userdata = $this->customlib->getuserdata();
    }

    public function read($id) {

        if (!$this->rbac->hasPrivilege('question_bank', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'EXAMINATIONS');
        $this->session->set_userdata('top_menu', 'Online_Examinations');
        $this->session->set_userdata('sub_menu', 'Online_Examinations/question');
        $question = $this->question_model->get($id);
        $data['question'] = $question;
        $questionOpt = $this->customlib->getQuesOption();
        $data['questionOpt'] = $questionOpt;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/question/read', $data);
        $this->load->view('layout/footer', $data);
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('question_bank', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('menu_heading', 'EXAMINATIONS');
        $this->session->set_userdata('sub_heading', 'Question Bank');
        $this->session->set_userdata('top_menu', 'Online_Examinations');
        $this->session->set_userdata('sub_menu', 'Online_Examinations/question');
        $questionList = $this->question_model->get(null, $this->userdata['admin_id']);
        $data['questionList'] = $questionList;

       

        
        $classesList = $this->question_model->get_classes($this->userdata['admin_id']);
        $data['classesList'] = $classesList; 
        $classesSectionList = $this->question_model->get_class_section(null,$this->userdata['admin_id']);
       $data['classesSectionList'] = $classesSectionList;
       
        $subjectTeacher = $this->question_model->get_subject_teacher($this->userdata['admin_id']);
        $data['subjectTeachers'] = $subjectTeacher;

         $subject_result = $this->subject_model->get(null,$this->userdata['admin_id']);
         $data['subjectlist'] = $subject_result;

        $tableLists = $this->question_model->get_index($this->userdata['admin_id']);
        $data['tableLists'] = $tableLists;

        $questionOpt = $this->customlib->getQuesOption();
        $data['questionOpt'] = $questionOpt;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/question/question', $data);
        $this->load->view('layout/footer', $data);
    }

    public function getQuestionByID() {
       
        $id = $this->input->post('recordid');
        $question_result = $this->question_model->get($id, $this->userdata['admin_id']);
        $question = $this->question_model->getById($id,$this->userdata['admin_id']);
       // echo json_encode($question_result);
        echo json_encode(array('status' => 1, 'result' => $question_result, 'question_result' => $question));
    }

    public function add() {
       // echo 1; die();
      //  echo json_encode($this->input->post('subject_id')); die();
        if (!$this->rbac->hasPrivilege('question_bank', 'can_add')) {
            access_denied();
        }

        $this->form_validation->set_rules('subject_id', $this->lang->line('subject'), 'trim|required|xss_clean');
         //$this->form_validation->set_rules('question', $this->lang->line('question'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('opt_a', $this->lang->line('option_A'), 'trim|xss_clean');
        // $this->form_validation->set_rules('opt_b', $this->lang->line('option_B'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('opt_c', $this->lang->line('option_C'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('opt_d', $this->lang->line('option_D'), 'trim|required|xss_clean');
        // $this->form_validation->set_rules('correct', $this->lang->line('answer'), 'trim|required|xss_clean');

      //   $this->form_validation->set_rules('subject_id', 'subject_id', 'trim|required|xss_clean');
      //   $this->form_validation->set_rules('question', 'question', 'trim|required|xss_clean');
      //   //$this->form_validation->set_rules('opt_a', 'opt_a', 'trim|required|xss_clean');
      //   //$this->form_validation->set_rules('opt_b', 'opt_b', 'trim|required|xss_clean');
      //   //$this->form_validation->set_rules('opt_c', 'opt_c', 'trim|required|xss_clean');
      // //  $this->form_validation->set_rules('opt_d', 'opt_d', 'trim|required|xss_clean');
      //   $this->form_validation->set_rules('correct', 'correct', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {

           
            $msg = array(
                // 'subject_id' => form_error('subject_id'),
                // 'question' => form_error('question'),
                // 'opt_a' => form_error('opt_a'),
                // 'opt_b' => form_error('opt_b'),
                // 'opt_c' => form_error('opt_c'),
                // 'opt_d' => form_error('opt_d'),
                // 'correct' => form_error('correct'),
            );
           // echo json_encode(0); die();
            $array = array('status' => 0, 'error' => $msg, 'message' => '');
        } else {
          
            for($i= 0; $i<count($this->input->post('opt_a')); $i++){
                //echo $this->input->post('opt_a')[$i]; 
                $insert_data = array(
                        'admin_id'=>$this->userdata['admin_id'],
                        'created_by'=>$this->userdata['id'],
                        'question'=> $this->input->post('question')[$i],
                        'question_marks'=> $this->input->post('marks')[$i],
                        'opt_a'=> $this->input->post('opt_a')[$i],
                        'opt_b'=> $this->input->post('opt_b')[$i],
                        'opt_c'=> $this->input->post('opt_c')[$i],
                        'opt_d'=> $this->input->post('opt_d')[$i],
                        'correct'=> $this->input->post('answer')[$i],
                        'paper'=> $this->input->post('paper'),
                        'subject_id'=> $this->input->post('subject_id'),
                        'class_id'=> $this->input->post('class_id'),
                        'section_id'=> $this->input->post('section_id'),
                        'teacher_id'=> $this->input->post('teacher_id'),
                );
                   $id = $this->input->post('recordid');
         
            if ($id != 0) {
                $insert_data['id'] = $id;
            }

            $this->question_model->add($insert_data);
            $array = array('status' => 1, 'error' => '', 'message' => $this->lang->line('success_message'));
                
            }
          
        }

            echo json_encode($array);
    }

    public function getRecord($id) {

        $result = $this->question_model->get_result($id,$this->userdata['admin_id']);
        $result['options'] = $this->question_model->get_option($id);
        $result['ans'] = $this->question_model->get_answer($id);
        echo json_encode($result);
    }

    public function getSection(){
         $id = $this->input->post('class_id');
         $section['section'] = $this->question_model->get_class_section_id($id,$this->userdata['admin_id']);
         
         $section['teacher'] = $this->question_model->get_class_teacher_id($id,$this->userdata['admin_id']);
        echo json_encode($section);

    }

    public function delete($id) {
        if (!$this->rbac->hasPrivilege('question_bank', 'can_delete')) {
            access_denied();
        }
        $this->question_model->remove($id);
        redirect('admin/question', 'refresh');
    }

    public function getimages() {
        $keyword = "";
        $page = $this->input->post('page');
        $keyword = $this->input->post('query');
        $per_page_record = 12;

        if ($page > 1) {
            $start = (($page - 1) * $per_page_record);
            $page = $page;
        } else {
            $start = 0;
        }

        $file_type = "Image";

        $result = $this->cms_media_model->fetch_details($per_page_record, $start, $keyword, $file_type);
        $result_count = $this->cms_media_model->count_all($keyword, $file_type);

        $data['result'] = $result;
        $data['result_count'] = $result_count;
        $data['pagination'] = $this->getpagination($result_count, $per_page_record, $page);

        $page = $this->load->view('admin/question/_getimages', $data, true);
        echo json_encode(array('page' => $page, 'count' => $data['result_count'], 'pagination' => $data['pagination']));
    }

    function getpagination($total_data, $limit, $page) {
        $output = "";
        $output .= '<ul class="pagination">';

        $total_links = ceil($total_data / $limit);
        $previous_link = '';
        $next_link = '';
        $page_link = '';

// echo $total_links;
        $page_array = array();
        if ($total_links > 4) {
            if ($page < 5) {
                for ($count = 1; $count <= 5; $count++) {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            } else {
                $end_limit = $total_links - 5;
                if ($page > $end_limit) {
                    $page_array[] = 1;
                    $page_array[] = '...';
                    for ($count = $end_limit; $count <= $total_links; $count++) {
                        $page_array[] = $count;
                    }
                } else {
                    $page_array[] = 1;
                    $page_array[] = '...';
                    for ($count = $page - 1; $count <= $page + 1; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_links;
                }
            }
        } else {

            for ($count = 1; $count <= $total_links; $count++) {
                $page_array[] = $count;
            }
        }


        for ($count = 0; $count < count($page_array); $count++) {
            if ($page == $page_array[$count]) {
                $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
                } else {
                    $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id >= $total_links) {
                    $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
                } else {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
                }
            } else {
                if ($page_array[$count] == '...') {
                    $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
                } else {
                    $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
                }
            }
        }

        $output .= $previous_link . $page_link . $next_link;
        $output .= '</ul>';

        return $output;
    }

}
