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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontNunito.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-4.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        td {
            text-align: center;
        }

        th {
            text-align: center;
        }

        .container .copyright span {
            color: #858796;
        }

        .modal-header,
        .modal-body {
            color: #858796;
        }
    </style>

    </style>
    <link href="vendor/summernote/summernote.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div class="modal fade" id="btnDelrem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this announcement?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmDelete">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--SCMS Nav-->
    <?php
    include 'scms_nav.php';
    ?>

    <!------------------------------>

    <!-- Begin Page Content -->



    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Hotlines</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Editor</h6>
                    </div>

                    <div class="card-body">
                        <form action="updatecode.php" method="POST">
                            <textarea id="summernote" name="rem" rows="10"></textarea>
                            <!-- <span id="char-count">0</span> characters -->
                            <hr>
                            <button class="btn btn-primary btn-icon-split float-right" type="submit" name="btnRem">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen-to-square"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>SCMSv1</span>
            </div>
        </div>
    </footer>
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
    <script src="vendor/summernote/summernote.min.js"></script>




    <script>
        $('#summernote').summernote({
            height: 400,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontsize', 'strikethrough', 'superscript', 'subscript', 'color']],
                ['para', ['paragraph']],
                ['height', ['height']],
                ['insert',],
                ['view', ['codeview']]
            ]

        });
    </script>

<!-- <script>
    $('#summernote').summernote({
        height: 400,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['font', ['fontsize', 'fontname', 'color']],
            ['para', ['style', 'ul', 'ol', 'paragraph', 'height']],
            ['insert', ['link', 'picture', 'video', 'table', 'hr']],
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo']],
        ]
    });
</script> -->


<script>
$(document).ready(function() {
   // Fetch initial value from database using AJAX
   $.ajax({
      url: 'fetchRem.php',
      method: 'GET',
      dataType: 'html',
      success: function(data) {
         // Set the initial value of Summernote editor
         $('#summernote').summernote({
            codemirror: {
               mode: 'text/html',
               htmlMode: true,
               lineNumbers: true,
               theme: 'monokai'
            }
         });
         $('#summernote').summernote("code", data);
      }
   });
});
</script>







</body>

</html>