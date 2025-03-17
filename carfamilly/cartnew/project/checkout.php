<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Set the user ID from the session
$user_id = $_SESSION['id'];

include 'components/connect.php';

// Check if the "Place Order" form was submitted
if (isset($_POST['place_order'])) {
    // Sanitize input fields
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code'], FILTER_SANITIZE_STRING);
    $address_type = filter_var($_POST['address_type'], FILTER_SANITIZE_STRING);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_STRING);

    $grand_total = 0; // Initialize grand total

    // Handle "Buy Now" option
    if (isset($_GET['get_id'])) {
        $get_id = filter_var($_GET['get_id'], FILTER_SANITIZE_STRING);

        // Fetch product details
        $get_product = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
        $get_product->execute([$get_id]);

        if ($get_product->rowCount() > 0) {
            $fetch_p = $get_product->fetch(PDO::FETCH_ASSOC);
            $grand_total = $fetch_p['price']; // Set grand total to the product price

            // Insert the order with the grand total
            $insert_order = $conn->prepare("INSERT INTO `orders`(id, user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $insert_order->execute([create_unique_id(), $user_id, $name, $number, $email, $address, $address_type, $method, $fetch_p['id'], $grand_total, 1]);

            header('location:orders.php');
            exit; // Stop execution after redirection
        } else {
            $warning_msg[] = 'Product not found!';
        }
    } 
    // Handle "Proceed to checkout" option
    else {
        // Fetch user's cart items
        $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $verify_cart->execute([$user_id]);

        if ($verify_cart->rowCount() > 0) {
            while ($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)) {
                // Fetch product details for each cart item
                $get_product = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
                $get_product->execute([$f_cart['product_id']]);

                if ($get_product->rowCount() > 0) {
                    $fetch_p = $get_product->fetch(PDO::FETCH_ASSOC);

                    $sub_total = $f_cart['qty'] * $fetch_p['price'];
                    $grand_total += $sub_total; // Update grand total

                    // Insert each cart item into orders table
                    $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?,?)");
                    $insert_order->execute([$user_id, $name, $number, $email, $address, $address_type, $method, $f_cart['product_id'], $sub_total, $f_cart['qty']]);
                }
            }

            // Clear the user's cart after placing the order
            $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $delete_cart->execute([$user_id]);

            header('location:orders.php');
            exit; // Stop execution after redirection
        } else {
            $warning_msg[] = 'Your cart is empty!';
        }
    }
}

// Function to create a unique order ID
function create_unique_id() {
    return uniqid("order_");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.embed.im/snow.js" defer></script>
    <style>
        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <?php include 'components/header.php'; ?>

    <section class="checkout">

        <h1 class="heading">checkout summary</h1>

        <div class="row">

            <form action="" method="POST" onsubmit="return validateEmail();">
                <h3>billing details</h3>
                <div class="flex">
                    <div class="box">
                        <p>your name <span>*</span></p>
                        <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="input">
                        <p>your number <span>*</span></p>
                        <input type="number" name="number" required maxlength="10" placeholder="enter your number" class="input" min="0" max="9999999999">
                        <p>your email <span>*</span></p>
                        <input type="email" name="email" id="email" required maxlength="50" placeholder="enter your valid email" class="input">
                        <div id="email-error" class="error"></div>
                        <p>payment method <span>*</span></p>
                        <select name="method" class="input" required>
                            <option value="cash on delivery">cash on delivery</option>
                            <option value="credit or debit card">credit or debit card</option>
                            <option value="net banking">net banking</option>
                        </select>
                        <p>address type <span>*</span></p>
                        <select name="address_type" class="input" required>
                            <option value="home">home</option>
                            <option value="office">office</option>
                        </select>
                    </div>
                    <div class="box">
                        <p>address line 01 <span>*</span></p>
                        <input type="text" name="flat" required maxlength="50" placeholder="e.g. flat & building number" class="input">
                        <p>address line 02 <span>*</span></p>
                        <input type="text" name="street" required maxlength="50" placeholder="e.g. street name & locality" class="input">
                        <p>city name <span>*</span></p>
                        <input type="text" name="city" required maxlength="50" placeholder="enter your city name" class="input">
                        <p>country name <span>*</span></p>
                        <input type="text" name="country" required maxlength="50" placeholder="enter your country name" class="input">
                        <p>pin code <span>*</span></p>
                        <input type="number" name="pin_code" required maxlength="6" placeholder="e.g. 123456" class="input" min="0" max="999999">
                    </div>
                </div>
                <input type="submit" value="place order" name="place_order" class="btn" onclick="return confirm('Want to place order?');">
            </form>

            <div class="summary">
                <h3 class="title">cart items</h3>
                <?php
                $grand_total = 0;
                if (isset($_GET['get_id'])) {
                    // "Buy Now" option: Get selected product details
                    $select_get = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                    $select_get->execute([$_GET['get_id']]);
                    while ($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)) {
                        $grand_total += $fetch_get['price']; // Add product price to grand total
                ?>
                        <div class="flex">
                            <img src="\carfamilly\admin_panel\uploads\<?= $fetch_get['image']; ?>" class="image" alt="">
                            <div>
                                <h3 class="name"><?= $fetch_get['name']; ?></h3>
                                <p class="price">Rs : <?= $fetch_get['price']; ?> /= x 1</p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    // Cart option: Get all items in the cart
                    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                    $select_cart->execute([$user_id]);
                    if ($select_cart->rowCount() > 0) {
                        while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                            $select_products->execute([$fetch_cart['product_id']]);
                            while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                                $sub_total = $fetch_cart['qty'] * $fetch_product['price'];
                                $grand_total += $sub_total; // Update grand total
                ?>
                                <div class="flex">
                                    <img src="\carfamilly\admin_panel\uploads\<?= $fetch_product['image']; ?>" class="image" alt="">
                                    <div>
                                        <h3 class="name"><?= $fetch_product['name']; ?></h3>
                                        <p class="price">Rs : <?= $fetch_product['price']; ?> /= x <?= $fetch_cart['qty']; ?></p>
                                    </div>
                                </div>
                <?php
                            }
                        }
                    } else {
                        echo '<p class="empty">your cart is empty</p>';
                    }
                }
                ?>
                <div class="grand-total">Grand Total : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Rs . <?= $grand_total; ?> /=</div>
            </div>

        </div>

    </section>

    <script>
    function validateEmail() {
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(emailInput.value)) {
            emailError.textContent = 'Enter a valid email';
            emailError.style.fontSize = '16px';  // Set the font size here
            emailInput.style.borderColor = 'red';
            return false;
        }

        emailError.textContent = '';
        emailInput.style.borderColor = '';
        return true;
    }
</script>


    <script src="js/script.js"></script>

</body>

</html>

