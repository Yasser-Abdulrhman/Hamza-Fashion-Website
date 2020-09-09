<?php
include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])):
 ?>


<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>





<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="AddAdmin.php" method="POST"  enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label> Last Name </label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Upassword" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Phone">
            </div>
            <div class="form-group">
            <label >Admin Image</label>
            <input type="file" name="fileToUpload" class="form-control"  id="fileToUpload" required >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" href="AddAdmin.php" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admins Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Image </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th>Email </th>
            <th>Password</th>
            <th>Phone</th>
            <th>Actions </th>
          </tr>
        </thead>

        <?php 
$sql="SELECT * FROM user";
$result=$db->getRows($sql,array());
foreach($result as $user):
?>
        <tbody>  
          <tr>
            <td> <?php echo $user['user_id'] ?></td>
            <td>  <img src="includes/img/<?php echo $user['user_email'].'/'.$user['user_image'] ?>" width="50" height="40" class="d-inline-block align-top" alt=""></td>
            <td>  <?php echo $user['user_fname'] ?></td>
            <td>  <?php echo $user['user_lname'] ?> </td>
            <td>    <?php echo $user['user_email'] ?>         </td>
            <td> <?php echo $user['user_password'] ?>          </td>
            <td>0<?php echo $user['user_phone'] ?> </td>
            <td>
            <?php if($user['user_id']!=1): ?>  
            
            <button type="button" class="btn btn-danger" onclick="deleteUser(<?php echo $product['product_id']  ?>)" >
            <i class="fas  fa-trash-alt" ></i>
            </button>



            <script>
            function deleteUser(id)
            {
              if(confirm("Do you want delete this user ?"))
              {
                window.location.href='deleteUser.php?user=' +id+ '';
                return true;
              }
            }


            </script>

       
            
 <a href="editUser.php?pid=<?php echo $user['user_id'] ?>"  > <button type="button" class="btn btn-info">
<i class="fas fa-edit" ></i>
</button></a>  
<?php endif;?>     
            
            
            
             </td>
          </tr>
        
        </tbody>
        <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;
?>


