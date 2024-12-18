<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aplot_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get unread feedback count
$sql = "SELECT COUNT(*) as unread_count FROM feedback WHERE is_read = FALSE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['unread_count' => $row['unread_count']]);
} else {
    echo json_encode(['unread_count' => 0]);
}

$conn->close();
?>
