<div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">                        
                            <?php if ($this->rbac->hasPrivilege('department', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/department/department" style="<?php echo set_1stLevel('admin/department/department'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('department'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('designation', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/designation/designation" style="<?php echo set_1stLevel('admin/designation/designation'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('designation'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff/disablestafflist" style="<?php echo set_1stLevel('HR/staff/disablestafflist'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disabled_staff'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('leave_types', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/leavetypes" style="<?php echo set_1stLevel('admin/leavetypes'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('leave_type'); ?></a></li>
                        <?php  } ?>                    
                    </ul>
                </div>
            </div> 