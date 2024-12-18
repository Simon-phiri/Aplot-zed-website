<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'aplot_db';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Collect POST data
$userId = $_POST['userId'];
$flightName = $_POST['flightName'];
$departureCity = $_POST['departureCity'];
$arrivalCity = $_POST['arrivalCity'];
$departureDate = $_POST['departureDate'];
$returnDate = $_POST['returnDate'];
$tripType = $_POST['tripType'];
$people = $_POST['people'];
$luggageType = $_POST['luggageType'];
$classType = $_POST['classType'];

// Insert booking into database
$sql = "INSERT INTO bookings (user_id, flight_name, departure_city, arrival_city, departure_date, return_date, trip_type, people, luggage_type, class_type) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('SQL Error: ' . $conn->error);
}
$stmt->bind_param('isssssisis', $userId, $flightName, $departureCity, $arrivalCity, $departureDate, $returnDate, $tripType, $people, $luggageType, $classType);

if ($stmt->execute()) {
    echo 'Booking successfully created!';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
