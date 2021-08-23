<?php

require_once 'dbcon.php';
?>
<h1 class="text-primary"> <i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small> </h1>
    <ol class="breadcrumb">
      <li class="active">Insert Student Information</li>
    </ol>

    <?php
       if(isset($_POST['add-student'])){
             $name=$_POST['name'];
             $roll=$_POST['roll'];
             $pcontact=$_POST['pcontact'];
             $class=$_POST['class'];
             $city=$_POST['city'];
       

       $query="INSERT INTO `student_info`(`name`, `roll`, `pcontact`, `class`, `city`) VALUES ('$name','$roll','$pcontact','$class','$city')";

       $result = mysqli_query($link,$query);

       if($result){
             $success = "Data Insert Success";
       } else{
             $error = "Data Insert Error";
       }

      }

    ?>

    <div class="row">
          <?php if(isset($success)){echo '<p class="alart alart-success col-sm-6">'.$success,'</p>';} ?>
          <?php if(isset($error)){echo '<p class="alart alart-danger col-sm-6">'.$error,'</p>';} ?>
    </div>

 <div class="row">
       <div class="col-sm-6">
             <form action="" method="POST" >

                   <div class="form-group">
                         <label for="name">Student Name</label>
                         <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="">
                   </div>
                   <div  class="form-group">
                         <label for="roll">Student Roll</label>
                         <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" pattern="[0-9]{6}"required="">
                   </div>
                   <div  class="form-group">
                         <label for="pcontact">Parents Contact</label>
                         <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control"required="">
                   </div>
                   <div  class="form-group">
                         <label for="class">Class</label>
                         <select name="class" id="class" class="form-control" required="">
                               <option value="">Select Class</option>
                               <option value="">Play</option>
                               <option value="">Nursary</option>
                               <option value="">One</option>
                               <option value="">Two</option>
                               <option value="">Three</option>
                               <option value="">Four</option>
                               <option value="">Five</option>

                         </select>
                   </div>
                   <div  class="form-group">
                         <label for="city">Address</label>
                         <input type="text" name="city" placeholder="Address" id="city" class="form-control" required="">
                   </div>
                   <div  class="form-group">
                        <input type="submit" value="Add Student" name="add-student" class="btn btn-primary pull-right">
                   </div>
                   
             </form>
       </div>
 </div>           