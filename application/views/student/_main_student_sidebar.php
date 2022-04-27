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