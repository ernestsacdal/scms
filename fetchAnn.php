<?php
session_start();
include('dbc.php');
if (isset($_POST['gg'])) {
    function get_time_diff($date)
    {
        date_default_timezone_set('Asia/Manila');

        $time_ago = strtotime($date);
        $current = time();

        $dif_time_stamp = $current - $time_ago;
        $seconds = $dif_time_stamp;
        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);
        $weeks = round($seconds / 604800);
        $months = round($seconds / 2629440);
        $years = round($seconds / 31553280);
        if ($seconds <= 60) {
            return 'just now';
        } elseif ($minutes <= 60) {
            if ($minutes == 1) {
                return 'a minute ago';
            } else {
                return $minutes . ' minutes ago';
            }

        } elseif ($hours <= 24) {
            if ($hours == 1) {
                return 'an hour ago';
            } else {
                return $hours . ' hours ago';
            }

        } elseif ($days <= 7) {
            if ($days == 1) {
                return 'yesterday';
            } else {
                return $days . ' days ago';
            }

        } elseif ($days <= 7) {
            if ($days == 1) {
                return 'yesterday';
            } else {
                return $days . ' days ago';
            }

        } elseif ($weeks <= 4.3) {
            if ($weeks == 1) {
                return 'a week ago';
            } else {
                return $weeks . ' weeks ago';
            }

        } elseif ($weeks <= 4.3) {
            if ($weeks == 1) {
                return 'a week ago';
            } else {
                return $weeks . ' weeks ago';
            }

        } elseif ($months <= 12) {
            if ($months == 1) {
                return 'a month ago';
            } else {
                return $months . ' months ago';
            }

        } else {
            if ($years == 1) {
                return 'a year ago';
            } else {
                return $years . ' years ago';
            }
        }
    }
    $stid = $_SESSION['stidd'];
    if ($_POST["gg"] != '') {
        $update_query = "UPDATE student SET notif = 1 WHERE notif=0 && stid='$stid'";
        mysqli_query($link, $update_query);
    }
    $query = "SELECT * FROM announcement ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($link, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $date_string = $row['date'];
            $timestamp = strtotime($date_string);
            $output_date = date("F d, Y", $timestamp);
            $output .= '
                <a class="dropdown-item d-flex align-items-center" href="stu_announcement.php">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-bullhorn text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">' . $output_date . ' . ' . get_time_diff($row['date']) . '</div>
                    <span class="font-weight-bold">New announcement! Please read.</span>
                </div>
            </a>
      ';

        }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
    }
    $stid = $_SESSION['stidd'];
    $status_query = "SELECT * FROM student WHERE notif=0 && stid='$stid'";
    $result_query = mysqli_query($link, $status_query);
    $count = mysqli_num_rows($result_query);
    $dataa = array(
        'notif' => $output,
        'unseen_notif' => $count
    );
    echo json_encode($dataa);
}
?>