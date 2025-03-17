
<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model_id = $_POST['model_id'];
    $part_name = $_POST['part_name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $sql = "INSERT INTO parts (model_id, part_name, price, stock_quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdi", $model_id, $part_name, $price, $stock_quantity);
    $stmt->execute();

    // Redirect back to the viewSizes page
    header("Location: ../adminView/viewParts.php");
    exit();
}
?>
