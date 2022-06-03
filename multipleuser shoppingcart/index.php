<?php
require 'db.php';
session_start();
$user_id =$_SESSION['user_id'];
$title = 'Products section';

if(!isset($user_id)){
header('location: login.php');
};

// unsetting the session incase a user logs out
if(isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:login.php');
}

// code below is executed whenever add to cart button on the products section is clicked
if(isset($_POST['add_to_cart'])){
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];


  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'")
  or die('query failed');

  if(mysqli_num_rows($select_cart)>0){
    $message[] = 'product already added to cart!';
  }
  else{
    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity)VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')")
    or die('query failed');
    $message[] = 'Product added to cart!';
    

  }
};


?>
 
<?php include_once 'includes/header.php';?>

  <?php
if(isset($message)){
  foreach($message as $message){
    echo '<div class="message" onclick="this.remove();">' .$message. '</div>';
  }
}
?>

<!-- below is a php code to select user already existing in the database -->
<?php
$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
or die('query failed');
if(mysqli_num_rows($select_user) > 0){
  $fetch_user = mysqli_fetch_assoc($select_user);
};

?>

<?php include_once "includes/navbar.php";?>
 

<!-- products section begins here -->
<div class="container">
  <h1>Our products</h1>
  <div class="row">
    <div class="d-flex flex-row flex-wrap gap-5 mx-auto">
    <?php
$select_product = mysqli_query($conn, "SELECT * FROM `products`")
or die('query failed');
if(mysqli_num_rows($select_product) > 0){
  while($fetch_product = mysqli_fetch_assoc($select_product)){
    ?>

    <form action="" method="post" class="each-items-wrapper">
      <img src="<?php echo $fetch_product['image']; ?>" alt="errorr">
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="price">Ksh<?php echo $fetch_product['price']; ?></div>
      <input type="number" name="product_quantity" value="1" min="1">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">

      <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-success add-to-cart">

    </form>

    <?php
  }
};
?>
    </div>
  </div>

</div>
<!-- Products section ends here -->

<?php include_once 'includes/footer.php';?>


