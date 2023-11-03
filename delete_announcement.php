<?php
// Include the database connection file
include("dbc.php");

// Check if the ID parameter is set
if (isset($_POST['id'])) {
    // Escape the ID to prevent SQL injection
    $id = mysqli_real_escape_string($link, $_POST['id']);

    // Delete the announcement from the database
    $sql = "DELETE FROM `announcement` WHERE `id` = '$id'";
    if (mysqli_query($link, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>