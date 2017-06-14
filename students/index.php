<?php
  include("../navbars/home_navbar.php");
  require_once('../inc/connection.php');
  ini_set( 'error_reporting', E_ALL);
  ini_set( 'display_errors', true );

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   

      //Accepting inputs from the apply pane
      if (isset($_POST['apply']))
      {
        $school_name = test_input($_POST['sch_Name']);
        $school_prog = test_input($_POST['sch_prog']);
        $letter_head = test_input($_POST['directed_To']);
        $region      = test_input($_POST['region']);
        $district    = test_input($_POST['district']);

        $apply_query = "INSERT INTO student_details(Stud_id,sch_Name,sch_prog,directed_To,region,district,start_Date,end_Date,action,date_Created) VALUES('$ses_id','$school_name','$school_prog','$letter_head','$region','$district','1990-01-01','1990-01-01','1',NOW())";
        $apply_fetch = $mysqli->query($apply_query);
        if ($apply_fetch) 
        {
          ?>
          <script type="text/javascript">
            $.sweetModal({
              icon:$.sweetModal.ICON_SUCCESS,
              content:'Data Send Successfully',
              width:'400px',
              timeout:3000
            });
          </script>
          <?php
        }
        else{
          echo '
          <script>
                    var alert = $("<span>Eiii,Something Bad Happened</span>");
                    Materialize.toast(alert, 3500, "rounded");
                </script>
          ';
        }
      }

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
  <style type="text/css">
    div.indicator{
      top: 10px;
      position: relative;
      width: 200px;
      height: 200px;
    }
    small#preview{
      position: relative;
      width: 200px;
      height: 200px;
      /*#ffeb3b*/
    }
    div.pred{
      margin-top: -5px;
    }
    div#preloader p{
      font-weight: 500;
      font-size: 16px;
      line-height: 1;
    }
    div.monthly{
      margin-top: 8px;
    }
    </style>
</head>
<body>
    <!-- Page Layout here -->
    <div class="row">
      <div id="preloader" class="col s2 m2 l2 offset-s5 offset-m5 offset-l5 z-depth-3" style="width:300px; height: 30px;padding: 20px 10px 40px 10px;margin-top: 10px;border-radius: 2px;background-color: #ffff8d;position:absolute;z-index: 8;">
      <!--   <div class="progress pred">
          <div class="indeterminate blue"></div>
        </div> -->
        <p class="flow-text">Loading ...</p>
      </div>
       <div class="col s2 m2 l2" id="side-pane">
         <?php include '../navbars/stud_sidenav.php';?>
       </div>

      <div class="col s10 m10 l10" id="agent_list" style="display: none;"> <!-- Note that "m8 l9" was added -->
      <!-- home page will be here -->
        	<div class="row">
        		<div class="col s12 m12 l12">
        			<div class="col s12 m7 l7">
        				<div class="col s12 m12 l12">
                  <div class="monthly z-depth-1" id="mycalendar"></div>    
                </div>
        			</div>
        			<!-- notices pane  -->
        			<div class="col s12 m5 l5">
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
                         <div class="indicator">
                            <img src="../images/buzz.svg" alt="image" class="responsive-img" width="150px" height="150px"><br>
                         </div>
                          <small id="preview" style="position:relative;left:100px;font-size:12px;font-weight:500;color:grey;"
                               class="typer hide-on-small-only" data-delay="100" data-delim="," data-words="No Buzzes available at this moment" data-color="grey">
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
      </div>
    <script type="text/javascript">
      $(document).ready(function(){
       
       $(window).load(function(){
            $('#mycalendar').monthly({
                mode: 'event',
                jsonUrl: '../vendors/monthly/events.json',
                dataType: 'json'
                // xmlUrl: '../vendors/monthly/events.xml'
              });
        });
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
        $(window).load(function(){
           setTimeout(function() {
            $("div#preloader").fadeOut('slow');
           }, 1500);
           setTimeout(function() {
             $("div#agent_list").fadeIn('slow');
           }, 1500);
        });

        $("#a_menu_item").on('click',function(){
           $("div#agent_list").load("apply.php");
        });
        $("#d_menu_item").on('click',function(){
           $("div#agent_list").load("download_assessment.php");
        });
      });
    </script>
    </div>
</body>

