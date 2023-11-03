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
    <div class="container-fluid">


        <!-- Modal -------------------------------------------------------------------------------------------------------------->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Log Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -------------------------------------------------------------------------------------------------------------->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Update Profile</a>
    </div>


    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Logs</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
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
                        <div class="col-md-10">
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
                            <input class="form-control" type="text" value="<?= $fetch['stid'] ?>"  name="stid" required
                                readonly>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" type="text"
                                value="<?= $fetch['fname'] ?> <?= $fetch['lname'] ?>" name="fullname" required readonly>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Course</label>
                            <input value="<?= $row['course'] ?>" name="course" hidden>
                            <input class="form-control" type="text" value="<?= $fetch['course'] ?>" name="course" required readonly>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Medicine</label>
                            <select class="form-control" type="text" name="meds" value="" required>
                                <option disabled selected hidden>Medicine</option>
                                <option>None</option>
                                <?php
                                $sql = "SELECT * FROM `inventory` WHERE status = 0";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['meds']; ?>,<?php echo $row['price']; ?>"
                                        class="meds custom-select">
                                        <?php echo $row['meds']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Cheif Complaint</label>
                            <textarea rows="5" class="form-control" type="text" name="reason" placeholder="Reason" required></textarea>
                        </div>
                        <br>
                        <div class="col-md-10">
                            <button class="btn btn-primary btn-icon-split" type="submit" name="btnQuickLogs">
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


        
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Logs</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Chief Complaint</th>
                                    <th>Physical Examination</th>
                                    <th>Treatment/Management</th>
                                    <th>Plan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Chief Complaint</th>
                                    <th>Physical Examination</th>
                                    <th>Treatment/Management</th>
                                    <th>Plan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                //SELECT query
                                $stid = $_SESSION['stidd'];
                                $sql = "SELECT * FROM logs WHERE stid='$stid' ORDER BY id DESC LIMIT 8";
                                $result = mysqli_query($link, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row => $unit) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $unit['date']; ?>
                                            </td>
                                            <td>
                                                <?= $unit['reason']; ?>
                                            </td>
                                            <td>
                                                <?= $unit['physical']; ?>
                                            </td>
                                            <td>
                                                <?= $unit['meds']; ?>
                                            </td>
                                            <td>
                                                <?= $unit['plan']; ?>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>




























    <!-- Pie chart ------------------------------------------------------------------------------>
    <?php
    $count = "SELECT * FROM logs WHERE department = 'CITE'";
    $result = mysqli_query($link, $count);
    $cite = mysqli_num_rows($result);

    $coun = "SELECT * FROM logs WHERE department = 'CMA'";
    $resul = mysqli_query($link, $coun);
    $cma = mysqli_num_rows($resul);

    $cou = "SELECT * FROM logs WHERE department = 'SHS'";
    $resu = mysqli_query($link, $cou);
    $shs = mysqli_num_rows($resu);
    ?>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["CITE", "CMA", "SHS"],
                datasets: [{
                    data: [<?php echo $cite ?>, <?php echo $cma ?>, <?php echo $shs ?>],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

    </script>
    <!-- Pie chart 
 <script src="js/demo/chart-pie-demo.js"></script>
 -->
</body>

</html>




<?php
session_start();
session_regenerate_id(true);
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

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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



        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Cost</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $count = "SELECT SUM(stotal) as cost FROM temp";
                                    $result = mysqli_query($link, $count);
                                    $row = mysqli_fetch_assoc($result);
                                    $cost = $row['cost'];
                                    echo "₱",$cost;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    quantity consumed</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                     $count = "SELECT SUM(cons) as quan FROM temp";
                                     $result = mysqli_query($link, $count);
                                     $row = mysqli_fetch_assoc($result);
                                     $quan = $row['quan'];
                                     echo $quan;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-prescription fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">number of logs
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php
                                            $count = "SELECT id FROM temp";
                                            $result = mysqli_query($link, $count);
                                            $fetch = mysqli_num_rows($result);
                                            echo $fetch;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    checked appointments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $count = "SELECT id FROM rappoint";
                                    $result = mysqli_query($link, $count);
                                    $fetch = mysqli_num_rows($result);
                                    echo $fetch;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Logs Info</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Date</th>
                                <th>Course</th>
                                <th>Chief Complaint</th>
                                <th>Physical Examination</th>
                                <th>Treatment</th>
                                <th>Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `logs` ORDER BY id DESC";
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
                                            <?= $output_date ?>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/buttons.html5.min.js"></script>
    <script src="vendor/datatables/buttons.print.min.js"></script>
    <script src="vendor/datatables/jszip.min.js"></script>
    <script src="vendor/datatables/pdfmake.min.js"></script>
    <script src="vendor/datatables/vfs_font.js"></script>
    <!-- Analyticssssssssssssssssssssssssssss -->
    


    <!-- Pie chart 
 <script src="js/demo/chart-pie-demo.js"></script>
 -->
</body>

</html>