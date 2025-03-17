<?php
$conn = new mysqli('localhost', 'root', '', 'adminpanel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['type'])) {
    $type = $_POST['type'];

    if ($type == 'brand') {
        $brandSearch = $_POST['brandSearch'];
        $brandQuery = "SELECT brand_name FROM brands WHERE brand_name LIKE '%$brandSearch%'";
        $brandResult = $conn->query($brandQuery);
        if ($brandResult->num_rows > 0) {
            while ($row = $brandResult->fetch_assoc()) {
                echo "<div class='result-item' data-input='brandSearch'>" . $row['brand_name'] . "</div>";
            }
        } else {
            echo "<div>No results found for brands.</div>";
        }
    }

    if ($type == 'model') {
        $brandSearch = $_POST['brandSearch'];
        $modelSearch = $_POST['modelSearch'];
        $modelQuery = "SELECT model_name FROM models 
                       JOIN brands ON models.brand_id = brands.id
                       WHERE models.model_name LIKE '%$modelSearch%' AND brands.brand_name LIKE '%$brandSearch%'";
        $modelResult = $conn->query($modelQuery);
        if ($modelResult->num_rows > 0) {
            while ($row = $modelResult->fetch_assoc()) {
                echo "<div class='result-item' data-input='modelSearch'>" . $row['model_name'] . "</div>";
            }
        } else {
            echo "<div>No results found for models.</div>";
        }
    }

    if ($type == 'part') {
        $brandSearch = $_POST['brandSearch'];
        $modelSearch = $_POST['modelSearch'];
        $partSearch = $_POST['partSearch'];
        $partQuery = "SELECT part_name FROM parts 
                      JOIN models ON parts.model_id = models.id
                      JOIN brands ON models.brand_id = brands.id
                      WHERE parts.part_name LIKE '%$partSearch%' 
                      AND models.model_name LIKE '%$modelSearch%' 
                      AND brands.brand_name LIKE '%$brandSearch%'";
        $partResult = $conn->query($partQuery);
        if ($partResult->num_rows > 0) {
            while ($row = $partResult->fetch_assoc()) {
                echo "<div class='result-item' data-input='partSearch'>" . $row['part_name'] . "</div>";
            }
        } else {
            echo "<div>No results found for parts.</div>";
        }
    }
}
$conn->close();
?>
