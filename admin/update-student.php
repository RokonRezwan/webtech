<?php

require_once 'dbcon.php';
?>
<h1 class="text-primary"> <i class="fa fa-pencil-square-o"></i> Update Student <small>Information</small> </h1>
    <ol class="breadcrumb">
      <li class="active"> <i class="fa fa-pencil-square-o"></i> Edit or Change Student Information</li>
    </ol>

<?php

$id = base64_decode($_GET['id']);

$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` ='$id'");

$db_row = mysqli_fetch_assoc($db_data);


if(isset($_POST['update'])){
      $name=$_POST['name'];
      $roll=$_POST['roll'];
      $pcontact=$_POST['pcontact'];
      $class=$_POST['class'];
      $city=$_POST['city'];


$query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`='$id'";

$result = mysqli_query($link,$query);

if($result){
      header("location: index.php?page=all-students");
} else{
      $error = "Data Insert Error";
}

}


?>    


 <div class="row">
       <div class="col-sm-6">
             <form action="" method="POST" >

                   <div class="form-group">
                         <label for="name">Student Name</label>
                         <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value = "<?= $db_row['name'] ?>">
                   </div>
                   <div  class="form-group">
                         <label for="roll">Student Roll</label>
                         <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" pattern="[0-9]{6}"required="" value = "<?= $db_row['roll'] ?>">
                   </div>
                   <div  class="form-group">
                         <label for="pcontact">Parents Contact</label>
                         <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control"required="" value = "<?= $db_row['pcontact'] ?>">
                   </div>
                   <div  class="form-group">
                         <label for="class">Class</label>
                         <select name="class" id="class" class="form-control" required="" ?>">
                               <option value="">Select Class</option>
                               <option <?php echo $db_row['class']=='Play' ? 'selected="':"" ?> value="">Play</option>
                               <option <?php echo $db_row['class']=='Nursary' ? 'selected="':"" ?>  value="">Nursary</option>
                               <option <?php echo $db_row['class']=='One' ? 'selected="':"" ?>  value="">One</option>
                               <option <?php echo $db_row['class']=='Two' ? 'selected="':"" ?>  value="">Two</option>
                               <option <?php echo $db_row['class']=='Three' ? 'selected="':"" ?>  value="">Three</option>
                               <option <?php echo $db_row['class']=='Four' ? 'selected="':"" ?>  value="">Four</option>
                               <option <?php echo $db_row['class']=='Five' ? 'selected="':"" ?>  value="">Five</option>

                         </select>
                   </div>
                   <div  class="form-group">
                         <label for="city">Address</label>
                         <input type="text" name="city" placeholder="Address" id="city" class="form-control" required="" value = "<?= $db_row['city'] ?>">
                   </div>
                   <div  class="form-group">
                        <input type="submit" value="Update" name="update" class="btn btn-primary pull-right">
                   </div>
                   
             </form>
       </div>
 </div>           