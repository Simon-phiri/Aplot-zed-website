<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'aplot_db';

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Fetch users from the registered_users table
$sql = 'SELECT id, firstName, middleName, lastName, city, phoneNumber, dob, email FROM registered_users';
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstName']}</td>
                <td>{$row['middleName']}</td>
                <td>{$row['lastName']}</td>
                <td>{$row['city']}</td>
                <td>{$row['phoneNumber']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['email']}</td>
                <td class='action-buttons'>
                    <a href='#' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                    <a href='#' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a>
                </td>
              </tr>";
    }
} else {
    echo '<tr><td colspan="9" class="text-center">No users found</td></tr>';
}

// Close the connection
$conn->close();
?>
