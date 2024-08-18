    <?php $config =  require_once("src/config.php"); ?>
    <?php require_once("src/read_one.php"); ?>
    <?php $config["root_path"] . require_once("inc/header.php"); ?>
    <?php $config["root_path"] . require_once("inc/nav.php"); ?>
    <?php

    $jsonFile = 'data/cart.json';

    $jsonData = file_get_contents($jsonFile);

    $data = json_decode($jsonData, true);

    if (!is_array($data)) {
        $data = [];
    }
    $itemCount = count($data);
    ?>

    <div class="mt-5">
    <section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                <p class="mb-5 text-center">
                    <i class="text-info font-weight-bold"><?= htmlspecialchars($itemCount); ?></i> items in your cart</p>
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:60%">Product</th>
                            <th style="width:12%">Price</th>
                            <th style="width:10%">Quantity</th>
                            <th style="width:10%">Total</th>
                            <th style="width:16%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $item): ?>
                    <?php $result = get_one('product', $item['id']); ?>
                    <?php while($product = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-md-3 text-left">
                                        <img src="<?php echo $config['base_url'] . 'public/images/products/' . $product['image']; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4><?= $product['title']; ?></h4>
                                        <?php
                                        $category_id = $product['category_id'];
                                        $sql = "SELECT name FROM category WHERE id = $category_id";
                                        $category_result = mysqli_query($conn, $sql);
                                        $category_name = mysqli_fetch_assoc($category_result);
                                        ?>
                                        <p class="font-weight-light">Category: <?= $category_name['name'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">$<?= $product['price']; ?></td>
                            <td data-th="Price"><?= $item['qty'] ?></td>
                            <td>$<?= $product['price'] * $item['qty'];?></td>
                            <td class="actions" data-th="">
                        <div class="text-right">
                            <a href="handelers/delete_item.php?id=<?php echo htmlspecialchars($item['id']); ?>" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <a href="checkout.php" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Proceed to Buy</a>
            </div>
        </div>
    </div>
    </section>
    <?php $config["root_path"] . require_once("inc/footer.php"); ?>
