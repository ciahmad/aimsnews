<style>
@media print {
	table th:last-child {
		display: block
	}
}
</style>
<div class="content-wrapper">  
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?> <small><?php echo $this->lang->line('class1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <?php
                    $this->load->view('student/_student_sidebar');
            if ($this->rbac->hasPrivilege('student_categories', 'can_add') || $this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                ?>
                <div class="col-md-10">              
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_category'); ?></h3>
                        </div>  
                        <form action="<?php echo site_url("category/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                <?php  echo $this->lang->line('category_list'); ?>
                            </div>
                            </div>
                        </div>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('category'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="category" name="category" placeholder="" type="text" class="form-control"  value="<?php echo set_value('category', $category['category']); ?>" />
                                    <span class="text-danger"><?php echo form_error('category'); ?></span>
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
            if ($this->rbac->hasPrivilege('student_categories', 'can_add') || $this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                echo "10";
            } else {
                echo "12";
            }
            ?>">               
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('category_list'); ?></h3>                     
                    </div>
                    <div class="box-body">
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>
                                        <th align="left"><?php echo $this->lang->line('category'); ?></th>
                                        <th><?php echo $this->lang->line('category') . " " . $this->lang->line('id'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($categorylist as $category) {
                                        ?>
                                        <tr>                                         
                                            <td class="mailbox-name"><?php echo $category['category'] ?></td>
                                            <td class="mailbox-name"><?php echo $category['id'] ?></td>
                                            <td align="right" class="mailbox-date">
                                                <?php
                                                if ($this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>category/edit/<?php echo $category['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-edit text-green"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php
                                                if ($this->rbac->hasPrivilege('student_categories', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>category/delete/<?php echo $category['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
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
