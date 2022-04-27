
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
             <i class="fa fa-user-plus"></i> <?php echo 1;  //$this->lang->line('student_information'); ?>

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
                     
              <!--   <div class="box box-primary"> -->
                <div class="">
                    <div class="">
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive">
                            <tr>
                                <td  colspan="4"><?php 
                                    $this->userdata = $this->customlib->getuserdata();
                                   // echo '<pre>';print_r($sch_sett); die();
                                ?>
                                    <?php   $this->userdata = $this->customlib->getuserdata(); //echo '<pre>'; print_r($this->userdata); die();  ?>
                                    <h2><?php echo $sch_sett[0]['name']; ?></h2>
                                     <p>Address : <?php echo  $sch_sett[0]['address']; ?> </p>
                                     <p>Phone : <?php echo  $sch_sett[0]['phone']; ?> E-mail : <?php echo  $sch_sett[0]['phone']; ?> </p>
                                </td>
                                <td class="align-right" style="float: right;">
                                    <img  src="<?php echo base_url('uploads/school_content/admin_logo/'. $sch_sett[0]['admin_small_logo']);?>" alt="no abc image">
                                </td>
                            </tr>
                        </table> <hr style=" margin-top: 0px; margin-bottom: 0px; border: 1px solid black !important">

                        <table class="table">
                            <tr>
                                
                                <td class="text-left" style="width: 30%">
                                    <img width="100" style="border-radius: 30%; height: 70px" src="<?php echo base_url('uploads/staff_images/'. $staff['image']);?>" alt="no abc image">
                                </td>
                                <td class="text-center" style="width: 40%">
                                    <h4><?php  echo $staff['name']." ". $staff['surname']?></h4>
                                    <p> <b> ( <?php echo $this->userdata['user_type'];  ?> )</b></p>
                                    <h5>Staff Information</h5>
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
                                        <td><b>Staff ID</b></td> <td><?php echo $staff['employee_id']?></td>
                                        <td><b>Staff ID</b></td> <td><?php echo $staff['user_type']?></td>
                                        <td><b>Designation</b></td> <td><?php echo $staff['designation']?></td>
                                        <td><b>Department</b></td> <td><?php echo $staff['department']?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><b>EPF No</b></td> <td><?php echo $staff['epf_no']?></td>
                                         <td><b>Basic Salary</b></td> <td><?php echo $staff['basic_salary']?></td>
                                         <td><b>Contract Type</b></td> <td><?php echo $staff['contract_type']?></td>
                                         <td><b>Work Shift</b></td> <td><?php echo $staff['']?></td>
                                    </tr>
                                    <tr>
                                         <td><b>Location</b></td> <td><?php echo $staff['location']?></td>
                                         <td><b>Date Of Joining</b></td> <td><?php echo $staff['date_of_joining']?></td>
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
                                        <td><strong>Phone</strong></td> <td><?php echo $staff['contact_no']?></td>
                                        <td><strong>Emergency Contact Number</strong></td><td><?php echo $staff['emergency_contact_no']?></td>
                                        <td><strong>Email</strong></td><td><?php echo $staff['email']?></td>
                                        
                                       
                                    </tr>                                   
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><strong>Gender</strong></td><td><?php echo $staff['gender']?></td>
                                        <td><strong>Date of Birth</strong></td> <td><?php echo $staff['dob']?></td>
                                        <td><strong>Marital Status</strong></td><td><?php echo $staff['marital_status']?></td>
                                       
                                    </tr>
                                      <tr>
                                         <td><strong>Father Name</strong></td><td><?php echo $staff['father_name']?></td>
                                        <td><strong>Mother Name</strong></td><td><?php echo $staff['mother_name']?></td>
                                        <td><strong>Qualification</strong></td><td><?php echo $staff['qualification']?></td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Work Experience</strong></td><td><?php echo $staff['work_exp']?></td>
                                        <td><strong>Note</strong></td><td><?php echo $staff['note']?></td>
                                     <td><strong>Setup</strong></td><td><?php echo $staff['note']?></td>
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
                                        <td> <strong> Current Address</strong> </td><td><?php echo $staff['local_address']?></td>
                                        <td> <strong>Permanent Address </strong> </td><td><?php echo $staff['permanent_address']?></td>
                                       
                                    </tr>
                                </thead>
                            </table>

                            <table class="table">
                                  
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Bank Account Details</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                    <tr>
                                        <td> <strong>Name </strong> </td><td><?php echo $staff['name']." ".$staff['surname']; ?></td>
                                        <td> <strong>Bank Name </strong> </td><td><?php echo $staff['bank_name']; ?></td>
                                        <td> <strong>Bank Branch Name</strong> </td><td><?php echo $staff['bank_branch']; ?></td>
                                    </tr>

                                    <tr>
                                        <td> <strong>Bank Account Number</strong> </td><td><?php echo $staff['bank_account_no']; ?></td>
                                        <td> <strong>IFSC Code</strong> </td><td><?php echo $staff['ifsc_code']; ?></td>
                                    </tr>
                            </table>

                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Social Media Link</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                     <td> <strong>Facebook URL</strong> </td><td><?php echo $staff['facebook']; ?></td>
                                        <td> <strong>Twitter URL</strong> </td><td><?php echo $staff['twitter']; ?></td>
                                      
                                    </tr>

                                    <tr>
                                         <td> <strong>Linkedin URL</strong> </td> <td><?php echo $staff['linkedin']; ?></td>
                                        <td> <strong>Instagram URL</strong> </td> <td><?php echo $staff['instagram']; ?></td>
                                    </tr>
                                </thead>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Payroll</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                    <td> <strong> Total Net Salary Paid</strong> </td> <td>Rs <?php echo $staff['net_salary']; ?></td>
                                        <td> <strong>Total Gross Salary </strong> </td> <td>Rs <?php echo $staff['']; ?></td>
                                        
                                    </tr>
                                     <tr>
                                         <td> <strong>Total Earning </strong> </td> <td>Rs <?php echo $staff['earnings']; ?></td>
                                        <td> <strong>Total Deduction </strong> </td>  <td>Rs <?php echo $staff['deduction']; ?></td>
                                     </tr>
                                </thead>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Leaves</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <?php //print_r($leavedetails[2]['alloted_leave']); die(); ?>
                                    <tr>
                                        <td> <strong>Sick Leave</strong></td> <td> <?php echo $leavedetails[0]['alloted_leave']; ?></td>
                                        <td> <strong> Leave</strong></td><td> <?php echo $leavedetails[1]['alloted_leave']; ?></td>
                                        <td> <strong>Holidays Leave</strong></td><td> <?php echo $leavedetails[2]['alloted_leave']; ?></td>
                                        <td> <strong>Absent</strong></td><td> <?php echo $leavedetails[3]['alloted_leave'] ?></td>
                                    </tr>
                                </thead>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Attendance</h3>
                                    </td>
                                </tr>
                            </table>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <td> <strong>Total Present</strong> </td> <td><?php echo count($attendencetypeslist[1]['key_value']);?></td>
                                        <td> <strong>Total Late</strong> </td><td><?php echo count($attendencetypeslist[2]['key_value']);?></td>
                                        <td> <strong>Total Absent</strong> </td><td><?php echo count($attendencetypeslist[3]['key_value']);?></td>
                                        <td> <strong>Total Half Day</strong> </td>  <td><?php echo count($attendencetypeslist[4]['key_value']);?></td>
                                       <!--  <td> <strong>Total Holiday</strong> </td> -->
                                    </tr>
                                </thead>
                            </table>


                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Documents</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>    
                                       <td> <strong>Resume</strong></td><td><?php if(!empty($staff['resume'])){ echo "Uploded"; }else{ echo "please Upload Resume"; }?></td>
                                        <td> <strong>Joining Letter</strong></td> <td><?php if(!empty($staff['joining_letter'])){ echo "Uploded"; }else{ echo "please Upload Joining Letter"; }?></td>
                                        <td> <strong>Resignation Letter</strong></td><td><?php if(!empty($staff['resignation_letter'])){ echo "Uploded"; }else{ echo "please Upload Resignation Letter"; }?></td>
                                        <td> <strong>Other Documents</strong></td><td><?php if(!empty($staff['other_document_file'])){ echo "Uploded"; }else{ echo "please Upload Other Documents"; }?></td>
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
                                <button type="submit" id="printbtn" class="btn btn-info pull-right" onclick="window.print()">Print Profile Report</button>
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