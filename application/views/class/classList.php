<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> <?php echo $this->lang->line('academics'); ?>     </h1>
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
            if ($this->rbac->hasPrivilege('class', 'can_add')) {
                ?>  
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('add_class'); ?></h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('classes'); ?>" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                }
                                ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <input id="admin_id" name="admin_id" type="hidden" value="<?php echo $admin_id;?>" />
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="class" name="class" placeholder="" type="text" class="form-control"  value="<?php echo set_value('class'); ?>" />
                                    <span class="text-danger"><?php echo form_error('class'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('sections'); ?></label><small class="req"> *</small>


                                    <?php
                                    foreach ($vehiclelist as $vehicle) {
                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sections[]" value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('sections[]', $vehicle['id']); ?> ><?php echo $vehicle['section'] ?>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <span class="text-danger"><?php echo form_error('sections[]'); ?></span>
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>

                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('class', 'can_add')) {
                echo "6";
            } else {
                echo "10";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('class_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('class_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line('class'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('sections'); ?>
                                        </th>

                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vehroutelist as $vehroute) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <?php echo $vehroute->class; ?>

                                            </td>


                                            <td>
                                                <?php
                                                $vehicles = $vehroute->vehicles;
                                                if (!empty($vehicles)) {


                                                    foreach ($vehicles as $key => $value) {


                                                        echo "<div>" . $value->section . "</div>";
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td class="mailbox-date pull-right">
                                                <?php
                                                if ($this->rbac->hasPrivilege('class', 'can_edit')) {
                                                    ?>  
                                                    <a data-placement="left" href="<?php echo base_url(); ?>classes/edit/<?php echo $vehroute->id; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('class', 'can_delete')) {
                                                    ?>  
                                                    <a data-placement="left" href="<?php echo base_url(); ?>classes/delete/<?php echo $vehroute->id; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
        <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

