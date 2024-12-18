<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'aplot_db');

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Fetch junior and technical support admins from the 'admins' table
$sql = "SELECT id, name, email, phone, user_type FROM admins ORDER BY id DESC";
$result = $conn->query($sql);

// Debug SQL query execution
if (!$result) {
    die('Error executing query: ' . $conn->error); // Debugging: show the SQL error
}

// Check if there are any results
if ($result->num_rows > 0) {
    // Output each admin row as a table row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
        echo '<td>' . ucfirst(htmlspecialchars($row['user_type'])) . '</td>';
        echo '<td>
                <a href="edit_admin.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="delete_admin.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this admin?\')"><i class="fas fa-trash-alt"></i> Delete</a>
              </td>';
        echo '</tr>';
    }
} else {
    // If no admins are found
    echo '<tr><td colspan="6" class="text-center">No admins found.</td></tr>';
}

// Close the database connection
$conn->close();
?>
