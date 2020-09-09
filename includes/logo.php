<div class="row" style=" margin-bottom:5px;border-top:solid #00cccc">
<div class="col-md-10">
</div>



    <div class="col-md-2 text-center "  >
 
    <?php foreach($dictionary as $key => $lang_dic):?>
        <?php if($current_lang==$key): ?>
        
        <a href="#" class="badge badge-light justify-content-end"><?php echo $lang_dic['name'] ?></a>  
        <?php else: ?>
        
          <a href="includes/language/lang.php?change=<?php echo $key ?>" class="badge badge-light justify-content-end"> <?php echo $lang_dic['name'] ?> </a>
         <?php endif; ?>
      <?php endforeach; ?> 

      </div>
   

  

 </div>
 

<div class="row">
    <div class="col-md-12" >
        <!-- Just an image -->
        


<!-- Image and text -->




</div>




</div>  

