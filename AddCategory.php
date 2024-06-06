<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category - Lapify</title>
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
    left: 0;
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
            position: relative;
        }

        /* Custom Styles for Category Form */
        .category-container {
            width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .category-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .category-form button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #343a40;
            color: #fff;
            cursor: pointer;
        }
        .category-form button:hover {
            background-color: #0056b3;
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
                        <a class="nav-link" href="./add_product.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Add Category</a>
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

    <div class="container category-container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add Category</h2>
            </div>
            <form class="category-form" action="./php/process_category.php" method="post">
                <div class="mb-3">
                    <label for="inputCategoryName" class="form-label">Category Name</label>
                    <input type="text" id="inputCategoryName" name="categoryName" class="form-control" placeholder="Enter category name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
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
