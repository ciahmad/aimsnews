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
    @media print {   
    table th:last-child {display:block}
    }

</style>

<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_studentinformation'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull aimsreportsbg"></div>
                   
                    <div class="box-body">   
                        <form role="form" action="<?php echo site_url('admin/users/admissionreport') ?>" method="post" class="">
                            <div class="row">

                                <?php echo $this->customlib->getCSRF(); ?>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?> ><?php echo $class['class'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div> 

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">  
                                        <label><?php echo $this->lang->line('admission_year'); ?></label>
                                        <select  id="year" name="year" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach ($admission_year as $key => $value) { ?>

                                                <option value="<?php echo $value["year"] ?>" <?php
                                                if (isset($_POST['year']) && $_POST['year'] != '') {
                                                    if ($_POST['year'] == $value["year"]) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $value["year"] ?></option>   

                                            <?php } ?>

                                        </select>
                                        <span class="text-danger"><?php echo form_error('year'); ?></span>
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>
                                </div>
                            </div><!--./row-->      
                        </form>
                    </div><!--./box-body-->    

                    <div class="box-header ptbnull">

                    </div>
                    <div class="">
                        <div class="box-header ptbnull aimsreportsbg">
                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo form_error('student'); ?> <?php echo $this->lang->line('student_history'); ?></h3>
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
                                        echo $this->lang->line('student_history');
                                        $this->customlib->get_postmessage();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label">
                                <?php
                                echo $this->lang->line('student_history');
                                $this->customlib->get_postmessage();
                                ?>
                                </div> -->
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line('admission_no'); ?></th>

                                        <th><?php echo $this->lang->line('student_name'); ?></th>
                                        <?php if ($sch_setting->admission_date) { ?>
                                            <th><?php echo $this->lang->line('admission_date'); ?></th>
<?php } ?>
                                        <th><?php echo $this->lang->line('class') . " (" . $this->lang->line('start') . " - " . $this->lang->line('end') . ")"; ?></th>
                                        <th><?php echo $this->lang->line('session') ?> (<?php echo $this->lang->line('start') ?> - <?php echo $this->lang->line('end') ?>)</th>
                                        <th><?php echo $this->lang->line('years'); ?></th>
                                        <?php if ($sch_setting->mobile_no) { ?>
                                            <th><?php echo $this->lang->line('mobile_no'); ?></th>
<?php } ?>
                                        <th><?php echo $this->lang->line('guardian_name'); ?></th>
                                        <th><?php echo $this->lang->line('guardian_phone'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($resultlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        $i = 0;
                                        foreach ($resultlist as $student) {

                                            $startsession = $sessionlist[$i]['start'];
                                            $findstartyear = explode("-", $startsession);
                                            $startyear = $findstartyear[0];

                                            $endsession = $sessionlist[$i]['end'];
                                            $findendyear = explode("-", $endsession);
                                            $endyear = $findendyear[0];
                                            ?>
                                            <tr <?php
                                            if ($student["is_active"] == "no") {
                                                echo "class='danger'";
                                            }
                                            ?>>

                                                <td><?php echo $student['admission_no']; ?></td>

                                                <td>
                                                    <a href="#"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                    </a>
                                                </td> 
                                                <?php if ($sch_setting->admission_date) { ?>
                                                    <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformatFront($student["admission_date"])) ?></td>
        <?php } ?>
                                                <td><?php echo $sessionlist[$i]['startclass'] . "  -  " . $sessionlist[$i]['endclass']; ?></td>
                                                <td><?php echo $sessionlist[$i]['start'] . "  -  " . $sessionlist[$i]['end']; ?></td>
                                                <td><?php echo ($endyear - $startyear) + 1; ?></td>
                                                <?php if ($sch_setting->mobile_no) { ?>
                                                    <td><?php echo $student['mobileno']; ?></td>
        <?php } ?>
                                                <td><?php echo $student['guardian_name']; ?></td>
                                                <td><?php echo $student['guardian_phone']; ?></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            $count++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--./box box-primary-->
            </div><!--./col-md-12-->  
        </div>   
</div>  
</section>
</div>

<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
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
                }
            });
        }
    }

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
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
    });
</script>