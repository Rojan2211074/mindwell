<!doctype html>
<html lang="en">
<?php
session_start();
if(isset($_POST['submit']))
{
    $message=$_POST['message'];
    $article_id=$_POST['article_id'];
    $user_id=$_POST['user_id'];
    $status=1;

    if(!empty($message))
    {
        $sql="INSERT into comment (user_id, article_id, message, status) VALUES($user_id, $article_id, '$message', $status)";
        include("connection.php");
        $qry=mysqli_query($conn, $sql) or die("unable to insert comment");
        if($qry){
            $cmtmsg="Thank you for your comment.";
           
        }

    }
    else{
        echo "Please write the Coments";
    }

   

}
?>
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
    include("incl_header.php");
    ?>
  </header>
  <main>
  <div class="container">
        
       <div class="row">
       <?php
       if(!isset($_GET['id']))
       {
        header("Location:index.php");
       }
       $aid=$_GET["id"];
            

                $sql="SELECT * from article WHERE id='$aid'" ;
                include("connection.php");
                $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $count=mysqli_num_rows($qry);
                if($count>=1){
                   

                    while($row=mysqli_fetch_array($qry)){
                        $img=$row['featureimg'];
                        $title=$row['title'];
                        $desc=$row['description'];
                        $user_id=$row['user_id'];

                        $sqlauth="SELECT * FROM users WHERE id=$user_id";
                        $qryuser=mysqli_query($conn, $sqlauth);
                        while($rowauth=mysqli_fetch_array($qryuser)){
                            $authusername=$rowauth["username"];
                        }


                        echo "<div class=row>
                        <div class=col-xxl-12>
                        <img src='uploads/posts/$img' alt='$title' width=200px height=200px class='img-fluid'>
                        <h2>$title</h2>
                        <p>$desc</p>
                        <p>Author: $authusername</a>

                        
                    
                        </div></div>";
                    }
                    if(isset($cmtmsg)){
                        echo "<p>".$cmtmsg."</p>";
                        echo "<hr>";
                    }

                    if(isset($_SESSION["username"]) and isset($_SESSION["userid"])){
                        echo "<h2>Post Your Coment</h2>";
                        echo "<form method=post name=postcomment action=''>";
                        echo "<fieldset><legend>Post Comment</legend>";
                        echo "<textarea rows=10 cols=50 name=message></textarea>";
                        echo "<input type=hidden name=article_id value=$aid>";
                        echo "<input type=hidden name=user_id value=".$_SESSION['userid'].">";
                        echo "<input type=submit name=submit value=post comment>";
                        echo "</fieldset></form>";

                    }


                    echo "<div class=row>";
                    $sql="SELECT users.id, users.username, comment.id, comment.user_id, comment.article_id, comment.message, comment.status FROM users, comment WHERE comment.article_id=$aid and users.id=comment.user_id and comment.status=1";
                    $qry=mysqli_query($conn, $sql) or die("unable to get the data");
                    $count=mysqli_num_rows($qry);
                    if($count>=1)
                    {
                        while($row=mysqli_fetch_array($qry))
                        {

                        echo "<div class=col-xxl-12>";
                        echo "<p>".$row['message']."</p>";
                        echo "<h3>".$row['username']."</h3>";
                        echo "</div>";
                        echo "</div>";
                        echo "<hr>";
                        }
                    

                    }
                    else{
                        echo "No Comments Yet. Be  a first for publishing a commnet";
                    }

                  



              



            }

            ?>
        </div>
        
    </div>
    
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>