<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists"> 
            <?php //if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>    
                <li><a href="<?php echo base_url(); ?>studentfee" style="<?php echo set_1stLevel('studentfee/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('collect_fees'); ?></a></li>
            <?php //} ?>
            <?php if ($this->rbac->hasPrivilege('fees_carry_forward', 'can_view')) { ?>
                <li><a href="<?php echo base_url('admin/feesforward'); ?>" style="<?php echo set_1stLevel('feesforward/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_carry_forward'); ?></a></li>
            <?php } ?>
            <?php if ($this->rbac->hasPrivilege('fees_reminder', 'can_view')) { ?>
                <li><a href="<?php echo site_url('admin/feereminder/setting'); ?>" style="<?php echo set_1stLevel('feereminder/setting');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees') . " " . $this->lang->line('reminder'); ?></a></li>
            <?php }?>
            <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>
                <li><a href="<?php echo base_url();?>studentfee/collectedfeelist" style="<?php echo set_1stLevel('studentfee/collectedfeelist');?>"><i class="fa fa-angle-double-right"></i> FR Voucher List</a></li>
            <?php }?>    
            <li class="<?php echo set_Submenu('studentfee/searchpayment'); ?>"><a href="<?php echo base_url(); ?>studentfee/searchpayment"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_fees_payment'); ?></a></li>
            <li class="<?php echo set_Submenu('studentfee/feesearch'); ?>"><a href="<?php echo base_url(); ?>studentfee/feesearch"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_due_fees'); ?> </a></li>           
        </ul>
    </div>
</div>