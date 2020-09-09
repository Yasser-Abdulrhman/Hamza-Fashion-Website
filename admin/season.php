
<?php

include_once("../database.php");
session_start();
if(isset($_SESSION['user_id'])): 
  
?>

 
<?php
//get product
$sql="SELECT * FROM season";
$result=$db->getRows($sql,array());
$count=$db->getCount($sql);




?>






<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- Begin Page Content -->



<div class="modal fade " id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Season</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addSeason.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

        <div class="modal-body ">

        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">English Name</label>
      <input type="text" class="form-control"  placeholder="English Name" name="enName" value="" required>
    </div>
  


    <div class="form-group col-md-6">
      <label for="inputEmail4">Arabic Name</label>
      <input type="text" class="form-control"  placeholder="Arabic Name" name="arName" value="" required>
    </div>

    <div class="form-group col-md-12">
      <label for="inputEmail4">Season Year</label>
      <input type="number" class="form-control"  placeholder="Season Year" name="year" value="" required>
    </div>

  
  

  </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary" href="addSeason.php">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>






<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Season Managment</h1>
  </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             + Add New Season
            </button>
    </h6>
  </div>

  <?php 
  
  if(isset($_SESSION['count'])&&$_SESSION['count']>0): 
  unset($_SESSION['count']);
  ?>
    <div class="alert alert-info" role="alert">
  This Product Code You Entered Is Already Exist!!!
</div>

  <?php  else:?>
  

  <?php if($count>0): ?>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>English Name </th>
            <th>Arabic Name </th>
            <th>Year </th>
            <th>Date Added</th>
          
            
            <th>Actions</th>
          </tr>
        </thead>

  
        <?php  
foreach($result as $season):
  

?>
  
        <tbody>
     
          <tr>
            <td><?php  echo $season['season_id']?> </td>
            
            <td> <?php echo $season['season_name_en'] ?>   </td>
         
            <td> <?php echo $season['season_name_ar'] ?>   </td>
            
            <td> <?php echo $season['season_year'] ?>   </td>

            <td> <?php echo $season['season_date'] ?>   </td>

            <td> 


            <button type="button" class="btn btn-danger" onclick="deleteSeason(<?php echo $season['season_id'] ?>)" >
            <i class="fas  fa-trash-alt" ></i>
            </button>



            <script>
            function deleteSeason(id)
            {
              if(confirm("Do you want delete this season?"))
              {
                window.location.href='deleteSeason.php?sid=' +id+ '';
                return true;
              }
            }


            </script>
   
            
 <a href="editSeason.php?sid=<?php echo $season['season_id'] ?>"  > <button type="button" class="btn btn-info">
<i class="fas fa-edit" ></i>
</button></a>   
 
            
             </td>
            
          
          </tr>
         
        </tbody>
<?php endforeach; ?>
      </table>

    </div>
  </div>
</div>

</div>
<?php else: ?>
  <div class="alert alert-info" role="alert">
  No Season Added Yet
</div>

  <?php endif; ?>

  <?php endif; ?>

  <?php
include('includes/scripts.php');
include('includes/footer.php');


else :
  header('location:index.php');

endif;
?>

<script>
function myFunction() {

  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>