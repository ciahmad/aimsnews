<?php

$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$language = $this->customlib->getLanguage();
$language_name = $language["short_code"];


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    $path = "";
    
    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
  
?>

<div class="content-wrapper">
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
                                    <?php echo $this->lang->line('student_fees') . ": " . $student['firstname'] . " " . $student['lastname'] ?>
                                    </div>
                                </div>
                            </div>
    
    <div class="row">
        <div class="col-md-12">
            <section class="content-header">
                <h1>
                    <i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?><small><?php echo $this->lang->line('student_fee'); ?></small></h1>
            </section>
        </div> 
        <div>
            <a id="sidebarCollapse" class="studentsideopen"><i class="fa fa-navicon"></i></a>
            <aside class="studentsidebar">
                <div class="stutop" id="">
                    <!-- Create the tabs -->
                    <div class="studentsidetopfixed">
                        <p class="classtap"><?php echo $student["class"]; ?> <a href="#" data-toggle="control-sidebar" class="studentsideclose"><i class="fa fa-times"></i></a></p>
                        <ul class="nav nav-justified studenttaps">
                            <?php foreach ($class_section as $skey => $svalue) {
                                ?>
                                <li <?php
                                if ($student["section_id"] == $svalue["section_id"]) {
                                    echo "class='active'";
                                }
                                ?> ><a href="#section<?php echo $svalue["section_id"] ?>" data-toggle="tab"><?php print_r($svalue["section"]); ?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php foreach ($class_section as $skey => $snvalue) {
                            ?>
                            <div class="tab-pane <?php
                            if ($student["section_id"] == $snvalue["section_id"]) {
                                echo "active";
                            }
                            ?>" id="section<?php echo $snvalue["section_id"]; ?>">
                                 <?php
                                 foreach ($studentlistbysection as $stkey => $stvalue) {
                                     if ($stvalue['section_id'] == $snvalue["section_id"]) {
                                         ?>
                                        <div class="studentname">
                                            <a class="" href="<?php echo base_url() . "studentfee/addfee/" . $stvalue["id"] ?>">
                                                <div class="icon"><img src="<?php echo base_url() . $stvalue["image"]; ?>" alt="User Image"></div>
                                                <div class="student-tittle"><?php echo $stvalue["firstname"] . " " . $stvalue["lastname"]; ?></div></a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                        <div class="tab-pane" id="sectionB">
                            <h3 class="control-sidebar-heading">Recent Activity 2</h3>
                        </div>

                        <div class="tab-pane" id="sectionC">
                            <h3 class="control-sidebar-heading">Recent Activity 3</h3>
                        </div>
                        <div class="tab-pane" id="sectionD">
                            <h3 class="control-sidebar-heading">Recent Activity 3</h3>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>
            </aside>
        </div></div>
    <!-- /.control-sidebar -->
    <section class="content">
                       
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header themecolor">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="box-title"><?php echo $this->lang->line('student_fees'); ?></h3>
                            </div>
                            <div class="col-md-8">
                                <div class="btn-group pull-right themecolor">
                                    <a href="<?php echo base_url('studentfee'); //echo $this->session->userdata('previous_url'); ?>" type="button" class="btn btn-primary btn-xs themecolor">
                                        <i class="fa fa-arrow-left"></i> <?php echo $this->lang->line('back'); ?></a>
                                </div>
                            </div>

                        </div>
                    </div><!--./box-header-->
                    <div class="box-body" style="padding-top:0;">                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sfborder">
                                    <div class="col-md-2">
                                        <img width="115" height="115" class="round5" src="<?php
                                        if (!empty($student['image'])) {
                                            echo base_url() . $student['image'];
                                        } else {
                                            echo base_url() . "uploads/student_images/no_image.png";
                                        }
                                        ?>" alt="No Image">
                                    </div>

                                    <div class="col-md-2">
                                        <?php
                                     
                                        $filename = 'temp/'.$student['admission_no'].'.png';
                                        
                                        //processing form input
                                        //remember to sanitize user input in real-life solution !!!
                                        $errorCorrectionLevel = 'S';
                                        if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
                                            $errorCorrectionLevel = $_REQUEST['level'];    

                                        $matrixPointSize = 4;
                                        if (isset($_REQUEST['size']))
                                            $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
                                            
                                            //default data  
                                            QRcode::png('Student - '.$student['firstname'] . " " . $student['lastname'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                                            
                                            echo '<img src=".base_url.$PNG_WEB_DIR.basename($filename)." />'; 
                                        ?>
                                    </div>


                                    <div class="col-md-8">
                                        <div class="row">
                                            <table class="table table-striped mb0 font13">
                                                <tbody>
                                                    <tr>
                                                        <th class="bozero"><?php echo $this->lang->line('name'); ?></th>
                                                        <td class="bozero"><?php echo $student['firstname'] . " " . $student['lastname'] ?></td>

                                                        <th class="bozero"><?php echo $this->lang->line('class_section'); ?></th>
                                                        <td class="bozero"><?php echo $student['class'] . " (" . $student['section'] . ")" ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('father_name'); ?></th>
                                                        <td><?php echo $student['father_name']; ?></td>
                                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                        <td><?php echo $student['admission_no']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('mobile_no'); ?></th>
                                                        <td><?php echo $student['mobileno']; ?></td>
                                                        <th><?php echo $this->lang->line('roll_no'); ?></th>
                                                        <td> <?php echo $student['roll_no']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('category'); ?></th>
                                                        <td>
                                                            <?php
                                                            foreach ($categorylist as $value) {
                                                                if ($student['category_id'] == $value['id']) {
                                                                    echo $value['category'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php if ($sch_setting->rte) { ?> 
                                                            <th><?php echo $this->lang->line('rte'); ?></th>
                                                            <td><b class="text-danger"> <?php echo $student['rte']; ?> </b>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div></div>
                            <div class="col-md-12">
                                <div style="background: #dadada; height: 1px; width: 100%; clear: both; margin-bottom: 10px;"></div>
                            </div>
                        </div>
                        
                        <div class="row no-print">                       
                            <div class="col-md-12 mDMb10">
                                <a href="#" class="btn btn-sm btn-info printSelected"><i class="fa fa-print"></i> <?php echo $this->lang->line('print_selected'); ?> </a>

                                <button type="button" class="btn btn-sm btn-warning collectSelected" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.."><i class="fa fa-money"></i> <?php echo $this->lang->line('collect') . " " . $this->lang->line('selected') ?></button>

                                <span class="pull-right"><?php echo $this->lang->line('date'); ?>: <?php echo date($this->customlib->getSchoolDateFormat()); ?></span>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                           
                            <table class="table table-striped table-hover example table-fixed-header">
                                <thead class="header">
                                    <tr>
                                        <th style="width: 10px"><input type="checkbox" id="select_all"/></th>
                                        <th align="left"><?php echo $this->lang->line('fees_group'); ?></th>
                                        <!-- <th align="left"><?php echo $this->lang->line('fees_code'); ?></th> -->
                                        <th align="left"><?php echo $this->lang->line('month'); ?></th>
                                        <th align="left" class="text text-left"><?php echo $this->lang->line('due_date'); ?></th>
                                        <th align="left" class="text text-left"><?php echo $this->lang->line('status'); ?></th>
                                        <th class="text text-right"><?php echo $this->lang->line('amount') ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        <th class="text text-left"><?php echo $this->lang->line('payment_id'); ?></th>
                                        <th class="text text-left"><?php echo $this->lang->line('mode'); ?></th>
                                        <th  class="text text-left"><?php echo $this->lang->line('date'); ?></th>
                                        <th class="text text-right" ><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        <th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        <th class="text text-right"><?php echo $this->lang->line('paid'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        <th class="text text-right"><?php echo $this->lang->line('balance'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        <th class="text text-right"><?php echo $this->lang->line('action'); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $total_amount = 0;
                                    $total_deposite_amount = 0;
                                    $total_fine_amount = 0;
                                    $total_discount_amount = 0;
                                    $total_balance_amount = 0;
                                    $alot_fee_discount = 0;

                                    foreach ($student_due_fee as $key => $fee) {

                                        foreach ($fee->fees as $fee_key => $fee_value) {
                                            
                                            $fee_paid = 0;
                                            $fee_discount = 0;
                                            $fee_fine = 0;

                                            if (!empty($fee_value->amount_detail)) {
                                                $fee_deposits = json_decode(($fee_value->amount_detail));

                                                foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                    
                                                    $fee_paid = $fee_paid + $fee_deposits_value->amount;
                                                    $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                                                    $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                                                }
                                            }
                                            
                                            $total_amount = $total_amount + $fee_value->amount;
                                            $total_discount_amount = $total_discount_amount + $fee_discount;
                                            $total_deposite_amount = $total_deposite_amount + $fee_paid;
                                            $total_fine_amount = $total_fine_amount + $fee_fine;

                                            //echo "<pre>"; print_r($fee_discount);
                                                                //1000-(1000+200);
                                            //$feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
                                            $feetype_balance = $fee_value->amount - $fee_paid;
                                            //echo "<pre>"; print_r($feetype_balance);
                                            $total_balance_amount = $total_balance_amount + $feetype_balance;
                                            ?>
                                            <?php
                                            if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date('Y-m-d'))) {
                                                ?>
                                                <tr class="danger font12">
                                                    <?php
                                                } else {
                                                    ?>
                                                <tr class="dark-gray">
                                                    <?php
                                                }
                                                ?>
                                                <td><input class="checkbox" type="checkbox" name="fee_checkbox" data-fee_master_id="<?php echo $fee_value->id ?>" data-fee_session_group_id="<?php echo $fee_value->fee_session_group_id ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id ?>" data-month_name="<?php echo $fee_value->month_name ?>"></td>
                                                <td align="left">
                                                    <?php echo $fee_value->type;
                                                    //echo $fee_value->name . " (" . $fee_value->type . ")";
                                                    ?></td>
                                                <!-- <td align="left"><?php echo $fee_value->code; ?></td> -->
                                                <td align="left"><?php echo $fee_value->month_name; ?></td>
                                                <td align="left" class="text text-left">

                                                    <?php
                                                    if ($fee_value->fee_due_date == "0000-00-00") {
                                                        
                                                    } else {

                                                        echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->fee_due_date));
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" class="text text-left width85">
                                                    <?php
                                                    if ($feetype_balance == 0) {
                                                        ?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
                                                    } else if (!empty($fee_value->amount_detail)) {
                                                        ?><span class="label label-warning"><?php echo $this->lang->line('partial'); ?></span><?php
                                                    } else {
                                                        ?><span class="label label-danger"><?php echo $this->lang->line('unpaid'); ?></span><?php
                                                        }
                                                        ?>

                                                </td>
                                                <td class="text text-right"><?php echo $fee_value->amount; ?></td>

                                                <td class="text text-left"></td>
                                                <td class="text text-left"></td>
                                                <td class="text text-left"></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($fee_discount, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($fee_fine, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($fee_paid, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    $display_none = "ss-none";
                                                    if ($feetype_balance > 0) {
                                                        $display_none = "";

                                                        echo (number_format($feetype_balance, 2, '.', ''));
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group pull-right">
                                                        <button type="button" data-student_session_id="<?php echo $fee->student_session_id; ?>" data-student_fees_master_id="<?php echo $fee->id; ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id; ?>" data-fee_acc_id="<?php echo $fee_value->code; ?>"
                                                                data-group="<?php echo $fee_value->name; ?>"
                                                                data-type="<?php echo $fee_value->code; ?>"
                                                                data-fee_group_amount="<?php echo $feetype_balance; ?>"
                                                                data-fee_group_title="<?php echo $fee_value->type ;?>" data-month_name="<?php echo $fee_value->month_name ;?>" data-fee_due_date="<?php echo $fee_value->fee_due_date ;?>"
                                                                class="btn btn-xs btn-default myCollectFeeBtn <?php echo $display_none; ?>"
                                                                title="<?php echo $this->lang->line('add_fees'); ?>" data-toggle="modal" data-target="#myFeesModal"
                                                                ><i class="fa fa-plus"></i></button>


                                                        <button  class="btn btn-xs btn-default printInv" data-fee_master_id="<?php echo $fee_value->id ?>" data-fee_session_group_id="<?php echo $fee_value->fee_session_group_id ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id ?>"
                                                                 title="<?php echo $this->lang->line('print'); ?>"
                                                                 ><i class="fa fa-print"></i> </button>
                                                    </div>
                                                </td>


                                            </tr>

                                            <?php
                                            if (!empty($fee_value->amount_detail)) {

                                                //$fee_deposits = json_decode(($fee_value->amount_detail));

                                                foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                    ?>
                                                    <tr class="white-td">
                                                        <td align="left"></td>
                                                        <td align="left"></td>
                                                        <td align="left"></td>
                                                        <td align="left"></td>
                                                        <td align="left"></td>
                                                        <td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
                                                        <td class="text text-left">


                                                            <a href="#" data-toggle="popover" class="detail_popover" > <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
                                                            <div class="fee_detail_popover" style="display: none">
                                                                <?php
                                                                if ($fee_deposits_value->description == "") {
                                                                    ?>
                                                                    <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>


                                                        </td>
                                                        <td class="text text-left"><?php echo $this->lang->line(strtolower($fee_deposits_value->payment_mode)); ?></td>
                                                        <td class="text text-left">

                                                            <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
                                                        </td>
                                                        <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_discount, 2, '.', '')); ?></td>
                                                        <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_fine, 2, '.', '')); ?></td>
                                                        <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount, 2, '.', '')); ?></td>
                                                        <td></td>
                                                        <td class="text text-right">
                                                            <div class="btn-group pull-right">

                                                                <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_delete')) { ?>
                                                                    <button class="btn btn-default btn-xs" data-invoiceno="<?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?>" data-main_invoice="<?php echo $fee_value->student_fees_deposite_id ?>" data-sub_invoice="<?php echo $fee_deposits_value->inv_no ?>" data-toggle="modal" data-target="#confirm-delete" title="<?php echo $this->lang->line('revert'); ?>">
                                                                        <i class="fa fa-undo"> </i>
                                                                    </button>
                                                                <?php } ?>
                                                                <button  class="btn btn-xs btn-default printDoc" data-main_invoice="<?php echo $fee_value->student_fees_deposite_id ?>" data-sub_invoice="<?php echo $fee_deposits_value->inv_no ?>"  title="<?php echo $this->lang->line('print'); ?>"><i class="fa fa-print"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (!empty($student_discount_fee)) {

                                        foreach ($student_discount_fee as $discount_key => $discount_value) {
                                            ?>
                                            <tr class="dark-light">
                                                <td></td>
                                                <td align="left"> <?php echo $this->lang->line('discount'); ?> </td>
                                                <td align="left">
                                                    <?php echo $discount_value['code']; ?>
                                                </td>
                                                <td align="left"></td>
                                                <td align="left" class="text text-left">
                                                    <?php
                                                    if ($discount_value['status'] == "applied") {
                                                        ?>
                                                        <a href="#" data-toggle="popover" class="detail_popover" >

                                                            <?php echo $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']) . " : " . $discount_value['payment_id']; ?>

                                                        </a>
                                                        <div class="fee_detail_popover" style="display: none">
                                                            <?php
                                                            if ($discount_value['student_fees_discount_description'] == "") {
                                                                ?>
                                                                <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p class="text text-danger"><?php echo $discount_value['student_fees_discount_description'] ?></p>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <?php
                                                    } else {
                                                        echo '<p class="text text-danger">' . $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']);
                                                    }
                                                    ?>

                                                </td>
                                                <td></td>
                                                <td class="text text-left"></td>
                                                <td class="text text-left"></td>
                                                <td class="text text-left"></td>
                                                <td  class="text text-right">
                                                    <?php
                                                    $alot_fee_discount = $alot_fee_discount;
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="btn-group pull-right">
                                                        <?php
                                                        if ($discount_value['status'] == "applied") {
                                                            ?>

                                                            <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_delete')) { ?>
                                                                <button class="btn btn-default btn-xs" data-discounttitle="<?php echo $discount_value['code']; ?>" data-discountid="<?php echo $discount_value['id']; ?>" data-toggle="modal" data-target="#confirm-discountdelete" title="<?php echo $this->lang->line('revert'); ?>">
                                                                    <i class="fa fa-undo"> </i>
                                                                </button>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <button type="button" data-modal_title="<?php echo $this->lang->line('discount') . " : " . $discount_value['code']; ?>" data-student_fees_discount_id="<?php echo $discount_value['id']; ?>"
                                                                class="btn btn-xs btn-default applydiscount"
                                                                title="<?php echo $this->lang->line('apply_discount'); ?>"
                                                                ><i class="fa fa-check"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>


                                    <tr class="box box-solid total-bg">
                                        <td align="left" ></td>
                                        <td align="left" ></td>
                                        <td align="left" ></td>
                                        <td align="left" ></td>
                                        <td align="left" class="text text-left" ><?php echo $this->lang->line('grand_total'); ?></td>
                                        <td class="text text-right"><?php
                                            echo ($currency_symbol . number_format($total_amount, 2, '.', ''));
                                            ?></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>

                                        <td class="text text-right"><?php
                                            echo ($currency_symbol . number_format($total_discount_amount + $alot_fee_discount, 2, '.', ''));
                                            ?></td>
                                        <td class="text text-right"><?php
                                            echo ($currency_symbol . number_format($total_fine_amount, 2, '.', ''));
                                            ?></td>
                                        <td class="text text-right"><?php
                                            echo ($currency_symbol . number_format($total_deposite_amount, 2, '.', ''));
                                            ?></td>
                                        <td class="text text-right"><?php
                                            echo ($currency_symbol . number_format($total_balance_amount - $alot_fee_discount, 2, '.', ''));
                                            ?></td>  <td class="text text-right"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>


            </div>
            <!--/.col (left) -->

        </div>

    </section>

</div>

<div class="modal fade" id="myFeesModal" role="dialog">
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center ">Fee Receipt Voucher</h4>
            </div>
            <div class="modal-body pb0">
                <div class="form-horizontal balanceformpopup">
                    <div class="box-body">

                        <input  type="hidden" class="form-control" id="std_id" value="<?php echo $student["student_session_id"]; ?>" readonly="readonly"/>
                        <input  type="hidden" class="form-control" id="parent_app_key" value="<?php echo $student['parent_app_key'] ?>" readonly="readonly"/>
                        <input  type="hidden" class="form-control" id="guardian_phone" value="<?php echo $student['guardian_phone'] ?>" readonly="readonly"/>
                        <input  type="hidden" class="form-control" id="guardian_email" value="<?php echo $student['guardian_email'] ?>" readonly="readonly"/>
                        <input  type="hidden" class="form-control" id="student_fees_master_id" value="0" readonly="readonly"/>
                        <input  type="hidden" class="form-control" id="fee_groups_feetype_id" value="0" readonly="readonly"/>
                        <input  type="hidden" id="account_id" value="0"/>
                        <input  type="hidden" id="total_fee" value="0"/>
                        <input  type="hidden" id="month_name" value=""/>
                        <input  type="hidden" id="fee_due_date" value=""/>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                    <div class="row">
                                        <input type="hidden" name="std_id" value="<?php echo $std_id;?>">
                                        <table class="table table-striped mb0 font13">
                                            <tbody>
                                                <tr>
                                                    <th class="bozero"><?php echo $this->lang->line('name'); ?></th>
                                                    <td class="bozero"><?php echo $student['firstname'] . " " . $student['lastname'] ?></td>

                                                    <th class="bozero"><?php echo $this->lang->line('class_section'); ?></th>
                                                    <td class="bozero"><?php echo $student['class'] . " (" . $student['section'] . ")" ?> </td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo $this->lang->line('father_name'); ?></th>
                                                    <td><?php echo $student['father_name']; ?></td>
                                                    <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                    <td><?php echo $student['admission_no']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo $this->lang->line('mobile_no'); ?></th>
                                                    <td><?php echo $student['mobileno']; ?></td>
                                                    <th><?php echo $this->lang->line('roll_no'); ?></th>
                                                    <td> <?php echo $student['roll_no']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1"><?php echo $this->lang->line('date'); ?></label>
                            <div class="col-sm-3">
                                <input id="date" name="admission_date" placeholder="" type="text" class="form-control date" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" autocomplete="off">
                            </div>
                            <label class="col-sm-1" for="exampleInputEmail1">FRV</label>
                            <div class="col-sm-3">
                                <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo $invoice_number; ?>" readonly style="background-color: #dddddd94;"/>
                                <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                            </div>
                            <label class="col-sm-1" for="exampleInputEmail1">Mode<small class="req"> *</small></label>
                            <div class="col-sm-3">
                                <select autofocus="" id="cash_bank" name="cash_bank" class="form-control" >
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <option value="30">Cash</option>
                                    <option value="31">Bank</option>
                                </select>
                                <span class="text-danger"><?php //echo form_error('inc_head_id'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div style="display: none;" id="cash_accounts_div"> 
                                <label class="col-sm-1" for="exampleInputEmail1"><?php echo $this->lang->line('select'); ?> </label><small class="req"> *</small>
                                <div class="col-sm-3">
                                    
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
                                    <span class="text-danger"><?php echo form_error('bank_account_id'); ?></span>
                                </div>
                            </div>
                            <div style="display: none;" id="bank_accounts_div"> 
                                <label class="col-sm-1" for="exampleInputEmail1">Bank</label><small class="req"> *</small>
                                <div class="col-sm-3">
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
                            </div>
                            <div style="display: none;" id="reference_number_div">
                                <label class="col-sm-1" for="exampleInputEmail1">Ref<small class="req"> *</small></label>
                                <div class="col-sm-3" >
                                    <input id="reference_number" name="reference_number" placeholder="" type="text" class="form-control"  value="" />
                                    <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <table class="table table-hover table-striped table-bordered" id="example_table" >
                                <thead >
                                    <tr >
                                        <th style="background-color:#dddddd94">A/C Head</th>
                                        <th style="background-color:#dddddd94">For The Month Of</th>
                                        <th style="background-color:#dddddd94">Due Date</th>
                                        <th style="background-color:#dddddd94">Receiving Date</th>
                                        <th style="text-align:right;background-color:#dddddd94">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        <tr>
                                            <td id="fee_group_id"></td>
                                            <td id="for_month_of"></td>
                                            <td id="fee_due_date"></td>
                                            <td id="receiving_date"></td>
                                            <td style="text-align:right">
                                                <input class="form-control" type="text" name="total_amount" id="total_amount" value="" style="text-align:right; width: 200px; float: right;"> 
                                            </td>
                                        </tr>

                                </tbody>
                                <thead>
                                    <tr>
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">
                                            <?php echo $this->lang->line('total') . " " . $this->lang->line('pay'); ?>:</th>
                                        <th id="total_pay" style="text-align:right;background-color:#dddddd94;padding-right:25px">
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td >
                                        <label class="col-sm-4" for="exampleInputEmail1">Fine: </label>
                                        <div class="col-sm-8" >
                                           <select autofocus="" id="selfine" name="selfine" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach ($fines as $key => $fine) { ?>
                                            <option value="<?php echo $fine['code'];?>" data-fineamount="<?php echo $fine['amount'];?>"><?php echo $fine['account_number'];?> - <?php echo $fine['name'];?></option>
                                            <?php } ?>
                                           </select>
                                        </div>
                                    </td>
                                    <td colspan="3"></td>
                                    <td style="text-align:right;">
                                        <input style="text-align:right; width: 200px; float: right;" type="text" name="fine_amount" id="fine_amount" readonly value="0" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="col-sm-4" for="exampleInputEmail1">Discount: </label>
                                        <?php //print_r($discount_not_applied);?>
                                        <div class="col-sm-8" >
                                           <select autofocus="" id="sel_discount" name="sel_discount" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach ($discounts as $key => $value) { ?>
                                            <option value="<?php echo $value['code'];?>" data-disamount="<?php echo $value['amount'];?>"><?php echo $value['account_number'];?> - <?php echo $value['name'];?></option>
                                            <?php } ?>
                                           </select>
                                        </div>
                                    </td>
                                    <td colspan="3"></td>
                                    <td style="text-align:right;">
                                        <input style="text-align:right; width: 200px; float: right;" class="form-control" type="text" name="discount_amount" id="discount_amount" readonly value="0">
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">
                                        <th style="text-align: right;background-color:#dddddd94">Net Total:</th>
                                        <th style="text-align:right;background-color:#dddddd94; padding-right:25px"><span id="net_total"></span></th>
                                        <input type="hidden" name="net_amount" id="net_amount" value="">
                                    </tr>
                                </thead>

                            </table>
                            
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <button type="button" class="btn cfees save_button" id="load" data-action="collect" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('collect_fees'); ?> </button>
                <button type="button" class="btn cfees save_button" id="load" data-action="print" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('collect') . " & " . $this->lang->line('print') ?></button>

            </div>
        </div> 

    </div>
</div>

<div class="modal fade" id="myDisApplyModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center discount_title"></h4>
            </div>
            <div class="modal-body pb0">
                <div class="form-horizontal">
                    <div class="box-body">
                        <input  type="hidden" class="form-control" id="student_fees_discount_id"  value=""/>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('payment_id'); ?> <small class="req">*</small></label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="discount_payment_id" >

                                <span class="text-danger" id="discount_payment_id_error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('description'); ?></label>

                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="dis_description" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <button type="button" class="btn cfees dis_apply_button" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('apply_discount'); ?></button>
            </div>
        </div>

    </div>
</div>

<div class="delmodal modal fade" id="confirm-discountdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('confirmation'); ?></h4>
            </div>

            <div class="modal-body">

                <p>Are you sure want to revert <b class="discount_title"></b> discount, this action is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
                <input type="hidden" name="discount_id"  id="discount_id" value="">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <a class="btn btn-danger btn-discountdel"><?php echo $this->lang->line('revert'); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="delmodal modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('confirmation'); ?></h4>
            </div>

            <div class="modal-body">

                <p>Are you sure want to delete <b class="invoice_no"></b> invoice, this action is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
                <input type="hidden" name="main_invoice"  id="main_invoice" value="">
                <input type="hidden" name="sub_invoice" id="sub_invoice"  value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <a class="btn btn-danger btn-ok"><?php echo $this->lang->line('revert'); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="norecord modal fade" id="confirm-norecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>No Record Found --r</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            </div>
        </div>
    </div>
</div>

<div id="listCollectionModal" class="modal fade">
    <div class="modal-dialog" style="width:80%">
        <form action="<?php echo site_url('studentfee/addfeegrp'); ?>" method="POST" id="collect_fee_group">
            <div class="modal-content">
                <div class="modal-header themecolor">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title themecolor">Fee Receipt Voucher</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer"></div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">

$(document).ready(function () {

    $('#total_amount').on('keyup', function(){
        //var feetype_balance = '<?php //echo $feetype_balance; ?>';
        var total_fee = $('#total_fee').val();
        var total_amount = parseFloat($('#total_amount').val());
        if(total_amount > total_fee){
            $('#total_amount').val(total_fee);
            alert('Amount is greater then due amount');
            $('#total_amount').focus();
            return false;
        }
        $('#total_pay').text(total_amount.toFixed(2));
        var discount_amount = parseFloat($('#discount_amount').val());
        var fine_amount     = parseFloat($('#fine_amount').val());
        var net_amount      = total_amount - discount_amount + fine_amount;
        $('#net_total').text(net_amount.toFixed(2));

    });

    $(document).on('change', "#sel_discount", function () {
        var discount_amount = $('option:selected', this).data('disamount');
        var total_amount    = parseFloat($('#total_amount').val());
        var fine_amount     = parseFloat($('#fine_amount').val());
        if(discount_amount){
            $('div#myFeesModal').find('input#discount_amount').val(discount_amount);
            var net_amount  = total_amount - discount_amount + fine_amount;
            $('#net_total').text(net_amount.toFixed(2));
            $('#net_amount').val(net_amount.toFixed(2));
        }else{
            $('div#myFeesModal').find('input#discount_amount').val(0);
            var net_amount  = total_amount + fine_amount;
            $('#net_total').text(net_amount.toFixed(2));
            $('#net_amount').val(net_amount.toFixed(2));

        }
            
    });

    $(document).on('change', "#selfine", function () {
        var total_amount    = parseFloat($('#total_amount').val());
        var discount_amount = parseFloat($('#discount_amount').val());
        var fine_amount     = $('option:selected', this).data('fineamount');

        if(fine_amount){
            var net_amount = total_amount + parseFloat(fine_amount) - discount_amount;
            $('div#myFeesModal').find('input#fine_amount').val(fine_amount);
            $('#net_total').text(net_amount.toFixed(2));
            $('#net_amount').val(net_amount.toFixed(2));
        }else{
            var net_amount = total_amount - discount_amount;
            $('div#myFeesModal').find('input#fine_amount').val(0);
            $('#net_total').text(net_amount.toFixed(2));
            $('#net_amount').val(net_amount.toFixed(2));
        }
    });

    $("#cash_bank").on('change', function(){
        if($(this).val()==31){
            $('#bank_accounts_div').show();
            $('#cash_accounts_div').hide();
        }else{
            $('#cash_accounts_div').show();
            $('#bank_accounts_div').hide();
            $('#reference_number_div').hide();
            //$("#bank_accounts option:selected").prop("selected", false)
            $('#bank_accounts option:selected').removeAttr('selected');
        }
    })
    $("#bank_account_id").on('change', function(){
        if($(this).val()!=''){
            $('#reference_number_div').show();
        }else{
            $('#reference_number_div').hide();
        }
        
    })

});
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $(".date_fee").datepicker({
            format: date_format,
            autoclose: true,
            language: '<?php echo $language_name; ?>',
            endDate: '+0d',
            todayHighlight: true
        });

        $(document).on('click', '.printDoc', function () {
            var main_invoice = $(this).data('main_invoice');
            var sub_invoice = $(this).data('sub_invoice');
            var student_session_id = '<?php echo $student['student_session_id'] ?>';
            $.ajax({
                url: '<?php echo site_url("studentfee/printFeesByName") ?>',
                type: 'post',
                data: {'student_session_id': student_session_id, 'main_invoice': main_invoice, 'sub_invoice': sub_invoice},
                success: function (response) {
                    Popup(response);
                }
            });
        });
        $(document).on('click', '.printInv', function () {
            var fee_master_id = $(this).data('fee_master_id');
            var fee_session_group_id = $(this).data('fee_session_group_id');
            var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
            $.ajax({
                url: '<?php echo site_url("studentfee/printFeesByGroup") ?>',
                type: 'post',
                data: {'fee_groups_feetype_id': fee_groups_feetype_id, 'fee_master_id': fee_master_id, 'fee_session_group_id': fee_session_group_id},
                success: function (response) {
                    Popup(response);
                }
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).on('click', '.save_button', function (e) {
        var $this = $(this);
        var action = $this.data('action');
        //$this.button('loading');
        var form = $(this).attr('frm');
        var feetype = $('#feetype_').val();
        var date = $('#date').val();
        var student_session_id = $('#std_id').val();
        var invoice_no = $('#invoice_no').val();
        // if($('#cash_bank').val()==30){
        //     $('#cash_bank').val();
        // }
        var cash_bank = $('#cash_bank').val();
        if(cash_bank==31){
            var bank_account_id   = $('#bank_account_id').val();
            var reference_number  = $('#reference_number').val();
            var mode_id           = $('#cash_bank').val();  
        }else{
            var bank_account_id   = $('#deposit_cash_id').val();
            var mode_id = $('#cash_bank').val();
            var reference_number  = '';
        }

        var sel_fine_id     = $('#selfine').val();
        var sel_discount_id = $('#sel_discount').val();
        var amount = $('#total_amount').val();
        var amount_discount = $('#discount_amount').val();
        var amount_fine = $('#fine_amount').val();
        var description = $('#description').val();
        var parent_app_key = $('#parent_app_key').val();
        var guardian_phone = $('#guardian_phone').val();
        var guardian_email = $('#guardian_email').val();
        var student_fees_master_id = $('#student_fees_master_id').val();
        var fee_groups_feetype_id = $('#fee_groups_feetype_id').val();
        //var payment_mode = $('input[name="payment_mode_fee"]:checked').val();
        var student_fees_discount_id = $('#discount_group').val();
        var account_id = $('#account_id').val();
        var month_name = $('#month_name').val();
        var fee_due_date = $('#fee_due_date').val();

        //alert(bank_account_id+',' +cash_bank+',' +student_fees_master_id+',' +fee_groups_feetype_id);
        $.ajax({
            url: '<?php echo site_url("studentfee/addstudentfee") ?>',
            type: 'post',
            data: {action: action, student_session_id: student_session_id, date: date, type: feetype, amount: amount, amount_discount: amount_discount, amount_fine: amount_fine, description: description, student_fees_master_id: student_fees_master_id, fee_groups_feetype_id: fee_groups_feetype_id, guardian_phone: guardian_phone, guardian_email: guardian_email, student_fees_discount_id: student_fees_discount_id, parent_app_key: parent_app_key, account_id:account_id, bank_account_id:bank_account_id, invoice_no:invoice_no, reference_number:reference_number, mode_id:mode_id, sel_fine_id:sel_fine_id, sel_discount_id:sel_discount_id,month_name:month_name,fee_due_date:fee_due_date,cash_bank:cash_bank},
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $this.button('reset');
                if (response.status === "success") {
                    if (action === "collect") {
                        location.reload(true);
                    } else if (action === "print") {
                        Popup(response.print, true);
                    }
                } else if (response.status === "fail") {
                    $.each(response.error, function (index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            }
        });
    });
</script>


<script>
    var base_url = '<?php echo base_url() ?>';

    function Popup(data, winload = false)
    {
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
            if (winload) {
                window.location.reload(true);
            }
        }, 500);


        return true;
    }
    $(document).ready(function () {
        $('.delmodal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        $('#listCollectionModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $('#confirm-delete').on('show.bs.modal', function (e) {
            $('.invoice_no', this).text("");
            $('#main_invoice', this).val("");
            $('#sub_invoice', this).val("");

            $('.invoice_no', this).text($(e.relatedTarget).data('invoiceno'));
            $('#main_invoice', this).val($(e.relatedTarget).data('main_invoice'));
            $('#sub_invoice', this).val($(e.relatedTarget).data('sub_invoice'));


        });

        $('#confirm-discountdelete').on('show.bs.modal', function (e) {
            $('.discount_title', this).text("");
            $('#discount_id', this).val("");
            $('.discount_title', this).text($(e.relatedTarget).data('discounttitle'));
            $('#discount_id', this).val($(e.relatedTarget).data('discountid'));
        });

        // $('#confirm-delete').on('click', '.btn-ok', function (e) {
        //     var $modalDiv = $(e.delegateTarget);
        //     var main_invoice = $('#main_invoice').val();
        //     var sub_invoice = $('#sub_invoice').val();

        //     //$modalDiv.addClass('modalloading');
        //     $.ajax({
        //         type: "post",
        //         url: '<?php //echo site_url("studentfee/deleteFee") ?>',
        //         dataType: 'JSON',
        //         data: {'main_invoice': main_invoice, 'sub_invoice': sub_invoice},
        //         success: function (data) {
        //             //$modalDiv.modal('hide').removeClass('modalloading');
        //             //location.reload(true);
        //         }
        //     });
        // });

        $('#confirm-discountdelete').on('click', '.btn-discountdel', function (e) {
            var $modalDiv = $(e.delegateTarget);
            var discount_id = $('#discount_id').val();


            $modalDiv.addClass('modalloading');
            $.ajax({
                type: "post",
                url: '<?php echo site_url("studentfee/deleteStudentDiscount") ?>',
                dataType: 'JSON',
                data: {'discount_id': discount_id},
                success: function (data) {
                    $modalDiv.modal('hide').removeClass('modalloading');
                    location.reload(true);
                }
            });


        });


        $(document).on('click', '.btn-ok', function (e) {
            var $modalDiv = $(e.delegateTarget);
            var main_invoice = $('#main_invoice').val();
            var sub_invoice = $('#sub_invoice').val();

            $modalDiv.addClass('modalloading');
            $.ajax({
                type: "post",
                url: '<?php echo site_url("studentfee/deleteFee") ?>',
                dataType: 'JSON',
                data: {'main_invoice': main_invoice, 'sub_invoice': sub_invoice},
                success: function (data) {
                    $modalDiv.modal('hide').removeClass('modalloading');
                    location.reload(true);
                }
            });
        });


        $('.detail_popover').popover({
            placement: 'right',
            title: '',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
    var fee_amount = 0;
    var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';

</script>
<script type="text/javascript">
    $("#myFeesModal").on('shown.bs.modal', function (e) {
        e.stopPropagation();
        var current_date = new Date().toString('dd-MM-yyyy');
        var discount_group_dropdown = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        var data = $(e.relatedTarget).data();
        var modal = $(this);
        var type = data.type;
        var amount = data.amount;
        var group = data.group;
        var fee_groups_feetype_id = data.fee_groups_feetype_id;
        var student_fees_master_id = data.student_fees_master_id;
        var student_session_id = data.student_session_id;
        var fee_group_title = data.fee_group_title;
        var fee_group_amount = data.fee_group_amount;
        var month_name = data.month_name;
        var fee_due_date = data.fee_due_date;

        $('.fees_title').html("");
        $('.fees_title').html("<b>" + group + ":</b> " + type);
        $('#fee_groups_feetype_id').val(fee_groups_feetype_id);
        $('#student_fees_master_id').val(student_fees_master_id);
        $('#fee_group_id').text(fee_group_title);
        $('#total_pay').text(fee_group_amount);
        $('#total_amount').val(fee_group_amount);
        $('#fee_amount').val(fee_amount);
        $('#net_total').text(fee_group_amount);
        $('#net_amount').val(fee_group_amount);
        $('#account_id').val(type);
        $('#total_fee').val(fee_group_amount);
        $('#for_month_of').text(month_name);
        $('#month_name').val(month_name);
        $('#fee_due_date').text(fee_due_date);
        $('#fee_due_date').val(fee_due_date);
        $('#receiving_date').text(current_date);

        $.ajax({
            type: "post",
            url: '<?php echo site_url("studentfee/geBalanceFee") ?>',
            dataType: 'JSON',
            data: {'fee_groups_feetype_id': fee_groups_feetype_id,
                'student_fees_master_id': student_fees_master_id,
                'student_session_id': student_session_id
            },
            beforeSend: function () {
                $('#discount_group').html("");
                $("span[id$='_error']").html("");
                $('#amount').val("");
                $('#amount_discount').val("0");
                $('#amount_fine').val("0");
                modal.addClass('modal_loading');
            },
            success: function (data) {

                if (data.status === "success") {
                    fee_amount = data.balance;

                    $('#amount').val(data.balance);
                    $('#amount_fine').val(data.remain_amount_fine);


                    $.each(data.discount_not_applied, function (i, obj)
                    {
                        discount_group_dropdown += "<option value=" + obj.student_fees_discount_id + " data-disamount=" + obj.amount + ">" + obj.code + "</option>";
                    });
                    $('#discount_group').append(discount_group_dropdown);




                }
            },
            error: function (xhr) { // if error occured
                alert("Error occured.please try again");

            },
            complete: function () {
                modal.removeClass('modal_loading');
            }
        });


    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });
    $(document).ready(function () {
        $('.table-fixed-header').fixedHeader();
    });

    //  $(window).on('resize', function () {
    //    $('.header-copy').width($('.table-fixed-header').width())
    //});

    (function ($) {

        $.fn.fixedHeader = function (options) {
            var config = {
                topOffset: 50
                        //bgColor: 'white'
            };
            if (options) {
                $.extend(config, options);
            }

            return this.each(function () {
                var o = $(this);

                var $win = $(window);
                var $head = $('thead.header', o);
                var isFixed = 0;
                var headTop = $head.length && $head.offset().top - config.topOffset;

                function processScroll() {
                    if (!o.is(':visible')) {
                        return;
                    }
                    if ($('thead.header-copy').size()) {
                        $('thead.header-copy').width($('thead.header').width());
                    }
                    var i;
                    var scrollTop = $win.scrollTop();
                    var t = $head.length && $head.offset().top - config.topOffset;
                    if (!isFixed && headTop !== t) {
                        headTop = t;
                    }
                    if (scrollTop >= headTop && !isFixed) {
                        isFixed = 1;
                    } else if (scrollTop <= headTop && isFixed) {
                        isFixed = 0;
                    }
                    isFixed ? $('thead.header-copy', o).offset({
                        left: $head.offset().left
                    }).removeClass('hide') : $('thead.header-copy', o).addClass('hide');
                }
                $win.on('scroll', processScroll);

                // hack sad times - holdover until rewrite for 2.1
                $head.on('click', function () {
                    if (!isFixed) {
                        setTimeout(function () {
                            $win.scrollTop($win.scrollTop() - 47);
                        }, 10);
                    }
                });

                $head.clone().removeClass('header').addClass('header-copy header-fixed').appendTo(o);
                var header_width = $head.width();
                o.find('thead.header-copy').width(header_width);
                o.find('thead.header > tr:first > th').each(function (i, h) {
                    var w = $(h).width();
                    o.find('thead.header-copy> tr > th:eq(' + i + ')').width(w);
                });
                $head.css({
                    margin: '0 auto',
                    width: o.width(),
                    'background-color': config.bgColor
                });
                processScroll();
            });
        };

    })(jQuery);


    $(".applydiscount").click(function () {
        $("span[id$='_error']").html("");
        $('.discount_title').html("");
        $('#student_fees_discount_id').val("");
        var student_fees_discount_id = $(this).data("student_fees_discount_id");
        var modal_title = $(this).data("modal_title");


        $('.discount_title').html("<b>" + modal_title + "</b>");

        $('#student_fees_discount_id').val(student_fees_discount_id);
        $('#myDisApplyModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });

    $(document).on('click', '.dis_apply_button', function (e) {
        var $this = $(this);
        $this.button('loading');

        var discount_payment_id = $('#discount_payment_id').val();
        var student_fees_discount_id = $('#student_fees_discount_id').val();
        var dis_description = $('#dis_description').val();

        $.ajax({
            url: '<?php echo site_url("admin/feediscount/applydiscount") ?>',
            type: 'post',
            data: {
                discount_payment_id: discount_payment_id,
                student_fees_discount_id: student_fees_discount_id,
                dis_description: dis_description
            },
            dataType: 'json',
            success: function (response) {
                $this.button('reset');
                if (response.status === "success") {
                    location.reload(true);
                } else if (response.status === "fail") {
                    $.each(response.error, function (index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            }
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.printSelected', function () {
            var array_to_print = [];
            $.each($("input[name='fee_checkbox']:checked"), function () {
                var fee_session_group_id = $(this).data('fee_session_group_id');
                var fee_master_id = $(this).data('fee_master_id');
                var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
                item = {};
                item ["fee_session_group_id"] = fee_session_group_id;
                item ["fee_master_id"] = fee_master_id;
                item ["fee_groups_feetype_id"] = fee_groups_feetype_id;

                array_to_print.push(item);
            });
            if (array_to_print.length === 0) {
                alert("<?php echo $this->lang->line('no_record_selected'); ?>");
            } else {
                $.ajax({
                    url: '<?php echo site_url("studentfee/printFeesByGroupArray") ?>',
                    type: 'post',
                    data: {'data': JSON.stringify(array_to_print)},
                    success: function (response) {
                        Popup(response);
                    }
                });
            }
        });


        $(document).on('click', '.collectSelected', function () {
            var std_id ='<?php echo $std_id;?>';
            var $this = $(this);
            var array_to_collect_fees = [];
            $.each($("input[name='fee_checkbox']:checked"), function () {
                var fee_session_group_id = $(this).data('fee_session_group_id');
                var fee_master_id = $(this).data('fee_master_id');
                var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
                var month_name = $(this).data('month_name');
                item = {};
                item ["fee_session_group_id"] = fee_session_group_id;
                item ["fee_master_id"] = fee_master_id;
                item ["fee_groups_feetype_id"] = fee_groups_feetype_id;
                item ["month_name"] = month_name;

                array_to_collect_fees.push(item);
            });

            $.ajax({
                type: 'POST',
                url: base_url + "studentfee/getcollectfee",
                data: {'data': JSON.stringify(array_to_collect_fees),'std_id':std_id},
                dataType: "JSON",
                beforeSend: function () {
                    $this.button('loading');
                },
                success: function (data) {

                    $("#listCollectionModal .modal-body").html(data.view);
                    $(".date").datepicker({
                        format: date_format,
                        autoclose: true,
                        language: '<?php echo $language_name; ?>',
                        endDate: '+0d',
                        todayHighlight: true
                    });
                    $("#listCollectionModal").modal('show');
                    $this.button('reset');
                },
                error: function (xhr) { // if error occured
                    alert("Error occured.please try again");

                },
                complete: function () {
                    $this.button('reset');
                }
            });

        });

    });


    $(function () {
        $(document).on('change', "#discount_group", function () {
            var amount = $('option:selected', this).data('disamount');

            var balance_amount = (parseFloat(fee_amount) - parseFloat(amount)).toFixed(2);
            if (typeof amount !== typeof undefined && amount !== false) {
                $('div#myFeesModal').find('input#amount_discount').prop('readonly', true).val(amount);
                $('div#myFeesModal').find('input#amount').val(balance_amount);

            } else {
                $('div#myFeesModal').find('input#amount').val(fee_amount);
                $('div#myFeesModal').find('input#amount_discount').prop('readonly', false).val(0);
            }

        });
    });

    $("#collect_fee_group").submit(function (e) {
        var form = $(this);
        var url = form.attr('action');
        var smt_btn = $(this).find("button[type=submit]");
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'JSON',
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function () {
                smt_btn.button('loading');
            },
            success: function (response) {

                if (response.status === 1) {

                    location.reload(true);
                } else if (response.status === 0) {
                    $.each(response.error, function (index, value) {
                        var errorDiv = '#form_collection_' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            },
            error: function (xhr) { // if error occured

                alert("Error occured.please try again");

            },
            complete: function () {
                smt_btn.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    $("#select_all").change(function () {  //"select all" change 
        $('input:checkbox').not(this).prop('checked', this.checked);
        // $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

</script>