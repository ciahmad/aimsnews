

<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?>
        </h1>
    </section> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
           <?php $this->load->view('student/_student_sidebar');?>
            <?php
            if (($this->rbac->hasPrivilege('student_houses', 'can_add')) || ($this->rbac->hasPrivilege('student_houses', 'can_edit'))) {
                ?>
                <div class="col-md-10">
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('add') . " " . $this->lang->line('school') . " " . $this->lang->line('house') ?></h3>
                        </div> 
                        <?php
                        $url = "";
                        if (!empty($house_name)) {
                            $url = base_url() . "admin/schoolhouse/edit/" . $id;
                        } else {
                            $url = base_url() . "admin/schoolhouse/create";
                        }
                        ?>
                        <form id="form1" action="<?php echo $url ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php
                                if ($this->session->flashdata('msg')) {
                                    $msg = $this->session->flashdata('msg');
                                    ?>
                                    <script>
                                        $(document).ready(function () {
                                            // var msg='<?php echo $msg; ?>';
                                            //alert(msg);

                                        });
                                    </script>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>    
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label> <small class="req"> *</small>
                                    <input autofocus="" id="house_name" name="house_name" placeholder="" type="text" class="form-control"  value="<?php echo $house_name; ?>" />
                                    <span class="text-danger"><?php echo form_error('house_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <input autofocus="" id="description" name="description" placeholder="" type="text" class="form-control"  value="<?php echo $description; ?>" />
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
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
            if (($this->rbac->hasPrivilege('student_houses', 'can_add') ) || ($this->rbac->hasPrivilege('student_houses', 'can_edit'))) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">             
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('house_list'); ?></h3>                   
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
                                        <p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px"><?php echo $stting[0]['address']?></p>
                                        <p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact # <?php echo $stting[0]['phone']; ?>
                                            Email : <?php echo $stting[0]['email'];  ?>
                                    </p>
                                    </div>
                            </div>

                            <div class="row" style="padding-top:0px; margin-top:0px">
                                <div  class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
                                <?php echo $this->lang->line('house_list'); ?>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('house_list'); ?>
                        </div> -->
                        <div class="mailbox-messages table-responsive">
                            <?php if ($this->session->flashdata('msgdelete')) { ?>
                                <?php echo $this->session->flashdata('msgdelete') ?>
                            <?php } ?>
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('description'); ?></th>
                                        <th><?php echo $this->lang->line('house') . " " . $this->lang->line('id'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($houselist as $house) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"><?php echo $house['house_name'] ?></td>
                                            <td class="mailbox-name"><?php echo $house['description'] ?></td>
                                            <td class="mailbox-name"><?php echo $house['id'] ?></td>
                                            <td  class="mailbox-date pull-right" style="float:right !important">
                                                <?php if ($this->rbac->hasPrivilege('student_houses', 'can_edit')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/schoolhouse/edit/<?php echo $house['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-edit text-green"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php if ($this->rbac->hasPrivilege('student_houses', 'can_delete')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/schoolhouse/delete/<?php echo $house['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>