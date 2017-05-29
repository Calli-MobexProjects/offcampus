<?php session_start();
if(!isset($_SESSION['userid']))
{
    header('Location:../extras/extra.php');
    exit();
}
$ses_id = $_SESSION['userid'];
