<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-usd"></i> <?php echo $this->lang->line('income'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('income', 'can_add') || $this->rbac->hasPrivilege('income', 'can_edit')) {
                ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_income'); ?></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form action="<?php echo site_url("admin/income/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cash/Bank</label><small class="req"> *</small>
                                    <select autofocus="" onchange="getval();" id="cash_bank" name="cash_bank" class="form-control" >
                                        <?php if($income_result['cash_bank']==104){?>
                                            <option value="104" selected>Bank</option>
                                            <option value="107">Cash</option>
                                        <?php }else{?>
                                            <option value="107">Cash</option>
                                            <option value="104">Bank</option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('inc_head_id'); ?></span>

                                </div>
                                <div class="form-group" style="display: none;" id="bank_accounts_div">
                                    <label for="exampleInputEmail1">Bank Accounts</label><small class="req"> *</small>
                                    <select autofocus="" onchange="getBankAccId()" id="bank_account_id" name="bank_account_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($bankAccounts as $bankAccount) {
                                            ?>
                                            <option value="<?php echo $bankAccount['id'] ?>"<?php

                                            if (set_value('bank_account_id', $income_result['bank_account_id']) == $bankAccount['id']) {
                                                        echo "selected = selected";
                                                    }
                                            ?>><?php echo $bankAccount['account_title'] ?></option>

                                            <?php
                                            
                                        }
                                        ?>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('bank_accounts'); ?></span>

                                </div>

                                <div class="form-group" style="display: none;" id="reference_number_div">
                                    <label for="exampleInputEmail1">Reference Number<small class="req"> *</small></label>
                                    <input id="reference_number" name="reference_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('reference_number', $income_result['reference_number']); ?>" />
                                    <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('income_head'); ?></label>
                                    <select autofocus="" id="inc_head_id" name="inc_head_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($accountheads as $accounthead) {
                                            ?>
                                            <option value="<?php echo $accounthead['id'] ?>"<?php
                                            if ($income_result['inc_head_id'] == $accounthead['id']) {
                                                echo "selected =selected";
                                            }
                                            ?>><?php echo $accounthead['account_number'] ?> - <?php echo $accounthead['account_title'] ?></option>
                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('inc_head_id'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?><small class="req"> *</small></label>&nbsp;

                                    <label for="students">Students</label>&nbsp;
                                    <?php if($income_result['staff_type']=='students'){?>    
                                    <input onchange="checkTypeEdit('students',0)" type="checkbox" name="staff_type" value="students" id="students" checked >&nbsp;&nbsp;
                                    <?php }else{?>
                                        <input onchange="checkTypeEdit('students',0)" type="checkbox" name="staff_type" value="students" id="students" >&nbsp;&nbsp;
                                    <?php }?>
                                    <label for="staff">Staff</label>&nbsp;&nbsp;
                                    <?php if($income_result['staff_type']=='staff'){?> 
                                        <input onchange="checkTypeEdit('staff',0)" type="checkbox" name="staff_type" value="staff" id="staff" checked>
                                    <?php }else{?>
                                        <input onchange="checkTypeEdit('staff',0)" type="checkbox" name="staff_type" value="staff" id="staff">
                                    <?php }?>

                                    <div style="display: block;" id="staff_div"></div>
                                    <div id="name_div">
                                        <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $income_result['name']); ?>" />
                                        <span class="text-danger"><?php echo form_error('name'); ?></span>    
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('invoice_no'); ?></label>
                                    <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('invoice_no', $income_result['invoice_no']) ?>" readonly style="background-color: #dddddd94;" />
                                    <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?><small class="req"> *</small></label>
                                    <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($income_result['date']))); ?>" readonly="readonly" />
                                    <span class="text-danger"><?php echo form_error('date'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?><small class="req"> *</small></label>
                                    <input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount', $income_result['amount']); ?>" />
                                    <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description'); ?><?php echo set_value('description', $income_result['note']) ?></textarea>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                    <input id="documents" name="documents" placeholder="" type="file" class="filestyle form-control"  value="<?php echo set_value('documents'); ?>" />
                                    <span class="text-danger"><?php echo form_error('documents'); ?></span>
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
            if ($this->rbac->hasPrivilege('income', 'can_add') || $this->rbac->hasPrivilege('income', 'can_edit')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('income_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('income_list'); ?></div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('invoice_no'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('date'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('income_head'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('amount'); ?>
                                        </th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($incomelist)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($incomelist as $income) {
                                            if($income['staff_std_id'] > 0){

                                                if($income['staff_type']=='students'){
                                                    $name = $this->receiptvoucher_model->getstudentById($income['staff_std_id']);
                                                }else{
                                                    $name = $this->receiptvoucher_model->getstaffById($income['staff_std_id']);
                                                }
                                            }else{
                                                    $name = $income['name'];
                                            }
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $name; ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($income['note'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $income['note']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $income["invoice_no"]; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($income['date'])) ?></td>

                                                <td class="mailbox-name">
                                                    <?php
                                                    $income_head = $income['income_category'];
                                                    echo "$income_head";
                                                    ?>


                                                </td>

                                                <?php
                                                $inc_head_id = $income['inc_head_id'];
                                                $arr1 = str_split($inc_head_id);
                                                ?>

                                                <td class="mailbox-name"><?php echo ($currency_symbol . $income['amount']); ?></td>
                                                <td class="mailbox-date pull-right">
                                                    <?php if ($income['documents']) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/download/<?php echo $income['documents'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_edit')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/edit/<?php echo $income['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/delete/<?php echo $income['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
        <div class="row">
            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function(){
    getval();
    getBankAccId();
    staff_type      = '<?php echo $income_result['staff_type'];?>';
    staff_std_id    = '<?php echo $income_result['staff_std_id'];?>';
    checkTypeEdit(staff_type, staff_std_id);
});
function getval(){
    var id = $('#cash_bank option:selected').val();
    if(id==104){
        $('#bank_accounts_div').show();
        getBankAccId()
    }else{
        $('#bank_accounts_div').hide();
        $('#reference_number_div').hide();
        //$("#bank_accounts option:selected").prop("selected", false)
        $('#bank_accounts option:selected').removeAttr('selected');
        //$('#bank_account_id option:selected').removeAttr('selected');
        //$('#reference_number').val('');
    }
} 

function getBankAccId(){
    //selid = '<?php //echo $rvresult['bank_account_id'] ;?>';
    var id = $('#bank_account_id option:selected').val();
    if(id!=''){
        $('#reference_number_div').show();
    }else{
        $('#reference_number_div').hide();
    }
} 

function checkTypeEdit(staff_type, staff_std_id){
    $('.check').not(this).prop('checked', false);
    if(staff_type=='staff'){
        //$('#students').prop('checked', false);
        $("#students").removeAttr('checked');
        $('#name').val('');
    }if(staff_type=='students'){
        //$('#students').prop('checked', true);
        $('#staff').prop('checked', false);
        $("#staff").removeAttr('checked');
        $('#name').val('');
    }
    //alert(staff_type + '-' + staff_std_id);
    if($("#staff").prop('checked')==true || $("#students").prop('checked')==true){
        var path  = '<?php echo base_url('admin/income/getIncomeStaffStudents'); ?>';
        $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'staff_type':staff_type,'staff_std_id':staff_std_id},
          beforeSend: function() {
              //$("#loading_image").show();
           },
          success: function(result){
            $('#name_div').hide();
            $('#staff_div').show();
            $('#name').val('');
            $('#staff_div').html(result);  

            }
        });
    }else{
        $('#staff_div').html('');
        $('#name_div').show();
        $('#staff_div').hide();
        $('#name').val('<?php echo $income_result['name']; ?>');
    }  
}


</script>
<script>
    $(document).ready(function () {

        // $("#to_account").on('change', function(){
        //     //alert($(this).val());
        //     if($(this).val()==104){
        //         $('#bank_accounts_div').show();
        //     }else{
        //         $('#bank_accounts_div').hide();
        //         $('#reference_number_div').hide();
        //         //$("#bank_accounts option:selected").prop("selected", false)
        //         $('#bank_accounts option:selected').removeAttr('selected');
        //     }
        // })
        // $("#bank_accounts").on('change', function(){
        //     if($(this).val()!=''){
        //         $('#reference_number_div').show();
        //     }else{
        //         $('#reference_number_div').hide();
        //     }
            
        // })



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