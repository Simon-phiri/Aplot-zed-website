<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "your_db_username";
    $password = "your_db_password";
    $dbname = "aplot";

    $conn = new mysqli('localhost', 'root', '', 'aplot_db');

    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $department = $_POST['department'];
    $message = $_POST['message'];

    // Determine the table based on the selected department
    switch ($department) {
        case 'Customer Service':
            $table = 'customer_service_feedback';
            break;
        case 'Tech Team':
            $table = 'tech_team_feedback';
            break;
        case 'Admin':
            $table = 'admin_feedback';
            break;
        default:
            $table = 'customer_service_feedback';
    }

    // Insert feedback into the corresponding table
    $stmt = $conn->prepare("INSERT INTO $table (name, email, type, message) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare statement failed: ' . $conn->error]);
        exit();
    }
    
    $stmt->bind_param("ssss", $name, $email, $type, $message);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Feedback sent successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
