<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper" style="min-height: 946px;">   
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <?php $this->load->view('admin/staff/_staff_sidebar');?>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('payroll'); ?></h3>
                    </div>
                    <form id='form1' action="<?php echo site_url('admin/payroll') ?>"  method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <div class="row">

                                <?php
                                if ($this->session->flashdata('msg')) {


                                    echo $this->session->flashdata('msg');
                                }
                                ?>

                                <?php echo $this->customlib->getCSRF(); ?>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line("role"); ?>
                                        </label>
                                        <select autofocus="" onchange="getEmployeeName(this.value)" id="role" name="role" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $key => $class) {

                                                if (isset($_POST["role"])) {
                                                    $role_selected = $_POST["role"];
                                                } else {
                                                    $role_selected = '';
                                                }
                                                ?>
                                                <option value="<?php echo $class["type"] ?>" 
                                                <?php
                                                if ($class["type"] == $role_selected) {
                                                    echo "selected";
                                                }
                                                ?> ><?php print_r($class["type"]) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('role'); ?></span>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('month') ?></label>

                                        <select autofocus="" id="class_id" name="month" class="form-control" >
                                            <option value="select"><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            if (isset($month)) {
                                                $month_selected = date("F", strtotime($month));
                                            } else {
                                                $month_selected = date("F", strtotime("-1 month"));
                                            }
                                            foreach ($monthlist as $m_key => $month_value) {
                                                ?>
                                                <option value="<?php echo $m_key ?>" <?php
                                                if ($month_selected == $m_key) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $month_value; ?></option>
                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>    

                                        </select>
                                        <span class="text-danger"><?php echo form_error('month'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('year'); ?></label>

                                        <select autofocus="" id="class_id" name="year" class="form-control" >
                                            <option value="select"><?php echo $this->lang->line('select'); ?></option>
                                            <option <?php
                                            if ($year == date("Y", strtotime("-1 year"))) {
                                                echo "selected";
                                            }
                                            ?>  value="<?php echo date("Y", strtotime("-1 year")) ?>"><?php echo date("Y", strtotime("-1 year")) ?></option>
                                            <option <?php
                                            if ($year == date("Y")) {
                                                echo "selected";
                                            }
                                            ?>  value="<?php echo date("Y") ?>"><?php echo date("Y") ?></option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>
                                </div>   
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">  
                        <?php
                        if (isset($resultlist)) {
                            ?>
                        <div class="box-header ptbnull"></div> 

                        <div class="box-header ptbnull themecolor">
                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('staff'); ?> <?php echo $this->lang->line('list'); ?>
                                </i></h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                            <div class="box-body table-responsive">
                            <div class="download_label">
                                    <div class="row text" style="width:100%">
                                        <div style="width:15%; float:left" class="col-sm-3 text text-right">
                                            <?php $this->userdata = $this->customlib->getuserdata();
                                                                                $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                                                            //  echo '<pre>'; print_r($stting); die('setting'); 
                                                                        ?>
                                                <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/logo/<?php echo $stting[0]['image']?>" alt="Institute's Logo Not Found ">
                                        </div>
                                        <div style="width:80%; float:left; padding-top:20px;" class="col-sm-9 text text-left">
                                            <h4 id="school_name" style="margin-bottom:0px; padding-bottom:0px;  font-size:24px; font-weight:600"><?php echo $stting[0]['name']?></h4>
                                            <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px">
                                                <?php echo $stting[0]['address']?>
                                            </p>
                                            <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact #
                                                <?php echo $stting[0]['phone']; ?> Email :
                                                    <?php echo $stting[0]['email'];  ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top:0px; margin-top:0px">
                                        <div class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                        <?php echo $this->lang->line('staff'); ?> <?php echo $this->lang->line('list'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="download_label">
                                    <?php //echo $this->lang->line('staff'); ?> <?php echo $this->lang->line('list'); ?>
                                </div> -->
                                <table class="table table-striped table-hover example">
                                    <thead>

                                        <tr>
                                            <th><?php echo $this->lang->line('staff_id'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('role'); ?></th>
                                            <?php if ($sch_setting->staff_department) { ?>
                                                <th><?php echo $this->lang->line('department'); ?></th>
                                            <?php } if ($sch_setting->staff_designation) { ?>
                                                <th><?php echo $this->lang->line('designation'); ?></th>
                                            <?php } if ($sch_setting->staff_phone) { ?>
                                                <th><?php echo $this->lang->line('phone'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('status'); ?></th>
                                            <th class="text-right no-print"><?php echo $this->lang->line('action'); ?></th>

                                        </tr>
                                    </thead>            
                                    <tbody>    
                                        <?php
                                        $count = 1;
                                        foreach ($resultlist as $staff) {
                                            $status = $staff["status"];

                                            if ($staff["status"] == "paid") {
                                                $label = "class='label label-success'";
                                                $wstatus = $payroll_status[$staff["status"]];
                                            } else if ($staff["status"] == "generated") {
                                                $label = "class='label label-warning'";
                                                $wstatus = $payroll_status[$staff["status"]];
                                            } else {
                                                $label = "class='label label-default'";
                                                $wstatus = $payroll_status["not_generate"];
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $staff['employee_id']; ?></td>
                                                <td><?php echo $staff['name'] . " " . $staff['surname']; ?></td>
                                                <td><?php echo $staff['user_type']; ?></td>
                                                <?php if ($sch_setting->staff_department) { ?>
                                                    <td><?php echo $staff['department']; ?></td>
                                                <?php } if ($sch_setting->staff_designation) { ?>
                                                    <td><?php echo $staff['designation']; ?></td>
                                                <?php } if ($sch_setting->staff_phone) { ?>
                                                    <td><?php echo $staff['contact_no']; ?></td>
                                                    <?php } ?>
                                                <td><small <?php echo $label; ?>><?php echo $wstatus; ?></small></td>
                                                    <?php if ($status == "paid") { ?>

                                                    <td class="pull-right no-print" style="float:right !important">
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('staff_payroll', 'can_add')) {
                                                            ?>
                                                            <a class="btn btn-default btn-xs themecolor" onclick="return confirm('Are you sure you want to revert this record')" href="<?php echo base_url() . "admin/payroll/revertpayroll/" . $staff["payslip_id"] . "/" . $month_selected . "/" . date("Y") . "/" . $role_selected ?>" title="Revert">
                                                                <i class="fa fa-undo"> </i>
                                                            </a>
                                                        <?php } ?>
                                                        <?php
                                                        //if ($this->rbac->hasPrivilege('staff_payroll', 'can_edit')){
                                                            ?>
                                                            <!-- <a href="#" onclick="getRecord('<?php echo $staff["id"] ?>', '<?php echo $year ?>')" role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting themecolor" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>" ><i class="fa fa-pencil"> </i></a> -->

                                                        <?php //} ?>
                                                        <a href="javascript:void" onclick="getPayslip('<?php echo $staff["payslip_id"]; ?>')"  role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting themecolor" data-toggle="tooltip" title="<?php echo $this->lang->line('Payslip View'); ?>" ><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('payslip'); ?></a>


                                                    <?php } ?></td>
                                                    <?php if ($status == "generated") { ?>

                                                    <td class="pull-right no-print" style="float:right !important">
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('staff_payroll', 'can_delete')) {
                                                            ?>
                                                            <a href="<?php echo base_url() ?>admin/payroll/deletepayroll/<?php echo $staff["payslip_id"] . "/" . $month_selected . "/" . date("Y") . "/" . $role_selected ?>" class="btn btn-default btn-xs themecolor" onclick="return confirm('Are you sure you want to revert this record')" title="Revert">
                                                                <i class="fa fa-undo"> </i>
                                                            </a>
                                                                <?php
                                                            }
                                                            if ($this->rbac->hasPrivilege('staff_payroll', 'can_add')) {
                                                                ?>
                                                            <a href="#" onclick="getRecord('<?php echo $staff["id"] ?>', '<?php echo $year ?>')" role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting themecolor" data-toggle="tooltip" title="<?php echo $this->lang->line('Proceed to payment'); ?>" ><?php echo $this->lang->line('proceed_to_pay'); ?></a>

                                                        <?php
                                                    }
                                                }
                                                ?></td>

                                                    <?php if ($staff["payslip_id"] == 0) { ?>

                                                    <td class="pull-right no-print" style="float:right !important">
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('staff_payroll', 'can_add')) {
                                                            ?>
                                                            <a class="btn btn-primary btn-xs checkbox-toggle edit_setting themecolor" role="button" href="<?php echo base_url() . "admin/payroll/create/" . $month_selected . "/" . $year . "/" . $staff["id"] ?>"><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('payroll'); ?></a>
                                                <?php } ?>
                                                    </td>
                                            <?php } ?>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                        ?>
                                    </tbody></table>
                            </div>
                    
                        <?php } ?>
            
                        
            </div> 
        </div>
        <form action="<?php echo base_url('admin/payroll/create') ?>" method="post" id="formsubmit">
            <input type="hidden" name="month" id="month">
            <input type="hidden" name="year" id="year">
            <input type="hidden" name="staffid" id="staffid">
        </form>
    </section>
</div>

<div id="payslipview"  class="modal fade" role="dialog">

    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('details'); ?>   <span id="print1"></span></h4>
            </div>
            <div class="modal-body" id="testdata">


            </div>
        </div>
    </div>
</div>


<div id="proceedtopay" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('payslip'); ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form" id="schsetting_form" action="<?php echo site_url('admin/payroll/paymentSuccess') ?>">
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1">
                            <?php echo $this->lang->line('payslip_no'); ?></label>
                            <input type="text" name="invoice_no" readonly class="form-control" id="payslip_no" value="" style="background-color: #ccc;">

                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1">
                            <?php echo $this->lang->line('staff'); ?> <?php echo $this->lang->line('Name'); ?></label>
                            <input type="text" name="emp_name" readonly class="form-control" id="emp_name">
                            <input type="hidden" name="staff_std_id" class="form-control" id="staff_std_id">
                        </div>
                        
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('date'); ?></label><br/><span id="remark"> </span>
                            <input type="text" name="payment_date" id="payment_date" class="form-control" value="<?php echo date("m/d/Y") ?>">
                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1">
                            <?php echo $this->lang->line("month") ?> <?php echo $this->lang->line('year'); ?></label> 
                            <input id="monthid" name="month" readonly placeholder="" type="text" class="form-control" />
                            <input  name="paymentmonth" placeholder="" type="hidden" class="form-control" />
                            <input name="paymentyear" placeholder="" type="hidden" class="form-control" />
                            <input name="paymentid" placeholder="" type="hidden" class="form-control" />
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('note'); ?></label><br/><span id="remark"> </span>
                            <input type="text" name="remarks" class="form-control" value="">
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('mode'); ?></label><small class="req"> *</small><br/><span id="remark">
                            </span>
                            <select autofocus="" id="payment_mode" name="payment_mode" class="form-control" >
                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                <option value="30"><?php echo $this->lang->line('cash'); ?></option>
                                <option value="31"><?php echo $this->lang->line('bank'); ?></option>
                            </select>
                            <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>
                        </div>
                        <div style="display: none;" id="deposit_cash"> 
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('cash'); ?> <?php echo $this->lang->line('account'); ?></label>
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
                        </div>
                        <div style="display: none;" id="bank_accounts_div2"> 
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('bank'); ?> <?php echo $this->lang->line('account'); ?> </label>
                                <select autofocus="" id="bank_account_id2" name="bank_account_id" class="form-control" >
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <?php
                                    foreach ($bankAccounts as $bankAccount) {
                                        ?>
                                        <option value="<?php echo $bankAccount['id'] ?>"<?php
                                        if (set_value('bank_account_id') == $bankAccount['id']) {
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
                        <div style="display: none;" id="reference_number_div2">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('reference_no'); ?></label>
                                <input id="reference_number2" name="reference_number" placeholder="" type="text" class="form-control"  value="" />
                                <span class="text-danger"><?php echo form_error('reference_no'); ?></span>
                            </div>
                        </div>

                        

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-hover table-striped table-bordered" id="example_table" >
                                <thead >
                                    <tr class="themecolor" >
                                        <th style="background-color:#dddddd94; color: #fff;">A/C Head</th>
                                        <th style="text-align: left;background-color:#dddddd94"></th>
                                        <th style="text-align:right;background-color:#dddddd94; color: #fff;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr id="basic_salry"></tr>
                                </tbody>
                                <tbody id="allowance"></tbody>
                                <thead>
                                    <tr> 
                                        <td style="background-color:#dddddd94">
                                            
                                        </td>
                                        <td style="text-align: right;background-color:#dddddd94; font-size: 16px;">
                                            <?php echo $this->lang->line('total') . " " . $this->lang->line('pay'); ?>:</td>
                                            <input type="hidden" name="amount" id="amount">
                                        <td id="totalpay" style="text-align:right;background-color:#dddddd94; font-size: 16px;"></td>
                                    </tr>
                                </thead>

                            </table>
                           
                            <!-- /.table -->
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-primary submit_schsetting pull-right themecolor" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save'); ?></button>
                        </div>

                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        $("#payment_mode").on('change', function(){

            if($(this).val()==31){
                $('#bank_accounts_div2').show();
                $('#deposit_cash_id option:selected').removeAttr('selected');
                $('#deposit_cash').hide();
            }else if($(this).val()==30){
                $('#bank_accounts_div2').hide();
                $('#reference_number_div2').hide();
                $('#deposit_cash').show();
                $('#bank_accounts option:selected').removeAttr('selected');
            }else{
                $('#deposit_cash_id option:selected').removeAttr('selected');
                $('#deposit_cash').hide();
                $('#bank_accounts_div2').hide();
                $('#reference_number_div2').hide();
                $('#bank_accounts option:selected').removeAttr('selected');
            }
        })
        $("#bank_account_id2").on('change', function(){
            if($(this).val()!=''){
                $('#reference_number_div2').show();
            }else{
                $('#reference_number_div2').hide();
            }
            
        })

    });
</script>
<script type="text/javascript">

    // AJAX call for autocomplete 
    function autoSuggest(){
        
        if($('#account_title').val().length >= 3){
            var resp_data_format="";
            var path  = '<?php echo base_url('admin/payroll/autocomplete'); ?>';
            $.ajax({
                method: "POST",
                dataType: "json",
                url: path,
                data:'parent_id=2&account_type_id=11&keyword='+$('#account_title').val(),
                beforeSend: function(){
                    ///$("#search_query").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(response){

                    resp_data_format+='<ul style="list-style-type: none;">';
                    if(response.length > 0){
                        for (var i = 0; i < response.length; i++) {
                            resp_data_format=resp_data_format+'<li><a href="javascript:" id="listid'+response[i].id+'" onclick="setSelectAcc('+response[i].id+')" >'+response[i].account_number+' - '+response[i].account_title+'</a></li>';
                        };
                        resp_data_format+='</ul>';
                        $("#data-container").html(resp_data_format);
                    }

                }
            });
        }
    }

    function setSelectAcc(account_id){
        var account_title = $("#listid"+account_id).html();
        $('#account_title').val(account_title);
        $('#account_id').val(account_id);
        $('#data-container').html('');
    }


    function getRecord(id, year) {
        //  alert(year);
        $('input[name="amount"]').val('');
        $('input[name="emp_name"]').val('');
        $('input[name="paymentid"]').val('');
        $('input[name="paymentmonth"]').val('');
        $('input[name="paymentyear"]').val('');
        $('#monthid').val('');
        $('#staff_std_id').val('');
        $('#payslip_no').val('');

        var month = '<?php echo $month_selected ?>';
        // var year = '<?php echo date('Y'); ?>';
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/payroll/paymentRecord',
            type: 'POST',
            data: {staffid: id, month: month, year: year},
            dataType: "json",
            success: function (result) {

                console.log(result); 
                $('#payslip_no').val(result.result.invoice_no);

                $('#basic_salry').html('<td><input type="text" id="account_title" name="account_title" value="" style="width: 300px;" onkeyup="autoSuggest()" class="form-control" placeholder="Select Account Head" required ><input id="account_id" name="account_id" type="hidden" value="" /><input id="total_wages" name="total_wages" type="hidden" value="'+result.result.basic+'" /><div id="data-container"></div></td><td style="text-align: left;"></td><td style="text-align: right;" ><b>'+result.result.basic+'</b></td>');

                if(result.allowances.length > 0){

                    var html = '';
                    for (var i = 0; i < result.allowances.length; i++) {
                        //console.log(result.allowances[i]);
                        if(result.allowances[i].cal_type == 'positive'){

                        html+='<tr><td>'+result.allowances[i].allowance_type+'</td><input type="hidden" name="allowances[]" id="allowances" value="'+result.allowances[i].amount+'"><input type="hidden" name="allowance_id[]" id="allowance_id" value="'+result.allowances[i].account_head_id+'">';
                        html+='<td style="text-align: left;"></td>';
                        html+='<td style="text-align: right;">'+result.allowances[i].amount+'</td></tr>';

                        }else if(result.allowances[i].cal_type == 'negative'){

                        html+='<tr><td>'+result.allowances[i].allowance_type+'</td><input type="hidden" name="tax_deduction[]" id="tax_deduction" value="'+result.allowances[i].amount+'"><input type="hidden" name="tax_deduction_id[]" id="tax_deduction_id" value="'+result.allowances[i].account_head_id+'">';
                        html+='<td style="text-align: left;"></td>';
                        html+='<td style="text-align: right;">'+result.allowances[i].amount+'</td></tr>';

                        }
                    }
                    $('#allowance').html(html);
                }

                $('input[name="amount"]').val(result.result.basic);
                $('input[name="emp_name"]').val(result.result.account_no +' - '+ result.result.name + ' ' + result.result.surname );
                $('input[name="paymentid"]').val(result.result.id);
                $('input[name="paymentmonth"]').val(month);
                $('input[name="paymentyear"]').val(year);
                $('#monthid').val(month + '-' + year);
                $('#totalpay').html(result.result.net_salary);
                $('#staff_std_id').val(result.result.staff_std_id);
                


            }
        });

        $('#payment_date').datepicker({
            format: date_format,
            autoclose: true
        });
        $('#proceedtopay').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });

    }
    ;


    function popup(data)
    {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }

    function getPayslip(id) {



        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/payroll/payslipView',
            type: 'POST',
            data: {payslipid: id},
            //dataType: "json",
            success: function (result) {
                $("#print1").html("<a href='#'  class='pull-right modal-title moprintblack'  onclick='printData(" + id + ")'  title='Print' ><i class='fa fa-print'></i></a>");
                //$("#print1").html("<a  class='pull-right modal-title moprint'  onclick='printData("+id+")'  title='Print' ><i class='fa fa-print'></i></a>"); remove moprint class  
                $("#testdata").html(result);

            }
        });



        $('#payslipview').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });

    }
    ;

    function printData(id) {

        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/payroll/payslipView',
            type: 'POST',
            data: {payslipid: id},
            //dataType: "json",
            success: function (result) {

                $("#testdata").html(result);
                popup(result);
            }
        });
    }
    function getEmployeeName(role) {

        var base_url = '<?php echo base_url() ?>';
        $("#name").html("<option value=''>select</option>");
        var div_data = "";
        $.ajax({
            type: "POST",
            url: base_url + "admin/staff/getEmployeeByRole",
            data: {'role': role},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    div_data += "<option value='" + obj.name + "'>" + obj.name + "</option>";
                });

                $('#name').append(div_data);
            }
        });
    }
    function create(id) {

        var month = '<?php
if (isset($_POST["month"])) {
    echo $_POST["month"];
}
?>';
        var year = '<?php
if (isset($_POST["year"])) {
    echo $_POST["year"];
}
?>';

        $("#month").val(month);
        $("#year").val(year);
        $("#staffid").val(id);
        $("#formsubmit").submit();


    }


    $(document).on('click', '.submit_schsetting', function (e) {

        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("admin/payroll/paymentSuccess") ?>',
            type: 'post',
            data: $('#schsetting_form').serialize(),
            dataType: 'json',
            success: function (data) {


                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(data.message);
                    window.location.reload(true);
                }

                $this.button('reset');
            }
        });
    });

    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
    });
</script>