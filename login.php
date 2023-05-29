
<?php
session_start();
    //checking the form is submitted or not
    if(isset($_POST["submit"])){
        $user=$_POST['username'];
        $pass=$_POST['password'];
        if(isset($_POST['remme'])) {
            $remme=$_POST['remme'];
        } else {
            $remme='';
        }
        $sql = "SELECT * FROM users WHERE username='$user' and password=md5('$pass') and status=1";
        //connecting to db
        include("connection.php");
        //executing the query
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //counting the affected rows
        $count=mysqli_num_rows($qry);

        //getting the users roles and id
        while($row=mysqli_fetch_array($qry)){
            $userid=$row['id'];
            $userrole=$row['role'];
            $image=$row['image'];

        }
        if($count==1){
            //setting the username and password cookie for 15 days
            if(!empty($remme)){
            setcookie("username", $user, time()+(60*60*24*15),"/");
            setcookie("password", $pass, time()+(60*60*24*15),"/");
            }
            //register the session
            $_SESSION["username"]=$user;
            $_SESSION["accesstime"]=date('Ymdhisa');
            $_SESSION["userid"]=$userid;
            $_SESSION["userrole"]=$userrole;
            $_SESSION["userimage"]=$image;
            //redirect if user valid
            if($userrole=="admin"){
            header("Location:index.php"); 
            }
            else{
                header("Location:index.php");

            }
        }
        else{
            echo "Login Failed";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login </title>
</head>
<style>
    html{
        background-color: green;
    }
    
</style>
<body>
    
    <form method="post" action="" name="login" enctype="multipart/form-data">
        <fieldset>
            <legend>Login</legend>
            <input type="text" name="username" placeholder="Username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];} else {echo '';}?>">
            <br>
            <input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} else {echo '';}?>">
            <br>
            <input type="checkbox" name="remme" value="rem">Remember Me<br>
            <input type="submit" name="submit" value="Login"><br><br>
            <a href="forgot.php" style="text-decoration:none;">Forgot Password? Click here.</a>

    </fieldset>
    </form>
    
</body>
</html>