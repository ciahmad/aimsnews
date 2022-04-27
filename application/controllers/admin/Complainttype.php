<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complainttype extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("ComplaintType_model");
        $this->userdata = $this->customlib->getuserdata();
    }

    function index() {
        // if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
        //     access_denied();
        // }
      
            $data['complaint_type_list'] = $this->ComplaintType_model->get('complaint_type', null, $this->userdata['admin_id']);
            $this->load->view('layout/header');
            $this->load->view('admin/frontoffice/complainttypeview', $data);
            $this->load->view('layout/footer');
    }


    function add_complain_type() {
        // if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
        //     access_denied();
        // }
        $this->form_validation->set_rules('complain_type', $this->lang->line('complain_type'), 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'complain_type' => form_error('complain_type'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            $complaint_type = array(
                'admin_id'=> $this->userdata['admin_id'], 
                'created_by'=> $this->userdata['id'], 
                'complaint_type' => $this->input->post('complain_type'),
                'description' => $this->input->post('description')
            );
            $this->ComplaintType_model->add('complaint_type', $complaint_type);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            echo json_encode($array);
        }
    }

    function editcomplainttype($complainttype_id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
            access_denied();
        }
        $this->form_validation->set_rules('complaint_type', $this->lang->line('complaint_type'), 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['complaint_type_list'] = $this->ComplaintType_model->get('complaint_type');
            $data['complaint_type_data'] = $this->ComplaintType_model->get('complaint_type', $complainttype_id);

            $this->load->view('layout/header');
            $this->load->view('admin/frontoffice/complainttypeeditview', $data);
            $this->load->view('layout/footer');
        } else {

            $complaint_type = array(
                'created_by'=> $this->userdata['id'], 
                'complaint_type' => $this->input->post('complaint_type'),
                'description' => $this->input->post('description')
            );
            $this->ComplaintType_model->update('complaint_type', $complainttype_id, $complaint_type);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">
                ' . $this->lang->line('update_message') . '</div>');
            redirect('admin/complainttype');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_delete')) {
            access_denied();
        }
        $this->ComplaintType_model->delete('complaint_type', $id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('delete_message') . '</div>');
        redirect('admin/complainttype');
    }

}
