<?php
include 'config.php';

if (isset($_POST['deleteCategory'])) {
    
    $categoryid = $_POST['categoryid'];
    $sql = "DELETE FROM categories WHERE id = $categoryid";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Category deleted successfully!');
             window.location.href = 'stock.php';</script>";
    } else {
        echo "Error deleting category: " . $conn->error;
    }


}
function sanitize_input($data) {
    // Trim whitespace from the beginning and end of the string
    $data = trim($data);
    // Remove backslashes (\) from the string
    $data = stripslashes($data);
    // Convert special characters to HTML entities to prevent XSS
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['editCategorie'])) {
    $categorid=$_POST['categorid'];
    $categoryname = sanitize_input($_POST["categoryname"]);
    $description = sanitize_input($_POST["description"]);

    if (!empty($_FILES["image"]["tmp_name"])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imgType = $_FILES['image']['type'];

        $sql = "UPDATE categories SET categoryname='$categoryname', description='$description', image='$imgData', imageType='$imgType' WHERE id='$categorid'";
    } else {
        $sql = "UPDATE categories SET categoryname='$categoryname', description='$description' WHERE id='$categorid'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Category updated successfully!'); window.location.href = 'stock.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



?>