
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> Hello World
        </h1>
        <p>hello world </p>
    </section> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('generate_paper', 'can_view')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">             
                <div class="">
                    <div class="">
                    </div>
                    <div class="box-body">
                        <table class="table">                          
                            <tbody>
                                <tr>
                                    <td style="width: 40%">
                                      <!--   <img src="<?php echo base_url('uploads/school_content/logo/'. $school_setting->image);?>" alt="no image"> -->
                                    </td>
                                    
                                    <td style="width: 60%" class="">
                                        <h3 class="">Hira Model School</h3>
                                        <p>Upload Objective Question CSV File</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <p class="box box-primary"></p>

                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?php echo base_url('admin/question/importfile');?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="form-group">
                                        <label>Upload csv Question File</label>
                                        <input style="opacity: 5" type="file" id="" name="file" size="150" />
                                    </div>
                                    <div class="form-group">
                                         <input type="submit" value="Submit" class="btn btn-success" name="submit">
                                    </div>
                                    
                                    
                                </form>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>


                    </div>
                    
                    
                </div>
            </div> 
            <div class="box-footer">
                
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