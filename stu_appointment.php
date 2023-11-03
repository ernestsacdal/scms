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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
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

    <!------------------------------>

    <!-- Begin Page Content -->


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Clinic Appointment List</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Logs Info</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:5%">ID</th>
                                <th style="display:none;">ID</th>
                                <th style="width:10%">Doctor</th>
                                <th style="width:12%">Date</th>
                                <th style="width:7%">Day</th>
                                <th style="width:11%">Time</th>
                                <th>Reason</th>
                                <th style="width:4%">Report</th>
                                <th style="width:4%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `appointment` ORDER BY id DESC";
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
                                        <td style="display:none;">
                                            <?= $unit['id']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['dname']; ?>
                                        </td>
                                        <td>
                                            <?= $output_date ; ?>
                                        </td>
                                        <td>
                                            <?= $unit['day']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['time']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['reason']; ?>
                                        </td>
                                        <td>
                                        <?php
                                            if ($unit['statusA'] == 0) {
                                                echo '<span class="badge badge-primary">Approved</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">Reschedule</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            if ($unit['statusA'] == 1) 
                                            {
                                                echo '<span class="badge badge-danger">Reschedule</span>';
                                            } else if ($unit['statusB'] == 0) 
                                            {
                                                echo '<span class="badge badge-warning">Pending</span>';
                                            }else{
                                                echo '<span class="badge badge-success">Checked</span>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No Record Found";
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
</body>

</html>