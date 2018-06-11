<?php
 namespace mappings\QueryClass;
 /**
  * 
  */
  class QueryClass
  {
  	public $mysqli;
  	public $query;
  	
  	// function __construct($mysqli,$query)
  	// {
  	// 	# code...
  	// 	$this->mysqli = $mysqli;
  	// 	$this->query = $query;
  	// }

  	//Defining the function for the retrieving of all students to get their names
  	public function getApprovedStudents($mysqli)
  	{
  		$query = "SELECT f_Name,l_Name,other_Name,sch_Name,sch_prog,region,district FROM register,student_details WHERE register.Stud_id = student_details.Stud_id AND student_details.action = '2'";
  		$results = $mysqli->query($query);
  		return $results;
  	}

  	//Defining the function for the retrieving of all the lecturers
  	public function getAllLecturer($mysqli)
  	{
  		$query = "SELECT * FROM lecturer ORDER BY lect_firstname ASC";
  		$results = $mysqli->query($query);
  		return $results;
  	}

    //Defining the function for the retrieving of the count of the students
    public function getCountApprovedStudents($mysqli)
    {
      $query = "SELECT COUNT(*) AS totalApprovedStudents FROM student_details WHERE action= '2'";
      $results = $mysqli->query($query);
      return $results;
    }
    //Counting the lecturers
    public function getCountLecturer($mysqli)
    {
      $query = "SELECT COUNT(*) AS totalLecturer FROM lecturer";
      $results = $mysqli->query($query);
      return $results;
    }

    //Getting the regions from the student_details where the letter has been approved
    public function getApprovedRegions($mysqli)
    {
      $query = "SELECT DISTINCT region FROM  student_details WHERE action = '2'";
      $results = $mysqli->query($query);
      return $results;
    }

    //Getting user data based on the getApprovedRegions function definition
   

    //Getting the details of the admin for the editing of the profile
    public function editProfile($mysqli, $userid){
      $query = "SELECT * FROM register WHERE Stud_id = '$userid' AND Profile = 'Admin'";
      $results = $mysqli->query($query);
      return $results;
    }
  } 
 ?>