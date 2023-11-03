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
            $stid = $_GET['viewstid'];
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
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <?php
                         $stid = $_GET['viewstid'];
                         $sql = "SELECT * FROM `student` WHERE stid='$stid'";
                         $result = mysqli_query($link, $sql); 
                         $row = mysqli_fetch_assoc($result); ?>
                        <img class="img-account-profile img-fluid rounded-circle mb-2" src="img/<?php echo $row['image'] ?>" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Student ID</label>
                                <input class="form-control" id="inputUsername" type="text"
                                     value="<?php echo $fetch['stid']; ?>" disabled/>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                         value="<?php echo $fetch['fname']; ?>" disabled/>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                         value="<?php echo $fetch['lname']; ?>" disabled/>
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Year Level</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        
                                        value="<?php echo $fetch['year']; ?>" disabled/>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Course</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                         value="<?php echo $fetch['course']; ?>" disabled/>
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                     value="<?php echo $fetch['aumail']; ?>" disabled/>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Guardian</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number"
                                        value="<?php echo $fetch['guardian']; ?>" disabled/>
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Guardian Contact</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                         value="<?php echo $fetch['gcnumber']; ?>" disabled/>
                                </div>
                            </div>
                            <!-- Save changes button-->
  
                        </form>
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