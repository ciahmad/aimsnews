<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">

</style>

<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
             <?php $this->load->view('admin/staff/_hr_setup_sidebar');?> 
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                            </div>
                            <div class="col-md-6 text-right"><a style="float: right; color: #fff" href="<?php echo base_url('admin/department/department');?>"><i class="fa fa-backward"></i>Back</a></div>
                        </div>                        
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?>  <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/staff/disablestafflist') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group"> 
                                                <label><?php echo $this->lang->line("role") ?></label><small class="req"> *</small>
                                                <select name="role" class="form-control">
                                                    <option value=""><?php echo $this->lang->line('select') ?></option>
                                                    <?php foreach ($role as $key => $role_value) {
                                                        ?>
                                                        <option <?php
                                                        if ($search_role == $role_value['type']) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $role_value['id'] ?>"><?php echo $role_value['type'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>  
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm     pull-right checkbox-toggle themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                </div>  
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/staff/disablestafflist') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control"   placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right themecolor btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>  
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($resultlist)) { ?>
                    <div class="nav-tabs-custom theme-shadow">
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line('card'); ?> <?php echo $this->lang->line('view'); ?></a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i> <?php echo $this->lang->line('list'); ?>  <?php echo $this->lang->line('view'); ?></a></li>
                        </ul>
                        <div class="tab-content">
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
                                    <?php echo "Deactive Staff List"; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                               
                            </div> -->
                            <div class="tab-pane  table-responsive no-padding" id="tab_2">
                                <table class="table table-striped table-hover example" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('staff_id'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('role'); ?></th>
                                            <th><?php echo $this->lang->line('department'); ?></th>
                                            <th><?php echo $this->lang->line('designation'); ?></th>
                                            <th><?php echo $this->lang->line('mobile_no'); ?></th>

                                            <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($resultlist)) {
                                            ?>
                                            <tr>
                                                <td colspan="12" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                            </tr> 
                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $staff) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $staff['employee_id']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $staff['id']; ?>"><?php echo $staff['name'] . " " . $staff['surname']; ?>
                                                        </a>
                                                    </td>

                                                    <td><?php echo $staff['user_type']; ?></td>
                                                    <td><?php echo $staff['department']; ?></td>
                                                    <td><?php echo $staff['designation']; ?></td>
                                                    <td><?php echo $staff['contact_no']; ?></td>

                                                    <td class="pull-right" style="float:right !important">
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $staff['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>" >
                                                            <i class="fa fa-eye text-black"></i>
                                                        </a>
                                                        <!-- <a href="<?php echo base_url(); ?>admin/staff/edit/<?php echo $staff['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>                           
                            <div class="tab-pane active" id="tab_1">
                                <div class="mediarow">   
                                    <div class="row">   
                                        <?php if (empty($resultlist)) {
                                            ?>
                                            <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $staff) {
                                                ?>
                                                <div class="col-lg-3 col-md-6 col-sm-6 img_div_modal">
                                                    <div class="staffinfo-box">
                                                        <div class="staffleft-box">
                                                            <?php
                                                            if (!empty($staff["image"])) {
                                                                $image = $staff["image"];
                                                            } else {
                                                                $image = "no_image.png";
                                                            }
                                                            ?>
                                                            <img src="<?php echo base_url() . "uploads/staff_images/" . $image ?>" />
                                                        </div>
                                                        <div class="staffleft-content">
                                                            <h5><span   data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["name"] . " " . $staff["surname"]; ?></span></h5>

                                                            <p><font   data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["employee_id"] ?></font></p>

                                                            <p><font  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["contact_no"] ?></font></p>

                                                            <p><font  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php
                                                                if (!empty($staff["location"])) {
                                                                    echo $staff["location"] . ",";
                                                                }
                                                                ?></font><font  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $staff["department"]; ?></font></p>

                                                            <p class="staffsub" ><span  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["user_type"] ?></span> 

                                                                <span  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["designation"] ?></span></p>
                                                        </div>
                                                        <div class="overlay3">
                                                            <div class="stafficons">

                                                                <a title="<?php echo $this->lang->line('show'); ?>" href="<?php echo base_url() . "admin/staff/profile/" . $staff["id"] ?>"><i class="fa fa-navicon"></i></a>
                                                                    <?php if ($this->rbac->hasPrivilege('staff', 'can_edit')) { ?>
                                                                    <a title="<?php echo $this->lang->line('edit'); ?>" href="<?php echo base_url() . "admin/staff/edit/" . $staff["id"] ?>"><i class=" fa fa-pencil"></i></a> 
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--./col-md-3-->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div><!--./col-md-3-->
                                </div><!--./row-->  
                            </div><!--./mediarow-->  
                        </div>                                                          
                    </div> 
                    <?php } ?>                                                         
                </div>
            </div>
        </div>
</section>
</div>
