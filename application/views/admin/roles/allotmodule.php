
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('addallotmodule', 'can_add')) {
                ?>
                <!-- <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_module'); ?></h3>
                        </div>
                        
                    </div>            
                </div> -->
            <?php } ?>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><?php echo $this->lang->line('assign_permission'); ?> (<?php echo $role['name'] ?>) </h3>
                        <?php if ($this->rbac->hasPrivilege('addallotmodule', 'can_add')) { ?>
                        <div class="box-tools pull-right ">
                            <small class="pull-right"><a href="#addAllotModule" onclick="addallotmodule()" role="button" class="btn btn-primary btn-sm checkbox-toggle pull-right colorbtn"> <i class="fa fa-plus"></i><?php echo $this->lang->line('add_module'); ?></a></small>
                       </div>
                       <?php } ?>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/roles/permission/' . $role['id']) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php echo $this->customlib->getCSRF(); ?>  
                            <input type="hidden" name="role_id" value="<?php echo $role['id'] ?>"/>
                            <div class="table-responsive">  
                                <?php 
                                    $count =1;
                                    foreach ($role_permission as $key => $value) { 
                                        //echo "<pre>"; print_r($value->permission_category);
                                    if($value->is_active == 1){
                                        $disabled = '';
                                    }else{
                                        $disabled = 'disabled';
                                    }
                                ?>
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading ">
                                            <h4 class="panel-title">
                                              <a class="relative" data-toggle="collapse" href="#collapse<?php echo $value->id; ?>"><?php echo $value->name;?></a>
                                             <?php // echo "<pre>";print_r($value->is_active); "</pre>";?>
                                            </h4>
                                            <div class="material-switch pull-right" >
                                                <input id="system<?php echo $value->id; ?>" name="someSwitchOption001" type="checkbox" data-pcatid="<?php echo $count; ?>" data-role="system" class="chk" data-rowid="<?php echo $value->id; ?>" value="checked" <?php if ($value->is_active == 1 && !empty($value->permission_category)) echo "checked='checked'"; ?> />
                                                <label for="system<?php echo $value->id; ?>" class="label-success"></label>
                                            </div>
                                        </div>
                                      <div id="collapse<?php echo $value->id; ?>" class="panel-collapse collapse">
                                        <table class="table table-stripped" id="myTable<?php echo $count;?>">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('module'); ?></th>
                                                    <th><?php echo $this->lang->line('feature'); ?></th>
                                                    <th><?php echo $this->lang->line('view'); ?></th>
                                                    <th><?php echo $this->lang->line('add'); ?></th>
                                                    <th><?php echo $this->lang->line('edit'); ?></th>
                                                    <th><?php echo $this->lang->line('delete'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php ///if ($value->is_active == 1){?>
                                                <tr>
                                                    <td><?php echo $value->name ?></td>
                                                    <?php if (!empty($value->permission_category)) { ?>
                                                    <td>
                                                        <input type="hidden" name="per_cat[]" value="<?php echo $value->permission_category[0]->id; ?>" />
                                                        <input type="hidden" name="<?php echo "roles_permissions_id_" . $value->permission_category[0]->id; ?>" value="<?php echo $value->permission_category[0]->roles_permissions_id; ?>" />
                                                        <?php echo $value->permission_category[0]->name ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($value->permission_category[0]->enable_view == 1){ ?>
                                                        <label class="">
                                                        <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_view-perm_" . $value->permission_category[0]->id; ?>" value="<?php echo $value->permission_category[0]->id; ?>" <?php echo set_checkbox("can_view-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_view == 1) ? TRUE : FALSE); ?>> 
                                                        </label> 
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($value->permission_category[0]->enable_add == 1){ ?>
                                                        <label class="">
                                                            <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_add-perm_" . $value->permission_category[0]->id; ?>" value="<?php echo $value->permission_category[0]->id; ?>" <?php echo set_checkbox("can_view-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_add == 1) ? TRUE : FALSE); ?>> 
                                                        </label> 
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($value->permission_category[0]->enable_edit == 1) {
                                                            ?>
                                                            <label class="">
                                                                <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_edit-perm_" . $value->permission_category[0]->id; ?>" value="<?php echo $value->permission_category[0]->id; ?>" <?php echo set_checkbox("can_view-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_edit == 1) ? TRUE : FALSE); ?>> 
                                                            </label> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($value->permission_category[0]->enable_delete == 1) {
                                                            ?>
                                                            <label class="">
                                                                <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_delete-perm_" . $value->permission_category[0]->id; ?>" value="<?php echo $value->permission_category[0]->id; ?>" <?php echo set_checkbox("can_view-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_delete == 1) ? TRUE : FALSE); ?>> 
                                                            </label> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td colspan="5"></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php //} ?>
                                                <?php //if ($value->is_active == 1){?>
                                                <?php if (!empty($value->permission_category) && count($value->permission_category) > 1) {
                                                unset($value->permission_category[0]);
                                                foreach ($value->permission_category as $new_feature_key => $new_feature_value) { 
                                                        $count = $count+1;
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <input type="hidden" name="per_cat[]" value="<?php echo $new_feature_value->id; ?>" />
                                                            <input type="hidden" name="<?php echo "roles_permissions_id_" . $new_feature_value->id; ?>" value="<?php echo $new_feature_value->roles_permissions_id; ?>" />
                                                            <?php echo $new_feature_value->name ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($new_feature_value->enable_view == 1) {
                                                                ?>
                                                                <label class="">
                                                                    <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_view-perm_" . $new_feature_value->id; ?>" value="<?php echo $new_feature_value->id; ?>" <?php echo set_checkbox("can_view-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_view == 1) ? TRUE : FALSE); ?>> 
                                                                </label> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($new_feature_value->enable_add == 1) {
                                                                ?>
                                                                <label class="">
                                                                    <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_add-perm_" . $new_feature_value->id; ?>" value="<?php echo $new_feature_value->id; ?>" <?php echo set_checkbox("can_view-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_add == 1) ? TRUE : FALSE); ?>> 
                                                                </label> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($new_feature_value->enable_edit == 1) {
                                                                ?>
                                                                <label class="">
                                                                    <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_edit-perm_" . $new_feature_value->id; ?>" value="<?php echo $new_feature_value->id; ?>" <?php echo set_checkbox("can_view-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_edit == 1) ? TRUE : FALSE); ?>> 
                                                                </label> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($new_feature_value->enable_delete == 1) {
                                                                ?>
                                                                <label class="">
                                                                    <input type="checkbox" <?php echo $disabled;?> name="<?php echo "can_delete-perm_" . $new_feature_value->id; ?>" value="<?php echo $new_feature_value->id; ?>" <?php echo set_checkbox("can_view-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_delete == 1) ? TRUE : FALSE); ?>> 
                                                                </label> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php //} ?>
                                                <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
                                <?php $count++;} ?>
                            </div><!--./table-responsive-->   
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="save" value="savepermission" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>         

        </div>

    </section>
</div>
<div id="addAllotModule" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content" >
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add'); ?>&nbsp;<?php echo $this->lang->line('details'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form1" action="<?php echo site_url('admin/roles/permission/' . $role['id']) ?>"  id="addmoduleform" name="addmoduleform" method="post" accept-charset="utf-8">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="box-body">                            
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="form-group">
                                <label for="name"><?php echo $this->lang->line('module_name'); ?></label><small class="req"> *</small>
                                <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name'); ?>" required />
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="short_code"><?php echo $this->lang->line('module_short_code'); ?></label><small class="req"> *</small>
                                <input autofocus="" id="short_code" name="short_code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('short_code'); ?>" required/>
                                <span class="text-danger"><?php echo form_error('short_code'); ?></span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="save" value="savemodule" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function addallotmodule() {
        $('input[type=text]').val('');
        $('input[type=text]').val('');
        $('#addAllotModule').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('click', '.chk', function () {

            var checked = $(this).is(':checked');
            var rowid = $(this).data('rowid');
            var role = $(this).data('role');
            var pcatid = $(this).data('pcatid');

            if (checked) {
                if (!confirm('<?php echo $this->lang->line('are_you_sure'); ?>')) {
                    $(this).removeAttr('checked');

                } else {
                    var status = "1";
                    if(role=='system'){
                         changeStatus(rowid, status, role);
                         $('#myTable'+pcatid).find("input[type=checkbox]").prop("checked", true);
                         $('#myTable'+pcatid).find("input[type=checkbox]").prop("disabled", false);

                    }

                }

            } else if (!confirm('<?php echo $this->lang->line('are_you_sure'); ?>')) {
                $(this).prop("checked", true);
            } else {
                var status = "0";
                if(role=='system'){
                     changeStatus(rowid, status, role);
                     $('#myTable'+pcatid).find("input[type=checkbox]").prop("disabled", true);
                     $('#myTable'+pcatid).find("input[type=checkbox]").prop("checked", false);
                     
                }

            }
        });
    });

     function changeStatus(rowid, status, role) {

        var base_url = '<?php echo base_url() ?>';
        //alert(base_url);
        $.ajax({
            type: "POST",
            url: base_url + "admin/module/changeStatus",
            data: {'id': rowid, 'status': status, 'role': role},
            dataType: "json",
            success: function (data) {
                successMsg(data.msg);
                //location.reload();
            }
        });
    }


</script>