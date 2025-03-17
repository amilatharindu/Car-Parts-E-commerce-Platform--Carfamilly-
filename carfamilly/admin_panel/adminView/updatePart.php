<?php
include_once "../config/dbconnect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch part details for the given ID
    $sql = "SELECT * FROM parts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $part = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Part</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Update Part</h3>
        <form action="../controller/updatePartController.php" method="POST">
            <input type="hidden" name="id" value="<?=$part['id']?>">
            <div class="form-group">
                <label for="model_id">Model ID:</label>
                <input type="text" class="form-control" name="model_id" value="<?=$part['model_id']?>" required>
            </div>
            <div class="form-group">
                <label for="part_name">Part Name:</label>
                <input type="text" class="form-control" name="part_name" value="<?=$part['part_name']?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" value="<?=$part['price']?>" required>
            </div>
            <div class="form-group">
                <label for="stock_quantity">Stock Quantity:</label>
                <input type="number" class="form-control" name="stock_quantity" value="<?=$part['stock_quantity']?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Part</button>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
