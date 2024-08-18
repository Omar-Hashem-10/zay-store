<?php
$conn = mysqli_connect("localhost", "root", "", "zay-store");

function get_data_id($table_name,  $id)
{
  global $conn;

  $sql = "SELECT * FROM `$table_name` WHERE `category_id` = '$id'";

  return  mysqli_query($conn, $sql);
}