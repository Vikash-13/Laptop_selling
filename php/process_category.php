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
    $categoryName = $_POST['categoryName'];

    // Check if the category name already exists
    $checkQuery = "SELECT * FROM categories WHERE name = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $categoryName);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Category already exists
        echo "Category already exists";
    } else {
        // Insert the category name into the database
        $insertQuery = "INSERT INTO categories (name) VALUES (?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("s", $categoryName);

        if ($insertStmt->execute()) {
            echo "Category added successfully";
            echo '<script>window.setTimeout(function(){window.location="../adminHome.php";},2000);</script>';
        } else {
            echo "Error: " . $insertStmt->error;
        }
    }

    // Close the statements
    $checkStmt->close();
    // $insertStmt->close();
}

// Close connection
$conn->close();
?>
