<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeGroup extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getUserData();
    }

    function index() {
        if (!$this->rbac->hasPrivilege('fees_group', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/feegroup');
        $data['title'] = 'Add FeeGroup';
        $data['title_list'] = 'Recent FeeGroups';
        $data['admin_id'] = $this->userdata['admin_id'];
        $this->form_validation->set_rules('name', $this->lang->line('name'), array('required',array('check_exists', array($this->feegroup_model, 'check_exists')))
        );
        if ($this->form_validation->run() == FALSE) {
            
        } else {
			
			$class_name = $this->class_model->getAll($this->input->post('name'), $this->userdata['admin_id']);
			$data = array(
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'class_id' => $this->input->post('name'),
				'name' => $class_name['class'],
                'description' => $this->input->post('description'),
            );
            $this->feegroup_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/feegroup/index');
        }
        $feegroup_result = $this->feegroup_model->get_classes(null, $this->userdata['admin_id']);
        $data['feegroupList'] = $feegroup_result;
        $feegroup_results = $this->feegroup_model->get_classes_group(null, $this->userdata['admin_id']);
		//echo "<pre>"; print_r($feegroup_results); exit;
        $data['feegroupListsNew'] = $feegroup_results;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/feegroup/feegroupList', $data);
        $this->load->view('layout/footer', $data);
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('fees_group', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Fees Master List';
        $this->feegroup_model->remove($id);
        redirect('admin/feegroup/index');
    }

    function edit($id) {
        
        if (!$this->rbac->hasPrivilege('fees_group', 'can_edit')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/feegroup');
        $data['admin_id'] = $this->userdata['admin_id'];
        $data['id'] = $id;
        $feegroup = $this->feegroup_model->get($id, $this->userdata['admin_id']);
        $data['feegroup'] = $feegroup;
        
        $feegroup_result = $this->feegroup_model->get(null, $this->userdata['admin_id']);
        $data['feegroupList'] = $feegroup_result;
        
        $feegroup_results = $this->feegroup_model->get_classes(null, $this->userdata['admin_id']);
        $data['feegroupLists'] = $feegroup_results;
         
        $this->form_validation->set_rules('description', $this->lang->line('name'), array('required', array('check_exists', array($this->feegroup_model, 'check_exists')))
        );
		
        if ($this->form_validation->run() == FALSE) {
			
            $this->load->view('layout/header', $data);
            $this->load->view('admin/feegroup/feegroupEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
			
			$class_name = $this->class_model->getAll($this->input->post('name'), $this->userdata['admin_id']);
            $data = array(
                'id' => $id,
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'class_id' => $this->input->post('name'),
				'name' => $class_name['class'],
                'description' => $this->input->post('description'),
            );
            
            $this->feegroup_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/feegroup/index');
        }}

}

?>