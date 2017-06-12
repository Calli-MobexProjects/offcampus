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
			max-height: 569px;
			height: 569px;
			font-size: 0.8em;
		}
		


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
						$event_query = "SELECT * FROM events";
						$event_fetch = $mysqli->query($event_query);
						$event_count = $event_fetch->num_rows;
						if ($event_count > 0)
						{
							echo "Do something";
						}
						else{
							?>
					<div class="card-panelm bg">
						<img src="../images/admin/alarm-clock.svg" alt="Help Desk" class="responsive-img help"/>
					</div>
					<h5 class="center-align grey-text text-darken-3 small-text">No Events Available, Create One Now</h5>
					<h5 class="center-align grey-text text-darken-3 small-text"><a class="btn light-blue accent-3 waves-effect waves-ripple cevents"><i class="material-icons left">event</i>Create Event</a></h5>
							<?php
						}
					?>
				</div>
			</div>
			<script type="text/javascript">
				$(window).load(function(){
						$('#mycalendar').monthly({
								mode: 'event',
								jsonUrl: '../vendors/monthly/events.json',
								dataType: 'json'
								// xmlUrl: '../vendors/monthly/events.xml'
							});
				});

				$("a.cevents").on('click',function(){
					$.sweetModal({
						title:'<i class="material-icons left">event</i>Create Event',
						content:'<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
						              <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="event_name">event_seat</i>\
							                <input type="text" name="name" class="validate" id="name" required>\
							                <label for="event_name">Event Name</label>\
						                </div>\
						                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
							                <input type="date" name="date" class="datepicker" id="mytarget" required>\
							                <label for="mytarget">Start Date</label>\
						                </div>\
						                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
							                <i class="material-icons prefix" id="icon_prefix">date_range</i>\
							                <input type="date" name="date" class="validate" id="phone" required>\
							                <label for="icon_prefix">End Date</label>\
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

								}
							}
						}
					});

					   $('.datepicker').pickadate({
						    selectMonths: true, // Creates a dropdown to control month
						    selectYears: 15 // Creates a dropdown of 15 years to control year
					  });
				});

			</script>
		</div>
	</div>
</body>