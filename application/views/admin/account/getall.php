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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?></h1>
    </section>


    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary" id="bklist">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('chart_of_accounts'); ?></h3>&nbsp&nbsp
                        <?php if($role_id !=7 && $admin_id!=1){?>
                            <?php if(!$isadded){?>
                        <button id="chartofAccounts" onclick="getchartofaccounts(1, 'chartofAccounts')" class="btn btn-primary btn-sm colorbtn"><i class="fa fa-plus"></i><?php echo $this->lang->line('import'); ?> <?php echo $this->lang->line('chart_of_accounts'); ?></button>
                            <?php }?>
                        <?php }?>
                        <div class="pull-right">
                            <?php if ($this->rbac->hasPrivilege('accounttype', 'can_add')) {
                                ?>
                                <a href="<?php echo base_url() ?>admin/accounttype">
                                    <button class="btn btn-primary btn-sm colorbtn" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('account'); ?> <?php echo $this->lang->line('type'); ?></button>
                                </a>&nbsp
                            <?php }
                            ?>
                            <?php if ($this->rbac->hasPrivilege('accounts', 'can_add')) {
                                ?>
                                <a href="<?php echo base_url() ?>admin/account">
                                    <button class="btn btn-primary btn-sm colorbtn" autocomplete="off"><i class="fa fa-plus"></i><?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('account'); ?></button>
                                </a>
                            <?php }
                            ?>
                            <a class="pull-right themecolor" style=" padding-left: 10px" href="<?php echo base_url('admin/income');?>"><i class="fa fa-backward"></i>Back</a>
                        </div><!-- /.pull-right -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-controls">
                            <!-- Check all button -->

                        </div>
                        <div class="mailbox-messages table-responsive">
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
                                <?php echo $this->lang->line('chart_of_accounts'); ?>
                            </div>
                            </div>
                        </div>
                            <!-- <div class="download_label">
                                <?php //echo $this->lang->line('chart_of_accounts'); ?>
                            </div> -->

                            <table id="" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('account'); ?> <?php echo $this->lang->line('type'); ?> </th>
                                        <th><?php echo $this->lang->line('account'); ?> <?php echo $this->lang->line('sub'); ?> <?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('account'); ?> <?php echo $this->lang->line('number'); ?></th>
                                        <th><?php echo $this->lang->line('opening'); ?> <?php echo $this->lang->line('balance'); ?></th>
                                        <th><?php echo $this->lang->line('closing'); ?> <?php echo $this->lang->line('balance'); ?></th>
                                        <!-- <th>Account Details</th> -->
                                        <th><?php echo $this->lang->line('added_by'); ?></th>
                                        <th class="no-print text text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <img style="text-align: center;" id="loading_img" src="<?php echo base_url(); ?>backend/images/loading_blue.gif"> -->
                                    <?php
                                    $count = 1;
                                    if (!empty($accountslist)) { ?>
                                        
                                        <?php foreach ($accountslist as $listaccount) {

                                            ?>
                                            <tr>

                                                <td class="mailbox-name"><?php echo $listaccount['account_title'];?></td>
                                                <td class="mailbox-name"><?php echo $listaccount['parent_account_type'];?></td>
                                                <td class="mailbox-name"><?php echo $listaccount['sub_account_type'];?></td>
                                                <td class="mailbox-name"><?php echo $listaccount['account_number']?></td>
                                                <td class="mailbox-name">Rs.<?php echo number_format($listaccount['opening_balance'], 2);?></td>
                                                <td class="mailbox-name">Rs.<?php echo number_format($listaccount['closing_balance'], 2);?></td>
                                                <!-- <td class="mailbox-name"></td> -->
                                                <td class="mailbox-name"><?php echo $listaccount['addedby']?></td>
                                                
                                                <td class="mailbox-date no-print text text-right">

                                                    <?php if ($this->rbac->hasPrivilege('accounts', 'can_edit')) { ?> 
                                                        <?php if($listaccount['is_closed'] == 1){?>
                                                        <a href="<?php echo base_url(); ?>admin/account/accountbook/<?php echo $listaccount['id'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-book"></i> Acc Book</a>&nbsp;

                                                        <button onclick="return fund_trans(<?php echo $listaccount['id'] ?>, '<?php echo $listaccount['account_title'] ?>')" role="button" class="btn btn-xs btn-info btn-modal" ><i class="fa fa-exchange"></i>Fund Transfer</button>


                                                        <button onclick="return deposit(<?php echo $listaccount['id'] ?>, '<?php echo $listaccount['account_title'] ?>')" class="btn btn-xs btn-success btn-modal" ><i class="fas fa-money-bill-alt"></i> Deposit</button>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/account/edit/<?php echo $listaccount['id'] ?>" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i></a>

                                                        <button data-url="<?php echo base_url(); ?>admin/account/close" data-action="close" data-accid="<?php echo $listaccount['id'] ?>" class="btn btn-xs btn-danger close_account"><i class="fa fa-power-off"></i>Close</button>

                                                    <?php }else{ ?>
                                                            <button data-url="<?php echo base_url(); ?>admin/account/close" data-action="activate" data-accid="<?php echo $listaccount['id'] ?>" class="btn btn-xs btn-success activate_account"><i class="fa fa-power-off"></i> activate</button>
                                                    <?php } ?> 

                                                        <!-- <a data-placement="left" href="<?php echo base_url(); ?>admin/account/delete/<?php echo $listaccount['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a> -->
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
        <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <!-- general form elements disabled -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div id="render_modal"></div>

<script type="text/javascript">

     function getchartofaccounts(id, action){
        //var $this = $('#chartofAccounts').button('loading');
        //$this.button('loading');
        $("#chartofAccounts").text('Accounts are adding...');
        $.ajax({
             url: '<?php echo base_url(); ?>'+'admin/account/importChartofAccounts/',
             type:'post',
             data:'id='+id+'&action='+action,
             dataType: 'json',
             success:function(data){
                if (data.status == "fail") {
                    // var message = "";
                    // $.each(data.error, function (index, value) {
                    //     message += value;
                    // });
                    errorMsg(data.error);
                } else {
                    successMsg(data.message);
                    // $('#myModal').modal({
                    //     show: false,
                    //     backdrop: 'static',
                    //     keyboard: false
                    // });
                    window.location.reload(true);
                }
                $("#chartofAccounts").text('Get Chart Of Accounts');
             }
        });
    }

 $(document).ready(function(){
    

    $(document).on('click', 'button.close_account', function(){
        swal({
              title: 'Are you sure?',
              // text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK ',
              cancelButtonText: ' Cancel',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false
            }).then(function (close) {
                    
                    if(close){
                    var url     = $('button.close_account').data('url');
                    var accid   = $('button.close_account').data('accid');
                    var action  = $('button.close_account').data('action');
                    $.ajax({
                         type: 'post',
                         url: url,
                         dataType: "json",
                         data:"accid="+accid+'&action='+action,
                         success: function(data){
                            console.log(data); 
                            successMsg(data.message);
                            window.location.reload(true);

                        }
                    });

                 }

            }, function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              // if (dismiss === 'cancel') {
              //   swal(
              //     'Cancelled',
              //     'Your imaginary file is safe :)',
              //     'error'
              //   )
              // }
            })
    });

        $(document).on('click', 'button.activate_account', function(){
        swal({
              title: 'Are you sure?',
              // text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK ',
              cancelButtonText: ' Cancel',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false
            }).then(function (close) {
                    
                    if(close){
                    var url     = $('button.activate_account').data('url');
                    var accid   = $('button.activate_account').data('accid');
                    var action  = $('button.activate_account').data('action');
                    $.ajax({
                         type: 'post',
                         url: url,
                         dataType: "json",
                         data:"accid="+accid+'&action='+action,
                         success: function(data){
                            console.log(data); 
                            successMsg(data.message);
                            window.location.reload(true);
                        }
                    });

                 }

            }, function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              // if (dismiss === 'cancel') {
              //   swal(
              //     'Cancelled',
              //     'Your imaginary file is safe :)',
              //     'error'
              //   )
              // }
            })
    });

});
    function fund_trans(id, title) {
            
            $.ajax({
                 url: '<?php echo base_url(); ?>'+'admin/account/getFundTransferModel/',
                 type: 'post',
                 data:"id="+id+'&title='+title,
                 success:function(data){
                    $('#render_modal').html(data);
                    $('#transferFund').modal('show');
                 }
            });
    }

    function deposit(id, title) {
        
            $.ajax({
                 url: '<?php echo base_url(); ?>'+'admin/account/getDepositModel/',
                 type: 'post',
                 data:"id="+id+'&title='+title,
                 success:function(data){
                    $('#render_modal').html(data);
                    $('#depositmodal').modal('show');
                 }
            });
    }

    $(document).on('submit', 'form#fundtransfer_form', function(e){

        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
          method: "POST",
          url: $(this).attr("action"),
          dataType: "json",
          data: data,
          success: function(result){

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

          }
        });
    });

    $(document).on('submit', 'form#deposit_form', function(e){

        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
          method: "POST",
          url: $(this).attr("action"),
          dataType: "json",
          data: data,
          success: function(result){

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

            }
        });
    });

    
</script>



<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#postdate').datepicker({
            // format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });
</script>



<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
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


    $("#print_div").click(function () {
        Popup($('#bklist').html());
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
</script>