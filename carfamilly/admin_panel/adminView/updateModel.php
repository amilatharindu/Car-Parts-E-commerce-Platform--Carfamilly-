<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch model details for the given ID
    $sql = "SELECT * FROM models WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $model = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Model</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Update Model</h3>
        <form action="../controller/updateModelController.php" method="POST">
            <input type="hidden" name="id" value="<?=$model['id']?>">
            <div class="form-group">
                <label for="brand_id">Brand ID:</label>
                <input type="text" class="form-control" name="brand_id" value="<?=$model['brand_id']?>" required>
            </div>
            <div class="form-group">
                <label for="model_name">Model Name:</label>
                <input type="text" class="form-control" name="model_name" value="<?=$model['model_name']?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Model</button>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>