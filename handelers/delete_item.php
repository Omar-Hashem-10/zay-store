<?php

require_once("../core/functions.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jsonFile = '../data/cart.json';

    $jsonData = file_get_contents($jsonFile);

    $data = json_decode($jsonData, true);

    if (is_array($data)) {
        $data = array_filter($data, function($item) use ($id) {
            return $item['id'] !== $id;
        });

        $data = array_values($data);

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents($jsonFile, $jsonData);
    }
    redirect("../cart.php");
}