<?php
session_start();
session_unset(); // Clear session variables
session_destroy(); // Destroy the session
header("Location: customerLogin.php"); // Redirect to the login page
exit();
?>
