<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitorspurpose extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model("visitors_purpose_model");
        $this->userdata = $this->customlib->getuserdata();
    }

    function index() {
        // if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
        //     access_denied();
        // }

        $data['visitors_purpose_list'] = $this->visitors_purpose_model->visitors_purpose_list('',$this->userdata['admin_id']);

        $this->load->view('layout/header');
        $this->load->view('admin/frontoffice/visitorspurposeview', $data);
        $this->load->view('layout/footer');
    }

    function add_purpose() {
        // if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
        //     access_denied();
        // }

        // $this->session->set_userdata('menu_heading', 'front_office');
        // $this->session->set_userdata('top_menu', 'front_office');
        // $this->session->set_userdata('sub_menu', 'admin/visitorspurpose');
        $this->form_validation->set_rules('visitors_purpose', $this->lang->line('visitors_purpose'), 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'visitors_purpose' => form_error('visitors_purpose'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {

            $visitors_purpose = array(
                'admin_id' =>$this->userdata['admin_id'],
                'created_by' =>$this->userdata['id'],
                'visitors_purpose' => $this->input->post('visitors_purpose'),
                'description' => $this->input->post('description')
            );
            $this->visitors_purpose_model->add($visitors_purpose);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            echo json_encode($array);
        }
    }

    function edit($visitors_purpose_id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
            access_denied();
        }
        $this->form_validation->set_rules('visitors_purpose', $this->lang->line('visitors_purpose'), 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['visitors_purpose_list'] = $this->visitors_purpose_model->visitors_purpose_list('',$this->userdata['admin_id']);
            $data['visitors_purpose_data'] = $this->visitors_purpose_model->visitors_purpose_list($visitors_purpose_id,$this->userdata['admin_id']);
            $this->load->view('layout/header');
            $this->load->view('admin/frontoffice/visitorspurposeeditview', $data);
            $this->load->view('layout/footer');
        } else {

            $visitors_purpose = array(
                'created_by' =>$this->userdata['id'],
                'visitors_purpose' => $this->input->post('visitors_purpose'),
                'description' => $this->input->post('description')
            );
            $this->visitors_purpose_model->update($visitors_purpose_id, $visitors_purpose);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/visitorspurpose');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_delete')) {
            access_denied();
        }
        $this->visitors_purpose_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/visitorspurpose');
    }

}
