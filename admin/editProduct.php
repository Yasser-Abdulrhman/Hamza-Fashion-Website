
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

$pid=$_GET['pid'];


$sql="SELECT * FROM product WHERE product_id=$pid";
$result=$db->getRows($sql,array());
foreach($result as $product)
{
    $product_code=$product['product_code'];
    $product_dep=$product['department_id'];
    $product_season=$product['season_id'];
    $product_image=$product['product_image'];
    $product_feature=$product['featured'];
    $product_price=$product['price'];
    $product_discount=$product['discount'];
    $product_video=$product['video'];
    $product_model=$product['model_name'];
    $product_gallery=$product['gallery'];
}
$_SESSION['code']=$product_code;
$_SESSION['pid']=$pid;

   //get department name
   $sql="SELECT * FROM department WHERE department_id =  $product_dep ";
   $result=$db->getRows($sql,array());
   foreach($result as $dep)
   {
     $dep_name_en=$dep['department_name_en'];
  
   }
 
     //get season name
     $sql="SELECT * FROM season WHERE season_id = $product_season ";
     $result=$db->getRows($sql,array());
     foreach($result as $season)
     {
       $season_name_en=$season['season_name_en'];
       $season_year=$season['season_year'];
    
     }

?> 








<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row" style="margin-bottom:10px">
<div class="col-md-12">
<a href="show.php" class="badge badge-light"> << Back</a>

</div>
</div>



<div class="row">
<div class="col-md-12">
<div class="row">

  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
<?php
$text=$product_video;

$text=preg_replace("#.*youtube\.com/watch\?v=#" , "" , $text);
?>

      <iframe width="100%" height="400" src="<?php echo 'https://www.youtube.com/embed/'.$text ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>        
    </div>
    </div>
  </div>
</div>

</div>
</div>

  <!-- Content Row -->
  <div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header" style="background-color:#4e73df;color:white">
    Edit Product
  </div>
  <div class="card-body">
    
  <form action="updateProduct.php" method="POST" enctype="multipart/form-data">

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Code</label>
      <input type="text" class="form-control" name="code" id="inputEmail4" placeholder="Code" value="<?php echo $product_code ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Department</label>
      <select id="inputState" class="form-control" name="dep_name" >
        <option selected><?php echo $dep_name_en ?> </option>
          <?php
          /*
          $sql="SELECT * FROM department ";
          $result=$db->getRows($sql,array());
          foreach($result as $value):
          ?>
          <?php
        if($value['department_id']!=$product_dep):
        ?> 
        <option><?php echo $value['department_name_en'] ?> </option>
        <?php endif; ?>
          <?php endforeach;
          */
          ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Season</label>
      <select id="inputState" class="form-control"  name="season_id">
        <option selected><?php echo $product_season.'-'. $season_name_en.'-'.$season_year ?></option>
        <?php
           /*
          $sql="SELECT * FROM season ";
          $result=$db->getRows($sql,array());
          foreach($result as $value):
          ?>
          <?php
        if($value['season_id']!=$product_season ):
        ?> 
        <option name="season_id"><?php echo $value['season_id'].'-'.$value['season_name_en'].'-'.$value['season_year'] ?> </option>
        <?php endif; ?>
          <?php endforeach; 
          */
          ?>
      </select>
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Price</label>
      <input type="number" class="form-control"  name="price" id="inputEmail4" placeholder="Price" value="<?php  echo $product_price?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Discount %</label>
      <input type="number" class="form-control" name="discount" id="inputEmail4" placeholder="Discount" value="<?php echo $product_discount ?>">
    </div>
   
    <div class="form-group col-md-4">
      <label for="inputEmail4">After Discount</label>
      <input type="number" class="form-control" id="inputEmail4" placeholder="Price" value="<?php echo $product_price-(($product_discount/100)*$product_price) ?>">
    </div>
  </div>



  

 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Model Name</label>
      <input type="text" class="form-control" id="inputCity" name="model_name"   placeholder="Model Name" value="<?php  echo $product_model?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Feature</label>
      <select id="inputState" class="form-control" name="featured">
        <option selected><?php if($product_feature==1) echo '1-Featured' ;
        else 
        echo '0-Not Featured';
        
        ?>
        </option>
        <option>1-Featured</option>
        <option>0-Not Featured</option>
      </select>
    </div>
   
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Main Product Image</label>
      <div class="card">
      <div class="card-body">
      <img src="img/<?php  echo $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$product_code.'/'.'main'.'/'. $product_image ?>" class="card-img-top" alt="..." style="height:400px" >
      <input type="file" class="form-control-file" name="fileToUpload" id="exampleFormControlFile1" style="margin-top:10px" >
      </div>
    </div> 
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputEmail4">All Product Images</label>
        <?php 
        $img=explode(',', $product_gallery);
        ?>
        <div class="card">
        <div class="card-body">
           <?php  for($i=0 ;$i< count($img) ; $i++ ):?>
              <img src="img/<?php echo  $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$product_code.'/'.'gallery'.'/' .$img[$i]; ?>"  class=" product-small-img" style="width:150px;height:150px;margin:2px"  >
              <?php endfor; ?>

              <input type="file" class="form-control-file"  name="fileToUpload_gallery[]" id="exampleFormControlFile1" style="margin-top:10px" multiple>
          </div>
        </div>
     </div>
     </div>

  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Video Link</label>
      <input type="text" class="form-control" id="inputEmail4" name="video" placeholder="Video Link" value="<?php echo $product_video ?>">
    </div>
  </div>


  <button type="submit" name="update" class="btn btn-primary" href="UpdateProduct.php">Update Product</button>



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