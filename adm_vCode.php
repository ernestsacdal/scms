<?php
// Start the session and check if the verification code and student ID are set
session_start();

if (!isset($_SESSION['vCode']) || !isset($_SESSION['uname'])) {
    header("Location: forgotpassword.php");
    exit();
}

// Check if the verification code was submitted and matches the stored code
if (isset($_POST['btnVerify'])) {
    $verificationCode = $_POST['verify'];
    if ($verificationCode == $_SESSION['vCode']) {
        header("Location: adm_rPassword.php");
        exit();
    } else {
        $_SESSION['error'] = 'The verification code you entered is incorrect. Please try again.';
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
                                        <h3 class="h4 text-gray-900 mb-4"><?php
                            if (isset($_SESSION['successVer']) && $_SESSION['successVer'] != '') {
                                echo '<div class="alert alert-success" role="alert">
                                 <strong>' . $_SESSION['successVer'] . '</strong>
                                </div>';
                                unset($_SESSION['successVer']);
                            }

                            if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
                                    echo '<div class="alert alert-danger" role="alert">
                                             <strong>' . $_SESSION['error'] . '</strong>
                                          </div>';
                                    unset($_SESSION['error']);
                                }

                            ?></h3>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="" name="verify"
                                                placeholder="Enter Verification Code">
                                        </div>
                                        <button name="btnVerify"
                                            class="btn btn-success btn-dark btn-dark-green btn-user btn-block">Confirm</button>

                                    </form>
                                    <hr>
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