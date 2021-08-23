<?php

require_once 'dbcon.php';
session_start();

    if(isset($_POST['registration'])){
          $name=$_POST['name'];
          $email=$_POST['email'];
          $username=$_POST['username'];
          $password=$_POST['password'];
          $c_password=$_POST['c_password'];

          /*$photo = explode('.',$_FILES(['photo']['name']));
          $photo = end($photo);
          $photo_name = $username.'.'.$photo;*/

          $input_error = array();

          if(empty($name)){
                $input_error['name'] = "The Name field is required";
          }

          if(empty($email)){
            $input_error['email'] = "The Email field is required";
          }

          if(empty($username)){
            $input_error['username'] = "The User Name field is required";
          }

          if(empty($password)){
            $input_error['password'] = "The Password field is required";
          }

          if(empty($c_password)){
            $input_error['c_password'] = "Please re-enter the password";
          }

          if(count($input_error) == 0){
                $email_check = mysqli_query($link,"SELECT * FROM `users` WHERE `email` = '$email';");
                 if(mysqli_num_rows($email_check) == 0){
                  $username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username';");
                    if(mysqli_num_rows($username_check) == 0){
                           if($password == $c_password){

                              $query="INSERT INTO `users`( `name`, `email`, `username`, `password`, `status`) VALUES ('$name','$email','$username','$password','inactive')";
                              $result = mysqli_query($link,$query);

                              $success = "Registration Successful";
                                 

                          }
                          else{
                              $password_not_match = "Password didn't match";
                          }
 
                  }
                  else{
                        $username_error = "This User Name is aready exists.";
                  }

                 }
                 else{
                       $email_error = "This Email address is aready exists.";
                 }
          }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Admin Registration</title>

    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <div class="container">
    <h1 class="text-center">Student Management System</h1>
    <br>
    <h2 class="text-center">Admin Registration Form</h2>
    <br>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> 

                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name</label>
                        <div class="col-sm-4">
                             <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name" value="<?php if(isset($name)){echo $name;} ?>" />     
                        </div>
                        <label class="error"><?php if(isset($input_error['name'])){echo $input_error['name'];}?></label>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label col-sm-1">Email</label>
                        <div class="col-sm-4">
                             <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email" value="<?php if(isset($email)){echo $email;} ?>" />     
                        </div>
                        <label class="error"><?php if(isset($input_error['email'])){echo $input_error['email'];}?></label>
                        <label class="error"><?php if(isset($email_error)){echo $email_error;}?></label>
                    </div>

                    <div class="form-group">
                        <label for="username" class="control-label col-sm-1">User Name</label>
                        <div class="col-sm-4">
                             <input class="form-control" id="username" type="text" name="username" placeholder="Enter your User name" value="<?php if(isset($username)){echo $username;} ?>" />     
                        </div>
                        <label class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];}?></label>
                        <label class="error"><?php if(isset($username_error)){echo $username_error;}?></label>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-sm-1">Password</label>
                        <div class="col-sm-4">
                             <input class="form-control" id="password" type="password" name="password" placeholder="Enter your Password" value="<?php if(isset($password)){echo $password;} ?>" />     
                        </div>
                        <label class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];}?></label>
                    </div>

                    <div class="form-group">
                        <label for="c_password" class="control-label col-sm-1">Confirm Password</label>
                        <div class="col-sm-4">
                             <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Re-enter your Password" value="<?php if(isset($c_password)){echo $c_password;} ?>" />     
                        </div>
                        <label class="error"><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];}?></label>
                        <label class="error"><?php if(isset($password_not_match)){echo $password_not_match;}?></label>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="control-label col-sm-1">Photo</label>
                        <div class="col-sm-4">
                             <input id="name" type="file" name="photo"/>     
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-1">
                        <input type="submit" value="Register" name="registration" class="btn btn-primary">
                        <label class="error"><?php if(isset($success)){echo $success;}?></label>
                    </div>
                   
                </form>       
            </div>   
        </div>
        <br>
        <br>

        <p>If you have an account? Then please <a class="" href="login.php">Login</a></p>
        
  <hr>
     <footer>
         <p>Rokon, Rezwanur Rais</p>
         <p>Copyright : All Aights Are Reserved</p>
     </footer>
    </div>
  </body>
</html>