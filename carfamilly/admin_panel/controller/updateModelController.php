<!-- controller/updateModelController.php -->
<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $brand_id = $_POST['brand_id'];
    $model_name = $_POST['model_name'];

    // Update the model information in the database
    $sql = "UPDATE models SET brand_id = ?, model_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $brand_id, $model_name, $id);
    $stmt->execute();

    // Redirect back to the viewModels page
    header("Location: ../adminView/models.php");
    exit();
}
?>