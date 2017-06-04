<?php
require_once '../inc/connection.php';
include '../navbars/home_navbar.php';
?>
<head>
	<title>OCTPs&reg; | Manage Admin</title>
</head>
<body>
	<div class="madmin-body">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php';?>
			</div>
			<div class="col s10 m10 l10">
				
			</div>
		</div>

		<!-- Fixed floating action button for the addition of admins -->
		<div class="fixed-action-btn" style="right: 70px;bottom: 40px;">
		    <a  id="addAdmin" class="btn-floating btn-large light-blue accent-3">
		      <i class="large material-icons tooltipped" data-tooltip="Add Admins" data-position="left" data-delay="5">person_add</i>
		    </a>
		 </div>

		<!-- Modals for adding users -->
		<script type="text/javascript">
			$("#addAdmin").on('click',function(){
				$.sweetModal({
					title:'Add Other Administrators',
					content: '<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
					                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
						                <input type="text" name="firstname" class="validate" id="firstname" required>\
						                <label for="icon_prefix">First Name</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
						                <input type="text" name="lastname" class="validate" id="lastname" required>\
						                <label for="icon_prefix">Last Name</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">perm_phone_msg</i>\
						                <input type="number" name="phone" class="validate" id="phone" required>\
						                <label for="icon_prefix">Phone Number</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
						                <input type="text" name="region" class="validate region" id="region" required>\
						                <label for="icon_prefix">Region Of Choice</label>\
					                </div>\
					                <div class="input-field col s12" style="margin-top:15px;margin-bottom:12px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin_circle</i>\
						                <input type="text" name="district" id="district" class="autocomplete" required>\
						                <label for="district">District Of Choice</label>\
					                </div>\
					           </form>',
					           width:'700px',
					buttons:{
						cancelButton:{
							label:'Cancel',
							classes:'secondaryB bordered flat',
							action:function(){

							}
						},
						addButton:{
							label:'Add',
							classes:'blueB',
							action:function(){

							}
						}
					}
				});
			});
		</script>
	</div>
</body>