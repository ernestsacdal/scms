<?php
session_start();
include('dbc.php');
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['btnForgot'])) {
    $uname = $_POST['uname'];

    // Check if the student ID exists in the database and get the associated email
    $stmt = mysqli_prepare($link, "SELECT mail FROM signup WHERE uname = ?");
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $mail = $row['mail'];

        // Generate a verification code and store it in the session
        $verificationCode = rand(100000, 999999);
        $_SESSION['vCode'] = $verificationCode;
        $_SESSION['uname'] = $uname;

        // Create a new PHPMailer instance
        $mailer = new PHPMailer();

        // Configure the SMTP settings
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'sacdalernest01@gmail.com';
        $mailer->Password = 'trohjrxwgotttpwc';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $html_body = "<html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Verification Code</title>
            <style>
                /* Add your custom CSS styles here */
                body {
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                    color: #333;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                }
                .header {
                    background-color: #007bff;
                    padding: 10px;
                    color: #fff;
                    text-align: center;
                }
                .content {
                    padding: 20px;
                    background-color: #f5f5f5;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                }
                .button {
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    padding: 10px;
                    border-radius: 5px;
                    display: inline-block;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Verification Code</h1>
                </div>
                <div class='content'>
                    <p>Dear Admin,</p>
                    <p>Your verification code is: <b>$verificationCode</b></p>
                    <p>Please enter this code in the verification page to reset your password.</p>
                </div>
            </div>
        </body>
        </html>";

        // Set the sender and recipient email addresses
        $mailer->setFrom('sacdalernest01@gmail.com', 'Araullo University Clinic');
        $mailer->addAddress($mail);

        // Set the email subject and body
        $mailer->isHTML(true);
        $mailer->Subject = 'Your Verification Code for Admin Password Reset';
        $mailer->Body = $html_body;

        // Send the email and redirect to the verification page
        if ($mailer->send()) {
            $_SESSION['successVer'] = 'A verification code was sent to your email';
            header("Location: adm_vCode.php");

        } else {
            $_SESSION['forgotError'] = 'An error occurred while sending the email. Please try again later.';
        }
    } else {
        $_SESSION['forgot'] = 'The Username you entered does not exist in our database.';
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
                                        if (isset($_SESSION['forgot']) && $_SESSION['forgot'] != '') {
                                            echo '<div class="alert alert-danger" role="alert">
                                                     <strong>' . $_SESSION['forgot'] . '</strong>
                                                  </div>';
                                            unset($_SESSION['forgot']);
                                        }
                                        if (isset($_SESSION['forgotError']) && $_SESSION['forgotError'] != '') {
                                            echo '<div class="alert alert-danger" role="alert">
                                                     <strong>' . $_SESSION['forgotError'] . '</strong>
                                                  </div>';
                                            unset($_SESSION['forgotError']);
                                        }
                                        ?>
                                        <h1 class="h4 text-gray-900 mb-4">Administrator Forgot Password</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="uname" placeholder="Enter Username">
                                        </div>
                                        <button name="btnForgot"
                                            class="btn btn-success btn-dark btn-dark-green btn-user btn-block">Send
                                            Verification Code</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="adm_login.php">Go back!</a>
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