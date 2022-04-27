<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends Admin_Controller {

    private $perm_category = array();

    function __construct() {
        parent::__construct();
        $this->load->config('mailsms');
        $this->userdata = $this->customlib->getUserData();
        $this->perm_category = $this->config->item('perm_category');
    }

    function index() {
        if (!$this->rbac->hasPrivilege('superadmin', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add Role';

        //$this->session->set_userdata('top_menu', 'System Settings');
        $this->session->set_userdata('menu_heading', 'SUPERADMIN');
        $this->session->set_userdata('sub_heading', 'HUMAN RESOURCE');
        $this->session->set_userdata('sub_menu', 'admin/roles');
        $data['admin_id'] = $this->userdata['admin_id'];
        $this->form_validation->set_rules('name', $this->lang->line('name'), array('required',array('check_exists', array($this->role_model, 'valid_check_exists')))
        );
        if ($this->form_validation->run() == FALSE) {
            $listroute = $this->role_model->get();
            //print_r($listroute); die();
            $data['listroute'] = $listroute;
            $this->load->view('layout/header');
            $this->load->view('admin/roles/create', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'name' => $this->input->post('name')
            );
            $this->role_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/roles');
        }
    }

    function permission($id) {
        $data['title'] = 'Add Role';
        $data['id'] = $id;
        $role = $this->role_model->get($id);

        $data['role'] = $role;
        //print_r($this->userdata); die();
        if($this->userdata['id']==1 && $this->userdata['role_id'] ==7){
            $role_permission = $this->role_model->find($role['id']);
            $data['role_permission'] = $role_permission;
        }else{
            $assigned_modules = $this->role_model->getAdminAssignedModules($role['id'], $this->userdata['admin_id']);
            $data['role_permission'] = $assigned_modules;
        }
        
        //print_r($data['role_permission']); die();

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            if( $this->input->post('save') == 'savemodule'){

                $this->form_validation->set_rules('name', $this->lang->line('module_name'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('short_code', $this->lang->line('module_short_code'), 'trim|required|xss_clean');

                if ($this->form_validation->run() == FALSE) {
                    $data['id'] = $id;
                    $role = $this->role_model->get($id);
                    $data['role'] = $role;
                    $role_permission = $this->role_model->find($role['id']);
                    $data['role_permission'] = $role_permission;   
                    $this->load->view('layout/header');
                    $this->load->view('admin/roles/allotmodule', $data);
                    $this->load->view('layout/footer');
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'short_code' => $this->input->post('short_code'),
                        'is_active' => 1,
                    );
                    $this->role_model->addModule($data);
                    
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
                    redirect('admin/roles/permission/' . $id);
                }

            }else{

                $per_cat_post = $this->input->post('per_cat');
                $role_id = $this->input->post('role_id');
                $to_be_insert = array();
                $to_be_update = array();
                $to_be_delete = array();
                foreach ($per_cat_post as $per_cat_post_key => $per_cat_post_value) {
                    $insert_data = array();
                    $ar = array();
                    foreach ($this->perm_category as $per_key => $per_value) {
                        $chk_val = $this->input->post($per_value . "-perm_" . $per_cat_post_value);

                        if (isset($chk_val)) {
                            $insert_data[$per_value] = 1;
                        } else {
                            $ar[$per_value] = 0;
                        }
                    }

                    $prev_id = $this->input->post('roles_permissions_id_' . $per_cat_post_value);
                    if ($prev_id != 0) {

                        if (!empty($insert_data)) {
                            $insert_data['admin_id']= $this->userdata['admin_id'];
                            $insert_data['created_by']= $this->userdata['id'];
                            $insert_data['id'] = $prev_id;
                            $to_be_update[] = array_merge($ar, $insert_data);
                        } else {
                            //$to_be_delete['admin_id']= $this->userdata['admin_id'];
                            //$to_be_delete['created_by']= $this->userdata['id'];
                            $to_be_delete[] = $prev_id;
                        }
                    } elseif (!empty($insert_data)) {
                        $insert_data['admin_id']= $this->userdata['admin_id'];
                        $insert_data['created_by']= $this->userdata['id'];
                        $insert_data['role_id'] = $role_id;
                        $insert_data['perm_cat_id'] = $per_cat_post_value;
                        $to_be_insert[] = array_merge($ar, $insert_data);
                    }
                }
                //print_r($to_be_update); die();
                $this->role_model->getInsertBatch($role_id, $to_be_insert, $to_be_update, $to_be_delete, $this->userdata['admin_id']);
                redirect('admin/roles/permission/' . $id);

            }
        }

        $this->load->view('layout/header');
        $this->load->view('admin/roles/allotmodule', $data);
        $this->load->view('layout/footer');
    }

    function edit($id) {
        $data['title'] = 'Edit Role';
        $data['id'] = $id;
        $editrole = $this->role_model->get($id);
        $data['editrole'] = $editrole;
        $data['name'] = $editrole["name"];
        $data['admin_id'] = $this->userdata['admin_id'];
        $this->form_validation->set_rules('name', $this->lang->line('name'), array('required', array('check_exists', array($this->role_model, 'valid_check_exists')))
        );
        if ($this->form_validation->run() == FALSE) {
            $listroute = $this->role_model->get();
            $data['listroute'] = $listroute;
            $this->load->view('layout/header');
            $this->load->view('admin/roles/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'id' => $id,
                'admin_id'=>$this->userdata['admin_id'],
                'created_by'=>$this->userdata['id'],
                'name' => $this->input->post('name')
            );
            $this->role_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/roles/index');
        }
    }

    function delete($id) {
        $data['title'] = 'Fees Master List';
        $this->role_model->remove($id);
        redirect('admin/roles/index');
    }

}

?>