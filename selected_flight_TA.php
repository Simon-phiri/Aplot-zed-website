
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Morocco</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            .header {
                position: fixed;
                top: 0;
                width: 100%;
                background-color: #f8f9fa;
                text-align: center;
                padding: 20px;
                z-index: 1000;
                color: green;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        }

        .notice {
            background-color: blue;
            color: white;
            padding: 15px;
            margin: 230px 0;
            text-align: center;
        }

        .ragege-selection {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            padding: 15px;
            background-color: black;
        }

        .ragege-selection h2 {
            color: white;
        }

        .ragege-selection p {
            color: black;
        }


        .ragege-options {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .ragege-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .ragege-option:hover {
            transform: scale(1.1);
        }

        /* General Styling */

section.trip-selection {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    margin: 50px auto;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.trip-selection h3 {
    font-size: 1.8em;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600px;
}

.trip-selection label {
    font-size: 1.1em;
    color: #555;
    margin-right: 15px;
}

.trip-selection input[type="radio"] {
    margin-right: 8px;
}

.trip-selection input[type="text"],
.trip-selection input[type="number"],
.trip-selection select {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1em;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.trip-selection input[type="text"]:focus,
.trip-selection input[type="number"]:focus,
.trip-selection select:focus {
    border-color: #3498db;
    outline: none;
}

.trip-selection .scanPrice,
.trip-selection .next-button {
    width: 50%%;
    padding: 12px;
    margin: 10px 0;
    font-size: 1.2em;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.trip-selection .scanPrice {
    background-color: #3498db;
    color: white;
}
.trip-selection .next-button {
    background-color: #28a745;
    color: white;
    width: auto; /* Set width to auto */
    margin-left: 890px; /* Move the next button to the far right */
}

.trip-selection .scanPrice:hover {
    background-color: #2980b9;
}

.trip-selection .next-button {
    background-color: #28a745;
    color: white;
}

.trip-selection .next-button:hover {
    background-color: #218838;
}

@media (max-width: 768px) {
    section.trip-selection {
        padding: 15px;
    }

    .trip-selection h3 {
        font-size: 1.6em;
    }

    .trip-selection input[type="text"],
    .trip-selection input[type="number"],
    .trip-selection select {
        font-size: 0.9em;
    }

    .trip-selection .scanPrice,
    .trip-selection .next-button {
        font-size: 1em;

    }
}


         .modal-content {
            border-radius: 15px; /* Smooth corners for modern look */
            background: linear-gradient(145deg, #f0f0f0, #ffffff); /* Subtle gradient */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
            padding: 20px; /* Padding inside the modal for spacing */
        }

        .modal-header {
            border-bottom: none; /* Clean header without bottom border */
        }

        .modal-title {
            font-weight: bold;
            color: #007bff; /* Primary color for title */
        }

        .modal-body {
            font-size: 1.1em; /* Slightly larger font for better readability */
            line-height: 1.6; /* More space between lines */
            padding: 10px 0;
        }

        .modal-body p {
            margin-bottom: 10px;
        }

        .modal-footer {
            border-top: none; /* Remove footer border */
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 25px; /* Rounded buttons for modern look */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-3px); /* Subtle lift on hover */
        }

        .btn-secondary {
            border-radius: 25px;
            padding: 10px 20px;
            transition: transform 0.2s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
        }

        .ticket-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); /* Soft shadow around the info box */
        }

        .ticket-info p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        .modal-content {
    border-radius: 15px;
    background: linear-gradient(145deg, #f0f0f0, #ffffff);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.ticket-header h1.flight-name {
    font-size: 2em;
    font-weight: bold;
    color: #007bff;
    text-align: center;
    margin-bottom: 0;
}

.ticket-header p {
    text-align: center;
    font-size: 1.2em;
    color: #6c757d;
}

.header-line {
    border: none;
    height: 2px;
    background-color: #007bff;
    margin: 15px 0;
}

/* Add selected style for ragege-option */
.ragege-option.selected {
    background-color: #007bff;
    color: white;
    transform: translateY(-5px); /* Lift effect on hover */
}

/* Modal style for ticket */
.modal-content {
    border-radius: 15px;
    background: linear-gradient(145deg, #f0f0f0, #ffffff);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Styling ticket-header */
.ticket-header h1.flight-name {
    font-size: 2em;
    font-weight: bold;
    color: #007bff;
    text-align: center;
}

.ticket-header p {
    text-align: center;
    font-size: 1.2em;
    color: #6c757d;
}

/* Ticket details layout */
.ticket-details {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.ticket-details p {
    margin: 5px 0;
    font-size: 1.1em;
    color: #333;
}

/* Footer and barcode styling */
.ticket-footer {
    margin-top: 20px;
    text-align: center;
}

.footer-line {
    border: none;
    height: 2px;
    background-color: #007bff;
    margin: 15px 0;
}

.barcode img {
    width: 150px;
    height: 50px;
    margin: 0 auto;
    display: block;
}


.ticket-details {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.ticket-details p {
    margin: 5px 0;
    font-size: 1.1em;
    color: #333;
}

.ticket-footer {
    margin-top: 20px;
    text-align: center;
}

.footer-line {
    border: none;
    height: 2px;
    background-color: #007bff;
    margin: 15px 0;
}

.barcode {
    margin-top: 20px;
}

.barcode img {
    width: 150px;
    height: 50px;
    margin: 0 auto;
    display: block;
}

/* Button Styling */
.btn-success {
    background-color: #28a745;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-success:hover {
    background-color: #218838;
    transform: translateY(-3px);
}

.btn-secondary {
    border-radius: 25px;
    padding: 10px 20px;
    transition: transform 0.2s ease;
}

.btn-secondary:hover {
    transform: translateY(-3px);
}

        /* Additional styling for modern design */
        .header {
            padding: 20px;
            background: #007bff;
            color: white;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ragege-option {
            cursor: pointer;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, background-color 0.3s ease;
        }



        .ragege-option:hover {
            background-color: #007bff;
            color: white;
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .form-group {
            margin-top: 10px;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        .icon {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="Photos/Travel-img.jfif" style="height: auto; width: 125px; margin-left: -4 px;" alt="Airline 1 Icon"><h1>Travel Agent </h1>
</div>
<div class="container">
    <div class="notice">
         Please enter the correct details as they appear on your passport and NRC to avoid issues at the Boarder
    </div>
    <form id="travelForm">
        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male"
                       value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female"
                       value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName"
                   placeholder="Enter your first name">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName"
                   placeholder="Enter your last name">
        </div>

        <section class="ragege-selection">
            <h2>Select Your luggage</h2>
            <div class="ragege-options">
                <div class="ragege-option" data-ragege="Ragege Type 1">
                    <img src="Photos/luggega1.webp" style="height: 70px" width="70px">
                    <p>luggage Type 1</p>
                </div>
                <div class="ragege-option" data-ragege="Ragege Type 2">
                    <img src="Photos/images2.png" style="height: 70px" width="70px">
                    <p>luggage Type 2</p>
                </div>
                <div class="ragege-option" data-ragege="Ragege Type 3">
                    <img src="Photos/luggega2.webp" style="height: 70px" width="70px">
                    <p>luggage Type 3</p>
                </div>
            </div>
        </section>

       
    <section class="trip-selection">
        <h3>Plan Your Trip</h3>
        
        <label>
            <input type="radio" name="trip-type" value="one-way" checked>
            One-Way Trip
        </label>
        <label>
            <input type="radio" name="trip-type" value="round-trip">
            Round Trip
        </label>
        
        <br>
        
        <label>
            Number of People:
            <input type="number" name="people" min="1" value="1">
        </label>
        
        <br>
        <label for="classSelection">Select a class</label>
        <select id="classSelection">
            <option value="economy">Economy</option>
            <option value="business">Business</option>
        </select>
        <br>
        <br>
        <label>Departure City</label>
        <input type="text" id="departure-city" placeholder="Departure City">

        <label>Arrival City</label>
        <input type="text" id="arrival-city" placeholder="Eastern province(Zambia)" readonly>
        
        <button class="scanPrice">Scan Price</button>
        <br>

         <!-- This will show the calculated price -->
        <div id="priceDisplay" style="font-size: 1.5em; margin: 10px 0;"></div>
        <!-- Currency selection dropdown -->
        <label for="currencySelection">Select Currency:</label>
        <select id="currencySelection">
            <option value="USD" selected>USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="GBP">ZMW</option>
        </select>

<!-- Estimated travel time -->
<div id="travelTimeDisplay" style="font-size: 1.2em; margin-top: 5px;"></div>

<!-- Promo/Discount section -->
<div id="promoDisplay" style="font-size: 1em; color: green;"></div>
<div id="infoMessage" style="font-size: 1em; color: red;"></div>
            
        <button type="button" class="next-button">
            Next <i class="fas fa-arrow-right"></i>
        </button>
    </section>
    </form>

   <!-- Ticket Modal -->
<div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel">Your Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Ticket Design -->
            <div class="ticket-header">
                <h1 class="flight-name">🌍 Air Moroco ✈️</h1>
                <p>Flight Ticket</p>
                <hr class="header-line" />
            </div>

            <div class="modal-body">
                <!-- Horizontal Details Layout -->
                <div class="ticket-details">
                    <div>
                        <p><strong>First Name:</strong> <span id="ticket-first-name">John</span></p>
                        <p><strong>Last Name:</strong> <span id="ticket-last-name">Doe</span></p>
                        <p><strong>Trip Type:</strong> <span id="ticket-trip-type">Round-trip</span></p>
                    </div>
                    <div>
                        <p><strong>Seat:</strong> 10A</p>
                        <p><strong>Gate:</strong> 5</p>
                        <p><strong>Number of People:</strong> <span id="ticket-people">2</span></p>
                        <p><strong>Total Price:</strong> <span id="ticket-total-price">USD 100</span></p> <!-- Add this -->
                    </div>
                </div>

                <div class="ticket-footer">
                    <hr class="footer-line" />
                    <div class="barcode">
                        <img src="https://barcode.tec-it.com/barcode.ashx?data=AB1234&code=Code128&dpi=96" alt="Barcode">

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="confirmButton">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- New Modal for Mobile Number Input -->
<div class="modal fade" id="mobileNumberModal" tabindex="-1" aria-labelledby="mobileNumberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mobileNumberModalLabel">Enter Your Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Form for preferred number -->
                 <div class="form-group">
                    <label for="network">Select Network:</label>
                    <select class="form-control" id="network">
                        <option value="MTN">MTN</option>
                        <option value="AIRTEL">AIRTEL</option>
                        <option value="ZAMTEL">ZAMTEL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mobileNumber">Mobile Number:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Placeholder for flag icon -->
                            <span class="input-group-text" id="networkFlag"><img src="Photos/Flag_of_Zambia.svg.png" alt="Zambia Flag" width="20"></span>
                        </div>
                        <input type="text" class="form-control" id="mobileNumber" placeholder="Enter your mobile number">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submitNumber">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal for Deduction -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>A deduction of <strong>2500 ZMW</strong> will be made from your mobile number:</p>
                <p id="displayMobileNumber" class="text-primary font-weight-bold"></p>
                
                <div class="form-group">
                    <label for="mobilePin">Enter your Mobile PIN:</label>
                    <input type="password" class="form-control" id="mobilePin" placeholder="Enter 4-digit PIN" maxlength="4">
                </div>
                <p id="pinError" class="text-danger" style="display: none;">Please enter a valid 4-digit PIN for Airtel and 5 for zamtel and MTN.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="confirmPin">Confirm Payment</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<footer class="footer">
    <p>Follow us on:</p>
    <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
    <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
    <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</script>

<script>
$(document).ready(function () {
    // Default selected Ragege
    let selectedRagege = 'Not selected';

    // Ragege selection logic
    $('.ragege-option').on('click', function () {
        selectedRagege = $(this).data('ragege');
        $('.ragege-option').removeClass('selected');
        $(this).addClass('selected');
    });

    // Handle 'Next' button click
    $('.next-button').on('click', function (event) {
        event.preventDefault();

        // Collect form data
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
        let tripType = $('input[name="trip-type"]:checked').val();
        let numPeople = $('input[name="people"]').val();
        let classSelection = $()
        let gender = $('input[name="gender"]:checked').val() || 'Not specified';

        // Simple validation for required fields
        if (!firstName || !lastName || !selectedRagege || !numPeople || !classSelection) {
            alert('Please fill in all the required details.');
            return;
        }

        // Populate ticket with form data
        $('#ticket-first-name').text(firstName);
        $('#ticket-last-name').text(lastName);
        $('#ticket-trip-type').text(tripType);
        $('#ticket-people').text(numPeople);
        $('#ticket-gender').text(gender);
        $('#ticket-ragege').text(selectedRagege);
        $('#classSelection').text(classSelection);

        // Show the ticket modal
        $('#ticketModal').modal('show');
    });

    // Handle 'Confirm' button click to show mobile number modal
    $('#confirmButton').on('click', function () {
        $('#ticketModal').modal('hide');
        $('#mobileNumberModal').modal('show');  // Show the mobile number input modal
    });

    // Network short codes and flag icons
    const networkData = {
        "MTN": {
            flagIcon: "photos/Flag_of_Zambia.svg.png"
        },
        "AIRTEL": {
            flagIcon: "photos/Flag_of_Zambia.svg.png"
        },
        "ZAMTEL": {
           
            flagIcon: "photos/Flag_of_Zambia.svg.png"
        },
        "Zed Mobile": {
            shortCode: "+26099",
            
        }
    };

    // DOM elements for network selection
    const networkSelect = document.getElementById('network');
    const mobileNumberInput = document.getElementById('mobileNumber');
    const networkFlag = document.getElementById('networkFlag');

    // Function to update the short code and flag
    function updateNetworkDetails() {
        const selectedNetwork = networkSelect.value;
        
        // Check if the selected network exists in the data
        if (networkData[selectedNetwork]) {
            // Update the placeholder 
            mobileNumberInput.value = networkData[selectedNetwork];

            // Update the flag icon
            networkFlag.innerHTML = `<img src="${networkData[selectedNetwork].flagIcon}" alt="${selectedNetwork} Flag" width="20">`;
        }
    }

    // Listen for changes on the network select dropdown
    networkSelect.addEventListener('change', updateNetworkDetails);

    // Initialize the first network details when the modal is opened
    document.getElementById('mobileNumberModal').addEventListener('show.bs.modal', updateNetworkDetails);

    // Validate the mobile number based on the network
    function validateMobileNumber(number, network) {
        const mtnPattern = /^(096|076)\d{7}$/;     // MTN: 096 or 076 + 7 digits
        const airtelPattern = /^(097|077)\d{7}$/;  // Airtel: 097 or 077 + 7 digits
        const zamtelPattern = /^(095|0955)\d{6}$/; // Zamtel: 095 or 0955 + 6 digits
        

        switch (network) {
            case 'MTN':
                return mtnPattern.test(number);
            case 'AIRTEL':
                return airtelPattern.test(number);
            case 'ZAMTEL':
                return zamtelPattern.test(number);
            default:
                return false;
        }
    }

    // Handle 'Submit' button in the mobile number modal
    $('#submitNumber').on('click', function () {
        let mobileNumber = $('#mobileNumber').val();
        let network = $('#network').val();

        // Validate mobile number input
        if (!validateMobileNumber(mobileNumber, network)) {
            alert('Please enter a valid mobile number for ' + network + '.');
            return;
        }

        // Show confirmation modal with mobile number and deduction notice
        $('#displayMobileNumber').text(mobileNumber);
        $('#mobileNumberModal').modal('hide');
        $('#confirmationModal').modal('show');
    });

    // Handle the payment confirmation with PIN input
    $('#confirmPin').on('click', function () {
        let pin = $('#mobilePin').val();

        // Validate PIN (must be exactly 4 digits)
        if (!/^\d{4}$/.test(pin)) {
            $('#pinError').show();  // Show error if the PIN is invalid
            return;
        }

        // Hide error if validation passes
        $('#pinError').hide();

        // Simulate payment confirmation
        alert('Thank you for confirming your Pin.');
        $('#confirmationModal').modal('hide');
    });
});

</script>

<script src="tripCalculator.js"></script>
</body>
</html>
