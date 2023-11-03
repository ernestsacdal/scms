<?php
include('dbc.php');
if (isset($_POST['view'])) {
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
    if ($_POST["view"] != '') {
        $update_query = "UPDATE rlogs SET status = 1 WHERE status=0";
        mysqli_query($link, $update_query);
    }

    $query = "SELECT * FROM rlogs ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($link, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $curenttime = $row['date'];
            $output .= '
  <a class="dropdown-item d-flex align-items-center" href="adm_reqLog.php">
    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/' . $row["image"] . '"alt="...">
                                    </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">'.$row["fullname"].' submitted a request</div>
                                    <div class="small text-gray-500"> ' . $row["stid"] . ' · '.get_time_diff($row['date']).' </div>
                                </div>
                            </a>
  ';
        }
    } else {
        $output .= ' <a class="dropdown-item d-flex align-items-center" href="adm_reqLog.php">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"></div>
                                    </div>
                                </a>';
    }
    $status_query = "SELECT * FROM rlogs WHERE status=0";
    $result_query = mysqli_query($link, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>