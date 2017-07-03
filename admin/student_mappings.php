<?php 
include("../navbars/home_navbar.php");
 ?>
 <title>
 	OCTPs&reg; | Student Mappings
 </title>
 <body>
 	<div class="row">
 		<div class="col s2 m2 l2">
 			<?php include("../navbars/sidenav.php"); ?>
 		</div>
 		<div class="col s10 m10 l10">
 			<?php
 			include("mappings/QueryClass.php");
			use \mappings\QueryClass\QueryClass as DataMapper;
			$results = new DataMapper();
			$row = $results->getApprovedStudents($mysqli);
			while ($data = $row->fetch_array(MYSQLI_BOTH))
			{
				
				$firstname	 	= $data['f_Name'];
				$lastname  		= $data['l_Name'];
				$othername 		= $data['other_Name'];
				$school_name 	= $data['sch_Name'];
				$school_program = $data['sch_prog'];
				$region 		= $data['region'];
				$district 		= $data['district'];
				?>
				<div class="col s3 m3 l3">
					<div class="card-panel"><?php echo "$firstname"." "."$lastname"." "."$othername";?></div>
				</div>
				<?php
			}

			$lect_row = $results->getAllLecturer($mysqli);
			while ($data_lect = $lect_row->fetch_array(MYSQLI_BOTH))
			{
				$lect_firstname = $data_lect['lect_firstname'];
				$lect_lastname = $data_lect['lect_lastname'];
				?>
					<div class="col s3 m3 l3">
						<div class="card-panel"><?php echo "$lect_firstname"." "."$lect_lastname";?></div>
					</div>
				<?php
			}
 			?>

 		</div>
 	</div>
 </body>

