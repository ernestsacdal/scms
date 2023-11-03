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
    
<!-- Modal for ADD -->
<div class="modal fade" id="addMeds" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Medicine Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatecode.php" method="POST">
      <div class="modal-body">
      <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
      <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Product </label>
            <input type="text" name="meds" id="" class="form-control" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Unit Quantity </label>
            <input type="number" name="quantity" id="" class="form-control" min="1" required>
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Unit Price(PHP) </label>
            <input type="number" name="price" id="" class="form-control" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnAdd" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal for ADD QUANTITY-->
<div class="modal fade" id="addMedsqty" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Quantity Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatecode.php" method="POST">
      <div class="modal-body">
          
      <div class="form-group col-md-12 mx-auto">
          <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
            <label class="form-label"> Product </label>
            <select name="meds" id="" class="form-control" required>
            <option value="">Medicine</option>
            <?php
            $sql = "SELECT * FROM `inventory`";
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
            <label class="form-label"> Unit Quantity </label>
            <input type="number" name="quantity" id="" class="form-control" min="1" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnAddqty" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal for UPDATE-->
<div class="modal fade" id="editmodalinv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <input name="user" value="<?php echo $_SESSION['unamee']; ?>" hidden>
        <input type="hidden" name="update_id" id="update_id">
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Medicine </label>
            <input type="text" name="meds" id="meds" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Stocks Available </label>
            <input type="text" name="quantity" id="quantity" class="form-control">
        </div>
        <div class="form-group col-md-12 mx-auto">
            <label class="form-label"> Unit Price(PHP) </label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnUpdate" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Modal for Delete -->
<div class="modal fade" id="delmodalinv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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


            <input type="text" name="meds" id="medss" class="form-control" hidden>



      <h6>Do you really want to delete this data?</h6>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnDelete" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>









    <div class="container-fluid">
    <?php
if(isset($_SESSION['statusinv']) && $_SESSION['statusinv']!='')
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$_SESSION['statusinv'].'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['statusinv']);
}

  ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Inventory</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addMeds">
<span class="icon text-white-50">
<i class="fas fa-pills"></i>
</span>
<span class="text">Add Medicines</span>
</button> &nbsp;
<button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#addMedsqty">
<span class="icon text-white-50">
<i class="fas fa-plus"></i>
</span>
<span class="text">Add Quantity</span>
</button></h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>   
                                <th style="width:8%">Supply ID</th>
                                <th>Medicine</th>
                                <th>Stocks Available</th>
                                <th>Stocks Out</th>
                                <th>Unit Price(PHP)</th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th style="width:18%">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //SELECT query
                            $sql = "SELECT * FROM `inventory`";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0){
                                foreach ($result as $row => $unit) 
                                {
                                    ?>
                                    <tr>
                                        <td><?= $unit['id']; ?></td>
                                        <td><?= $unit['meds']; ?></td>
                                        <td><?= $unit['quantity']; ?></td>
                                        <td><?= $unit['cons']; ?></td>
                                        <td><?= $unit['price']; ?></td>
                                        <td><?= $unit['total']; ?></td>
                                        <td>
                                        <?php 
                                        if($unit['status']== 0)
                                        {
                                          echo '<a href="updatecode.php?status_id='.$unit['id'].'&status=1&quantity='.$unit['quantity'].'&meds='.$unit['meds'].'&user='.$_SESSION['unamee'].'" class="badge badge-success">Active</a>';
                                        }
                                        else
                                        {
                                          echo '<a href="updatecode.php?status_id='.$unit['id'].'&status=0&quantity='.$unit['quantity'].'&meds='.$unit['meds'].'&user='.$_SESSION['unamee'].'" class="badge badge-danger">Inactive</a>';
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



















                        //    while ($row = mysqli_fetch_assoc($result)) {
                       //         $id = $row['id'];
                      //          $meds = $row['meds'];
                        //        $quantity = $row['quantity'];
                       //         $price = $row['price'];
                       //         $cons = $row['cons'];
                        //        $total = $row['total'];
                          //      echo '<tr>
 //   <td>' . $meds . '</td>
  //  <td>' . $quantity . '</td>
 //   <td>' . $cons . '</td>
  //  <td>' . $price . '</td>
 //   <td>' . $total . '</td>
  //  <td><a href="adm_invupdate.php?updateid=' . $id . '" class="btn btn-dark btn-icon-split">
  //  <span class="icon text-white-50">
  //  <i class="fas fa-edit"></i>
  //  </span>
  //  <span class="text">Update</span>
  //  </a>
   // <a href="adm_delete.php?delid=' . $id . '" class="btn btn-danger btn-icon-split">
   // <span class="icon text-white-50">
  //  <i class="fas fa-trash"></i>
  //  </span>
   // <span class="text">Delete</span>
  //  </a>
  //  </td>
//</tr>';
                          //  }

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
    <!-- <script src="js/demo/datatables-demo.js"></script> -->
    
    <!-- Edit Modal -->
    <!-- <script>
        $(document).ready(function() 
        {
            $('.editbtn').on('click', function()
            {
                $('#editmodalinv').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#meds').val(data[1]);
                    $('#quantity').val(data[2]);

                    $('#price').val(data[4]);

            });
        });
    </script> -->



<script>
       $(document).ready(function() {

    $('.editbtn').on('click', function() {
      $('#editmodalinv').modal('show');

$tr = $(this).closest('tr')

var data = $tr.children("td").map(function() 
{
    return $(this).text();
}).get();

console.log(data);

$('#update_id').val(data[0]);
$('#meds').val(data[1]);
$('#quantity').val(data[2]);

$('#price').val(data[4]);
    });

    // Initialize DataTables
    var table = $('#dataTable').DataTable({
        // ... your DataTables configuration ...
        drawCallback: function(settings) {
            // Reattach event listener for edit buttons after table is redrawn
            $('.editbtn').on('click', function() {
              $('#editmodalinv').modal('show');

$tr = $(this).closest('tr')

var data = $tr.children("td").map(function() 
{
    return $(this).text();
}).get();

console.log(data);

$('#update_id').val(data[0]);
$('#meds').val(data[1]);
$('#quantity').val(data[2]);

$('#price').val(data[4]);
            });
        }
    });
});
    </script>

     <!-- Delete Modal -->
     <script>
        $(document).ready(function() 
        {
            $('.delBtn').on('click', function()
            {
                $('#delmodalinv').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#del_id').val(data[0]);
                    $('#medss').val(data[1]);
            });
        });
    </script>



</body>

</html>