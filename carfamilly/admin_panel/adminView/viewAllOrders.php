<?php
// Include database connection file
include_once "../config/dbconnect.php";

// Handle the Delete action
if (isset($_POST['delete'])) {
    $order_id = $_POST['order_id'];
    $delete_query = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("s", $order_id);
    if ($stmt->execute()) {
        echo "Order deleted successfully.";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
    $stmt->close();
}

// Handle the Deliver action
if (isset($_POST['deliver'])) {
    $order_id = $_POST['order_id'];
    $deliver_query = "UPDATE orders SET status = 'delivered' WHERE id = ?";
    $stmt = $conn->prepare($deliver_query);
    $stmt->bind_param("s", $order_id);
    if ($stmt->execute()) {
        echo "Order marked as delivered.";
    } else {
        echo "Error updating order status: " . $conn->error;
    }
    $stmt->close();
}

// Fetch all orders
$query = "SELECT * FROM orders";
$result = $conn->query($query);
if (!$result) {
    die("Error fetching orders: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        th {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-deliver {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-deliver:hover {
            background-color: #27ae60;
        }
        #searchBar {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        <input type="text" id="searchBar" placeholder="Search orders..." onkeyup="searchTable()">
        <table id="orderTable">
            <thead>
                <tr>
                    <th>Order No.</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Method</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Address Type</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["id"]) ?></td>
                            <td><?= htmlspecialchars($row["user_id"]) ?></td>
                            <td><?= htmlspecialchars($row["name"]) ?></td>
                            <td><?= htmlspecialchars($row["number"]) ?></td>
                            <td><?= htmlspecialchars($row["date"]) ?></td>
                            <td><?= htmlspecialchars($row["method"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["address"]) ?></td>
                            <td><?= htmlspecialchars($row["address_type"]) ?></td>
                            <td><?= htmlspecialchars($row["product_id"]) ?></td>
                            <td><?= htmlspecialchars($row["price"]) ?></td>
                            <td><?= htmlspecialchars($row["qty"]) ?></td>
                            <td><?= htmlspecialchars($row["status"]) ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($row['id']) ?>">
                                    <button type="submit" name="delete" class="btn-delete">Delete</button>
                                </form>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($row['id']) ?>">
                                    <button type="submit" name="deliver" class="btn-deliver">Deliver</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="14">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function searchTable() {
            let input = document.getElementById("searchBar");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("orderTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>
</html>

