<?php
include 'dbc.php';
session_start();
if(!$_SESSION['uname'])
{
    header('location:adm_login.php');
}
;
?>