<?php
session_start();
include('config.php');
$is_logged_in = isset($_SESSION['user_id']);
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>VCP Supply chain management</title>
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<!-- Font awesome 5 -->
<link href="fonts/fontawesome
/css/all.min.css" type="text/css" rel="stylesheet">
<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript">
// some script
// jquery ready start
$(document).ready(function() {
    // jQuery code
}); 
// jquery end
</script>
</head>
<body>
<header class="section-header">
<nav class="navbar p-md-0 navbar-expand-sm navbar-light border-bottom">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTop4">
    <div class="col-lg-2 col-md-3 col-6">
        <a href="./" class="brand-wrap">
            <img class="logo" src="./images/logo.png">
        </a> <!-- brand-wrap.// -->
    </div>
    <ul class="navbar-nav mr-auto">
        <li><a href="#" class="nav-link"> <i class="fa fa-envelope"></i> Email </a></li>
        <li><a href="#" class="nav-link"> <i class="fa fa-phone"></i> Call us </a></li>
    </ul>
    <ul class="navbar-nav">
        <li><a href="index.php" class="nav-link"> Home  </a></li>      
        <?php if ($is_logged_in): ?>
            <li><a href="orders.php" class="nav-link"> My order</a></li>
        <?php endif; ?>
        <li><a href="about.php" class="nav-link"> About us </a></li>
        <li><a href="contact.php" class="nav-link"> Contact us</a></li>
    </ul> <!-- list-inline //  -->
  </div> <!-- navbar-collapse .// -->
</div> <!-- container //  -->
</nav>
<section class="header-main border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg col-sm col-md col-6 flex-grow-0">
                <div class="category-wrap dropdown d-inline-block float-right">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
                        <i class="fa fa-bars"></i> All Departments 
                    </button>
                    <div class="dropdown-menu">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            die("Error: " . mysqli_error($conn));
                        }
                        if (mysqli_num_rows($result) > 0) { 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<a class='dropdown-item' href='#'>" . htmlspecialchars($row['categoryname']) . "</a>";
                            }
                        } else {
                            echo "<a class='dropdown-item' href='#'>No categories available</a>";
                        }
                        ?>
                    </div>
                </div>  <!-- category-wrap.// -->
            </div> <!-- col.// -->
            <a href="products.php" class="btn btn-outline-primary">All Products</a>
            <div class="col-lg col-md-6 col-sm-12 col">
                <form action="#" class="search">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" style="width:60%;" placeholder="Search">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                    </div>
                </form> <!-- search-wrap .end// -->
            </div> <!-- col.// -->
            <div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
                <div class="d-flex justify-content-end mb-3 mb-lg-0">
                    <?php if ($is_logged_in): ?>
                        <small class="title text-muted"><?php echo htmlspecialchars($_SESSION['success']); ?></small>
                        <div class="pl-3">
                            <a href="logout.php">Logout</a>
                        </div>
                    <?php else: ?>
                        <small class="title text-muted">Welcome guest!</small>
                        <div>
                          <a href="signin.php">Sign in</a> <span class="dark-transp"> | </span>
							<a href="signup.php"> Register</a>
                        </div>
                    <?php endif; ?>
                    <a href="cart.php" class="widget-header pl-3 ml-3">
                        <div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
                        <span class="badge badge-pill badge-danger notify"><?php echo $cart_count; ?></span>
                    </a>
                </div> <!-- widgets-wrap.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->
<!-- Content here -->
</body>
</html>
