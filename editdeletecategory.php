<?php 
session_start();

include_once("c_categories.php");
include_once("incl_header.php");

$cid=$_GET['id'];
$ecats=$categories->editCategory($cid);
$row=mysqli_fetch_assoc($ecats);

?>
<?php if(isset($_POST['update'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $update=$categories->updateCatagory($cid,$name,$description);
    if($update){
        echo'updated';
                    header('Location:catagorymgmt.php');

    }else{
        echo'ERROR';
    }
}

?>
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
  <main>
    <h3>EDIT CATAGORY</h3>
    <form action="" method="POST">
    <input type="text" name="name" class="my-2" value="<?php echo$row['name'];?>">
    <br>
    <input type="text" name="description" class="my-2" value="<?php echo$row['description'];?>">
    <br>
    <input type="submit" name="update" class="btn btn-primary my-2" value="UPDATE"></input>
    </form>
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
<?php if(isset($_POST['update'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $update=$categories->updateCatagory($cid,$name,$description);
    if($update){
        echo'updated';
    }else{
        echo'ERROR';
    }
}

?>

</html>