
<?php
include("../navbars/home_navbar.php");

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
                       <!--  <div id="preloader">
                            <div class="preloader-wrapper small active" id="loader">
                                <div class="spinner-layer spinner-blue-only">
                                  <div class="circle-clipper left">
                                    <div class="circle"></div>
                                  </div><div class="gap-patch">
                                    <div class="circle"></div>
                                  </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                  </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col s12 m10 l10 offset-m1 offset-l1 animated fadeIn" id="firstpane">
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                    <i class="material-icons total_img">supervisor_account</i>
                                    <span class="indicator">Registered Users</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Total Number Of Students<span class="chip right">50</span></h5>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                    <i class="material-icons total_img">mode_edit</i>
                                    <span class="indicator">Applied Users</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Total Number Of Applicants <span class="chip right">80</span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m10 l10 offset-m1 offset-l1 animated fadeIn" id="secondpane">
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                    <i class="material-icons total_img">perm_identity</i>
                                    <span class="indicator">Added Lecturers</span>
                                    <div class="divider"></div>
                                    <h5 class="grey-text text-darken-2 small-text">Total Number Of Lecturers<span class="chip right">50</span></h5>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card-panel col s12 waves-effect waves-block waves-light" id="total_students">
                                
                                
                                </div>
                               
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
                $("div#preloader").fadeOut('slow').delay(15000);
                $("#firstpane,#secondpane").fadeIn('slow').delay(15000);
            });
        });
    </script>
</body>

                  
