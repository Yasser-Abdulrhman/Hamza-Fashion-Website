<?php 
session_start();

 unset($_SESSION['user_id']);   
 unset($_SESSION['fname']);
 unset($_SESSION['lname']);
 unset($_SESSION['email']);   
 unset($_SESSION['phone']);
 unset($_SESSION['image']);

 header('Location:index.php');

?>