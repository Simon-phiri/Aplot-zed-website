<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-image: url('https://images.unsplash.com/photo-1507608869273-0b4b796b8c42?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1080&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .header h1 {
            font-size: 5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            color: black;
        }

        .header p {
            
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            color: green;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .card-header {
            background-color: #343a40;
            color: white;
        }

        .form-control {
            border-radius: 20px;
        }

        table th, table td {
            vertical-align: middle;
        }

        .action-buttons a {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Flight Management</h1>
        <p>Manage flight schedules, routes, and aircraft details efficiently.</p>
        <a href="admin-index.html" class="btn btn-custom">Back to home <i class="fas fa-home"> </i></a>
    </div>

    <!-- Flight Management Section -->
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Flights List</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFlightModal">
                    <i class="fas fa-plus-circle"></i> Add Flight
                </button>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Flight Number</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Departure   Date</th>
                            <th>Arrival Date</th>
                            <th>Aircraft</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Data (Dynamically populate in backend) -->
                        <tr>
                            <td>1</td>
                            <td>FL123</td>
                            <td>Lusaka</td>
                            <td>Johannesburg</td>
                            <td>10-24-2024</td>
                            <td>10-26-2024</td>
                            <td>Zambia Airways</td>
                            <td class="action-buttons">
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                         <!-- Example Data (Dynamically populate in backend) -->
                        <tr>
                            <td>1</td>
                            <td>FL123</td>
                            <td>Lusaka</td>
                            <td>Johannesburg</td>
                            <td>10-24-2024</td>
                            <td>10-26-2024</td>
                            <td>Zambia Airways</td>
                            <td class="action-buttons">
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Flight Modal -->
    <div class="modal fade" id="addFlightModal" tabindex="-1" aria-labelledby="addFlightModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFlightModalLabel">Add New Flight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="flightNumber" class="form-label">Flight Number</label>
                            <input type="text" class="form-control" id="flightNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="origin" class="form-label">Origin</label>
                            <input type="text" class="form-control" id="origin" required>
                        </div>
                        <div class="mb-3">
                            <label for="destination" class="form-label">Destination</label>
                            <input type="text" class="form-control" id="destination" required>
                        </div>
                        <div class="mb-3">
                            <label for="departure" class="form-label">Departure Date</label>
                            <input type="date" class="form-control" id="departure" required>
                        </div>
                        <div class="mb-3">
                            <label for="arrival" class="form-label">Arrival Date</label>
                            <input type="date" class="form-control" id="arrival" required>
                        </div>
                        <div class="mb-3">
                            <label for="aircraft" class="form-label">Aircraft</label>
                            <input type="text" class="form-control" id="aircraft" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Flight</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
