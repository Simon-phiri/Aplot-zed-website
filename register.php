
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <?php
    // Database connection setup
    $host = "localhost";
    $username = "root";
    $password = ""; // Default for XAMPP
    $dbname = "APLOT_db";

    // Create a connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<div class='alert alert-danger' role='alert'>
                <i class='bi bi-exclamation-triangle-fill'></i> 
                Database connection failed: " . $conn->connect_error . "
             </div>");
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize inputs
        $firstName = $conn->real_escape_string($_POST['firstName']);
        $middleName = $conn->real_escape_string($_POST['middleName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $city = $conn->real_escape_string($_POST['city']);
        $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
        $dob = $_POST['dob'];
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $gender = $_POST['gender'];
        $terms = isset($_POST['terms']) ? 1 : 0;

        // SQL query to insert data
        $sql = "INSERT INTO registered_users 
                (firstName, middleName, lastName, city, phoneNumber, dob, email, password, gender, terms) 
                VALUES ('$firstName', '$middleName', '$lastName', '$city', '$phoneNumber', '$dob', 
                        '$email', '$password', '$gender', $terms)";

        // Attempt to execute the query
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>
                    <i class='bi bi-check-circle-fill'></i> 
                    Registration successful! <a href='unlogged.html' class='alert-link'>Go to homepage</a>.
                  </div>";
        } else {
            // Check if the error is due to a duplicate email entry
            if ($conn->errno === 1062) { // MySQL error code for duplicate entry
                echo "<div class='alert alert-warning' role='alert'>
                        <i class='bi bi-exclamation-triangle-fill'></i> 
                        Email already exists. Please try with a different email. <a href='registrationForm.php' class='alert-link'>Back to Registration</a>
                      </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='bi bi-exclamation-triangle-fill'></i> 
                        An unexpected error occurred: " . $conn->error . "
                      </div>";
            }
        }
    }

    // Close the connection
    $conn->close();
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
