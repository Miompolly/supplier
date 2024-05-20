<?php
// Include the database connection file
include 'config.php'; // Make sure to replace 'db_connection.php' with your actual database connection file


// Function to sanitize inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fetch data from the categories table based on the filter
$sql = "SELECT * FROM users WHERE role='user'";
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
        <h1 class="h2">Retailers</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <!-- <a href="add.php"> <button class="btn btn-primary">Add + </button></a> -->
          </div>
         
        </div>
      </div>
    <article class="card">

		<div class="table-responsive pl-3 pr-3">
		

		<!-- <h2 class="mt-5">Category List</h2> -->

<!-- Filter Form -->

<table class="table table-bordered table-striped">
<thead>
		<tr>
			<th>ID</th>
			<th>Full Name</th>
			<th>Email</th>			
	
			<th>Location</th>			
			<th>Phone</th>			
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
				echo "<td>" . $row["firstname"] ." ". $row["lastname"] . "</td>";
				
				echo "<td>" . $row["email"] . "</td>";				

				echo "<td>" . $row["province"] .'/'. $row["district"] .'/'. $row["sector"].'/'. $row["cell"]  ."</td>";				 
				echo "<td>" . $row["phone"] . "</td>";				 
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='7'>No user found</td></tr>";
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
