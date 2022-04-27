<div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">                        
                        <?php  if ($this->rbac->hasPrivilege('fees_type', 'can_view')) {  ?>
                                    <li><a href="<?php echo base_url(); ?>admin/feetype" style="<?php echo set_1stLevel('feetype/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_type'); ?></a></li>
                        <?php  } ?>     
                        <?php if ($this->rbac->hasPrivilege('fees_group', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/feegroup" style="<?php echo set_1stLevel('admin/feegroup'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_group'); ?></a></li>
                        <?php  } ?>
                         <?php if ($this->rbac->hasPrivilege('fees_master', 'can_view')) {?>
                                    <li><a href="<?php echo base_url(); ?>admin/feemaster" style="<?php echo set_1stLevel('admin/feemaster'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_master'); ?></a></li>
                        <?php  } ?>

                        <?php  if ($this->rbac->hasPrivilege('fees_discount', 'can_view')) {?>
                                 <li><a href="<?php echo base_url(); ?>admin/feediscount" style="<?php echo set_1stLevel('admin/feediscount'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_discount'); ?></a></li>
                        <?php  } ?>
                        <?php  if ($this->rbac->hasPrivilege('fine', 'can_view')) {
                                ?>
                                 <li><a href="<?php echo base_url(); ?>admin/fine" style="<?php echo set_1stLevel('admin/fine'); ?>"><i class="fa fa-angle-double-right"></i> Add Fine </a></li>
                        <?php  } ?>                      
                    </ul>
                </div>
            </div>