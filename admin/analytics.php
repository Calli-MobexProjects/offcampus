<?php
include "../navbars/home_navbar.php";
require_once '../inc/connection.php';
?>

<head>
	<title>OCTPs&reg; | Analytics</title>
	<style type="text/css">
		div.amcharts-chart-div  a{
			display:none !important;
		}
	</style>
</head>
<body>
<script>
//scripts for the pie3D Charts 
	var chart;

	var chartData = [
		<?php  
		 $querying = "SELECT DISTINCT(region) FROM student_details GROUP BY region";
		 $query_results = $mysqli->query($querying);
		 while ($fetch = $query_results->fetch_array(MYSQLI_ASSOC))
		 {
		 	$region = $fetch['region'];

		 	$query2 = "SELECT COUNT(*) AS total FROM student_details WHERE region='$region'";
		 	$query2_results = $mysqli->query($query2);
		 	while ($fetch2 = $query2_results->fetch_array(MYSQLI_ASSOC))
		 	{
		 		$count = $fetch2['total'];
		 ?>
		  {
	        "Region": "<?php echo "$region";?>",
	        "Total Students": <?php echo "$count";?>
	      },
		<?php		 		
		 	}
		 }
		?>
	];
</script>
<script src="../scripts/admin/piechart.js" type="text/javascript"></script>
	<div class="main-analytics">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10">
				<div class="col s12 m6 l6">
					<div id="chartdiv" style="width:600px;height:400px;"></div>
				</div>
				<div class="col s12 m6 l6">
					<div class="cylinderdiv" style="height: 400px;"></div>
				</div>
				
			</div>
		</div>
	</div>
</body>
