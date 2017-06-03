$(document).ready(function(){
	//Configuring the active on click listener events
	$("li#stud").on('click',function(){
		// event.preventDefault();
		if ($("li#stud > a > i#indicator").hasClass("activate"))
		 {
		 	$("li#stud > a > i#indicator").removeClass("activate");
		 	$("li#home > a > i#indicator").addClass("activate");
		 }
	});
});