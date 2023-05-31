<?php 
session_start();


include_once("c_posts.php");

$pid=$_GET['id'];
$delete=$posts->deletePost($pid);
if($delete){
    echo'updated';
                header('Location:postsmgmt.php');

}else{
    echo'ERROR';
}


?>