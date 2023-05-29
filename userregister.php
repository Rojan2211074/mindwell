<?php session_start(); 
include_once("c_users.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        //getting users info
        $user=$_POST["username"];
        $pass=md5($_POST["password"]);
        $email=$_POST["email"];
        $v_code=bin2hex(random_bytes(16));

        $imgname=$_FILES["profile"]["name"];
        //to capture the image size
        $size=$_FILES["profile"]["size"];
        //to capture the image type
        $type=$_FILES["profile"]["type"];
        //to capture the temporary name
        $tmpname=$_FILES["profile"]["tmp_name"];
        //file upload location
        $uploadlocation="uploads/profiles/".$imgname;

        //Preparing the sql statement
        // $sql = "INSERT INTO users(username, password, email)VALUES('$user', '$pass', '$email')";
        // //making connection
        // include_once("connection.php");
        // //executing query
        // $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $reg = $users->registerUser($user,$pass,$email,$imgname,$v_code,$tmpname,$uploadlocation);
        // if($reg){
        //     header("location:index.php");
        // }else{
        //     echo"Failed to create account. Contact WEBMASTER.";
        // }
        if($reg){
            //     mail system in test
            // More headers
            $from="mindwell@rlshrestha.com.np";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From:' . $from;
  

            $message = "Thank you for registration with us <b>Hi ".$user."</b> , Thank you for registration with us. Please clcik below link to verify your account. ";

            $message.="<a href='rlshrestha.com.np/verify.php?email=$email&vcode=$v_code'>Verify</a>";
            $subject= "Thank you for registration with us";

            if(mail($email, $subject,  $message, $headers)){
                echo "Email Send";
            }
            else{
                echo "Unable to send the email";
            }
            echo "Data Inserted Successfully";
            
        }
    }
    ?>
    <h1>User Registration Form</h1>
    <form method="post" action="" name="login" enctype="multipart/form-data">
        <fieldset>
            <legend>UserRegistration</legend>
            <input type="text" name="username" placeholder="Username">
            <br>
            <input type="file" name="profile">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <input type="email" name="email" placeholder="you@domain.com">
            <br>
            <input type="submit" name="submit" value="Register">
    </fieldset>
    </form>
    <p>Already Registered. <a href="login.php">Login</a></p>
    
</body>
</html>