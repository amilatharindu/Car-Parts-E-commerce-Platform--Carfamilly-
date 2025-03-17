<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'user_exists') {
        echo "<script>alert('User already exists. Please try with a different email.');</script>";
    } elseif ($_GET['error'] == 'password_mismatch') {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } elseif ($_GET['error'] == 'empty_fields') {
        echo "<script>alert('Please fill in all fields.');</script>";
    } elseif ($_GET['error'] == 'invalid_email') {
        echo "<script>alert('Please enter a valid email address.');</script>";
    } elseif ($_GET['error'] == 'weak_password') {
        echo "<script>alert('Password must be at least 8 characters long, and contain a mix of letters, numbers, and special characters.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Registration Form</title>
  <link rel="stylesheet" href="assets/css/customerReg.css">
  <script src="https://app.embed.im/snow.js" defer></script>
</head>
<body>
  <div class="container">
    <div class="title">Customer Registration</div>
    <div class="content">
      <form action="Include/customerRegBackend.php" method="POST" enctype="multipart/form-data" onsubmit="return Regvalidate()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" id="fname" name="fname" placeholder="Enter your name" required>
          </div>
  
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" id="email" name="email" placeholder="Enter your Valid email" required>
          </div>
          <div class="input-box">
            <span class="details">Contact No</span>
            <input type="text" id="rid" name="contact" placeholder="Enter your Contact Number" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" id="rid" name="address" placeholder="Enter your Address" required>
          </div>
          <div class="input-box">
            <span class="details">Strong Password</span>
            <input type="password" id="password" name="password" placeholder="Abcd@123" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your password" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" id="register" name="register" value="Register">
          <h4 id="error" style="color: red; margin-top: 5px; text-align: center;"></h4>
        </div>
        <div class="linkcontainer">
            <div class="login">
                <p>Already have an account? <a href="customerLogin.php">Login</a></p>
            </div>
            <div class="Home">
                <p>Back to Home page <a href="index.php">Home</a></p>
            </div>
        </div>
      </form>
    </div>
  </div>
  <script src="assets/js/Validation.js"></script>
</body>
</html>
