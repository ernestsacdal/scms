<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adm_index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div class="sidebar-brand-text mx-8">Araullo University School Clinic</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="adm_index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-duotone fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="adm_userstudent.php">Students</a>
                    <a class="collapse-item" href="adm_useradmin.php">Admin</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Doctor and Patients Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatients"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-notes-medical"></i>
                <span>Patient</span>
            </a>
            <div id="collapsePatients" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="adm_patient.php">Add Patients</a>
                    <a class="collapse-item" href="adm_reqLog.php">Medicine Request</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Request Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReq"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Appointment</span>
            </a>
            <div id="collapseReq" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="adm_doctor.php">Doctor Schedule</a>
                    <a class="collapse-item" href="adm_reqApp.php">Appointment Request</a>
                    <a class="collapse-item" href="adm_appointment.php">Appointment Records</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-suitcase-medical"></i>
                <span>Inventory</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="adm_inventory.php">Stocks</a>
                    <a class="collapse-item" href="adm_invmc.php">Reports</a>
                    <a class="collapse-item" href="adm_invhis.php">History</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBulletin"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Bulletin</span>
            </a>
            <div id="collapseBulletin" class="collapse" aria-labelledby="headingBulletin"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="adm_announce.php">Announcements</a>
                    <a class="collapse-item" href="adm_reminders.php">Hotlines</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="adm_term.php">
                <i class="fas fa-fw fa-gear"></i>
                <span>Term</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="adm_charts.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Analytics Charts</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="adm_logs.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Clinic Records</span></a>
        </li>

        <!-- Nav Item - Charts -->

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

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li> -->
                    <!--Notifbar-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter counttt"></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Appointment Center
                            </h6>
                            <div class="niceee">

                            </div>
                        </div>
                    </li>
                    <!--Notifbar-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter count"></span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Request Center
                            </h6>

                            <div class="nice">
                                <!-- STUDENT REQ LOGS BAR -->
                            </div>
                        </div>
                    </li>
                    <!--Notifbar-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION['unamee']; ?>
                            </span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                                <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            ?>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/jquery/jquery.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                                


            <script>
                $(document).ready(function () {
                    // var audio = new Audio('audio/audio.mp3');
                    // updating the view with notifications using ajax
                    function load_unseen_notification(view = '') {
                        $.ajax({
                            url: "fetch.php",
                            method: "POST",
                            data: { view: view },
                            dataType: "json",
                            success: function (data) {
                                $('.nice').html(data.notification);
                                if (data.unseen_notification > 0) {
                                    $('.count').html(data.unseen_notification);
                                    // audio.play();
                                }
                            }
                        });
                    }
                    load_unseen_notification();
                    // load new notifications
                    $(document).on('click', '.dropdown-toggle', function () {
                        $('.count').html('');
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
                    function load_unseen_appnotification(gg = '') {
                        $.ajax({
                            url: "admapp_fetch.php",
                            method: "POST",
                            data: { gg: gg },
                            dataType: "json",
                            success: function (dataa) {
                                $('.niceee').html(dataa.notif);
                                if (dataa.unseen_notif > 0) {
                                    $('.counttt').html(dataa.unseen_notif);
                                }
                            }
                        });
                    }
                    load_unseen_appnotification();
                    // load new notifications
                    $(document).on('click', '.dropdown-toggle', function () {
                        $('.counttt').html('');
                        load_unseen_appnotification('yes');
                    });
                    setInterval(function () {
                        load_unseen_appnotification();;
                    }, 1000);
                });

            </script>