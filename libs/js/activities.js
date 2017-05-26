$(document).ready(function(){
	//First and only fadein animation
	// $(window).load(function(){
	// 	$("div.navigation").addClass("animated fadeIn");
	// });

	$("#apply,#download_assessment").css("display","none");
	$("#home").css("display","block").addClass("animated fadeIn");
	//setting the default colors for the classes

	$("#h_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");


	$("#h_menu_item").click(function(){
		$("#home").addClass("animated fadeIn").css("display","block");
		$("#apply,#download_assessment").css("display","none");
		if ($("#main_nav").hasClass("orange darken-3") || $("#main_nav").hasClass("green")) 
		{
			$("#main_nav").removeClass("orange darken-3");
			$("#main_nav").removeClass("green");
			$("#main_nav").addClass("light-blue accent-3");
			$("#main_nav").addClass("animated fadeIn");

		}

	/* Checking the css for side nav */
		if ($("#a_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2")) 
		{
			$("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#h_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
		}
		

	});

	$("#a_menu_item").click(function(){
		$("#home,#download_assessment").css("display","none");
		$("#apply").css("display","block").addClass("animated fadeIn");

		if ($("#main_nav").hasClass("green") || $("#main_nav").hasClass("light-blue accent-3")) 
		{
			$("#main_nav").removeClass("green");
			$("#main_nav").removeClass("light-blue accent-3");
			$("#main_nav").addClass("orange darken-3");
			$("#main_nav").addClass("animated fadeIn");
		}
		
		/* Checking the css for side nav */
		if ($("#h_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2")) 
		{
			$("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#a_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
		}
		
	});

	$("#d_menu_item").click(function(){
		$("#home,#apply").css("display","none");
		$("#download_assessment").css("display","block").addClass("animated fadeIn");

		if ($("#main_nav").hasClass("orange darken-3") || $("#main_nav").hasClass("light-blue accent-3")) 
		{
			$("#main_nav").removeClass("orange darken-3");
			$("#main_nav").removeClass("light-blue accent-3");
			$("#main_nav").addClass("green");
			$("#main_nav").addClass("animated fadeIn");
		}

	/* Checking the css for side nav */
		if ($("#h_menu_item").hasClass("grey lighten-2") || $("#a_menu_item").hasClass("grey lighten-2")) 
		{
			$("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
			$("#d_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
		}
		
	});

	/* configuring the preloader for the body tags */

});