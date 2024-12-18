<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'aplot_db';

// Database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Collect POST data
$userId = $_POST['userId'];
$flightName = $_POST['flightName'];
$departureCity = $_POST['departureCity'];
$arrivalCity = $_POST['arrivalCity'];
$departureDate = $_POST['departureDate'];
$returnDate = $_POST['returnDate'];
$tripType = $_POST['tripType'];
$people = $_POST['people'];
$luggageType = $_POST['luggageType'];
$classType = $_POST['classType'];

// Insert booking into database
$sql = "INSERT INTO bookings (user_id, flight_name, departure_city, arrival_city, departure_date, return_date, trip_type, people, luggage_type, class_type) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('isssssisis', $userId, $flightName, $departureCity, $arrivalCity, $departureDate, $returnDate, $tripType, $people, $luggageType, $classType);

if ($stmt->execute()) {
    echo 'Booking successfully created!';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>


<script>
	

	$('#confirmPin').on('click', function () {
    let pin = $('#mobilePin').val();
    if (!/^\d{4}$/.test(pin)) {
        $('#pinError').show();
        return;
    }

    $('#pinError').hide(); // Hide error if validation passes

    // Collect all necessary booking data
    const bookingData = {
        userId: 1, // Replace with session user_id for logged-in users
        flightName: 'Fly Emirates', 
        departureCity: $('#departure-city').val(),
        arrivalCity: $('#arrival-city').val(),
        departureDate: $('#departureDate').val(),
        returnDate: $('#returnDate').val(),
        tripType: $('input[name="trip-type"]:checked').val(),
        people: $('input[name="people"]').val(),
        luggageType: $('.ragege-option.selected').data('ragege'),
        classType: $('#classSelection').val()
    };

    $.ajax({
        url: 'add_booking.php',
        method: 'POST',
        data: bookingData,
        success: function (response) {
            alert('Booking successfully created!');
            $('#confirmationModal').modal('hide');
        },
        error: function (error) {
            console.error('Error creating booking:', error);
        }
    });
});

</script>