<?php
	session_start();
// 	ini_set( 'error_reporting', E_ALL );
// ini_set( 'display_errors', true );
	ini_get("session.use_strict_mode");
	unset($_SESSION['username']);
	unset($_SESSION['time']);

	if(isset($_SESSION['username']) && isset($_SESSION['time']))
	{
		header("Location:users/index.php");
	}
	
	if(empty($_SESSION['username']) && empty($_SESSION['time']))
	{
		session_destroy();
		$_SESSION = array();
		header("Location:index.php");
	}
	exit();
	
?>