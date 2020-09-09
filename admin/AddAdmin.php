
<?php


include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):

 ?>

 <?php 
if(isset($_POST['add']))
{
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email=$_POST['email'];
    $user_password=$_POST['Upassword'];
    $confirmpassword=$_POST['confirmpassword'];
    $phone=$_POST['phone'];

    mkdir("includes/img/$email");

    $image=$_FILES["fileToUpload"]["name"];
    $image_tmp=$_FILES["fileToUpload"]["tmp_name"];

    move_uploaded_file( $image_tmp , "includes/img/$email/".$image);

    $sql="SELECT * FROM user where user_email=$email  ";
    $_SESSION['count']=$db->getCount($sql);
    
  

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
    header('location:Admins.php');

}
else {
$sql = "INSERT INTO user ( user_fname,user_lname,user_email,user_password,user_phone,user_image)
VALUES ('$first_name' , '$last_name' , '$email' , '$user_password' , '$phone' , '$image' )";

if ($conn->query($sql) === TRUE) {
    //print_r($temp);
    //var_dump($temp);
    
   header('location:Admins.php');
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