<?php
if (isset($_GET['Reg']) && $_GET['Reg'] == 'success') {
    echo "<script>alert('Registration successful. You can now log in.');</script>";
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<script>";
    if ($error == "empty") {
        echo "alert('Please fill in all fields.');";
    } elseif ($error == "invalid") {
        echo "alert('User email or password is incorrect.');";
    }
    echo "</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="assets/css/customerLogin.css">
    <script src="https://app.embed.im/snow.js" defer></script>
</head>

<body>

    <div class="wrapper">
      <form action="Include/cutomerLoginBackend.php" method="POST" enctype="multipart/form-data" onsubmit="return StudentRegvalidate()">

            <h2>Customer Login</h2>

            <div class="input-field">
                <input type="text" id="mail" name="email" required>
                <label>Enter your email</label>
            </div>

            <div class="input-field">
                <input type="password" name="password" id="pw" required>
                <label>Enter your password</label>
            </div>

            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot password?</a>
            </div>

            <input type="submit" id="login" name="register" value="Sign in">


            <div class="register">
                <p>Don't have an account? <a href="customerReg.php"><U>Sign up</a></p>
                <p>Back to <a href="index.php"><u>Home</u></a></p>
            </div>
        </form>
    </div>
</body>

</html>