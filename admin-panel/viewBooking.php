<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Manage Bookings</h1>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Flight</th>
                <th>From</th>
                <th>To</th>
                <th>Departure</th>
                <th>Return</th>
                <th>Trip Type</th>
                <th>People</th>
                <th>Class</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row 1: Pending status with Approve and Cancel options -->
            <tr data-status="Pending">
                <td>1</td>
                <td>John Doe</td>
                <td>Flight 101</td>
                <td>New York</td>
                <td>London</td>
                <td>2024-11-15</td>
                <td>2024-11-20</td>
                <td>Round Trip</td>
                <td>1</td>
                <td>Economy</td>
                <td class="status-text">Pending</td>
                <td class="action-buttons">
                    <button class="btn btn-success btn-sm approve-btn">Approve</button>
                    <button class="btn btn-danger btn-sm cancel-btn">Cancel</button>
                </td>
            </tr>

            <!-- Row 2: Approved status, no further actions available -->
            <tr data-status="Approved">
                <td>2</td>
                <td>Jane Smith</td>
                <td>Flight 202</td>
                <td>Paris</td>
                <td>Tokyo</td>
                <td>2024-12-01</td>
                <td>N/A</td>
                <td>One Way</td>
                <td>2</td>
                <td>Business</td>
                <td class="status-text">Approved</td>
                <td class="action-buttons">
                    <span class="badge bg-success">Approved</span>
                </td>
            </tr>

            <!-- Row 3: Cancelled status, no further actions available -->
            <tr data-status="Cancelled">
                <td>3</td>
                <td>Alice Johnson</td>
                <td>Flight 303</td>
                <td>Los Angeles</td>
                <td>Sydney</td>
                <td>2025-01-05</td>
                <td>2025-01-15</td>
                <td>Round Trip</td>
                <td>3</td>
                <td>First Class</td>
                <td class="status-text">Cancelled</td>
                <td class="action-buttons">
                    <span class="badge bg-danger">Cancelled</span>
                </td>
            </tr>

            <!-- Row 4: Pending status with Approve and Cancel options -->
            <tr data-status="Pending">
                <td>4</td>
                <td>Abby Mbunda</td>
                <td>Flight 102</td>
                <td>New York</td>
                <td>Lusaka</td>
                <td>2024-11-15</td>
                <td>2024-11-20</td>
                <td>Round Trip</td>
                <td>1</td>
                <td>Economy</td>
                <td class="status-text">Pending</td>
                <td class="action-buttons">
                    <button class="btn btn-success btn-sm approve-btn">Approve</button>
                    <button class="btn btn-danger btn-sm cancel-btn">Cancel</button>
                </td>
            </tr>

            <!-- Row 5: Pending status with Approve and Cancel options -->
            <tr data-status="Pending">
                <td>5</td>
                <td>Simon</td>
                <td>Flight 101</td>
                <td>New York</td>
                <td>Ndola</td>
                <td>2024-11-15</td>
                <td>2024-11-20</td>
                <td>Round Trip</td>
                <td>1</td>
                <td>Economy</td>
                <td class="status-text">Pending</td>
                <td class="action-buttons">
                    <button class="btn btn-success btn-sm approve-btn">Approve</button>
                    <button class="btn btn-danger btn-sm cancel-btn">Cancel</button>
                </td>
            </tr>

            <!-- Row 6: Pending status with Approve and Cancel options -->
            <tr data-status="Pending">
                <td>6</td>
                <td>John Doe</td>
                <td>Flight 101</td>
                <td>New York</td>
                <td>London</td>
                <td>2024-11-15</td>
                <td>2024-11-20</td>
                <td>Round Trip</td>
                <td>1</td>
                <td>Economy</td>
                <td class="status-text">Pending</td>
                <td class="action-buttons">
                    <button class="btn btn-success btn-sm approve-btn">Approve</button>
                    <button class="btn btn-danger btn-sm cancel-btn">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    // Handle Approve button click for Pending status
    $('.approve-btn').on('click', function() {
        const row = $(this).closest('tr');
        row.find('.status-text').text('Approved');
        row.find('.action-buttons').html('<span class="badge bg-success">Approved</span>');
    });

    // Handle Cancel button click for Pending status
    $('.cancel-btn').on('click', function() {
        const row = $(this).closest('tr');
        row.find('.status-text').text('Cancelled');
        row.find('.action-buttons').html('<span class="badge bg-danger">Cancelled</span>');
    });
});
</script>
</body>
</html>
