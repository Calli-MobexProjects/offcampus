<?php
session_start();
include '../navbars/home_navbar.php';
require_once "../inc/connection.php";

$id = "lord";
?>
<head>
	<title>OCTPs&reg; | Lecturers' List</title>
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
			transition: 0.2s all ease-in;
			-webkit-transition:0.2s all ease-in;
			-moz-transition:0.2s all ease-in;
			-ms-transition:0.2s all ease-in;
			-o-transition:0.2s all ease-in;
		}
		div.bgColor_list{
			background-color: #e9e9e9;
			border-left: 2px solid lightblue;
			transition: 0.2s all ease-in;
			-webkit-transition:0.2s all ease-in;
			-moz-transition:0.2s all ease-in;
			-ms-transition:0.2s all ease-in;
			-o-transition:0.2s all ease-in;
		}

		div.stud_list:hover{
			background-color: #ffffff;
			cursor: pointer;
			transition: 0.1s all ease-in;
			-webkit-transition:0.1s all ease-in;
			-moz-transition:0.1s all ease-in;
			-ms-transition:0.1s all ease-in;
			-o-transition:0.1s all ease-in;
		}


		div.afterEffect:hover{
			background-color: #ffffff;
			cursor: pointer;
			transition: 0.1s all ease-in;
			-webkit-transition:0.1s all ease-in;
			-moz-transition:0.1s all ease-in;
			-ms-transition:0.1s all ease-in;
			-o-transition:0.1s all ease-in;
		}
		div.checkedBg{
			background-color: #ffffff;
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
		.mt11{
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
		span.checkmate > input{
			margin-left: -300px;
			margin-bottom: 20px;
		}
		span.checkmate{
			position: absolute;
			top: 128px;
			margin-left: -30px;
			visibility: hidden;
		}
		div.empty_list{
			position: relative;
			margin: 50px auto;
			width: 200px;
			height: 200px;
		}
		div.image_list{
			position: absolute;
			top: 60px;
			left: 0;
			right: 0;
		}
		span.empty_title{
			font-family: 'Open Sans', sans-serif;
			font-size: 14px;
			font-weight: 600;
			line-height: 1;
			text-align: center;
			margin-left: 26px;
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
							<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">view_list</i>Lecturers' List</h5>
							<?php
							$qs = "SELECT * FROM lecturer";
							$res = $mysqli->query($qs);
							$count = $res->num_rows;
							
							//using conditional statement to compare the values and the variables
							if ($count > 0) 
							{
								while ($row = $res->fetch_array(MYSQLI_BOTH))
									{
										$lect_image = $row['picture'];
										$lect_fullName = $row['lect_Name'];

										echo '
											<div class="card-panel z-depth-0 col s12 stud_list" id="list1">
												<div class="col s2 m2 l2">
													<span class="image"><img id="img" src="../images/boys.jpg" alt="avatar" class="responsive-img circle"></span>
													 <span class="checkmate">
													 	<input type="checkbox" id="test1"/>
							      			 		 	<label for="test1"></label> 
													 </span>
												</div>
												
												<div class="col s3 m3 l3" id="name">
													<span class="name left-align">'.$lect_fullName.'</span>
												</div>
												<div class="col s2 m2 l2" id="phone">
													<span class="phone">020456987</span>
												</div>
												<div class="col s3 m3 l3" id="email">
													<span class="email left-align"><a href="#">Email Address</a></span>
												</div>
												
												<div class="col s2 m2 l2">
													<span class="side_menu">
														<a href>
															<i class="material-icons right mt10 tooltipped" data-tooltip="Delete" data-delay="5" data-position="bottom">delete</i>
														</a>
														<a href>
															<i class="material-icons right mt10 tooltipped" data-tooltip="Move To Archives" data-position="bottom" data-delay="5">archive</i>
														</a>
														<a id="editMode">
															<i class="material-icons right mt10 tooltipped" data-tooltip="Edit" data-position="bottom" data-delay="5">mode_edit</i>
														</a>
													</span>

												</div>
											</div>
										';
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
							?>
						</div>
					</div>
					<div class="fixed-action-btn" style="right: 70px;bottom: 40px;">
					    <a  id="addLecturer" class="btn-floating btn-large light-blue accent-3">
					      <i class="large material-icons tooltipped" data-tooltip="Add Lecturer" data-position="left" data-delay="5">person_add</i>
					    </a>
					    <!-- <ul>
					      <li><a class="btn-floating red tooltipped" data-tooltip="Add Lecturer" data-position="left" data-delay="5"><i class="material-icons">person_add</i></a></li>
					    </ul> -->
					  </div>
				</div>
			</div>

			
			<!-- Modal for the editting dialog page -->
			<div id="modal">
			    <!-- Page content -->
			    <?php $lord = "Acheampong Kay"; ?>

			</div>
			<script type="text/javascript">
				var res = 0;
				var count = 0;
				$(function(){
					var id = "<?php echo "$id"; ?>";
					console.dir("div#"+id);

					//settting the colors here 

					$("#edit_form").css("margin-top","-150px");
					$("div#list1").hover(
						function(){
						 $("i.mt10").css("display","block");
						},
						function(){
						  $("i.mt10").css("display","none");
						}

					);

					// $("div#"+id+"").hover(
					// 	function(){
					// 	 $("i.mt11").css("display","block");
					// 	},
					// 	function(){
					// 	  $("i.mt11").css("display","none");
					// 	}

					// );

					var Name = "<?php echo "$lord"; ?>";
					$("#img,#name,#email").click(function(){
						$.sweetModal({
								title: '<div class="col s12 m12 l12>\
								\			<div class="col s2 m2 l2">\
								\				<img src="../images/boys.jpg" style="width:80px; height=80px;border:4px solid rgba(0,0,0,0.25);" class="circle responsive-img overview">\
											</div>\
								\			<div class="col s8 m8 l8">\
								\				<span class="name" style="position:absolute;top:50px;left:135px;"><?php echo "$lord";?></span>\
								\				<span class="more_vert"><a href="" style="position:absolute;top:20px;right:60px;"><i class="material-icons right grey-text text-darken-2">delete</i></a><a href="" style="position:absolute;top:20px;right:100px;"><i class="material-icons right grey-text text-darken-2">archive</i></a></span>\
											<div>\
										</div>',

								content: '<form action="" method="post">\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="firstname" class="validate" value="<?php echo "$lord";?>" disabled>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="lastname" class="validate">\
								                <label for="icon_prefix">Last Name</label>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="othername" class="validate">\
								                <label for="icon_prefix">Other Name</label>\
							                </div>\
							           </form>',
								width  : '680px'
							});
					});

					 $("a#editMode").on('click',function(){
					 		$.sweetModal({
							title: 'Edit User Credentials',
							content: '<form action="" method="post">\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="firstname" class="validate">\
								                <label for="icon_prefix">First Name</label>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="lastname" class="validate">\
								                <label for="icon_prefix">Last Name</label>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="othername" class="validate">\
								                <label for="icon_prefix">Other Name</label>\
							                </div>\
							           </form>',
							width:'500px',

							buttons: [
								{
									label: 'That\'s fine',
									classes: 'blueB'
								}
							]
						});
					});

					//Adding a lecturer's modal pane 
					$("#addLecturer").on('click',function(){
						$.sweetModal({
							title: 'Add Lecturer',
							content: '<form action="lecturers.php" method="post">\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="fullname" class="validate">\
								                <label for="icon_prefix">First Name</label>\
							                </div>\
							                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
								                <input type="text" name="lastname" class="validate">\
								                <label for="icon_prefix">Last Name</label>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								                <i class="material-icons prefix" id="icon_prefix">person_pin_circle</i>\
								                <input type="text" name="district" class="validate">\
								                <label for="icon_prefix">District Of Choice</label>\
							                </div>\
							                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
								           \	<button type="submit" class="btn light-blue accent-3 waves-effect waves-light" name="addLecturer"><i class="material-icons left">add</i>Add Lecturer</button>\
							                </div>\
							           </form>',
							width : '700px',

						});
					});
					$(window).load(function(){
						$("span.checkmate").css("visibility","hidden");
						// $("div.stud_list").css("background-color","#e9e9e9");
					});

					 console.dir(res);
					$('input[type="checkbox"]').click(function(){
						if ($(this).prop("checked") == true) 
						{
							$("div#overlay").css({"visibility":"visible","opacity":"1","transition":"0.2s all ease-in","transform":"translateY(0%),scale(1.2)"});
							$("#img").css({"visibility":"hidden","opacity":"0"});
							$("span.checkmate").css({"visibility":"visible","opacity":"1"});
							$("div.stud_list").addClass("checkedBg").css({"border-left":"3px solid #039be5"});
							$("i.mt10").css("display","block");
							// $("input#test5").prop("checked",true);
							count = count + 1;
							res = 1;
							console.log("this is the click: ");
							console.dir(res);
							console.dir(count);

							if (res == 1)
							 {
							 	//calling the outhover function
							 	outHoverAction();
							 }

						}
						else if ($(this).prop("checked") == false){
							$("div#overlay").css({"visibility":"hidden","opacity":"0","transition":"0.2s all ease-out","transform":"translateY(0%),scale(1.2)"});
							$("span.checkmate").css({"visibility":"hidden","opacity":"0"});
							$("i.mt10").css("display","none");
							$("div#list1").removeClass("checkedBg").addClass("afterEffect").css({"border-left":"2px solid lightblue","transition":"0.2s all ease-in"});
							$("#img").css({"visibility":"visible","opacity":"1"});
							// $("input#test5").prop("checked",false);
							$('input[type="checkbox"]').prop("checked",false);
							res = 0;
							if (res == 0) 
							{
								hoverAction();
							}
							console.log("when deactivated");
							console.dir(res);
						}
					});	

					if (res == 0) 
					{
						hoverAction();
						console.log("This is it");
						console.dir(hoverAction());
					}

				});
			function  hoverAction(){
				 $("div.stud_list").hover(
						function(){
							$("#img").css({"visibility":"hidden","opacity":"0"});
							$("span.checkmate").css({"visibility":"visible","opacity":"1"});
						},
						function(){
							$("#img").css({"visibility":"visible","opacity":"1"});
							$("span.checkmate").css({"visibility":"hidden","opacity":"0"});
						}
					);

				return true;
			}

			function outHoverAction(){
				$("div.stud_list").hover(
					function(){
						$("#img").css({"visibility":"hidden","opacity":"0"});
						$("span.checkmate").css({"visibility":"visible","opacity":"1"});
					},function(){
						$("#img").css({"visibility":"hidden","opacity":"0"});
						$("span.checkmate").css({"visibility":"visible","opacity":"1"});
					}
				);

				return true;
			}
			</script>

		</div>

	</div>
</body>