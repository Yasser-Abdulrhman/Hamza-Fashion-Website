<?php 
session_start();
include_once('../database.php');




if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM user WHERE user_email='$email' AND user_password='$password'";
    $count=$db->getCount($sql);
    
    if($count>0)
    {
        $result=$db->getRows($sql, array());
        foreach($result as $user)
        {
            $_SESSION['user_id']=$user['user_id'];   
            $_SESSION['fname']=$user['user_fname'];
            $_SESSION['lname']=$user['user_lname'];
            $_SESSION['email']=$user['user_email'];
            $_SESSION['phone']=$user['user_phone'];
            $_SESSION['image']=$user['user_image'];
        }
        header('location:dashboard.php');
    }
    else 
    {
        header('location:index.php');
      
 
   
    }
}




?>