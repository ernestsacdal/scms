<?php
include('dbc.php');

if (isset($_POST['year'])) {
    $year = mysqli_real_escape_string($link, $_POST['year']);

    $data = array();

    for ($i = 1; $i <= 12; $i++) {
        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT *,SUM(stotal) AS totalrate FROM logs WHERE month = $i AND year = '$year'"));
        $data[] = $row['totalrate'];
    }

    echo json_encode($data);
}
?>