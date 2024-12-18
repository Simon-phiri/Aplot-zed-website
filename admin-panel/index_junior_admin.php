<?php
session_start();

// Check if junior admin is logged in
if (!isset($_SESSION['junior_admin_logged_in']) || $_SESSION['junior_admin_logged_in'] !== true) {
    header('Location: junior-admin-login.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junior Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card i {
            font-size: 2rem;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .action-card {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome, Junior Admin</h1>
        <p class="text-center">Manage bookings, feedback, and customer issues efficiently.</p>

        <!-- Dashboard Metrics -->
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card p-4 action-card">
                    <i class="fas fa-ticket-alt text-primary"></i>
                    <h3>7</h3>
                    <p>Total Bookings</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 action-card">
                    <i class="fas fa-comment-dots text-warning"></i>
                    <h3>6</h3>
                    <p>Pending Feedback</p>
                </div>
            </div>

            <div class="col-md-4">
            <a href="view_users.php" style="text-decoration: none; color: black;">
                <div class="card p-4 action-card text-center">
                    <i class="fas fa-users text-success"></i>
                    <h3>157</h3>
                    <p>Active Users</p>
                </div>
            </a>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="row text-center mt-5">
            <div class="col-md-4">
                <a href="bookings.php" class="btn btn-primary w-100 py-3"><i class="fas fa-list"></i> View Bookings</a>
            </div>
            <div class="col-md-4">
                <a href="manage_feedback.php" class="btn btn-warning w-100 py-3"><i class="fas fa-comment"></i> Manage Feedback</a>
            </div>
            <div class="col-md-4">
                <a href="reports.php" class="btn btn-secondary w-100 py-3"><i class="fas fa-chart-bar"></i> Generate Reports</a>
            </div>
        </div>
    </div>
</body>
</html>
