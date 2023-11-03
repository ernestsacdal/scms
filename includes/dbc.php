<?php
$link = mysqli_connect("localhost", "root", "", "capstone");

if($link === false){
    die("Error".mysqli_connect_error());
}
?>