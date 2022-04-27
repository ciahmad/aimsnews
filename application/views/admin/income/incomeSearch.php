<style type="text/css">
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
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    $path = "";
    
    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
        
        
?>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-usd"></i> <?php echo $this->lang->line('income'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <?php // $this->load->view('admin/income/_sidemenu');?>
            <div class="col-md-2">
    <div class="box border0">
        <ul class="tablists"> 
            <?php if ($this->rbac->hasPrivilege('income', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/income" style="<?php echo set_1stLevel('income/index');?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_income'); ?></a></li>
            <?php  } ?>
            <?php if ($this->rbac->hasPrivilege('expense', 'can_view')) { ?>
            <li><a href="<?php echo base_url(); ?>admin/expense" style="<?php echo set_1stLevel('expense/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_expense'); ?></a></li>
            <?php  } ?>
            <li class=""><a href="<?php echo base_url(); ?>admin/receiptvoucher" style="<?php echo set_1stLevel('receiptvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Receipt Voucher</a></li>

            <li class=""><a href="<?php echo base_url(); ?>admin/paymentvoucher" style="<?php echo set_1stLevel('paymentvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Payment Voucher</a></li>

            <li class=""><a href="<?php echo base_url(); ?>admin/journalvoucher" style="<?php echo set_1stLevel('journalvoucher/index');?>"><i class="fa fa-angle-double-right"></i>Journal Voucher</a></li>
            
            <?php if ($this->rbac->hasPrivilege('accounts', 'can_view')) { ?>
            <li class=""><a href="<?php echo base_url(); ?>admin/account/getall" style="<?php echo set_1stLevel('account/getall');?>"><i class="fa fa-angle-double-right" ></i>Chart of Accounts</a></li>
            <?php  } ?>

            <li class="<?php echo set_Submenu('income/incomesearch'); ?>"><a href="<?php echo base_url(); ?>admin/income/incomesearch"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('search_income'); ?></a></li>
            <li class="<?php echo set_Submenu('expense/expensesearch'); ?>"><a href="<?php echo base_url(); ?>admin/expense/expensesearch"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_expense'); ?></a></li>
             <li class="<?php echo set_Submenu('Reports/finance'); ?>"><a href="<?php echo base_url(); ?>report/finance"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('finance'); ?></a></li>
            
        </ul>
    </div>
</div>
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('income_search'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/income/incomeSearch') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-6 col-md-6">
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
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/income/incomeSearch') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search'); ?></label><small class="req"> *</small>
                                                <input autofocus="" type="text" value="<?php echo set_value('search_text', ""); ?>" name="search_text"  class="form-control" placeholder="Search by Income">
                                                <span class="text-danger"><?php echo form_error('search_text'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>


                    <?php if (isset($resultList)) { ?>
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
                                <?php //echo $this->lang->line('income_list'); ?> Income Search Report
                            </div>
                            </div>
                        </div>
                
                            <!-- <div class="box-body table-responsive">
                                <div class="download_label">
                                    <?php echo $this->lang->line('income_result'); ?>
                                </div> -->
                                <table class="table table-striped  table-hover example">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                            <th><?php echo $this->lang->line('income_head'); ?></th>
                                            <th><?php echo $this->lang->line('date'); ?></th>
                                            <th><?php echo $this->lang->line('amount'); ?></th>
                                            <th class="text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (empty($resultList)) {
                                            ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>

                                            </tr>
                                        </tfoot>
                                        <?php
                                    } else {
                                        $count = 1;
                                        $grand_total = 0;
                                        foreach ($resultList as $key => $value) {
                                            $grand_total = $grand_total + $value['amount'];
                                            ?>
                                            <tr>
                                                <td><?php echo $value['name']; ?> </td>
                                                <td><?php echo $value['invoice_no']; ?> </td>
                                                <td><?php echo $value['income_category'] ?></td>
                                                <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?>     </td>

                                                <td class="pull-right"><?php echo ($value['amount']); ?>  </td>
                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                        <tr class="total-bg">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="pull-right text-bold"><?php echo $this->lang->line('grand_total'); ?> : <?php echo ($currency_symbol . number_format($grand_total, 2, '.', '')); ?>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>   <!-- /.row -->

    </section><!-- /.content -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
        $(".date").datepicker({
            // format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true,
            todayHighlight: true

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
<script type="text/javascript">

    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });

    // $(document).ready(function () {
    //     $('.example').dataTable({
    //         "bSort": false,
    //         "paging": false,

    //     });

    // })
</script>
<script type="text/javascript">

    var base_url = '<?php echo base_url() ?>';

    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
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
        }, 500);


        return true;
    }
</script>


