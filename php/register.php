<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];

    // Perform validations
    $errors = array();

    // Validate first name
    if (empty($firstName)) {
        $errors['firstName'] = "First name is required.";
    }

    // Validate last name
    if (empty($lastName)) {
        $errors['lastName'] = "Last name is required.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errors['email'] = "Email already exists.";
    }

    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long.";
    }
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, dob) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashedPassword, $dob);
        if ($stmt->execute()) {
            echo "Registration successfull";
            // header("Location: ../login.html");
            echo '<script>window.setTimeout(function(){window.location="../login.html";},2000);</script>'; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close connection
$conn->close();
?>
