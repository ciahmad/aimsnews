<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists">
                <?php if ($this->rbac->hasPrivilege('manage_lesson_plan', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/syllabus" style="<?php echo set_1stLevel('admin/syllabus'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_lesson_plan'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('manage_syllabus_status', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/syllabus/status" style="<?php echo set_1stLevel('admin/lessonplan'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_syllabus_status'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('lesson', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/lessonplan/lesson" style="<?php echo set_1stLevel('admin/lessonplan/lesson'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('lesson'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('topic', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/lessonplan/topic" style="<?php echo set_1stLevel('admin/lessonplan/topic'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('topic'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('manage_lesson_plan', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>report/lesson_plan" style="<?php echo set_1stLevel('Reports/lesson_plan'); ?>" style="<?php echo set_1stLevel('Reports/lesson_plan'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('lesson_plan'); ?> <?php echo $this->lang->line('reports'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('upload_content', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/content" style="<?php echo set_1stLevel('admin/content'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('upload_content'); ?></a></li>
            <?php  } ?>
            <?php  if ($this->module_lib->hasActive('homework')) {?>
                <?php if ($this->rbac->hasPrivilege('homework', 'can_view')) { ?>
                <li><a href="<?php echo base_url(); ?>homework" style="<?php echo set_1stLevel('homework'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_homework'); ?></a></li>
            <?php  } ?>
            <?php } ?>
        </ul>
    </div>
</div>