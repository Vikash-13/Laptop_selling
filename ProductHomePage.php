<!DOCTYPE html>
<html lang="en">
<head>
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
            /* margin-top: 50px; */
            padding: 20px;
            margin-bottom: 10px;
        }

        .filter-section {
            float: left;
            width: 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .product-list {
            float: left;
            width: auto;
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
        .btn1{
            background-color: #0080ff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info" style="background-image: linear-gradient(to right, #4e73df, #224abe);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://lappyfy.com/wp-content/uploads/2023/01/main-logo-1.png" alt="Lapify Logo" width="80"
                    height="50" class="d-inline-block align-text-top">
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
        <div class="row">
            <div class="filter-section">
                <h3>Filters</h3>
                <h5>Brand</h5>
                <select class="form-select mb-3" id="brandFilter">
                    <option value="">Select Brand</option>
                    <option value="HP">Hp</option>
                    <option value="Asus">Asus</option>
                    <option value="Dell">Dell</option>
                    <option value="Lenevo">Lenevo</option>
                </select>
                <h5>Price</h5>
                <select class="form-select mb-3" id="priceFilter">
                    <option value="">Select Price Range</option>
                    <option value="20000-30000">20,000 - 30,000</option>
                    <option value="30000-40000">30,000 - 40,000</option>
                    <option value="40000-50000">40,000 - 50,000</option>
                    <option value="60000-100000">60,000 - 100,000</option>
                </select>
                <h5>Specifications</h5>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="8gbRam" id="8gbRam">
                    <label class="form-check-label" for="8gbRam">
                        8GB RAM
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="16gbRam" id="16gbRam">
                    <label class="form-check-label" for="16gbRam">
                        16GB RAM
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="256ssd" id="256ssd">
                    <label class="form-check-label" for="256ssd">
                        256GB SSD
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="512ssd" id="512ssd">
                    <label class="form-check-label" for="512ssd">
                        512GB SSD
                    </label>
                </div>
            </div>
            <div class="product-list">
                <div class="card">
                    <div class="add-product-button">
                        <h3>Product</h3>
                    </div>
                    <!-- Product list will be dynamically updated here -->
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

    <!-- JavaScript dependencies -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch and display filtered products
            function fetchFilteredProducts() {
                var name = $('#brandFilter').val();
                console.log(name);
                var price = $('#priceFilter').val();
                    
                $.ajax({
                url: './filter_products.php',
                type: 'POST',
                data: { name: name, price: price },
                dataType: 'json',
                success: function(response) {
                    // Print response for debugging
                    console.log("Response from server:", response);
                    
                    // Clear existing product list
                    $('.product-list').empty();
                    
                    // Append new products
                    $.each(response, function(index, product) {
                        var productHtml = '<div class="container product-container">' +
                            '<div class="card">' +
                            '<div class="product-card">' +
                            '<div class="card-body">' +
                            '<img src="./php/' + product.image_url + '" alt="Product Image">' +
                            '<div class="details">' +
                            '<h5 class="card-title">' + product.name + '</h5>' +
                            '<p class="card-text">' + product.description + '</p>' +
                            '<p class="card-text">Price: $' + product.price + '</p>' +
                            '</div>' +
                            '<div class="row">' +
                            '<a href="ProductDescPage.php?id=' + product.id + '" class="btn btn-primary" style="margin-bottom: 10px;">BUY</a>' +
                            '<button type="button" class="btn btn1 btn-secondary">Add to Cart</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('.product-list').append(productHtml);
                    });
                },
                error: function(xhr, status, error) {
                    // Print error details for debugging
                    console.error("Error:", xhr, status, error);
                }
            });

            }
            
            // Call the function initially to load all products
            fetchFilteredProducts();
            
            // Call the function again when filters are changed
            $('#brandFilter, #priceFilter').change(function() {
                console.log('hey')
                fetchFilteredProducts();
            });
        });
    </script>
</body>
</html>
