<?php
include_once "../config/dbconnect.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Database Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Items</title>
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

        .navbar h3 {
            color: white;
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .navbar i {
            margin-right: 8px;
        }

        #main {
            padding: 20px;
        }

        hr {
            border: 1px solid;
            background-color: #8a7b6d;
            border-color: #3B3131;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: center;
        }

        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #333;
            color: white;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .btn-primary {
            background-color: #5bc0de;
            border: none;
            color: white;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #31b0d5;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            color: white;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="../index.php">
        <i class="fa fa-home" style="display: block; color: grey; font-size: 30px; margin: 10px 0;"></i>
    </a>
    <a href="viewAllOrders.php"><i class="fa fa-list"></i> Orders</a>
    <a href="viewParts.php"><i class="fa fa-th"></i> Parts</a>
    <a href="viewAllProducts.php"><i class="fa fa-th"></i> All Products</a>
    <a href="bookingad.php"><i class="fa fa-th"></i> Bookings</a>
    <a href="viewCustomers.php"><i class="fa fa-users"></i> Customers</a>
    <a href="viewRating.php"><i class="fa fa-th-large"></i> Ratings</a>    
    <a href="models.php"><i class="fa fa-list"></i> Models</a>
    <a href="brands.php"><i class="fa fa-list"></i> Brands</a>
</div>
<div id="main">
    <h2 class="text-center">Product Items</h2>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addProductModal">
        Add Product
    </button>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Part Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Part Name" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="price">Part Price:</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter Part Price" required min="0">
                        </div>
                        <div class="form-group">
                            <label for="image">Part Image:</label>
                            <input type="file" class="form-control" name="image" required accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-secondary">Add Part</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Table -->
    <div class="tb">
        <table class="table table-bordered" id="productsTable">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Part Name</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Product ID</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                $count = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$count}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['id']}</td>
                            <td><img src='../uploads/{$row['image']}' alt='{$row['name']}' style='width: 50px; height: 50px;'></td>
                            <td>
                                <button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button>
                            </td>
                        </tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No products found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    // Handle Add Product
    $("#addProductForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "../controller/addProductController.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.trim() === "success") {
                    alert("Product added successfully!");
                    location.reload();
                } else {
                    alert(response);
                }
            }
        });
    });

    // Handle Delete Product
    $(".delete-btn").click(function () {
        var productId = $(this).data("id");
        var confirmed = confirm("Are you sure you want to delete this product?");
        if (confirmed) {
            $.ajax({
                url: "viewAllProducts.php",
                type: "POST",
                data: {delete: true, id: productId},
                success: function (response) {
                    if (response.trim() === "success") {
                        alert("Product deleted successfully!");
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });
</script>
</body>
</html>
