<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "aplot_db";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    if ($email && $password) {
        $stmt = $conn->prepare("SELECT * FROM registered_users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_name'] = $user['firstName'];
                echo json_encode(['success' => true, 'name' => $user['firstName']]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid password.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No account found with that email.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing email or password.']);
    }
}
$conn->close();
?>
