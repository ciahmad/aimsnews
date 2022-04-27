<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-object-group"></i> <?php echo $this->lang->line('item_category'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">
                    <li><a href="<?php echo base_url(); ?>admin/issueitem"  style="<?php echo set_1stLevel('issueitem/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('issue_item'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/itemstock" style="<?php echo set_1stLevel('Itemstock/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_item_stock'); ?></a></li>
                        <li style="padding: 10px; text-align: center;" class="garnishbg">SETTINGS</li>

                        <?php if ($this->rbac->hasPrivilege('item', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/item" style="<?php echo set_1stLevel('Item/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_item'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('item_category', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemcategory" style="<?php echo set_1stLevel('itemcategory/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_category'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('store', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemstore" style="<?php echo set_1stLevel('itemstore/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_store'); ?></a></li>
                                 <?php  } ?>

                                 <?php if ($this->rbac->hasPrivilege('supplier', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemsupplier" style="<?php echo set_1stLevel('itemsupplier/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_supplier'); ?></a></li>
                        <?php  } ?>                                                 
                        <li><a  href="<?php echo base_url(); ?>report/inventory"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('inventory'); ?> <?php echo $this->lang->line('reports'); ?></a></li>                    </ul>
                </div>
            </div>
            <?php if ($this->rbac->hasPrivilege('item_category', 'can_add') || $this->rbac->hasPrivilege('item_category', 'can_edit')) { ?> 
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_item_category'); ?></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo site_url("admin/itemcategory/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php echo validation_errors(); ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo $this->lang->line('item_category'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="itemcategory" name="itemcategory" placeholder="itemcategory" type="text" class="form-control"  value="<?php echo set_value('itemcategory', $itemcategory['item_category']); ?>" />
                                    <span class="text-danger"><?php echo form_error('itemcategory'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description', $itemcategory['description']); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('item_category', 'can_add') || $this->rbac->hasPrivilege('item_category', 'can_edit')) {
                echo "6";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary" id="exphead">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('item_category_list'); ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body  ">
                        <div class="mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('item_category_list'); ?></div>
                            <div class="table-responsive">  
                                <table class="table table-striped table-bordered table-hover example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('item_category'); ?></th>
                                            <th class="text-right no-print"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($categorylist)) {
                                            ?>

                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($categorylist as $category) {
                                                ?>
                                                <tr>                                               
                                                    <td class="mailbox-name">
                                                        <a href="#" data-toggle="popover" class="detail_popover" >
                                                            <?php echo $category['item_category'] ?>
                                                        </a>

                                                        <div class="fee_detail_popover" style="display: none">
                                                            <?php
                                                            if ($category['description'] == "") {
                                                                ?>
                                                                <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p class="text text-info"><?php echo $category['description']; ?></p>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td class="mailbox-date pull-right no-print">
                                                        <?php if ($this->rbac->hasPrivilege('item_category', 'can_edit')) { ?> 
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/itemcategory/edit/<?php echo $category['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        <?php } if ($this->rbac->hasPrivilege('item_category', 'can_delete')) { ?> 
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/itemcategory/delete/<?php echo $category['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $count++;
                                        }
                                        ?>

                                    </tbody>
                                </table><!-- /.table -->
                            </div>  
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div>


        </div>   <!-- /.row -->
    </section><!-- /.content -->
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
