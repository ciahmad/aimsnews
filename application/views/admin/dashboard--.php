<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<style type="text/css">
    .borderwhite{border-top-color: #fff !important;}
    .box-header>.box-tools {display: none;}
    .sidebar-collapse #barChart{height: 100% !important;}
    .sidebar-collapse #lineChart{height: 100% !important;}
     #accordian{
            margin-top: 20px;
            padding-top:80px;
        }
        .card {
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    margin-bottom: 10px;
    background: white;
}

.card-header {
    position: relative;
    background-color: transparent;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}
.card-title {
    font-size: 1.25rem;
    font-weight: 400;
    margin: 0;
    padding: 10px;
    font-size:16px;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 0 solid rgba(0, 0, 0, 0.125);
}

.pagination-sm .page-item:first-child .page-link {
    border-top-left-radius: 0.2rem;
    border-bottom-left-radius: 0.2rem;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}
.card-header {
    position: relative;
    background-color: transparent;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 0 solid rgba(0, 0, 0, 0.125);
}
.card-footer {
    padding: 0.75rem 1.25rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 0 solid rgba(0, 0, 0, 0.125);
}
.btn-info {
    color: #ffffff;
    background-color: #17a2b8;
    border-color: #17a2b8;
    box-shadow: 0 1px 1px rgb(0 0 0 / 8%);
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px
px
 solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

</style>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content">
        <div class="">

            <?php if ($mysqlVersion && $sqlMode && strpos($sqlMode->mode, 'ONLY_FULL_GROUP_BY') !== FALSE) { ?>
                <div class="alert alert-danger">
                    Smart School may not work properly because ONLY_FULL_GROUP_BY is enabled, consult with your hosting provider to disable ONLY_FULL_GROUP_BY in sql_mode configuration.
                </div>
            <?php } ?>

            <?php
            $show = false;
            $role = $this->customlib->getStaffRole();
            $role_id = json_decode($role)->id;
            foreach ($notifications as $notice_key => $notice_value) {

                if ($role_id == 7) {
                    $show = true;
                } elseif (date($this->customlib->getSchoolDateFormat()) >= date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($notice_value->publish_date))) {
                    $show = true;
                }
                if ($show) {
                    ?>

                    <div class="dashalert alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>
                        <a href="<?php echo site_url('admin/notification') ?>"><?php echo $notice_value->title; ?></a>
                    </div>

                    <?php
                }
            }
            ?>

        </div> 
        <div class="row">
            <?php
            if ($this->module_lib->hasActive('fees_collection')) {
                if ($this->rbac->hasPrivilege('fees_awaiting_payment_widegts', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                            <p class="text-uppercase mt5 clearfix"><i class="fa fa-money ftlayer"></i><?php echo $this->lang->line('fees') . " " . $this->lang->line('awaiting') . " " . $this->lang->line('payment'); ?><span class="pull-right"><?php echo $total_paid; ?>/<?php echo $total_fees ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-aqua" style="width: <?php echo $fessprogressbar; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->
                    </div><!--./col-md-3-->

                    <?php
                }
            }
            ?>

            <?php
            if ($this->module_lib->hasActive('front_office')) {
                if ($this->rbac->hasPrivilege('conveted_leads_widegts', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                            <p class="text-uppercase mt5 clearfix"><i class="fa fa-ioxhost ftlayer"></i> <?php echo $this->lang->line('converted') . " " . $this->lang->line('leads') ?><span class="pull-right"><?php echo $total_complete + 0; ?>/<?php echo $total_enquiry; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-red" style="width: <?php echo $fenquiryprogressbar; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->
                    </div><!--./col-md-3--> 
                    <?php
                }
            }
            if ($this->rbac->hasPrivilege('staff_present_today_widegts', 'can_view')) {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="topprograssstart">
                        <p class="text-uppercase mt5 clearfix"><i class="fa fa-calendar-check-o ftlayer"></i><?php echo $this->lang->line('staff') . ' ' . $this->lang->line('present') . ' ' . $this->lang->line('today'); ?><span class="pull-right"><?php echo $Staffattendence_data + 0; ?>/<?php echo $getTotalStaff_data; ?></span>
                        </p> 
                        <div class="progress-group">
                            <div class="progress progress-minibar">
                                <div class="progress-bar progress-bar-green" style="width: <?php echo $percentTotalStaff_data; ?>%"></div>
                            </div>
                        </div>
                    </div><!--./topprograssstart-->
                </div><!--./col-md-3-->
                <?php
            }
            if ($this->module_lib->hasActive('student_attendance')) {
                if ($this->rbac->hasPrivilege('student_present_today_widegts', 'can_view')) {
                    ?>


                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="topprograssstart">
                            <p class="text-uppercase mt5 clearfix"><i class="fa fa-calendar-check-o ftlayer"></i><?php echo $this->lang->line('student') . ' ' . $this->lang->line('present') . ' ' . $this->lang->line('today'); ?><span class="pull-right"> <?php echo 0 + $attendence_data['total_half_day'] + $attendence_data['total_late'] + $attendence_data['total_present']; ?>/<?php echo $total_students; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo 0 + $attendence_data['total_half_day'] + $attendence_data['total_late'] + $attendence_data['total_present']; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->
                    </div><!--./col-md-3--> 
                <?php }
            }
            ?>
        </div><!--./row--> 


        <div class="row">
            <?php
            $bar_chart = true;

            if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
                if ($this->rbac->hasPrivilege('fees_collection_and_expense_monthly_chart', 'can_view')) {

                    $div_rol = 3;
                    $userdata = $this->customlib->getUserData();
                    ?>  
                    <div class="col-lg-7 col-md-7 col-sm-12 col60">

                        <div class="box box-primary borderwhite">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo $this->lang->line('fees_collection_&_expenses_for'); ?><?php echo $this->lang->line('_expenses_for') ?> <?php echo $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                            ;
                            ?></h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="barChart" height="95"></canvas>
                                </div>  
                            </div>

                        </div>

                    </div><!--./col-lg-7-->
                <?php }
            }
            ?>
            <?php
            if ($this->module_lib->hasActive('income')) {
                if ($this->rbac->hasPrivilege('income_donut_graph', 'can_view')) {
                    ?>
                    <div class="col-lg-5 col-md-5 col-sm-12 col40">

                        <div class="box box-primary borderwhite">
                            <div class="box-header with-border"><h3 class="box-title"><?php echo $this->lang->line('income') . " - " . $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                    ;
                    ?></h3></div>


                            <div class="box-body">
                                <div class="chart-responsive">
                                    <canvas id="doughnut-chart" class="" height="148"></canvas>
                                </div>  
                            </div>

                        </div><!--./col-md-6-->

                    </div><!--./col-lg-5-->
    <?php
    }
}
?>
        </div><!--./row--> 

        <div class="row">
            <?php
            $line_chart = true;
            if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
                if ($this->rbac->hasPrivilege('fees_collection_and_expense_yearly_chart', 'can_view')) {
                    $div_rol = 3;
                    ?>
                    <div class="col-lg-7 col-md-7 col-sm-12 col60">

                        <div class="box box-info borderwhite">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo $this->lang->line('fees_collection_&_expenses_for_session'); ?> <?php echo $this->setting_model->getCurrentSessionName(); ?></h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="lineChart" height="95"></canvas>
                                </div>  
                            </div>  

                            <!--  <div class="box-body">
                                 <div class="chart">
                                     <canvas id="lineChart" style="height: 233px; width: 100%; white-space: nowrap;"></canvas>
                                 </div>
                             </div> -->
                        </div>

                    </div><!--./col-lg-7-->
                    <?php
                }
            }
            if ($this->module_lib->hasActive('expense')) {
                ?>
                <?php if ($this->rbac->hasPrivilege('expense_donut_graph', 'can_view')) { ?>
                    <div class="col-lg-5 col-md-5 col-sm-12 col40">
                        <div class="box box-primary borderwhite">
                            <div class="box-header with-border"><h3 class="box-title"><?php echo $this->lang->line('expense') . " - " . $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                        ;
                        ?></h3>
                            </div><!--./info-box--> 

                            <div class="box-body">
                                <div class="chart-responsive">
                                    <canvas id="doughnut-chart1" class="" height="148"></canvas>
                                </div>  
                            </div>
                         <!--  <div class="full-width-chart"><canvas id="doughnut-chart1" style="height: 340px; width: 100%; white-space: nowrap;"></canvas></div> -->

                        </div>  
                    </div><!--./col-lg-5-->
                        <?php }
                    }
                    ?>
        </div><!--./row-->

        <div class="row">
          <div class="col-md-12" style="background:white; border-radius: 6px;">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="collapse" style="float:right" data-target="#demomonthlygraph">
                    <i class="fa fa-plus"></i>
                  </button>
                  <div class="btn-group">
                    <!-- <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button> -->
                    <!-- <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div> -->
                  </div>
                  <!-- <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="demomonthlygraph">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar" style="width: 80%; background:#007bff"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar" style="width: 75%; background:#dc3545;"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%; background:#28a745"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar" style="width: 50%; background:#ffc107"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer" style="background:#D2D6DE; border-radious:5px">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <h5 class="mb-2 mt-4">Small Box</h5>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background:#17a2b8; color:white; ">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success" style="background:#28a745; color:white">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning" style="background: #ffc107; color:white">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box" style="background: #dc3545; color:white">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row" style="background:white; margin-top:10px">
          <div class="col-md-6">
            <div class="card" style="margin:20px border-radius: 3px;">
              <div class="card-header">
                <h3 class="card-title">Collapsible Accordion</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion" style="margin-top:10; margin-bottom:3px">
                  <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                  <div class="card card-primary" style="margin-top: 20px;background:#007bff;">
                    <div class="card-header" style="">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-original-title="" title="" style="color:white">
                          Collapsible Group Item #1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="card-body" style="background:white">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card card-danger" style="background:#dc3545; color:white;">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" data-original-title="" title="" style="color:white">
                          Collapsible Group Danger
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="card-body" style="background:white; color:black">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card card-success" style="background:#28a745;">
                    <div class="card-header" style="margin-bottom:20px">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="color:white; font-size:16px">
                          Collapsible Group Success
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="card-body" style="background:white">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Carousel</h3>
              </div>S            
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>            
            </div>-->
            <div class="card" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);">
                <div class="card-header ui-sortable-handle" style="cursor:move;">
                <h3 style="font-size:15px;margin-top:10px; margin-bottom:7px;">
                    <li class="fa fa-calendar" style="margin-right:10px !important"></li>To Do List
                </h3>

            <div style="position:absolute; right:1rem; top:.5rem">
                <ul class="pagination pagination-sm" style="display:flex;padding-left:0;list-style:none;border-radius:0.25rem; margin:9px 0">
                <li style="display:list-item;text-align:-webkit-match-parent">
                <a href="#" class="page-link">«</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">»</a></li>
                </ul>
                </div>
            </div>

            <div class="card-body">
                <ul class="todo-list ui-sortable">
                  <li>
                    <!-- drag handle -->
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <input type="checkbox" value="" name="">
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="fa fa-clock-o"></i> 3 days</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> 1 month</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                </ul>

                <div class="card-footer clearfix" style="margin-top: 10px;">
                <button style="float:right; font-size:14px; padding:10px" type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add Item</button>
            </div>
              </div>
                
            </div>
             
          </div>
                
        </div>


        <div class="row">    


<?php
if ($this->module_lib->hasActive('fees_collection')) {
    if ($this->rbac->hasPrivilege('fees_overview_widegts', 'can_view')) {
        ?>
                    <div class="col-md-3 col-sm-6">

                        <div class="topprograssstart">
                            <h5 class="pro-border pb10"><?php echo $this->lang->line('fees') . " " . $this->lang->line('overview') ?></h5>
                            <p class="text-uppercase mt10 clearfix"><?php echo $fees_overview['total_unpaid']; ?> <?php echo $this->lang->line('unpaid'); ?><span class="pull-right"><?php echo round($fees_overview['unpaid_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar" style="width: <?php echo $fees_overview['unpaid_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $fees_overview['total_partial']; ?> <?php echo $this->lang->line('partial'); ?><span class="pull-right"><?php echo round($fees_overview['partial_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-aqua" style="width: <?php echo $fees_overview['partial_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $fees_overview['total_paid']; ?> <?php echo $this->lang->line('paid'); ?><span class="pull-right"><?php echo round($fees_overview['paid_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-aqua" style="width: <?php echo $fees_overview['paid_progress']; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->

                    </div><!--./col-md-3-->
        <?php
    }
}
if ($this->module_lib->hasActive('front_office')) {
    if ($this->rbac->hasPrivilege('enquiry_overview_widegts', 'can_view')) {
        ?>
                    <div class="col-md-3 col-sm-6">

                        <div class="topprograssstart">
                            <h5 class="pro-border pb10"> <?php echo $this->lang->line('enquiry') . " " . $this->lang->line('overview'); ?></h5>
                            <p class="text-uppercase mt10 clearfix"><?php echo $enquiry_overview['active']; ?> <?php echo $this->lang->line('active') ?><span class="pull-right"><?php echo round($enquiry_overview['active_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-red" style="width: <?php echo $enquiry_overview['active_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $enquiry_overview['won']; ?> <?php echo $this->lang->line('won') ?><span class="pull-right"><?php echo round($enquiry_overview['won_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo $enquiry_overview['won_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $enquiry_overview['passive']; ?> <?php echo $this->lang->line('passive') ?><span class="pull-right"><?php echo round($enquiry_overview['passive_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo $enquiry_overview['passive_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $enquiry_overview['lost']; ?> <?php echo $this->lang->line('lost') ?><span class="pull-right"><?php echo round($enquiry_overview['lost_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo $enquiry_overview['lost_progress']; ?>%"></div>
                                </div>
                            </div>
                            <p class="text-uppercase mt10 clearfix"><?php echo $enquiry_overview['dead']; ?> <?php echo $this->lang->line('dead') ?><span class="pull-right"><?php echo round($enquiry_overview['dead_progress'], 2); ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo $enquiry_overview['dead_progress']; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->

                    </div><!--./col-md-3-->

        <?php
    }
}

if ($this->module_lib->hasActive('library')) {
    if ($this->rbac->hasPrivilege('book_overview_widegts', 'can_view')) {
        ?>


                    <div class="col-md-3 col-sm-6">

                        <div class="topprograssstart">
                            <h5 class="pro-border pb10"> <?php echo $this->lang->line('library') . " " . $this->lang->line('overview'); ?></h5>
                            <p class="text-uppercase mt10 clearfix"><?php echo $book_overview['dueforreturn']; ?> <?php echo $this->lang->line('due') . " " . $this->lang->line('for') . " " . $this->lang->line('return'); ?><span class="pull-right"></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-green" style="width: <?php echo $book_overview['dueforreturn']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $book_overview['forreturn']; ?> <?php echo $this->lang->line('returned') ?><span class="pull-right"></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-green" style="width: <?php echo $book_overview['forreturn']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $book_overview['total_issued']; ?> <?php echo $this->lang->line('issued_out_of'); ?> <?php echo $book_overview['total'] ?><span class="pull-right"><?php echo $book_overview['issued_progress']; ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-green" style="width: <?php echo $book_overview['issued_progress']; ?>%"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $book_overview['availble']; ?> <?php echo $this->lang->line('available_out_of') ?> <?php echo $book_overview['total']; ?><span class="pull-right"><?php echo $book_overview['availble_progress']; ?>%</span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar progress-bar-green" style="width: <?php echo $book_overview['availble_progress']; ?>%"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->

                    </div><!--./col-md-3-->


        <?php
    }
}
if ($this->module_lib->hasActive('student_attendance')) {
    if ($this->rbac->hasPrivilege('today_attendance_widegts', 'can_view')) {
        ?>
                    <div class="col-md-3 col-sm-6">

                        <div class="topprograssstart">
                            <h5 class="pro-border pb10"> <?php echo $this->lang->line('student') . " " . $this->lang->line('today') . " " . $this->lang->line('attendance'); ?></h5>

                            <p class="text-uppercase mt10 clearfix"><?php echo $attendence_data['total_present']; ?> <?php echo $this->lang->line('present'); ?><span class="pull-right"><?php echo $attendence_data['present']; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar" style="width: <?php echo $attendence_data['present']; ?>"></div>
                                </div>
                            </div>

                            <p class="text-uppercase mt10 clearfix"><?php echo $attendence_data['total_late']; ?> <?php echo $this->lang->line('late') ?><span class="pull-right"><?php echo $attendence_data['late']; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar" style="width: <?php echo $attendence_data['late']; ?>"></div>
                                </div>
                            </div>
                            <p class="text-uppercase mt10 clearfix"><?php echo $attendence_data['total_absent']; ?> <?php echo $this->lang->line('absent'); ?><span class="pull-right"><?php echo $attendence_data['absent']; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar" style="width: <?php echo $attendence_data['absent']; ?>"></div>
                                </div>
                            </div>
                            <p class="text-uppercase mt10 clearfix"><?php echo $attendence_data['total_half_day']; ?> <?php echo $this->lang->line('half_day'); ?><span class="pull-right"><?php echo $attendence_data['half_day']; ?></span>
                            </p>
                            <div class="progress-group">
                                <div class="progress progress-minibar">
                                    <div class="progress-bar" style="width: <?php echo $attendence_data['half_day']; ?>"></div>
                                </div>
                            </div>
                        </div><!--./topprograssstart-->

                    </div><!--./col-md-3--> 
                    <?php
                }
            }


            $currency_symbol = $this->customlib->getSchoolCurrencyFormat();

            $div_col = 12;
            $div_rol = 12;
            $bar_chart = true;
            $line_chart = true;
            if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                $div_col = 9;
                $div_rol = 12;
            }

            $widget_col = array();
            if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
                $widget_col[0] = 1;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                $widget_col[1] = 2;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
                $widget_col[2] = 3;
                $div_rol = 3;
            }
            $div = sizeof($widget_col);
            if (!empty($widget_col)) {
                $widget = 12 / $div;
            } else {

                $widget = 12;
            }
            ?> 


            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
<?php
if ($this->module_lib->hasActive('fees_collection')) {
    if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
        ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="info-box">
                                        <a href="<?php echo site_url('studentfee') ?>">
                                            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $this->lang->line('monthly_fees_collection'); ?></span>
                                                <span class="info-box-number"><?php echo $currency_symbol . $month_collection; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
    <?php }
}
?>
<?php
if ($this->module_lib->hasActive('expense')) {
    if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
        ?>

                                <div class="col-md-4 col-sm-6">
                                    <div class="info-box">
                                        <a href="<?php echo site_url('admin/expense') ?>">
                                            <span class="info-box-icon bg-red"><i class="fa fa-credit-card"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $this->lang->line('monthly_expenses'); ?></span>
                                                <span class="info-box-number"><?php echo $currency_symbol . $month_expense; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
    <?php
    }
}

if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
    ?>


                            <div class="col-md-4 col-sm-6">
                                <div class="info-box">
                                    <a href="<?php echo site_url('student/search') ?>">
                                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?php echo $this->lang->line('student'); ?></span>
                                            <span class="info-box-number"><?php echo $total_students; ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
<?php } ?>
                    </div>   


<?php
if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
    $div_rol = 3;
    ?>
                        <div class="box box-primary borderwhite">
                            <div class="box-body">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /. box -->
                    <?php } ?> 

                </div><!--./col-lg-9-->

            </div><!--./row-->








        </div><!--./row-->


</div>
<div id="newEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo "Add New Event"; ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form"  id="addevent_form" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('title'); ?></label><small class="req"> *</small>
                            <input class="form-control" name="title" id="input-field"> 
                            <span class="text-danger"><?php echo form_error('title'); ?></span>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                            <textarea name="description" class="form-control" id="desc-field"></textarea></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('date'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_dates" class="form-control pull-right" id="date-field">
                            </div>
                              <!-- <input class="form-control" type="text" autocomplete="off"  name="event_dates" id="date-field"> --></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('color'); ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)   ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('type'); ?></label>
                            <br/>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="public" id="public"><?php echo $this->lang->line('public'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="private" checked id="private"><?php echo $this->lang->line('private'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="sameforall" id="public"><?php echo $this->lang->line('all'); ?> <?php echo json_decode($role)->name; ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="protected" id="public"><?php echo $this->lang->line('protected'); ?>
                            </label> </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn btn-primary submit_addevent pull-right" value="<?php echo $this->lang->line('save'); ?>"></div> </form>
                </div>

            </div>
        </div>
    </div>
</div>  
<div id="viewEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('edit') ?> <?php echo $this->lang->line('event') ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form"   method="post" id="updateevent_form"  enctype="multipart/form-data" action="" >
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('title') ?></label>
                            <input class="form-control" name="title" placeholder="Event Title" id="event_title"> 
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description') ?></label>
                            <textarea name="description" class="form-control" placeholder="Event Description" id="event_desc"></textarea></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('date') ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="eventdates" class="form-control pull-right" id="eventdates">
                            </div>
                              <!-- <input class="form-control" type="text" autocomplete="off" name="eventdates" placeholder="Event Dates" id="eventdates"> --></div>
                        <input type="hidden" name="eventid" id="eventid">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('color') ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color" id="event_color" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)  ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $colorid = trim($color, "#");
                                // print_r($colorid);
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper selectevent">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('type') ?></label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="public" id="public"><?php echo $this->lang->line('public') ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="private" id="private"><?php echo $this->lang->line('private') ?> 
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="sameforall" id="public"><?php echo $this->lang->line('all') ?> <?php echo json_decode($role)->name; ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="protected" id="public"><?php echo $this->lang->line('protected') ?> 
                            </label>
                        </div>

                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">

                            <input type="submit" class="btn btn-primary submit_update pull-right" value="<?php echo $this->lang->line('save'); ?>">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
                                <input type="button" id="delete_event" class="btn btn-primary submit_delete pull-right" value="<?php echo $this->lang->line('delete'); ?>">
<?php } ?>
                        </div>       
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- <script src="<?php echo base_url() ?>backend/js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>backend/js/utils.js"></script> -->
<script type="text/javascript">

    new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
            data: {
            labels: [<?php foreach ($incomegraph as $value) { ?>"<?php echo $value['income_category']; ?>", <?php } ?> ],
                    datasets: [
                    {
                    label: "Income",
                            backgroundColor: [<?php $s = 1;
foreach ($incomegraph as $value) {
    ?>"<?php echo incomegraphColors($s++); ?>", <?php
    if ($s == 8) {
        $s = 1;
    }
}
?> ],
                            data: [<?php $s = 1;
foreach ($incomegraph as $value) {
    ?><?php echo $value['total']; ?>, <?php } ?>]
                    }
                    ]
            },
            options: {
            responsive: true,
                    circumference: Math.PI,
                    rotation: - Math.PI,
                    legend: {
                    position: 'top',
                    },
                    title: {
                    display: true,
                    },
                    animation: {
                    animateScale: true,
                            animateRotate: true
                    }
            }
    });
    new Chart(document.getElementById("doughnut-chart1"), {
    type: 'doughnut',
            data: {
            labels: [<?php foreach ($expensegraph as $value) { ?>"<?php echo $value['exp_category']; ?>", <?php } ?>],
                    datasets: [
                    {
                    label: "Population (millions)",
                            backgroundColor: [<?php $ss = 1;
foreach ($expensegraph as $value) {
    ?>"<?php echo expensegraphColors($ss++); ?>", <?php
    if ($ss == 8) {
        $ss = 1;
    }
}
?>],
                            data: [<?php foreach ($expensegraph as $value) { ?><?php echo $value['total']; ?>, <?php } ?>]
                    }
                    ]
            },
            options: {
            responsive: true,
                    circumference: Math.PI,
                    rotation: - Math.PI,
                    legend: {
                    position: 'top',
                    },
                    title: {
                    display: true,
                    },
                    animation: {
                    animateScale: true,
                            animateRotate: true
                    }
            }
    });
<?php
if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
    ?>
        $(function () {
        var areaChartOptions = {
        showScale: true,
                scaleShowGridLines: false,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                bezierCurve: true,
                bezierCurveTension: 0.3,
                pointDot: false,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                maintainAspectRatio: true,
                responsive: true
        };
        var bar_chart = "<?php echo $bar_chart ?>";
        var line_chart = "<?php echo $line_chart ?>";
        if (line_chart) {


        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
        var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
        var total_month = <?php echo json_encode($total_month) ?>;
        var areaChartData_expense_Income = {
        labels: total_month,
                datasets: [
                {
                label: "Expense",
                        fillColor: "rgba(215, 44, 44, 0.7)",
                        strokeColor: "rgba(215, 44, 44, 0.7)",
                        pointColor: "rgba(233, 30, 99, 0.9)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: yearly_expense_array
                },
                {
                label: "Collection",
                        fillColor: "rgba(102, 170, 24, 0.6)",
                        strokeColor: "rgba(102, 170, 24, 0.6)",
                        pointColor: "rgba(102, 170, 24, 0.9)",
                        pointStrokeColor: "rgba(102, 170, 24, 0.6)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: yearly_collection_array
                }
                ]
        };
        lineChart.Line(areaChartData_expense_Income, lineChartOptions);
        }

        var current_month_days = <?php echo json_encode($current_month_days) ?>;
        var days_collection = <?php echo json_encode($days_collection) ?>;
        var days_expense = <?php echo json_encode($days_expense) ?>;
        var areaChartData_classAttendence = {
        labels: current_month_days,
                datasets: [
                {
                label: "Electronics",
                        fillColor: "rgba(102, 170, 24, 0.6)",
                        strokeColor: "rgba(102, 170, 24, 0.6)",
                        pointColor: "rgba(102, 170, 24, 0.6)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: days_collection
                },
                {
                label: "Digital Goods",
                        fillColor: "rgba(233, 30, 99, 0.9)",
                        strokeColor: "rgba(233, 30, 99, 0.9)",
                        pointColor: "rgba(233, 30, 99, 0.9)",
                        pointStrokeColor: "rgba(233, 30, 99, 0.9)",
                        pointHighlightFill: "rgba(233, 30, 99, 0.9)",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: days_expense
                }
                ]
        };
        if (bar_chart) {
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData_classAttendence;
        barChartData.datasets[1].fillColor = "rgba(233, 30, 99, 0.9)";
        barChartData.datasets[1].strokeColor = "rgba(233, 30, 99, 0.9)";
        barChartData.datasets[1].pointColor = "rgba(233, 30, 99, 0.9)";
        var barChartOptions = {
        scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: false,
                scaleShowVerticalLines: false,
                barShowStroke: true,
                barStrokeWidth: 2,
                barValueSpacing: 5,
                barDatasetSpacing: 1,
                responsive: true,
                maintainAspectRatio: true
        };
        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
        }
        });
    <?php
}
?>


    $(document).ready(function () {

    $(document).on('click', '.close_notice', function () {
    var data = $(this).data();
    $.ajax({
    type: "POST",
            url: base_url + "admin/notification/read",
            data: {'notice': data.noticeid},
            dataType: "json",
            success: function (data) {
            if (data.status == "fail") {

            errorMsg(data.msg);
            } else {
            successMsg(data.msg);
            }

            }
    });
    });
    });
</script>

<script src="<?= base_url() ?>backend/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="<?= base_url() ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>backend/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>backend/dist/js/pages/dashboard2.js"></script>