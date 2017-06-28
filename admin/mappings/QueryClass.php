<?php
 namespace mappings\QueryClass;
 /**
  * 
  */
  class QueryClass
  {
  	public $mysqli;
  	public $query;
  	
  	function __construct($mysqli,$query)
  	{
  		# code...
  		$this->mysqli = $mysqli;
  		$this->query = $query;
  	}

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
  		$query = "SELECT * FROM lecturer";
  		$results = $mysqli->query($query);
  		return $results;
  	}

    //Defining the function for cross division
    // public function getCrossDivision($mysqli)
    // {
    //   $query = "SELECT "
    // }

  } 
 ?>