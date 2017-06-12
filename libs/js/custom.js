$(document).ready(function(){
	 $("#button-collapse").sideNav();
	 //activiting the tooltip
	  $('.tooltipped').tooltip({delay: 50});

		 $('.dropdown-button').dropdown({
	      inDuration: 300,
	      outDuration: 225,
	      gutter: 0, // Spacing from edge
	      belowOrigin: true, // Displays dropdown below the button
	      alignment: 'right', // Displays dropdown with edge aligned to the left of button
	      stopPropagation: false // Stops event propagation
	    }
	  );
		
	  //activating the preloader for the loading of the content of the page
	  // $("div.loader").css("display","none");
	  //  $(window).load(function(){
		 // 	$("div.loader").fadeOut('slow').delay(15000);
		 // 	$("div#agent_list").fadeIn('slow').delay(18000);
		 // });

	
	});