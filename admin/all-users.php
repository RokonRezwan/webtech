<h1 class="text-primary"> <i class="fa fa-users"></i> All Users <small>Information</small> </h1>
    <ol class="breadcrumb">
      <li class="active"></li>
    </ol>

    <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>E-maiil</th>
                  <th>User Name</th>
                  <th>Status</th>                  
                </tr>
              </thead>
              <tbody>

               <?php
                 
                 $db_sinfo = mysqli_query($link,"SELECT * FROM `users`");
                 while($row = mysqli_fetch_assoc($db_sinfo)){ ?>      


                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                </tr>
                
                <?php
                 }
                ?>


              </tbody>
            </table>