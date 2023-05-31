<?php 
session_start();


include_once("c_categories.php");

$cid=$_GET['id'];
$delete=$categories->deleteCategory($cid);
if($delete){
    echo'updated';
                header('Location:catagorymgmt.php');

}else{
    echo'ERROR';
}


?>