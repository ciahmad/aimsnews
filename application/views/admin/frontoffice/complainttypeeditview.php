
<div class="content-wrapper" style="min-height: 348px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-ioxhost"></i> <?php echo $this->lang->line('front_office'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">
                        <li><a href="<?php echo base_url(); ?>admin/enquiry" style="<?php echo set_1stLevel('admin/enquiry');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('admission_enquiry'); ?> </a></li>                                                 
                        <li><a href="<?php echo base_url(); ?>admin/generalcall" style="<?php echo set_1stLevel('admin/generalcall');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('phone_call_log'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/dispatch" style="<?php echo set_1stLevel('admin/dispatch');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_dispatch'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/receive" style="<?php echo set_1stLevel('admin/receive');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_receive'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/complaint" style="<?php echo set_1stLevel('admin/complaint');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('complain'); ?></a></li>
                        <li><a href="<?php echo base_url(); ?>admin/visitors" style="<?php echo set_1stLevel('admin/visitors');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('visitor_book'); ?></a></li>
                        <p style="text-align: center" padding="margin: 0 0 10px;">
                            <a class="btn btn-primary themecolor" style="width: 100%;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">SETUP RECEIPTION</a>                        
                        </p>
                            <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card card-body">
                                                <li><a href="<?php echo site_url('admin/visitorspurpose') ?>" class="active"><?php echo $this->lang->line('purpose'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/complainttype') ?>"><?php echo $this->lang->line('complain_type'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/source') ?>"><?php echo $this->lang->line('source'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/reference') ?>" ><?php echo $this->lang->line('reference'); ?></a></li>                            
                                            </div>
                                        </div>
                                    </div>                        
                            </div>                       
                    </ul>
                </div>
            </div>
            <!--./col-md-3-->
            <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_add') || $this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('complain_type'); ?></h3>
                        </div><!-- /.box-header -->

                        <form id="form1" action="<?php echo site_url('admin/complainttype/editcomplainttype/' . $complaint_type_data['id']) ?>" method="post"    >
                            <div class="box-body">                        
                                <?php echo $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('complain_type'); ?></label><small class="req"> *</small>
                                    <input class="form-control" id="description" name="complaint_type"  value="<?php echo set_value('complaint_type', $complaint_type_data['complaint_type']); ?>"/>
                                    <span class="text-danger"><?php echo form_error('complaint_type'); ?></span>
                                </div>  
                                <?php // print_r($complaint_data); ?>
                                <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description"rows="3"><?php echo set_value('description', $complaint_type_data['description']); ?></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('setup_font_office', 'can_add') || $this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
                echo "6";
            } else {
                echo "10";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('complain_type'); ?> <?php echo $this->lang->line('list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"></div>
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>                                    
                                        <th><?php echo $this->lang->line('complain_type'); ?></th>


                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($complaint_type_list)) {
                                        ?>
                                        <?php
                                    } else {
                                        foreach ($complaint_type_list as $key => $value) {
                                            ?>
                                            <tr>

                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $value['complaint_type'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($value['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $value['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div></td>


                                                <td class="mailbox-date pull-right">
                                                    <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/complainttype/editcomplainttype/<?php echo $value['id']; ?>"  class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } if ($this->rbac->hasPrivilege('setup_font_office', 'can_delete')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/complainttype/delete/<?php echo $value['id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="Delete">
                                                            <i class="fa fa-remove"></i>
                                                        </a>

                                                    <?php } ?>
                                                </td>

                                            </tr>
                                            <?php
                                        }
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

<!-- new END -->

</div><!-- /.content-wrapper -->
<script>

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>
