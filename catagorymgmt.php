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
    include_once("c_categories.php");
    if(isset($_POST['create'])){
        $catname=$_POST['catname'];
        $description=$_POST['description'];
        $categories->addCategory($catname,$description);



    }
    ?>
  <header>
    <?php include_once("incl_header.php")?>
  </header>
  <main>
    
    <?php 
    include_once("catposcom.php");
    
    ?>

<div class="row justify-content-center align-items-center g-2">

<div class="row">
<div class="col-xxl-8"> <!-- 60% width -->
<h2>CATAGORIES</h2>
<table class="table table-500px table-hover">
  <thead>
    <tr>
      <th scope="col">CatagoryID</th>
      <th scope="col">Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $datas=$categories->viewCategory();
    while($row=mysqli_fetch_assoc($datas)){


    
    ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['description']?></td>
      <td><?php echo "<a href='editdeletecategory.php?id=".$row['id']."&action=edit' class='btn btn-primary'>EDIT</a>";?><?php echo "<a href='deleteCatagory.php?id=".$row['id']."&action=delete' class='btn btn-danger px-2 mx-2'>DELETE</a>";?></td>
    </tr>
<?php 
    }
?>
  </tbody>
</table>
</div>

<div class="col-xxl-4"> <!-- 40% width -->

<h2>ADD NEW CATAGORY</h2> 
<form action="" name="update" method="post" enctype="multipart/form-data">
  <fieldset>
    <label for="catname">New Category name</label>
    <br>
    <input type="text" name="catname" required>
    <br>
    <label for="description">Description</label>
    <br>
      <textarea name="description" id="" cols="30" rows="10"></textarea>
    <br>
    <input class="btn btn-success" type="submit" name="create" value="CREATE">
  </fieldset>
</form>



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