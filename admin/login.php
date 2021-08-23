<?php

require_once 'dbcon.php';

session_start();

if(isset($_SESSION['user_login'])){
      header('location:index.php');
}

    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username'");
      if(mysqli_num_rows($username_check) > 0 ){

            $row = mysqli_fetch_assoc($username_check);

            if($row['password'] == $password){
                  if($row['status'] == 'active'){

                        $_SESSION['user_login'] = $username; 
                        header('location:index.php');

                  }
                  else{
                        $status_inactive = "Your status is Inactive ! ";
                  }

            }
            else{
                  $wrong_password = "Wrong Password ! ";
            }

      }
      else{
            $username_not_found = "User Name not found ! ";
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Admin Login</title>

    
    <link href="../css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container"> 
    <h1 class="text-center">Student Management System</h1>
    <br>
    <h2 class="text-center">Admin Login Form</h2>
    <br>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="login.php" method="POST">
                <div>
                     <input type="text" placeholder="User Name" name="username" required="" class="form-control" value="<?php if(isset($username)){echo $username;} ?>">
                </div>

                <div>
                     <input type="password" placeholder="Password" name="password" required="" class="form-control" value="<?php if(isset($password)){echo $password;} ?>">
                </div>
                <br>
                <div>
                     <input type="submit" value="Login" name="login" class = "btn btn-primary">
                </div>
        
            </form>

        </div>
    </div>
      <br>
      <div class="alart alart-danger col-sm-4 col-sm-offset-4">
          <?php if(isset($username_not_found)){echo '<div >'.$username_not_found.'</div>';} ?>

          <?php if(isset($wrong_password)){echo '<div >'.$wrong_password.'</div>';} ?>

          <?php if(isset($status_inactive)){echo '<div >'.$status_inactive.'</div>';} ?>

      </div>     
            <br>
            <br>
            <p>Dont have any have an account? Then please <a class="" href="registration.php">Register</a></p>
          
            <br>
            <br>
            <hr>
     <footer>
         <p>Rokon, Rezwanur Rais</p>
         <p>Copyright : All Aights Are Reserved</p>
     </footer>
    
    </div>

   
  </body>
</html>