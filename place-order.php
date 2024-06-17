<?php
session_start();
include 'config.php'; // Ensure your database connection is established here
include 'components/user_header.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
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

?>



<section class="section-content padding-y bg">
<div class="container">



<!-- ============================ COMPONENT 2 ================================= -->
<div class="row">
		<main class="col-md-8">

<article class="card mb-4">
<div class="card-body">
    <h4 class="card-title mb-4">Review cart</h4>
    <div class="row">
        <?php foreach ($cart_data as $item): ?>
        <div class="col-md-6">
            <figure class="itemside mb-4">
                <div class="aside"><img src="<?php echo $item['image']; ?>" class="border img-sm"></div>
                <figcaption class="info">
                    <p><?php echo $item['name']; ?></p>
                    <span class="text-muted"><?php echo $item['quantity']; ?>x = Rwf <?php echo $item['price']; ?></span>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        <?php endforeach; ?>
    </div> <!-- row.// -->
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="card mb-4">
<div class="card-body">
	<h4 class="card-title mb-4">Contact info</h4>
	<form action="">
		<div class="row">
			<div class="form-group col-sm-6">
				<label>Frst name</label>
				<input type="text"  class="form-control" value="<?php echo htmlspecialchars($user_data['firstname']); ?>" readonly>
			</div>
			<div class="form-group col-sm-6">
				<label>Last name</label>
				<input type="text" value="<?php echo htmlspecialchars($user_data['lastname']); ?>" readonly class="form-control">
			</div>
			<div class="form-group col-sm-6">
				<label>Phone</label>
				<input type="text"  value="<?php echo htmlspecialchars($user_data['phone']); ?>" class="form-control">
			</div>
			<div class="form-group col-sm-6">
				<label>Email</label>
				<input type="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" readonly class="form-control">
			</div>
		</div> <!-- row.// -->	
	</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="card mb-4">
<div class="card-body">
	<h4 class="card-title mb-4">Delivery info</h4>
	<form action="">
			

		<div class="row">
				<div class="form-group col-sm-6">
					<label>Province*</label>
					<input type="text" value="<?php echo htmlspecialchars($user_data['province']); ?>" class="form-control">
				</div>
				<div class="form-group col-sm-6">
					<label>District*</label>
					<input type="text" value="<?php echo htmlspecialchars($user_data['district']); ?>" class="form-control">
				</div>
				<div class="form-group col-sm-8">
					<label>Sector*</label>
					<input type="text" value="<?php echo htmlspecialchars($user_data['sector']); ?>" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Cell*</label>
					<input type="text" value="<?php echo htmlspecialchars($user_data['cell']); ?>" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>House</label>
					<input type="text" placeholder="Type here" class="form-control">
				</div>
				
				
		</div> <!-- row.// -->	
	</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="accordion" id="accordion_pay">
	<div class="card">
		<header class="card-header">
			<img src="./images/misc/payment-paypal.png" class="float-right" height="24"> 
			<label class="form-check collapsed" data-toggle="collapse" data-target="#pay_paynet">
				<input class="form-check-input" name="payment-option" checked type="radio" value="option2">
				<h6 class="form-check-label"> 
					Paypal 
				</h6>
			</label>
		</header>
		<div id="pay_paynet" class="collapse show" data-parent="#accordion_pay">
		<div class="card-body">
			<p class="text-center text-muted">Connect your PayPal account and use it to pay your bills. You'll be redirected to PayPal to add your billing information.</p>
			<p class="text-center">
				<a href="#"><img src="./images/misc/btn-paypal.png" height="32"></a>
				<br><br>
			</p>
		</div> <!-- card body .// -->
		</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	<div class="card">
	<header class="card-header">
		<img src="./images/misc/payment-card.png" class="float-right" height="24">  
		<label class="form-check" data-toggle="collapse" data-target="#pay_payme">
			<input class="form-check-input" name="payment-option" type="radio" value="option2">
			<h6 class="form-check-label"> Credit Card  </h6>
		</label>
	</header>
	<div id="pay_payme" class="collapse" data-parent="#accordion_pay">
		<div class="card-body">
			<p class="alert alert-success">Some information or instruction</p>
			<form class="form-inline">
				<input type="text" class="form-control mr-2" placeholder="xxxx-xxxx-xxxx-xxxx" name="">
				<input type="text" class="form-control mr-2" style="width: 100px"  placeholder="dd/yy" name="">
				<input type="number" maxlength="3" class="form-control mr-2"  style="width: 100px"  placeholder="cvc" name="">
				<button class="btn btn btn-success">Button</button>
			</form>
		</div> <!-- card body .// -->
	</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	
</article> 
<!-- accordion end.// -->
  
		</main> <!-- col.// -->
		<aside class="col-md-4">
        <div class="card">
            <div class="card-body">
                <dl class="dlist-align">
                    <dt>Total price:</dt>
                    <dd class="text-right">Rwf <?php echo number_format($total_price, 2); ?></dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Tax (10%):</dt>
                    <dd class="text-right">Rwf <?php echo number_format($tax_amount, 2); ?></dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Total (Including Tax):</dt>
                    <dd class="text-right text-dark b"><strong>Rwf <?php echo number_format($total_price + $tax_amount, 2); ?></strong></dd>
                </dl>
                <hr>
                <p class="text-center mb-3">
                    <img src="./images/misc/payments.png" height="26">
                </p>
                <a href="./place-order.html" class="btn btn-primary btn-block">Place Order</a>
            </div>
        </div>
    </aside>
	</div> <!-- row.// -->

<!-- ============================ COMPONENT 2 END//  ================================= -->




</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION CONTENT END// ========================= -->
</body>
</html>