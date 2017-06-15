<div class="navigation" style="border-right: 1px solid #e8e8e8;margin-left: -15px;">
	<ul class="nav-demo">
		<li id="home" style="margin-right: -6px;">
			<a href="index.php">
				<i class="material-icons left icon">dashboard</i>
				<span class="menu_name">Dashboard</span>
			</a>
		</li>

		<li id="stud" style="margin-right: -6px;">
			<a href="students.php">
				<i class="material-icons left icon">supervisor_account</i>
				<span class="menu_name">Students' List</span>
				<i id="indicator" class="material-icons right icon activate">bubble_chart</i>
			</a>
		</li>

		<li style="margin-right: -6px;">
			<a href="lecturers.php">
				<i class="material-icons left icon">perm_identity</i>
				<span class="menu_name">Lecturers' List</span>
			</a>
		</li>
		<li style="margin-right: -6px;"><a href="analytics.php"><i class="material-icons left icon">trending_up</i><span class="menu_name">Analytics</span></a></li>

		<li style="margin-right: -6px;">
			<a href="events.php">
				<i class="material-icons left icon">add</i>
				<span class="menu_name">Create Events</span>
			</a>
		</li>

		<li style="margin-right: -6px;">
			<a href="distance.php">
				<i class="material-icons left icon">explore</i>
				<span class="menu_name">Distance</span>
			</a>
		</li>

		<li style="margin-right: -6px;">
			<a href="archives.php">
				<i class="material-icons left icon">archive</i>
				<span class="menu_name">Archives</span>
			</a>
		</li>

		<li style="margin-right: -6px;">
			<a >
				<i class="material-icons left icon">delete</i>
				<span class="menu_name">Trash</span>
			</a>
		</li>

		<div class="divider"></div>
		<li class="grey-text text-accent-1 header disabled">Manage Admins</li>
		<li style="margin-right: -6px;">
			<a href="manage_admin.php"><i class="material-icons left icon">security</i>
				<span class="menu_name">Admins' List</span>
			</a>
		</li>

		<div class="divider"></div>
		<li class="grey-text text-accent-1 header disabled">Accounts Settings</li>
		<li style="margin-right: -6px;"><a href="#"><i class="material-icons left icon">person_pin</i><span class="menu_name">Edit Profile</span></a></li>
		<li style="margin-right: -6px;"><a href="../admin/change_password.php"><i class="material-icons left icon">lock</i><span class="menu_name">Change Password</span></a></li>

		<li style="margin-right: -6px;">
			<a href="forum.php">
				<i class="material-icons left icon">forum</i>
				<span class="menu_name">Forum</span>
			</a>
		</li>

		<div class="divider"></div>
		<li class="grey-text text-accent-1 header" disabled="disabled">Report Issues ?</li>
		<li style="margin-right: -6px;"><a href="#"><i class="material-icons left icon">info</i><span class="menu_name">Help</span></a></li>
		<li style="margin-right: -6px;"><a href="#"><i class="material-icons left icon">message</i><span class="menu_name">Feedback</span></a></li>
		
	</ul>
</div>
 <div class="bottomsheetLoader z-depth-3 waves-effect waves-block waves-ripple" style="width:190px;height: 70px;background-color: #424242;position: fixed;z-index: 9999;bottom: 10px;border-radius: 4px;cursor: pointer;opacity: 0.9;">
		<div class="preloader-wrapper small active" style="position: relative;top: 16px;left: 10px;">
			<div class="spinner-layer spinner-blue">
			  <div class="circle-clipper left">
			    <div class="circle"></div>
			  </div><div class="gap-patch">
			    <div class="circle"></div>
			  </div><div class="circle-clipper right">
			    <div class="circle"></div>
			  </div>
			</div>

			<div class="spinner-layer spinner-red">
			  <div class="circle-clipper left">
			    <div class="circle"></div>
			  </div><div class="gap-patch">
			    <div class="circle"></div>
			  </div><div class="circle-clipper right">
			    <div class="circle"></div>
			  </div>
			</div>

			<div class="spinner-layer spinner-yellow">
			  <div class="circle-clipper left">
			    <div class="circle"></div>
			  </div><div class="gap-patch">
			    <div class="circle"></div>
			  </div><div class="circle-clipper right">
			    <div class="circle"></div>
			  </div>
			</div>

			<div class="spinner-layer spinner-green">
			  <div class="circle-clipper left">
			    <div class="circle"></div>
			  </div><div class="gap-patch">
			    <div class="circle"></div>
			  </div><div class="circle-clipper right">
			    <div class="circle"></div>
			  </div>
			</div>
		</div>
		<div class="label" style="position: absolute;right:35px;margin-top: -18px;color:white;font-weight: 500;">
			<p>Loading...</p>
		</div>
 </div>

 <!-- Small scripts bi -->
 <script type="text/javascript">
      $(window).load(function(){
          setTimeout(function() {
            $("div.bottomsheetLoader").fadeOut('slow');
          }, 4500);
        });
      
    //activating the active click events
    $("ul.nav-demo a").on('click',function(e){
    	var link = $(this);
    	var item = link.parent("li");

    	if (item.hasClass("active"))
    	 {
    	 	item.removeClass("active").children("a").removeClass("active");
    	 }
    	 else{
    	 	item.addClass("active").children("a").addClass("active");
    	 }

    	 if (item.children("ul").length > 0) 
    	 {
    	 	var href = link.attr("href");
    	 	link.attr("href","#");
    	 	setTimeout(function() {
    	 		link.attr("href",href);
    	 	}, 300);
    	 	e.preventDefault();
    	 }

    })
    .each(function(){
    	var link = $(this);
    	if (link.get(0).href == location.href)
    	 {
    	 	link.addClass("active").parents("li").addClass("active");
    	 	return false;
    	 }
    });
</script>