<h1 class="text-primary"> <i class="fa fa-dashboard"></i> Dashboard <small>Statics Overview</small> </h1>
            <ol class="breadcrumb">
              <li class="active"> Dashboard</li>
            </ol>

     <?php

     $count_student = mysqli_query($link, "SELECT * FROM `student_info`");
     $total_student = mysqli_num_rows($count_student);

     $count_user = mysqli_query($link, "SELECT * FROM `users`");
     $total_user = mysqli_num_rows($count_user);
     
     ?>

            <div class="row">

              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?= $total_student; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Students</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <a href="index.php?page=all-students">
                      <div class="panel-footer">
                        <span class="pull-left">All Students</span>
                        <span class="pull-right"><i class="fa fa-arrow-right"></i></span>
                        <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?= $total_user; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Admins</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <a href="index.php?page=all-users">
                      <div class="panel-footer">
                        <span class="pull-left">All Admins</span>
                        <span class="pull-right"><i class="fa fa-arrow-right"></i></span>
                        <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <hr>
            <h3>New Students</h3>
            <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Class</th>
                  <th>City</th>
                  <th>Contact</th>
                </tr>
              </thead>
              <tbody>

               <?php
                 
                 $db_sinfo = mysqli_query($link,"SELECT * FROM `student_info`");
                 while($row = mysqli_fetch_assoc($db_sinfo)){ ?>      


                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['roll']; ?></td>
                  <td><?php echo $row['class']; ?></td>
                  <td><?php echo $row['city']; ?></td>
                  <td><?php echo $row['pcontact']; ?></td>
                </tr>
                
                <?php
                 }
                ?>


              </tbody>
            </table>
            </div>