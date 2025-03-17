<?php
// Database connection details
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "adminpanel";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert booking into the database
$sql = "INSERT INTO bookings (first_name, last_name, telephone, email, comments, date, time) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $firstName, $lastName, $telephone, $email, $comments, $date, $time);

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
