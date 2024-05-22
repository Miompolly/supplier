<?php include 'components/user_header.php'; ?>

<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 1 ================================= -->

<div class="row">
    <aside class="col-lg-9">
<div class="card">
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>
<?php
$totalPrice = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $subtotal = $product['price'] * $product['quantity'];
        $totalPrice += $subtotal;
        echo "<tr>
            <td>
                <figure class='itemside align-items-center'>
                    <div class='aside'><img src='" . $product['image'] . "' class='img-sm'></div>
                    <figcaption class='info'>
                        <a href='#' class='title text-dark'>" . htmlspecialchars($product['name']) . "</a>
                        <p class='text-muted small'>Price: Rwf " . htmlspecialchars($product['price']) . "</p>
                    </figcaption>
                </figure>
            </td>
            <td>
		
			<form action='cart_server.php' method='POST'>
				<input type='hidden' name='product_id' value='" . htmlspecialchars($product['id']) . "'>
				<div class='input-group input-spinner'>
					<div class='input-group-prepend'>
						<button class='btn btn-light' type='submit' name='update_cart' value='decrement_" . htmlspecialchars($product['id']) . "'> <i class='fa fa-minus'></i> </button>
					</div>
					<input type='text' class='form-control' value='" . htmlspecialchars($product['quantity']) . "' readonly>
					<div class='input-group-append'>
						<button class='btn btn-light' type='submit' name='update_cart' value='increment_" . htmlspecialchars($product['id']) . "'> <i class='fa fa-plus'></i> </button>
					</div>
				</div>
			</form>
		
		
            </td>
            <td>
                <div class='price-wrap'>
                    <var class='price'>Rwf " . number_format($subtotal, 2) . "</var>
                </div>
            </td>
            <td class='text-right'>
                <form action='cart_server.php' method='POST'>
                    <input type='hidden' name='product_id' value='" . htmlspecialchars($product['id']) . "'>
                    <button type='submit' class='btn btn-danger' name='remove_from_cart'>Remove</button>
                </form>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Your cart is empty</td></tr>";
}
?>
</tbody>
</table>
</div> <!-- card.// -->

    </aside> <!-- col.// -->
    <aside class="col-lg-3">
    <div class="card">
        <div class="card-body">
            <?php
            // Calculate total price from cart items
            $totalPrice = 0;
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product) {
                    $subtotal = $product['price'] * $product['quantity'];
                    $totalPrice += $subtotal;
                }
            }
            ?>

            <dl class="dlist-align">
                <dt>Total price:</dt>
                <dd class="text-right">Rwf <?php echo number_format($totalPrice, 2); ?></dd>
            </dl>
            <hr>
            <p class="text-center mb-3">
                <img src="./images/misc/payments.png" height="26">
            </p>
            <form id="checkoutForm" action="place-order.php" method="POST">
                <input type="hidden" name="cart_data" value="<?php echo htmlspecialchars(json_encode($_SESSION['cart'])); ?>">
                <button type="submit" class="btn btn-primary btn-block">Checkout</button>
            </form>
            <a href="products.php" class="btn btn-light btn-block">Continue Shopping</a>
        </div> <!-- card-body.// -->
    </div> <!-- card.// -->
</aside> <!-- col.// -->


</div> <!-- row.// -->
<!-- ============================ COMPONENT 1 END .// ================================= -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script>

function handleCheckout() {
    var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
    if (isLoggedIn) {
        window.location.href = 'place-order.php';
    } else {
        window.location.href = 'signin.php';
    }
}

</script>



</body>
</html>
