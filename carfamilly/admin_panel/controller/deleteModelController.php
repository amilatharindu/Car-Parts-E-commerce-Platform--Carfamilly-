<!-- controller/deleteModelController.php -->
<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the model from the database
    $sql = "DELETE FROM models WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect back to the viewModels page
    header("Location: ../adminView/models.php");
    exit();
}
?>
