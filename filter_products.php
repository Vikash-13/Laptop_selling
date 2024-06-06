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
    // Return error response in JSON format
    echo json_encode(array("error" => "Connection failed: " . $conn->connect_error));
    exit();
}

// Initialize SQL query
$sql = "SELECT * FROM products WHERE 1=1"; // Added WHERE 1=1 to have a base condition  

// Check if name filter is set
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $sql .= " AND name = '$name'";
}

// Check if price filter is set
if (isset($_GET['price'])) {    
    $price = explode('-', $_GET['price']);
    $min_price = $price[0];
    $max_price = $price[1];
    $sql .= " AND price BETWEEN $min_price AND $max_price";
}

// Execute the query
$result = $conn->query($sql);

if ($result === false) {
    // Return error response in JSON format
    echo json_encode(array("error" => "Query failed: " . $conn->error));
    exit();
}

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each product
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    // Return products data in JSON format
    echo json_encode($products);
} else {
    // Return empty array as no results found
    echo json_encode(array());
}

// Close connection
$conn->close();
?>
