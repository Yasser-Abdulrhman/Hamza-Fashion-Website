<?php
include_once("database.php");
$sql = "SELECT * FROM department  ";
$dquery = $db->getRows($sql,array());

$sql="SELECT * FROM logo";
$result=$db->getRows($sql,array());
foreach($result as $value)
{
  $id=$value['id'];
  $logo=$value['logo'];
}
?>





<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-expand-lg navbar-light shadow" style="margin-top:10px;background-color:#fff; border-left:1px solid;border-right:1px solid ">
 
<a class="navbar-brand" href="index.php">
    <img src="includes/image/logo/<?php echo $logo?>" width="150" height="40" class="d-inline-block align-top" alt="">
    
  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-size:20px;">
    <ul class="navbar-nav  ">
      <?php foreach ($dquery as $department):
      $dep_id=$department['department_id'];
        ?>
    <li class="nav-item dropdown  navedite">
        <a class="nav-link "  href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if($current_lang=="EN"): ?>
         <?php echo strtoupper( $department['department_name_en']); ?>
           <?php else: ?>
           <?php echo  $department['department_name_ar']; ?>
          <?php endif; ?>
        </a>
<?php 
$sql2 = "SELECT * FROM season " ;
$squery=$db->getRows($sql2,array());
?>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <?php foreach($squery as $season): ?>
          <?php if($current_lang=="EN"): ?>
          <a class="dropdown-item season" href="season.php?sid=<?php echo  $season['season_id']?>&did=<?php echo $department['department_id'] ?> "><?php echo $season['season_name_en']. '-'. $season['season_year']  ; ?>  </a>
          <?php else: ?>
          <a class="dropdown-item season" href="season.php?sid=<?php echo  $season['season_id']?>&did=<?php echo $department['department_id'] ?>"><?php echo $season['season_name_ar']. '-'. $season['season_year']  ; ?>  </a>
          <?php endif; ?>
         <?php endforeach ; ?>
        </div>
      </li> 
      <?php endforeach ;?>
     

    </ul>
 
 
</nav>


</div>
</div>















