<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<div class="content-wrapper" style="min-height: 946px;">   
    <section class="content-header">
        <h1><i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <?php $this->load->view('studentfee/_fee_sidebar');?>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border themecolor">
                        <h3 class="box-title"><i class="fa fa-search"></i><?php echo $this->lang->line('collect_fees'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('studentfee/search') ?>" method="post" class="" id="searchstd">
                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('class'); ?></label><small class="req">  *</small>
                                                <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                 //echo "<pre>" print_r($feegroupList);
                                                 
                                                 
                                                foreach ($feegroupList as $feegroup) {
                                                    if ($this->session->userdata('class_id') ==$feegroup['id']) {
                                                        $selected = 'selected';
                                                    }else{
                                                        $selected = '';
                                                    }
                                                   
                                                     ?>
                                                    <option value="<?php echo $feegroup['id'] ?>" <?php echo $selected;?>><?php echo $feegroup['class'] ?></option>

                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('section'); ?></label>
                                                <select  id="section_id" name="section_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12">  
                                            <div class="form-group">
                                                <button type="submit" name="search" id="search_filter" value="search_filter" class="btn pull-right btn-sm checkbox-toggle message themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('studentfee/search') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text'); ?>" placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-sm pull-right checkbox-toggle themecolor message spinner-border m-5"  role="status">
                                                <span class="sr-only">Loading...</span>    
                                                <i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?>                                                
                                            </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
        <div class="row">
        <?php if (isset($resultlist)) { ?>
            <div class="col-md-12">
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
                                    <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?>
                                    </div>
                                </div>
                            </div>
                    <!-- <div class="download_label">
                        
                    </div> -->
                <div class="box-header ptbnull"></div> 
                <div class="box-header ptbnull aimsreportsbg">
                    <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?>
                        <?php echo form_error('student'); ?></h3>
                    <div class="box-tools pull-right"></div>
                </div>
                <div class="box-body table-responsive">                                
                    <table class="table table-striped table-hover example">
                        <thead>

                            <tr>
                                <th><?php echo $this->lang->line('class'); ?></th>
                                <th><?php echo $this->lang->line('section'); ?></th>

                                <th><?php echo $this->lang->line('admission_no'); ?></th>

                                <th><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('name'); ?></th>
                                <?php if ($sch_setting->father_name) { ?>
                                    <th><?php echo $this->lang->line('father_name'); ?></th>
                                <?php } ?>
                                <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                <th><?php echo $this->lang->line('phone'); ?></th>
                                <th class="text-right" style="float:right !important"><?php echo $this->lang->line('action'); ?></th>

                            </tr>
                        </thead>            
                        <tbody>    
                            <?php
                            $count = 1;
                            foreach ($resultlist as $student) {
                                
                                // $studentfeerows  = $this->studentfee_model->get(52);
                                // foreach ($studentfeerows as $key => $fee_value) {
                                //     $fee_deposits = json_decode(($fee_value));
                                //     if (!empty($fee_value)) {
                                //         foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                //             //echo "<pre>".print_r($fee_deposits_value->amount);
                                //         }
                                //     }
                                // }
                                
                                
                                ?>
                                <tr>
                                    <td><?php echo $student['class']; ?></td>
                                    <td><?php echo $student['section']; ?></td>

                                    <td><?php echo $student['admission_no']; ?></td>

                                    <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                    <?php if ($sch_setting->father_name) { ?>
                                        <td><?php echo $student['father_name']; ?></td>
                                    <?php } ?>
                                    <td><?php
                                        if (!empty($student['dob'])) {
                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob']));
                                        }
                                        ?></td>
                                    <td><?php echo $student['guardian_phone']; ?></td>
                                    <td class="pull-right" style="float:right !important">
                                        <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_add')) { ?>

                                            <!-- <?php
                                            
                                                if ($feetype_balance > 0) {
                                                    ?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
                                                } else if (!empty($student_due_fee[0]->fees[0]->amount_detail)) {
                                                    ?><span class="label label-warning"><?php echo $this->lang->line('partial'); ?></span><?php
                                                } else {
                                                    ?>
                                                    <span class="label label-danger"><?php echo $this->lang->line('unpaid'); ?></span>
                                                    <?php
                                                    }
                                                    ?> -->

                                            <a  href="<?php echo base_url(); ?>studentfee/addfee/<?php echo $student['student_session_id'] ?>" class="btn btn-info btn-xs themecolor" data-toggle="tooltip" title="" data-original-title="">
                                                <?php echo $currency_symbol; ?> <?php echo $this->lang->line('collect_fees'); ?>
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
                </div><!--./box-body-->
            </div>
        <?php } ?>
        </div>

    </section>
</div>

<script type="text/javascript">
    //let triger = true;
    function getSectionByClass(class_id, section_id) {
        //alert(class_id+ '-' +section_id)
        
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
                    // if(triger=='true'){
                    //     $("#search_filter").trigger("click");
                    // }
                    //
                    //triger = false;
                }
            });
            
        }

        return false;
    }

    $(document).ready(function () {
        
        var class_id = '<?php echo $this->session->userdata('class_id');?>';
        var section_id = '<?php echo $this->session->userdata('section_id');?>';
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