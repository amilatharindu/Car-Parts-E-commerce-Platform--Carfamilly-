<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Items</title>
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
            padding: 10px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        #main {
            padding: 20px; /* Padding applied to the main content area */
        }
        #searchInput {
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            border: 2px solid #ddd;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            background-color: #fff;
            border: 1px solid #ddd;
          
        }
        td{
          
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
<br><br>
<div id="main">
 
    <input type="text" id="searchInput" placeholder="Search for brands...">
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Brand ID</th>
                <th>Brand Name</th>
                <th>Brand Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="brandTableBody">
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * FROM brands";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$count}</td>
                            <td>{$row['id']}</td>
                            <td class='brand-name'>{$row['brand_name']}</td>
                            <td><img src='{$row['brand_image']}' alt='Brand Image' style='width: 50px;'></td>
                            <td>
                                <button class='btn btn-primary btn-sm view-models' data-id='{$row['id']}'>View Models</button>
                            </td>
                          </tr>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No brands found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Brand Models Modal -->
<div class="modal fade" id="brandModelsModal" tabindex="-1" aria-labelledby="brandModelsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModelsModalLabel">Brand Models</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Brand ID</th>
                            <th>Model Name</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="modelsTableBody">
                        <!-- Content dynamically loaded -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Search functionality
        $('#searchInput').on('keyup', function () {
            const value = $(this).val().toLowerCase();
            $('#brandTableBody tr').filter(function () {
                $(this).toggle($(this).find('.brand-name').text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Load models for a brand
        $('.view-models').on('click', function () {
            const brandId = $(this).data('id');
            $('#brandModelsModal').modal('show');
            $('#modelsTableBody').html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');

            $.ajax({
                url: 'getBrandModels.php',
                method: 'GET',
                data: { brandId: brandId },
                success: function (response) {
                    $('#modelsTableBody').html(response);
                },
                error: function () {
                    $('#modelsTableBody').html('<tr><td colspan="6" class="text-danger text-center">Failed to load models. Please try again.</td></tr>');
                }
            });
        });
    });
</script>
</body>
</html>
