<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?> <small><?php echo $this->lang->line('student1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info" style="padding:5px;">
                    <div class="box-header with-border">
                       
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php //echo $this->lang->line('select_criteria'); ?></h3>
                        <div class="pull-right box-tools">                            
                            <a href="<?php echo site_url('admin/question/exportformat') ?>">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> <?php echo $this->lang->line('dl_sample_import'); ?></button>
                            </a>
                        </div>
                    </div>

                    <div class="box-body">      
                        <?php if ($this->session->flashdata('msg')) { ?> <div>  <?php echo $this->session->flashdata('msg') ?> </div> <?php } ?>
                        <br/>           
                        1. Your CSV data should be in the format below. The first line of your CSV file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.<br/>

                        <hr/></div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sampledata">
                            <thead>
                                <tr>
                                    <?php
                                    foreach ($fields as $key => $value) {

        
                                        if ($value == 'question') {
                                            $value = "question";
                                        }
                                        if ($value == 'opt_a') {
                                            $value = "opt_a";
                                        }
                                          if ($value == 'opt_b') {
                                            $value = "opt_b";
                                        }
                                        
                                        
                                       
                                        $add = "";
                                        if (($value == "question") || ($value == "opt_a") || ($value == "opt_b") || ($value == "opt_c") || ($value == "opt_d") || ($value == "correct") || ($value == "paper")|| ($value == "question_marks")) {
                                            $add = "<span class=text-red>*</span>";
                                        }
                                        ?>    
                                        <th><?php echo $add . "<span>" . $value. "</span>"; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($fields as $key => $value) {
                                        ?>    
                                        <td><?php echo "Sample Data" ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>

                        </table>        
                    </div>
                    <hr/>

                    <form action="<?php echo site_url('admin/question/importfile') ?>"   method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <?php //echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Subject</label><small class="req"> *</small> 
                                        <select autofocus="" name="subject_id" class="form-control" >
                                            <option value="">Select</option>
                                            <?php
                                            //echo $classesList; die();
                                           
                                            foreach ($subjectlist as $subject) {
                                                ?>
                                                <option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></option>
                                                <?php
                                              //  $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('subject_id'); ?></span>
                                    </div></div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small> <?php //print_r($cls); die(); ?>
                                        <select autofocus="" onchange="selectClass()" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                           // print_r($classesList); die();
                                            foreach ($cls as $class) {
                                                ?>
                                                <option value="<?php echo $class->id ?>"><?php echo $class->class; ?></option>
                                                <?php
                                                //$count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teacher</label><small class="req"> *</small>
                                        <select  id="teacher_id" name="teacher_id" class="form-control" >
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?php echo $this->lang->line('select_csv_file'); ?></label><small class="req"> *</small>
                                        <div><input class="filestyle form-control" type='file' name='file' id="file" size='120' />
                                            <span class="text-danger"><?php echo form_error('file'); ?></span></div>
                                    </div></div>
                                <div class="col-md-6 pt20">
                                    <button type="submit"  name="submit" class="btn btn-info pull-right">Import Objective Question</button>
                                </div>     

                            </div>
                        </div>
                    </form>

                    <div>

                    </div>
                </div>
                </section>
            </div>

            <script type="text/javascript">
              
                $(document).ready(function () {
                    $("#sampledata").DataTable({
                        searching: false,
                        ordering: false,
                        paging: false,
                        bSort: false,
                        info: false, });

                    // var class_id = $('#class_id').val();
                    // var section_id = '<?php echo set_value('section_id') ?>';
                    // getSectionByClass(class_id, section_id);
                    // $(document).on('change', '#class_id', function (e) {
                    //     $('#section_id').html("");
                    //     var class_id = $(this).val();
                    //     var base_url = '<?php echo base_url() ?>';
                    //     var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                    //     $.ajax({
                    //         type: "GET",
                    //         url: base_url + "sections/getByClass",
                    //         data: {'class_id': class_id},
                    //         dataType: "json",
                    //         success: function (data) {
                    //             $.each(data, function (i, obj)
                    //             {
                    //                 div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    //             });
                    //             $('#section_id').append(div_data);
                    //         }
                    //     });
                    // });
                });

                function selectClass(){
         var class_id = $("#class_id option:selected").val();
       //  alert(class_id);
          $.ajax({
            type: "POST",
            url: baseurl + 'admin/question/getsection',
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
            },
            error: function (xhr) { 

                alert("Error occured.please try again");
                $('.loading-overlay').css("display", "none");
            },
            complete: function () {
                $('.loading-overlay').css("display", "none");
            }
        });
        
    }
            </script>