

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
  <div class="row justify-content-center align-items-center g-2 mx-2 my-2">
      <!-- Horizontal under breakpoint -->
      <ul class="list-group list-group-horizontal">

      <?php
      if($_SESSION['userrole']=='admin'){
        echo"<li class='list-group-item' style='background-color:#cc3f69;'><a href='catagorymgmt.php' style='text-decoration: none; color:black;'>Catagories</a></li>
        ";
      }
      ?>
        <li class="list-group-item" style="background-color:#24b4e0;"><a href="postsmgmt.php" style="text-decoration: none; color:black;">Posts</a></li>
        <li class="list-group-item" style="background-color:#e6be53;"><a href="commentsmgmt.php" style="text-decoration: none; color:black;">Comments</a></li>
        </ul>
    </div>
  </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>