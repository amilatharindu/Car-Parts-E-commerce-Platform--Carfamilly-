<?php

$server = "localhost:3308";
$user = "root";
$password = "";
$db = "adminpanel";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>