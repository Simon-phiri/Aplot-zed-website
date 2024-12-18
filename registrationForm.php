<!DOCTYPE html>
<html lang="en">

        <head>
         <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Page</title>
            <link rel="stylesheet" type="text/css" href="registration.css">
            <!-- Include Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Include Bootstrap Icons CSS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
            <!-- Include jQuery library -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Register Below</h2>
      <form id="registrationForm" class="mt-4" method="post" action="register.php">
    <div class="mb-3">
        <label for="firstName" class="form-label">Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your name" required>
        <div class="text-danger" id="firstNameError"></div>
    </div>

    <div class="mb-3">
        <label for="middleName" class="form-label">Middle Name (optional)</label>
        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter your middle name">
        <div class="text-danger" id="middleNameError"></div>
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">Surname</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your surname" required>
        <div class="text-danger" id="lastNameError"></div>
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <select id="city" name="city" class="form-select" required>
            <option value="">Select City</option>
            <option value="Lusaka">Lusaka</option>
            <option value="Ndola">Ndola</option>
            <option value="Kitwe">Kitwe</option>
        </select>
        <div class="text-danger" id="cityError"></div>
    </div>

    <div class="mb-3">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" placeholder="Enter your phone number" required>
        <div class="text-danger" id="phoneNumberError"></div>
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
        <div class="text-danger" id="dobError"></div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        <div class="text-danger" id="emailError"></div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        <div class="text-danger" id="passwordError"></div>
    </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
        <div class="text-danger" id="confirmPasswordError"></div>
    </div>

    <div class="mb-3">
        <label class="form-label">Gender</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="male" name="gender" value="male" required>
            <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="female" name="gender" value="female" required>
            <label for="female" class="form-check-label">Female</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="other" name="gender" value="other" required>
            <label for="other" class="form-check-label">Other</label>
        </div>
        <div class="text-danger" id="genderError"></div>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
        <label for="terms" class="form-check-label">I agree to the terms and conditions</label>
        <div class="text-danger" id="termsError"></div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Register</button>
</form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="registration.js"></script>
    <script src="re-validation.js"></script>
    <script type="check-email.php"></script>
    <script type="script.js"></script>
    <script type="register.php"></script>
</body>
</html>
