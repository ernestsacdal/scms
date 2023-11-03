<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:adm_login.php");
    die();
}
if (!isset($_SESSION['idd'])) {
    header("Location:adm_login.php");
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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    if (isset($_SESSION['adm']) && $_SESSION['adm'] != '') {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['adm'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        unset($_SESSION['adm']);
    }
    if (isset($_SESSION['pw']) && $_SESSION['pw'] != '') {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['pw'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        unset($_SESSION['pw']);
    }
    ?>


    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Admin Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">
                    <div class="modal-body">
                        <input name="id" value="<?php echo $_SESSION['idd'] ?> " hidden>
                        <div class="form-group col-md-12">
                            <input type="text" name="uname" id="" class="form-control" required autocomplete="off"
                                placeholder="Enter Username" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="namee" id="" class="form-control" required autocomplete="off"
                                placeholder="Fullname" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="mail" id="" class="form-control" required autocomplete="off"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="contact" id="" class="form-control" required autocomplete="off"
                                placeholder="Contact Number">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" name="passw" id="" class="form-control" required autocomplete="off"
                                placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" name="cpassw" id="" class="form-control" required autocomplete="off"
                                placeholder="Confirm Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <hr>
                        <div class="form-group col-md-12">
                            <label class="form-label"> Enter your password to proceed </label>
                            <input type="password" name="confirm" id="" class="form-control" required autocomplete="off"
                                placeholder="Admin Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnAdmin" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Password Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert-message"></div>
                    <form method="POST" action="fetchChangeadm.php" id="password-form">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['idd']; ?>">
                        <div class="col-md-12 mx-auto">
                            <label for="old_pass">Current Password:</label>
                            <input type="password" name="old" id="old_pass" class="form-control" required>
                        </div>
                        <hr>
                        <div class="col-md-12 mx-auto">
                            <label for="new_pass">New Password:</label>
                            <input type="password" name="new" id="new_pass" class="form-control"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <label for="conf_pass">Confirm New Password:</label>
                            <input type="password" name="conf" id="conf_pass" class="form-control"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnChange" id="btnSubmit">Save changes</button>

                    <script>
                        $(document).ready(function () {
                            // Send an AJAX request when the form is submitted
                            $('#password-form').submit(function (event) {
                                event.preventDefault();
                                $.ajax({
                                    type: 'POST',
                                    url: 'fetchChangeadm.php',
                                    data: $(this).serialize(),
                                    success: function (response) {
                                        // If the password change is successful, show a success message and hide the form
                                        if (response == 'success') {
                                            $('#alert-message').html('<div class="alert alert-success" role="alert">Password changed successfully.</div>').show();
                                            $('#password-form').hide();
                                        } else {
                                            // If there's an error, show the error message
                                            $('#alert-message').html('<div class="alert alert-danger" role="alert">' + response + '</div>').show();
                                        }
                                    }
                                });
                            });
                        });
                    </script>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Delete -->
    <div class="modal fade" id="deletemodaladmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_admin" id="delete_admin">
                        <h6>Do you really want to delete this data?</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnDeleteAdmin" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admins</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal"
                        data-target="#addAdmin">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-secret"></i>
                        </span>
                        <span class="text">Add Admin</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-icon-split" data-toggle="modal"
                        data-target="#pass">
                        <span class="icon text-white-50">
                            <i class="fas fa-key"></i>
                        </span>
                        <span class="text">Change Password</span>
                    </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="display:none;">ID</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Date Added</th>
                                <th style="width:10%">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `signup` WHERE id > 1 ORDER BY id ASC";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    $date_string = $unit['added'];
                                    $timestamp = strtotime($date_string);
                                    $output_date = date("F d, Y", $timestamp);
                                    echo '<tr>';
                                    echo '<td align= center>' . ($row + 1) . '</td>';
                                    echo '<td style="display:none;" align= center>' . $unit['id'] . '</td>';
                                    echo '<td align= center>' . $unit['uname'] . '</td>';
                                    echo '<td align= center>' . $unit['namee'] . '</td>';
                                    echo '<td align= center>' . $unit['mail'] . '</td>';
                                    echo '<td align= center>' . $unit['contact'] . '</td>';
                                    echo '<td align= center>' . $output_date . '</td>';
                                    echo '<td>
                                    <button class="btn btn-danger btn-icon-split deletebtnAdmin">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                    </button>
                                    </td>';
                                    echo '</tr>';
                                }

                                ?>

                                <?php


                            } else {
                                echo "No Record Found";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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

    <!-- Delete Modal -->
    <script>
        $(document).ready(function () {
            $('.deletebtnAdmin').on('click', function () {
                $('#deletemodaladmin').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_admin').val(data[1]);
            });
        });
    </script>

</body>

</html>