<?php 
include_once('database.php');

// get departments
function get_dep(){
$sql="SELECT * FROM department ";
$Results=$db->getRows($sql,array());
return $Results;
}

// get department by attribute
function get_onedep($table,$paramter){
    $sql="SELECT * FROM department where $table=$paramter ";
    $Results=$db->getRows($sql,array());
    return $Results;
}

// get seasons 
function get_season(){
$sql="SELECT * FROM season ";
$Results=$db->getRows($sql,array());
return $Results;
}

// get season  by attribute
function get_oneseason($table,$paramter){
    $sql="SELECT * FROM season where $table= $paramter";
    $Results=$db->getRows($sql,array());
    return $Results;
}






?>