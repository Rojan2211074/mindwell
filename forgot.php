<?php
session_start();
    //checking the form is submitted or not
    if(isset($_POST["submit"])){
        $forgot_email=$_POST['forgot_email'];  
        $sql = "SELECT * FROM users WHERE email='$forgot_email'";
        include("connection.php");
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $count=mysqli_num_rows($qry);
        while($row=mysqli_fetch_array($qry)){
              $email=$row['email'];
        }
        if($count==1){

            if($email==$forgot_email){
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
                // More headers
                $headers .= 'From: <mindwell@rlshrestha.com.np>' . "\r\n";
      
    
                $message = "We found u forgot ur password, Please click below link to reset your password. ";
    
                $message.="<a href=http://localhost/web-class/reset.php?email=$email>Verify</a>";
                $subject= "Thank you for registration with us";
    
                if(mail($email, $subject,  $message, $headers)){
                    echo "Email Sent";
                }
                
            }
        }else{

            echo "No such email found.";
    }
        }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Passowrd </title>
</head>
<body>
    
    <form method="post" action="" name="submit" enctype="multipart/form-data">
        <fieldset>
            <legend>Forgot Password</legend>
            <input type="email" name="forgot_email" placeholder="email">
            <br>

            <input type="submit" name="submit" value="submit"><br

    </fieldset>
    </form>

    
</body>
</html>