<?php

require_once 'dbcon.php';
?>

<h1 class="text-primary"> <i class="fa fa-user"></i> User Profile <small>My Profile</small> </h1>
            <ol class="breadcrumb">
              <li class="active"> All Information</li>
            </ol>

<?php

$session_user = $_SESSION['user_login'];

$user_data = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>

    <div class="row">
          <div class="col-sm-6">
                <table class="table table-bordered">
                      <tr>
                            <td>User ID</td>
                            <td><?= $user_row['id'] ;?></td>
                      </tr>
                      <tr>
                            <td>Name</td>
                            <td><?= $user_row['name'] ;?></td>
                      </tr>
                      <tr>
                            <td>E-mail</td>
                            <td><?= $user_row['email'] ;?></td>
                      </tr>
                      <tr>
                            <td>User Name</td>
                            <td><?= $user_row['username']; ?></td>
                      </tr>
                      <tr>
                            <td>Status</td>
                            <td><?= $user_row['status']; ?></td>
                      </tr>
                      <tr>
                            <td>Sign up Date</td>
                            <td><?= $user_row['date']; ?></td>
                      </tr>
                </table>

                <a href="" class="btn btn-sm btn-info pull-right"> <i class="fa fa-pencil-square-o"></i> Edit Profile</a>

          </div>
          <div class="col-sm-6">

          </div>
    </div>        