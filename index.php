
<?php include 'components/user_header.php'; 
include('config.php');
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>


<!-- ========================= SECTION MAIN ========================= -->
<section class="section-intro padding-y-sm">
<div class="container">

	<div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="height:500px;"src="images/banners/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height:500px;" src="images/banners/1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height:500px;" src="images/banners/1.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
<div class="container">

<header class="section-heading">
	<a href="./store.html" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title">Popular products</h3>
</header><!-- sect-heading -->

	
<div class="row">
	<?php
if (mysqli_num_rows($result) > 0) {
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='col-md-3'>
				<div class='card card-product-grid'>
				<a href='product-detail.php?id=" . htmlspecialchars($row['id']) . "' class='img-wrap'>
						<img src='data:" . htmlspecialchars($row["imageType"]) . ";base64," . base64_encode($row["image"]) . "' class='img-xs border'/>
					</a>
					<figcaption class='info-wrap'>
						<a href='./product-detail.html' class='title'>" . htmlspecialchars($row["ProductName"]) . "</a>
						<div class='price mt-1'>Rwf" . htmlspecialchars($row["price"]) . "</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			  </div>";
	}
}
?>

	
</div> <!-- row.// -->

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->


<?php include 'components/footer.php'; ?>