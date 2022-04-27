<div class="content-wrapper">  
    <section class="content-header">
        <h1><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('human_resource'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <form id="form1" action="<?php echo site_url('admin/adminprofile/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="alert alert-info">
                                Staff email is their login username, password is generated automatically and send to staff email. Superadmin can change staff password on their staff profile page.

                            </div>
                            <div class="tshadow mb25 bozero">    
                                <!-- <div class="box-tools pull-right pt3">
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admin/adminprofile/import" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('import') . " " . $this->lang->line('staff') ?></a> 

                                </div> --> 
                                <h4 class="pagetitleh2 themecolor"><?php echo $this->lang->line('admin_profile'); ?> </h4>

                                <?php echo validation_errors(); ?>

                                <div class="around10">

                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                    <?php echo $this->customlib->getCSRF(); ?>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('account_no'); ?></label><small class="req"> *</small>
                                                <input autofocus="" id="account_no" name="account_no"  placeholder="" type="text" class="form-control"  value="<?php echo set_value('account_no', $account_no) ?>" readonly style="background-color: #ccc;"/>
                                                <span class="text-danger"><?php echo form_error('account_no'); ?></span>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="firstname"><?php echo $this->lang->line('first_name'); ?></label><small class="req"> *</small>
                                                <input id="firstname" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name') ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="lastname"><?php echo $this->lang->line('last_name'); ?></label>
                                                    <input id="lastname" name="surname" placeholder="" type="text" class="form-control"  value="<?php echo set_value('surname') ?>" />
                                                    <span class="text-danger"><?php echo form_error('surname'); ?></span>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('father_name'); ?></label>
                                                    <input id="father_name"  name="father_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('father_name') ?>" />
                                                    <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('mother_name'); ?></label>
                                                    <input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('mother_name') ?>" />
                                                    <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                                                </div>
                                            </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('email'); ?> (<?php echo $this->lang->line('login') . " " . $this->lang->line('username'); ?>)</label><small class="req"> *</small>
                                                <input id="email" name="email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email') ?>" />
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputFile"> <?php echo $this->lang->line('gender'); ?></label><small class="req"> *</small>
                                                <select class="form-control" name="gender">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($genderList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php echo set_select('gender', $key, set_value('gender')); ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('date_of_birth'); ?></label><small class="req"> *</small>
                                                <input id="dob" name="dob" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('dob') ?>" />
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('phone'); ?></label>
                                                    <input id="mobileno" name="contactno" placeholder="" type="text" class="form-control"  value="<?php echo set_value('contactno') ?>" />
                                                    <span class="text-danger"><?php echo form_error('contactno'); ?></span>
                                                </div>
                                            </div> 
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('emergency_contact_number'); ?></label>
                                                    <input id="emergency_no" name="emergency_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('emergency_no') ?>" />
                                                    <span class="text-danger"><?php echo form_error('emergency_no'); ?></span>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('marital_status'); ?></label>
                                                    <select class="form-control" name="marital_status">
                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                        <?php foreach ($marital_status as $makey => $mavalue) {
                                                            ?>
                                                            <option value="<?php echo $mavalue ?>" <?php echo set_select('marital_status', $mavalue, set_value('marital_status')); ?>><?php echo $mavalue; ?></option>

                                                        <?php } ?>  

                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('marital_status'); ?></span>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile"><?php echo $this->lang->line('photo'); ?></label>
                                                    <div><input class="filestyle form-control" type='file' name='file' id="file" size='20' />
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('file'); ?></span>
                                                </div>
                                            </div>                          
                                        
                                    </div>
                                    <div class="row">
                                        
                                       
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="current_address"><?php echo $this->lang->line('current'); ?> <?php echo $this->lang->line('address'); ?></label>
                                                    <input id="current_address" name="current_address" placeholder="" type="text" class="form-control"  value="<?php echo set_value('current_address') ?>" />
                                                    
                                                    <span class="text-danger"></span></div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="country_name"><?php echo $this->lang->line('country_name'); ?></label>
                                                <select class="form-control" id="country_id" name="country_id" onchange="getState();">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($countries as $country) { ?>
                                                    <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
                                                    <?php   } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('country_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="state_name"><?php echo $this->lang->line('state_name'); ?></label>
                                                <select class="form-control" id="state_id" name="state_id" onchange="getCities()">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('state_name'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="city_name"><?php echo $this->lang->line('city_name'); ?></label>
                                                <select class="form-control" id="city_id" name="city_id">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('city_name'); ?></span>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">    

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cnic_no">
                                                    <?php echo $this->lang->line('cnic_no'); ?>
                                                    </label>
                                                    <input id="cnic_no" name="cnic_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('cnic_no'); ?>" />
                                                    <span class="text-danger"><?php echo form_error('cnic_no'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ntn_number"><?php echo $this->lang->line('ntn_number'); ?></label>
                                                    <input type="text" name="ntn_number" id="ntn_number" class="form-control" value="<?php echo set_value('ntn_number'); ?>">
                                                    <span class="text-danger"><?php echo form_error('ntn_number'); ?></span>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('qualification'); ?></label>
                                                    <input type="text" id="qualification" name="qualification" placeholder=""  class="form-control" value="<?php echo set_value('qualification') ?>" >
                                                    <span class="text-danger"><?php echo form_error('qualification'); ?></span>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('work_experience'); ?></label>
                                                    <input type="text" id="work_exp" name="work_exp" placeholder="" class="form-control" value="<?php echo set_value('work_exp') ?>">
                                                    <span class="text-danger"><?php echo form_error('work_exp'); ?></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">    
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile"><?php echo $this->lang->line('permanent_address'); ?></label>
                                                    <div><textarea name="permanent_address" class="form-control"><?php echo set_value('permanent_address'); ?></textarea>
                                                    </div>
                                                    <span class="text-danger"></span></div>
                                            </div> 
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile"><?php echo $this->lang->line('note'); ?></label>
                                                    <div><textarea name="note" class="form-control"><?php echo set_value('note'); ?></textarea>
                                                    </div>
                                                    <span class="text-danger"></span></div>
                                            </div>                          
                                        

                                    </div>   

                                </div>
                            </div>

                            <div class="box-group collapsed-box">                              
                                <div class="panel box box-success collapsed-box">
                                    <div class="box-header with-border">
                                        <a data-widget="collapse" data-original-title="Collapse" class="collapsed btn boxplus">
                                            <i class="fa fa-fw fa-plus"></i><?php echo $this->lang->line('add_more_details'); ?>
                                        </a>
                                    </div>

                                    <div class="box-body">

                                        <!-- <div class="tshadow mb25 bozero">    
                                            <h4 class="pagetitleh2"><?php echo $this->lang->line('chamber_profile'); ?>
                                            </h4>

                                            <div class="row around10">
                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="chamber_name"><?php echo $this->lang->line('chamber_name'); ?></label>
                                                            <input id="chamber_name" name="chamber_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chamber_name') ?>"  />
                                                            <span class="text-danger"><?php echo form_error('chamber_name'); ?></span>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="chamber_code"><?php echo $this->lang->line('chamber_code'); ?></label>
                                                            <input type="text" class="form-control" name="chamber_code" value="<?php echo set_value('chamber_code') ?>" >
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="chamber_address"><?php echo $this->lang->line('chamber_address'); ?></label>
                                                            <input id="chamber_address" name="chamber_address" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chamber_address') ?>" />
                                                            <span class="text-danger"><?php echo form_error('chamber_address'); ?></span>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="chamber_office_address"><?php echo $this->lang->line('chamber_office_address'); ?></label>
                                                            <input id="chamber_office_address" name="chamber_office_address" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chamber_office_address') ?>" />
                                                            <span class="text-danger"><?php echo form_error('chamber_office_address'); ?></span>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="chamber_contact"><?php echo $this->lang->line('chamber_contact'); ?></label>
                                                            <input id="chamber_contact" name="chamber_contact" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chamber_contact') ?>" />
                                                            <span class="text-danger"><?php echo form_error('chamber_contact'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="chamber_email"><?php echo $this->lang->line('chamber_email'); ?></label>
                                                            <input id="chamber_email" name="chamber_email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chamber_email') ?>" />
                                                            <span class="text-danger"><?php echo form_error('chamber_email'); ?></span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> -->
                                        
                                            <div class="tshadow mb25 bozero">    
                                                <h4 class="pagetitleh2"><?php echo $this->lang->line('leaves'); ?>
                                                </h4>

                                                <div class="row around10" >
                                                    <?php
                                                    foreach ($leavetypeList as $key => $leave) {
                                                        ?>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $leave["type"]; ?></label>

                                                                <input  name="leave_type[]" type="hidden" readonly class="form-control" value="<?php echo $leave['id'] ?>" />
                                                                <input  name="alloted_leave_<?php echo $leave['id'] ?>" placeholder="<?php echo $this->lang->line('number_of_leaves'); ?>" type="text" class="form-control" />

                                                                <span class="text-danger"><?php echo form_error('alloted_leave'); ?></span>
                                                            </div>
                                                        </div>



                                                    <?php } ?>
                                                </div>
                                            </div>
                                        
                                            <div class="tshadow mb25 bozero">    
                                                <h4 class="pagetitleh2"><?php echo $this->lang->line('bank_account_details'); ?>
                                                </h4>

                                                <div class="row around10">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('account_title'); ?></label>
                                                            <input id="account_title" name="account_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('account_title') ?>" />
                                                            <span class="text-danger"><?php echo form_error('account_title'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('bank_account_no'); ?></label>
                                                            <input id="bank_account_no" name="bank_account_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_account_no') ?>" />
                                                            <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('bank_name'); ?></label>
                                                            <input id="bank_name" name="bank_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_name') ?>" />
                                                            <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('ifsc_code'); ?></label>
                                                            <input id="ifsc_code" name="ifsc_code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('ifsc_code') ?>" />
                                                            <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('bank_branch_name'); ?></label>
                                                            <input id="bank_branch" name="bank_branch" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_branch') ?>" />
                                                            <span class="text-danger"><?php echo form_error('bank_branch'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div> 
                                        
                                            <div class="tshadow mb25 bozero">    
                                                <h4 class="pagetitleh2"><?php echo $this->lang->line('social_media'); ?>
                                                </h4>

                                                <div class="row around10">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('facebook_url'); ?></label>
                                                            <input id="bank_account_no" name="facebook" placeholder="" type="text" class="form-control"  value="<?php echo set_value('facebook') ?>" />
                                                            <span class="text-danger"><?php echo form_error('facebook'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('twitter_url'); ?></label>
                                                            <input id="bank_account_no" name="twitter" placeholder="" type="text" class="form-control"  value="<?php echo set_value('twitter') ?>" />
                                                            <span class="text-danger"><?php echo form_error('twitter_profile'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('linkedin_url'); ?></label>
                                                            <input id="bank_name" name="linkedin" placeholder="" type="text" class="form-control"  value="<?php echo set_value('linkedin') ?>" />
                                                            <span class="text-danger"><?php echo form_error('linkedin'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('instagram_url'); ?></label>
                                                            <input id="instagram" name="instagram" placeholder="" type="text" class="form-control"  value="<?php echo set_value('instagram') ?>" />

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        
                                            <div id='upload_documents_hide_show'>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tshadow bozero">
                                                            <h4 class="pagetitleh2"><?php echo $this->lang->line('upload_documents'); ?></h4>

                                                            <div class="row around10">   
                                                                <div class="col-md-6">
                                                                    <table class="table">
                                                                        <tbody><tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th><?php echo $this->lang->line('title'); ?></th>
                                                                                <th><?php echo $this->lang->line('documents'); ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td><?php echo $this->lang->line('resume'); ?></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='first_doc' id="doc1" >
                                                                                    <span class="text-danger"><?php echo form_error('first_doc'); ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td><?php echo $this->lang->line('other_documents'); ?><input type="hidden" name='fourth_title' class="form-control" placeholder="Other Documents"></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='fourth_doc' id="doc4" >
                                                                                    <span class="text-danger"><?php echo form_error('fourth_doc'); ?></span>
                                                                                </td>
                                                                            </tr>

                                                                        </tbody></table>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th><?php echo $this->lang->line('title'); ?></th>
                                                                                <th><?php echo $this->lang->line('documents'); ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td><?php echo $this->lang->line('joining_letter'); ?></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='second_doc' id="doc2" >
                                                                                    <span class="text-danger"><?php echo form_error('second_doc'); ?></span>
                                                                                </td>
                                                                            </tr>


                                                                        </tbody></table>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>               
            </div>
        </div> 
</div>
</section>
</div>


<script type="text/javascript">

        function getState(){
        var state_id = 0  //'<?php echo $court['state_id'];?>';
        var country_id = document.getElementById('country_id').value;
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
             type: 'POST',
             url: baseurl + "admin/adminprofile/getStateByCountryID",
             data: { country_id: country_id },
             dataType: 'JSON',
            success: function(response){
                console.log(response);
                $.each(response.result, function( index, item ) {
                       if(state_id == item.id) {
                        div_data+='<option value="'+item.id+'" selected>'+item.name+'</option>'; 
                       }else{
                        div_data+='<option value="'+item.id+'">'+item.name+'</option>';
                       }
                });
                $('#state_id').html(div_data);
             }
        });
    }
    function getCities(){
        var city_id = 0  //'<?php echo $court['city_id'];?>';
        var country_id = document.getElementById('country_id').value;
        var state_id = document.getElementById('state_id').value;
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
             type: 'POST',
             url: baseurl + "admin/adminprofile/getCityByStateID",
             data: { state_id: state_id },
             dataType: 'JSON',
            success: function(response){
                console.log(response);
                $.each(response.result, function( index, item ) {
                       if(state_id == item.id) {
                        div_data+='<option value="'+item.id+'" selected>'+item.name+'</option>'; 
                       }else{
                        div_data+='<option value="'+item.id+'">'+item.name+'</option>';
                       }
                });
                $('#city_id').html(div_data);
             }
        });
    }

$("#designation").change(function(){
    $("#percent_of_shares").hide();
    if($("#designation").val()==16 || $("#designation").val()==17){
        $("#percent_of_shares").show();
        $label = $("#designation option:selected").text();
    }

});





</script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>    