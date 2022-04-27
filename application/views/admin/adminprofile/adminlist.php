<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">

</style>

<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?>
            <?php if ($this->rbac->hasPrivilege('adminprofile', 'can_add')) { ?>
                <small class="pull-right">
                    <a href="<?php echo base_url(); ?>admin/adminprofile/create" class="btn btn-primary btn-sm"   >
                        <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_staff'); ?>
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
                        <div class="box-tools pull-right ">
                            <small class="pull-right ">
                                <?php if ($this->rbac->hasPrivilege('adminprofile', 'can_add')) { ?> 
                                    <a href="<?php echo base_url(); ?>admin/adminprofile/create" class="btn btn-primary btn-sm colorbtn"><i class="fa fa-plus"></i> <?php echo $this->lang->line('admin_profile'); ?>
                                    </a>
                                <?php } ?>
                        </small>
                       </div>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?>  <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/adminprofile') ?>" method="post" class="">
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
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                  </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/adminprofile') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text');?>"  placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                if (isset($resultlist)) {
                    ?>
                    <div class="box-header ptbnull"></div>  
                        <div class="nav-tabs-custom border0">
                            <ul class="nav nav-tabs">

                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line('card'); ?> <?php echo $this->lang->line('view'); ?></a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i> <?php echo $this->lang->line('list'); ?>  <?php echo $this->lang->line('view'); ?></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="download_label"><?php echo $title; ?></div>
                                <div class="tab-pane table-responsive no-padding" id="tab_2">
                                    <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('admin_id'); ?></th>
                                                <th><?php echo $this->lang->line('chamber_name'); ?></th>
                                                <th><?php echo $this->lang->line('name'); ?></th>
                                                <th><?php echo $this->lang->line('role'); ?></th>
                                                <!-- <th><?php echo $this->lang->line('department'); ?></th>
                                                <th><?php echo $this->lang->line('designation'); ?></th> -->
                                                <th><?php echo $this->lang->line('mobile_no'); ?></th>
                                                 <?php
                                                if (!empty($fields)) {

                                                    foreach ($fields as $fields_key => $fields_value) {
                                                        ?>
                                                        <th><?php echo $fields_value->name; ?></th>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                                <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($resultlist)) {
                                                
                                            } else {
                                                $count = 1;
                                                foreach ($resultlist as $staff) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $staff['account_no']; ?></td>
                                                        <td><?php //echo ucfirst($this->setting_model->getChamberById($staff["id"])); ?></td>
                                                        <td>
                                                            <a <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?> href="<?php echo base_url(); ?>admin/adminprofile/profile/<?php echo $staff['id']; ?>"
                                                            <?php } ?>><?php echo $staff['name'] . " " . $staff['surname']; ?>
                                                            </a>
                                                        </td>
                                                        
                                                        <td><?php echo $staff['user_type']; ?></td>

                                                        <!-- <td><?php echo $staff['department']; ?></td>
                                                        <td><?php echo $staff['designation']; ?></td> -->
                                                        <td><?php echo $staff['contact_no']; ?></td>
                                                        <?php
                                                        if (!empty($fields)) {

                                                            foreach ($fields as $fields_key => $fields_value) {
                                                                $display_field=$staff[$fields_value->name];
                                                          if($fields_value->type == "link"){
                                                              $display_field= "<a href=".$staff[$fields_value->name]." target='_blank'>".$staff[$fields_value->name]."</a>";

                                                              }
                                                                ?>
                                                                <td>

                                                                    <?php echo $display_field; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <td class="pull-right">
                                                            <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?>
                                                                <a data-placement="left" href="<?php echo base_url(); ?>admin/adminprofile/profile/<?php echo $staff['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>" >
                                                                    <i class="fa fa-reorder"></i>
                                                                </a>
                                                            <?php } if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) {

                                                                      $a = 0 ;
                                                              $sessionData = $this->session->userdata('admin');
                                                                $userdata = $this->customlib->getUserData();
                                                            
                                                             $staff["user_type"];
                                                              if(($staff["user_type"] == "Super Admin") && $userdata["email"] == $staff["email"]){
                                                                $a = 1 ;  
                                                                }elseif(($staff["user_type"] != "Super Admin")){
                                                                    $a = 1 ;
                                                                }else{
                                                                    $a = 0;
                                                                }
                                                                if($a == 1){
                                                                   if ($this->rbac->hasPrivilege('staff', 'can_edit')) {
                                                                 ?>
                                                                <a data-placement="left" href="<?php echo base_url(); ?>admin/adminprofile/edit/<?php echo $staff['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
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
                                <div class="tab-pane active" id="tab_1">
                                    <div class="mediarow">   
                                        <div class="row">   
                                            <?php if (empty($resultlist)) {
                                                ?>
                                                <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($resultlist as $staff) {
    												
                                                    ?>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 img_div_modal">
                                                        <div class="staffinfo-box themecolor" style="padding-bottom:10px">
                                                            <div class="staffleft-box">
                                                                <?php
                                                                if (!empty($staff["image"])) {
                                                                    $image = $staff["image"];
                                                                } else {
    																if($staff['gender']=='Male'){
    																	$image = "default_male.jpg";
    																}else{
    																	$image = "default_female.jpg";
    																}
                                                                    
                                                                }
                                                                ?>
                                                                <img  src="<?php echo base_url() . "uploads/staff_images/" . $image ?>" />
                                                            </div>
                                                            <div class="staffleft-content" style="padding-bottom: 10px;">
                                                                <h5>
                                                                    <span data-toggle="tooltip" title="<?php echo $this->lang->line('chamber_name'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php //echo ucfirst($this->setting_model->getChamberById($staff["id"])); ?></span>
                                                                </h5>
                                                                <div style="width:210px;float: left;">
                                                                    <?php if($staff["chamber_code"]){?>
                                                                    <p>
                                                                        <font data-toggle="tooltip" title="<?php echo $this->lang->line('name'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo ucfirst($staff["chamber_code"]) ; ?></font>
                                                                    </p>
                                                                    <?php }?>
                                                                    <?php if($staff["chamber_email"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Employee Id"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["chamber_email"] ?></font></p>
                                                                    <?php }?>
                                                                    <?php if($staff["chamber_address"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Contact Number"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["chamber_contact"] ?></font></p>
                                                                    <?php }?>
                                                                    <?php if($staff["chamber_address"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Employee Id"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["chamber_address"] ?></font></p>
                                                                    <?php }?>
                                                                    <!-- <p><font>Regular Package</font></p> -->
                                                                    <?php if($staff["location"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo 'Location'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php
                                                                    if (!empty($staff["location"])) {
                                                                    echo $staff["location"] . ",";
                                                                    }
                                                                    ?></font></p> 
                                                                    <?php }?>
                                                                    <!-- <p class="staffsub" ><span data-toggle="tooltip" title="<?php echo $this->lang->line('role'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["user_type"] ?></span> </p> -->
                                                                </div>
                                                                <div style="width:210px;float: left;">
                                                                    
                                                                    <p>
                                                                        <font data-toggle="tooltip" title="<?php echo $this->lang->line('name'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo ucfirst($staff["name"]) . " " . ucfirst($staff["surname"]); ?></font>
                                                                    </p>
                                                                    <?php if($staff["account_no"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Employee Id"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["account_no"] ?></font>
                                                                    </p>
                                                                    <?php }?>
                                                                    <?php if($staff["contact_no"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Contact Number"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["contact_no"] ?></font>
                                                                    </p>
                                                                    <?php }?>
                                                                    <?php if($staff["location"]){?>
                                                                    <p><font data-toggle="tooltip" title="<?php echo 'Location'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php
                                                                    if (!empty($staff["location"])) {
                                                                    echo $staff["location"] . ",";
                                                                    }
                                                                    ?></font></p>
                                                                    <?php }?>
                                                                    <?php if($staff["user_type"]){?>
                                                                    <p class="staffsub" ><font data-toggle="tooltip" title="<?php echo $this->lang->line('role'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["user_type"] ?></font> </p>
                                                                    <?php }?>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            <div class="overlay3">
                                                                <div class="stafficons">
               
                                                                <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?>
                                                                        <a title="<?php echo $this->lang->line('show'); ?>"  href="<?php echo base_url() . "admin/adminprofile/profile/" . $staff["id"] ?>"><i class="fa fa-navicon"></i></a>
                                                                    <?php } ?>
                                                                    <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) {
                                                                    $a = 0 ;
                                                                    $sessionData = $this->session->userdata('admin');
                                                                    $userdata = $this->customlib->getUserData();
                                                                
                                                                 $staff["user_type"];
                                                                  if(($staff["user_type"] == "Super Admin") && $userdata["email"] == $staff["email"]){
                                                                    $a = 1 ;  
                                                                    }elseif(($staff["user_type"] != "Super Admin")){
                                                                        $a = 1 ;
                                                                    }else{
                                                                        $a = 0;
                                                                    }
                                                                    if($a == 1){                                
                                                                    if ($this->rbac->hasPrivilege('staff', 'can_edit')) {
                                                                     ?>
                                                                           <a title="<?php echo $this->lang->line('edit'); ?>"  href="<?php echo base_url() . "admin/adminprofile/edit/" . $staff["id"] ?>"><i class=" fa fa-pencil"></i></a>
                                                                    <?php } } }?>
                                                                </div>
                                                            </div>
                                                            <div >
                                                                <a href="" class="btn btn-info btn-xs colorbtn">Manage</a>

                                                                <button onclick="return add_subs(<?php echo $staff['id'] ?>)" role="button" class="btn btn-primary btn-xs btn-modal colorbtn">Add Subscription</button>

                                                                <a href="" class="btn btn-danger btn-xs link_confirmation colorbtn">Deactivate                                    </a>
                                                                <a href="" class="btn btn-danger btn-xs delete_business_confirmation colorbtn">Delete                                    </a>
                                                            </div>
                                                            
                                                        </div>
                                                    </div><!--./col-md-3-->
                                                <?php }
                                            }
                                            ?>


                                        </div><!--./col-md-3-->
                                    </div><!--./row-->  
                                </div><!--./mediarow-->  


                            </div>                                                          
                        </div>  
                    </div>                                                         
                </div>
                <?php } ?>
        </div>  
</div> 
</section>
</div>
<div id="render_modal"></div>
<script type="text/javascript">

    function add_subs(id) {
        $.ajax({
             url: '<?php echo base_url(); ?>'+'admin/adminprofile/add_subscription/',
             type: 'post',
             data:"business_id="+id,
             success:function(data){
                $('#render_modal').html(data);
                $('#addSubscription').modal('show');
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

$(document).on('click', '.btn_subscription', function (e) {
    //console.log($('#subscription_form').serialize());
    var $this = $(this);
    $this.button('loading');
    $.ajax({
        url: '<?php echo site_url("admin/adminprofile/postAddSubscription") ?>',
        type: 'post',
        data: $('#subscription_form').serialize(),
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
                window.location.reload(true);
            }
            $this.button('reset');
        }
    });
});

    // $(document).on('submit', 'form#subscription_form', function(e){

    //     e.preventDefault();
    //     var data = $(this).serialize();

    //     $.ajax({
    //       method: "POST",
    //       url: $(this).attr("action"),
    //       dataType: "json",
    //       data: data,
    //       success: function(result){
    //         //console.log(result);
    //         if (data.status == "fail") {
    //                 var message = "";
    //                 $.each(data.error, function (index, value) {

    //                     message += value;
    //                 });
    //                 errorMsg(message);
    //             } else {
    //                 successMsg(data.message);
    //                 window.location.reload(true);
    //             }

    //       }
    //     });
    // });

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