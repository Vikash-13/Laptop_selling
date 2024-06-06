document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("signin-form").addEventListener("submit", function(event) {
        event.preventDefault();
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var emailError = document.getElementById("email-error");
        var passwordError = document.getElementById("password-error");

        // Reset error messages
        emailError.textContent = "";
        passwordError.textContent = "";

        // Validate email
        if (!validateEmail(email)) {
            emailError.textContent = "Please enter a valid email address.";
            return;
        }

        // Validate password
        if (!validatePassword(password)) {
            passwordError.textContent = "Please enter a password with at least 8 characters.";
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