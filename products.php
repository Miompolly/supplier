<?php include 'components/user_header.php';
include('config.php');
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$sql = "SELECT * FROM categories LIMIT 10";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$sqlpro = "SELECT * FROM products";
$resultpro = mysqli_query($conn, $sqlpro);
if (!$resultpro) {
    die("Error: " . mysqli_error($conn));
}
$totalItems = mysqli_num_rows($resultpro);
?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Our Store</h2>
	
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		
<div class="card">
	<article class="filter-group">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
				<i class="icon-control fa fa-chevron-down"></i>
				<h6 class="title">Categories</h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse_1" style="">
			<div class="card-body">
				
				<ul class="list-menu">

				<?php
				if (mysqli_num_rows($result) > 0) {
					
					while ($row = mysqli_fetch_assoc($result)) {
						echo"
						<li><a href='#'> " . htmlspecialchars($row["categoryname"]) . "</a></li>";

					}}
				?>
				
				
				</ul>

			</div> <!-- card-body.// -->
		</div>
	</article> <!-- filter-group  .// -->
	<article class="filter-group">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
				<i class="icon-control fa fa-chevron-down"></i>
				<h6 class="title">Sizes </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse_4" style="">
			<div class="card-body">
			  <label class="checkbox-btn">
			    <input type="checkbox">
			    <span class="btn btn-light"> XS </span>
			  </label>

			  <label class="checkbox-btn">
			    <input type="checkbox">
			    <span class="btn btn-light"> SM </span>
			  </label>

			  <label class="checkbox-btn">
			    <input type="checkbox">
			    <span class="btn btn-light"> LG </span>
			  </label>

			  <label class="checkbox-btn">
			    <input type="checkbox">
			    <span class="btn btn-light"> XXL </span>
			  </label>
		</div><!-- card-body.// -->
		</div>
	</article> <!-- filter-group .// -->
	
	<article class="filter-group">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
				<i class="icon-control fa fa-chevron-down"></i>
				<h6 class="title">Price range </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse_3" style="">
			<div class="card-body">
				
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Min</label>
				  <!-- <input class="form-control" placeholder="$0" type="number"> -->
				  	<select class="mr-2 form-control">
						<option value="0">$0</option>
						<option value="50">$50</option>
						<option value="100">$100</option>
						<option value="150">$150</option>
						<option value="200">$200</option>
						<option value="500">$500</option>
						<option value="1000">$1000</option>
					</select>
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Max</label>
				  	<select class="mr-2 form-control">
						<option value="50">$50</option>
						<option value="100">$100</option>
						<option value="150">$150</option>
						<option value="200">$200</option>
						<option value="500">$500</option>
						<option value="1000">$1000</option>
						<option value="2000">$2000+</option>
					</select>
				</div>
				</div> <!-- form-row.// -->
				<button class="btn btn-block btn-primary">Apply</button>
			</div><!-- card-body.// -->
		</div>
	</article> <!-- filter-group .// -->
	
</div> <!-- card.// -->

	</aside> <!-- col.// -->
	<main class="col-md-9">

<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto"><?php echo $totalItems; ?> Items found </span>
			<?php
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-warning'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']); 
}
?>
			
		</div>
</header><!-- sect-heading -->

<div class="row">



<div class="row">
<?php
if (mysqli_num_rows($resultpro) > 0) {
    while ($row = mysqli_fetch_assoc($resultpro)) {
        echo "<div class='col-md-4'>
            <figure class='card card-product-grid'>
                <div class='img-wrap'>
                    <a href='product-detail.php?id=" . htmlspecialchars($row['id']) . "' class='img-wrap'><img src='data:" . htmlspecialchars($row['imageType']) . ";base64," . base64_encode($row['image']) . "' class='img-xs border'/></a>
                </div>
                <figcaption class='info-wrap'>
                    <div class='fix-height'>
                        <a href='product-detail.php?id=" . htmlspecialchars($row['id']) . "' class='title'>" . htmlspecialchars($row['ProductName']) . "</a>
                        <div class='price-wrap mt-2'>
                            <span class='price'>Rwf" . htmlspecialchars($row['price']) . "</span>
                            <del class='price-old'>Rwf 2000 </del>
                        </div>
                    </div>
                    <form action='cart_server.php' method='POST'>
                        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['id']) . "'>
                        <button type='submit' class='btn btn-block btn-primary' name='add_to_cart'>Add to cart</button>
                    </form>
                </figcaption>
            </figure>
        </div>";
    }
} else {
    echo "<p>No categories found</p>";
}
?>
</div>


	

</div> <!-- row end.// -->


<nav class="mt-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

	</main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= FOOTER ========================= -->
<<?php include 'components/footer.php'; ?>