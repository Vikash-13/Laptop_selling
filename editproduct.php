<?php
// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Your code to fetch the product details from the database using the provided product ID
    // Replace this with your actual code to fetch product details
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

    // Fetch product details
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch product details
        $product = $result->fetch_assoc();

        // Now you can use $product array to populate the form fields
        // For example:
        $name = $product['name'];
        $description = $product['description'];
        $price = $product['price'];
        $category_id = $product['category_id'];

        // Remember to close the database connection
        $conn->close();
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID is not provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Lapify</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="updateproduct.php" method="POST">
            <!-- Hidden input field to store the product ID -->
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
            </div>
            <!-- Add category select field if you want to allow changing category -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
