<?php

    // Validate input (You can also sanitize and hash the password for security)
    if ($name && $email && $password && $phone) {
        // Database connection (Assuming you have a connection already)
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, user_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $name, $email, password_hash($password, PASSWORD_DEFAULT), $phone, $userType);

        if ($stmt->execute()) {
            echo 'User added successfully';
        } else {
            echo 'Error adding user';
        }
    } else {
        echo 'Invalid input';
    }
?>
