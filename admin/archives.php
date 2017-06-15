<?php
require_once '../inc/connection.php';
include '../navbars/home_navbar.php';
?>
<title>
	OCTPs&reg; | Archives
</title>
<style type="text/css">
		div.bg{
			position: relative;
		/*	margin:50px auto;*/
		    margin-top: 25px;
			width:auto;
			height: 400px;
		}
		img.help{
			width: 100%;
			height: 400px;
		}
	</style>
<body>
	<div class="archive_body">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php'; ?>
			</div>
			<div class="col s10 m10 l10">
				<div class="card-panelm bg">
					<img src="../images/admin/archive(2).svg" alt="Help Desk" class="responsive-img help"/>
				</div>
				<h5 class="center-align grey-text text-darken-3">Archive Container</h5>
				<h5 class="center-align grey-text text-darken-3 small-text">No Data Available in the Archive Container</h5>
			</div>
		</div>
	</div>
</body>