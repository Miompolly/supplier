

<?php include 'components/admin_header.php'; ?>



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y bg">

<div class="container">
	<div class="row">
	<aside class="col-md-3">
		<!--   SIDEBAR   -->
		<ul class="list-group">
			<a class="list-group-item active" href="#"> Dashboard </a>
			<a class="list-group-item" href="product.php"> Products</a>
			<a class="list-group-item" href="order.php"> Orders</a>
			<a class="list-group-item" href="return.php"> Return</a>
			<a class="list-group-item" href="report.php"> Report</a>
			<a class="list-group-item" href="notification.php"> Notification</a>
			<a class="list-group-item" href="message.php"> Message</a>

			<a class="list-group-item" href="admin_user.php"> Admin User</a>
			<a class="list-group-item" href="retailer.php"> Retailer</a>
			<a class="list-group-item" href="manifaturer.php"> Manifacturer</a>
			<a class="list-group-item" href="setting.php">Settings </a>
			
			
		</ul>
		<br>
		<a class="btn btn-light btn-block" href="signin.php"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a> 
		<!--   SIDEBAR .//END   -->
	</aside>
	<main class="col-md-9">
		<article class="card">
		<header class="card-header">
			<strong class="d-inline-block mr-3">Order ID: 6123456789</strong>
			<span>Order Date: 16 December 2018</span>
		</header>
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-8">
					<h6 class="text-muted">Delivery to</h6>
					<p>Michael Jackson <br>  
					Phone +1234567890 Email: myname@pixsellz.com <br>
			    	Location: Home number, Building name, Street 123,  Tashkent, UZB <br> 
			    	P.O. Box: 100123
			 		</p>
				</div>
				<div class="col-md-4">
					<h6 class="text-muted">Payment</h6>
					<span class="text-success">
						<i class="fab fa-lg fa-cc-visa"></i>
					    Visa  **** 4216  
					</span>
					<p>Subtotal: $356 <br>
					 Shipping fee:  $56 <br> 
					 <span class="b">Total:  $456 </span>
					</p>
				</div>
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<td width="65">
					<img src="../images/items/1.jpg" class="img-xs border">
				</td>
				<td> 
					<p class="title mb-0">Product name goes here </p>
					<var class="price text-muted">USD 145</var>
				</td>
				<td> Seller <br> Nike clothing </td>
				<td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
			</tr>
			<tr>
				<td>
					<img src="../images/items/2.jpg" class="img-xs border">
				</td>
				<td> 
					<p class="title mb-0">Another name goes here </p>
					<var class="price text-muted">USD 15</var>
				</td>
				<td> Seller <br> ABC shop </td>
				<td> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
			</tr>
			<tr>
				<td>
					<img src="../images/items/3.jpg" class="img-xs border">
				</td>
				<td> 
					<p class="title mb-0">The name of the product  goes here </p>
					<var class="price text-muted">USD 145</var>
				</td>
				<td> Seller <br> Wallmart </td>
				<td> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
			</tr>
		</table>
		</div> <!-- table-responsive .end// -->
		</article> <!-- order-group.// --> 
	</main>
</div> <!-- row.// -->
</div>


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<

<?php include 'components/footer.php'; ?>