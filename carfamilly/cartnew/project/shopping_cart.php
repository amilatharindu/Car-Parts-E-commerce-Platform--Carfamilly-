<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Include the database connection file
include 'components/connect.php';

// Update the quantity of a specific cart item
if (isset($_POST['update_cart'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_SANITIZE_STRING);
    $qty = filter_var($_POST['qty'], FILTER_SANITIZE_NUMBER_INT);

    // Validate the quantity
    if ($qty < 1 || $qty > 99) {
        $warning_msg[] = 'Quantity must be between 1 and 99!';
    } else {
        // Update the quantity in the cart
        $update_qty = $conn->prepare("UPDATE `cart` SET qty = ? WHERE cart_id = ? AND user_id = ?");
        $update_qty->execute([$qty, $cart_id, $user_id]); // Use both `id` and `user_id`
        $success_msg[] = 'Cart quantity updated!';
    }
}

// Delete a specific item from the cart using its cart ID
if (isset($_POST['delete_item'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_SANITIZE_STRING);

    // Delete the specific item
    $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE cart_id = ? AND user_id = ?");
    $delete_cart_id->execute([$cart_id, $user_id]); // Use both `id` and `user_id` for safety
    $success_msg[] = 'Cart item deleted!';
}

// Empty the entire cart for the logged-in user
if (isset($_POST['empty_cart'])) {
    $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
    $delete_cart_id->execute([$user_id]);
    $success_msg[] = 'Cart emptied!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.embed.im/snow.js" defer></script>
</head>
<body>
<?php include 'components/header.php'; ?>

<section class="products">
    <h1 class="heading">My Cart</h1>
    <div class="box-container">
        <?php
        $grand_total = 0;

        // Fetch all items from the user's cart
        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $select_cart->execute([$user_id]);

        if ($select_cart->rowCount() > 0) {
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                // Fetch product details
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                $select_products->execute([$fetch_cart['product_id']]);
                $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);

                if (!$fetch_product) {
                    echo '<p class="empty">Product not found!</p>';
                    continue; // Skip to the next cart item
                }

                $p_price = $fetch_product['price'];
                $sub_total = $fetch_cart['qty'] * $p_price;
                $grand_total += $sub_total;
        ?>
        <form action="" method="POST" class="box">
            <input type="hidden" name="cart_id" value="<?= $fetch_cart['cart_id']; ?>"> <!-- Ensure column name is correct -->
            <img src="\carfamilly\admin_panel\uploads\<?= $fetch_product['image']; ?>" class="image" alt="Product Image">
            <h3 class="name"><?= htmlspecialchars($fetch_product['name']); ?></h3> <!-- Sanitize output -->
            <div class="flex">
                <p class="price">Rs: <?= number_format($p_price, 2); ?> /=</p>
                <input type="number" name="qty" required min="1" value="<?= htmlspecialchars($fetch_cart['qty']); ?>" max="99" class="qty">
                <button type="submit" name="update_cart" class="update-btn">Update</button>
            </div>
            <p class="sub-total">Sub Total: Rs . <span><?= number_format($sub_total, 2); ?></span> /=</p>
            <input type="submit" value="Delete" name="delete_item" class="delete-btn" onclick="return confirm('Delete this item?');">
        </form>
        <?php
            }
        } else {
            echo '<p class="empty">Your cart is empty!</p>';
        }
        ?>
    </div>

    <?php if ($grand_total > 0) { ?>
        <div class="cart-total">
            <p>Grand Total: <span>Rs . <?= number_format($grand_total, 2); ?> /=</span></p>
            <form action="" method="POST">
                <input type="submit" value="Empty Cart" name="empty_cart" class="delete-btn" onclick="return confirm('Empty your cart?');">
            </form>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        </div>
    <?php } ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>
<?php include 'components/alert.php'; ?>
</body>
</html>
