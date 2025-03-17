<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $product_name, $price, $id);
    $stmt->execute();

    // Redirect back to the viewProducts page
    header("Location: ../adminView/viewAllProducts.php");
    exit();
}
?>
