<?php
session_start();

// Restrict access to logged-in admins
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin-login.php'); // Redirect to login page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLOT Admin Panel</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">

    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: white;
        }

        .navbar-nav a {
            color: blue;
            margin-right: 25px;
            text-decoration: none;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
        }


        a[href="admin-logout.php"]:hover {
            color: darkred; /* Darker red on hover */
        }


        .nav-link i {
            margin-right: 5px;
            color: purple; /* Optional: match icon color to text */
            height: 70px;
        }

        .logo {
          color: rgb(255, 255, 255);
          font-size: 45px; /* Adjusted font size */
          line-height: 100px;
          padding-left: 5%;
          font-weight: bold;
          text-shadow: 2px 2px 4px rgba(0, 255, 234, 0.978); /* Added text shadow for depth */
          background: linear-gradient(45deg, #ff0099, rgb(255, 0, 0)); /* Added gradient background */
          -webkit-background-clip: text; /* Clip text to background */
          -webkit-text-fill-color: transparent; /* Make text transparent to show background */
          opacity: 0; /* Initially hide the logo */
          animation: slideFromLeft 5s ease-in-out forwards; /* Animation to slide from left to right */
        }


        /* Hero Section */
        .hero {
            background-image: url('https://img.freepik.com/free-vector/data-center-server-room-isometric-illustration_1284-63679.jpg');
            
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 4.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            color: black;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
            color: black;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
        }

        /* Features Section */
        .features {
            padding: 50px 0;
        }

        .features .feature {
            transition: transform 0.3s ease;
        }

        .features .feature:hover {
            transform: translateY(-10px);
        }

        .feature .card-body {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .feature i {
            font-size: 3.5rem;
            margin-bottom: 15px;
        }

        #unread-feedback-count {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 50%;
    color: white;
    background-color: red;
}


        .flight-icon { color: #3498db; }
        .booking-icon { color: #e74c3c; }
        .user-icon { color: #f39c12; }
        .dashboard-icon { color: #2ecc71; }
        .terms-icon { color: #9b59b6; }

        /* Footer */
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-white">

        <div class="logo">
            <a href="index.html" class="logo-link">
                <label class="logo">APLOT 
            </a>
        </div>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">
                            <i class="fas fa-user"></i> Admin profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>

                    <li>
                        <a href="admin-logout.php" style="color: red; font-weight: bold; transition: color 0.3s;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            
        
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div>
            <h1>Welcome, Admin</h1>
            <p>Manage Admins, Manage Finances, customer Support , and analytics with ease.</p>
            <a href="#features" class="btn btn-primary">Explore Features</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="text-center mb-5">Admin Features</h2>
            <div class="row">
            <!-- Flight Management -->
                <div class="col-md-4 feature">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-plane-departure flight-icon"></i>
                            <h5 class="card-title">Flight Management</h5>
                            <p>Manage flight schedules, routes, and aircraft details.</p>
                            <a href="flights.php" class="btn btn-primary">Manage Flights</a>
                        </div>
                    </div>
                </div>

                <!-- View Bookings -->
                <div class="col-md-4 feature">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-ticket-alt booking-icon"></i>
                            <h5 class="card-title">View Bookings</h5>
                            <p>Track customer bookings and monitor ticket sales.</p>
                            <a href="viewBooking.php" class="btn btn-primary">View Bookings</a>
                        </div>
                    </div>
                </div>

                <!-- Manage Users -->
                <div class="col-md-4 feature">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-users user-icon"></i>
                            <h5 class="card-title">Manage Users</h5>
                            <p>Handle user accounts, roles, and permissions.</p>
                            <a href="userM.php" class="btn btn-primary">Manage Users</a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard -->
                <div class="col-md-4 feature">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-pie dashboard-icon"></i>
                            <h5 class="card-title">Dashboard</h5>
                            <p>View analytics, frequent customers, and trips.</p>
                            <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                        </div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="col-md-4 feature">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-file-contract terms-icon"></i>
                            <h5 class="card-title">Terms & Conditions</h5>
                            <p>Manage user policies, privacy, and permissions.</p>
                            <a href="terms.php" class="btn btn-primary">Manage Terms</a>
                        </div>
                    </div>
                </div>
                
                 <!-- Complaints & Feedback -->
                <div class="col-md-4 feature">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-comments"></i>
                        <span id="unread-feedback-count" class="badge bg-danger" style="display: none;"></span>
                        <h5 class="card-title">Complaints & Feedback</h5>
                        <p>Log, categorize, and assign complaints to agents.</p>
                        <a href="adminFeedback.php" class="btn btn-primary">Manage Complaints</a>
                        
                    </div>
                </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 APLOT Admin Panel. All rights reserved.</p>
            <a href="#features">Back to top</a>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
   
// Function to fetch unread feedback count
function fetchUnreadFeedbackCount() {
    fetch('getUnreadFeedbackCount.php')
        .then(response => response.json())
        .then(data => {
            const countElement = document.getElementById('unread-feedback-count');
            if (data.unread_count > 0) {
                countElement.textContent = data.unread_count;
                countElement.style.display = 'inline-block';
            } else {
                countElement.style.display = 'none';
            }
        })
        .catch(error => console.error('Error fetching unread feedback count:', error));
}

// Call the function periodically (e.g., every 10 seconds)
setInterval(fetchUnreadFeedbackCount, 10000);

// Fetch count on page load
fetchUnreadFeedbackCount();

</script>
</body>

</html>
