<?php
include('dbc.php');

if (isset($_POST['btnAdd'])) 
{
    $meds = $_POST['meds'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO inventory (meds, quantity, price) VALUES ('$meds', '$quantity','$price')";
    $sql_run = mysqli_query($link, $sql);

    if ($sql_run) 
    {
        header("Location: adm_inventory.php");
    } else 
    {
        echo '<script> alert("Data not updated"); </script>';
    }
}




?>