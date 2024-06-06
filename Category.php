<?php
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

// Fetch categories
$sql_categories = "SELECT * FROM categories";
$result_categories = $conn->query($sql_categories);

// Fetch products
$sql_products = "SELECT * FROM products";
$result_products = $conn->query($sql_products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Categories - Lapify</title>
    <link rel="stylesheet" href="style.css">
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
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        .card-body {
            padding: 20px;
        }
        .footer {
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info" style="background-image: linear-gradient(to right, #4e73df, #224abe);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://lappyfy.com/wp-content/uploads/2023/01/main-logo-1.png" alt="Lapify Logo" width="50" height="34" class="d-inline-block align-text-top">
                Lapify
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./ProductHomePage.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Category.html">Category</a>
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
        <?php
        // Loop through categories and display products
        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-header bg-info' style='background-image: linear-gradient(to right, #4e73df, #224abe);'>";
                echo "<h2 class='card-title'>" . $row_category['name'] . "</h2>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<div class='row'>";

                // Fetch products for this category
                $sql_products_category = "SELECT * FROM products WHERE category_id = " . $row_category['id'];
                $result_products_category = $conn->query($sql_products_category);

                if ($result_products_category->num_rows > 0) {
                    while ($row_product = $result_products_category->fetch_assoc()) {
                        echo "<div class='col-lg-4'>";
                        echo "<div class='card'>";
                        echo "<img height=300px width=250px src='php/" . $row_product['image_url'] . "' class='card-img-top' alt='" . $row_product['name'] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row_product['name'] . "</h5>";
                        echo "<p class='card-text'>$" . $row_product['price'] . "</p>";
                        echo "<p class='card-text'>" . $row_product['description'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No products found.";
                }

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No categories found.";
        }
        ?>
        <!-- Add more cards for different laptop categories -->
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

<?php
// Close connection
$conn->close();
?>
