<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['vCode']) || !isset($_SESSION['uname'])) {
    header("Location: adm_fPassword.php");
    exit();
}

// Check if the password was submitted and matches the confirmation
if (isset($_POST['btnReset'])) {
    $password = $_POST['passw'];
    $confirm = $_POST['cpassw'];

    if ($password == $confirm) {
        // Hash the password and update the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $uname = $_SESSION['uname'];

        $stmt = mysqli_prepare($link, "UPDATE signup SET passw = ? WHERE uname = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $uname);
        mysqli_stmt_execute($stmt);

        // Redirect to the login page and clear the session variables
        $_SESSION['uname'] = $_SESSION['vCode'] = null;
        header("Location: adm_login.php");
        exit();
    } else {
        $_SESSION['error'] = 'The passwords you entered do not match. Please try again.';
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
    <style>
        .btn-dark-green {
            background-color: #006400;
            border-color: #006400;
        }

        .btn-dark-green:hover {
            background-color: #005000;
            border-color: #005000;
        }
    </style>
     <style>
 body {
  background: linear-gradient(to bottom, #f5f5dc, #d3d3d3);
}
    </style>
</head>

<body>


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
                                        <?php
                                    if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
                                            echo '<div class="alert alert-danger" role="alert">
                                                     <strong>' . $_SESSION['error'] . '</strong>
                                                  </div>';
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="" name="passw" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="" name="cpassw" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                        </div>
                                        <button name="btnReset"
                                            class="btn btn-success btn-dark btn-dark-green btn-user btn-block">Reset</button>

                                    </form>

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