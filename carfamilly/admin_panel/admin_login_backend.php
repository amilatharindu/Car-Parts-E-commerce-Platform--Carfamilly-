<?php
include_once "./config/dbconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: admin_login.php?error=Please fill in all fields");
        exit();
    }
    $sql = "SELECT `id`, `name`, `password` FROM `admin` WHERE `name` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: admin_login.php?error=Invalid password");
            exit();
        }
    } else {
        header("Location: admin_login.php?error=Invalid username or password");
        exit();
    }
} else {
    header("Location: admin_login.php");
    exit();
}
?>
