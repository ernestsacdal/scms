<?php

    include 'dbc.php';
    $sql = "SELECT * FROM department WHERE department_id = '".$_POST['department_id']."'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)) {
?>
<option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>
<?php } ?>