<?php
include('session.php');
include('../inc/connection.php');

 $query="SELECT * FROM register WHERE Stud_id= '$ses_id'";
     $querying=mysqli_query($mysqli,$query);
$fetch=mysqli_fetch_assoc($querying);
 
      $userid=$fetch['Stud_id'];
     $f_name=$fetch['f_Name'];
     $l_name=$fetch['l_Name'];
     $other_name=$fetch['other_Name'];
     $program=$fetch['program'];
     $picture=$fetch['picture']; 
     $phone=$fetch['phone']; 
     $email=$fetch['email']; 
     $login_time=$fetch['login_time']; 
   $Name=$f_name.' '.$l_name.' '.$other_name;




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="../images/octps.ico">

	<!-- Css links for the system -->
	<link rel="stylesheet" type="text/css" href="../libs/css/animate.css">
	<link rel="stylesheet" type="text/css" href="../libs/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../libs/css/styles.css">


	<!-- <link rel="stylesheet" type="text/css" href="../vendors/sweetalerts/css/sweetalert2.min.css"> -->
	<link rel="stylesheet" type="text/css" href="../libs/css/mods.css">
	<link rel="stylesheet" type="text/css" href="../vendors/iziToast/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/sweetModal/min/jquery.sweet-modal.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/sweetDropdown/min/jquery.sweet-dropdown.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/noty/lib/noty.css">

	<style type="text/css">
		div.navigation{
			position: fixed;
			margin-top: -5px;
			width: 16%;
			height: 100%;
			z-index: 2;
			background-color: #eeeeee;
			margin-bottom: 20px;

		}
		div.content_body{
			width: 100%;
			height: 100%;
			
		}
		.navigation:hover{
		  overflow-y: auto;
		  white-space: nowrap;
		  width: 216px;
		  overflow-y:scroll;
		}
		.navigation::webkit-scrollbar{
		  background: transparent;
		  width: 8px;
		}
		ul.nav-demo{
		  list-style: none;
		  padding: 12px 5px 12px 5px;
		  margin-bottom: 50px;

		}

		ul.nav-demo li{
		  display: block;
		  padding: 12px 5px 12px 5px;
		  margin-top: 4px;
		  margin-bottom: 4px;
		  margin-right: 10px;
		 
		}
		ul.nav-demo li.active{
			background-color: rgba(0,0,0,0.05);
		}

		ul.nav-demo li:hover{
		  background-color: rgba(0,0,0,0.05);
		  cursor: pointer;

		}
		ul.nav-demo li a{
		   font-size: 13px;
		   font-weight: 600;
		   padding: 12px 5px 12px 5px;
		}
		span.menu_name{
			margin-top: 2px;
			color: #212121;
		}
		a > i.icon{
			margin-bottom: 4px;
			color: #212121;
			margin-left: 15px;
		}
		li.header{
		  pointer-events: none;
		}
		li.header:hover{
			background-color: transparent;
		}
		#total_students{
			background-color: #90caf9;
  			background-image: -webkit-linear-gradient(73deg,#ffffff 50%,#90caf9 50%);
		}
		i.total_img{
			font-size: 12em;
			text-shadow: 2px 2px 2px #212121;
		}
		.small-text{
			font-size:16px;
			font-weight: bold;
		}
		span.indicator{
			position: absolute;
			top: 40px;
			right: 30px;
			font-size: 18px;
			font-weight: bold;
			color: white;
			text-shadow: 1px 1px 1px #212121;
		   /*-webkit-text-fill-color: white;  Will override color (regardless of order) 
		   -webkit-text-stroke-width: 1px;
		   -webkit-text-stroke-color: #424242;*/
		}
		li a.bg:hover{
			background-color: transparent;
		}
		/* styles for the overlay navbar */
		div#overlay{
			position: absolute;
			width: 100%;
			height: 66px;
			background-color: #e1f5fe;
			z-index: 999;
			top: 0px;
			right: 0px;
			transition: all 1s ease-in;
			transform: scale(0.25),translateY(-25px);
			visibility: hidden;
		}
		ul.back{
			width: 50%;
			height: 60px;
		}
		ul.back li{
			margin-top: 20px;
			margin-left:34px;
		}
		ul.details li{
			width: 10%;
			height: 60px;
			display: inline-block;
			margin-top: 20px;

		}
		ul.details li a{
			width: 10%;
			height: 60px;
		}

		/* codes for the pointer on the back arrow button */
		a#close
		{
			margin-top: -4px;
			cursor: pointer;
			padding: 5px 5px 5px 5px;	
		}
	</style>
</head>
<body>
	<!--Defining the navigation bar for the system -->
	<div class="navbar-fixed">
		<nav>
			<div id="main_nav" class="nav-wrapper light-blue accent-3 z-depth-2">
			<!-- hamburger button to show on small pages -->
				<a href="#" class="brand-logo hide-on-med-and-up" id="button-collapse" data-activates="slide-out" style="margin-left: 10px;">
					<i class="material-icons">menu</i>
					<small class="name"><?php echo $Name; ?></small>
				</a>

			<!-- image  show on medium and large screens -->
				<a href="#"  class="brand-logo hide-on-small-only" style="margin-left: 37px;margin-top: -4px;">
					<i class="material-icons">perm_identity</i>
					<small class="name"><?php echo $Name; ?></small>
				</a>
               
				<ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>Login Time:  <small class="name" style="padding-right:20px;"><?php echo $login_time; ?></small></li>
					<!--<li><a href=""><i class="material-icons left">bell</i></li>-->
					<li>
						<a  href data-dropdown="#dropdown-with-icons" class="bg">
							<img class="circle toolbar_img" src="../<?php echo $picture; ?>" width="35px" height="35px" style="border:4px solid rgba(0,0,0,0.25);margin-top: 14px;">
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<!-- Overlay navigation bar for the selection of all of the contact list -->
	<div class="overlay-navbar" id="overlay">
		<ul class="back left">
			<li>
				<a id="close" class="waves-effect waves-blue">
					<i class="material-icons left">arrow_back</i><span style="font-weight: 500;font-size: 16px;">Back</span>
				</a>
			</li>
			<li style="position: absolute;top: 0px;left: 250px;">
			      <input type="checkbox" id="test5" />
			      <label for="test5"></label>  
			</li>
		</ul>
		<ul class="details right">
			<li style="margin-right: 10px;">
				<a  href><i class="material-icons right" style="margin-right: 15px;"><?php echo $email; ?></i></a>
			</li>
			<li>
				<a href data-dropdown="#dropdown-with-overlayDetails">
					<i class="material-icons right">more_vert</i>
				</a>
			</li>
		
		</ul>
	</div>
	<!-- navigation overlay ends here -->
	<!-- Dropdown for the navigation overlay of the all selection -->
	<div class="dropdown-menu dropdown-anchor-top-right dropdown-has-anchor" id="dropdown-with-overlayDetails" style="margin-top: 40px;margin-left: 20px;">
		<ul>
			<li><a href="#"><i class="material-icons left" style="margin-top:-3px;">archive</i>Move To Archives</a></li>
			<li class="divider"></li>
			<li><a href="#"><i class="material-icons left" style="margin-top:-3px;">delete_sweep</i>Delete Selected</a></a></li>
			
		</ul>
	</div>

	<!-- Dropdown Context for the logout of the user accounts -->
	<div class="dropdown-menu dropdown-anchor-top-right dropdown-has-anchor" id="dropdown-with-icons" style="width: 30%;height: auto;border:1px solid #f1f1f1;margin-left: -10px;margin-top: -6px;">
		<ul>
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="col s4 m4 l4">
						<a  id="uploadPhoto" class="waves-effect waves-block waves-blue" style="width: 120px;height: 120px; border-radius: 50%;margin-top: 10px;border:2px solid rgba(0,0,0,0.25); ">
							<img src="../images/boys.jpg" class="responsive-img circle" width="120px" height="120px">
						</a>
					</div>
					<div class="col s8 m8 l8" style="text-align:center;">
							<span class="grey-text text-darken-3" style="margin-left: 45px;"><?php echo $Name; ?></span>
				   		  	<span class="grey-text text-accent-2" style="margin-left: 40px;"><?php echo $email; ?></span>
				   		  	<span class="grey-text text-accent-2" style="margin-left: 40px;margin-right: 5px;">User Profile |  <a href="" style="margin-left: 5px;">Policy Info</a></span>
				   		  	<a class="btn light-blue z-depth-1" href="#" style="text-transform: capitalize;font-size: 12px;margin-left: 40px;margin-top: 20px;">My Accounts</a>
					</div>
					<div class="col s12 m12 l12">
						<div class="divider"></div>
						<a href="../students/logout.php" class="btn-flat" style="text-transform: capitalize;font-size: 13px;margin-top: 10px;border:1px solid #ccc;">Sign out</a>
					</div>
				</div>
			</div>
		</ul>
	</div>

	<ul id="slide-out" class="side-nav hide-on-med-and-up">
    	<li>
	    	<div class="userView">
		      <div class="background">
		        <img src="../images/bg_image.jpg">
		      </div>
		      <a href="#!user"><img class="circle" src="../images/boys.jpg"></a>
		      <a href="#!name"><span class="white-text name">Jane Doe</span></a>
		      <a href="#!email"><span class="white-text email"></span></a>
		    </div>
	    </li>
	    <li>
	   	 	<a  class="waves-effect waves-green waves-ripple" href="index.php"><i class="material-icons">home</i>Home</a>
	    </li>
	    <li>
	    	<a  class="waves-effect waves-green waves-ripple" href="profile.php"><i class="material-icons">insert_drive_file</i>Apply</a>
	    </li>
	    <li>
	    	<a  class="waves-effect	waves-green waves-ripple" href="#!"><i class="material-icons">file_download</i>Assessment Form</a>
	    </li>
	    
	    <li><div class="divider"></div></li>
	    <li><a class="subheader">Accounts</a></li>
	    <li><a class="waves-effect" href="#!"><i class="material-icons">lock</i>Change Password</a></li>
	    <li><a class="waves-effect" href="settings.php"><i class="material-icons">build</i>Settings</a></li>
	    <li><a class="waves-effect" href="#!"><i class="material-icons">info</i>Help</a></li>
	    <li><a class="waves-effect" href="#!"><i class="material-icons">comment</i>Feedback</a></li>
  </ul>

	<script type="text/javascript" src="../libs/js/jquery.js"></script>
	<script type="text/javascript" src="../vendors/sweetModal/min/jquery.sweet-modal.min.js"></script>
	<script type="text/javascript" src="../vendors/sweetDropdown/min/jquery.sweet-dropdown.min.js"></script>
	<script type="text/javascript" src="../vendors/iziToast/js/iziToast.min.js" ></script>
	<script type="text/javascript" src="../vendors/noty/lib/noty.js"></script>
	<script type="text/javascript" src="../libs/js/materialize.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script type="text/javascript" src="../libs/js/custom.js"></script>
	<script type="text/javascript" src="../libs/js/activities.js"></script>
	<script type="text/javascript">
		var monitor = 0;
		$(document).ready(function(){
			 $('.modal').modal({
			 	dismissible:false,
			 });

			 $('#uploadPhoto').on('click',function(){
			 	$.sweetModal({
						title: {
							tab1: {
								label: 'Upload Photos',
								icon : '<i class="material-icons">laptop_mac</i>'
							},

							tab2: {
								label: 'Use File Path',
								icon : '<i class="material-icons">file_download</i>'
							}
						},

						content: {
							tab1: 'Tab 1',
							tab2: 'Tab 2'
						},

						buttons: {
							someOtherAction: {
								label: 'Set as profile picture',
								classes: 'blueB flat',
								action: function() {
									return $.sweetModal({
														content: 'This is a success.',
														icon: $.sweetModal.ICON_SUCCESS,
														timeout : 5000
													});

								}
							},

							someAction: {
								label: 'Cancel',
								classes: 'lightGreyB bordered flat',
								action: function() {
									return $.sweetModal('You clicked Action 1!');
								}
							},
						}
					});
			 });

			$("#close").click(function(){
				$("div#overlay").css({"visibility":"hidden","opacity":"0"});
				$('input[type="checkbox"]').prop("checked",false);
				$("#img").css({"visibility":"visible","opacity":"1","transition":"all 0.1s ease-in"});
				$("span.checkmate").css({"visibility":"hidden","opacity":"0","transition":"all 0.1s ease-out"});
				$('div.stud_list').css({"border-left":"2px solid lightblue","background-color":"#eeeeee"});
				monitor = 1;
				if (monitor == 1) 
				{
					navbarHover();
				}
			});

		});

		function navbarHover()
		{
			$("div.stud_list").hover(
				function(){
					$("span.checkmate").css({"visibility":"visible","opacity":"1","transition":"all 0.1s ease-in"});
					$("#img").css({"visibility":"hidden","opacity":"0","transition":"all 0.1s ease-out"});
					$("div.stud_list").css("background-color","#ffffff");
				},function(){
					$("span.checkmate").css({"visibility":"hidden","opacity":"0","transition":"all 0.1s ease-out"});
					$("#img").css({"visibility":"visible","opacity":"1","transition":"all 0.1s ease-in"});
					$("div.stud_list").css("background-color","#eeeeee");
				}
			  );
		}
	
	</script>
</body>
</html>