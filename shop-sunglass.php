<?php $config = require_once("src/config.php"); // Include the configuration file ?>
<?php require_once("src/read_specific.php"); // Include the file for reading specific data ?>
<?php require_once("src/read.php"); // Include the file for reading general data ?>
<?php require_once($config["root_path"] . "inc/header.php"); // Include the header file ?>
<?php require_once($config["root_path"] . "inc/nav.php"); // Include the navigation file ?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <!-- Close button for the modal -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <!-- Search input field -->
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <!-- Search button -->
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <!-- Sidebar Categories -->
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Gender
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="shop-men.php">Men</a></li>
                        <li><a class="text-decoration-none" href="shop-women.php">Women</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Product
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="shop-dresss.php">Dress</a></li>
                        <li><a class="text-decoration-none" href="shop-suit.php">Suit</a></li>
                        <li><a class="text-decoration-none" href="shop-sunglass.php">Sunglass</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="row">
                <!-- Sorting and Filtering -->
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="shop.php">All</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <!-- Sorting dropdown -->
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $result = get_specific('product', 'category_id', 3); // Fetch products from the specified category ?>
                <?php while($product = mysqli_fetch_assoc($result)): ?>
                    <?php
                        // Fetch category name for each product
                        $category_id = $product['category_id'];
                        $sql = "SELECT name FROM category WHERE id = $category_id";
                        $category_result = mysqli_query($conn, $sql);
                        $category_name = mysqli_fetch_assoc($category_result);
                    ?>
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <!-- Product image -->
                            <img class="card-img rounded-0 img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <!-- Product action buttons -->
                                    <li><a class="btn btn-success text-white" href="shop-single.php?id=<?= $product['id']; ?>"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=<?= $product['id']; ?>"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=<?= $product['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Product title -->
                            <a href="shop-single.php?id=<?= $product['id']; ?>" class="h3 text-decoration-none"><?= $product["title"]; ?></a>
                            <br>
                            <?php if(isset($category_name)): ?>
                            <!-- Product category name -->
                            <h6><?= $category_name["name"]; ?></h6>
                            <?php endif; ?>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <!-- Product color options -->
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                            <li>
                                <!-- Product rating -->
                                <?php echo str_repeat('<i class="text-warning fa fa-star"></i>', $product["rating"]); ?>
                                <?php echo str_repeat('<i class="text-muted fa fa-star"></i>', 5 - $product["rating"]); ?>
                            </li>
                            </ul>
                            <!-- Product price -->
                            <p class="text-center mb-0">$<?= $product["price"]; ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <!-- Pagination -->
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+1" alt="Brand 1"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+2" alt="Brand 2"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+3" alt="Brand 3"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+4" alt="Brand 4"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+5" alt="Brand 5"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+6" alt="Brand 6"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+7" alt="Brand 7"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="#"><img class="img-fluid brand-img" src="https://via.placeholder.com/150x100?text=Brand+8" alt="Brand 8"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Brands -->

<?php require_once($config["root_path"] . "inc/footer.php"); // Include the footer file ?>
<?php mysqli_close($conn); // Close the database connection ?>
