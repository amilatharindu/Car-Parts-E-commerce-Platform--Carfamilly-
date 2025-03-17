<header class="header">

   <section class="flex">
      <a href="#">Go To Top</a>

      <nav class="navbar">
      <a href="">Home</a>

         <a href="view_products.php">View Parts</a>
         <a href="orders.php">My Orders</a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="shopping_cart.php" class="cart-btn">cart<span><?= $total_cart_items; ?></span></a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

</header>