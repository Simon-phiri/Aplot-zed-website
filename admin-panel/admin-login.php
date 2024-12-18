<?php
session_start();

$error_message = ''; // Initialize the error message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'aplot_db');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT id, password FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id']; // Store admin ID in session
            $_SESSION['admin_logged_in'] = true; // Set logged-in status
            header('Location: admin-index.php'); // Redirect to admin dashboard
            exit;
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "Admin not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .link-container {
            text-align: center;
            margin-top: 15px;
        }
        .link-container a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .link-container a:hover {
            text-decoration: underline;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <form method="POST" class="login-form">
        <h2 class="text-center">Admin Login</h2>

        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button>Login</button>

        <div class="link-container">
            <p>Don't have an account? <a href="admin-register.php">Register</a></p>
            <p>Login as <a href="junior-admin-login.php">Junior Admin</a> or <a href="support-admin-login.php">Support Admin</a></p>
        </div>
    </div>
    </form>
</body>
</html>
