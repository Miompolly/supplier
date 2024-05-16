<?php include 'components/user_header.php'; ?>


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
	<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4">Sign in</h4>
	  <form method="POST" action="server.php">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email Address">
    </div> <!-- form-group// -->

    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div> <!-- form-group// -->

    <div class="form-group">
        <a href="#" class="float-right">Forgot password?</a>
    </div> <!-- form-group form-check .// -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
    </div> <!-- form-group// -->    
</form>

      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

     <p class="text-center mt-4">Don't have account? <a href="signup.php">Sign up</a></p>
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<<?php include 'components/footer.php'; ?>