<?php 
session_start(); 
include 'components/user_header.php'; 

// PHP code for displaying JavaScript alerts
if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']); // Clear the message after displaying it
}
?>

<section class="section-content padding-y bg">
    <div class="container">
        <!-- ============================ COMPONENT 1 ================================= -->
        <div class="card">
            <div class="row no-gutters">
                <aside class="col-md-6">
                    <article class="gallery-wrap"> 
                        <?php
                        include 'server.php'; 

                        if (isset($_GET['id'])) {
                            $productid = $_GET['id'];
                            $sql = "SELECT * FROM products WHERE id = $productid";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "
                                <div class='img-big-wrap'>
                                    <img src='data:" . htmlspecialchars($row["imageType"]) . ";base64," . base64_encode($row["image"]) . "' class='img-xs border'/>
                                </div> <!-- img-big-wrap.// -->
                                </article> <!-- gallery-wrap .end// -->
                                </aside>
                                <main class='col-md-6 border-left'>
                                <article class='content-body'>
                                <input type='hidden' name='productid' value='{$row['id']}'>
                                <h2 class='title'>" . htmlspecialchars($row["ProductName"]) . "</h2>

                                <div class='mb-3'> 
                                    <var class='price h4'>Rwf " . htmlspecialchars($row["price"]) . "</var> 
                                </div> 

                                <p>" . htmlspecialchars($row["description"]) . ".</p>

                                <hr>

                                <div class='row'>
                                    <div class='item-option-select'>
                                        <h6>Select Size</h6>
                                        <div class='btn-group btn-group-sm btn-group-toggle' data-toggle='buttons'>
                                          <label class='btn btn-light'>
                                            <input type='radio' name='radio_size'> 1
                                          </label>
                                          <label class='btn btn-light active'>
                                            <input type='radio' name='radio_size' checked> 2
                                          </label>
                                          <label class='btn btn-light'>
                                            <input type='radio' name='radio_size'> 3
                                          </label>
                                          <label class='btn btn-light'>
                                            <input type='radio' name='radio_size'> 4
                                          </label>
                                        </div> 
                                    </div>
                                </div> <!-- row.// -->
                                <hr>
                                <form action='cart_server.php' method='POST'>
                                    <input type='hidden' name='product_id' value='{$row['id']}'>
                                    <button type='submit' class='btn btn-primary' name='add_to_cart'><span class='text'>Add to cart</span> <i class='fas fa-shopping-cart'></i> </button>
                                    <button href='#' class='btn  btn-success'> <span class='text'>Added to cart</span> <i class='fas fa-check'></i>  </button>
                                    <a href='cart.php' class='btn btn-outline-primary' name='add_to_cart'><span class='text'>View Cart</span> <i class='fas fa-eye'></i> </a>


                                </form>
                                </article> <!-- product-info-aside .// -->
                                </main> <!-- col.// -->
                                </div> <!-- row.// -->
                                </div> <!-- card.// -->
                                <!-- ============================ COMPONENT 1 END .// ================================= -->

                                <br>

                                <div class='row'>
                                    <div class='col-md-9'>
                                        <header class='section-heading'>
                                            <h3>Customer Reviews</h3>  
                                        </header>

                                        <article class='box mb-3'>
                                            <div class='icontext w-100'>
                                                <img src='./images/avatars/avatar1.jpg' class='img-xs icon rounded-circle'>
                                                <div class='text'>
                                                    <span class='date text-muted float-md-right'>24.04.2020</span>  
                                                    <h6 class='mb-1'>Mike John</h6>
                                                </div>
                                            </div> <!-- icontext.// -->
                                            <div class='mt-3'>
                                                <p>Dummy comment Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>    
                                            </div>
                                        </article>
                                    </div> <!-- col-md-9.// -->
                                </div> <!-- row.// -->
                                ";
                            } else {
                                echo "No user found with the provided ID.";
                            }
                        } else {
                            echo "No user ID provided.";
                        }
                        ?>
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

</body>
</html>
