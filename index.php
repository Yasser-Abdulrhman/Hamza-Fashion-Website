<?php
   ob_start();
   session_start();
   include_once("database.php");
   include("QR_view.php");
?>



<?php
$content=ob_get_contents();
ob_end_clean();
include("master.php");
?>
