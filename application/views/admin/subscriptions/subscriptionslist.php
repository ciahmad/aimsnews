<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">

</style>

<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?>
            <?php if ($this->rbac->hasPrivilege('packages', 'can_add')) { ?>
                <small class="pull-right">
                    <a href="<?php echo base_url(); ?>admin/packages/create" class="btn btn-primary btn-sm"   >
                        <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_packages'); ?>
                    </a>
                </small>
            <?php } ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?>  <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/packages') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text');?>"  placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label ></label>
                                                <button style="margin-top: 22px;" type="submit" name="search" value="search_full" class="btn btn-primary btn-sm checkbox-toggle themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                if (isset($results)) {
                    ?>
                    <div class="box-header ptbnull"></div>  
                        <div class="nav-tabs-custom border0">
                            <!-- <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i> <?php echo $this->lang->line('list'); ?>  <?php echo $this->lang->line('view'); ?></a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line('card'); ?> <?php echo $this->lang->line('view'); ?></a></li>
                                
                            </ul> -->
                            <div class="tab-content">
                                <div class="download_label"><?php echo $title; ?></div>
                                <div class="tab-pane active table-responsive no-padding" id="tab_2">
                                    <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('account_number'); ?></th>
                                                <th><?php echo $this->lang->line('payment_transaction_id'); ?></th>
                                                <th><?php echo $this->lang->line('business_name'); ?></th>
                                                <th><?php echo $this->lang->line('package_name'); ?></th>
                                                <th><?php echo $this->lang->line('status'); ?></th>
                                                <th><?php echo $this->lang->line('start_date'); ?></th>
                                                <th><?php echo $this->lang->line('trial_end_date'); ?></th>
                                                <th><?php echo $this->lang->line('end_date'); ?></th>
                                                <th><?php echo $this->lang->line('price'); ?></th>
                                                <th><?php echo $this->lang->line('paid_via'); ?></th>
                                                
                                                <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($results)) {
                                                
                                            } else {
                                                $count = 1;
                                                foreach ($results as $subscripton) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $subscripton['account_no']; ?></td>
                                                        <td><?php echo $subscripton['payment_transaction_id']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . "admin/adminprofile/profile/" . $subscripton["business_id"] ?>" <?php if ($this->rbac->hasPrivilege('packagesubscription', 'can_view')) { ?> 
                                                            <?php } ?>><?php echo ucfirst($this->setting_model->getChamberById($subscripton["business_id"])); ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $subscripton['package_name']; ?></td>
                                                        <td>
                                                            <?php if($subscripton['status'] == 'approved'){?>
                                                                <span class="badge bg-green">
                                                                    <?php echo $this->lang->line('approved'); ?>
                                                                </span>
                                                            <?php }else if($subscripton['status'] == 'waiting'){?>
                                                                <!-- <button class="btn btn-info badge bg-blue" ><?php //echo $this->lang->line('waiting'); ?>
                                                                </button> -->
                                                                <span class="badge bg-blue">
                                                                    <?php echo $this->lang->line('waiting'); ?>
                                                                </span>
                                                                
                                                            <?php }else{ ?>
                                                                <span class="badge bg-red">
                                                                <?php echo $this->lang->line('declined'); ?>
                                                                </span>
                                                            <?php } ?>
                                                            
                                                        </td>
                                                        <td><?php echo $subscripton['start_date']; ?></td>
                                                        <td><?php echo $subscripton['trial_end_date']; ?></td>
                                                        <td><?php echo $subscripton['end_date']; ?></td>
                                                        <td><?php echo $subscripton['package_price']; ?></td>
                                                        <td><?php echo $subscripton['account_title']; ?></td>
                                                        <td class="pull-right">
                                                            <button onclick="statusModel(<?php echo $subscripton['id']; ?>)" id="btnstatus<?php echo $subscripton['id']; ?>" class="btn btn-info btn-xs change_status badge bg-blue" data-status="<?php echo $subscripton['status']; ?>" data-trans_id="<?php echo $subscripton['payment_transaction_id']; ?>" data-id="<?php echo $subscripton['id'] ?>"><?php echo $this->lang->line('status'); ?>
                                                            </button>

                                                            <?php  if ($this->rbac->hasPrivilege('packagesubscription', 'can_view')) {

                                                                      $a = 0 ;
                                                              $sessionData = $this->session->userdata('admin');
                                                                $userdata = $this->customlib->getUserData();
                                                            
                                                             $subscripton["user_type"];
                                                              if(($subscripton["user_type"] == "Super Admin") && $userdata["email"] == $subscripton["email"]){
                                                                $a = 1 ;  
                                                                }elseif(($subscripton["user_type"] != "Super Admin")){
                                                                    $a = 1 ;
                                                                }else{
                                                                    $a = 0;
                                                                }
                                                                if($a == 1){
                                                                   if ($this->rbac->hasPrivilege('packagesubscription', 'can_edit')) {
                                                                 ?>

                                                                <!-- <a data-placement="left" onclick="return edit_subs(<?php echo $subscripton['id'] ?>)" class="btn btn-default btn-xs btn-modal"  data-toggle="tooltip">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a> -->

                                                    <?php } } }?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>                           
                                


                            </div>                                                          
                        </div>  
                    </div>                                                         
            </div>
                <?php } ?>
        </div> 

            
    </section>
</div>
<div id="status_modal"></div>
<div id="renderedit_modal"></div>
<script type="text/javascript">

    $(document).on('submit', 'form#editsubscription_form', function(e){

        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
          method: "POST",
          url: $(this).attr("action"),
          dataType: "json",
          data: data,
          success: function(result){
            //console.log(result);
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

    function edit_subs(id) {

        $.ajax({
             url: '<?php echo base_url(); ?>'+'admin/packagesubscription/edit_subscription/',
             type: 'post',
             data:"subscripton_id="+id,
             success:function(data){
                $('#renderedit_modal').html(data);
                $('#editSubscription').modal('show');
                getAmount();
                gettype();
                getref();
             }
        });
    } 

    function statusModel(id) {
        var subid = $("#btnstatus"+id).attr('data-id')
        var status = $("#btnstatus"+id).attr('data-status')
        var trans_id = $("#btnstatus"+id).attr('data-trans_id')
        $.ajax({
             url: '<?php echo base_url(); ?>'+'admin/packagesubscription/getStatusModel/',
             type: 'post',
             data:{'subscribe_id':id,'status':status,'trans_id':trans_id},
             success:function(data){
                $('#status_modal').html(data);
                $('#statusModal').modal('show');
             }
        });
    }
    function gettype(){
        
        if($('#paid_via').val()==104){
            $('#bank_accounts_div').show();
        }else{
            $('#bank_accounts_div').hide();
            $('#reference_number_div').hide();
            //$("#bank_accounts option:selected").prop("selected", false)
            $('#bank_accounts option:selected').removeAttr('selected');
            $('#bank_account_id option:selected').removeAttr('selected');
        }
    }
    function getref(){
        if($("#bank_account_id").val()!=''){
            $('#reference_number_div').show();
        }else{
            $('#reference_number_div').hide();
        }
    }
    function getAmount(){
        
        $.ajax({
            method: "POST",
            url: base_url+'admin/adminprofile/getPackageAmount',
            dataType: "html",
            data: {'package_id':$('#package_id').val()},
            success: function(result){
                //console.log(parseFloat(result).toFixed(2));
                if(result!=''){
                    $('#package_amount').show();
                    $('#pack_amount').val(parseFloat(result).toFixed(2));
                }else{
                    $('#package_amount').hide();
                    $('#pack_amount').val('');
                }
                
            }
        });
        
    }
    // change_status button
    $(document).on('submit', 'form#status_change_form', function(e){
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