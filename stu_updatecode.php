<?php
include('dbc.php');
session_start();
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['btnStuProf'])) {
    $stid = $_POST['stid'];
    $aumail = $_POST['aumail'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $year = $_POST['year'];
    $cnumber = $_POST['cnumber'];
    $explode = explode(',', $_POST['course']);
    $deptid = $explode[0];
    $course = $explode[1];  
    $guardian = $_POST['guardian'];
    $gcnumber = $_POST['gcnumber'];
    $department = $_POST['department'];

    $query = "UPDATE `student` SET aumail='$aumail',fname='$fname',lname='$lname',year='$year',cnumber='$cnumber',course='$course',gcnumber='$gcnumber', guardian='$guardian',department='$department' WHERE `stid` = '$stid'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        header("Location: stu_profile.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnUpload'])) {
    $stid = $_POST['stid'];
    $filename = uniqid() . '-' . $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./img/" . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed_extensions = array('png', 'jpg');
    $size_limit = 5000000; // 5 MB

    if (!in_array($extension, $allowed_extensions)) {
        $_SESSION['img'] = "Only PNG and JPG images are allowed";
        header('Location:stu_profile.php');
    } elseif ($_FILES["image"]["size"] > $size_limit) {
        $_SESSION['img1'] = "File size should not exceed 5MB";
        header('Location:stu_profile.php');
    } else {
        $query = "UPDATE student SET image='$filename' WHERE `stid` = '$stid'";
        $res = mysqli_query($link, $query);

        if ($res) {
            move_uploaded_file($tempname, $folder);
            header("Location: stu_profile.php");
        } else {
            $_SESSION['img2'] = "Failed to update image";
            header('Location:stu_profile.php');
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnSave'])) {
    $stid = $_POST['stid'];
    $type = $_POST['type'];
    $filename = $_FILES['myfile']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $newFilename = uniqid() . '.' . $extension; // generate a unique filename
    $destination = 'uploads/' . $newFilename;

    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'png', 'jpg', 'jpeg', 'xlsx'])) {
        echo "HI";
    } elseif ($_FILES['myfile']['size'] > 5000000) {
        echo "hr;;o";
    } else {
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)) {
            $sql = "INSERT INTO records (stid,type,name,size,download)
            VALUES ('$stid', '$type', '$newFilename','$size',0)";

            if (mysqli_query($link, $sql)) {
                header("Location: stu_docu.php");
            } else {
                echo "hrfailedo";
            }
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_GET['file_id'])) {
    $file_id = $_GET['file_id'];

    $sql = mysqli_query($link, "SELECT * FROM `records` WHERE `id` = '$file_id'") or die("Error");
    $fetch = mysqli_fetch_array($sql);
    $filename = $fetch['name'];
    header("Content-Disposition: attachment; filename=" . $filename);
    header("Content-Type: application/octet-stream");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Transfer-Encoding: Binary");
    header('Content-Description: File Transfer');
    header("Pragma:public");
    header("Expires: 0");
    readfile("uploads/" . $filename);

    $sql = "SELECT * FROM records WHERE id = '$file_id'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['download'] + 1;

    $sqlu = "UPDATE records SET download = '$count' WHERE id = '$file_id' ";
    $result = mysqli_query($link, $sqlu);

    exit;

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnQuickLogs'])) {
    $stid = $_POST['stid'];
    $fullname = $_POST['fullname'];
    $cnumber = $_POST['cnumber'];
    $level = $_POST['year'];
    $gcnumber = $_POST['gcnumber'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $explode = explode(',', $_POST['meds']);
    $meds = $explode[0];
    $rate = $explode[1];
    $reason = $_POST['reason'];
    $guardian = $_POST['guardian'];
    $image = $_POST['image'];
    $qty = $_POST['qty'];
    $year = date('Y');
    $month = date('m');
    $stotal = $rate * $qty;

    $sql = "INSERT INTO rlogs (stid, fullname, course, meds, rate, reason, department, address, guardian, gcnumber, gender, level, con, month, year, stotal,qty,image) VALUES ('$stid', '$fullname', '$course', '$meds', '$rate', '$reason', '$department', '$address', '$guardian', '$gcnumber', '$gender', '$level', '$cnumber', '$month', '$year', '$stotal', '$qty', '$image')";
    $sql_run = mysqli_query($link, $sql);

    if ($sql_run) {
        header("Location: stu_index.php");
    } else {
        echo "Data not added";
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDeldoc'])) {
    $id = $_POST['delete_id'];

    $del = "DELETE FROM records WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        header("Location: stu_docu.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnUpdStudent'])) {
    $stid = $_POST['stid'];
    $explode = explode(',', $_POST['course']);
    $deptid = $explode[0];
    $course = $explode[1];
    $level = $_POST['level'];
    $cnumber = $_POST['cnumber'];
    $gcnumber = $_POST['gcnumber'];
    $department = $_POST['department'];

    $query = "UPDATE `student` SET cnumber='$cnumber',course='$course',gcnumber='$gcnumber', year='$level', department='$department' WHERE `stid` = '$stid'";
    $query_run = mysqli_query($link, $query);
    if ($query_run) {
        $status = "UPDATE `student` SET status='0' WHERE stid='$stid'";
        $status_run = mysqli_query($link, $status);
        header("Location: stu_index.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnBook'])) {
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $dname = $_POST['dname'];
    $date = $_POST['date'];
    $weekday = $_POST['weekday'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];
    $aumail = $_POST['aumail'];
    $email = $_POST['email'];
    $date_string = $date;
    $timestamp = strtotime($date_string);
    $output_date = date("F d, Y", $timestamp);
    $html_body = "<html>
    <head>
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
                <h1>Araullo University Clinic</h1>
            </div>
            <div class='content'>
                <p>Dear <b>$dname</b>,</p>
                <p>A requested appointment from <b>$fname</b> on <b>$weekday</b>, <b>$output_date</b> at <b>$time</b> is waiting for confirmation.</p>
                <p>Reason: $reason.</p>
                <p>Thank you for your attention to this matter.</p>
                <a href='http://localhost/sample/doc_login.php' class='button' style='color: #fff;'>Visit the website</a>
            </div>
        </div>
    </body>
    </html>
";


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Username = 'sacdalernest01@gmail.com';
    $mail->Password = 'trohjrxwgotttpwc';
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom('sacdalernest01@gmail.com', 'Araullo University Clinic');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Appointment Request from $fname for $output_date at $time";
    $mail->Body = "$html_body";
    $mail->send();


    $sql = "INSERT INTO rappoint (stid, fname, dname, date, day, time, reason, aumail) VALUES ('$stid', '$fname','$dname', '$date','$weekday', '$time','$reason','$aumail')";
    $sql_run = mysqli_query($link, $sql);

    if ($sql_run) {
        header("Location: stu_index.php");
    } else {
        mysqli_error($link);
    }
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnChange'])) {
    $stid = $_POST['stid'];
    $old_pass = $_POST['old'];
    $new_pass = $_POST['new'];
    $conf_pass = $_POST['conf'];

    $stmt = mysqli_prepare($link, "SELECT passw FROM student WHERE stid = ?");
    mysqli_stmt_bind_param($stmt, "s", $stid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($old_pass, $row['passw'])) {
        if ($new_pass == $conf_pass) {
            $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($link, "UPDATE student SET passw = ? WHERE stid = ?");
            mysqli_stmt_bind_param($stmt, "ss", $hashed_pass, $stid);
            mysqli_stmt_execute($stmt);
            header('Location: stu_profile.php');
        } else {
            $msg = "New passwords do not match.";
        }
    } else {
        $msg = "Incorrect current password.";
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
































































































<!--if(isset($_GET['file_id']))
{
    $id = $_GET['file_id'];

    $sql = "SELECT * FROM records WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];

    if(file_exists($filepath))
    {
      1  header('Content-Type: application/octet-stream');

        header('Content-Description: File Transfer');

        header('Content-Dispostion: attachment; filename='.basename($filepath));

        header('Expires: 0');

        header('Cache-Control: must-revalidate');
        header('Pragma:public');

        header('Content-Length:'.filesize('uploads/'.$file['name']));

        readfile('uploads/'.$file['name']);  

        exit();
        
    }

} -->

<!-- if (isset($_REQUEST['file_id'])) {
    $file_id = $_REQUEST['file_id'];

    $query = mysqli_query($link, "SELECT * FROM `records` WHERE `id` = '$file_id'") or die("Error");
    $fetch = mysqli_fetch_array($query);
    $filename = $fetch['name'];
    $stud_no = $fetch['stid'];
    header("Content-Disposition: attachment; filename=" . $filename);
    header("Content-Type: application/octet-stream");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Transfer-Encoding: Binary");
    header('Content-Description: File Transfer');
    header("Pragma:public");
    header("Expires: 0");
    readfile("uploads/" . $stid . "/" . $filename);
}-->