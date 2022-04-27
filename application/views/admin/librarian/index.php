<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
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
                        <li class="<?php echo set_Submenu('Reports/library'); ?>"><a href="<?php echo base_url(); ?>report/library"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('library'); ?> <?php echo $this->lang->line('reports'); ?></a></li>                     
                    </ul>
                </div>
            </div>       

            <div class="col-md-10">              
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('members'); ?></h3>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('members'); ?></div>
                            <table class="table table-striped table-bordered table-hover example" id="members">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('member_id'); ?></th>
                                        <th><?php echo $this->lang->line('library_card_no'); ?></th>
                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('member_type'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th class="text-right no-print"><?php echo $this->lang->line('action'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($memberList)) {
                                        $count = 1;
                                        foreach ($memberList as $member) {

                                            if ($member['member_type'] == "student") {
                                                $name = $member['firstname'] . " " . $member['lastname'];
                                                $phone = $member['guardian_phone'];
                                            } else {
                                                $email = $member['teacher_email'];
                                                $name = $member['teacher_name'];
                                                $sex = $member['teacher_sex'];
                                                $phone = $member['teacher_phone'];
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $member['lib_member_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $member['library_card_no']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $member['admission_no']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line($member['member_type']); ?>
                                                </td>
                                                <td>
                                                    <?php echo $phone; ?>
                                                </td>
                                                <td class="mailbox-date pull-right">
                                                    <a href="<?php echo base_url(); ?>admin/member/issue/<?php echo $member['lib_member_id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('issue_return'); ?>">
                                                        <i class="fa fa-sign-out"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
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
