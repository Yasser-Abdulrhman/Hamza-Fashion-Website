
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
if(isset($_POST['add']))
{
    $code=$_POST['code'];
    $sql="SELECT * FROM product where product_code=$code";
   $_SESSION['count']=$db->getCount($sql);
  
    $dep_name=$_POST['dep_name'];
    $sql="SELECT * FROM department WHERE department_name_en='$dep_name'";
    $result=$db->getRows($sql,array());
    foreach($result as $value)
    {
        $dep_id=$value['department_id'];
    }

$statement=$_POST['season_id'];
$season=explode(" ",$statement);
$season_id=$season[0];

$sql="SELECT * FROM season WHERE season_id=$season_id";
$result=$db->getRows($sql,array());

foreach($result as $season_value)
{
    $season_name=$season_value['season_name_en'];
    $season_year=$season_value['season_year'];
    $season_folder=$season_name.'-'.$season_year;
}

    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $model_name=$_POST['model_name'];
    $feature=$_POST['featured'];
    $statement=explode(" ",$feature);
    $featured=$statement[0];
    $video=$_POST['video'];
    $date_add=date("Y-m-d H:i:s");

 
    mkdir("img/$dep_name/$season_folder/$code"); 
    mkdir("img/$dep_name/$season_folder/$code/main");  
    mkdir("img/$dep_name/$season_folder/$code/gallery");   
$all_image=array();
    $gallery=$_FILES["fileToUpload_gallery"];
    $image_name=$gallery['name'];
    $image_tmp=$gallery['tmp_name'];
    $file_count=count($image_name);
    for($i = 0 ; $i < $file_count ; $i++)
    {
    
        //$temp=addslashes(file_get_contents($image_tmp[$i]));
        move_uploaded_file($image_tmp[$i]  , "img/$dep_name/$season_folder/$code/gallery/".$image_name[$i]);
        $all_image[]=$image_name[$i];
    }
    $temp=implode(',' , $all_image );
   //$cover="cover";
    //mkdir("img/$dep_name/$season_folder/$code/$cover"); 
    $image=$_FILES["fileToUpload"]["name"];
    $image_tmp=$_FILES["fileToUpload"]["tmp_name"];
    move_uploaded_file( $image_tmp , "img/$dep_name/$season_folder/$code/main/".$image);
   
    
    
  

}






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "designer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['count']>0)
{
    header('location:showProducts.php');

}
else {
$sql = "INSERT INTO product (product_code, department_id, season_id,product_date,product_image,featured,price,discount,video,model_name,gallery)
VALUES ('$code' , '$dep_id', '$season_id' , '$date_add' , '$image' ,'$featured' , '$price' , '$discount','$video' , '$model_name' , '$temp'  )";

if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);
    header('location:showProducts.php');
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