<?php
require_once '../inc/connection.php';
?>
<title>
	OCTPs&reg; | Bulk Upload
</title>
<style type="text/css">
		div.bg{
			position: relative;
		/*	margin:50px auto;*/
			width:auto;
			height: 400px;
			margin-left: -30px;
		}
		img.help{
			width: 100%;
			height: 400px;
		}
		a.rounded{
			border-radius: 20px;
		}
		div.bg{
			margin-top: 15px;
		}
		div.minibg{
			position: relative;
			width: 100px;
			height: 100px;
			top: -80px;
			right: -90px;
		}
		img.minihelp{
			width: 100%;
			height: 100px;
		}
		h5.minititle, h5.minibutton{
			position: relative;
			top: -90px;
		}
</style>
<body>
	<div class="lecturer_bulk animated fadeIn">
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="card-panelm bg">
					<img src="../images/admin/xls.svg" alt="CSV FILE" class="responsive-img help"/>
				</div>
				<div class="card-panelm minibg">
					<img src="../images/admin/boy1.svg" alt="CSV FILE" class="responsive-img minihelp"/>
				</div>
				<h5 class="center-align grey-text text-darken-3 minititle">Download Template</h5>
				<h5 class="center-align grey-text text-darken-3 small-text minibutton"><a href="../csv/lecturer-data.php" class="btn waves-effect waves-ripple light-blue accent-3 rounded"><i class="material-icons left">cloud_upload</i>CSV FILE</a></h5>
			</div>
		</div>
	</div>
</body>