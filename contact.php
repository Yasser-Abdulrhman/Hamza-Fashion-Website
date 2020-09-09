<?php
   ob_start();
   session_start();
   include_once("database.php");
  // include("QR_view.php");



  $sql="SELECT * FROM contact";
  $result=$db->getRows($sql,array());
  foreach($result as $value)
  {
    $address=$value['address'];
    $email=$value['email'];
    $phone1=$value['phone1'];
    $phone2=$value['phone2'];
  }
?>



<div class="card text-center" style="width: 100%; margin-top:20px">
  <div class="card-body">
    <h4 class="card-title font-weight-bold">Contact Us On</h4>
    <h5> Moblie : 0<?php echo $phone1?></h5>
    <h5> Moblie : 0<?php echo $phone2?></h5>
    <h5> Address : <?php echo $address?></h5>
    <h5> Email : <?php echo $email?></h5>
    <h4 class="card-title font-weight-bold"> FB . Hamza Fashion Cuture </h4>
   
    
  </div>
</div>




<?php
$content=ob_get_contents();
ob_end_clean();
include("master.php");
?>