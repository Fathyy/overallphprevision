<?php
session_start();
require_once 'db.php';
$title = 'Register page';
if(isset($_POST['submit'])){
  //we are escaping from characters in the input that might mess with the query operations using mysqli_real_escape_string
  $name = mysqli_real_escape_string($conn, ($_POST['name']));
  $email = mysqli_real_escape_string($conn, ($_POST['email']));
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' AND password='$pass'")
  or die('query failed');

  if(mysqli_num_rows($select)>0){
    $message[] = 'user already exits!';
  }
  else{
    mysqli_query($conn, "INSERT INTO `user_form`(name, email, password)VALUES('$name', '$email', '$pass')")
    or die('query failed');
    if(isset($_SESSION['status'])){
      ?>
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      <?php echo $message="You have registered successfully";?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     <?php 
    }
    unset($_SESSION['status']);
    header("Location:login.php");
    
  }
}
?>

<?php include_once 'includes/header.php';?>

<?php
$message="";
$_SESSION['status']=$message;
?>




      <div class="form-wrapper d-flex justify-content-center align-content-center mt-5">
      <form action="" method="POST" class="border p-5 rounded-3">
          <h3>Register now</h3>
          
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" placeholder="Enter username" name="name">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label> 
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Confirm password"  name="cpassword">
  </div>
  
  <input type="submit" class="btn btn-primary" name="submit" value="Register">
  <p>Already have an account? <a href="login.php">Login now</a></p>
</form>
      </div>
      
      <?php include_once 'includes/footer.php';?>
