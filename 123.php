<?php
session_start();
include('dbc.php');

$max_attempts = 5; // Maximum number of attempts allowed
$lockout_time = 60; // Lockout time in seconds

if(isset($_SESSION['last_attempt_time'])) {
    $time_since_last_attempt = time() - $_SESSION['last_attempt_time'];
    if($time_since_last_attempt < $lockout_time) {
        // User is locked out
        $time_left = $lockout_time - $time_since_last_attempt;
        $msg = "You have exceeded the maximum number of login attempts. Please try again in $time_left seconds.";
    }
    else {
        // User can attempt login again
        $_SESSION['login_attempts'] = 0;
    }
}
else {
    $_SESSION['login_attempts'] = 0;
}

if(isset($_POST['admbtn_login'])) {
    if($_SESSION['login_attempts'] < $max_attempts) {
        $uname_login = mysqli_real_escape_string($link,$_POST['uname']);
        $passw_login = password_hash($_POST['passw'], PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($link, "SELECT * FROM signup WHERE uname=?");
        mysqli_stmt_bind_param($stmt, 's', $uname_login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if(password_verify($_POST['passw'], $row['passw'])) {
            $_SESSION['unamee'] = $row['uname'];
            $_SESSION['idd'] = $row['id'];
            header('Location: adm_index.php');
        }
        else {
            $msg = "Invalid username or password. Please try again.";
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
        }
    }
    else {
        // User has exceeded maximum number of attempts
        $_SESSION['last_attempt_time'] = time();
        $msg = "You have exceeded the maximum number of login attempts. Please try again in $lockout_time seconds.";
    }
}
?>


<?php
session_start();
include('dbc.php');
$msg = '';
$msg1 = '';
$max_attempts = 5; // Maximum number of attempts allowed
$lockout_time = 60; // Lockout time in seconds

if(isset($_SESSION['last_attempt_time'])) {
    $time_since_last_attempt = time() - $_SESSION['last_attempt_time'];
    if($time_since_last_attempt < $lockout_time) {
        // User is locked out
        $time_left = $lockout_time - $time_since_last_attempt;
        $msg1 = "You have exceeded the maximum number of login attempts. Please try again in $time_left seconds.";
    }
    else {
        // User can attempt login again
        $_SESSION['login_attempts'] = 0;
    }
}
else {
    $_SESSION['login_attempts'] = 0;
}

if(isset($_POST['admbtn_login'])) {
    if($_SESSION['login_attempts'] < $max_attempts) {
        $uname_login = mysqli_real_escape_string($link,$_POST['uname']);
        $stmt = mysqli_prepare($link, "SELECT * FROM signup WHERE uname=?");
        mysqli_stmt_bind_param($stmt, 's', $uname_login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if($row) {
            if(password_verify($_POST['passw'], $row['passw'])) {
                $_SESSION['unamee'] = $row['uname'];
                $_SESSION['idd'] = $row['id'];
                header('Location: adm_index.php');
            }
            else {
                $msg = "Invalid username or password. Please try again.";
                $_SESSION['login_attempts']++;
                if($_SESSION['login_attempts'] >= $max_attempts) {
                    $_SESSION['last_attempt_time'] = time();
                    $msg1 = "You have exceeded the maximum number of login attempts. Please try again in $lockout_time seconds.";
                }
            }
        }
        else {
            $msg = "Invalid username or password. Please try again.";
        }
    }
    else {
        // User has exceeded maximum number of attempts
        $_SESSION['last_attempt_time'] = time();
        $msg1 = "You have exceeded the maximum number of login attempts. Please try again in $lockout_time seconds.";
    }
}
?>

<form class="user" method="POST">
    <div class="form-group">
        <input type="text" class="form-control form-control-user"
            id="exampleInputEmail" name="uname"
            placeholder="Enter Username...">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password" name="passw">
    </div>
    <button name="admbtn_login" class="btn btn-primary btn-user btn-block">Login</button>
    <hr>
    <a href="stu_register.php" class="btn btn-google btn-user btn-block">
        <i class="fas fa-user-plus fa-fw"></i> Student Registration
    </a>
</form>
<p><?php echo $msg; ?></p>
<p><?php echo $msg1; ?></p>