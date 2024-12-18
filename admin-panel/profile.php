<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit;
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'aplot_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch admin details
$adminId = $_SESSION['admin_id'];
$sql = "SELECT username, email, profile_picture FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("i", $adminId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    die("Admin details not found. Please ensure the admin table is populated and the ID exists.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007bff;
        }
        .profile-header h1 {
            margin-top: 15px;
            font-size: 24px;
            color: #333;
        }
        .profile-header p {
            font-size: 16px;
            color: #555;
        }
        .btn-primary {
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .stats-card {
            flex: 1;
            margin: 0 10px;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }
        .stats-card h2 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .stats-card p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header text-center">
            <img src="uploads/admin_profiles/<?php echo htmlspecialchars($admin['profile_picture']); ?>" alt="Profile Picture">
            <h1><?php echo htmlspecialchars($admin['username']); ?></h1>
            <p><?php echo htmlspecialchars($admin['email']); ?></p>
            <p><strong>Position:</strong> Senior Admin</p> <!-- Hardcoded HTML -->
            <a href="admin-edit-profile.php" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profile</a>
        </div>

        <!-- Profile Stats -->
        <div class="stats-container">
            <div class="stats-card">
                <h2>25</h2>
                <p>Tasks Completed</p>
            </div>
            <div class="stats-card">
                <h2>15</h2>
                <p>Feedback Managed</p>
            </div>
            <div class="stats-card">
                <h2>50+</h2>
                <p>Bookings Handled</p>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="text-center mt-4">
            <a href="admin-index.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a>
            <a href="adminFeedback.php" class="btn btn-primary"><i class="fas fa-comments"></i> Feedback</a>
            <a href="admin-logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</body>
</html>
