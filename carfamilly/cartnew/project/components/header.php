<?php
// Start session safely, ensuring no output occurs before this
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

// Include database connection file
include 'components/connect.php';

// Check if the user is logged in and set the user ID
$user_id = null;
if (isset($_SESSION['id'])) { 
    $user_id = $_SESSION['id']; // Assuming `id` is the session variable for the user
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Cart</title>

    <!-- Include FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Include custom styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <section class="flex">
        <a href="../../#car-makers" class="logo">Select Again</a>

        <nav class="navbar">
            <a href="../../#home">Go to Home</a>
            <a href="view_products.php">View Parts</a>
            
            <?php if ($user_id): ?>
                <?php
                // Query the cart count if user is logged in
                $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $count_cart_items->execute([$user_id]);
                $total_cart_items = $count_cart_items->rowCount();
                
                ?>
                <a href="orders.php">My Orders</a>
                <a href="shopping_cart.php" class="cart-btn">Cart<span><?= $total_cart_items; ?></span></a>
            <?php else: ?>
                <samp>Guest Mode</samp>
            <?php endif; ?>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
</header>

<!-- Optional JavaScript for mobile menu -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.querySelector('.navbar');
    menuBtn.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
</script>
</body>
</html>
