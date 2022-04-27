<style type="text/css">
    @media print {
       table td:last-child {display:block !important; }
       table th:last-child {display:block !important; }
       table tr th:last-child {display:block !important; }
       table tr td:last-child {display:block !important; }

       #load{
            display: none;
        }
   }
</style>
<div class="row" id="printableArea">
    <div class="col-lg-12">
        <div class="form-horizontal">

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
                <div class="col-sm-5">
                    <?php echo $fee_date; ?>
                </div>
                <div class="col-sm-6">
                    <label ><?php echo $this->lang->line('invoice_no'); ?>:</label>
                <?php echo $invoice_no; ?>
                    
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-1" for="exampleInputEmail1"><?php echo $this->lang->line('mode'); ?>:</label>
                <div class="col-sm-5">
                    <?php echo $payment_mode; ?>
                </div>
                <label class="col-sm-1" for="exampleInputEmail1"><?php echo $this->lang->line('account'); ?>:</label>
                <div class="col-sm-5">
                    <?php echo $bankAccount;?>
                </div>
            </div>
            <div class="form-group">
                <?php if($reference_number){?>
                    <label class="col-sm-2" for="exampleInputEmail1">Reference Number: </label>
                    <div class="col-sm-5" > <?php echo $reference_number; ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>


    <div class="col-md-12">
        <table class="table table-hover table-striped table-bordered" id="example_table" >
            <thead >
                <tr >
                    <th style="background-color:#dddddd94">A/C Head</th>
                    <td style="background-color:#dddddd94">For The Month Of</td>
                    <td style="background-color:#dddddd94">Due Date</td>
                    <td style="background-color:#dddddd94">Payment ID</td>
                    <th style="text-align:right;background-color:#dddddd94">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collectedfeelist as $key => $list) {?>
                    <tr>
                        <td><?php echo $list['account_title']; ?></td>
                        <td><?php echo $list['month_name']; ?></td>
                        <td><?php echo $list['fee_due_date']; ?></td>
                        <td><?php echo $list['id']; ?>/<?php echo $list['inv_id']; ?></td>
                        <td style="text-align:right"><?php echo $list['amount']; ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
            <thead>
                <tr>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94">
                        <?php echo $this->lang->line('total') . " " . $this->lang->line('pay'); ?>:</th>
                    <th style="text-align:right;background-color:#dddddd94">
                        <?php echo number_format((float) $total_pay, 2, '.', ''); ?>
                    </th>
                </tr>
                <?php if($total_fine > 0){?>
                <tr>
                    <td>Fine</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right"><?php echo number_format((float) $total_fine, 2, '.', ''); ?></td>
                </tr>
                <?php } ?>
                <?php if($total_discount > 0){?>
                <tr>
                    <td>Discount</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right"><?php echo number_format((float) $total_discount, 2, '.', ''); ?></td>
                </tr>
                <?php } ?>
                <?php if($total_fine > 0 || $total_discount > 0){?>
                <tr>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94"></th>
                    <th style="text-align: right;background-color:#dddddd94">
                        Net Total:</th>
                    <th style="text-align:right;background-color:#dddddd94">
                        <?php echo number_format((float) $net_amount, 2, '.', ''); ?>
                    </th>
                </tr>
                <?php } ?>
                <tr><td colspan="5" style="text-align: right;"><button type="button" class="btn cfees" id="load" onclick="printDiv('printableArea')" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing" autocomplete="off"> Print</button></td></tr>
            </thead>
            

        </table>
        
        <!-- /.table -->
    </div>


<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    $(document).ready(function () {

        $("#cash_bank2").on('change', function(){
            if($(this).val()==104){
                $('#bank_accounts_div2').show();
            }else{
                $('#bank_accounts_div2').hide();
                $('#reference_number_div2').hide();
                //$("#bank_accounts option:selected").prop("selected", false)
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