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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Patients</h1>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Patients</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form method="GET" action="">
                            <div class="row">
                                <div class="col-md-5">
                                    <input class="form-control" type="text" name="search_id" value="<?php if (isset($_GET['search_id'])) {
                                        echo $_GET['search_id'];
                                    } ?>" placeholder="Search Student ID">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Show</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <?php
                        if (isset($_GET['search_id'])) {
                            $search_id = $_GET['search_id'];

                            $query = "SELECT * FROM student WHERE stid='$search_id'";
                            $query_run = mysqli_query($link, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="form-label">Student ID</label>
                                            <input class="form-control" type="text" name="" value="<?php echo $row['stid']; ?>"
                                                placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Course</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Full Name</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Level</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Contact #</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Parents/Guardian</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Gender</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Parents/Guardian Contact #</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Civil Status</label>
                                            <input class="form-control" type="text" name="" value="" placeholder="">
                                        </div>
                                    </div>
                                    <?php

                                }
                            } else {
                                ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Student ID</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Course</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Full Name</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Level</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Address</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Contact #</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Parents/Guardian</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Gender</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Parents/Guardian Contact #</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Civil Status</label>
                                        <input class="form-control" type="text" name="" value="" placeholder="">
                                    </div>
                                </div>
                                <?PHP
                            }
                        }
                        ?>
                        <form method="POST">
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">

                                <select class="form-control" type="text" name="search_id" value="" placeholder="">
                                    <option value="">Medicine</option>
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
                        <div class="row">
                            <div class="col-md-5">
                                <label class="form-label">Cheif Complaint</label>
                                <textarea rows="5" class="form-control" type="text" name="search_id" value=""
                                    placeholder=""></textarea>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Treatment/Management</label>
                                <textarea rows="5" class="form-control" type="text" name="search_id" value=""
                                    placeholder=""></textarea>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Physical Examination</label>
                                <textarea rows="5" class="form-control" type="text" name="search_id" value=""
                                    placeholder=""></textarea>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Plan</label>
                                <textarea rows="5" class="form-control" type="text" name="search_id" value=""
                                    placeholder=""></textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Logs</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Student ID</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //SELECT query
                                        $sql = "SELECT * FROM logs LIMIT 15";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['date']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['stid']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['fullname']; ?>
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
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
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
    <script src="vendor/chart.js/Chart.min.js"></script>


</body>

</html>









<a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-calendar-check text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
        </a>