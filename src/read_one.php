<?php
$conn = mysqli_connect("localhost", "root", "", "zay-store");

function get_one($table_name, $id)
{
  global $conn;

  $sql = "SELECT * FROM `$table_name` WHERE `id` = '$id'";

  return  mysqli_query($conn, $sql);
}