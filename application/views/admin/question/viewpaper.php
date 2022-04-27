<style type="text/css" media="screen">
	p{
		font-size: 11px;
	}
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php //echo $this->lang->line('student_information'); ?>
        </h1>
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
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">View paper</h3>                   
                    </div>
                    <div class="box-body">
                        	<div class="row">
                                	<div class="col-md-2 text-center 2">
                                		<img src="" alt="No image">
                                	</div>
                                	<div class="col-md-8">
                                		<h3 class="text-center">Hira Model School</h3>
                                		<h4 class="text-center"><?php echo $viewpaper->subject_name; ?>  Model Question Paper</h4>
                                	</div>
                                	<div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                	<div class="col-md-2"></div>
                                	<div class="col-md-3">
                                		<table class="table table-striped table-bordered table-hover">
                                			<tr>
                                				<td>
                                					<b>Time Allowed</b>
                                				</td>
                                				<td class="table-bordered">
                                					<td colspan="2"><?php echo $viewpaper->time_duration; ?> Minutes</td>
                                				</td>
                                			</tr>
                                		</table>
                                	</div>

                                	<div class="col-md-3">
                                		<table class="table table-striped table-bordered table-hover">
                                			<tr>
                                				<td>
                                					<b>Marks</b>
                                				</td>
                                				<td class="table-bordered">
                                					<td colspan="2">20</td>
                                				</td>
                                			</tr>
                                		</table>
                                	</div>

                                	<div class="col-md-3">
                                		<table class="table table-striped table-bordered table-hover">
                                			<tr>
                                				<td>
                                					<b>Paper Date</b>
                                				</td>
                                				<td class="table-bordered">
                                					<td colspan="2"><?php echo $viewpaper->paper_date; ?></td>
                                				</td>
                                			</tr>
                                		</table>
                                	</div> 
                                	
                                </div><hr>
                                	<div class="row justify-content">
                                		<div class="col-md-1"></div>
                                		<div class="col-md-1">
                                			<b class="text-center">Subject:</b>
                                		</div>
                                		<div class="col-md-1">
                                			<p><?php echo $viewpaper->subject_name; ?></p>
                                		</div>

                                		<div class="col-md-1">
                                			<b class="text-center">Class:</b>
                                		</div>
                                		<div class="col-md-1">
                                			<p><?php echo $viewpaper->class_name; ?></p>
                                		</div>

                                		<div class="col-md-1">
                                			<b class="text-center">Section:</b>
                                		</div>
                                		<div class="col-md-1">
                                			<p><?php echo $viewpaper->section_name; ?></p>
                                		</div>

                                		<div class="col-md-2">
                                			<b class="text-center">Paper type:</b>
                                		</div>
                                		<div class="col-md-1">
                                			<p><?php echo $viewpaper->paper; ?></p>
                                		</div>
                                		<div class="col-md-1">
                                			<b class="text-center">Exam:</b>
                                		</div>
                                		<div class="col-md-1">
                                			<p><?php echo $viewpaper->exam_group; ?></p>
                                		</div>
                                		
                                	</div><hr>

                                	<div class="row">
                                		<div class="col-md-1"></div>
	                                		<div class="col-md-10">
	                                			<hr style="border: 1px solid black">
	                                			<div class="col-md-1">
	                                				<strong>
	                                					Note:
	                                				</strong>
	                                			</div>
	                                			<div class="col-md-11">
	                        <p><b> Section-A is compulsory. All parts of this section are to be answered on the separately provided OMR Answer Sheet which should be completed in the first 25 minutes and handed over to the Centre Superintendent. Do not use lead pencil<b></p>
	                                			</div>
	                                			<hr style="border: 1px solid black">
	                                		</div>
	                                	
                                		<!-- End center align wali div -->
                                	</div>
                                	<div class="row">
                                		<div class="col-md-1 text-right">
                                			<strong>
                                				*
                                			</strong>
                                		</div>
                                		<div class="col-md-10 text-left">
                                			<p> <strong>Choose the correct answer ie. A / B/C / D by filling the relevant bubble for each question on the OMR Answer Sheet according to the instructions given there. Each part carries one mark.</strong></p>
                                		</div>
                                	</div>
                                	<?php $count = 0; 
                                	//print_r($obj_questions[0]['question']); die();
                                	for($i = 0; $i<count($obj_questions); $i++){
                                			$count++;
                                			//print_r($obj_questions[$i]['question']); die(); 
                                		?>
                                		<div class="row">
                                		<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q <?php echo $count;?>.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p><?php echo $obj_questions[$i]['question']; ?></p>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-10">
                                				<div class="col-md-1 text-center"> <strong> <p>A</p> </strong> </div>
                                			    <div class="col-md-5"> <p><?php echo $obj_questions[$i]['opt_a']; ?></p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>B</p> </strong></div>
                                			    <div class="col-md-5"> <p><?php echo $obj_questions[$i]['opt_a']; ?></p> </div>

                                			    <div class="col-md-1 text-center"> <strong> <p>C</p> </strong> </div>
                                			    <div class="col-md-5"> <p><?php echo $obj_questions[$i]['opt_c']; ?></p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>D</p> </strong></div>
                                			    <div class="col-md-5"> <p><?php echo $obj_questions[$i]['opt_d']; ?></p> </div>
                                		</div>
                                		
                                </div><br>
                            <?php } ?>
                                	<!-- question on increment -->
                                		<!-- <div class="row">
                                		<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q 2.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p>
                                					According to Muhammad Ali Jinnah, In Jinnah’s Vision of Pakistan, which bad legacy has been passed down to us?
                                				</p>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-10">
                                				<div class="col-md-1 text-center"> <strong> <p>A</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>B</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>

                                			    <div class="col-md-1 text-center"> <strong> <p>C</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>D</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                		</div>
                                		
                                </div><br> -->
                                <!-- question on increment -->
                			<!-- 		<div class="row">
                                		<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q 1.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p>
                                					According to Muhammad Ali Jinnah, In Jinnah’s Vision of Pakistan, which bad legacy has been passed down to us?
                                				</p>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-10">
                                				<div class="col-md-1 text-center"> <strong> <p>A</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>B</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>

                                			    <div class="col-md-1 text-center"> <strong> <p>C</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>D</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                		</div>
                                		
                                </div><br> -->
                                
                                <!-- question on increment -->
                               
                            	<!-- <div class="row">
                                		<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q 3.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p>
                                					According to Muhammad Ali Jinnah, In Jinnah’s Vision of Pakistan, which bad legacy has been passed down to us?
                                				</p>
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-10">
                                				<div class="col-md-1 text-center"> <strong> <p>A</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>B</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>

                                			    <div class="col-md-1 text-center"> <strong> <p>C</p> </strong> </div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                			    <div class="col-md-1 text-center"><strong> <p>D</p> </strong></div>
                                			    <div class="col-md-5"> <p>Bribery and corruption</p> </div>
                                		</div>
                                		
                                </div><br> -->
                                <!-- question on increment -->
                           
                       <!--  </div> -->
                    </div>
                    <?php $subjectiv_counter = 0; ?>
                    <div class="row">
                    	<h3 class="text-center">Subjective Question</h3>
                    	<?php if(empty($subjective_questions)){

                    		echo '<h5 class="text-danger text-center">No Question Found</h5>';
                    	}
                    	for($k = 0; $k<count($subjective_questions); $k++){
                    		$subjectiv_counter++;
                    	?>
                    	<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q <?php echo $subjectiv_counter;?>.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p><?php echo $subjective_questions[$k]['question_value']; ?></p>
                                			</div>
                                		</div>
                                	<?php }?>
                    </div>
                    <footer class="page-footer bg-gradient-primary">
						  <!-- Copyright -->
						  <div class="footer-copyright text-center py-3">© 2021 Hira Model School
						  </div>
						  <!-- Copyright -->
					</footer>
                </div>
            </div> 

        </div> 
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
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