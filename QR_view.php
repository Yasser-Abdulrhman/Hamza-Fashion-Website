<?php 
include_once('functions.php');
include("includes/language/lang.php");
include_once('database.php');

//get current season and current year
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




?>
<!-- Slider -->






<div class="row" style="margin-top:20px">
<div class="col-md-12" >
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">

    <ol class="carousel-indicators">


    <?php 
$sql_dep="SELECT * FROM department";
$count=$db->getCount($sql_dep); 
$index=0;
$Results_dep=$db->getRows($sql_dep,array());
foreach($Results_dep as $dep):
  $dep_id=$dep['department_id'];
  $dep_name_en=$dep['department_name_en'];
  $dep_name_ar=$dep['department_name_ar'];
  $dep_image=$dep['department_image'];

?>
<?php 
if($index==0):
?>
      <li data-target="#carouselExampleCaptions" data-slide-to="$index" class="active"></li>
<?php else: ?>
      <li data-target="#carouselExampleCaptions" data-slide-to="<?php $index ?>" ></li>
<?php endif; ?>

<?php endforeach; ?>
      
    </ol>



    <div class="carousel-inner">
      
    <?php
    $index=0;
    foreach($Results_dep as $dep):
      $dep_id=$dep['department_id'];
      $dep_name_en=$dep['department_name_en'];
      $dep_name_ar=$dep['department_name_ar'];
      $dep_image=$dep['department_image'];




$sql="SELECT * FROM season WHERE (season_name_en='$current_season' && season_year=$current_year )";
$season_count=$db->getCount($sql,array());
$result=$db->getRows($sql,array());

foreach($result as $value)
{
$id=$value['season_id'];
}



if($index==0):
?>



    <div class="carousel-item active">
        <img src="admin/img/slider/<?php echo  $dep_image ?>" class="d-block w-100 slider" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?php if($current_lang=="EN")
          echo strtoupper($dep_name_en);
          else
          echo $dep_name_ar;
          ?></h5>
          <h2><?php 
          if($current_lang=="EN")
             echo strtoupper( $value['season_name_en']) .' ' .$current_year  ;
             else
             echo strtoupper( $value['season_name_ar']) .' ' .$current_year  ;

?></h2>
          
          <a type="button" class="btn btn-outline-info" href="season.php?sid=<?php echo $id ?>&did=<?php echo $dep_id?>" ><?php echo $expression['discover_all'] ?></a>
        </div>
      </div>
      <?php else: ?>
     
      <div class="carousel-item">
        <img src="admin/img/slider/<?php echo  $dep_image ?>" class="d-block w-100 slider" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?php if($current_lang=="EN")
          echo strtoupper($dep_name_en);
          else
          echo $dep_name_ar;
          ?></h5>
          <h2>
          <?php  if($current_lang=="EN")
             echo strtoupper( $value['season_name_en']) .' ' .$current_year  ;
             else
             echo strtoupper( $value['season_name_ar']) .' ' .$current_year  ;  ?></h2>
          
          <a type="button" class="btn btn-outline-info" href="season.php?sid=<?php echo $id ?>&did=<?php echo $dep_id?>"><?php echo $expression['discover_all'] ?></a>
        </div>
      </div>
      <?php endif; ?>
      <?php $index++; ?>
<?php endforeach; ?>  

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>








</div>
</div>




<?php 

$sql_dep="SELECT * FROM department";
$count=$db->getCount($sql_dep); 
$Results_dep=$db->getRows($sql_dep,array());
$sql_product="SELECT * FROM product WHERE featured=1";
$Results_product=$db->getRows($sql_product,array());






?>








<!-- Show Product  -->




<div class="row">
  <div class="col-md-12">

  <?php 
foreach($Results_dep as $dep):
$dep_id=$dep['department_id'];
$dep_name=$dep['department_name_en'];
?>

<?php

$sql="SELECT * FROM season WHERE (season_name_en='$current_season' && season_year=$current_year )";

$result=$db->getRows($sql,array());

foreach($result as $value)
{
$id=$value['season_id'];
$season_name=$value['season_name_en'];
$season_year=$value['season_year'];
}
//get product where featured=1
if($season_count>0):
$sql="SELECT * FROM product WHERE featured=1 && department_id=$dep_id && season_id=$id ";
$Results=$db->getRows($sql,array());
$count=1;



?>


   <div class="card   shadow" style="margin-top:20px;">
    <div class="card-header  " style="background-color: white;">
        <ul class="nav nav-tabs card-header-tabs "  >
          <li class="nav-item" style="border-top:solid   #00cccc ; " >
             <a class="nav-link active" href="#">
             <?php 
             if($current_lang=="EN")
             echo strtoupper($dep['department_name_en']);
             else 
             echo $dep['department_name_ar'];
             ?> 
             </a>
           </li>
           <?php    if($current_lang=="EN"):  ?>
          <li class="nav-item position-absolute" style="right:5px" >
           <a class="nav-link btn-info" href="season.php?sid=<?php echo $id ?>&did=<?php echo $dep['department_id']?>" style="color: white"><?php echo $expression['more'] ?> ></a>

           </li>
           <?php else: ?>
            <li class="nav-item position-absolute" style="left:5px" >
           <a class="nav-link btn-info" href="season.php?sid=<?php echo $id ?>&did=<?php echo $dep['department_id']?>" style="color: white"><?php echo $expression['more'] ?> ></a>

           </li>
           <?php endif; ?>
         </ul>
         
     </div>
    
  <div class="card-body "> 
    <div class="card-group"  >
     <div class="row">
     


   <?php foreach($Results as $product): 
   $new_price=$product['price']-(($product['discount']/100)*$product['price']);
    ?>
      <div class="card col-md-2 product" style="margin-top:5px">
      <?php if($product['discount']>0): ?>
      <span class="badge badge-info badge-pill position-absolute" ><?php echo $product['discount'].'%' ?></span>
      <?php endif;?>
      <div class="inner">
      <img src="admin/img/<?php echo $dep_name.'/'.$season_name.'-'.$season_year.'/'.$product['product_code'].'/'.'main'.'/'.$product['product_image'] ?>  " class="card-img-top" >
    </div>
  <div class="card-body ">
    <div class="text-center">
    <h6> <?php echo $expression['code'] ?> : <?php echo $product['product_code'] ?></h6>
    <h6><?php echo $expression['pound'].' '.$new_price ; ?> <br>
    
    <?php if($product['discount']>0):  ?>
     <span style="text-decoration: line-through;opacity:.3;margin:5px"><?php echo $expression['pound']  ?>  <?php echo $product['price'] ?></span>
     <?php endif;?>
      </h6> 
    </div>



      <div class="text-center" style="margin-top:5px">
    
<a type="button" class="btn btn-outline-info " href="product.php?pid=<?php echo  $product['product_id'] ?>"  style="margin-top:5px;width:100%"><?php echo $expression['view_details']; ?> </a>
      </div>
    </div>
   </div>
   <?php 
   if($count==6)
   break;
   else
   $count++;
   ?>
   <?php endforeach; ?>
  <?php else:  ?>
    <div class="alert alert-danger" role="alert">
  The current season <?php echo " $current_season" ."-". "$current_year"; ?> not added yet
</div>
  <?php endif;?>
  
  

</div>
</div> 
</div> 

  
</div>






<?php 
endforeach;

?>









</div>
</div>

