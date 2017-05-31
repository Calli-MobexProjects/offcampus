<head>
	<title>OCTPs&reg; | Register</title>
</head>
<?php
  // $Time=date("Y/m/d h:i:sa"); 
session_start();
ini_set( 'error_reporting', E_ALL);
ini_set( 'display_errors', true );
include("navbars/navbar.php");
require_once "inc/connection.php";

	if(isset($_POST['proceed'])) 
		{
			$student_id = trim($_POST['student_id']);
			$firstname	= trim($_POST['firstname']);
			$lastname 	= trim($_POST['lastname']);
			$othername 	= trim($_POST['othername']);
			$course 	= trim($_POST['courseTitle']);
			$email 		= trim($_POST['email']);
			$password 	= $_POST['password'];
			# code...
			#Encrypting the password for the users
			$encryptpass = md5($password);
			$phone   = trim($_POST['phone']);

			//Assigning default values to department and Profile
			$department = "N/A";
			$picture	= "images/boys.jpg";
			$profile 	= "student";

			//inserting data into the database
			$signup_query = "INSERT INTO register VALUES('$student_id','$firstname','$lastname','$othername','$course','$department','$picture','$encryptpass','$phone','$email','$profile','2017-05-30 05:08:12','2017-05-30 05:08:12')";

			$signup_result = $mysqli->query($signup_query);

			if ($signup_result)
			{
				?>
				<script type="text/javascript">
					$.sweetModal({
						icon:$.sweetModal.ICON_SUCCESS,
						content: 'Registration Successfull',
						width:'400px',
						timeout:2800

					});
					setTimeout(function() {
						window.location = "index.php";
					}, 3000);
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					$.sweetModal({
						icon:$.sweetModal.ERROR,
						content: 'Error Occurred, Contact System Admin',
						width:'400px',
						timeout:2800

					});
					setTimeout(function() {
						window.location = "signup.php";
					}, 3000);
				</script>
				<?php
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
						<form method="post" action="signup.php" id="regForm">
							<div class="input-field col s12 m12 l12" style="padding-top: 15px;">
								  <i class="material-icons prefix">credit_card</i>
						          <input id="student_id" type="text" name="student_id" class="validate" data-length="14" required="required">
						          <label for="student_id">Student ID</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="firstname" type="text" name="firstname" class="validate" data-length="60" required="required">
						          <label for="firstname">First Name</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="lastname" type="text" name="lastname" class="validate" data-length="60" required>
						          <label for="lastname">Last Name</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">person_pin</i>
						          <input id="othername" type="text" name="othername" class="validate" data-length="60">
						          <label for="othername">Other Name(Option)</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">book</i>
								 <select name="courseTitle" required="required" id="course">
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
						          <input id="email" type="email" name="email" class="validate" data-length="60" required="required">
						          <label for="email">Email</label>
						         
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">lock</i>
						          <input id="password" type="password" name="password" class="validate" data-length="20" required>
						          <label for="password">Password</label>
							</div>
							<div class="input-field col s12 m6 l6">
								  <i class="material-icons prefix">phone</i>
						          <input id="phone" type="number" name="phone" class="validate" data-length="20" required>
						          <label for="phone">Phone</label>
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