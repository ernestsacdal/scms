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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="stu_updProfile.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="sidebar-brand-text mx-8">Araullo University School Clinic</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="stu_updProfile.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Update Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php
                    $stid = $_SESSION['stidd'];
                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);

                    ?>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['stidd']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $row['image'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
                    </div>

                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Fill the required information to proceed
                                </h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <form method="POST" action="stu_updatecode.php">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="hidden" name="stid" value="<?php echo $_SESSION['stidd']; ?>">
                                            <label class="form-label">Course</label>
                                            <select class="form-control" name="course" id="courses" required>
                                                <option value="" disabled selected hidden>Course (Required)</option>
                                                <?php
                                                $sql = "SELECT * FROM courses";
                                                $result = mysqli_query($link, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <option
                                                        value="<?php echo $row['department_id'] ?>,<?php echo $row['course'] ?>">
                                                        <?php echo $row['course'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label"> Year Level</label>
                                            <select type="text" class="form-control" name="level" id="year" required>
                                                <option value="" selected disabled hidden>Year Level</option>
                                                <option value="SHS">SHS</option>
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                    $stid = $_SESSION['stidd'];
                                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                    $result = mysqli_query($link, $sql);
                                    $echo = mysqli_fetch_assoc($result);

                                    ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="form-label">Contact #</label>
                                            <input class="form-control" type="text" name="cnumber"
                                                value="<?php echo $echo['cnumber']; ?>" placeholder="">
                                        </div>

                                        <div class="col-md-5">
                                            <label class="form-label">Parents/Guardian Contact #</label>
                                            <input class="form-control" type="text" name="gcnumber"
                                                value="<?php echo $echo['gcnumber']; ?>" placeholder="">
                                        </div>

                                        <select type="text" id="department" class="form-control" name="department"
                                            hidden>
                                        </select>
                                    </div>
                                    <hr>


                                    <button name="btnUpdStudent" class="btn btn-primary btn-icon-split" type="submit">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Submit</span>
                                    </button>

                                </form>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="logout.php" method="POST">
                        <button type="submit" name="stu_logoutbtn" class="btn btn-primary">Logout</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        $('#courses').change(function () {
            $.ajax({
                url: 'departmentdata.php',
                type: 'POST',
                data: { department_id: $(this).val(), },
                success: function (data) {
                    $('#department').html(data)
                }
            })
        })
    </script>

    <script>
        var yearSelect = document.getElementById("year");
        var departmentSelect = document.getElementById("department");

        yearSelect.addEventListener("change", function () {
            if (yearSelect.value == "1st Year") {
                departmentSelect.innerHTML = '<option value="CAS">CAS</option>';
            } else if (yearSelect.value == "SHS") {
                departmentSelect.innerHTML = '<option value="SHS">SHS</option>';
            }
        });
    </script>
</body>

</html>