<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aplot_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get admin details from session
$admin_id = $_SESSION['admin_id'];

// Handle profile picture upload
if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
    $fileName = $_FILES['profilePicture']['name'];
    $fileSize = $_FILES['profilePicture']['size'];
    $fileType = $_FILES['profilePicture']['type'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = "admin_{$admin_id}." . $fileExtension;
        $uploadPath = "uploads/profile_pictures/" . $newFileName;

        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Update profile picture in database
            $sql = "UPDATE admins SET profile_picture = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $newFileName, $admin_id);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, and PNG are allowed.";
    }
}

// Handle password change
if (!empty($_POST['defaultPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmPassword'])) {
    $defaultPassword = $_POST['defaultPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        die("New password and confirm password do not match.");
    }

    // Verify current password
    $sql = "SELECT password FROM admins WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($defaultPassword, $hashedPassword)) {
        die("Current password is incorrect.");
    }

    // Hash and update new password
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE admins SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashedNewPassword, $admin_id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

// Redirect back to settings page
header("Location: admin-settings.php?status=success");
exit();
?>
