
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
            <i class="fa fa-ioxhost"></i> <?php echo $this->lang->line('front_office'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
           
            <!--./col-md-3--> 
            <?php
             $this->load->view('admin/frontoffice/_frontoffice_sidemenu');
            if ($this->rbac->hasPrivilege('setup_font_office', 'can_add')) { ?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('source'); ?></h3>
                        </div><!-- /.box-header -->

                        <form id="form1" action="<?php echo site_url('admin/source') ?>"   method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                            <div class="box-body">                        
                                <?php echo $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('source'); ?></label> <small class="req"> *</small> 
                                    <input class="form-control" id="description" name="source"  value="<?php echo set_value('source'); ?>"/>
                                    <span class="text-danger"><?php echo form_error('source'); ?></span>
                                </div>    

                                <div class="form-group">
                                    <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description"rows="3"><?php echo set_value('description'); ?></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
            <?php } ?>
            <!-- left column -->
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('setup_font_office', 'can_add')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('source'); ?></h3>
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
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white"> Source
                                <?php //echo $this->lang->line('purpose'); ?> <?php echo $this->lang->line('list'); ?>
                            </div>
                            </div>
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>                                    
                                        <th><?php echo $this->lang->line('source'); ?></th>


                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($source_list)) {
                                        ?>
                                        <?php
                                    } else {
                                        foreach ($source_list as $key => $value) {
                                            //print_r($value);
                                            ?>
                                            <tr>

                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $value['source'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($value['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $value['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div></td>


                                                <td class="mailbox-date pull-right" style="float:right !important">
                                                    <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/source/edit/<?php echo $value['id']; ?>"  class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-edit text-green"></i>
                                                        </a>
                                                    <?php } if ($this->rbac->hasPrivilege('setup_font_office', 'can_delete')) { ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/source/delete/<?php echo $value['id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="Delete">
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
            <!-- right column -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- new END -->

</div><!-- /.content-wrapper -->

<script>

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>