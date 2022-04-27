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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-usd"></i> <?php echo $this->lang->line('edit').' '.$this->lang->line('payment_voucher'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('paymentvoucher', 'can_add')) {
                ?>
                <?php $this->load->view('admin/income/_sidemenu');?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit').' '.$this->lang->line('payment_voucher'); ?></h3>
                        </div><!-- /.box-header -->
                        <form action="<?php echo base_url("admin/paymentvoucher/edit/". $id) ?>"  id="pvform" name="pvform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                        <label for="students"><?php echo $this->lang->line('student'); ?></label>&nbsp;
                                        <?php if($pvresult['staff_type']=='student'){?>    
                                        <input onchange="checkTypeEdit('student',0)" type="checkbox" name="staff_type" value="student" id="student" checked >&nbsp;&nbsp;
                                        <?php }else{?>
                                            <input onchange="checkTypeEdit('student',0)" type="checkbox" name="staff_type" value="student" id="student" >&nbsp;&nbsp;
                                        <?php }?>
                                        <label for="staff"><?php echo $this->lang->line('staff'); ?></label>&nbsp;&nbsp;
                                        <?php if($pvresult['staff_type']=='staff'){?> 
                                            <input onchange="checkTypeEdit('staff',0)" type="checkbox" name="staff_type" value="staff" id="staff" checked>
                                        <?php }else{?>
                                            <input onchange="checkTypeEdit('staff',0)" type="checkbox" name="staff_type" value="staff" id="staff">
                                        <?php }?>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?><small class="req"> *</small></label>
                                    </div>

                                    <div id="class_section_div" style="display:none;">
                                        <div class="col-sm-3">
                                            <div class="form-group"> 
                                                <select autofocus="" id="class_id" name="class_id" class="form-control">
                                                    <option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('class'); ?><small class="req"> *</small></option>
                                                    <?php foreach ($classlist as $class) { ?>
                                                        <option value="<?php echo $class['id'] ?>"<?php
                                                        if (set_value('class_id', $pvresult['class_id']) == $class['id']) { echo "selected = selected"; }
                                                        ?>><?php echo $class['class'] ?></option>
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
                                            <input id="name" name="name" placeholder="Enter Name" type="text" class="form-control"  value="<?php echo set_value('name', $pvresult['name']); ?>" />
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
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('pv_number'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('invoice_no', $pvresult['invoice_no']); ?>" readonly style="background-color: #dddddd94;"/>
                                        <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                    </div>
                                </div>
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-6"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('cash_bank'); ?><small class="req"> *</small></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select autofocus="" id="cash_bank" name="cash_bank" class="form-control" onchange="getval();">
                                            <?php if($pvresult['cash_bank']==31){?>
                                                <option value="31" selected><?php echo $this->lang->line('bank'); ?></option>
                                                <option value="30"><?php echo $this->lang->line('cash'); ?></option>
                                            <?php }else{?>
                                                <option value="30" selected><?php echo $this->lang->line('cash'); ?></option>
                                                <option value="31"><?php echo $this->lang->line('bank'); ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?php //echo form_error('inc_head_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="deposit_cash">
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('deposit_cash'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select autofocus="" id="deposit_cash_id" name="deposit_cash_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($deposit_cash_accounts as $deposit_cash_account) {
                                                ?>
                                                <option value="<?php echo $deposit_cash_account['id'] ?>"<?php
                                                if (set_value('deposit_cash_id', $pvresult['bank_account_id']) == $deposit_cash_account['id']) {
                                                    echo "selected = selected";
                                                }
                                                ?>><?php echo $deposit_cash_account['account_title'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('deposit_cash_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bank_accounts_div">
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('bank_acc'); ?></label><small class="req"> *</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        
                                        <select autofocus="" id="bank_account_id" name="bank_account_id" class="form-control" onchange="getBankAccId()">
                                            <option value="" ><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($bankAccounts as $bankAccount) {
                                                ?>
                                                <option value="<?php echo $bankAccount['id'] ?>"<?php
                                                if (set_value('bank_account_id', $pvresult['bank_account_id']) == $bankAccount['id']) {
                                                    echo "selected = selected";
                                                }
                                                ?>><?php echo $bankAccount['account_title'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('bank_account_id'); ?></span>
                                    </div>
                                    
                                </div>    
                                <div class="col-md-12">
                                    <div class="form-group col-md-6"></div>
                                    <div style="display: none;" id="reference_number_div">
                                        <div class="form-group col-md-2">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('ref_no'); ?><small class="req"> *</small></label>
                                            </div>
                                        <div class="form-group col-md-4" >
                                            <input id="reference_number" name="reference_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('invoice_no', $pvresult['reference_number']); ?>" />
                                            <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="total_sum" id="total_sum" value="0">
                                    
                                        <div class="box-body">
                                            <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('ac_head'); ?></th>
                                                        <th><?php echo $this->lang->line('description'); ?></th>
                                                        <th><?php echo $this->lang->line('amount'); ?></th>
                                                        <td><?php echo $this->lang->line('action'); ?></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php for ($i= 0; $i < count($account_id); ) { ?>
                                                        <tr id="pv<?php echo $i;?>">
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
                                                            <input id="amount<?php echo $i;?>" name="amount[]" type="text" class="form-control" onchange="sum(<?php echo $i;?>);" value="<?php echo $amount[$i]; ?>" style="text-align: right;width:200px" data-amt="0"/>
                                                            <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                        </td>
                                                        <td>
                                                            <?php if($i > 0){?>
                                                                <button id="add_more<?php echo $i;?>" type="button" class="btn btn-danger pull-right" data-id="<?php echo $i;?>" onclick="removeMore(<?php echo $i;?>)">x</button>
                                                            <?php }else{ ?>
                                                                    <button type="button" class="btn btn-info pull-right themecolor" id="add_more<?php echo $i;?>" data-id="<?php echo $i;?>" onclick="addMore(<?php echo $i;?>)">+</button>
                                                            <?php } ?>
                                                            
                                                        </td>
                                                        <?php $i++ ;} ?>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td style="text-align:right;"><b style="font-size: 16px;"><?php echo $this->lang->line('total'); ?>:</b></td>
                                                        <td>
                                                            <input id="total_amount" name="total_amount" type="text" class="form-control" value="<?php echo set_value('name', $pvresult['total_amount']); ?>" style="text-align: right; font-size: 16px; font-weight: 600;"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    
                                    <!-- /.table -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" id="submitpv" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                        
                            </div>
                        </form>
                    </div><!--/.col (right) -->
                <!-- left column -->
                </div>
        <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('payment_voucher_list'); ?></h3>
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
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php //echo $this->lang->line('income_list'); ?> Payment Voucher List
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
                                        <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('ac_head'); ?></th>
                                        <th><?php echo $this->lang->line('desc'); ?></th>
                                        <th><?php echo $this->lang->line('amount'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($pvoucherlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($pvoucherlist as $list) {

                                            if($list['pvdata']['staff_std_id'] > 0){

                                                if($list['pvdata']['staff_type']=='student'){
                                                    $name = $this->paymentvoucher_model->getstudentById($list['pvdata']['staff_std_id']);
                                                }else{
                                                      $name = $this->paymentvoucher_model->getstaffById($list['pvdata']['staff_std_id']);
                                                }
                                            }else{
                                                $name = $list['pvdata']['name'];
                                            }

                                            ?>
                                            <tr style="background-color:#dddddd94">
                                                <td class="mailbox-name">
                                                    <?php echo $list['pvdata']['date']; ?></td>
                                                <td class="mailbox-name">
                                                    <?php echo $list['pvdata']["invoice_no"]; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $name; ?></a>
                                                </td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>

                                                <td class="mailbox-date pull-right text-right">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('paymentvoucher', 'can_view')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/paymentvoucher/view/<?php echo $list['pvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php
                                                    if ($this->rbac->hasPrivilege('paymentvoucher', 'can_edit')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/paymentvoucher/edit/<?php echo $list['pvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('paymentvoucher', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/paymentvoucher/delete/<?php echo $list['pvdata']['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                            </tr>

                                            <?php if(!empty($list['pvlistdata'])){ ?>
                                                <?php  foreach ($list['pvlistdata'] as $newpvlist) { ?>
                                            <tr>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"></td>

                                                <td class="mailbox-name">
                                                    <?php echo $newpvlist['account_title']; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $newpvlist['description']; ?>
                                                </td>
                                                <td class="mailbox-name"><?php echo ($currency_symbol . $newpvlist['amount']); ?></td>

                                                <td></td>

                                            </tr>
                                            <?php } ?>
                                            <?php } ?>

                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function () {
        getval();
        getBankAccId();

        var counter = '<?php echo $counter;?>';
        for (var i = 0; i < counter; i++) {
            sum(i);
        }
        staff_type      = '<?php echo $pvresult['staff_type'];?>';
        staff_std_id    = '<?php echo $pvresult['staff_std_id'];?>';
        checkTypeEdit(staff_type, staff_std_id);
        
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });

    });

function checkTypeEdit(staff_type, staff_std_id){
    $('.check').not(this).prop('checked', false);
    
    if(staff_type=='staff' && $("#staff").prop('checked')==true){

        $("#student").removeAttr('checked');
        $('#name').val('');
        $('#name_div').hide();
        $('#staff_div').show();
        $('#staff_div').html('<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('staff'); ?> *</option></select>');
        $('#class_section_div').hide();

    }else if(staff_type=='student' && $("#student").prop('checked')==true){
        $('#staff').prop('checked', false);
        $("#staff").removeAttr('checked');
        $('#name').val('');
        $('#name_div').hide();
        $('#class_section_div').show();
        $('#staff_div').show();
        $('#staff_div').html('<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('student'); ?> *</option></select>');
        $('#class_id').trigger("change");
    }else{
        $('#staff_div').html('');
        $('#name_div').show();
        $('#staff_div').hide();
        $('#class_section_div').hide();
        $('#name').val('<?php echo $pvresult['name']; ?>');
    } 
    //alert(staff_type);
    if($("#staff").prop('checked')==true && staff_type=='staff'){
        var path  = '<?php echo base_url('admin/income/getIncomeStaffStudents'); ?>';
        $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'staff_type':staff_type,'staff_std_id':staff_std_id},
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
}

$(document).on('change', '#class_id', function (e) {
    $('#section_id').html("");
    var section_id      = '<?php echo $pvresult['section_id'];?>';
    var class_id = $(this).val();
    var base_url = '<?php echo base_url() ?>';
    var div_data = '';
    div_data = '<option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('section'); ?> *</option>';
    if(class_id!=''){
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
                    if(section_id == obj.section_id){
                        div_data += "<option value=" + obj.section_id + " selected>" + obj.section + "</option>";
                    }else{
                       div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>"; 
                    }
                    
                });
                $('#section_id').html(div_data);
                $('#section_id').trigger("change");
            },
            complete: function () {
                $('#section_id').removeClass('dropdownloading');
            }
        });
    }else{
        $('#section_id').html('<select autofocus="" id="section_id" name="section_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('section'); ?> *</option></select>');
    }
});
$(document).on('change', '#section_id', function (e) {
    var staff_std_id      = '<?php echo $pvresult['staff_std_id'];?>';
    $('#name_div').hide();
    $('#staff_std_id').html("");
    var class_id = $("#class_id").val();
    var section_id = $("#section_id").val();
    var staff_type = $("#student").val();
    var path  = '<?php echo base_url('admin/income/getIncomeStaffStudents'); ?>';
    if(class_id!='' && section_id!=''){
        $.ajax({
            type: "POST",
            url: path,
            data: {'staff_type':staff_type,'staff_std_id':staff_std_id, 'class_id': class_id, 'section_id': section_id},
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
    }else{
        $('#staff_div').html('<select autofocus="" id="staff_std_id" name="staff_std_id" class="form-control" ><option value=""><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('student'); ?> *</option></select>');
    }
});

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

function addMore(row){
    var row   = parseInt($("#add_more"+row).attr('data-id'));
    var path  = '<?php echo base_url('admin/paymentvoucher/getaddMoreList'); ?>';
    $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'action':'pvmorelist', 'row':row},
          beforeSend: function() {
              //$("#loading_image").show();
           },
          success: function(data){
           if(data!=''){
                $( "#pv"+row ).after( data );
                var rowid = row+1;
                $("#add_more0").attr('data-id', rowid);
           }else{
                $("#add_more0").attr('data-id', 0);
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
    var row = parseInt($("#add_more"+row).attr('data-id'));
    
    if(row!=0){
        var rowid  = row-1;
        $("#add_more").attr('data-id', rowid);
        $('#pv'+row).remove();
    }else{
        $("#add_more").attr('data-id', 1);
    }
}

</script>

<script type="text/javascript">
    function getval(){
        var id = $('#cash_bank option:selected').val();
        
        if(id==31){
            $('#bank_accounts_div').show();
            $('#deposit_cash_id option:selected').removeAttr('selected');
            $('#deposit_cash').hide();
            getBankAccId()
        }else if(id==30){
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
    }  
    function getBankAccId(){
        //selid = '<?php //echo $pvresult['bank_account_id'] ;?>';
        var id = $('#bank_account_id option:selected').val();
        if(id!=''){
            $('#reference_number_div').show();
        }else{
            $('#reference_number_div').hide();
        }
    } 



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



    // $(document).ready(function () {
    //     $('#example_table').DataTable({
            
            
    //     });
    // });
</script>