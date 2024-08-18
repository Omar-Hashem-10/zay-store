<!-- Load configuration and required files -->
<?php $config = require_once("src/config.php"); ?>
<?php require_once("src/read.php"); ?>
<?php

// Get the total number of products where id is greater than or equal to 4
$sql = "SELECT COUNT(*) AS total FROM product WHERE id >= 4";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

// Set the number of products to display per page
$results_per_page = 9;

// Calculate the total number of pages
$total_pages = ceil($total_records / $results_per_page);

// Get the current page number from the URL, default to 1 if not set or invalid
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int)$_GET['page'];
} else {
    $current_page = 1;
}

// Ensure the current page is within valid bounds
if ($current_page > $total_pages) {
    $current_page = $total_pages;
}
if ($current_page < 1) {
    $current_page = 1;
}

// Calculate the offset for the current page
$offset = ($current_page - 1) * $results_per_page;

// Update the SELECT query to fetch products with LIMIT and OFFSET for pagination
$sql = "SELECT * FROM product WHERE id >= 4 LIMIT $offset, $results_per_page";
$result = mysqli_query($conn, $sql);

?>

<?php require_once($config["root_path"] . "inc/header.php"); ?>
<?php require_once($config["root_path"] . "inc/nav.php"); ?>

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

<!-- Main Content -->
<div class="container py-5">
    <div class="row">

        <!-- Sidebar for Categories -->
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

        <!-- Main Products Display -->
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="shop.php">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="shop-men.php">Men's</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="shop-women.php">Women's</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while($product = mysqli_fetch_assoc($result)): ?>
                    <?php
                        // Fetch the category name for the current product
                        $category_id = $product['category_id'];
                        $sql = "SELECT name FROM category WHERE id = $category_id";
                        $category_result = mysqli_query($conn, $sql);
                        $category_name = mysqli_fetch_assoc($category_result);
                    ?>
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="<?php echo $config["base_url"] . "public/images/products/" . $product["image"]; ?>">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.php?id=<?= $product['id']; ?>"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=<?= $product['id']; ?>"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=<?= $product['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.php?id=<?= $product['id']; ?>" class="h3 text-decoration-none"><?= $product["title"]; ?></a>
                            <br>
                            <?php if(isset($category_name)): ?>
                            <h6><?= $category_name["name"]; ?></h6>
                            <?php endif; ?>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <?php if($category_name["name"] != "Watches" && $category_name["name"] != "Shoes" && $category_name["name"] != "fitness_weights" && $category_name["name"] != "Accessories"): ?>
                                <li>M/L/X/XL</li>
                                <?php endif; ?>
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
                                <?php echo str_repeat('<i class="text-warning fa fa-star"></i>', $product["rating"]); ?>
                                <?php echo str_repeat('<i class="text-muted fa fa-star"></i>', 5 - $product["rating"]); ?>
                            </li>
                            </ul>
                            <p class="text-center mb-0">$<?= $product["price"]; ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <!-- Pagination Links -->
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="shop.php?page=<?php echo $current_page - 1; ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                        <li class="page-item <?php if ($page == $current_page) echo 'active'; ?>">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="shop.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="shop.php?page=<?php echo $current_page + 1; ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<?php require_once($config["root_path"] . "inc/footer.php"); ?>
