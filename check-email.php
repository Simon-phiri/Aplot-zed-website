<?php
$host = "localhost";
$username = "root";
$password = ""; // Default for XAMPP
$dbname = "APLOT_db";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email from the request
$email = $_GET['email'] ?? '';

// Query to check if email exists
$sql = "SELECT email FROM registered_users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "exists"; // Email is already registered
} else {
    echo "available"; // Email is available
}

$stmt->close();
$conn->close();
?>
