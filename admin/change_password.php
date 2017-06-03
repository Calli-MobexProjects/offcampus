<?php
require_once '../inc/connection.php';
include "../navbars/home_navbar.php";



?>
<head>
	<title>OCTPs &reg; | Change Password</title>
	<style type="text/css">
		div.progress-icons{
			position: relative;
			width: 100%;
			height: 70px;
			margin-right: -25px;
		}
		ul.icon-stable{
			position: absolute;
			margin: 50px auto;
			/*left: 120px;*/
			
		}
		ul.icon-stable li{
			display: inline-block;
			line-height: 2;
			cursor: pointer;
		}
		i#profile{
			font-size: 35px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#super{
			font-size: 45px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#perm_i{
			font-size: 55px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#trending{
			font-size: 65px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#security{
			font-size: 105px;
			color:#00b0ff;
			width: auto;
			height: auto;
			text-shadow: 3px 3px 3px #212121;
		}
		i#location{
			font-size: 65px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#event{
			font-size: 55px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#forum{
			font-size: 45px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		i#info{
			font-size: 35px;
			width: auto;
			height: auto;
			color: #919191;
			text-shadow: 1px 1px 1px #212121;
		}
		div.form-container{
			position: relative;
			top: 100px;
			width: 100%;
			height: auto;

		}
		button.change{
			margin-top: 10px;
			margin-bottom: 15px;
			padding: 15px auto;
			text-transform: capitalize;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="main-pass">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10 animated fadeIn">
				<div class="container">
					<div class="col s10 m10 l10 offset-m1 offset-l1">
							<div class="progress-icons hide-on-med-and-down">
								<ul class="icon-stable">
									<li><i id="profile" class="material-icons">person_pin</i></li>
									<li><i id="super" class="material-icons">supervisor_account</i></li>
									<li><i id="perm_i" class="material-icons">perm_identity</i></li>
									<li><i id="trending" class="material-icons">trending_up</i></li>
									<li><i id="security" class="material-icons">security</i></li>
									<li><i id="location" class="material-icons">place</i></li>
									<li><i id="event" class="material-icons">event</i></li>
									<li><i id="forum" class="material-icons">forum</i></li>
									<li><i id="info" class="material-icons">info</i></li>
								</ul>
							</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<div class="form-container col s10 m10 l10 offset-l1 offset-m1 card-panel">
								<h5 class="grey-text text-darken-1 center-align">Change Password</h5>
								<form role="form" method="post" action="" id="cpForm">
									<div class="input-field col s12">
										<i class="material-icons prefix">lock_outline</i>
										<input type="password" id="newpass" name="newpass" class="validate" required/>
										<label for="newpass">Enter the New Password</label>
									</div>
									<div class="input-field col s12">
										<i class="material-icons prefix">lock</i>
										<input type="password" id="reppass" name="reppass" class="validate" required/>
										<label for="newpass">Repeat Password</label>
									</div>
									<div class="input-field col s12">
										<button type="submit" class="btn light-blue accent-3 change waves-effect waves-light" name="changepass"><i class="material-icons left">security</i>Change Password</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>

				<!-- Submitting the form using jquery and ajax -->
				<script type="text/javascript">
					$(function(){
						$("#cpForm").submit(function(event){
							event.preventDefault();
							var newpass = $("#newpass").val();
							var reppass = $("#reppass").val();

							if (newpass != reppass)
							 {
							 	$.sweetModal({
							 		icon:$.sweetModal.ICON_ERROR,
							 		content: 'Password Do not Match<b style="margin-left:10px;">Cross Check It</b>',
							 		width:'400px',
							 		timeout: 4000,
							 	});
							 }
							 else{
								$.post({
									url:'change_password.php',
									data:{ndata:newpass,rdata:reppass},
									success:function(){
										
									}
								});
							 }
							
						});
					});
				</script>
				<?php
					if (isset($_POST['ndata']) && isset($_POST['rdata']))
						{
							$newpass = $_POST['ndata'];
							$reppass = $_POST['rdata'];
							$query = "INSERT INTO lord(newpass,reppass) VALUES('$newpass','$reppass')";
							$res   = $mysqli->query($query);
							if ($res)
							{
								echo "Good Someting";
							}
						}
				?>
			</div>
		</div>
	</div>
</body>