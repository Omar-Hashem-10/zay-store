<?php

require_once("../core/functions.php");

$id = $_GET['id'];
$qty = $_POST['product-quanity'];
$size = $_POST['product-size'];

$jsonFile = '../data/cart.json';
$jsonData = file_get_contents($jsonFile);

$data = json_decode($jsonData, true);

if (!is_array($data)) {
    $data = [];
}

$found = false;
foreach ($data as &$item) {
    if ($item['id'] == $id && $item['size'] == $size) {
        $item['qty'] += $qty;
        $found = true;
        break;
    }
}

if (!$found) {
    $data[] = [
        "id" => $id,
        "qty" => $qty,
        "size" => $size
    ];
}

$jsonData = json_encode($data, JSON_PRETTY_PRINT);

file_put_contents($jsonFile, $jsonData);

redirect("../shop-single.php");
?>
