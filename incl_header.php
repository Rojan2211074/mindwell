
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MindWell</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>
        <li class="nav-item">
        <?php
        if(isset($_SESSION['username'])){
          echo"<a class='nav-link' href='user_edit.php?id=".$_SESSION['userid']."'>

  
   Welcome, ".$_SESSION['username']."</a>";
          
    
        }
        ?>


          
        
        </a>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION["username"])){
        echo"<button style='padding:2px; color:white;' class='btn btn-success ms-2'><a style='color:white;' class='nav-link' href='dashboard.php'>Dashboard</a></button>
        ";
        }?>

       

        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php
       if(isset($_SESSION["username"])){
        $pp=$_SESSION["userimage"] ;
        $uid=$_SESSION['userid'];}
        if(isset($_SESSION["username"])){
          echo"<a href='user_edit.php?id=$uid'><img src='uploads/profiles/$pp' style='  object-fit: cover; height:50px; width:50px; border-radius:100%; margin:5px 10px;'></a>";
           
         
        }

        ?>
        <?php
        if(isset($_SESSION["username"])){
          echo"<button class='btn btn-danger ms-2'><a class='nav-link' aria-current='page' href='admin/logout.php'>Logout</a></button>
          ";
         
        }

        ?>
        <?php
        if(!isset($_SESSION["username"])){
          echo"<button class='btn btn-success ms-2'><a class='nav-link' aria-current='page' href='login.php'>Login!</a></button>
          ";
        }

        ?>
        <?php
        if(!isset($_SESSION["username"])){
          echo"<button class='btn btn-warning ms-2'><a class='nav-link' aria-current='page' href='userregister.php'>Register NOW !</a></button>
          ";
        }

        ?>
          
    </div>
  </div>
</nav>
</head>
