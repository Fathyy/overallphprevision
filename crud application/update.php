<?php
require_once 'db_connect.php';
$id=$_GET['updateid'];
$sql="SELECT *FROM persons WHERE id=$id";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_assoc($result);
$email=$row['email'];
$password=$row['password'];


if(isset($_POST['submit'])){
  $email=($_POST['email']);
  $password=($_POST['password']);

  $sql="UPDATE persons SET id=$id, email='$email', password='$password'
  WHERE id=$id";
  $result=mysqli_query($connection, $sql);
  if($result){
    header('Location:display.php');
  }
  else{
    die(mysqli_error($connection));
}
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>My crud application</title>
  </head>
  <body>
      <div class="wrapper">
  <form method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>