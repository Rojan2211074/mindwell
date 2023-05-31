<?php
session_start();


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
  <header>
    <!-- place navbar here -->
    <?php 
include_once("incl_header.php")
?>
  </header>
  <main>
  <div class="row">
    <?php
    $sql = "SELECT * FROM article ORDER BY id DESC LIMIT 0,5";
    include("connection.php");
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($qry);
    if ($count >= 1) {
        while ($row = mysqli_fetch_array($qry)) {
            $aid = $row["id"];
            $img = $row['featureimg'];
            $title = $row['title'];
            $desc = substr($row['description'], 0, 200) . '...';

            echo "
            <div class='col-md-4'>
                <div class='card' style='padding: 0px; margin-bottom: 20px; min-height:438px;x'>
                    <img class='card-img-top' src='uploads/posts/$img' style='height: 200px; object-fit: cover;' alt='Card image cap'>
                    <div class='card-body'>
                        <h5 class='card-title'><a href='details.php?id=$aid'>$title</a></h5>
                        <p class='card-text'>$desc</p>
                        <a href='details.php?id=$aid' class='btn btn-primary'>Full Post</a>
                    </div>
                </div>
            </div>";
        }
    }
    ?>
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