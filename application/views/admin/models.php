<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><?php echo $this->lang->line('add_account'); ?></h4>
            </div>
            <div class="modal-body">
                <form id="account_form" action="<?php echo site_url($posturl) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                    <div class="box-body row">
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <?php echo $this->session->flashdata('msg') ?>
                        <?php } ?>
                        <?php
                        if (isset($error_message)) {
                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                        }
                        ?>      
                        <?php echo $this->customlib->getCSRF(); ?>                     
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('account_title'); ?></label><small class="req"> *</small>
                            <input autofocus=""  id="account_title" name="account_title" placeholder="" type="text" class="form-control"  value="<?php echo $editaccount['account_title']; ?>" />
                            <span class="text-danger"><?php echo form_error('account_title'); ?></span>
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('account_type'); ?></label>
                            <select id="account_type_id" name="account_type_id" class="form-control" style="<?php echo $style;?>">
                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                <?php
                                    foreach ($listaccounts as $listaccount) {
                                        if ($account_type_id==$listaccount['id']) {
                                            $selected = 'selected';
                                        }else{ $selected = ''; }
                                        
                                        ?>
                                        <option data-acc_num="<?php echo $listaccount['account_number']; ?>" style="color: #000;font-weight: 600;" value="<?php echo $listaccount['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?> ><?php echo $listaccount['name']; ?> - <?php echo $listaccount['account_number']; ?></option>
                                        <?php 
                                        if ($listaccount['children']) {
                                        foreach ($listaccount['children'] as $child) {
                                            if ($account_type_id==$child['id']) {
                                                $selected = 'selected';
                                            }else{ $selected = ''; }
                                         ?>
                                        <option data-acc_num="<?php echo $child['account_number']; ?>" value="<?php echo $child['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?>><?php echo $child['name']; ?> - <?php echo $child['account_number']; ?></option>
                                        <?php } }?>
                                        <?php
                                    }
                                ?>
                            </select>
                            
                            <span class="text-danger"><?php echo form_error('account_type_id'); ?></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('account_number'); ?></label><small class="req"> *</small>

                            <input id="account_number" name="account_number" placeholder="" type="text" class="form-control"  value="<?php echo $editaccount['account_number']; ?>" readonly style="background-color: #eee;" />

                            <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Opening Balance</label>
                            <input id="opening_balance" name="opening_balance" placeholder="" type="text" class="form-control"  value="<?php if($editaccount['opening_balance'] > 0 ){ echo $editaccount['opening_balance'];}else{ echo $opening_balance;} ?>" />
                            <span class="text-danger"><?php echo form_error('opening_balance'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Closing Balance</label>
                            <input id="closing_balance" name="closing_balance" placeholder="" type="text" class="form-control"  value="<?php if($editaccount['closing_balance'] > 0 ){ echo $editaccount['closing_balance'];}else{ echo $closing_balance;} ?>" readonly style="background-color: #eee;"/>
                            <span class="text-danger"><?php echo form_error('closing_balance'); ?></span>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Note</label>
                            <textarea class="form-control" placeholder="Note" rows="4" name="note" cols="50" id="note"></textarea>
                            <span class="text-danger"><?php echo form_error('note'); ?></span>
                        </div>


                        <div class="clearfix"></div>
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">

                        <button type="button" class="btn btn-info pull-right add_account_btn themecolor"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on('click', '.add_account_btn', function (e) {

    var $this = $(this);
    $this.button('loading');
    $.ajax({
        url: '<?php echo site_url("admin/account/createNewAccounts") ?>',
        type: 'post',
        data: $('#account_form').serialize(),
        dataType: 'json',
        success: function (data) {

            if (data.status == "fail") {
                var message = "";
                $.each(data.error, function (index, value) {
                    message += value;
                });
                errorMsg(message);
            } else {
                successMsg(data.message);
                // $('#myModal').modal({
                //     show: false,
                //     backdrop: 'static',
                //     keyboard: false
                // });
                window.location.reload(true);
            }

            $this.button('reset');
        }
    });
});
    
$(document).ready(function(){

    $('#account_type_id').on('change', function() {

        var account_number = $("#account_type_id option:selected").attr('data-acc_num');
        var account_type_id = $("#account_type_id").val();
        $.ajax({
            type: 'POST',
            url: baseurl + "admin/account/getAccountNumberById",
            data: {
                account_type_id: account_type_id, account_number: account_number
            },
            dataType: 'html',
            success: function(response) {
               //console.log(response);
                $('#account_number').val(response);
            }
        });

    });
   
});
</script>