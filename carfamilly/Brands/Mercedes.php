<?php
// Include database connection file
include 'dbconnect.php';

// Check if the connection is properly established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sql = "SELECT id, model_name, image FROM models WHERE brand_id = ? AND id BETWEEN 3031 AND 3036 AND status = 1";
$stmt = $conn->prepare($sql);

// Check if the statement preparation was successful
if (!$stmt) {
    die("SQL statement preparation failed: " . $conn->error);
}

$brand_id = 1006; // Assuming 1006 is the brand_id for Mercedes-Benz
$stmt->bind_param("i", $brand_id);

// Execute the statement and handle errors
if (!$stmt->execute()) {
    die("SQL execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

// Fetch the results
$models = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $models[] = $row;
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercedes Benz</title>
    <link rel="stylesheet" href="../assets/css/select.css">
    <script src="https://app.embed.im/snow.js" defer></script>
</head>
<body>
<header class="header" data-header>
    <div class="container">
        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
                <li>
                    <a href="../index.php" class="navbar-link" data-nav-link>Go to Home</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="section featured-car" id="car-makers">
    <br>
    <div class="container">
        <div class="title-wrapper">
            <h2 class="h2 section-title">Mercedes Benz</h2>
        </div>

        <ul class="featured-car-list">
            <?php foreach ($models as $model): ?>
                <li>
                    <div class="featured-car-card">
                        <figure class="card-banner">
                            <img src="/carfamilly/admin_panel/uploads/<?php echo htmlspecialchars($model['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($model['model_name']); ?>" 
                                 loading="lazy" 
                                 class="w-100">
                        </figure>
                        <div class="card-content">
                            <div class="card-title-wrapper">
                                <h3 class="h3 card-title">
                                    <a href="../cartnew/project/view_products.php?id=<?php echo $model['id']; ?>">
                                        <?php echo htmlspecialchars($model['model_name']); ?>
                                    </a>
                                </h3>
                                <div><button class="btn">Details</button></div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
</body>
</html>
