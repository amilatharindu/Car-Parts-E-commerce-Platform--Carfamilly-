<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $comments = htmlspecialchars($_POST['comments']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);

    // Email Validation (Gmail, Yahoo)
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com)$/", $email)) {
        echo "<h1 style='color: black;'>Invalid Email</h1><p>Please enter a valid Gmail or Yahoo email address.</p>";
        exit;
    }

    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "adminpanel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the selected date and time are already booked
    $checkSql = "SELECT * FROM bookings WHERE date = ? AND time = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $date, $time);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<h1 style='color: black;'>Time Slot Unavailable</h1><p>The selected time slot on $date at $time is already booked.</p>";
    } else {
        // Proceed with booking
        $sql = "INSERT INTO bookings (first_name, last_name, telephone, email, comments, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $firstName, $lastName, $telephone, $email, $comments, $date, $time);
        if ($stmt->execute()) {
            echo "<h1 style='color: black;'>Thank You!</h1><p>Your appointment is confirmed for $date at $time.</p>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
    $conn->close();
}
?>
