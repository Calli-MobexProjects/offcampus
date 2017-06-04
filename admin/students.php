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

	</style>
</head>
<body>
	 <div class="main-page">
		<div class="row">
			<div class="col s2 m2 l2" id="side-pane">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10 animated fadeIn">
				<div class="content_body">
					<div class="row">
						<div class="col s12 m12 l12">
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
											<div class="card-panel z-depth-0 waves-effect waves-block waves-ripple col s12 stud_list" id="<?php echo "$stud_id";?>">
												<div class="col s2 m2 l2" id="img">
													<span class="image"><img src="../<?php echo "$stud_image";?>" alt="avatar" class="responsive-img circle"></span>
												</div>
												<div class="col s3 m3 l3" id="name">
													<span class="name left-align"><?php echo "$stud_firstname"." ".$stud_lastname."".$stud_othername;?></span>
												</div>
												<div class="col s2 m2 l2" id="phone">
													<span class="phone"><?php echo "$stud_id";?></span>
												</div>
												<div class="col s3 m3 l3" id="email">
													<span class="email left-align"><a href="#"><?php echo "$stud_email";?></a></span>
												</div>
												
												<div class="col s2 m2 l2">
													<span class="side_menu">
														Date Here
													</span>
												</div>
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
																	\				<span class="name" style="position:absolute;top:50px;left:135px;"><?php echo "$stud_firstname"." "."$stud_lastname"." "."$stud_othername";?></span>\
																	\				<span class="more_vert"><a href="" style="position:absolute;top:20px;right:60px;"><i class="material-icons right grey-text text-darken-2">delete</i></a><a href="" style="position:absolute;top:20px;right:100px;"><i class="material-icons right grey-text text-darken-2">archive</i></a></span>\
																				<div>\
																			</div>',

																	content: '<form action="" method="post">\
																                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
																	                <input type="text" name="firstname" class="validate" id="firstname" value="<?php echo "$stud_firstname"." "."$stud_lastname".""."$stud_othername";?>" disabled><label for="firstname" class="active">First Name</label>\
																                </div>\
																                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">credit_card</i>\
																	                <input type="text" name="id" class="validate" value="<?php echo "$stud_id";?>" disabled>\
																	                <label for="icon_prefix" class="active">ID</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">email</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_email";?>" disabled>\
																	                <label for="icon_prefix" class="active">Email</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">book</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_program";?>" disabled>\
																	                <label for="icon_prefix" class="active">Program</label>\
																                </div>\
																                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
																	                <i class="material-icons prefix" id="icon_prefix">store</i>\
																	                <input type="email" name="email" class="validate" value="<?php echo "$stud_department";?>" disabled>\
																	                <label for="icon_prefix" class="active">Department</label>\
																                </div>\
																           </form>',
																	width  : '680px'
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
										'<div class="card-panel z-depth-0 col s12 m12 l12" style="background-color:#eeeeee;">
											<div class="empty_list">
												<div class="image_list">
													<img src="../images/admin/empty_list.svg" class="responsive-img" alt="Empty List"/>
													<span class="empty_title">No Lecturer Added</span>
												</div>

											</div>
										</div>
										';
								}
								
								$results->close();
							?>
							
						</div>
					</div>
				</div>
					<div class="fixed-action-btn" style="right: 70px;bottom: 40px;">
					    <a  href class="btn-floating btn-large pulse light-blue accent-3">
					      <i class="large material-icons tooltipped" data-tooltip="View" data-position="left" data-delay="5">remove_red_eye</i>
					    </a>
					    <ul>
					      <li><a class="btn-floating green accent-3 tooltipped" data-tooltip="Approved Student Letters" data-position="left" data-delay="5"><i class="material-icons">done_all</i></a></li>
					      <li><a class="btn-floating amber darken-3 tooltipped" data-tooltip="Pending Student Letters" data-position="left" data-delay="5"><i class="material-icons">more_horiz</i></a></li>
					    </ul>

				    </div>
					<?php
						$qs = "SELECT district_name FROM district";
						$res = $mysqli->query($qs);
					
						while ($row = $res->fetch_array(MYSQLI_BOTH))
						{
							$distArray = array($row['district_name']=>$row['district_name']);	
							$json = json_encode($distArray,JSON_PRETTY_PRINT);
							
														
						}
					?>
		
			</div>
			<!-- Modal for the editting dialog page -->
			<div id="modal">
			    <!-- Page content -->
			    <?php $lord = "Acheampong Kay"; ?>

			</div>
			
		</div>
	</div>
</body>