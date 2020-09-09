
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):
 ?>


<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<?php

$did=$_GET['did'];

$sql="SELECT * FROM department WHERE department_id=$did";
$result=$db->getRows($sql,array());
foreach($result as $department)
{
    $_SESSION['did']=$department['department_id'];
    $department_name_en=$department['department_name_en'];
    $department_name_ar=$department['department_name_ar'];
    $department_image=$department['department_image'];
    $department_date=$department['department_date'];
    


}


?> 








<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row" style="margin-bottom:10px">
<div class="col-md-12">
<a href="department.php" class="badge badge-light"> << Back</a>

</div>
</div>





  <!-- Content Row -->
  <div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header" style="background-color:#4e73df;color:white">
    Edit Department
  </div>
  <div class="card-body">
    


  <form action="updateDepartment.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

        <div class="modal-body ">

        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">English Name</label>
      <input type="text" class="form-control"  placeholder="English Name" name="enName" value="<?php echo $department_name_en ?>" required>
    </div>
  


    <div class="form-group col-md-6">
      <label for="inputEmail4">Arabic Name</label>
      <input type="text" class="form-control"  placeholder="Arabic Name" name="arName" value="<?php echo $department_name_ar  ?>" required>
    </div>

    <div class="form-group col-md-12">

    <label >Department Image</label> <br>
     
    <img src="img/slider/<?php echo $department_image?>  " class="img-fluid" alt="Responsive image" style="width:100%;height:350px">

    <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $department_image; ?>"  >
    </div>
     
  
  

  </div>
        
        </div>
        <div class="modal-footer text-center">
           
       <a href="updateDepartment.php?did=<?php echo $did ?>" >  <button type="submit" name="update" class="btn btn-primary" >Save</button></a>
        </div>
      </form>


  </div>
</div>





</div>
</div>
</div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;
?>