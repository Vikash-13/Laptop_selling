
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("registration-form").addEventListener("submit", function(event) {
        event.preventDefault();
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var dob = document.getElementById("dob").value;
        var firstNameError = document.getElementById("firstName-error");
        var lastNameError = document.getElementById("lastName-error");
        var emailError = document.getElementById("email-error");
        var passwordError = document.getElementById("password-error");
        var confirmPasswordError = document.getElementById("confirmPassword-error");
        var dobError = document.getElementById("dob-error");

        // Reset error messages
        firstNameError.textContent = "";
        lastNameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";
        dobError.textContent = "";

        // Validate first name
        if (!firstName.trim()) {
            firstNameError.textContent = "Please enter your first name.";
            return;
        }

        // Validate last name
        if (!lastName.trim()) {
            lastNameError.textContent = "Please enter your last name.";
            return;
        }

        // Validate email
        if (!validateEmail(email)) {
            emailError.textContent = "Please enter a valid email address.";
            return;
        }

        // Validate password
        if (!validatePassword(password)) {
            passwordError.textContent = "Password must be at least 8 characters long.";
            return;
        }

        // Validate confirm password
        if (password !== confirmPassword) {
            confirmPasswordError.textContent = "Passwords do not match.";
            return;
        }

        // Validate date of birth
        if (!dob) {
            dobError.textContent = "Please enter your date of birth.";
            return;
        }

        // If validation passes, submit the form
        this.submit();
    });
});

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validatePassword(password) {
    return password.length >= 8;
}