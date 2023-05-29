<?php session_start(); 
$editid=$_GET['id'];
$action=$_GET['action'];

if(!empty($_GET['id'] && $action=="activate")){
    $sqlactive ="UPDATE comment SET status=1 WHERE id=$editid";
    include("../connection.php");
    $qryactive=mysqli_query($conn, $sqlactive) or die(mysqli_error($conn));
}else if(!empty($_GET['id'] && $action=="deactivate")){
    $sqlactive ="UPDATE comment SET status=0 WHERE id=$editid";
    include("../connection.php");
    $qryactive=mysqli_query($conn, $sqlactive) or die(mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> comment Management</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include_once("topmenu.php")?>
    <div class="container">
    <div class="row">
        <div class="col-xxl-12">
            <?php
            $sql="SELECT * FROM comment ORDER BY id DESC";
            include("../connection.php");
            $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $count=mysqli_num_rows($qry);
            echo "We have total $count Records";

            if($count>=1){
            echo "
            
            <table class='table table-striped table-hover'>
            <thead><th>Comment_id</th><th>User_id</th><th>Article_ID</th><th>Message</th><th>Status</th></thead>
            ";
            while($row=mysqli_fetch_array($qry)){
                echo"
            <tr>
            <td>".$row['id']."</td>
            <td>".$row['user_id']."</td>
            <td>".$row['article_id']."</td>
            <td>".$row['message']."</td>
            <td>"
                    .$row['status'].
            "<form><a href='commentmgmt.php?id=".$row['id']."&action=activate'>ACTIVATE</a></form>
            <form><a href='commentmgmt.php?id=".$row['id']."&action=deactivate'>DEACTIVATE</a></form>
            </td>
            </tr>
            ";

            }
        echo"</table>";
        }
            ?>
        </div>
    </div>
    </div>

</body>
</html>