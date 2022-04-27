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
        @page :footer {
        display: none
    }

    @page :header {
        display: none
    }

    html, body {
        border: 1px solid white;
        height: 99%;
        page-break-after: avoid;
        page-break-before: avoid;
     }
    
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-usd"></i><?php echo $this->lang->line('receipt_voucher'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('receiptvoucher', 'can_add')) {
                ?>
                <?php $this->load->view('admin/income/_sidemenu');?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('receipt_voucher'); ?></h3>
                        </div><!-- /.box-header -->
                        <form action="<?php echo base_url() ?>admin/receiptvoucher"  id="rvform" name="rvform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                    
                                    <div class="form-group col-md-4">
                                        <div style="display: block;" id="staff_div"></div>
                                        <div id="name_div">
                                            <input id="name" name="name" placeholder="Enter Name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group col-sm-6"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?><small class="req"> *</small></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" />
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-6"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('rv_number'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo $invoice_no; ?>" readonly style="background-color: #dddddd94;"/>
                                        <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                    </div>
                                </div>
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-6"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('cash_bank'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="cash_bank" name="cash_bank" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <option value="30"><?php echo $this->lang->line('cash'); ?></option>
                                            <option value="31"><?php echo $this->lang->line('bank'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('cash_bank'); ?></span>
                                    </div>
                                    
                                </div>

                                <div class="col-md-12" style="display: none;" id="deposit_cash">
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('deposit_cash'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <select autofocus="" id="deposit_cash_id" name="deposit_cash_id" class="form-control" >
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
                                    <div class="form-group col-md-1">
                                        <button type="button" class="pull-right themecolor"  onclick="getMyModel(4)">Add +</button>
                                    </div>
                                </div> 
                                    
                                <div class="col-md-12" style="display: none;" id="bank_accounts_div">
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('bank_acc'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        
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
                                    <div class="form-group col-md-1">
                                        <button type="button" class="pull-right themecolor"  onclick="getMyModel(4)">Add +</button>
                                    </div>
                                </div>  

                                <div class="col-md-12">
                                    <div class="form-group col-md-6"></div>
                                    <div style="display: none;" id="reference_number_div">
                                        <div class="form-group col-md-2">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('ref_no'); ?><small class="req"> *</small></label>
                                            </div>
                                        <div class="form-group col-md-4" >
                                            <input id="reference_number" name="reference_number" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <input type="hidden" name="total_sum" id="total_sum" value="0">
                                    <!-- general form elements -->
                                    
                                        <div class="box-body">
                                            <div class="table-responsive mailbox-messages">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo $this->lang->line('ac_head'); ?> <button type="button" class="pull-right themecolor"  onclick="getMyModel()">Add +</button></th>
                                                            <th><?php echo $this->lang->line('description'); ?></th>
                                                            <th><?php echo $this->lang->line('amount'); ?></th>
                                                            <td><?php echo $this->lang->line('action'); ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php for ($i= 0; $i < count($account_id); ) { ?>
                                                            <tr id="rv<?php echo $i;?>">
                                                            <td>
                                                                <input onkeyup="autoSuggest(<?php echo $i;?>)" id="account_title<?php echo $i;?>" name="account_title[]" type="text" class="form-control" value="<?php echo $account_title[$i]; ?>" style="width: 240px;"/>
                                                                <input id="account_id<?php echo $i;?>" name="account_id[]" type="hidden" value="<?php echo $account_id[$i]; ?>" />   
                                                                <div id="data-container<?php echo $i;?>"></div>
                                                                <span class="text-danger"><?php echo form_error('account_id'); ?></span>
                                                            </td>
                                                            <td>
                                                                <input id="description<?php echo $i;?>" name="description[]" type="text" class="form-control"  value="<?php echo $description[$i]; ?>" style="width:360px" />
                                                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                            </td>
                                                            <td>
                                                                <input id="amount<?php echo $i;?>" name="amount[]" type="text" class="form-control" onchange="sum(<?php echo $i;?>);" value="<?php echo $amount[$i]; ?>" style="text-align: right; width:200px" data-amt="0"/>
                                                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-info pull-right themecolor" id="add_more" data-id="<?php echo $i;?>" onclick="addMore()">+</button>
                                                            </td>
                                                            <?php $i++ ;} ?>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td style="text-align:right;"><b style="font-size: 16px;"><?php echo $this->lang->line('total'); ?>:</b></td>
                                                            <td>
                                                                <input id="total_amount" name="total_amount" type="text" class="form-control" value="" style="text-align: right; font-size: 16px; font-weight: 600; width:200px"/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.mail-box-messages -->
                                        </div><!-- /.box-body -->
                                    
                                </div><!--/.col (left) -->
                                <!-- right column -->

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" id="submitrv" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                        
                            </div>
                        </form>
                    </div><!--/.col (right) -->
                <!-- left column -->
                </div>
            <?php } ?>
        </div>    
            <!-- right column -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('receipt_voucher_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
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
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white"> Receipt Voucher List
                                <?php //echo $this->lang->line('income_list'); ?>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('income_list'); ?>
                        </div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                        <th><?php echo $this->lang->line('ac_head'); ?></th>
                                        <th><?php echo $this->lang->line('desc'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('amount'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($rvlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $balance = 0;
                                        foreach ($rvlist as $list) {

                                            //echo "<pre>"; print_r($list['rvlistdata']); "</pre>"; die();

                                            $balance = $balance+$list['rvdata']['total_amount'];

                                            if($list['rvdata']['staff_std_id'] > 0){

                                                if($list['rvdata']['staff_type']=='student'){
                                                    $name = $this->receiptvoucher_model->getstudentById($list['rvdata']['staff_std_id']);

                                                }else{
                                                      $name = $this->receiptvoucher_model->getstaffById($list['rvdata']['staff_std_id']);
                                                }
                                            }else{
                                                $name = $list['rvdata']['name'];
                                            }

                                            ?>
                                            <tr style="background-color:#dddddd94">
                                                <td class="mailbox-name">
                                                    <?php echo $list['rvdata']['date']; ?></td>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $name; ?></a></td>
                                                <td class="mailbox-name"><?php echo $list['rvdata']["invoice_no"]; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td  class="text-right">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('receiptvoucher', 'can_view')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/receiptvoucher/view/<?php echo $list['rvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View"><i class="fa fa-eye"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php
                                                    if ($this->rbac->hasPrivilege('receiptvoucher', 'can_edit')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/receiptvoucher/edit/<?php echo $list['rvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('receiptvoucher', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/receiptvoucher/delete/<?php echo $list['rvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                            <?php if(!empty($list['rvlistdata'])){ ?>
                                                <?php  foreach ($list['rvlistdata'] as $newrvlist) { ?>
                                            <tr>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"> <?php echo $newrvlist['account_title']; ?></td>
                                                <td class="mailbox-name"> <?php echo $newrvlist['description']; ?>
                                                </td>
                                                <td class="mailbox-name text-right" ><?php echo ($currency_symbol . $newrvlist['amount']); ?></td>
                                                <td></td>
                                                <td  class="text-right"></td>

                                            </tr>
                                            <?php }?>
                                            <?php }?>
                                            <?php
                                        }
                                        ?>
                                        <!-- <tr><td colspan="6" style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($balance, 2);?></td></tr> -->
                                   <?php  }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
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


function getMyModel(id =0) {
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
<script>
// AJAX call for autocomplete 
function autoSuggest(id){
    if($('#account_title'+id).val().length >= 3){
        var resp_data_format="";
        var path  = '<?php echo base_url('admin/receiptvoucher/autocomplete'); ?>';
        $.ajax({
        method: "POST",
        dataType: "json",
        url: path,
        data:'keyword='+$('#account_title'+id).val(),
        beforeSend: function(){
            ///$("#search_query").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(response){

            resp_data_format+='<ul style="list-style-type: none;">';
            if(response.length > 0){
                for (var i = 0; i < response.length; i++) {
                    resp_data_format=resp_data_format+'<li><a href="javascript:" id="listid'+response[i].id+'" onclick="setSelectAcc('+id+','+response[i].id+')" >'+response[i].account_number+' - '+response[i].account_title+'</a></li>';
                };
                resp_data_format+='</ul>';
                $("#data-container"+id).html(resp_data_format);
            }

        }
        });
    }
}

function setSelectAcc(listid, account_id){
    var account_title = $("#listid"+account_id).html();
    $('#account_title'+listid).val(account_title);
    $('#account_id'+listid).val(account_id);
    $('#data-container'+listid).html('');
} 
 
function sum(id){
    
    var sum1       = parseFloat($('#amount'+id).val());
    var datavalue  = parseFloat($("#amount"+id).attr('data-amt'));
    if(sum1 > 0){
       var sum = parseFloat($('#total_sum').val());
        var total  = sum + sum1-datavalue;
        $('#total_sum').val(total);
        $('#total_amount').val(total);
        $("#amount"+id).attr('data-amt', sum1);
    }else{ 
        sum1 = 0;
        var sum = parseFloat($('#total_sum').val());
        var total  = sum + sum1-datavalue;
        $('#total_sum').val(total);
        $('#total_amount').val(total);
        $("#amount"+id).attr('data-amt', sum1)
    }
}

function addMore(){
    
    var row   = parseInt($("#add_more").attr('data-id'));
    var path  = '<?php echo base_url('admin/receiptvoucher/getaddMoreList'); ?>';
    $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'action':'rvmorelist', 'row':row},
          beforeSend: function() {
              //$("#loading_image").show();
           },
          success: function(data){
           if(data!=''){
                $( "#rv"+row ).after( data );
                var rowid = row+1;
                $("#add_more").attr('data-id', rowid);
           }else{
                $("#add_more").attr('data-id', 1);
            }
        }
    }); 
}

function removeMore(row){
    var sum = parseFloat($('#total_sum').val());
    if(parseFloat($('#amount'+row).val())){
        var sum1 = parseFloat($('#amount'+row).val());
    }else{ var sum1 = 0; }
    var datavalue  = parseFloat($("#amount"+row).attr('data-amt'));
    var total      = sum-sum1;
    $('#total_sum').val(total);
    $('#total_amount').val(total);
    $("#amount"+row).attr('data-amt', sum1);
    var row = parseInt($("#add_more").attr('data-id'));
    if(row!=0){
        var rowid  = row-1;
        $("#add_more").attr('data-id', rowid);
        $('#rv'+row).remove();
    }else{
        $("#add_more").attr('data-id', 1);
    }
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
                $('#deposit_cash').show();
                $('#bank_accounts_div').hide();
                $('#reference_number_div').hide();
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

    $(document).ready(function() {
    var table = $('#example').removeAttr('width').DataTable( {
        paging: false,
        searching: false,
        "columnDefs": [
          { "width": "60px", "targets": 0 },
          { "width": "250px", "targets": 1 },
          { "width": "50px", "targets": 2 },
          { "width": "50px", "targets": 3 },
        ],
        fixedColumns: true
    } );
} );

</script>