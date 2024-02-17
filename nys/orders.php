<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; 
include "includes/conn.php"
?>
<?php

if(isset($_POST['bid'])){ 
    $order_no=$_POST['order_no'];
    $title=$_POST['title'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $bid_date=$_POST['bid_date'];
    // $pages=$_POST['pages'];
    // $costs=$_POST['costs'];
    // $status=$_POST['status'];
      $write =mysqli_query($conn,"INSERT INTO bids ( `order_no`,`title`,`email`,`phone`,`bid_date`) 
      VALUES ('$order_no','$title','$email','$phone','$bid_date')") or die(mysqli_error($conn));
       echo " <script>setTimeout(\"location.href='bids.php';\",10);</script>";}        
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicModal">+ Bid</button><br><br>
                  </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>O.No.</th>
                            <th>O.Title</th>
                            <th>Subject</th>
                            <th>Level</th>
                            <th>Due</th>
                            <th>Pages</th>
                            <th>Cost</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $req=mysqli_query($conn,"select * from  orders where status='available'");
                        while ($row=mysqli_fetch_array($req)) {
                            ?>
                            <tr> 
                            <th><?php echo $row['id'];?></th> 
                            <th><?php echo $row['order_no'];?></th> 
                            <td><?php  echo $row['title'];?></td>
                            <td><?php  echo $row['subject_area'];?></td> 
                            <td><?php  echo $row['academic_level'];?></td>  
                            <td><?php  echo $row['due'];?></td>  
                            <td><?php  echo $row['pages'];?></td>  
                            <td><?php  echo $row['costs'];?></td>  
                            <td><?php  echo $row['status'];?></td>  
                            <!-- <td><a href="edit-order.php?id=<?php echo $row['id'];?>" class="btn btn-success">Bid</a> </td> -->
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
    <!-- Add Modal-->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="order_no">Order No.</label>
                        <input id="order_no" type="number" class="form-control" name="order_no" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="title">Order Title</label>
                        <input id="title" type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="email"> Email</label>
                        <input id="email" type="email" class="form-control" name="email" 
                        value="<?php $query=mysqli_query($conn,"select email from users where email='".$_SESSION['email']."'");
									while($row=mysqli_fetch_array($query))
									{?>  <?php  echo $row['email'];}?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Phone No.</label>
                        <input id="phone" type="number" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Bid Date</label>
                        <input id="phone" type="date" class="form-control" name="bid_date" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="bid" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
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