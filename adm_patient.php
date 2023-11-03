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
    <?php
    if (isset($_SESSION['inv']) && $_SESSION['inv'] != '') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['inv'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        unset($_SESSION['inv']);
    }
    ?>
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
                        <h6 class="m-0 font-weight-bold text-primary">Patient Form</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form method="POST" action="updatecode.php">
                            <?php
                            $row2 = array(
                                'stid' => '',
                                'fname' => '',
                                'lname' => '',
                                'course' => '',
                                'department' => '',
                                'address' => '',
                                'cnumber' => '',
                                'guardian' => '',
                                'year' => '',
                                'gcnumber' => '',
                                'gender' => ''
                            );
                            if (isset($_GET['stid'])) {
                                $stmt = $link->prepare("SELECT * FROM `student` WHERE stid = ?");
                                $stmt->bind_param("s", $_GET['stid']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row2 = $result->fetch_assoc();
                                }
                            }
                            
                            ?>
                            <h5 style="color:red;">
                                <?php if (isset($_GET['stid'])) {
                                    if (mysqli_num_rows($result) > 0) {
                                    } else {
                                        echo "No Record Found";
                                    }
                                } ?>
                            </h5>
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-label">Student ID</label>
                                    <input class="form-control" type="text" name="stid" placeholder=""
                                        value="<?php echo $row2['stid'] ?? '' ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" style="opacity: 0;">Search</label>
                                    <input type="submit" class="form-control btn btn-primary" name="searchstid"
                                        value="Search">
                                </div>
                                <div class="col-md-10">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control" type="text" name="fullname" placeholder=""
                                        value="<?php echo $row2['fname'] . " " . $row2['lname'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Course</label>
                                    <select class="form-control" name="course" id="course" placeholder="">
                                        <option value="<?php echo $row2['course'] ?>"><?php echo $row2['course'] ?>
                                        </option>
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
                                <div class="col-md-5">
                                    <label class="form-label">Department</label>
                                    <input class="form-control" type="text" name="department" placeholder=""
                                        value="<?php echo $row2['department'] ?? '' ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" type="text" name="address" placeholder=""
                                        value="<?php echo $row2['address'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Contact #</label>
                                    <input class="form-control" type="text" name="con" placeholder=""
                                        value="<?php echo $row2['cnumber'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Parents/Guardian</label>
                                    <input class="form-control" type="text" name="guardian" placeholder=""
                                        value="<?php echo $row2['guardian'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Level</label>
                                    <input class="form-control" type="text" name="level" placeholder=""
                                        value="<?php echo $row2['year'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Parents/Guardian Contact #</label>
                                    <input class="form-control" type="text" name="gcnumber" placeholder=""
                                        value="<?php echo $row2['gcnumber'] ?? '' ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Gender</label>
                                    <input class="form-control" type="text" name="gender" placeholder=""
                                        value="<?php echo $row2['gender'] ?? '' ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">Medicine</label>
                                    <select class="form-control" type="text" name="meds" value="" placeholder="">
                                        <option disabled selected hidden>Medicine</option>
                                        <option value="None,0">None</option>
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
                                <div class="col-md-5">
                                    <label class="form-label">Quantity</label>
                                    <input class="form-control" type="number" name="qty" placeholder="" min="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">Chief Complaint</label>
                                    <textarea rows="5" class="form-control" type="text" name="reason"
                                        placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Treatment/Management</label>
                                    <textarea rows="5" class="form-control" type="text" name="treat"
                                        placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Physical Examination</label>
                                    <textarea rows="5" class="form-control" type="text" name="physical"
                                        placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Plan</label>
                                    <textarea rows="5" class="form-control" type="text" name="plan"
                                        placeholder=""></textarea>
                                    <br>
                                </div>
                            </div>

                            <button name="btnLogs" class="btn btn-primary btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Submit</span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Records</h6>
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
                                        $sql = "SELECT * FROM logs ORDER BY id DESC LIMIT 15";
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


</body>

</html>