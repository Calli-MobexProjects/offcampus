<?php
include("../navbars/home_navbar.php");
require_once '../inc/connection.php';

#students count
$user_reg = "SELECT COUNT(*) AS NUM FROM register WHERE Profile = 'student'";
$user_res = $mysqli->query($user_reg);
while ($count = $user_res->fetch_array(MYSQLI_BOTH)) 
{
  $countStudent = $count['NUM'];
 
}

#lecturers' count
$lect_reg = "SELECT COUNT(*) AS LECT FROM lecturer";
$lect_res = $mysqli->query($lect_reg);
while ($c = $lect_res->fetch_array(MYSQLI_BOTH)) 
{
   $countLecturer = $c['LECT'];
   
}

#students with schools
$student_school = "SELECT COUNT(*) AS STUD_COUNT FROM student_details";
$student_result = $mysqli->query($student_school);
while ($counting = $student_result->fetch_array(MYSQLI_BOTH))
{
  $countStudentschools = $counting['STUD_COUNT'];
}
?>
<head>
    

	<title>OCTPs&reg; | Admin Dashboard</title>
    <style type="text/css">
       #preloader{
        width: 100px;
        position: relative;
        height: 100px;
        margin: 50px auto;
        z-index: 99999;
       }
       div#loader{
         position: absolute;
         top: 140px;
         left: 0;
         right: 0;
         z-index: 99999;

       }
       #firstpane,#secondpane{
         display: none;
         position: relative;
         z-index: 2;
       }
        #chart_div{
            background-color: transparent;
        } 
        span.total_img{
          position: relative;
          width: 200px;
          height: 200px;
        }
        img.show{
          width: 200px;
          height: 200px;
          position: relative;
        }
        div#preloader{

        }
         
    </style>
</head>
<body>
	<div class="main-page">
		<div class="row">
			      <div class="col s2 m2 l2" id="side-pane">
                <?php include '../navbars/sidenav.php'; ?>
            </div>
            <div class="col s10 m10 l10">
                <div class="content_body">
                    <div class="row">
              
                        <div class="col s12 m10 l10 offset-m1 offset-l1 animated fadeIn" id="firstpane">
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                   <!--  <i class="material-icons total_img">supervisor_account</i> -->
                                   <span class="total_img"><img src="../images/admin/bookshelf.svg" alt="Registered Users" class="responsive-img show"></span>
                                    <span class="indicator">Registered Users</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Total Number Of Students<span class="chip right"><?php echo "$countStudent";?></span></h5>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                   <span class="total_img"><img src="../images/admin/school.svg" alt="Registered Users" class="responsive-img show"></span>
                                    <span class="indicator">Student With Schools</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Students Who've Gotten Schools<span class="chip right"><?php echo "$countStudentschools"; ?></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m10 l10 offset-m1 offset-l1 animated fadeIn" id="secondpane">
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                    <span class="total_img"><img src="../images/admin/medal.svg" alt="Registered Users" class="responsive-img show"></span>
                                    <span class="indicator">Added Lecturers</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Total Number Of Lecturers<span class="chip right"><?php echo "$countLecturer";?></span></h5>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                  <div style="background-color: transparent;" id="chart_div"></div>
                                
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <script type="text/javascript">
          $(window).load(function(){
              setTimeout(function() {
                 $("div#preloader").fadeOut('slow');
              }, 2500);
              setTimeout(function() {
                $("#firstpane,#secondpane").fadeIn('slow');
              }, 2000);
                
            });
    </script>
</body>

                  
