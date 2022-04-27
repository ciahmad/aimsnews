<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feetype extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getUserData();
    }

    function index() {
        if (!$this->rbac->hasPrivilege('fees_type', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'FEE');
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'feetype/index');
        $data['title'] = 'Add Feetype';
        $data['title_list'] = 'Recent FeeType';
        $data['admin_id'] = $this->userdata['admin_id'];
        $this->form_validation->set_rules( 'name', $this->lang->line('name'), array('required',
            array('check_exists', array($this->feetype_model, 'check_exists'))
                )
        );
        $this->form_validation->set_rules('description', $this->lang->line('description'), 'required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
			
			$fee_type_name = $this->feetype_model->get_accounts_head($this->input->post('name'), $this->userdata['admin_id']);
			
            $data = array(
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'account_number' => $fee_type_name['account_number'],
                'type' => $fee_type_name['account_title'],
				'code' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            );
            //echo "<pre>"; print_r($data);
            $this->feetype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/feetype/index');
        }
        $feegroup_result = $this->feetype_model->get_accounts_head(null, $this->userdata['admin_id']);
        $data['feetypeList'] = $feegroup_result;
        
        $feegroup_results = $this->feetype_model->get(null, $this->userdata['admin_id']);
        $data['feetypeLists'] = $feegroup_results;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/feetype/feetypeList', $data);
        $this->load->view('layout/footer', $data);
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('fees_type', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Fees Master List';
        $this->feetype_model->remove($id, $this->userdata['admin_id']);
        redirect('admin/feetype/index');
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('fees_type', 'can_edit')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'feetype/index');
        $data['id'] = $id;
		$data['admin_id'] = $this->userdata['admin_id'];
        $feetype = $this->feetype_model->get($id, $this->userdata['admin_id']);
        $data['feetype'] = $feetype;
		
        $feegroup_results = $this->feetype_model->get(null, $this->userdata['admin_id']);
        $data['feetypeLists'] = $feegroup_results;
        
        $feegroup_result1 = $this->feetype_model->get_accounts_head(null, $this->userdata['admin_id']);
        $data['feetypeList'] = $feegroup_result1;
        
        $this->form_validation->set_rules('name', $this->lang->line('name'), array('required',
            array('check_exists', array($this->feetype_model, 'check_exists')))
        );
        //$this->form_validation->set_rules('code', $this->lang->line('code'), 'required');
        if ($this->form_validation->run() == FALSE) {            $this->load->view('layout/header', $data);
            $this->load->view('admin/feetype/feetypeEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
			
			$fee_type_name = $this->feetype_model->get_accounts_head($this->input->post('name'), $this->userdata['admin_id']);
			
            $data = array(
                'id' => $id,
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'account_number' => $fee_type_name['account_number'],
                'type' => $fee_type_name['account_title'],
				'code' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            );
            $this->feetype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/feetype/index');
        }
    }

}

?>