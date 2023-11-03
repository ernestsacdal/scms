 <?php
session_start();
include('dbc.php');
$msg = "";

if (isset($_POST['stubtn_login'])) {
    $stid_login = $_POST['stid'];
    $passw_login = $_POST['passw'];

    $stmt = mysqli_prepare($link, "SELECT * FROM student WHERE stid = ?");
    mysqli_stmt_bind_param($stmt, "s", $stid_login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($passw_login, $row['passw'])) {
        $status = $row['status'];
        if ($status == 0) {
            $_SESSION['stidd'] = $row['stid'];
            $_SESSION['fname'] = $row['fname'];
            header('Location: stu_index.php');
        } else {
            $_SESSION['stidd'] = $row['stid'];
            $_SESSION['fname'] = $row['fname'];
            header('Location: stu_updProfile.php');
        }
    } else {
        $msg = 1;
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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php
    if ($msg) {
        echo '<div class="alert alert-danger alert-dismissible fade show center-block" role="alert">
        <h5 class="text-center">
        Invalid Credentials!</h5>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>

    <div class="container">

        <!-- Outer Row src="img/profile-1.png" -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block">
                            </div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">School Clinic</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="stid" placeholder="Enter Student ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="passw">
                                        </div>
                                        <button name="stubtn_login"
                                            class="btn btn-primary btn-user btn-block">Login</button>
                                        <div class="error">
                                        </div>
                                        <hr>
                                        <a href="stu_register.php" class="btn btn-google btn-user btn-block">
                                            <i class="fas fa-user-plus fa-fw"></i> Student Registration
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="adm_login.php">Login as Administrator</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgotpassword.php">Forgot password?</a>
                                    </div>
                                </div>
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

</body>

</html>