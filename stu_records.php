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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        td {
            text-align: center;
        }

        th {
            text-align: center;
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
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="stu_profile.php">Profile</a>
            <a class="nav-link" href="stu_records.php">Records</a>
            <a class="nav-link" href="stu_docu.php">Documents</a>
        </nav>
        <hr class="mt-0 mb-4" />

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Student Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:2%">ID</th>
                                <th style="width:10%">Student ID</th>
                                <th style="width:12%">Full Name</th>
                                <th style="width:10%">Date</th>
                                <th>Chief Complaint</th>
                                <th>Physical Examination</th>
                                <th>Treatment</th>
                                <th>Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stid = $_SESSION['stidd'];
                            $sql = "SELECT * FROM logs WHERE stid = '$stid'";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    $date_string = $unit['date'];
                                    $timestamp = strtotime($date_string);
                                    $output_date = date("F d, Y", $timestamp);
                                    ?>
                                    <tr>
                                        <td>
                                            <?=($row + 1) ?>
                                        </td>
                                        <td>
                                            <?= $unit['stid']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['fullname']; ?>
                                        </td>
                                        <td>
                                            <?= $output_date; ?>
                                        </td>
                                        <td>
                                            <?= $unit['reason']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['physical']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['treat']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['plan']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "";
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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