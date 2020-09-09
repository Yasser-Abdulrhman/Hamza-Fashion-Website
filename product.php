
<?php


   ob_start();
   session_start();
   include_once("database.php");
   include_once('functions.php');
   include("includes/language/lang.php");
?>

<?php


$pid=$_GET['pid'];
$pro_sql="SELECT * FROM product WHERE product_id=$pid";
$result=$db->getRows($pro_sql,array());
foreach($result as $product)
{
    $product_code=$product['product_code'];
    $dep_id=$product['department_id'];
    $season_id=$product['season_id'];
    $product_img=$product['product_image'];
    $price=$product['price'];
    $discount=$product['discount'];
    $video=$product['video'];
    $model_name=$product['model_name'];
    $gallery=$product['gallery'];

}
$new_price=$price-(($discount/100)*$price);

$season_sql="SELECT * FROM season WHERE season_id=$season_id";
$result=$db->getRows($season_sql,array());
foreach($result as $season)
{
    $season_name_en=$season['season_name_en'];
    $season_name_ar=$season['season_name_ar'];
    $season_year=$season['season_year'];
}
$season_folder=$season_name_ar.'-'.$season_year;

$dep_sql="SELECT * FROM department WHERE department_id=$dep_id";
$result=$db->getRows($dep_sql,array());
foreach($result as $department)
{
    $dep_name_en=$department['department_name_en'];
    $dep_name_ar=$department['department_name_ar'];
    
}




?>

<div style="margin-top:20px" >
      <a href="index.php" class="badge badge-info"> <?php echo $expression['home'] ?> </a> <span> > </span>
      <a href="season.php?sid=<?php echo $season_id?>&did=<?php echo $dep_id ?>" class="badge badge-info">
      <?php if($current_lang=="EN")
      echo  $dep_name_en.'-'.$season_name_en.'-'.$season_year ;
      else 
      echo  $dep_name_ar.'-'.$season_name_ar.'-'.$season_year ;
      ?></a> <span> > </span> <span><?php echo $expression['code'] .':' .' '. $product_code ?> </span>
    </div>

  <div class="row">


   <div class="col-md-12">
     

        <div class="card"style="margin-top:20px">
        <div class="card-body">
        <div class="row" >
        <div class="col-md-4">
        <div class="img-container" style="">
        <img src="admin/img/<?php echo $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$product_code.'/'.'main'.'/' .$product_img ?>" class="card-img-top card card img-thumbnail " id="imagebox"  alt="..." style="height:530px">
        </div>
        <div class="" style="width:100%;margin-top:5px">

      <?php 
      $img=explode(',', $gallery);
    

      ?>

      <?php  for($i=0 ;$i< count($img) ; $i++ ):?>
      <img src="admin/img/<?php echo  $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$product_code.'/'.'gallery'.'/' .$img[$i]; ?>"  class=" product-small-img " style="width:60px;height:60px"  onclick="myFunction(this)">
      <?php endfor; ?>

      </div>
      </div>





      <div class="col-md-5">
      <div class="card">

      <div class="card-body">

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><h4> 
        <?php 
          if($current_lang=="EN")
          echo strtoupper( $dep_name_en).'-'. strtoupper($season_name_en).'-'.$season_year ;
          else 
          echo  $dep_name_ar.'/'.$season_name_ar.'/'.$season_year ;
      ?>  </h4> </li>
        <li class="list-group-item"> <span class="font-weight-bold"> <?php echo  $expression['code'] ?> :</span> <?php echo $product_code ?></li>
        <li class="list-group-item"><h1 class=" font-weight-bold">  <?php echo $expression['pound'].' '. $new_price ?> </h1> 
      <h6 style="text-decoration: line-through;opacity:.8"><?php echo $expression['pound'].' '.$price  ?></h6> <span class="badge badge-info  "> <?php echo  $discount.'%' ?> </span>
        </li>
        <li class="list-group-item" > <span class="font-weight-bold">  <?php echo $expression['model_name'] ?> : </span> <?php echo ' '.$model_name  ?></li>
        <li class="list-group-item"></li>
      </ul>
      </div>
      </div>
      </div>




      <div class="col-md-3 ">
        <div class="card" style="">
        <div class="card-header bg-white">
        <?php echo $expression['more_dresses'] ?> 
        </div>
        <div class=" card-body">
        <?php
          $sql="SELECT * FROM product WHERE department_id=$dep_id";
          $result=$db->getRows($sql , array());
          $count=1;
          foreach($result as $product):
          $image=$product['product_image'];
          $code=$product['product_code'];
          $product_id=$product['product_id'];
          $season_id=$product['season_id'];

          $season_sql="SELECT * FROM season WHERE season_id=$season_id";
          $result=$db->getRows($season_sql,array());
          foreach($result as $season)
          {
              $season_name_en=$season['season_name_en'];
              $season_name_ar=$season['season_name_ar'];
              $season_year=$season['season_year'];
          }
          $season_folder=$season_name_ar.'-'.$season_year;

          ?>

 
 
 <a href="product.php?pid=<?php echo $product_id?>" > <img src="admin/img/<?php echo $dep_name_en.'/'.$season_name_en.'-'.$season_year.'/'.$code.'/'.'main'.'/' .$image ?>" class="img-thumbnail float-right " id="imagebox"  alt="..." style="width:50%">
</a>
<?php 
   if($count==4)
   break;
   else
   $count++;
   ?>


<?php

endforeach;
?>

        </div>
        </div>
      </div>





</div>




</div>




<?php
      $text=$video;
      $text=preg_replace("#.*youtube\.com/watch\?v=#" , "" , $text);
      ?>
      <div class="card-body">
          <iframe width="100%" height="500" src="<?php echo 'https://www.youtube.com/embed/'.$text ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          </iframe>  
      </div>   

</div>



</div>











  </div>
  














<?php
$content=ob_get_contents();
ob_end_clean();
include("master.php");
?>


