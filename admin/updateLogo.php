
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):
    
 ?>

 <?php 
if(isset($_POST['update']))
{
  

    $sql="SELECT * FROM logo";
    $result=$db->getRows($sql,array());
    foreach($result as $value)
    {
        $id=$value['id'];
      $logo=$value['logo'];
    }



   



    if(isset($_FILES['fileToUpload']['name']) AND ($_FILES['fileToUpload']['name']!=""))
    {
    
        $image=$_FILES["fileToUpload"]["name"];
        $image_tmp=$_FILES["fileToUpload"]["tmp_name"];

    
     
        $open= opendir("../includes/image/logo");
        unlink("../includes/image/logo/".$logo);
        

        closedir($open);
    
      
    
    
        move_uploaded_file( $image_tmp , "../includes/image/logo/".$image);
       
    }
    
    
    else
    {
        $image=$logo;
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


$sql="UPDATE logo SET logo='$image' WHERE id= $id";


if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);

   

  


    
   header('location:editeLogo.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




//header('location:show.php');




 ?>




 <?php 
 
 
 else :
    header('location:index.php');
  
  endif;
 ?>