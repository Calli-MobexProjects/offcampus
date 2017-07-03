<?php
 include '../navbars/home_navbar.php';
 require_once "../inc/connection.php";
?>
<head>
	<title>OCTPs&reg; | Events</title>
	<style type="text/css">
		div.bg{
			position: relative;
			margin:20px auto;
			width:auto;
			height: 400px;
		}
		img.help{
			width: 100%;
			height: 400px;
		}
		a.cevents{
			text-transform: capitalize;
		}
		div.monthly{
			margin-top: 10px;
			max-height: 580px;
			height: 580px;
			font-size: 0.8em;
		}
		.input-field textarea.materialize_textarea:focus{
		  border-bottom: 1px solid #00b0ff !important;
		  box-shadow: 0 1px 0 0 #00b0ff !important;
		 }
		 div#event_content{
		 	line-height: 1;
		 	font-size: 14px;
		 	font-weight: 500;
		 	margin-top: 18px;

		 }
		 span.title{
		 	padding: 2px 1px 2px 1px;
		 	font-weight: 500;
		 	font-size: 13px;
		 	color:#212121;
		 	margin-top: 4px;
		 }
		 .mt7{
		 	margin-bottom: -4px;
		 }
		 #addEventBtn{
		 	display:none;
		 	opacity: 0;
		 }
		/**/
	</style>
</head>
<body>
	<div class="event_body">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10">
				<div class="col s8 l8 m8">
					<div class="monthly z-depth-1" id="mycalendar"></div>
				</div>
				<div class="col s4 m4 l4">
					<?php
						$filename = '/var/www/html/offcampus/json/events.json';
						$dateArray = array('1' => 'January','February','March','April','May','June','July','August','September','October','November','December');
						$event_query = "SELECT * FROM events";
						$event_fetch = $mysqli->query($event_query);
						$event_count = $event_fetch->num_rows;

						//Declaring the array for the data
						$month_data = array();
						$event_data = array();
						if ($event_count > 0)
						{
						 while ($event_row = $event_fetch->fetch_array(MYSQLI_BOTH))
						 {
						 	$event_id = $event_row['id'];
						 	$event_name = $event_row['name'];
						 	$event_startDate = $event_row['startdate'];
						 	$event_endDate	 = $event_row['enddate'];
						 	$event_startTime = $event_row['start_time'];
						 	$event_endTime 	 = $event_row['end_time'];
						 	$event_color	 = $event_row['color'];
						 	$event_description = $event_row['description'];

						 	//Sending the data to the array
						 	$event_data[] = array(
						 		'id'=>(int)($event_id),
						 		'name'=>$event_name,
						 		'startdate'=>$event_startDate,
						 		'enddate'=>$event_endDate,
						 		'starttime'=>$event_startTime,
						 		'endtime'=>$event_endTime,
						 		'color'=>$event_color,
						 		'url'=>''
						 		);

						 	$random_gen = mt_rand();
						 	$letter_id  = substr($event_name,0,1);
						 	$generate_id = strtoupper($letter_id);

						 	$template_id = $generate_id.$random_gen;

						 	$get_readable_data = explode('-', $event_startDate);
						 	$year  = $get_readable_data[0];
						 	$month = $get_readable_data[1];
						 	$day   = $get_readable_data[2];

						 	$parseMonth = (int)($month);
						 	$getMonth = $dateArray[$parseMonth];

						 	$get_readable_endDate = explode('-', $event_endDate);
						 	$year1 = $get_readable_endDate[0];
						 	$month1 = $get_readable_endDate[1];
						 	$day1    = $get_readable_endDate[2];

						 	$parseMonth1 = (int)($month1);
						 	$getMonth1 = $dateArray[$parseMonth1];

						 	//Manipulating time and getting each segment -> START TIME
						 	$get_readable_time = explode(':', $event_startTime);
						 	$hours 			   = $get_readable_time[0];
						 	$minutes		   = $get_readable_time[1];

						 	// //GETTING THE AM/PM
						 	if ($hours > 12) 
						 	{
						 		$nonGMTHours = $hours - 12;
						 		$amp = 'PM';	
						 	}
						 	else if ($hours == 12)
						 	{
						 		$nonGMTHours = $hours;
						 		$amp = 'PM';
						 	}
						 	else if($hours < 12)
						 	{
						 		$nonGMTHours = $hours;
						 		$amp = 'AM';
						 	}
						 	//Manipulating time and getting each segment -> END TIME
						 	$get_readable_time1 = explode(':', $event_endTime);
						 	$hours1				= $get_readable_time1[0];
						 	$minutes1			= $get_readable_time1[1];

						 	//GETTING THE AM/PM
						 	if ($hours1 > 12) 
						 	{
						 		$nonGMTHours1 = $hours1 - 12;
						 		$amp1 = 'PM';	
						 	}
						 	else if ($hours1 == 12) 
						 	{
						 		$nonGMTHours1 = $hours1;
						 		$amp1 = 'PM';
						 	}
						 	else if($hours1 < 12)
						 	{
						 		$nonGMTHours1 = $hours1;
						 		$amp1 = 'AM';
						 	}

						  	?>
						  	<div class="col s12 card-panel z-depth-1 waves-effect waves-block waves-ripple mt7" id="<?php echo "$template_id";?>" style="border-radius: 3px;">
						  		<div class="col s3 m3 l3" style="margin-left: -15px;margin-top: 4px;"><img src="../images/admin/bell.svg" class="responsive-img" alt="<?php echo "$event_description";?>" /></div>
						  		<div class="col s9 m9 l9" id="event_content">
						  			<span class="title" style="margin-top: 5px;"><?php echo "$event_name";?></span><br>
						  			<span class="content" style="margin-top: 5px;"><?php echo "$nonGMTHours".":"."$minutes"." "."$amp";?> to <?php echo "$nonGMTHours1".":"."$minutes1"." "."$amp1";?></span>
						  		</div>
						  	</div>
						  	<!-- Scripting for the modal and other activities -->
						  	<script type="text/javascript">
						  		$(document).ready(function(){
						  			var see = "<?php echo "$template_id";?>";
						  			console.dir(see);
						  			$("div#<?php echo "$template_id";?>").on('click',function(){
						  				$.sweetModal({
							  				title:'<i class="material-icons left white-text">event</i><?php echo "$event_name";?>',
							  				type:$.sweetModal.TYPE_MODAL,
							  				content:'<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
										              <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
											                <i class="material-icons prefix">event_seat</i>\
											                <input type="text" name="name" class="validate" id="event_name" value="<?php echo "$event_name";?>" required style="font-weight:400;color:#FFFFFF;padding-top:12px;text-transform:capitalize;" disabled>\
											                <label for="event_name" class="active white-text">Event Name</label>\
										                </div>\
										                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
											                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
											                <input type="text" name="sDate" id="sDate" required style="font-weight:400;color:#FFFFFF;padding-top:12px;" value="<?php echo "$year".","."$getMonth"." "."$day";?>" disabled>\
											                <label for="sDate" class="active white-text">Start Date</label>\
										                </div>\
										                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
											                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
											                <input type="text" name="eDate"  id="eDate" required value="<?php echo "$year1".","."$getMonth1"." "."$day1";?>" style="font-weight:400;color:#FFFFFF;padding-top:12px;" disabled>\
											                <label for="eDate" class="active white-text">End Date</label>\
										                </div>\
										                <div class="input-field col s12">\
												          <i class="material-icons prefix">mode_edit</i>\
												          <textarea id="description" class="materialize-textarea" data-length="120" style="margin-top:-10px;color:#FFFFFF;" disabled><?php echo "$event_description";?></textarea>\
												          <label for="description" class="active white-text">Description</label>\
												        </div>\
													</form>',
							  				width:'400px',
							  				theme:$.sweetModal.THEME_DARK,
							  			});
						  			});
						  		});
						  	</script>
						  	<?php
						 }

						 //Activating the monthly
						$month_data['monthly'] = $event_data;
						//Writing the data to file for the calendar to be activated
					 	$fp = fopen($filename,'w');
						fwrite($fp,json_encode($month_data,JSON_PRETTY_PRINT));
						fclose($fp);
						}
						else{
							unset($event_data);
							$month_data['monthly'] = $event_data;
							$fp = fopen($filename, 'w');
							fwrite($fp,json_encode($month_data,JSON_PRETTY_PRINT));
							fclose($fp);
							?>

					<div class="card-panelm bg">
						<img src="../images/admin/bell.svg" alt="Help Desk" class="responsive-img help"/>
					</div>
					<h5 class="center-align grey-text text-darken-3 small-text">No Events Available, Create One Now</h5>
					<h5 class="center-align grey-text text-darken-3 small-text"><a class="btn light-blue accent-3 waves-effect waves-ripple cevents"><i class="material-icons left">event</i>Create Event</a></h5>
							<?php
						}
					?>
				</div>
			</div>
			 	<!-- Codes for the adding of extra events -->
		  	<div id="addEventBtn" class="fixed-action-btn animated" style="right: 70px;bottom: 40px;">
			    <a  id="addEvent" class="btn-floating btn-large light-blue accent-3 cevents">
			      <i class="large material-icons tooltipped" data-tooltip="Create Events" data-position="left" data-delay="5">event</i>
			    </a>
			</div>
			<script type="text/javascript">
				$(window).load(function(){
						$('#mycalendar').monthly({
								mode: 'event',
								jsonUrl: '../json/events.json',
								dataType: 'json'
								// xmlUrl: '../vendors/monthly/events.xml'
							});
					var event_add = "<?php echo "$event_count";?>";
					if (event_add > 0) 
					{
						$("#addEventBtn").css({"display":"block","opacity":"1"});
					}
					else
					{
						$("#addEventBtn").css({"display":"none","opacity":"0"});
					}

				});

				$("a.cevents").on('click',function(){
					$.sweetModal({
						title:'<i class="material-icons left">event</i>Create Event',
						content:'<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
						              <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix">event_seat</i>\
							                <input type="text" name="name" class="validate" id="event_name" required style="font-weight:400;color:#424242;padding-top:12px;text-transform:capitalize;">\
							                <label for="event_name">Event Name</label>\
						                </div>\
						                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
							                <input type="text" name="sDate" class="allTarget" id="sDate" required style="font-weight:400;color:#424242;padding-top:12px;">\
							                <label for="sDate">Start Date</label>\
						                </div>\
						                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
							                <input type="text" name="eDate" class="allTarget" id="eDate" required style="font-weight:400;color:#424242;padding-top:12px;">\
							                <label for="eDate">End Date</label>\
						                </div>\
						                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="icon_prefix">access_time</i>\
							                <input type="text" name="sTime" class="allTime" id="sTime" placeholder="Start Time" required style="font-weight:400;color:#424242;padding-top:12px;width:160px;">\
							                <label for="sTime"></label>\
							                <i class="material-icons prefix" id="icon_prefix">timelapse</i>\
							                <input type="text" name="eTime" class="allTime" id="eTime" placeholder="End Time" required style="font-weight:400;color:#424242;padding-top:12px;width:160px;">\
							                <label for="eTime"></label>\
							                </div>\
						                <div class="input-field col s12">\
								          <i class="material-icons prefix">mode_edit</i>\
								          <textarea id="description" class="materialize-textarea" data-length="120" style="margin-top:-10px;"></textarea>\
								          <label for="description">Description</label>\
								        </div>\
									</form>',
						width:'500px',
						buttons:{
							cancelButton:{
								label:'Cancel',
								classes:'secondaryB bordered flat',
								action:function(){

								}
							},
							addButton:{
								label:'Create Event',
								classes:'blueB',
								action:function(){
									var event_name = $('input#event_name').val();
									var sDate	   = $('input#sDate').val();
									var eDate	   = $('input#eDate').val();
									var sTime	   = $('input#sTime').val();
									var eTime      = $('input#eTime').val();
									var description= $('textarea#description').val();

									//Trying something out
									// var ren = new Date($('input#sDate').val());
									// console.dir(ren);

									if (event_name == '' || sDate == '' || eDate == '' || sTime == '' || eTime == '' || description == '') 
									{
										$.sweetModal({
											icon:$.sweetModal.ICON_ERROR,
											content:'Field(s) Are Empty !',
											width:'350px',
											showCloseButton:false,
											timeout:4000,
										});
									}else if (sDate > eDate)
									{
										$.sweetModal({
											icon:$.sweetModal.ICON_ERROR,
											content:'Invalid Date Range!',
											width:'350px',
											showCloseButton:false,
											timeout:4000,
										});
									}
									else
									{
										var dataString = "event_name=" +event_name +"&sDate="+sDate +"&eDate="+eDate +"&sTime="+sTime +"&eTime=" + eTime +"&description="+description;
										console.dir(dataString);
										$.post({
											url:"events.php",
											data:dataString,
											success:function(){
												setTimeout(function() {
													$.sweetModal({
														icon:$.sweetModal.ICON_SUCCESS,
														content:'Event Created Successfully',
														width:'350px',
														showCloseButton:false,
														timeout:2600,
													});
												}, 3000);
												setTimeout(function() {
													window.location.reload();
												}, 4000);

											}
										})
										.done(function(){
											console.dir("Success");
										});
									}

								}
							}
						}
					});
					$("input.allTarget").flatpickr({
						minDate:"today",
						weekNumbers:true
					});
					$("input.allTime").flatpickr({
						enableTime:true,
						noCalendar:true,

						enableSeconds: true, // disabled by default

					    time_24hr: false, // AM/PM time picker is used by default

					    // default format
					    dateFormat: "H:i", 

					    // initial values for time. don't use these to preload a date
					    defaultHour: 12,
					    defaultMinute: 0

					    // Preload time with defaultDate instead:
					    // defaultDate: "3:30"

					});

					$('textarea#description').characterCounter();
				});

			</script>
		</div>
		<!-- Sending the data to the database from the jquery post method -->
		<?php
			if (isset($_POST['event_name']) && isset($_POST['sDate']) && isset($_POST['eDate']) && isset($_POST['sTime']) && isset($_POST['eTime']) && isset($_POST['description']))
			{
				$event_name = $_POST['event_name'];
				$sDate	    = $_POST['sDate'];
				$eDate	    = $_POST['eDate'];
				$sTime	    = $_POST['sTime'];
				$eTime 		= $_POST['eTime'];
				$description= $_POST['description'];

				$color = "#212121";

				$event_add_query="INSERT INTO events(name,startdate,enddate,start_time,end_time,description,color,created_by) VALUES('$event_name','$sDate','$eDate','$sTime','$eTime','$description','$color',NOW())";
				$event_add_fetch = $mysqli->query($event_add_query);
				if ($event_add_fetch) 
				{
					
				}
			}
		?>
	</div>
</body>