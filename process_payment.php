// process_payment.php
<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['stripeToken'];
    $user_id = $_SESSION['user_id'];

    // Fetch user data
    $user_query = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $user_query->bind_param("i", $user_id);
    $user_query->execute();
    $user_result = $user_query->get_result();
    $user_data = $user_result->fetch_assoc();

    // Fetch cart data from the session
    $cart_data = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Calculate total price dynamically based on cart items
    $total_price = 0;
    foreach ($cart_data as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    // Calculate tax
    $tax_rate = 0.1; // 10%
    $tax_amount = $total_price * $tax_rate;
    $total_amount = $total_price + $tax_amount;

    // Create a charge: this will charge the user's card
    try {
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100, // Amount in cents
            'currency' => 'rwf',
            'description' => 'Order from Your Website',
            'source' => $token,
        ]);

        // Save order details to the database
        $order_query = $conn->prepare("INSERT INTO orders (user_id, total_amount, tax_amount, created_at) VALUES (?, ?, ?, NOW())");
        $order_query->bind_param("idd", $user_id, $total_amount, $tax_amount);
        $order_query->execute();
        $order_id = $order_query->insert_id;

        foreach ($cart_data as $item) {
            $order_item_query = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $order_item_query->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
            $order_item_query->execute();
        }

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to success page
        header("Location: success.php");
        exit();

    } catch (\Stripe\Exception\CardException $e) {
        // The card has been declined
        echo 'Error: ' . $e->getMessage();
    }
}
?>
