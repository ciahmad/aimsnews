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
                        <li class="garnishbg"><a style="color:white" href="<?php echo base_url(); ?>report/inventory"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('inventory'); ?> <?php echo $this->lang->line('reports'); ?></a></li>                                                 
                    </ul>
                </div>
            </div>
    <div class="col-md-10">
        <div class="box box-primary border0 mb0 margesection">
            <div class="box-header with-border themecolor">
                <h3 class="box-title"><i class="fa fa-search"></i>  <?php echo $this->lang->line('inventory') . " " . $this->lang->line('report') ?></h3>
            </div>
            <div class="">
                <ul class="reportlists">
                    <?php if ($this->rbac->hasPrivilege('stock_report', 'can_view')) { ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/inventory/inventorystock'); ?>"><a href="<?php echo base_url() ?>report/inventorystock"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('stock') . " " . $this->lang->line('report'); ?></a></li>
                    <?php
                    }
                    if ($this->rbac->hasPrivilege('add_item_report', 'can_view')) {
                        ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/inventory/additem'); ?>"><a href="<?php echo base_url() ?>report/additem"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('add') . " " . $this->lang->line('item') . " " . $this->lang->line('report'); ?></a></li>
                    <?php
                    }
                    if ($this->rbac->hasPrivilege('issue_item_report', 'can_view')) {
                        ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/inventory/issueinventory'); ?>"><a href="<?php echo base_url() ?>report/issueinventory"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('issue') . " " . $this->lang->line('item') . " " . $this->lang->line('report'); ?></a></li>
<?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
