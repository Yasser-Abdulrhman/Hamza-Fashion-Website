
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
 //$pid=$_GET['pid'];
$sql="SELECT * FROM product";
$result=$db->getRows($sql , array());
foreach($result as $value)
{
  $code=$value['product_code'];
  $pid=$value['product_id'];
  $dep_id=$value['department_id'];
  $season_id=$value['season_id'];

  $sql="SELECT * FROM department WHERE department_id=$dep_id";
  $result=$db->getRows($sql,array());
  foreach($result as $dep_value)
  {
      $dep_name=$dep_value['department_name_en'];
     
  }


  
$sql="SELECT * FROM season WHERE season_id=$season_id";
$result=$db->getRows($sql,array());
foreach($result as $season_value)
{
    $season_name=$season_value['season_name_en'];
    $season_year=$season_value['season_year'];
    $season_folder=$season_name.'-'.$season_year;
}

if(is_dir("img/$dep_name/$season_folder/$code"))
{
$open= opendir("img/$dep_name/$season_folder/$code/main");
while($rowfile=readdir($open))
{
  unlink("img/$dep_name/$season_folder/$code/main/".$rowfile);
}
closedir($open);

 rmdir("img/$dep_name/$season_folder/$code/main");


 $open= opendir("img/$dep_name/$season_folder/$code/gallery");
 while($rowfile=readdir($open))
 {
   unlink("img/$dep_name/$season_folder/$code/gallery/".$rowfile);
 }
 closedir($open);
 
  rmdir("img/$dep_name/$season_folder/$code/gallery");


$open= opendir("img/$dep_name/$season_folder/$code");
while($rowfile=readdir($open))
{
  unlink("img/$dep_name/$season_folder/$code/".$rowfile);
}
closedir($open);

 rmdir("img/$dep_name/$season_folder/$code");
}
 
$sql="DELETE FROM product WHERE product_id=$pid";
$result=$db->deleteRow($sql,$fff);

}








header('location:showProducts.php');




 ?>




 <?php 
 
 
 else :
    header('location:index.php');
  
  endif;
 ?>