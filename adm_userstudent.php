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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Registered Students</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Student Info</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Guardian</th>
                                <th>Guardian Contact</th>
                                <th>Status</th>
                                <th style="width:17%">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `student`";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $unit['stid']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['fname']; ?>
                                            <?= $unit['lname']; ?>
                                        </td>
                                        <td>
                                            <strong>
                                                <?= $unit['cnumber']; ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <?= $unit['guardian']; ?>
                                        </td>
                                        <td>
                                            <strong>
                                                <?= $unit['gcnumber']; ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <?php
                                            if ($unit['status'] == 0) {
                                                echo '<a href="updatecode.php?userstatus_id=' . $unit['stid'] . '&userstatus=1" class="badge badge-success">Updated</a>';
                                            } else {
                                                echo '<a href="updatecode.php?userstatus_id=' . $unit['stid'] . '&userstatus=0" class="badge badge-danger">Not updated</a>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo '<a href="adm_view.php?viewstid=' . $unit['stid'] . '"
                                                class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">View Student Profile</span>
                                            </a>';
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                            // while ($row = mysqli_fetch_assoc($result)) {
                            //     echo "
                            //             <tr> 
                            //             <td>" . $row['stid'] . "</td>
                            //             <td>" . $row['fname'] . " " . $row['lname'] . "</td>
                            //             <td><strong>" . $row['cnumber'] . "</strong></td>
                            //             <td>" . $row['guardian'] . "</td>
                            //             <td><strong>" . $row['gcnumber'] . "</strong></td>
                            //             <td>
                            //             <a href='adm_view.php?viewstid=" . $row['stid'] . "' class='btn btn-info btn-icon-split'>
                            //             <span class='icon text-white-50'>
                            //                 <i class='fas fa-info-circle'></i>
                            //             </span>
                            //             <span class='text'>View Student Profile</span>
                            //             </a>
                            //             </td>
                            //             </tr>
                            //             ";
                            // }
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
    <script src=" vendor/jquery/jquery.min.js"></script>
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