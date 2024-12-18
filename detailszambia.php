<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Explore Zambia</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

                 /* Make the image container full width and relative */
.image-container {
    position: relative;
    width: 100%;
    max-width: 100%; /* Ensures it takes full width */
    margin: 0 auto; /* Center the image if there are margins */
    overflow: hidden; /* Ensures no text goes out of bounds */
}

.image-container img {
    width: 100%;
    max-height: 300px; /* Set a max height (adjust as needed) */
    height: auto; /* Keeps the aspect ratio */
    display: block; /* Remove bottom margin/extra space */
}


/* Style the overlay text */
.image-heading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Center the text */
    color: white;
    font-size: 2.5em; /* Adjust size as needed */
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for readability */
    padding: 20px; /* Padding around the text */
    border-radius: 10px; /* Smooth rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Shadow for added depth */
    width: 80%; /* Control the width of the text block */
}
  

        /* Styles for headings */
        h1 {
            font-size: 34px;
            text-shadow: 4px 2px 2px black;
            text-align: center;
            color: greenyellow;
            background-color: blue;
            margin-top: 0;
        }

      h3 {
            margin-top: 20px;
            text-align: center;
            text-decoration:none;
            font-size: 24px;
            }

        /* Styles for form and search bar */
        .search-form {
            width: 80%;
            margin: 20px auto;
            background-color: #c5c5c5;
            border-radius: 10px;
            padding: 10px;
        }

        .search-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-bar label {
            flex: 0 0 120px;
        }

        .search-bar input, .search-bar button {
            padding: 10px;
            border: 1px solid #d6d1d1;
            border-radius: 10px;
            font-size: 14px;
            width: calc(25% - 20px);
        }

        .search-bar button {
            background-color: #0062e2;
            color: #000000;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        /* Styles for table and table container */
        .table-container {
            width: 80%;
            margin: 0 auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 8px 8px 8px 0px;
            text-align: center;
            height: 55px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .select-flight-button {
            margin-left: 75%;
            margin-right: auto;
            color: #0062e2;
            padding: 10px 10px;
            text-decoration: none; /* Remove underline from the link */
            border: 2px solid #0062e2;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

       .select-flight-button:hover {
        background-color: #0062e2;
        color: #fff; /* Change text color on hover */
       }

        /* Specific border styles for the first and last rows */
        :first-child th {
            border-bottom: 3px solid #00d1e0; /* Bottom border for the first row */
            background-color: #514e4e;
            height: 75px;
            color: aqua;
            font-size: large;
            padding-right: 0px;
        }

        :last-child td {
            border-top: 3px solid #00ffff; /* Top border for the last row */
        }

        /* CSS for flight details */
        .flight-details {
            display: none; /* Hide the flight details by default */
            font-family: Arial, sans-serif; /* Change font family */
            color: #ff0000; /* Change font color */
            padding: 10px; /* Add padding */
        }


        /* CSS for toggle icon */
        .toggle-details.clicked {
            color: red; /* Change color upon clicking */
        }

        .toggle-details.clicked:hover {
            color: blue; /* Change hover color upon clicking */
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            /* Adjust table styles for smaller screens */
            table {
                font-size: 12px; /* Decrease font size for smaller screens */
            }
             td {
                padding: 6px; /* Decrease cell padding for smaller screens */
            }
            th {
               padding:  6px;

            }

            /* CSS style for expanding each row */
            .flight-row.expanded .flight-details {
                display: table-row; /* Show the details row when the flight row is expanded */
            }
        }
    </style>
</head>
<body> 
  
<div class="image-container">
        <img src="Photos/zed-img.jfif" alt="Picture of zambia post">
        <h1 class="image-heading">Welcome to Zambia, Home to the might Victoria Falls</h1>
    </div>
    <form action="/search" method="get" class="search-form">
        <div class="search-bar">
            <label for="from">From:</label>
            <input type="text" id="from" name="from" placeholder="Enter departure city">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" placeholder="Zambia">
            <label for="date">Departure Date:</label>
            <input type="date" id="date" name="date">
            <label for="return-date">Return Date:</label>
            <input type="date" id="return-date" name="return_date">
            <button type="submit"><i class="fas fa-search"></i> Search Flights</button>
        </div>
    </form>

    <h3 style="padding-left: 10%;">Best Departing Flights</h3>
    <div class="table-container">
        <table>
            <tr>
                <th>Airline Logo</th>
                <th>Name</th>
                <th>Departure Time</th>
                <th>Duration</th>
                <th>Price(K)</th>
            </tr>
            <tr class="flight-row">
                <td><img src="photos/fly emirates.jfif" style="height: 100px; width: 105px; margin-left: 9px; border-radius: 100%;"  alt="Airline 1 Icon"></td>
                <td>Fry Emirates</td>
                <td>08:00 AM</td>
                <td>2 hours</td>
                <td>
                    K1500 
                    <i class="fas fa-arrow-alt-circle-down toggle-details" style="padding: 8%; color: rgb(18, 1, 255); cursor: pointer;"></i>
                </td>
            </tr>
            <tr class="flight-details">
                <td colspan="5">
                    <!-- Flight details -->
                    <div class="details-content">
                        <h1>Fry Emirates</h1>
                        <ul>
                            <h2 style="padding-left: 5%; color: black; font-size: 24px;"> Departure Airport:</h2> <h4 style="color: green; padding-left: 5%;"> ZAF Airport</h4>
                            <h3 style="padding-left: 35%; color: rgb(0, 74, 12);">Departure: 09:00 AM</h3>
                            <li><strong>Plane Capacity:</strong> 350 passengers</li>
                            <li><strong>Hotel Available:</strong> Livingstone City Hotel</li>
                    
                <a href="selected_flight_FE.php" class="select-flight-button">Select Flight</a>
                     </div>
                </td>
            </tr>
            
            <tr class="flight-row">
                <td><img src="photos/zed airways.jfif" style="height: 100px; width: 105px; margin-left: 4px; border-radius: 100%;"  alt="Airline 1 Icon"></td>
                <td>Zambia AirWays</td>
                <td>09:30 AM</td>
                <td>5 hours</td>
                <td>K180 <i class="fas fa-arrow-alt-circle-down toggle-details" style="padding: 8%; color: rgb(18, 1, 255); cursor: pointer;"></i></td>
            </tr>
            <tr class="flight-details">
                <td colspan="5">
                    <!-- Flight details -->
                    <div class="details-content">
                        <h1>Zambia Airways</h1>
                        <ul>
                            <h2 style="padding-left: 5%; color: black; font-size: 24px;"> Departure Airport:</h2> <h4 style="color: green; padding-left: 5%;"> Kenneth Kaunda Airport</h4>
                            <h3 style="padding-left: 35%; color: rgb(0, 74, 12);">Departure: 14:00 PM</h3>
                            <li><strong>Plane Capacity:</strong> 350 passengers</li>
                            <li><strong>Hotel Available:</strong> Tigwilizane Hotel</li>
                    
               <a href="selected_flight_ZA.php" class="select-flight-button">Select Flight</a>
                     </div>
                </td>
            </tr>
            <tr class="flight-row">
                <td><img src="photos/SA Airways.jfif" style="height: 100px; width: 105px; margin-left: -4 px; border-radius: 100%;"  alt="Airline 3 Icon"></td>
                <td>South Africa AirWays</td>
                <td>11:00 AM</td>
                <td>2.5 hours</td>
                <td>K220 <i class="fas fa-arrow-alt-circle-down toggle-details" style="padding: 8%; color: rgb(18, 1, 255); cursor: pointer;"></i></td>
            </tr>
            <tr class="flight-details">
                <td colspan="5">
                    <!-- Flight details -->
                    <div class="details-content">
                        <h1>South Africa AirWays</h1>
                        <ul>
                            <h2 style="padding-left: 5%; color: black; font-size: 24px;"> Departure Airport:</h2> <h4 style="color: green; padding-left: 5%;"> Cape Town Airport</h4>
                            <h3 style="padding-left: 35%; color: rgb(0, 74, 12);">Departure: 1:00 Pm</h3>
                            <li><strong>Plane Capacity:</strong> 400 passengers</li>
                            <li><strong>Hotel Available:</strong> Livingstone City Hotel</li>
                    
                <a href="selected_flight_SA.php" class="select-flight-button">Select Flight</a>
                     </div>
                </td>
            </tr>
        </table>
        <div style="background-color: rgb(158, 228, 228); height: 25%; width: 50%; border-radius: 10%; padding-left: 10%;">
            <h4>Prices are currently low — ZMW 2,810 cheaper than usual for your search</h4>
        </div>
    </div>

    <script>
     
    $(document).ready(function() {
        // Click event handler for toggle icon
        $('.toggle-details').click(function() {
            console.log('Toggle icon clicked'); // Log a message to the console
            // Find the closest parent row and the next row
            var detailsRow = $(this).closest('.flight-row').next('.flight-details');
            
            // Toggle visibility of the details row
            if (detailsRow.is(':visible')) {
                detailsRow.hide();
            } else {
                detailsRow.show();
            }

            console.log('Details row toggled:', detailsRow.is(':visible')); // Log details row visibility
        });
    });

    </script>
</body>
</html>