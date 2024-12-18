<?php
session_start();

// Replace with your database connection details
$servername = "localhost";
$username = "";
$password = "";
$dbname = "aplot";

$conn = new mysqli('localhost', 'root', '', 'aplot_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM support_teams WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashedPassword);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($inputPassword, $hashedPassword)) {
            $_SESSION['support_team'] = $id;
            header("Location: support-dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Username not found.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Support Login</title>
    <!-- Internal CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
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
        <h2>Technical Support Login</h2>
        <div id="error-message" class="error">
            <?php if (isset($error)) echo $error; ?>
        </div>
        <form id="login-form" method="POST">
            <label for="username">Enter Username</label>
            <input type="text" id="username" name="username" placeholder="Please enter Username" required>
            <label for="password">Enter Password</label>
            <input type="password" id="password" name="password" placeholder="Please enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <!-- Internal JavaScript -->
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var errorMessage = document.getElementById('error-message');

            if (username === '' || password === '') {
                errorMessage.textContent = 'Please fill in all fields.';
            } else {
                // Submit the form via JavaScript
                var form = event.target;
                form.submit();
            }
        });
    </script>
</body>
</html>
