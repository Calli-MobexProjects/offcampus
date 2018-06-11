<?php
	require_once '../inc/connection.php';
  require_once 'session.php';
  ini_set( 'error_reporting', E_ALL);
ini_set( 'display_errors', true );
  //Quering from the database using -->

  $query=" SELECT * FROM student_details WHERE Stud_id= '$ses_id'";
  $querying=$mysqli->query($query);
  $row = $querying->fetch_array(MYSQLI_BOTH);
  
  $userid=$row['Stud_id'];
  $action=$row['action'];
  $start_Date=$row['start_Date'];
  $start_Date=$row['start_Date'];  
 ?>
   <!-- Sending the data to the database -->
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
                  <form method="post" action="index.php" id="signUpForm">
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">store</i>
                        <input id="sch_Name" type="text" name="sch_Name" class="validate" data-length="100" required="required" style="text-transform: capitalize;">
                        <label for="sch_Name">School Name (In Which School Do you want to teach)</label>
                    </div>
                     <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">library_books</i>
                        <input id="school_program" type="text" name="sch_prog" class="validate" data-length="100" required="required" style="text-transform: capitalize;">
                        <label for="school_program">Program Name (Program you want to teach)</label>
                    </div>
                     <div class="input-field col s12 m12 l12" style="padding-top: 15px;">
                        <i class="material-icons prefix">supervisor_account</i>
                         <select name="directed_To" required="required" id="letterHead">
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
                              <option id="region" value="<?php echo $fetch['fullname']; ?>"><?php echo $fetch['fullname']; ?></option>
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
                          localStorage.setItem('region_id',valueSelected);
                          var ll = localStorage.getItem('region_id');
                          console.dir(ll);
                        });
                    </script>
                    <div class="input-field col s12 m12 l12" style="padding-top: 15px">
                        <i class="material-icons prefix">map_marker</i>
                         <select name="district" required="required" id="district">
                          <option value="" disabled selected>Select District</option>
                            <optgroup label="List Of Regions" id="response">
                                                                
                             <?php
                              // $somevar = "<script>document.writeln(ll);</script>";
                              // echo "$somevar";
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
          <script type="text/javascript">
          	$(document).ready(function(){
          		 $('select').material_select();
          	});
          </script>
 </body>




