<?php
session_start();
require_once 'db.php';
$title = 'login page';
if(isset($_POST['submit'])){
  //we are escaping from characters in the input that might mess with the query operations using mysqli_real_escape_string
  $email = mysqli_real_escape_string($conn, ($_POST['email']));
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' AND password='$pass'")
  or die('query failed');

  if(mysqli_num_rows($select)>0){
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] =$row['id'];
    header("Location: index.php");

  }
  else{
    $message[] = 'user already exists!';

  }
}
?>

<?php include_once 'includes/header.php';?>


<?php
if(isset($message)){
  foreach($message as $message){
    echo '<div class="message" onclick="this.remove();">' .$message. '</div>';
  }
}
?>


      <div class="form-wrapper d-flex justify-content-center align-content-center mt-5">
      <form action="" method="POST" class="border p-5 rounded-3">
          <h3>Login now</h3>
          
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Login">
  <p>Don't have an account? <a href="register.php">register now</a></p>
</form>
      </div>
      
      <?php include_once 'includes/footer.php';?>
