<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$language = $this->customlib->getLanguage();
$language_name = $language["short_code"];
?><style type="text/css">
  
</style>
<style type="text/css">
    @media print {
       table td:last-child {display:block !important; }
       table th:last-child {display:block !important; }
       table tr th:last-child {display:block !important; }
       table tr td:last-child {display:block !important; }

       #printPageButton {
            display: none;
        }
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-usd"></i> Fee Receipt Voucher List</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php $this->load->view('studentfee/_fee_sidebar');?>
            <?php
            if ($this->rbac->hasPrivilege('collect_fees', 'can_add')) {
                ?>
                <div class="col-md-10">
                    
                    <!-- <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title">Fee Receipt Voucher</h3>
                        </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-1 col-sm-1">
                                        <label for="exampleInputEmail1"><label><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                            
                                                <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                 echo "<pre>". print_r($feegroupList); 
                                                 
                                                 
                                                foreach ($feegroupList as $feegroup) {
                                                    
                                                   
                                                     ?>
                                                    <option value="<?php echo $feegroup['id'] ?>"><?php echo $feegroup['class'] ?></option>

                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            
                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <label><?php echo $this->lang->line('section'); ?></label>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                        
                                    </div>    

                                    <div class="col-md-2 col-sm-2">
                                        <label for="exampleInputEmail1">Student Name<small class="req"> *</small></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select autofocus="" id="studentsLists" name="studentsLists" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="col-md-12">
                                   <div id="std_section_div"></div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                
            <?php } ?>
            <?php
            if ($this->rbac->hasPrivilege('collect_fees', 'can_add')) {
                ?>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull themecolor">
                        <h3 class="box-title titlefix"> Fee Receipt Voucher List</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
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
                                    <?php //echo $this->lang->line('income_list'); ?> Fee Receipt Voucher List
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="download_label">
                            <?php //echo $this->lang->line('income_list'); ?>
                        </div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                        <!-- <th><?php echo $this->lang->line('ac_head'); ?></th> -->
                                        <th class="text-right"><?php echo $this->lang->line('amount'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('discount'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('fine'); ?></th>
                                        <th class="text-right">Net <?php echo $this->lang->line('amount'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($datalist)) { ?>

                                    <?php } else {
                                        $total_fine = 0;
                                        $total_discount = 0;
                                        $total_net_amount = 0;
                                        $total_paid_fee = 0;
                                        foreach ($datalist as $key => $stdlist) { 
                                           
                                            $total_fine = $total_fine+$stdlist['total_fine'];
                                            $total_discount = $total_discount+$stdlist['total_discount'];
                                            $total_paid_fee = $total_paid_fee+$stdlist['total_paid_fee'];
                                            $total_net_amount = $total_net_amount+$stdlist['total_net_amount'];

                                        ?>

                                        <tr style="background-color:#dddddd94">
                                                <td class="mailbox-name"> <?php echo $stdlist['date']; ?></td>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $stdlist['student_name']; ?></a>
                                                </td>
                                                <td class="mailbox-name"> <?php echo $stdlist["invoice_no"]; ?>
                                                </td>
                                                <!-- <td class="mailbox-name"> </td> -->
                                                <td class="mailbox-name text-right" ><?php echo number_format($stdlist['total_paid_fee'], 2); ?></td>
                                                <td class="mailbox-name text-right">
                                                    <?php if($stdlist['total_discount'] > 0){?>
                                                    <?php echo $stdlist['total_discount']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td class="mailbox-name text-right">
                                                    <?php if($stdlist['total_fine'] > 0){?>
                                                    <?php echo $stdlist['total_fine']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td class="mailbox-name text-right"><?php echo number_format($stdlist['total_net_amount'], 2); ?> </td>
                                                <td class="mailbox-date pull-right">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) {
                                                        ?>
                                                        <a data-placement="left" href="javascript:" data-student_id="<?php echo $stdlist['student_id']; ?>"
                                                            data-invoice_no="<?php echo $stdlist['invoice_no']; ?>" data-fee_date="<?php echo $stdlist['date']; ?>"
                                                            data-bank_account_id="<?php echo $stdlist['bank_account_id']; ?>" data-reference_number="<?php echo $stdlist['reference_number']; ?>" data-payment_mode="<?php echo $stdlist['payment_mode']; ?>" data-total_fine="<?php echo $stdlist['total_fine']; ?>" data-total_discount="<?php echo $stdlist['total_discount']; ?>" data-total_paid_fee="<?php echo $stdlist['total_paid_fee']; ?>" class="btn btn-default btn-xs collectSelected"  data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                    
                                                </td>

                                            </tr>
                                            
                                        <?php } ?>
                                        <tr><td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($total_paid_fee, 2);?>
                                            </td>
                                            <td style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($total_discount, 2);?>
                                            </td>
                                            <td style="text-align: right;font-size: 14px; font-weight:600">Total: <?php echo $currency_symbol . number_format($total_fine, 2);?>
                                            </td>
                                            <td style="text-align: right;font-size: 14px; font-weight:600">Net Total: <?php echo $currency_symbol . number_format($total_net_amount, 2);?>
                                            </td>
                                            <td></td>
                                        </tr>
                                   <?php  } ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
             <?php } ?>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="delmodal modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('confirmation'); ?></h4>
            </div>

            <div class="modal-body">

                <p>Are you sure want to delete <b class="invoice_no"></b> invoice, this action is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
                <input type="hidden" name="main_invoice"  id="main_invoice" value="">
                <input type="hidden" name="sub_invoice" id="sub_invoice"  value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <a class="btn btn-danger btn-ok"><?php echo $this->lang->line('revert'); ?></a>
            </div>
        </div>
    </div>
</div>
<div id="listCollectionModal" class="modal fade">
    <div class="modal-dialog" style="width:80%">
        <form action="<?php echo site_url('studentfee/addfeegrp'); ?>" method="POST" id="collect_fee_group">
            <div class="modal-content">
                <div class="modal-header themecolor">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Fee Receipt Voucher</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer"></div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('#listCollectionModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
    });

    $(document).on('click', '.collectSelected', function () {
            var base_url = '<?php echo base_url() ?>';
            var student_id = $(this).data('student_id');
            var invoice_no = $(this).data('invoice_no');
            var fee_date = $(this).data('fee_date');
            var bank_account_id = $(this).data('bank_account_id');
            var reference_number = $(this).data('reference_number');
            var payment_mode = $(this).data('payment_mode');
            var total_fine = $(this).data('total_fine');
            var total_discount = $(this).data('total_discount');
            var total_paid_fee = $(this).data('total_paid_fee');
            //alert(student_id); return false;
            $.ajax({
                type: 'POST',
                url: base_url + "studentfee/getCollectFeeView",
                data: {'student_id':student_id,'invoice_no':invoice_no,'fee_date':fee_date,'bank_account_id':bank_account_id,'reference_number':reference_number,'payment_mode':payment_mode,'total_fine':total_fine,'total_discount':total_discount,'total_paid_fee':total_paid_fee},
                dataType: "html",
                beforeSend: function () {
                    //$this.button('loading');
                },
                success: function (data) {

                    //console.log(data);

                    $("#listCollectionModal .modal-body").html(data);
                    // $(".date").datepicker({
                    //     format: date_format,
                    //     autoclose: true,
                    //     language: '<?php echo $language_name; ?>',
                    //     endDate: '+0d',
                    //     todayHighlight: true
                    // });
                    $("#listCollectionModal").modal('show');
                 //   $this.button('reset');
                },
                error: function (xhr) { // if error occured
                    alert("Error occured.please try again");

                },
                complete: function () {
                    //$this.button('reset');
                }
            });

        });

    // function getStdSection(class_id, section_id) {
    // }

    $('#confirm-delete').on('show.bs.modal', function (e) {
        $('.invoice_no', this).text("");
        $('#main_invoice', this).val("");
        $('#sub_invoice', this).val("");

        $('.invoice_no', this).text($(e.relatedTarget).data('invoiceno'));
        $('#main_invoice', this).val($(e.relatedTarget).data('main_invoice'));
        $('#sub_invoice', this).val($(e.relatedTarget).data('sub_invoice'));


    });

    $(document).on('click', '.btn-ok', function (e) {
        var $modalDiv = $(e.delegateTarget);
        var main_invoice = $('#main_invoice').val();
        var sub_invoice = $('#sub_invoice').val();

        $modalDiv.addClass('modalloading');
        $.ajax({
            type: "post",
            url: '<?php echo site_url("studentfee/deleteFee") ?>',
            dataType: 'JSON',
            data: {'main_invoice': main_invoice, 'sub_invoice': sub_invoice},
            success: function (data) {
                $modalDiv.modal('hide').removeClass('modalloading');
                location.reload(true);
            }
        });
    });

    $(document).on('change', '#studentsLists', function (e) {
        
        var path  = '<?php echo base_url('studentfee/addfee/'); ?>'+$(this).val();
        window.location = path ;
        
    });

    $(document).on('change', '#section_id', function (e) {
        $('#studentsLists').html("");
        var class_id    = $('#class_id').val();
        var section_id  = $('#section_id').val();
        //var class_id = $(this).val();
        //alert(section_id);
        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
            type: "GET",
            url: base_url + "studentfee/getStudentsBySectionAndByClass",
            data: {'class_id': class_id,'section_id': section_id},
            dataType: "json",
            success: function (data) {
                //console.log(data);
                $.each(data, function (i, obj)
                {
                    div_data += "<option value=" + obj.id + ">" + obj.admission_no + ' - ' + obj.firstname + ' - '+ obj.lastname + ' S/O ' + obj.father_name + ' - ' + obj.class +"</option>";
                });
                $('#studentsLists').append(div_data);
            }
        });

    });
   
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

<script type="text/javascript">

    $(document).ready(function() {
    var table = $('#example').removeAttr('width').DataTable( {
        paging: true,
        searching: true,
        "columnDefs": [
          { "width": "60px", "targets": 0 },
          { "width": "250px", "targets": 1 },
          { "width": "50px", "targets": 2 },
          { "width": "50px", "targets": 3 },
        ],
        fixedColumns: true
    } );
} );

// $(document).ready(function () {
//     $('#example_table').DataTable({
        
        
//     });
// });
</script>