<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    /* Universal reset */
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #080710;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }

    .background {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .background .shape {
      position: absolute;
      border-radius: 50%;
    }

    .background .shape:first-child {
      width: 200px;
      height: 200px;
      top: -80px;
      left: -80px;
      background: linear-gradient(#1845ad, #23a2f6);
    }

    .background .shape:last-child {
      width: 300px;
      height: 300px;
      bottom: -150px;
      right: -50px;
      background: linear-gradient(to right, #ff512f, #f09819);
    }

    form {
      position: relative;
      width: 90%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.13);
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 40px 30px;
      box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
      backdrop-filter: blur(10px);
      animation: fadeIn 1s ease-in-out;
    }

    form h3 {
      text-align: center;
      font-size: 32px;
      color: #fff;
      margin-bottom: 20px;
    }

    label {
      color: #fff;
      font-size: 14px;
      display: block;
      margin-top: 20px;
    }

    input {
      display: block;
      width: 100%;
      height: 40px;
      margin-top: 10px;
      padding: 0 10px;
      border-radius: 5px;
      background: rgba(255, 255, 255, 0.1);
      border: none;
      font-size: 14px;
      color: #fff;
      outline: none;
    }

    input::placeholder {
      color: #e5e5e5;
    }

    button {
      display: block;
      width: 100%;
      margin-top: 30px;
      padding: 15px 0;
      background-color: #ffffff;
      color: #080710;
      font-size: 18px;
      font-weight: 600;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: transform 0.2s, background-color 0.3s ease;
    }

    button:hover {
      background-color: #23a2f6;
      color: #fff;
      transform: scale(1.05);
    }

    .error {
      color: #ff5e57;
      font-size: 14px;
      margin-top: 10px;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      body {
        padding: 20px;
      }

      .background .shape:first-child {
        width: 150px;
        height: 150px;
      }

      .background .shape:last-child {
        width: 200px;
        height: 200px;
      }
    }
  </style>
</head>
<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="admin_login_backend.php" method="post">
    <h3>Admin Login</h3>
    <label for="username">Name</label>
    <input type="text" id="username" name="username" placeholder="Enter your name" autocomplete="off" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="new-password" required>
    <?php
      if (isset($_GET['error'])) {
          echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
      }
    ?>
    <button type="submit">Log In</button>
  </form>
</body>
</html>
