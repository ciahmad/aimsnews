
<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header themecolor">
        <h1>
            <i class="fa fa-calendar-check-o"></i> <?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating'); ?> <small> </small>        </h1>
    </section>
    <section class="content">
        <div class="row">  
        <?php $this->load->view('admin/payroll/_hr_report_sidebar')?> 
            <div class="col-md-10">


                <div class="box box-info" id="attendencelist">
                    <div class="box-header with-border themecolor">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <h3 class="box-title"><i class="fa fa-users"></i><?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating') . " " . $this->lang->line('list'); ?></h3>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="lateday">

                                </div>

                            </div>
                        </div></div>
                    <div class="box-body table-responsive">


                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
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
                                    <?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating') . " " . $this->lang->line('list'); ?>
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="download_label">
                            <?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating') . " " . $this->lang->line('list'); ?>
                        </div> -->
                        <table class="table table-striped table-hover example xyz">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('staff_id'); ?></th>
                                    <th><?php echo $this->lang->line('name'); ?></th>

                                    <th><?php echo $this->lang->line('rating'); ?></th>
                                    <th><?php echo $this->lang->line('comment'); ?></th>
                                    <th><?php echo $this->lang->line('status'); ?></th>
                                    <th><?php echo $this->lang->line('student') . " " . $this->lang->line('name'); ?></th>
                                    <th class="pull-right"><?php echo $this->lang->line('action'); ?></th>


                                </tr>
                            </thead>
                            <tbody> 

                                <?php foreach ($resultlist as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['employee_id']; ?></td>
                                        <td><a href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></a></td>

                                        <td><?php
                                            $j = 5;
                                            for ($i = 1; $i <= $j; $i++) {
                                                ?>
                                                <span class="fa fa-star" <?php if ($i <= $value['rate']) { ?> style="color:orange" <?php } ?>></span>
                                            <?php }; ?>

                                            <span style="display:none;" id="ratevalue"> <?php echo $value['rate']; ?></span>
                                        </td>

                                        <td><?php echo $value['comment']; ?></td>
                                        <td><?php if ($value['status'] == '0') { ?> <small class="label label-warning"><?php echo $this->lang->line('pending'); ?></small> <?php } else { ?> <small class="label label-success"> <?php echo $this->lang->line('approved'); ?></small> <?php } ?></td>
                                        <td>
                                            <?php echo $value['student_name']; ?>
                                        </td>

                                        <td class="pull-right"><?php
                                            if ($this->rbac->hasPrivilege('teachers_rating', 'can_edit')) {

                                                if ($value['status'] == '0') {
                                                    ?><a style="vertical-align: middle"  class="label label-info btn-xs btn" href="<?php echo base_url(); ?>admin/Staff/ratingapr/<?php echo $value['rate_id'] ?>"><?php echo $this->lang->line('approve'); ?></a><?php } else { ?><?php
                                                }
                                            }
                                            if ($this->rbac->hasPrivilege('teachers_rating', 'can_delete')) {
                                                ?>
                                                <a class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>"  onclick="return confirm('<?php echo $this->lang->line('delete_confirm'); ?>');" href="<?php echo base_url(); ?>admin/Staff/delete_rateing/<?php echo $value['rate_id'] ?>"><i class="fa fa-remove"></i></a>
                                                    <?php
                                                }
                                                ?>

                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>

                </section>
            </div>