<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feemaster extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->userdata = $this->customlib->getUserData();
        $this->sch_setting_detail = $this->setting_model->getSetting($this->userdata['admin_id']);
        $this->current_session = $this->setting_model->getCurrentSession($this->userdata['admin_id']);
    }

    function index() {

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'FEE');
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/feemaster');
        $data['title'] = 'Feemaster List';
        $data['admin_id'] = $this->userdata['admin_id'];
        $feegroup = $this->feegroup_model->get(null, $this->userdata['admin_id']);

        # Set Number of Months to Traverse
        $num_months = 12;
        $currentSessionName = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        $start_year = explode('-', $currentSessionName);
        $start_month = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        //Set Current Month as the 1st
        $current_month = date($start_year[0].'-'.$start_month.'-d', strtotime('+1 month'));
        if($current_month > 0){
            for ($count = 1; $count <= $num_months; $count++) {
                # Fetch Date for each as YYYY-MM-01
                $data['num_of_months'][] = date('F-Y', strtotime($current_month.' + '.$count.' Months'));
            }
        }
        $data['start_month'] = $start_month;
        $data['feegroupList'] = $feegroup;
        $feetype = $this->feetype_model->getIncomAccountHeadByFeeType();
        $data['feetypeList'] = $feetype;

        $feegroup_results = $this->feetype_model->get(null, $this->userdata['admin_id']);
        $data['feetypeLists'] = $feegroup_results;
        
        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup(null, $this->userdata['admin_id']);
        $data['feemasterList'] = $feegroup_result;


        $this->form_validation->set_rules('fee_groups_id', $this->lang->line('feegroup'), 'required');
        //print_r(count($this->input->post('feetype_id')));  die();

        //for ($i= 0; $i < count($this->input->post('feetype_id')); $i++) {

            if ( $this->input->post('feetype_id')[0] == -1 ){
            $this->form_validation->set_rules('feetype_id', $this->lang->line('feetype'), 'trim|required|xss_clean');

            }if ( $this->input->post('amount')[0] == '' ){
                $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
            }
        //}

        

        ///$this->form_validation->set_rules('feetype_id', $this->lang->line('feetype'), 'required');
        //$this->form_validation->set_rules('amount', $this->lang->line('amount'), 'required');

        // $this->form_validation->set_rules( 'fee_groups_id', $this->lang->line('feegroup'), array( 'required',
        //     array('check_exists', array($this->feesessiongroup_model, 'valid_check_exists')))
        // );

        // $data['feetype_id'] = array(1);
        // if(count($this->input->post('feetype_id')) > 0){
        //     $data['feetype_id']    = $this->input->post('feetype_id');
        //     $data['amount']         = $this->input->post('amount');
        // }

        if ($this->form_validation->run() == FALSE) {
       
            
        } else {
            //echo "<pre>"; print_($fee_groups_id); exit;
            //print_r($this->input->post('feetype_id')); die();
            $counter =1;
            for ($i=0; $i < count(array_filter($this->input->post('feetype_id'))); $i++) { 

                $insert_array = array(
                    'admin_id' => $this->userdata['admin_id'],
                    'created_by' => $this->userdata['id'],
                    'fee_groups_id' => $this->input->post('fee_groups_id'),
                    'feetype_id' => $this->input->post('feetype_id')[$i],
                    'amount' => $this->input->post('amount')[$i],
                     'fee_payment_type' => 0,
                    'session_id' => $this->setting_model->getCurrentSession($this->userdata['admin_id']),
                    'fine_type' => $this->input->post('account_type'),
                    'fine_percentage' => '0.00',
                    'fine_amount' => '0.00',
                    'counter' => $counter,
                );
                $counter =0;
                //echo "<pre>"; print_r($insert_array); 
                $feegroup_result = $this->feesessiongroup_model->add($insert_array);

            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
                redirect('admin/feemaster/index');
        }

        $this->load->view('layout/header', $data);
        $this->load->view('admin/feemaster/feemasterList', $data);
        $this->load->view('layout/footer', $data);
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('fees_master', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Fees Master List';
        $this->feegrouptype_model->remove($id);
        redirect('admin/feemaster/index');
    }

    function deletegrp($id) {
        $data['title'] = 'Fees Master List';
        $this->feesessiongroup_model->remove($id);
        redirect('admin/feemaster');
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('fees_master', 'can_edit')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/feemaster');
        $data['id'] = $id;
        $data['admin_id'] = $this->userdata['admin_id'];    
        $feegroup_type = $this->feesessiongroup_model->getFeesByGroup($id, $this->userdata['admin_id']);
        $data['feegroup_type'] = $feegroup_type;
        
        if(!empty($data['feegroup_type'][0]->feetypes)){
            $data['total_rows'] = count($data['feegroup_type'][0]->feetypes)-1;
        }else{
            $data['total_rows'] = 0;
        }

        $feegroup = $this->feegroup_model->get(null, $this->userdata['admin_id']);
        $data['feegroupList'] = $feegroup;
        $feetype = $this->feetype_model->get(null, $this->userdata['admin_id']);
        $data['feetypeList'] = $feetype;

        # Set Number of Months to Traverse
        $num_months = 12;
        $currentSessionName = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        $start_year = explode('-', $currentSessionName);
        $start_month = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        //Set Current Month as the 1st
        $current_month = date($start_year[0].'-'.$start_month.'-d', strtotime('+1 month'));
        for ($count = 1; $count <= $num_months; $count++) {
            # Fetch Date for each as YYYY-MM-01
            $data['num_of_months'][] = date('F-Y', strtotime($current_month.' + '.$count.' Months'));
        }
        $data['start_month'] = $start_month;
        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup(null, $this->userdata['admin_id']);
        $data['feemasterList'] = $feegroup_result;
        
        $this->form_validation->set_rules('fee_groups_id', $this->lang->line('feegroup'), 'required');
        if ( $this->input->post('feetype_id')[0] == -1 ){
            $this->form_validation->set_rules('feetype_id', $this->lang->line('feetype'), 'trim|required|xss_clean');

            }if ( $this->input->post('amount')[0] == '' ){
                $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
            }

        // $this->form_validation->set_rules('feetype_id', $this->lang->line('feetype'), 'required');
        // $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'required');
        // $this->form_validation->set_rules('fee_groups_id', $this->lang->line('feegroup'), array('required',
        //     // array('check_exists', array($this->feesessiongroup_model, 'valid_check_exists'))
        //     )
        // );

        // $this->form_validation->set_rules('fee_groups_id', $this->lang->line('feegroup'), array('required',
        //     array('check_exists', array($this->feesessiongroup_model, 'valid_check_exists')) )
        // );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/feemaster/feemasterEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $update_array = array(
                'id' => $this->input->post('id'),
                'admin_id' => $this->userdata['admin_id'],
                'created_by' => $this->userdata['id'],
                'fee_groups_id' => $this->input->post('fee_groups_id')
            );

            $updated_id = $this->feegrouptype_model->updateFeeSessionGroups($update_array);

            if($updated_id && $this->input->post('fee_groups_id') > 0){

                $this->feegrouptype_model->delete($updated_id, $this->userdata['admin_id']);

                for ($i=0; $i < count(array_filter($this->input->post('feetype_id'))); $i++) { 
                    $insert_array = array(
                        'admin_id' => $this->userdata['admin_id'],
                        'created_by' => $this->userdata['id'],
                        'fee_session_group_id' => $updated_id,
                        'fee_groups_id' => $this->input->post('fee_groups_id'),
                        'feetype_id' => $this->input->post('feetype_id')[$i],
                        'amount' => $this->input->post('amount')[$i],
                        'fee_payment_type' => 0,
                        'session_id' => $this->setting_model->getCurrentSession($this->userdata['admin_id']),
                        'fine_type' => $this->input->post('account_type'),
                        'fine_percentage' => '0.00',
                        'fine_amount' => '0.00',
                    );
                    //print_r($insert_array);
                    $feegroup_result = $this->feegrouptype_model->add($insert_array);
                }
                 
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/feemaster/index');
        }
    }

    function assign($id) {
        if (!$this->rbac->hasPrivilege('fees_group_assign', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Fees Collection');
        $this->session->set_userdata('sub_menu', 'admin/feemaster');
        $data['id'] = $id;
        $data['title'] = 'student fees';
        $class = $this->class_model->get(null, null, $this->userdata['admin_id']);
        $data['classlist'] = $class;
        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup($id, $this->userdata['admin_id']);
        $data['feegroupList'] = $feegroup_result;
        $data['adm_auto_insert'] = $this->sch_setting_detail->adm_auto_insert;
        $data['sch_setting'] = $this->sch_setting_detail;

        # Set Number of Months to Traverse
        $num_months = 12;
        $currentSessionName = $this->setting_model->getCurrentSessionName($this->userdata['admin_id']);
        $start_year = explode('-', $currentSessionName);
        $start_month = $this->setting_model->getStartMonth($this->userdata['admin_id']);
        //Set Current Month as the 1st
        $current_month = date($start_year[0].'-'.$start_month.'-d', strtotime('+1 month'));
        for ($count = 0; $count < $num_months; $count++) {
            # Fetch Date for each as YYYY-MM-01
            $data['num_of_months'][] = date('F-Y', strtotime($current_month.' + '.$count.' Months'));
        }

        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $RTEstatusList = $this->customlib->getRteStatus();
        $data['RTEstatusList'] = $RTEstatusList;

        $category = $this->category_model->get(null, $this->userdata['admin_id']);
        $data['categorylist'] = $category;

        $this->form_validation->set_rules('class_id', $this->lang->line('class_id'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('month_name', $this->lang->line('month_name'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $data['month_name'] = $this->input->post('month_name');
            $data['fee_month'] = $this->input->post('fee_month');
            $data['category_id'] = $this->input->post('category_id');
            $data['gender'] = $this->input->post('gender');
            $data['rte_status'] = $this->input->post('rte');
            $data['class_id'] = $this->input->post('class_id');
            $data['section_id'] = $this->input->post('section_id');
            $this->load->view('layout/header', $data);
            $this->load->view('admin/feemaster/assign', $data);
            $this->load->view('layout/footer', $data);
        } else {    

            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                
                $data['assign_group_id'] = $this->input->post('assign_group_id');
                $data['month_name'] = $this->input->post('month_name');
                $data['fee_month'] = $this->input->post('fee_month');
                $data['category_id'] = $this->input->post('category_id');
                $data['gender'] = $this->input->post('gender');
                $data['rte_status'] = $this->input->post('rte');
                $data['class_id'] = $this->input->post('class_id');
                $data['section_id'] = $this->input->post('section_id');
                
                $resultlist = $this->studentfeemaster_model->searchAssignFeeByClassSection($data['class_id'], $data['section_id'], $id, $data['category_id'], $data['gender'], $data['rte_status'], $data['month_name'], $data['assign_group_id'], $this->userdata['admin_id']);
                $data['resultlist'] = $resultlist;

            }
        }

        
        // if($this->input->post('month_name')!=''){
        //     echo $this->load->view('admin/feemaster/assignfeestudents', $data);
        // }else{

            $this->load->view('layout/header', $data);
            $this->load->view('admin/feemaster/assign', $data);
            $this->load->view('layout/footer', $data);
        //}
        
        
    }

    function addMoreList(){

        $row_id = $this->input->post('row') + 1; 

        $feegroup_results = $this->feetype_model->get(null, $this->userdata['admin_id']);

        $html = '';
        $html.='<div id="fm'.$row_id.'">';
        $html.='<div class="col-md-4"></div>';
        $html.='<div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">'.$this->lang->line('fees_type').'</label><small class="req"> *</small>';

                $html.='<select id="feetype_id" name="feetype_id[]" class="form-control" >';
                    $html.='<option value="">'.$this->lang->line('select').'</option>';
                    
                    foreach ($feegroup_results as $feetype) {    
                        $html.='<option value="'.$feetype['id'].'">'.$feetype['account_number'].' - .'.$feetype['type'].'</option>';
                    }
            
                $html.='</select>';
                $html.='<span class="text-danger">'.form_error('feetype_id').'</span>';
            $html.='</div>';
        $html.='</div>'; 
        $html.='<div class="col-md-3"> 
            <div class="form-group">
                <label for="exampleInputEmail1">'.$this->lang->line('amount').'</label><small class="req"> *</small>
                <input id="amount" name="amount[]" placeholder="" type="text" class="form-control"  value="'.set_value('amount').'" />
                <span class="text-danger">'.form_error('amount').'</span>
            </div>
        </div>';

        $html.='<div class="col-md-1">
            <label for="exampleInputEmail1"></label>
            <div class="form-group">
                <button type="button" data-id="'.$row_id.'" id="add_more'.$row_id.'" class="btn btn-danger pull-right" onclick="remove('.$row_id.')">x</button>
            </div>
        </div>';
        $html.='</div>';

        echo $html;

    }

}

?>