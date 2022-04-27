<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    $path = "";
    
    include "qrlib.php";  
    
?>
<div class="content-wrapper" style="min-height: 393px;">   
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header themecolor">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="box-title"><?php echo $this->lang->line('staff'); ?> <?php echo $this->lang->line('details'); ?></h3>
                            </div>  
                            <div class="col-md-8 ">
                                <div class="btn-group pull-right">
                                    <a href="<?php echo base_url() ?>admin/payroll" type="button" class="btn btn-xs themecolor">
                                        <i class="fa fa-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>  
                    </div><!--./box-header-->    
                    <div class="box-body" style="padding-top:0;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="sfborder">  
                                    <div class="col-md-2">
                                        <div class="row">
                                            <?php
                                            $image = $result['image'];
                                            if (!empty($image)) {

                                                $file = $result['image'];
                                            } else {

                                                $file = "no_image.png";
                                            }
                                            ?>
                                            <img width="115" height="115" class="round5" src="<?php echo base_url() . "uploads/staff_images/" . $file ?>" alt="No Image">
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-2">
                                        <div class="row">
                                            <?php
                                                 $filename = 'temp/'.$result["id"].'.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
        
                                       //default data  
        QRcode::png('Staff Payroll -  '. $result["name"] . " " . $result["surname"], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
        
        $link = "http://".$_SERVER['HTTP_HOST']."/";
 echo '<img src="'.$link.$PNG_WEB_DIR.basename($filename).'" class=" img-responsive " />'; 
                                                ?>
                                        </div>
                                    </div>  
                                    
                                                                               

                                    <div class="col-md-8">
                                        <div class="row">
                                            <table class="table mb0 font13">
                                                <tbody>
                                                    <tr>
                                                        <th class="bozero"><?php echo $this->lang->line("name"); ?></th>
                                                        <td class="bozero"><?php echo $result["name"] . " " . $result["surname"] ?></td>                                                
                                                        <th class="bozero"><?php echo $this->lang->line('staff_id'); ?></th>
                                                        <td class="bozero"><?php echo $result["employee_id"] ?></td>                                                
                                                    </tr>
                                                    <tr>
                                                        <?php if ($sch_setting->staff_phone) { ?>
                                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                                        <?php } ?>
                                                        <td><?php echo $result["contact_no"] ?></td>
                                                        <th><?php echo $this->lang->line('email'); ?></th>
                                                        <td><?php echo $result["email"] ?>                                   </td>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($sch_setting->staff_epf_no) { ?>
                                                            <th><?php echo $this->lang->line('epf_no'); ?></th>
                                                            <td><?php echo $result["epf_no"] ?></td>
                                                        <?php } ?>
                                                        <th><?php echo $this->lang->line('role'); ?></th>
                                                        <td><?php echo $result["user_type"] ?></td>                                  
                                                    </tr>
                                                    <tr>
                                                        <?php if ($sch_setting->staff_department) { ?>
                                                            <th><?php echo $this->lang->line('department'); ?></th>
                                                            <td><?php echo $result["department"] ?></td>
                                                        <?php } if ($sch_setting->staff_designation) { ?>
                                                            <th><?php echo $this->lang->line('designation'); ?></th>
                                                            <td><?php echo $result["designation"] ?>   </td>
                                                        <?php } ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            

                                                
                                        </div>
                                    </div>

                                </div></div><!--./col-md-8-->
                            <div class="col-md-12 col-sm-12">

                                <div class="sfborder relative overvisible"> 
                                    <div class="letest">
                                        <div class="rotatetest"><?php echo $this->lang->line("attendance") ?></div>
                                    </div> 
                                    <div class="padd-en-rtl33"> 
                                        <table class="table mb0 font13" >
                                            <tr>
                                                <th  class="bozero"><?php echo $this->lang->line('month'); ?></th>
                                                <?php foreach ($attendanceType as $key => $value) { ?>
                                                    <th class="bozero"><span data-toggle="tooltip" title="<?php echo $value["type"]; ?>"><?php echo strip_tags($value["key_value"]); ?></span></th>  
                                                <?php }
                                                ?>

                                                <th class="bozero"><span data-toggle="tooltip" title="<?php echo $this->lang->line('approved'); ?> <?php echo $this->lang->line('leave'); ?>">V</span></th>
                                            </tr>
                                            <?php
                                            foreach ($monthAttendance as $attendence_key => $attendence_value) {
                                                ?><tr>
                                                    <td><?php echo date("F", strtotime($attendence_key)); ?></td>
                                                    <td><?php echo $attendence_value['present'] ?></td>
                                                    <td><?php echo $attendence_value['late']; ?></td> 
                                                    <td><?php echo $attendence_value['absent']; ?></td> 
                                                    <td><?php echo $attendence_value['half_day']; ?></td> 
                                                    <td><?php echo $attendence_value['holiday']; ?></td>
                                                    <td><?php echo $monthLeaves[date("m", strtotime($attendence_key))]; ?></td>                                   
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>


                                            </tr>

                                        </table>
                                    </div>
                                </div>

                            </div><!--./col-md-8-->   
                            <div class="col-md-12">
                                <div style="background: #dadada; height: 1px; width: 100%; clear: both; margin-bottom: 10px;"></div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <form class="form-horizontal" action="<?php echo site_url('admin/payroll/payslip') ?>" method="post"  id="employeeform">
                        <div class="box-header">
                            <div class="row display-flex">
                                <div class="col-md-4 col-sm-4">
                                    <?php $i =0;?>
                                    <h3 class="box-title"><?php echo $this->lang->line('earning'); ?></h3>
                                    <button type="button" data-earning="<?php echo $i;?>" onclick="add_more()" class="plusign themecolor" id="earning_id"><i class="fa fa-plus"></i></button>
                                    <div class="sameheight">
                                        <div class="feebox">
                                            <table class="table3" id="tableID">
                                                
                                                <tr id="row0">
                                                    <td><input onkeyup="autoSugAllownce(<?php echo $i;?>)" type="text" class="form-control" id="allowance_type<?php echo $i;?>" name="allowance_type[]" placeholder="Type">
                                                        <input id="earning_account_id<?php echo $i;?>" name="earning_account_id[]" type="hidden" value="" />   
                                                    <div id="data-container<?php echo $i;?>"></div>
                                                    </td>
                                                    <td><input type="text" id="allowance_amount" name="allowance_amount[]" class="form-control" value="0"></td>

                                                </tr>
                                            </table>
                                        </div>  
                                    </div>
                                </div><!--./col-md-4-->
                                <div class="col-md-4 col-sm-4">
                                    <?php $j = 0;?>
                                    <h3 class="box-title"><?php echo $this->lang->line('deduction'); ?></h3>
                                    <button type="button" id="deduction_id" data-deduction="<?php echo $j;?>" onclick="add_more_deduction()" class="plusign themecolor"><i class="fa fa-plus"></i></button>
                                    <div class="sameheight">
                                        <div class="feebox">
                                            <table class="table3" id="tableID2">
                                                
                                                <tr id="deduction_row0">
                                                    <td>
                                                        <input onkeyup="autoSugDeduction(<?php echo $j;?>)" type="text" id="deduction_type<?php echo $j;?>" name="deduction_type[]" class="form-control" placeholder="Type">
                                                        <input id="deduction_account_id<?php echo $j;?>" name="deduction_account_id[]" type="hidden" value="" />   
                                                    <div id="data-container-deduc<?php echo $j;?>"></div>
                                                    </td>
                                                    <td><input type="text" id="deduction_amount" name="deduction_amount[]" class="form-control" value="0"></td>

                                                </tr>

                                            </table>
                                        </div>
                                    </div>  
                                </div><!--./col-md-4--> 
                                <div class="col-md-4 col-sm-4">

                                    <h3 class="box-title"><?php echo $this->lang->line('payroll'); ?> <?php echo $this->lang->line('summary'); ?>(<?php echo $currency_symbol ?>)</h3>
                                    <button type="button" onclick="add_allowance()" class="plusign themecolor"><i class="fa fa-calculator"></i> <?php echo $this->lang->line('calculate'); ?></button>
                                    <div class="sameheight">
                                        <div class="payrollbox feebox">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('basic_salary'); ?></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="basic" value="<?php
                                                    if (!empty($result["basic_salary"])) {
                                                        echo $result["basic_salary"];
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>" id="basic"  type="text" />
                                                </div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('earning'); ?></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="total_allowance" id="total_allowance"  type="text" />
                                                </div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('deduction'); ?></label>
                                                <div class="col-sm-8 deductiondred">
                                                    <input class="form-control" name="total_deduction" id="total_deduction" type="text" style="color:#f50000" />
                                                </div>
                                            </div><!--./form-group-->

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('gross_salary'); ?></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="gross_salary" id="gross_salary" value="0" type="text" />
                                                </div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('tax'); ?></label>
                                                <div class="col-sm-8 deductiondred">
                                                    <input class="form-control" name="tax" id="tax" value="0" type="text" />
                                                </div>
                                            </div><!--./form-group-->

                                            <hr/>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo $this->lang->line('net_salary'); ?></label>
                                                <div class="col-sm-8 net_green">
                                                    <input class="form-control greentest"  name="net_salary" id="net_salary"  type="text" />
                                                    <span class="text-danger" id="err"><?php echo form_error('net_salary'); ?></span>

                                                    <input class="form-control" name="staff_id" value="<?php echo $result["id"]; ?>"  type="hidden" />

                                                    <input class="form-control" name="month" value="<?php echo $month; ?>"  type="hidden" />
                                                    <input class="form-control" name="year" value="<?php echo $year; ?>"  type="hidden" />

                                                    <input class="form-control" name="status" value="generated"  type="hidden" />

                                                </div>
                                            </div><!--./form-group-->
                                        </div>
                                    </div> 
                                </div><!--./col-md-4--> 
                                <div class="col-md-12 col-sm-12">

                                    <button type="submit" id="contact_submit" class="btn pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                                </div><!--./col-md-12--> 
                                </form>
                            </div><!--./row-->  
                        </div><!--./box-header-->  
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </section>
</div>

<script type="text/javascript">

    // AJAX call for autocomplete 
    function autoSugAllownce(id){
        if($('#allowance_type'+id).val().length >= 3){

            var resp_data_format="";
            var path  = '<?php echo base_url('admin/receiptvoucher/autocomplete'); ?>';
            $.ajax({
            method: "POST",
            dataType: "json",
            url: path,
            data:'keyword='+$('#allowance_type'+id).val(),
            beforeSend: function(){
                ///$("#search_query").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(response){

                resp_data_format+='<ul style="list-style-type: none; padding-left:5px">';
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
        $('#allowance_type'+listid).val(account_title);
        $('#earning_account_id'+listid).val(account_id);
        $('#data-container'+listid).html('');
    } 

        // AJAX call for autocomplete 
    function autoSugDeduction(id){

        if($('#deduction_type'+id).val().length >= 3){
            var resp_data_format="";
            var path  = '<?php echo base_url('admin/receiptvoucher/autocomplete'); ?>';
            $.ajax({
            method: "POST",
            dataType: "json",
            url: path,
            data:'keyword='+$('#deduction_type'+id).val(),
            beforeSend: function(){
                ///$("#search_query").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(response){

                resp_data_format+='<ul style="list-style-type: none;padding-left:5px">';
                if(response.length > 0){
                    for (var i = 0; i < response.length; i++) {
                        resp_data_format=resp_data_format+'<li><a href="javascript:" id="listid'+response[i].id+'" onclick="setSelectAcc2('+id+','+response[i].id+')" >'+response[i].account_number+' - '+response[i].account_title+'</a></li>';
                    };
                    resp_data_format+='</ul>';
                    $("#data-container-deduc"+id).html(resp_data_format);
                }

            }
            });
        }
    }

    function setSelectAcc2(listid, account_id){
        var account_title = $("#listid"+account_id).html();
        $('#deduction_type'+listid).val(account_title);
        $('#deduction_account_id'+listid).val(account_id);
        $('#data-container-deduc'+listid).html('');
    }

    function add_allowance() {

        var basic_pay = $("#basic").val();
        var allowance_type = document.getElementsByName('allowance_type[]');
        var allowance_amount = document.getElementsByName('allowance_amount[]');
        //var leave_deduction = $("#leave_deduction").val();
        var tax = $("#tax").val();
        if (tax == '') {
            var tax = 0;
        }

        var total_allowance = 0;

        var deduction_type = document.getElementsByName('deduction_type[]');
        var deduction_amount = document.getElementsByName('deduction_amount[]');

        var total_deduction = 0;

        for (var i = 0; i < allowance_amount.length; i++) {

            var inp = allowance_amount[i];

            if (inp.value == '') {

                var inpvalue = 0;
            } else {
                var inpvalue = inp.value;
            }

            total_allowance += parseFloat(inpvalue);

        }

        for (var j = 0; j < deduction_amount.length; j++) {


            var inpd = deduction_amount[j];

            if (inpd.value == '') {

                var inpdvalue = 0;

            } else {

                var inpdvalue = inpd.value;
            }
            total_deduction += parseFloat(inpdvalue);
        }


        //total_deduction += parseInt(leave_deduction) ;

        var gross_salary = parseFloat(basic_pay) + parseFloat(total_allowance) - parseFloat(total_deduction);

        var net_salary = parseFloat(basic_pay) + parseFloat(total_allowance) - parseFloat(total_deduction) - parseFloat(tax);

        $("#total_allowance").val(total_allowance.toFixed(2));
        $("#total_deduction").val(total_deduction.toFixed(2));
        $("#total_allow").html(total_allowance.toFixed(2));
        $("#total_deduc").html(total_deduction.toFixed(2));
        $("#gross_salary").val(gross_salary.toFixed(2));
        $("#net_salary").val(net_salary.toFixed(2));

    }
    function add_more() {
        var row   = parseInt($("#earning_id").attr('data-earning'));
        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = row+1;
        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'><td><input onkeyup='autoSugAllownce("+ id +")' type='text' class='form-control' id='allowance_type"+ id +"' name='allowance_type[]' placeholder='Type'><input id='earning_account_id"+ id +"' name='earning_account_id[]' type='hidden' value='' /><div id='data-container"+ id +"'></div></td><td><input type='text' class='form-control' id='allowance_amount"+ id +"' name='allowance_amount[]' value='0'></td><td><button type='button' onclick='delete_row(" + id + ")' class='closebtn'><i class='fa fa-remove'></i></button></td></tr>";
        $("#earning_id").attr('data-earning', id);
    }

    function delete_row(id) {
        var row = parseInt($("#earning_id").attr('data-earning'));
        if(row!=0){
            var rowid  = row-1;
            $("#earning_id").attr('data-earning', rowid);
            $('#row'+row).remove();
        }else{
            $("#earning_id").attr('data-earning', 0);
        }
    }

    function add_more_deduction() {
        var row   = parseInt($("#deduction_id").attr('data-deduction'));
        var table = document.getElementById("tableID2");
        var table_len = (table.rows.length);
        var id = row+1;
        var row = table.insertRow(table_len).outerHTML = "<tr id='deduction_row" + id + "'><td><input type='text' onkeyup='autoSugDeduction("+ id +")' class='form-control' id='deduction_type"+ id +"' name='deduction_type[]' placeholder='Type'><input id='deduction_account_id"+ id +"' name='deduction_account_id[]' type='hidden' value='' /><div id='data-container-deduc"+ id +"'></div></td><td><input type='text' id='deduction_amount' name='deduction_amount[]' class='form-control' value='0'></td><td><button type='button' onclick='delete_deduction_row(" + id + ")' class='closebtn'><i class='fa fa-remove'></i></button></td></tr>";
        $("#deduction_id").attr('data-deduction', id);
    }

    function delete_deduction_row(id) {
        var row = parseInt($("#deduction_id").attr('data-deduction'));
        if(row!=0){
            var rowid  = row-1;
            $("#deduction_id").attr('data-deduction', rowid);
            $('#deduction_row'+row).remove();
        }else{
            $("#deduction_id").attr('data-deduction', 0);
        }
    }

    $("#contact_submit").click(function (event) {

        var net = $("#net_salary").val();
        if (net == "") {

            $("#err").html("<?php echo $this->lang->line('net_salary') . ' ' . $this->lang->line('should_not_be_empty'); ?>");
            $("#net_salary").focus();
            return false;
            event.preventDefault();
        } else {
            $("#err").html("");
        }
    });
</script>
