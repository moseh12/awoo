<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; 
include "includes/conn.php"
?>
<?php
if(isset($_GET['del']))
{
	$id=$_GET['id'];
		mysqli_query($conn,"delete from bids where id ='$id'");
		$_SESSION['msg']="Data deleted !!";
}

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
            <h6 class="m-0 font-weight-bold text-primary">My Bids</h6><br>
            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicModal">+ Add</button><br><br> -->
                  </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>O.No.</th>
                            <th>O.Title</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Bid Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $req=mysqli_query($conn,"select * from  bids where status !='available' && email='".$_SESSION['email']."'");
                        while ($row=mysqli_fetch_array($req)) {
                            ?>
                            <tr> 
                            <th><?php echo $row['id'];?></th> 
                            <th><?php echo $row['order_no'];?></th> 
                            <td><?php  echo $row['title'];?></td>  
                            <td><?php  echo $row['email'];?></td>  
                            <td><?php  echo $row['phone'];?></td>
                            <td><?php  echo $row['status'];?></td>  
                            <td><?php  echo $row['bid_date'];?></td>  
                            <!-- <td><a href="edit-bid.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a> <a href="bids.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td> -->
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
                        <label for="subject_area">Subject Area</label>
                        <input id="subject_area" type="text" class="form-control" name="subject_area" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="academic_level">Academic Level</label>
                        <input id="academic_level" type="text" class="form-control" name="academic_level" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="pages">Pages</label>
                        <input id="pages" type="number" class="form-control" name="pages" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="costs">Cost</label>
                        <input id="costs" type="number" class="form-control" name="costs" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="due">Due Date</label>
                        <input id="due" type="date" class="form-control" name="due" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      <select name="status" id="status" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Available">Available</option>
                        <option value="Assigned">Assigned</option>
                        <option value="Dispute">Dispute</option>
                        <option value="Revision">Revision</option>
                        <option value="Editing">Editing</option>
                        <option value="Completed">Completed</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Paid">Paid</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="add_order" class="btn btn-primary">Submit</button>
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