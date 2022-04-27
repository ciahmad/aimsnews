<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chartaccount extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('encoding_lib');
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }
        
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/index');

        $data['title'] = 'Add Account';
        $data['title_list'] = 'Account Details';
        //$listaccount = $this->book_model->listaccount();
        //$data['listaccounts'] = $listaccount;
        $this->load->view('layout/header');
        $this->load->view('admin/account/createaccount', $data);
        $this->load->view('layout/footer');
    }

    public function getall() {


        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');


        $listbook = $this->book_model->getaccount();
        $data['listbook'] = $listbook;

        $this->load->view('layout/header');
        $this->load->view('admin/account/getall', $data);
        $this->load->view('layout/footer');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add Account';
        $data['title_list'] = 'Account Details';
        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$listbook = $this->book_model->listbook();
            //$data['listbook'] = $listbook;
            $this->load->view('layout/header');
            $this->load->view('admin/account/createaccount', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'book_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type' => $this->input->post('account_type'),
            );

            // if (isset($_POST['postdate']) && $_POST['postdate'] != '') {
            //     $data['postdate'] = date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('postdate')));
            // }

            $this->account_model->addaccounts($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/account/index');
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_edit')) {
            access_denied();
        }

        $data['title'] = 'Edit Account';
        $data['title_list'] = 'Account Details';
        $data['id'] = $id;
        $editaccount = $this->account_model->get($id);
        $data['editaccount'] = $editaccount;
        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $getaccount = $this->account_model->getaccount();
            $data['getaccounts'] = $getaccount;
            $this->load->view('layout/header');
            $this->load->view('admin/account/editaccount', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'account_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type' => $this->input->post('account_type'),
                
            );
            // if (isset($_POST['postdate']) && $_POST['postdate'] != '') {
            //     $data['postdate'] = date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('postdate')));
            // } else {
            //     $data['postdate'] = "";
            // }

            $this->account_model->addaccounts($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/account/index');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Accounts List';
        $this->account_model->remove($id);
        redirect('admin/account/getall');
    }

    

}

?>