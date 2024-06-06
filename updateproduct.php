<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if product ID is provided
    if(isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Your code to update the product details in the database
        // Replace this with your actual code to update product details
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

        // Prepare SQL statement to update product details
        $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$product_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully";
        } else {
            echo "Error updating product: " . $conn->error;
        }

        // Close database connection
        $conn->close();

        // Redirect to adminHome page after 3 seconds
        echo "<script>setTimeout(function() { window.location.href = 'adminHome.php'; }, 3000);</script>";
    } else {
        echo "Product ID is not provided";
    }
} else {
    echo "Form submission method is not POST";
}
?>
