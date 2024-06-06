<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo ($email);
    // Perform validations
    $errors = array();

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Check if email already exists
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errors['email'] = "Email already exists.";
    }

    // Validate password length
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long.";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Insert new admin user into the database
        $sql = "INSERT INTO admin (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New admin registered successfully!";
            // Redirect user to admin dashboard or homepage
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Output errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close connection
$conn->close();
?>
