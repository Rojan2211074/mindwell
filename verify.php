<?php
include_once("connection.php");
if(isset($_GET["email"]) && isset($_GET["email"])){
    $email = $_GET["email"];
    $vcode = $_GET["vcode"];

    $query = "SELECT * FROM `users` WHERE `email`='$email' AND `vcode`='$vcode'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['status'] == 0){
                $update = "UPDATE `users` SET `status`='1' WHERE `email`='$result_fetch[email]'";

                if(mysqli_query($conn, $update)){
                    echo "Email VERIFIED";
                    header("location: index.php");
                } else{
                    header("location: index.php");
                    echo "ERROR";
                }
            } else{
                header("location: index.php");
                echo "ERROR";
            }
        } else{
            header("location: index.php");
            echo "ERROR";
        }
    }
}
?>
