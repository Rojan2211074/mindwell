<!doctype html>
<html lang="en">

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
    <?php
    include_once("c_users.php");
    if(isset($_POST['update'])){
        $uid=$_GET['id'];
        $nusername=$_POST['name'];
        $nemail=$_POST['email'];
        $noldphoto=$_POST['oldimage'];
        $nimgname=$_FILES["newprofile"]["name"];
        $nuploadlocation="uploads/profiles/".$nimgname;

        $ntmpname=$_FILES["newprofile"]["tmp_name"];

        if (!empty($nimgname)) {
            // File is submitted, process the file upload
            $users->updateUser($uid, $nusername, $nemail, $noldphoto, $nuploadlocation, $nimgname, $ntmpname);
        } else {
            // File is not submitted, update other fields without file upload
            $users->updateUserNoFile($uid, $nusername, $nemail);}




    }
    ?>
  <header>
  <?php
session_start();
include("incl_header.php")
?>


  </header>
  <main>
<?php
    $uid=$_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$uid";
    include("connection.php");
    $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while($row=mysqli_fetch_array($qry)){
        $eid=$row['id'];
        $eusername=$row['username'];
        $eemail=$row['email'];
        $ethumbimg=$row['image'];
        $oldthumbimg=$row['image'];

        $estatus=$row['status'];
    echo "<form action='' name='update' method='post' enctype='multipart/form-data'>";
    echo "<fieldset><legend>".$uid. "Edit</legend>";
    echo "<input type=number name=uid required value=$eid readonly>";
    echo "<br>";
    echo "<input type=text name=name required value='$eusername'>";
    echo "<br>";
    echo "<input type=text name=email value=$eemail readonly>";

    
    echo "<br>";
    echo"<img src='uploads/profiles/$ethumbimg' style='  object-fit: cover; height:100px; width:100px; border-radius:100%; margin:2rem;'>";
    echo "<br>";
    echo "<input type='file' name='newprofile' value='$oldthumbimg'>";
    echo "<br>";
    echo "<input type=hidden name=oldimage value='$oldthumbimg'>";
    echo "<br>";
    echo "<input type=submit name=update value=Edit>";


    echo "</fieldset>";
    echo "</form>";
    }
?>
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