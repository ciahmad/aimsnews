<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-6">
                <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"> Account Book</h3>
                        <div class="box-tools pull-right">
                            <a style="float: right;color: #fff" href="<?php echo $referer_url;?>"><i class="fa fa-backward"></i>Back</a>                            
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-4 col-xs-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <table class="table">
                            <tbody><tr>
                                <th>Account Name: </th>
                                <td><?php echo $account['account_title'];?></td>
                            </tr>
                            <tr>
                                <th>Account Type:</th>
                                <td> <?php if($parent_account_type!='' && $sub_account_type==''){
                                    echo $parent_account_type;
                                }else if($sub_account_type!='' && $parent_account_type==''){
                                    echo $sub_account_type;
                                }else{
                                    echo $parent_account_type.  ' - ' .$sub_account_type; 
                                }?>

                                </td>
                            </tr>
                            <tr>
                                <th>Account Number:</th>
                                <td><?php echo $account['account_number'];?></td>
                            </tr>
                            <tr>
                                <th>Balance:</th>
                                <td><span id="account_balance" style="text-align: right;font-size: 14px; font-weight:600"><?php echo $currency_symbol . number_format($closing_balance, 2);?></span></td>
                            </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title"> <i class="fa fa-filter" aria-hidden="true"></i> Filters:</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                        <?php echo $this->session->flashdata('msg') ?>
                        </div>
                        <form role="form" action="<?php echo site_url() ?>admin/account/accountbook/<?php echo $id; ?>" method="post" class="">
                            <?php echo $this->customlib->getCSRF(); ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="transaction_date_range">Date Range:</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" autocomplete="off" name="transaction_date_range" class="form-control pull-right date" id="transaction_date_range">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="transaction_type">Transaction Type:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-filter"></i></span>
                                    <select class="form-control" id="transaction_type" name="transaction_type">
                                        <option value="" selected="selected">All</option>
                                        <?php if($trans_type=='debit'){ ?>
                                            <option value="debit" selected>Debit</option>
                                        <?php }else{ ?>
                                            <option value="debit">Debit</option>
                                        <?php }?>
                                        <?php if($trans_type=='credit'){ ?>
                                            <option value="credit" selected>Credit</option>
                                        <?php }else{?>
                                            <option value="credit">Credit</option>
                                        <?php }?>
                                        
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group" >
                                <div class="col-sm-12" style="padding-top: 20px;">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header ptbnull aimsreportsbg">
                         <h3 class="box-title titlefix"><?php echo $account['account_title'];?></h3> 
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
                                    <div style="width:60%; float:left; padding-top:25px;" class="col-sm-9 text text-left">
                                        <h4 style="margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']?></p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php
                                    echo "Account Book". " " ."( ".$account['account_title']." )";
                                 ?>
                            </div>
                            </div>
                        </div>
                         <!-- <div class="download_label">
                             <?php 
                             echo $account['account_title'];
                             ?></div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Voucher No</th>
                                        <th>Description</th>
                                        <th>Added By</th>
                                        <th style="text-align:right">Debit</th>
                                        <th style="text-align:right">Credit</th>
                                        <th style="text-align:right">Balance</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        if (empty($transectionlists)) {
                                            ?>

                                            <?php
                                        } else {
                                            $debit_amount =0;
                                            $credit_amount =0;
                                            $bal_amount =0;
                                            foreach ($transectionlists as $transectionlist) {
                                                $debit_amount  = $debit_amount+$transectionlist['debit'];
                                                $credit_amount = $credit_amount+$transectionlist['credit'];
                                                $bal_amount    = $bal_amount+$transectionlist['balance'];
                                                ?>
                                                <tr>
                                                    <td class="mailbox-name">
                                                        <?php echo $transectionlist['operation_date'] ?>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        <?php echo $transectionlist['voucher_number'] ?>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        <?php echo $transectionlist["description"]; ?>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        <?php echo $transectionlist['addedby']; ?>
                                                    </td>
                                                    <td class="mailbox-name text-right">

                                                        <?php 
                                                        if($transectionlist['debit'] > 0){
                                                            echo $currency_symbol . number_format($transectionlist['debit'], 2);
                                                        }?>
                                                    </td>
                                                    <td class="mailbox-name text-right">

                                                        <?php 
                                                        if($transectionlist['credit'] > 0){
                                                            echo $currency_symbol . number_format($transectionlist['credit'], 2);
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                    <td class="mailbox-name text-right">
                                                        <?php echo $currency_symbol . number_format($transectionlist['balance'], 2);?>
                                                       
                                                    </td>
                                                   
                                                    
                                                </tr>
                                                <?php
                                            } ?>

                                              <tr>
                                                    <th colspan="5" style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($debit_amount, 2);?></th>
                                                    <th style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($credit_amount, 2);?></th>
                                                    <th style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($closing_balance, 2);?></th>
                                                </tr>     

                                        <?php }
                                        ?>
                                    
                                </tbody>
                            </table><!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">

    $(document).ready(function () {

        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });

</script>
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


    $(document).ready( function () {
    $('#myTable').DataTable();
} );
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
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>