document.addEventListener("DOMContentLoaded", function () {
    const nameInputs = [document.getElementById("firstName"), document.getElementById("lastName")];
    const dobInput = document.getElementById("dob");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const emailInput = document.getElementById("email");

    // Name Validation (No Integers or Symbols)
    nameInputs.forEach(input => {
        input.addEventListener("input", function () {
            const errorDiv = this.nextElementSibling;
            if (/[^a-zA-Z\s]/.test(this.value)) {
                errorDiv.textContent = "Only letters are allowed.";
            } else {
                errorDiv.textContent = "";
            }
        });
    });

    // Date of Birth Validation (No Future Dates)
    dobInput.addEventListener("input", function () {
        const errorDiv = this.nextElementSibling;
        const selectedDate = new Date(this.value);
        const today = new Date();
        if (selectedDate > today) {
            errorDiv.textContent = "Date of birth cannot be in the future.";
        } else {
            errorDiv.textContent = "";
        }
    });

    // Password Length Validation
    passwordInput.addEventListener("input", function () {
        const errorDiv = this.nextElementSibling;
        if (this.value.length < 7) {
            errorDiv.textContent = "Password must be at least 7 characters.";
        } else {
            errorDiv.textContent = "";
        }
    });

    // Password Match Validation
    confirmPasswordInput.addEventListener("input", function () {
        const errorDiv = this.nextElementSibling;
        if (this.value !== passwordInput.value) {
            errorDiv.textContent = "Passwords do not match.";
        } else {
            errorDiv.textContent = "";
        }
    });

});
