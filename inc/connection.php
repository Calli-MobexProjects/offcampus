<?php
	DEFINE('DB_HOST','localhost');
	DEFINE('DB_PASSWORD','');
	DEFINE('DB_USERNAME','root');
	DEFINE('DB_NAME','offcampus');
	//initializing the connection to the database 
	$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,3306);
	if ($mysqli->connect_errno) 
	{
		echo "Failed to connect to MYSQL database (". $mysqli->connect_errno . ")".$mysqli->connect_error;
	}
?>