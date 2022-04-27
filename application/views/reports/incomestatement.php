<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">
    /*REQUIRED*/
    .carousel-row {
        margin-bottom: 10px;
    }
    .slide-row {
        padding: 0;
        background-color: #ffffff;
        min-height: 150px;
        border: 1px solid #e7e7e7;
        overflow: hidden;
        height: auto;
        position: relative;
    }
    .slide-carousel {
        width: 20%;
        float: left;
        display: inline-block;
    }
    .slide-carousel .carousel-indicators {
        margin-bottom: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
    }
    .slide-carousel .carousel-indicators li {
        border-radius: 0;
        width: 20px;
        height: 6px;
    }
    .slide-carousel .carousel-indicators .active {
        margin: 1px;
    }
    .slide-content {
        position: absolute;
        top: 0;
        left: 20%;
        display: block;
        float: left;
        width: 80%;
        max-height: 76%;
        padding: 1.5% 2% 2% 2%;
        overflow-y: auto;
    }
    .slide-content h4 {
        margin-bottom: 3px;
        margin-top: 0;
    }
    .slide-footer {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 78%;
        height: 20%;
        margin: 1%;
    }
    /* Scrollbars */
    .slide-content::-webkit-scrollbar {
        width: 5px;
    }
    .slide-content::-webkit-scrollbar-thumb:vertical {
        margin: 5px;
        background-color: #999;
        -webkit-border-radius: 5px;
    }
    .slide-content::-webkit-scrollbar-button:start:decrement,
    .slide-content::-webkit-scrollbar-button:end:increment {
        height: 5px;
        display: block;
    }

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



<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-bus"></i> Income Statement</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_finance'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header reportbr"></div>
                    <div class="box-header with-border aimsreportsbg">
                        <h3 class="box-title"><i class="fa fa-search"></i> Income Statement <?php //echo $this->lang->line('select_criteria'); ?></h3>
                    </div>

                    <form role="form" action="<?php echo site_url('report/incomestatement') ?>" method="post" class="">
                        <div class="box-body row">

                            <?php echo $this->customlib->getCSRF(); ?>

                            <div class="col-sm-6 col-md-3" >
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('search') . " " . $this->lang->line('type'); ?></label>
                                    <select class="form-control" name="search_type" onchange="showdate(this.value)">

                                        <?php foreach ($searchlist as $key => $search) {
                                            ?>
                                            <option value="<?php echo $key ?>" <?php
                                            if ((isset($search_type)) && ($search_type == $key)) {

                                                echo "selected";
                                            }
                                            ?>><?php echo $search ?></option>
                                                <?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('search_type'); ?></span>
                                </div>
                            </div>

                            <div id='date_result'>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header reportlabel">
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> Income Statement <?php echo $this->lang->line('report'); ?></h3>
                        </div>
                        <div class="box-body table-responsive">
                        <div class="download_label ">
                                     <div class="row text" style="width:100%">
                                    <div style="width:15%; float:left" class="col-sm-3 text text-right">                              
                                        <?php $this->userdata = $this->customlib->getuserdata();
                                                 $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                        ?>
                                        <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/admin_logo/<?php echo $stting[0]['admin_logo']?>" alt="Institute's Logo Not Found ">
                                        
                                    
                                    </div>
                                    <div style="width:60%; float:left; padding-top:25px;" class="col-sm-9 text text-left">
                                        <h4 style="margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']?></p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white"> Income Statement Report
                                <?php
                                 //$this->customlib->get_postmessage();

                                 ?>
                            </div>
                            </div>
                        </div>
                            <!-- <div class="download_label"><?php echo " Income Statement " . $this->lang->line('report') . "<br>";
                                               // $this->customlib->get_postmessage();
                                                ?></div> -->
                            <table class="table table-striped table-hover example" >
                                <thead>
                                    <tr>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th class="text-right">(<?php echo $currency_symbol;?>)Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_income = 0;
                                    $total_expense = 0;
                                    $total_discountallowed = 0;
                                    $total_incometax = 0;
                                    $gross_income = 0;
                                    $net_operating_income = 0;
                                    $net_income = 0;
                                    if (empty($incomes)) {?>
                                    <?php
                                    } else {?>
                                        <tr>
                                            <td style="text-align: left; background-color: #B2D2A4;">INCOME</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php foreach ($incomes as $key => $income) { ?>
                                            <?php if($income['type']=='income'){
                                                $total_income = $total_income + $income['incomeBalance'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $income['account_number']; ?></td>
                                                    <td><?php echo $income['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($income['incomeBalance'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg">
                                                    <td align="left"></td>
                                                    <td class="text-left">Total Income</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_income, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>
                                    <?php if (empty($discountallowed)) {?>
                                    <?php
                                    } else { ?>
                                        <tr>
                                            <td style="text-align: left; background-color: #B2D2A4;">DISCOUNT
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php foreach ($discountallowed as $key => $disallowed) {?>
                                            <?php if($disallowed['type']=='discountallowed'){
                                                $total_discountallowed = $total_discountallowed + $disallowed['discountallowedBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $disallowed['account_number']; ?></td>
                                                    <td> <?php echo $disallowed['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($disallowed['discountallowedBal'], 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left"></td>
                                                    <td class="text-left">Total Discount Allowed</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_discountallowed, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        <tr><td></td><td></td><td></td></tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        <?php if($total_discountallowed > 0){
                                                $gross_income = $total_income - $total_discountallowed;
                                            }else{
                                                $gross_income = $total_income;
                                            }
                                        ?>
                                        <tr class="box box-solid total-bg">
                                            <td align="left"></td>
                                            <td class="text-left">Gross Income</td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($gross_income, 2, '.', ',')); ?>
                                            </td>
                                        </tr>
                                    <?php
                                    if (empty($expenselist)) {?>
                                    <?php
                                    } else { ?>
                                        <tr><td style="text-align: left; background-color: #B2D2A4;">EXPENSES</td><td></td><td></td></tr>
                                        <?php foreach ($expenselist as $key => $expense) { ?>
                                            <?php if($expense['type']=='expense'){
                                                $total_expense = $total_expense + $expense['expenseBalance'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $expense['account_number']; ?></td>
                                                    <td><?php echo $expense['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($expense['expenseBalance'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left"></td>
                                                    <td class="text-left">Total Expenses</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_expense, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>
                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    <?php if($total_expense){
                                        $net_operating_income = $gross_income - $total_expense;
                                    }else{
                                        $net_operating_income = $gross_income;
                                    }?>

                                    <tr class="box box-solid total-bg" >
                                        <td align="left"></td>
                                        <td class="text-left">Net Operating Income before Tax</td>
                                        <td class="text text-right"><?php echo ($currency_symbol . number_format($net_operating_income, 2, '.', ',')); ?>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    if (empty($incometaxes)) {?>
                                    <?php
                                    } else {?>
                                        <tr><td style="text-align: left; background-color: #B2D2A4;">INCOME TAX</td><td></td><td></td>
                                        </tr>
                                        <?php foreach ($incometaxes as $key => $incometax) { ?>
                                            <?php if($incometax['type']=='incometax'){
                                                $total_incometax = $total_incometax + $incometax['incometaxBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $incometax['account_number']; ?></td>
                                                    <td><?php echo $incometax['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($incometax['incometaxBal'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left"></td>
                                                    <td class="text-left">Less: Income Tax</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_incometax, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>
                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    <?php if($total_incometax){
                                        $net_income = $net_operating_income - $total_incometax;
                                    }else{
                                        $net_income = $net_operating_income;
                                    }
                                    $this->session->set_userdata('net_income', $net_income);
                                    ?>
                                    
                                    <tr class="box box-solid total-bg" >
                                        <td align="left"></td>

                                        <td class="text-left">Net Income / <span style="color:red;">(Loss)</span></td>
                                        
                                        <td class="text text-right" >
                                            <?php if($net_income > 0){?>
                                                <?php echo ($currency_symbol . number_format($net_income, 2, '.', ',')); ?>
                                            
                                            <?php }else if($net_income < 0){?>
                                                (<span style="color:red">
                                                    <?php echo ($currency_symbol . number_format($net_income, 2, '.', ',')); ?>
                                                </span>)
                                            <?php }else{ ?>
                                                    <?php echo ($currency_symbol . number_format($net_income, 2, '.', ',')); ?>
                                            <?php }?>
                                        </td>
                                        
                                    </tr>
                                    


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</div>  
</section>
</div>


<script>
<?php
if ($search_type == 'period') {
    ?>

        $(document).ready(function () {
            showdate('period');
        });

    <?php
}
?>

</script>