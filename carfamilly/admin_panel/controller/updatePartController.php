<!-- controller/updatePartController.php -->
<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $model_id = $_POST['model_id'];
    $part_name = $_POST['part_name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $sql = "UPDATE parts SET model_id = ?, part_name = ?, price = ?, stock_quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdii", $model_id, $part_name, $price, $stock_quantity, $id);
    $stmt->execute();

    // Redirect back to the viewSizes page
    header("Location: ../adminView/viewParts.php");
    exit();
}
?>
!
