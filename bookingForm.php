<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="hotel-bookingstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="jquery-3.7.1.js"></script>
    <title>Booking</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Ensure html and body take full height */
            overflow: hidden; /* Prevent scrollbars */
        }

        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        button {
            padding: 12px;
            font-size: 18px;
            color: white;
            background: linear-gradient(to right, #3498db, #2ecc71);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        button:hover {
            background: linear-gradient(to right, #2ecc71, #3498db);
        }

        a {
            padding: 12px;
            font-size: 18px;
            color: white;
            background: linear-gradient(to right, #3498db, #2ecc71);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        a:hover {
            background: linear-gradient(to right, #2ecc71, #3498db);
        }
    </style>
</head>
<body>
    <!-- Background Image -->
    <img class="bg-image" src="photos/large-swimming-pool-surrounded-by-palm-trees_75778-5884.jpg" alt="Beautiful pool background">

    <div class="word">
        <a href="index.html" class="active"><i class="fas fa-home"></i> Home</a>
    </div>
    <div class="form-cont">
        <header class="booking-title">
            <section>
                <h1>Accommodation Booking</h1>
            </section>
        </header>

        <form action="hotel-search-results.php" method="POST">
           
            <label for="accommodation">Type Of Accommodation</label><br>
            <select id="div1" name="accommodation" required>
                <option value="Luxury Suite">Luxury Suite</option>
                <option value="Budget Room">Budget Room</option>
                <option value="Standard Room">Standard Room</option>
            </select><br>
            
            <label for="date">Select Date:</label><br>
            <input type="date" name="date" required><br>
            
            <label for="rooms">Number of Rooms:</label><br>
            <input type="number" name="rooms" min="1" max="5" required><br>
            
            <label for="place">Which province of Zambia:</label><br>
            <input type="text" name="place" required><br>
            
            <button type="submit">search</button>
        </form>
    </div>
</body>
</html>
