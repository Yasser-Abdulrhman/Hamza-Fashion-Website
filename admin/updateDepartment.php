
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):
    
 ?>

 <?php 
if(isset($_POST['update']))
{
    $did=$_SESSION['did'];
    //did=$_GET['did'];
    //$did=$_GET['did'];

$sql="SELECT * FROM department WHERE department_id=$did";
$result=$db->getRows($sql,array());
foreach($result as $value)
{
    $dep_name=$value['department_name_en'];
    //$seasonyear=$value['season_year'];
    $dep_image=$value['department_image'];
}
$old_department_folder=$dep_name;

    $enName=$_POST['enName'];
    $arName=$_POST['arName'];
    //$season_year=$_POST['year'];

    $sql="SELECT * FROM department where department_name_en=$enName && department_name_ar=$arName ";
   $_SESSION['count']=$db->getCount($sql);
   
   $new_department_folder=$enName;

   if($old_department_folder!=$new_department_folder)
   { rename("img/$old_department_folder", "img/$new_department_folder");
   }
 
    $date_add=date("Y-m-d H:i:s");



    if(isset($_FILES['fileToUpload']['name']) AND ($_FILES['fileToUpload']['name']!=""))
    {
    
        $image=$_FILES["fileToUpload"]["name"];
        $image_tmp=$_FILES["fileToUpload"]["tmp_name"];

    
     
        $open= opendir("img/slider");
        unlink("img/slider/".$dep_image);
        

        closedir($open);
    
      
    
    
        move_uploaded_file( $image_tmp , "img/slider/".$image);
       
    }
    
    
    else
    {
        $image=$dep_image;
    }
    
  

}






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "designer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET CHARACTER SET utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['count']>0)
{
    header('location:department.php');

}
else {

$sql="UPDATE department SET department_name_en='$enName' , department_name_ar='$arName' , department_image='$image' , department_date='$date_add'  WHERE department_id= $did";

if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);

   

  

    unset($_SESSION['did']);
    
   header('location:department.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}

//header('location:show.php');




 ?>




 <?php 
 
 
 else :
    header('location:index.php');
  
  endif;
 ?>