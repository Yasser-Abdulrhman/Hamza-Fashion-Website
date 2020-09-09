
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

$sid=$_GET['sid'];

$sql="SELECT * FROM season WHERE season_id=$sid";
$result=$db->getRows($sql,array());
foreach($result as $season)
{
    $_SESSION['sid']=$season['season_id'];
    $season_name_en=$season['season_name_en'];
    $season_name_ar=$season['season_name_ar'];
    $season_year=$season['season_year'];
    $season_date=$season['season_date'];
    


}


?> 








<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row" style="margin-bottom:10px">
<div class="col-md-12">
<a href="season.php" class="badge badge-light"> << Back</a>

</div>
</div>





  <!-- Content Row -->
  <div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header" style="background-color:#4e73df;color:white">
    Edit Season
  </div>
  <div class="card-body">
    


  <form action="updateSeason.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

        <div class="modal-body ">

        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">English Name</label>
      <input type="text" class="form-control"  placeholder="English Name" name="enName" value="<?php echo $season_name_en ?>" required>
    </div>
  


    <div class="form-group col-md-6">
      <label for="inputEmail4">Arabic Name</label>
      <input type="text" class="form-control"  placeholder="Arabic Name" name="arName" value="<?php echo $season_name_ar  ?>" required>
    </div>

    <div class="form-group col-md-12">
      <label for="inputEmail4">Season Year</label>
      <input type="number" class="form-control"  placeholder="Season Year" name="year" value="<?php echo $season_year ?>" required>
    </div>

  
  

  </div>
        
        </div>
        <div class="modal-footer text-center">
           
            <button type="submit" name="update" class="btn btn-primary" href="updateSeason.php?sid=<?php echo $sid ?>">Save</button>
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