
  $(document).ready(function(){
  //First and only fadein animation
  // $(window).load(function(){
  //  $("div.navigation").addClass("animated fadeIn");
  // });

  // $("#apply,#download_assessment").css("display","none");
  // $("#home").css("display","block").addClass("animated fadeIn");
  //setting the default colors for the classes

  $("#h_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");


  $("#h_menu_item").click(function(){
    if ($("#main_nav").hasClass("orange darken-3") || $("#main_nav").hasClass("green") || $("#main_nav").hasClass("code-alliance")) 
    {
      $("#main_nav").removeClass("orange darken-3");
      $("#main_nav").removeClass("green");
      $("#main_nav").removeClass("code-alliance");
      $("#main_nav").addClass("light-blue accent-3");
      $("#main_nav").addClass("animated fadeIn");

    }

  /* Checking the css for side nav */
    if ($("#a_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2") ||$("#sup_menu_item").hasClass("grey lighten-2") || $("#incent_menu_item").hasClass("grey lighten-2")) 
    {
      $("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#sup_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#incent_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#h_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
    }
    

  });

  $("#a_menu_item").click(function(){
    if ($("#main_nav").hasClass("green") || $("#main_nav").hasClass("light-blue accent-3") || $("#main_nav").hasClass("code-alliance")) 
    {
      $("#main_nav").removeClass("green");
      $("#main_nav").removeClass("light-blue accent-3");
      $("#main_nav").addClass("orange darken-3");
      $("#main_nav").addClass("animated fadeIn");
      $("#main_nav").removeClass("code-alliance");
    }
    
    /* Checking the css for side nav */
    if ($("#h_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2") || $("#sup_menu_item").hasClass("grey lighten-2") || $("#incent_menu_item").hasClass("grey lighten-2")) 
    {
      $("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#sup_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#incent_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#a_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
    }
    
  });

  $("#d_menu_item").click(function(){
    if ($("#main_nav").hasClass("orange darken-3") || $("#main_nav").hasClass("light-blue accent-3") || $("#main_nav").hasClass("code-alliance")) 
    {
      $("#main_nav").removeClass("orange darken-3");
      $("#main_nav").removeClass("light-blue accent-3");
      $("#main_nav").removeClass("code-alliance");
      $("#main_nav").addClass("green");
      $("#main_nav").addClass("animated fadeIn");
    }

  /* Checking the css for side nav */
    if ($("#h_menu_item").hasClass("grey lighten-2") || $("#a_menu_item").hasClass("grey lighten-2") || $("#sup_menu_item").hasClass("grey lighten-2") || $("#incent_menu_item").hasClass("grey lighten-2")) 
    {
      $("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#sup_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#incent_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#d_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
    }
    
  });

  //Supervisor and incentives details navbar combo 
   $("#sup_menu_item").click(function(){
    if ($("#main_nav").hasClass("orange darken-3") || $("#main_nav").hasClass("light-blue accent-3") || $("#main_nav").hasClass("green")) 
    {
      $("#main_nav").removeClass("orange darken-3");
      $("#main_nav").removeClass("light-blue accent-3");
      $("#main_nav").removeClass("green");
      $("#main_nav").addClass("code-alliance");
      $("#main_nav").addClass("animated fadeIn");
    }

    if ($("#h_menu_item").hasClass("grey lighten-2") || $("#a_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2") || $("#incent_menu_item").hasClass("grey lighten-2")) 
    {
      $("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#incent_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
      $("#sup_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
    }
    
  });
  
  //Working on the other navigation bars 
  $("#incent_menu_item").on('click',function(){
     //considering the five navigation contents
      if ($("#h_menu_item").hasClass("grey lighten-2") || $("#a_menu_item").hasClass("grey lighten-2") || $("#d_menu_item").hasClass("grey lighten-2") || $("#sup_menu_item").hasClass("grey lighten-2")) 
        {
          $("#h_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
          $("#a_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
          $("#d_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
          $("#sup_menu_item").removeClass("grey lighten-2").addClass("grey lighten-3");
          $("#incent_menu_item").removeClass("grey lighten-3").addClass("grey lighten-2");
        }
  });

});