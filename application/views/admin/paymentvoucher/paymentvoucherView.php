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
            <i class="fa fa-usd"></i> <?php echo $this->lang->line('payment_voucher_view'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <?php
            if ($this->rbac->hasPrivilege('paymentvoucher', 'can_add')) {
                ?>
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('payment_voucher_view'); ?></h3>
                        </div><!-- /.box-header -->
                            <div class="box-body">

                                <div class="col-md-12">

                                    <div class="form-group col-md-2">
                                        
                                        <?php if($rvresult['staff_type']=='clients'){?>   
                                        <label for="clients"><?php echo $this->lang->line('clients'); ?></label>&nbsp; 
                                        <input type="checkbox" name="staff_type" value="clients" id="clients" checked >&nbsp;&nbsp;
                                        <?php }?>
                                        <?php if($rvresult['staff_type']=='staff'){?> 
                                            <label for="staff"><?php echo $this->lang->line('staff'); ?></label>&nbsp;&nbsp;
                                            <input type="checkbox" name="staff_type" value="staff" id="staff" checked>
                                        <?php }?>
                                            
                                    </div>
                                    
                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('name'); ?>:</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div><?php echo $name;?></div>
                                        <!-- <div id="name_div">
                                            <input id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name', $rvresult['name']); ?>" />
                                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        </div> -->
                                    </div>
                                    
                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('date'); ?>:</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo date($this->customlib->getSchoolDateFormat($rvresult['date'])); ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-sm-7">

                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <label for="rv_number"><?php echo $this->lang->line('pv_number'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo $rvresult['invoice_no']; ?>
                                    </div>
                                </div>
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-7"></div>
                                    <div class="col-md-1 col-sm-1">
                                        <label for="cash_bank"><?php echo $this->lang->line('cash_bank'); ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php if($rvresult['cash_bank']==104){?>
                                            <?php echo $this->lang->line('bank'); ?>
                                        <?php } if($rvresult['cash_bank']==107){?>
                                            <?php echo $this->lang->line('cash'); ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                 <?php if($rvresult['bank_account_id'] > 0){?>   
                                <div class="col-md-12">
                                    <div class="form-group col-md-7"></div>
                                        <div class="form-group col-md-1">
                                            <label for="bank_acc"><?php echo $this->lang->line('bank_acc'); ?></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <?php 
                                            $data['bankAccount']   = $this->account_model->get($rvresult['bank_account_id']);
                                            echo $data['bankAccount']['account_title']
                                            ?>
                                           
                                        </div>
                                    
                                </div>   
                                <?php } ?> 
                                <?php if($rvresult['reference_number']!= ''){?>
                                <div class="col-md-12">
                                    <div class="form-group col-md-7"></div>
                                        <div class="form-group col-md-1">
                                            <label for="ref_no"><?php echo $this->lang->line('ref_no'); ?></label>
                                        </div>
                                        <div class="form-group col-md-4" >
                                            <?php echo $rvresult['reference_number']; ?>
                                        </div>
                                </div>
                                <?php } ?>

                                <div class="col-md-12">
                                    <input type="hidden" name="total_sum" id="total_sum" value="0">
                                    <table class="table table-hover table-striped table-bordered" id="example_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('ac_head'); ?></th>
                                                <th><?php echo $this->lang->line('description'); ?></th>
                                                <th class="text-right"><?php echo $this->lang->line('amount'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php for ($i= 0; $i < count($account_id); ) { ?>
                                                <tr id="rv<?php echo $i;?>">
                                                <td>
                                                    <input id="account_title<?php echo $i;?>" name="account_title[]" type="text" class="form-control" value="<?php echo $account_title[$i]; ?>" style="width: 300px;" readonly/>
                                                    
                                                </td>
                                                <td>
                                                    <input id="description<?php echo $i;?>" name="description[]" type="text" class="form-control"  value="<?php echo $description[$i]; ?>" style="width:600px" readonly/>
                                                </td>
                                                <td>
                                                    <input id="amount<?php echo $i;?>" name="amount[]" type="text" class="form-control" value="<?php echo $amount[$i]; ?>" style="text-align: right;" data-amt="0" readonly/>
                                                </td>
                                                <?php $i++ ;} ?>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;font-size: 14px; font-weight: 600;">
                                                    <b style="font-size: 14px;"><?php echo $this->lang->line('total'); ?>:&nbsp;&nbsp;</b>
                                                    <?php echo  number_format($rvresult['total_amount'], 2); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <!-- /.table -->
                                </div>
                                <!-- /.box-body -->
                        
                            </div>
                        
                    </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>

        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function () {
    var counter = '<?php echo $counter;?>';
    for (var i = 0; i < counter; i++) {
        sum(i);
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
 });
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
          { "width": "250px", "targets": 1 },
          { "width": "50px", "targets": 2 },
          { "width": "50px", "targets": 3 },
        ],
        fixedColumns: true
    } );
} );

</script>