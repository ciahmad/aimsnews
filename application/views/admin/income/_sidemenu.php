<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists"> 
            <?php if ($this->rbac->hasPrivilege('income', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/income" style="<?php echo set_1stLevel('income/index');?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_income'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('expense', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/expense" style="<?php echo set_1stLevel('expense/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_expense'); ?></a></li>
            <?php  } ?>
            <li class=""><a href="<?php echo base_url(); ?>admin/receiptvoucher" style="<?php echo set_1stLevel('receiptvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Receipt Voucher</a></li>

            <li class=""><a href="<?php echo base_url(); ?>admin/paymentvoucher" style="<?php echo set_1stLevel('paymentvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Payment Voucher</a></li>

            <li class=""><a href="<?php echo base_url(); ?>admin/journalvoucher" style="<?php echo set_1stLevel('journalvoucher/index');?>"><i class="fa fa-angle-double-right"></i>Journal Voucher</a></li>
            
            <?php if ($this->rbac->hasPrivilege('accounts', 'can_view')) { ?>
            <li class=""><a href="<?php echo base_url(); ?>admin/account/getall" style="<?php echo set_1stLevel('account/getall');?>"><i class="fa fa-angle-double-right" ></i>Chart of Accounts</a></li>
            <?php  } ?>

            <li class="<?php echo set_Submenu('income/incomesearch'); ?>"><a href="<?php echo base_url(); ?>admin/income/incomesearch"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('search_income'); ?> Report</a></li>
            
            <li class="<?php echo set_Submenu('expense/expensesearch'); ?>"><a href="<?php echo base_url(); ?>admin/expense/expensesearch"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_expense'); ?> Report </a></li>

             <li class="<?php echo set_Submenu('Reports/finance'); ?>"><a href="<?php echo base_url(); ?>report/finance"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('finance'); ?> Report</a></li>
            
        </ul>
    </div>
</div>