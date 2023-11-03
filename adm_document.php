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
    include 'scms_nav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <?php
            $stid = $_GET['viewdocument'];
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
                <h6 class="m-0 font-weight-bold text-primary">Student Documents</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Document ID</th>
                                <th>Type of Document</th>
                                <th>File</th>
                                <th>Size(KB)</th>
                                <th>Date Added</th>
                                <th>Download</th>
                                <th style="width:12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stid = $_GET['viewdocument'];
                            $sql = "SELECT * FROM records WHERE stid = '$stid'";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $unit['id']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['type']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['name']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['size'] / 1000 . "KB"; ?>
                                        </td>
                                        <td>
                                            <?= $unit['added']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['download']; ?>
                                        </td>
                                        <td><a href="stu_updatecode.php?file_id=<?php echo $unit['id'] ?>"
                                                class="btn btn-dark btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-download"></i>
                                                </span>
                                                <span class="text">Download</span></a></td>
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