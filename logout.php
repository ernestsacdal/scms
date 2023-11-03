<?php
session_start();
if(isset($_POST['logout_btn']))
{
    unset($_SESSION['unamee']);
    session_destroy();
    header('Location: adm_login.php');
    die();
}
if(isset($_POST['stu_logoutbtn']))
{
    unset($_SESSION['stidd']);
    session_destroy();
    header('Location: stu_login.php');
    die();
}


?>
