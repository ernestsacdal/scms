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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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


    <!-- Modal for Delete -->
    <div class="modal fade" id="deletemodaldoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="stu_updatecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h6>Do you really want to delete this data?</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnDeldoc" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal for upload -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="stu_updatecode.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="stid" value="<?php echo $_SESSION['stidd']; ?>">
                        <div class="form-group col-md-10 mx-auto">
                            <label class="form-label"> Type of Document </label>
                            <input type="text" name="type" class="form-control" required>
                        </div>
                        <div class="form-group col-md-10 mx-auto">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control" type="file" name="myfile" required>
                            <div class="small font-italic text-muted mb-4 mx-auto">File no larger than 5 MB</div>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnSave">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--SCMS Nav-->
    <?php
    include 'stu_scmsnav.php';
    ?>

    <!---->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="stu_profile.php">Profile</a>
            <a class="nav-link" href="stu_records.php">Records</a>
            <a class="nav-link" href="stu_docu.php">Documents</a>
        </nav>
        <hr class="mt-0 mb-4" />

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><button type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#exampleModalCenter">
                        Upload Files
                    </button></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Document ID</th>
                                <th>Type of Document</th>
                                <th>File</th>
                                <th>Size(KB)</th>
                                <th>Date Added</th>
                                <th>Download</th>
                                <th style="width:12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stid = $_SESSION['stidd'];
                            $sql = "SELECT * FROM records WHERE stid = '$stid'";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    $date_string = $unit['added'];
                                    $timestamp = strtotime($date_string);
                                    $output_date = date("F d, Y", $timestamp);
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $unit['id']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['type']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['name']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['size'] / 1000 . "KB"; ?>
                                        </td>
                                        <td>
                                            <?= $output_date; ?>
                                        </td>
                                        <td>
                                            <?= $unit['download']; ?>
                                        </td>
                                        <td><button type="button" class="btn btn-danger btn-icon-split deletebtn">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </button>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "";
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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
            $('.deletebtn').on('click', function () {
                $('#deletemodaldoc').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            });
        });
    </script>

</body>

</html>