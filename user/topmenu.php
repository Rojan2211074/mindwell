<?php
echo "Welcome, ".$_SESSION['username']. " ";
echo "<a href=logout.php>Logout</a><hr>";
echo "<hr>";
echo "<a href=usermgmt.php>User</a> |"; 
echo "<a href=articlemgmt.php>Article</a> |" ;
echo "<a href=commentmgmt.php>Comment</a> |" ;
echo "<hr>";
?>