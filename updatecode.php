    <?php
session_start();
include('dbc.php');

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['update_id'];
    $sql = "SELECT * FROM inventory WHERE id = $id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldMeds = $row['meds'];
    $oldQuantity = $row['quantity'];
    $oldPrice = $row['price'];

    $meds = $_POST['meds'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $cons = $_POST['cons'];
    $total = $_POST['total'];

    $query = "UPDATE inventory SET meds='$meds', quantity='$quantity', price='$price' WHERE id='$id'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $user = $_POST['user'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime', 'Medicine: $oldMeds (renamed to <b>$meds</b>) Quantity: $oldQuantity units (updated to <b>$quantity</b> units) Unit Price: ₱$oldPrice (updated to <b>₱$price</b>).', '$user')";
        $his_run = mysqli_query($link, $his);
        header("Location: adm_inventory.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnAdd'])) {
    $meds = $_POST['meds'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO inventory (meds, quantity, price) VALUES ('$meds', '$quantity','$price')";
    $sql_run = mysqli_query($link, $sql);

    if ($sql_run) {
        $meds = $_POST['meds'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $user = $_POST['user'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime', 'A new medicine named <b>$meds</b> was added to the inventory. The initial quantity of the medicine added was <b>$quantity</b> units, with a unit price of <b>₱$price</b>.', '$user')";
        $his_run = mysqli_query($link, $his);
        header("Location: adm_inventory.php");
    } else {
        echo '<script> alert("Data not added"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDelete'])) {
    $id = $_POST['delete_id'];
    $meds = $_POST['meds'];
    $user = $_POST['user'];
    date_default_timezone_set('Asia/Manila');
    $currentTime = date("g:i a");
    $del = "DELETE FROM inventory WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime', 'Supply of <b>$meds</b> was deleted from the inventory', '$user')";
        $his_run = mysqli_query($link, $his);
        header("Location: adm_inventory.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnAddqty'])) {
    $meds = $_POST['meds'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE inventory SET quantity=quantity+$quantity WHERE meds='$_POST[meds]'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $meds = $_POST['meds'];
        $quantity = $_POST['quantity'];
        $user = $_POST['user'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime','A quantity of <b>$quantity</b> units of <b>$meds</b> was added to the inventory of medicine.' , '$user')";
        $his_run = mysqli_query($link, $his);

        header("Location: adm_inventory.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
    $stat = "SELECT * FROM inventory WHERE meds = '$meds'";
    $meds = $_POST['meds'];
    $resultb = mysqli_query($link, $stat);
    $statu = mysqli_fetch_assoc($resultb);
    $status = $statu['status'];
    if ($status == 1) {
        $querya = "UPDATE inventory SET status = 0 WHERE meds = '$meds'";
        $resultd = mysqli_query($link, $querya);
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnAdmin'])) {
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $name = $_POST['namee'];
    $mail = $_POST['mail'];
    $contact = $_POST['contact'];
    $passw = $_POST['passw'];
    $cpassw = $_POST['cpassw'];
    $confirm = $_POST['confirm'];

    if ($passw === $cpassw) {
        $stmt = mysqli_prepare($link, "SELECT passw FROM signup WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $pw = $row['passw'];
        if (password_verify($confirm, $pw)) {
            $hashed_pass = password_hash($passw, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($link, "INSERT INTO signup (uname, namee, mail, contact, passw) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssss", $uname, $name, $mail, $contact, $hashed_pass);
            $sql_run = mysqli_stmt_execute($stmt);
            if ($sql_run) {
                header("Location: adm_useradmin.php");
            }
        } else {
            $_SESSION['pw'] = "Invalid admin password.";
            header('Location: adm_useradmin.php');
        }

    } else {
        $_SESSION['adm'] = "The password does not match.";
        header('Location: adm_useradmin.php');
    }
}
// $_SESSION['inv'] = "$meds is out of stock";
//         header('Location:adm_patient.php');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDeleteAdmin'])) {
    $id = $_POST['delete_admin'];

    $del = "DELETE FROM signup WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        header("Location: adm_useradmin.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnLogs'])) {
    $stid = $_POST['stid'];
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    $explode = explode(',', $_POST['meds']);
    $meds = $explode[0];
    $rate = $explode[1];
    $department = $_POST['department'];
    $qty = $_POST['qty'];
    $reason = $_POST['reason'];
    $address = $_POST['address'];
    $con = $_POST['con'];
    $guardian = $_POST['guardian'];
    $gcnumber = $_POST['gcnumber'];
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    $treat = $_POST['treat'];
    $physical = $_POST['physical'];
    $plan = $_POST['plan'];
    //
    $year = date('Y');
    $month = date('m');



    $sql = "SELECT * FROM inventory WHERE meds = '$meds'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $quan = $row['quantity'];


    if ($meds == "None") {
        $none = "INSERT INTO `logs`(stid,fullname,course,meds,qty,rate,reason,department,month,year,address,con,guardian,gcnumber,gender,level,treat,physical,plan) 
                    VALUES('$stid','$fullname','$course','$meds',0,'$rate','$reason','$department','$month','$year','$address','$con','$guardian','$gcnumber','$gender','$level','$treat','$physical','$plan')";
        $resulnone = mysqli_query($link, $none);
        if ($resulnone) {
            $stotal = $rate * $qty;
            $temp = "INSERT INTO temp (meds, cons, stotal, month, year, department) VALUES ('$meds', '$qty', '$stotal', '$month', '$year', '$department')";
            $temp_run = mysqli_query($link, $temp);
            header('Location:adm_patient.php');
        } else {
            die(mysqli_error($link));
        }
    } else if ($qty > $quan) {
        $_SESSION['inv'] = "$meds is out of stock";
        header('Location:adm_patient.php');
    } else {

        $quantity = $row['quantity'] - $qty;
        $cons = $row['cons'] + $qty;
        $total = $row['price'] * $qty;
        $finaltotal = $row['total'] + $total;
        $sql = "UPDATE inventory SET total = '$finaltotal', quantity = '$quantity', cons = '$cons' WHERE meds = '$meds'";
        $resulta = mysqli_query($link, $sql);
        if ($resulta) {
            $stat = "SELECT * FROM inventory WHERE meds = '$meds'";
            $resultb = mysqli_query($link, $stat);
            $statu = mysqli_fetch_assoc($resultb);
            $status = $statu['quantity'];
            if ($status == 0) {
                $query = "UPDATE inventory SET status = 1 WHERE meds = '$meds'";
                $resultd = mysqli_query($link, $query);
                if ($resultd) {
                    $stotal = $rate * $qty;
                    $sql = "INSERT INTO `logs`(stid,fullname,course,meds,qty,rate,reason,department,month,year,stotal,address,con,guardian,gcnumber,gender,level,treat,physical,plan) 
                    VALUES('$stid','$fullname','$course','$meds','$qty','$rate','$reason','$department','$month','$year','$stotal','$address','$con','$guardian','$gcnumber','$gender','$level','$treat','$physical','$plan')";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        $temp = "INSERT INTO temp (meds, cons, stotal, month, year, department) VALUES ('$meds', '$qty', '$stotal', '$month', '$year', '$department')";
                        $temp_run = mysqli_query($link, $temp);
                        header('Location:adm_patient.php');
                    } else {
                        die(mysqli_error($link));
                    }
                }
            } else {
                $stotal = $rate * $qty;
                $sql = "INSERT INTO `logs`(stid,fullname,course,meds,qty,rate,reason,department,month,year,stotal,address,con,guardian,gcnumber,gender,level,treat,physical,plan) 
                VALUES('$stid','$fullname','$course','$meds','$qty','$rate','$reason','$department','$month','$year','$stotal','$address','$con','$guardian','$gcnumber','$gender','$level','$treat','$physical','$plan')";

                $result = mysqli_query($link, $sql);
                if ($result) {
                    $temp = "INSERT INTO temp (meds, cons, stotal, month, year, department) VALUES ('$meds', '$qty', '$stotal', '$month', '$year', '$department')";
                    $temp_run = mysqli_query($link, $temp);
                    header('Location:adm_patient.php');
                } else {
                    die(mysqli_error($link));
                }
            }

        } else {
            die(mysqli_error($link));
        }
    }


}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['accept_idReq'])) {
    //Get Data
    $id = $_GET['accept_idReq'];
    $sql = "SELECT * FROM rlogs WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $stid = $row['stid'];
            $fullname = $row['fullname'];
            $course = $row['course'];
            $meds = $row['meds'];
            $qty = $row['qty'];
            $rate = $row['rate'];
            $department = $row['department'];
            $month = $row['month'];
            $year = $row['year'];
            $stotal = $row['stotal'];
            $address = $row['address'];
            $reason = $row['reason'];
            $con = $row['con'];
            $guardian = $row['guardian'];
            $gcnumber = $row['gcnumber'];
            $gender = $row['gender'];
            $level = $row['level'];
            $treat = $row['treat'];
            $physical = $row['physical'];
            $plan = $row['plan'];

            $sql = "SELECT * FROM inventory WHERE meds = '$meds'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            $quantity = $row['quantity'] - 1;
            $cons = $row['cons'] + 1;
            $total = $row['price'];
            $finaltotal = $row['total'] + $total;
            $quan = $row['quantity'];

            if ($qty > $quan) {
                $_SESSION['reqlog'] = "$meds is out of stock";
                header("Location: adm_reqLog.php");
            } else {
                $sql = "UPDATE inventory SET quantity = '$quantity', cons = '$cons', total = '$finaltotal' WHERE meds = '$meds'";
                $resulta = mysqli_query($link, $sql);
                if ($resulta) {
                    $sql = "SELECT * FROM inventory WHERE meds = '$meds'";
                    $resultb = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($resultb);
                    $status = $row['quantity'];
                    if ($status == 0) {
                        $query = "UPDATE inventory SET status = 1 WHERE meds = '$meds'";
                        $resultd = mysqli_query($link, $query);
                        if ($resultd) {
                            $sql = "INSERT INTO logs (stid, fullname ,course, meds ,qty, rate ,department, month ,year, stotal ,address, reason ,con, guardian ,gcnumber, gender ,level, treat ,physical, plan)
                            VALUES ('$stid', '$fullname', '$course', '$meds', '$qty', '$rate', '$department', '$month', '$year', '$stotal', '$address', '$reason', '$con', '$guardian', '$gcnumber', '$gender', '$level', '$treat', '$physical', '$plan');";
                            if (mysqli_multi_query($link, $sql)) {
                                $temp = "INSERT INTO temp (meds, cons, stotal, month, year, department) VALUES ('$meds', '$qty', '$stotal', '$month', '$year', '$department')";
                                $temp_run = mysqli_query($link, $temp);
                                if ($temp_run) {
                                    $del = "DELETE FROM rlogs WHERE id='$id'";
                                    $del_run = mysqli_query($link, $del);
                                    header("Location: adm_reqLog.php");
                                } else {
                                    echo "Error";
                                }


                            } else {
                                echo "Error";
                            }
                        }
                    } else {
                        $sql = "INSERT INTO logs (stid, fullname ,course, meds ,qty, rate ,department, month ,year, stotal ,address, reason ,con, guardian ,gcnumber, gender ,level, treat ,physical, plan)
                        VALUES ('$stid', '$fullname', '$course', '$meds', '$qty', '$rate', '$department', '$month', '$year', '$stotal', '$address', '$reason', '$con', '$guardian', '$gcnumber', '$gender', '$level', '$treat', '$physical', '$plan');";
                        if (mysqli_multi_query($link, $sql)) {
                            $temp = "INSERT INTO temp (meds, cons, stotal, month, year, department) VALUES ('$meds', '$qty', '$stotal', '$month', '$year', '$department')";
                            $temp_run = mysqli_query($link, $temp);
                            if ($temp_run) {
                                $del = "DELETE FROM rlogs WHERE id='$id'";
                                $del_run = mysqli_query($link, $del);
                                header("Location: adm_reqLog.php");
                            } else {
                                die();
                            }

                        } else {
                            die();
                        }
                    }

                }
            }

        }
    } else {
        die();
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDeleteReq'])) {
    $id = $_POST['delete_idReq'];

    $del = "DELETE FROM rlogs WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        header("Location: adm_reqLog.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnUpdateReq'])) {
    $id = $_POST['update_idReq'];
    $fullname = $_POST['fullname'];
    $date = $_POST['date'];
    $course = $_POST['course'];
    $con = $_POST['con'];
    $meds = $_POST['meds'];
    $reason = $_POST['reason'];

    $query = "UPDATE rlogs SET fullname='$fullname', ccdate='$date', course='$course', con='$con', meds='$meds', reason='$reason' WHERE id='$id'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        header("Location: adm_reqLog.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['status_id'])) {
    $status_id = $_GET['status_id'];
    $status = $_GET['status'];
    $quantity = $_GET['quantity'];
    $user = $_GET['user'];
    $meds = $_GET['meds'];
    date_default_timezone_set('Asia/Manila');
    $currentTime = date("g:i a");

    if ($quantity > 0) {
        $sql = "UPDATE inventory SET status = $status WHERE id= $status_id";
        $sql_run = mysqli_query($link, $sql);
        if ($sql_run) {
            if ($status == 0) {
                $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime', '$meds status is Active', '$user')";
                $his_run = mysqli_query($link, $his);
                header("Location: adm_inventory.php");
            } else {
                $his = "INSERT INTO invhis (time, activity, user) VALUES ('$currentTime', '$meds status is Inactive', '$user')";
                $his_run = mysqli_query($link, $his);
                header("Location: adm_inventory.php");
            }
        }
        header('Location: adm_inventory.php');
    } else {
        $_SESSION['statusinv'] = "No stocks available";
        header('Location: adm_inventory.php');
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['userstatus_id'])) {
    $status_id = $_GET['userstatus_id'];
    $status = $_GET['userstatus'];

    $sql = "UPDATE student SET status = $status WHERE stid= '$status_id'";
    $sql_run = mysqli_query($link, $sql);
    header('Location: adm_userstudent.php');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['searchstid'])) {
    $stid = $_POST['stid'];
    header("Location: adm_patient.php?stid=" . $stid);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['sta_id'])) {
    $status_id = $_GET['sta_id'];
    $status = $_GET['docstatus'];

    $sql = "UPDATE doctor SET status = $status WHERE id= '$status_id'";
    $sql_run = mysqli_query($link, $sql);
    header('Location: adm_doctor.php');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnUpdDoc'])) {
    $id = $_POST['update_id'];
    $doc = $_POST['doc'];
    $spe = $_POST['spe'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $time = date('h:i A', strtotime($_POST['time']));
    $ttime = date('h:i A', strtotime($_POST['ttime']));
    $mail = $_POST['mail'];

    $query = "UPDATE doctor SET sdate='$sdate', edate='$edate', time='$time', ttime='$ttime', email='$mail' WHERE id='$id'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        header("Location: adm_doctor.php");
    } else {
        echo '<script> alert("Data not updated"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnAddDoc'])) {
    $doc = $_POST['doc'];
    $spe = $_POST['spe'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $time = date('h:i A', strtotime($_POST['time']));
    $ttime = date('h:i A', strtotime($_POST['ttime']));
    $mail = $_POST['mail'];

    $sql = "INSERT INTO doctor (dname, spe, sdate, edate, time, ttime, email) VALUES ('$doc', '$spe','$sdate','$edate', '$time','$ttime','$mail')";
    $sql_run = mysqli_query($link, $sql);

    if ($sql_run) {
        header("Location: adm_doctor.php");
    } else {
        echo '<script> alert("Data not added"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDeleteDoc'])) {
    $id = $_POST['delete_id'];
    $del = "DELETE FROM doctor WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        header("Location: adm_doctor.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnDeleteApp'])) {
    $id = $_POST['delete_idApp'];

    $del = "DELETE FROM rappoint WHERE id='$id'";
    $del_run = mysqli_query($link, $del);

    if ($del_run) {
        header("Location: adm_reqApp.php");
    } else {
        echo '<script> alert("Data not deleted"); </script>';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_GET['accept_idApp'])) {


    $id = $_GET['accept_idApp'];
    $sql = "SELECT * FROM rappoint WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stid = $row['stid'];
            $fname = $row['fname'];
            $dname = $row['dname'];
            $date = $row['date'];
            $day = $row['day'];
            $time = $row['time'];
            $reason = $row['reason'];
            $aumail = $row['aumail'];
            $date_string = $date;
            $timestamp = strtotime($date_string);
            $output_date = date("F d, Y", $timestamp);
            $html_body = "
        <html>
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
                    <p>Dear<b> $fname<b/>,</p>
                    <p>Your appointment with <b>$dname</b> on <b>$day</b>, <b>$output_date</b> at <b>$time</b> has been confirmed by the school clinic.</p>
                    <p>Please arrive on time to avoid any delays. If you need to cancel or reschedule your appointment, please let us know as soon as possible.</p>
                    <p>We look forward to seeing you soon!</p>
                    <a href='http://localhost/sample/stu_login.php' class='button' style='color: #fff;'>Visit our website</a>
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
            $mail->addAddress($aumail);
            $mail->isHTML(true);
            $mail->Subject = "Appointment Approved: $output_date at $time with $dname";
            $mail->Body = "$html_body";
            $mail->send();


            $app = "INSERT INTO appointment (stid, fname ,dname, date ,day, time ,reason, statusA)
                            VALUES ('$stid', '$fname', '$dname', '$date', '$day', '$time', '$reason', 0);";
            if (mysqli_multi_query($link, $app)) {
                $getid = "SELECT * FROM appointment ORDER BY id DESC LIMIT 1";
                $res_getid = mysqli_query($link, $getid);
                $unit = mysqli_fetch_assoc($res_getid);
                $unit_id = $unit['id'];
                $temp = "INSERT INTO tempapp (no) VALUES ('$unit_id');";
                $temp_run = mysqli_query($link, $temp);
                if ($temp_run) {
                    $del = "DELETE FROM rappoint WHERE id='$id'";
                    $del_run = mysqli_query($link, $del);
                    header("Location: adm_reqApp.php");
                } else {
                    echo "Error";
                }


            } else {
                echo "Error";
            }
        }
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['appstatus_id'])) {
    $status_id = $_GET['appstatus_id'];
    $status = $_GET['appstatus'];

    $sql = "UPDATE appointment SET statusB = '$status' WHERE id= '$status_id'";
    $sql_run = mysqli_query($link, $sql);
    if ($sql_run) {
        $tempapp = "UPDATE tempapp set status = '$status' WHERE no = '$status_id' ";
        $tempapp_run = mysqli_query($link, $tempapp);
        header('Location: adm_appointment.php');
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['resched_idApp'])) {
    $id = $_GET['resched_idApp'];
    $sql = "SELECT * FROM rappoint WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stid = $row['stid'];
            $fname = $row['fname'];
            $dname = $row['dname'];
            $date = $row['date'];
            $day = $row['day'];
            $time = $row['time'];
            $aumail = $row['aumail'];
            $reason = $row['reason'];
            $date_string = $date;
            $timestamp = strtotime($date_string);
            $output_date = date("F d, Y", $timestamp);
            $html_body = "
        <html>
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
                    background-color: #ff9400;
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
                    <p>Dear <b>$fname</b>,</p>
                    <p>Your appointment with <b>$dname</b> on <b>$day</b>, <b>$output_date</b> at <b>$time</b> has been declined by the school clinic due to an unavailable timeslot or date.</p>
                    <p>We apologize for any inconvenience this may have caused. Please visit our website to choose another set of schedule and wait for the school clinic's confirmation.</p>
                    <p>Thank you for your understanding.</p>
                    <a href='http://localhost/sample/stu_login.php' class='button' style='color: #fff;'>Visit our website</a>
                </div>
            </div>
        </body>
        </html>
    ";

            $maill = new PHPMailer();
            $maill->isSMTP();
            $maill->Host = "smtp.gmail.com";
            $maill->Username = 'sacdalernest01@gmail.com';
            $maill->Password = 'trohjrxwgotttpwc';
            $maill->SMTPAuth = "true";
            $maill->SMTPSecure = "ssl";
            $maill->Port = 465;

            $maill->setFrom('sacdalernest01@gmail.com', 'Araullo University Clinic');
            $maill->addAddress($aumail);
            $maill->isHTML(true);
            $maill->Subject = "Sorry, We Need to Reschedule Your Appointment with $dname";
            $maill->Body = "$html_body";
            $maill->send();

            $app = "INSERT INTO appointment (stid, fname ,dname, date ,day, time ,reason, statusA)
                            VALUES ('$stid', '$fname', '$dname', '$date', '$day', '$time', '$reason', 1);";
            if (mysqli_multi_query($link, $app)) {
                $del = "DELETE FROM rappoint WHERE id='$id'";
                $del_run = mysqli_query($link, $del);
                header("Location: adm_reqApp.php");
            } else {
                echo "Error";
            }
        }
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnTerm'])) {
    $id = $_POST['user'];
    $pass = $_POST['pass'];
    $term = $_POST['term'];

    $sql = "SELECT SUM(stotal) as cost FROM temp";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $cost = $row['cost'];

    $con = "SELECT SUM(cons) as quan FROM temp";
    $result = mysqli_query($link, $con);
    $row = mysqli_fetch_assoc($result);
    $quan = $row['quan'];

    $count = "SELECT id FROM temp";
    $result = mysqli_query($link, $count);
    $num = mysqli_num_rows($result);

    $app = "SELECT id FROM tempapp WHERE status = 1";
    $result = mysqli_query($link, $app);
    $fetch = mysqli_num_rows($result);

    $admin = "SELECT * FROM signup WHERE id = '$id'";
    $result = mysqli_query($link, $admin);
    $row = mysqli_fetch_assoc($result);
    $passw = $row['passw'];

    if ($passw === $pass) {
        if (isset($_POST['check'])) {
            $ins = "INSERT INTO term (term, cost ,cons, logs ,app) VALUES ('$term', '$cost', '$quan', '$num', '$fetch')";
            $result = mysqli_query($link, $ins);
            if ($result) {
                $status = "UPDATE student SET status = 1";
                $res = mysqli_query($link, $status);
                if ($res) {
                    $del = "DELETE FROM temp";
                    $del_res = mysqli_query($link, $del);
                    if ($del_res) {
                        $del = "DELETE FROM tempapp";
                        $del_app = mysqli_query($link, $del);
                        if ($del_app) {
                            $reset = "UPDATE inventory SET cons = 0, total = 0";
                            $res_reset = mysqli_query($link, $reset);
                            header("Location: adm_term.php");
                        }

                    }
                }
            }
        } else {
            $ins = "INSERT INTO term (term, cost ,cons, logs ,app) VALUES ('$term', '$cost', '$quan', '$num', '$fetch')";
            $result = mysqli_query($link, $ins);
            if ($result) {
                $del = "DELETE FROM temp";
                $del_res = mysqli_query($link, $del);
                if ($del_res) {
                    $del = "DELETE FROM tempapp";
                    $del_app = mysqli_query($link, $del);
                    if ($del_app) {
                        $reset = "UPDATE inventory SET cons = 0, total = 0";
                        $res_reset = mysqli_query($link, $reset);
                        header("Location: adm_term.php");
                    }
                }

            }
        }
    } else {
        $_SESSION['term'] = "Wrong Password Input";
        header("Location: adm_term.php");
    }


}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnAnn'])) {
    $ann = $_POST['ann'];

    $sql = "INSERT INTO announcement (ann) VALUES ('$ann')";
    $result = mysqli_query($link, $sql);
    if ($result) {
        $notif = "UPDATE student SET notif = 0";
        $res = mysqli_query($link, $notif);
        header("Location: adm_announce.php");
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnRem'])) {
    $rem = $_POST['rem'];

    $sql = "UPDATE reminders SET rem='$rem' ";
    $result = mysqli_query($link, $sql);
    header("Location: adm_reminders.php");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['btnUpdateeee'])) {
    $passw = $_POST['passw'];
    $hashed_password = password_hash($passw, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($link, "UPDATE signup SET passw=?");
    mysqli_stmt_bind_param($stmt, 's', $hashed_password);
    mysqli_stmt_execute($stmt);
    header("Location: adm_index.php");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>