<?php
include('dbc.php');

$selectedYear = $_GET["year"];

// query the database to get the count of each medicine for the selected year
$sql = "SELECT meds, COUNT(*) AS count FROM logs WHERE year='$selectedYear' GROUP BY meds ORDER BY count DESC LIMIT 15";
$result = $link->query($sql);

// encode the result as JSON and send it back to the client
$output = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $output[] = $row;
  }
}
echo json_encode($output);

// close the database connection

?>