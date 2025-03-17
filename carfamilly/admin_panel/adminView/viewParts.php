<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Parts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Font Awesome for icons -->
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
    <a href="../index.php">
    </a>

    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addPartModal">
        Add Part
    </button>
    <?php
    include_once "../config/dbconnect.php";

    $sql = "SELECT * FROM parts";
    $result = $conn->query($sql);
    ?>

    <div>
        <h2 class="text-center">Available Parts</h2>
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by Part Name" style="margin-bottom: 15px;">
        </div>
        <table class="table" id="partsTable">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Model ID</th>
                    <th class="text-center">Part Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Stock Quantity</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["model_id"]?></td>
                    <td><?=$row["part_name"]?></td>
                    <td><?=$row["price"]?></td>
                    <td><?=$row["stock_quantity"]?></td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="location.href='updatePart.php?id=<?=$row['id']?>'">Update</button></td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="location.href='../controller/deletePartController.php?id=<?=$row['id']?>'">Delete</button></td>
                </tr>
            <?php
                    $count++;
                }
            }
            ?>
            </tbody>
        </table>

        <!-- Add Part Modal -->
        <div class="modal fade" id="addPartModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Part Record</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form enctype='multipart/form-data' action="../controller/addPartController.php" method="POST">
                            <div class="form-group">
                                <label for="model_id">Model ID:</label>
                                <input type="text" class="form-control" name="model_id" required>
                            </div>
                            <div class="form-group">
                                <label for="part_name">Part Name:</label>
                                <input type="text" class="form-control" name="part_name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="stock_quantity">Stock Quantity:</label>
                                <input type="number" class="form-control" name="stock_quantity" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Part</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        const filter = this.value.toUpperCase();
        const table = document.getElementById("partsTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
            const partNameCell = rows[i].getElementsByTagName("td")[3]; // Get the "Part Name" cell
            if (partNameCell) {
                const txtValue = partNameCell.textContent || partNameCell.innerText;
                rows[i].style.display = txtValue.toUpperCase().includes(filter) ? "" : "none";
            }
        }
    });
</script>
</body>
</html>
