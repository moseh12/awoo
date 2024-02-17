<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; 
include "includes/conn.php"
?>
<?php
     
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
<?php include "includes/sidebar.php" ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
<?php include "includes/navbar.php" ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6><br>
                  </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $req=mysqli_query($conn,"select * from  queries where email='".$_SESSION['email']."'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($req)) {
                            ?>
                            <tr> 
                            <th><?php echo $row['id'];?></th> 
                            <th><?php echo $row['Name'];?></th> 
                            <td><?php  echo $row['Email'];?></td>
                            <td><?php  echo $row['Subject'];?></td> 
                            <td><?php  echo $row['Message'];?></td>   
                            </tr>   
                            <?php 
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
        <!-- Edit Modal-->
        <div class="modal fade" id="basicmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="subject">Subject</label>
                        <input id="subject" type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="message">Message</label>
                        <input id="message" type="text" class="form-control" name="message" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="contact" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
  
    <script>
  $(document).ready(function () {
    $('.editbtn').on('click', function(){

      $('#editmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#order_no').val(data[1]);
      $('#tsc').val(data[2]);
      $('#role').val(data[3]);
      $('#gender').val(data[4]);
      $('#religion').val(data[5]);
      $('#email').val(data[6]);
      $('#phone').val(data[7]);
      $('#status').val(data[8]);
    }); 
  });
</script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>