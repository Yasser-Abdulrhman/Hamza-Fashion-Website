
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):
    
 ?>
<?php 


$pid=$_SESSION['pid'];

$sql="SELECT * FROM product WHERE product_id=$pid";
$result=$db->getRows($sql,array());
foreach($result as $product)
{
    $product_code=$product['product_code'];
    $product_dep=$product['department_id'];
    $product_season=$product['season_id'];
    $product_image=$product['product_image'];
    $product_feature=$product['featured'];
    $product_price=$product['price'];
    $product_discount=$product['discount'];
    $product_video=$product['video'];
    $product_model=$product['model_name'];
    $product_gallery=$product['gallery'];
}


 
  


?>














 <?php 
if(isset($_POST['update']))
{
   // $sid=$_SESSION['sid'];
    $Ncode=$_POST['code'];
    $sql="SELECT * FROM product where product_code=$Ncode AND product_id!=$pid";
   $_SESSION['count']=$db->getCount($sql);
  
    $dep_name=$_POST['dep_name'];
    $sql="SELECT * FROM department WHERE department_name_en='$dep_name'";
    $result=$db->getRows($sql,array());
    foreach($result as $value)
    {
        $dep_id=$value['department_id'];
    }

$statement=$_POST['season_id'];
$season=explode("-",$statement);
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
//echo $season_id;

   //$_SESSION['code']=$Ncode;
   // mkdir("img/$dep_name/$season_folder/$code" );
   if($Ncode!=$product_code)
   { rename("img/$dep_name/$season_folder/$product_code", "img/$dep_name/$season_folder/$Ncode");
   }



   if(isset($_FILES['fileToUpload_gallery']['name']) && ($_FILES['fileToUpload_gallery']['name'][0]!=""))
   { 
    $all_image=array();
    $gallery=$_FILES["fileToUpload_gallery"];
    $image_name=$gallery['name'];
    $image_tmp=$gallery['tmp_name'];
    

    $open= opendir("img/$dep_name/$season_folder/$Ncode/gallery");
    while($rowfile=readdir($open))
    {
      unlink("img/$dep_name/$season_folder/$Ncode/gallery/$rowfile");
    }
    closedir($open);


    $file_count=count($image_name);
    for($i = 0 ; $i < $file_count ; $i++)
    {
    
        //$temp=addslashes(file_get_contents($image_tmp[$i]));
        move_uploaded_file($image_tmp[$i]  , "img/$dep_name/$season_folder/$Ncode/gallery/".$image_name[$i]);
        $all_image[]=$image_name[$i];
    }
    $temp=implode(',' , $all_image );
   }
    
else 
{
    $temp=$product_gallery;

}

   if(isset($_FILES['fileToUpload']['name']) AND ($_FILES['fileToUpload']['name']!=""))
{

    $image=$_FILES["fileToUpload"]["name"];
    $image_tmp=$_FILES["fileToUpload"]["tmp_name"];

    $open= opendir("img/$dep_name/$season_folder/$Ncode/main");
    while($rowfile=readdir($open))
    {
      unlink("img/$dep_name/$season_folder/$Ncode/main/$rowfile");
    }
    closedir($open);

  


    move_uploaded_file( $image_tmp , "img/$dep_name/$season_folder/$Ncode/main/".$image);
   
}


else
{
    $image=$product_image;
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
  
    header("Location:editProduct.php?pid=".$pid);

}
else {

   // $code' , '$dep_id', '$season_id' , '$date_add' , '$image' ,'$featured' , '$price' , '$discount','$video' , '$model_name' , '$temp'
  // product_code, department_id, season_id,product_date,product_image,featured,price,discount,video,model_name,gallery

  $sql="UPDATE product SET product_code='$Ncode' , department_id='$dep_id' , season_id='$season_id' , product_date='$date_add',product_image='$image',featured='$featured',price='$price',discount='$discount',video= '$video',model_name='$model_name',gallery='$temp'
   WHERE product_id= $pid";

if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);
    //unset($_SESSION['sid']);
    //header('Refresh: 1; url=showProducts.php');
   //header('location:editProducts.php?pid=');
   header("Location:editProduct.php?pid=".$pid);
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