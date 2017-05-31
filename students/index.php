<?php
include("../navbars/home_navbar.php");
 require_once('../inc/connection.php');


     $query="SELECT * FROM student_details WHERE Stud_id= '$ses_id'";
     $querying=mysqli_query($mysqli,$query);
$row=mysqli_fetch_assoc($querying);
 
      $userid=$row['Stud_id'];
      $action=$row['action'];
      $start_Date=$row['start_Date'];
      $start_Date=$row['start_Date'];
      
         
   


?>
<head>
	<title>OCTPs&reg; | Home</title>
 
</head>
<body class="animated fadeInRight">
    <!-- Page Layout here -->
    <div class="row">
      <div id="loader" class="col s4 m4 l4 offset-s4 offset-m4 offset-l4 loader z-depth-2" style="width:120px; height: 30px;padding: 20px 10px 40px 10px;margin-top: 10px;border-radius: 2px;background-color: lightyellow;position:absolute;z-index: 9999;display: block;">
        <p>Loading ..</p>
       </div>

      <div class="col s12 m2 l2 hide-on-small-only animated fadeIn side_navigation"> <!-- Note that "m4 l3" was added -->
      	<div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="h_menu_item">
      		<a href="#home" id="h_menu_item"><i class="material-icons left home blue-text">home</i><span class="title">Home</span></a>
      	</div>
      	<div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="a_menu_item">
      		<a href="#apply" id="a_menu_item"><i class="material-icons left home orange-text">insert_drive_file</i><span class="title"><?php if($action=='1' or $action=='2' ){ echo 'Request Status';} else{ echo 'Apply'; } ?></span></a>
      	</div>
      	<div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="d_menu_item">
      		<a href="#download_assessment" id="d_menu_item"><i class="material-icons left home green-text">file_download</i><span class="title">Assessment<br> Form</span></a>
      	</div>
      	<div class="divider"></div>
        <h6 class="grey-text text-darken-2" style="margin-left: 31px;margin-top: 8px;">Accounts</h6>
        <div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="d_menu_item">
          <a href="#download_assessment" id="d_menu_item"><i class="material-icons left home grey-text text-darken-2">build</i><span class="title">Settings</span></a>
        </div>
        <div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="d_menu_item">
          <a href="#download_assessment" id="d_menu_item"><i class="material-icons left home grey-text text-darken-2">info</i><span class="title">Help</span></a>
        </div>
        <div class="card-panel z-depth-0 grey lighten-3 waves-effect waves-block waves-light" id="d_menu_item">
          <a href="#download_assessment" id="d_menu_item"><i class="material-icons left home grey-text text-darken-2">forum</i><span class="title">Feedback</span></a>
        </div>

      </div>

      <div class="col s12 m9 l9" id="agent_list"> <!-- Note that "m8 l9" was added -->
      <!-- home page will be here -->
        	<div class="row" id="home">
        		<div class="col s12 m12 l12">
        			<div class="col s12 m6 l6">
        				<div class="col s12 m12 l12 card-panel">
                  <h5 class="grey-text text-darken-2">Notices</h5>
                  <div class="divider"></div>    
                </div>
        			</div>
        			<!-- notices pane  -->
        			<div class="col s12 m6 l6">
        			  <div class="col s12 m12 l12 card-panel">
                  <h5 class="grey-text text-darken-2">Notices</h5>
                  <div class="divider"></div>  
                  <div class="col s12 m12 l12">
                      <div class="col s12 m12 l12" id="buzz_content" style="overflow-y:hidden; height:250px;">
                          <?php if($action=='1'){ ?>
                          <h4 class="blue-text flow-text lh2 center-text">
                  REQUEST PENDING
                    <p>WAITING ON APPROVAL</p>
                </h4>
                          <?php 
                            }
                            elseif($action=='2' ){
                                ?>
                <h4 class="blue-text flow-text lh2 center-text">
                  REQUEST APPROVED 
                    <p>APPROVAL LETTER IS AVAILABLE AT THE HOD'S OFFICE</p>
                </h4>
                          <?php 
                            }                    
                                                
                                                else{ ?>
                          <img src="../images/buzz.svg" alt="image" class="responsive-img" width="150px" height="150px" 
                        style="position:relative;left:125px;top:20px;"><br><br><br>
                        <small id="preview" style="position:relative;left:100px;font-size:12px;font-weight:500;color:grey;"
                         class="typer" data-delay="100" data-delim="," data-words="No Buzzes available at this moment" data-color="grey">
                         No Notices available at this moment
                                          <span class="cursor" data-cursorDisplay="|" data-owner="preview"></span>
                      </small>
                          <?php 
                            }
                          
                          ?>                           
                      </div>
                  </div>  
                </div>
        			</div>
        		</div>
        	</div>

      <!-- Apply pane will be here -->
          <div class="row" id="apply">
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
                         <select name="region" required="required" class="REGION" >
                          <option value="" disabled selected>Select Region</option>
                            <optgroup label="List Of Regions">
                                
                                <?php
                            $query="SELECT * FROM region ";
                            $querying=mysqli_query($mysqli,$query);
                            while($fetch=mysqli_fetch_assoc($querying)){
                                 
                                ?>
                              <option  value="<?php echo $fetch['reg_Abbrv']; ?>"><?php echo $fetch['reg_Abbrv']; ?></option>
                                <?php 
                                
                            }
                              ?>
                                
                            <!--    <script type="text/javascript">
                                    $(document).ready(function(){
                          $("select.REGION").change(function(){
            var selectedRegion = $(".REGION option:selected").val();
            $.ajax({
            type: "POST",
            url: "loadregion.php",
            data: { region : selectedRegion } 
            }).done(function(data){
            $("#response").html(data);
                        });
                            });
                                    });
</script>-->
                            </optgroup>
                        </select>
                        <label for="icon_prefix">Regions</label>
                    </div>
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px">
                        <i class="material-icons prefix">map_marker</i>
                         <select name="district" required="required" id="district">
                          <option value="" disabled selected>Select District</option>
                            <optgroup label="List Of Regions" id="response">
                                                                
                             <?php
                            $dist="SELECT * FROM district";
                            $run=mysqli_query($mysqli,$dist);
                            while($row=mysqli_fetch_assoc($run)){
                                 
                                ?>
                              <option  value="<?php echo $row['district_name']; ?>"><?php echo $row['district_name']; ?></option>
                                <?php 
                                
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

       <!-- Download Assessment pane will be here -->
          <div class="row" id="download_assessment">
            <div class="col s12 m12 l12">
              <div class="col s12 m10 l10 offset-l1 offset-m1 card-panel z-depth-0 green">
                <h4 class="white-text flow-text lh2">
                  This pane consist of the assessment form used for grading users undertaking this teaching practice,
                  Click the Button to Quickly Download the <i class="material-icons">insert_drive_file</i> Pdf file 
                </h4>
              </div>
               <div class="col s12 m4 l4 offset-m4 offset-l4">
                  <a href="assesmentform.php"  class="btn green download" style="padding-right: -20px;"><i class="material-icons left">file_download</i>Download Pdf</a>
                </div>
            </div>
          </div>
      </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('select').material_select();

        $(".download").click(function(){
            //Using the iziToast to perform operations
            // iziToast.info({
            //     title: 'Hello',
            //     message: 'Welcome!',
            //     position: 'topLeft',
            // });

            //Using the noty notification abilities
                new Noty({
                     
                      text: 'Assesment form downloaded',
                     
                  }).show();
            });
      });
    </script>
    </div>
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
     