<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Define the target directory and file path
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);

    // Check if the image was uploaded and move it to the target folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Prepare SQL query to insert product data
        $sql = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sds", $name, $price, $image);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error inserting data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Error uploading the image. Please check file permissions.";
    }
} else {
    echo "Invalid request method.";
}
?>
