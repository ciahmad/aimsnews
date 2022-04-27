
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
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('subjective')." ".$this->lang->line('question'); ?></h3>
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
                                    <th><?php echo $this->lang->line('s.no') ?></th>
                                        <th><?php echo $this->lang->line('subject') ?></th>
                                        <th><?php echo $this->lang->line('question') ?></th> 
                                          <th><?php echo $this->lang->line('marks') ?></th>
                                          <th><?php echo $this->lang->line('image') ?></th>                                                                               
                                        <th class="pull-right no-print"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $number = 0;
                                    foreach ($subjective_questionList as $subject_key => $subject_value) {
                                        $number = $number+1;
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $number ?></td>
                                            <td class="mailbox-name"> <?php echo $subject_value->name; ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->question_value); ?></td>
                                            <td class="mailbox-name"> <?php echo readmorelink($subject_value->question_marks); ?></td>
                                            <td class="mailbox-name"><img src="" alt="No Image"> </td>                        
                                           
                                            <td class="pull-right">
                                                <?php if ($this->rbac->hasPrivilege('question_bank', 'can_view')) { ?>
                                                    <button type="button" data-placement="left" class="btn btn-default btn-xs question-btn-view akh " data-toggle="modal" data-target="#myModal2" data-viewid="<?php echo $subject_value->id; ?>" title="<?php echo $this->lang->line('view'); ?>" ><i class="fa fa-eye"></i></button>
                                                <?php } if ($this->rbac->hasPrivilege('question_bank', 'can_edit')) { ?>
                                                    <button type="button" data-placement="left" class="btn btn-default btn-xs question-btn-edit" data-toggle="tooltip" id="load" data-recordid="<?php echo $subject_value->id; ?>" title="<?php echo $this->lang->line('edit'); ?>" ><i class="fa fa-pencil"></i></button>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('question_bank', 'can_delete')) {
                                                    ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>admin/subjectivequestion/delete/<?php echo $subject_value->id; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
            <h4 class="text-center bg-secondary">Subjective Question View Model</h4>
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
                         <th></h6>Marks</h6></th><td id="marks"></td>
                    </tr>
                    <tr>
                        <td id="question"></td>
                        
                    </tr>
                </table>
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
                <h4 class="modal-title"><?php echo $this->lang->line('subjective')." ".$this->lang->line('question');  ?></h4>
            </div>
            <form action="<?php echo site_url('admin/subjectivequestion/add'); ?>" method="POST" id="formsubject">
                <div class="modal-body">
                    <input type="hidden" name="recordid" value="0">

                     <div class="row container">

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="subject_id"><?php echo $this->lang->line('subject') ?></label><small class="req"> *</small>

                            <select class="form-control" name="subject_id" id="subject_id">
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
                            <label for="Select_paper">Select Paper</label><small class="req"> *</small>

                            <select class="form-control" name="select_paper" id="select_paper">
                                <option value="">Select Paper</option>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>                                
                            </select>
                            <span class="text text-danger select_paper_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="select_class">Select Class </label><small class="req"> *</small>

                            <select class="form-control" name="class_id" id="class_id" onchange="selectClass();">                            
                                <option value="">Select Class</option>
                                <?php
                               foreach ($classesList as $kclassesList) { ?>                  
                                <option value="<?php echo $kclassesList->id; ?>"><?php echo $kclassesList->class; ?></option>
                            <?php }  ?>
                                                         
                            </select>
                            <span class="text text-danger class_id_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2" >
                            <div class="form-group">
                            <label for="section_id">Class Section</label><small class="req"> *</small>                                                    
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="">Select Class Section</option>
                            </select>
                            <span class="text text-danger section_id_error"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="subject_teacher">Teacher</label><small class="req"> *</small>
                            <select class="form-control" name="teacher_id" id="teacher_id">
                                <option value="">Select Teacher</option>
                            </select>
                            <span class="text text-danger subject_teacher_error"></span>
                            </div>
                        </div>                        
                    </div> 
                    <?php $row = 1; ?>
                    <div class="form-group" id="table_field">
                        <div id="subjective_question_0">
                        <div class="col-sm-7">
                            <label for="question">Question</label>
                            <textarea id="add_question" name="add_question[]"  class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-sm-2">
                            <label for="question">add Marks</label>
                            <input type="text" name="question_marks[]" id="question_marks" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <label for="img">Select image:</label>
                              <input class="filestyle form-control" type="file" id="img" name="img[]" accept="image/*">
                        </div>
                        <?php 

                         ?>
                         <div class="col-sm-1" style="margin-top: 20px;" id="update_id_button">                        
                             <button type="button" class="btn btn-warning btn-sm pull-right"  id="add" onclick="addMore();">Add</button>
                        </div>
                    </div>

                    </div>
                   
               
                <div class="modal-footer" style="margin-top: 107px;">
                    <button type="submit" class="btn btn-primary" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."><?php echo $this->lang->line('save') ?></button>
                </div>
        </div>
        </form>
    </div>
</div>

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


        $(document).ready(function(){
            $(".question-btn-view").click(function(){
                var $this = $(this);
                var recordid = $this.data('viewid');
             //   alert(recordid); 
                
                $.ajax({
                type: 'POST',
                url: baseurl + "admin/subjectivequestion/getQuestionByID",
                data: {'recordid': recordid},
                dataType: 'JSON',
                // beforeSend: function () {
                //     $this.button('loading');
                // },
                success: function (data) {            
                    if (data) {                                                                     
                        document.getElementById("question").innerHTML = data.question_result.question_value;
                        document.getElementById("subject_id").innerHTML = data.question_result.subject_name;
                        document.getElementById("paper").innerHTML = data.question_result.paper;
                         document.getElementById("class").innerHTML = data.question_result.class_name;
                         document.getElementById("section").innerHTML = data.question_result.section_name;
                       document.getElementById("teacher").innerHTML = data.question_result.teacher_name;
                         document.getElementById("marks").innerHTML = data.question_result.question_marks;
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
   
    $(document).ready(function(){


        $(document).on('click', '.question-btn-edit', function () {

            var $this = $(this);
            var recordid = $this.data('recordid');

            $('input[name=recordid]').val(recordid);
            $.ajax({
                type: 'POST',
                url: baseurl + "admin/subjectivequestion/getQuestionByID",
                data: {'recordid': recordid},
                dataType: 'JSON',
                beforeSend: function () {
                    $this.button('loading');
                },
                success: function (data) {
                console.log(data);
                   
                    if (data.status) {    
                    alert(data.result.section_id);                       
                        $('textarea[id=add_question]').val(data.result.question_value);
                        $('input[id=question_marks]').val(data.result.question_marks);
                        $('select[name=Select_paper]').val(data.result.Select_paper);
                        $('select[name=subject_id]').val(data.result.subject_id);
                        $('select[name=class_id]').val(data.result.class_id);
                        $('select[name=select_paper]').val(data.result.select_paper);
                        $('select[name=section_id]').val(data.result.section_id);
                        $('select[name=teacher_id]').val(data.result.teacher_id);  
                        $("#update_id_button").css("display", "none");                     
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
        // view model javascript
    
    
    $("form#formsubject").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        $("span[id$='_error']").html("");
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
            //    $("[class$='_error']").html("");
            //    submit_button.button('loading');
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
            // CKEDITOR.instances[instance].updateElement();
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

var count = 0;
function addMore(){

     count += 1;

   // alert(count); 

    html = '<div id="subjective_question_'+count+'"><div class="col-sm-7" id=""><label for="question">add Question</label><textarea id="add_question" name="add_question[]" class="form-control" rows="2"></textarea></div><div class="col-sm-2"><label for="question">add Marks</label><input type="text" name="question_marks[]" class="form-control"></div><div class="col-sm-2"><label for="question">Select image</label><input class="filestyle form-control" type="file" name="image[]"></div><div class="col-sm-1" style="margin-top: 20px;"><label for="question"></label><button type="button"  onClick="remove('+count+')"class="btn btn-danger btn-sm pull-right"  id="remove">Remove</button></div>';
       
            $('#table_field').append(html);          
         }
 
 function remove(r){
    $('#subjective_question_'+r).remove();
 }

 // select class javascript function 

 function selectClass(){
      //var strUser = class_id.value;
    //  alert(strUser);
     var class_id = $("#class_id option:selected").val();

     $.ajax({
            type: "POST",
            url: baseurl + 'admin/Subjectivequestion/getsection',
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


