<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:adm_login.php");
    die();
}
if (isset($_GET['viewstid'])) {
    $stid = $_GET['viewstid'];
    $select = mysqli_query($link, "SELECT * FROM `student` WHERE stid='$stid'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
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

</head>

<body id="page-top">

    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <?php
            $stid = $_GET['viewrecords'];
            $sql = "SELECT * FROM `student` WHERE stid='$stid'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <a class='nav-link active' href='adm_view.php?viewstid=" . $row['stid'] . " '>Profile</a>
                <a class='nav-link' href='adm_records.php?viewrecords=" . $row['stid'] . "'>Records</a>
                <a class='nav-link' href='adm_document.php?viewdocument=" . $row['stid'] . "'>Documents</a>";
            }
            ?>

        </nav>
        <hr class="mt-0 mb-4" />

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Clinic Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3%">ID</th>
                                <th style="width:10%">Full Name</th>
                                <th style="width:7%">Medicine</th>
                                <th style="width:8%">Date</th>
                                <th style="width:4%">Course</th>
                                <th style="width:17%">Chief Complaint</th>
                                <th style="width:17%">Physical Examination</th>
                                <th style="width:17%">Treatment</th>
                                <th style="width:17%">Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stid = $_GET['viewrecords'];
                            $sql = "SELECT * FROM logs WHERE stid = '$stid'";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    ?>
                                     <tr>
                                        <td>
                                            <?=($row + 1) ?>
                                        </td>
                                        <td>
                                            <?= $unit['fullname']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['meds']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['date']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['course']; ?>
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