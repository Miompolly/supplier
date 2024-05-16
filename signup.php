

<?php include 'components/user_header.php'; ?>


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form action="server.php" method="POST">
				<div class="form-row">
					<div class="col form-group">
						<label>First name</label>
					  	<input type="text" class="form-control" placeholder="" name="firstname" required>
					</div> <!-- form-group end.// -->
					<div class="col form-group">
						<label>Last name</label>
					  	<input type="text" class="form-control" placeholder="" name="lastname" required>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row end.// -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="" name="email" required>
					<small class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
					  <span class="custom-control-label"> Male </span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="gender" value="option2">
					  <span class="custom-control-label"> Female </span>
					</label>
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>Province</label>
					  <input type="text" class="form-control" name="province" required>
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>District</label>
					  <input type="text" class="form-control" name="district" required>
					 
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Sector</label>
					  <input type="text" class="form-control" name="sector" required>
					 
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Cell</label>
					  <input type="text" class="form-control" name="cell" required>
					 
					</div> <!-- form-group end.// -->

					<div class="form-group col-md-6">
					  <label>Phone</label>
					  <input type="number" class="form-control" name="number" required>
					 
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Create password</label>
					    <input class="form-control" type="password" name="password" required>
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" type="password" name="cpassword" required>
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block" name="register"> Register  </button>
			    </div> <!-- form-group// -->      
			        
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="signin.php">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<?php include 'components/footer.php'; ?>