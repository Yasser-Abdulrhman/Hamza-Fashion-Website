
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
if(isset($_POST['add']))
{
    $enName=$_POST['enName'];
    $arName=$_POST['arName'];
    
    $sql="SELECT * FROM Department where department_name_en=$enName && department_name_ar=$arName ";
   $_SESSION['count']=$db->getCount($sql);
  
 $department_folder=$enName;
    $date_add=date("Y-m-d H:i:s");

    $image=$_FILES["fileToUpload"]["name"];
    $image_tmp=$_FILES["fileToUpload"]["tmp_name"];

    move_uploaded_file( $image_tmp , "img/slider/".$image);

  
    
  

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
$sql = "INSERT INTO department ( department_name_en,department_name_ar, department_image, department_date)
VALUES ('$enName' , '$arName', '$image' , '$date_add' )";

if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);

    mkdir("img/$department_folder");

    
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