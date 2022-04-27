<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <?php $this->load->view('admin/feetype/_fee_setup_sidebar'); ?>  
            <?php
            if ($this->rbac->hasPrivilege('fine', 'can_add') || $this->rbac->hasPrivilege('fees_discount', 'can_edit')) {
                ?>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title">Edit Fine</h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('admin/fine/edit/' . $finerow['id']) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>

                                <?php echo $this->customlib->getCSRF(); ?>
                                <input id="id" name="id" placeholder="" type="hidden" class="form-control"  value="<?php echo set_value('id', $finerow['id']); ?>" />

                                
                                <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>

                                            <select  id="name" name="name" class="form-control" >
                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                <?php
                                                foreach ($fineLists as $feetype) {
                                                    ?>
                                                    <option value="<?php echo $feetype['id'] ?>"<?php
                                                    if ($finerow['code'] == $feetype['id']) {
                                                        echo "selected =selected";
                                                    }
                                                    ?>><?php echo $feetype['account_number'] ?> - <?php echo $feetype['account_title'] ?></option>

                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        </div>
                                        
                                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?></label>
                                    <input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount', $finerow['amount']); ?>" />
                                    <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?><?php echo set_value('description', $finerow['description']); ?></textarea>
                                    <span class="text-danger"></span>
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>

                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('fees_discount', 'can_add') || $this->rbac->hasPrivilege('fees_discount', 'can_edit')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix">Fine List</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-messages table-responsive">
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
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px">
                                            <?php echo $stting[0]['address']?>
                                        </p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact #
                                            <?php echo $stting[0]['phone']; ?> Email :
                                                <?php echo $stting[0]['email'];  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:0px; margin-top:0px">
                                    <div class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                    <?php //$this->lang->line('fees_discount_list'); ?> Fine List
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                                <?php echo $this->lang->line('fees_discount_list'); ?>
                            </div> -->
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr><th><?php echo "Fine Code"; ?></th>
                                        
                                        <th><?php echo $this->lang->line('name'); ?>
                                        <th><?php echo $this->lang->line('discount_code'); ?>

                                        <th><?php echo $this->lang->line('amount'); ?>
                                        </th>

                                        <th class="text text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($fine_results)) {
                                        ?>
                                        <tr>
                                            <td colspan="2" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>

                                        </tr>
                                        <?php
                                    } else {
                                        foreach ($fine_results as $fine) {
                                            ?>
                                            <tr>
                                            
                                            	<td class="mailbox-name">
                                            <a href="#" data-toggle="popover" class="detail_popover"><?php 
                                                echo $fine['code'];
                                                ?></a>
                                            </td> 
                                                <td class="mailbox-name">
                                                   <a href="#" data-toggle="popover" class="detail_popover"><?php 
                                                 
                                                
                                                echo $fine['name'];
                                                ?></a>


                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($fine['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $fine['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <th><?php echo "Description"; ?>

                                                <td class="mailbox-name"> <?php echo $fine['amount'] ?></td>


                                                <td class="mailbox-date pull-right" style="float:right !important">
                                                    
                                                    <?php
                                                    
                                                    if ($this->rbac->hasPrivilege('fineedit', 'can_edit')) {
                                                        ?>

                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/fine/edit/<?php echo $fine['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-edit text-green"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('fees_type', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/fine/delete/<?php echo $fine['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
        <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function () {


        $("#btnreset").click(function () {
            $("#form1")[0].reset();
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