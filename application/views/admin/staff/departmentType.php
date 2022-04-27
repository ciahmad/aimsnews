<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>

<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <?php $this->load->view('admin/staff/_hr_setup_sidebar');?> 
            <?php if (($this->rbac->hasPrivilege('department', 'can_add')) || ($this->rbac->hasPrivilege('department', 'can_edit'))) {
                ?>     
                <div class="col-md-10">           
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $title; ?></h3>
                        </div> 
                        <form id="form1" action="<?php echo site_url('admin/department/department') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>        
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="type"  name="type" placeholder="" type="text" class="form-control"  value="<?php
                                    if (isset($result)) {
                                        echo $result["department_name"];
                                    }
                                    ?>" />
                                    <span class="text-danger"><?php echo form_error('type'); ?></span>

                                    <input autofocus="" id="type"  name="departmenttypeid" placeholder="" type="hidden" class="form-control"  value="<?php
                                    if (isset($result)) {
                                        echo $result["id"];
                                    }
                                    ?>" />
                                </div>
                                <!--div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('active'); ?> <?php echo $this->lang->line('status'); ?></label>
                                <br/>
                                <label class="radio-inline">
                                     <input type="radio" checked value="yes" <?php
                                if ((isset($result)) && ($result["is_active"] == "yes")) {
                                    echo "checked";
                                }
                                ?> name="status"><?php echo $this->lang->line('yes'); ?>
                                 </label>
                                <label class="radio-inline">
                                <input type="radio" value="no" <?php
                                if ((isset($result)) && ($result["is_active"] == "no")) {
                                    echo "checked";
                                }
                                ?> name="status"><?php echo $this->lang->line('no'); ?>
                            </label>
                              </div-->

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>   
                </div>  
            <?php } ?>
            <div class="col-md-<?php
            if (($this->rbac->hasPrivilege('department', 'can_add')) || ($this->rbac->hasPrivilege('department', 'can_edit'))) {
                echo "12";
            } else {
                echo "12";
            }
            ?>  ">              
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('department'); ?> <?php echo $this->lang->line('list'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages">
                        <div class="download_label">
                                <div class="row text" style="width:100%">
                                    <div style="width:15%; float:left" class="col-sm-3 text text-right">
                                        <?php $this->userdata = $this->customlib->getuserdata();
                                                                            $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                                                        //  echo '<pre>'; print_r($stting); die('setting'); 
                                                                    ?>
                                            <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/logo/<?php echo $stting[0]['image']?>" alt="Institute's Logo Not Found ">
                                    </div>
                                    <div style="width:80%; float:left; padding-top:20px;" class="col-sm-9 text text-left">
                                        <h4 id="school_name" style="margin-bottom:0px; padding-bottom:0px;  font-size:24px; font-weight:600"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px">
                                            <?php echo $stting[0]['address']?>
                                        </p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact #
                                            <?php echo $stting[0]['phone']; ?> Email :
                                                <?php echo $stting[0]['email'];  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:0px; margin-top:0px">
                                    <div class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                    <?php echo $this->lang->line('department'); ?> <?php echo $this->lang->line('list'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                                <?php //echo $this->lang->line('department'); ?> <?php //echo $this->lang->line('list'); ?>
                            </div> -->
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <!--th><?php echo $this->lang->line('active'); ?> <?php echo $this->lang->line('status'); ?></th-->
                                        <th class="text-right no-print" style="float:right !important"><?php echo $this->lang->line('action'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($departmenttype as $value) {
                                        $status = "";

                                        if ($value["is_active"] == "yes") {

                                            $status = "Active";
                                        } else {
                                            $status = "Inactive";
                                        }
                                        ?>
                                        <tr>

                                            <td class="mailbox-name"> <?php echo $value['department_name'] ?></td>
                                            <!--td><?php echo $this->lang->line($value['is_active']) ?></td-->
                                            <td class="mailbox-date pull-right no-print" style="float:right !important">
                                                <?php if ($this->rbac->hasPrivilege('department', 'can_edit')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/department/departmentedit/<?php echo $value['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-edit text-green"></i>
                                                    </a>
                                                <?php } if ($this->rbac->hasPrivilege('department', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/department/departmentdelete/<?php echo $value['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>')";>
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>

