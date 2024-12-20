
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #fff;
            padding: 0px;
            
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(0, 10, 20, 0.21); /* Add shadow for elevation */
            
        }

        .logo img {
            width: 70px; /* Adjust the width of the logo image */
            padding-left: 55px;
        }

        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: inline;
            margin-right: 25px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #1100ff;
        }

        .navbar a {
            color: #0062e2; /* Default link color */
            text-decoration: none; /* Remove underline */
            transition: color 0.3s ease; /* Smooth transition for color change */
        }

        .navbar a:hover {
            color: #628fbc; /* Change color on hover */
        }



        .login-button {
            background-color: #017807e7;
            color: #fff;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #00ff08;
        }

        .payment-container {
            padding: 20px;
            border: 2px solid #626467;
            border-radius: 5px;
            margin: 55px 25px 5px 25px;
            
        }

        .payment-container h2 {
            margin-bottom: 20px;
            margin-top: -30px;
            background-color: #626467;
            width: 55%;
            padding-left: 45%;
            color: rgb(92, 255, 92);
            font-weight: bolder;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
            border: 2px solid #626467;
        }

        .payment-container input, .payment-container select {
            margin-bottom: 20%;
            
        }

        .return-date {
            display: none; /* Initially hide the return date field */
        }


        #one-way-btn {
            padding: 10px 30px 10px 30px;
            font-weight: bolder;
            margin-left: 70%;
    
        }

        #one-way-btn:hover {
            background-color: rgb(47, 235, 47);
            color: blue;
        }

        
        #round-trip-btn {
            padding: 10px 30px 10px 30px;
            font-weight: bolder;
        }

        #round-trip-btn:hover {
            background-color: rgb(47, 235, 47);
            color: blue;
        }
    

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
           <img src="photos/PIC11.jpg" alt="logo pic">
           
        </div>
        <ul class="nav-links">
            <li><a href="#">Book a Flight</a></li>
            <li><a href="#">Check In</a></li>
            <li><a href="#">Manage Trip</a></li>
            <li><a href="#">Help</a></li>
        </ul>
        <button class="login-button">Login</button>
    </nav>
     <!-- Payment content -->
     <div class="payment-container">
        <h2>Get Flight</h2>
        <button id="one-way-btn">One Way</button>
        <button id="round-trip-btn">Round Trip</button>
        <br><br>
        <input type="text" id="departure-city" placeholder="Departure City">
        <input type="text" id="arrival-city" placeholder="Arrival City">
        <select id="passengers">
            <option value="1">1 Passenger</option>
            <option value="2">2 Passengers</option>
            <!-- Add more options for passengers -->
        </select>
        <input type="date" id="departure-date" class="date-input" data-placeholder="Departure Date">
        <input type="date" id="return-date" class="date-input return-date" data-placeholder="Return Date">

        <select id="class">
            <label>Select a class</label>
            <option value="economy">Economy</option>
            <option value="business">Business</option>
        </select>
    </div>

    <script>
        $(document).ready(function() {
            $('#round-trip-btn').click(function() {
                $('#return-date').toggle(); // Toggle the visibility of the return date field
            });
        
            // Remove the blur event listener for elements with the class 'date-input'
            // $('.date-input').blur(function() {
            //     if ($(this).val() === $(this).data('placeholder')) {
            //         $(this).val('');
            //     }
            // });
        });
        </script>
        

</body>
</html>