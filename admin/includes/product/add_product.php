<?php

include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])): 
?>



<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>










<div class="card">
<div class="card-header">
<h3>Add New Product </h3>
</div>
<div class="card-body">
<form action="add.php" method="POST" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Code</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Code" name="code" value="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Department</label>
      <select id="inputState" class="form-control" name="dep_name" required>
      <option selected> </option>
      <?php 
         $sql="SELECT * FROM department ";
         $result_season=$db->getRows($sql,array());
         foreach($result_season as $value):
        ?>
        <option> <?php echo $value['department_name_en']  ?> </option>
         <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Season</label>
      <select id="inputState" class="form-control" name="season_id" required>
      <option selected> </option>
        <?php 
         $sql="SELECT * FROM season ";
         $result_dep=$db->getRows($sql,array());
         foreach($result_dep as $value):
         
        ?>
        <option name="season_id"> <?php echo $value['season_id'].' '.$value['season_name_en'].'-'.$value['season_year']  ?> </option>
         <?php endforeach; ?>
      </select>
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Price</label>
      <input type="number" class="form-control" id="inputEmail4" placeholder="Price" name="price" value="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Discount</label>
      <input type="number" class="form-control" id="inputEmail4" placeholder="Discount" name="discount" value="" required>
    </div>
   
  
  </div>



  

 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Model Name</label>
      <input type="text" class="form-control" id="inputCity"  placeholder="Model Name" name="model_name" value="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Feature</label>
      <select id="inputState" class="form-control" name="featured" required>
      <option selected> </option>
        <option > 1-Featured
        </option>
        <option >0-Not Featured </option>
      </select>
    </div>
   
  </div>




  <input type="file" name="fileToUpload" id="fileToUpload" required>

 





  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Video Link</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Video Link" name="video"  value="" required>
    </div>
  </div>
              
        <button type="submit" name="add" class="btn btn-primary" href="addProduct_process.php">Save</button>
      </form>
      </div>
</div>





      <?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;
?>