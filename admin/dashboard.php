
<?php
include_once('../database.php');

session_start();
if(isset($_SESSION['user_id'])): ?>


<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<?php 

$winter=array(11,12,1,2,3);

$year=date("Y") ;
$month=date("m");
//$month=2;

foreach ($winter as $value)
{
 
  if($month == $value)
  {
    {
    $current_season="winter";
    
    }
    if($month==11 or $month==12)
    $current_year=$year+1;
    else
    $current_year=$year;
  break;
  }
  else
  {
    $current_season="summer";
   
   $current_year=$year;
  }

}


$sql="SELECT * FROM season WHERE (season_name_en='$current_season' && season_year=$current_year )";
$season_count=$db->getCount($sql,array());
$result=$db->getRows($sql,array());

foreach($result as $value)
{
$id=$value['season_id'];
}




?>







<!-- Begin Page Content  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <div class="jumbotron jumbotron-fluid text-center badge-light">
  <div class="container">
    <h1 class="display-4"><?php echo $current_season.'-'.$current_year ?></h1>
    <p class="lead">This season is the current season </p>
  </div>
</div>
  <!-- Content Row -->
  <div class="row">

  


<?php 
$sql="SELECT * FROM user";
$countAdmin=$db->getCount($sql , array());

$sql="SELECT * FROM department";
$countDep=$db->getCount($sql , array());

$sql="SELECT * FROM season";
$countSeason=$db->getCount($sql , array());

$sql="SELECT * FROM product";
$countProduct=$db->getCount($sql , array());


?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4>Total Admin: <?php echo $countAdmin ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL DEPARTMENT</div>
               <h5>Total Department: <?php echo $countDep ?></h5>
            </div>

          
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Season</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <h5>Total Season: <?php echo $countSeason ?></h5></div>
                </div>
              
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Products</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <h5>Total Products: <?php echo $countProduct ?></h5></div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
 
  <div class=" card-header ">
 <h4> <?php echo $current_season.'-'.$current_year.' '.'Products' ?></h4>
  </div>
        <div class="card-body ">
        <?php 
        $sql="SELECT * FROM product WHERE season_id=$id";
        $result=$db->getRows($sql,array());
        $count=$db->getCount($sql);
        
        ?>


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


      <td><?php echo $season_name_en.'-'.$season_year ?> </td>
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






  <?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;
?>