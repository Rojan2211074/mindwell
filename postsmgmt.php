<?php session_start(); ?>

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
<style>

</style>
<body>
<?php
    include_once("c_posts.php");
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
    <?php include_once("incl_header.php")?>
  </header>
  <main>

      <!-- Horizontal under breakpoint -->
      <?php
      include_once("catposcom.php");?>
      
      <div class="row justify-content-center align-items-center g-2">

<div class="row">
<div class="col-xxl-8"> <!-- 60% width -->
Manage your POSTS  </div>
<div class="col-xxl-4"> <!-- 40% width -->
<h1>add your post</h1> 

</div>
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