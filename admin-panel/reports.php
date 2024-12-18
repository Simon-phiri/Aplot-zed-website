<?php
// Database connection
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "aplot";

$conn = new mysqli('localhost', 'root', '', 'aplot_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback from all three tables
$feedback_data = [];

$tables = ['customer_service_feedback', 'tech_team_feedback', 'admin_feedback'];
foreach ($tables as $table) {
    $sql = "SELECT id, name, email, type, message, submitted_at FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $feedback_data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'type' => $row['type'],
                'message' => $row['message'],
                'submitted_at' => $row['submitted_at'],
                'source_table' => $table
            ];
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .report-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .report-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }
        .report-table th, .report-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .report-table th {
            background-color: #f2f2f2;
        }
        .chart-container {
            width: 100%;
            height: 400px;
        }
        @media (max-width: 768px) {
            .chart-container {
                height: 300px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-5">Admin Reports</h1>

        <!-- Feedback Summary Reports -->
        <div class="report-container">
            <h2>Feedback Summary Reports</h2>
            <div class="chart-container">
                <canvas id="feedback-summary-chart"></canvas>
            </div>
        </div>

        <!-- User Activity Reports -->
        <div class="report-container">
            <h2>User Activity Reports</h2>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Login Time</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>john Smith</td>
                        <td>2024-12-01 08:00:00</td>
                        <td>Logged in</td>
                    </tr>
                    <tr>
                        <td>Simon Tembo</td>
                        <td>2024-12-01 08:30:00</td>
                        <td>Viewed Booking Page</td>
                    </tr>
                    <tr>
                        <td>Abby Munda</td>
                        <td>2024-12-01 07:31:00</td>
                        <td>Booked a Ticket</td>
                    </tr>
                    <tr>
                        <td>Brian Chibbala</td>
                        <td>2024-11-01 08:39:00</td>
                        <td>Registred an account</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Transfer Reports -->
        <div class="report-container">
            <h2>Transfer Reports</h2>
            <div class="chart-container">
                <canvas id="transfer-chart"></canvas>
            </div>
        </div>

        <!-- Performance Reports -->
        <div class="report-container">
            <h2>Performance Reports</h2>
            <div class="chart-container">
                <canvas id="performance-chart"></canvas>
            </div>
        </div>

        <!-- Detailed Feedback Reports -->
        <div class="report-container">
            <h2>Detailed Feedback Reports</h2>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                        <th>Source</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedback_data as $feedback): ?>
                        <tr>
                            <td><?php echo $feedback['id']; ?></td>
                            <td><?php echo $feedback['name']; ?></td>
                            <td><?php echo $feedback['email']; ?></td>
                            <td><?php echo $feedback['type']; ?></td>
                            <td><?php echo $feedback['message']; ?></td>
                            <td><?php echo $feedback['submitted_at']; ?></td>
                            <td><?php echo ucfirst(str_replace('_', ' ', $feedback['source_table'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Comparison Reports -->
        <div class="report-container">
            <h2>Comparison Reports</h2>
            <div class="chart-container">
                <canvas id="comparison-chart"></canvas>
            </div>
        </div>

        <!-- User Reports -->
        <div class="report-container">
            <h2>User Reports</h2>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Logged in Users</td>
                        <td>197</td>
                    </tr>
                    <tr>
                        <td>Site Visitors</td>
                        <td>369</td>
                    </tr>
                    <tr>
                        <td>Most Visited Places</td>
                        <td>Livinstone</td>
                    </tr>
                    <tr>
                        <td>Most Explored Pages</td>
                        <td>Home, AI chatbot, Feedback</td>
                    </tr>
                    <tr>
                        <td>Most Booked Flight</td>
                        <td>New York to Livinstone</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Placeholder data for charts
        var feedbackSummaryData = {
            labels: ['Positive', 'Negative', 'Neutral'],
            datasets: [{
                label: 'Feedback Summary',
                data: [60, 20, 20],
                backgroundColor: ['#4caf50', '#f44336', '#ffeb3b']
            }]
        };

        var transferData = {
            labels: ['Admin', 'Tech Team'],
            datasets: [{
                label: 'Transfers',
                data: [15, 10],
                backgroundColor: ['#2196f3', '#ff9800']
            }]
        };

        var performanceData = {
            labels: ['Response Time', 'Resolution Rate', 'Satisfaction'],
            datasets: [{
                label: 'Performance',
                data: [80, 70, 85],
                backgroundColor: ['#4caf50', '#8bc34a', '#cddc39']
            }]
        };

        var comparisonData = {
            labels: ['2023', '2024'],
            datasets: [{
                label: 'Year-over-Year',
                data: [120, 150],
                backgroundColor: ['#9c27b0', '#673ab7']
            }]
        };

        // Chart instances
        var feedbackSummaryChart = new Chart(document.getElementById('feedback-summary-chart'), {
            type: 'pie',
            data: feedbackSummaryData
        });

        var transferChart = new Chart(document.getElementById('transfer-chart'), {
            type: 'bar',
            data: transferData
        });

        var performanceChart = new Chart(document.getElementById('performance-chart'), {
            type: 'bar',
            data: performanceData
        });

        var comparisonChart = new Chart(document.getElementById('comparison-chart'), {
            type: 'line',
            data: comparisonData
        });
    </script>

</body>
</html>
