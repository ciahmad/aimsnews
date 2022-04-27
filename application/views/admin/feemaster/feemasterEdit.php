<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1> <i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">                        
                        <?php  if ($this->rbac->hasPrivilege('fees_type', 'can_view')) {  ?>
                                    <li><a href="<?php echo base_url(); ?>admin/feetype" style="<?php echo set_1stLevel('feetype/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_type'); ?></a></li>
                        <?php  } ?>     
                        <?php if ($this->rbac->hasPrivilege('fees_group', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/feegroup" style="<?php echo set_1stLevel('admin/feegroup'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_group'); ?></a></li>
                        <?php  } ?>
                         <?php if ($this->rbac->hasPrivilege('fees_master', 'can_view')) {?>
                                    <li><a href="<?php echo base_url(); ?>admin/feemaster" style="<?php echo set_1stLevel('admin/feemaster'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_master'); ?></a></li>
                        <?php  } ?>

                        <?php  if ($this->rbac->hasPrivilege('fees_discount', 'can_view')) {?>
                                 <li><a href="<?php echo base_url(); ?>admin/feediscount" style="<?php echo set_1stLevel('admin/feediscount'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_discount'); ?></a></li>
                        <?php  } ?>
                        <?php  if ($this->rbac->hasPrivilege('fine', 'can_view')) {
                                ?>
                                 <li><a href="<?php echo base_url(); ?>admin/fine" style="<?php echo set_1stLevel('admin/fine'); ?>"><i class="fa fa-angle-double-right"></i> Add Fine </a></li>
                        <?php  } ?>                      
                    </ul>
                </div>
            </div>
                <?php if ($this->rbac->hasPrivilege('fees_master', 'can_add') || $this->rbac->hasPrivilege('fees_master', 'can_edit')) { ?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_fees_master') . " : " . $this->setting_model->getCurrentSessionName(); ?></h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url("admin/feemaster/edit/" . $feegroup_type[0]->id) ?>"  id="feemasterform" name="feemasterform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>

                                <?php echo $this->customlib->getCSRF(); ?>

                                <?php //echo "<pre>"; print_r($feegroup_type[0]->id); ;?>

                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $feegroup_type[0]->id; ?>">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                    <?php 
                                    //$feegroupid = $this->feegroup_model->get($feegroup_type->fee_groups_id); 
                                    ?>
                                    
                                    <?php  
                                    if(!empty($feegroup_type[0]->feetypes)){
                                         //echo '<pre>'; count($feegroup_type[0]->feetypes);
                                    $counter = 0;  
                                    foreach ($feegroup_type[0]->feetypes as $feegroup_type) {
                                        //$rows = $total_rows-1 ;
                                    ?>
                                    <?php if($counter==0){?>
                                    <div id="fm<?php echo $counter;?>">    
                                        <div class="col-md-4">                                 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('fees_group'); ?></label> <small class="req">*</small>
                                            
                                                <select autofocus="" id="fee_groups_id" name="fee_groups_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($feegroupList as $feegroup) {?>
                                                        <option value="<?php echo $feegroup['id'] ?>" <?php
                                                        if ($feegroup_type->fee_groups_id == $feegroup['id']) {
                                                            echo "selected =selected";
                                                        }
                                                        ?>><?php echo $feegroup['name'] ?></option>
                                                        <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('fee_groups_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('fees_type'); ?></label><small class="req"> *</small>

                                                <select  id="feetype_id" name="feetype_id[]" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($feetypeList as $feetype) {
                                                        
                                                       $type_byaccounts_head = $this->feetype_model->getIncomAccountHead($feetype['code']);
                                                        
                                                        ?>
                                                        <option value="<?php echo $feetype['id'] ?>"<?php
                                                        if ($feegroup_type->feetype_id == $feetype['id']) {
                                                            echo "selected =selected";
                                                        }
                                                        ?>><?php echo $feetype['account_number']; ?> - <?php echo $feetype['type']; ?></option>
                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('feetype_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?></label><small class="req">*</small>
                                                <input id="amount" name="amount[]" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount', $feegroup_type->amount); ?>" />
                                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-1">
                                            <label for="exampleInputEmail1"></label>
                                            <div class="form-group">
                                                <button type="button" class="pull-right themecolor" id="add_more" data-id="<?php echo $total_rows;?>" onclick="addMore()">Add+</button>
                                            </div>
                                        </div>
                                    </div>    
                                    <?php }else{ ?>
                                    <div id="fm<?php echo $counter;?>"> 
                                        <div class="col-md-4"> </div>    
                                        <div class="col-md-4">  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('fees_type'); ?></label><small class="req"> *</small>

                                                <select  id="feetype_id" name="feetype_id[]" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($feetypeList as $feetype) {
                                                        
                                                       $type_byaccounts_head = $this->feetype_model->getIncomAccountHead($feetype['code']);
                                                        
                                                        ?>
                                                        <option value="<?php echo $feetype['id'] ?>"<?php
                                                        if ($feegroup_type->feetype_id == $feetype['id']) {
                                                            echo "selected =selected";
                                                        }
                                                        ?>><?php echo $feetype['account_number']; ?> - <?php echo $feetype['type']; ?></option>

                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('feetype_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?></label><small class="req">*</small>
                                                <input id="amount" name="amount[]" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount', $feegroup_type->amount); ?>" />
                                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                            </div>
                                        </div>     
                                        <div class="col-md-1">
                                            <label for="exampleInputEmail1"></label>
                                            <div class="form-group">
                                                <button type="button" data-id="<?php echo $counter;?>" id="add_more" class="btn btn-danger pull-right" onclick="remove(<?php echo $rows;?>)">x</button>
                                            </div>
                                        </div>
                                    </div>    
                                    <?php }?>   
                                    <?php $counter++;} ?>
                                <?php } ?>
                                        
                                    <input name="account_type" class="finetype" id="input-type-student" value="none" type="hidden" <?php echo set_radio('account_type', 'none', (set_value('none', $feegroup_type->fine_type) == "none") ? TRUE : FALSE); ?>/>
                                    
                                    <input name="account_type" class="finetype" id="input-type-student" value="percentage" type="hidden" <?php echo set_radio('account_type', 'percentage', (set_value('percentage', $feegroup_type->fine_type) == "percentage") ? TRUE : FALSE ); ?> />
                                    <input name="account_type" class="finetype" id="input-type-tutor" value="fix" type="hidden"  <?php echo set_radio('account_type', 'fix', (set_value('fix', $feegroup_type->fine_type) == "fix") ? TRUE : FALSE); ?> />
                                   
                                   
                                   <input id="fine_percentage" name="fine_percentage" placeholder="" type="hidden" class="form-control"  value="<?php echo set_value('fine_percentage', $feegroup_type->fine_percentage); ?>" />
                                    <input id="fine_amount" name="fine_amount" placeholder="" type="hidden" class="form-control"  value="0.00" />
                                </div>

                            </div>



                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>



                    </div><!-- /.box-body -->


                    </form>
                </div>
                <?php } ?>
                <?php
                if ($this->rbac->hasPrivilege('fees_master', 'can_add') || $this->rbac->hasPrivilege('fees_master', 'can_edit')) {
                ?>

                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header ptbnull themecolor">
                            <h3 class="box-title titlefix"><?php echo $this->lang->line('fees_master_list') . " : " . $this->setting_model->getCurrentSessionName(); ?></h3>

                        </div><!-- /.box-header -->

                         <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('fees_master_list') . " : " . $this->setting_model->getCurrentSessionName(); ?></div>
                        <div class="mailbox-messages">
                            <div class="table-responsive">  
                                <table class="table table-striped table-bordered table-hover example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('fees_group'); ?></th>
                                            <th><?php echo "Fee Type"; ?></th>
                                            <th><?php echo $this->lang->line('fees_code'); ?></th>
                                            <th><?php echo $this->lang->line('amount'); ?></th>
                                            <th><?php echo $this->lang->line('status'); ?></th>
                                            <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    
                                    
                                     <tbody>
                                        <?php
                                       
                                        foreach ($feemasterList as $feegroup) {
                                            
                                            
                                            //echo "<pre>"; print_r($feegroup); exit;
                                            
                                           
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php 
                                                    
                                                   echo $feegroup->group_name;
                                                    ?></a>


                                                </td>
                                               
                                                <td class="mailbox-name">
                                                    <ul class="liststyle1">
                                                        <?php
                                                            foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                            ?>
                                                            <li style="line-height: 25px"><?php  echo $feetype_value->type; ?> &nbsp;&nbsp; </li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                
                                                  <td class="mailbox-name">
                                                    <ul class="liststyle1">
                                                        <?php
                                                        foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                            ?>
                                                            <li style="line-height: 25px"> <?php  echo $feetype_value->code; ?> &nbsp;&nbsp; </li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                
                                               <td class="mailbox-name">
                                                    <ul class="liststyle1">
                                                        <?php
                                                        foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                            ?>
                                                            <li style="line-height: 25px"> <?php echo $feetype_value->amount; ?> &nbsp;&nbsp; </li> <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                
                                                
                                                <td class="mailbox-name">
                                                    <ul class="liststyle1">
                                                        <?php
                                                        foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                            ?>
                                                            <li style="line-height: 25px">
                                                                <?php 
                                                                if($feetype_value->fee_payment_type =="1"){
                                                                    echo "One Time";
                                                                }elseif($feetype_value->fee_payment_type =="2"){
                                                                     echo "Re-Curring";
                                                                }
                                                               
                                                            ?>
                                                            </li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>


                                            <!-- <td class="mailbox-name">
                                                    <ul class="liststyle1">
                                                        <?php
                                                        foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                            ?>
                                                            <li style="line-height: 20px">
                                                                <?php if ($this->rbac->hasPrivilege('fees_master', 'can_edit')) { ?>
                                                                    <a href="<?php echo base_url(); ?>admin/feemaster/edit/<?php echo $feetype_value->id ?>"   data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>&nbsp;
                                                                    <?php } ?>
                                                                
                                                                <?php if ($this->rbac->hasPrivilege('fees_master', 'can_delete')) {
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/feemaster/delete/<?php echo $feetype_value->id ?>" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                        <i class="fa fa-remove"></i>
                                                                    </a>
                                                                <?php } ?>

                                                            </li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </td> -->
                                                
                                                <td class="mailbox-date pull-right">
                                                    <?php if ($this->rbac->hasPrivilege('fees_group_assign', 'can_view')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/feemaster/assign/<?php echo $feegroup->id ?>"
                                                           class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('assign / view'); ?>">
                                                            <i class="fa fa-tag"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php if ($this->rbac->hasPrivilege('fees_master', 'can_edit')) { ?>
                                                            <a data-placement="left" href="<?php echo base_url(); ?>admin/feemaster/edit/<?php echo $feegroup->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } ?>


                                                    <?php if ($this->rbac->hasPrivilege('fees_master', 'can_delete')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/feemaster/deletegrp/<?php echo $feegroup->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table><!-- /.table -->
                            </div>  
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->


                        </form>
                    </div>

                </div><!--/.col (right) -->
                <?php } ?>
            </div><!--/.col (right) -->
            <!-- left column -->
        

        <!-- left column -->


</div>


<script>
function addMore(){
    
    var row   = parseInt($("#add_more").attr('data-id'));
    var path  = '<?php echo base_url('admin/feemaster/addMoreList'); ?>';
    $.ajax({
          method: "POST",
          url: path,
          dataType: "html",
          data: {'action':'fmmorelist', 'row':row},
        beforeSend: function () {
            $('#add_more').addClass('dropdownloading');
        },
        success: function(data){
           if(data!=''){
                $( "#fm"+row ).after( data );
                var rowid = row+1;
                $("#add_more").attr('data-id', rowid);
           }else{
                $("#add_more").attr('data-id', 1);
            }
        },complete: function () {
            $('#add_more').removeClass('dropdownloading');
        }
    }); 
}

function remove(id){

    var row = parseInt($("#add_more").attr('data-id'));
    if(row!=0){
        var rowid  = row-1;
        $("#add_more").attr('data-id', rowid);
        $('#fm'+row).remove();
    }else{
        $("#add_more").attr('data-id', 0);
    }
}
</script>


<script type="text/javascript">
    $(document).ready(function () {

        var account_type = "<?php echo set_value('account_type', $feegroup_type->fine_type); ?>";
        load_disable(account_type);


    });

    $(document).on('change', '.finetype', function () {
        calculatefine();
    });


    $(document).on('keyup', '#amount,#fine_percentage', function () {
        calculatefine();
    });

    function load_disable(account_type) {
        if (account_type === "percentage") {
            $('#fine_amount').prop('readonly', true);
            $('#fine_percentage').prop('readonly', false);
        } else if (account_type === "fix") {
            $('#fine_amount').prop('readonly', false);
            $('#fine_percentage').prop('readonly', true);
        } else {
            $('#fine_amount').prop('readonly', true);
            $('#fine_percentage').prop('readonly', true);
        }
    }


    function calculatefine() {
        var amount = $('#amount').val();
        var fine_percentage = $('#fine_percentage').val();
        var finetype = $('input[name=account_type]:checked', '#form1').val();
        if (finetype === "percentage") {
            fine_amount = ((amount * fine_percentage) / 100).toFixed(2);
            $('#fine_amount').val(fine_amount).prop('readonly', true);
            $('#fine_percentage').prop('readonly', false);
        } else if (finetype === "fix") {
            $('#fine_amount').val("").prop('readonly', false);
            $('#fine_percentage').val("").prop('readonly', true);
        } else {
            $('#fine_amount').val("");
        }
    }

</script>


