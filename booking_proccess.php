<?php
// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "aplot_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $trip_type = $_POST['trip_type'];
    $people = $_POST['people'];
    $class = $_POST['class'];
    $departure_city = $_POST['departure_city'];
    $arrival_city = $_POST['arrival_city'];
    $total_price = $_POST['total_price'];
    $currency = $_POST['currency'];

    // SQL query to insert data
    $sql = "INSERT INTO bookings (gender, first_name, last_name, trip_type, people, class, 
                                  departure_city, arrival_city, total_price, currency) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisssds", $gender, $first_name, $last_name, $trip_type, $people, 
                                      $class, $departure_city, $arrival_city, $total_price, $currency);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Booking submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}
?>
