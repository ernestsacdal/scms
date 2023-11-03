<?php
session_start();
include('dbc.php');
if (!isset($_SESSION['unamee']))
{
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
    include 'scms_nav.php';
    ?>

    <!------------------------------>

    <!-- Begin Page Content -->
    <?php
if(isset($_SESSION['statusinv']) && $_SESSION['statusinv']!='')
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>'.$_SESSION['statusinv'].'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['statusinv']);
}
  ?>
<!-- Modal for ADD -->
<div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Doctor Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatecode.php" method="POST">
      <div class="modal-body">
      <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
      <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Doctor Name </label>
            <input type="text" name="doc" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Specialization </label>
            <input type="text" name="spe" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Email </label>
            <input type="email" name="mail" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label for="date" class="form-label">Start date:</label>
            <input type="date" name="sdate" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label">End Date:</label>
            <input type="date" name="edate" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Start Time </label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> End Time </label>
            <input type="time" name="ttime" class="form-control"required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnAddDoc" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal for UPDATE-->
<div class="modal fade" id="editmodaldoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="updatecode.php">
      <div class="modal-body">
      <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
        <input type="hidden" name="update_id" id="update_id">
        <div class="form-group col-md-12 mx-auto">
            <label for="date" class="form-label">Email:</label>
            <input type="text"  name="mail" id="mail" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label for="date" class="form-label">Start date:</label>
            <input type="date"  name="sdate" id="sdate" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label">End Date: </label>
            <input type="date" name="edate" id="edate" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Start Time </label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> End Time </label>
            <input type="time" name="ttime" id="ttime" class="form-control"required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnUpdDoc" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Modal for Delete -->
<div class="modal fade" id="delmodaldoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
        <input type="hidden" name="delete_id" id="del_id">



      <h6>Do you really want to delete this data?</h6>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnDeleteDoc" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Doctors</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addDoc">
<span class="icon text-white-50">
<i class="fas fa-stethoscope"></i>
</span>
<span class="text">Add Doctor</span>
</button></h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>   
                                <th style="width:8%">Doctor ID</th>
                                <th>Doctor Name</th>
                                <th>Specialization</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th style="display:none"></th>
                                
                                <th style="width:18%">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `doctor`";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0){
                                foreach ($result as $row => $unit) 
                                {
                                  $date_string = $unit['sdate'];
                                    $timestamp = strtotime($date_string);
                                    $output_date = date("F d, Y", $timestamp);

                                    $date_stringg = $unit['edate'];
                                    $timestampp = strtotime($date_stringg);
                                    $output_datee = date("F d, Y", $timestampp);
                                    ?>
                                    <tr>
                                        <td><?= $unit['id']; ?></td>
                                        <td><?= 'Dr. ',$unit['dname']; ?></td>
                                        <td><?= $unit['spe']; ?></td>
                                        <td><?= $output_date ?></td>
                                        <td><?= $output_datee; ?></td>
                                        <td><?= $unit['time']; ?></td>
                                        <td><?= $unit['ttime']; ?></td>
                                        <td style="display:none"><?= $unit['email']; ?></td>
                                        <td>
                                        <?php 
                                        if($unit['status']== 0)
                                        {
                                          echo '<a href="updatecode.php?sta_id='.$unit['id'].'&docstatus=1" class="badge badge-success">Active</a>';
                                        }
                                        else
                                        {
                                          echo '<a href="updatecode.php?sta_id='.$unit['id'].'&docstatus=0" class="badge badge-danger">Inactive</a>';
                                        }
                                        ?>
                                        </td>
                                        <td><button type="button" class="btn btn-dark btn-icon-split editbtn"> 
                                        <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Update</span>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-icon-split delBtn"> 
                                        <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                        </button>
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
    
    <!-- Edit Modal -->
    <script>
        $(document).ready(function() 
        {
            $('.editbtn').on('click', function()
            {
                $('#editmodaldoc').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#doc').val(data[1]);
                    $('#spe').val(data[2]);
                    $('#sdate').val(data[3]);
                    $('#edate').val(data[4]);
                    $('#time').val(data[5]);
                    $('#ttime').val(data[6]);
                    $('#mail').val(data[7]);

            });
        });
    </script>

     <!-- Delete Modal -->
     <script>
        $(document).ready(function() 
        {
            $('.delBtn').on('click', function()
            {
                $('#delmodaldoc').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#del_id').val(data[0]);
            });
        });
    </script>

<!-- <script>
  var dateInput = document.getElementById("date");
  var weekdayOutput = document.getElementById("weekday");

  // Update weekday display whenever the date input changes
  dateInput.addEventListener("change", function() {
    var selectedDate = new Date(this.value);
    var weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var weekday = weekdays[selectedDate.getDay()];
    weekdayOutput.value = weekday;
  });

  // Initialize weekday display on page load
  var initialDate = new Date(dateInput.value);
  var initialWeekday = weekdays[initialDate.getDay()];
  weekdayOutput.value = initialWeekday;
</script>


<script>
  var dateInput = document.getElementById("datetwo");
  var weekdayOutput = document.getElementById("weekdaytwo");

  // Update weekday display whenever the date input changes
  dateInput.addEventListener("change", function() {
    var selectedDate = new Date(this.value);
    var weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var weekday = weekdays[selectedDate.getDay()];
    weekdayOutput.value = weekday;
  });

  // Initialize weekday display on page load
  var initialDate = new Date(dateInput.value);
  var initialWeekday = weekdays[initialDate.getDay()];
  weekdayOutput.value = initialWeekday;
</script> -->



</body>

</html>