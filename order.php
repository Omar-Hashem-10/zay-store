<?php
$config = require_once("src/config.php");
require_once($config["root_path"] . "inc/header.php");
require_once($config["root_path"] . "inc/nav.php");

if (!isset($_SESSION["order_id"])) {
    echo "No order found.";
    exit; 
}

$order_id = $_SESSION["order_id"];
$conn = mysqli_connect("localhost", "root", "", "zay-store");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `product_id`, `quantity`, `unit_price` FROM `order_items` WHERE `order_id` = '$order_id'";
$result = mysqli_query($conn, $sql);
?>

<div class="mt-5">
    <h2 class="border p-2 my-2 text-center">Your Products</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];

                $product_sql = "SELECT `title`, `image`, `price` FROM `product` WHERE `id` = '$product_id'";
                $product_result = mysqli_query($conn, $product_sql);

                if ($product_row = mysqli_fetch_assoc($product_result)) {
                    $name = $product_row['title'];
                    $image = $product_row['image'];
                    $price = $product_row['price'];

                    $total_price = $quantity * $price;

                    echo '<tr>';
                    echo '<td><img src="' . htmlspecialchars($config["base_url"]) . 'public/images/products/' . htmlspecialchars($image) . '" class="product-image" style="width: 100px; height: auto;"></td>';
                    echo '<td>' . htmlspecialchars($name) . '</td>';
                    echo '<td>$' . number_format($price, 2) . '</td>';
                    echo '<td>' . htmlspecialchars($quantity) . '</td>';
                    echo '<td>$' . number_format($total_price, 2) . '</td>'; 
                    echo '</tr>';
                } else {
                    echo '<tr><td colspan="5">Product not found.</td></tr>';
                }
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<?php require_once($config["root_path"] . "inc/footer.php"); ?>
