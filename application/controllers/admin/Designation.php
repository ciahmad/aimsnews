<?php

/**
 * 
 */
class Designation extends Admin_Controller {

    function __construct() {

        parent::__construct();

        $this->load->helper('file');
        $this->config->load("payroll");

        $this->load->model('designation_model');
        $this->load->model('staff_model');
    }

    function designation() {

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/designation/designation');
        $userdata = $this->customlib->getUserData();
        $designation = $this->designation_model->get(null, $userdata['admin_id']);
        $data["title"] = $this->lang->line('add') . " " . $this->lang->line('designation');
        $data["designation"] = $designation;
        $this->form_validation->set_rules(
                'type', $this->lang->line('name'), array('required',
            array('check_exists', array($this->designation_model, 'valid_designation'))
                )
        );
        if ($this->form_validation->run()) {

            $type = $this->input->post("type");
            $designationid = $this->input->post("designationid");
            $status = $this->input->post("status");
            if (empty($designationid)) {

                if (!$this->rbac->hasPrivilege('designation', 'can_add')) {
                    access_denied();
                }
            } else {

                if (!$this->rbac->hasPrivilege('designation', 'can_edit')) {
                    access_denied();
                }
            }

            if (!empty($designationid)) {
                $data = array('admin_id' => $userdata['admin_id'], 'created_by' => $userdata['id'], 'designation' => $type, 'is_active' => 'yes', 'id' => $designationid);
            } else {

                $data = array('admin_id' => $userdata['admin_id'], 'created_by' => $userdata['id'], 'designation' => $type, 'is_active' => 'yes');
            }
            $insert_id = $this->designation_model->addDesignation($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            redirect("admin/designation/designation");
        } else {

            $this->load->view("layout/header");
            $this->load->view("admin/staff/designation", $data);
            $this->load->view("layout/footer");
        }
    }

    function designationedit($id) {
        $userdata = $this->customlib->getUserData();
        $result = $this->designation_model->get($id, $userdata['admin_id']);
        $data["title"] = $this->lang->line('edit') . " " . $this->lang->line('designation');
        $data["result"] = $result;

        $designation = $this->designation_model->get(null,$userdata['admin_id']);
        $data["designation"] = $designation;
        $this->load->view("layout/header");
        $this->load->view("admin/staff/designation", $data);
        $this->load->view("layout/footer");
    }

    function designationdelete($id) {
        $userdata = $this->customlib->getUserData();
        $this->designation_model->deleteDesignation($id, $userdata['admin_id']);
        redirect('admin/designation/designation');
    }

}

?>