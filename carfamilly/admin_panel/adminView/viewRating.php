<?php
include_once "../config/dbconnect.php"; // Include database connection

// Handle deletion
if (isset($_POST['rating_id_delete'])) {
    $rating_id = $_POST['rating_id_delete'];
    $delete_sql = "DELETE FROM ratings WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $rating_id);
    if ($stmt->execute()) {
        echo "<script>alert('Rating deleted successfully'); window.location.href = 'viewRating.php';</script>";
    } else {
        echo "<script>alert('Failed to delete rating');</script>";
    }
}

// Handle approval
if (isset($_POST['rating_id_approve'])) {
    // Display the approval message directly
    echo "<script>alert('Now client feedback is display.'); window.location.href = 'viewRating.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings Page</title>
    <script src="https://app.embed.im/snow.js" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Navbar Styling */
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
        
       /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: center;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    td {
        color: #333;
    }

    /* Button Styling */
    .delete-btn, .approve-btn {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-btn {
        background-color: #d9534f;
    }

    .approve-btn {
        background-color: #5bc0de;
    }

    .delete-btn:hover {
        background-color: #c9302c;
    }

    .approve-btn:hover {
        background-color: #31b0d5;
    }

    /* Center alignment for the No Ratings message */
    td[colspan="9"] {
        text-align: center;
        color: #555;
        font-style: italic;
    }
        /* Button Styling */
        .delete-btn, .approve-btn {
            padding: 5px 10px;
            color: white;
            border: none;
            cursor: pointer;
        }
        .delete-btn {
            background-color: #d9534f;
        }
        .approve-btn {
            background-color: #5bc0de;
        }
        .delete-btn:hover {
            background-color: #c9302c;
        }
        .approve-btn:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>

<!-- Navbar -->
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

<!-- Main Content -->
<div id="main">
    
<div id="main">
   <a href="../index.php">
    </a>
 
    <table>
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Product ID</th>
                <th>Rating</th>
                <th>Review</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM ratings";
                $result = $conn->query($sql);
                $count = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= htmlspecialchars($row["product_id"]) ?></td>
                <td><?= htmlspecialchars($row["rating"]) ?></td>
                <td><?= htmlspecialchars($row["review"]) ?></td>
                <td><?= htmlspecialchars($row["first_name"]) ?></td>
                <td><?= htmlspecialchars($row["last_name"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["created_at"]) ?></td>
                <td>
                    <!-- Approve Button -->
                    <form action="viewRating.php" method="POST" style="display:inline;">
                        <input type="hidden" name="rating_id_approve" value="<?= htmlspecialchars($row["id"]) ?>">
                        <button type="submit" class="approve-btn">Approve</button>
                    </form>
                    <!-- Delete Button -->
                    <form action="viewRating.php" method="POST" style="display:inline;">
                        <input type="hidden" name="rating_id_delete" value="<?= htmlspecialchars($row["id"]) ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='9'>No ratings found.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
