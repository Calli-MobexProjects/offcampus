<?php
	require_once '../inc/connection.php';

     $query="SELECT * FROM student_details WHERE Stud_id= '$ses_id'";
     $querying=mysqli_query($mysqli,$query);
$row=mysqli_fetch_assoc($querying);
 
      $userid=$row['Stud_id'];
      $action=$row['action'];
      $start_Date=$row['start_Date'];
      $start_Date=$row['start_Date'];
      
         

 ?>
 <title>
 	OCTPs&reg; | Apply Now
 </title>
 <body>
 	   <div class="row animated fadeIn">
            <div class="col s12 m12 l12">
                <?php if($action=='1'){ ?>
    			<div class="col s12 m10 l10 offset-l1 offset-m1 card-panel z-depth-0 green">
	                <h4 class="white-text flow-text lh2 center-text">
	                  REQUEST PENDING
	                    <p>WAITING ON APPROVAL</p>
	                </h4>
             	 </div>
              	<?php 
                            }
                            elseif($action=='2' ){
                                ?>
                 <div class="col s12 m10 l10 offset-l1 offset-m1 card-panel z-depth-0 green">
                <h4 class="white-text flow-text lh2 center-text">
                  REQUEST PENDING
                    <p>WAITING ON APPROVAL</p>
                </h4>
              </div>
    
                <?php 
                            }                    
                                                
                                                else{ ?>
                
              <div class="col s12 m8 l8 card-panel offset-m2 offset-l2">
                <h5 class="grey-text text-darken-2"><i class="material-icons left">mode_edit</i>Apply For OffCampus Teaching Curriculum</h5>
                <div class="divider"></div>
                <div class="col s12 m12 l12">
                  <form method="post" action="index.php" >
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">store</i>
                        <input id="icon_prefix" type="text" name="sch_Name" class="validate" data-length="100" required="required">
                        <label for="icon_prefix">School Name (In Which School Do you want to teach)</label>
                    </div>
                     <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">library_books</i>
                        <input id="icon_prefix" type="text" name="sch_prog" class="validate" data-length="100" required="required">
                        <label for="icon_prefix">Program Name (Program you want to teach)</label>
                    </div>
                     <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">supervisor_account</i>
                         <select name="directed_To" required="required">
                          <option value="" disabled selected>Select Letter Head</option>
                            <optgroup label="Letter Heads">
                              <option value="Headmaster">Headmaster</option>
                              <option value="Headmistress">Headmistress</option>
                            </optgroup>
                        </select>
                        <label for="icon_prefix">Letter should be directed to</label>
                    </div>
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px">
                        <i class="material-icons prefix">location_on</i>
                         <select name="region" required="required" class="REGION"  id="totalRegion">
                          <option value="" disabled selected>Select Region</option>
                            <optgroup label="List Of Regions">
                                <?php
                            $query="SELECT * FROM region ";
                            $querying=mysqli_query($mysqli,$query);
                            while($fetch=mysqli_fetch_assoc($querying)){
                                 
                                ?>
                              <option id="region" value="<?php echo $fetch['reg_Abbrv']; ?>"><?php echo $fetch['fullname']; ?></option>
                                <?php 
                                
                            }
                              ?>
                            </optgroup>
                        </select>
                        <label for="icon_prefix">Regions</label>
                    </div>
                    <script type="text/javascript">
                      $("#totalRegion").change(function(event){
                          event.preventDefault();
                          var valueSelected = $("#totalRegion option:selected").val();
                          document.cookie = "val="+valueSelected;
                          console.dir(valueSelected);
                          $.post({
                              url:'apply.php',
                              data:{val:valueSelected},
                              success:function(data){
                              	console.dir(data);
                              }
                          })
                          .done(function(){
                          	
                          })
                          .fail(function(){

                          });
                        });
                    </script>
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px">
                        <i class="material-icons prefix">map_marker</i>
                         <select name="district" required="required" id="district">
                          <option value="" disabled selected>Select District</option>
                            <optgroup label="List Of Regions" id="response">
                                                                
                             <?php
                             if (isset($_COOKIE['val'])) 
                             {
                             	$somevar = $_COOKIE['val'];
                             
                            $dist="SELECT * FROM district WHERE reg_Abbrv = '$somevar'";
                            $run=mysqli_query($mysqli,$dist);
                            while($row=mysqli_fetch_assoc($run)){
                                 
                                ?>
                              <option  value="<?php echo $row['district_name']; ?>"><?php echo $row['district_name']; ?></option>
                                <?php 
                                
		                            }
		                        }
                              ?>

   
                             
                            </optgroup>
                        </select>
                        <label for="icon_prefix">District</label>
                    </div>
                     <div class="input-field col s12 m12 l12" style="padding-top: 15px;margin-bottom: 10px;">
                        <button type="submit" class="btn light-blue" name="apply">Submit<i class="material-icons right">send</i></button>
                    </div>
                  </form>
                </div>
              </div>
                
                <?php
                }
                ?>
                
            </div>
          </div>
          <script type="text/javascript">
          	$(document).ready(function(){
          		 $('select').material_select();
          	});
          </script>
 </body>

 <?php 

          function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   



 if(isset($_POST['apply'])){
     
     
    include('../inc/connection.php');
     
     $Time=date("Y/m/d h:i:sa"); 
     $sch_Name=test_input($_POST['sch_Name']); 
     $sch_prog=test_input($_POST['sch_prog']); 
     $directed_To=test_input($_POST['directed_To']); 
     $region=test_input($_POST['region']); 
     $district=test_input($_POST['district']); 
     
     $insert = "INSERT INTO  student_details (Stud_id,ID,sch_Name,sch_prog,directed_To,region,district,	start_Date,end_Date,action,date_Created) VALUES('$ses_id','','$sch_Name','$sch_prog','$directed_To','$region','$district','','','1','$Time')";
     $set=mysqli_query($mysqli,$insert);
     
     if($sch_Name==''){
     	 echo 
	   		' 	<script>
	   				var alert = $("<span>Name of school is required</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';

 }
      elseif($sch_prog==''){
     	 echo 
	   		' 	<script>
	   				var alert = $("<span>Program for school is required</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';

 }
      elseif($directed_To==''){
     	 echo 
	   		' 	<script>
	   				var alert = $("<span>The letter should be directed to someone</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';

 }
     
          elseif($set){
     	 echo 
	   		' 	<script>
	   				var alert = $("<span>Request Placed Successfully</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';
            header("Location:index.php");

 }
     else
     {
      echo 
	   		' 	<script>
	   				var alert = $("<span>An error occured while request was being placed</span>");
	        		Materialize.toast(alert, 3500, "rounded");
	   			</script>
	   		';

         
     }
     
     
     
     
 }
?>
     