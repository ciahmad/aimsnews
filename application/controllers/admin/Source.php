<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Source extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model("source_model");
        $this->userdata = $this->customlib->getuserdata();
    }

    function index() {
        $data['source_list'] = $this->source_model->source_list('',$this->userdata['admin_id']);
        $this->load->view('layout/header');
        $this->load->view('admin/frontoffice/sourceview', $data);
        $this->load->view('layout/footer');       
    }

    function add_source() {
        // if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
        //     access_denied();
        // }
        $this->form_validation->set_rules('source', $this->lang->line('source'), 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'source' => form_error('source'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {

            $source = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'source' => $this->input->post('source'),
                'description' => $this->input->post('description')
            );
            $this->source_model->add($source);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');            
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            echo json_encode($array);
        }
    }


    function edit($source_id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
            access_denied();
        }
        $this->form_validation->set_rules('source', $this->lang->line('source'), 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['source_list'] = $this->source_model->source_list('',$this->userdata['admin_id']);
            $data['source_data'] = $this->source_model->source_list($source_id,$this->userdata['admin_id']);
            $this->load->view('layout/header');
            $this->load->view('admin/frontoffice/sourceeditview', $data);
            $this->load->view('layout/footer');
        } else {

            $source = array(
                'created_by'=>$this->userdata['id'],
                'source' => $this->input->post('source'),
                'description' => $this->input->post('description')
            );
            $this->source_model->update($source_id, $source);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/source');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_delete')) {
            access_denied();
        }
        $this->source_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/source');
    }

}
