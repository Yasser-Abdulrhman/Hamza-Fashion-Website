
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
 $did=$_GET['did'];








$sql="SELECT * FROM department WHERE department_id=$did  ";
$result=$db->getRows($sql,array());
foreach($result as $dep_value)
{
    $dep_name=$dep_value['department_name_en'];
    //$dep_id=$dep_value['department_id'];
    $department_image=$value['department_image'];


}


    
$sql="SELECT * FROM season ";
$result=$db->getRows($sql,array());
foreach($result as $season_value)
{
    $season_name=$season_value['season_name_en'];
    $season_year=$season_value['season_year'];
    $season_folder=$season_name.'-'.$season_year;


    $sql="SELECT * FROM product WHERE department_id=$did";
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
                    if(is_dir("img/$dep_name/$season_folder"))
                    {

                        $open= opendir("img/$dep_name/$season_folder");
                            while($rowfile=readdir($open))
                            {
                                @unlink("img/$dep_name/$season_folder/".$rowfile);
                            }
                            closedir($open);

                           rmdir("img/$dep_name/$season_folder/$code");
                    }  
                
}

//delete Season


            
             rmdir("img/$dep_name/$season_folder");

}         


$open= opendir("img/slider");
    @unlink("img/slider/".$department_image);
closedir($open);

rmdir("img/$dep_name");











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


$sql="DELETE FROM product WHERE department_id=$did";
$result=$db->deleteRow($sql,$fff);

$sql="DELETE FROM department WHERE department_id=$did";
$result=$db->deleteRow($sql,$fff);

  header('location:department.php');




 ?>




 <?php 
 
 
 else :
    header('location:index.php');
  
  endif;
 ?>