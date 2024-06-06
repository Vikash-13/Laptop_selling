<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Lapify</title>
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
            background-color: #32363b;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        .footer {
            /* position: fixed; */
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

        /* Custom Styles for Product List */
        .product-container {
            width: 900px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
        }
        .add-product-button {
            padding: 20px;
            margin-bottom: 20px;
        }
        .product-card {
            margin-bottom: 20px;
        }
        .product-card .card-body {
            display: flex;
            align-items: center;
        }
        .product-card img {
            width: 100px;
            height: auto;
            border-radius: 5px;
            margin-right: 20px;
        }
        .product-card .details {
            flex-grow: 1;
        }
        .product-card .details h5 {
            margin-bottom: 5px;
        }
        .product-card .details p {
            margin-bottom: 5px;
        }
        .product-card .actions {
            flex-shrink: 0;
        }
        .product-card .actions button {
            margin-right: 5px;
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
    <div class="card">
    <div class="add-product-button">
    <a href="addproduct.html" class="btn btn-primary">Add Product</a>
    <a href="AddCategory.php" class="btn btn-primary">Add Category</a>
    </div>
    <div class="container product-container">
        <div class="card-header">
            <h2 class="card-title">Product List</h2>
        </div>
        <div class="card">
            <div class="product-card">
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

                // Fetch products with category information
                $sql = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card-body'>";
                        echo "<img src='php/" . $row["image_url"]. "' alt='Product Image'>";
                        echo "<div class='details'>";
                        echo "<h5 class='card-title'>" . $row["name"]. "</h5>";
                        echo "<p class='card-text'>Category: " . $row["category_name"]. "</p>";
                        echo "<p class='card-text'>Description: " . $row["description"]. "</p>";
                        echo "<p class='card-text'>Price: $" . $row["price"]. "</p>";
                        echo "</div>";
                        echo "<div class='actions'>";
                        echo "<a href='editproduct.php?id=" . $row["id"] . "' class='btn btn-primary mr-2'>Edit</a>"; // Added margin-right class
                        echo "<a href='deleteproduct.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>";
                        echo "</div>";
                        
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
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
