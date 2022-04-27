<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style>
    @media print {
    .feeprint {
        background-color: black !important;
        color:white !important;
        font-size:16px;
        -webkit-print-color-adjust: exact; 
    }

    .scissorsdiv{
        color:black !important;
        width:100% !important;
        -webkit-print-color-adjust: exact; 
    }  
    #school_name {
        color: #008080 !important;
    }
    
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bus"></i> <?php echo $this->lang->line('transport'); ?></h1>
    </section> 
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_studentinformation') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull aimsreportsbg"></div>
                    <!-- <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div> -->

                    <form role="form" action="<?php echo site_url('report/sibling_report') ?>" method="post" class="">
                        <div class="box-body row">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('class'); ?><small class="req"> *</small></label>
                                    <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($classlist as $class) {
                                            ?>
                                            <option value="<?php echo $class['id'] ?>" <?php
                                            if ($class_id == $class['id']) {
                                                echo "selected =selected";
                                            }
                                            ?>><?php echo $class['class'] ?></option>
                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('section'); ?><small class="req"> *</small></label>
                                    <select  id="section_id" name="section_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($section_list as $value) {
                                            ?>
                                            <option  <?php
                                            if ($value['section_id'] == $section_id) {
                                                echo "selected";
                                            }
                                            ?> value="<?php echo $value['section_id']; ?>"><?php echo $value['section']; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>    
                    </form>


                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header ptbnull aimsreportsbg">
                            <h3 class="box-title titlefix"><i class="fa fa-money"> </i> <?php echo $this->lang->line('sibling') . " " . $this->lang->line('report'); ?></h3>
                        </div>
                        <div class="box-body table-responsive">
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
                                    <?php echo $this->lang->line('sibling') . " " . $this->lang->line('report') . "<br>";
                                            $this->customlib->get_postmessage();
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                                <?php //echo $this->lang->line('sibling') . " " . $this->lang->line('report') . "<br>";
                                           // $this->customlib->get_postmessage();
                                            ?>
                                            </div> -->
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>
                                        <?php if ($sch_setting->father_name) { ?>
                                            <th><?php echo $this->lang->line('father_name'); ?></th>
<?php } if ($sch_setting->mother_name) { ?>
                                            <th><?php echo $this->lang->line('mother_name'); ?></th>
<?php } ?>
                                        <th><?php echo $this->lang->line('guardian') . " " . $this->lang->line('name') ?></th>
                                        <th><?php echo $this->lang->line('guardian') . " " . $this->lang->line('phone') ?></th>
                                        <th><?php echo $this->lang->line('student_name') . " (" . $this->lang->line('sibling') . ")"; ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
<?php if ($sch_setting->admission_date) { ?>
                                            <th><?php echo $this->lang->line('admission') . " " . $this->lang->line('date'); ?></th>
<?php } ?>
                                        <th><?php echo $this->lang->line('gender'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($resultlist)) {  //print_r($resultlist);die;  ?>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($resultlist as $student) {
                                            if (count($student) > 1) {
                                                ?>
                                                <tr>
                                                    <?php if ($sch_setting->father_name) { ?>
                                                        <td><?php echo $student[0]['father_name']; ?></td>
            <?php } if ($sch_setting->mother_name) { ?>
                                                        <td><?php echo $student[0]['mother_name']; ?></td>
            <?php } ?>
                                                    <td><?php echo $student[0]['guardian_name']; ?></td>
                                                    <td><?php echo $student[0]['guardian_phone']; ?></td>
                                                    <td>
                                                        <table>
                                                    <?php foreach ($student as $value) { ?>
                                                                <tr><td>
                                                                        <a href="<?php echo base_url(); ?>student/view/<?php echo $value['id']; ?>"><?php echo $value['firstname'] . ' ' . $value['lastname']; ?></a>
                                                                </tr></td>
            <?php } ?>
                                        </table>
                                        </td>
                                        <td>
                                            <table>
                                                        <?php foreach ($student as $value) {
                                                            ?>
                                                    <tr>
                                                        <td>
                                                    <?php echo $value['class'] . " (" . $value['section'] . ")"; ?>
                                                        </td>
                                                    </tr>                                                
                                        <?php } ?>
                                            </table>
                                        </td>
            <?php if ($sch_setting->admission_date) { ?>


                                            <td>
                                                <table>
                                                            <?php foreach ($student as $value) {
                                                                ?>  <tr><td><?php
                                                                if (!empty($value['admission_date'])) {
                                                                    echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['admission_date']));
                                                                }
                                                                ?> </td></tr>
                                            <?php } ?>
                                                </table>
                <?php ?>
                                            </td>
                                                <?php } ?>
                                        <td class="pull-right">
                                            <table width="100%">
                                                        <?php foreach ($student as $value) { ?>
                                                    <tr><td >
                                                            <?php
                                                            if (!empty($value['gender'])) {
                                                                echo $value['gender'];
                                                            }
                                                            ?>
                                                        </td></tr>
                                        <?php } ?>
                                            </table>
                                        </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </div>   
</div>  
</section>
</div>

<script>


    $(document).on('change', '#class_id', function (e) {

        $('#section_id').html("");
        var class_id = $(this).val();

        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        var url = "";
        $.ajax({
            type: "GET",
            url: baseurl + "sections/getByClass",
            data: {'class_id': class_id},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                });
                $('#section_id').append(div_data);
            }
        });
    });
</script>

