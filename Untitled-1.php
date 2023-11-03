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
    include 'stu_scmsnav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->

    <!-- conetntc --------------------------------------------------------------------------------------------------------->

    <!-- asdasd ------------------------------------------------------------------------------------------------------------------------ -->

    <div class="container-fluid">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="stu_profile.php">Profile</a>
            <a class="nav-link" href="stu_records.php">Records</a>
            <a class="nav-link" href="account-security.html">Security</a>
        </nav>
        <div id="content-wrapper" class="d-flex flex-column">
            <br>

            <!-- conetntc --------------------------------------------------------------------------------------------------------->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                        <div style="display: flex; justify-content: flex-end">
                            <form action="stu_updatecode.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="stid" value="<?php echo $_SESSION['stidd'] ?>" />
                                <input type="file" name="myfile" class="btn btn-secondary">
                                <button type="submit" name="btnSave" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="text">Upload</span>
                                </button>
                        </div>
                        </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Document ID</th>
                                    <th>Student ID</th>
                                    <th>File</th>
                                    <th>Size(MB)</th>
                                    <th>Date Added</th>
                                    <th>Download</th>
                                    <th style="width:12%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Document ID</th>
                                    <th>Student ID</th>
                                    <th>File</th>
                                    <th>Size(MB)</th>
                                    <th>Date Added</th>
                                    <th>Download</th>
                                    <th style="width:12%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $stid = $_SESSION['stidd'];
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
                                                <?= $unit['stid']; ?>
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
                        <!-- asdasd ------------------------------------------------------------------------------------------------------------------------ -->
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

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