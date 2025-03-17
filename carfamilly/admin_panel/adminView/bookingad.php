<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Admin Page</title>
    <script src="https://app.embed.im/snow.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Font Awesome for icons -->
    
    <style>
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
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            color: #333;
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
        td[colspan="3"] {
            text-align: center;
            font-style: italic;
            color: #777;
        }
        .text-center {
            text-align: center;
        }
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
        .action-btn {
            cursor: pointer;
            padding: 5px 10px;
            margin-right: 5px;
        }
        .approve {
            background-color: #4CAF50;
            color: white;
        }
        .cancel {
            background-color: #f44336;
            color: white;
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
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="booking-table">
            <?php
            // Database connection
            $servername = "localhost:3308";
$username = "root"; 
$password = "";      
$dbname = "adminpanel";

$conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, first_name, last_name, telephone, email, comments, date, time, status FROM bookings";
            $result = $conn->query($sql);
            

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['telephone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['comments']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td id='status-{$row['id']}'>{$row['status']}</td>
                        <td>
                            <button class='action-btn approve' onclick='approveBooking({$row['id']})'>Approve</button>
                            <button class='action-btn cancel' onclick='cancelBooking({$row['id']})'>Cancel</button>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No bookings found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        function approveBooking(id) {
            const statusCell = document.getElementById(`status-${id}`);
            statusCell.textContent = 'Approved';
            alert(`Booking ID ${id} approved.`);
            // Add AJAX request to update database if needed
        }

        function cancelBooking(id) {
            const reason = prompt('Enter the reason for cancellation:');
            if (reason) {
                const statusCell = document.getElementById(`status-${id}`);
                statusCell.textContent = `Cancelled: ${reason}`;
                alert(`Booking ID ${id} cancelled with reason: ${reason}`);
                // Add AJAX request to update database if needed
            }
        }
    </script>
</body>
</html>
