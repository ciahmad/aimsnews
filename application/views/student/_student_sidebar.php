<style>
    /* .btn { 
  padding: 0px 16px;
  background-color: #424242;
    border-left: 5px solid #DC700E;
    color:white !important;
  cursor: pointer;
}

/* Style the active class (and buttons on mouse-over) */
/* .active, .btn:hover {
    background: #424242;
    color: #faa21c;
    cursor: pointer;
} */ */
</style>
<div class="col-md-2">
    <div class="box border0">
        <ul class="tablists" id="myDIV"> 
                <?php
                     if ($this->rbac->hasPrivilege('student_houses', 'can_view')) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>admin/schoolhouse"  style="<?php echo set_1stLevel('admin/schoolhouse'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('house'); ?></a></li>
                    <?php  } ?>
                    <?php if ($this->rbac->hasPrivilege('disable_reason', 'can_view')) { ?>
                    <li><a href="<?php echo base_url(); ?>admin/disable_reason" style="<?php echo set_1stLevel('student/disable_reason'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo "Deactivation"." ".$this->lang->line('reason'); ?></a></li>
                    <?php  } ?>
                    <?php if ($this->rbac->hasPrivilege('item_category', 'can_view')) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>category" style="<?php echo set_1stLevel('category/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_categories'); ?></a></li>
                    <?php  } ?>
                    <?php if ($this->rbac->hasPrivilege('student', 'can_delete')) {
                    ?>
                    <li><a href="<?php echo site_url('student/bulkdelete'); ?>" style="<?php echo set_1stLevel('bulkdelete'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('bulk') . " " . $this->lang->line('delete'); ?></a>
                    </li>

                <?php  } ?>
                <li  style="background:#424242; color:white; width:100%; padding:6px; text-align:center; box-shadow: 2px 5px gray; " ><i class="fa fa-angle-double-down"></i>REPORTS</li>
                <li class="<?php echo set_Submenu('student/multiclass'); ?>"><a href="<?php echo base_url(); ?>student/multiclass"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('multiclass') . " " . $this->lang->line('student'); ?></a></li>
                    <li class="<?php echo set_Submenu('student/disablestudentslist'); ?>"><a href="<?php echo base_url(); ?>student/disablestudentslist"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disabled_students'); ?></a></li>
                    <li class="<?php echo set_Submenu('stuattendence/attendenceReport'); ?>"><a href="<?php echo base_url(); ?>admin/stuattendence/attendencereport"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('attendance_by_date'); ?></a></li>
                    <li class="<?php echo set_Submenu('Reports/student_information'); ?>"><a href="<?php echo base_url(); ?>report/studentinformation"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student')." ".$this->lang->line('reports'); ?></a></li>
                    <li class="<?php echo set_Submenu('subjectattendence/index'); ?>"><a href="<?php echo base_url(); ?>admin/subjectattendence"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('period') . " " . $this->lang->line('attendance'); ?></a></li>
        </ul>
    </div>
    <script type="">
        // Get the container element
// var btnContainer = document.getElementById("myDIV");

// // Get all buttons with class="btn" inside the container
// var btns = btnContainer.getElementsByClassName("btn");

// // Loop through the buttons and add the active class to the current/clicked button
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("active");
//     current[0].className = current[0].className.replace(" active", "");
//     this.className += " active";
//   });
// }
    </script>
</div>

