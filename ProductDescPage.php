<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description - Lapify</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .card {
            margin-bottom: 10px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #32363b;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .product-description {
            width: 900px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
        }
        .product-image {
            flex: 1;
            margin-right: 50px;
        }
        .product-details {
            flex: 1;
            margin-left: 50px;
            margin-top: 80px;
        }
        .product-details h2 {
            margin-bottom: 20px;
        }
        .product-details .btn {
            margin-right: 10px;
        }
        .specifications h3 {
            margin-bottom: 20px;
            font-weight: bold;
        }
        .specifications ul {
            list-style-type: none;
            padding: 0;
        }
        .specifications li {
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info" style="background-image: linear-gradient(to right, #4e73df, #224abe);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://lappyfy.com/wp-content/uploads/2023/01/main-logo-1.png" alt="Lapify Logo" width="80" height="30" class="d-inline-block align-text-top">
                Lapify
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Category.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="product-description">
            <div class="product-image">
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

                    // Fetch product image from the database
                    $sql = "SELECT image_url FROM products WHERE id = {$_GET['id']}";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output product image
                        $row = $result->fetch_assoc();
                        echo '<img width="400px" src="./php/' . $row["image_url"] . '" alt="Product Image">';
                    } else {
                        echo "Product image not found";
                    }

                    // Close connection
                    $conn->close();
                ?>
            </div>
            <div class="product-details">
                <?php
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch product details from the database
                    $sql = "SELECT * FROM products WHERE id = {$_GET['id']}";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output product details
                        $row = $result->fetch_assoc();
                        // echo '<h2>' . $row["name"] . '</h2>';
                        echo '<h2> ' . $row["name"] . '</h2>';
                        echo '<p><strong>Price:</strong> Rs. ' . $row["price"] . '</p>';
                        echo '<div>';
                        echo '<button type="button" class="btn btn-primary">Buy</button>';
                        echo '<button type="button" class="btn btn-secondary">Add to Cart</button>';
                        echo '</div>';

                        echo '<li>Processor: ' . ($row["description"] ?? "N/A") . '</li>';
                        echo '<li>RAM: ' . ($row["ram"] ?? "N/A") . '</li>';
                        echo '<li>Storage: ' . ($row["storage"] ?? "N/A") . '</li>';
                        echo '<li>Graphics: ' . ($row["graphics"] ?? "N/A") . '</li>';
                        echo '<li>Display: ' . ($row["display"] ?? "N/A") . '</li>';
                        echo '<li>Operating System: ' . ($row["os"] ?? "N/A") . '</li>';
                        
                    } else {
                        echo "Product details not found";
                    }

                    // Close connection
                    $conn->close();
                ?>
            </div>
        </div>
        <!-- <div class="specifications">
            <h3>Specifications</h3>
            <ul>
                <?php
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch product specifications from the database
                    $sql = "SELECT * FROM products WHERE id = {$_GET['id']}";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output product specifications
                        $row = $result->fetch_assoc();
                        echo '<li>Processor: ' . ($row["description"] ?? "N/A") . '</li>';
                        echo '<li>RAM: ' . ($row["ram"] ?? "N/A") . '</li>';
                        echo '<li>Storage: ' . ($row["storage"] ?? "N/A") . '</li>';
                        echo '<li>Graphics: ' . ($row["graphics"] ?? "N/A") . '</li>';
                        echo '<li>Display: ' . ($row["display"] ?? "N/A") . '</li>';
                        echo '<li>Operating System: ' . ($row["os"] ?? "N/A") . '</li>';
                    } else {
                        echo "Product specifications not found";
                    }

                    // Close connection
                    $conn->close();
                ?>
            </ul>
        </div> -->
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-column">
                    <h1>Follow Us:</h1>
                </div>
                <div class="footer-column social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
