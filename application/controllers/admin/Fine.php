<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fine extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getUserData();
    }

    function delete($id) {
        $data['title'] = 'Fine List';
        $this->fine_model->remove($id);
        redirect('admin/fine/index');
    }

    function index() {
        if (!$this->rbac->hasPrivilege('fine', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'FEE');
        $this->session->set_userdata('top_menu', 'Fine Collection');
        $this->session->set_userdata('sub_menu', 'admin/fine');
		
        $fine_result = $this->fine_model->get_fine_accounts_head(null, 'desc', $this->userdata['admin_id']);
        $data['fineList'] = $fine_result;

        $fine_results = $this->fine_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['fine_results'] = $fine_results;
        
        
        //$this->form_validation->set_rules('code', $this->lang->line('discount_code'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/header', $data);
            $this->load->view('admin/fine/fineList', $data);
            $this->load->view('layout/footer', $data);
        } else {
			
			$accounts_title = $this->fine_model->get_accounts_title($this->input->post('name'), $this->userdata['admin_id']);

            $data = array(
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'account_number' => $accounts_title['account_number'],
                'name' => $accounts_title['account_title'],
				'code' => $this->input->post('name'),
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
            );
            //echo "<pre>"; print_r($data); exit;
            $this->fine_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/fine');
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('fine', 'can_edit')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/fine');
        $fine_result = $this->fine_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['fineList'] = $fine_result;
        $data['title'] = 'Edit Fine';
        $data['id'] = $id;

        $finerow = $this->fine_model->get($id, 'desc', $this->userdata['admin_id']);
        //echo "<pre>"; print_r($feediscount); exit;
        $data['finerow'] = $finerow;
        $fine_results = $this->fine_model->get(null, 'desc', $this->userdata['admin_id']);
        $data['fine_results'] = $fine_results;
        
        $this->form_validation->set_rules('name', $this->lang->line('category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/fine/fineEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
			$accounts_title = $this->fine_model->get_accounts_title($this->input->post('name'), $this->userdata['admin_id']);
            $data = array(
                'id' => $id,
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'account_number' => $accounts_title['account_number'],
                'name' => $accounts_title['account_title'],
				'code' => $this->input->post('name'),
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
            );
            $this->fine_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/fine/index');
        }
    }

}

?>