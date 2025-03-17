<?php
require_once 'vendor/autoload.php'; // Include Twilio SDK

use Twilio\Rest\Client;

// Twilio credentials
$accountSid = 'AC51c13a574bb686aa02d97b55792b22fe';
$authToken = '3f1e2e9d28fa18e826378057e9e17c1f';
$twilioNumber = '+12185683905';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminpanel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read JSON input
$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'];
$bookingId = $data['id'];
$clientPhone = $data['phone'];
$reason = $data['reason'];

if ($action === 'cancel') {
    // Update booking status in the database
    $sql = "UPDATE bookings SET status = 'Cancelled', reason = '$reason' WHERE id = $bookingId";
    if ($conn->query($sql) === TRUE) {
        // Send cancellation SMS
        $client = new Client($accountSid, $authToken);
        try {
            $client->messages->create(
                $clientPhone,
                [
                    'from' => $twilioNumber,
                    'body' => "Your booking (ID: $bookingId) has been canceled. Reason: $reason"
                ]
            );
            echo "Cancellation successful. SMS sent to client.";
        } catch (Exception $e) {
            echo "Booking canceled, but failed to send SMS: " . $e->getMessage();
        }
    } else {
        echo "Failed to update booking status in database.";
    }
}

$conn->close();
?>
