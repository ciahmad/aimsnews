<?php

use Illuminate\Support\Arr;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehroute extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getuserdata();
    }

    function index() {

        if (!$this->rbac->hasPrivilege('assign_vehicle', 'can_view')) {
            access_denied();
        }

       

        $data['title'] = 'Add Vehicle Route';
        $data['title_list'] = 'Recent Vehicle Routes';

       
        $vehicle_result = $this->vehicle_model->get('',$this->userdata['admin_id']);
        $data['vehiclelist'] = $vehicle_result;

        $routeList = $this->route_model->get('', $this->userdata['admin_id']);
        $data['routelist'] = $routeList;

        $vehroute_result = $this->vehroute_model->get('', $this->userdata['admin_id']);
        $data['vehroutelist'] = $vehroute_result;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/vehroute/vehrouteList', $data);
        $this->load->view('layout/footer', $data);
    }

    function create() {

        if (!$this->rbac->hasPrivilege('assign_vehicle', 'can_view')) {
            access_denied();
        }

        // $this->session->set_userdata('menu_heading', 'SETTINGS');
        // $this->session->set_userdata('sub_heading', 'TRANSPORT');
        // $this->session->set_userdata('top_menu', 'Transport');
        // $this->session->set_userdata('sub_menu', 'vehroute/index');

        $data['title'] = 'Add Vehicle Route';
        $data['title_list'] = 'Recent Vehicle Routes';

        $this->form_validation->set_rules(
                'route_id', $this->lang->line('route'), array( 'required',array('route_exists', array($this->vehroute_model, 'route_exists'))
                )
        );
        $this->form_validation->set_rules('vehicle[]', $this->lang->line('vehicle'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'route_id'=>form_error('route_id'),
                'vehicle[]'=>form_error('vehicle[]'),
            );
            $array = array('status'=>'fail', 'error'=>$data);
            echo json_encode($array);
        } else {
            $vehicle = $this->input->post('vehicle');
            $route_id = $this->input->post('route_id');
            $vehicle_batch_array = array();
            foreach ($vehicle as $vec_key => $vec_value) {

                $vehicle_array = array(
                    'admin_id'=>$this->userdata['admin_id'],
                    'created_by'=>$this->userdata['id'],
                    'route_id' => $route_id,
                    'vehicle_id' => $vec_value,
                );

                $vehicle_batch_array[] = $vehicle_array;
            }

            $this->vehroute_model->add($vehicle_batch_array);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
           // redirect('admin/vehroute/index');
           $array = array('status'=>'success','error'=>'','message'=>$this->lang->line());
           echo json_encode($array);
        }

        // $vehicle_result = $this->vehicle_model->get('',$this->userdata['admin_id']);
        // $data['vehiclelist'] = $vehicle_result;


        // $routeList = $this->route_model->get('', $this->userdata['admin_id']);
        // $data['routelist'] = $routeList;
        // $vehroute_result = $this->vehroute_model->get('', $this->userdata['admin_id']);

        // $data['vehroutelist'] = $vehroute_result;

        // $this->load->view('layout/header', $data);
        // $this->load->view('admin/vehroute/vehrouteList', $data);
        // $this->load->view('layout/footer', $data);
    }

    function delete($id) {

        $this->vehroute_model->removeByroute($id);
        redirect('admin/vehroute');
    }

    function edit($id) {


        $data['title'] = 'Edit Fees Master';
        $data['id'] = $id;
        $vehroute = $this->vehroute_model->get($id, $this->userdata['admin_id']);

        $data['vehroute'] = $vehroute;
        $data['title_list'] = 'Fees Master List';

        $this->form_validation->set_rules(
                'route_id', $this->lang->line('route'), array(
            'required',
            array('route_exists', array($this->vehroute_model, 'route_exists'))
                )
        );
        $this->form_validation->set_rules('vehicle[]', $this->lang->line('vehicle'), 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $vehicle_result = $this->vehicle_model->get('',$this->userdata['admin_id']);
            $data['vehiclelist'] = $vehicle_result;
            $routeList = $this->route_model->get('',$this->userdata['admin_id']);
            $data['routelist'] = $routeList;
            $vehroute_result = $this->vehroute_model->get('',$this->userdata['admin_id']);
            $data['vehroutelist'] = $vehroute_result;
            $this->load->view('layout/header', $data);
            $this->load->view('admin/vehroute/vehrouteEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $vehicle = $this->input->post('vehicle');
            $prev_vec_route = $this->input->post('prev_vec_route');
            $pre_route_id = $this->input->post('pre_route_id');
            $route_id = $this->input->post('route_id');

            $add_result = array_diff($vehicle, $prev_vec_route);
            $delete_result = array_diff($prev_vec_route, $vehicle);


            if ($pre_route_id != $route_id) {
                $this->vehroute_model->removeByroute($pre_route_id);
                $vehicle_batch_array = array();
                foreach ($vehicle as $vec_key => $vec_value) {

                    $vehicle_array = array(
                        'created_by'=>$this->userdata['id'],
                        'route_id' => $route_id,
                        'vehicle_id' => $vec_value,
                    );

                    $vehicle_batch_array[] = $vehicle_array;
                }


                $this->vehroute_model->add($vehicle_batch_array);
            } else {

                if (!empty($add_result)) {
                    $vehicle_batch_array = array();
                    foreach ($add_result as $vec_add_key => $vec_add_value) {

                        $vehicle_array = array(
                            'created_by'=>$this->userdata['id'],
                            'route_id' => $pre_route_id,
                            'vehicle_id' => $vec_add_value,
                        );

                        $vehicle_batch_array[] = $vehicle_array;
                    }
                    $this->vehroute_model->add($vehicle_batch_array);
                }

                if (!empty($delete_result)) {
                    $vehicle_delete_array = array();
                    foreach ($delete_result as $vec_delete_key => $vec_delete_value) {

                        $vehicle_delete_array[] = $vec_delete_value;
                    }

                    $this->vehroute_model->remove($pre_route_id, $vehicle_delete_array);
                }
            }



            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/vehroute/index');
        }
    }

}

?>