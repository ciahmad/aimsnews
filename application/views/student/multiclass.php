<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style>
    @media print {   
    table th:last-child {display:block}
}
</style>
<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <?php 
                $this->load->view('student/_student_sidebar');
            ?>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border aimsreportsbg">
                        <h3 class="box-title"><i class="fa fa-search"></i> Multi Class Student</h3>
                    </div>
                    <form action="<?php echo site_url('student/multiclass') ?>"  method="post" accept-charset="utf-8">
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
                                    <?php echo $this->lang->line('bulk') . " " . $this->lang->line('delete') ?>
                                </div>
                                </div>
                            </div>
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                        <?php
                                        // print_r($classlist); die('classlist');
                                        ?>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php                                           
                                            foreach ($classlist as $class) {?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                if (set_value('class_id') == $class['id']) {
                                                    echo "selected=selected";
                                                }
                                                ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <button type="submit" class="btn btn-primary btn-sm pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>

                    </form>
                
 

                <?php 
              
                if (isset($students)) {?>

                    <div class="ptt10">
                      <div class="bordertop">  
                        <div class="box-header with-border tthemecolor">
                            <h3 class="box-title"><i class="fa fa-search"></i> Multi Class Student</h3>
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
															<p style="margin-top:0px; font-size:14px;   padding-top:0px; margin-bottom:0px; padding-bottom:0px">
																<?php echo $stting[0]['address']?>
															</p>
															<p style="margin-top:0px; padding-top:0px; font-size:14px;">Contact #
																<?php echo $stting[0]['phone']; ?> Email :
																	<?php echo $stting[0]['email'];  ?>
															</p>
														</div>
													</div>
													<div class="row" style="padding-top:0px; margin-top:0px">
														<div class="col-sm-12 feeprint text text-center" style="background-color:black; color:white">
															<?php echo $this->lang->line('bulk') . " " . $this->lang->line('delete') ?>
														</div>
													</div>
												</div>
                            <div class="row">
                            
                                <?php
                                foreach ($students as $student_key => $student_value) {
                                    ?>
                                    <form action="<?php echo site_url('student/savemulticlass'); ?>" method="POST" class="update">

                                        <div class="col-md-6">

                                            <div class="panel panel-info">

                                                <div class="panel-body">

                                                    <?php
                                                    echo $name = $student_value['firstname'] . " " . $student_value['lastname']." (".$student_value['admission_no'].")";
                                                    ?>
                                                    <input type="hidden" value="<?php echo $student_value['id'] ?>" name="student_id">
                                                    <input type="hidden" value="<?php echo count($student_value['student_sessions']) + 1; ?>" name="nxt_row" class="nxt_row">
                                                    <div class="row">
                                                        <div class="text-center">

                                                            <div class="col-xs-12 col-xs-offset-0 col-sm-3 col-sm-offset-9">
                                                                 <?php if($this->rbac->hasPrivilege('multi_class_student','can_add')){ ?>
                                                                <button type="button" class="btn btn-default btn-sm pull-right addrow addrow-mb2010">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="append_row">

                                                        <?php   
                                                                                             
                                                        if (!empty($student_value['student_sessions'])) {
                                                            $count = 1;
                                                            foreach ($student_value['student_sessions'] as $student_session_key => $student_session_value) {
                                                                ?>
                                                                <div class="row">
                                                                    <input type="hidden" name="row_count[]" value="<?php echo $count; ?>">
                                                                    <div class="col-sm-5">
                                                                        <div class="form-group">
                                                                            <label for="email"><?php echo $this->lang->line('class');?></label> 
                                                                            <select name="class_id_<?php echo $count; ?>" class="form-control class_id" >
                                                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                                <?php
                                                                                foreach ($classlist as $class) {
                                                                                    ?>
                                                                                    <option value="<?php echo $class['id'] ?>" <?php echo set_select('class_id_' . $count, $class['id'], ($class['id'] == $student_session_value->class_id) ? true : false); ?>><?php echo $class['class'] ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <label for="email">Section</label>
                                                                        <div class="form-group">
                                                                            <select name="section_id_<?php echo $count; ?>" class="form-control section_id" >
                                                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                                <?php
                                                                                echo getSectionByClasses($classes, $student_session_value->class_id, $student_session_value->section_id);
                                                                                ?>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group"><label for="email" style="opacity: 0;"><?php echo $this->lang->line('action')?></label>
                                                                              <?php if($this->rbac->hasPrivilege('multi_class_student','can_delete')){ ?>
                                                                            <button class="btn btn-sm btn-danger rmv_row" type="button"><?php echo $this->lang->line('remove') ?></button>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                $count++;
                                                            }
                                                        }
                                                        ?>

                                                    </div>

                                                    <hr>
                                                </div>
                                                <div class="panel-footer">
                                                    <div class="row text-center">

                                                        <div class="col-xs-12 col-xs-offset-0 col-sm-3 col-sm-offset-9">
                                                            <?php if($this->rbac->hasPrivilege('multi_class_student','can_edit')){ ?>
                                                            <button type="submit" class="btn btn-default btn-sm pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Updating...">
                                                                <?php echo $this->lang->line('update'); ?>
                                                            </button>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>


                    </div>
                  </div>  
                  </div>  
                    <?php
                } else {
                    
                }
                ?>

            </div>
        </div>
    </section>

    <!-- /.content -->
    <div class="clearfix"></div>
</div>

<?php

function getSectionByClasses($classes, $class_selected, $section_selected) {

    $options = "";
    foreach ($classes as $key => $value) {
        if ($value['id'] == $class_selected) {
            if (!empty($value['sections'])) {
                foreach ($value['sections'] as $section_key => $section_value) {
                    $selected = "";
                    if ($section_value['section_id'] == $section_selected) {
                        $selected = "selected='selected'";
                    }
                    $options .= "<option value='" . $section_value['section_id'] . "' " . $selected . ">" . $section_value['section'] . "</option>";
                }
            }
        }
    }
    return $options;
}
?>

<script type="text/javascript">
    // this is the id of the form

    $(document).on('submit', '.update', function (e) {
        var submit_btn = $(this).find("button[type=submit]");
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            dataType: "json",
            beforeSend: function () {
                submit_btn.button('loading');
            },
            success: function (data)
            {

                if (data.status == 1) {

                    successMsg(data.message);
                } else {
                    errorMsg(data.message);
                }
                submit_btn.button('reset');
            },
            error: function (xhr) { // if error occured
                alert("Error occured.please try again");

            },
            complete: function () {
                submit_btn.button('reset');
            }
        });


    });

</script>
<script type="text/javascript">
 $(document).on('click', '.rmv_row', function (e) {
        $(this).closest( "div.row" ).remove();
    });



    var class_id = '<?php echo set_value('class_id', 0) ?>';
    var section_id = '<?php echo set_value('section_id', 0) ?>';
    getSectionByClass(class_id, section_id);
    $(document).on('change', '#class_id', function (e) {
        $('#section_id').html("");
        var class_id = $(this).val();
        getSectionByClass(class_id, 0);
    });

    $(document).on('change', '.class_id', function (e) {
        // $('#section_id').html("");
        var class_id = $(this).val();

        var target_dropdown = $(this).closest("div.row").find('select.section_id');

        // getSectionByClass(class_id, 0);
        target_dropdown.html("");
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
            type: "GET",
            url: baseurl + "sections/getByClass",
            data: {'class_id': class_id},
            dataType: "json",
            beforeSend: function () {
                target_dropdown.html("").addClass('dropdownloading');
            },
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    var sel = "";
                    if (section_id == obj.section_id) {
                        sel = "selected";
                    }
                    div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                });
                target_dropdown.append(div_data);
            },
            complete: function () {
                target_dropdown.removeClass('dropdownloading');
            }
        });

    });



    function getSectionByClass(class_id, section_id) {

        if (class_id != 0 && class_id !== "") {
            $('#section_id').html("");
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: baseurl + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                beforeSend: function () {
                    $('#section_id').addClass('dropdownloading');
                },
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                },
                complete: function () {
                    $('#section_id').removeClass('dropdownloading');
                }
            });
        }
    }

    $(document).on('click', '.addrow', function () {

        var container = $(this).closest(".panel-body").find('.append_row');
        var nxt_row = $(this).closest(".panel-body").find('.nxt_row').val();
        var new_class_dropdown = $('#class_dropdown').html().replace("class_id", "class_id_" + nxt_row);
        var new_section_dropdown = $('#section_dropdown').html().replace("section_id", "section_id_" + nxt_row);

        var $newDiv = $('<div>').addClass('row').append(
                $('<input>', {type: 'hidden', name: 'row_count[]', val: parseInt(nxt_row)})).append(
                $('<div>').addClass('col-sm-5').append($('<div>').addClass('form-group').append($('<label>').html('Class')).append(new_class_dropdown))
                ).append(
                $('<div>').addClass('col-sm-5').append($('<div>').addClass('form-group').append($('<label>').html('Section')).append(new_section_dropdown))
                ).append(
                $('<div>').addClass('col-sm-2').append($('<div>').addClass('form-group').append($('<label>',{ css: {'opacity': 0}}).html('Action')).append(
                    
                    <?php
                      if($this->rbac->hasPrivilege('multi_class_student','can_delete')){ ?>
                  
                    $('<button>').html('Remove').addClass('btn btn-sm btn-danger rmv_row')
                    <?php }
                    ?>
                    )));

        $(this).closest(".panel-body").find('.nxt_row').val(parseInt(nxt_row) + 1);
        $newDiv.appendTo(container);


    });

</script>


<script type="text/template" id="class_dropdown">

    <select name="class_id" class="form-control class_id">
    <option value=""><?php echo $this->lang->line('select'); ?></option>
    <?php foreach ($classlist as $class) { ?>
        <option value="<?php echo $class['id'] ?>"><?php echo $class['class'] ?></option>
        <?php }?>
    </select>
</script>
<script type="text/template" id="section_dropdown">

    <select name="section_id" class="form-control section_id" autocomplete="off">
    <option value="">Select</option>
    </select>
</script>