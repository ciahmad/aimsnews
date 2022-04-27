<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$language = $this->customlib->getLanguage();
$language_name = $language["short_code"];
?><style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<style>
    @media print {
        .feeprint {
            background-color: black !important;
            color:white !important;
            font-size:16px;
            -webkit-print-color-adjust: exact; 
        }

        .scissorsdiv{
            color:black !important;
            width:100% !important;
            -webkit-print-color-adjust: exact; 
        }
    
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-credit-card"></i> <?php echo $this->lang->line('expenses'); ?> <small><?php echo $this->lang->line('student_fee'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('expense', 'can_add')) { ?>
                <?php $this->load->view('admin/income/_sidemenu');?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('add_expense'); ?></h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo base_url() ?>admin/expense"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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

                                <div class="col-md-12">
                                    <div class="form-group col-md-3">
                                        <label for="student"><?php echo $this->lang->line('student'); ?></label>&nbsp;
                                        <input class="check" type="checkbox" name="staff_type" value="student" id="student">&nbsp;&nbsp;
                                        <label for="staff"><?php echo $this->lang->line('staff'); ?></label>&nbsp;&nbsp;
                                        <input class="check" type="checkbox" name="staff_type" value="staff" id="staff">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?><small class="req"> *</small></label>
                                    </div>
                                    <div id="class_section_div" style="display:none;">
                                        <div class="col-sm-3">
                                            <div class="form-group"> 
                                                <select autofocus="" id="class_id" name="class_id" class="form-control">
                                                    <option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('class'); ?><small class="req"> *</small></option>
                                                    <?php foreach ($classlist as $class) { ?>
                                                        <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <select  id="section_id" name="section_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('section'); ?><small class="req"> *</small></option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div style="display: block;" id="staff_div"></div>
                                        <div id="name_div">
                                            <input id="name" name="name" placeholder="<?php echo $this->lang->line('enter'); ?> <?php echo $this->lang->line('name'); ?> *" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                            <span class="text-danger"><?php echo form_error('name'); ?></span>    
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-7"></div>
                                    <div class="form-group col-sm-1">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?></label> <small class="req">*</small>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" />
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-6"></div>
                                    <div class="form-group col-sm-2 text-right">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('invoice_no'); ?></label>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo $invoice_no; ?>" readonly style="background-color: #dddddd94;"/>
                                        <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-6"></div>
                                    <div class="form-group col-sm-2 text-right">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('cash_bank'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <select id="cash_bank" name="cash_bank" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <option value="30"><?php echo $this->lang->line('cash'); ?></option>
                                            <option value="31"><?php echo $this->lang->line('bank'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('cash_bank'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12" style="display: none;" id="deposit_cash">
                                    <div class="form-group col-sm-6"></div>
                                    <div class="form-group col-sm-2 text-right">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('select'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-sm-3" >
                                        <select id="deposit_cash_id" name="deposit_cash_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                                foreach ($deposit_cash_accounts as $deposit_cash_account) {
                                                    ?>
                                                    <option value="<?php echo $deposit_cash_account['id'] ?>"<?php
                                                    if (set_value('deposit_cash_id') == $deposit_cash_account['id']) {
                                                        echo "selected = selected";
                                                    }
                                                    ?>><?php echo $deposit_cash_account['account_title'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('deposit_cash_id'); ?></span>
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <button type="button" class="pull-right themecolor"  onclick="getMyModel(4)">Add +</button>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bank_accounts_div">
                                    <div class="form-group col-sm-6"></div>
                                    <div class="form-group col-sm-2 text-right"><label for="exampleInputEmail1"><?php echo $this->lang->line('bank'); ?> <?php echo $this->lang->line('accounts'); ?></label><small class="req"> *</small></div>
                                    <div class="form-group col-sm-3">
                                        <select autofocus="" id="bank_account_id" name="bank_account_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($bankAccounts as $bankAccount) {
                                                ?>
                                                <option value="<?php echo $bankAccount['id'] ?>"<?php
                                                if (set_value('inc_head_id') == $bankAccount['id']) {
                                                    echo "selected = selected";
                                                }
                                                ?>><?php echo $bankAccount['account_title'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('bank_account_id'); ?></span>
                                    </div>
                                    <div class="form-group col-sm-1"><button type="button" class="pull-right themecolor"  onclick="getMyModel(4)">Add +</button></div>
                                </div>    
                                <div class="col-md-12" style="display: none;" id="reference_number_div">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2 text-right"><label for="exampleInputEmail1"><?php echo $this->lang->line('reference'); ?> <?php echo $this->lang->line('number'); ?><small class="req"> *</small></label></div>
                                    <div class="form-group col-sm-4">
                                        
                                        <input id="reference_number" name="reference_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('reference_number'); ?>" />
                                        <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-4">
                                        <button type="button" class="pull-right themecolor"  onclick="getMyModel(2)">Add +</button>
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('expense_head'); ?></label><small class="req"> *</small>

                                        <select autofocus="" id="exp_head_id" name="exp_head_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($accountheads as $accounthead) {
                                                ?>
                                                <option value="<?php echo $accounthead['id'] ?>"<?php
                                                ?>><?php echo $accounthead['account_number'] ?> - <?php echo $accounthead['account_title'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select><span class="text-danger"><?php echo form_error('exp_head_id'); ?></span>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="<?php echo set_value('description'); ?>">
                                        <span class="text-danger"></span>
                                    </div>
                                    
                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?><small class="req"> *</small></label>
                                        <input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount'); ?>" />
                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                        <input id="documents" name="documents" placeholder="" type="file" class="filestyle form-control" value="<?php echo set_value('documents'); ?>" />
                                        <span class="text-danger"><?php echo form_error('documents'); ?></span>
                                    </div>
                                </div>
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('expense_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-messages table-responsive">
                        <div class="download_label ">
                            <div class="row text" style="width:100%">
                                    <div style="width:15%; float:left" class="col-sm-3 text text-right">                              
                                        <?php $this->userdata = $this->customlib->getuserdata();
                                                 $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                        ?>
                                        <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/admin_logo/<?php echo $stting[0]['admin_logo']?>" alt="Institute's Logo Not Found ">
                                    
                                    </div>
                                    <div style="width:60%; float:left;" class="col-sm-9 text text-left">
                                        <h4 style="margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']?></p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php //echo $this->lang->line('expense_list'); ?> Expense Report List
                            </div>
                            </div>
                        </div>
                            <!-- <div class="download_label">
                                <?php //echo $this->lang->line('expense_list'); ?>
                            </div> -->
                            <div class="table-responsive"> 
                                <table class="table table-hover table-striped  example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('date'); ?></th>
                                            <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('expense_head'); ?></th>
                                            <th><?php echo $this->lang->line('description'); ?></th>
                                            <th><?php echo $this->lang->line('amount'); ?></th>
                                            <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($expenselist)) {
                                            ?>

                                            <?php
                                        } else {
                                            foreach ($expenselist as $expense) {

                                                if($expense['staff_std_id'] > 0){

                                                    if($expense['staff_type']=='student'){
                                                        $name = $this->receiptvoucher_model->getstudentById($expense['staff_std_id']);
                                                    }else{
                                                          $name = $this->receiptvoucher_model->getstaffById($expense['staff_std_id']);
                                                    }
                                                }else{
                                                    $name = $expense['name'];
                                                }

                                                ?>
                                                <tr>
                                                    <td class="mailbox-name">

                                                        <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($expense['date'])) ?></td>
                                                    <td class="mailbox-name"><?php echo $expense["invoice_no"]; ?></td>
                                                    <td class="mailbox-name">
                                                        <a href="#" data-toggle="popover" class="detail_popover"><?php echo $name ?></a>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        <?php echo $expense['account_title'] ?>
                                                    </td>
                                                    <td class="mailbox-name">
                                                            <?php
                                                            if ($expense['note'] == "") {
                                                                ?>
                                                                <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p class="text text-info"><?php echo $expense['note']; ?></p>
                                                                <?php
                                                            }
                                                            ?>
                                                    </td>
                                                    <td class="mailbox-name"><?php echo ($currency_symbol . $expense['amount']); ?></td>
                                                    <td class="mailbox-date pull-right text-right">
                                                        <?php if ($expense['documents']) {
                                                            ?>
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/expense/download/<?php echo $expense['documents'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        <?php }
                                                        ?>
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('expense', 'can_edit')) {
                                                            ?>
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/expense/edit/<?php echo $expense['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                <i class="fa fa-edit text-green"></i>
                                                            </a>
                                                            <?php
                                                        }
                                                        if ($this->rbac->hasPrivilege('expense', 'can_delete')) {
                                                            ?>
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/expense/delete/<?php echo $expense['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                <i class="fa fa-trash text-danger"></i>
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

                            </div>  

                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div id="showModel"></div>
<script>
$(document).on('change', '#class_id', function (e) {
    $('#section_id').html("");
    var class_id = $(this).val();
    var base_url = '<?php echo base_url() ?>';
    var div_data = '';
    div_data = '<option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('section'); ?> *</option>';
    $.ajax({
        type: "GET",
        url: base_url + "sections/getByClass",
        data: {'class_id': class_id},
        dataType: "json",
        beforeSend: function () {
            $('#section_id').addClass('dropdownloading');
        },
        success: function (data) {
            $.each(data, function (i, obj){
                div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
            });
            $('#section_id').html(div_data);
        },
        complete: function () {
            $('#section_id').removeClass('dropdownloading');
        }
    });
});

$(document).on('change', '#section_id', function (e) {
    $('#name_div').hide();
    $('#staff_std_id').html("");
    var class_id = $("#class_id").val();
    var section_id = $("#section_id").val();
    var staff_type = $("#student").val();
    
    var path  = '<?php echo base_url('admin/income/getIncomeStaffStudents'); ?>';
    $.ajax({
        type: "POST",
        url: path,
        data: {'staff_type':staff_type,'staff_std_id':0, 'class_id': class_id, 'section_id': section_id},
        dataType: "html",
        beforeSend: function () {
            $('#staff_std_id').addClass('dropdownloading');
        },
        success: function (result) {
            $('#staff_div').show();
            $('#staff_div').html(result);
        },
        complete: function () {
            $('#staff_std_id').removeClass('dropdownloading');
        }
    });
});

$('.check').click(function() {

    $('.check').not(this).prop('checked', false);
    if( $(this).val() =='student' && $("#student").prop('checked')==true){
        $('#name_div').hide();
        $('#class_section_div').show();
        $('#staff_div').html('<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('student'); ?> *</option></select>');
        
    }else if($(this).val() =='staff' && $("#staff").prop('checked')==true){
        $('#staff_div').show();
        $('#staff_div').html('<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('staff'); ?> *</option></select>');
        $('#name_div').hide();
        $('#class_section_div').hide();
    }else{
        $('#class_section_div').hide();
        $('#staff_div').html('');
        $('#name_div').show();
        $('#staff_div').hide();
    }
    if($(this).val() =='staff' && $("#staff").prop('checked')==true){
        var staff_type = $(this).val();
        var path  = '<?php echo base_url('admin/income/getIncomeStaffStudents'); ?>';
        $.ajax({
            method: "POST",
            url: path,
            dataType: "html",
            data: {'staff_type':staff_type,'staff_std_id':0},
            beforeSend: function () {
                $('#staff_std_id').addClass('dropdownloading');
            },
            success: function(result){
                $('#staff_div').html(result);    
            },
            complete: function () {
                $('#staff_std_id').removeClass('dropdownloading');
            }
        });
    }
      
});

function getMyModel(id = 0) {
    $.ajax({
        type: 'POST',
        url: baseurl + "admin/account/getModel",
        dataType: 'html',
        data: {'parent_id':id},
        success: function(data) {
           
            $('#showModel').html(data);
            $('#myModal').modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        }
    });        
}    
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#cash_bank").on('change', function(){
            if($(this).val()==31){
                $('#bank_accounts_div').show();
                $('#deposit_cash_id option:selected').removeAttr('selected');
                $('#deposit_cash').hide();
            }else if($(this).val()==30){
                $('#bank_accounts_div').hide();
                $('#reference_number_div').hide();
                $('#deposit_cash').show();
                $('#bank_accounts option:selected').removeAttr('selected');
            }else{
                $('#bank_accounts_div').hide();
                $('#bank_accounts option:selected').removeAttr('selected');
                $('#deposit_cash').hide();
                $('#deposit_cash_id option:selected').removeAttr('selected');
                $('#reference_number_div').hide();
            }
        })
        $("#bank_account_id").on('change', function(){
            if($(this).val()!=''){
                $('#reference_number_div').show();
            }else{
                $('#reference_number_div').hide();
            }
            
        })

        $("#btnreset").click(function () {
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