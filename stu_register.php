<?php
$user = 0;
$match = 0;
$char = 0;
include 'dbc.php';

if (isset($_POST['stubtn_reg'])) {
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $year = $_POST['year'];
    $explode = explode(',', $_POST['course']);
    $deptid = $explode[0];
    $course = $explode[1];
    $passw = $_POST['passw'];
    $cpassw = $_POST['cpassw'];
    $guardian = $_POST['guardian'];
    $gcnumber = $_POST['gcnumber'];
    $department = $_POST['department'];
    $aumail = $_POST['aumail'];
    
        $sql = "SELECT * FROM student WHERE stid=?";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $stid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $user = 1;
            } else {
                if ($passw === $cpassw) {
                    $hashed_password = password_hash($passw, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO student(stid, fname, lname, year, course, passw, guardian, gcnumber,department,aumail)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($link, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $stid, $fname, $lname, $year, $course, $hashed_password, $guardian, $gcnumber, $department, $aumail);
                    $result = mysqli_stmt_execute($stmt);
                    if ($result) {
                        header('Location:stu_login.php');
                    }
                } else {
                    $match = 1;
                }
            }
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-3.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php
    if ($user) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>User aready EXIST!</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    } else {
        if ($match) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Password did not MATCH!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }
    }
    ?>

    <div class="container">

        <!-- Outer Row src="img/profile-1.png" -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Student Registration</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="stid"
                                            placeholder="Enter Student ID" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="fname"
                                                placeholder="Enter First Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="lname"
                                                placeholder="Enter Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="aumail"
                                            placeholder="Enter your AU-Mail" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="guardian"
                                            placeholder="Enter Guardian Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="gcnumber"
                                            placeholder="Enter Guardian Contact Number" required>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <select type="text" id="courses" class="form-control form-control-user"
                                                name="course">
                                                <option value="" disabled selected hidden>Courses</option>
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
                                        <div class="form-group col-md-6">
                                            <select type="text" class="form-control form-control-user" name="year"
                                                id="year">
                                                <option value="" selected disabled hidden>Year Level</option>
                                                <option value="SHS">SHS</option>
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                                <option value="5th Year">5th Year</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control form-control-user" name="passw"
                                                placeholder="Enter Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control form-control-user" name="cpassw"
                                                placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                                        </div>
                                        <select type="text" id="department" class="form-control form-control-user"
                                            name="department" hidden>
                                        </select>

                                    </div>
                                    <hr>
                                    <button name="stubtn_reg"
                                        class="btn btn-primary btn-user btn-block">Register</button>
                                    <div class="text-center">
                                        <br>
                                        <a class="small" href="stu_login.php">Have an account? Login!</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
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