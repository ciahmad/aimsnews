<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border0 mb0 margesection">
            <div class="box-header with-border themecolor">
                <h3 class="box-title"><i class="fa fa-search"></i>  <?php echo $this->lang->line('lesson_plan') . " " . $this->lang->line('report') ?></h3>
                <a class="btn btn-sm pull-right themecolor" href="<?= base_url('admin/lessonplan/topic')?>"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
            </div>
            <div class="">
                <ul class="reportlists">
                    <?php if ($this->rbac->hasPrivilege('syllabus_status_report', 'can_view')) { ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/lesson_plan/lesson_plan'); ?>"><a href="<?php echo base_url(); ?>report/lesson_plan"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('syllabus') . " " . $this->lang->line('status') . " " . $this->lang->line('report'); ?></a></li>
                        <?php
                    }
                    if ($this->rbac->hasPrivilege('teacher_syllabus_status_report', 'can_view')) {
                        ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/lesson_plan/teachersyllabusstatus'); ?>"><a href="<?php echo base_url(); ?>report/teachersyllabusstatus"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('subject_lesson_plan_report'); ?></a></li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
