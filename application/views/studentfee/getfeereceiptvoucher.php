
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
            <div class="col-sm-3">
                <input id="date" name="collected_date" placeholder="" type="text" class="form-control date" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" autocomplete="off">
                <span id="form_collection_collected_date_error" class="text text-danger"></span>
            </div>
            <label class="col-sm-1" for="exampleInputEmail1">FRV</label>
            <div class="col-sm-3">
                <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo $invoice_no; ?>" readonly style="background-color: #dddddd94;"/>
                <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
            </div>
            <label class="col-sm-1" for="exampleInputEmail1">Mode<small class="req"> *</small></label>
            <div class="col-sm-3">
                <select autofocus="" id="cash_bank2" name="cash_bank" class="form-control" >
                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                    <option value="30">Cash</option>
                    <option value="31">Bank</option>
                </select>
                <span class="text-danger"><?php //echo form_error('inc_head_id'); ?></span>
            </div>
        </div>

        <div class="form-group">
            <div style="display: none;" id="cash_accounts_div2"> 
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
            <div style="display: none;" id="bank_accounts_div2"> 
                <label class="col-sm-1" for="exampleInputEmail1">Bank</label><small class="req"> *</small>
                <div class="col-sm-3">
                    
                    <select autofocus="" id="bank_account_id2" name="bank_account_id" class="form-control" >
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
            <div style="display: none;" id="reference_number_div2">
                <label class="col-sm-1" for="exampleInputEmail1">Ref<small class="req"> *</small></label>
                <div class="col-sm-3" >
                    <input id="reference_number2" name="reference_number" placeholder="" type="text" class="form-control"  value="" />
                    <span class="text-danger"><?php echo form_error('reference_number'); ?></span>
                </div>
            </div>
        </div>

    </div>
</div>
<?php //print_r(count($feearray));?>
<?php if(!empty($feearray)){ ?>
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
        <?php
        $row_counter = 1;
        $total_amount = 0;
    
        foreach ($feearray as $fee_key => $fee_value) {
            $amount_prev_paid = 0;
            $amount_to_be_pay = $fee_value->amount;

            if ($fee_value->is_system) {
                $amount_to_be_pay = $fee_value->student_fees_master_amount;
            }

            if (is_string(($fee_value->amount_detail)) && is_array(json_decode(($fee_value->amount_detail), true))) {

                $amount_data = json_decode($fee_value->amount_detail);

                foreach ($amount_data as $amount_data_key => $amount_data_value) {
                    $amount_prev_paid = $amount_prev_paid + ($amount_data_value->amount + $amount_data_value->amount_discount);
                }

                if ($fee_value->is_system) {
                    $amount_to_be_pay = $fee_value->student_fees_master_amount - $amount_prev_paid;
                } else {

                    $amount_to_be_pay = $fee_value->amount - $amount_prev_paid;
                }
            }
                $total_amount = $total_amount + $amount_to_be_pay;
            if ($amount_to_be_pay > 0) {
            ?>

            
                <input name="row_counter[]" type="hidden" value="<?php echo $row_counter; ?>">
                <input name="student_fees_master_id_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->id; ?>">
                <input name="fee_groups_feetype_id_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->fee_groups_feetype_id; ?>">
                <input name="fee_amount_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $amount_to_be_pay; ?>">
                <input name="fee_acc_id_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->code; ?>">
                <input name="month_name_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->month_name; ?>">
                <input name="fee_due_date_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->fee_due_date; ?>">
                <!-- <div class="product-info">
                    <span class="product-description"><?php //echo $fee_value->code; ?></span>
                </div> -->
                <tr>
                    <td><?php echo $fee_value->account_number; ?> - <?php echo $fee_value->type; ?> </td>
                    <td><?php echo $fee_value->month_name; ?> </td>
                    <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->fee_due_date)); ?></td>
                    <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat(date('d-M-Y'))); ?></td>
                    <td style="text-align:right"><?php echo $amount_to_be_pay; ?> </td>
                </tr>

            <?php
            }
            $row_counter++;
        }
        ?>
        </tbody>
        <thead>
            <tr> 
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">
                    <?php echo $this->lang->line('total') . " " . $this->lang->line('pay'); ?>:</th>
                <th style="text-align:right;background-color:#dddddd94"><?php echo number_format((float) $total_amount, 2, '.', ''); ?>
                <input type="hidden" name="total_amount" id="total_amount2" value="<?php echo number_format((float) $total_amount, 2, '.', ''); ?>"></th>
            </tr>
        </thead>

<!--         <tr>
            <td >
                <label class="col-sm-4" for="exampleInputEmail1">Fine: </label>
                <div class="col-sm-8" >
                   <select autofocus="" id="selfine2" name="selfine" class="form-control">
                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                    <?php foreach ($fines as $key => $fine) { ?>
                    <option value="<?php echo $fine['code'];?>" data-fineamount2="<?php echo $fine['amount'];?>"><?php echo $fine['account_number'];?> - <?php echo $fine['name'];?></option>
                    <?php } ?>
                   </select>
                </div>
            </td>
            <td colspan="3"></td>
            <td style="text-align:right;">
                <input style="text-align:right; width: 200px; float: right;" type="text" name="fine_amount" id="fine_amount2" readonly value="0" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label class="col-sm-4" for="exampleInputEmail1">Discount: </label>
                <?php //print_r($discount_not_applied);?>
                <div class="col-sm-8" >
                   <select autofocus="" id="sel_discount2" name="sel_discount" class="form-control">
                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                    <?php foreach ($discounts as $key => $value) { ?>
                    <option value="<?php echo $value['code'];?>" data-disamount2="<?php echo $value['amount'];?>"><?php echo $value['account_number'];?> - <?php echo $value['name'];?></option>
                    <?php } ?>
                   </select>
                </div>
            </td>
            <td colspan="3"></td>
            <td style="text-align:right;">
                <input style="text-align:right; width: 200px; float: right;" class="form-control" type="text" name="discount_amount" id="discount_amount2" readonly value="0">
            </td>
        </tr> -->

        <!-- <thead>
            <tr>
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">
                <th style="text-align: right;background-color:#dddddd94">Net Total:</th>
                <th style="text-align:right;background-color:#dddddd94; padding-right:25px">
                    <span id="net_total2"><?php echo number_format((float) $total_amount, 2, '.', ''); ?></span></th>
                <input type="hidden" name="net_amount" id="net_amount2" value="<?php echo number_format((float) $total_amount, 2, '.', ''); ?>">
            </tr>
        </thead> -->
    </table>
    <button type="submit" style="float: right;" class="btn cfees payment_collect" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i class="fa fa-money"></i> <?php echo $this->lang->line('collect_fees'); ?></button>
    <!-- /.table -->
</div>
<?php } ?>

<script type="text/javascript">

    $(document).ready(function () {

        $('#total_amount2').on('keyup', function(){
            //var feetype_balance = '<?php //echo $feetype_balance; ?>';
            var total_fee = $('#total_fee').val();
            var total_amount = parseFloat($('#total_amount2').val());
            if(total_amount > total_fee){
                $('#total_amount2').val(total_fee);
                alert('Amount is greater then due amount');
                $('#total_amount2').focus();
                return false;
            }
            $('#total_pay').text(total_amount.toFixed(2));
            var discount_amount = parseFloat($('#discount_amount2').val());
            var fine_amount     = parseFloat($('#fine_amount2').val());
            var net_amount      = total_amount - discount_amount + fine_amount;
            $('#net_total2').text(net_amount.toFixed(2));

        });

        $(document).on('change', "#sel_discount2", function () {
            var discount_amount = $('option:selected', this).data('disamount2');
            var total_amount    = parseFloat($('#total_amount2').val());
            var fine_amount     = parseFloat($('#fine_amount2').val());
            if(discount_amount){
                $('div#listCollectionModal').find('input#discount_amount2').val(discount_amount);
                var net_amount  = total_amount - discount_amount + fine_amount;
                $('#net_total2').text(net_amount.toFixed(2));
                $('#net_amount2').val(net_amount.toFixed(2));
            }else{
                $('div#listCollectionModal').find('input#discount_amount2').val(0);
                var net_amount  = total_amount + fine_amount;
                $('#net_total2').text(net_amount.toFixed(2));
                $('#net_amount2').val(net_amount.toFixed(2));

            }
                
        });

        $(document).on('change', "#selfine2", function () {

            var total_amount    = parseFloat($('#total_amount2').val());
            var discount_amount = parseFloat($('#discount_amount2').val());
            var fine_amount     = $('option:selected', this).data('fineamount2');
            if(fine_amount){
                var net_amount = total_amount + parseFloat(fine_amount) - discount_amount;
                $('div#listCollectionModal').find('input#fine_amount2').val(fine_amount);
                $('#net_total2').text(net_amount.toFixed(2));
                $('#net_amount2').val(net_amount.toFixed(2));
            }else{
                var net_amount = total_amount - discount_amount;
                $('div#listCollectionModal').find('input#fine_amount2').val(0);
                $('#net_total2').text(net_amount.toFixed(2));
                $('#net_amount2').val(net_amount.toFixed(2));
            }
        });



        $("#cash_bank2").on('change', function(){
            if($(this).val()==31){
                $('#bank_accounts_div2').show();
                $('#cash_accounts_div2').hide();
            }else{
                $('#cash_accounts_div2').show();
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