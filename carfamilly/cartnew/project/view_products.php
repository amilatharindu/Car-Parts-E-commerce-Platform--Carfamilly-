

<?php
session_start();
$unique_id=($_SESSION['id']);
include 'components/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to guest_mode_product.php directly
    header("Location: products_guest_view.php");
    exit; // Stop further execution

}

if(isset($_POST['add_to_cart'])){

   $id = $unique_id;
   $product_id = $_POST['product_id'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   
   $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");   
   $verify_cart->execute([$id, $product_id]);

   $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $max_cart_items->execute([$id]);

   if($verify_cart->rowCount() > 0){
      $warning_msg[] = 'Already added to cart!';
   }elseif($max_cart_items->rowCount() == 10){
      $warning_msg[] = 'Cart is full!';
   }else{

      $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
      $select_price->execute([$product_id]);
      $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, product_id, price, qty) VALUES(?,?,?,?)");
      $insert_cart->execute([$id, $product_id, $fetch_price['price'], $qty]);
      $success_msg[] = 'Added to cart!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="https://app.embed.im/snow.js" defer></script>
<style>
   .box .fa-eye {
       font-size: 24px;
       color: #333;
       margin-bottom: 10px;
       display: block;
       text-align: left;
       transition: color 0.3s ease;
   }

   .box .fa-eye:hover {
       color: #ff5c5c; 
   }
</style>
</head>
<body>
   
<?php include 'components/header.php'; ?>

<section class="products">

   <h1 class="heading">All Parts</h1>

   <div class="box-container">

   <?php 
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if ($select_products->rowCount() > 0) {
         while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
   ?>
  <form action="" method="POST" class="box">
  
   <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
   
   <img src="\carfamilly\admin_panel\uploads\<?= $fetch_product['image']; ?>" class="image" alt="">
   <h3 class="name" style="font-size: 24px;"><?= $fetch_product['name'] ?></h3>

   <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
   <div class="flex">
      <p class="price">Rs : <?= $fetch_product['price'] ?>/=</p>
      <p class="name" style="font-size: 24px; font-family: Arial, sans-serif;">Items</p>
      <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
   </div>
   <input type="submit" name="add_to_cart" value="Add to Cart" class="btn">
   <a href="checkout.php?get_id=<?= $fetch_product['id']; ?>" class="delete-btn">Buy Now</a>
</form>
   <?php
      }
   } else {
      echo '<p class="empty">No products found!</p>';
   }
   ?>

   </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>























