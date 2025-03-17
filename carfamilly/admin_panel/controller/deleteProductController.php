<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the product from the database
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect back to the viewProducts page
    header("Location: ../adminView/viewAllProducts.php");
    exit();
}
?>
