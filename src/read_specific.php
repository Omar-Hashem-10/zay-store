<?php
$conn = mysqli_connect("localhost", "root", "", "zay-store");

function get_specific($table_name,  $column_name, $specific)
{
  global $conn;

  $sql = "SELECT * FROM `$table_name` WHERE `$column_name` = '$specific'";

  return  mysqli_query($conn, $sql);
}