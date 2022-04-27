<?php

/**
 * 
 */
class LeaveTypes extends Admin_Controller {

    function __construct() {

        parent::__construct();

        $this->load->helper('file');
        $this->config->load("payroll");
        $this->userdata = $this->customlib->getUserData();
        $this->load->model('leavetypes_model');
        $this->load->model('staff_model');
    }

    function index() {

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/leavetypes');
        $data["title"] = $this->lang->line('add') . " " . $this->lang->line('leave') . " " . $this->lang->line('type');
        $data['admin_id'] = $this->userdata['admin_id'];
        $LeaveTypes = $this->leavetypes_model->getLeaveType(null, $this->userdata['admin_id']);

        $data["leavetype"] = $LeaveTypes;
        $this->load->view("layout/header");
        $this->load->view("admin/staff/leavetypes", $data);
        $this->load->view("layout/footer");
    }

    function createLeaveType() {

        $data['admin_id'] = $this->userdata['admin_id'];
        $this->form_validation->set_rules(
                'type', $this->lang->line('leave_type'), array('required',
            array('check_exists', array($this->leavetypes_model, 'valid_leave_type'))
                )
        );
        $data["title"] = $this->lang->line('add') . " " . $this->lang->line('leave') . " " . $this->lang->line('type');
        if ($this->form_validation->run()) {

            $type = $this->input->post("type");
            $leavetypeid = $this->input->post("leavetypeid");
            $status = $this->input->post("status");
            if (empty($leavetypeid)) {

                if (!$this->rbac->hasPrivilege('leave_types', 'can_add')) {
                    access_denied();
                }
            } else {

                if (!$this->rbac->hasPrivilege('leave_types', 'can_edit')) {
                    access_denied();
                }
            }

            if (!empty($leavetypeid)) {
                $data = array('admin_id'=>$this->userdata['admin_id'], 'created_by'=>$this->userdata['id'], 'type' => $type, 'is_active' => 'yes', 'id' => $leavetypeid);
            } else {

                $data = array('admin_id'=>$this->userdata['admin_id'], 'created_by'=>$this->userdata['id'], 'type' => $type, 'is_active' => 'yes');
            }
            
            $insert_id = $this->leavetypes_model->addLeaveType($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            redirect("admin/leavetypes");
        } else {

            $LeaveTypes = $this->leavetypes_model->getLeaveType(null, $this->userdata['admin_id']);
            $data["leavetype"] = $LeaveTypes;
            $this->load->view("layout/header");
            $this->load->view("admin/staff/leavetypes", $data);
            $this->load->view("layout/footer");
        }
    }

    function leaveedit($id) {

        $data['admin_id'] = $this->userdata['admin_id'];
        $result = $this->staff_model->getLeaveType($id, $this->userdata['admin_id']);

        $data["title"] = $this->lang->line('edit') . " " . $this->lang->line('leave') . " " . $this->lang->line('type');
        $data["result"] = $result;

        $LeaveTypes = $this->leavetypes_model->getLeaveType(null, $this->userdata['admin_id']);
        $data["leavetype"] = $LeaveTypes;
        $this->load->view("layout/header");
        $this->load->view("admin/staff/leavetypes", $data);
        $this->load->view("layout/footer");
    }

    function leavedelete($id) {

        $this->leavetypes_model->deleteLeaveType($id);
        redirect('admin/leavetypes');
    }

}

?>