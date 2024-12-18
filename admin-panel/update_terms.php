<!-- \ -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTerms = $_POST["terms"];
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aplot_db";

        $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update terms in the database
    $sql = "UPDATE terms_conditions SET terms='$newTerms', last_updated=NOW() WHERE id=1";

    if ($conn->query($sql) === TRUE) {
        echo "Terms updated successfully";
    } else {
        echo "Error updating terms: " . $conn->error;
    }

    $conn->close();
}
?>
