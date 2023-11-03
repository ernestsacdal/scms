<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCMSv1</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        td {
            text-align: center;
        }

        th {
            text-align: center;
        }
        .btn-small {
  width: 300px;
  margin: 0 auto;
  display: block;
}

@media (max-width: 768px) {
  .btn-small {
    width: 100%;
  }
}
.btn-lit {
  margin: 0 auto;
  display: block;
}

    </style>

</head>

<body id="page-top">

    <!--SCMS Nav-->
    <?php
    include 'stu_scmsnav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Medicine Request</h6>
                    </div>
                    <!-- Card Body -->
                    <?php
                    $stid = $_SESSION['stidd'];
                    $select = mysqli_query($link, "SELECT * FROM student WHERE stid='$stid'") or die;
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }

                    ?>
                    <div class="card-body">
                        <form action="stu_updatecode.php" method="POST">
                            <div class="col-md-10 mx-auto">
                                <input name="cnumber" value="<?= $fetch['cnumber'] ?>" hidden>
                                <input name="year" value="<?= $fetch['year'] ?>" hidden>
                                <input name="guardian" value="<?= $fetch['guardian'] ?>" hidden>
                                <input name="gcnumber" value="<?= $fetch['gcnumber'] ?>" hidden>
                                <input name="department" value="<?= $fetch['department'] ?>" hidden>
                                <input name="gender" value="<?= $fetch['gender'] ?>" hidden>
                                <input name="address" value="<?= $fetch['address'] ?>" hidden>
                                <input name="image" value="<?= $fetch['image'] ?>" hidden>
                                <input name="qty" value="1" hidden>
                                <label class="form-label">Student ID</label>
                                <input class="form-control" type="text" value="<?= $fetch['stid'] ?>" name="stid"
                                    required readonly>
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text"
                                    value="<?= $fetch['fname'] ?> <?= $fetch['lname'] ?>" name="fullname" required
                                    readonly>
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Course</label>
                                <input value="<?= $row['course'] ?>" name="course" hidden>
                                <input class="form-control" type="text" value="<?= $fetch['course'] ?>" name="course"
                                    required readonly>
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Medicine</label>
                                <select class="form-control" type="text" name="meds" required>
                                    <option value="" disabled selected hidden>Medicine</option>
                                    <!-- <option>None</option> -->
                                    <?php
                                    $sql = "SELECT * FROM `inventory` WHERE status = 0";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['meds']; ?>,<?php echo $row['price']; ?>"
                                            class="meds custom-select" required>
                                            <?php echo $row['meds']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Chief complaint</label>
                                <textarea rows="5" class="form-control" type="text" name="reason" placeholder="Reason"
                                    required></textarea>
                            </div>
                            <br>
                            <div class="col-md-10 mx-auto">
                                <button class="btn btn-primary btn-icon-split btn-lit" type="submit" name="btnQuickLogs">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>
                                    <span class="text">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Doctor Schedule for Appointment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        //SELECT query
                        $stid = $_SESSION['stidd'];
                        $sql = "SELECT * FROM doctor WHERE status=0";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row => $unit) {
                                $row_number = $row + 1;
                                $date_string = $unit['edate'];
                                $timestamp = strtotime($date_string);
                                $output_date = date("F d, Y", $timestamp);

                                $date_stringg = $unit['sdate'];
                                $timestampp = strtotime($date_stringg);
                                $output_datee = date("F d, Y", $timestampp);
                                ?>

                                <div class="card mb-4 ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">
                                        <strong><?= 'Dr. ',$unit['dname']; ?></strong>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?= $unit['spe']; ?>
                                        </h6>
                                        <hr>
                                        <p class="card-text">
                                            <strong>Date:</strong>
                                            <?= $output_datee; ?> -
                                            <?= $output_date; ?><br>
                                            <strong>Time:</strong>
                                            <?= $unit['time']; ?> -
                                            <?= $unit['ttime']; ?>
                                        </p>
                                        <button type="button" class="btn btn-primary btn-block btn-small" data-toggle="modal"
                                            data-target="#bookapp<?= $unit['id']; ?>">
                                            Book Appointment
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="bookapp<?= $unit['id']; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Appointment Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="stu_updatecode.php" method="POST">
                                                    <?php
                                                    $sql = "SELECT * FROM doctor WHERE id = " . $unit['id'] . "";
                                                    $result = mysqli_query($link, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $email = $row['email'];

                                                    $stid = $_SESSION['stidd'];
                                                    $stu = "SELECT * FROM student WHERE stid = '$stid'";
                                                    $stu_res = mysqli_query($link, $stu);
                                                    $fetch = mysqli_fetch_assoc($stu_res);
                                                    $aumail = $fetch['aumail'];
                                                    ?>
                                                    <input value="<?php echo $email ?>" name="email" hidden>
                                                    <input value="<?php echo $stid ?>" name="stid" hidden>
                                                    <input value="<?php echo $aumail ?>" name="aumail" hidden>
                                                    <input value="<?php echo $fetch['fname'] ?> <?php echo $fetch['lname'] ?>" name="fname" hidden>
                                                    <div class="form-group col-md-12 mx-auto">
                                                    <label class="form-label"> Doctor </label>
                                                        <input type="text" name="dname" id="dname"
                                                            value="<?php echo 'Dr. ',$row['dname']; ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Available Date </label>
                                                        <?php
                                                        // Start and end dates
                                                        $start_date = $row['sdate'];
                                                        $end_date = $row['edate'];

                                                        // Convert the start and end dates to timestamps
                                                        $start_timestamp = strtotime($start_date);
                                                        $end_timestamp = strtotime($end_date);

                                                        // Current date
                                                        $current_date = date('Y-m-d');
                                                        ?>
                                                        <!-- // Start the select element -->
                                                        <select id="date<?= $row_number ?>" name="date" class="form-control"
                                                            required>
                                                            <?php
                                                            // Loop through each day between the start and end dates
                                                            for ($timestamp = $start_timestamp; $timestamp <= $end_timestamp; $timestamp += 86400) {
                                                                // Format the date
                                                                $date = date('Y-m-d', $timestamp);

                                                                // Set the selected attribute for the option corresponding to the current date
                                                                $selected = ($date == $current_date) ? 'selected' : '';

                                                                // Add the option to the select element
                                                                echo "<option hidden selected disabled>Select a date</option>";
                                                                echo "<option value=\"$date\" $selected>$date</option>";
                                                            }

                                                            // End the select element
                                                            echo '</select>';
                                                            ?>
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Day </label>
                                                        <input type="text" id="weekday<?= $row_number ?>" name="weekday"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Available Time </label>
                                                        <?php
                                                        $start_time = $row['time'];
                                                        $end_time = $row['ttime'];

                                                        $time_diff = strtotime($end_time) - strtotime($start_time);
                                                        $time_diff_in_minutes = ceil($time_diff / 60);

                                                        $options = array();
                                                        for ($i = 0; $i < $time_diff_in_minutes; $i += 30) {
                                                            $time_slot_start = date('g:i A', strtotime($start_time) + ($i * 60));
                                                            $time_slot_end = date('g:i A', strtotime($start_time) + (($i + 30) * 60));
                                                            $options[$time_slot_start . ' - ' . $time_slot_end] = $time_slot_start . ' - ' . $time_slot_end;
                                                        }
                                                        ?>
                                                        <select class="form-control" name="time" required>
                                                            <?php
                                                            foreach ($options as $value => $label) {
                                                                echo '<option selected hidden disabled>Select time</option>';
                                                                echo '<option value="' . $value . '">' . $label . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Reason </label>
                                                        <textarea type="text" name="reason" id="reason"
                                                            class="form-control" required></textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="btnBook" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SCRIPT FOR WEEKDAYS -->

                                <script>
                                    var dateInput<?= $row_number ?> = document.getElementById("date<?= $row_number ?>");
                                    var weekdayOutput<?= $row_number ?> = document.getElementById("weekday<?= $row_number ?>");

                                    // Update weekday display whenever the date input changes
                                    dateInput<?= $row_number ?>.addEventListener("change", function () {
                                        var selectedDate = new Date(this.value);
                                        var weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                        var weekday = weekdays[selectedDate.getDay()];
                                        weekdayOutput<?= $row_number ?>.value = weekday;
                                    });

                                    // Initialize weekday display on page load
                                    var initialDate<?= $row_number ?> = new Date(dateInput<?= $row_number ?>.value);
                                    var initialWeekday<?= $row_number ?> = weekdays[initialDate<?= $row_number ?>.getDay()];
                                    weekdayOutput<?= $row_number ?>.value = initialWeekday<?= $row_number ?>;
                                </script>

                                <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
    include('footer.php');
    ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>