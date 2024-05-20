
<?php
session_start(); 
include 'components/admin_header.php';
?>




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y bg">

<div class="container">
	<div class="row">


	<?php
include 'components/sidebar.php';
?>

	<main class="col-md-9 pl-3">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <a href="stock.php"> <button class="btn btn-primary">View store <i class="fas fa-eye"></i>  </button></a>
          </div>
         
        </div>
      </div>
    <article class="card">
    <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pl-3 pb-2 mb-3 border-bottom">
       
   

      <form action="server.php" method="post" enctype="multipart/form-data" class="" style="width:50%;">
      
    <div class="form-group">
        <label for="productName">Category Name:</label>
        <input type="text" class="form-control" id="productName" name="categoryname" placeholder="Enter category name" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" class="form-control-file" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary" name="savecategory">Save</button>
</form>
    </div>


		</article> <!-- order-group.// --> 





	</main>
</div> <!-- row.// -->
</div>


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




<?php include 'components/footer.php'; ?>
