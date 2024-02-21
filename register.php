<?php
header("Content-Type: application/json");

// Create the SQLite database and table if they don't exist
$db = new SQLite3("database.db");
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)");

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");

// Bind the parameters
$stmt->bindValue(1, $first_name);
$stmt->bindValue(2, $last_name);
$stmt->bindValue(3, $email);
$stmt->bindValue(4, $hashed_password);

// Execute the SQL statement
$result = $stmt->execute();

// Check for errors
if ($result) {
    echo json_encode(['message' => 'Registration successful.']);
} else {
    echo json_encode(['message' => 'An error occurred during registration.']);
}

// Close the database connection
$db->close();
?>