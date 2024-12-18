<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .card {
            margin-top: 20px;
            border-radius: 15px;
        }

        .action-buttons a {
            margin-right: 10px;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: gray;
        }

        /* Center the forms */
        #userDetailsForm, #passwordForm, #userTypeSelection, #successMessage {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Style success message */
        #successMessage p {
            font-size: 18px;
            color: green;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <h1>Admin Management</h1>
        <p>View and manage Junior and Technical Support Admins.</p>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Registered Admins</h3>
                <button id="addAdminBtn" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Add Admin</button>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adminTableBody">
                        <!-- Dynamic admin rows will be inserted here -->
                    </tbody>
                </table>
                <div id="noDataMessage" class="no-data d-none">
                    No admins registered yet.
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Details Form -->
    <div id="userDetailsForm">
        <h3 id="formTitle">Add New Admin</h3>
        <form id="addAdminForm">
            <label for="adminName">Name:</label>
            <input type="text" id="adminName" class="form-control" required>

            <label for="adminEmail">Email:</label>
            <input type="email" id="adminEmail" class="form-control" required>

            <label for="adminPassword">Password:</label>
            <input type="password" id="adminPassword" class="form-control" required>

            <label for="adminPhone">Phone Number:</label>
            <input type="text" id="adminPhone" class="form-control" required>

            <label for="adminRole">Role:</label>
            <select id="adminRole" class="form-control" required>
                <option value="">Select Role</option>
                <option value="junior_admin">Junior Admin</option>
                <option value="tech_support">Technical Support Admin</option>
            </select>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <!-- Success Message -->
    <div id="successMessage">
        <p>Admin added successfully!</p>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        // --- Fetch Admins from Backend ---
        function fetchAdmins() {
            $.ajax({
                url: 'fetch_admins.php', // Backend to fetch admins
                method: 'GET',
                success: function (data) {
                    if (data.trim() === '') {
                        $('#adminTableBody').html('');
                        $('#noDataMessage').removeClass('d-none');
                    } else {
                        $('#adminTableBody').html(data); // Inject admins into the table
                        $('#noDataMessage').addClass('d-none');
                    }
                },
                error: function (error) {
                    console.error('Error fetching admins:', error); // Handle fetch errors
                }
            });
        }

        // --- Add Admin Form Submission ---
        $('#addAdminForm').on('submit', function (event) {
            event.preventDefault();

            // Collect form data
            const adminData = {
                name: $('#adminName').val(),
                email: $('#adminEmail').val(),
                password: $('#adminPassword').val(),
                phone: $('#adminPhone').val(),
                role: $('#adminRole').val()
            };

            // AJAX request to add the admin
            $.ajax({
                url: 'add_admin.php', // Backend to handle adding the admin
                method: 'POST',
                data: adminData,
                success: function (response) {
                    alert(response);
                    $('#userDetailsForm').hide();
                    $('#addAdminForm')[0].reset(); // Reset form
                    fetchAdmins(); // Refresh admin list
                },
                error: function (error) {
                    console.error('Error adding admin:', error); // Handle add admin errors
                }
            });
        });

        // --- Load Admins on Page Load ---
        $(document).ready(function () {
            fetchAdmins();

            // Show Add Admin Form
            $('#addAdminBtn').click(function () {
                $('#userDetailsForm').show();
            });
        });
    </script>
</body>

</html>
