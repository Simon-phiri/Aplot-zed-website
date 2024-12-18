<!-- admin_terms.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Terms & Conditions</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- Internal CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-center {
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Update Terms & Conditions</h2>
    <form method="post" action="update_terms.php">
        <div class="form-group">
            <label for="terms">Terms & Conditions:</label>
            <textarea id="terms" name="terms" rows="10"><?php
                // Fetch existing terms from the database and display
                $host = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aplot_db";
                
                $conn = new mysqli($host, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
                }
                 $sql = "SELECT terms FROM terms_conditions WHERE id=1"; $result = $conn->query($sql); if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { echo nl2br($row["terms"]); } } else { echo "No terms found."; } $conn->close();
            ?>
                
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Terms</button>
    </form>
</div>

</body>
</html>
