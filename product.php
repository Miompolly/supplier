<?php
// Include the database connection file
include 'config.php'; // Make sure to replace 'db_connection.php' with your actual database connection file

// Fetch unique category names for the dropdown
$categoryQuery = "SELECT DISTINCT category FROM products";
$categoryResult = mysqli_query($conn, $categoryQuery);

// Initialize filter variable
$filterCategory = isset($_POST['filterCategory']) ? sanitize_input($_POST['filterCategory']) : '';

// Function to sanitize inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fetch data from the categories table based on the filter
$sql = "SELECT * FROM products";
if ($filterCategory) {
    $sql .= " WHERE category = '$filterCategory'";
}
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>






<?php
include 'components/admin_header.php';
?>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y bg">

<div class="container">
	<div class="row">


	<?php
include 'components/sidebar.php';
?>

	<main class="col-md-9">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Our Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <a href="addProduct.php"> <button class="btn btn-primary">Add + </button></a>
          </div>
         
        </div>
      </div>
    <article class="card">

		<div class="table-responsive pl-3 pr-3">
		

		<!-- <h2 class="mt-5">Category List</h2> -->

<!-- Filter Form -->
<form method="POST" action="product.php" class="mb-3">
	<div class="form-group">
		<label for="filterCategory">Filter by Category Name:</label>
		<select class="form-control" id="filterCategory" name="filterCategory">
			<option value="">All Categories</option>
			<?php
			// Populate the dropdown with unique category names
			if (mysqli_num_rows($categoryResult) > 0) {
				while ($row = mysqli_fetch_assoc($categoryResult)) {
					$selected = ($row['category'] == $filterCategory) ? 'selected' : '';
					echo "<option value='" . $row['category'] . "' $selected>" . $row['category'] . "</option>";
				}
			}
			?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- Data Table -->
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Product Name</th>			
			<th>Price</th>			
			<th>Quantity</th>			
			<th>Category</th>			
			<th>Description</th>
			
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		// Check if there are any rows returned
		if (mysqli_num_rows($result) > 0) {
			// Output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td><img src='data:" . $row["imageType"] . ";base64," . base64_encode($row["image"]) . "' class='img-xs border'/></td>";
				echo "<td>" . $row["ProductName"] . "</td>";				
				echo "<td>" . $row["price"] . "</td>";				
				echo "<td>" . $row["quantity"] . "</td>";				
				echo "<td>" . $row["category"] . "</td>";				
				echo "<td>" . $row["description"] . "</td>";
				 echo "<td>

				 <form method='POST' action='product_server.php'>
				 <a href='editProduct.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>

				 <input type='hidden' name='productid' value='{$row['id']}'>
				 <button type='submit' class='btn btn-danger btn-sm' name='deleteProduct'>Delete</button>
				
			     </form>
                         
                               
                        </td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='7'>No product found</td></tr>";
		}
		?>
	</tbody>


</table>






		</div> <!-- table-responsive .end// -->
		</article> <!-- order-group.// --> 





	</main>
</div> <!-- row.// -->
</div>


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




<?php include 'components/footer.php'; ?>
