<?php
include_once "../config/dbconnect.php";

if (isset($_GET['brandId'])) {
    $brandId = intval($_GET['brandId']); // Sanitize input
    $sql = "SELECT id, brand_id, model_name, image, status FROM models WHERE brand_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $brandId);
    $stmt->execute();
    $result = $stmt->get_result();

    $count = 1;
    $basePath = "../uploads/"; // Adjust this path to your images directory

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $basePath . $row['image'];
            if (file_exists($imagePath)) {
                $imageTag = "<img src='{$imagePath}' alt='image' style='width: 50px;'>";
            } else {
                $imageTag = "<img src='../uploads/placeholder.jpg' alt='Image not found' style='width: 50px;'>";
            }
            echo "<tr>
                    <td>{$count}</td>
                    <td>{$row['brand_id']}</td>
                    <td>{$row['model_name']}</td>
                    <td>{$imageTag}</td>
                    <td>{$row['status']}</td>
                  </tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No models found for this brand.</td></tr>";
    }
    $stmt->close();
} else {
    echo "<tr><td colspan='5' class='text-danger text-center'>Invalid request.</td></tr>";
}
?>







