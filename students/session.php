<?php session_start();
if(!isset($_SESSION['idlocal']))
{
    header('Location:../../index.php');
    exit();
}
$ses_id = $_SESSION['idlocal'];
$ses_name = $_SESSION['usernamelocal'];?>