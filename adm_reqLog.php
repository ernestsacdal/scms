<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee'])) {
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
if(isset($_SESSION['reqlog']) && $_SESSION['reqlog']!='')
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>'.$_SESSION['reqlog'].'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['reqlog']);
}
  ?>

    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!------------------------------>

    <!-- Begin Page Content -->

    <!-- Modal for Delete -->
    <div class="modal fade" id="deletemodalreq" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <input type="hidden" name="delete_idReq" id="delete_idReq">
                        <h6>Do you really want to delete this data?</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnDeleteReq" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal for UPDATE-->
    <div class="modal fade" id="editmodalreq" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="updatecode.php">
                    <div class="modal-body">

                        <input type="hidden" name="update_idReq" id="update_idReq">
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Full Name </label>
                            <input type="text" name="fullname" id="fullname" class="form-control" >
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Date </label>
                            <input type="text" name="date" id="date" class="form-control">
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Course </label>
                            <input type="text" name="course" id="course" class="form-control">
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Contact No </label>
                            <input type="text" name="con" id="con" class="form-control">
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Medicine </label>
                            <select name="meds" id="meds" class="form-control" required>
                            <option disabled selected hidden>Medicine</option>
                            <?php
                            $sql = "SELECT * FROM `inventory` WHERE status = 0";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option  value="<?php echo $row['meds']; ?>">
                            <?php echo $row['meds']; ?>
                            </option>
            <?php } ?>
            </select>
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label class="form-label"> Chief Complaint </label>
                            <input type="text" name="reason" id="reason" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnUpdateReq" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Medicine Request</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Request List</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th style="width:10%">Student ID</th>
                                <th style="width:15%">Full Name</th>
                                <th style="width:8%">Date</th>
                                <th style="width:7%">Course</th>
                                <th style="width:10%">Contact No</th>
                                <th style="width:10%">Medicine</th>
                                <th>Chief Complaint</th>
                                <th style="width:11%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `rlogs` ORDER BY id DESC";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row => $unit) {
                                    $date_string = $unit['ccdate'];
                                    $timestamp = strtotime($date_string);
                                    $output_date = date("F d, Y", $timestamp);
                                    ?>
                                    <tr>
                                        <td style="display:none;"><?= $unit['id']; ?></td>
                                        <td><?= $unit['stid']; ?></td>
                                        <td><?= $unit['fullname'];?></td>
                                        <td><?= $unit['ccdate']; ?></td>
                                        <td><?= $unit['course']; ?></td>
                                        <td><?= $unit['con']; ?></td>
                                        <td><?= $unit['meds']; ?></td>  
                                        <td><?= $unit['reason']; ?></td>
                                        <td><a href="updatecode.php?accept_idReq=<?= $unit['id'] ?>"class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>
                                            <button class="btn btn-info btn-circle editreqBtn"><i
                                                    class="fas fa-pen"></i></button>
                                            <button class="btn btn-danger btn-circle delreqBtn"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
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
            $('.delreqBtn').on('click', function () {
                $('#deletemodalreq').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_idReq').val(data[0]);
            });
        });
    </script>

    <!-- Edit Modal -->
    <script>
        $(document).ready(function () {
            $('.editreqBtn').on('click', function () {
                $('#editmodalreq').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_idReq').val(data[0]);
                $('#stid').val(data[1]);
                $('#fullname').val(data[2]);
                $('#date').val(data[3]);
                $('#course').val(data[4]);
                $('#con').val(data[5]);
                $('#meds').val(data[6]);
                $('#reason').val(data[7]);


            });
        });
    </script>

</body>

</html>