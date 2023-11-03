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
    
    <!-- Modal --------------------------------------------------------------------------------------------------------->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Information Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                $stid = $_SESSION['stidd'];
                $select = mysqli_query($link, "SELECT * FROM student WHERE stid='$stid'") or die;
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                    // $date_string = $fetch['bdate'];
                    // $timestamp = strtotime($date_string);
                    // $output_date = date("F d, Y", $timestamp);
                }
                ?>
                <form method="POST" action="stu_updatecode.php">
                    <div class="modal-body">
                        <div class="mb-3">


                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <input type="hidden" name="stid" value="<?php echo $fetch['stid'] ?>" />
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Enter your first name" name="fname"
                                    value="<?php echo $fetch['fname']; ?>" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="Enter your last name" name="lname"
                                    value="<?php echo $fetch['lname']; ?>" />
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Course</label>
                                    <select type="text" id="courses" class="form-control form-control-user"
                                                name="course" required>
                                                <option value="" selected disabled hidden>Course</option>
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
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="">Year Level</label>
                                <select type="text" class="form-control form-control-user" name="year"
                                                id="year" required>
                                                <option value="" selected disabled hidden>Year Level</option>
                                                <option value="SHS">SHS</option>
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                                <option value="5th Year">5th Year</option>
                                            </select>
                            </div>
                            <!-- Form Group (location)-->
                            
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Email</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="Enter your phone number" name="aumail"
                                    value="<?php echo $fetch['aumail']; ?>" />
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Contact</label>
                                <input class="form-control" id="inputBirthday" type="text"
                                    placeholder="Enter your contact number" name="cnumber"
                                    value="<?php echo $fetch['cnumber']; ?>" />
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Guardian</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="Enter your guardian name" name="guardian"
                                    value="<?php echo $fetch['guardian']; ?>" />
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Guardian Contact</label>
                                <input class="form-control" id="inputBirthday" type="text" name="gcnumber"
                                    placeholder="Enter your guardian contact number"
                                    value="<?php echo $fetch['gcnumber']; ?>" />
                            </div>
                            <select type="text" id="department" class="form-control form-control-user"
                                            name="department" hidden>
                                        </select>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnStuProf" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal ------------------------------------------------------------------------------------------------------------------------ -->



    <!-- Modal -->
    <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Password Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert-message"></div>
                    <form method="POST" action="fetchChange.php" id="password-form">
                        <input type="hidden" name="stid" value="<?php echo $_SESSION['stidd']; ?>">
                        <div class="col-md-12 mx-auto">
                            <label for="old_pass">Current Password:</label>
                            <input type="password" name="old" id="old_pass" class="form-control" required>
                        </div>
                        <hr>
                        <div class="col-md-12 mx-auto">
                            <label for="new_pass">New Password:</label>
                            <input type="password" name="new" id="new_pass" class="form-control"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <label for="conf_pass">Confirm New Password:</label>
                            <input type="password" name="conf" id="conf_pass" class="form-control"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnChange" id="btnSubmit">Save changes</button>

                    <script>
                        $(document).ready(function () {
                            // Send an AJAX request when the form is submitted
                            $('#password-form').submit(function (event) {
                                event.preventDefault();
                                $.ajax({
                                    type: 'POST',
                                    url: 'fetchChange.php',
                                    data: $(this).serialize(),
                                    success: function (response) {
                                        // If the password change is successful, show a success message and hide the form
                                        if (response == 'success') {
                                            $('#alert-message').html('<div class="alert alert-success" role="alert">Password changed successfully.</div>').show();
                                            $('#password-form').hide();
                                        } else {
                                            // If there's an error, show the error message
                                            $('#alert-message').html('<div class="alert alert-danger" role="alert">' + response + '</div>').show();
                                        }
                                    }
                                });
                            });
                        });
                    </script>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ------------------------------------------------------------------------------------------------------------------------ -->


    <?php
    $stid = $_SESSION['stidd'];
    $select = mysqli_query($link, "SELECT * FROM student WHERE stid='$stid'") or die;
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
        $date_string = $fetch['bdate'];
        $timestamp = strtotime($date_string);
        $output_date = date("F d, Y", $timestamp);
    }

    ?>
    <div class="container-fluid">
    <?php
    if(isset($_SESSION['img']) && $_SESSION['img']!='')
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>'.$_SESSION['img'].'</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    unset($_SESSION['img']);
    }
    
    if(isset($_SESSION['img1']) && $_SESSION['img1']!='')
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>'.$_SESSION['img1'].'</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    unset($_SESSION['img1']);
    }

    if(isset($_SESSION['img2']) && $_SESSION['img2']!='')
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>'.$_SESSION['img2'].'</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    unset($_SESSION['img2']);
    }
    ?>
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="stu_profile.php">Profile</a>
            <a class="nav-link" href="stu_records.php">Records</a>
            <a class="nav-link" href="stu_docu.php">Documents</a>
        </nav>
        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">

                        <?php
                        $stid = $_SESSION['stidd'];
                        $sql = "SELECT * FROM student WHERE stid = '$stid'";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);

                        ?>

                        <!-- Profile picture image-->
                        <img class="img-account-profile img-fluid rounded-circle mb-2"
                            src="img/<?php echo $row['image'] ?>" alt="" />
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <form method="POST" action="stu_updatecode.php" enctype="multipart/form-data">
                            <input type="hidden" name="stid" value="<?php echo $fetch['stid'] ?>" />
                            <input class="btn btn-secondary btn-sm" type="file" name="image" class="">
                            <input class="btn btn-primary" type="submit" name="btnUpload" class="form-control">

                        </form>
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
                                <input class="form-control" id="inputUsername" type="text" placeholder=""
                                    value="<?php echo $fetch['stid']; ?>" readonly />
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Full Name</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name"
                                        value="<?php echo $fetch['fname']; ?> <?php echo $fetch['lname']; ?>"
                                        readonly />
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Phone</label>
                                    <input class="form-control" id="inputLastName" type="number" placeholder=""
                                        value="<?php echo $fetch['cnumber']; ?>" readonly />
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Course</label>
                                    <input class="form-control" id="inputLocation" type="text" placeholder=""
                                        value="<?php echo $fetch['course']; ?>" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Year Level</label>
                                    <input class="form-control" id="inputOrgName" type="text" placeholder=""
                                        value="<?php echo $fetch['year']; ?>" readonly />
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder=""
                                    value="<?php echo $fetch['aumail']; ?>" readonly />
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Guardian</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder=""
                                        value="<?php echo $fetch['guardian']; ?>" readonly />
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Guardian Contact</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                        placeholder="" value="<?php echo $fetch['gcnumber']; ?>" readonly />
                                </div>
                            </div>
                            <!-- Modal button-->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Edit Info
                            </button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#pass">
                                Change Password
                            </button>
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




</body>

</html>