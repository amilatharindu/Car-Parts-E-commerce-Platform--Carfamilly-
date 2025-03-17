<?php
session_start();
if (empty($_SESSION['admin_id']) || empty($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
if (!isset($_SESSION['id'])) {
  // header("Location: ../studentLogin.php"); // Redirect to login if not logged in
  // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://app.embed.im/snow.js" defer></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f8f9fa;
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



    .chart-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
      margin-top: 20px;
    }

    .chart-container {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .chart-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .chart-container h5 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 16px;
      color: #343a40;
    }

    .chart-container canvas {
      width: 100%;
      height: 250px;
    }
  </style>
</head>
<body>

<div class="navbar">
   <h3 class="logo">Hello, Admin</h3>
    <a href="adminView/viewAllOrders.php"><i class="fa fa-list"></i> Orders</a>
    <a href="adminView/viewParts.php"><i class="fa fa-th"></i> Parts</a>
    <a href="adminView/viewAllProducts.php"><i class="fa fa-th"></i> All Products</a>
    <a href="adminView/bookingad.php"><i class="fa fa-th"></i> Bookings</a>
    <a href="adminView/viewCustomers.php"><i class="fa fa-users"></i> Customers</a>
    <a href="adminView/viewRating.php"><i class="fa fa-th-large"></i> Ratings</a>    
    <a href="adminView/models.php"><i class="fa fa-list"></i> Models</a>
    <a href="adminView/brands.php"><i class="fa fa-list"></i> Brands</a>
    <?php if (isset($_SESSION['admin_id'])): ?>


<li class="nav-item mx-2">
<a class="nav-link" href="Booking/index.php">Booking a Meeting</a>
<li class="nav-item mx-2">
    </span>
</li>&emsp;&emsp;
<li class="nav-item mx-2">
    <a class="nav-link" href="adminlogout.php" onclick="return confirm('You want to logout?');">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</li>
<?php else: ?>
<li class="nav-item mx-2">
    <a class="nav-link" href="index.php">
        <i class="fas fa-user"></i> Sign In
    </a>
    
</li>
<?php endif; ?>
</div>

  <div class="chart-grid">
    <!-- Original Charts -->
    <div class="chart-container">
      <h5>Customers</h5>
      <canvas id="customersSplineChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Ratings</h5>
      <canvas id="ratingsAreaChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Orders</h5>
      <canvas id="partsPieChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Products</h5>
      <canvas id="productsStackedBarChart"></canvas>
    </div>

    <!-- New Charts -->
    <div class="chart-container">
      <h5>Impressions</h5>
      <canvas id="impressionsDoughnutChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Clicks</h5>
      <canvas id="clicksLineChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Registrations</h5>
      <canvas id="registerStackedAreaChart"></canvas>
    </div>
    <div class="chart-container">
      <h5>Full Details</h5>
      <canvas id="fullDetailsRadarChart"></canvas>
    </div>
  </div>

  <?php
  include_once "./config/dbconnect.php";

  // Fetch data for charts
  $tables = ["customers", "ratings", "parts", "products", "brands", "orders", "impressions", "clicks", "registrations"];
  $data = [];

  foreach ($tables as $table) {
      $sql = "SELECT COUNT(*) AS count FROM $table";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $data[$table] = $row['count'];
  }
  ?>

  <script>
    const chartData = <?php echo json_encode($data); ?>;

    // Spline Chart for Customers
    const customersSplineChartCtx = document.getElementById('customersSplineChart').getContext('2d');
    new Chart(customersSplineChartCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
          label: 'Customers',
          data: [50, 100, 150, 200, 250, 300, chartData.customers],
          borderColor: '#4e73df',
          backgroundColor: 'rgba(78, 115, 223, 0.2)',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: { y: { beginAtZero: true } }
      }
    });

    // Area Chart for Ratings
    const ratingsAreaChartCtx = document.getElementById('ratingsAreaChart').getContext('2d');
    new Chart(ratingsAreaChartCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
          label: 'Ratings',
          data: [30, 50, 80, 120, 150, 180, chartData.ratings],
          borderColor: '#1cc88a',
          backgroundColor: 'rgba(28, 200, 138, 0.2)',
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: { y: { beginAtZero: true } }
      }
    });

    // Pie Chart for Parts
    const partsPieChartCtx = document.getElementById('partsPieChart').getContext('2d');
    new Chart(partsPieChartCtx, {
      type: 'pie',
      data: {
        labels: ['Deliverd Order', 'in Progress Order', 'Cansel Order'],
        datasets: [{
          label: 'Order Distribution',
          data: [30, 40, chartData.parts],
          backgroundColor: ['#36b9cc', '#f6c23e', '#e74a3b']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        }
      }
    });

    // Stacked Bar Chart for Products
    const productsStackedBarChartCtx = document.getElementById('productsStackedBarChart').getContext('2d');
    new Chart(productsStackedBarChartCtx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
          {
            label: 'Top Serch',
            data: [10, 20, 30, 40, 50, 60, chartData.products / 2],
            backgroundColor: '#4e73df'
          },
          {
            label: 'Low Serch',
            data: [15, 25, 35, 45, 55, 65, chartData.products / 2],
            backgroundColor: '#1cc88a'
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: { x: { stacked: true }, y: { stacked: true, beginAtZero: true } }
      }
    });

    // Doughnut Chart for Impressions
    const impressionsDoughnutChartCtx = document.getElementById('impressionsDoughnutChart').getContext('2d');
    new Chart(impressionsDoughnutChartCtx, {
      type: 'doughnut',
      data: {
        labels: ['Organic', 'Paid', 'Social Media', 'Other'],
        datasets: [{
          label: 'Impressions',
          data: [chartData.impressions / 2, chartData.impressions / 3, chartData.impressions / 6, chartData.impressions / 12],
          backgroundColor: ['#36b9cc', '#4e73df', '#1cc88a', '#e74a3b']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        }
      }
    });

    // Line Chart for Clicks
    const clicksLineChartCtx = document.getElementById('clicksLineChart').getContext('2d');
    new Chart(clicksLineChartCtx, {
      type: 'line',
      data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
          label: 'Clicks',
          data: [50, 75, 100, 150, 200, 250, chartData.clicks],
          borderColor: '#f6c23e',
          backgroundColor: 'rgba(246, 194, 62, 0.2)',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: { y: { beginAtZero: true } }
      }
    });

    // Stacked Area Chart for Registrations
    const registerStackedAreaChartCtx = document.getElementById('registerStackedAreaChart').getContext('2d');
    new Chart(registerStackedAreaChartCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
          {
            label: 'Verified Users',
            data: [10, 20, 30, 40, 50, 60, chartData.registrations / 2],
            borderColor: '#4e73df',
            backgroundColor: 'rgba(78, 115, 223, 0.2)',
            fill: true
          },
          {
            label: 'Unverified Users',
            data: [5, 15, 25, 35, 45, 55, chartData.registrations / 2],
            borderColor: '#1cc88a',
            backgroundColor: 'rgba(28, 200, 138, 0.2)',
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: { y: { beginAtZero: true } }
      }
    });

    // Radar Chart for Full Details
    const fullDetailsRadarChartCtx = document.getElementById('fullDetailsRadarChart').getContext('2d');
    new Chart(fullDetailsRadarChartCtx, {
      type: 'radar',
      data: {
        labels: ['Impressions', 'Clicks', 'Registrations', 'Sales', 'Reviews'],
        datasets: [{
          label: 'Overall Performance',
          data: [
            chartData.impressions / 10,
            chartData.clicks / 10,
            chartData.registrations / 10,
            chartData.products / 10,
            chartData.ratings / 10
          ],
          backgroundColor: 'rgba(90, 92, 105, 0.2)',
          borderColor: '#5a5c69',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        }
      }
    });
  </script>

</body>
</html>
