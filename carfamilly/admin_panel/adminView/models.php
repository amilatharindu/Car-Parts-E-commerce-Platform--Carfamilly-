<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://app.embed.im/snow.js" defer></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        #main {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .search-bar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="../index.php"><i class="fa fa-home"></i></a>
    <a href="viewCustomers.php">Customers</a>
    <a href="viewRating.php">Ratings</a>
    <a href="viewParts.php">Parts</a>
    <a href="viewAllProducts.php">Products</a>
    <a href="viewAllOrders.php">Orders</a>
    <a href="models.php">Models</a>
    <a href="brands.php">Brands</a>
</div>

<div id="main" class="container mt-4">
    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#addModelModal">Add Model</button>

    <h2 class="text-center">Model Items</h2>

    <!-- Search input field for model name -->
    <div class="search-bar">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Model Name">
    </div>

    <table class="table table-bordered" id="modelsTable">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Brand ID</th>
                <th>Model Name</th>
                <th>Model ID</th>
                <th>Image</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * FROM models";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = "../uploads/" . htmlspecialchars($row['image']);
                    echo "<tr class='model-row'>
                            <td>{$count}</td>
                            <td>{$row['brand_id']}</td>
                            <td class='model-name'>{$row['model_name']}</td>
                            <td>{$row['id']}</td>
                            <td><img src='{$imagePath}' alt='{$row['model_name']}'></td>
                            <td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>
                            <td><button class='btn btn-primary' data-toggle='modal' data-target='#updateModelModal' onclick=\"loadUpdateModelData({$row['id']}, '{$row['model_name']}', {$row['brand_id']}, '{$row['status']}')\">Update</button></td>
                            <td><button class='btn btn-danger' onclick=\"if(confirm('Are you sure you want to delete this model?')) { location.href='../controller/deleteModelController.php?id={$row['id']}'; }\">Delete</button></td>
                        </tr>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No models found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Add Model Modal -->
    <div class="modal fade" id="addModelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Model</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addModelForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="brand_id">Brand ID:</label>
                            <input type="text" name="brand_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model_name">Model Name:</label>
                            <input type="text" name="model_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image_path">Image:</label>
                            <input type="file" name="image_path" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-secondary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Model Modal -->
    <div class="modal fade" id="updateModelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Model</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="updateModelForm" action="../controller/updateModelController.php" method="POST">
                        <input type="hidden" name="id" id="updateModelId">
                        <div class="form-group">
                            <label for="updateModelName">Model Name:</label>
                            <input type="text" name="model_name" id="updateModelName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="updateBrandId">Brand ID:</label>
                            <input type="text" name="brand_id" id="updateBrandId" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="updateStatus">Status:</label>
                            <select name="status" id="updateStatus" class="form-control" required>
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    // Handle form submission for Add Model
    $("#addModelForm").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "../controller/addModelController.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                location.reload();
            },
            error: function (xhr, status, error) {
                alert("There was an error: " + error);
            }
        });
    });

    // Filter table by model name
    document.getElementById("searchInput").addEventListener("input", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#modelsTable tbody tr");
        rows.forEach(function (row) {
            let modelName = row.querySelector(".model-name").textContent.toLowerCase();
            if (modelName.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });

    // Populate update form with model data
    function loadUpdateModelData(id, name, brandId, status) {
        document.getElementById("updateModelId").value = id;
        document.getElementById("updateModelName").value = name;
        document.getElementById("updateBrandId").value = brandId;
        document.getElementById("updateStatus").value = status;
    }
</script>
</body>
</html>