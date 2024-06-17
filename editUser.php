
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
        <h1 class="h2">Update User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <a href="admin_user.php"> <button class="btn btn-primary">View users <i class="fas fa-eye"></i>  </button></a>
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
       
    <?php

include 'server.php'; 


if(isset($_GET['id'])) {
  $userid = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id =$userid";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      echo "<form action='admin_server.php' method='post' enctype='multipart/form-data'  style='width:50%;'>
      <input type='hidden' name='userid' value='{$row['id']}'>
    <div class='form-group'>
        <label for='firstname'> First Name:</label>
        <input type='text' class='form-control' id='firstname' name='firstname' value='{$row['firstname']}'required>
    </div>
    <div class='form-group'>
        <label for='lastname'> Last Name:</label>
        <input type='text' class='form-control' id='lastname' name='lastname' value='{$row['lastname']}'required>
    </div>
    <div class='form-group'>
        <label for='email'> email:</label>
        <input type='text' class='form-control' id='email' name='email' value='{$row['email']}'required>
    </div>
    <div class='form-group'>
        <label for='role'> Role:</label>
        <input type='text' class='form-control' id='role' name='role' value='{$row['role']}'required>
    </div>
    <div class='form-group'>
        <label for='phone'> phone:</label>
        <input type='number' class='form-control' id='phone' name='phone' value='{$row['phone']}'required>
    </div>

    
    <button type='submit' class='btn btn-primary' name='editUser'>Save</button>
</form>";




} else {
    echo "No user found with the provided ID.";
}
} else {
echo "No user ID provided.";
}
?>
    </div>


		</article> <!-- order-group.// --> 





	</main>
</div> <!-- row.// -->
</div>


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




<?php include 'components/footer.php'; ?>
