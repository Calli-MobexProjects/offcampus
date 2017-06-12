<?php
	require '../inc/connection.php'; 
	include '../navbars/home_navbar.php';
 ?>
 <head>
 	<title>OCTPs&reg; | Coverage</title>
 	<style type="text/css">
 		div.bg{
 			margin-top: 10px;
			position: relative;
		/*	margin:50px auto;*/
			width:auto;
			height: 400px;
		}
		img.help{
			width: 100%;
			height: 400px;
		}
 	</style>
 </head>
 <body>
 	<div class="dist_body">
 		<div class="row">
 			<div class="col s2 m2 l2">
 				<?php include '../navbars/sidenav.php'; ?>
 			</div>
 			<div class="col s10 m10 l10">
 				<div class="card-panelm bg">
					<img src="../images/admin/placeholder.svg" alt="Help Desk" class="responsive-img help"/>
				</div>
				<h5 class="center-align grey-text text-darken-3">Location Mapper</h5>
				<h5 class="center-align grey-text text-darken-3 small-text">This page is under construction</h5>
 			</div>
 		</div>
 	</div>
 </body>