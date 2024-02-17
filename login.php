<?php 
include "includes/conn.php";
session_start();
if (isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (empty($email) ||empty($password)){
      echo "<div class='alert alert-warning' role='alert'>
        Please fill all the fields
        </div>";
    }
    
    
    $query = "SELECT * FROM `student` WHERE `email` = '$email'";
    $results = mysqlI_query($conn,$query);
    if(!$results){
      die ("Error: ".mysqli_error($conn));
    }
      $userCount = mysqli_num_rows($results);
      if($userCount == 0){
        echo'<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
              <i class="mdi mdi-block-helper label-icon"></i><strong> Error</strong> -  The user you have entered does not exist.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        ?>
  <?php
     }else{
       foreach($results as $user){
         if ($password == $user['password']) {
           $dbEmail = $user['email'];
           $_SESSION['email'] = $dbEmail;
                        echo ' 
                            
                               <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                        <i class="mdi mdi-check-all label-icon"></i><strong>Success!</strong> - Login success!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    ?>
<script type="text/javascript">
        setTimeout(function(){ 
  window.location.href='index.php'
  }, 500);   
</script>
<?php

         } else {
         echo         ' 
                            
                             <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                        <i class="mdi mdi-block-helper label-icon"></i><strong> Error!</strong> - Invalid Password or Email .
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    
                                    ';
         }

       }

      }
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

    <title>NYS  Panel- Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="../assets/img/logo.png" alt="" style="width: 60%;margin-top:50px;margin-left:50px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">NYS Panel | Login</h1>
                                    </div>
                                    <form class="user" action="#" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button name="login" class="btn btn-primary btn-user"> Login</button>
                                        <p>Dont have Account? <a href="register.php">register now</a> </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>