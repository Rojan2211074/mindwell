<?php session_start(); 
include_once('c_posts.php');
?>
<?PHP
if(isset($_POST['post'])){
  $uid=$_SESSION['userid'];
  $title=$_POST['title'];
  $cid=$_POST['category_id'];
  $description=$_POST['descirption'];
  $imgname=$_FILES["postpic"]["name"];
  //to capture the image size
  $size=$_FILES["postpic"]["size"];
  //to capture the image type
  $type=$_FILES["postpic"]["type"];
  //to capture the temporary name
  $tmpname=$_FILES["postpic"]["tmp_name"];
  //file upload location
  $uploadlocation="uploads/posts/".$imgname;
  $posts->addPost($uid,$cid,$title,$description,$imgname,$tmpname,$uploadlocation);
  

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
<style>

</style>
<body>

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
<H2>Manage your POSTS  </H2>
<?php
if($_SESSION['userrole']=='admin'){
  //admin function
echo '<table class="table table-500px table-hover">
  <thead>
    <tr>
      <th scope="col">PostId</th>
      <th scope="col">Title</th>
      <th scope="col">UserId</th>
      <th scope="col">IMAGE</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>';

$datas = $posts->viewPostAdmin();
while ($row = mysqli_fetch_assoc($datas)) {
  echo '
    <tr>
      <td>' . $row['id'] . '</td>
      <td>' . $row['title'] . '</td>
      <td>' . $row['user_id'] . '</td>
      <td><img width="200px" height="200px" style="object-fit:cover;" src="uploads/posts/' . $row['featureimg'] . '"></td>

      <td>' . $row['description'] . '</td>
      <td>
        <a href="editPost.php?id=' . $row['id'] . '&action=edit" class="btn btn-primary">EDIT</a>
        <a href="deletePost.php?id=' . $row['id'] . '&action=delete" class="btn btn-danger px-2 mx-2">DELETE</a>
      </td>
    </tr>';
}

echo '
  </tbody>
</table>';
}else{
  echo '<table class="table table-500px table-hover">
  <thead>
    <tr>
      <th scope="col">PostId</th>
      <th scope="col">Title</th>
      <th scope="col">UserId</th>
      <th scope="col">IMAGE</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>';
$uid=$_SESSION['userid'];

$datas = $posts->viewPost($uid);
while ($row = mysqli_fetch_assoc($datas)) {
  echo '
    <tr>
      <td>' . $row['id'] . '</td>
      <td>' . $row['title'] . '</td>
      <td>' . $row['user_id'] . '</td>
      <td><img width="200px" height="200px" style="object-fit:cover;" src="uploads/posts/' . $row['featureimg'] . '"></td>

      <td>' . $row['description'] . '</td>
      <td>
        <a href="editpost.php?id=' . $row['id'] . '&action=edit" class="btn btn-primary">EDIT</a>
        <a href="deletePost.php?id=' . $row['id'] . '&action=delete" class="btn btn-danger px-2 mx-2">DELETE</a>
      </td>
    </tr>';
}

echo '
  </tbody>
</table>';


}
?>

</div>
<div class="col-xxl-4"> <!-- 40% width -->
<h1>add your post</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="Title">Enter our post title</label>
    <br>
    <input type="text" name="title">
    <br>
    <label for="Title">Catagory</label>
    <br>
    <select name='category_id'>
                <?php
                $sql="SELECT * FROM category ORDER BY id DESC";
                include("connection.php");
                $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($qry))
                {
               
                echo "<option value=".$row['id']."> ".$row['name']."</option>";
                
                 }
                ?>
    </select>
    <br>
    <input type="file" name="postpic" require>
    <br>
    <label for="descirption">DESCRIPTION</label>
    <br>
    <textarea type="text" name="descirption" cols=50 rows="7"></textarea>
        
    <br>
    <input type="submit" class="btn btn-success" name="post" value="POST">
    <br>



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