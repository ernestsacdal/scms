<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
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
        td {
            text-align: center;
        }

        th {
            text-align: center;
        }
    </style>

</head>

<body id="page-top">

    <!--SCMS Nav-->
    <?php
    include 'stu_scmsnav.php';
    ?>

    <!---->





    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Announcements</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM `announcement` ORDER BY id DESC LIMIT 3";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row => $unit) {
                                $date = $unit['date'];
                                $id = $unit['id'];
                                $ann = $unit['ann'];
                                $date_string = $date;
                                $timestamp = strtotime($date_string);
                                $output_date = date("F d, Y", $timestamp);
                                ?>
                                <div
                                    style=" padding: 5px; width: 100%; height: 400px; max-height: 5000px; overflow-y: auto; margin-bottom: 20px; position: relative;">
                                    <span style="position: absolute; top: 0; right: 0; color: #858796;">
                                        <?php echo $output_date; ?>
                                    </span>
                                    <div style="padding-top: 20px; color: black;">
                                        <?php echo $ann; ?>
                                    </div>
                                </div>
                                <!-- <div style="border: 1px solid #ccc; padding: 5px; width: 100%; height: 400px; max-height: 5000px; overflow-y: auto; margin-bottom: 20px;"
                                    contenteditable="true">
                                    < echo $ann; ?>
                                </div> -->
                                <hr>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>



            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Hotlines</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM `reminders` ORDER BY id DESC LIMIT 3";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row => $unit) {
                                $id = $unit['id'];
                                $rem = $unit['rem'];
                                ?>
                                <div
                                    style=" padding: 5px; width: 100%; height: 400px; max-height: 5000px; overflow-y: auto; margin-bottom: 20px; position: relative;" contenteditable="false">
                                    <div style="padding-top: 20px;">
                                        <?php echo $rem; ?>
                                    </div>
                                </div>
                                <!-- <div style="border: 1px solid #ccc; padding: 5px; width: 100%; height: 400px; max-height: 5000px; overflow-y: auto; margin-bottom: 20px;"
                                    contenteditable="true">
                                    < echo $ann; ?>
                                </div> -->
                                <hr>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
    include('footer.php');
    ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>