<?php 
include_once("database.php");
$sql="SELECT * FROM social";
$result=$db->getRows($sql,array());
foreach($result as $value)
{
  $facebook=$value['facebook'];
  $twitter=$value['twitter'];
  $instgram=$value['instgram'];
  $youtube=$value['youtube'];
}

?>






<div class="card-footer "  style="background-color:#fff;margin-top:30px;">

<div class="row" >
<div class="col-md-12"  >
<div class="row" >
<div class="col-md-4" style=""> 
<ul class="nav flex-column">
  <li class="nav-item">
  <a class="nav-link" href="contact.php"><i class="fas fa-phone-square-alt"></i> <?php echo $expression['contact'] ?></a>
  </li>
 
</ul>
</div>

<div class="col-md-4" style=""> 
<ul class="nav flex-column">
  
 
 
  
</ul>
</div>


<div class="col-md-4 text-center" >

   <div  class="footer" ><span style="margin:10px" ><?php echo $expression['follow'] ?>  </span> 
    <a href="<?php echo $facebook ?>"> <i class="fab  fa-facebook" style="margin:5px;color:black;font-size:25px;color:#3578E5"></i></a>
    <a href="<?php echo $instgram ?>"> <i class="fab  fa-instagram" style="margin:5px;color:black;font-size:25px"></i></a>
    <a href="<?php echo $youtube ?>"><i class="fab  fa-youtube" style="margin:5px;color:black;font-size:25px;color:red"></i></a>
    <a href="<?php echo $twitter ?>"><i class="fab  fa-twitter" style="margin:5px;color:black;font-size:25px;color:#00cccc"></i></a>
   </div>


</div>

</div>
</div>
</div>


 



</div>
 

<div class=" font-weight-bold" style="width:100%; text-align:center;">
<h6> &copy;  <?php echo date("Y");?> <?php echo $expression['site'] ?> , <?php echo $expression['rights'] ?> </h6>
</div>







    <script src="includes/js/jquery-3.3.1.slim.min.js"></script>
    <script src="includes/js/popper.min.js"></script>
    <script src="includes/js/bootstrap.min.js"></script>
    <script src="includes/js/bootstrap-dropdownhover.min.js"></script>


     <!-- Display List Or Grid -->
    <script>
      $(document).ready(function() {
      $('#list').click(function(event){event.preventDefault();
      $('#products .item').addClass('list-group-item');});
      $('#grid').click(function(event){event.preventDefault();
      $('#products .item').removeClass('list-group-item');
      $('#products .item').addClass('grid-group-item');});
     });



     function myFunction(smallImg)
 {
    var fullimg = document.getElementById("imagebox");
    fullimg.src=smallImg.src;
}


    
</script>  




  </body>
</html>