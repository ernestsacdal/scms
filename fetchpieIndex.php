<?php
$year = $_GET["year"];
include('dbc.php');

$result = mysqli_query($link, "SELECT department, COUNT(*) AS count FROM logs WHERE year = '$year' GROUP BY department");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $department = $row["department"];
    $count = $row["count"];
    switch ($department) {
        case "CAS":
            $color = "#4e73df"; // blue
            break;
        case "CAHS":
            $color = "#d660a8"; // red #d660a8 pink
            break;
        case "CCJE":
            $color = "#a55eea"; // green #a55eea purple
            break;
        case "CITE":
            $color = "#1cc88a"; // orange #1cc88a green
            break;
        case "CMA":
            $color = "#e74a3b"; // pink #e74a3b red
            break;
        case "SHS":
            $color = "#17A2B8"; // purple #FFFF00 yellow
            break;
        case "CELA":
            $color = "#DAA520"; // purple #FFFF00 gold
            break;
        default:
            $color = "#858796"; // default color
            break;
    }
    $data[] = array(
        "department" => $department,
        "count" => $count,
        "color" => $color
    );
}
mysqli_close($link);
echo json_encode($data);
?>