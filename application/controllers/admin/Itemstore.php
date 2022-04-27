<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Itemstore extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');

        $this->load->helper('url');
        $this->userdata = $this->customlib->getuserdata();
    }

    function index() {
        if (!$this->rbac->hasPrivilege('store', 'can_view')) {
            access_denied();
        }
       
        $data['title'] = 'Item Store List';
        $itemstore_result = $this->itemstore_model->get('', $this->userdata['admin_id']);
        $data['itemstorelist'] = $itemstore_result;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/itemstore/itemstoreList', $data);
        $this->load->view('layout/footer', $data);
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('store', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Item Store List';
        $this->itemstore_model->remove($id);
        redirect('admin/itemstore/index');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('store', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add Item store';
        $itemstore_result = $this->itemstore_model->get('', $this->userdata['admin_id']);
        $data['itemstorelist'] = $itemstore_result;

        $this->form_validation->set_rules('name', $this->lang->line('item_store_name'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'name'=>form_error('name')
                );
                $array = array('status'=>'fail', 'error'=>$data);
                echo json_encode($array);
        } else {
            $data = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'item_store' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'description' => $this->input->post('description'),
            );
            $this->itemstore_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
           // redirect('admin/itemstore/index');
           $array = array('status'=>'success', 'error'=>'', 'message'=>$this->lang->line('success_message'));
           echo json_encode($array);
        }
    }

    function edit($id) {

        if (!$this->rbac->hasPrivilege('store', 'can_edit')) {
            access_denied();
        }

        $data['title'] = 'Edit Item Store';
        $itemstore_result = $this->itemstore_model->get('', $this->userdata['admin_id']);
        $data['itemstorelist'] = $itemstore_result;
        $data['id'] = $id;
        $store = $this->itemstore_model->get($id,$this->userdata['admin_id']);
        $data['itemstore'] = $store;

        $this->form_validation->set_rules('name', $this->lang->line('item_store_name'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/itemstore/itemstoreEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'created_by'=>$this->userdata['id'],
                'item_store' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'description' => $this->input->post('description'),
            );
            $this->itemstore_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/itemstore/index');
        }
    }

}

?>