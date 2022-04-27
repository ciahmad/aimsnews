<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php //echo $this->lang->line('student_information'); ?>
        </h1>
    </section> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if (($this->rbac->hasPrivilege('generate_paper', 'can_add')) || ($this->rbac->hasPrivilege('generate_paper', 'can_edit'))) {
                ?>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Generate Paper </h3>
                        </div> 
                        <?php
                        $url = "";
                        if (!empty($generate_papers)) {
                            $url = base_url() . "admin/generatepaper/edit/" . $id;
                        } else {
                            $url = base_url()."admin/generatepaper/create";
                        }
                        ?>
                        <form id="form1" action="<?php echo $url ?>"  id="generatepaperform" name="generatepaperform" method="post" accept-charset="utf-8">
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
                                <div class="row">
                                	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Subject</label> <small class="req"> *</small>
                                		 <?php //print_r($subjectlist); ?>
                                		 <select name="subject_id" id="subject_id" class="form-control">
                                		 	 <?php if (empty($generate_papers->subject_id)) {?>
                                		 	 	<option value="">Select Subject</option>
                                		 	 	
                                		 	<?php } foreach ($subjectlist as $value) { ?>
                                		 		<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                		 	<?php }; ?>
                                			
                                		 </select>
                                		 <span class="text-danger"><?php echo form_error('subject_id'); ?></span>
                                	</div>
                                	</div>
                                	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Exam Group</label> <small class="req"> *</small>
                                		  <select name="exam_group" class="form-control">
                                		  	<?php 
if(!empty($generate_papers)){?>
	 <option value="<?php echo $generate_papers->exam_group_id  ?>"><?php echo $generate_papers->exam_group  ?></option>
  
	<?php }	?>
                                		  
                                		 	 	<option value="">Select Exam Group</option>
                                		 	<?php foreach ($exam_groups as $value) { ?>
                                		 		<option value="<?php echo $value->id ?>" <?php if ($value->id == $value->name) { echo 'selected'; } ?> ><?php echo $value->name ?></option>
                                		 	<?php }; ?>
                                		 </select>
                                		
                                		 <span class="text-danger"><?php echo form_error('exam_group'); ?></span>
                                	</div>
                                	</div>
                                </div>

                                   <div class="row">
                                   	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Select Paper</label> <small class="req"> *</small>
                                		 <select name="paper" class="form-control">
                                		 	<?php
                                		 		if(!empty($generate_papers)){?>
	 <option value="<?php echo $generate_papers->paper  ?>"><?php echo $generate_papers->paper  ?></option>
  
	<?php }	?>
                                		 	 <option value="">Select Paper</option>
                                	
                                		 	<option value="Theory">Theory</option>
                                		 	<option value="Practical">Practical</option>
                                		 </select>
                                		 <span class="text-danger"><?php echo form_error('paper'); ?></span>
                                	</div>
                                	</div>
                                	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Time Duration</label> <small class="req"> *</small>
                                		 

                                		 <input autofocus="" id="time_duration" name="time_duration" placeholder="" type="text" class="form-control"  
                                		 value="<?php echo $generate_papers->time_duration ?>" />
                                		 <span class="text-danger"><?php echo form_error('time_duration'); ?></span>
                                	</div>
                                	</div>
                                </div>

                                <div class="row form-group">
                               <div class="col-md-4">
                                        <label for="exampleInputEmail1">Start Time</label>
                                      
                                        <input type="time" class="form-control" name="start_time" 
                                        value="<?php echo $generate_papers->start_time; ?>">
                                         <span class="text-danger"><?php echo form_error('start_time'); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">End Time</label>
                                        <input type="time" class="form-control" name="end_time" value="<?php echo $generate_papers->end_time; ?>">
                                         <span class="text-danger"><?php echo form_error('end_time'); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" class="form-control" name="paper_date" value="<?php echo $generate_papers->paper_date; ?>">
                                         <span class="text-danger"><?php echo form_error('paper_date'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                   	<div class="col-md-4">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Class</label> <small class="req"> *</small>

                                	 <select name="class_id" id="class_id" onchange="getsection()" class="form-control">

                <?php
                   if(!empty($generate_papers)){?>
	<option value="<?php echo $generate_papers->class_id; ?>"><?php echo $generate_papers->class_name; ?></option>
  
	<?php }	?>
                                		 	 <option value="">Select Paper</option>
                                	 	

                                		 	<?php foreach ($classes as $x => $value) { ?>
                                		 		<option value="<?php echo $value->id; ?>"><?php echo $value->class ?></option>
                                		 	<?php }; ?>
                                		 </select>
                                		 <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                	</div>
                                	</div>
                                	<div class="col-md-4">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Section</label> <small class="req"> *</small>
                                		
                                		<select name="section_id" id="section_id" class="form-control">
                                		<?php if (empty($generate_papers->section_id)) {?>
                                		 	 	<option value="">Select Section</option>
                                		<?php } ?>
                                			<option value="<?php echo $generate_papers->section_id; ?>"><?php echo $generate_papers->section_name; ?></option>
                                		</select>
                                		 <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                	</div>
                                	</div>

                                	<div class="col-md-4">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">Teacher</label> <small class="req"> *</small>
                                		 <select name="teacher_id" class="form-control" id="teacher_id">
                                		 	<?php if (empty($generate_papers->teacher_id)) {?>
                                		 	 	<option value="">Select Teacher</option>
                                		 <?php } ?>
                                		 	<option value="<?php echo $generate_papers->teacher_id; ?>"><?php echo $generate_papers->teacher_name; ?></option>
                                		 </select>                  
                                		 <span class="text-danger"><?php echo form_error('teacher_id'); ?></span>
                                	</div>
                                	</div>
                                </div>

                                <div class="row">
                                   	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">No of Question From Objective</label> 
                                		 <input autofocus="" id="question_form_objective" name="question_form_objective" placeholder="" type="text" class="form-control"  value="<?php echo $generate_papers->question_form_objective; ?>" />
                                		 <span class="text-danger"><?php echo form_error('question_form_objective'); ?></span>
                                	</div>
                                	</div>
                                	<div class="col-md-6">
                                		<div class="form-group">
                                		 <label for="exampleInputEmail1">No of Question From Subjective</label>
                                		 <input autofocus="" id="question_from_subjective" name="question_from_subjective" placeholder="" type="text" class="form-control"  value="<?php echo $generate_papers->question_from_subjective; ?>" />
                                		 <span class="text-danger"><?php echo form_error('question_from_subjective'); ?></span>
                                	</div>
                                	</div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Insert Picture</label> <small class="req"> *</small>
                                    <input autofocus="" id="insert_img" name="insert_img" placeholder="" type="button" class="filestyle form-control"  value="<?php echo $insert_img; ?>" />
                                    <span class="text-danger"><?php echo form_error('insert_img'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <input autofocus="" id="description" name="description" placeholder="" type="text" class="form-control"  value="<?php echo $generate_papers->description; ?>" />
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Generate Paper</button>
                            </div>
                        </form>
                    </div>  
                </div> 
            <?php } ?>
            <div class="col-md-<?php
            if (($this->rbac->hasPrivilege('generate_paper', 'can_add') ) || ($this->rbac->hasPrivilege('generate_paper', 'can_edit'))) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">             
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Generated Paper List</h3>                   
                    </div>
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('house_list'); ?></div>
                        <div class="mailbox-messages table-responsive">
                            <?php if ($this->session->flashdata('msgdelete')) { ?>
                                <?php echo $this->session->flashdata('msgdelete') ?>
                            <?php } ?>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Subject</th>
                                        <th>Theory/Practical</th>
                                        <th>Date</th>
                                        <th>Class/section/Teacher</th>
                                        <th>Exam Group</th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($generatedpaperslist as $generatedpaper) {
                                        ?>

                                        <tr>
                                            <td class="mailbox-name"><?php echo $count++ ?></td>
                                            <td class="mailbox-name"><?php echo $generatedpaper->subject_name; ?></td>
                                            <td class="mailbox-name"><?php echo $generatedpaper->paper ?></td>
                                            <td class="mailbox-name"><?php echo $generatedpaper->paper_date ?></td>
                                            <td class="mailbox-name"><?php echo $generatedpaper->teacher_name ?></td>
                                            <td class="mailbox-name"><?php echo $generatedpaper->exam_group?></td>
                                            
                                            <td  class="mailbox-date pull-right">
                                                <?php if ($this->rbac->hasPrivilege('generate_paper', 'can_view')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/generatepaper/view/<?php echo $generatedpaper->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('view'); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php } ?>
                                                 <?php if ($this->rbac->hasPrivilege('generate_paper', 'can_edit')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/generatepaper/edit/<?php echo  $generatedpaper->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php if ($this->rbac->hasPrivilege('generate_paper', 'can_delete')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/generatepaper/delete/<?php echo  $generatedpaper->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        // $count++
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

      function getsection(){
        	 var class_id = $('#class_id option:selected').val();
        $.ajax({
            type: "POST",
            url: baseurl + 'admin/generatepaper/getsection',
            data: {class_id: class_id},
            dataType: "JSON", // serializes the form's elements.
            beforeSend: function () {
              //  $('.loading-overlay').css("display", "block");
            },
            success: function (data)
            {
             var   html =''
                for(var i=0; i <data.section.length; i++){
                      html+='<option value="'+data.section[i].id+'">'+data.section[i].section+'</option>';  
                }
                $('#section_id').html(html);
                $('#teacher_id').html('<option value="'+data.teacher.id+'">'+data.teacher.name+'</option>'); 
            }
            // error: function (xhr) { 

            //     alert("Error occured.please try again");
            //     $('.loading-overlay').css("display", "none");
            // },
            // complete: function () {
            //     $('.loading-overlay').css("display", "none");
            // }
        });
        	
   	 }

    
</script>