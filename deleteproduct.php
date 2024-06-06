<?php
// Check if product ID is provided
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Your code to delete the product from the database
    // Replace this with your actual code to delete the product
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

    // Prepare SQL statement to delete product
    $sql = "DELETE FROM products WHERE id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close database connection
    $conn->close();

    // Redirect to admin home page after 2 seconds
    header("refresh:2;url=adminHome.php");
} else {
    echo "Product ID is not provided";
}
?>
