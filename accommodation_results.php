<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bookingstyles.css">
    <link rel="stylesheet" type="text/css" href="stylesFiles/imageModalStyles.css">
    <script src="jquery-3.7.1.js"></script>
    <title>Search Results</title>
    <style>
        body {
            background-image: url(images22/Gemini_Generated_Image_ygj001ygj001ygj0.jpeg);
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }
        header {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            text-align: center;
        }
        .results-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }
        .hotel-card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            width: 250px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .hotel-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .hotel-details {
            padding: 15px;
        }
        .hotel-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .hotel-offers {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .hotel-price {
            font-size: 16px;
            color: #e74c3c;
            margin-bottom: 10px;
        }
        .book-button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }
        .book-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <header>
        <h1>Search Results for Your Accommodation</h1>
        <a href="homepage.php">Home</a>
    </header>
    <div class="results-container">
        <!-- Example Hotel Card 1 -->
        <div class="hotel-card">
            <img src="images/hotel1.jpg" alt="Hotel Name 1">
            <div class="hotel-details">
                <div class="hotel-name">Luxury Suite</div>
                <div class="hotel-offers">Free Wi-Fi, Breakfast Included</div>
                <div class="hotel-price">K 1,200 per night</div>
                <button class="book-button">Book Now</button>
            </div>
        </div>

        <!-- Example Hotel Card 2 -->
        <div class="hotel-card">
            <img src="images/hotel2.jpg" alt="Hotel Name 2">
            <div class="hotel-details">
                <div class="hotel-name">Standard Room</div>
                <div class="hotel-offers">Pool Access, Gym Facilities</div>
                <div class="hotel-price">K 800 per night</div>
                <button class="book-button">Book Now</button>
            </div>
        </div>

        <!-- Example Hotel Card 3 -->
        <div class="hotel-card">
            <img src="images/hotel3.jpg" alt="Hotel Name 3">
            <div class="hotel-details">
                <div class="hotel-name">Budget Room</div>
                <div class="hotel-offers">Complimentary Parking</div>
                <div class="hotel-price">K 500 per night</div>
                <button class="book-button">Book Now</button>
            </div>
        </div>

        <!-- Add more hotel cards as needed -->
    </div>
</body>
</html>
