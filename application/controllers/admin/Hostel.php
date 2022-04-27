<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostel extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Customlib');
        $this->userdata = $this->customlib->getuserdata();
    }

    public function index() {

        $listhostel = $this->hostel_model->listhostel($this->userdata['admin_id']);
        $data['listhostel'] = $listhostel;
        $ght = $this->customlib->getHostaltype();
        $data['ght'] = $ght;
        $this->load->view('layout/header');
        $this->load->view('admin/hostel/createhostel', $data);
        $this->load->view('layout/footer');
    }

    // public function index() {

    //     if (!$this->rbac->hasPrivilege('hostel', 'can_view')) {
    //         access_denied();
    //     }

    //     $this->session->set_userdata('menu_heading', 'REPORTS');
    //     $this->session->set_userdata('sub_heading', 'HOSTEL');
    //     $this->session->set_userdata('top_menu', 'Hostel');
    //     $this->session->set_userdata('sub_menu', 'hostel/index');
    //     $listhostel = $this->hostel_model->listhostel($this->userdata['admin_id']);
    //     $data['listhostel'] = $listhostel;
    //     $ght = $this->customlib->getHostaltype();
    //     $data['ght'] = $ght;
    //     $this->load->view('layout/header');
    //     $this->load->view('admin/hostel/createhostel', $data);
    //     $this->load->view('layout/footer');
    // }

    function create() {
        // if (!$this->rbac->hasPrivilege('hostel', 'can_add')) {
        //     access_denied();
        // }

        $data['title'] = 'Add Library';
        $this->form_validation->set_rules('hostel_name', $this->lang->line('hostel_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
          $data = array(
                'hostel_name'=>form_error('hostel_name'),
                'type'=>form_error('type'));
                $array = array('status'=>'fail','error'=>$data);
                echo json_encode($array);
        } else {
            $data = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'hostel_name' => $this->input->post('hostel_name'),
                'type' => $this->input->post('type'),
                'address' => $this->input->post('address'),
                'intake' => $this->input->post('intake'),
                'description' => $this->input->post('description')
            );
            $this->hostel_model->addhostel($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            echo json_encode($array);
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('hostel', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Add Hostel';
        $data['id'] = $id;
        $edithostel = $this->hostel_model->get($id, $this->userdata['admin_id']);
        $data['edithostel'] = $edithostel;
        $ght = $this->customlib->getHostaltype();
        $data['ght'] = $ght;
        $this->form_validation->set_rules('hostel_name', $this->lang->line('hostel_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $listhostel = $this->hostel_model->listhostel($this->userdata['admin_id']);
            $data['listhostel'] = $listhostel;
            $this->load->view('layout/header');
            $this->load->view('admin/hostel/edithostel', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'created_by'=>$this->userdata['id'],
                'id' => $this->input->post('id'),
                'hostel_name' => $this->input->post('hostel_name'),
                'type' => $this->input->post('type'),
                'address' => $this->input->post('address'),
                'intake' => $this->input->post('intake'),
                'description' => $this->input->post('description')
            );
            $this->hostel_model->addhostel($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/hostel/index');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('hostel', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Fees Master List';
        $this->hostel_model->remove($id);
        redirect('admin/hostel/index');
    }

}
