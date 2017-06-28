<body>
	<!-- <div id="loadIndicator" class="col s4 m4 l4 offset-s4 offset-m4 offset-l4 loader z-depth-2" style="width:230px; height: 50px;padding: 20px 10px 40px 10px;margin-top: 10px;border-radius: 2px;background-color: white;position:absolute;z-index: 9999;display: block;">
	 	<div class="progress">
	 		<div class="indeterminate blue"></div>
	 	</div>
	    <p style="margin-top: -10px;">Loading ..</p>
	 </div> -->
	<div id="pend_body" class="pend_body animated fadeIn" style="margin-top: 10px;">
	<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">done_all</i>Approved Students' List</h5>
		<?php 
			require_once '../inc/connection.php';
			$overall_query = "SELECT * FROM register WHERE Profile = 'student'";
			$overall_fetch = $mysqli->query($overall_query);
			$count_query = $overall_fetch->num_rows;

			if ($count_query > 0)
			{
				while ($overall_row=$overall_fetch->fetch_array(MYSQLI_BOTH)) 
				{
					// $pend_query = "SELECT *"
					$student_firstname = $overall_row['f_Name'];
					$student_lastname  = $overall_row['l_Name'];
					$student_id = $overall_row['Stud_id'];

					$pend_query = "SELECT * FROM student_details WHERE Stud_id ='$student_id' AND action = '2'";
					$pend_fetch = $mysqli->query($pend_query);
					$pend_count = $pend_fetch->num_rows;

					if ($pend_count > 0)
					{
						while ($pend_row = $pend_fetch->fetch_array(MYSQLI_BOTH))
						{
							$print_id    = $pend_row['ID'];
							$pend_action = $pend_row['action'];
							$pend_schoolName = $pend_row['sch_Name'];
							$pend_schoolProg = $pend_row['sch_prog'];
							$pend_directedTo = $pend_row['directed_To'];
							$pend_region	 = $pend_row['region'];
							$pend_district = $pend_row['district'];
							$start_date		= $pend_row['start_Date'];
							$end_date 		= $pend_row['end_Date'];

							//Getting the full name of the region from the regions table
							$regName = "SELECT fullname FROM region WHERE reg_Abbrv = '$pend_region'";
							$regFetch = $mysqli->query($regName);
							$regResult = $regFetch->fetch_array(MYSQLI_BOTH);
							$pend_region_fullName = $regResult['fullname'];

							$pend_id = substr($pend_schoolName,0,2).mt_rand();

					?>
					<div class="col s12 m2 l2">
						<div id="<?php echo "$pend_id";?>" class="card-panel col s12 waves-effect waves-block waves-ripple template">
							<div class="cont_size" id="<?php echo "$pend_id";?>">
								<div class="stud_avatar">
									<img src="../images/admin/boy.svg" class="responsive-img mt2"/>
								</div>
								<span class="stud_det text-center small-text center-align">
								 <?php echo "$student_firstname"." "."$student_lastname";?>
								</span><br>
								<!-- <span class="stud_det text-center small-text text-center">
								 Date Here
								</span><br> -->
							</div>
						</div>
						<!-- scripts for viewing modals -->
						<script type="text/javascript">
							$("span#<?php echo "$pend_id";?>").on('click',function(){
								$.sweetModal({
									title:'Approved Letter',
									content:'<form action="" method="post">\
								                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">store</i>\
									                <input type="text" name="schoolName" class="validate" id="schoolName" value="<?php echo "$pend_schoolName";?>" disabled="disabled"  style="font-size:14px;font-weight:400;line-height:1;color:#919191;"><label for="schoolName" class="active">School Name</label>\
								                </div>\
								                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">library_books</i>\
									                <input type="text" name="program" class="validate" value="<?php echo "$pend_schoolProg";?>" disabled="disabled"  style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">Subject To Teach</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">supervisor_account</i>\
									                <input type="text" name="directed_To" class="validate" value="<?php echo "$pend_directedTo";?>" disabled="disabled"  style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">To The</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">map_marker</i>\
									                <input type="text" name="district" class="validate" value="<?php echo "$pend_district";?>" disabled="disabled" style="font-size:14px;font-weight:400;line-height:1;color:#919191;"/>\
									                <label for="icon_prefix" class="active">District</label>\
								                </div>\
								                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">event</i>\
									                <input type="text" name="ssDate" class="allTarget" id="ssDate" required value="<?php echo "$start_date"; ?>" style="font-weight:400;color:#919191;font-size:14px;line-height:1;" disabled = "disabled">\
									                <label for="ssDate" class="active">Start Date</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
									                <input type="text" name="seDate" class="allTarget" id="seDate" required value="<?php echo "$end_date"; ?>" style="font-weight:400;color:#919191;font-size:14px;" disabled="disabled">\
									                <label for="seDate" class="active">End Date</label>\
								                </div>\
								           </form>',
									width:'490px',
									buttons:{
										cancelButton:{
											label:'Close',
											classes:'secondaryB bordered flat',
											action:function(){

											}
										},
										printButton:{
											label:'Print Letter',
											classes:'greenB',
											action:function(){
												window.open("../students/letter.php?ReportType=Letter&data=<?php echo "$student_id";?>","_blank");
											}
										}
									}
								});
							});
						</script>
						<?php
						if ($pend_action == 2)
						{
							?>
							<span id="<?php echo "$pend_id"; ?>" class="status z-depth-1 waves-effect waves-block waves-ripple green accent-4"><i class="material-icons left">done_all</i>Approved</span>
							<?php
						}
						?>
					</div>
					<?php
						}
					}
					else if ($count_query > 0) 
					{

					}
				}
			}

	    ?>
	</div>
</body>