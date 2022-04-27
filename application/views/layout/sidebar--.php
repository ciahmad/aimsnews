<style type="text/css">

        #accordian{
            margin-top: 85px;
        }

        #accordian ul li h3 a:hover {
                background: #070707;
                border-left: 5px solid #DC700E;
                color: #faa21c;
        }

        #accordian h3 a {
                padding: 5px;
                font-size: 13px;
                line-height: 25px;
                display: block;
                color: #fff;
                text-decoration: none;
        }

        #accordian h3:hover {
                text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
        }

        i {
                margin-right: 5px;
        }

        #accordian li {
                list-style-type: none;
        }

        #transport:hover{
            color: red;
        }

        #accordian ul ul li a,
        #accordian h4 {
                color: #fff;
                text-decoration: none;
                font-size: 12px;
                line-height: 27px;
                display: block;
                padding: 0 15px;
                -webkit-transition: all 0.15s;
                transition: all 0.15s;
                position: relative;
        }

        #accordian ul ul li a:hover {
                background: #070707;
                border-left: 5px solid #DC700E;
                color: #faa21c;
        }

        #accordian ul ul {
                display: none;
        }

        #accordian li.active&gt;ul {
                display: block;
        }

        #accordian ul ul ul {
                border-left: 1px dotted rgba(0, 0, 0, 0.5);
        }

        #accordian a:not(:only-child):after {
                content: "\f104";
                font-family: fontawesome;
                position: absolute;
                right: 10px;
                top: 0;
                font-size: 12px;
        }

        #accordian .active&gt;a:not(:only-child):after {
                content: "\f107";
        }
</style>
<aside class="main-sidebar" id="alert2">
    <?php if ($this->rbac->hasPrivilege('student', 'can_view')) { ?>
        <form class="navbar-form navbar-left search-form2" role="search"  action="<?php echo site_url('admin/admin/search'); ?>" method="POST">
            <?php echo $this->customlib->getCSRF(); ?>
            <div class="input-group ">

                <input type="text"  name="search_text" class="form-control search-form" placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
    <?php } ?>
    <section class="sidebar" id="sibe-box">
        <?php $this->load->view('layout/top_sidemenu'); ?>
        
        <div id="accordian" style="padding-bottom: 30px;">
            <ul style="padding: 0px;">
                <?php if ($this->rbac->module_permission('super_admin')) { ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-user-plus ftlayer"></i></span>SUPER ADMIN</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('SUPERADMIN');?>">

                        <?php if ($this->rbac->hasPrivilege('adminprofile', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/adminprofile" style="<?php echo set_1stLevel('admin/adminprofile');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('admin_list'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('packagesubscription', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/packagesubscription" style="<?php echo set_1stLevel('admin/packagesubscription');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('package_subscribe'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('packages', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/packages" style="<?php echo set_1stLevel('admin/packages');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('packages'); ?></a></li>
                        <?php }?>
                        <?php if ($this->rbac->hasPrivilege('superadmin', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>admin/roles" style="<?php echo set_1stLevel('admin/roles');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('roles_permissions'); ?></a></li>
                        <?php }?>
                        
                    </ul>
                </li>
                <?php } ?> 
                <?php if ($this->rbac->module_permission('schsettings')) { ?>
                    <?php if ($this->rbac->hasPrivilege('general_setting', 'can_view')) { ?>
                    <li>
                        <h3 style="padding: 0px; margin: 0px; <?php echo menu_heading('ADMIN SETTINGS'); ?>">
                            <a href="<?php echo base_url(); ?>schsettings" style="<?php echo set_1stLevel('book/getall'); ?>"><i class="fa fa-angle-double-right"></i></span>ADMIN SETTINGS</a></h3>
                    </li>
                    <?php } ?>
                <?php } ?> 
                <?php if ($this->rbac->module_permission('front_office')) { ?>
                    <?php
                    if ($this->module_lib->hasActive('front_office')) {
                            if (($this->rbac->hasPrivilege('admission_enquiry', 'can_view') ||
                                $this->rbac->hasPrivilege('visitor_book', 'can_view') ||
                                $this->rbac->hasPrivilege('phon_call_log', 'can_view') ||
                                $this->rbac->hasPrivilege('postal_dispatch', 'can_view') ||
                                $this->rbac->hasPrivilege('postal_receive', 'can_view') ||
                                $this->rbac->hasPrivilege('complaint', 'can_view') ||
                                $this->rbac->hasPrivilege('setup_font_office', 'can_view'))) {
                            ?>
                    <li><h3 style="padding: 0px; margin: 0px;"><a href="<?php echo base_url(); ?>admin/visitorspurpose" style="<?php echo set_1stLevel('admin/visitorspurpose');?>"><i class="fa fa-user-plus ftlayer"></i>RECEPTION</a>
                    </li>
               
                    <?php } } ?>
                <?php } ?> 

                <?php if ($this->rbac->module_permission('student_information')) { ?>

                <li>
                    <h3 style="padding: 0px; margin: 0px;"> <a href="javascript:"><i class="fa fa-gears ftlayer"></i>STUDENTS</a></h3>
                    <ul style="padding-left: 10px; <?php echo menu_heading('STUDENTS'); ?>">

                        <li> 
                            <!-- <a href="javascript:"><i class="fa fa-user-plus ftlayer"></i>MAIN</a> -->
                            <!-- <ul style="padding-left: 5px; <?php echo menu_heading('STUDENTS');?>"> -->

                            <!-- <?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                                <li><a href="<?php echo base_url(); ?>student/search" style="<?php echo set_1stLevel('student/search');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_details'); ?></a></li>
                                <?php }?> -->

                                <!-- <?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                                <li><a href="<?php echo base_url(); ?>student/search" style="<?php echo set_1stLevel('student/search');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_details'); ?></a></li>
                                <?php }?>

                                <?php if ($this->rbac->hasPrivilege('student', 'can_add')) {?>
                                <li><a href="<?php echo base_url(); ?>student/create" style="<?php echo set_1stLevel('student/create');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_admission'); ?></a></li>
                                <?php } ?>
                            
                                <?php if ($this->module_lib->hasActive('online_admission')) {
                                    if ($this->rbac->hasPrivilege('online_admission', 'can_view')) { ?>
                                <li><a href="<?php echo site_url('admin/onlinestudent'); ?>" style="<?php echo set_1stLevel('onlinestudent');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('admission'); ?></a></li>
                                <?php }} ?>

                                <li><a href="<?php echo base_url(); ?>admin/stuattendence" style="<?php echo set_1stLevel('stuattendence/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_attendance'); ?></a></li>

                                <?php if ($this->rbac->hasPrivilege('approve_leave', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/approve_leave" style="<?php echo set_1stLevel('Attendance/approve_leave');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve') . " " . $this->lang->line('leave'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('promote_student', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/stdtransfer" style="<?php echo set_1stLevel('stdtransfer/index');?>"><i class="fa fa-angle-double-right" ></i> <?php echo $this->lang->line('promote_students'); ?></a></li>
                                <?php }?> -->

                                <!-- <li class=""><a href="<?php echo base_url(); ?>admin/approve_leave" ><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve') . " " . $this->lang->line('leave'); ?></a></li> -->
                                <!-- <li class=""><a href="<?php echo base_url(); ?>admin/stdtransfer" ><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('promote_students'); ?></a></li> -->
                            <!-- </ul> -->
                        </li>
                            <?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                                <li class="active"><a href="<?php echo base_url(); ?>student/search" style="<?php echo set_1stLevel('student/search');?>"><i class="fa fa-user-plus ftlayer"></i> <?php echo $this->lang->line('student'); ?></a></li>
                            <?php }?>

                            <?php if ($this->rbac->hasPrivilege('student_houses', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/schoolhouse"  style="<?php echo set_1stLevel('admin/schoolhouse'); ?>"><i class="fa fa-user-plus ftlayer"></i> <?php echo $this->lang->line('student_setup'); ?></a></li>
                            <?php  } ?>

                        
                        
                    </ul>
                </li>
                <?php } ?> 

                <?php if ($this->rbac->module_permission('human_resource')) { ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                        <a href="javascript:"><i class="fa fa-sitemap ftlayer"></i></span>HUMAN RESOURCE</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('HUMAN RESOURCE'); ?>">


                        <!-- <li class="active"> 
                            <a href="javascript:"><i class="fa fa-money ftlayer"></i>HR MAIN</a>
                            <ul style="padding-left: 5px;">
                                                               
                            </ul>
                        </li> -->

                        <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff" style="<?php echo set_1stLevel('HR/staff');?>"><i class="fa fa-money ftlayer"></i> <?php echo $this->lang->line(''); ?>HR</a></li>
                                <?php } ?>

                        
                        <?php if ($this->rbac->hasPrivilege('department', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/department/department" style="<?php echo set_1stLevel('admin/department/department'); ?>"><i class="fa fa-sitemap ftlayer"></i> <?php echo $this->lang->line('hr_setup'); ?></a></li>
                        <?php  } ?>

                        <!-- <li> <a href="javascript:"><i class="fa fa-sitemap ftlayer"></i>HR SETTINGS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('HUMAN RESOURCE'); ?>">

                               <?php if ($this->rbac->hasPrivilege('department', 'can_view')) { ?>
                                 <li><a href="<?php echo base_url(); ?>admin/department/department" style="<?php echo set_1stLevel('admin/department/department'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('department'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('designation', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/designation/designation" style="<?php echo set_1stLevel('admin/designation/designation'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('designation'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff/disablestafflist" style="<?php echo set_1stLevel('HR/staff/disablestafflist'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disabled_staff'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('leave_types', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/leavetypes" style="<?php echo set_1stLevel('admin/leavetypes'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('leave_type'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li> -->

                        <!-- <li> <a href="javascript:"><i class="fa fa-sitemap ftlayer"></i>HR REPORTS</a>
                            <ul style="padding-left: 10px; <?php echo sub_heading('HUMAN RESOURCE'); ?>">

                               <li class="<?php echo set_Submenu('Reports/human_resource'); ?>"><a href="<?php echo base_url(); ?>report/staff_report"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('human_resource'); ?></a></li>
                                <li class="<?php echo set_Submenu('Academics/timetable/mytimetable'); ?>"><a href="<?php echo base_url(); ?>admin/timetable/mytimetable"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('teachers') . " " . $this->lang->line('timetable') ?></a></li>
                                <li class="<?php echo set_Submenu('HR/rating'); ?>"><a href="<?php echo base_url(); ?>admin/staff/rating"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating'); ?></a></li>
                            </ul>
                        </li> -->
                        <?php if ($this->rbac->hasPrivilege('staff_report', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>report/staff_report" style="<?php echo set_1stLevel('Reports/human_resource'); ?>"><i class="fa fa-sitemap ftlayer"></i> HR REPORTS <?php //echo $this->lang->line('human_resource'); ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($this->rbac->module_permission('voucher') || $this->rbac->module_permission('expense') || $this->rbac->module_permission('income') || $this->rbac->module_permission('fees_type')) { ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-lg fa-tasks"></i>FINANCE</a></h3>                        
                    <ul style="padding-left: 10px; <?php echo menu_heading('FINANCE');?>" >

                        <?php  if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) {?>
                                 <li><a href="<?php echo base_url(); ?>studentfee/index" style="<?php echo set_1stLevel('studentfee/index'); ?>"><i class="fa fa-money ftlayer"></i> <?php echo $this->lang->line('fee'); ?> </a></li>
                        <?php  } ?> 
                          <?php if ($this->rbac->hasPrivilege('fees_type', 'can_view')) {?>
                                 <li><a href="<?php echo base_url(); ?>admin/feetype" style="<?php echo set_1stLevel('admin/feetype'); ?>"><i class="fa fa-money ftlayer"></i> <?php echo $this->lang->line('fee_setup'); ?> </a></li>
                        <?php  } ?> 

                        <?php if ($this->rbac->hasPrivilege('income', 'can_view') || $this->rbac->hasPrivilege('expense')) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/income" style="<?php echo set_1stLevel('income/index');?>"><i class="fa fa-dollar ftlayer"></i><?php echo $this->lang->line('account'); ?></a>
                                </li>
                            
                        <?php } ?>

                        <!-- <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>    
                                <li><a href="<?php echo base_url(); ?>studentfee" style="<?php echo set_1stLevel('studentfee/index');?>"><i class="fa fa-money ftlayer"></i>  <?php echo $this->lang->line('fee'); ?></a></li>
                            <?php } ?> -->
                        <!-- <li class="active"> 
                            <a href="javascript:"><i class="fa fa-money ftlayer"></i>FEE</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('FEE'); ?>">
                            <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>    
                                <li><a href="<?php echo base_url(); ?>studentfee" style="<?php echo set_1stLevel('studentfee/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('collect_fees'); ?></a></li>
                            <?php } ?>                           
                            </ul>
                        </li> -->
                        
                       

                      

                        
                        <!-- <?php //if ($this->rbac->hasPrivilege('expense', 'can_view')) { ?>
                        <li> 
                            <a href="javascript:"><i class="fa fa-money ftlayer"></i>EXPENSES</a>
                            <ul style="padding-left: 10px; <?php echo sub_heading('EXPENSES'); ?>">
                                <li><a href="<?php echo base_url(); ?>admin/expense" style="<?php echo set_1stLevel('expense/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_expense'); ?></a></li>
                            </ul>
                        </li>
                        <?php //} ?>
                        <li> 
                            <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>VOUCHERS</a>
                            <ul style="padding-left: 10px; <?php echo sub_heading('VOUCHERS'); ?>">

                                <li class=""><a href="<?php echo base_url(); ?>admin/receiptvoucher" style="<?php echo set_1stLevel('receiptvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Receipt Voucher</a></li>

                                <li class=""><a href="<?php echo base_url(); ?>admin/paymentvoucher" style="<?php echo set_1stLevel('paymentvoucher/index');?>"><i class="fa fa-angle-double-right" ></i>Payment Voucher</a></li>

                                <li class=""><a href="<?php echo base_url(); ?>admin/journalvoucher" style="<?php echo set_1stLevel('journalvoucher/index');?>"><i class="fa fa-angle-double-right"></i>Journal Voucher</a></li>
                            </ul>
                        </li> -->
                        <!-- <li> <a href="javascript:"><i class="fa fa-list-alt ftlayer"></i>ACCOUNTS SETTINGS</a>
                            <ul style="padding-left: 10px; <?php echo sub_heading('ACCOUNTS'); ?>">

                                <?php if ($this->rbac->hasPrivilege('income_head', 'can_view')) {?>
                                <li><a href="<?php echo base_url(); ?>admin/incomehead" style="<?php echo set_1stLevel('incomeshead/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('income_head'); ?></a></li>
                                <?php  } ?>
                                 <?php if ($this->rbac->hasPrivilege('expense_head', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/expensehead" style="<?php echo set_1stLevel('expenseshead/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('expense_head'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li> -->                        
                    </ul>
                </li>
                <?php } ?>

                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-gears ftlayer"></i>ACADEMICS</a></h3>
                    <ul style="padding-left: 10px; <?php echo menu_heading('ACADEMICS'); ?>">
                            <?php if ($this->rbac->hasPrivilege('section', 'can_view')) { ?>
                            <li><a href="<?php echo base_url(); ?>sections" style="<?php echo set_1stLevel('sections/index'); ?>"><i class="fa fa-gears ftlayer"></i> <?php echo $this->lang->line('academic_setup'); ?></a></li>
                            <?php  } ?>

                            <?php if ($this->rbac->hasPrivilege('manage_lesson_plan', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/syllabus" style="<?php echo set_1stLevel('admin/syllabus'); ?>"><i class="fa fa-list-alt ftlayer"></i> <?php echo $this->lang->line('manage_lesson_plan'); ?></a>Setup </li>
                                    <?php  } ?>
            

                            <li> <a href="javascript:"><i class="fa fa-paragraph ftlayer"></i>CONTENTS CENTRE</a>
                                <ul style="padding-left: 5px; <?php echo sub_heading('CONTENTS CENTRE'); ?>">
                                    <?php if ($this->rbac->hasPrivilege('upload_content', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/content" style="<?php echo set_1stLevel('admin/content'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('upload_content'); ?></a></li>
                                    <?php  } ?>
                                    <?php  if ($this->module_lib->hasActive('homework')) {?>
                                        <?php if ($this->rbac->hasPrivilege('homework', 'can_view')) { ?>
                                        <li><a href="<?php echo base_url(); ?>homework" style="<?php echo set_1stLevel('homework'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_homework'); ?></a></li>
                                    <?php  } ?>
                                    <?php } ?>
                                </ul>   
                            </li>

                            <li> <a href="javascript:"><i class="fa fa-paragraph ftlayer"></i>CONTENTS REPORTS</a>
                                <ul style="padding-left: 5px; <?php echo sub_heading('CONTENTS REPORTS'); ?>">
                                    <?php if ($this->rbac->hasPrivilege('assignment', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/content/assignment" style="<?php echo set_1stLevel('content/assignment'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('assignments'); ?></a></li>
                                    <?php } ?>
                                    <?php if ($this->rbac->hasPrivilege('studymaterial', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/content/studymaterial" style="<?php echo set_1stLevel('content/studymaterial'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('study_material'); ?></a></li>
                                    <?php } ?>
                                    <?php if ($this->rbac->hasPrivilege('syllabus', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/content/syllabus" style="<?php echo set_1stLevel('content/syllabus'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('syllabus'); ?></a></li>
                                    <?php } ?>
                                    <?php if ($this->rbac->hasPrivilege('other_downloads', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>admin/content/other" style="<?php echo set_1stLevel('content/other'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('other_downloads'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-object-group ftlayer"></i></span>EXAMINATIONS</a></h3>
                    <ul style="padding-left: 10px; <?php echo menu_heading('EXAMINATIONS'); ?>">

                        <?php if ($this->rbac->hasPrivilege('exam', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/examgroup" style="<?php echo set_1stLevel('admin/examgroup'); ?>"><i class="fa fa-map-o"></i><?php echo $this->lang->line('exam') . " " . $this->lang->line('group'); ?></a></li>
                        <?php } ?>
                        
                         <?php
                            if ($this->module_lib->hasActive('online_examination')) {

                                //if (($this->rbac->hasPrivilege('online_examination', 'can_view') || $this->rbac->hasPrivilege('question_bank', 'can_view'))) {
                                    ?>
                                <?php if ( $this->rbac->hasPrivilege('exam_schedual', 'can_view') ){ ?>

                                <li><a href="<?php echo site_url('admin/exam_schedule'); ?>" style="<?php echo set_1stLevel('examinations/examschedule'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('exam_schedule'); ?></a></li>
                                <?php } ?>
                               <?php if ($this->rbac->hasPrivilege('print_marksheet', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/examresult/marksheet" style="<?php echo set_1stLevel('Examinations/examresult/marksheet'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('marksheet'); ?></a></li>
                                <?php  } ?>
                                
                                <?php if ($this->rbac->hasPrivilege('online_examination', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/onlineexam" style="<?php echo set_1stLevel('Online_Examinations/Onlineexam'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('exam'); ?></a></li>
                                <?php  } ?>

                                <?php if ($this->rbac->hasPrivilege('question_bank', 'can_view')) { ?>
                                <li> <a href="javascript:"><i class="fa fa-question-circle"></i>QUESTION BANK</a>
                                    <ul style="padding-left: 5px; <?php echo sub_heading('Question Bank'); ?>">
                                       
                                        <?php if ($this->rbac->hasPrivilege('question_bank', 'can_view')) { ?>
                                        <li><a href="<?php echo base_url(); ?>admin/question" style="<?php echo set_1stLevel('Online_Examinations/question'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('objective')." ".$this->lang->line('question'); ?></a>
                                        </li>
                                        <?php } ?> 
                                        
                                        <?php if ($this->rbac->hasPrivilege('question_bank', 'can_view')) { ?>
                                        <li><a href="<?php echo base_url(); ?>admin/subjectivequestion" style="<?php echo set_1stLevel('Online_Examinations/sujective_question'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('subjective'). " " .$this->lang->line('question'); ?></a></li>
                                        <?php } ?> 
                                        
                                        
                                         <?php if ($this->rbac->hasPrivilege('generate_paper', 'can_view')) { ?>
                                        <li><a href="<?php echo base_url(); ?>admin/generatepaper" style="<?php echo set_1stLevel('question/generatepaper'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('generate'). " " .$this->lang->line('paper'); ?></a></li>
                                        <?php } ?> 
                                    </ul>   
                                </li>
                                <?php } ?>
                                
                            
                        <?php } ?>   
                        <li> <a href="javascript:"><i class="fa fa-map-o ftlayer"></i>EXAM REPORTS</a>
                            <ul style="padding-left: 10px; <?php echo sub_heading('Exam Reports'); ?>">
                                <?php if ($this->rbac->hasPrivilege('exam_result', 'can_view')) { ?>
                                <li ><a href="<?php echo site_url('admin/examresult'); ?>" style="<?php echo set_1stLevel('Examinations/Examresult'); ?>"><i class="fa fa-angle-double-right" ></i> <?php echo $this->lang->line('exam') . " " . $this->lang->line('result'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('print_admit_card', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/examresult/admitcard" style="<?php echo set_1stLevel('Examinations/examresult/admitcard'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('admit') . " " . $this->lang->line('card'); ?></a></li>
                                <?php } ?>
                                <!-- <li class="<?php echo set_Submenu('Examinations/examresult/marksheet'); ?>"><a href="<?php echo base_url(); ?>admin/examresult/marksheet"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('marksheet'); ?></a></li> -->
                                <?php if ($this->rbac->hasPrivilege('rank_report', 'can_view')) { ?>
                                <li ><a href="<?php echo base_url(); ?>report/examinations" style="<?php echo set_1stLevel('Reports/examinations'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('examinations'); ?></a></li>
                                <?php } ?>
                                <?php if ($this->rbac->hasPrivilege('online_examination', 'can_view')) { ?>
                                <li ><a href="<?php echo base_url(); ?>admin/onlineexam/report" style="<?php echo set_1stLevel('Reports/online_examinations'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('examinations'); ?></a></li>
                                <?php } ?>
                                <!-- <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Bank Receipt Voucher</a></li>
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Cash/Bank Payment Voucher</a></li>
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Journal Voucher</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php //if ($this->rbac->module_permission('books')) { ?>
                    <?php if ($this->rbac->hasPrivilege('books', 'can_view')) { ?>
                    <li>
                        <h3 style="padding: 0px; margin: 0px;">
                            <a href="<?php echo base_url(); ?>admin/book/getall" style="<?php echo set_1stLevel('book/getall'); ?>"><i class="fa fa-book ftlayer"></i></span><?php echo $this->lang->line('library'); ?></a></h3>
                    </li>
                    <?php } ?>
                <?php //} ?>
                <?php //if ($this->rbac->module_permission('issue_item')) { ?>
                    <?php if ($this->rbac->hasPrivilege('issue_item', 'can_view')) { ?>
                        <li>
                            <h3 style="padding: 0px; margin: 0px;"><a href="<?php echo base_url(); ?>admin/issueitem" style="<?php echo set_1stLevel('issueitem/index'); ?>"><i class="fa fa-object-group ftlayer"></i>INVENTORY</a></h3>
                        </li>
                    <?php } ?>
                <?php //} ?>
                <?php //if ($this->rbac->module_permission('routes')) { ?>
                    <?php if ($this->rbac->hasPrivilege('routes', 'can_view')) { ?>
                            <li>
                                <h3 style="padding: 0px; margin: 0px;"><a href="<?php echo base_url(); ?>admin/route" style="<?php echo set_1stLevel('route/index'); ?>"><i class="fa fa-bus ftlayer"></i>TRANSPORT</a></h3>
                            </li>
                     <?php } ?>
                <?php //} ?>
                <?php //if ($this->rbac->module_permission('hostel_rooms')) { ?>
                     <?php if ($this->rbac->hasPrivilege('hostel_rooms', 'can_view')) { ?>
                    <li><h3 style="padding: 0px; margin: 0px;">
                        <a href="<?php echo base_url(); ?>admin/hostelroom" style="<?php echo set_1stLevel('hostelroom/index'); ?>"><i class="fa fa-building-o ftlayer"></i>HOSTEL</a></h3>
                    </li>
                    <?php } ?>
                <?php //} ?>
                <?php if ($this->rbac->module_permission('system_settings')) { ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                    <a href="javascript:"><i class="fa fa-gears ftlayer"></i>SETTINGS</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('SETTINGS'); ?>">
                        <li> <a href="javascript:"><i class="fa fa-bullhorn ftlayer"></i>COMMUNICATION</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('COMMUNICATION'); ?>">

                                <?php if ($this->rbac->hasPrivilege('notification_setting', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/notification" style="<?php echo set_1stLevel('notification/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notice_board'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('email', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/compose" style="<?php echo set_1stLevel('Communicate/mailsms/compose'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('send') . " " . $this->lang->line('email') ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('sms', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/compose_sms" style="<?php echo set_1stLevel('mailsms/compose_sms'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('send') . " " . $this->lang->line('sms') ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('email_sms_log', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/index" style="<?php echo set_1stLevel('mailsms/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('email_/_sms_log'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        
                        <li> <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>CERTIFICATES</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('Certificate'); ?>">
                                <?php if ($this->rbac->hasPrivilege('student_certificate', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/certificate/" style="<?php echo set_1stLevel('admin/certificate'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('certificate'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('generate_certificate', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/generatecertificate/" style="<?php echo set_1stLevel('admin/generatecertificate'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('certificate'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('student_id_card', 'can_view')) { ?>
                                <li><a href="<?php echo base_url('admin/studentidcard/'); ?>" style="<?php echo set_1stLevel('admin/studentidcard'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('icard'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('generate_id_card', 'can_view')) { ?>
                                <li><a href="<?php echo base_url('admin/generateidcard/'); ?>" style="<?php echo set_1stLevel('admin/generateidcard'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('icard'); ?></a>
                                </li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-empire ftlayer"></i>FRONT CMS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('Front CMS'); ?>">
                                <?php if ($this->rbac->hasPrivilege('event', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/events" style="<?php echo set_1stLevel('admin/front/events'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('event'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('gallery', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/gallery" style="<?php echo set_1stLevel('admin/front/gallery'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('gallery'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('notice', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/notice" style="<?php echo set_1stLevel('admin/front/notice'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notice'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('media_manager', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/media" style="<?php echo set_1stLevel('admin/front/media'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('media_manager'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('pages', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/page" style="<?php echo set_1stLevel('admin/front/page'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('page'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('menus', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/menus" style="<?php echo set_1stLevel('admin/front/menus'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('menus'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('banner_images', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/front/banner" style="<?php echo set_1stLevel('admin/front/banner'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('banner_images'); ?></a>
                                </li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-universal-access ftlayer"></i>ALUMNI</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('alumni'); ?>">
                                <?php if ($this->rbac->hasPrivilege('manage_alumni', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/alumni/alumnilist" style="<?php echo set_1stLevel('alumni/alumnilist'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_alumini'); ?></a>
                                </li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('events', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/alumni/events" style="<?php echo set_1stLevel('alumni/event'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('events'); ?></a>
                                </li>
                                <?php  } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($this->rbac->module_permission('reports')) { ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;"> <a href="javascript:"><i class="fa fa-line-chart ftlayer"></i>REPORTS</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('REPORTS'); ?>">
                        <li> <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>CERTIFICATES</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('CERTIFICATES'); ?>">
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Certificates List</a></li>
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>ID Cards List</a></li>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-gears ftlayer"></i>GENERAL REPORTS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('GENERAL REPORTS'); ?>">

                                <?php if ($this->rbac->hasPrivilege('alumni_report', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>report/alumnireport" style="<?php echo set_1stLevel('Reports/alumni_report'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('alumni'); ?></a></li>
                                <?php  } ?>

                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <?php } ?>
            </ul>
            
        </div>
        
    </section>

</aside>

<script type="text/javascript">
    // Code By Webdevtrick ( https://webdevtrick.com )
$(document).ready(function() {
    $("#accordian a").click(function() {
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;

        closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length)
                        parallel_active_links.removeClass("active");
        });

        if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
        }
    })
})
</script>