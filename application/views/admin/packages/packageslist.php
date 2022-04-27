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
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        <div class="box-tools pull-right">
                            <small class="pull-right">
                                <?php if ($this->rbac->hasPrivilege('packages', 'can_add')) { ?> <a href="<?php echo base_url(); ?>admin/packages/create" class="btn btn-primary btn-sm"   >
                        <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_packages'); ?>
                            </a><?php } ?>
                        </small>
                       </div>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?>  <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/packages') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group"> 
                                                <label><?php echo $this->lang->line("role"); ?></label><small class="req"> *</small>
                                                <select name="role" class="form-control">
                                                    <option value=""><?php echo $this->lang->line("select"); ?></option>
                                                    <?php foreach ($role as $key => $role_value) {
                                                        ?>
                                                        <option <?php
                                                        if ($role_id == $role_value["id"]) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $role_value['id'] ?>"><?php echo $role_value['type'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>  
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                  </div>  
                                
                            </div> -->
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/packages') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text');?>"  placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                if (isset($packageslist)) {
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
                                                <th><?php echo $this->lang->line('name'); ?></th>
                                                <th><?php echo $this->lang->line('description'); ?></th>
                                                <th><?php echo $this->lang->line('price'); ?></th>
                                                <th><?php echo $this->lang->line('trial_days'); ?></th>
                                                <th><?php echo $this->lang->line('number_of_file'); ?></th>
                                                <th><?php echo $this->lang->line('number_of_users'); ?></th>
                                                <th><?php echo $this->lang->line('status'); ?></th>
                                                <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($packageslist)) {
                                                
                                            } else {
                                                $count = 1;
                                                foreach ($packageslist as $package) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <a <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?> href="<?php echo base_url(); ?>admin/packages/profile/<?php echo $package['id']; ?>"
                                                            <?php } ?>><?php echo $package['name'] ; ?>
                                                            </a>
                                                        </td>

                                                        <td><?php echo $package['description']; ?></td>
                                                        <td><?php echo $package['price']; ?></td>
                                                        <td><?php echo $package['trial_days']; ?></td>
                                                        <td><?php echo $package['number_of_files']; ?></td>
                                                        <td><?php echo $package['number_of_users']; ?></td>

                                                        <td>
                                                            <?php if($package['is_active'] == 1){?>
                                                                <span class="badge bg-green">
                                                                    <?php echo $this->lang->line('active'); ?>
                                                                </span>
                                                            <?php }else{ ?>
                                                                <span class="badge bg-red">
                                                                <?php echo $this->lang->line('inactive'); ?>
                                                                </span>
                                                            <?php } ?>

                                                        </td>

                                                        <td class="pull-right">
                                                            <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?>
                                                                <a data-placement="left" href="<?php echo base_url(); ?>admin/packages/profile/<?php echo $package['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>" >
                                                                    <i class="fa fa-reorder"></i>
                                                                </a>
                                                            <?php } if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) {

                                                                      $a = 0 ;
                                                              $sessionData = $this->session->userdata('admin');
                                                                $userdata = $this->customlib->getUserData();
                                                            
                                                             $package["user_type"];
                                                              if(($package["user_type"] == "Super Admin") && $userdata["email"] == $package["email"]){
                                                                $a = 1 ;  
                                                                }elseif(($package["user_type"] != "Super Admin")){
                                                                    $a = 1 ;
                                                                }else{
                                                                    $a = 0;
                                                                }
                                                                if($a == 1){
                                                                   if ($this->rbac->hasPrivilege('package', 'can_edit')) {
                                                                 ?>
                                                                <a data-placement="left" href="<?php echo base_url(); ?>admin/packages/edit/<?php echo $package['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
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

        <div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
            <div class="box-tools">
                <?php if ($this->rbac->hasPrivilege('packages', 'can_add')) { ?> <a href="<?php echo base_url(); ?>admin/packages/create" class="btn btn-primary btn-sm"   >
                        <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_packages'); ?>
                            </a><?php } ?>
                
            </div>
        </div>

        <div class="box-body">
        <?php if (isset($packageslist)) { ?>
            <?php
                if (empty($packageslist)) {
                    
                } else {
                    $count = 1;
                    foreach ($packageslist as $package) {
                        ?>
                        <div class="col-md-4">
                            
                            <div class="box box-success hvr-grow-shadow">
                                <div class="box-header with-border text-center">
                                    <h2 class="box-title"><?php echo $package['name'] ; ?></h2>

                                    <div class="row">
                                            <?php if($package['is_active'] == 1){?>
                                                <span class="badge bg-green">
                                                    <?php echo $this->lang->line('active'); ?>
                                                </span>
                                            <?php }else{ ?>
                                                <span class="badge bg-red">
                                                <?php echo $this->lang->line('inactive'); ?>
                                                </span>
                                            <?php } ?>
                                        
                                        <a href="<?php echo base_url(); ?>admin/packages/edit/<?php echo $package['id'] ?>" class="btn btn-box-tool" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/packages/delete/<?php echo $package['id'] ?>" class="btn btn-box-tool link_confirmation" title="delete"><i class="fa fa-trash"></i></a>
                                        
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body text-center">
                                    <?php
                                    if($package['number_of_location'] == 0){
                                        echo $this->lang->line('unlimited');
                                    }
                                    else{
                                        echo $package['number_of_location']. ' ' .$this->lang->line('business_locations');
                                    }
                                        
                                    ?>
                                    <br/>
                                    <?php 
                                    if($package['number_of_users'] == 0){
                                        echo $this->lang->line('unlimited');
                                    }
                                    else{
                                        echo $package['number_of_users'].' '.$this->lang->line('users');
                                    }
                                   
                                    ?>
                                    <br/>
                                    
                                    <?php 
                                    if($package['number_of_files'] == 0){
                                        echo $this->lang->line('unlimited');
                                    }
                                    else{
                                        echo $package['number_of_files'].' '.$this->lang->line('products');
                                    }
                                   
                                    ?>
                                    <br/>
                                    <?php 
                                    if($package['number_of_cases'] == 0){
                                        echo $this->lang->line('unlimited');
                                    }
                                    else{
                                        echo $package['number_of_cases'].' '.$this->lang->line('invoices');
                                    }
                                    
                                    ?>
                                    <br/>
                                    <?php 
                                    if($package['trial_days'] == 0){
                                        echo $this->lang->line('unlimited');
                                    }
                                    else{
                                        echo $package['trial_days'].' '.$this->lang->line('trial_days');
                                    }
                                   
                                    ?>
                                    <br/>

                                    <h3 class="text-center">
                                        <?php if($package['price'] != 0){ ?>
                                            <span class="display_currency" data-currency_symbol="true">
                                                <?php echo number_format($package['price'],2) ;?>
                                            </span>
                                            <small>
                                                / <?php echo $package['interval_count'].' '.$package['price_interval'] ;?>
                                            </small>
                                        <?php }else{?>
                                            <?php echo $this->lang->line('free_for_duration'). ' ' .$package['interval_count'].' '.$package['price_interval']; ?>
                                        <?php }?>
                                        
                                    </h3>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer text-center">
                                    <?php echo $package['description'];?>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <?php
                            $count++;
                    }
                }
                    ?>
        <?php } ?>

            
        </div>

    </div> 
     
    </section>
</div>
<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }
    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
    });
</script>