
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
 $sid=$_GET['sid'];

$sql="SELECT * FROM product WHERE season_id=$sid ";
$result=$db->getRows($sql , array());
foreach($result as $value)
{
  $code=$value['product_code'];
  //$dep_id=$value['department_id'];
  //$season_id=$value['season_id'];

}


$sql="SELECT * FROM season WHERE season_id=$sid";
$result=$db->getRows($sql,array());
foreach($result as $season_value)
{
    $season_name=$season_value['season_name_en'];
    $season_year=$season_value['season_year'];
    $season_folder=$season_name.'-'.$season_year;
}




$sql="SELECT * FROM department ";
$result=$db->getRows($sql,array());
foreach($result as $dep_value)
{
    $dep_name=$dep_value['department_name_en'];

    $sql="SELECT * FROM product WHERE season_id=$sid ";
$result=$db->getRows($sql , array());
foreach($result as $value)
{
  $code=$value['product_code'];
  //$dep_id=$value['department_id'];
  //$season_id=$value['season_id'];
  

    if(is_dir("img/$dep_name/$season_folder/$code"))
    {

            $open= opendir("img/$dep_name/$season_folder/$code/main");
            while($rowfile=readdir($open))
            {
            @unlink("img/$dep_name/$season_folder/$code/main/".$rowfile);
            }
            closedir($open);

            rmdir("img/$dep_name/$season_folder/$code/main");


            $open= opendir("img/$dep_name/$season_folder/$code/gallery");
            while($rowfile=readdir($open))
            {
                @unlink("img/$dep_name/$season_folder/$code/gallery/".$rowfile);
            }
            closedir($open);
            
             rmdir("img/$dep_name/$season_folder/$code/gallery");

          }

             $open= opendir("img/$dep_name/$season_folder");
                while($rowfile=readdir($open))
                {
                    @unlink("img/$dep_name/$season_folder/".$rowfile);
                }
                closedir($open);

                rmdir("img/$dep_name/$season_folder/$code");

}

//delete Season


            
             rmdir("img/$dep_name/$season_folder");




   
}










/*

$sql="SELECT * FROM season WHERE season_id=$sid";
$result=$db->getRows($sql,array());
foreach($result as $season_value)
{
    $season_name=$season_value['season_name_en'];
    $season_year=$season_value['season_year'];
    $season_folder=$season_name.'-'.$season_year;
}

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
*/


$sql="DELETE FROM product WHERE season_id=$sid";
$result=$db->deleteRow($sql,$fff);

$sql="DELETE FROM season WHERE season_id=$sid";
$result=$db->deleteRow($sql,$fff);

  header('location:season.php');




 ?>




 <?php 
 
 
 else :
    header('location:index.php');
  
  endif;
 ?>