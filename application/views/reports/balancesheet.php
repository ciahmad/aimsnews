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
            <i class="fa fa-bus"></i> Balance Sheet</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_finance'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header reportbr"></div>
                    <div class="box-header with-border aimsreportsbg">
                        <h3 class="box-title"><i class="fa fa-search"></i> Balance Sheet <?php //echo $this->lang->line('select_criteria'); ?></h3>
                    </div>

                    <form role="form" action="<?php echo site_url('report/balancesheet') ?>" method="post" class="">
                        <div class="box-body row">

                            <?php echo $this->customlib->getCSRF(); ?>

                            <div class="col-sm-6 col-md-6" >
                                <div class="form-group">
                                <label for="transaction_date_range">Date Range:</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" autocomplete="off" name="transaction_date_range" class="form-control pull-right date" id="transaction_date_range">
                                </div>
                            </div>
                                
                            </div>

                            <div class="col-sm-1 col-md-1" >
                                <label></label>
                                <div class="form-group">
                                    <button type="button" name="search" value="search_filter" id="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                            
                        </div>
                    </form>


                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header reportlabel">
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> Balance Sheet <?php echo $this->lang->line('report'); ?></h3>
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
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php echo  " Balance Sheet " . $this->lang->line('report');?>
                            </div>
                            </div>
                        </div>
                            <!-- <div class="download_label">
                                <?php echo  " Balance Sheet " . $this->lang->line('report');?>
                            </div> -->
                            <table class="table table-hover example" >
                                <thead>
                                    <tr>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th class="text-right">(<?php echo $currency_symbol;?>)Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_fixed_assets = 0;
                                    $total_currentAsset = 0;
                                    $total_assets = 0;
                                    $total_capital = 0;
                                    $total_drawing = 0;
                                    $net_capital = 0;
                                    $total_current_liability = 0;
                                    $total_longterm_liability = 0;
                                    $total_cap_liab = 0;
                                    if (empty($fixedassets)) {?>
                                    <?php
                                    } else {?>
                                        <tr>
                                            <td style="text-align: left; background-color: #165015;color: #fff;">ASSETS</td>
                                            <td></td><td></td>
                                        </tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        <tr><td style="text-align: left; background-color: #B2D2A4;">FIXED ASSETS Less Acc Depreciation</td>
                                            <td></td><td></td>
                                        </tr>
                                        <?php foreach ($fixedassets as $key => $fixedasset) { ?>
                                            <?php if($fixedasset['type']=='assets'){
                                                $total_fixed_assets = $total_fixed_assets + $fixedasset['assetsBalance'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $fixedasset['account_number']; ?></td>
                                                    <td><?php echo $fixedasset['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($fixedasset['assetsBalance'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg">
                                                    <td align="left" style="background-color:#fff;"></td>
                                                    <td class="text-left">Total Fixed Assets</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_fixed_assets, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>
                                    <tr><td></td><td></td><td></td></tr>

                                    <?php if (empty($currentAssets)) {?>
                                    <?php
                                    } else { ?>
                                        <tr><td style="text-align: left; background-color: #B2D2A4;">CURRENT ASSETS </td><td></td><td></td></tr>
                                        <?php foreach ($currentAssets as $key => $currentAsset) {?>
                                            <?php if($currentAsset['type']=='currentAssets'){
                                                $total_currentAsset = $total_currentAsset + $currentAsset['currentAssetsBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $currentAsset['account_number']; ?></td>
                                                    <td> <?php echo $currentAsset['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($currentAsset['currentAssetsBal'], 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left" style="background-color:#fff;"></td>
                                                    <td class="text-left">Total Current Assets</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_currentAsset, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        <tr><td></td><td></td><td></td></tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        <?php 
                                            $total_assets = $total_fixed_assets + $total_currentAsset;
                                        ?>
                                        <tr class="box box-solid total-bg">
                                            <td align="left" style="background-color:#fff"></td>
                                            <td class="text-left" style="background-color: #165015;color: #fff;font-size:16px">TOTAL ASSETS</td>
                                            <td class="text text-right" style="background-color: #165015;color: #fff;font-size:16px"><?php echo ($currency_symbol . number_format($total_assets, 2, '.', ',')); ?>
                                            </td>
                                        </tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        <tr><td style="text-align: left; background-color: #91061F;color: #fff;">CAPITAL AND LIABILITIES</td><td></td><td></td></tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        
                                    <?php
                                    if (empty($capitals)) {?>
                                    <?php
                                    } else { ?>
                                        <tr><td style="text-align: left; background-color: #BA0F2E;color: #fff;">OWNER'S CAPITAL</td><td></td><td></td></tr>
                                        <?php foreach ($capitals as $key => $capital) { ?>
                                            <?php if($capital['type']=='capital'){
                                                $total_capital = $total_capital + $capital['capitalBalance'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $capital['account_number']; ?></td>
                                                    <td><?php echo $capital['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($capital['capitalBalance'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left" style="background-color:#fff"></td>
                                                    <td class="text-left">Total Capital</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_capital, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>
                                    
                                    
                                    <?php
                                    if (empty($drawings)) {?>
                                    <?php
                                    } else {?>
                                        <tr><td></td><td></td><td></td></tr>
                                        <tr><td style="text-align: left; background-color: #BA0F2E;color: #fff;">LESS DRAWINGS</td><td></td><td></td></tr>
                                        <tr><td></td><td></td><td></td></tr>
                                        <?php foreach ($drawings as $key => $drawing) { ?>
                                            <?php if($drawing['type']=='drawing'){
                                                $total_drawing = $total_drawing + $drawing['drawingsBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $drawing['account_number']; ?></td>
                                                    <td><?php echo $drawing['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($drawing['drawingsBal'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left" style="background-color:#fff"></td>
                                                    <td class="text-left">Total Drawings</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_drawing, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>

                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    
                                    <tr class="box box-solid total-bg" >
                                        <td align="left" style="background-color:#fff"></td>
                                        <td class="text-left">INCOME / <span style="color:red;">(Loss)</span></td>
                                        
                                        <td class="text text-right" >
                                            <?php if($this->session->userdata('net_income') > 0){?>
                                                <?php echo ($currency_symbol . number_format($this->session->userdata('net_income'), 2, '.', ',')); ?>
                                            
                                            <?php }else if($this->session->userdata('net_income') < 0){?>
                                                (<span style="color:red">
                                                    <?php echo ($currency_symbol . number_format($this->session->userdata('net_income'), 2, '.', ',')); ?>
                                                </span>)
                                            <?php }else{ ?>
                                                    <?php echo ($currency_symbol . number_format($this->session->userdata('net_income'), 2, '.', ',')); ?>
                                            <?php }?>
                                        </td>
                                        
                                    </tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    <tr class="box box-solid total-bg">
                                        <td align="left" style="background-color:#fff;"></td>
                                        <td class="text-left">Net Capital</td>
                                        <?php $net_capital = $total_capital - $total_drawing + $this->session->userdata('net_income'); ?>
                                        <td class="text text-right"><?php echo ($currency_symbol . number_format($net_capital, 2, '.', ',')); ?>
                                        </td>
                                    </tr>

                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td style="text-align: left; background-color: #BA0F2E;color: #fff;">CURRENT LIABILITIES</td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>

                                    <?php
                                    if (empty($current_liabilities)) {?>
                                    <?php
                                    } else {?>
                                        
                                        <?php foreach ($current_liabilities as $key => $current_liability) { ?>
                                            <?php if($current_liability['type']=='currliability'){
                                                $total_current_liability = $total_current_liability + $current_liability['current_liabilitiesBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $current_liability['account_number']; ?></td>
                                                    <td><?php echo $current_liability['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($current_liability['current_liabilitiesBal'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left" style="background-color:#fff"></td>
                                                    <td class="text-left">Total Current Liabilities</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_current_liability, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>

                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td style="text-align: left; background-color: #BA0F2E;color: #fff;">LONG TERM LIABILITIES</td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>

                                    <?php
                                    if (empty($longterm_liabilities)) {?>
                                    <?php
                                    } else {?>
                                        
                                        <?php foreach ($longterm_liabilities as $key => $longterm_liability) { ?>
                                            <?php if($longterm_liability['type']=='longtermliability'){
                                                $total_longterm_liability = $total_longterm_liability + $longterm_liability['longterm_liabilitiesBal'];
                                            ?> 
                                                <tr>
                                                    <td><?php echo $longterm_liability['account_number']; ?></td>
                                                    <td><?php echo $longterm_liability['account_title']; ?></td>
                                                    <td class="text-right"><?php echo ( number_format($longterm_liability['longterm_liabilitiesBal'], 2, '.', ',')); ?></td>
                                                </tr>
                                            <?php }?>
                                        <?php } ?>
                                                <tr class="box box-solid total-bg" >
                                                    <td align="left" style="background-color:#fff"></td>
                                                    <td class="text-left">Total Long Term Liabilities</td>
                                                    <td class="text text-right"><?php echo ($currency_symbol . number_format($total_longterm_liability, 2, '.', ',')); ?>
                                                    </td>
                                                </tr>
                                    <?php } ?>

                                    <tr><td></td><td></td><td></td></tr>
                                    <tr><td></td><td></td><td></td></tr>
                                    <?php 
                                        $total_cap_liab = $net_capital + $total_current_liability + $total_longterm_liability;
                                    ?>
                                    <tr class="box box-solid total-bg">
                                        <td align="left" style="background-color:#fff"></td>
                                        <td class="text-left" style="background-color: #91061F;color: #fff;font-size:16px">TOTAL CAPITAL AND LIABILITIES</td>
                                        <td class="text text-right" style="background-color: #91061F;color: #fff;font-size:16px"><?php echo ($currency_symbol . number_format($total_cap_liab, 2, '.', ',')); ?>
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

    $(document).ready(function () {
        // $('#enquiry_date').daterangepicker();

        $('#transaction_date_range').daterangepicker({
            separator: " TOOOO ",
            startDate: moment().toDate('month'),
            endDate: moment().toDate('month'),
            locale: {
                format: calendar_date_time_format
            }
        });

        $('#transaction_date_range').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format(calendar_date_time_format) + ' - ' + picker.endDate.format(calendar_date_time_format));
        });

        $('#transaction_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });


    });

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