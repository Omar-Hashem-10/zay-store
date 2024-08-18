<?php $config = require_once("src/config.php"); ?>
<?php require_once("src/read_one.php"); ?>
<?php $config["root_path"] . require_once("inc/header.php"); ?>
<?php $config["root_path"] . require_once("inc/nav.php"); ?>

<?php 
    // Set the product ID from the URL or session
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION["id"] = $id;
    } else {
        $id = $_SESSION["id"];
    }
?>

    <!-- Modal for search functionality -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main content section -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <?php 
                        // Fetch product details based on ID
                        $result = get_one('product', $id); 
                        while($product = mysqli_fetch_assoc($result)):
                            // Fetch the category name for the product
                            $category_id = $product['category_id'];
                            $sql = "SELECT name FROM category WHERE id = $category_id";
                            $category_result = mysqli_query($conn, $sql);
                            $category_name = mysqli_fetch_assoc($category_result);
                    ?>
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!-- Carousel controls for product images -->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>

                        <!-- Carousel wrapper for product images -->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <!-- First slide with product images -->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional slides with product images -->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Third slide with product images -->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>" alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel controls for navigating slides -->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product details section -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?= $product["title"]; ?></h1>
                            <p class="h3 py-2">$<?= $product["price"]; ?></p>
                            <p class="py-2">
                                <?php echo str_repeat('<i class="text-warning fa fa-star"></i>', $product["rating"]); ?>
                                <?php echo str_repeat('<i class="text-muted fa fa-star"></i>', 5 - $product["rating"]); ?>
                                <span class="list-inline-item text-dark"> | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?= $category_name["name"]; ?></strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p><?= $product["description"]; ?></p>
                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul>
                            
                            <!-- Form for adding the product to the cart -->
                            <form action="handelers/stor-cart.php?id=<?= $product['id']; ?>" method="POST">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <?php if($category_name["name"] != "Watches" && $category_name["name"] != "Shoes" && $category_name["name"] != "fitness_weights" && $category_name["name"] != "Accessories"): ?>
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="submit" href="cart.php" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Content -->



    <?php $config["root_path"] . require_once("inc/footer.php"); ?>

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>
</html>
