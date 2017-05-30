<?php ob_start();
session_start();
//Unset the variables stored in the session
unset($_SESSION['userid']);
?>
<!DOCTYPE html>
<html>
<header>


  <!--   <script type='text/javascript'>
        $(function(){
            $('.inner-addon right-addon').datepicker({
                calendarWeeks:true,
                todayHighlight:true,
                autoclose:true
            });
        });

    </script> -->
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


    <table>
<tr>
       <th>ID</th>
       <th>Password</th>
       <th>Profrile</th>
    </tr>
<tr>
       <td><?php echo $userid; ?></td>
       <td><?php echo $passwordnew; ?></td>
       <td><?php echo $Profile; ?></td>
       </tr>
    </table> 
  
   
    
    
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

          function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   


//if($_SERVER["REQUEST_METHOD"]== "POST"){
 if(isset($_POST['login'])){
     
     
    include('../inc/connection.php');
     
     $Time=date("Y/m/d h:i:sa"); 
     $id=test_input($_POST['student_id']); 
     $password=test_input($_POST['password']); 
     
     $encryptpassword=md5($password);
              
    /* $querying="SELECT * FROM register WHERE Stud_id='$id' and password= '$encryptpassword' ";
     while($row=mysqli_query($mysql,$querying))
     {
        
            session_regenerate_id();
             $_SESSION['userid'] = $id;
            session_write_close();
            header('Location:students/index.php');
                                exit();
     }*/
     
     
 
    
     $query="SELECT * FROM register WHERE Stud_id= '$id'";
     $querying=mysqli_query($mysqli,$query);
$fetch=mysqli_fetch_assoc($querying);
 
      $userid=$fetch['Stud_id'];
     $passwordnew=$fetch['password'];
     $Profile=$fetch['Profile']; 
         
   
   
if($id==''){
echo ' 	<script language="javascript">
        alert("ID is required");
        window.Location="index.php";
	   				
	   			</script>
	   		';
            
		header("Location:../index.php");

}    
    if($password==''){
    echo ' 	<script language="javascript">
        alert("Password is required");
        window.Location="index.php";
	   			</script>
	   		';
            
		header("Location:../index.php");
}
    
    
if($userid==$id){
   
    
  if($encryptpassword==$passwordnew){
       
      
      $Update="UPDATE register SET login_time='$Time'  WHERE Stud_id= '$id'";
         $run_update=mysqli_query($mysqli,$Update);
      
       if($Profile=='student'){
            session_regenerate_id();
             $_SESSION['userid'] = $userid;
            session_write_close(); 
            header('Location:../students/index.php');
                                exit();
           
       }
       else{
             
           session_regenerate_id();
             $_SESSION['userid'] = $userid;
            session_write_close();
            header('Location:../admin/index.php');
                                exit();
       }
       
       
   }
     else{
         echo ' 		<script language="javascript">
        alert("Invalid Password");
        window.Location="index.php";
	   			</script>
	   		';
            
		header("Location:../index.php");
     }
    

    
    
    
}
    
    
else
{     
    echo ' 		<script language="javascript">
        alert("Invalid ID");
        window.Location="index.php";
	   			</script>
	   		';
            
		header("Location:../index.php");
    }

         
        
 
   
     
     
     
 }      

//}

?>