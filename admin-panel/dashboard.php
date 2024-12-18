<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: #fff;
            height: 100vh;
            position: fixed;
            left: -250px;
            top: 0;
            transition: 0.3s;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding-bottom: 20px;
            padding-left: 10px;
            margin-top: 150px;

        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #fff;
            cursor: pointer;
            font-size: 18px;
        }

        .sidebar ul li:hover {
            background-color: #0056b3;
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        .burger {
            font-size: 2rem;
            cursor: pointer;
            color: #007bff;
            margin: 20px;
           
        }

        .content {
            margin-left: 0;
            padding: 20px;
            transition: 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }

        .report-title {
            text-align: center;
            font-weight: bold;
            color: darkblue;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
        }

        .card {
            width: 45%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .card h5 {
            font-weight: bold;
        }

        .chart-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .popular-destinations ol {
            padding-left: 20px;
        }

        .revenue-table {
            width: 100%;
            border-collapse: collapse;
        }

        .revenue-table th, .revenue-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .revenue-table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li data-report="dailyBookings"><i class="fas fa-calendar-day"></i> Daily Bookings</li>
            <li data-report="weeklyBookings"><i class="fas fa-calendar-week"></i> Weekly Bookings</li>
            <li data-report="monthlyBookings"><i class="fas fa-calendar-day"></i> Monthly Bookings</li>
            <li data-report="popularDestinations"><i class="fas fa-map-marker-alt"></i> Popular Destinations</li>
            <li data-report="revenueReport"><i class="fas fa-chart-line"></i> Revenue Report</li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content" id="content">
        <i class="fas fa-bars burger" id="burger"></i>
        <div id="reportContent">
            <h1 class="report-title">Select a report from the menu</h1>
        </div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Toggle Sidebar
            const burger = document.getElementById("burger");
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");

            burger.addEventListener("click", () => {
                sidebar.classList.toggle("active");
                content.classList.toggle("active");
            });

            // Report Content Mapping
            const reports = {
                dailyBookings: `<div class="card"><h5>Daily Bookings Report</h5><canvas id="dailyBookingsChart"></canvas></div>`,
                weeklyBookings: `<div class="card"><h5>Weekly Bookings Report</h5><canvas id="weeklyBookingsChart"></canvas></div>`,
                monthlyBookings: `<div class="card"><h5>Monthly Bookings Report</h5><canvas id="monthlyBookingsChart"></canvas></div>`,
                popularDestinations: `<div class="card"><h5>Top 5 Popular Destinations</h5>
                                      <ol class="popular-destinations">
                                          <li>Lusaka (1200 bookings)</li>
                                          <li>Livingstone (850 bookings)</li>
                                          <li>Chipata (700 bookings)</li>
                                          <li>Ndola (500 bookings)</li>
                                          <li>Kitwe (450 bookings)</li>
                                      </ol></div>`,
                revenueReport: `<div class="card"><h5>Revenue Report</h5>
                                  <table class="revenue-table">
                                      <thead>
                                          <tr>
                                              <th>Month</th>
                                              <th>Revenue (ZMW)</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr><td>Jan</td><td>10,000</td></tr>
                                          <tr><td>Feb</td><td>12,000</td></tr>
                                          <tr><td>Mar</td><td>15,000</td></tr>
                                          <tr><td>Apr</td><td>14,000</td></tr>
                                          <tr><td>May</td><td>16,000</td></tr>
                                          <tr><td>Jun</td><td>18,000</td></tr>
                                      </tbody>
                                  </table></div>`
            };

            const reportContent = document.getElementById("reportContent");

            // Load Dynamic Content
            document.querySelectorAll(".sidebar ul li").forEach(item => {
                item.addEventListener("click", function () {
                    const reportKey = this.getAttribute("data-report");
                    reportContent.innerHTML = reports[reportKey] || `<h1 class="report-title">Report not found</h1>`;

                    // Destroy previous chart before initializing new one
                    destroyCharts();

                    // Correctly initialize charts only after content is loaded
                    setTimeout(() => {
                        if (["dailyBookings", "weeklyBookings", "monthlyBookings", "revenueReport"].includes(reportKey)) {
                            loadChart(reportKey);
                        }
                    }, 100); // Allow DOM update before chart is loaded
                });
            });

            // Destroy all charts before reinitializing to prevent growth issue
            let chartInstances = [];

            function destroyCharts() {
                chartInstances.forEach(chart => {
                    chart.destroy();
                });
                chartInstances = [];
            }

            // Sample Charts
            function loadChart(reportKey) {
                const chartType = reportKey === "revenueReport" ? "line" : "bar";
                const ctx = document.getElementById(`${reportKey}Chart`);
                if (!ctx) return;

                let chartData;
                let chartLabels;

                switch (reportKey) {
                    case "dailyBookings":
                        chartLabels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        chartData = [150, 200, 180, 220, 300, 400, 350];
                        break;
                    case "weeklyBookings":
                        chartLabels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
                        chartData = [1200, 1500, 1100, 1600];
                        break;
                    case "monthlyBookings":
                        chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
                        chartData = [5000, 4800, 5300, 5100, 6000, 5800, 6200];
                        break;
                    case "revenueReport":
                        chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
                        chartData = [10000, 12000, 15000, 14000, 16000, 18000];
                        break;
                    default:
                        return;
                }

                const chart = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: "Bookings",
                            data: chartData,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                chartInstances.push(chart); // Store the instance to destroy it later
            }

        });
    </script>
</body>

</html>
