<?php
session_start();
include('dbc.php');
if(!$_SESSION['unamee'])
{
    header('Location:adm_login.php');
}












//$uname = $_SESSION['uname'];
//if (!isset($uname)) {
  //  header('location:adm_login.php');
//};
//if (isset($_GET['logout'])) {
   // unset($uname);
    //session_destroy();
    //header('location:adm_login.php');
//};
?>