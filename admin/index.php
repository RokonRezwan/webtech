<?php
     session_start();
     require_once'./dbcon.php';

     if(!isset($_SESSION['user_login'])){
           header('location:login.php');
     }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/script.js"></script>

  </head>
  <body>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Student Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
         <li><a href="#" ><i class="fa fa-user"></i> Welcome Rokon Rezwanur Rais</a></li>
         <li><a href="registration.php" ><i class="fa fa-user-plus"></i> Add User</a></li>
         <li><a href="index.php?page=user-profile" ><i class="fa fa-user"></i> Profile</a></li>
         <li><a href="logout.php" ><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="list-group">
            <a href="index.php?page=dashboard" class="list-group-item active"> <i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="index.php?page=add-student" class="list-group-item"> <i class="fa fa-user-plus"></i> Add Student</a>
            <a href="index.php?page=all-students" class="list-group-item"> <i class="fa fa-users"></i> All Students</a>
            <a href="index.php?page=all-users" class="list-group-item"> <i class="fa fa-users"></i> All Admins</a>  
            
          </div>
        </div>
        <div class="col-sm-9">
          <div class="content">
            
          <?php 
            
            if(isset($_GET['page'])){
              $page=$_GET['page'].'.php';
            } else{
              $page="dashboard.php";
            }

            if(file_exists($page)){
              require_once $page;
            } else{
              require_once '404.php';
            }
          
          ?>

          <br>
          <br>
          <br>

          <footer class="footer-area">
            <p>Rokon, Rezwanur Rais  <br> Copyright : All Aights Are Reserved</p>
          </footer>
          
          </div>

        </div>

      </div>

    </div>

    

  </body>
</html>