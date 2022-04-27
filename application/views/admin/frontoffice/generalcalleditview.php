<style>
    @media print {
        .feeprint {
            background-color: black !important;
            color:white !important;
            font-size:16px;
            -webkit-print-color-adjust: exact; 
        }

        .scissorsdiv{
            color:black !important;
            width:100% !important;
            -webkit-print-color-adjust: exact; 
        }  
        #school_name {
            color: #008080 !important;
        }
        table th:last-child {display:none}
    }
</style>
<div class="content-wrapper" style="min-height: 348px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-ioxhost"></i> <?php echo $this->lang->line('front_office'); ?>
    </section>
    <?php $call_type = $this->customlib->getCalltype(); ?>
    <section class="content">
        <div class="row">
            
            <?php 
             $this->load->view('admin/frontoffice/_frontoffice_sidemenu');
            if ($this->rbac->hasPrivilege('phone_call_log', 'can_add') || $this->rbac->hasPrivilege('phone_call_log', 'can_edit')) { ?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('phone_call_log'); ?></h3>
                        </div><!-- /.box-header -->

                        <form id="form1" action="<?php echo site_url('admin/generalcall/edit/' . $Call_data['id']) ?>"   method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                            <div class="box-body">

                                <?php echo $this->session->flashdata('msg') ?>

                                <div class="row">
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo set_value('name', $Call_data['name']); ?>" name="name">

                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('phone'); ?></label> <small class="req"> *</small> 
                                    <input type="text" class="form-control" value="<?php echo set_value('contact', $Call_data['contact']); ?>" name="contact">
                                    <span class="text-danger"><?php echo form_error('contact'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('date'); ?></label>
                                    <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($Call_data['date']))); ?>" readonly="readonly" />

                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="email"><?php echo $this->lang->line('description'); ?></label> 
                                    <input type="text" class="form-control" value="<?php echo set_value('description', $Call_data['description']); ?>" name="description">
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('next_follow_up_date'); ?></label>
                                        <input id="follow_up_date" name="follow_up_date" placeholder="" type="text" class="form-control date"  value="<?php
                                        if ($Call_data['follow_up_date'] != '0000-00-00') {
                                            echo set_value('follow_up_date', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($Call_data['follow_up_date'])));
                                        }
                                        ?>" readonly="readonly" />
                                        <span class="text-danger"><?php echo form_error('follow_up_date'); ?></span>
                                    </div>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('call_duration'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo set_value('call_dureation', $Call_data['call_dureation']); ?>" name="call_dureation">
                                    <span class="text-danger"><?php echo form_error('call_dureation'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('note'); ?></label>
                                    <textarea class="form-control" id="description" name="note"  rows="1"><?php echo set_value('note', $Call_data['note']); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('note'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('call_type'); ?></label><small class="req"> *</small> 
                                    <?php foreach ($call_type as $key => $value) { ?>
                                        <label class="radio-inline"><input type="radio" name="call_type" value="<?php echo $key; ?>" <?php if (set_value('call_type', $Call_data['call_type']) == $key) { ?> checked=""<?php } ?>> <?php echo $value; ?></label>

    <?php } ?>
                                    <span class="text-danger"><?php echo form_error('call_type'); ?></span>
                                </div>
                                    </div>
                                </div>

                                

                                

                                
                                
                                
                                
                                

                                


                            </div><!-- /.box-body -->


                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>

                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('phone_call_log', 'can_add') || $this->rbac->hasPrivilege('phone_call_log', 'can_edit')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('phone_call_log'); ?> <?php echo $this->lang->line('list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="download_label">
                                     <div class="row text" style="width:100%">
                                    <div style="width:15%; float:left" class="col-sm-3 text text-right">                              
                                        <?php $this->userdata = $this->customlib->getuserdata();
                                                 $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                               //  echo '<pre>'; print_r($stting); die('setting'); 
                                        ?>
                                        <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/logo/<?php echo $stting[0]['image']?>" alt="Institute's Logo Not Found ">
                                        
                                    
                                    </div>
                                    <div style="width:80%; float:left; padding-top:20px;" class="col-sm-9 text text-left">
                                        <h4 id="school_name" style="margin-bottom:0px; padding-bottom:0px;  font-size:24px; font-weight:600"><?php echo $stting[0]['name']?></h4>
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']; ?>
                                            Email : <?php echo $stting[0]['email'];  ?>
                                    </p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php echo $this->lang->line('phone_call_log'); ?>  <?php echo $this->lang->line('list'); ?>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('phone_call_log'); ?>
                        </div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('phone'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('date'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('next_follow_up_date'); ?></th>
                                        <th><?php echo $this->lang->line('call_type'); ?>
                                        </th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($CallList)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($CallList as $key => $value) {
                                            // print_r($value);
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"><?php echo $value['name']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['contact']; ?></td>
                                                <td class="mailbox-name"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?> </td>
                                                <td class="mailbox-name"> <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['follow_up_date'])); ?></td>
                                                <td class="mailbox-name"> <?php echo $value['call_type']; ?></td>
                                                <td class="mailbox-date pull-right" style="float:right !important">

                                                    <a  onclick="getRecord(<?php echo $value['id']; ?>)" class="btn btn-default btn-xs" data-target="#calldetails" data-toggle="modal" title="View"><i class="fa fa-eye text-black"></i></a>  
                                                <?php if ($this->rbac->hasPrivilege('phone_call_log', 'can_edit')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url('admin/generalcall/edit/' . $value['id']) ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ($this->rbac->hasPrivilege('phone_call_log', 'can_delete')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url('admin/generalcall/delete/' . $value['id']) ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="<?php echo $this->lang->line('delete'); ?>">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
        <?php } ?>
                                                </td>


                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table><!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->

        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- new END -->
<div id="calldetails" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">General Call Detail <?php //echo $this->lang->line('details'); ?></h4>
            </div>
            <div class="modal-body" id="getdetails">
            </div>
        </div>
    </div>
</div>
</div><!-- /.content-wrapper -->
<script type="text/javascript">


    function getRecord(id) {
        //alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>admin/generalcall/details/' + id,
            success: function (result) {
                //alert(result);
                $('#getdetails').html(result);
            }


        });
    }
</script>