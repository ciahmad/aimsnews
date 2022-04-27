<div class="content-wrapper">   
    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> <?php echo $this->lang->line('academics'); ?> <small><?php echo $this->lang->line('student_fees1'); ?></small>        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-2">
            <div class="box border0">
                    <ul class="tablists"> 
                            <?php if ($this->rbac->hasPrivilege('section', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>sections" style="<?php echo set_1stLevel('sections/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('sections'); ?></a></li>
                                    <?php  } ?>
                                    <?php if ($this->rbac->hasPrivilege('class', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>classes" style="<?php echo set_1stLevel('classes/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('class'); ?></a></li>
                                    <?php  } ?>
                                    <?php  if ($this->rbac->hasPrivilege('subject', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/subject" style="<?php echo set_1stLevel('Academics/subject'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('subjects'); ?></a></li>
                                    <?php  } ?>
                                    
                                    <?php if ($this->rbac->hasPrivilege('subject_group', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url('admin/subjectgroup'); ?>" style="<?php echo set_1stLevel('subjectgroup/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('subject') . " " . $this->lang->line('group') ?></a></li>
                                    <?php  } ?>
                                    <?php if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/teacher/assign_class_teacher" style="<?php echo set_1stLevel('admin/teacher/assign_class_teacher'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('assign_class_teacher'); ?></a></li>
                                    <?php  } ?>
                                    <?php if ($this->rbac->hasPrivilege('class_timetable', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/timetable/classreport" style="<?php echo set_1stLevel('Academics/timetable'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('class_timetable'); ?></a></li>
                            <?php  } ?>
                    </ul>
                </div>
            </div>
            <?php
            if ($this->rbac->hasPrivilege('section', 'can_add') || $this->rbac->hasPrivilege('section', 'can_edit')) {
                ?>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('section'); ?></h3>
                        </div>
                        <form action="<?php echo site_url("sections/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>   
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="section" name="section" placeholder="" type="text" class="form-control"  value="<?php echo set_value('section', $section['section']); ?>" />
                                    <span class="text-danger"><?php echo form_error('section'); ?></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>              
                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('section', 'can_add') || $this->rbac->hasPrivilege('section', 'can_edit')) {
                echo "6";
            } else {
                echo "10";
            }
            ?>">             
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('section_list'); ?></h3>
                    </div>
                    <div class="box-body ">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('section_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('section'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>                                   

                                    <?php
                                    $count = 1;
                                    foreach ($sectionlist as $section) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $section['section'] ?></td>
                                            <td class="mailbox-date pull-right">
                                                <?php
                                                if ($this->rbac->hasPrivilege('section', 'can_edit')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sections/edit/<?php echo $section['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('section', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sections/delete/<?php echo $section['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
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
                </div>
            </div> 

        </div> 
    </section>
</div>