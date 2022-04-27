<style type="text/css">
    .loading-overlay {
        display: none;
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        background: rgba(255,255,255,0.7);
    }
    .overlay-content {
        position: absolute;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        top: 50%;
        left: 0;
        right: 0;
        text-align: center;
        color: #555;
    }

    
    .div_load{position: relative;}

</style>
<script src="<?php echo base_url(); ?>backend/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>backend/js/ckeditor_config.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-bus"></i> <?php echo $this->lang->line('question'); ?></h1>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary" id="route">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('objective') . " " . $this->lang->line('question'); ?></h3>
                        <?php
                        if ($this->rbac->hasPrivilege('question_bank', 'can_add')) {
                            ?>
                            <button class="btn btn-primary btn-sm pull-right question-btn" data-recordid="0"><i class="fa fa-plus"></i>
                             <?php echo $this->lang->line('add') . " ". $this->lang->line('question'); ?></button>
                        
                            <?php
                        }
                        ?>

                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="mailbox-messages table-responsive">
                            <div class="download_label"><?php echo $this->lang->line('question') . " " . $this->lang->line('bank'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('subject') ?></th>
                                        <th>Paper</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                         <th><?php echo $this->lang->line('question') ?></th>  
                                         <th>Marks</th>
                                        <th><?php echo $this->lang->line('answer') ?></th>

                                        <th class="pull-right no-print"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                  //  print_r($tableLists); die();
                                    foreach ($tableLists as $subject_key => $subject_value) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $subject_value->subject_name; ?></td>
                                           
                                            <!--  -->
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->paper); ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->class_name); ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->section_name); ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->teacher_name); ?></td>
                                             <td class="mailbox-name"> <?php echo readmorelink($subject_value->question); ?></td>
                                             <td class="mailbox-name"> <?php echo readmorelink($subject_value->question_marks); ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->correct); ?></td>

                                            <td class="pull-right">
                                                <?php if ($this->rbac->hasPrivilege('question_bank', 'can_view')) { ?>
                                                    <button type="button" data-placement="left" class="btn btn-default btn-xs question-btn-view akh " data-toggle="modal" data-target="#myModal2" data-viewid="<?php echo $subject_value->id; ?>" title="<?php echo $this->lang->line('view'); ?>" ><i class="fa fa-eye"></i></button>
                                                <?php } if ($this->rbac->hasPrivilege('question_bank', 'can_edit')) { ?>
                                                    <button type="button" data-placement="left" class="btn btn-default btn-xs question-btn-edit" data-toggle="tooltip" id="load" data-recordid="<?php echo $subject_value->id; ?>" title="<?php echo $this->lang->line('edit'); ?>" ><i class="fa fa-pencil"></i></button>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('question_bank', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/question/delete/<?php echo $subject_value->id; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
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


<?php

function findOption($questionOpt, $find) {

    foreach ($questionOpt as $quet_opt_key => $quet_opt_value) {
        if ($quet_opt_key == $find) {
            return $quet_opt_value;
        }
    }
    return false;
}
?>
<div class="modal" id="myModal23" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header card-header bg-secondary">
            <h4 class="text-center bg-secondary">Objective Question View Model</h4>
         <!--  <h4 class="modal-title" id="data"></h4> -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          

            <div class="row container-fluid">
               
                <table class="table">
                    <tr>
                        <th>Subject</th>
                        <th>Paper</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Teacher</th>
                    </tr>
                    <tr>
                    <td id="subject_id"></td>
                    <td id="paper"></td>
                    <td id="class"></td>
                    <td id="section"></td>
                    <td id="teacher"></td>
                    </tr>
                    <tr>
                        <th><h3>Question</h3></th>
                    </tr>
                    <tr>
                        <td id="question"></td>
                    </tr>
                </table>

                 <h5 class="text-center text-info">Question Option</h5>
            <div class="col col-md-2 col-sm-2">
                <label for=""> <strong>a).</strong>  </label>
                <span id="a"> </span>
               
                </div>
                <div class="col col-md-2 col-sm-2">
                <label for=""> <strong>b).</strong>  </label>
                 <span id="b"></span>
                
                </div>
                <div class="col col-md-2 col-sm-2">
                <label for=""> <strong>c.)</strong>  </label>
                
                <span id="c"></span>
                </div>
                <div class="col col-md-2 col-sm-2">
                <label for=""> <strong>d).</strong>  </label>               
                <span id="d"></snpan>
                </div>
               
                <div class="col col-md-2 col-sm-2" >
                <label for=""> <b class="text-success">Correct Answer</b></label><hr>                    
                        <h4><span id="answer"></span></h4>
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('question')." ". $this->lang->line('bank') ." ".$this->lang->line('objectives');  ?></h4>
            </div>
            <form action="<?php echo site_url('admin/question/add'); ?>" method="POST" id="formsubject">
                <div class="modal-body">
                    <input type="hidden" name="recordid" value="0">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label  for="subject_id"><?php echo $this->lang->line('subject') ?></label><small class="req"> *</small>

                            <select class="form-control" name="subject_id" >
                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                <?php
                                foreach ($subjectlist as $subject_key => $subject_value) {
                                    ?>
                                    <option value="<?php echo $subject_value['id']; ?>"><?php echo $subject_value['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="text text-danger subject_id_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="paper">Select Paper</label><small class="req"> *</small>

                            <select class="form-control" name="paper">
                                <option value="">Select Paper</option>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>                                
                            </select>
                            <span class="text text-danger paper_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="class_id" id="class_id_one">Select Class </label><small class="req"> *</small>

                            <select class="form-control" name="class_id" id="class_id" onchange="selectClass()">                            
                                <option value="">Select Class</option>
                                <?php
                               foreach ($classesList as $kclassesList) { ?>                  
                                <option value="<?php echo $kclassesList->id; ?>"><?php echo $kclassesList->class; ?></option>
                            <?php }  ?>
                                                         
                            </select>
                            <span class="text text-danger class_id_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="section_id">Class Section</label><small class="req"> *</small>                                                    
                            <select class="form-control" name="section_id"  id="section_id">

                            </select>
                           <!--  <input type="text" name="section_id" id="section_id"> -->
                            <span class="text text-danger section_id_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="subject_teacher">Subject Teacher</label><small class="req"> *</small>
                            <select class="form-control" name="teacher_id" id="teacher_id">
                                <option value="">Select Subject Teacher</option>
                                                                                
                            </select>
                            <span class="text text-danger teacher_id_error"></span>
                            </div>
                        </div>                        
                    </div><hr>
<?php $row = 1; ?>
                            <div class="row" id="add_more">
                                <div id="remove_div_<?php echo $row; ?>">
                                    
                                
                            <div class="col-md-8">
                                <label for="">Question</label>
                                <input type="text" name="question[]" id="question_<?php echo $row; ?>" class="form-control">
                            </div>

                            <div class="col-md-2">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">Number Of Options</label><small class="req"> *</small>

                                    <select onClick="numberOfQ(<?php echo $row; ?>)" class="form-control" name="number_of_option_[]" id="number_of_option_<?php echo $row; ?>">
                                        <option value="">Select Number</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                            </div>
                             
                                <div class="col-md-1">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">Marks</label><small class="req"> *</small>

                                  <input type="text" name="marks[]" id="marks_<?php echo $row; ?>" class="form-control">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>"></label><small class="req"> *</small>

                                  <input onClick="addMore(<?php echo $row; ?>)" type="button" name="" value="Add More.." class="btn btn-success" id="add"  style="margin-top: 3px;">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>

                                 <div class="col-md-2">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">(A)</label><small class="req"> *</small>

                                  <input type="text" name="opt_a[]" id="opt_a_<?php echo $row; ?>" class="form-control">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">(B)</label><small class="req"> *</small>

                                  <input type="test" name="opt_b[]" id="opt_b_<?php echo $row; ?>" class="form-control">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">(C)</label><small class="req"> *</small>

                                  <input type="test" name="opt_c[]" id="opt_c_<?php echo $row; ?>" class="form-control">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                    <label for="<?php echo $this->lang->line('select'); ?>">(D)</label><small class="req"> *</small>

                                  <input type="test" name="opt_d[]" id="opt_d_<?php echo $row; ?>" class="form-control">
                                    <span class="text text-danger number_of_question_error"></span>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                     <div class="form-group">
                                    <label for="answer"><?php echo $this->lang->line('answer') ?></label><small class="req"> *</small>

                                    <select class="form-control" name="answer[]" id="answer_id_<?php echo $row; ?>">                            
                                        <option  value="">Select Answer</option>
                                        <option id="a_<?php echo $row ?>"  value="A">A</option>
                                        <option id="b_<?php echo $row ?>"  value="B" >B</option>
                                        <option id="c_<?php echo $row ?>"  value="C" >C</option>
                                        <option id="d_<?php echo $row ?>" value="D">D</option>
                                    </select>
                                    <span class="text text-danger correct_error"></span>
                                </div>
                            </div>

                            <div class="col-md-1">
                                     <div class="form-group">
                                    <label for="">Upload file</label><small class="req"> *</small>
                                     <input type="file" class="filestyle" id="img_<?php echo $row; ?>" name="img[]" accept="image/*" style="background-color:red !important">
                                    <span class="text text-danger correct_error"></span>
                                </div>
                            </div>

                            <div class="col-md-1">
                                     <div class="form-group">
                                    <label for=""></label>
                                     <input type="button" class="btn btn-danger" id="remove_<?php echo $row;?>" name="remove" value="Remove" style="    margin-top: 19px;">
                                    <span class="text text-danger correct_error"></span>
                                </div>
                            </div><hr> <hr>  </div>   
                             <!--end inner div  -->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." style="background-color:blue; border: none"><?php echo $this->lang->line('save') ?></button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- Modal -->
<!-- view mode -->
<!--End view mode -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        })

        $('#myModal').on('hidden.bs.modal', function () {

            CKupdate();
            $(this)
                    .find("input,textarea,select")
                    .val('')
                    .end()
                    .find("input[type=checkbox], input[type=radio]")
                    .prop("checked", "")
                    .end();
        });
        $(document).on('click', '.question-btn', function () {
            var recordid = $(this).data('recordid');
            $('input[name=recordid]').val(recordid);
            $('#myModal').modal('show');

        });

        // select number of question function

        $("#number_of_question,#answer_id").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == 1){
              document.getElementById('opt_1').style.display ='block';
              document.getElementById('opt_2').style.display ='none';
              document.getElementById('opt_3').style.display ='none';
              document.getElementById('opt_4').style.display ='none';

              document.getElementById('a_1').style.display ='block';
              document.getElementById('a_2').style.display ='none';
              document.getElementById('a_3').style.display ='none';
              document.getElementById('a_4').style.display ='none';
            }
            if (optionValue == 2) {
                document.getElementById('opt_1').style.display ='block';
                document.getElementById('opt_2').style.display ='block';
                document.getElementById('opt_3').style.display ='none';
                document.getElementById('opt_4').style.display ='none';

                document.getElementById('a_1').style.display ='block';
                document.getElementById('a_2').style.display ='block';
                document.getElementById('a_3').style.display ='none';
                document.getElementById('a_4').style.display ='none';
            }

            if (optionValue == 3) {
                document.getElementById('opt_1').style.display ='block';
                document.getElementById('opt_2').style.display ='block';
                document.getElementById('opt_3').style.display ='block';
                document.getElementById('opt_4').style.display ='none';

                document.getElementById('a_1').style.display ='block';
                document.getElementById('a_2').style.display ='block';
                document.getElementById('a_3').style.display ='block';
                document.getElementById('a_4').style.display ='none';
            }

            if (optionValue == 4) {
                document.getElementById('opt_1').style.display ='block';
                document.getElementById('opt_2').style.display ='block';
                document.getElementById('opt_3').style.display ='block';
                document.getElementById('opt_4').style.display ='block';

                document.getElementById('a_1').style.display ='block';
                document.getElementById('a_2').style.display ='block';
                document.getElementById('a_3').style.display ='block';
                document.getElementById('a_4').style.display ='block';
            }
          
        });
        
      
    });
        $(document).ready(function(){
            $(".question-btn-view").click(function(){
                var $this = $(this);
                var recordid = $this.data('viewid');
                
                $.ajax({
                type: 'POST',
                url: baseurl + "admin/question/getQuestionByID",
                data: {'recordid': recordid},
                dataType: 'JSON',
                // beforeSend: function () {
                //     $this.button('loading');
                // },
                success: function (data) {            
                    if (data) {
                    //console.log(data.question_result.subject_name); return false;                                                                     
                       document.getElementById("question").innerHTML = data.result.question;
                       document.getElementById("subject_id").innerHTML = data.question_result.subject_name;
                       document.getElementById("paper").innerHTML = data.result.paper;
                       document.getElementById("class").innerHTML = data.question_result.class_name;
                       document.getElementById("section").innerHTML = data.question_result.section_name;
                       document.getElementById("teacher").innerHTML = data.question_result.teacher_name;
                       document.getElementById("a").innerHTML = data.result.opt_a;
                        document.getElementById("b").innerHTML = data.result.opt_b;
                        document.getElementById("c").innerHTML = data.result.opt_c;
                        document.getElementById("d").innerHTML = data.result.opt_d;
                        
                        document.getElementById("answer").innerHTML = data.result.correct;
                        $('#myModal23').modal('show');
                    }
                    $this.button('reset');
                },
                error: function (xhr) { // if error occured
                    alert("Error occured.please try again");
                    $this.button('reset');
                },
                complete: function () {
                    $this.button('reset');
                }
            });


            });
    });
   
    // end
    $(document).ready(function(){


        $(document).on('click', '.question-btn-edit', function () {


                // document.getElementById('opt_2').style.display ='block';
                // document.getElementById('opt_3').style.display ='block';
                // document.getElementById('opt_4').style.display ='block';
                // document.getElementById('opt_5').style.display ='block';


                
            var $this = $(this);
            var recordid = $this.data('recordid');
              alert(recordid); return false;
            $('input[name=recordid]').val(recordid);
            $.ajax({
                type: 'POST',
                url: baseurl + "admin/question/getQuestionByID",
                data: {'recordid': recordid},
                dataType: 'JSON',
                // beforeSend: function () {
                //     $this.button('loading');
                // },
                success: function (data) {

                    if (data.status) {

                         document.getElementById('add').style.display ='none';
                         document.getElementById('remove_1').style.display ='none';
                     //   console.log(data.status); return false;
                       // alert(data.question_result.section_id);

                        console.log(data.question_result.section_name);
                       // console.log(data.result.section);
                         $('input[id=question_1').val(data.result.question);
                         $('input[id=class_id_one').val(data.result.class_id);
                         $('input[id=marks_1]').val(data.result.question_marks);
                         $('select[name=subject_id]').val(data.result.subject_id);
                         $('select[name=paper]').val(data.result.paper);
                         $('select[id=class_id]').val(data.result.class_id);
                         //$('input[id=section_id]').val(data.question_result.section_name);
                          document.getElementById("section_id").innerHTML = data.question_result.section_name;
                         $('select[id=teacher_id]').val(data.question_result.teacher_name);
                         $('select[id=answer_id_1]').val(data.result.correct);
                         $('input[id=opt_a_1]').val(data.result.opt_a);
                         $('input[id=opt_b_1]').val(data.result.opt_b);
                         $('input[id=opt_c_1]').val(data.result.opt_c);
                        // $('#class_id_one').val(data.result.class_id);
                         $('input[id=opt_d_1]').val(data.result.opt_d);
                        $('#myModal').modal('show');
                    }
                    $this.button('reset');
                },
                error: function (xhr) { // if error occured
                    alert("Error occured.please try again");
                    $this.button('reset');
                },
                complete: function () {
                    $this.button('reset');
                }
            });

        });

    });

        
    });
       
    $("form#formsubject").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        // $("span[id$='_error']").html("");
        var form = $(this);
        var url = form.attr('action');
        var submit_button = form.find(':submit');
        var post_params = form.serialize();
        var subject_id = $("#subject_id").val();

       

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            dataType: "JSON", // serializes the form's elements.
            // beforeSend: function () {
            //    // $("[class$='_error']").html("");
            //    // submit_button.button('loading');
            // },
            success: function (data)
            {
                if (!data.status) {
                    $.each(data.error, function (index, value) {
                        var errorDiv = '.' + index + '_error';
                        $(errorDiv).html(value);
                    });
                } else {
                    location.reload();
                }
            },
            error: function (xhr) { // if error occured
                submit_button.button('reset');
                alert("Error occured.please try again");

            },
            complete: function () {
                submit_button.button('reset');
            }
        });


    });

</script>


<script>
 

    $(".ckeditor").each(function (_, ckeditor) {

        CKEDITOR.replace(ckeditor, {
            toolbar: 'Ques',
            customConfig: baseurl + '/backend/js/ckeditor_config.js'
        });
    });


    $(document).ready(function () {
        var target_textbox = "";
        $(document).on('click', '#question,#opt_a,#opt_b,#opt_c,#opt_d,#opt_e', function () {
            getImages(1);
        });
    });

    function getImages(page, query = "") {
        $.ajax({
            type: "POST",
            url: baseurl + 'admin/question/getimages',
            data: {page: page, query: query},
            dataType: "JSON", // serializes the form's elements.
            beforeSend: function () {
                $('.loading-overlay').css("display", "block");
            },
            success: function (data)
            {

                $('label.total').html("").html("<?php echo $this->lang->line('total_record'); ?>: " + data.count).css("display", "block");

                $('.imgModal-body #media_div').html("").html(data.page);
                $('.imgModal-body #pagination').html("").html(data.pagination);
                $('.loading-overlay').css("display", "none");
            },
            error: function (xhr) { // if error occured

                alert("Error occured.please try again");
                $('.loading-overlay').css("display", "none");
            },
            complete: function () {
                $('.loading-overlay').css("display", "none");
            }
        });
    }


    $(document).on('click', '.img_div_modal', function (event) {
        $('.img_div_modal div.fadeoverlay').removeClass('active');
        $(this).closest('.img_div_modal').find('.fadeoverlay').addClass('active');

    });

    $(document).on('click', '.add_media', function (event) {

        var content_html = $('div#media_div').find('.fadeoverlay.active').find('img').data('img');
        var is_image = $('div#media_div').find('.fadeoverlay.active').find('img').data('is_image');
        var content_name = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_name');
        var content_type = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_type');
        var vid_url = $('div#media_div').find('.fadeoverlay.active').find('img').data('vid_url');
        var content = "";


        if (typeof content_html !== "undefined") {
            if (is_image === 1) {
                content = '<img src="' + content_html + '">';
            }
            InsertHTML(content);
            $('#myimgModal').modal('hide');
        }

    });

    function InsertHTML(content_html) {
        var aaa = target_textbox + "_textbox";
        // Get the editor instance that we want to interact with.
        var editor = CKEDITOR.instances[aaa];
        console.log(editor);


        // Check the active editing mode.
        if (editor.mode == 'wysiwyg')
        {
            editor.insertHtml(content_html);
        } else
            alert('You must be in WYSIWYG mode!');
    }
    $('#myimgModal').on('shown.bs.modal', function (event) {
        button = $(event.relatedTarget);
        target_textbox = button.data('location');
        console.log(target_textbox);
    })

    $('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box

        if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
            $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
        }
    });

    function CKupdate() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    }

    $(document).on('keyup', '#search_box', function (event) {
        var query = $('#search_box').val();
        getImages(1, query);

    });

    $(document).on('click', '.page-link', function () {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        getImages(page, query);
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

     function addMore(row){
         var r = row + 1;

       html='<div id="remove_div_'+r+'"><div class="col-md-8"><label for="">Question</label><input type="text" name="question[]" id="question_'+r+'" class="form-control"></div><div class="col-md-2"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">Number Of Options</label><small class="req"> *</small><select onClick="numberOfQ('+r+')" class="form-control" name="number_of_option_[]" id="number_of_option_'+r+'"><option value="">Select Number</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-1"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">Marks</label><small class="req"> *</small><input type="text" name="marks[]" id="marks_'+r+'" class="form-control"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-1"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>"></label><small class="req"> *</small><input onClick="addMore('+r+')" type="button" name="" value="Add More.." class="btn btn-success" id="add" style="margin-top: 3px;"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-2"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">(A)</label><small class="req"> *</small><input type="test" name="opt_a[]" id="opt_a_'+r+'" class="form-control"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-2"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">(B)</label><small class="req"> *</small><input type="test" name="opt_b[]" id="opt_b_'+r+'" class="form-control"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-2"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">(C)</label><small class="req"> *</small><input type="test" name="opt_c[]" id="opt_c_'+r+'" class="form-control"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-2"><div class="form-group"><label for="<?php echo $this->lang->line('select'); ?>">(D)</label><small class="req"> *</small><input type="test" name="opt_d[]" id="opt_d_'+r+'" class="form-control"><span class="text text-danger number_of_question_error"></span></div></div><div class="col-md-2"><div class="form-group"><label for="subject_id"><?php echo $this->lang->line('answer') ?></label><small class="req"> *</small><select class="form-control" name="answer[]" id="answer_id_'+r+'"><option  value="">Select Answer</option><option id="a_'+r+'"  value="A">A</option><option id="b_'+r+'"  value="B" >B</option><option id="c_'+r+'"  value="C" >C</option><option id="d_'+r+'" value="D">D</option></select><span class="text text-danger correct_error"></span></div></div><div class="col-md-1"><div class="form-group"><label for="">Upload file</label><small class="req"> *</small><input type="file" class="filestyle" id="img_'+r+'" name="img[]" accept="image/*" style="background-color:red !important"><span class="text text-danger correct_error"></span></div></div><div class="col-md-1"><div class="form-group"><label for=""></label><input onclick="remove('+r+')" type="button" class="btn btn-danger" id="remove_'+r+'" name="remove" value="Remove" style="margin-top: 19px;"><span class="text text-danger correct_error"></span></div> </div></div>';
       $('#add_more').append(html);
       r++;

       $('#add').css('display','none');
        $('#remove_1').css('display','none');
    }


    function remove(r){
        $('#remove_div_'+r).remove();
    }

    function numberOfQ(row){
        $(document).ready(function(){
        $("#number_of_option_"+row).change(function() {

             var selectedVal = $("#number_of_option_"+row+" option:selected").val();
            
             if(selectedVal == 1){
                 document.getElementById('opt_a_'+row).style.display ='block';
                 document.getElementById('opt_b_'+row).style.display ='none';
                 document.getElementById('opt_c_'+row).style.display ='none';
                 document.getElementById('opt_d_'+row).style.display ='none';

                 document.getElementById('a_'+row).style.display ='block';
                 document.getElementById('b_'+row).style.display ='none';
                 document.getElementById('c_'+row).style.display ='none';
                 document.getElementById('d_'+row).style.display ='none';
             }

               if(selectedVal == 2){
                 document.getElementById('opt_a_'+row).style.display ='block';
                 document.getElementById('opt_b_'+row).style.display ='block';
                 document.getElementById('opt_c_'+row).style.display ='none';
                 document.getElementById('opt_d_'+row).style.display ='none';


                  document.getElementById('a_'+row).style.display ='block';
                 document.getElementById('b_'+row).style.display ='block';
                 document.getElementById('c_'+row).style.display ='none';
                 document.getElementById('d_'+row).style.display ='none';
             }

              if(selectedVal == 3){
                 document.getElementById('opt_a_'+row).style.display ='block';
                 document.getElementById('opt_b_'+row).style.display ='block';
                 document.getElementById('opt_c_'+row).style.display ='block';
                 document.getElementById('opt_d_'+row).style.display ='none';


                  document.getElementById('a_'+row).style.display ='block';
                 document.getElementById('b_'+row).style.display ='block';
                 document.getElementById('c_'+row).style.display ='block';
                 document.getElementById('d_'+row).style.display ='none';
             }

              if(selectedVal == 4){
                 document.getElementById('opt_a_'+row).style.display ='block';
                 document.getElementById('opt_b_'+row).style.display ='block';
                 document.getElementById('opt_c_'+row).style.display ='block';
                 document.getElementById('opt_d_'+row).style.display ='block';


                  document.getElementById('a_'+row).style.display ='block';
                 document.getElementById('b_'+row).style.display ='block';
                 document.getElementById('c_'+row).style.display ='block';
                 document.getElementById('d_'+row).style.display ='block';
             }
        });
    });

    }



</script>


