<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="stu_index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div class="sidebar-brand-text mx-8">Araullo University School Clinic</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="stu_index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="stu_profile.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - Appointment -->
        <li class="nav-item">
            <a class="nav-link" href="stu_appointment.php">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Appointment List</span></a>
        </li>



        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="stu_announcement.php">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Announcement</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter countt"></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Appointment Bar
                            </h6>
                            <div class="nicee">

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter char"></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Announcement Bar
                            </h6>
                            <div class="ann">

                            </div>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <?php
                    $stid = $_SESSION['stidd'];
                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION['stidd']; ?>
                            </span>
                            <img class="img-profile img-fluid rounded-circle" src="img/<?php echo $row['image'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            <form action="logout.php" method="POST">
                                <button type="submit" name="stu_logoutbtn" class="btn btn-primary">Logout</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/jquery/jquery.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <script>
                $(document).ready(function () {
                    // updating the view with notifications using ajax
                    function load_unseen_notification(view = '') {
                        $.ajax({
                            url: "stuapp_fetch.php",
                            method: "POST",
                            data: { view: view },
                            dataType: "json",
                            success: function (data) {
                                $('.nicee').html(data.notification);
                                if (data.unseen_notification > 0) {
                                    $('.countt').html(data.unseen_notification);
                                }
                            }
                        });
                    }
                    load_unseen_notification();
                    // load new notifications
                    $(document).on('click', '.dropdown-toggle', function () {
                        $('.countt').html('');
                        load_unseen_notification('yes');
                    });
                    setInterval(function () {
                        load_unseen_notification();;
                    }, 1000);
                });

            </script>

            <script>
                $(document).ready(function () {
                    // updating the view with notifications using ajax
                    function load_unseen_annnotification(gg = '') {
                        $.ajax({
                            url: "fetchAnn.php",
                            method: "POST",
                            data: { gg: gg },
                            dataType: "json",
                            success: function (dataa) {
                                $('.ann').html(dataa.notif);
                                if (dataa.unseen_notif > 0) {
                                    $('.char').html(dataa.unseen_notif);
                                }
                            }
                        });
                    }
                    load_unseen_annnotification();
                    // load new notifications
                    $(document).on('click', '.dropdown-toggle', function () {
                        $('.char').html('');
                        load_unseen_annnotification('yes');
                    });
                    setInterval(function () {
                        load_unseen_annnotification();;
                    }, 1000);
                });

            </script>