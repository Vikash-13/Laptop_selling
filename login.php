<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lapify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-check-label {
            font-weight: normal;
        }
        .btn-login {
            width: 10%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline from the link */
            display: inline-block; /* Make the button behave like a block element */
            text-align: center;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .btn-create-account {
            width: 20%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline from the link */
            display: inline-block; /* Make the button behave like a block element */
            text-align: center;
        }
        .btn-create-account:hover {
            background-color: #218838;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .container1 {
            width: 80%;
            margin: 0 auto;
        }
        .error-message {
            color: red;
            font-size: 12px;
            position: absolute;
            bottom: -20px; /* Adjust the distance of the error message from the input field */
            left: 0;
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
                        <a class="nav-link" href="#">About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    <h2>Sign In</h2>
    <form id="signin-form" method="post" action="./php/login.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <?php if(isset($errors['email'])) { ?>
                <div class="error-message"><?php echo $errors['email']; ?></div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if(isset($errors['password'])) { ?>
                <div class="error-message"><?php echo $errors['password']; ?></div>
            <?php } ?>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-login">Sign In</button>
        <a href="registration.html" class="btn btn-create-account">Create Account</a>
    </form>
</div>


    <footer class="footer">
        <div class="container1">
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
    <!-- <script src="./js/script.js"></script> -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
