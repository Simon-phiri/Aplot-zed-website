<?php
// Handle payment processing here
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotelName = $_POST['hotelName'];
    $hotelPrice = $_POST['hotelPrice'];
    $mobileNumber = $_POST['mobileNumber'];

    // Process payment with the mobile number (dummy implementation)
    echo "<script>
        alert('Payment processed successfully for hotel $hotelName with price $hotelPrice');
        window.location.href = 'index.html';
    </script>";
}
?>
