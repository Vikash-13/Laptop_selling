<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = array();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
        return;
    }
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['email'] = $email; 
                header("Location: ../productHomePage.php"); 
                exit(); 
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['email'] = "Invalid email format.";
        }
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
$conn->close();
?>
