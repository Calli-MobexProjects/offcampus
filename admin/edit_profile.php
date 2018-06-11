<?php 
require_once '../inc/connection.php';
include "../navbars/home_navbar.php";

require("mappings/QueryClass.php");
use \mappings\QueryClass\QueryClass as DataMapper;
$results = new DataMapper(); 

//Getting the results using the user id
$edit_data = $results->editProfile($mysqli,$userid);
$edit_results = $edit_data->fetch_array(MYSQLI_BOTH);

$verification_id = $edit_results['Stud_id'];
$firstname 		 = $edit_results['f_Name'];
$lastname 		 = $edit_results['l_Name'];
$othername		 = $edit_results['other_Name'];
$picture 		 = $edit_results['picture'];
$phone			 = $edit_results['phone'];
$email			 = $edit_results['email'];


 ?>
 <title>OCTPs&reg; | Edit Profile</title>
 <div class="edit_profile">
 	<div class="row">
 		<div class="col s2 m2 l2">
 			<?php include '../navbars/sidenav.php'; ?>
 		</div>
 		<div class="col s10 m10 l10">
 			<div class="container">
 				<div class="card-panel col s12 m12 l12">
 					<form style="padding-top: 10px;" method="post" action="edit_profile.php">
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">credit_card</i>
 							<input type="text" name="verification_id" id="verification_id" value="<?php echo "$verification_id"; ?>"/>
 							<label for="verification_id">Verification ID</label>
 						</div>
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">account_circle</i>
 							<input type="text" name="firstname" id="firstname" value="<?php echo "$firstname"; ?>" />
 							<label for="firstname">First Name</label>
 						</div>
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">account_circle</i>
 							<input type="text" name="lastname" id="lastname" value="<?php echo "$lastname"; ?>" />
 							<label for="lastname">Last Name</label>
 						</div>
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">account_circle</i>
 							<input type="text" name="othername" id="othername" value="<?php echo "$othername"; ?>" />
 							<label for="othername">Other Name (Optional)</label>
 						</div>
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">phone_msg</i>
 							<input type="number" name="phone" id="phone" value="<?php echo "$phone"; ?>" />
 							<label for="phone">Phone Number</label>
 						</div>
 						<div class="input-field col s12 m6 l6">
 							<i class="material-icons prefix">email</i>
 							<input type="text" name="email" id="email" value="<?php echo "$email"; ?>" />
 							<label for="email">Email Address</label>
 						</div>
 						<div class="input-field col s12 m12 l12">
 							<button type="submit" name="submit" class="btn light-blue accent-3 waves-effect waves-light" id="edit_btn">Update Profile</button>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
