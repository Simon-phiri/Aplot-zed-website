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

// Fetch feedback from customer_service_feedback table
$sql = "SELECT id, name, email, type, message, submitted_at FROM customer_service_feedback";
$result = $conn->query($sql);

// Function to transfer feedback to another table
function transferFeedback($conn, $id, $table) {
    // Fetch the feedback data
    $sql = "SELECT name, email, type, message FROM customer_service_feedback WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $email, $type, $message);
    $stmt->fetch();
    $stmt->close();

    // Insert feedback into the target table
    $sql = "INSERT INTO $table (name, email, type, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $type, $message);
    $stmt->execute();
    $stmt->close();

    // Delete the feedback from the customer_service_feedback table
    $sql = "DELETE FROM customer_service_feedback WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Check if a transfer request has been made
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transfer_id']) && isset($_POST['target_table'])) {
    $transferId = $_POST['transfer_id'];
    $targetTable = $_POST['target_table'];
    transferFeedback($conn, $transferId, $targetTable);
    header("Location: manage_feedback.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Feedback</h1>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['submitted_at']; ?></td>
                            <td>
                                <form method="POST" action="manage_feedback.php">
                                    <input type="hidden" name="transfer_id" value="<?php echo $row['id']; ?>">
                                    <select name="target_table" class="form-select" required>
                                        <option value="" disabled selected>Transfer to...</option>
                                        <option value="admin_feedback">Admin</option>
                                        <option value="tech_team_feedback">Tech Team</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Transfer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No feedback found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
