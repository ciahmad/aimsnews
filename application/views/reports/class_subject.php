<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">
    /*REQUIRED*/
    .carousel-row {
        margin-bottom: 10px;
    }
    .slide-row {
        padding: 0;
        background-color: #ffffff;
        min-height: 150px;
        border: 1px solid #e7e7e7;
        overflow: hidden;
        height: auto;
        position: relative;
    }
    .slide-carousel {
        width: 20%;
        float: left;
        display: inline-block;
    }
    .slide-carousel .carousel-indicators {
        margin-bottom: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
    }
    .slide-carousel .carousel-indicators li {
        border-radius: 0;
        width: 20px;
        height: 6px;
    }
    .slide-carousel .carousel-indicators .active {
        margin: 1px;
    }
    .slide-content {
        position: absolute;
        top: 0;
        left: 20%;
        display: block;
        float: left;
        width: 80%;
        max-height: 76%;
        padding: 1.5% 2% 2% 2%;
        overflow-y: auto;
    }
    .slide-content h4 {
        margin-bottom: 3px;
        margin-top: 0;
    }
    .slide-footer {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 78%;
        height: 20%;
        margin: 1%;
    }
    /* Scrollbars */
    .slide-content::-webkit-scrollbar {
        width: 5px;
    }
    .slide-content::-webkit-scrollbar-thumb:vertical {
        margin: 5px;
        background-color: #999;
        -webkit-border-radius: 5px;
    }
    .slide-content::-webkit-scrollbar-button:start:decrement,
    .slide-content::-webkit-scrollbar-button:end:increment {
        height: 5px;
        display: block;
    }   
</style>

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
    table th:last-child {display:none}
    }

</style>

<div class="content-wrapper" style="min-height: 946px;">

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

                    <form role="form" action="<?php echo site_url('report/class_subject') ?>" method="post" class="">
                        <div class="box-body row">

                            <?php echo $this->customlib->getCSRF(); ?>

                            <div class="col-sm-6 col-md-3" >
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

                            <div class="col-sm-6 col-md-3" >
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('section'); ?><small class="req"> *</small></label>
                                    <select  id="section_id" onchange="getSubjects()" name="section_id" class="form-control" >
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
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> <?php echo form_error('student'); ?> <?php echo $this->lang->line('class') . "-" . $this->lang->line('subject') . " " . $this->lang->line('report'); ?></h3>
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
                                    <?php
                                echo $this->lang->line('class') . "-" . $this->lang->line('subject') . " " . $this->lang->line('report') . "<br>";

                                $this->customlib->get_postmessage();
                                ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                                <?php
                                echo $this->lang->line('class') . "-" . $this->lang->line('subject') . " " . $this->lang->line('report') . "<br>";

                                $this->customlib->get_postmessage();
                                ?>
                                </div> -->

                            <table class="table table-striped table-hover example">
                                <thead class="header">
                                    <tr>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section'); ?></th>
                                        <th><?php echo $this->lang->line('subject'); ?></th>
                                        <th><?php echo $this->lang->line('teacher'); ?></th>
                                        <th><?php echo $this->lang->line('time'); ?></th>
                                        <th><?php echo $this->lang->line('room_no'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //print_r($subjects);die;
                                    foreach ($subjects as $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value[0]->class_name; ?></td>
                                            <td><?php echo $value[0]->section_name; ?></td>
                                            <td><?php echo $value[0]->subject_name; ?></td>
                                            <td><?php
                                                foreach ($value as $teacher) {
                                                    $class_teacher = '';
                                                    if ($teacher->class_teacher == $teacher->staff_id) {
                                                        $class_teacher = ' <span class="label label-success">' . $this->lang->line('class') . ' ' . $this->lang->line('teacher') . '</span>';
                                                    }
                                                    echo $teacher->name . " " . $teacher->surname . " (" . $teacher->employee_id . ")" . $class_teacher . " <br>";
                                                }
                                                ?></td>
                                            <td><?php
                                                foreach ($value as $teacher) {

                                                    echo $teacher->day . " " . $teacher->time_from . " To " . $teacher->time_to . "</br>";
                                                }
                                                ?></td>

                                            <td><?php
                                                foreach ($value as $teacher) {

                                                    echo $teacher->room_no . "</br>";
                                                }
                                                ?></td>
                                        </tr>
    <?php
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