<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<!-- Content Wrapper. Contains page content -->
<style>
    @media print {
        .feeprint {
            background-color: black !important;
            color:white !important;
            font-size:16px;
            -webkit-print-color-adjust: exact; 
        }

        .scissorsdiv{
            color:black !important;
            width:100% !important;
            -webkit-print-color-adjust: exact; 
        }
        @page :footer {
        display: none
    }

    @page :header {
        display: none
    }

    html, body {
        border: 1px solid white;
        height: 99%;
        page-break-after: avoid;
        page-break-before: avoid;
     }
    
    }
</style>
<div class="content-wrapper">  

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <?php //echo $this->load->view('student/_main_student_sidebar');?>
            <div class="col-md-2">
    <div class="box border0">
        <ul class="tablists"> 
                            <?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                                <li><a href="<?php echo base_url(); ?>student/search" style="<?php echo set_1stLevel('student/search');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_details'); ?></a></li>
                                <?php }?>

                                <?php if ($this->rbac->hasPrivilege('student', 'can_add')) {?>
                                <li><a href="<?php echo base_url(); ?>student/create" style="<?php echo set_1stLevel('student/create');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_admission'); ?></a></li>
                                <?php } ?>
                            
                                <?php if ($this->module_lib->hasActive('online_admission')) {
                                    if ($this->rbac->hasPrivilege('online_admission', 'can_view')) { ?>
                                <li><a href="<?php echo site_url('admin/onlinestudent'); ?>" style="<?php echo set_1stLevel('onlinestudent');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('admission'); ?></a></li>
                                <?php }} ?>

                                <li><a href="<?php echo base_url(); ?>admin/stuattendence" style="<?php echo set_1stLevel('stuattendence/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_attendance'); ?></a></li>

                                <?php if ($this->rbac->hasPrivilege('approve_leave', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/approve_leave" style="<?php echo set_1stLevel('Attendance/approve_leave');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve') . " " . $this->lang->line('leave'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('promote_student', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/stdtransfer" style="<?php echo set_1stLevel('stdtransfer/index');?>"><i class="fa fa-angle-double-right" ></i> <?php echo $this->lang->line('promote_students'); ?></a></li>
                        <?php }?>        
        </ul>
    </div>
</div>
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><?php echo $this->lang->line('student') . " " . $this->lang->line('list') ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="mailbox-messages">
                            <div class="download_label ">
                            <div class="row text" style="width:100%">
                                    <div style="width:15%; float:left" class="col-sm-3 text text-right">                              
                                        <?php $this->userdata = $this->customlib->getuserdata();
                                                 $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                        ?>
                                        <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/admin_logo/<?php echo $stting[0]['admin_logo']?>" alt="Institute's Logo Not Found ">
                                    
                                    </div>
                                    <div style="width:60%; float:left;" class="col-sm-9 text text-left">
                                        <h4 style="margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']?></p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php echo $this->lang->line('online') . " " .$this->lang->line('student')." ".$this->lang->line('admission') ?>
                            </div>
                            </div>
                        </div>
                            <!-- <div class="download_label">
                                <?php echo $this->lang->line('student') . " " . $this->lang->line('list') ?>
                            </div> -->
                            <table class="table table-striped  table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th style="width:5%"><?php echo $this->lang->line('reference_no'); ?></th>
                                        <th><?php echo $this->lang->line('student_name'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('father_name'); ?></th>
                                        <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                        <th><?php echo $this->lang->line('gender'); ?></th>
                                        <th><?php echo $this->lang->line('category'); ?></th>
                                        <th style="width:10%"><?php echo $this->lang->line('student') . " " . $this->lang->line('mobile_no'); ?></th>
                                        <th><?php echo $this->lang->line('enrolled'); ?></th>


                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($studentlist as $student) {
                                        ?>
                                        <tr>
                                            <td><?php echo $student['id']; ?></td>
                                            <td>

                                                <?php
                                                if ($student['is_enroll']) {
                                                    echo $student['firstname'] . " " . $student['lastname'];
                                                } else {
                                                    echo $student['firstname'] . " " . $student['lastname'];
                                                }
                                                ?>  
                                            </td>
                                            <td><?php echo $student['class'] . "(" . $student['section'] . ")" ?></td>
                                            <td><?php echo $student['father_name']; ?></td>
                                            <td><?php
                                                if ($student["dob"] != null) {
                                                    echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob']));
                                                }
                                                ?></td>
                                            <td><?php echo $student['gender']; ?></td>
                                            <td><?php echo $student['category']; ?></td>
                                            <td><?php echo $student['mobileno']; ?></td>
                                            <td><?php echo ($student['is_enroll']) ? "<i class='fa fa-check'></i><span style='display:none'>Yes</span>" : "<i class='fa fa-minus-circle'></i><span style='display:none'>No</span>"; ?></td>


                                            <td class="mailbox-date pull-right">
                                                <?php
                                                if ($student['document'] != "") {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/onlinestudent/download/<?php echo $student['document'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>


                                                <?php
                                                if ($this->rbac->hasprivilege('online_admission', 'can_edit')) {
                                                    if (!$student['is_enroll']) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo site_url('admin/onlinestudent/edit/' . $student['id']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                if ($this->rbac->hasprivilege('online_admission', 'can_delete')) {
                                                    ?>

                                                    <a data-placement="left" href="<?php echo site_url('admin/onlinestudent/delete/' . $student['id']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table><!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->

                </div>
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
