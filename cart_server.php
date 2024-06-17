<?php
session_start();
include('config.php');

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = intval($_POST['product_id']);

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // Product is already in the cart, display a message
        $_SESSION['message'] = 'Product is already added to the cart';
    } else {
        // Product is not in the cart, add it
        // Fetch product details from the database
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            // Add product to the cart
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['ProductName'],
                'price' => $product['price'],
                'quantity' => 1,
                'image' => 'data:' . htmlspecialchars($product['imageType']) . ';base64,' . base64_encode($product['image'])
            ];
        }
        $stmt->close();
    }
}


// Handle remove from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $productId = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

// Handle update cart (increment/decrement)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    $action = $_POST['update_cart'];
    $productId = intval(substr($action, strpos($action, "_") + 1)); // Extract the product ID from the action string
    $quantity = isset($_SESSION['cart'][$productId]['quantity']) ? $_SESSION['cart'][$productId]['quantity'] : 0;

    if (strpos($action, "increment") !== false) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity + 1;
    } elseif (strpos($action, "decrement") !== false) {
        if ($quantity > 1) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity - 1;
        } else {
            unset($_SESSION['cart'][$productId]); // Remove the item if quantity is 0 or less
        }
    }
}









// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
