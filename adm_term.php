<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:adm_login.php");
    die();
}
if (!isset($_SESSION['idd'])) {
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
    <link href="css/buttons.dataTables.min.css" rel="stylesheet">
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
    <?php
    if (isset($_SESSION['term']) && $_SESSION['term'] != '') {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['term'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        unset($_SESSION['term']);
    }

    ?>
    <!-- Modal -->
    <div class="modal fade" id="endTerm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">End Term</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="updatecode.php" method="POST">
                        <input name="user" value="<?php echo $_SESSION['idd']; ?>" hidden>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Term </label>
                            <input type="text" name="term" id="" class="form-control" required>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="check"
                                checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Temporarily disabling student access to certain features until they have updated their
                                profile information to ensure it is up-to-date.
                            </label>
                        </div>
                        <hr>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Password </label>
                            <input type="password" name="pass" id="" class="form-control" required autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnTerm">Save changes</button>
                    <form>
                </div>
            </div>
        </div>
    </div>


    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!------------------------------>

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
                                    if ($cost == null || $cost == 0) {
                                        echo "₱0";
                                    } else {
                                        echo "₱", $cost;
                                    }
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
                                    if ($quan == null || $quan == 0) {
                                        echo "0";
                                    } else {
                                        echo $quan;
                                    }
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Medicine Request
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
                                    $count = "SELECT id FROM tempapp WHERE status = 1";
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



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#endTerm">
                    <span class="icon text-white-50">
                        <i class="fas fa-rotate-right"></i>
                    </span>
                    <span class="text">End Term</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width:18%">Term</th>
                                <th style="width:18%">Total Cost</th>
                                <th style="width:18%">Total Unit Consumed</th>
                                <th style="width:18%">Total Number of Request</th>
                                <th style="width:18%">Total Number of Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `term` ORDER BY id ASC";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= ($row + 1) ?>
                                        </td>
                                        <td>
                                            <?= $unit['term']; ?>
                                        </td>
                                        <td>
                                            <?= '₱',$unit['cost']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['cons']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['logs']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['app']; ?>
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
    <script src="vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/buttons.html5.min.js"></script>
    <script src="vendor/datatables/buttons.print.min.js"></script>
    <script src="vendor/datatables/jszip.min.js"></script>
    <script src="vendor/datatables/pdfmake.min.js"></script>
    <script src="vendor/datatables/vfs_font.js"></script>
</body>

</html>