<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Font Awesome for icons -->
    <script src="https://app.embed.im/snow.js" defer></script>

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
       

        .side-header img {
            display: block;
            margin: 0 auto; /* Center the logo */
        }

        hr {
            border: 1px solid;
            background-color: #8a7b6d;
            border-color: #3B3131;
        }
          /* Table Styling */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: center;
    }

    .table th,
    .table td {
        border: 1px solid #dddddd;
        padding: 12px;
    }

    .table th {
        background-color: #333;
        color: white;
        font-weight: bold;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

    .table td {
        color: #333;
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


    <div id="main">
    <a href="../index.php"></a>

    <h2 class="text-center">All Customers</h2>

    <!-- Search input field -->
    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Customer Name">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Contact Number</th>
                <th class="text-center">Address</th>
            </tr>
        </thead>
        <tbody id="customersTable">
        <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT id, name, email, contact_no, address FROM customers";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
            <tr class="customer-row">
                <td><?= $count ?></td>
                <td class="customer-name"><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["contact_no"] ?></td>
                <td><?= $row["address"] ?></td>
            </tr>
        <?php
                    $count++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No customers found</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    // Search functionality for customer names
    document.getElementById("searchInput").addEventListener("input", function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll("#customersTable .customer-row");

        rows.forEach(function(row) {
            var customerName = row.querySelector(".customer-name").textContent.toLowerCase();
            if (customerName.indexOf(searchValue) === -1) {
                row.style.display = "none";
            } else {
                row.style.display = "";
            }
        });
    });
</script>

</body>
</html>