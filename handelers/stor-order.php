<?php

  unset($_SESSION["order_id"]);

if (isset($_SESSION["customer"])) {
  $customer_data = $_SESSION["customer"];

  $name = $customer_data["name"];
  $phone = $customer_data["phone"];
  $address = $customer_data["address"];
  $governorate = $customer_data["governorate"];

  $conn = mysqli_connect("localhost", "root", "", "zay-store");

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO `customer` (`name`, `phone`, `shipping_address`)
          VALUES ('$name', '$phone', '$address')";

  if (!mysqli_query($conn, $sql)) {
      die("Error inserting customer: " . mysqli_error($conn));
  }

  $customer_id = mysqli_insert_id($conn);

  $jsonFile = '../data/cart.json';
  $jsonData = file_get_contents($jsonFile);
  $cartItems = json_decode($jsonData, true);

  $total_amount = 0; 

  foreach ($cartItems as $item) {
    $productId = $item['id'];
    $qty = $item['qty'];
    $size = $item['size'];

    $sql = "SELECT price FROM product WHERE id = '$productId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $productData = mysqli_fetch_assoc($result);
      $price = $productData['price'];
      $total_amount += $price * $qty; 
    } else {
      die("Error fetching product data: " . mysqli_error($conn));
    }
  }

  $sql = "INSERT INTO `orders` (`customer_id`, `total_amount`, `shipping_address`)
          VALUES ('$customer_id', '$total_amount', '$address')";

  if (!mysqli_query($conn, $sql)) {
      die("Error inserting order: " . mysqli_error($conn));
  }

  $order_id = mysqli_insert_id($conn);

  foreach ($cartItems as $item) {
    $productId = $item['id'];
    $qty = $item['qty'];
    $size = $item['size'];

    $sql = "SELECT price FROM product WHERE id = '$productId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $productData = mysqli_fetch_assoc($result);
      $price = $productData['price'];
    } else {
      die("Error fetching product data: " . mysqli_error($conn));
    }

    $sqlInsertOrderItem = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `unit_price`, `size`)
    VALUES ('$order_id', '$productId', '$qty', '$price', '$size')";

    if (!mysqli_query($conn, $sqlInsertOrderItem)) {
        die("Error inserting order items: " . mysqli_error($conn));
    }
  }

  $_SESSION["order_id"] = $order_id;

  if (!file_put_contents($jsonFile, json_encode([]))) {
      die("Error clearing JSON file");
  }

  unset($_SESSION["customer"]);

  mysqli_close($conn);
}
?>