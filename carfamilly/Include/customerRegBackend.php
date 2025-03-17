<?php
session_start();
include("Connection.php");

if (isset($_REQUEST['register'])) {
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $mobile = mysqli_real_escape_string($conn, $_REQUEST['contact']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $password = $_REQUEST['password'];
    $cpassword = $_REQUEST['cpassword'];

    // Check if any field is empty
    if (empty($fname) || empty($email) || empty($mobile) || empty($address) || empty($password) || empty($cpassword)) {
        header("Location: ../customerReg.php?error=empty_fields");
        exit();
    }

    // Check for valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../customerReg.php?error=invalid_email");
        exit();
    }

    // Check for password mismatch
    if ($password !== $cpassword) {
        header("Location: ../customerReg.php?error=password_mismatch");
        exit();
    }

    // Validate password strength
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($passwordPattern, $password)) {
        header("Location: ../customerReg.php?error=weak_password");
        exit();
    }

    // Check if email already exists
    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../customerReg.php?error=user_exists");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $query2 = "INSERT INTO customers (name, email, contact_no, address, password_hash) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query2);
    $stmt->bind_param("sssss", $fname, $email, $mobile, $address, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../customerLogin.php?Reg=success");
        exit();
    } else {
        error_log("SQL Error: " . $stmt->error);
        header("Location: ../customerReg.php?error=sql_error");
        exit();
    }
}

include '../cartnew/project/components/alert.php';
?>
