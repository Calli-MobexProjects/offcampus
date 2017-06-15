<?php 
 ob_start();
session_start();
//Unset the variables stored in the session
unset($_SESSION['userid']);

          function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   


//if($_SERVER["REQUEST_METHOD"]== "POST"){
 if(isset($_POST['login'])){
     
     
    include('inc/connection.php');
     
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
            
	

}    
    if($password==''){
    echo ' 	<script language="javascript">
        alert("Password is required");
        window.Location="index.php";
	   			</script>
	   		';
            
}
    
    
if($userid==$id){
   
    
  if($encryptpassword==$passwordnew){
       
      
      $Update="UPDATE register SET login_time='$Time'  WHERE Stud_id= '$id'";
         $run_update=mysqli_query($mysqli,$Update);
      
       if($Profile=='student'){
            session_regenerate_id();
             $_SESSION['userid'] = $userid;
            session_write_close(); 
            header('Location:students/index.php');
                                exit();
           
       }
       else{
          // $active_query = "SELECT * FROM privileges WHERE id = '$userid'";
           session_regenerate_id();
             $_SESSION['userid'] = $userid;
            session_write_close();
            header('Location:admin/index.php');
                                exit();
       }
       
       
   }
     else{
         echo "<script language='javascript'>
        alert('Invalid Password');
        window.location='index.php';
	   			</script>
	   		";
      
     }
    

    
    
    
}
    
    
else
{     
    echo "<script language='javascript'>
        alert('Invalid ID');
        window.location='index.php';
	   			</script>
	   		";
            
    }

         
        
 
   
     
     
     
 }      

//}

?>