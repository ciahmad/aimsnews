
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">  
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <form id="form1" action="<?php echo site_url('admin/packages/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- <div class="alert alert-info">
                                Staff email is their login username, password is generated automatically and send to staff email. Superadmin can change staff password on their staff profile page.

                            </div> -->
                            <div class="tshadow mb25 bozero">    
                                <!-- <div class="box-tools pull-right pt3">
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admin/adminprofile/import" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('import') . " " . $this->lang->line('staff') ?></a> 

                                </div> --> 
                                <h4 class="pagetitleh2 themecolor"><?php echo $this->lang->line('add_new_packages'); ?> </h4>

                                <?php echo validation_errors(); ?>

                                <div class="around10">

                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                    <?php echo $this->customlib->getCSRF(); ?>

                                    <div class="row">
                                        
                                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                                                <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name') ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>
                                        
                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="description"><?php echo $this->lang->line('pack_description'); ?></label><small class="req"> *</small>
                                                    <input id="description" name="description" placeholder="" type="text" class="form-control"  value="<?php echo set_value('description') ?>" />
                                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                </div>
                                            </div> -->
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('number_of_location'); ?></label><small class="req"> *</small>
                                                    <input id="number_of_location"  name="number_of_location" placeholder="" type="text" class="form-control"  value="<?php echo set_value('number_of_location') ?>" />
                                                    <span class="text-danger"><?php echo form_error('number_of_location'); ?></span>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="number_of_users"><?php echo $this->lang->line('number_of_users'); ?></label><small class="req"> *</small>
                                                    <input autofocus="" id="number_of_users" name="number_of_users"  placeholder="" type="text" class="form-control"  value="<?php echo set_value('number_of_users') ?>" />
                                                    <span class="text-danger"><?php echo form_error('number_of_users'); ?></span>
                                                </div>
                                            </div> -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="number_of_users"><?php echo $this->lang->line('number_of_users'); ?></label><small class="req"> *</small>
                                                    <input id="number_of_users" name="number_of_users" placeholder="" type="text" class="form-control"  value="<?php echo set_value('number_of_users') ?>" />
                                                    <span class="text-danger"><?php echo form_error('number_of_users'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="number_of_files"><?php echo $this->lang->line('number_of_files'); ?> </label><small class="req"> *</small>
                                                    <input id="number_of_files" name="number_of_files" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email') ?>" />
                                                    <span class="text-danger"><?php echo form_error('number_of_files'); ?></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="number_of_cases"><?php echo $this->lang->line('number_of_cases'); ?></label><small class="req"> *</small>
                                                <input id="number_of_cases" name="number_of_cases" placeholder="" type="text" class="form-control"  value="<?php echo set_value('number_of_cases') ?>" />
                                                <span class="text-danger"><?php echo form_error('number_of_cases'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price_interval"> <?php echo $this->lang->line('price_interval'); ?></label><small class="req"> *</small>
                                                <select class="form-control" name="price_interval">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($intervals as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php echo set_select('price_interval', $key, set_value('price_interval')); ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('price_interval'); ?></span>
                                            </div>
                                        </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="interval"><?php echo $this->lang->line('interval'); ?></label><small class="req"> *</small>
                                                    <input id="interval_count" name="interval_count" placeholder="" type="text" class="form-control"  value="<?php echo set_value('interval_count') ?>" />
                                                    <span class="text-danger"><?php echo form_error('interval_count'); ?></span>
                                                </div>
                                            </div> 
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="trial_days"><?php echo $this->lang->line('trial_days'); ?></label><small class="req"> *</small>
                                                    <input id="trial_days" name="trial_days" placeholder="" type="text" class="form-control"  value="<?php echo set_value('trial_days') ?>" />
                                                    <span class="text-danger"><?php echo form_error('trial_days'); ?></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="price"><?php echo $this->lang->line('price'); ?></label><small class="req"> *</small>
                                                    <input id="price" name="price" placeholder="" type="text" class="form-control"  value="<?php echo set_value('price') ?>" />
                                                    <span class="text-danger"><?php echo form_error('price'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="sort_order"><?php echo $this->lang->line('sort_order'); ?></label>
                                                    <input id="sort_order" name="sort_order" placeholder="" type="text" class="form-control"  value="<?php echo set_value('sort_order') ?>" />
                                                    <span class="text-danger"><?php echo form_error('sort_order'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    
                                                    <input type="checkbox" name="is_active" value="1"  autocomplete="off" >
                                                    
                                                    <label for="sort_order" ><?php echo $this->lang->line('is_active'); ?></label>

                                                    <span class="text-danger"><?php echo form_error('is_active'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pack_description"><?php echo $this->lang->line('pack_description'); ?></label>
                                                    <textarea name="description" id="compose-textarea" class="form-control" ><?php echo set_value('description'); ?></textarea>
                                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                       
                                </div>
                            </div>
                            
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>               
            </div>
        </div> 
</div>
</section>
</div>

<script>
    $(function () {
        $("#compose-textarea,#desc-textarea").wysihtml5();
    });
</script>
<script type="text/javascript">

        function getState(){
        var state_id = 0  //'<?php echo $court['state_id'];?>';
        var country_id = document.getElementById('country_id').value;
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
             type: 'POST',
             url: baseurl + "court/getStateByCountryID",
             data: { country_id: country_id },
             dataType: 'JSON',
            success: function(response){
                console.log(response);
                $.each(response.result, function( index, item ) {
                       if(state_id == item.id) {
                        div_data+='<option value="'+item.id+'" selected>'+item.name+'</option>'; 
                       }else{
                        div_data+='<option value="'+item.id+'">'+item.name+'</option>';
                       }
                });
                $('#state_id').html(div_data);
             }
        });
    }
    function getCities(){
        var city_id = 0  //'<?php echo $court['city_id'];?>';
        var country_id = document.getElementById('country_id').value;
        var state_id = document.getElementById('state_id').value;
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
             type: 'POST',
             url: baseurl + "court/getCityByStateID",
             data: { state_id: state_id },
             dataType: 'JSON',
            success: function(response){
                console.log(response);
                $.each(response.result, function( index, item ) {
                       if(state_id == item.id) {
                        div_data+='<option value="'+item.id+'" selected>'+item.name+'</option>'; 
                       }else{
                        div_data+='<option value="'+item.id+'">'+item.name+'</option>';
                       }
                });
                $('#city_id').html(div_data);
             }
        });
    }

$("#designation").change(function(){
    $("#percent_of_shares").hide();
    if($("#designation").val()==16 || $("#designation").val()==17){
        $("#percent_of_shares").show();
        $label = $("#designation option:selected").text();
    }

});

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>    