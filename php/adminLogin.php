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

    // Perform validations
    $errors = array();

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // If there are no errors, proceed with login
    if (empty($errors)) {
        // Check if email exists in the database
        $sql = "SELECT * FROM admin WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email exists, verify password
            $user = $result->fetch_assoc();
            if ($password == $user['password']) {
                // Password is correct, login successful
                // echo "Login successful!";
                header("Location: ../adminHome.php");
                exit;
                // Redirect user to admin dashboard or homepage
            } else {
                // Password is incorrect
                $errors['password'] = "Incorrect password.";
            }
        } else {
            // Email does not exist
            $errors['email'] = "Email not found.";
        }
    }

    // Output errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close connection
$conn->close();
?>
