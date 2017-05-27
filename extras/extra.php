
<!DOCTYPE html>
<html>
<header>


    <script type='text/javascript'>
        $(function(){
            $('.inner-addon right-addon').datepicker({
                calendarWeeks:true,
                todayHighlight:true,
                autoclose:true
            });
        });

    </script>
</header>
<body>
<head>
   
 
    <!--importing javascript classes-->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Add cdn to chart.js library files. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

    <style>
        #myChart
        {
            width: 200px;
            height: 200px;
        }
         #myChart2
        {
            width: 200px;
            height: 200px;
        }


    </style>

</head>
    
    <canvas id="myChart"></canvas>
    
    
    
    
    
    </body>
</html>


                    <!--script to produce graph-->
                  <script language="javascript">
      'use strict'

$(document).ready(function(){
	var ctx = $("#myChart").get(0).getContext("2d");

	var data = [
        
	   <?php 
    
  include('../inc/connect.php');
        
 $querying=mysql_query("SELECT DISTINCT(region) FROM student_details GROUP BY region ");
                                            while($yea=mysql_fetch_assoc($querying)){

                            
                                                
                                    $region=$yea['region'];
                                                              
                               
                      $query2=mysql_query("SELECT COUNT(*) AS total FROM student_details WHERE region='$region'" );                                                                     $IDs=mysql_fetch_array($query2);
                                                                
                                                $count=$IDs['total'];
        
          $strings = array(
    'cornflowerblue',
    'yellow',
    'yellowgreen',
    'lightskyblue',
    'blue',
    'green',
    'brown',
);
$key = array_rand($strings);
         $strings2 = array(
    'cornflowerblue',
    'yellow',
    'yellowgreen',
    'lightskyblue',
    'blue',
    'green',
    'brown',
);
$key2 = array_rand($strings2); 
        
        
                                                 ?>                                    
    
		{
			value:"<?php echo $count; ?>",
			color:" <?php echo $strings[$key]; ?>",
			highlight:" <?php echo $strings2[$key2]; ?>",
			label: "<?php echo $region; ?>"
		},
		
        <?php  }   ?>
        
	];

	var chart = new Chart(ctx).Doughnut(data);
});
          </script>

                                    <?php
                                    ?>