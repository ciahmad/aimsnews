
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
             <i class="fa fa-user-plus"></i> <?php //echo 1;  //$this->lang->line('student_information'); ?>

        </h1>
    </section> 
    <style type="text/css" media="screen">
        td{
            border: none !important;
        }
        tr{
            border: none !important;
        }
        p{ margin: 0 0 0px !important; }

        
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                     <?php //echo 3; die(); ?>
              <!--   <div class="box box-primary"> -->
                <div class="">
                    <div class="">
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive">
                            <tr>
                                <?php //print_r($sch_setting->name); die(); ?>
                                <td  colspan="4">
                                    <h2><?php echo $sch_setting->name; ?></h2>
                                     <p>Address : <?php echo  $sch_setting->address; ?> </p>
                                     <p>Phone : <?php echo  $sch_setting->phone; ?> E-mail : <?php echo  $sch_setting->phone; ?> </p>
                                </td>
                                <td class="align-right" style="float: right;">
                                    <img style="width: 80px;" src="<?php echo base_url('uploads/school_content/admin_logo/'. $sch_setting->image);?>" alt="no image">
                                    <!-- image -->
                                </td>
                            </tr>
                        </table> <hr style=" margin-top: 0px; margin-bottom: 0px; border: 1px solid black !important">

                        <table class="table">
                            <tr>
                                
                                <td class="text-left" style="width: 30%">
                                   <!--  <img width="100" style="border-radius: 30%; height: 70px" src="<?php echo base_url('uploads/student_images/'. $student['image']);?>" alt="no image"> -->
                                   <img width="60" src="<?php
                                                    if (!empty($stvalue["image"])) {
                                                        echo base_url() . $stvalue["image"];
                                                    } else {
                                                        
                                                        if($student['gender']== 'Female'){
                                                             echo base_url() . "uploads/student_images/default_female.jpg";
                                                        }elseif($student['gender']== 'Male'){
                                                             echo base_url() . "uploads/student_images/default_male.jpg";
                                                        }
                                                       
                                                    }
                                                    ?>" alt="User Image">
                                </td>
                                <td class="text-center" style="width: 40%">
                                    <h4><?php  echo $student['firstname']." ". $student['lastname']?></h4>
                                    <p> <b> ( Student )</b></p>
                                
                                </td>
                                <td class="text-right" style="width: 30%">
                                    <h4>Bar Code </h4>
                                </td>
                            </tr> 
                        </table>
                    <section>
                        <section>
                            <table class="table">
                                 <tr>
                                <td style="width: 100%">
                                    <h3  class="pagetitleh2">Official</h3>
                                </td>
                            </tr>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php //print_r($taff); die(); ?>
                                        <td><b>Admission No</b></td> <td><?php echo $student['admission_no']?></td>
                                        <td><b>Roll Number</b></td> <td><?php echo $student['roll_no']?></td>
                                        <td><b>Class</b></td> <td><?php echo $student['class']?></td>
                                        <td><b>Section</b></td> <td><?php echo $student['section']?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><b>RTE</b></td> <td><?php echo $student['rte']?></td>
                                         <td><b>Gender</b></td> <td><?php echo $student['gender']?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>

                              <table class="table">
                                 <tr>
                                <td style="width: 100%">
                                    <h3  class="pagetitleh2">Personal Information</h3>
                                </td>
                            </tr>
                            </table>
                            <table class="table">
                                
                                <thead>
                                    <tr>
                                        <td><strong>Admission Date</strong></td> <td><?php echo $student['admission_date']?></td>
                                        <td><strong>Date of Birth</strong></td><td><?php echo $student['dob']?></td>
                                        <td><strong>Category</strong></td><td><?php echo $student['category_id']?></td>
                                    </tr>                                   
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><strong>Mobile Number</strong></td><td><?php echo $student['mobileno']?></td>
                                        <td><strong>Caste</strong></td> <td><?php echo $student['Caste']?></td>
                                        <td><strong>Religion</strong></td><td><?php echo $student['religion']?></td>
                                    </tr>
                                </tbody>
                            </table>

                             <table class="table">
                                <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Address</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr> 
                                        <td> <strong>Current Address</strong> </td><td><?php echo $student['current_address']?></td>
                                        <td> <strong>Permanent Address</strong> </td><td><?php echo $student['permanent_address']?></td>
                                    </tr>
                                </thead>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Parent / Guardian Details</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                    <tr>
                                        <td> <strong>Father Name</strong> </td><td><?php echo $student['father_name']; ?></td>
                                        <td> <strong>Father Phone</strong> </td><td><?php echo $student['father_phone']; ?></td>
                                        <td> <strong>Father Occupation</strong> </td><td><?php echo $student['father_occupation']; ?></td>
                                        <td><img width="40" class="" src="<?php
                                                if (!empty($student["father_pic"])) {
                                                    echo base_url() . $student["father_pic"];
                                                } else {
                                                    echo base_url() . "uploads/student_images/no_image.png";
                                                }
                                                ?>" ></td>
                                    </tr>

                                     <tr>
                                        <td> <strong>Mother Name</strong> </td><td><?php echo $student['mother_name']; ?></td>
                                        <td> <strong>Mother Phone</strong> </td><td><?php echo $student['mother_phone']; ?></td>
                                        <td> <strong>Mother Occupation</strong> </td><td><?php echo $student['mother_occupation']; ?></td>
                                        <td><img width="40" class="" src="<?php
                                                if (!empty($student["mother_pic"])) {
                                                    echo base_url() . $student["mother_pic"];
                                                } else {
                                                    echo base_url() . "uploads/student_images/no_image.png";
                                                }
                                                ?>" ></td>
                                    </tr>

                                     <tr>
                                        <td> <strong>Guardian Name</strong> </td><td><?php echo $student['guardian_name']; ?></td>
                                        <td> <strong>Guardian Email</strong> </td><td><?php echo $student['guardian_email']; ?></td>
                                        <td> <strong>Guardian Relation</strong> </td><td><?php echo $student['guardian_relation']; ?></td>
                                        <td><img width="40" class="" src="<?php
                                                if (!empty($student["guardian_pic"])) {
                                                    echo base_url() . $student["guardian_pic"];
                                                } else {
                                                    echo base_url() . "uploads/student_images/no_image.png";
                                                }
                                                ?>" ></td>
                                    </tr>

                                     <tr>
                                        <td> <strong>Guardian Phone</strong> </td><td><?php echo $student['guardian_phone']; ?></td>
                                        <td> <strong>Guardian Occupation</strong> </td><td><?php echo $student['guardian_occupation']; ?></td>
                                        <td> <strong>Guardian Address</strong> </td><td><?php echo $student['guardian_address']; ?></td>
                                    </tr>
                            </table>

                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Miscellaneous Details</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                     <td> <strong>Blood Group</strong> </td><td><?php echo $student['blood_group']; ?></td>
                                        <td> <strong>Student House</strong> </td><td><?php echo $student['house_name']; ?></td>
                                        <td> <strong>Height</strong> </td><td><?php echo $student['height']; ?></td>
                                        <td> <strong>Weight</strong> </td><td><?php echo $student['weight']; ?></td>
                                    </tr>

                                    <tr>
                                     <td> <strong>As on Date</strong> </td><td><?php echo $student['measurement_date']; ?></td>
                                        <td> <strong>Previous School Details</strong> </td><td><?php echo $student['previous_school']; ?></td>
                                        <td> <strong>National Identification Number</strong> </td><td><?php echo $student['national_identification_no']; ?></td>
                                    </tr>

                                    <tr>
                                     <td> <strong>Bank Account Number</strong> </td><td><?php echo $student['bank_account_no']; ?></td>
                                        <td> <strong>Bank Name</strong> </td><td><?php echo $student['bank_name']; ?></td>
                                        <td> <strong>IFSC Code</strong> </td><td><?php echo $student['ifsc_code']; ?></td>
                                    </tr>

                                </thead>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Fees</h3>
                                    </td>
                                </tr>
                            </table>

                             <?php
                            if (empty($student_due_fee) && empty($student_discount_fee)) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->lang->line('no_record_found'); ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="">    
                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('fees_group'); ?></th>
                                                <th><?php echo $this->lang->line('fees_code'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('due_date'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('status'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-left"><?php echo $this->lang->line('payment_id'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('mode'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('date'); ?></th>
                                                <th class="text text-right" ><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('paid'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('balance'); ?></th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_amount = 0;
                                            $total_deposite_amount = 0;
                                            $total_fine_amount = 0;
                                            $total_discount_amount = 0;
                                            $total_balance_amount = 0;
                                            $alot_fee_discount = 0;

                                            foreach ($student_due_fee as $key => $fee) {

                                                foreach ($fee->fees as $fee_key => $fee_value) {
                                                    $fee_paid = 0;
                                                    $fee_discount = 0;
                                                    $fee_fine = 0;
                                                    $alot_fee_discount = 0;


                                                    if (!empty($fee_value->amount_detail)) {
                                                        $fee_deposits = json_decode(($fee_value->amount_detail));

                                                        foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                            $fee_paid = $fee_paid + $fee_deposits_value->amount;
                                                            $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                                                            $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                                                        }
                                                    }
                                                    $total_amount = $total_amount + $fee_value->amount;
                                                    $total_discount_amount = $total_discount_amount + $fee_discount;
                                                    $total_deposite_amount = $total_deposite_amount + $fee_paid;
                                                    $total_fine_amount = $total_fine_amount + $fee_fine;
                                                    $feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
                                                    $total_balance_amount = $total_balance_amount + $feetype_balance;
                                                    ?>
                                                    <?php
                                                    if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date('Y-m-d'))) {
                                                        ?>
                                                        <tr class="danger font12">
                                                            <?php
                                                        } else {
                                                            ?>
                                                        <tr class="dark-gray">
                                                            <?php
                                                        }
                                                        ?>


                                                        <td><?php
                                                            echo $fee_value->name;
                                                            ?></td>
                                                        <td><?php echo $fee_value->code; ?></td>
                                                        <td class="text text-left">

                                                            <?php
                                                            if ($fee_value->due_date == "0000-00-00") {
                                                                
                                                            } else {

                                                                echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->due_date));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text text-left">
                                                            <?php
                                                            if ($feetype_balance == 0) {
                                                                ?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
                                                            } else if (!empty($fee_value->amount_detail)) {
                                                                ?><span class="label label-warning"><?php echo $this->lang->line('partial'); ?></span><?php
                                                            } else {
                                                                ?><span class="label label-danger"><?php echo $this->lang->line('unpaid'); ?></span><?php
                                                                }
                                                                ?>

                                                        </td>
                                                        <td class="text text-right"><?php echo $fee_value->amount; ?></td>

                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>


                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_discount, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_fine, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_paid, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            $display_none = "ss-none";
                                                            if ($feetype_balance > 0) {
                                                                $display_none = "";
                                                                echo (number_format($feetype_balance, 2, '.', ''));
                                                            }
                                                            ?>

                                                        </td>




                                                    </tr>

                                                    <?php
                                                    if (!empty($fee_value->amount_detail)) {

                                                        $fee_deposits = json_decode(($fee_value->amount_detail));

                                                        foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                            ?>
                                                            <tr class="white-td">
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
                                                                <td class="text text-left">


                                                                    <a href="#" data-toggle="popover" class="detail_popover" > <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
                                                                    <div class="fee_detail_popover" style="display: none">
                                                                        <?php
                                                                        if ($fee_deposits_value->description == "") {
                                                                            ?>
                                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>


                                                                </td>
                                                                <td class="text text-left"><?php echo $fee_deposits_value->payment_mode; ?></td>
                                                                <td class="text text-center">

                                                                    <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
                                                                </td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_discount, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_fine, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount, 2, '.', '')); ?></td>


                                                                <td></td>



                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($student_discount_fee)) {

                                                foreach ($student_discount_fee as $discount_key => $discount_value) {
                                                    ?>
                                                    <tr class="dark-light">
                                                        <td align="left"> <?php echo $this->lang->line('discount'); ?> </td>
                                                        <td align="left">
                                                            <?php echo $discount_value['code']; ?>
                                                        </td>
                                                        <td align="left"></td>
                                                        <td align="left" class="text text-left">
                                                            <?php
                                                            if ($discount_value['status'] == "applied") {
                                                                ?>
                                                                <a href="#" data-toggle="popover" class="detail_popover" >

                                                                    <?php echo $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']) . " : " . $discount_value['payment_id']; ?>

                                                                </a>
                                                                <div class="fee_detail_popover" style="display: none">
                                                                    <?php
                                                                    if ($discount_value['student_fees_discount_description'] == "") {
                                                                        ?>
                                                                        <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <p class="text text-danger"><?php echo $discount_value['student_fees_discount_description'] ?></p>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <?php
                                                            } else {
                                                                echo '<p class="text text-danger">' . $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']);
                                                            }
                                                            ?>

                                                        </td>
                                                        <td></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td  class="text text-right">
                                                            <?php
                                                            $alot_fee_discount = $alot_fee_discount;
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <tr class="box box-solid total-bg">
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td class="text text-right" ><?php echo $this->lang->line('grand_total'); ?></td>
                                                <td class="text text-right"><?php
                                                    echo ($currency_symbol . number_format($total_amount, 2, '.', ''));
                                                    ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                                <td class="text text-right"><?php
                                                    echo ($currency_symbol . number_format($total_discount_amount + $alot_fee_discount, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo ($currency_symbol . number_format($total_fine_amount, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo ($currency_symbol . number_format($total_deposite_amount, 2, '.', ''));
                                                    ?></td>

                                                <td class="text text-right"><?php
                                                    echo ($currency_symbol . number_format($total_balance_amount - $alot_fee_discount, 2, '.', ''));
                                                    ?></td> 

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>    
                                <?php
                            }
                            ?>

                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Documents</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>    <?php //echo ; die(); ?>
                                       <td> <strong>id</strong></td><td><?php  echo $student_doc[0]['id'];?></td>
                                        <td> <strong>Title</strong></td> <td><?php echo $student_doc[0]['title'];   ?></td>
                                        <td> <strong>document</strong></td> <td><?php echo $student_doc[0]['doc'];   ?></td>                                       
                                    </tr>
                                </thead>
                            </table>

                        </section>
                </div>
            </div>
        </div> 
<div class="box-footer">
    <style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
                                <button type="submit" id="printbtn" class="btn btn-info pull-right" onclick="window.print()">Print Student Detail</button>
                             <!--    <button id="printPageButton" onClick="window.print();">Print</button> -->
                            </div>
        </div> 
    </section>
</div>
<script type="text/javascript">

    $(document).ready(function () {
          $('#PrintDiv').css('visibility', 'hidden');
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
   });

      function getsection(){
             var class_id = $('#class_id option:selected').val();
        $.ajax({
            type: "POST",
            url: baseurl + 'admin/generatepaper/getsection',
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
            }
            // error: function (xhr) { 

            //     alert("Error occured.please try again");
            //     $('.loading-overlay').css("display", "none");
            // },
            // complete: function () {
            //     $('.loading-overlay').css("display", "none");
            // }
        });
            
     }

    
</script>