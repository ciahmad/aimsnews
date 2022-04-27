<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$language = $this->customlib->getLanguage();
$language_name = $language["short_code"];
?><style type="text/css">
    @media print{  .no-print, .no-print * { display: none !important; } }
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
        <h1><i class="fa fa-usd"></i><?php echo $this->lang->line('journal_voucher'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <?php
            if ($this->rbac->hasPrivilege('journalvoucher', 'can_add')) {
                ?>
                <?php $this->load->view('admin/income/_sidemenu');?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('journal_voucher'); ?></h3>
                        </div><!-- /.box-header -->

                        <form action="<?php echo base_url() ?>admin/journalvoucher"  id="rvform" name="rvform" method="post" accept-charset="utf-8" enctype="multipart/form-data">

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
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('jv_number'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo $invoice_no; ?>" readonly style="background-color: #dddddd94;"/>
                                        <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                    </div>
                                </div>
                                    
                                <div class="col-md-12">
                                    <input type="hidden" name="debit_total_sum" id="debit_total_sum" value="0">
                                    <input type="hidden" name="credit_total_sum" id="credit_total_sum" value="0">
                                    <div class="box-body">
                                    <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('ac_head'); ?> <button type="button" class="pull-right themecolor"  onclick="getMyModel()">Add +</button></th>
                                                <th><?php echo $this->lang->line('description'); ?></th>
                                                <th><?php echo $this->lang->line('debit'); ?></th>
                                                <th><?php echo $this->lang->line('credit'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php for ($i= 0; $i < count($account_id); ) { ?> 
                                                <?php $count = $i; ?>        
                                                <tr id="jv<?php echo $i;?>">
                                                <td><input onkeyup="autoSuggest(<?php echo $i;?>)" id="account_title<?php echo $i;?>" name="account_title[]" type="text" class="form-control" value="<?php echo $account_title[$i]; ?>" style="width: 200px;"/>
                                                <input id="account_id<?php echo $i;?>" name="account_id[]" type="hidden" value="<?php echo $account_id[$i]; ?>" />   
                                                <div id="data-container<?php echo $i;?>"></div>
                                                <span class="text-danger"><?php echo form_error('account_id'); ?></span>
                                                </td>
                                                <td><input id="description<?php echo $i;?>" name="description[]" type="text" class="form-control" value="<?php echo $description[$i]; ?>" style="width: 400px;"/>
                                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                </td>
                                                <td><input onchange="sumDebit(<?php echo $i;?>)" id="debit<?php echo $i;?>" name="debit[]" type="text" class="form-control"  value="<?php echo $debit[$i]; ?>" style="text-align: right;width: 120px;" data-debit="0"/>
                                                <span class="text-danger"><?php echo form_error('debit'); ?></span>
                                                </td>
                                                <td><input onchange="sumCredit(<?php echo $i;?>)" id="credit<?php echo $i;?>" name="credit[]" type="text" class="form-control" value="<?php echo $credit[$i]; ?>" style="text-align: right; width: 120px;" data-credit="0"/>
                                                <span class="text-danger"><?php echo form_error('credit'); ?></span>
                                                </td>
                                            </tr>

                                            <?php $i++ ;} ?>

                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="text-align: right;">
                                                    <b style="font-size: 16px;"><?php echo $this->lang->line('total'); ?>:</b>
                                                </td>
                                                <td><input id="debit_total" name="debit_total" type="text" class="form-control" value="<?php echo set_value('debit_total'); ?>" style="text-align: right;font-size: 16px; font-weight: 600; width: 120px;"/></td>
                                                
                                                <td><input id="credit_total" name="credit_total" type="text" class="form-control" value="<?php echo set_value('credit_total'); ?>" style="text-align: right;font-size: 16px; font-weight: 600; width: 120px;"/></td>
                                            </tr>
                                            <tr >
                                                <td colspan="4">
                                                    <button style="float: right;" type="button" class="btn colorbtn" id="add_more" data-id="<?php echo $count;?>" onclick="addMore()">Add More</button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="box-footer" style="float: right;">
                                    <button type="submit" class="btn btn-info pull-left colorbtn"><?php echo $this->lang->line('save_close'); ?></button>
                                </div>
                            
                            </div>
                        </form>    

                    </div>
                
            <?php } ?>

            
           
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('general_journal'); ?> </h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="download_label">
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
                                <?php //echo $this->lang->line('income_list'); ?> Journal Voucher List
                            </div>
                            </div>
                        </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('income_list'); ?>
                        </div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('ac_head'); ?></th>
                                        <th><?php echo $this->lang->line('desc'); ?></th>
                                        <th><?php echo $this->lang->line('debit'); ?></th>
                                        <th><?php echo $this->lang->line('credit'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($jvlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($jvlist as $list) {

                                            if($list['jvdata']['staff_std_id'] > 0){
                                                if($list['jvdata']['staff_type']=='student'){
                                                    $name = $this->journalvoucher_model->getstudentById($list['jvdata']['staff_std_id']);
                                                }if($list['jvdata']['staff_type']=='staff'){
                                                    $name = $this->journalvoucher_model->getstaffById($list['jvdata']['staff_std_id']);
                                                }
                                            }else{
                                                    $name = $list['jvdata']['name'];
                                            }
                                            ?>
                                            <tr style="background-color:#dddddd94">
                                                <td class="mailbox-name">
                                                    <?php echo $list['jvdata']['date']; ?></td>
                                                <td class="mailbox-name">
                                                    <?php echo $list['jvdata']["invoice_no"]; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $name; ?></a></td>
                                                
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-date pull-right text-right">
                                                    <?php if ($list['jvdata']['documents']) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/journalvoucher/download/<?php echo $list['jvdata']['documents'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_edit')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/journalvoucher/edit/<?php echo $list['jvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/journalvoucher/delete/<?php echo $list['jvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                             <?php if(!empty($list['jvlistdata'])){ ?>
                                                <?php  foreach ($list['jvlistdata'] as $newjvlist) { ?>   

                                            <tr>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name">
                                                    <?php echo $newjvlist['account_title']; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $newjvlist['description']; ?>
                                                </td>
                                                <td class="mailbox-name"><?php echo ($currency_symbol . $newjvlist['debit_amount']); ?></td>
                                                <td class="mailbox-name"><?php echo ($currency_symbol . $newjvlist['credit_amount']); ?></td>
                                                <td class="mailbox-date pull-right"></td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>

                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
function getMyModel() {
    $.ajax({
        type: 'POST',
        url: baseurl + "admin/account/getModel",
        dataType: 'html',
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
 // AJAX call for autocomplete 
    function autoSuggest(id){
        if($('#account_title'+id).val().length >= 3 ){
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

// $(document).on( "click", ".select_acc", function(){
//     var selected_country = $(this).html();
//     var id = $(".select_acc").attr('data-transid');
//     var account_id = $(".select_acc").attr('data-accid');
//     $('#account_title'+id).val(selected_country);
//     $('#account_id'+id).val(account_id);
//     $('#data-container'+id).html('');
// });

</script>

<script>

function sumDebit(id){
    
    var debitSum1  = parseFloat($('#debit'+id).val());
    var datavalue  = parseFloat($("#debit"+id).attr('data-debit'));
    if(debitSum1 > 0){
       var debitSum = parseFloat($('#debit_total_sum').val());
        //$('#credit'+id).prop("disabled", true);
        $('#credit'+id).attr('readonly','readonly');
        $('#credit'+id).css("background-color", "#dddddd94");
        var total  = debitSum + debitSum1-datavalue;
        $('#debit_total_sum').val(total);
        $('#debit_total').val(total);
        $("#debit"+id).attr('data-debit', debitSum1);
    }else{ 
        debitSum1 = 0;
        var debitSum  = parseFloat($('#debit_total_sum').val());
        //$('#credit'+id).prop("disabled", false);
        $('#credit'+id).removeAttr('readonly');
        $('#credit'+id).css("background-color", "#fff");
        var total  = debitSum + debitSum1-datavalue;
        $('#debit_total_sum').val(total);
        $('#debit_total').val(total);
        $("#debit"+id).attr('data-debit', debitSum1)
    }
}

function sumCredit(id){

    var creditSum1 = parseFloat($('#credit'+id).val());
    var datavalue  = parseFloat($("#credit"+id).attr('data-credit'));

    if(creditSum1 > 0){
        var creditSum = parseFloat($('#credit_total_sum').val());
        //$('#debit'+id).prop("disabled", true);
        $('#debit'+id).attr('readonly','readonly');
        $('#debit'+id).css("background-color", "#dddddd94");
        var total = creditSum + creditSum1-datavalue;
        $('#credit_total_sum').val(total);
        $('#credit_total').val(total);
        $("#credit"+id).attr('data-credit', creditSum1);
    }else{
        creditSum1 = 0;
        var creditSum    = parseFloat($('#credit_total_sum').val());
        //$('#debit'+id).prop("disabled", false);
        $('#debit'+id).removeAttr('readonly');
        //$('#debit'+id).attr('readonly','readonly');
        $('#debit'+id).css("background-color", "#fff");
        var total  = creditSum + creditSum1-datavalue;
        $('#credit_total_sum').val(total);
        $('#credit_total').val(total);
        $("#credit"+id).attr('data-credit', creditSum1)

    }
}

function addMore(){

    var id    = parseInt($("#add_more").attr('data-id'));
    var path  = '<?php echo base_url('admin/journalvoucher/getaddMoreList'); ?>';

    $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'action':'jvmorelist', 'id':id},
          beforeSend: function() {
              //$("#loading_image").show();
           },
          success: function(markup){

           if(markup!=''){
                $( "#jv"+id ).after( markup );
                var dataid = id+2;
                $("#add_more").attr('data-id', dataid);
           }else{
                $("#add_more").attr('data-id', 2);
            }
        }
    });   
}

$(document).ready(function(){
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
});
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#to_account").on('change', function(){

            if($(this).val()==104){
                $('#bank_accounts_div').show();
            }else{
                $('#bank_accounts_div').hide();
                $('#reference_number_div').hide();
                //$("#bank_accounts option:selected").prop("selected", false)
                $('#bank_accounts option:selected').removeAttr('selected');
            }
        })
        $("#bank_accounts").on('change', function(){
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
              { "width": "150px", "targets": 1 },
              { "width": "50px", "targets": 2 },
              { "width": "50px", "targets": 3 },
              { "width": "10px", "targets": 4 },
            ],
            fixedColumns: true
        } );
    } );

// Customer
// $('#search-box').autocomplete({
//     'source': function(request, response) {
//     if(request!=''){  
//         var path  = '<?php //echo base_url('admin/journalvoucher/autocomplete'); ?>';
//         $.ajax({
//             url: path,
//             type: "POST",
//             data: {'request':request},
//             dataType: 'html',
//             success: function(json) {
//                 console.log(json);
//                 json.unshift({
//                     telephone: '',
//                 });
//                 response($.map(json, function(item) {
//                     return {
//                         telephone: item['search'],
//                     }
//                 }));
//             }
//         });
//     }
//     },
//     'select': function(item) {
//         // Reset all custom fields
//         $('#input[name=\'search\']').val(item['search']);
//     }
// });
</script>