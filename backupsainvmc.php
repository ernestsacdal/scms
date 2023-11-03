<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:adm_login.php");
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

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Reports</h1>
        <p class="mb-4"></p>

        <form method="POST">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">From</label>
                        <input type="date" class="form-control" name="from_date" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">To</label>
                        <input type="date" class="form-control" name="to_date" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Meds</label>
                        <select class="form-control" name="meds" id="meds">
                            <option value="">Medicine</option>
                            <option>None</option>
                            <?php
                            $sql = "SELECT * FROM `inventory`";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['meds']; ?>">
                                    <?php echo $row['meds']; ?>


                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Course</label>
                        <select class="form-control" name="course" id="course">
                            <option value="">Course</option>
                            <option>None</option>
                            <?php
                            $sql = "SELECT * FROM `courses`";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['course']; ?>">
                                    <?php echo $row['course']; ?>


                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <select class="form-control" name="department" id="department">
                            <option value="">Department</option>
                            <option value="SHS">SHS</option>
                            <option value="CITE">CITE</option>
                            <option value="CMA">CMA</option>
                            <option value="CAHS">CAHS</option>
                            <option value="CELA">CELA</option>
                            <option value="CCJE">CCJE</option>
                        </select>
                    </div>
                </div>

                <br>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Filter</label>
                        <br>
                        <button class="btn btn-primary" type="submit" name="filter">Filter</button>
                    </div>
                </div>

            </div>
        </form>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>

            <div class="card-body">
                <?php
                if (isset($_POST['filter'])) {
                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];
                    $meds = $_POST['meds'];
                    $course = $_POST['course'];
                    $department = $_POST['department'];

                    if ($course == '' && $meds == '' && $department == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "';</script>";
                    } else if ($meds == '' && $course == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&department=" . $department . "';</script>";
                    } else if ($department == '' && $course == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&meds=" . $meds . "';</script>";
                    } else if ($department == '' && $meds == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&course=" . $course . "';</script>";
                    } else if ($department == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&meds=" . $meds . "&course=" . $course . "';</script>";
                    } else if ($course == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&meds=" . $meds . "&department=" . $department . "';</script>";
                    } else if ($meds == '') {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&course=" . $course . "&department=" . $department . "';</script>";
                    } else {
                        echo "<script>window.location.href='adm_invmc.php?from_date=" . $from_date . "&to_date=" . $to_date . "&meds=" . $meds . "&course=" . $course . "&department=" . $department . "';</script>";
                    }


                }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Meds</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Meds</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Total</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['meds']) && isset($_GET['course']) && isset($_GET['department'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $meds = $_GET['meds'];
                                $course = $_GET['course'];
                                $department = $_GET['department'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND meds = '$meds' AND course = '$course' OR 
                                date BETWEEN '$from_date' AND '$to_date' AND meds = '$meds' AND department = '$department'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['department']) && isset($_GET['course'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $department = $_GET['department'];
                                $course = $_GET['course'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND course = '$course' OR date BETWEEN '$from_date' AND '$to_date' AND department = '$department'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['department']) && isset($_GET['meds'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $department = $_GET['department'];
                                $meds = $_GET['meds'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND department = '$department' AND meds = '$meds'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['course']) && isset($_GET['meds'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $course = $_GET['course'];
                                $meds = $_GET['meds'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND course = '$course' AND meds = '$meds'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['department'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $department = $_GET['department'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND department = '$department'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['meds'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $meds = $_GET['meds'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND meds = '$meds'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['course'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $course = $_GET['course'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date' AND course = '$course'";

                            } else if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $query = "SELECT * FROM logs WHERE date BETWEEN '$from_date' AND '$to_date'";

                            } else {


                                $query = "SELECT * FROM logs";
                                $total = [
                                    'total' => 0,
                                    'qty' => 0,
                                    'stotal' => 0,
                                ];
                            }


                            $result = mysqli_query($link, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    $total = [
                                        'qty' => $total['qty'] + $unit['qty'],
                                        'stotal' => $total['stotal'] + $unit['stotal'],
                                    ];
                                    echo '<tr>';
                                    echo '<td align= center>' . ($row + 1) . '</td>';
                                    echo '<td align= center>' . $unit['date'] . '</td>';
                                    echo '<td align= center>' . $unit['stid'] . '</td>';
                                    echo '<td align= center>' . $unit['fullname'] . '</td>';
                                    echo '<td align= center>' . $unit['department'] . '</td>';
                                    echo '<td align= center>' . $unit['course'] . '</td>';
                                    echo '<td align= center>' . $unit['meds'] . '</td>';
                                    echo '<td align= center>' . $unit['rate'] . '</td>';
                                    echo '<td align= center>' . $unit['qty'] . '</td>';
                                    echo '<td align= center>' . $unit['stotal'] . '</td>';
                                    echo '</tr>';
                                }
                                echo '<tr align= center>';
                                echo '<th colspan="8" style="text-align: right;"> Grand Total</th>';
                                echo '<td ><b>' . $total['qty'] . '</b></td>';
                                echo '<td ><b>' . $total['stotal'] . '</b></td>';
                                echo '</tr>';
                                ?>

                                <?php


                            } else {
                                
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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

    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
</body>

</html>