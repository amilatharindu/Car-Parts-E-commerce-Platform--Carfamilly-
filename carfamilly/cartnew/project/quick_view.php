<?php
include 'components/connect.php';

if(isset($_GET['pid'])){
   $product_id = $_GET['pid'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);

   // Select product data
   $select_product = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $select_product->execute([$product_id]);

   if($select_product->rowCount() > 0){
      $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
      
      // Select product ratings
      $select_ratings = $conn->prepare("SELECT AVG(rating) AS avg_rating, COUNT(*) AS total_ratings FROM `ratings` WHERE product_id = ?");
      $select_ratings->execute([$product_id]);
      $fetch_ratings = $select_ratings->fetch(PDO::FETCH_ASSOC);

      // Calculate average rating and total ratings
      $average_rating = $fetch_ratings['avg_rating'] ? round($fetch_ratings['avg_rating'], 1) : 'No ratings yet';
      $total_ratings = $fetch_ratings['total_ratings'];
   } else {
      header('location:view_products.php');
      exit();
   }
} else {
   header('location:view_products.php');
   exit();
}

// Function to display star ratings
function display_stars($average_rating) {
    if (is_numeric($average_rating)) {
        // Process only if $average_rating is a number
        $full_stars = floor($average_rating); // Number of full stars
        $half_star = ($average_rating - $full_stars) >= 0.5 ? 1 : 0; // Check for half star
        $empty_stars = 5 - $full_stars - $half_star; // Remaining empty stars

        // Output the full stars
        for ($i = 0; $i < $full_stars; $i++) {
            echo '<i class="fas fa-star"></i>';
        }

        // Output the half star if needed
        if ($half_star) {
            echo '<i class="fas fa-star-half-alt"></i>';
        }

        // Output the empty stars
        for ($i = 0; $i < $empty_stars; $i++) {
            echo '<i class="far fa-star"></i>';
        }
    } else {
        // If no ratings, display an appropriate message
        echo 'No ratings yet';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quick View</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="https://app.embed.im/snow.js" defer></script>

   <style>

.quick-view .box-container {
   display: flex;
   justify-content: center;
   align-items: center;
   padding: 20px;
   max-width: 800px; 
   width: 100%; 
   margin: 0 auto; 
}


.quick-view .box {
   border: 1px solid #ddd;
   padding: 20px; 
   border-radius: 8px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   background: #fff;
   text-align: center;
   overflow: hidden; 
}


.quick-view .box img {
   max-width: 50%; 
   height: auto; 
   margin-bottom: 15px;
   border-radius: 8px;
}


.quick-view .box h3 {
   font-size: 24px;
   margin: 10px 0; 
   color: #333; 
}


.quick-view .box .price {
   font-size: 22px; 
   color: #28a745; 
   margin: 5px 0; 
}


.quick-view .ratings {
   font-size: 20px;
   color: #ffa500; 
   margin: 5px 0; 
}


.quick-view .box .description {
   font-size: 18px; 
   color: #666;
   margin: 15px 0; 
   line-height: 1.5; 
}


.button-container {
   display: flex; 
   justify-content: center; 
   margin-top: 15px; 
}


.quick-view .btn {
   display: inline-block;
   padding: 10px 15px; 
   border-radius: 5px; 
   font-size: 16px; 
   color: #fff; 
   text-decoration: none; 
   margin: 5px; 
   transition: background-color 0.3s; 
   text-align: center; 
   width: 120px; 
}

.quick-view .products-btn {
   background-color: #ADD8E6; 
   border: 1px solid #ADD8E6;
}

.quick-view .rating-btn {
   background-color: crimson; 
   border: 1px solid crimson;
}


.quick-view .products-btn:hover,
.quick-view .rating-btn:hover {
   background-color: #696969; 
   border-color: #696969; 
}


@media (max-width: 768px) {
   .quick-view .box img {
      max-width: 80%; 
   }

   .quick-view .box {
      padding: 15px; 
   }

   .quick-view .box h3 {
      font-size: 22px; 
   }

   .quick-view .box .price {
      font-size: 20px; 
   }

   .quick-view .ratings {
      font-size: 18px; 
   }

   .quick-view .description {
      font-size: 16px; 
   }

   .quick-view .btn {
      font-size: 14px; 
      padding: 8px 12px; 
      width: 100%; 
   }
}

@media (max-width: 480px) {
   .quick-view .box img {
      max-width: 100%; 
   }

   .quick-view .box h3 {
      font-size: 20px; 
   }

   .quick-view .box .price {
      font-size: 18px; 
   }

   .quick-view .ratings {
      font-size: 16px; 
   }

   .quick-view .description {
      font-size: 14px; 
   }

   .quick-view .btn {
      font-size: 12px; 
      padding: 6px 10px; 
   }
}


   </style>
</head>
<body>

<section class="quick-view">
   <div class="box-container">
   <div class="box">
   <h3>Quick View</h3>

   <img src="\carfamilly\admin_panel\uploads\<?= $fetch_product['image']; ?>" alt="Product Image">
   <h3><?= $fetch_product['name']; ?></h3>
   <p class="price">Rs : <?= $fetch_product['price']; ?> /=</p>
   <p class="ratings">
      <?= display_stars($average_rating); ?> 
      <?= is_numeric($average_rating) ? $average_rating . ' / 5' : ''; ?> 
      (<?= $total_ratings; ?> Ratings)
   </p>
  
   
   <div class="button-container">
      <a href="view_products.php" class="btn products-btn">Back to Home</a>
     
   </div>
</div>

   </div>
</section>



<script src="js/script.js"></script>

</body>
</html>
