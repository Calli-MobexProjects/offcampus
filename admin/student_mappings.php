<?php 
include("../navbars/home_navbar.php");
  ini_set( 'error_reporting', E_ALL);
  ini_set( 'display_errors', true );
 ?>
 <title>
 	OCTPs&reg; | Student Mappings
 </title>
 <body>
 	<div class="row">
 		<div class="col s2 m2 l2">
 			<?php include("../navbars/sidenav.php"); ?>
 		</div>
 		<div class="col s10 m10 l10 animated fadeIn">
 			<?php 
 				require("mappings/QueryClass.php");
 				use \mappings\QueryClass\QueryClass as DataMapper;
 				$results = new DataMapper(); 

 				//Counting the number of students --overall student -- 
 				$student_count = $results->getCountApprovedStudents($mysqli);
 				$student_data  = $student_count->fetch_array(MYSQLI_BOTH);
 				$overall_students = $student_data['totalApprovedStudents'];
 				
 			?>
	 		<!-- Codes for the listing of the regions and its subsequent teachers -->
	 		<div class="col s12 m5 l5 offset-m1 offset-l1">
	 			<h5 class="grey-text text-accent-3 left-align stud_list_title" style="margin-left: 19px;"><i class="material-icons left view">map</i>Selected Regions With Districts <span class="chip right z-depth-2 light-blue accent-2 white-text flow-text waves-effect waves-ripple tooltipped" data-tooltip="Click For Details" data-position="bottom" data-delay="5" style="margin-top: -6px;font-size: 14px;"><?php echo "$overall_students";?> Students</span></h5>
	 			<div class="submit_region" id="main_region_pane">
	 				<ul class="collapsible popout" data-collapsible="accordion" style="margin-top: 20px;">
	 				<?php
	 				$region_data = $results->getApprovedRegions($mysqli);
	 				while ($row_data = $region_data->fetch_array(MYSQLI_BOTH))
	 				{
	 					# code...
	 					$region_name = $row_data['region'];
	 					$program_name = str_shuffle('AxYZmTVzPoQhHsRbtNSLjJrDiIbyuEUXwmSM');
	 					
	 					//Getting the first three characters from the regions;
	 					$three_pin = substr(trim($region_name), 0,3);
	 					$random_number = mt_rand();

	 					//Generated id for the checkboxes
	 					$generated_id = trim($three_pin.$random_number);

	 					//Getting the first six char of the program name
	 					$reg_three_pin 	= substr(trim($program_name), 0,6);
	 					$generated_name_id = trim($reg_three_pin.$random_number);

	 					//Getting the last three of the char  for something else
	 					$generated_overlay_id = trim($generated_id.$random_number);

	 					//Getting the random image for the display on the popout expandable navigation bar
 						$image_array = array('1' => '../images/admin/street-map.svg','../images/admin/push-pin.svg','../images/admin/position.svg');
 						$random_index = mt_rand(1,3);
 						$indicator_image = $image_array[$random_index];

 						$countTotal = "SELECT COUNT(Stud_id) AS NUM FROM student_details WHERE region = '$region_name'";
 						$countQuery = $mysqli->query($countTotal);
 						$row_countQuery = $countQuery->fetch_array(MYSQLI_BOTH);
 						$TotalNumberOfStudents = $row_countQuery['NUM'];
	 					?>
	 					<li>
	 						<div class="collapsible-header" id="<?php echo "$generated_overlay_id";?>">
	 							<span class="img_show" id="<?php echo "$generated_name_id";?>">
	 								<img src="<?php echo "$indicator_image";?>" class="responsive-img">
	 							</span>
	 							<span id="regionCheck" class="<?php echo "$generated_id";?>">
	 								<input type="checkbox" class="filled-in checkbox-indigo" name="multiregion" value="" id="<?php echo "$generated_id";?>">
	 								<label for="<?php echo "$generated_id";?>"></label>
	 							</span>
	 							<span class="region_name">
	 								<h4><?php echo "$region_name";?></h4>
	 							</span>
	 							<!-- <span class="right tooltipped" style="margin-right: -20px;margin-top: 2px;" data-tooltip="Student List" data-delay="5" data-position="right" id="simpleShow">
	 								<i class="material-icons waves-effect waves-ripple">list</i>
	 							</span> -->
	 							<span class="chip right tooltipped z-depth-1 animated bounceInRight" data-tooltip="Students" data-position="right" data-delay="5" style="margin-top: 7.5px;"><img src="../images/admin/student.svg" class="responsive-img z-depth-1-half animated bounceInUp" style="width: 32px;height: 32px;padding: 4px;border:1px solid #fffff1;margin-top: 0px;" /><?php echo "$TotalNumberOfStudents";?></span>

	 						</div>
	 						
	 					<?php

	 					#Selecting the list of users from the db where the region is equal *_*
	 					$student_query = "SELECT Stud_id,district FROM student_details WHERE region = '$region_name'";
      					$student_results = $mysqli->query($student_query);
	 					while ($student_data = $student_results->fetch_array(MYSQLI_BOTH))
	 					{
	 						$district 	= $student_data['district'];
	 						$student_id = $student_data['Stud_id'];
	 						// ob_start();
	 						// echo "$district";
	 						// $var = ob_get_clean();
	 						
	 						
	 					?>
	 						<div class="collapsible-body">
	 							<h5 style="font-weight: 500;font-size: 16px;margin-left: 9px;"><?php echo "$district"; ?> 
	 							<i class="material-icons right waves-effect waves-ripple circle tooltipped" data-tooltip="Students List" data-position="right" data-delay="5" style="padding: 5px;margin-top: -8px;margin-left: -5px;">list</i>
	 							<i class="material-icons right waves-effect waves-ripple circle light-blue-text text-darken-3 tooltipped" data-tooltip="location" data-position="right" data-delay="5" style="padding: 5px;margin-top: -8px;">location_on</i></h5>
	 						</div>	
	 					
	 					<script type="text/javascript">
	 						//Declaring a particular variable for the hovering effect to respond and learn sense
	 						var res = 0;
	 						//Performing the overall action at this page 
	 						var dataArray = new Array();

	 						//Configuring the checkbox show on check for the mapping of the students
	 						$("input#<?php echo "$generated_id";?>").on('click',function(){
	 							if ($(this).prop("checked") == true) 
	 							{
	 								//Hiding the svg image at the back of the region bar
	 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"hidden","opacity":"0","transition":"all 0.2s ease-in-out"});
	 								//Permanently showing the checkbox (checked) for the particular navigation bar
	 								$("span.<?php echo "$generated_id";?>").css({"visibility":"visible","opacity":"1","transition":"all 0.2s ease-in-out"});
	 								//Permanently  disabling the hovering effect  on checkbox checked
	 								res = 1;
	 								if (res == 1)
	 								 {
	 								    $("div#<?php echo "$generated_overlay_id";?>").hover(function(){
	 								    	$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"hidden","opacity":"0"});
	 								    	$("span.<?php echo "$generated_id";?>").css({"visibility":"visible","opacity":"1"});
	 								 	},function(){
	 								 		$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"hidden","opacity":"0"});
	 								    	$("span.<?php echo "$generated_id";?>").css({"visibility":"visible","opacity":"1"});
	 								 	});
	 								 }

	 							}
	 							else if ($(this).prop("checked") == false)
	 							{
	 								//Hiding the svg image at the back of the region bar
	 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"visible","opacity":"1","transition":"all 0.2s ease-in-out"});
	 								//Permanently showing the checkbox (checked) for the particular navigation bar
	 								$("span.<?php echo "$generated_id";?>").css({"visibility":"hidden","opacity":"0","transition":"all 0.2s ease-in-out"});
	 								res = 0;
	 								if (res == 0)
	 								 {
	 								 	$("div#<?php echo "$generated_overlay_id";?>").hover(function(){
			 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"hidden","opacity":"0"});
			 								$("span.<?php echo "$generated_id";?>").css({"visibility":"visible","opacity":"1"});
			 							},
			 							function(){
			 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"visible","opacity":"1"});
			 								$("span.<?php echo "$generated_id";?>").css({"visibility":"hidden","opacity":"0"});
			 							});
	 								 }
	 							}
	 						});

	 						$(window).load(function(){
	 							$("div#<?php echo "$generated_overlay_id";?>").hover(function(){
	 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"hidden","opacity":"0"});
	 								$("span.<?php echo "$generated_id";?>").css({"visibility":"visible","opacity":"1"});
	 							},
	 							function(){
	 								$("span#<?php echo "$generated_name_id";?> > img").css({"visibility":"visible","opacity":"1"});
	 								$("span.<?php echo "$generated_id";?>").css({"visibility":"hidden","opacity":"0"});
	 							});


	 						});

	 						//Getting the list of students from the region and the district detail list
	 						$("#").on('click',function(){
	 							$.sweetModal({
	 								title:'<i class="material-icons left">group</i>Associated Students\' List',
	 								content:'',
	 								width:'650px',
	 								showCloseButton:false,
	 								buttons:{
	 									closeButton:{
	 										label:'Close',
	 										classes:'blueB',
	 										action:function(){

	 										}

	 									}
	 								}
	 							});
	 						});
	 					</script>
	 					<?php
	 					}
	 				}
	 				?>
	 					</li>
	 				</ul>
	 			</div>
	 		</div>
	 		<div class="col s12 m5 l5">
	 		<!-- Codes for the count of the lecturers -->
	 		<?php 
	 		 $count_query = $results->getCountLecturer($mysqli);
	 		 $count_data  = $count_query->fetch_array(MYSQLI_BOTH);
	 		 $count_lecturers = $count_data['totalLecturer'];
	 		?>
	 		<h5 class="grey-text text-accent-3 left-align stud_list_title" style="margin-left: 19px;"><i class="material-icons left view">supervisor_account</i>Lecturers' Details <span class="chip right z-depth-2 light-blue accent-2 white-text flow-text waves-effect waves-ripple tooltipped" data-tooltip="Click For Details" data-position="bottom" data-delay="5" style="margin-top: -6px;font-size: 14px;"><?php echo "$count_lecturers";?> Lecturers</span></h5>
	 			<ul class="collapsible popout" style="margin-top:20px;">
	 			 <?php
	 			 	$lecturer_qs = $results->getAllLecturer($mysqli);
	 			 	while ($lecturer_ft = $lecturer_qs->fetch_array(MYSQLI_BOTH)) 
	 			 	{
	 			 		# code...
	 			 		$lect_id  = $lecturer_ft['lect_ID'];
	 			 		$fullName = $lecturer_ft['lect_firstname']." ".$lecturer_ft['lect_lastname'];
	 			 		$region   = $lecturer_ft['region'];
	 			 		$lect_district = $lecturer_ft['lect_district'];

	 			 		//getting random key reshuffling for each lecturer (The General Random Key)
	 			 		$shuffle_key = str_shuffle('AjsPYoVvlqQipgERVbLhgtFuTzYZZdSDnM');

	 			 		//Creating the autogenerated ids for production
	 			 		$get_three_pin   = substr(trim($fullName), 0,3);
	 			 		$get_random_pin  = mt_rand();
	 			 		$get_shuffle_portion_key  = substr($shuffle_key, 0,10);

	 			 		//Using the generated pin for the overall production here at the lecturers' lair
	 			 		$generated_lect_overlay_id = trim($get_shuffle_portion_key.$get_three_pin.$get_random_pin);

	 			 		//getting the reverse for the fullname
	 			 		$get_three_pin_rev = substr(trim($fullName), -3);
	 			 		$get_generated_image_id = trim($get_three_pin_rev.$get_shuffle_portion_key.$get_random_pin);

	 			 		//getting the id for the checkbox and finding the value using the ids --> GOD HELP ME
	 			 		$get_sample_region_data    = substr($lect_district, 0,3);
	 			 		$get_generated_checkbox_id = trim($get_sample_region_data.$get_random_pin.$get_shuffle_portion_key.$get_three_pin_rev);


	 			 		
	 			 ?>
	 				<li>
	 					<div class="collapsible-header" id="<?php echo "$generated_lect_overlay_id";?>">
	 						<span class="img_show" id="<?php echo "$get_generated_image_id";?>">
	 							<img src="../images/admin/boy.svg" class="responsive-img circle" style="border: 1px solid #eeeeee;height: 35px; width: 35px;margin-top: 5px;">
	 						</span>
 							<span id="regionCheck" class="<?php echo "$get_generated_checkbox_id";?>" style="margin-left:-32px;">
 								<input type="checkbox" class="filled-in checkbox-indigo" name="multiregion" value="<?php echo "$lect_id";?>" id="<?php echo "$get_generated_checkbox_id";?>">
 								<label for="<?php echo "$get_generated_checkbox_id";?>"></label>
 							</span>
 							<span class="region_name">
 								<h4><?php echo "$fullName";?></h4>
 							</span>
	 					</div>
	 					<div class="collapsible-body">
	 						<h5 class="region">Region : <?php echo "$region";?></h5><br>
	 						<h5 class="district">District : <?php echo "$lect_district";?></h5>
	 					</div>
	 				</li>
	 				<script type="text/javascript">
	 					var lecturerArray = new Array();
	 					var lecturerObject = new Object();

	 					//Creating a function to hold the hovering effect to prevent code repetition
	 					$("input#<?php echo "$get_generated_checkbox_id";?>").on('click',function(){
	 						if($(this).prop("checked") == true)
	 						{
	 							//Using other function here --> the outchecked function
	 							onCheckedHover("div#<?php echo "$generated_lect_overlay_id";?>","span#<?php echo "$get_generated_image_id";?> > img","span.<?php echo "$get_generated_checkbox_id";?>");
	 							//Array operations will be here
	 							var itemToInsert = $(this).val();
	 							lecturerArray = $.grep(lecturerArray,function(value){
	 								return value != itemToInsert;
	 							});
	 							lecturerArray.push(itemToInsert);
	 							console.dir(lecturerArray);


	 							//Defining an object to be used at a later time
	 							var overall_data = "<?php echo "$fullName";?>";
	 							var data = overall_data.trim();
	 							lecturerObject[data] = $(this).val();

	 						}
	 						else if ($(this).prop("checked") == false) 
	 						{
	 							//Calling the defined function here to use
	 							HoverEffect("div#<?php echo "$generated_lect_overlay_id";?>","span#<?php echo "$get_generated_image_id";?> > img","span.<?php echo "$get_generated_checkbox_id";?>");

	 							//Array operations will be here
	 							var itemToRemove = $(this).val();
	 							lecturerArray.splice($.inArray(itemToRemove,lecturerArray),1);
	 							console.dir(lecturerArray);

	 						}
	 					});
	 					//Calling the defined function here
	 					HoverEffect("div#<?php echo "$generated_lect_overlay_id";?>","span#<?php echo "$get_generated_image_id";?> > img","span.<?php echo "$get_generated_checkbox_id";?>");

	 					//Declaring and defining the function for the hover effect here
	 					function HoverEffect(generated_lect_overlay_id,get_generated_image_id,get_generated_checkbox_id)
	 					{
	 						$(generated_lect_overlay_id).hover(function(){
	 								$(get_generated_image_id).css({"visibility":"hidden","opacity":"0"});
	 								$(get_generated_checkbox_id).css({"visibility":"visible","opacity":"1"});
	 							},
	 							function(){
	 								$(get_generated_image_id).css({"visibility":"visible","opacity":"1"});
	 								$(get_generated_checkbox_id).css({"visibility":"hidden","opacity":"0"});
	 							});
	 					}

	 					//Declaring and defining the function for the checked true operations on the checkbox
	 					function onCheckedHover(generated_lect_overlay_id,get_generated_image_id,get_generated_checkbox_id){
	 						$(generated_lect_overlay_id).hover(function(){
	 								$(get_generated_image_id).css({"visibility":"hidden","opacity":"0"});
	 								$(get_generated_checkbox_id).css({"visibility":"visible","opacity":"1"});
	 							},
	 							function(){
	 								$(get_generated_image_id).css({"visibility":"hidden","opacity":"0"});
	 								$(get_generated_checkbox_id).css({"visibility":"visible","opacity":"1"});
	 							});
	 					}
	 				</script>
	 				<?php
	 				}

	 				?>
	 			</ul>
	 		</div>
	 		<div class="col s12 m12 l12">
	 		</div>
 		</div>
 	</div>
 </body>


