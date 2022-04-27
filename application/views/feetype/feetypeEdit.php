<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
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
        @page :footer {
        display: none
    }

    @page :header {
        display: none
    }

    html, body {
        border: 1px solid white;
        height: 99%;
        page-break-after: avoid;
        page-break-before: avoid;
     }
    
    }
</style><style>
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
        @page :footer {
        display: none
    }

    @page :header {
        display: none
    }

    html, body {
        border: 1px solid white;
        height: 99%;
        page-break-after: avoid;
        page-break-before: avoid;
     }
    
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
            <?php
            if ($this->rbac->hasPrivilege('fees_type', 'can_add') || $this->rbac->hasPrivilege('fees_type', 'can_edit')) {
                ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_fees_type'); ?></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form action="<?php echo site_url("admin/feetype/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">

                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                }
                                ?>   
                                <?php echo $this->customlib->getCSRF(); ?>  
                                <input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                                <input name="id" type="hidden" class="form-control"  value="<?php echo set_value('id', $feetype['id']); ?>" />

                                		<?php  // echo "<pre>"; print_r($feetypeList); exit;?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('fees_group'); ?></label> <small class="req">*</small>

                                            <select autofocus="" id="name" name="name" class="form-control" >
                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                <?php foreach ($feetypeList as $feegroup) { ?>
                                                    <option value="<?php echo $feegroup['id'] ?>" <?php if($feegroup['id'] ==$feetype['code']){ ?> selected <?php } ?>><?php echo $feegroup['account_title'] ?></option>
                                                    <?php } ?>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('fee_groups_id'); ?></span>
                                        </div>
                                        

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label><small class="req">*</small>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description'); ?><?php echo set_value('description', $feetype['description']) ?></textarea>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
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
            if ($this->rbac->hasPrivilege('fees_type', 'can_add') || $this->rbac->hasPrivilege('fees_type', 'can_edit')) {
                echo "6";
            } else {
                echo "10";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('fees_type_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                            <div class="download_label ">
                                    <div class="row" style="width:100%">
                                            <div style="width:15%; float:left" class="col-sm-3 text text-right">                              
                                                <?php $this->userdata = $this->customlib->getuserdata();
                                                        $stting = $this->setting_model->get(null, $this->userdata['admin_id']);
                                                ?>
                                                <image style="width:100px;" src="<?php echo base_url();?>uploads/school_content/admin_logo/<?php echo $stting[0]['admin_logo']?>" alt="Institute's Logo Not Found ">
                                            
                                            </div>
                                            <div style="width:60%; float:left;" class="col-sm-9 text text-left">
                                                <h4 style="margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['name']?></h4>
                                                <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                                <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']?></p>
                                            </div>
                                    </div>

                                    <div class="row" style="padding-top:0px; margin-top:0px">
                                        <div class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                        <?php echo $this->lang->line('fees_type_list'); ?>
                                    </div>
                                    </div>
                                </div>
                        <!-- <div class="download_label"><?php echo $this->lang->line('fees_type_list'); ?></div> -->
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                    <th><?php echo "Fee Type Code"; ?>
                                        </th>
                                        <th>Acc No</th>
                                        <th><?php echo $this->lang->line('name'); ?>
                                        </th>
                                        <th><?php echo "Description"; ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($feetypeLists as $feetype) { ?>
                                    <tr>
                                        <td class="mailbox-name">
                                                <?php  echo $feetype['code'] ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php  echo $feetype['account_number']; ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php 
                                                echo $feetype['type']
                                                ?></a>

                                                <div class="fee_detail_popover" style="display: none">
                                                    <?php
                                                    if ($feetype['description'] == "") {
                                                        ?>
                                                        <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p class="text text-info"><?php echo $feetype['description']; ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="mailbox-name">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feetype['description'] ?></a>
                                            </td>

                                            <td class="mailbox-date pull-right">
                                                <?php
                                                if ($this->rbac->hasPrivilege('fees_type', 'can_edit')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/feetype/edit/<?php echo $feetype['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('fees_type', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/feetype/delete/<?php echo $feetype['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
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
        <div class="row">
            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#date').datepicker({
            //  format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true
        });
    });
</script>
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