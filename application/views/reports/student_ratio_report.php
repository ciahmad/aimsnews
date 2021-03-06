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
       table th:last-child {display:block}
    }

</style>

<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-bus"></i> <?php echo $this->lang->line('transport'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_studentinformation'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull aimsreportsbg"></div>                                     
                    <div class="">
                        <div class="box-header ptbnull aimsreportsbg">
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> <?php echo $this->lang->line('student') . " " . $this->lang->line('gender') . " " . $this->lang->line('ratio') . " " . $this->lang->line('report') ?></h3>
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
                                    <?php echo $this->lang->line('student') . " " . $this->lang->line('gender') . " " . $this->lang->line('ratio') . " " . $this->lang->line('report') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="download_label"> 
                                <?php //echo $this->lang->line('student') . " " . $this->lang->line('gender') . " " . $this->lang->line('ratio') . " " . $this->lang->line('report') ?>
                            </div> -->
                            <table class="table table-striped table-hover example">
                                <thead>
                                    <tr>

                                        <th><?php echo $this->lang->line('class') . " (" . $this->lang->line('section') . ")"; ?></th>
                                        <th><?php echo $this->lang->line('total') . " " . $this->lang->line('boys'); ?></th>
                                        <th><?php echo $this->lang->line('total') . " " . $this->lang->line('girls'); ?></th>
                                        <th><?php echo $this->lang->line('total') . " " . $this->lang->line('students'); ?></th>
                                        <th><?php echo $this->lang->line('boys') . "-" . $this->lang->line('girls') . " " . $this->lang->line('ratio'); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_boys = $total_girls = $total_students = 0;
                                    foreach ($result as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value['class'] . " (" . $value['section'] . ")"; ?></td>
                                            <td><?php echo $value['male']; ?></td>

                                            <td><?php echo $value['female']; ?></td>
                                            <td><?php echo $value['total_student']; ?></td>
                                            <td><?php echo $value['boys_girls_ratio'] ?></td>

                                        </tr>
                                        <?php
                                        $total_boys += $value['male'];
                                        $total_girls += $value['female'];
                                        $total_students += $value['total_student'];
                                    }
                                    ?>
                                    <tr><td> </td><td><b><?php echo $total_boys; ?></b></td><td><b><?php echo $total_girls; ?></b></td><td><b><?php echo $total_students; ?></b></td><td><b><?php echo $all_boys_girls_ratio; ?></b></td></tr>

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

