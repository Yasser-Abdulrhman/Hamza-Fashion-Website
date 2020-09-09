<?php 

include_once('../database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

 




  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          <div class="card text-center  shadow" style="margin-top:100px">
                <div class="card-header badge-info" >
                Login To Dashboard
                </div>
                <div class="card-body">
                <form method="POST" action="process.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <button type="submit" name="login" href="process.php" class="btn btn-info">Login</button>
                </form>
                </div>
                
                </div>
 

          </div>
          <div class="col-md-4">
          </div>
</div>
</div>
  
 





</body>



