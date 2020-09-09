
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


$sql="SELECT * FROM logo";
$result=$db->getRows($sql,array());
foreach($result as $value)
{
  $id=$value['id'];
  $logo=$value['logo'];
}


?> 








<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row" style="margin-bottom:10px">
<div class="col-md-12">
<img src="../includes/image/logo/<?php echo $logo ?>" class="img-fluid" alt="Responsive image">

</div>
</div>





  <!-- Content Row -->
  <div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header" style="background-color:#4e73df;color:white">
    Edit Logo
  </div>
  <div class="card-body">
    


  <form action="updateLogo.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

        <div class="modal-body ">

        <div class="form-row">
  

    <div class="form-group col-md-12">

    <label >Logo Image</label> <br>
     
   

    <input type="file" name="fileToUpload" id="fileToUpload"   >
    </div>
     
  
  

  </div>
        
        </div>
        <div class="modal-footer text-center">
           
       <a href="updateLogo.php" >  <button type="submit" name="update" class="btn btn-primary" >Save</button></a>
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