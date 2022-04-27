<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>

<div class="content-wrapper" style="min-height: 348px;">  
    <section class="content-header">
        <h1><i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <?php $this->load->view('admin/feetype/_fee_setup_sidebar'); ?>           
        <?php if ($this->rbac->hasPrivilege('fees_type', 'can_add')) { ?>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><?php echo $this->lang->line('add_fees_type'); ?></h3>
                    </div>
                    <form id="form1" action="<?php echo base_url() ?>admin/feetype"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('fees_type'); ?></label><small class="req"> *</small>

                                        <select  id="name" name="name" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($feetypeList as $feetype) {
                                                ?>
                                                <option value="<?php echo $feetype['id'] ?>"<?php
                                                if (set_value('feetype_id') == $feetype['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $feetype['account_number'] ?> - <?php echo $feetype['account_title'] ?></option>

                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('feetype_id'); ?></span>
                                    </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label> <small class="req"> *</small>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right themecolor"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

            </div>
        <?php } ?>
            <div class="col-md-<?php
            if($this->rbac->hasPrivilege('setup_font_office', 'can_add')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">
                  <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('fees_type_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
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
                                    <?php echo $this->lang->line('fees_type_list'); ?>
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('fees_type_list'); ?>
                        </div> -->
                                
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-striped table-hover example">
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
                                    <?php
                                    foreach ($feetypeLists as $feetype) {
                                        ?>
                                        <tr>
                                        
                                        <td class="mailbox-name">
                                                <?php  echo $feetype['code'] ;?>
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
                                            <td class="mailbox-date pull-right" style="float:right !important">
                                                <?php
                                                if ($this->rbac->hasPrivilege('fees_type', 'can_edit')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/feetype/edit/<?php echo $feetype['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-edit text-green"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php
                                                if ($this->rbac->hasPrivilege('fees_type', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/feetype/delete/<?php echo $feetype['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';

        $('#date').datepicker({
            //  format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true
        });

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