<head>
	<title>Farm Base&reg; | Register</title>
</head>
<?php
session_start();
ini_set( 'error_reporting', E_ALL);
ini_set( 'display_errors', true );
include("navbars/navbar.php");
require_once "inc/connection.php";

if (isset($_POST['proceed'])) 
{
  //Accessing the user input from the form
	$student_id = trim($_POST['student_id']);
	$firstname = trim($_POST['firstname']);
	$lastname  = trim($_POST['lastname']);
	$othername = trim($_POST['othername']);
	$course    = trim($_POST['courseTitle']);
	$email     = trim($_POST['email']);
	$password  = trim($_POST['password']);
	//Encrypting the user password using crypt
	$encryptpass = md5($password);

	$phone 	   = trim($_POST['phone']);
	$student  = "student";
	//Using default image from the dir in the parent collections
	$pic = "images/boys.jpg";
	$department = "N/A";

	$qs = "INSERT INTO register (Stud_id,f_Name,l_Name,other_Name,program,department,picture,password,phone,email,Profile,date_Created) VALUES('$student_id','$firstname','$lastname','$othername','$course','$department','$pic','$encryptpass','$phone','$email','$student',NOW())";

	//Executing the queries
	$res = $mysqli->query($qs);
	if ($res)
	{
		 echo 
	   		' 	<script>
	   				var alert = $("<span>Registration Successfully Done</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';

		header("Location:index.php");
	}
	else
	{
		echo 
   		'
   			<script>
   				var alert = $("<span>Error Occurred While Registering. Contact the Administrator</span>");
        		Materialize.toast(alert, 3500, "rounded");
   			</script>
   		';
	}
}
?>
<body>
	<main class="signup_body">
		<div class="container animated fadeIn">
			<div class="row">
				<div class="col s12 m8 l8 offset-m2 offset-l2 ">
					<div class="card-panel register_title z-depth-2">
						<h5 class="text-center">Sign Up Now !</h5>
					</div>
				</div>
				<div class="col s12 m8 l8 offset-m2 offset-l2">
					<div class="card-panel col s12 form_main z-depth-2">
						<form method="post" action="signup.php">
							<div class="input-field col s12 m12 l12" style="padding-top: 15px;">
								  <i class="material-icons prefix">credit_card</i>
						          <input id="icon_prefix" type="text" name="student_id" class="validate" data-length="14" required="required">
						          <label for="icon_prefix">Student ID</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="icon_prefix" type="text" name="firstname" class="validate" data-length="60" required="required">
						          <label for="icon_prefix">First Name</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="icon_prefix" type="text" name="lastname" class="validate" data-length="60" required="required">
						          <label for="icon_prefix">Last Name</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="icon_prefix" type="text" name="othername" class="validate" data-length="60" required="required">
						          <label for="icon_prefix">Other Name(Option)</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">book</i>
								 <select name="courseTitle" required="required">
									<option value="" disabled selected>Select A Course</option>
										<optgroup label="Education Courses">
											<?php 
												//Selecting from the courses table in  the database
												$query = "SELECT * FROM courses";
												$results = $mysqli->query($query);
												$count = $results->num_rows;

												while ($row = $results->fetch_array(MYSQLI_BOTH))
												{
													// $course_code = $row['course_code'];
													$course_name = $row['course_name'];
													echo "<option value='$course_name'>$course_name</option>";
												}
												$results->close();
												$mysqli->close();
										
											 ?>
										</optgroup>
								</select>
								
							</div>
							<div class="input-field col s12 m12 l12">
								  <i class="material-icons prefix">email</i>
						          <input id="icon_prefix" type="email" name="email" class="validate" data-length="60" required="required">
						          <label for="icon_prefix">Email</label>
						         
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">lock</i>
						          <input id="icon_prefix" type="password" name="password" class="validate" data-length="20" required="required">
						          <label for="icon_prefix">Password</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">phone</i>
						          <input id="icon_prefix" type="number" name="phone" class="validate" data-length="20" required="required">
						          <label for="icon_prefix">Phone</label>
							</div>
							<div class="input-field col s12 m12 l12">
								<button type="submit" name="proceed" id="preload-btn" class="btn light-blue accent-3 waves-effect waves-light z-depth-2 send">Proceed <i class="material-icons right">arrow_forwarded</i></button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('select').material_select();
			});
		</script>

	</main>
	<?php
	include("footer/reg_footer.php");
	?>
</body>