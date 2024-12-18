
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Reset margins and padding */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered container */
        .container {
            text-align: center;
            width: 500px;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-left: -10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0px 1px 3px rgba(0, 0, 0, 0.1);
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
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
        }

        button:hover {
            background: linear-gradient(to right, #2ecc71, #3498db);
        }

        /* Home button */
        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #0056b3;
            background: white;
            border: 2px solid #0056b3;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .home-button i {
            margin-right: 8px;
            color: #0056b3;
            transition: color 0.3s ease;
        }

        .home-button:hover {
            background: #0056b3;
            color: white;
        }

        .home-button:hover i {
            color: white;
        }

        /* Error message */
        .error-message {
            color: red;
            font-size: 14px;
            display: none; /* Initially hidden */
        }

        /* Links */
        .links {
            margin-top: 10px;
            font-size: 14px;
        }

        .links a {
            color: #3498db;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Home Button -->
        <a href="unlogged.html" class="home-button">
            <i class="fas fa-home"></i> Home
        </a>

        <!-- Login Form -->
        <form onsubmit="handleLogin(event)">
            <h2>Login</h2>
            <div class="error-message" id="errorMessage"></div>
            <input type="email" id="email" placeholder="Enter your email" required />
            <input type="password" id="password" placeholder="Enter your password" required />
            <button type="submit">Login</button>
        </form>

        <!-- Additional Links -->
        <div class="links">
            <a href="forgotPassword.html">Forgot Password?</a><br>
            <a href="registrationForm.php">Don't have an account? Create one</a>
        </div>
    </div>

    <script>
        // JavaScript to handle login
        function handleLogin(event) {
            event.preventDefault(); // Prevent default form submission

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');

            // Send the email and password to the PHP backend
            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Store user's name in localStorage
                    localStorage.setItem('userName', data.name);
                    // Redirect to the homepage
                    window.location.href = 'index.html';
                } else {
                    // Display the error message
                    errorMessage.textContent = data.message;
                    errorMessage.style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'An error occurred. Please try again later.';
                errorMessage.style.display = 'block';
            });
        }
    </script>

</body>

</html>
