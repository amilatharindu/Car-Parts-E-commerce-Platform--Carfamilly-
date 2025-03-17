<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_id = $_POST['brand_id'];
    $model_name = $_POST['model_name'];
    $status = $_POST['status'];
    $image = $_FILES['image_path']['name'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO models (brand_id, model_name, image, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issi", $brand_id, $model_name, $image, $status);

        if ($stmt->execute()) {
            $response = [
                "status" => "success",
                "data" => [
                    "id" => $conn->insert_id,
                    "brand_id" => $brand_id,
                    "model_name" => $model_name,
                    "image" => $image,
                    "status" => $status == 1 ? "Available" : "Unavailable",
                ],
            ];
        } else {
            $response = ["status" => "error", "message" => $stmt->error];
        }
        $stmt->close();
    } else {
        $response = ["status" => "error", "message" => "Image upload failed"];
    }

    echo json_encode($response);
}
?>