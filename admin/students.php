<?php
 require_once "../students/session.php";
 include '../navbars/home_navbar.php';
 require_once "../inc/connection.php";


 ?>
<head>
	<title>OCTPs&reg; | Student List</title>
	<style type="text/css">
		h5.stud_list_title{
		  font-weight: 400;
		  font-size: 17px;
		}
		h5 >i.view{
			margin-top:-3px;
		}
		div.stud_list{
			background-color: #e9e9e9;
			border-left: 2px solid lightblue;
		}
		div.stud_list:hover{
			background-color: #ffffff;
			cursor: pointer;

		}
		span.image{
			width: 50px;
			height: auto;
			
		}
		span.image > img{
			width: 40px;
			height: 40px;
			margin-top: 8px;
			border:3px solid rgba(0,0,0,0.25);
		}
		span.name{
			position: relative;
			top: 17px;
			left: 0px;
			font-weight: 500;
		}
		span.email{
			position: relative;
			top: 17px;
			font-weight: 500;
		}
		span.email > a{
			color: black;
		}
		span.email > a:hover{
			text-decoration: underline;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		span.phone,span.side_menu{
			position: relative;
			top: 17px;
			font-weight: 500;
		}
		.mt10{
			margin-top: 13px;
			display: none;
			padding: 2px 2px 2px 2px;
			/*background-color: rgba(0,0,0,0.25);
			border-bottom-right-radius: 50%;
			border-bottom-left-radius: 50%;
			border-top-right-radius: 50%;
			border-top-left-radius: 50%;*/
			color: #929292;
		}
		a#edit{

		}
		div.template{
			border-radius:3px;
		}
		span.status{
			position: absolute;
			z-index: 9999;
			margin-left: -25px;
			border-radius: 20px;
			color:white;
			font-size: 14px;
			font-weight: 600;
			padding-right: 10px;
			padding-top: 3px;
		}
		div.cont_size{
			margin-left: -12px;
			margin-right: -12px;
		}
		.mt2{
			margin-top: 2px;
		}
		span.stud_det{
			margin-left: 10px;
			font-weight: 500;
			font-size: 14px;
			text-shadow: 1px 1px 1px #919191;
			text-transform: capitalize;
		}
		i.lo{
			margin-top: -2px;
			margin-left: 2px;
		}
		div#student_body{
			display: none;
		}
		div#preloader{
			position: relative;
			z-index: 99999;
			top: -6px;
		}
		div.bg{
			position: relative;
		/*	margin:50px auto;*/
			width:auto;
			height: 400px;
		}
		img.help{
			width: 100%;
			height: 400px;
		}

	</style>
</head>
<body>
	 <div class="main-page">
		<div class="row">
			<div class="col s2 m2 l2" id="side-pane">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10">
				<!--  <div id="preloader">
	                 <div class="progress" id="loader">
	                      <div class="indeterminate blue"></div>
	                  </div>
                </div> -->
				<div class="content_body">
					<div class="row">
						<div class="col s12 m12 l12 animated fadeIn" id="student_body">
							<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">view_list</i>Students' List</h5>
							<!-- Selecting the students from the database -->
							<?php
								$query = "SELECT * FROM register WHERE Profile = 'student'";
								$results = $mysqli->query($query);
								$count = $results->num_rows;
								if ($count > 0)
								{
									while ( $row = $results->fetch_array(MYSQLI_BOTH))
										{
											$stud_firstname = $row['f_Name'];
											$stud_lastname = $row['l_Name'];
											$stud_othername = $row['other_Name'];
											$stud_id 		= $row['Stud_id'];
											$stud_email 	= $row['email'];
											$stud_image 	= $row['picture'];
											$stud_program   = $row['program'];
											$stud_department = $row['department'];
											//Defining some special characters
											$student_image = substr($stud_firstname,0,4);
											
											?>
											<div class="col s12 m2 l2">
												<div id="<?php echo "$stud_id";?>" class="card-panel col s12 waves-effect waves-block waves-ripple template">
													<div class="cont_size" id="<?php echo "$user_identifier";?>">
														<div class="stud_avatar">
															<img src="../images/admin/boy.svg" class="responsive-img mt2"/>
														</div>
														<span class="stud_det text-center small-text center-align">
														 <?php echo "$stud_firstname"." "."$stud_lastname";?>
														</span><br>
														<!-- <span class="stud_det text-center small-text text-center">
														 Date Here
														</span><br> -->
													</div>
												</div>
												<span id="<?php echo "$user_identifier"; ?>" class="status z-depth-1 waves-effect waves-block waves-ripple light-blue accent-3"><i class="material-icons left lo">my_location</i>Mapper</span>
											</div>
											
											<script type="text/javascript">
													$(document).ready(function(){
														$("#edit_form").css("margin-top","-150px");
														// $("div.stud_list").hover(
														// 	function(){
														// 	 $("i.mt10").css("display","block");
														// 	},
														// 	function(){
														// 	  $("i.mt10").css("display","none");
														// 	}

														// );
														var Name = "<?php echo "$lord"; ?>";
														
														$("div#<?php echo "$stud_id";?>").click(function(){
															// $.each('arrayVaraible',function(){

															// });
															$.sweetModal({
																	title: '<div class="col s12 m12 l12>\
																	\			<div class="col s2 m2 l2">\
																	\				<img src="../<?php echo "$stud_image";?>" style="width:80px; height=80px;border:4px solid rgba(0,0,0,0.25);" class="circle responsive-img">\
																				</div>\
																	\			<div class="col s8 m8 l8">\
																	\				<span class="name" style="position:absolute;top:50px;left:135px;text-transform:capitalize;"><?php echo "$stud_firstname"." "."$stud_lastname"." "."$stud_othername";?></span>\
																	\				<span class="more_vert"><a href="" style="position:absolute;top:20px;right:60px;"><i class="material-icons right grey-text text-darken-2">delete</i></a><a href="" style="position:absolute;top:20px;right:100px;"><i class="material-icons right grey-text text-darken-2">archive</i></a></span>\
																				<div>\
																			</div>',

																	content: '<form action="" method="post">\
																                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
																	                <input type="text" name="firstname" class="validate" id="firstname" value="<?php echo "$stud_firstname"." "."$stud_lastname".""."$stud_othername";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;"><label for="firstname" class="active">First Name</label>\
																                </div>\
																                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">credit_card</i>\
																	                <input type="text" name="id" class="validate" value="<?php echo "$stud_id";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
																	                <label for="icon_prefix" class="active">ID</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">email</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_email";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
																	                <label for="icon_prefix" class="active">Email</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">book</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_program";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
																	                <label for="icon_prefix" class="active">Program</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">store</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_department";?>" disabled style="font-size:14px;font-weight:400;line-height:1;color:#919191;">\
																	                <label for="icon_prefix" class="active">Department</label>\
																                </div>\
																           </form>',
																	width  : '600px',
																	// type   : $.sweetModal.TYPE_MODAL,
																	// theme  : $.sweetModal.THEME_DARK,
																});
														});

													  
													});

												</script>
											<?php
										}
								}
								else
								{
									echo 
										'<div class="col s12 m12 l12">
											<div class="card-panelm bg">
												<img src="../images/admin/empty_list.svg" alt="Help Desk" class="responsive-img help"/>
											</div>
											<h5 class="center-align grey-text text-darken-3">Students\' List Empty</h5>
											<h5 class="center-align grey-text text-darken-3 small-text">Create One Now</h5>
										</div>
										';
								}
								
								$results->close();
							?>
						</div>
					</div>
				</div>
					<script  src="../scripts/admin/letter_status.js" type="text/javascript"></script>
					<div id="view" class="fixed-action-btn" style="right: 70px;bottom: 40px;">
					    <a  href class="btn-floating btn-large light-blue accent-3">
					      <i class="large material-icons tooltipped" data-tooltip="View" data-position="left" data-delay="5">remove_red_eye</i>
					    </a>
					    <ul>
					      <li><a id="approved" class="btn-floating green accent-4 tooltipped" data-tooltip="Approved Student Letters" data-position="left" data-delay="5"><i class="material-icons">done_all</i></a></li>
					      <li><a id="pend" class="btn-floating amber darken-3 tooltipped" data-tooltip="Pending Student Letters" data-position="left" data-delay="5"><i class="material-icons">timeline</i></a></li>
					    </ul>

				    </div>
					<?php
						$qs = "SELECT district_name FROM district";
						$res = $mysqli->query($qs);
						$count = $res->num_rows;
						$district = array();
						$response = array();

						while ($row = $res->fetch_array(MYSQLI_BOTH))
						{
							$reg_abbr = $row['reg_Abbrv'];
							$fullname = $row['district_name'];

							//Assigning to the first array 
							$district[] = array('fullname'=>$fullname);
						
														
						}
						$response['districts'] = $district;
						$fp = fopen('/var/www/html/offcampus/json/districts.json','w');
						fwrite($fp, json_encode($response,JSON_PRETTY_PRINT));
						fclose($fp);

						
					?>
					<script type="text/javascript">
						$("a#pend").on('click',function(){
							$("div#student_body").load("pending_letters.php");
							$("ul.back-button").css({"display":"block","opacity":"1"});
						});
						$("a#approved").on('click',function(){
							$("div#student_body").load("done_letters.php");
							$("ul.back-button").css({"display":"block","opacity":"1"});
						});

						$(window).load(function(){
				              setTimeout(function() {
				                 $("div#preloader").fadeOut('slow');
				              }, 2000);
				              setTimeout(function() {
				                $("div#student_body").fadeIn('slow');
				              }, 2000);
				                
				        });

				      

					</script>
					<?php 
						$pend_query = "SELECT COUNT(*) AS TOTAL_PEND from student_details WHERE action='1'";
						$pend_query1 = "SELECT COUNT(*) AS TOTAL_APPROVED from student_details WHERE action='2'";

						$pend_fetch = $mysqli->query($pend_query);
						$pend_fetch1 = $mysqli->query($pend_query1);

						$pend_row = $pend_fetch->fetch_array(MYSQLI_BOTH);
						$total_pending_letters = $pend_row['TOTAL_PEND'];

						$pend_row1 = $pend_fetch1->fetch_array(MYSQLI_BOTH);
						$total_approved_letters = $pend_row1['TOTAL_APPROVED'];
					?>
					<!-- scripts for some magics -->
					<script type="text/javascript">
						var pendCount = "<?php echo "$total_pending_letters";?>";
						var approvedCount = "<?php echo "$total_approved_letters"; ?>";
						console.dir("pENDCOUNT " +pendCount);
						console.dir("aPPROVEDCOUNT " + approvedCount);

						//scripts for pending
						if (pendCount > 0)
						 {
						 	$("a#pend").addClass("pulse");
						 }
						 else{
						 	$("a#pend").removeClass("pulse");
						 }

						 //scripts for approved
						 if (approvedCount > 0)
						  {
						  	$("a#approved").addClass("pulse");
						  }
						  else{
						  	$("a#approved").removeClass("pulse");
						  }
					</script>
		
			</div>

			<!-- Modal for the editting dialog page -->
			<div id="modal">
			    <!-- Page content -->
			    <?php $lord = "Acheampong Kay"; ?>

			</div>
			
		</div>
	</div>
</body>