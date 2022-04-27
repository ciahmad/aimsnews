<div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">
                        <li><a href="<?php echo base_url(); ?>admin/enquiry" style="<?php echo set_1stLevel('admin/enquiry');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('admission_enquiry'); ?> </a></li>                                                 
                        <li><a href="<?php echo base_url(); ?>admin/generalcall" style="<?php echo set_1stLevel('admin/generalcall');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('phone_call_log'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/dispatch" style="<?php echo set_1stLevel('admin/dispatch');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_dispatch'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/receive" style="<?php echo set_1stLevel('admin/receive');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_receive'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/complaint" style="<?php echo set_1stLevel('admin/complaint');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('complain'); ?></a></li>
                        <li><a href="<?php echo base_url(); ?>admin/visitors" style="<?php echo set_1stLevel('admin/visitors');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('visitor_book'); ?></a></li>
                        <p style="text-align: center" padding="margin: 0 0 10px;">
                            <a class="btn btn-primary themecolor" style="width: 100%;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">SETUP RECEIPTION</a>                        
                        </p>
                            <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card card-body">
                                                <li><a href="<?php echo site_url('admin/visitorspurpose') ?>" class="active"><?php echo $this->lang->line('purpose'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/complainttype') ?>"><?php echo $this->lang->line('complain_type'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/source') ?>"><?php echo $this->lang->line('source'); ?></a></li>
                                                <li><a href="<?php echo site_url('admin/reference') ?>" ><?php echo $this->lang->line('reference'); ?></a></li>                            
                                            </div>
                                        </div>
                                    </div>                        
                            </div>                       
                    </ul>
                </div>
            </div>