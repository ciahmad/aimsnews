<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('account_type_title'); ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url($posturl) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body row">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                      
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('account_name'); ?></label><small class="req"> *</small>
                                <input autofocus=""  id="account_name" name="account_name" placeholder="" type="text" class="form-control"  value="<?php echo $editaccount['name']; ?>" />
                                <span class="text-danger"><?php echo form_error('account_name'); ?></span>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('parent_account_type'); ?></label>
                                <select id="account_type_id" name="account_type_id" class="form-control" style="<?php echo $style;?>">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <?php
                                        foreach ($listaccounts as $listaccount) {
                                            if ($editaccount['id']==$listaccount['id']) {
                                                $selected = 'selected';
                                            }else{ $selected = ''; }
                                            
                                            ?>
                                            <option style="color: #000;font-weight: 600;" value="<?php echo $listaccount['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?> ><?php echo $listaccount['name']; ?></option>
                                            <?php 
                                            if ($listaccount['children']) {
                                            foreach ($listaccount['children'] as $child) {
                                                if ($editaccount['id']==$child['id']) {
                                                    $selected = 'selected';
                                                }else{ $selected = ''; }
                                             ?>
                                            <option value="<?php echo $child['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?>><?php echo $child['name']; ?></option>
                                            <?php } }?>
                                            <?php
                                        }
                                    ?>
                                </select>
                                
                            </div>

                            <div class="clearfix"></div>
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

            </div><!--/.col (right) -->
            <div class="col-md-8">
            </div>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('account_types', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary" id="exphead">
                    <div class="box-header with-border">
                        <h3 class="box-title">Accounts Types</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"></div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-right no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($listaccounts)) { ?>

                                    <?php
                                    } else {
                                        foreach ($listaccounts as $listaccount) {
                                            
                                            ?>
                                            <tr>    
                                                <th><?php echo $listaccount['name'] ?></th> 
                                                <td class="mailbox-date pull-right no-print">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('account_types', 'can_edit')) {
                                                        ?>

                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/accounttype/edit/<?php echo $listaccount['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('account_types', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/accounttype/delete/<?php echo $listaccount['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>  
                                                <?php 
                                                if ($listaccount['children']) {
                                                foreach ($listaccount['children'] as $child) { ?> 
                                            <tr>                                             
                                                <td>&nbsp&nbsp-- <?php echo $child['name'] ?></td>
                                                <td class="mailbox-date pull-right no-print">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income_head', 'can_edit')) {
                                                        ?>

                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/accounttype/edit/<?php echo $child['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('income_head', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/accounttype/delete/<?php echo $child['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                                <?php } }?>
                                        <?php } 
                                    } 
                                    ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">


    $(document).ready(function () {



        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });


</script>
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
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>