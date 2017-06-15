 <?php
 include('../inc/connection.php');
    if(isset($_POST["region"])){

        // Capture selected region

        $region = $_POST["region"];

         


         

        // Display city dropdown based on country name

        if($country !== 'Select Region'){
                /* $query1="SELECT * FROM district WHERE reg_Abbrv=$region ";
                           // $querying1=mysqli_query($mysqli,$query1);
                           // while($fetch1=mysqli_fetch_assoc($querying1)){
                              $district_name=$fetch1['district_name'];*/
                            echo"
                              <option  value='hey'>Hey</option>
                               
                                ";
                           //}
           

        } 

    }
    ?>
