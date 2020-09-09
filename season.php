<?php
   ob_start();
   session_start();
   include_once("database.php");
   include("includes/language/lang.php");

  

   $sid=$_GET['sid'];
   $did=$_GET['did'];
   //$sname=$_GET['season_name'];
   $dep_sql=" SELECT * FROM department WHERE department_id=$did ";
   $result=$db->getRows($dep_sql,array());
   foreach($result as $product)
   {
    $dname_en=$product['department_name_en'];
    $dname_ar=$product['department_name_ar'];
    
   }
   $season_sql=" SELECT * FROM season WHERE season_id=$sid ";
   $result=$db->getRows($season_sql,array());
   foreach($result as $product)
   {
    $sname_en=$product['season_name_en'];
    $sname_ar=$product['season_name_ar'];
     $pyear=$product['season_year'];
   }

   




   
?>

<div style="margin-top:20px" >
      <a href="index.php" class="badge badge-info"> <?php echo $expression['home'] ?> </a> <span> > </span>
      <a href="season.php?sid=<?php echo $season_id?>&did=<?php echo $dep_id ?>" class="badge badge-info">
      <?php if($current_lang=="EN")
      echo  $dname_en.'-'.$sname_en.'-'.$pyear ;
      else 
      echo   $dname_ar.'-'.$sname_ar.'-'.$pyear ;
      ?></a> <span> </span> <span><?php //echo $expression['code'] .':' .' '. $product_code ?> </span>
    </div>




<div class="row">



    <div class="col-md-12">


    

<div class="card" style="margin-top:15px">
 
  <div class="card-body">
<div class="card-header bg-white">


  <div class="" style="width:100%;text-align:center;margin-top:10px; margin-bottom:20px">
    <h3 style="">
    <?php
    if($current_lang=="EN")
    echo strtoupper($dname_en);
    else
    echo$dname_ar;
    ?>
    <h3>
    <h2 style="color:#00cccc"> 
    <?php
     if($current_lang=="EN")
    echo strtoupper($sname_en).' '.$pyear; 
    else
    echo $sname_ar.' '.$pyear; 
    ?>
    </h2>
  
    </div>
    </div>
 






  <div class="card-group text-center">
    <div class="row">

<?php 
$sql="SELECT * FROM product WHERE department_id =$did && season_id=$sid ";
$result=$db->getRows($sql , array());
foreach($result as $product):
  $new_price=$product['price']-(($product['discount']/100)*$product['price']);
?>


  <div class="card col-md-2 product" style="margin-top:20px">
  <?php if($product['discount']>0): ?>
      <span class="badge badge-info badge-pill position-absolute" ><?php echo $product['discount'].'%' ?></span>
      <?php endif;?>
      <div class="inner">
      <img src="admin/img/<?php  echo $dname_en.'/'.$sname_en.'-'.$pyear.'/'.$product['product_code'].'/'.'main'.'/'.$product['product_image'] ?>" class="card-img-top" alt="...">
    </div>
    <div class="card-body">
    <h6> <?php echo $expression['code'] ?> : <?php  echo $product['product_code']?></h6>
    <h6><?php echo $expression['pound'].' '.$new_price; ?> <br>
    <?php if($product['discount']>0):  ?>
     <span style="text-decoration: line-through;opacity:.3;margin:5px"><?php echo $expression['pound'] ?> 2000</span>
     <?php endif;?>
     </h6>
    <div class="text-center" style="margin-top:5px">
    <a type="button" class="btn btn-outline-info " href="product.php?pid=<?php echo  $product['product_id'] ?>"  style="margin-top:5px;width:100%"><?php echo $expression['view_details']; ?> </a>
    </div>
    </div>
  </div>

<?php endforeach; ?>

 
 
 
</div>
</div> 
    
  </div>
</div>



</div>
</div>
<?php
$content=ob_get_contents();
ob_end_clean();
include("master.php");
?>
