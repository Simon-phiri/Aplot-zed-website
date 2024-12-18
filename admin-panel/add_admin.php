<?php
// Database connection
$servername = "localhost"; // Your DB server
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "aplot_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect the data from the form submission
$userType = $_POST['userType'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security
$phone = $_POST['phone'];

// Insert data into the 'admin' table
$sql = "INSERT INTO admins (name, email, password, phone, user_type) 
        VALUES ('$name', '$email', '$password', '$phone', '$userType')";

if ($conn->query($sql) === TRUE) {
    echo "New user added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
