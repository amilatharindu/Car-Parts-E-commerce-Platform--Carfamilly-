<!-- controller/deletePartController.php -->
<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM parts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect back to the viewSizes page
    header("Location: ../adminView/viewParts.php");
    exit();
}
?>
