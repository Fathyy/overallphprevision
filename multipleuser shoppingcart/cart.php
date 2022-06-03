<?php
require 'db.php';
session_start();
$user_id =$_SESSION['user_id'];
$title = 'Cart section';

if(isset($_POST['update_cart'])){
  $update_quantity = $_POST['cart_quantity'];
  $update_id = $_POST['cart_id'];
  mysqli_query($conn, "UPDATE `cart` SET quantity ='$update_quantity' WHERE id = '$update_id' ")
    or die('query failed');
    $message[] = 'cart quantity updated!';
}

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id ='$remove_id'")
    or die('query failed');
    header('Location: cart.php');
}

if(isset($_GET['delete_all'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_id ='$user_id'")
  or die('query failed');
  header('Location: cart.php'); 
}
?>
<!-- table displaying items in the cart begins here -->
<?php include_once "includes/header.php";?>
<?php include_once "includes/navbar.php";?>
<?php include_once 'includes/header.php';?>
<div class="container my-5">
  <div class="row">
    <table class="table table-striped table-hover table-bordered table-responsive">
      <thead>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>quantity</th>
        <th>total</th>
        <th>action</th>
      </thead>
         
      <tbody>
      <?php
      $grand_total = 0;
        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'")
        or die('query failed');
        if(mysqli_num_rows($cart_query) > 0){
          while($fetch_cart = mysqli_fetch_assoc($cart_query)){
    ?>
    
    <tr>
      <td><img src="<?php echo $fetch_cart['image']; ?>" alt="errorr" class="table-image"></td>
      <td><?php echo $fetch_cart['name']; ?></td>
      <td>Ksh<?php echo $fetch_cart['price']; ?></td>
      <td>
        <form action="" method="post"> 
          <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
          <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
          <input type="submit" value="update" name="update_cart" class="btn btn-warning">
        </form>
      </td>

      <td>Ksh<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']);?></td>

      <td><a href="cart.php?remove=<?php echo $fetch_cart['id'];?>"  
      onclick="return confirm('remove item from cart?');" class="btn btn-danger">Remove</a></td>
      
    </tr>

    <?php
    $grand_total += $sub_total;
          };
        };
    ?>

  
    <tr>
      <td colspan="4">Grand total:</td>
      <td>Ksh<?php echo $grand_total;?></td>
      <td><a href="cart.php?delete_all"  
      onclick="return confirm('delete all from cart?');"
      class="<?php echo ($grand_total > 1)? '': 'disabled';?> btn btn-danger">Delete all</a></td>
    </tr>
    </tbody>

    </table>

    <!-- checkout button -->
    <div id="checkout-btn">
      <a href="cart.php?delete_all"></a>
    </div>

  </div>
</div>
<!-- table displaying items in the cart ends here -->
<?php include_once 'includes/footer.php';?>

<!--Javascript paypal intergration begins -->
<script src="https://www.paypal.com/sdk/js?client-id=AXM6p2VTsmOnSwdNe5h-jUahbez5Rs3j1WNscggZm8FjyjheQ9BFguJxgu-Q8z0lkBFxIKOPajQUwOrm&disable-funding=credit,card"></script>
<script>
  paypal.Buttons({
    style:{
      color:'blue',
      shape:'pill'
    },
    createOrder:function(data, actions){
      return actions.order.create({
        purchase_units:[{
      amount:{
        value:'<?php echo $grand_total?>'
      }
    }]
  });
  },
  onApprove: function(data, actions){
    return actions.order.capture().then(function(details){
      console.log(details)
    })
  }


      
    
  }).render('#checkout-btn')
  
</script>
  </body>
</html>