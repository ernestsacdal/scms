<?php
include('dbc.php');
$id = $_POST['id'];
    $old_pass = $_POST['old'];
    $new_pass = $_POST['new'];
    $conf_pass = $_POST['conf'];

    $stmt = mysqli_prepare($link, "SELECT passw FROM signup WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

if ($row && password_verify($old_pass, $row['passw'])) {
    if ($new_pass == $conf_pass) {
        $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($link, "UPDATE signup SET passw = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed_pass, $id);
        mysqli_stmt_execute($stmt);
        echo 'success'; // Return a success message
    } else {
        echo 'New passwords do not match.'; // Return an error message
    }
} else {
    echo 'Incorrect current password.'; // Return an error message
}


?>