<?php
include 'components/connect.php';

if (isset($_GET['pid'])) {
    $product_id = $_GET['pid'];
} else {
    $product_id = '';
    header('location:view_products.php');
}

if (isset($_POST['submit'])) {
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $rating = filter_var($_POST['rating'], FILTER_SANITIZE_STRING);

    $check_rating = $conn->prepare("SELECT * FROM `ratings` WHERE product_id = ? AND email = ?");
    $check_rating->execute([$product_id, $email]);

    if ($check_rating->rowCount() > 0) {
        $warning_msg[] = '<p style="font-size: 20px; color: red;">You already added a rating for this product.</p>';
    } else {
        $id = create_unique_id();
        
        // Execute the insert query
        $add_rating = $conn->prepare("INSERT INTO `ratings` (id, product_id, rating, review, first_name, last_name, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($add_rating->execute([$id, $product_id, $rating, $description, $first_name, $last_name, $email])) {
            // If the insertion is successful, set the success message
            $success_msg[] = '<p style="font-size: 20px; color: green;">Thanks for your rating!</p>';
        } else {
            $warning_msg[] = '<p style="font-size: 20px; color: red;">Failed to add your rating. Please try again.</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rating</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .box:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color:  #ADD8E6; 
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 20px;
        }
        .btn:hover {
            background-color: crimson; 
        }
        .success, .warning {
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .warning {
            background-color: #f2dede;
            color: #a94442;
        }
        .option-btn {
            text-align: center;
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #ccc;
            color: #333;
            border-radius: 4px;
            text-decoration: none;
            font-size: 20px;
            transition: 0.3s;
            margin-top: 10px;
        }
        .option-btn:hover {
            background-color: crimson;
        }
        @media screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h3 {
                font-size: 20px;
            }
            .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<section class="container">
    <h3>Add Your Rating</h3>

    <?php if (!empty($success_msg)) { ?>
        <div class="success"><?= implode($success_msg) ?></div>
    <?php } elseif (!empty($warning_msg)) { ?>
        <div class="warning"><?= implode($warning_msg) ?></div>
    <?php } ?>

    <form action="" method="post">
        <input type="text" name="first_name" required maxlength="50" placeholder="First Name" class="box">
        <input type="text" name="last_name" required maxlength="50" placeholder="Last Name" class="box">
        <input type="email" name="email" required placeholder="Email Address" class="box">
        <textarea name="description" class="box" placeholder="Enter review description" maxlength="1000" cols="30" rows="4"></textarea>
        <select name="rating" class="box" required>
            <option value="" disabled selected>Rate the product</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Submit Review" name="submit" class="btn">
        <a href="quick_view.php?pid=<?= $product_id; ?>" class="option-btn">Back to Product</a>
    </form>
</section>

</body>
</html>
