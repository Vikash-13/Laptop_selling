<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $productName = htmlspecialchars($_POST["productName"]);
    $categoryName = htmlspecialchars($_POST["category"]);
    $description = htmlspecialchars($_POST["description"]);
    $price = floatval($_POST["price"]);

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, continue with database insertion
            // Database connection parameters
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

            // Check if the category exists
            $sql = "SELECT id FROM categories WHERE name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $categoryName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Category exists, get its ID
                $row = $result->fetch_assoc();
                $categoryId = $row["id"];
            } else {
                // Category doesn't exist, create a new one
                $sql = "INSERT INTO categories (name) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $categoryName);
                $stmt->execute();
                $categoryId = $stmt->insert_id;
            }

            // Insert product data into the database
            $sql = "INSERT INTO products (name, category_id, description, price, image_url) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdsds", $productName, $categoryId, $description, $price, $targetFile);

            if ($stmt->execute() === TRUE) {
                // Close the database connection
                $stmt->close();
                $conn->close();
                
                // Redirect the user to addproduct.html
                echo "Product added successfully";
                echo "<script>setTimeout(function(){ window.location.href = '../addproduct.html'; }, 2000);</script>";
                exit(); // Make sure to exit after redirecting
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
