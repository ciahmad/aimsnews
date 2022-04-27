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
            <i class="fa fa-ioxhost"></i> <?php echo $this->lang->line('front_office'); ?> </section>
    <section class="content">       
        <div class="row">
            
            <?php 
            $this->load->view('admin/frontoffice/_frontoffice_sidemenu');
            if ($this->rbac->hasPrivilege('visitor_book', 'can_add') || $this->rbac->hasPrivilege('visitor_book', 'can_edit')) { ?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('visitor'); ?></h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('admin/visitors/edit/' . $visitor_data['id']) ?>"   method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                            <div class="box-body">
                                <?php echo $this->session->flashdata('msg') ?>

                                <div class="row">
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('purpose'); ?></label><small class="req"> *</small>

                                    <select name="purpose" class="form-control"> 
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>    
                                        <?php foreach ($Purpose as $key => $value) { ?>
                                            <option value="<?php print_r($value['visitors_purpose']); ?>"<?php if (set_value('purpose', $visitor_data['purpose']) == $value['visitors_purpose']) { ?>selected=""<?php } ?>><?php print_r($value['visitors_purpose']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('purpose'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('name'); ?></label> <small class="req"> *</small> 
                                    <input type="text" class="form-control" value="<?php echo set_value('name', $visitor_data['name']); ?>" name="name">
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('phone'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo set_value('contact', $visitor_data['contact']); ?>" name="contact">
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('icard'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo set_value('id_proof', $visitor_data['id_proof']); ?>" name="id_proof">
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="email"><?php echo $this->lang->line('number_of_person'); ?></label> 
                                    <input type="text" class="form-control" value="<?php echo set_value('pepples', $visitor_data['no_of_pepple']); ?>" name="pepples">
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('date'); ?></label>
                                        <input type="text" id="date" class="form-control date" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($visitor_data['date']))); ?>"  name="date" readonly="">
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('in_time'); ?></label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="time" class="form-control timepicker" id="stime_" value="<?php echo set_value('time', $visitor_data['in_time']); ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('time'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('out_time'); ?></label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="out_time" class="form-control timepicker" id="stime_" value="<?php echo set_value('out_time', $visitor_data['out_time']); ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('out_time'); ?></span>
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for=""><?php echo $this->lang->line('note'); ?></label>
                                    <textarea class="form-control" id="description" name="note" name="note" rows="1"><?php echo set_value('note', $visitor_data['note']); ?></textarea>
                                    <span class="text-danger">
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="exampleInputFile"><?php echo $this->lang->line('attach_document'); ?></label>
                                    <div><input class="filestyle form-control" type='file' name='file'/>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('file'); ?></span></div>
                            </div>
                                    </div>                                  
                                </div>
                                
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>

                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('visitor_book', 'can_add') || $this->rbac->hasPrivilege('visitor_book', 'can_edit')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary"> 
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('visitor'); ?> <?php echo $this->lang->line('list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="download_label ">
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
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">Visitor Book
                                <?php echo $this->lang->line('list'); ?>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="download_label"><?php echo $this->lang->line('visitor'); ?> 
                        <?php //echo $this->lang->line('list'); ?>
                    </div> -->
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('purpose'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('phone'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('in_time'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('out_time'); ?>
                                        </th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($visitor_list)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($visitor_list as $key => $value) {
                                            //print_r($value);
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"><?php echo $value['purpose']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['name']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['contact']; ?> </td>
                                                <td class="mailbox-name"> <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?></td>
                                                <td class="mailbox-name"> <?php echo $value['in_time']; ?></td>
                                                <td class="mailbox-name"> <?php echo $value['out_time']; ?></td>
                                                <td class="mailbox-date pull-right" style="float:right !important">
                                                    <a  data-placement="left" onclick="getRecord(<?php echo $value['id']; ?>)" class="btn btn-default btn-xs" data-target="#visitordetails" data-toggle="modal"  title="View"><i class="fa fa-eye text-black"></i></a> 
                                                    <?php if ($value['image'] !== "") { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/visitors/download/<?php echo $value['image']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('download'); ?>">
                                                            <i class="fa fa-download"></i>
                                                        </a>  <?php } ?> 
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/visitors/edit/<?php echo $value['id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-edit text-green"></i>
                                                    </a>
                                                    <?php if ($value['image'] !== "") { ?><a data-placement="left" href="<?php echo base_url(); ?>admin/visitors/imagedelete/<?php echo $value['id']; ?>/<?php echo $value['image']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="<?php echo $this->lang->line('delete'); ?>">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/visitors/delete/<?php echo $value['id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="<?php echo $this->lang->line('delete'); ?>">
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
<div id="visitordetails" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header themecolor">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('details'); ?></h4>
            </div>
            <div class="modal-body" id="getdetails">


            </div>
        </div>
    </div>
</div>
</div><!-- /.content-wrapper -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">

                                                            $(function () {

                                                                $(".timepicker").timepicker({
                                                                    // showInputs: false,
                                                                    // defaultTime: false,
                                                                    // explicitMode: false,
                                                                    // minuteStep: 1
                                                                });
                                                            });


                                                            function getRecord(id) {
                                                                // alert(id);
                                                                $.ajax({
                                                                    url: '<?php echo base_url(); ?>admin/visitors/details/' + id,
                                                                    success: function (result) {
                                                                        //alert(result);
                                                                        $('#getdetails').html(result);
                                                                    }


                                                                });

                                                            }


</script>