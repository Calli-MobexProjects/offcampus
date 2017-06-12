<body>
	<div class="pend_body animated fadeIn" style="margin-top: 10px;">
	<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">timeline</i>Pending Students' List</h5>
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

					$getUpper	= substr($student_firstname,0,1);

					$pend_query = "SELECT * FROM student_details WHERE Stud_id ='$student_id' AND action = '1'";
					$pend_fetch = $mysqli->query($pend_query);
					$pend_count = $pend_fetch->num_rows;

					if ($pend_count > 0)
					{
						while ($pend_row = $pend_fetch->fetch_array(MYSQLI_BOTH))
						{
							$pend_primary_id = $pend_row['ID'];
							$pend_action     = $pend_row['action'];
							$pend_schoolName = $pend_row['sch_Name'];
							$pend_schoolProg = $pend_row['sch_prog'];
							$pend_directedTo = $pend_row['directed_To'];
							$pend_region	 = $pend_row['region'];
							$pend_district   = $pend_row['district'];
							$start_date		 = $pend_row['start_Date'];
							$end_date 		 = $pend_row['end_Date'];

							//Getting the full name of the region from the regions table
							$regName = "SELECT fullname FROM region WHERE reg_Abbrv = '$pend_region'";
							$regFetch = $mysqli->query($regName);
							$regResult = $regFetch->fetch_array(MYSQLI_BOTH);
							$pend_region_fullName = $regResult['fullname'];

							$pend_id = substr($pend_schoolName,0,2).mt_rand();
							$color1 = "9a1b2c38d4e57f6";
							$color_fig = str_shuffle($color1);
							$color_part1 = substr($color_fig, 0,3);
							
							$number = mt_rand(10,90);
							$last_num = substr($color_fig,-1);

							$overall_color = $color_part1.$number.$last_num;
					?>
					<div class="col s12 m2 l2">
						<div id="<?php echo "$pend_id";?>" class="card-panel col s12 waves-effect waves-block waves-ripple template">
							<div class="cont_size" id="<?php echo "$pend_id";?>">
								<div class="stud_avatar <?php echo "$pend_id";?>">
									<img src="../images/admin/boy.svg" class="responsive-img mt2"/>
								</div>
								<div class="multicheck ad<?php echo "$pend_id";?>"  style="position: absolute;right: -12px;margin-top: -2px;max-width: 100%;visibility: hidden;opacity: 0;">
									<input type="checkbox" id="pCheck<?php echo "$pend_id";?>" name="pendCheck[]" value="<?php echo "$pend_primary_id";?>"/>
									<label for="pCheck<?php echo "$pend_id";?>"></label>
								</div>
								<span class="stud_det text-center small-text center-align">
								 <?php echo "$student_firstname"." "."$student_lastname";?>
								</span><br>
								<!-- <span class="stud_det text-center small-text text-center">
								 Date Here
								</span><br> -->
							</div>
						</div>
						<!-- Scripts for the hover effects -->
						<script type="text/javascript">
							var arrayCount = 0;
							var res = 0;
							var res1 = 0;
							var arrayData = [];
							var calli	 = 0;

							// overallArray = [];
							$(document).ready(function(){
								$("div#<?php echo "$pend_id";?>").hover(
									function(){
										$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
									},
									function(){
										$("div.ad<?php echo "$pend_id";?>").css({"visibility":"hidden","opacity":"0"});
								});
								
								$("input#pCheck<?php echo "$pend_id";?>").click(function(){
									if ($(this).prop("checked") == true)
									 {
									 	$("div.<?php echo "$pend_id";?>").css({"opacity":"0.4","transition":"all 0.5s ease-in"});
									 	res = 1;
									 	if (res == 1) 
									 	{
									 		$("div#<?php echo "$pend_id";?>").hover(
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
												},
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
											});
									 	}
									 	arrayData.push($(this).val());
									 	console.dir(arrayData);
									 }
									 else if ($(this).prop("checked") == false)
									 {
									 	
									 	$("div.<?php echo "$pend_id";?>").css({"opacity":"1","transition":"all 0.5s ease-out"});
									 	res = 0;
									 	if (res == 0) 
									 	{
									 		$("div#<?php echo "$pend_id";?>").hover(
													function(){
														$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
													},
													function(){
														$("div.ad<?php echo "$pend_id";?>").css({"visibility":"hidden","opacity":"0"});
											});
									 	}
									 	var itemToRemove = $(this).val();
									 	arrayData.splice($.inArray(itemToRemove,arrayData),1);
									 	console.dir(arrayData);
									 }
									 arrayCount = arrayData.length;
									 $("span.labelCount").text(arrayCount + " " + "selected");
									 if (arrayCount > 0) {
									 	$("div#view").removeClass("animated bounceInRight").addClass("animated bounceOutRight");
									 	//Marking this for change
									 	$("span.status").css({"visibility":"hidden","opacity":"0"});
										 	setTimeout(function() {
										 		$("div.bottomsheet").removeClass("animated fadeOut").addClass("animated fadeIn").css({"display":"block"});
										 	}, 100);
									 }
									 else if(arrayCount == 0)
									 {
									 	//Marking this for change
									 	$("span.status").css({"visibility":"visible","opacity":"1"});
									 	$("div.bottomsheet").removeClass("animated fadeIn").addClass("animated fadeOut").css({"display":"none"});
									 	setTimeout(function() {
										 		$("div#view").removeClass("animated bounceOutRight").addClass("animated bounceInRight");
										 	}, 100);
									 }
									
								});
								$("input#me").on('click',function(){
								 	if ($(this).prop("checked") == true)
								 	 {
								 	 	//Magic script for array definition
								 	 	var existValue = $('input#pCheck<?php echo "$pend_id";?>').val();
								 	 	arrayData = $.grep(arrayData,function(i){
								 	 		return i !== existValue;
								 	 	});

								 	 	$('input#pCheck<?php echo "$pend_id";?>').prop("checked",true);
								 	 	arrayData.push($('input#pCheck<?php echo "$pend_id";?>').val());
								 	 	//opacity for the images to define check
								 	 	$("div.<?php echo "$pend_id";?>").css({"opacity":"0.4","transition":"all 0.5s ease-in"});

								 	 	//query for displaying aftering all if it been checked
								 	 	$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});

								 	 	res1 = 1;
								 	 	if (res1 == 1)
								 	 	 {
								 	 	 	$("div#<?php echo "$pend_id";?>").hover(
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
												},
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
											});
								 	 	 }
								 	 	console.dir(arrayData);
								 	 }
								 	 else if($(this).prop("checked") == false){
								 	 	// arrayCount = 0;
								 	 	console.dir("This is for lord " + arrayCount);
								 	 	$('input#pCheck<?php echo "$pend_id";?>').prop("checked",false);
								 	 	var oItemToRemove = $('input#pCheck<?php echo "$pend_id";?>').val();
								 	 	arrayData.splice($.inArray(oItemToRemove,arrayData),1);

								 	 	//opacity for the images to define check
								 	 	$("div.<?php echo "$pend_id";?>").css({"opacity":"1","transition":"all 0.5s ease-out"});

								 	 	//query for displaying aftering all if it been checked
								 	 	$("div.ad<?php echo "$pend_id";?>").css({"visibility":"hidden","opacity":"0"});
								 	 	//query for false hiding of the bottomsheet
								 	 	$("div.bottomsheet").removeClass("animated fadeIn").addClass("animated fadeOut").css({"display":"none"});
								 	 	//Query for the hovering effect of the checkboxes
								 	 	console.log("POping the array");
								 	 	console.dir(arrayData);

								 	 	console.dir("array length " + " " + arrayCount);
								 	 	res1 = 0;
								 	 	if (res1 == 0)
								 	 	 {
								 	 	 	$("div#<?php echo "$pend_id";?>").hover(
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"visible","opacity":"1"});
												},
												function(){
													$("div.ad<?php echo "$pend_id";?>").css({"visibility":"hidden","opacity":"0"});
											});
								 	 	 }

								 	 }
								 	 arrayCount = arrayData.length;
								 	 console.dir("This is for jnr " + arrayCount);
									 $("span.labelCount").text(arrayCount + " " + "selected");
									 if (arrayCount > 0) {
									 	$("div#view").removeClass("animated bounceInRight").addClass("animated bounceOutRight");
									 	//Marking this for change
									 	$("span.status").css({"visibility":"hidden","opacity":"0"});
										 	// setTimeout(function() {
										 	// 	$("div.bottomsheet").removeClass("animated fadeOut").addClass("animated fadeIn").css({"display":"block"});
										 	// }, 100);
									 }
									 else if(arrayCount == 0)
									 {
									 	console.log("Array Count after oncheck ");
									 	console.dir(arrayCount);
									 	//Marking this for change
									 	$("span.status").css({"visibility":"visible","opacity":"1"});
									 	$("div.bottomsheet").removeClass("animated fadeIn").addClass("animated fadeOut").css({"display":"none"});
									 	setTimeout(function() {
										 		$("div#view").removeClass("animated bounceOutRight").addClass("animated bounceInRight");
										 	}, 100);
									 }
								 });

							});
						</script>
						<!-- scripts for viewing modals -->
						<script type="text/javascript">

							$("span#<?php echo "$pend_id";?>").on('click',function(){
								$.sweetModal({
									title:'<div class="pulse" style="background-color:#<?php echo "$overall_color";?>;color:white;border-radius:50%;width:60px;height:60px;position:relative;left:-20px;margin-left:-1px;font-size:20px;padding-top:18px;padding-left:24px;"><?php echo "$getUpper";?></div><span style="position:absolute;top:42px;left:89px;">Approve Letter</span>',
									content:'<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">event</i>\
									                <input type="text" name="date" class="datepicker" id="mytarget" required>\
									                <label for="mytarget">Start Date</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
									                <input type="text" name="date" class="validate" id="phone" required>\
									                <label for="icon_prefix">End Date</label>\
								                </div>\
											</form>',
									width:'400px',
									buttons:{
										cancelButton:{
											label:'Cancel',
											classes:'secondaryB bordered flat',
											action:function(){

											}
										},
										doneButton:{
											label:'Set Date',
											classes:'blueB',
											action:function(){

											}

										}
									}
								});
							});
							
							$("div.<?php echo "$pend_id";?>").on('click',function(){
								$.sweetModal({
									title:'<div class="pulse" style="background-color:#<?php echo "$overall_color";?>;color:white;border-radius:50%;width:60px;height:60px;position:relative;left:-20px;margin-left:-1px;font-size:20px;padding-top:18px;padding-left:24px;"><?php echo "$getUpper";?></div><span style="position:absolute;top:42px;left:89px;">Letter Details</span>',
									content:'<form action="" method="post">\
								                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">store</i>\
									                <input type="text" name="schoolName" class="validate" id="schoolName" value="<?php echo "$pend_schoolName";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;"><label for="schoolName" class="active">School Name</label>\
								                </div>\
								                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">library_books</i>\
									                <input type="text" name="program" class="validate" value="<?php echo "$pend_schoolProg";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">Subject To Teach</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">supervisor_account</i>\
									                <input type="text" name="directed_To" class="validate" value="<?php echo "$pend_directedTo";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">To The</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">location_on</i>\
									                <input type="email" name="email" class="validate" value="<?php echo "$pend_region_fullName";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">Region</label>\
								                </div>\
								                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
									                <i class="material-icons prefix" id="icon_prefix">map_marker</i>\
									                <input type="email" name="email" class="validate" value="<?php echo "$pend_district";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
									                <label for="icon_prefix" class="active">District</label>\
								                </div>\
								           </form>',
									width:'500px',
								});
							});
						</script>
						<?php
						if ($pend_action == 1)
						{
							?>
							<span id="<?php echo "$pend_id"; ?>" class="status z-depth-1 waves-effect waves-block waves-ripple orange darken-2"><i class="material-icons left">timeline</i>Pending</span>
							<?php
						}
						?>
					</div>
					<?php
						}
					}
				}
			}

	    ?>
	   
	</div>
	 <div class="bottomsheet z-depth-3 waves-effect waves-block waves-ripple" style="width:300px;height: 70px;background-color: #424242;position: fixed;z-index: 9999;bottom: 10px;border-radius: 4px;cursor: pointer;">
			<ul class="bottomItem animated fadeIn">
				<p class="ul_title" style="font-size: 14px;color: white;font-weight: 600;margin-top:5px;text-align: center;">Approve Letter For Multiple Students</p>
				<li><a id="setMultiDate"><span class="labelCount"></span><i class="material-icons right white-text">date_range</i></a></li><br>
				<span class="overall_check">
					<input type="checkbox" id="me" class="overCheck" /><label for="me"></label>
				</span>
				<small>Click the icon the set date</small>
			</ul>					
	 </div>
	 <style type="text/css">
	 	span.overall_check{
	 		position: absolute;
	 		top: 28px;
	 		right: 2px;
	 	}
	 	input.overCheck + label::before{
	 		border: 2px solid white;
	 	}
	 	input.overCheck + label::after{
	 		border-right: 2px solid white;
	 		border-top: 2px solid transparent;
	 		border-bottom: 2px solid white;
	 		border-left: 2px solid transparent;
	 	}

	 </style>
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		//Getting the values from the array and setting dates for all//
			$("a#setMultiDate").on('click',function(){
				console.log("this is multicheck");
				console.dir(arrayData);
				$.sweetModal({
					title:'<div class="pulse" style="background-color:#<?php echo "$overall_color";?>;color:white;border-radius:50%;width:60px;height:60px;position:relative;left:-20px;margin-left:-1px;font-size:20px;padding-top:18px;padding-left:24px;">D</div><span style="position:absolute;top:42px;left:89px;">Approve Letter</span>',
					content:'<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
				                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
					                <i class="material-icons prefix" id="icon_prefix">event</i>\
					                <input type="text" name="date" class="datepicker" id="mytarget" required>\
					                <label for="mytarget">Start Date</label>\
				                </div>\
				                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
					                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
					                <input type="text" name="date" class="validate" id="phone" required>\
					                <label for="icon_prefix">End Date</label>\
				                </div>\
							 </form>',
					width:'400px',
					buttons:{
						cancelButton:{
							label:'Cancel',
							classes:'secondaryB bordered flat',
							action:function(){

							}
						},
						doneButton:{
							label:'Set Date',
							classes:'blueB',
							action:function()
							{

							}
						}
					}
				});
			});
	 	});
	 </script>
</body>