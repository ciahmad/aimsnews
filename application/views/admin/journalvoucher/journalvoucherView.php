

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
        <h1>
            <i class="fa fa-usd"></i><?php echo $this->lang->line('journal_voucher'). ' ' .$this->lang->line('view'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <?php
            if ($this->rbac->hasPrivilege('journalvoucher', 'can_add')) {
                ?>
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('journal_voucher'). ' ' .$this->lang->line('view'); ?></h3>
                        </div><!-- /.box-header -->

                            <div class="box-body">

                                <div class="col-md-12">
                                    <div class="form-group col-md-2">
                                        <?php if($jvresult['staff_type']=='clients'){?> 
                                        <label for="clients"><?php echo $this->lang->line('clients'); ?></label>&nbsp;   
                                        <input type="checkbox" name="staff_type" value="clients" id="clients" checked >&nbsp;&nbsp;
                                        <?php }?>
                                        <?php if($jvresult['staff_type']=='staff'){?> 
                                            <label for="staff"><?php echo $this->lang->line('staff'); ?></label>&nbsp;&nbsp;
                                            <input type="checkbox" name="staff_type" value="staff" id="staff" checked>
                                        <?php }?>
                                    </div>    

                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('name'); ?>:
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo $name;?>
                                    </div>
                                    
                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('date'); ?>:</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($jvresult['date'])); ?>
                                        
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-7">

                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('jv_number'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo $jvresult['invoice_no']; ?>
                                        
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="debit_total_sum" id="debit_total_sum" value="<?php echo $jvresult['debit_total']; ?>">
                                    <input type="hidden" name="credit_total_sum" id="credit_total_sum" value="<?php echo $jvresult['credit_total']; ?>">
                                    <table class="table table-hover table-striped table-bordered" id="example_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('ac_head'); ?></th>
                                                <th><?php echo $this->lang->line('description'); ?></th>
                                                <th><?php echo $this->lang->line('debit'); ?></th>
                                                <th style="float: left;"><?php echo $this->lang->line('credit'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php for ($i= 0; $i < count($account_id); ) { ?> 
                                                <?php $count = $i; ?>        
                                                <tr id="jv<?php echo $i;?>">
                                                <td><input id="account_title<?php echo $i;?>" name="account_title[]" type="text" class="form-control" value="<?php echo $account_title[$i]; ?>" style="width: 300px;" disabled/>
                                                <input id="account_id<?php echo $i;?>" name="account_id[]" type="hidden" value="<?php echo $account_id[$i]; ?>" disabled/>   
                                                </td>
                                                <td><input id="description<?php echo $i;?>" name="description[]" type="text" class="form-control" value="<?php echo $description[$i]; ?>" style="width: 500px;" disabled/>
                                                </td>
                                                <td><input id="debit<?php echo $i;?>" name="debit[]" type="text" class="form-control"  value="<?php echo $debit[$i]; ?>" style="text-align: right;" data-debit="0" disabled/>
                                                </td>
                                                <td><input id="credit<?php echo $i;?>" name="credit[]" type="text" class="form-control" value="<?php echo $credit[$i]; ?>" style="text-align: right;" data-credit="0" disabled/>
                                                
                                                </td>
                                            </tr>

                                            <?php $i++ ;} ?>

                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="text-align: right;">
                                                    <b style="font-size: 16px;"><?php echo $this->lang->line('total'); ?>:</b>
                                                </td>
                                                <td><input id="debit_total" name="debit_total" type="text" class="form-control" value="<?php echo $jvresult['debit_total']; ?>" style="text-align: right; font-size: 16px; font-weight: 600;" disabled/></td>
                                                <td><input id="credit_total" name="credit_total" type="text" class="form-control" value="<?php echo $jvresult['credit_total']; ?>" style="text-align: right;font-size: 16px; font-weight: 600;" disabled/></td>
                                            </tr>
                                            

                                        </tbody>
                                    </table>
                                    
                                    <!-- /.table -->
                                </div><!-- /.box-body -->
                            
                            </div>
                    </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>

        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">

    $(document).ready(function(){

        var counter = '<?php echo $counter;?>';
        for (var i = 0; i < counter; i++) {
            $("#debit"+i).attr('data-debit', $('#debit'+i).val());
            $("#credit"+i).attr('data-credit', $('#credit'+i).val());
            sumDebit(i);
            sumCredit(i);
        }
        
    });

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

</script>

<script type="text/javascript">
   
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
    });

</script>