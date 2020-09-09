
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])): 
?>

 
<?php
//get product
$sql="SELECT * FROM product";
$result=$db->getRows($sql,array());
$count=$db->getCount($sql);




?>






<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- Begin Page Content -->



<div class="modal fade " id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addProduct.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body ">

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
     <option> </option>
        <?php 
         $sql="SELECT * FROM season  ";
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



  <label >Cover Image</label>
  <input type="file" name="fileToUpload" id="fileToUpload" required >

  <label >Product Images</label>
  <input type="file" name="fileToUpload_gallery[]" id="fileToUpload_gallery" multiple required >



  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Video Link</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Video Link" name="video"  value="" required>
    </div>
  
  

  </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary" href="add.php">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Managment</h1>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header  py-3">

    <h6 class="m-0 font-weight-bold text-primary float-left">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             + Add New Product 
            </button>
    </h6>
    <h6 class="m-0 font-weight-bold text-primary float-left position-absolute " style="right:10px"   >
 <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
  Delete All Products
</button>

    
    </h6>
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete All Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete all products ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
       <a href="deleteAllproducts.php"> <button type="button" class="btn btn-primary">Delete</button> <a>
      </div>
    </div>
  </div>
</div>

  </div>

  <?php 
  
  if(isset($_SESSION['count'])&&$_SESSION['count']>0): 
  unset($_SESSION['count']);
  ?>
    <div class="alert alert-info" role="alert">
  This Product Code You Entered Is Already Exist!!!
</div>

  <?php  else:?>
  

  <?php if($count>0): ?>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
            <th> Image </th>
            <th>Code</th>
            <th>Department</th>
            <th>Season </th>
            <th>Price </th>
            <th> Discount </th>
            <th> Featured </th>
            <th>Model </th>
            <th>Added Date </th>
            
            <th>Actions</th>
          </tr>
        </thead>

        <?php
  foreach($result as $product):
$dep_id=$product['department_id'];
$season_id=$product['season_id'];
    //get department name
  $sql="SELECT * FROM department WHERE department_id = $dep_id ";
  $result=$db->getRows($sql,array());
  foreach($result as $dep)
  {
    $dep_name_en=$dep['department_name_en'];
 
  }

    //get season name
    $sql="SELECT * FROM season WHERE season_id = $season_id ";
    $result=$db->getRows($sql,array());
    foreach($result as $season)
    {
      $season_name_en=$season['season_name_en'];
      $season_year=$season['season_year'];
   
    }
  
  
  ?>
  
        <tbody>
     
          <tr>
            
            <td>   <img src="img/<?php echo $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$product['product_code'].'/'.'main'.'/'. $product['product_image'] ?>" width="50" height="40" class="d-inline-block align-top" alt=""></td>
            <td><?php echo $product['product_code'] ?></td>
            <td> <?php echo $dep_name_en ?></td>


            <td style="font-size:15px"><?php echo $season_name_en.'-'.$season_year ?> </td>
            <td>EGP <?php echo $product['price']?> </td>
            <td> <?php echo $product['discount']?> %</td>
            <td> <?php if($product['featured']==1) 
            echo 'Featured';
            else echo 'Not Featured';
            ?> </td>
            <td> <?php echo $product['model_name']?></td>
            <td> <?php echo $product['product_date']?></td>
            
            <td>
            

            <button type="button" class="btn btn-danger" onclick="deleteDepartment(<?php echo $product['product_id']  ?>)" >
            <i class="fas  fa-trash-alt" ></i>
            </button>



            <script>
            function deleteDepartment(id)
            {
              if(confirm("Do you want delete this product ?"))
              {
                window.location.href='deleteProduct.php?pid=' +id+ '';
                return true;
              }
            }


            </script>

    
            
 <a href="editProduct.php?pid=<?php echo $product['product_id'] ?>"  > <button type="button" class="btn btn-info">
<i class="fas fa-edit" ></i>
</button></a>  
            
            
    
     
     
      </td>
          </tr>
        
        </tbody>
  <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>

</div>
<?php else: ?>
  <div class="alert alert-info" role="alert">
  No Products Added Yet
</div>

  <?php endif; ?>

  <?php endif; ?>

  <?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;

?>

