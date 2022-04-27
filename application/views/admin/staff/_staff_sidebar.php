<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists"> 
        <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff" style="<?php echo set_1stLevel('HR/staff');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('staff_directory'); ?></a></li>
                                <?php } ?>
                                <?php
                                    if ($this->rbac->hasPrivilege('staff_attendance', 'can_view')) {
                                        ?>
                                <li><a href="<?php echo base_url(); ?>admin/staffattendance" style="<?php echo set_1stLevel('admin/staffattendance');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('staff_attendance'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('staff_payroll', 'can_view')) {
                                        ?>
                                <li><a href="<?php echo base_url(); ?>admin/payroll" style="<?php echo set_1stLevel('admin/payroll');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('payroll'); ?></a></li>
                                <?php } 
                                if ($this->rbac->hasPrivilege('approve_leave_request', 'can_view')) {
                                        ?>
                                <li><a href="<?php echo base_url(); ?>admin/leaverequest/leaverequest" style="<?php echo set_1stLevel('admin/leaverequest/leaverequest');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve_leave_request'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('apply_leave', 'can_view')) {
                                        ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff/leaverequest" style="<?php echo set_1stLevel('admin/staff/leaverequest');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('apply_leave'); ?></a></li>
                                <?php } ?>
        </ul>
    </div>
</div>