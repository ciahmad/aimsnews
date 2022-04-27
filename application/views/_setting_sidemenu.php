<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists">

            <?php if ($this->rbac->hasPrivilege('general_setting', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>schsettings" style="<?php echo set_1stLevel('schsettings/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('general_settings'); ?></a></li>
                        <?php }?>

                        <?php if ($this->rbac->hasPrivilege('session_setting', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>sessions" style="<?php echo set_1stLevel('sessions/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('session_setting'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('notification_setting', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/notification/setting" style="<?php echo set_1stLevel('notification/setting');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notification_setting'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('sms_setting', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>smsconfig" style="<?php echo set_1stLevel('smsconfig/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('sms_setting'); ?></a></li>
                        <?php }?>
                       <?php if ($this->rbac->hasPrivilege('email_setting', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>emailconfig" style="<?php echo set_1stLevel('emailconfig/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('email_setting'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('payment_methods', 'can_view')) {?>
                        <li ><a href="<?php echo base_url(); ?>admin/paymentsettings" style="<?php echo set_1stLevel('admin/paymentsettings'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('payment_methods'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('user_status', 'can_view')) {?>
                        <li ><a href="<?php echo base_url(); ?>admin/users" style="<?php echo set_1stLevel('users/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('users'); ?></a></li>
                        <?php }?>

                        <?php if ($this->rbac->hasPrivilege('superadmin')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/module" style="<?php echo set_1stLevel('System Settings/module'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('modules'); ?></a></li>
                        <?php } ?>

                        <?php if ($this->rbac->hasPrivilege('backup', 'can_view')) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/admin/backup" style="<?php echo set_1stLevel('admin/backup'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('backup / restore'); ?></a></li>
                               
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('languages', 'can_add')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/language" style="<?php echo set_1stLevel('language/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('languages'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('updater', 'can_view')) {?>
                        <li ><a href="<?php echo base_url(); ?>admin/updater" style="<?php echo set_1stLevel('System Settings/updater'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('system_update') ?></a></li>
                        <?php }?>
                        <!-- <?php if ($this->rbac->hasPrivilege('module', 'can_view')) {?>
                        <li class="<?php echo set_1stLevel('System Settings/module'); ?>"><a href="<?php echo base_url(); ?>admin/module"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('modules'); ?></a></li>
                        <?php }?> -->
                        <?php if ($this->rbac->hasPrivilege('custom_fields', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/customfield" style="<?php echo set_1stLevel('System Settings/customfield'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('custom') . " " . $this->lang->line('fields'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('system_fields', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/systemfield"  style="<?php echo set_1stLevel('System Settings/systemfield'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('system') . " " . $this->lang->line('fields'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('student_profile_update', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>student/profilesetting" style="<?php echo set_1stLevel('System Settings/profilesetting'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student') . " " . $this->lang->line('profile') . " " . $this->lang->line('update'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('user_log', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/userlog" style="<?php echo set_1stLevel('Reports/userlog'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('user_log'); ?></a></li>
                        <?php  } ?>
                        <?php if ($this->rbac->hasPrivilege('audit_trail_report', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/audit" style="<?php echo set_1stLevel('audit/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('audit') . " " . $this->lang->line('trail') . " " . $this->lang->line('reports'); ?></a>
                        </li>
                        <?php  } ?>

            
        <!-- <li><a href="<?php echo base_url(); ?>admin/member" style="<?php echo set_1stLevel('book/getall'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('book_list'); ?></a></li>
            <?php if ($this->rbac->hasPrivilege('issue_return', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/member" style="<?php echo set_1stLevel('member/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('issue_return'); ?></a></li>
            <?php } ?>
            <?php if ($this->rbac->hasPrivilege('add_student', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/member/student" style="<?php echo set_1stLevel('member/student'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_student'); ?></a></li>
            <?php } ?>
             <?php if ($this->rbac->hasPrivilege('add_staff_member', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/member/teacher"  style="<?php echo set_1stLevel('Library/member/teacher'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_staff_member'); ?></a></li>
            <?php } ?>

            <li class="<?php echo set_Submenu('Reports/library'); ?>"><a href="<?php echo base_url(); ?>report/library"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('library'); ?> <?php echo $this->lang->line('reports'); ?></a></li>     -->                 
        </ul>
    </div>
</div>