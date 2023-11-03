<?php
   include('dbc.php');


   $sql = "SELECT rem FROM reminders WHERE id = 1";
   $result = mysqli_query($link, $sql);
   $row = mysqli_fetch_assoc($result);

   // Return the data column value
   echo $row['rem'];
?>