<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; 
include "includes/conn.php"
?>
<?php
if(isset($_POST['bid'])){ 
    $order_no=$_POST['order_no'];
    $title=$_POST['title'];
    // $subject_area=$_POST['subject_area'];
    // $academic_level=$_POST['academic_level'];
    // $due=$_POST['due'];
    // $pages=$_POST['pages'];
    // $costs=$_POST['costs'];
    // $status=$_POST['status'];
      $write =mysqli_query($conn,"INSERT INTO bids ( `order_no`,`title`) 
      VALUES ('$order_no','$title')") or die(mysqli_error($conn));
       echo " <script>setTimeout(\"location.href='orders.php';\",10);</script>";}        
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
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Orders</h6><br>
                  </div>
                  <div class="modal-content">
                <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                    <?php
                        $req=mysqli_query($conn,"select * from  orders");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($req)) {
                            ?>
                        <label for="order_no">Order No.</label>
                        <input id="order_no" type="number" class="form-control" name="order_no" value="<?php echo $row['order_no'];?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="title">Order Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="<?php echo $row['title'];?>" required>
                    </div>
                    <!-- <div class="form-group col-6">
                        <label for="subject_area">Subject Area</label>
                        <input id="subject_area" type="text" class="form-control" name="subject_area" value="<?php echo $row['subject_area'];?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="academic_level">Academic Level</label>
                        <input id="academic_level" type="text" class="form-control" name="academic_level" value="<?php echo $row['academic_level'];?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="pages">Pages</label>
                        <input id="pages" type="number" class="form-control" name="pages" value="<?php echo $row['pages'];?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="costs">Cost</label>
                        <input id="costs" type="number" class="form-control" name="costs" value="<?php echo $row['costs'];?>" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="due">Due Date</label>
                        <input id="due" type="date" class="form-control" name="due" value="<?php echo $row['due'];?>" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      <select name="status" id="status" class="form-control" required>
                        <option value="<?php echo $row['status'];?>">Select</option>
                        <option value="Available">Available</option>
                        <option value="Assigned">Assigned</option>
                        <option value="Dispute">Dispute</option>
                        <option value="Revision">Revision</option>
                        <option value="Editing">Editing</option>
                        <option value="Completed">Completed</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Paid">Paid</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <button type="submit" name="bid" class="btn btn-primary">Submit</button>
                  </div><?php }?>
                </form>
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