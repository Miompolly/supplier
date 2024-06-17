<?php
include 'config.php'; 


function sanitize_input($data) {
    // Trim whitespace from the beginning and end of the string
    $data = trim($data);
    // Remove backslashes (\) from the string
    $data = stripslashes($data);
    // Convert special characters to HTML entities to prevent XSS
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['addProduct'])) {
    // Sanitize user inputs
    $productname = sanitize_input($_POST["productName"]);
    $description = sanitize_input($_POST["description"]);
    $quantity = $_POST["quantity"];
    $categoryname = $_POST["productCategory"];
    $price = $_POST["price"];

    // Check if an image file is uploaded
    if (!empty($_FILES["image"]["tmp_name"])) {
        // Get image data and type
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imgType = $_FILES['image']['type'];

        // Insert data into the database
        $sql = "INSERT INTO products (ProductName,price,quantity,category ,description, image, imageType)VALUES('$productname','$price','$quantity','$categoryname','$description','$imgData', '$imgType')";
        $result = mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if ($result) {
            echo "<script>alert('Product added successfully!');</script>";
            header("Location: stock.php"); 
    exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            header("Location: product.php");
        }
    } else {
        echo "<script>alert('Please select an image file.');</script>";
    }
}


if (isset($_POST['deleteProduct'])) {
    
    $productid = $_POST['productid'];
    $sql = "DELETE FROM products WHERE id = $productid";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully!');
             window.location.href = 'product.php';</script>";
    } else {
        echo "Error deleting product: " . $conn->error;
    }


}


?>