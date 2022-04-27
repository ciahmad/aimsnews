<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Exam_schedule extends Admin_Controller {

    private $sch_current_session = "";

    public function __construct() {
        parent::__construct();
        $this->load->library('encoding_lib');
        $this->exam_type = $this->config->item('exam_type');
        $this->sch_current_session = $this->setting_model->getCurrentSession();

        $this->userdata = $this->customlib->getuserdata();
    }

    public function index() {

        if (!$this->rbac->hasPrivilege('exam_schedual', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'EXAMINATIONS');
        $this->session->set_userdata('sub_heading', 'examschedule');
        $this->session->set_userdata('top_menu', 'Examinations');
        $this->session->set_userdata('sub_menu', 'examinations/examschedule');
        $examgroup_result = $this->examgroup_model->get('',$this->userdata['admin_id']);
        $data['examgrouplist'] = $examgroup_result;

        $this->form_validation->set_rules('exam_group_id', $this->lang->line('exam') . " " . $this->lang->line('group'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('exam_id', $this->lang->line('exam'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            
        } else {

            $id = $_POST['exam_id'];
            $data['examgroupDetail'] = $this->examgroup_model->getExamByID($id, $this->userdata['admin_id']);


            $data['exam_subjects'] = $this->batchsubject_model->getExamSubjects($id,$this->userdata['admin_id'], $this->userdata);

            $class = $this->class_model->get('','',$this->userdata['admin_id']);
            $data['classlist'] = $class;
            $session = $this->session_model->get('',$this->userdata['admin_id']);
            $data['sessionlist'] = $session;
            $data['current_session'] = $this->sch_current_session;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('admin/exam_schedule/exam_schedule', $data);
        $this->load->view('layout/footer', $data);
    }

}

?>