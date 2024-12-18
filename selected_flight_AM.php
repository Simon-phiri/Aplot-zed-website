<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Morocco - Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="selected_flight.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="Photos/air-moroco.png" style="height: auto; width: 125px;" alt="Airline Logo">
        <h1>Air Morocco</h1>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Notice -->
        <div class="notice mb-3">
            <p>Please enter correct details as they appear on your passport and NRC to avoid issues at the border.</p>
        </div>

        <!-- Form -->
        <form id="travelForm">
            <!-- Gender -->
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <!-- Personal Info -->
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" placeholder="Enter your first name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" placeholder="Enter your last name">
            </div>

            <!-- Luggage -->
            <section class="mb-4">
                <h4>Select Your Luggage</h4>
                <div class="d-flex justify-content-around">
                    <div class="text-center" data-luggage="Type 1">
                        <img src="Photos/luggega1.webp" alt="Luggage 1" style="height: 70px;">
                        <p>Luggage Type 1</p>
                    </div>
                    <div class="text-center" data-luggage="Type 2">
                        <img src="Photos/images2.png" alt="Luggage 2" style="height: 70px;">
                        <p>Luggage Type 2</p>
                    </div>
                    <div class="text-center" data-luggage="Type 3">
                        <img src="Photos/luggega2.webp" alt="Luggage 3" style="height: 70px;">
                        <p>Luggage Type 3</p>
                    </div>
                </div>
            </section>

            <!-- Trip Selection -->
            <section>
                <h4>Plan Your Trip</h4>
                <label>
                    <input type="radio" name="trip-type" value="one-way" checked> One-Way Trip
                </label>
                <label>
                    <input type="radio" name="trip-type" value="round-trip"> Round Trip
                </label>
                <div class="form-group mt-2">
                    <label>Number of People:</label>
                    <input type="number" class="form-control" name="people" min="1" value="1">
                </div>
                <div class="form-group">
                    <label for="classSelection">Select Class:</label>
                    <select id="classSelection" class="form-control">
                        <option value="economy">Economy</option>
                        <option value="business">Business</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure-city">Departure City:</label>
                    <input type="text" class="form-control" id="departure-city" placeholder="Enter departure city">
                </div>
                <div class="form-group">
                    <label>Arrival City:</label>
                    <input type="text" class="form-control" value="Eastern Province (Zambia)" readonly>
                </div>
                <button type="button" class="btn btn-primary scanPrice mb-3">Scan Price</button>

                <!-- Price and Currency -->
                <div id="priceDisplay" class="font-weight-bold text-success"></div>
                <div class="form-group">
                    <label for="currencySelection">Select Currency:</label>
                    <select id="currencySelection" class="form-control">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="ZMW">ZMW</option>
                    </select>
                </div>
                <div id="travelTimeDisplay" class="font-italic"></div>
                <div id="promoDisplay" class="text-success"></div>
                <div id="infoMessage" class="text-danger"></div>

                <button type="button" class="btn btn-success next-button">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </section>
        </form>
    </div>

    <!-- Include Bootstrap and JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Price Scanning Logic Example
        $(document).ready(function() {
            $(".scanPrice").click(function() {
                let classSelection = $("#classSelection").val();
                let people = $("input[name='people']").val();
                let basePrice = classSelection === "business" ? 300 : 150; // Example price logic
                let totalPrice = basePrice * people;
                
                // Currency Conversion Example
                let currency = $("#currencySelection").val();
                if (currency === "EUR") totalPrice *= 0.85;
                else if (currency === "GBP") totalPrice *= 0.75;
                else if (currency === "ZMW") totalPrice *= 20;

                $("#priceDisplay").html("Total Price: " + totalPrice.toFixed(2) + " " + currency);
            });
        });
    </script>
</body>
</html>
