<?php
ob_start();
session_start();
//Unset the variables stored in the session
unset($_SESSION['userid']);
//ini_set('session.use_strict_mode',1);
include("navbars/navbar.php");
?>
<head>
	<title>OCTPs&reg; | Login</title>
</head>
<body>
	<main class="signup_body">
		<div class="container animated fadeIn">
			<div class="row">
				<div class="col s12 m8 l8 offset-m2 offset-l2 ">
					<div class="card-panel login_title z-depth-2" style="margin-top: 65px;">
						<h5 class="text-center">Sign In </h5>
					</div>
				</div>
				<div class="col s12 m8 l8 offset-m2 offset-l2">
					<div class="card-panel col s12 form_main z-depth-2">
						<form method="post" action="log.php" autocomplete="on">
							<div class="input-field col s12 m12 l12" style="padding-top: 15px;">
								  <i class="material-icons prefix">credit_card</i>
						          <input id="icon_prefix" type="text" name="student_id" class="validate" data-length="14" required="required">
						          <label for="icon_prefix">ID</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <i class="material-icons prefix">lock</i>
						          <input id="icon_prefix" type="password" name="password" class="validate" data-length="60" required="required">
						          <label for="icon_prefix">Password</label>
							</div>
							<div class="input-field col s12 m12 l12">
								<button type="submit" name="login" id="preload-btn" class="btn light-blue accent-3 waves-effect waves-light z-depth-2 send">Proceed <i class="material-icons right">arrow_forwarded</i></button>
							</div>
							<div class="input-field col s12 m12 l12" id="forgotpass">
								<a href="signup.php">Create An Accounts</a>   <a href="">Forgot Password ?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php
	include("footer/login_footer.php");
	?>
</body>
 