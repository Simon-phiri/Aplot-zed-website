<?php
// Sample data - Array of hotels for demonstration purposes
$hotels = [
    [
        "name" => "Twalumba lodge",
        "offers" => "Free Wi-Fi, Breakfast Included, free swimming",
        "price" => 1200,
        "type" => "Luxury Suite",
        "img" => "Photos/276505.jpg",
        "location" => "Lusaka",
        "rooms" => 3 // Number of rooms available
    ],
    [
        "name" => "Chipata Hotel",
        "offers" => "Pool Access, Gym Facilities, DSTV",
        "price" => 800,
        "type" => "Standard Room",
        "img" => "Photos/chipatahotel.jfif",
        "location" => "Chipata",
        "rooms" => 2 // Number of rooms available
    ],
    [
        "name" => "Tigwilizane",
        "offers" => "Complimentary Parking, Breakfast Included, DSTV",
        "price" => 500,
        "type" => "Budget Room",
        "img" => "Photos/hotel1.jfif",
        "location" => "Lusaka",
        "rooms" => 1 // Number of rooms available
    ],
    [
        "name" => "Lusaka Hotel",
        "offers" => "Free Breakfast, Gym Facilities, Free Wi-Fi",
        "price" => 900,
        "type" => "Luxury Suite",
        "img" => "Photos/hotel2.jfif",
        "location" => "Lusaka",
        "rooms" => 4 // Number of rooms available
    ],
    [
        "name" => "Hotel B",
        "offers" => "Free Parking, Breakfast and lunch, Wi-Fi",
        "price" => 1100,
        "type" => "Luxury Suite",
        "img" => "Photos/hotelB.jpg",
        "location" => "Lusaka",
        "rooms" => 2 // Number of rooms available
    ],
    [
        "name" => "Budget Stay",
        "offers" => "Affordable Rates",
        "price" => 300,
        "type" => "Budget Room",
        "img" => "Photos/hotel3.jfif",
        "location" => "Chipata",
        "rooms" => 5 // Number of rooms available
    ],
    [
        "name" => "Livingstone City Hotel",
        "offers" => "Swimming pool only",
        "price" => 600,
        "type" => "Standard Room",
        "img" => "Photos/hotel4.jfif",
        "location" => "Livingstone",
        "rooms" => 3 // Number of rooms available
    ],
    [
        "name" => "Livingstone City Hotel",
        "offers" => "Swimming pool only",
        "price" => 200,
        "type" => "Standard Room",
        "img" => "Photos/hotel1.jfif",
        "location" => "Livingstone",
        "rooms" => 2 // Number of rooms available
    ]
];

// Database connection
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "aplot_db";

$conn = new mysqli('localhost', 'root', '', $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$accommodation = $_POST['accommodation'] ?? null;
$date = $_POST['date'] ?? null;
$rooms = $_POST['rooms'] ?? null;
$place = $_POST['place'] ?? null;

// Insert data into bookings table
$sql = "INSERT INTO hotel_accomodation (name, email, phone, accommodation, date, rooms, place) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssis", $name, $email, $phone, $accommodation, $date, $rooms, $place);

if ($stmt->execute()) {
    echo "<script>alert('Booking successfully saved!');</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Filter hotels based on search criteria (number of rooms and place)
$filtered_hotels = array_filter($hotels, function($hotel) use ($place, $rooms) {
    return (strcasecmp($hotel['location'], $place) == 0) && ($hotel['rooms'] >= $rooms);
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hotel-booking-styles.css">
    <title>Search Results</title>
</head>
<body>
<header>
    <h1>Search Results for Your Accommodation</h1>
    <a href="bookingForm.php">Back to Search</a>
</header>
<div class="results-container">
    <?php if (empty($filtered_hotels)): ?>
        <p>No hotels found matching your criteria.</p>
    <?php else: ?>
        <?php foreach ($filtered_hotels as $hotel): ?>
            <div class="hotel-card">
                <div class="hotel-image">
                    <img src="<?= $hotel['img'] ?>" alt="<?= $hotel['name'] ?>">
                    <div class="hotel-name"><?= $hotel['name'] ?></div>
                </div>
                <div class="hotel-offers"><?= $hotel['offers'] ?></div>
                <div class="hotel-price">K <?= $hotel['price'] ?> per night</div>
                <button class="book-button" data-hotel="<?= $hotel['name'] ?>" data-price="<?= $hotel['price'] ?>">Book Now</button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Enter Mobile Number for Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process-payment.php" method="POST">
                    <div class="mb-3">
                        <label for="hotelName" class="form-label">Hotel</label>
                        <input type="text" class="form-control" id="hotelName" name="hotelName" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="hotelPrice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="hotelPrice" name="hotelPrice" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.book-button').click(function() {
            var hotelName = $(this).data('hotel');
            var hotelPrice = $(this).data('price');
            $('#hotelName').val(hotelName);
            $('#hotelPrice').val(hotelPrice);
            $('#paymentModal').modal('show');
        });
    });
</script>

</body>
</html>
