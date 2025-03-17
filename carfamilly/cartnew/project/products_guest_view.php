<?php
include 'components/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <!-- Custom CSS -->
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
      if($select_products->rowCount() > 0){
         while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
  <form action="" method="POST" class="box">
   
  
   
   <img src="\carfamilly\admin_panel\uploads\<?= $fetch_product['image']; ?>" class="image" alt="">
   <h3 class="name" style="font-size: 24px;"><?= $fetch_product['name'] ?></h3>

   <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
   <div class="flex">
      <p class="price">Rs : <?= $fetch_product['price'] ?>/=</p>
   </div>

   <input type="button" value="Add to Cart" class="btn" onclick="showLoginAlert();">
   <a href="#" class="delete-btn" onclick="showLoginAlert();">Buy Now</a>
</form>
   <?php
      }
   }else{
      echo '<p class="empty">No products found!</p>';
   }
   ?>

   </div>

</section>

<!-- SweetAlert Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
// Function to show the login alert
function showLoginAlert() {
   swal({
      title: "You need to login first!",
      text: "Please log in to continue.",
      icon: "warning",
      buttons: {
         cancel: "Cancel",
         confirm: {
            text: "Log In Now",
            value: true,
         },
      },
      dangerMode: true,
   }).then((willLogin) => {
      if (willLogin) {
         window.location.href = '../../customerLogin.php'; // Redirect to login page
      }
   });
}
</script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
