


<div class="row">
    <div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">
                    <?php if ($this->rbac->hasPrivilege('books', 'can_view')) { ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/book/getall"  style="<?php echo set_1stLevel('book/getall'); ?>"><i class="fa fa-book ftlayer"></i><?php echo $this->lang->line('book').''.$this->lang->line('list'); ?></a></li>
                        <?php } ?>

                        <?php if ($this->rbac->hasPrivilege('issue_return', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member" style="<?php echo set_1stLevel('member/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('issue_return'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('add_student', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member/student" style="<?php echo set_1stLevel('member/student'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_student'); ?></a></li>
                        <?php } ?>
                         <?php if ($this->rbac->hasPrivilege('add_staff_member', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member/teacher"  style="<?php echo set_1stLevel('Library/member/teacher'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_staff_member'); ?></a></li>
                        <?php } ?>

                        <li class="garnishbg"><a style="color:white" href="<?php echo base_url(); ?>report/library"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('library'); ?> <?php echo $this->lang->line('reports'); ?></a></li>                     
                    </ul>
                </div>
    </div>
    <div class="col-md-10">
        <div class="box box-primary border0 mb0 margesection">
            <div class="box-header with-border themecolor">
                <h3 class="box-title"><i class="fa fa-search"></i>  <?php echo $this->lang->line('library') . " " . $this->lang->line('report') ?></h3>

            </div>
            <div class="">
                <ul class="reportlists">
                    <?php if ($this->rbac->hasPrivilege('book_issue_report', 'can_view')) { ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/library/book_issue_report'); ?>"><a href="<?php echo base_url() ?>report/studentbookissuereport"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('book') . " " . $this->lang->line('issue') . " " . $this->lang->line('report'); ?></a></li>
                    <?php } if ($this->rbac->hasPrivilege('book_due_report', 'can_view')) { ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/library/bookduereport'); ?>"><a href="<?php echo base_url() ?>report/bookduereport"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('book') . " " . $this->lang->line('due') . " " . $this->lang->line('report'); ?></a></li>
                    <?php } if ($this->rbac->hasPrivilege('book_inventory_report', 'can_view')) { ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/library/bookinventory'); ?>"><a href="<?php echo base_url() ?>report/bookinventory"><i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('book') . " " . $this->lang->line('inventory') . " " . $this->lang->line('report'); ?></a></li>
                        <?php
                    }
                    if ($this->rbac->hasPrivilege('book_issue_return_report', 'can_view')) {
                        ?>
                        <li class="col-lg-4 col-md-4 col-sm-6 <?php echo set_SubSubmenu('Reports/library/issue_returnreport'); ?>"><a href="<?php echo base_url(); ?>admin/book/issue_returnreport"><i class="fa fa-file-text-o"></i>
                                <?php echo $this->lang->line('book') . " " . $this->lang->line('issue_return') . " " . $this->lang->line('report'); ?>

                            </a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>