<?php
session_start();
if (isset($_POST['register'])) {
    include 'Connection.php';

    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = $_REQUEST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../customerLogin.php?error=empty");
        exit();
    }

    $query = "SELECT * FROM customers WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_hashed_password = $row['password_hash'];

        if (password_verify($password, $stored_hashed_password)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header('Location: ../index.php');
            exit();
        } else {
            header("Location: ../customerLogin.php?error=invalid");
            exit();
        }
    } else {
        header("Location: ../customerLogin.php?error=invalid");
        exit();
    }
}
